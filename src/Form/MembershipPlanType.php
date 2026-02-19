<?php

namespace App\Form;

use App\Entity\MembershipPlan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MembershipPlanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Titre de l\'offre',
                'attr' => ['placeholder' => 'Ex: Premium, Étudiant...', 'class' => 'form-control']
            ])
            ->add('price', NumberType::class, [
                'label' => 'Prix Total (€)',
                'scale' => 2,
                'attr' => ['placeholder' => '300.00', 'class' => 'form-control']
            ])
            // ✅ Monthly price (optional)
            ->add('monthlyPrice', NumberType::class, [
                'label' => 'Mensualité (Calculée auto.)',
                'required' => false,
                'scale' => 2,
                'attr' => [
                    'class' => 'form-control',
                    'readonly' => true,
                    'style' => 'background-color: #2a2a2d; color: #22c55e; font-weight: bold; border-color: #22c55e;'
                ]
            ])
            ->add('billingPeriod', ChoiceType::class, [
                'label' => 'Type d\'abonnement',
                'choices' => [
                    'Annuel (/an)' => 'year',
                    'Mensuel (/mois)' => 'month',
                    'Trimestriel (/trimestre)' => 'quarter',
                    'Semestriel (/semestre)' => 'semester',
                    'Séance unique' => 'one_time',
                ],
                'attr' => ['class' => 'form-control']
            ])
            ->add('description', TextType::class, [
                'label' => 'Courte phrase d\'accroche',
                'required' => false,
                'attr' => ['placeholder' => 'Ex: Idéal pour commencer', 'class' => 'form-control']
            ])
            ->add('isPopular', CheckboxType::class, [
                'label' => 'Mettre en avant cette offre (Badge Populaire)',
                'required' => false,
                'attr' => ['class' => 'form-check-input', 'style' => 'transform: scale(1.3); margin-left: 10px;']
            ])
            ->add('benefits', TextareaType::class, [
                'label' => 'Liste des avantages (Un par ligne)',
                'help' => 'Format : "icône | texte". Exemple : "fa-trophy | Accès compétition". (Allez à la ligne pour chaque nouvel avantage)',
                'required' => false,
                'attr' => [
                    'rows' => 6,
                    'class' => 'form-control',
                    'placeholder' => "fa-door-open | Accès illimité\nfa-user-tie | Coach inclus\nfa-shower | Douches offertes"
                ]
            ]);

        // Transformer benefits (JSON array) <-> textarea (one per line)
        $builder->get('benefits')
            ->addModelTransformer(new CallbackTransformer(
                function ($benefitsArray) {
                    return is_array($benefitsArray) ? implode("\n", $benefitsArray) : '';
                },
                function ($benefitsString) {
                    if (!$benefitsString) {
                        return [];
                    }
                    return array_values(array_filter(array_map('trim', explode("\n", $benefitsString))));
                }
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MembershipPlan::class,
        ]);
    }
}
