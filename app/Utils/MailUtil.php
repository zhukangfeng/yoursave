<?php
namespace App\Utils;

// Services
use Mail;

/**
* 邮件收发类
*/
class MailUtil extends Mail
{
    
    /**
     * 发送邮件
     *
     * @param array $mailData company('view', 'viewData', 'fromMailAddr', 'fromName', 'toMailAddr', 'toName', 'subject')
     * @return bool
     *
     */
    public static function sendMail($mailData)
    {
        if (!isset($mailData['viewData'])) {
            $mailData['viewData'] = [];
        }

        if (isset($mailData['fromMailAddr']) && isset($mailData['password'])) {
            $transport = parent::getSwiftMailer()->getTransport();
            $transport->setUsername($mailData['fromMailAddr']);
            $transport->setPassword($mailData['password']);
        }

        return parent::queue($mailData['view'], $mailData['viewData'], function ($message) use ($mailData) {
            // 发件信箱
            if (isset($mailData['fromMailAddr'])) {
                $fromMailAddr = $mailData['fromMailAddr'];
            } else {
                $fromMailAddr = env('MAIL_USERNAME');
            }
            // 发件人
            if (isset($mailData['fromName'])) {
                $fromName = $mailData['fromName'];
            } else {
                $fromName = trans('mails.common.from_name');
            }
            $message->from($fromMailAddr, $fromName);
            // 收件人
            if (is_array($mailData['toMailAddr'])) {
                foreach ($mailData['toMailAddr'] as $key => $mailAddr) {
                    if (isset($mailData['toName'][$key])) {
                        $message->to($mailAddr, $mailData['toName'][$key]);
                    } else {
                        $message->to($mailAddr);
                    }
                }
            } else {
                if (isset($mailData['toName'])) {
                    $message->to($mailData['toMailAddr'], $mailData['toName']);
                } else {
                    $message->to($mailData['toMailAddr']);
                }
            }
            // 邮件主题
            $message->subject($mailData['subject']);
            if (isset($mailData['attachFile'])) {
                if (is_array($mailData['attachFile'])) {
                    foreach ($mailData['attachFile'] as $key => $attachFile) {
                        if (isset($mailData['attachFileOptions'][$key]) && is_array($mailData['attachFileOptions'][$key])) {
                            $message->attach($attachFile, $mailData['attachFileOptions'][$key]);
                        } else {
                            $message->attach($attachFile);
                        }
                    }
                } else {
                    if (isset($mailData['attachFileOptions']) && is_array($mailData['attachFileOptions'])) {
                        $message->attach($mailData['attachFile'], $mailData['attachFileOptions']);
                    } else {
                        $message->attach($mailData['attachFile']);
                    }
                }
            }
        });
    }
}