<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Provider;
use AppBundle\Entity\User;
use AppBundle\Entity\Visitor;
use AppBundle\Form\ProviderRegisterType;
use AppBundle\Form\VisitorRegisterType;
use AppBundle\Services\Mailer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Process\Exception\LogicException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use AppBundle\Form\ChangePasswordType;
use AppBundle\Form\Model\ChangePassword;


class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request, AuthenticationUtils $authUtils)
    {
        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();
        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }

    /**
     * @Route("active/{key}", name="active")
     * @Method("GET")
     */
    public function loginActiveAction(Request $request, AuthenticationUtils $authUtils,$key,User $user)
    {

    }
    /**
     * @Route("/logout",name="logout")
     *
     */
    public function logoutAction(){

    }
    /**
     * @Route("/register/visitor", name="visitor_registration")
     */
    public function visitorRegisterAction(Request $request)
    {
        // 1) build the form
        $visitor = new Visitor();
        $form = $this->createForm(VisitorRegisterType::class, $visitor);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $emailValid=$this->get('AppBundle\Services\EmailValid');
            $emailValid->token($visitor);
            $em = $this->getDoctrine()->getManager();
            $em->persist($visitor);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $emailValid->sendMailConfirm($visitor);

            return $this->render('security/activation.html.twig');
        }

        return $this->render(
            'security/register.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/register/provider", name="provider_registration")
     */
    public function providerRegisterAction(Request $request, UserPasswordEncoderInterface $passwordEncoder,\Swift_Mailer $mailer)
    {
        // 1) build the form
        $provider = new Provider();
        $form = $this->createForm(ProviderRegisterType::class, $provider);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($provider);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('login');
        }

        return $this->render(
            'security/register.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     *@Route("/profile/changePasswd", name="change_password")
     */
    public function changePasswdAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $changePasswordModel = new ChangePassword();
        $form = $this->createForm(ChangePasswordType::class, $changePasswordModel);
        /*@var User*/
        $user=$this->get('security.token_storage')->getToken()->getUser();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $plainpass=$form['newPassword']->getData();
            $user->setPlainPassword($plainpass);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();


            return $this->render(':security:password-change-succes.html.twig');
        }

        return $this->render(':security:Change-psswd.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}