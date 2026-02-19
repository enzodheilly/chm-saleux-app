<?php
// src/Form/LegalPageType.php

namespace App\Form;

use App\Entity\LegalPage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LegalPageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
            ])
            ->add('slug', TextType::class, [
                'label' => 'Slug',
                'help' => 'Ex: cgu, cookies, confidentialite',
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Contenu (HTML autorisé)',
                'attr' => ['rows' => 15],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LegalPage::class,
        ]);
    }
}
