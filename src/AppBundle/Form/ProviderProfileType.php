<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
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
            ->add('internetSite')
            ->add('username')
            ->add('contactEmail')
            ->add('telNum')
            ->add('tvaNum')
            ->add('description')
            ->add('facebook')
            ->add('youtube')
            ->add('gmail')
            ->add('twitter')
            ->add('advisor')
            ->add('firstName')
            ->add('streetNum')
            ->add('street')
            ->add('email')
            ->add('serviceCategories')
            ->add('city')
            ->add('locality')
            ->add('postcode')
            ->add('images',new ImageType(),array('required'=>false));

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
