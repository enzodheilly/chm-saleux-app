<?php

namespace App\Form;

use App\Entity\CompetitionResult;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompetitionResultType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'First name',
                'required' => false,
                'trim' => true,
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Last name',
                'required' => false,
                'trim' => true,
            ])
            ->add('category', TextType::class, [
                'label' => 'Category',
                'required' => false,
                'trim' => true,
            ])
            ->add('weightClass', TextType::class, [
                'label' => 'Weight class',
                'required' => false,
                'trim' => true,
                'attr' => ['placeholder' => 'e.g. 63 kg'],
            ])
            ->add('cleanAndJerk', NumberType::class, [
                'label' => 'Clean & Jerk',
                'required' => false,
                'scale' => 2,
                'attr' => ['step' => '0.01', 'min' => 0],
            ])
            ->add('snatch', NumberType::class, [
                'label' => 'Snatch',
                'required' => false,
                'scale' => 2,
                'attr' => ['step' => '0.01', 'min' => 0],
            ])

            // ✅ total est calculé automatiquement (snatch + cleanAndJerk)
            // ->add('total', ...)

            ->add('points', NumberType::class, [
                'label' => 'Points',
                'required' => false,
                'scale' => 2,
                'attr' => ['step' => '0.01', 'min' => 0],
            ])
            ->add('bodyWeight', NumberType::class, [
                'label' => 'Body weight',
                'required' => false,
                'scale' => 2,
                'attr' => ['step' => '0.01', 'min' => 0],
            ])
            ->add('rankingLevel', TextType::class, [
                'label' => 'Ranking level',
                'required' => false,
                'trim' => true,
                'attr' => ['placeholder' => 'e.g. Regional, Departmental'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CompetitionResult::class,
        ]);
    }
}
