<?php

namespace App\Form;

use App\Entity\PanelEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PanelEntityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class,array())
            ->add('lastname')
            ->add('email')
            ->add('societe')
            ->add('taille')
            ->add('corpeOne')
            ->add('corpeToo')
            ->add('corpeThree')
            ->add('verbatim')
            ->add('q1')
            ->add('q2')
            ->add('q3')
            ->add('q4')
            ->add('q5')
            ->add('noteGlobale')
            ->add('moyenneEvaluation')
            ->add('classification')
            ->add('marque')
            ->add('application')
            ->add('distribution')
            ->add('departement')
            ->add('createdAt')
            ->add('recommandation')
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PanelEntity::class,
            'error_bubbling'=>true
        ]);
    }
}
