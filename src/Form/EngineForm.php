<?php

namespace App\Form;

use App\Entity\Engine;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class EngineForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', TextType::class, [
                'required' => false,
                'label' => 'Type',
                'constraints' => [
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 255,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 255 caractères',
                    ]),
                ]
            ])
            ->add('cylinders', NumberType::class, [
                'required' => false,
                'label' => 'Cylindrée',
                'constraints' => [
                    new Assert\Positive(['message' => 'La cylindrée doit être un nombre positif.']),
                    new Assert\Type(['type' => 'numeric', 'message' => 'La cylindrée doit être un nombre.']),
                ]
            ])
            ->add('bore_x_stroke', TextType::class, [
                'required' => false,
                'label' => 'Alésage x Course',
                'constraints' => [
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 255,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 255 caractères',
                    ]),
                ]
            ])
            ->add('volumetricRatio', TextType::class, [
                'required' => false,
                'label' => 'Rapport volumétrique',
                'constraints' => [
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 255,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 255 caractères',
                    ]),
                ]
            ]) 
            ->add('announcedPower', TextType::class, [
                'required' => false,
                'label' => 'Puissance annoncée',
                'constraints' => [
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 255,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 255 caractères',
                    ]),
                ]
            ])
            ->add('coupleAnnounced', TextType::class, [
                'required' => false,
                'label' => 'Couple annoncé',
                'constraints' => [
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 255,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 255 caractères',
                    ]),
                ]
            ])
            ->add('powerSupply', TextType::class, [
                'required' => false,
                'label' => 'Alimentation',
                'constraints' => [
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 255,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 255 caractères',
                    ]),
                ]
            ])
            ->add('starter', TextType::class, [
                'required' => false,
                'label' => 'Démareur',
                'constraints' => [
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 255,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 255 caractères',
                    ]),
                ]
            ])
            ->add('consumption', TextType::class, [
                'required' => false,
                'label' => 'Consommation',
                'constraints' => [
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 255,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 255 caractères',
                    ]),
                ]
            ])
            ->add('co2Emissions', TextType::class, [
                'required' => false,
                'label' => 'Émissions de CO2',
                'constraints' => [
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 255,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 255 caractères',
                    ]),
                ]
                ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Engine::class,
        ]);
    }
}