<?php
// src/Controller/BoutiqueController.php
namespace App\Controller\Front;

use App\Entity\Produit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoutiqueController extends AbstractController
{
    #[Route('/boutique', name: 'boutique')]
    public function index(EntityManagerInterface $em): Response
    {
        // Récupérer tous les produits depuis la BDD
        $produits = $em->getRepository(Produit::class)->findAll();

        // Passer la variable 'produits' au template
        return $this->render('dashboard/tabs/boutique.html.twig', [
            'produits' => $produits,
        ]);
    }
}
