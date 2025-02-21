<?php

namespace App\Form;

use App\Entity\NewVehicle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditNewVehicleForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length([
                        'min' => 2, 
                        'max' => 50,
                        'minMessage' => 'le champs doit contenir au moins 2 caractères',
                        'maxMessage' => 'le champs doit contenir au maximum 50 caractères',
                    ]),
                ]
            ])
            ->add('Information', InformationForm::class)
            ->add('Engine', EngineForm::class)
            ->add('Transmission', TransmissionForm::class)
            ->add('Dimension', DimensionForm::class)
            ->add('CyclePart', CyclePartForm::class)
            ->add('submit', SubmitType::class);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewVehicle::class,
        ]);
    }
}