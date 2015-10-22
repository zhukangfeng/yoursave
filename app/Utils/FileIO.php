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
    public static function upload($orignalPathName = null, $savePathName = null)
    {
        if ($orignalPathName == '' || $savePathName == '') {
            return null;
        }

        switch (Storage::getDefaultDriver()) {
            case 'local':
                return Storage::put($savePathName, file_get_contents($orignalPathName));
                break;
            case 'aliyunOSS':
                return self::uploadToAliyunOSS($orignalPathName, $savePathName);
                break;
            case 's3':
                return self::uploadToS3($orignalPathName, $savePathName);
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
    protected static function uploadToAliyunOSS($orignalPathName, $savePathName)
    {
        return AliyunOSS::multipartUpload($savePathName, $orignalPathName);
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
    protected static function uploadToS3($orignalPathName, $savePathName)
    {
        return Storage::put($savePathName, file_get_contents($orignalPathName));
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
