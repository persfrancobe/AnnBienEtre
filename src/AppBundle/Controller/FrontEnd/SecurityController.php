<?php
namespace AppBundle\Controller\FrontEnd;

use AppBundle\Entity\Provider;
use AppBundle\Entity\User;
use AppBundle\Entity\Visitor;
use AppBundle\Form\RegisterType;
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
        return $this->render('frontEnd/security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }

    /**
     * @Route("/active/{key}", name="active")
     * @Method("GET")
     */
    public function activeAction($key)
    {
        $em=$this->getDoctrine()->getManager();
        $user=$em->getRepository('AppBundle:User')->findOneBy(array('confirmationToken'=>$key));
        if ($user){
            $user->setConfirmationToken(null);
            $user->setEnabled(true);
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('login');
        }else {
            return $this->redirectToRoute('registration');
        }
    }
    /**
     * @Route("/logout",name="logout")
     *
     */
    public function logoutAction(){

    }
    /**
     * @Route("/register/{type}", name="registration",requirements={"type":"visitor|provider"})
     */
    public function registerAction(Request $request,$type)
    {
        // 1) build the form
        if($type=='visitor'){
            $user = new Visitor();
        }else{
            $user = new Provider();
        }
        $form = $this->createForm(RegisterType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            if (null == $user->getConfirmationToken()) {
                $user->setConfirmationToken(md5(uniqid(rand(), true)));
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
            }

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $emailValid=$this->get('AppBundle\Services\EmailValid');
            $emailValid->sendMailConfirm($user);

            return $this->render(':frontEnd/security:activation.html.twig');
        }

        return $this->render(
            'frontEnd/security/register.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     *@Route("/profile/changePasswd", name="change_password")
     */
    public function changePasswdAction(Request $request)
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


            return $this->render(':frontEnd:security:password-change-succes.html.twig');
        }

        return $this->render(':frontEnd:security:Change-psswd.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}