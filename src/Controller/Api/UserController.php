<?php

namespace App\Controller\Api;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class UserController extends AbstractController
{
    #[Route('/api/me', name: 'api_me', methods: ['GET'])]
    public function getMe(SerializerInterface $serializer): JsonResponse
    {
        // Récupère l'utilisateur connecté via le Token JWT
        /** @var User|null $user */
        $user = $this->getUser();

        if (!$user) {
            return new JsonResponse(['error' => 'Accès refusé'], JsonResponse::HTTP_UNAUTHORIZED);
        }

        // On utilise le Serializer pour respecter les @Groups(['user:read']) 
        // définis dans ton entité User
        $jsonContent = $serializer->serialize($user, 'json', [
            'groups' => 'user:read'
        ]);

        return new JsonResponse($jsonContent, JsonResponse::HTTP_OK, [], true);
    }
}
