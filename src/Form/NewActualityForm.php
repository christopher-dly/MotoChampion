<?php

namespace App\Form;

use App\Entity\Actuality;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewActualityForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 100,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 100 caractères',
                    ]),
                ]
            ])
            ->add('title', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 100,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 100 caractères',
                    ]),
                ]
            ])
            ->add('content', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(
                        ['min' => 2,
                         'max' => 5000,
                         'minMessage' => 'le champs doit contenir au moins 2 caractères',
                         'maxMessage' => 'le champs doit contenir au maximum 5000 caractères',
                    ])
                ]
            ])
            ->add('image', FileType::class, [
                'required' => false,
                ])
            ->add('submit', SubmitType::class);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actuality::class,
        ]);
    }
}