<?php

namespace App\Form;

use App\Entity\PanelEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PanelEntityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class,array('label'=>'Nom','attr'=>array('class'=>'form-control')))
            ->add('lastname', TextType::class,array('label'=>'Prenom','attr'=>array('class'=>'form-control')))
            ->add('email', TextType::class,array('label'=>'Email','attr'=>array('class'=>'form-control')))
            ->add('societe', TextType::class,array('label'=>'Société','attr'=>array('class'=>'form-control')))
            ->add('taille', TextType::class,array('label'=>'Taille','attr'=>array('class'=>'form-control')))
            ->add('corpeOne', TextType::class,array('label'=>'Corpe One','attr'=>array('class'=>'form-control')))
            ->add('corpeToo', TextType::class,array('label'=>'Corpe Too','attr'=>array('class'=>'form-control')))
            ->add('corpeThree', TextType::class,array('label'=>'Corpe Three','attr'=>array('class'=>'form-control')))
            ->add('verbatim', TextType::class,array('label'=>'Verbatim','attr'=>array('class'=>'form-control')))
            ->add('q1', null,array('label'=>'Q1','attr'=>array('class'=>'form-control')))
            ->add('q2', null,array('label'=>'Q2','attr'=>array('class'=>'form-control')))
            ->add('q3', null,array('label'=>'Q3','attr'=>array('class'=>'form-control')))
            ->add('q4', null,array('label'=>'Q4','attr'=>array('class'=>'form-control')))
            ->add('q5', null,array('label'=>'Q5','attr'=>array('class'=>'form-control')))
            ->add('noteGlobale', null,array('label'=>'Note Globale','attr'=>array('class'=>'form-control')))
            ->add('moyenneEvaluation', null,array('label'=>'Moyenne Evaluation','attr'=>array('class'=>'form-control')))
            ->add('classification', null,array('label'=>'Classification','attr'=>array('class'=>'form-control')))
            ->add('marque', TextType::class,array('label'=>'','attr'=>array('class'=>'form-control')))
            ->add('application', TextType::class,array('label'=>'Marque','attr'=>array('class'=>'form-control')))
            ->add('distribution', TextType::class,array('label'=>'Distribution','attr'=>array('class'=>'form-control')))
            ->add('departement', TextType::class,array('label'=>'Département','attr'=>array('class'=>'form-control')))
            ->add('dateCreation', DateTimeType::class,array('label'=>'Date de creation','attr'=>array('class'=>'form-control')))
            ->add('recommandation', TextType::class,array('label'=>'Recommandation','attr'=>array('class'=>'form-control')))
           
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
