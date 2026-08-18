<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use App\Entity\User;

class ProfileImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('profileImage', FileType::class, [
                'label'       => false,
                'mapped'      => false,
                'required'    => true,
                'constraints' => [
                    new File([
                        'maxSize'          => '2M',
                        'mimeTypes'        => ['image/jpeg', 'image/png', 'image/webp'],
                        'mimeTypesMessage' => 'Seuls les formats JPG, PNG et WebP sont acceptés (max 2 Mo).',
                        'maxSizeMessage'   => 'L\'image ne doit pas dépasser 2 Mo.',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
