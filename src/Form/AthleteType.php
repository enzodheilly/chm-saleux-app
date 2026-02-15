<?php

namespace App\Form;

use App\Entity\Athlete;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class AthleteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, ['label' => 'Prénom'])
            ->add('nom', TextType::class, ['label' => 'Nom'])
            ->add('dateNaissance', DateType::class, [
                'label' => 'Date de naissance',
                'widget' => 'single_text',
                'html5' => true,
            ])
            ->add('equipe', ChoiceType::class, [
                'label' => 'Équipe',
                'choices' => [
                    'Féminine' => 'female',
                    'Masculine' => 'male',
                ],
                'placeholder' => 'Sélectionnez une équipe',
            ])
            ->add('categorie', ChoiceType::class, [
                'label' => 'Catégorie',
                'choices' => [
                    'Cadette' => 'Cadette',
                    'Cadet'  => 'Cadet',
                    'Junior'  => 'Junior',
                    'Senior'  => 'Senior',
                ],
                'placeholder' => 'Sélectionnez une catégorie',
            ])
            ->add('categoriePoids', TextType::class, [
                'label' => 'Catégorie de poids',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Ex: 55kg, 64kg…'
                ],
            ])
            ->add('image', FileType::class, [
                'label' => 'Photo (PNG, JPG)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '5M',
                        'mimeTypes' => ['image/jpeg', 'image/png'],
                        'mimeTypesMessage' => 'Veuillez télécharger une image valide (JPG ou PNG)',
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
