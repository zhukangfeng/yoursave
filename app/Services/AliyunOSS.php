<?php
namespace App\Services;

// OSS
use Zhu\AliyunOSS\AliyunOSS as ParentAliyunOSS;
use Aliyun\OSS\OSSClient;
use Config;

class AliyunOSS
{

    protected $ossClient;

    private $AccessKeyId;
    private $AccessKeySecret;

    public function __construct($isInternal = false)
    {
        $serverAddress = $isInternal
            ? Config::get('app.aliyun_oss_server_internal') : Config::get('app.aliyun_oss_server');
        $this->ossClient = ParentAliyunOSS::boot(
            $serverAddress,
            Config::get('app.aliyun_access_key_id'),
            Config::get('app.aliyun_access_key_secret')
        );
        $this->ossClient->setBucket(Config::get('app.aliyun_oss_bucket'));
    }

    /**
     * 返回阿里云提供的接口类的实力
     *
     * @return  Aliyun\OSS\OSSclient
     */
    public static function getOSSClient()
    {   $oss = new AliyunOSS();
        return $oss->getOSSClient();
    }


    public static function upload($ossKey, $filePath)
    {
        $oss = new AliyunOSS();

        return $oss->ossClient->uploadFile($ossKey, $filePath);
    }

    /**
     * 初始化一个Multipart上传事件。
     * <p>
     * 使用Multipart模式上传数据前，必须先调用该接口来通过OSS初始化一个Multipart上传事件。
     * 该接口会返回一个OSS服务器创建的全局唯一的Upload ID，用于标识本次Multipart上传事件。
     * 用户可以根据这个ID来发起相关的操作，如中止、查询Multipart上传等。
     * </p>
     *
     * <li>Key(string, 必选) - 所要分块上传的Object的Key </li>
     * <li>Content(string|resource, 必选) - 所要上传Object的内容 </li>
     *
     * @return Models\InitiateMultipartUploadResult
     */
    public static function multipartUpload($ossKey, $filePath)
    {
        $contentLenth = filesize($filePath);
        $ossClient = (new ParentAliyunOSS(
            Config::get('app.aliyun_oss_server'),
            Config::get('app.aliyun_access_key_id'),
            Config::get('app.aliyun_access_key_secret')
        ))->getOSSClient();
        $uploadResult = $ossClient->initiateMultipartUpload([
            'Bucket'    => Config::get('app.aliyun_oss_bucket'),
            'Key'       => $ossKey,
            'Content'   => file($filePath),
            'ContentLength' => $contentLenth
        ]);

        // var_dump($ossClient->listMultipartUploads([
        //     'Bucket'    => Config::get('app.aliyun_oss_bucket'),
        // ]));exit;
        $partNumber = (int)($contentLenth / 5242880);  // 10MB亿块

        $uploadFile = fopen($filePath, 'r');
        $partEtages = [];
        for ($i = 0; $i < $partNumber; $i++) {
            $uploadPartResult = $ossClient->uploadPart([
                'Bucket'    => Config::get('app.aliyun_oss_bucket'),
                'Key'       => $ossKey,
                'UploadId'  => $uploadResult->getUploadId(),
                'Content'   => fgets($uploadFile, 5242880),
                'PartNumber' => $i + 1,
                'PartSize'  => 5242880
            ]);
            $partEtages[] = $uploadPartResult->getPartETag();
        }
        if (($partNumber * 5242880) < $contentLenth) {
            // 最后一块
            $uploadPartResult = $ossClient->uploadPart([
                'Bucket'    => Config::get('app.aliyun_oss_bucket'),
                'Key'       => $ossKey,
                'UploadId'  => $uploadResult->getUploadId(),
                'Content'   => fgets($uploadFile, 5242880),
                'PartNumber' => $i + 1,
                'PartSize'  => $contentLenth - ($partNumber * 5242880)
            ]);
            $partEtages[] = $uploadPartResult->getPartETag();
        }
        var_dump($partEtages);
        $ossClient->completeMultipartUpload([
            'Bucket'    => Config::get('app.aliyun_oss_bucket'),
            'Key'       => $ossKey,
            'UploadId'  => $uploadResult->getUploadId(),
            'PartETags' => $partEtages
        ]);
    }

    /**
    * 直接把变量内容上传到oss
    * @param $osskey
    * @param $content
    */
    public static function uploadContent($osskey, $content)
    {
        $oss = new AliyunOSS(true); // 上传文件使用内网，免流量费

        return $oss->ossClient->uploadContent($osskey, $content);
    }

    public static function getUrl($ossKey, $effectiveTime)
    {
        $oss = new AliyunOSS();

        return $oss->ossClient->getUrl($ossKey, $effectiveTime);
    }

    /**
     * 拷贝一个在OSS上已经存在的Object为另外一个Object。
     *
     * @param string $sourceBuckt 复制的源Bucket
     * @param string $sourceKey - 复制的的源Object的Key
     * @param string $destBucket - 复制的目的Bucket
     * @param string $destKey - 复制的目的Object的Key
     * @return Models\CopyObjectResult
     */
    public static function copyObject($sourceBuckt, $sourceKey, $destBucket, $destKey) {
        $oss = new AliyunOSS();

        return $oss->ossClient->copyObject($sourceBuckt, $sourceKey, $destBucket, $destKey);
    }

    /**
     * 移动OSS上已经存在的Object
     *
     * @param string $sourceBuckt 复制的源Bucket
     * @param string $sourceKey - 复制的的源Object的Key
     * @param string $destBucket - 复制的目的Bucket
     * @param string $destKey - 复制的目的Object的Key
     * @return Models\CopyObjectResult
     */
    public function moveObject($sourceBuckt, $sourceKey, $destBucket, $destKey)
    {
        $oss = new AliyunOSS();

        return $oss->ossClient->moveObject($sourceBuckt, $sourceKey, $destBucket, $destKey);
    }


    /**
     * 删除一个Object
     *
     * @param array $options 可以包含以下Key:
     * <li>Bucket(string, 必选) - 要删除的Object所在的Bucket</li>
     * <li>Key(string, 必选) - 要删除的Object的Key</li>
     *
     * @return void
     */
    public function deleteObject($bucketName, $key) {
        $oss = new AliyunOSS();

        return $oss->ossClient->deleteObject($bucketName, $key);
    }

    public static function createBucket($bucketName)
    {
        $oss = new AliyunOSS();

        return $oss->ossClient->createBucket($bucketName);
    }

    public static function getAllObjectKey($bucketName)
    {
        $oss = new AliyunOSS();

        return $oss->ossClient->getAllObjectKey($bucketName);
    }
}
