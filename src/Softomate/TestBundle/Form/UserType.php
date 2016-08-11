<?php

namespace Softomate\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('mail')
            ->add('pass');
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Softomate\TestBundle\Entity\User',
            'csrf_protection' => false,
            'validation_groups' => array('Default', 'create_user'),
            'allow_extra_fields' => true,
        ));
    }


    public function getName()
    {
        return 'softomate_user';
    }

    public function getBlockPrefix()
    {
        return '';
    }
}