<?php

namespace App\Form;

use App\Entity\Forfait;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ForfaitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Titre de l\'offre',
                'attr' => ['placeholder' => 'Ex: Premium, Étudiant...', 'class' => 'form-control']
            ])
            ->add('prix', NumberType::class, [
                'label' => 'Prix Total (€)',
                'scale' => 2,
                'attr' => ['placeholder' => '300.00', 'class' => 'form-control']
            ])
            // ✅ NOUVEAU CHAMP : Mensualité
            ->add('mensualite', NumberType::class, [
                'label' => 'Mensualité (Calculée auto.)',
                'required' => false, // Peut être vide si c'est une séance unique
                'scale' => 2,
                'attr' => [
                    'class' => 'form-control',
                    'readonly' => true, // Empêche la modification manuelle
                    'style' => 'background-color: #2a2a2d; color: #22c55e; font-weight: bold; border-color: #22c55e;'
                ]
            ])
            ->add('frequence', ChoiceType::class, [
                'label' => 'Type d\'abonnement',
                'choices' => [
                    'Annuel (/an)' => '/an',
                    'Mensuel (/mois)' => '/mois',
                    'Trimestriel (/trimestre)' => '/trimestre',
                    'Semestriel (/semestre)' => '/semestre',
                    'Séance unique' => ''
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
            ->add('avantages', TextareaType::class, [
                'label' => 'Liste des avantages (Un par ligne)',
                // ✅ EXPLICATION DE LA SYNTAXE ICÔNE
                'help' => 'Format : "icône | texte". Exemple : "fa-trophy | Accès compétition". (Allez à la ligne pour chaque nouvel avantage)',
                'required' => false,
                // ✅ PLACEHOLDER AVEC EXEMPLES D'ICÔNES
                'attr' => [
                    'rows' => 6,
                    'class' => 'form-control',
                    'placeholder' => "fa-door-open | Accès illimité\nfa-user-tie | Coach inclus\nfa-shower | Douches offertes"
                ]
            ]);

        // Transformer le texte du formulaire en Tableau JSON pour la BDD
        $builder->get('avantages')
            ->addModelTransformer(new CallbackTransformer(
                function ($avantagesArray) {
                    // BDD -> Formulaire : on affiche chaque élément sur une ligne
                    return is_array($avantagesArray) ? implode("\n", $avantagesArray) : '';
                },
                function ($avantagesString) {
                    // Formulaire -> BDD : on coupe le texte à chaque saut de ligne
                    if (!$avantagesString) return [];
                    return array_map('trim', explode("\n", $avantagesString));
                }
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Forfait::class,
        ]);
    }
}
