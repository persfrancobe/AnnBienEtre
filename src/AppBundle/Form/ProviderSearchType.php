<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProviderSearchType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',TextType::class,array('required'=>false))
            ->add('city',EntityType::class,array('class'=>'AppBundle\Entity\City','required'=>false))
            ->add('category',EntityType::class,array('class'=>'AppBundle\Entity\ServiceCategory','required'=>false));
    }

}
