<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Provider;
use AppBundle\Entity\Visitor;
use AppBundle\Form\ProviderRegisterType;
use AppBundle\Form\VisitorRegisterType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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
     * @Route("/logout",name="logout")
     *
     */
    public function logoutAction(){

    }
    /**
     * @Route("/register/visitor", name="visitor_registration")
     */
    public function visitorRegisterAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) build the form
        $visitor = new Visitor();
        $form = $this->createForm(VisitorRegisterType::class, $visitor);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($visitor, $visitor->getPlainPassword());
            $visitor->setPassword($password);

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($visitor);
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
     * @Route("/register/provider", name="provider_registration")
     */
    public function providerRegisterAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) build the form
        $provider = new Provider();
        $form = $this->createForm(ProviderRegisterType::class, $provider);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($provider, $provider->getPlainPassword());
            $provider->setPassword($password);

            // 4) save the User!
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
     * @Route("/send")
     */
    public function mailConfirmationAction(\Swift_Mailer $mailer){
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('bleuuboyy@gmail.com')
            ->setTo('persfrancobe@gmail.com')
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    'security/email-registration-confirm.html.twig',
                    array('name' => '$name')
                ),
                'text/html'
            )
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'Emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;

        $mailer->send($message);

        // or, you can also fetch the mailer service this way
        // $this->get('mailer')->send($message);

        return $this->render('hello.html.twig');

    }

    /**
     *@Route("/changePasswd", name="change_password")
     */
    public function changePasswdAction(Request $request)
    {
        $changePasswordModel = new ChangePassword();
        $form = $this->createForm(ChangePasswordType::class, $changePasswordModel);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // perform some action,
            // such as encoding with MessageDigestPasswordEncoder and persist
            return $this->render('hello.html.twig');
        }

        return $this->render(':security:Change-psswd.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}