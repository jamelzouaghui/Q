<?php

namespace App\Form;

use App\Entity\Animateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimateurType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('firstname', TextType::class, array('label' => 'Nom Animateur', 'attr' => array('class' => 'form-control')))
                ->add('lastname', TextType::class, array('label' => 'Prenom Animateur', 'attr' => array('class' => 'form-control')))
                ->add('photo', FileType::class, array('label' => 'Photo Animateur', 'attr' => array('class' => 'form-control')))
                ->add('profession', TextType::class, array('label' => 'Profession Animateur', 'attr' => array('class' => 'form-control')))
                ->add('civility', TextType::class, array('label' => 'Civilité Animateur', 'attr' => array('class' => 'form-control')))
             
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Animateur::class,
        ]);
    }

}
