<?php

namespace App\Form;

use App\Entity\Information;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\PositiveOrZero;

class InformationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Le champ "Marque" ne peut pas être vide.',
                    ]),
                    new Assert\Length([
                        'min' => 2,
                        'max' => 50,
                        'minMessage' => 'Le champ "Marque" doit contenir au moins 2 caractères.',
                        'maxMessage' => 'Le champ "Marque" doit contenir au maximum 50 caractères.',
                    ]),
                ],
                'label' => 'Marque',
            ])
            ->add('model', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Le champ "Modèle" ne peut pas être vide.',
                    ]),
                    new Assert\Length([
                        'min' => 2,
                        'max' => 50,
                        'minMessage' => 'Le champ "Modèle" doit contenir au moins 2 caractères.',
                        'maxMessage' => 'Le champ "Modèle" doit contenir au maximum 50 caractères.',
                    ]),
                ],
                'label' => 'Modèle',
            ])
            ->add('category', ChoiceType::class, [
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Veuillez sélectionner la catégorie.',
                    ]),
                ],
                'choices' => [
                    'Trail' => 'Trail',
                    'Sport / GT' => 'Sport / GT',
                    'Roadster' => 'Roadster',
                    'Tout-terrain' => 'Tout-terrain',
                    'Supermoto' => 'Supermoto',
                    'Scooter' => 'Scooter',
                    'Moto 125' => 'Moto 125',
                ],
                'expanded' => true,
                'multiple' => false,
                'label' => 'Catégorie',
            ])
            ->add('cylinders', NumberType::class, [
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Le champ "Cylindrée" ne peut pas être vide.',
                    ]),
                    new Assert\Positive([
                        'message' => 'La cylindrée doit être un nombre positif.',
                    ]),
                ],
                'label' => 'Cylindrée',
            ])
            ->add('price', TextType::class, [
                'attr' => ['pattern' => '[0-9]+([.,][0-9]+)?'],
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Le champ "Prix" ne peut pas être vide.',
                    ]),
                ],
                'label' => 'Prix',
                ])
            ->add('warrantyTime', NumberType::class, [
                'constraints' => [
                    new PositiveOrZero([
                        'message' => 'Le champ "Durée de garantie" doit être positif ou nul.',
                    ]),
                    new Assert\NotBlank([
                        'message' => 'Le champ "Durée de garantie" ne peut pas être vide.',
                    ]),
                ],
                'label' => 'Durée de garantie',
                ])
            ->add('description', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Le champ "Description" ne peut pas être vide.',
                    ]),
                    new Assert\Length([
                        'min' => 2,
                        'max' => 5000,
                        'minMessage' => 'Le champ "Description" doit contenir au moins 2 caractères.',
                        'maxMessage' => 'Le champ "Description" doit contenir au maximum 5000 caractères.',
                    ]),
                ],
                'label' => 'Description',
            ])
            ->add('availableForTrial', CheckboxType::class, [
                'required' => false,
                'label' => 'Disponible pour essai',
            ])
            ->add('license', ChoiceType::class, [
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Veuillez sélectionner au moins un type de permis.',
                    ]),
                ],
                'choices' => [
                    'Permis A' => 'Permis A',
                    'Permis A2' => 'Permis A2',
                    'Permis A1' => 'Permis A1',
                    'Permis B' => 'Permis B',
                    'Permis AM' => 'Permis AM',
                ],
                'expanded' => true,
                'multiple' => true,
                'label' => 'Permis requis',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Information::class,
        ]);
    }
}