<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProviderType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')->add('internetSite')->add('contactEmail')->add('telNum')->add('tvaNum')->add('description')->add('facebook')->add('youtube')->add('gmail')->add('twitter')->add('advisor')->add('housNum')->add('street')->add('registration')->add('registrationConf')->add('unsuccessfulTestNum')->add('serviceCategories')->add('city')->add('locality')->add('postcode');
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
        return 'appbundle_provider';
    }


}
