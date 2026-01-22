<?php
// src/Controller/Admin/ProduitController.php
namespace App\Controller\Admin;

use App\Entity\Produit;
use App\Form\ProduitType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/produits')]
class AdminProduitController extends AbstractController
{
    #[Route('/', name: 'admin_product_index')]
    public function index(EntityManagerInterface $em): Response
    {
        $produits = $em->getRepository(Produit::class)->findAll();
        return $this->render('admin/produit/index.html.twig', [
            'produits' => $produits,
        ]);
    }

    #[Route('/new', name: 'admin_product_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // Récupérer le fichier uploadé
            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                // Générer un nom unique pour éviter les conflits
                $newFilename = uniqid() . '.' . $imageFile->guessExtension();

                // Déplacer le fichier dans le dossier public/uploads
                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'), // à configurer dans services.yaml
                        $newFilename
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur lors de l\'upload de l\'image');
                    return $this->redirectToRoute('admin_product_new');
                }

                // Mettre à jour l'entité avec le nom du fichier
                $produit->setImage($newFilename);
            }

            $em->persist($produit);
            $em->flush();

            $this->addFlash('success', 'Produit ajouté avec succès !');
            return $this->redirectToRoute('admin_product_index');
        }

        return $this->render('admin/produit/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // src/Controller/Admin/ProduitController.php
    #[Route('/{id}/edit', name: 'admin_product_edit')]
    public function edit(Request $request, EntityManagerInterface $em, Produit $produit): Response
    {
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Récupérer le fichier uploadé
            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                // Générer un nom unique
                $newFilename = uniqid() . '.' . $imageFile->guessExtension();

                // Déplacer le fichier dans le dossier uploads
                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur lors de l\'upload de l\'image');
                    return $this->redirectToRoute('admin_product_edit', ['id' => $produit->getId()]);
                }

                // Supprimer l'ancienne image si besoin (optionnel)
                $oldImage = $produit->getImage();
                if ($oldImage) {
                    $oldPath = $this->getParameter('images_directory') . '/' . $oldImage;
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                // Mettre à jour l'entité avec le nouveau nom de fichier
                $produit->setImage($newFilename);
            }

            $em->flush();
            $this->addFlash('success', 'Produit modifié avec succès !');
            return $this->redirectToRoute('admin_product_index');
        }

        return $this->render('admin/produit/edit.html.twig', [
            'form' => $form->createView(),
            'produit' => $produit,
        ]);
    }


    #[Route('/{id}/delete', name: 'admin_product_delete', methods: ['POST'])]
    public function delete(Request $request, EntityManagerInterface $em, Produit $produit): Response
    {
        if ($this->isCsrfTokenValid('delete' . $produit->getId(), $request->request->get('_token'))) {
            $em->remove($produit);
            $em->flush();
            $this->addFlash('success', 'Produit supprimé avec succès !');
        }

        return $this->redirectToRoute('admin_product_index');
    }
}
