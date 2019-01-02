<?php

namespace App\Form;

use App\Entity\Groupe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GroupeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,array('label'=>'Nom groupe','attr'=>array('class'=>'form-control')))
            ->add('raison', TextType::class,array('label'=>'Raison de creation','attr'=>array('class'=>'form-control')))
            ->add('photoCouverture', FileType::class,array('label'=>'Photo Couverture','attr'=>array('class'=>'form-control')))
            ->add('photoGroupe', FileType::class,array('label'=>'Photo Groupe','attr'=>array('class'=>'form-control')))
            ->add('description1', TextType::class,array('label'=>'Titre de article','attr'=>array('class'=>'form-control')))
            ->add('description2', TextType::class,array('label'=>'Contenu de article','attr'=>array('class'=>'form-control')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Groupe::class,
        ]);
    }
}
