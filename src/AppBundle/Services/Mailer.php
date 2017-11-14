<?php
namespace AppBundle\Services;

use Swift_Mailer;

class Mailer
{
    protected $mailer;
    private $from = "no-reply@bienetre.be";
    private $reply = "persfrancobe@gmail.com";
    private $name = "Equipe Annuaire Bienetre";
    private $type= 'text/html';

    public function __construct(Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendMessage($to, $subject, $body)
    {
            $mail = \Swift_Message::newInstance();

        $mail
            ->setFrom($this->from,$this->name)
            ->setTo($to)
            ->setSubject($subject)
            ->setBody($body)
            ->setReplyTo($this->reply,$this->name)
            ->setContentType($this->type);

        $this->mailer->send($mail);
    }


}