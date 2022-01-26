<?php

namespace App\mailer;

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Bridge\Google\Transport\GmailSmtpTransport;

class ServiceMail
{
    public static function send(string $email, string $msg )
    {
        $transport = new GmailSmtpTransport('abderrazak.derwich@gmail.com', '09784038');
        $mailer = new Mailer($transport);
        $email = (new Email())
            ->from('abderrazak.derwich@gmail.com')
            ->to('abed.errazek.derwich@gmail.com')
            ->subject("Message d'information")
            ->html($msg);
        $mailer->send($email);
    }
}
