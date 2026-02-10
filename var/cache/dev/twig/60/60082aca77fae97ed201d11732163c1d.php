<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* 1_accueil/section4/faq/faq.html.twig */
class __TwigTemplate_d6f51400b83a38c6712ad735822ced71 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "1_accueil/section4/faq/faq.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "FAQ - CHM Saleux
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 7
        yield "\t";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
\t<link rel=\"stylesheet\" href=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/accueil/section4/faq/faq.css"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 11
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 12
        yield "
\t<header class=\"hero-header\">
\t\t<div class=\"overlay\"></div>
\t\t<div class=\"hero-content\">
\t\t\t<h1>Comment pouvons-nous
<span>vous aider ?</span></h1>
\t\t</div>
\t\t
\t</header>

<div class=\"hero-transition-image\">
    <img src=\"";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/faq.jpg"), "html", null, true);
        yield "\" alt=\"Transition image\">
</div>

\t<section class=\"test\">
\t    <p>
        Retrouvez ici les réponses aux questions les plus fréquentes posées par les membres 
        et futurs adhérents du CHM Saleux. Notre objectif est de vous guider et de vous aider 
        à trouver rapidement l’information dont vous avez besoin : abonnement, entraînement, 
        équipements, compétitions ou encore démarches pratiques.
    </p>
\t</section>

<div class=\"img-wrapper\">
    <div class=\"img\">
<img src=\"";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/ok.jpg"), "html", null, true);
        yield "\" style=\"display:none;\" id=\"preloadHero\">
    </div>
</div>

\t\t<header class=\"contact-header\">
    <h1>Foire Aux Questions</h1>
    <p>Trouvez ici les réponses à vos questions ou contactez-nous pour toute demande d'information.</p>
</header>


\t<!-- SECTION FAQ -->
\t<section class=\"faq-container\">
\t\t<div class=\"faq-sidebar\">
\t\t\t<h3>CHOISISSEZ<br>VOTRE
\t\t\t\t<span>SUJET</span>
\t\t\t</h3>
\t\t\t<ul>
\t\t\t\t<li class=\"active\" data-section=\"questions\">
\t\t\t\t\t<a href=\"#\">Questions Fréquemment Posées</a>
\t\t\t\t</li>
\t\t\t\t<li data-section=\"abonnement\">
\t\t\t\t\t<a href=\"#\">Mon Abonnement</a>
\t\t\t\t</li>
\t\t\t\t<li data-section=\"entrainement\">
\t\t\t\t\t<a href=\"#\">Entraînement & Coaching</a>
\t\t\t\t</li>
\t\t\t\t<li data-section=\"installations\">
\t\t\t\t\t<a href=\"#\">Installations</a>
\t\t\t\t</li>
\t\t\t\t<li data-section=\"competition\">
\t\t\t\t\t<a href=\"#\">Compétition & Événements</a>
\t\t\t\t</li>
\t\t\t\t<li data-section=\"autres\">
\t\t\t\t\t<a href=\"#\">Autres</a>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</div>

\t\t<!-- SECTION : Questions fréquentes -->
\t\t<div class=\"faq-content\" data-section=\"questions\">
\t\t\t<h2>Questions Fréquemment Posées</h2>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Faut-il une expérience avant de s’inscrire ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Pas du tout ! Le CHM Saleux accueille les débutants comme les confirmés. Nos coachs vous accompagnent selon votre niveau.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Puis-je faire une séance d’essai ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, une séance d’essai gratuite est disponible sur rendez-vous. C’est idéal pour découvrir le club et l’ambiance.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Y a-t-il des coachs disponibles tout le temps ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Un coach diplômé est présent sur les horaires principaux pour encadrer, conseiller et garantir la sécurité des pratiquants.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Les femmes peuvent-elles s’inscrire ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Bien sûr ! De nombreuses adhérentes s’entraînent régulièrement au CHM Saleux dans une ambiance respectueuse et motivante.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Proposez-vous des tarifs étudiants ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, des réductions sont disponibles pour les étudiants et les jeunes de moins de 21 ans.</div>
\t\t\t</div>
\t\t</div>

