<?php

namespace App\Form;

use App\Entity\Athlete;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class AthleteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'First name',
                'trim' => true,
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Last name',
                'trim' => true,
            ])
            ->add('birthDate', DateType::class, [
                'label' => 'Birth date',
                'widget' => 'single_text',
                'html5' => true,
                'required' => false,
            ])
            ->add('gender', ChoiceType::class, [
                'label' => 'Gender',
                'choices' => [
                    'Female' => 'female',
                    'Male' => 'male',
                ],
                'placeholder' => 'Select a gender',
            ])
            ->add('category', ChoiceType::class, [
                'label' => 'Category',
                'choices' => [
                    'Cadette' => 'Cadette',
                    'Cadet'  => 'Cadet',
                    'Junior' => 'Junior',
                    'Senior' => 'Senior',
                ],
                'placeholder' => 'Select a category',
                'required' => false,
            ])
            ->add('weightClass', TextType::class, [
                'label' => 'Weight class',
                'required' => false,
                'trim' => true,
                'attr' => [
                    'placeholder' => 'e.g. 55kg, 64kg…',
                ],
            ])
            ->add('image', FileType::class, [
                'label' => 'Photo (JPG, PNG, WebP)',
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
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Athlete::class,
        ]);
    }
}
