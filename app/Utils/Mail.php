<?php
namespace App\Utils;

// Services
use Mail as PrarentMail;
/**
* 邮件收发类
*/
class Mail extends PrarentMail
{
    
    /**
     * 发送邮件
     *
     * @param array $mailData company('view', 'viewData', 'fromMailAddr', 'fromName', 'toMailAddr', 'toName', 'subject')
     * @return bool
     *
     */
    public static function SendMail($mailData)
    {
        return parent::send($mailData['view'], $mailData['viewData'], function ($message) use ($mailData) {
            $message->from($mailData['fromMailAddr'], $mailData['fromName']);
            $message->to($mailData['toMailAddr'], $mailData['toName']);
            $message->subject($mailData['subject']);
        });
    }
}