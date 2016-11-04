<?php

namespace CorinneBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
class ObjetType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('definition')
            ->add('sousCateg')
            ->add('categ')
            ->add('slider', CheckboxType::class, array(
                'label'    => 'Ajouter au carousel',
                'required' => false,
            ))
            ->add('source', FileType::class, array('label' => 'Image (fichier JPG)', 'data_class' => null))
            ->add('alt')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CorinneBundle\Entity\Objet'
        ));
    }
}
