<?php
namespace App\Form;

use App\Entity\Transmission;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert; // Ajout de cette ligne

class TransmissionForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('primaryTransmission', TextType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        'min' => 2,
                        'max' => 255,
                        'minMessage' => 'Le champ doit contenir au moins 2 caractères',
                        'maxMessage' => 'Le champ doit contenir au maximum 255 caractères'
                    ])
                ]
            ])
            ->add('secondaryTransmission', TextType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        'min' => 2,
                        'max' => 255,
                        'minMessage' => 'Le champ doit contenir au moins 2 caractères',
                        'maxMessage' => 'Le champ doit contenir au maximum 255 caractères'
                    ])
                ]
            ])
            ->add('clutch', TextType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        'min' => 2,
                        'max' => 255,
                        'minMessage' => 'Le champ doit contenir au moins 2 caractères',
                        'maxMessage' => 'Le champ doit contenir au maximum 255 caractères'
                    ])
                ]
            ])
            ->add('command', TextType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        'min' => 2,
                        'max' => 255,
                        'minMessage' => 'Le champ doit contenir au moins 2 caractères',
                        'maxMessage' => 'Le champ doit contenir au maximum 255 caractères'
                    ])
                ]
            ])
            ->add('gearbox', TextType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        'min' => 2,
                        'max' => 255,
                        'minMessage' => 'Le champ doit contenir au moins 2 caractères',
                        'maxMessage' => 'Le champ doit contenir au maximum 255 caractères'
                    ])
                ]
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transmission::class,
        ]);
    }
}
