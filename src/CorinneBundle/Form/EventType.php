<?php

namespace CorinneBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('descriptif')
            ->add('dateDebut', 'date',
                array(
                    'input' => 'datetime',
                    'widget' => 'single_text'))

            ->add('dateFin', 'date',  array(
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'dd/MM/yyyy',
            ))
            ->add('lieu')
            ->add('file', 'file', array('label' => 'Image  (JPG)', 'required' => false))
            ->add('alt')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CorinneBundle\Entity\Event'
        ));
    }
}
