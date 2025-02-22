<?php

namespace App\Form;

use App\Entity\Admin;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class NewAdminForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
          ->add('email', EmailType::class, [
            // 'constraints' => [
            //   new Assert\NotBlank(),
            // ],
          ])
          ->add('password', RepeatedType::class, [
            // 'constraints' => [
            //   new Assert\NotBlank(),
            // ],
            'first_options'  => array('label' => 'mot de passe'),
            'second_options' => array('label' => 'confirmation de mot de passe'),
          ])
          ->add('submit', SubmitType::class)
        ;
      }
    
      public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
          'data_class' => User::class,
        ]);
      }
}