<?php
// src/Form/MerchandiseItemType.php

namespace App\Form;

use App\Entity\MerchandiseItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MerchandiseItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('price', MoneyType::class, [
                // Remove currency symbol display
                'currency' => false,
                // Keep your custom design (no label rendered)
                'label' => false,
            ])
            ->add('image', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MerchandiseItem::class,
        ]);
    }
}