\t\t<!-- SECTION : Mon Abonnement -->
\t\t<div class=\"faq-content\" data-section=\"abonnement\" style=\"display:none;\">
\t\t\t<h2>Mon Abonnement</h2>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Quels abonnements proposez-vous ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Nous proposons deux formules principales :
\t\t\t\t\t<br>• Loisir Musculation & Haltérophilie<br>• Compétition (8-13 ans, 14-20 ans, +21 ans)</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Puis-je mettre mon abonnement en pause ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, il est possible de suspendre votre abonnement pour une durée minimale d’un mois (maladie, vacances, etc.).</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Quels moyens de paiement acceptez-vous ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Carte bancaire, espèces et prélèvements automatiques sont acceptés pour les abonnements annuels.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Puis-je changer de formule en cours d’année ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, il est possible de passer d’un abonnement Loisir à un abonnement Compétition sur simple demande.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Les licences sont-elles incluses dans le tarif ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Les licences fédérales sont incluses pour les adhérents Compétition et en option pour les adhérents Loisir.</div>
\t\t\t</div>
\t\t</div>

\t\t<!-- SECTION : Entraînement & Coaching -->
\t\t<div class=\"faq-content\" data-section=\"entrainement\" style=\"display:none;\">
\t\t\t<h2>Entraînement & Coaching</h2>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Les coachs sont-ils diplômés ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, tous nos coachs sont diplômés d’État et formés à l’encadrement en musculation et en haltérophilie.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Proposez-vous des programmes personnalisés ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, un programme sur mesure peut être établi selon vos objectifs : prise de masse, perte de poids, force, compétition, etc.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Puis-je m’entraîner seul ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, les adhérents Loisir ont accès libre à la salle pendant les horaires d’ouverture pour un entraînement autonome.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Comment se déroule une séance d’haltérophilie ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Une séance comprend un échauffement, un travail technique (arraché / épaulé-jeté) et un renforcement musculaire complémentaire.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Puis-je suivre mes performances ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, nous proposons des suivis personnalisés et vous pouvez utiliser vos montres ou applications connectées.</div>
\t\t\t</div>
\t\t</div>

\t\t<!-- SECTION : Installations -->
\t\t<div class=\"faq-content\" data-section=\"installations\" style=\"display:none;\">
\t\t\t<h2>Installations</h2>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Quels équipements sont disponibles ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Racks, barres olympiques, haltères, bancs, kettlebells, machines guidées et un espace cardio complet.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Avez-vous une zone d’haltérophilie dédiée ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, nous disposons de plateformes officielles avec barres et disques adaptés à la compétition.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Disposez-vous de vestiaires et douches ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, des vestiaires hommes/femmes séparés, douches, casiers et un espace détente sont à votre disposition.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Puis-je venir avec un ami non adhérent ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, nous proposons un pass découverte pour venir s’entraîner avec un ami occasionnellement.</div>
\t\t\t</div>
\t\t</div>

\t\t<!-- SECTION : Compétition -->
\t\t<div class=\"faq-content\" data-section=\"competition\" style=\"display:none;\">
\t\t\t<h2>Compétition & Événements</h2>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Organisez-vous des compétitions ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, le CHM Saleux participe à de nombreuses compétitions régionales et nationales d’haltérophilie.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Y a-t-il un suivi spécifique pour les athlètes ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, nos coachs accompagnent les athlètes tout au long de la saison avec une préparation adaptée.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Faites-vous des événements internes ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, des challenges, portes ouvertes et initiations sont régulièrement organisés pour la communauté du club.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Puis-je assister à une compétition sans participer ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Bien sûr ! Les spectateurs sont toujours les bienvenus pour encourager les athlètes du CHM.</div>
\t\t\t</div>
\t\t</div>

\t\t<!-- SECTION : Autres -->
\t\t<div class=\"faq-content\" data-section=\"autres\" style=\"display:none;\">
\t\t\t<h2>Autres</h2>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Comment contacter le CHM Saleux ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Vous pouvez nous joindre via Instagram, Facebook, WhatsApp ou directement à la salle.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Où se situe le club ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Le CHM Saleux se situe à Saleux (près d’Amiens), avec un parking gratuit pour les membres.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Proposez-vous des stages ou ateliers ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, nous organisons des stages techniques et des journées de perfectionnement tout au long de l’année.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Puis-je louer la salle pour un événement ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Sous certaines conditions, il est possible de privatiser la salle pour un stage ou une démonstration.</div>
\t\t\t</div>
\t\t</div>
\t</section>


