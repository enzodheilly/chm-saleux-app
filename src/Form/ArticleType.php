<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\ArticleCategory;
use App\Repository\ArticleCategoryRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Article title',
                'attr' => ['placeholder' => 'Enter the title...'],
                'trim' => true,
                'empty_data' => '',
            ])
            ->add('publishedAt', DateTimeType::class, [
                'label' => 'Publication date',
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => ['placeholder' => 'Write the article content...'],
                'trim' => true,
                'required' => false,
            ])
            ->add('photo', FileType::class, [
                'label' => 'Article image',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '5M',
                        'maxSizeMessage' => 'The image is too large (max 5MB).',
                        'mimeTypes' => ['image/jpeg', 'image/png', 'image/webp'],
                        'mimeTypesMessage' => 'Please upload a valid image (JPEG, PNG, WebP).',
                    ])
                ],
            ])
            ->add('category', EntityType::class, [
                'label' => 'Category',
                'class' => ArticleCategory::class,
                'choice_label' => 'name',
                'placeholder' => 'Select a category',
                'required' => false,
                // ✅ Tri des catégories par nom
                'query_builder' => function (ArticleCategoryRepository $repo) {
                    return $repo->createQueryBuilder('c')
                        ->orderBy('c.name', 'ASC');
                },
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
