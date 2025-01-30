<?php

namespace App\form;

use App\Entity\UsedVehicle;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\PositiveOrZero;

Class NewUsedVehicleForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
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
                        'required' => false,
                        'label' => 'Cylindrée',
                        'constraints' => [
                            new Assert\Positive(['message' => 'La cylindrée doit être un nombre positif.']),
                            new Assert\Type(['type' => 'numeric', 'message' => 'La cylindrée doit être un nombre.']),
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
                                        ->add('color', TextType::class, [
                                            'constraints' => [
                                                new Assert\NotBlank([
                                                    'message' => 'Le champ "Couleur" ne peut pas être vide.',
                                                ]),
                                                new Assert\Length([
                                                    'min' => 2,
                                                    'max' => 50,
                                                    'minMessage' => 'Le champ "Couleur" doit contenir au moins 2 caractères.',
                                                    'maxMessage' => 'Le champ "Couleur" doit contenir au maximum 50 caractères.',
                                                ]),
                                            ],
                                            'label' => 'Couleur',
                                            ])
                                            ->add('year', NumberType::class, [
                                                'constraints' => [
                                                    new PositiveOrZero([
                                                        'message' => 'Le champ "Année" doit être positif ou nul.',
                                                    ]),
                                                    new Assert\NotBlank([
                                                        'message' => 'Le champ "Année" ne peut pas être vide.',
                                                    ]),
                                                ],
                                                'label' => 'Année',
                                                ])
                                                ->add('kilometers', NumberType::class, [
                                                    'constraints' => [
                                                        new PositiveOrZero([
                                                            'message' => 'Le champ "kilomètres" doit être positif ou nul.',
                                                        ]),
                                                        new Assert\NotBlank([
                                                            'message' => 'Le champ "Kilomètres" ne peut pas être vide.',
                                                        ]),
                                                    ],
                                                    'label' => 'Kilomètres',
                                                    ])
                                                    ->add('energyTax', NumberType::class, [
                                                        'constraints' => [
                                                            new PositiveOrZero([
                                                                'message' => 'Le champ "Crit`air" doit être positif ou nul.',
                                                            ]),
                                                            new Assert\NotBlank([
                                                                'message' => 'Le champ "Crit`air" ne peut pas être vide.',
                                                            ]),
                                                        ],
                                                        'label' => 'Crit`air',
                                                        ])
                                                        ->add('taxPower', NumberType::class, [
                                                            'constraints' => [
                                                                new PositiveOrZero([
                                                                    'message' => 'Le champ "Puissance fiscale" doit être positif ou nul.',
                                                                ]),
                                                                new Assert\NotBlank([
                                                                    'message' => 'Le champ "Puissance fiscale" ne peut pas être vide.',
                                                                ]),
                                                            ],
                                                            'label' => 'Puissance fiscale',
                                                        ])
                                                        ->add('imageUsedVehicle', FileType::class, [
                                                            'label' => 'image',
                                                            'required' => true,
                                                            'mapped' => false,
                                                            'constraints' => [
                                                                new File([
                                                                    'maxSize' => '5M',
                                                                    'mimeTypes' => ['image/jpeg', 'image/png', 'image/gif'],
                                                                    'mimeTypesMessage' => 'Veuillez uploader une image valide (JPEG, PNG, GIF)',
                                                                ])
                                                            ],
                                                            'label' => 'Image',
                                                        ])
->add('submit', SubmitType::class);
                                                    }
                                                    
                                                    public function configureOptions(OptionsResolver $resolver): void
                                                    {
                                                        $resolver->setDefaults([
                                                            'data_class' => UsedVehicle::class,
                                                        ]);
                                                    }
                                                }