\t<!-- SECTION CONTACT STYLE BASIC-FIT -->
\t<section class=\"faq-contact-section basicfit-style\">
\t\t<div class=\"faq-contact-wrapper\">
\t\t\t<h2>VOTRE QUESTION N'EST PAS ICI ?</h2>
\t\t\t<p>Alors contactez-nous et nous serons heureux de vous aider.</p>

\t\t\t<div
\t\t\t\tclass=\"faq-contact-grid\">
\t\t\t\t<!-- Elios Live Chat -->
\t\t\t\t<div class=\"contact-option\">
\t\t\t\t\t<a href=\"/elios\" target=\"_blank\" rel=\"noopener noreferrer\">
\t\t\t\t\t\t<div class=\"icon\">
\t\t\t\t\t\t\t<img src=\"";
        // line 309
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/accueil/section4/faq/ai-bot.png"), "html", null, true);
        yield "\" alt=\"Elios Bot IA\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<h3>Live chat (Elios)</h3>
\t\t\t\t\t\t<span>Disponible 24h/24 🤖</span>
\t\t\t\t\t</a>
\t\t\t\t</div>

\t\t\t\t<!-- WhatsApp -->
\t\t\t\t<div class=\"contact-option\">
\t\t\t\t\t<a href=\"https://chat.whatsapp.com/TON_CODE_DE_GROUPE\" target=\"_blank\" rel=\"noopener noreferrer\">
\t\t\t\t\t\t<div class=\"icon\">
\t\t\t\t\t\t\t<img src=\"";
        // line 320
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/accueil/section4/faq/whatsapp1.png"), "html", null, true);
        yield "\" alt=\"WhatsApp\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<h3>WhatsApp</h3>
\t\t\t\t\t\t<span>Réponse rapide aux horaires du club</span>
\t\t\t\t\t</a>
\t\t\t\t</div>

\t\t\t\t<!-- Facebook -->
\t\t\t\t<div class=\"contact-option\">
\t\t\t\t\t<a href=\"https://www.facebook.com/chmsaleux1/\" target=\"_blank\" rel=\"noopener noreferrer\">
\t\t\t\t\t\t<div class=\"icon\">
\t\t\t\t\t\t\t<img src=\"";
        // line 331
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/accueil/section4/faq/facebook1.png"), "html", null, true);
        yield "\" alt=\"Facebook\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<h3>Facebook</h3>
\t\t\t\t\t\t<span>Réponse sous 2 jours</span>
\t\t\t\t\t</a>
\t\t\t\t</div>

\t\t\t\t<!-- Instagram -->
\t\t\t\t<div class=\"contact-option\">
\t\t\t\t\t<a href=\"https://www.instagram.com/chmsaleux/\" target=\"_blank\" rel=\"noopener noreferrer\">
\t\t\t\t\t\t<div class=\"icon\">
\t\t\t\t\t\t\t<img src=\"";
        // line 342
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/accueil/section4/faq/instagram1.png"), "html", null, true);
        yield "\" alt=\"Instagram\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<h3>Instagram</h3>
\t\t\t\t\t\t<span>Suivez-nous & écrivez en DM</span>
\t\t\t\t\t</a>
\t\t\t\t</div>

\t\t\t\t<!-- Formulaire -->
\t\t\t\t<div class=\"contact-option\">
\t\t\t\t\t<a href=\"";
        // line 351
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("contact");
        yield "\" target=\"_blank\" rel=\"noopener noreferrer\">
\t\t\t\t\t\t<div class=\"icon\">
\t\t\t\t\t\t\t<img src=\"";
        // line 353
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/accueil/section4/faq/envelope.png"), "html", null, true);
        yield "\" alt=\"Contact\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<h3>Envoyer un message</h3>
\t\t\t\t\t\t<span>Réponse sous 3 jours</span>
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</section>

