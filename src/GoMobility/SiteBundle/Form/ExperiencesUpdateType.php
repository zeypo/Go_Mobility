<?php

namespace GoMobility\SiteBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use GoMobility\SiteBundle\Form\ExperiencesType;

class ExperiencesUpdateType extends ExperiencesType
{
 
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('publish', 'checkbox', array(
                    'label'=>'Publier',
                    'required'  => false
            ));
    }
}