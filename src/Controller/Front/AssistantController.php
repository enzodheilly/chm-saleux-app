<?php

namespace App\Controller\Front;

use App\Entity\ClubInfo;
use App\Entity\Licence;
use App\Entity\LicenceRequest;
use App\Service\EliosAiService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class AssistantController extends AbstractController
{
    private EntityManagerInterface $em;
    private EliosAiService $eliosAi;

    public function __construct(EntityManagerInterface $em, EliosAiService $eliosAi)
    {
        $this->em = $em;
        $this->eliosAi = $eliosAi;
    }

    // --- CHAT PRINCIPAL ---

    #[Route('/assistant/chat', name: 'assistant_chat', methods: ['POST'])]
    public function chat(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $message = trim($data['message'] ?? '');

        if (!$message) {
            return $this->json(['reply' => "Je n’ai pas compris 😅"]);
        }

        // 1. Priorité aux infos du club en BDD
        $dbReply = $this->getInfoFromDatabase($message);
        if ($dbReply) {
            return $this->json(['reply' => $dbReply]);
        }

        // 2. Appel au Service IA (On passe un tableau vide pour l'historique pour éviter les bugs)
        $reply = $this->eliosAi->getReply($message, []);

        return $this->json(['reply' => $reply]);
    }

    // --- TUNNEL RÉCUPÉRATION LICENCE ---

    #[Route('/assistant/licence/request', name: 'assistant_licence_request', methods: ['POST'])]
    public function requestLicenceCode(Request $request, MailerInterface $mailer): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $emailInput = $data['email'] ?? null;

        $licence = $this->em->getRepository(Licence::class)->findOneBy(['email' => $emailInput]);

        if (!$licence) {
            return new JsonResponse(['status' => 'error', 'error' => 'Aucune licence trouvée pour cet email.'], 404);
        }

        $code = str_pad((string)random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $licenceReq = new LicenceRequest();
        $licenceReq->setUserEmail($emailInput);
        $licenceReq->setVerificationCode($code);
        $licenceReq->setRequesterIp($request->getClientIp());

        $this->em->persist($licenceReq);
        $this->em->flush();

        $email = (new Email())
            ->from('enzodheilly134@gmail.com')
            ->to($emailInput)
            ->subject('🔑 Votre code de vérification Elios')
            ->html("
                <p>Bonjour <b>{$licence->getFirstName()}</b>,</p>
                <p>Voici votre code de vérification pour récupérer votre numéro de licence :</p>
                <p style='font-size: 24px; font-weight: bold; color: #6e41ff;'>$code</p>
                <p>Ce code expirera dans 15 minutes.</p>
            ");

        try {
            $mailer->send($email);
        } catch (\Exception $e) {
            return new JsonResponse(['status' => 'error', 'error' => 'Erreur lors de l\'envoi du mail.'], 500);
        }

        return new JsonResponse([
            'status' => 'success',
            'token' => $licenceReq->getToken()
        ]);
    }

    #[Route('/assistant/licence/verify', name: 'assistant_licence_verify', methods: ['POST'])]
    public function verifyLicenceCode(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $token = $data['token'] ?? null;
        $codeInput = $data['code'] ?? null;

        $licenceReq = $this->em->getRepository(LicenceRequest::class)->findOneBy(['token' => $token]);

        if (!$licenceReq || $licenceReq->getStatus() !== LicenceRequest::STATUS_PENDING || $licenceReq->isExpired()) {
            return new JsonResponse(['status' => 'error', 'error' => 'Session de vérification invalide ou expirée.'], 400);
        }

        if ($licenceReq->getVerificationCode() !== $codeInput) {
            $licenceReq->incrementFailedAttempts();
            $this->em->flush();
            return new JsonResponse(['status' => 'error', 'error' => 'Code incorrect.'], 400);
        }

        $licence = $this->em->getRepository(Licence::class)->findOneBy(['email' => $licenceReq->getUserEmail()]);

        $licenceReq->setStatus(LicenceRequest::STATUS_CONFIRMED);
        $licenceReq->setConfirmedAt(new \DateTimeImmutable());
        $this->em->flush();

        return new JsonResponse([
            'status' => 'success',
            'licenseNumber' => $licence->getNumber()
        ]);
    }

    // --- MÉTHODES PRIVÉES ---

    private function getInfoFromDatabase(string $message): ?string
    {
        $categories = [
            'horaires' => ['horaire', 'ouvert', 'heures', 'fermeture'],
            'tarifs'   => ['tarif', 'prix', 'abonnement', 'payer'],
            'contact'  => ['contact', 'téléphone', 'mail'],
            'adresse'  => ['adresse', 'où', 'situe', 'localisation'],
            'coach'    => ['coach', 'entraîneur'],
        ];

        $lowerMsg = mb_strtolower($message);
        foreach ($categories as $cat => $keywords) {
            foreach ($keywords as $word) {
                if (str_contains($lowerMsg, $word)) {
                    $info = $this->em->getRepository(ClubInfo::class)->findOneBy(['category' => $cat]);
                    return $info ? $info->getContent() : null;
                }
            }
        }
        return null;
    }
}
