<?php

namespace App\Form;

use App\Entity\Exercise;
use App\Entity\RoutineTemplateExercise;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoutineTemplateExerciseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('exercise', EntityType::class, [
                'class' => Exercise::class,
                'choice_label' => 'name',
                'placeholder' => 'Choisir un exercice',
            ])
            ->add('position', IntegerType::class)
            ->add('sets', IntegerType::class)
            ->add('repsMin', IntegerType::class)
            ->add('repsMax', IntegerType::class)
            ->add('restSeconds', IntegerType::class)
            ->add('rir', IntegerType::class, [
                'required' => false,
                'empty_data' => '',
            ])
            ->add('notes', TextareaType::class, [
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RoutineTemplateExercise::class,
        ]);
    }
}
