<?php

namespace App\Controller\Admin;

use App\Entity\NewsletterSubscriber;
use App\Entity\NewsletterCampaign;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


#[Route('/gestion-chm-secrete-92x/newsletter', name: 'admin_newsletter_')]
class AdminNewsletterController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(EntityManagerInterface $em): Response
    {
        $subscribers = $em->getRepository(NewsletterSubscriber::class)->findAll();

        return $this->render('admin/newsletter/index.html.twig', [
            'subscribers' => $subscribers,
        ]);
    }

    #[Route('/compose', name: 'compose')]
    public function compose(
        Request $request,
        MailerInterface $mailer,
        EntityManagerInterface $em,
        UrlGeneratorInterface $urlGenerator
    ): Response {
        // --- Envoi AJAX d'un test ---
        if ($request->isXmlHttpRequest()) {
            $data = json_decode($request->getContent(), true);
            if (!empty($data['test'])) {

                // ✅ CSRF pour les appels AJAX
                if (!$this->isCsrfTokenValid('newsletter_compose', $data['_token'] ?? '')) {
                    return $this->json(['message' => '❌ Jeton CSRF invalide.'], 403);
                }

                $user = $this->getUser();
                if (!$user) {
                    return $this->json(['message' => '❌ Vous devez être connecté pour envoyer un test.'], 403);
                }

                $email = (new Email())
                    ->from('no-reply@monsite.com')
                    ->to($user->getEmail())
                    ->subject('[TEST] ' . $data['subject'])
                    ->html($data['content']);

                try {
                    $mailer->send($email);

                    $campaign = (new NewsletterCampaign())
                        ->setSubject($data['subject'])
                        ->setContent($data['content'])
                        ->setIsTest(true)
                        ->setSentBy($user->getEmail())
                        ->setRecipientCount(1)
                        ->setSentAt(new \DateTimeImmutable());

                    $em->persist($campaign);
                    $em->flush();

                    return $this->json(['message' => '✅ Mail de test envoyé à ' . $user->getEmail()]);
                } catch (\Exception $e) {
                    return $this->json(['message' => '❌ Erreur lors de l\'envoi : ' . $e->getMessage()], 500);
                }
            }
        }

        // --- Envoi réel (formulaire classique) ---
        if ($request->isMethod('POST')) {

            // ✅ CSRF pour l'envoi réel
            if (!$this->isCsrfTokenValid('newsletter_compose', (string) $request->request->get('_token', ''))) {
                $this->addFlash('danger', 'Jeton CSRF invalide.');
                return $this->redirectToRoute('admin_newsletter_compose');
            }

            $subject = $request->request->get('subject');
            $content = $request->request->get('content');

            $subscribers = $em->getRepository(NewsletterSubscriber::class)->findBy(['isConfirmed' => true]);
            $count = 0;

            $campaign = (new NewsletterCampaign())
                ->setSubject($subject)
                ->setContent($content)
                ->setIsTest(false)
                ->setSentBy($this->getUser()?->getEmail())
                ->setSentAt(new \DateTimeImmutable());

            $em->persist($campaign);
            $em->flush();

            foreach ($subscribers as $subscriber) {
                $user = $subscriber->getUser();

                $unsubscribeUrl = $urlGenerator->generate(
                    'newsletter_unsubscribe',
                    ['id' => $subscriber->getId()],
                    UrlGeneratorInterface::ABSOLUTE_URL
                );

                $personalizedContent = str_replace(
                    ['{{ firstname }}', '{{ lastname }}', '{{ email }}', '{{ unsubscribe_url }}'],
                    [
                        $user?->getFirstname() ?? '',
                        $user?->getLastname() ?? '',
                        $subscriber->getEmail(),
                        $unsubscribeUrl
                    ],
                    $content
                );

                $personalizedContent = preg_replace_callback(
                    '/<a\s+href="([^"]+)"/i',
                    function ($matches) use ($subscriber, $campaign, $urlGenerator) {
                        $trackedUrl = $urlGenerator->generate(
                            'newsletter_click',
                            [
                                'campaignId' => $campaign->getId(),
                                'subscriberId' => $subscriber->getId()
                            ],
                            UrlGeneratorInterface::ABSOLUTE_URL
                        );
                        return '<a href="' . $trackedUrl . '?url=' . urlencode($matches[1]) . '"';
                    },
                    $personalizedContent
                );

                $trackingPixel = sprintf(
                    '<img src="%s" width="1" height="1" style="display:none;" alt="" />',
                    $urlGenerator->generate(
                        'newsletter_open',
                        [
                            'campaignId' => $campaign->getId(),
                            'subscriberId' => $subscriber->getId()
                        ],
                        UrlGeneratorInterface::ABSOLUTE_URL
                    )
                );

                $personalizedContent .= $trackingPixel;

                $email = (new Email())
                    ->from('no-reply@monsite.com')
                    ->to($subscriber->getEmail())
                    ->subject($subject)
                    ->html($personalizedContent);

                try {
                    $mailer->send($email);
                    $count++;
                } catch (\Exception $e) {
                    continue;
                }
            }

            $campaign->setRecipientCount($count);
            $em->flush();

            $this->addFlash('success', "✉️ Newsletter envoyée à {$count} abonnés !");
            return $this->redirectToRoute('admin_newsletter_index');
        }

        return $this->render('admin/newsletter/compose.html.twig', [
            'firstname' => 'Jean',
            'unsubscribe_url' => 'https://monsite.com/newsletter/unsubscribe/12345',
        ]);
    }

    #[Route('/history', name: 'history')]
    public function history(EntityManagerInterface $em): Response
    {
        $messages = $em->getRepository(NewsletterCampaign::class)->findBy([], ['sentAt' => 'DESC']);

        return $this->render('admin/newsletter/history.html.twig', [
            'messages' => $messages,
        ]);
    }
}
