<?php

namespace App\Form;

use App\Entity\CyclePart;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class CyclePartForm extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('casterAngle', NumberType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Positive(['message' => 'L\'angle de braquage doit être un nombre positif.']),
                    new Assert\Type(['type' => 'numeric', 'message' => 'L\'angle de braquage doit être un nombre.']),
                ]
            ])
            ->add('caster', NumberType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Positive(['message' => 'Le castor doit être un nombre positif.']),
                    new Assert\Type(['type' => 'numeric', 'message' => 'Le castor doit être un nombre.']),
                ]
            ])
            ->add('wheelbase', NumberType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Positive(['message' => 'L\'empattement doit être un nombre positif.']),
                    new Assert\Type(['type' => 'numeric', 'message' => 'L\'empattement doit être un nombre.']),
                ]
            ])
            ->add('rim', TextType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 255,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 255 caractères',
                    ]),
                ]
            ])
            ->add('frame', TextType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 255,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 255 caractères',
                    ]),
                ]
            ])
            ->add('frontSuspension', TextType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 255,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 255 caractères',
                    ]),
                ]
            ])
            ->add('rearSuspension', TextType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 255,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 255 caractères',
                    ]),
                ]
            ])
            ->add('frontBrake', TextType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 255,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 255 caractères',
                    ]),
                ]
            ])
            ->add('rearBrake', TextType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 255,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 255 caractères',
                    ]),
                ]
            ])
            ->add('frontWheel', TextType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 255,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 255 caractères',
                    ]),
                ]
            ])
            ->add('rearWheel', TextType::class, [
                'required' => false,
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
            'data_class' => CyclePart::class,
        ]);
    }
}