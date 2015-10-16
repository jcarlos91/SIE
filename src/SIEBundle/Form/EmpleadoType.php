<?php

namespace SIEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmpleadoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre','text')
            ->add('apellidoP','text')
            ->add('apellidoM','text')
            ->add('curp','text',array('max_length'=>18))
            ->add('fechaNa','date',array('widget'=>'single_text'))
            ->add('puesto','entity',array(
                'class'=>'SIEBundle\Entity\Puesto',
                'required'=>true,
                'placeholder'=>'Asigne un Puesto',
                'property'=>'puesto'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SIEBundle\Entity\Empleado'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siebundle_empleado';
    }
}
