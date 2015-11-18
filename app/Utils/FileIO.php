<?php
namespace App\Utils;

// Services
use App\Services\AliyunOSS;
use Aws\Credentials\Credentials;
use Aws\Sts\StsClient;
use Aws\S3\S3Client;
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
        $command = $disk->getDriver()
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
        $request = $disk
            ->getDriver()
            ->getAdapter()
            ->getClient()
            ->createPresignedRequest($command, $effectiveTime);
        return (string)$request->getUri();
    }

    /**
     * 获取amazonS3临时访问权限
     * AWS Security Token Service
     *
     * @param int $seconds
     * @return array ['']
     */
    public static function getS3TempSTS($effectiveSeconds = 900)
    {
        $credentials = new Credentials(
            env('FILESYSTEMS_DISKS_AWS_S3_WEB_KEY'),
            env('FILESYSTEMS_DISKS_AWS_S3_WEB_SECRET'),
            null,
            time('+' . $effectiveSeconds)
        );
        $sts = StsClient::factory([
                'region'    => 'ap-northeast-1',
                'endpoint' => 'https://sts.' . 'ap-northeast-1' . '.amazonaws.com',
                'version'   => 'latest',
                'credentials'   => $credentials
        ]);

        $result = $sts->getSessionToken();
        var_dump($result);
        exit;





        $awsCredentials = [
            'includes' => array('_aws'),
            'services' => array(
                // All AWS clients extend from 'default_settings'. Here we are
                // overriding 'default_settings' with our default credentials and
                // providing a default region setting.
                'default_settings' => array(
                    'params' => array(
                        'credentials' => array(
                            'key'    => env('FILESYSTEMS_DISKS_AWS_S3_WEB_KEY'),
                            'secret' => env('FILESYSTEMS_DISKS_AWS_S3_WEB_SECRET'),
                        ),
                        'region' => env('FILESYSTEMS_DISKS_AWS_S3_WEB_REGION')
                    )
                )
            )
        ];

// var_dump($credentials);exit;
        $sts = StsClient::factory([
            'Credentials'   => [
                'SessionToken'  => base64_encode(time()),
                'Expiration'  => gmdate('Y-m-d\TG:i:s\Z', strtotime($effectiveSeconds))
            ],
            'key'   => env('FILESYSTEMS_DISKS_AWS_S3_KEY'),
            'secret'   => env('FILESYSTEMS_DISKS_AWS_S3_SECRET'),
            'service'   => 'sts',
            'region'    => env('FILESYSTEMS_DISKS_AWS_S3_REGION'),
            'version'   => 'latest',
        ]);
        // var_dump($sts);exit;
        // $sts = StsClient::factory([
        //     'Credentials'   => $credentials,
        //     'region'    => env('FILESYSTEMS_DISKS_AWS_S3_WEB_REGION'),
        //     'version'   => 'latest'
        // ]);
        $result = $sts->getSessionToken();
        var_dump($result);
        exit;
        // Fetch the federated credentials.
        $result = $sts->getFederationToken([
            'Name' => 'yoursave-s3-upload',
            'DurationSeconds' => $effectiveSeconds,
            'Policy' => json_encode([
                'Statement' => [
                    [
                        'Sid' => 'yoursave-s3-upload-' . time(),
                        'Action' => ['s3:ListBucket'],
                        'Effect' => 'Allow',
                        'Resource' => 'arn:aws:s3:::' . env('FILESYSTEMS_DISKS_AWS_S3_WEB_BUCKET')
                    ]
                ]
            ])
        ]);
        // The following will be part of your less trusted code. You provide temporary
        // security credentials so it can send authenticated requests to Amazon S3.
        // $credentials = $result->get('Credentials');
        var_dump($result);
        var_dump($credentials);
        exit;
        // $s3 = new S3Client::factory([
        //     'key' => $credentials['AccessKeyId'],
        //     'secret' => $credentials['SecretAccessKey'],
        //     'token' => $credentials['SessionToken']
        // ]);
    }
}
