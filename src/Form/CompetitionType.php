<?php

namespace App\Form;

use App\Entity\Competition;
use App\Form\CompetitionResultType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class CompetitionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Competition title',
                'trim' => true,
            ])
            ->add('eventDate', DateTimeType::class, [
                'label' => 'Event date',
                'widget' => 'single_text',
            ])
            ->add('location', TextType::class, [
                'label' => 'Location',
                'required' => false,
                'trim' => true,
            ])
            ->add('gender', ChoiceType::class, [
                'label' => 'Gender',
                'choices' => [
                    'Male' => 'male',
                    'Female' => 'female',
                ],
                'placeholder' => 'Select a gender',
                'required' => false,
            ])
            ->add('competitionType', TextType::class, [
                'label' => 'Competition type',
                'required' => false,
                'trim' => true,
            ])
            ->add('teamRanking', TextType::class, [
                'label' => 'Team ranking',
                'required' => false,
                'trim' => true,
            ])
            ->add('image', FileType::class, [
                'label' => 'Competition image (JPG, PNG, WebP)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '5M',
                        'maxSizeMessage' => 'The image is too large (max 5MB).',
                        'mimeTypes' => ['image/jpeg', 'image/png', 'image/webp'],
                        'mimeTypesMessage' => 'Please upload a valid image (JPG, PNG, WebP).',
                    ])
                ],
            ])
            ->add('results', CollectionType::class, [
                'entry_type' => CompetitionResultType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false, // important pour OneToMany
                'label' => 'Results',
                'required' => false,
                'prototype' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Competition::class,
        ]);
    }
}
