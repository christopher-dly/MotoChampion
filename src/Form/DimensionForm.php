<?php

namespace App\Form;

use App\Entity\Dimension;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class DimensionForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('width', NumberType::class, [
                'required' => false,    
                'constraints' => [
                    new Assert\Positive(['message' => 'La nombre doit être positif.']),
                    new Assert\Type(['type' => 'numeric', 'message' => 'La valeur doit être un nombre.']),
                ]
            ])
            ->add('length', NumberType::class, [
                'required' => false,    
                'constraints' => [
                    new Assert\Positive(['message' => 'La nombre doit être positif.']),
                    new Assert\Type(['type' => 'numeric', 'message' => 'La valeur doit être un nombre.']),
                ]
            ])
            ->add('height', NumberType::class, [
                'required' => false,    
                'constraints' => [
                    new Assert\Positive(['message' => 'La nombre doit être positif.']),
                    new Assert\Type(['type' => 'numeric', 'message' => 'La valeur doit être un nombre.']),
                ]
            ])
            ->add('saddleHeight', NumberType::class, [
                'required' => false,    
                'constraints' => [
                    new Assert\Positive(['message' => 'La nombre doit être positif.']),
                    new Assert\Type(['type' => 'numeric', 'message' => 'La valeur doit être un nombre.']),
                ]
            ])
            ->add('groundClearance', NumberType::class, [
                'required' => false,    
                'constraints' => [
                    new Assert\Positive(['message' => 'La nombre doit être positif.']),
                    new Assert\Type(['type' => 'numeric', 'message' => 'La valeur doit être un nombre.']),
                ]
            ])
            ->add('gas', TextType::class, [
                'attr' => ['pattern' => '[0-9]+([.,][0-9]+)?'],
                'required' => false,
                'label' => 'Prix',
                ])
            ->add('oil', TextType::class, [
                'attr' => ['pattern' => '[0-9]+([.,][0-9]+)?'],
                'required' => false,
                'label' => 'Prix',
                ])
            ->add('weight', NumberType::class, [
                'required' => false,    
                'attr' => ['pattern' => '[0-9]+([.,][0-9]+)?'],
                ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Dimension::class,
        ]);
    }
}