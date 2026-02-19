<?php

namespace App\Form;

use App\Entity\RoutineTemplate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoutineTemplateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('goal', ChoiceType::class, [
                'choices' => [
                    'Prise de masse' => 'prise_de_masse',
                    'Perte de poids' => 'perte_de_poids',
                    'Renforcement' => 'renfo',
                ],
            ])
            ->add('level', ChoiceType::class, [
                'choices' => [
                    'Débutant' => 'debutant',
                    'Intermédiaire' => 'intermediaire',
                    'Avancé' => 'avance',
                ],
            ])
            ->add('muscleGroup', TextType::class, [
                'help' => 'Ex: Pectoraux, Dos, Jambes, Abdos, FullBody, Push, Pull...'
            ])
            ->add('estimatedDurationMin', IntegerType::class, [
                'required' => false,
                'empty_data' => '',
            ])
            ->add('isPublished', CheckboxType::class, [
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RoutineTemplate::class,
        ]);
    }
}
