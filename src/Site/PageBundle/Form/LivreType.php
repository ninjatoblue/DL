<?php

namespace Site\PageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo')
            ->add('contenu')
            ->add('date')
            ->add('ip')
            ->add('etat')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Site\PageBundle\Entity\Livre'
        ));
    }

    public function getName()
    {
        return 'site_pagebundle_livretype';
    }
}
