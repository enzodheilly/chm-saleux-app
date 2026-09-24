<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class DiscoverySessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName', TextType::class, [
                'label'       => 'Nom & Prénom',
                'constraints' => [new Assert\NotBlank()],
            ])
            ->add('discipline', ChoiceType::class, [
                'label'    => 'Discipline',
                'choices'  => ['Haltérophilie' => 'Haltérophilie', 'Musculation' => 'Musculation'],
                'expanded' => true,
                'multiple' => false,
                'constraints' => [new Assert\NotBlank()],
            ])
            ->add('sex', ChoiceType::class, [
                'label'    => 'Sexe',
                'choices'  => ['Féminin' => 'F', 'Masculin' => 'M'],
                'expanded' => true,
                'multiple' => false,
                'constraints' => [new Assert\NotBlank()],
            ])
            ->add('birthDate', DateType::class, [
                'label'      => 'Date de naissance',
                'widget'     => 'single_text',
                'html5'      => true,
                'constraints' => [new Assert\NotBlank()],
            ])
            ->add('address', TextType::class, [
                'label'       => 'Adresse',
                'constraints' => [new Assert\NotBlank()],
            ])
            ->add('phone', TelType::class, [
                'label'       => 'Téléphone',
                'constraints' => [new Assert\NotBlank()],
            ])
            ->add('email', EmailType::class, [
                'label'       => 'Email',
                'constraints' => [new Assert\NotBlank(), new Assert\Email()],
            ])
            // Responsable légal (optionnel)
            ->add('legalName', TextType::class, [
                'label'    => 'Nom & Prénom du responsable',
                'required' => false,
            ])
            ->add('legalRelation', TextType::class, [
                'label'    => 'Lien de parenté',
                'required' => false,
            ])
            ->add('legalPhone', TelType::class, [
                'label'    => 'Téléphone du responsable',
                'required' => false,
            ])
            ->add('legalEmail', EmailType::class, [
                'label'    => 'Email du responsable',
                'required' => false,
            ])
            // Décharge
            ->add('signeeName', TextType::class, [
                'label'       => 'Nom du signataire',
                'constraints' => [new Assert\NotBlank()],
            ])
            ->add('signPlace', TextType::class, [
                'label' => 'Lieu de signature',
                'data'  => 'Saleux',
            ])
            ->add('signDate', DateType::class, [
                'label'  => 'Date de signature',
                'widget' => 'single_text',
                'html5'  => true,
                'data'   => new \DateTimeImmutable(),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => null]);
    }
}