\t <script src=\"";
        // line 363
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/accueil/section4/faq/faq.js"), "html", null, true);
        yield "\" defer></script>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "1_accueil/section4/faq/faq.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  489 => 363,  476 => 353,  471 => 351,  459 => 342,  445 => 331,  431 => 320,  417 => 309,  142 => 37,  125 => 23,  112 => 12,  102 => 11,  92 => 8,  87 => 7,  77 => 6,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}FAQ - CHM Saleux
{% endblock %}

{% block stylesheets %}
\t{{ parent() }}
\t<link rel=\"stylesheet\" href=\"{{ asset('css/accueil/section4/faq/faq.css') }}\">
{% endblock %}

{% block body %}

\t<header class=\"hero-header\">
\t\t<div class=\"overlay\"></div>
\t\t<div class=\"hero-content\">
\t\t\t<h1>Comment pouvons-nous
<span>vous aider ?</span></h1>
\t\t</div>
\t\t
\t</header>

<div class=\"hero-transition-image\">
    <img src=\"{{ asset('images/club/faq.jpg') }}\" alt=\"Transition image\">
</div>

\t<section class=\"test\">
\t    <p>
        Retrouvez ici les réponses aux questions les plus fréquentes posées par les membres 
        et futurs adhérents du CHM Saleux. Notre objectif est de vous guider et de vous aider 
        à trouver rapidement l’information dont vous avez besoin : abonnement, entraînement, 
        équipements, compétitions ou encore démarches pratiques.
    </p>
\t</section>

<div class=\"img-wrapper\">
    <div class=\"img\">
<img src=\"{{ asset('images/club/ok.jpg') }}\" style=\"display:none;\" id=\"preloadHero\">
    </div>
</div>

\t\t<header class=\"contact-header\">
    <h1>Foire Aux Questions</h1>
    <p>Trouvez ici les réponses à vos questions ou contactez-nous pour toute demande d'information.</p>
</header>


\t<!-- SECTION FAQ -->
\t<section class=\"faq-container\">
\t\t<div class=\"faq-sidebar\">
\t\t\t<h3>CHOISISSEZ<br>VOTRE
\t\t\t\t<span>SUJET</span>
\t\t\t</h3>
\t\t\t<ul>
\t\t\t\t<li class=\"active\" data-section=\"questions\">
\t\t\t\t\t<a href=\"#\">Questions Fréquemment Posées</a>
\t\t\t\t</li>
\t\t\t\t<li data-section=\"abonnement\">
\t\t\t\t\t<a href=\"#\">Mon Abonnement</a>
\t\t\t\t</li>
\t\t\t\t<li data-section=\"entrainement\">
\t\t\t\t\t<a href=\"#\">Entraînement & Coaching</a>
\t\t\t\t</li>
\t\t\t\t<li data-section=\"installations\">
\t\t\t\t\t<a href=\"#\">Installations</a>
\t\t\t\t</li>
\t\t\t\t<li data-section=\"competition\">
\t\t\t\t\t<a href=\"#\">Compétition & Événements</a>
\t\t\t\t</li>
\t\t\t\t<li data-section=\"autres\">
\t\t\t\t\t<a href=\"#\">Autres</a>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</div>

\t\t<!-- SECTION : Questions fréquentes -->
\t\t<div class=\"faq-content\" data-section=\"questions\">
\t\t\t<h2>Questions Fréquemment Posées</h2>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Faut-il une expérience avant de s’inscrire ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Pas du tout ! Le CHM Saleux accueille les débutants comme les confirmés. Nos coachs vous accompagnent selon votre niveau.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Puis-je faire une séance d’essai ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, une séance d’essai gratuite est disponible sur rendez-vous. C’est idéal pour découvrir le club et l’ambiance.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Y a-t-il des coachs disponibles tout le temps ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Un coach diplômé est présent sur les horaires principaux pour encadrer, conseiller et garantir la sécurité des pratiquants.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Les femmes peuvent-elles s’inscrire ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Bien sûr ! De nombreuses adhérentes s’entraînent régulièrement au CHM Saleux dans une ambiance respectueuse et motivante.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Proposez-vous des tarifs étudiants ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, des réductions sont disponibles pour les étudiants et les jeunes de moins de 21 ans.</div>
\t\t\t</div>
\t\t</div>

