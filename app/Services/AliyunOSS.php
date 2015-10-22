<?php
namespace App\Services;

// OSS
use JohnLui\AliyunOSS\AliyunOSS as ParentAliyunOSS;
use Aliyun\OSS\OSSClient;
use Config;

class AliyunOSS
{

    protected $ossClient;

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
        $oss = new AliyunOSS();

        return $oss->ossClient->initiateMultipartUpload([
            'Bucket'    => $oss->bucket,
            'Key'       => $ossKey,
            'Content'   => file_get_contents($filePath),
            'ContentLength' => strlen(file_get_contents($file))
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
     * @param array $options 可以包含以下Key:
     * <li>SourceBucket(string, 必选) - 复制的源Bucket</li>
     * <li>SourceKey(string, 必选) - 复制的的源Object的Key</li>
     * <li>DestBucket(string, 必选) - 复制的目的Bucket</li>
     * <li>DestKey(string, 必选) - 复制的目的Object的Key</li>
     * <li>ContentDisposition(string, 可选) - Content-Disposition请求头，表示MIME用户代理如何显示附加的文件。</li>
     * <li>CacheControl(string, 可选) - Cache-Control请求头，表示用户指定的HTTP请求/回复链的缓存行为。</li>
     * <li>ContentEncoding(string, 可选) - Content-Encoding请求头，表示Object内容的编码方式。</li>
     * <li>ContentType(string, 可选) - Content-Type请求头，表示Object内容的类型，为标准的MIME类型。</li>
     * <li>Expires(\DateTime, 可选) - Expires请求头，表示Object的过期时间</li>
     * <li>UserMetadata(array, 可选) - 用户自定义元数据，如 array('key1' => 'value1', 'key2' => 'value2') </li>
     * <p>如果用户在请求中指定了任意一项Object的元数据（ContentDisposition，CacheControl，ContentEncoding，ContentType，Expires， UserMetadata）
     * 则使用新的元数据，否则直接使用源Object的源数据。
     * </p>
     *
     * @return Models\CopyObjectResult
     */
    public static function copyObject(array $options) {
        $oss = new AliyunOSS();

        return $oss->ossClient->copyObject($options);
    }

    /**
     * 移动OSS上依旧存在的Object
     *

    /**
     * 删除一个Object
     *
     * @param array $options 可以包含以下Key:
     * <li>Bucket(string, 必选) - 要删除的Object所在的Bucket</li>
     * <li>Key(string, 必选) - 要删除的Object的Key</li>
     *
     * @return void
     */
    public function deleteObject(array $options) {
        $oss = new AliyunOSS();

        return $oss->ossClient->deleteObject(__FUNCTION__, $options);
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
