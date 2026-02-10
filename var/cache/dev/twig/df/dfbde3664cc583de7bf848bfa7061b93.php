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

/* menu_dropdown/services_du_club/cours_collectifs/cours_collectifs.html.twig */
class __TwigTemplate_f5d1c3dd2da5c8a935d711ad1b7dfee2 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu_dropdown/services_du_club/cours_collectifs/cours_collectifs.html.twig"));

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

        yield "Cours Collectifs - CHM Saleux";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        yield "    <link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/menu_dropdown/services_du_club/cours_collectifs/cours_collectifs.css"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 10
        yield "
<header class=\"hero-header\">
    <div class=\"overlay\"></div>

        <a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\" class=\"back-button\">
         <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2.5\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15 19l-7-7 7-7\" />
         </svg>
         Home
    </a>

    <!-- Image diagonale sur la droite -->
    <div class=\"hero-diagonal-image\">
        <img src=\"";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/menu_dropdown/services_du_club/cours_collectifs/cours-co.jpg"), "html", null, true);
        yield "\" alt=\"Image Musculation Club\">
    </div>

    <!-- Contenu texte -->
    <div class=\"hero-content\">
        <h1>Cours Collectifs</h1>
        <p>Vivez l'expérience du sport à plusieurs. Retrouvez ici les horaires, la description des séances et l'énergie nécessaire pour progresser <span>à chaque entraînement.</span></p>
    </div>
</header>   

<section class=\"cours-section\">
    <div class=\"container cours-flex\">

        <!-- IMAGE À GAUCHE -->
        <div class=\"trdc-silhouette\">
            <div class=\"text-wall\">
                COURS COLLECTIFS<br>
                COURS COLLECTIFS<br>
                COURS COLLECTIFS<br>
                COURS COLLECTIFS<br>
                COURS COLLECTIFS
            </div>

            <img src=\"";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/menu_dropdown/services_du_club/cours_collectifs/12.jpg"), "html", null, true);
        yield "\"
                 alt=\"Silhouette cours collectifs\">
        </div>

        <!-- TEXTE À DROITE -->
        <div class=\"cours-text\">
            <h2 class=\"cours-title\">nos cours collectifs</h2>

            <p class=\"cours-intro\">
                Nos cours collectifs sont conçus pour motiver chacun à se dépasser dans un environnement convivial.
                Que vous soyez débutant ou sportif confirmé, vous trouverez le cours adapté à votre niveau et à vos objectifs.
            </p>

            <p>
                Du fitness au renforcement musculaire, en passant par le bien-être et le stretching, 
                nos instructeurs qualifiés vous accompagnent pour progresser en toute sécurité.
            </p>
        </div>

    </div>
</section>

<section class=\"coach-section\">
    <div class=\"container coach-flex\">

        <!-- Texte à gauche -->
        <div class=\"coach-text\">
            <h2>notre coach</h2>
            <p>
                Ema est notre coach pour les cours collectifs. Avec plusieurs années d'expérience dans le fitness et le bien-être, 
                elle sait motiver chaque participant et adapter les séances selon votre niveau.
            </p>
            <p>
                Sa philosophie : rendre chaque séance dynamique et accessible, tout en vous aidant à atteindre vos objectifs. 
                Cardio, renforcement ou stretching, Ema vous accompagne avec énergie et sourire !
            </p>
        </div>

        <!-- Photo à droite -->
        <div class=\"coach-img\">
            <img src=\"";
        // line 86
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/menu_dropdown/services_du_club/cours_collectifs/3.jpg"), "html", null, true);
        yield "\" 
                 alt=\"Coach Ema\">
        </div>

    </div>
</section>

<!-- NOUVELLE SECTION INSCRIPTION -->
<section class=\"inscription-section\">
    <div class=\"container inscription-content\">
        <h2>Vous souhaitez vous inscrire ?</h2>
        <p>
            Rejoignez nos cours collectifs dès aujourd'hui et profitez d'une séance gratuite pour découvrir l'ambiance motivante de notre club.
        </p>
        <p>
            Les inscriptions se font auprès des membres du bureau ou via notre <a href=\"https://chat.whatsapp.com/TON-LIEN-WHATSAPP\" target=\"_blank\" rel=\"noopener noreferrer\">groupe WhatsApp</a>.
        </p>
    </div>