\t\t<!-- SECTION : Mon Abonnement -->
\t\t<div class=\"faq-content\" data-section=\"abonnement\" style=\"display:none;\">
\t\t\t<h2>Mon Abonnement</h2>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Quels abonnements proposez-vous ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Nous proposons deux formules principales :
\t\t\t\t\t<br>• Loisir Musculation & Haltérophilie<br>• Compétition (8-13 ans, 14-20 ans, +21 ans)</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Puis-je mettre mon abonnement en pause ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, il est possible de suspendre votre abonnement pour une durée minimale d’un mois (maladie, vacances, etc.).</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Quels moyens de paiement acceptez-vous ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Carte bancaire, espèces et prélèvements automatiques sont acceptés pour les abonnements annuels.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Puis-je changer de formule en cours d’année ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, il est possible de passer d’un abonnement Loisir à un abonnement Compétition sur simple demande.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Les licences sont-elles incluses dans le tarif ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Les licences fédérales sont incluses pour les adhérents Compétition et en option pour les adhérents Loisir.</div>
\t\t\t</div>
\t\t</div>

\t\t<!-- SECTION : Entraînement & Coaching -->
\t\t<div class=\"faq-content\" data-section=\"entrainement\" style=\"display:none;\">
\t\t\t<h2>Entraînement & Coaching</h2>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Les coachs sont-ils diplômés ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, tous nos coachs sont diplômés d’État et formés à l’encadrement en musculation et en haltérophilie.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Proposez-vous des programmes personnalisés ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, un programme sur mesure peut être établi selon vos objectifs : prise de masse, perte de poids, force, compétition, etc.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Puis-je m’entraîner seul ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, les adhérents Loisir ont accès libre à la salle pendant les horaires d’ouverture pour un entraînement autonome.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Comment se déroule une séance d’haltérophilie ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Une séance comprend un échauffement, un travail technique (arraché / épaulé-jeté) et un renforcement musculaire complémentaire.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Puis-je suivre mes performances ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, nous proposons des suivis personnalisés et vous pouvez utiliser vos montres ou applications connectées.</div>
\t\t\t</div>
\t\t</div>

\t\t<!-- SECTION : Installations -->
\t\t<div class=\"faq-content\" data-section=\"installations\" style=\"display:none;\">
\t\t\t<h2>Installations</h2>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Quels équipements sont disponibles ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Racks, barres olympiques, haltères, bancs, kettlebells, machines guidées et un espace cardio complet.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Avez-vous une zone d’haltérophilie dédiée ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, nous disposons de plateformes officielles avec barres et disques adaptés à la compétition.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Disposez-vous de vestiaires et douches ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, des vestiaires hommes/femmes séparés, douches, casiers et un espace détente sont à votre disposition.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Puis-je venir avec un ami non adhérent ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, nous proposons un pass découverte pour venir s’entraîner avec un ami occasionnellement.</div>
\t\t\t</div>
\t\t</div>

\t\t<!-- SECTION : Compétition -->
\t\t<div class=\"faq-content\" data-section=\"competition\" style=\"display:none;\">
\t\t\t<h2>Compétition & Événements</h2>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Organisez-vous des compétitions ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, le CHM Saleux participe à de nombreuses compétitions régionales et nationales d’haltérophilie.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Y a-t-il un suivi spécifique pour les athlètes ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, nos coachs accompagnent les athlètes tout au long de la saison avec une préparation adaptée.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Faites-vous des événements internes ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, des challenges, portes ouvertes et initiations sont régulièrement organisés pour la communauté du club.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Puis-je assister à une compétition sans participer ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Bien sûr ! Les spectateurs sont toujours les bienvenus pour encourager les athlètes du CHM.</div>
\t\t\t</div>
\t\t</div>

\t\t<!-- SECTION : Autres -->
\t\t<div class=\"faq-content\" data-section=\"autres\" style=\"display:none;\">
\t\t\t<h2>Autres</h2>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Comment contacter le CHM Saleux ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Vous pouvez nous joindre via Instagram, Facebook, WhatsApp ou directement à la salle.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Où se situe le club ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Le CHM Saleux se situe à Saleux (près d’Amiens), avec un parking gratuit pour les membres.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Proposez-vous des stages ou ateliers ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Oui, nous organisons des stages techniques et des journées de perfectionnement tout au long de l’année.</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<div class=\"faq-question\">Puis-je louer la salle pour un événement ?
\t\t\t\t\t<span>+</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"faq-answer\">Sous certaines conditions, il est possible de privatiser la salle pour un stage ou une démonstration.</div>
\t\t\t</div>
\t\t</div>
\t</section>


