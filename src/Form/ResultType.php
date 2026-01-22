<?php

namespace App\Form;

use App\Entity\Result;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResultType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'required' => false,
            ])
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'required' => false,
            ])
            ->add('categorie', TextType::class, [
                'label' => 'Catégorie',
                'required' => false,
            ])
            ->add('categoriePoids', TextType::class, [
                'label' => 'Catégorie poids',
                'required' => false,
                'attr' => ['placeholder' => 'Ex: 63 kg'],
            ])
            ->add('epauleJete', NumberType::class, [
                'label' => 'Épaulé-Jeté',
                'required' => false,
                'scale' => 2,
                'attr' => ['step' => '0.01'],
            ])
            ->add('arracher', NumberType::class, [
                'label' => 'Arraché',
                'required' => false,
                'scale' => 2,
                'attr' => ['step' => '0.01'],
            ])
            ->add('total', NumberType::class, [
                'label' => 'Total',
                'required' => false,
                'scale' => 2,
                'attr' => ['step' => '0.01'],
            ])
            ->add('point', NumberType::class, [
                'label' => 'Points',
                'required' => false,
                'scale' => 2,
                'attr' => ['step' => '0.01'],
            ])
            ->add('pdc', NumberType::class, [
                'label' => 'Poids du corps (PDC)',
                'required' => false,
                'scale' => 2,
                'attr' => ['step' => '0.01'],
            ])
            ->add('classee', TextType::class, [
                'label' => 'Classée',
                'required' => false,
                'attr' => ['placeholder' => 'Ex: Régional, Départemental'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Result::class,
        ]);
    }
}
