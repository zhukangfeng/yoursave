<?php
namespace App\Utils;

// Services
use App\Services\AliyunOSS;
use Carbon\Carbon;
use Storage;
use URL;

/**
*  文件上传，url获取
*/
class FileIO
{
    /**
     * 将本地文件保存
     *
     * @param $file 要保存的文件
     * @param $savePathName 要保存的路径和文件名
     * @return mutil
     */
    public static function upload($originalPathName = null, $savePathName = null)
    {
        if ($originalPathName == '' || $savePathName == '') {
            return null;
        }

        switch (Storage::getDefaultDriver()) {
            case 'local':
                return Storage::put($savePathName, file_get_contents($originalPathName));
                break;
            case 'aliyunOSS':
                return self::uploadToAliyunOSS($originalPathName, $savePathName);
                break;
            case 's3':
                return self::uploadToS3($originalPathName, $savePathName);
                break;
            default:
                # code...
                break;
        }
    }

    /**
     * 将文件转存
     *
     * @param string $originalPathName
     * @param string $destPathName
     */
    public static function moveFile($originalPathName, $destPathName)
    {
        switch (Storage::getDefaultDriver()) {
            case 'local':
                return Storage::move($originalPathName, $destPathName);
                break;
            case 'aliyunOSS':
                return self::moveFileInAliyunOSS($originalPathName, $savePathName);
                break;
            case 's3':
                return self::moveFileInS3($originalPathName, $savePathName);
                break;
            default:
                # code...
                break;
        }
    }

    /**
     * 获取文件url
     *
     * @param string $pathName
     */
    public static function getUrl($pathName = null, $effectiveMinutues = DOWNLOAD_FILE_URL_EFFECTIVE_MIN)
    {
        if ($pathName == '') {
            return null;
        }
        switch (Storage::getDefaultDriver()) {
            case 'local':
                return URL::to('/api/file/download?path=' . '/' . $pathName);
                break;
            case 'aliyunOSS':
                return self::getUrlFromAliyunOSS($pathName, Carbon::now()->addMinutes($effectiveMinutues));
                break;
            case 's3':
                return self::getUrlFromS3($pathName, Carbon::now()->addMinutes($effectiveMinutues));
                break;
            default:
                # code...
                break;
        }

    }

    /**
     * 上传至阿里云存储
     *
     * @param string $file 要保存的文件
     * @param $savePathName 要保存的路径和文件名
     * @return mutil
     */
    protected static function uploadToAliyunOSS($originalPathName, $savePathName)
    {
        if (strlen(file_get_contents($originalPathName)) > 5242880) {
            // 如果文件大小大于5MB，则多分段上传
            return AliyunOSS::multipartUpload($savePathName, $originalPathName);
        } else {
            return AliyunOSS::upload($savePathName, $originalPathName);
        }
    }

    /**
     * 将存放在阿里云中的文件转移
     *
     * @param
     * @param string $originalPathName
     * @param string $destPathName
     */
    protected static function moveFileInAliyunOSS($originalPathName, $destPathName)
    {
        return AliyunOSS::moveObject(null, $originalPathName, null, $destPathName);
    }

    /**
     * 获取阿里云下载url
     *
     * @param string $savePathName
     * @param int $effectiveMinutues
     * @return string 文件url
     */
    protected static function getUrlFromAliyunOSS($savePathName, $effectiveTime)
    {
        return AliyunOSS::getUrl($savePathName, $effectiveTime);
    }

    /**
     * 上传至amazon s3存储
     *
     * @param string $file 要保存的文件
     * @param $savePathName 要保存的路径和文件名
     * @return mutil
     */
    protected static function uploadToS3($originalPathName, $savePathName)
    {
        return Storage::put($savePathName, file_get_contents($originalPathName));
    }

    /**
     * 移动S3种文件
     *
     * @param string $originalPathName
     * @param string $destPathName
     */
     protected static function moveFileInS3($originalPathName, $destPathName)
     {
        return Storage::move($originalPathName, $destPathName);
     }
    /**
     * 获取amazon s3下载url
     *
     * @param string $savePathName
     * @param int $effectiveMinutues
     * @return string 文件url
     */
    protected static function getUrlFromS3($savePathName, $effectiveTime)
    {
        $disk = Storage::disk('s3');
        $command = $disk
            ->getDriver()
            ->getAdapter()
            ->getClient()
            ->getCommand(
                'getObject',
                [
                    'Bucket'    => env('FILESYSTEMS_DISKS_S3_BUCKET'),
                    'Key'       => $savePathName,
                    'ResponseContentDisposition' => 'attachment;'
                ]
            );
        $request = $disk->getDriver()->getAdapter()->getClient()->createPresignedRequest($command, $effectiveTime);
        return (string)$request->getUri();
    }
}
