<?php

namespace bb\gsbBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FichefraishorsforfaitType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('libelle')
            ->add('qte')
            ->add('prixunitaire')
            ->add('montant')
            ->add('nomvisiteur')
            ->add('prenomvisiteur')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'bb\gsbBundle\Entity\Fichefraishorsforfait'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bb_gsbbundle_fichefraishorsforfait';
    }
}
