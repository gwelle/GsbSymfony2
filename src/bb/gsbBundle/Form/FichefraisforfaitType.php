<?php

namespace bb\gsbBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FichefraisforfaitType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomvisiteur')
            ->add('prenomvisiteur')
            ->add('date')
            ->add('mois')
            ->add('annee')
            ->add('repasmidi')
            ->add('nuitee')
            ->add('etape')
            ->add('km')
            ->add('prixrepasmidi')
            ->add('prixnuitee')
            ->add('prixetape')
            ->add('prixkm')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'bb\gsbBundle\Entity\Fichefraisforfait'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bb_gsbbundle_fichefraisforfait';
    }
}
