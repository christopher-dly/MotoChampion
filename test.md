

CompleteVehicleForm.php :
<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CompleteVehicleForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('newVehicle', NewVehicleForm::class)
            ->add('information', InformationForm::class)
            ->add('engine', EngineForm::class)
            ->add('cyclePart', CyclePartForm::class)
            ->add('dimension', DimensionForm::class)
            ->add('transmission', TransmissionForm::class);
    }
}
