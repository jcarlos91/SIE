<?php

namespace SIEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username','text')
            ->add('password','password',array(
                    'required'=> true,
                    'max_length' => 8,)
                )
            ->add('email','email',array(
                    'required'=> true)
                )
            ->add('isActive','choice',[
                    'choices'=>[
                    '1'=>'Si',
                    '2'=>'No'
                    ],
                    'required'=>true
                ])
            ->add('rol','entity',array(
                    'class'=>'SIEBundle\Entity\Roles',
                    'required'=>true,
                    'placeholder'=>'Selecione un Rol',
                    'property'=>'role')
                )
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SIEBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siebundle_user';
    }
}