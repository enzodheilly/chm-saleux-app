<?php
// src/Form/ProduitType.php
namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('prix', MoneyType::class, [
                // On passe 'currency' à false pour supprimer le symbole automatique
                'currency' => false,
                // On s'assure que le label auto de Symfony ne vienne pas perturber ton design
                'label' => false,
            ])
            ->add('image', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
