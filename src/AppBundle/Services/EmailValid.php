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
        $key=md5(uniqid(rand(), true));
        $id=$user->getId();
        $user->setConfirmationToken($key);
        $user->setEnabled(false);
        $this->em->persist($user);
        $this->em->flush();
        $lien="http://127.0.0.1:8000/login/active/".$id."/".$key;

        $body=$this->ei->render('security/email-registration-confirm.html.twig',array('link'=>$lien));

        $this->mailer->sendMessage($to,$this->subject,$body);

    }

}