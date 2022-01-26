<?php
$password='09784038';
$hash=password_hash($password, PASSWORD_DEFAULT);
var_dump(password_verify($password,$hash));

/*require 'vendor/autoload.php';
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Bridge\Google\Transport\GmailSmtpTransport;
$transport = new GmailSmtpTransport('abderrazak.derwich@gmail.com', '09784038');
$mailer = new Mailer($transport);
$test="hamer";
$email = (new Email())
    ->from('abderrazak.derwich@gmail.com')
    ->to('abed.errazek.derwich@gmail.com')
    ->subject('Confirmation')
    ->subject("Message d'information")
    ->text('Lorem ipsum. osijotjroi drjthoiudjt dphyitud hrsuierhezhthreiut hriu therthyu erut eru')
    ->html("<h1 style='color:red;'> Agence de location voiture KARHABTI</h1>
            <p> bienvenue chez nous Monsieur : </p>
            <p> Agence de location voiture KARHABTI votre informer que votre réservation 
            de la voiture '.$test .'était confirmée pour la date jusqu à</p>
            <p>Bon journée</p>
             ");
$mailer->send($email);*/





/*use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Bridge\Google\Transport\GmailSmtpTransport;

//$transport = Transport::fromDsn('smtp://abderrazak.derwich%40gmail.com:09784038@gmail');
//$mailer = new Mailer($transport);

$transport = new GmailSmtpTransport('abderrazak.derwich@gmail.com', '09784038');
$mailer = new Mailer($transport);

$email = (new Email())
    ->from('abderrazak.derwich@gmail.com')
    ->to('bsmdmed@gmail.com')
    //->cc('cc@example.com')
    //->bcc('bcc@example.com')
    //->replyTo('fabien@example.com')
    //->priority(Email::PRIORITY_HIGH)
    ->subject('Time for Symfony Mailer!')
    ->text('Sending emails is fun again!')
    ->html('<p>See Twig integration for better HTML integration!</p>');

$mailer->send($email);
*/