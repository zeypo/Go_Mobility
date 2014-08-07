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
            ->add('email', 'email')
            ->add('transport', 'choice', array(
                    'choices' => array('touristique' => 'Touristique', 'sportif' => 'Sportif', 'work'=>'Go to Work')
                ))
            ->add('start', 'text')
            ->add('arrival', 'text')
            ->add('description', 'textarea')
            ->add('game', 'checkbox', array(
                    'label'=>'Je m\'inscrit au jeux concours',
                    'required'  => false
                ))
            ->add('envoyer', 'submit');
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
