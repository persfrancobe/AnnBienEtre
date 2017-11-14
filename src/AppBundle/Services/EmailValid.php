<?php
namespace AppBundle\Services;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Templating\EngineInterface;
use AppBundle\Services\Mailer;

class EmailValid{
    public function __construct(EntityManager $entityManager,EngineInterface $engine,Mailer $mailer)
    {
        $this->em=$entityManager;
        $this->ei=$engine;
        $this->mailer=$mailer;
        $this->subject='Annuaire BienEtre Validator Mail';
    }
    public function sendMailConfirm(User $user){

        $to=$user->getEmail();
        $key=$user->getConfirmationToken();
        $user->setConfirmationToken($key);
        $link="http://127.0.0.1:8000/active/".$key;

        $body=$this->ei->render('security/email-registration-confirm.html.twig',array('link'=>$link));

        $this->mailer->sendMessage($to,$this->subject,$body);

    }

    public function token(User $user){
        if(null==$user->getConfirmationToken()){
            $user->setConfirmationToken(md5(uniqid(rand(), true)));
        }
    }
}