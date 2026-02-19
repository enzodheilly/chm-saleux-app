<?php

namespace App\Form;

use App\Entity\Exercise;
use App\Entity\Equipment;
use App\Repository\EquipmentRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExerciseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Ex: Développé couché',
                    'class' => 'input',
                ],
            ])

            ->add('muscleGroup', ChoiceType::class, [
                'label' => 'Groupe musculaire',
                'placeholder' => 'Sélectionner...',
                'choices' => [
                    'Pectoraux' => 'Pectoraux',
                    'Dos' => 'Dos',
                    'Épaules' => 'Épaules',
                    'Biceps' => 'Biceps',
                    'Triceps' => 'Triceps',
                    'Jambes' => 'Jambes',
                    'Abdos' => 'Abdos',
                    'Fessiers' => 'Fessiers',
                    'Cardio' => 'Cardio',
                    'Full body' => 'Full body',
                ],
                'attr' => [
                    'class' => 'input',
                ],
            ])

            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Conseils d’exécution, consignes, etc.',
                    'rows' => 4,
                    'class' => 'input',
                ],
            ])

            ->add('equipment', EntityType::class, [
                'label' => 'Équipement (optionnel)',
                'class' => Equipment::class,
                'placeholder' => 'Aucun',
                'required' => false,

                'query_builder' => function (EquipmentRepository $er) {
                    return $er->createQueryBuilder('e')
                        ->orderBy('e.name', 'ASC');
                },

                'choice_label' => function (?Equipment $e) {
                    return $e ? $e->getName() : '';
                },

                'attr' => [
                    'class' => 'input',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Exercise::class,
        ]);
    }
}
