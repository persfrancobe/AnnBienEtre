<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ProviderProfileType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('internetSite',TextType::class,array('required'=>false))
            ->add('username')
            ->add('contactEmail',TextType::class,array('required'=>false))
            ->add('telNum')
            ->add('tvaNum')
            ->add('description')
            ->add('facebook',TextType::class,array('required'=>false))
            ->add('youtube',TextType::class,array('required'=>false))
            ->add('gmail',TextType::class,array('required'=>false))
            ->add('twitter',TextType::class,array('required'=>false))
            ->add('advisor',TextType::class,array('required'=>false))
            ->add('firstName')
            ->add('streetNum')
            ->add('street')
            ->add('email')
            ->add('city')
            ->add('locality')
            ->add('postcode')
            ->add('avatar',ImageType::class,array('required'=>false));

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Provider'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_provider_profile';
    }


}
