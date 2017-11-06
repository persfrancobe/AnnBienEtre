<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VisitorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('firstName')
            ->add('newsletter')
            ->add('streetNum')
            ->add('salt')
            ->add('street')
            ->add('registration')
            ->add('unsuccessfulTestNum')
            ->add('roles')
            ->add('banned')
            ->add('enabled')
            ->add('confirmationToken')
            ->add('lastLogin')
            ->add('passwordRequestedAt')
            ->add('email')
            ->add('username')
            ->add('password')
            ->add('isActive')
            ->add('registrationConfig')
            ->add('image')
            ->add('city')
            ->add('locality')
            ->add('postcode');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Visitor'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_visitor';
    }


}
