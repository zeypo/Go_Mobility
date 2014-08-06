<?php

namespace GoMobility\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExperiencesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('transport')
            ->add('start')
            ->add('arrival')
            ->add('description')
            ->add('game')
            ->add('ges')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GoMobility\SiteBundle\Entity\Experiences'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gomobility_sitebundle_experiences';
    }
}