</section>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "menu_dropdown/services_du_club/cours_collectifs/cours_collectifs.html.twig";
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
        return array (  194 => 86,  151 => 46,  125 => 23,  113 => 14,  107 => 10,  97 => 9,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Cours Collectifs - CHM Saleux{% endblock %}

{% block stylesheets %}
    <link rel=\"stylesheet\" href=\"{{ asset('css/menu_dropdown/services_du_club/cours_collectifs/cours_collectifs.css') }}\">
{% endblock %}

{% block body %}

<header class=\"hero-header\">
    <div class=\"overlay\"></div>

        <a href=\"{{ path('home') }}\" class=\"back-button\">
         <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2.5\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15 19l-7-7 7-7\" />
         </svg>
         Home
    </a>

    <!-- Image diagonale sur la droite -->
    <div class=\"hero-diagonal-image\">
        <img src=\"{{ asset('images/menu_dropdown/services_du_club/cours_collectifs/cours-co.jpg') }}\" alt=\"Image Musculation Club\">
    </div>

    <!-- Contenu texte -->
    <div class=\"hero-content\">
        <h1>Cours Collectifs</h1>
        <p>Vivez l'expérience du sport à plusieurs. Retrouvez ici les horaires, la description des séances et l'énergie nécessaire pour progresser <span>à chaque entraînement.</span></p>
    </div>
</header>   

<section class=\"cours-section\">
    <div class=\"container cours-flex\">

        <!-- IMAGE À GAUCHE -->
        <div class=\"trdc-silhouette\">
            <div class=\"text-wall\">
                COURS COLLECTIFS<br>
                COURS COLLECTIFS<br>
                COURS COLLECTIFS<br>
                COURS COLLECTIFS<br>
                COURS COLLECTIFS
            </div>

            <img src=\"{{ asset('images/menu_dropdown/services_du_club/cours_collectifs/12.jpg') }}\"
                 alt=\"Silhouette cours collectifs\">
        </div>

        <!-- TEXTE À DROITE -->
        <div class=\"cours-text\">
            <h2 class=\"cours-title\">nos cours collectifs</h2>

            <p class=\"cours-intro\">
                Nos cours collectifs sont conçus pour motiver chacun à se dépasser dans un environnement convivial.
                Que vous soyez débutant ou sportif confirmé, vous trouverez le cours adapté à votre niveau et à vos objectifs.
            </p>

            <p>
                Du fitness au renforcement musculaire, en passant par le bien-être et le stretching, 
                nos instructeurs qualifiés vous accompagnent pour progresser en toute sécurité.
            </p>
        </div>

    </div>
</section>

<section class=\"coach-section\">
    <div class=\"container coach-flex\">

        <!-- Texte à gauche -->
        <div class=\"coach-text\">
            <h2>notre coach</h2>
            <p>
                Ema est notre coach pour les cours collectifs. Avec plusieurs années d'expérience dans le fitness et le bien-être, 
                elle sait motiver chaque participant et adapter les séances selon votre niveau.
            </p>
            <p>
                Sa philosophie : rendre chaque séance dynamique et accessible, tout en vous aidant à atteindre vos objectifs. 
                Cardio, renforcement ou stretching, Ema vous accompagne avec énergie et sourire !
            </p>
        </div>

        <!-- Photo à droite -->
        <div class=\"coach-img\">
            <img src=\"{{ asset('images/menu_dropdown/services_du_club/cours_collectifs/3.jpg') }}\" 
                 alt=\"Coach Ema\">
        </div>

    </div>
</section>

<!-- NOUVELLE SECTION INSCRIPTION -->
<section class=\"inscription-section\">
    <div class=\"container inscription-content\">
        <h2>Vous souhaitez vous inscrire ?</h2>
        <p>
            Rejoignez nos cours collectifs dès aujourd'hui et profitez d'une séance gratuite pour découvrir l'ambiance motivante de notre club.
        </p>
        <p>
            Les inscriptions se font auprès des membres du bureau ou via notre <a href=\"https://chat.whatsapp.com/TON-LIEN-WHATSAPP\" target=\"_blank\" rel=\"noopener noreferrer\">groupe WhatsApp</a>.
        </p>
    </div>
</section>

{% endblock %}

", "menu_dropdown/services_du_club/cours_collectifs/cours_collectifs.html.twig", "/Users/dheillyenzo/projet-chm/templates/menu_dropdown/services_du_club/cours_collectifs/cours_collectifs.html.twig");
    }
}
