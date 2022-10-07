<?php

namespace App\Repositories\trait;

use Illuminate\Support\Facades\Mail;

trait SendMail
{
    public function sendMailVerification($recipientName , $recipientEmail , $verifyUrl )
    {
        $message = "Dear Sir:: <b>" . $recipientName . "
        </b> <p>Thanks For Registering, We Just Need To Check Your Email Address To Complete Your Account Press The Button Below  </p> ";

        $mail_data = [
            'recipient'    => $recipientEmail,
            'fromEmail'    => $recipientEmail,
            'fromName'     => $recipientName,
            'subject'      => 'Email Verification ',
            'body'         => $message,
            'actionLink'   => $verifyUrl,
        ];

        Mail::send('mail.template-email-verification', $mail_data, function ($message) use ($mail_data) {
            $message->to($mail_data['recipient'])
                ->from($mail_data['fromEmail'])
                ->subject($mail_data['subject']);
        });
    }

    public function sendMailForgotPassword($recipientEmail , $actionLink)
    {
        $body = "We Received a Request To Reset Your Password <b> your app name</b> account
            associated with " . $recipientEmail . " you can reset your password by clicking the link below";

        Mail::send('mail.email-forgot', ['action_link' => $actionLink, 'body' => $body], function ($message) use ($recipientEmail ) {

            $message->from('Freelancer@example.com', 'Coza Store');
            $message->to($recipientEmail)
                ->subject('Reset Password');
        });
    }
}