\t<!-- SECTION CONTACT STYLE BASIC-FIT -->
\t<section class=\"faq-contact-section basicfit-style\">
\t\t<div class=\"faq-contact-wrapper\">
\t\t\t<h2>VOTRE QUESTION N'EST PAS ICI ?</h2>
\t\t\t<p>Alors contactez-nous et nous serons heureux de vous aider.</p>

\t\t\t<div
\t\t\t\tclass=\"faq-contact-grid\">
\t\t\t\t<!-- Elios Live Chat -->
\t\t\t\t<div class=\"contact-option\">
\t\t\t\t\t<a href=\"/elios\" target=\"_blank\" rel=\"noopener noreferrer\">
\t\t\t\t\t\t<div class=\"icon\">
\t\t\t\t\t\t\t<img src=\"{{ asset('images/accueil/section4/faq/ai-bot.png') }}\" alt=\"Elios Bot IA\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<h3>Live chat (Elios)</h3>
\t\t\t\t\t\t<span>Disponible 24h/24 🤖</span>
\t\t\t\t\t</a>
\t\t\t\t</div>

\t\t\t\t<!-- WhatsApp -->
\t\t\t\t<div class=\"contact-option\">
\t\t\t\t\t<a href=\"https://chat.whatsapp.com/TON_CODE_DE_GROUPE\" target=\"_blank\" rel=\"noopener noreferrer\">
\t\t\t\t\t\t<div class=\"icon\">
\t\t\t\t\t\t\t<img src=\"{{ asset('images/accueil/section4/faq/whatsapp1.png') }}\" alt=\"WhatsApp\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<h3>WhatsApp</h3>
\t\t\t\t\t\t<span>Réponse rapide aux horaires du club</span>
\t\t\t\t\t</a>
\t\t\t\t</div>

\t\t\t\t<!-- Facebook -->
\t\t\t\t<div class=\"contact-option\">
\t\t\t\t\t<a href=\"https://www.facebook.com/chmsaleux1/\" target=\"_blank\" rel=\"noopener noreferrer\">
\t\t\t\t\t\t<div class=\"icon\">
\t\t\t\t\t\t\t<img src=\"{{ asset('images/accueil/section4/faq/facebook1.png') }}\" alt=\"Facebook\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<h3>Facebook</h3>
\t\t\t\t\t\t<span>Réponse sous 2 jours</span>
\t\t\t\t\t</a>
\t\t\t\t</div>

\t\t\t\t<!-- Instagram -->
\t\t\t\t<div class=\"contact-option\">
\t\t\t\t\t<a href=\"https://www.instagram.com/chmsaleux/\" target=\"_blank\" rel=\"noopener noreferrer\">
\t\t\t\t\t\t<div class=\"icon\">
\t\t\t\t\t\t\t<img src=\"{{ asset('images/accueil/section4/faq/instagram1.png') }}\" alt=\"Instagram\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<h3>Instagram</h3>
\t\t\t\t\t\t<span>Suivez-nous & écrivez en DM</span>
\t\t\t\t\t</a>
\t\t\t\t</div>

\t\t\t\t<!-- Formulaire -->
\t\t\t\t<div class=\"contact-option\">
\t\t\t\t\t<a href=\"{{ path('contact') }}\" target=\"_blank\" rel=\"noopener noreferrer\">
\t\t\t\t\t\t<div class=\"icon\">
\t\t\t\t\t\t\t<img src=\"{{ asset('images/accueil/section4/faq/envelope.png') }}\" alt=\"Contact\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<h3>Envoyer un message</h3>
\t\t\t\t\t\t<span>Réponse sous 3 jours</span>
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</section>

\t <script src=\"{{ asset('js/accueil/section4/faq/faq.js') }}\" defer></script>

{% endblock %}
", "1_accueil/section4/faq/faq.html.twig", "/Users/dheillyenzo/projet-chm/templates/1_accueil/section4/faq/faq.html.twig");
    }
}
