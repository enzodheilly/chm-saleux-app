<?php
// src/Form/SetPasswordType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\User;

class SetPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options'  => [
                    'label' => 'Mot de passe',
                    'attr' => ['placeholder' => 'Mot de passe']
                ],
                'second_options' => [
                    'label' => 'Confirmer le mot de passe',
                    'attr' => ['placeholder' => 'Confirmez le mot de passe']
                ],
                'invalid_message' => 'Les mots de passe doivent correspondre.',
                'mapped' => false,
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Veuillez saisir un mot de passe'
                    ]),
                    new Assert\Length([
                        'min' => 8,
                        'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères.'
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
