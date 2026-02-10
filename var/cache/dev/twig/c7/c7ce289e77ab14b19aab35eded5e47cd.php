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

/* menu_dropdown/a_propos_de_notre_club/horaires/index.html.twig */
class __TwigTemplate_61795dd4fa5992eb46d627606a3564a1 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu_dropdown/a_propos_de_notre_club/horaires/index.html.twig"));

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

        yield "Horaires - CHM Saleux";
        
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
        yield "\t<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/menu_dropdown/a_propos_de_notre_club/horaires/index.css"), "html", null, true);
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/menu_dropdown/a_propos_de_notre_club/horaires/1.jpg"), "html", null, true);
        yield "\" alt=\"Image Musculation Club\">
    </div>

    <!-- Contenu texte -->
<div class=\"hero-content\">
        <h1>Nos Horaires</h1>
<p>
    Le rythme de notre vie associative. Retrouvez les créneaux d'ouverture assurés par nos bénévoles passionnés pour venir vous entraîner 
    <span>dans une ambiance conviviale.</span>
</p>    </div>
</header>

<section class=\"horaire-section\">
    <div class=\"container\">
        <h1 class=\"horaire-title\">Horaires du CHM Saleux</h1>

        <p class=\"horaire-intro\">
            Au CHM Saleux, vous pouvez vous entraîner aux horaires suivants.  
            Attention, notre club est géré par des bénévoles, et les horaires peuvent varier légèrement en fonction de leur disponibilité.
        </p>

        <div class=\"horaire-days\">
            <div class=\"horaire-day\">
                <h2>Lundi / Mercredi / Vendredi</h2>
                <p>10H - 12H / 16H - 20H</p>
            </div>

            <div class=\"horaire-day\">
                <h2>Mardi / Jeudi</h2>
                <p>10H - 12H / 16H - 19H30</p>
            </div>
        </div>

        <div class=\"horaire-info\">
            <p>
                La salle est fermée le week-end.  
                Lors des jours de compétition, la salle ferme exceptionnellement à 18H45 le vendredi afin de préparer l’installation du plateau de tirage et le matériel nécessaire pour la compétition du lendemain.  
                Ces compétitions ne se déroulent pas toujours à Saleux.
            </p>

            <p>
                En cas de fortes chutes de neige ou d’événements exceptionnels, restez connectés via notre groupe WhatsApp et nos réseaux sociaux, car des fermetures ponctuelles peuvent survenir.
            </p>

            <p>
                Nos horaires peuvent varier exceptionnellement en fonction de la disponibilité de nos bénévoles.  
                Nous vous remercions de votre compréhension.
            </p>

            <h3>Résumé des horaires :</h3>
            <ul>
                <li><strong>Lundi / Mercredi / Vendredi :</strong> 10H - 12H / 16H - 20H</li>
                <li><strong>Mardi / Jeudi :</strong> 10H - 12H / 16H - 19H30</li>
                <li><strong>Week-end :</strong> fermé</li>
            </ul>
        </div>
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
        return "menu_dropdown/a_propos_de_notre_club/horaires/index.html.twig";
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
        return array (  125 => 23,  113 => 14,  107 => 10,  97 => 9,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Horaires - CHM Saleux{% endblock %}

{% block stylesheets %}
\t<link rel=\"stylesheet\" href=\"{{ asset('css/menu_dropdown/a_propos_de_notre_club/horaires/index.css') }}\">
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
        <img src=\"{{ asset('images/menu_dropdown/a_propos_de_notre_club/horaires/1.jpg') }}\" alt=\"Image Musculation Club\">
    </div>

    <!-- Contenu texte -->
<div class=\"hero-content\">
        <h1>Nos Horaires</h1>
<p>
    Le rythme de notre vie associative. Retrouvez les créneaux d'ouverture assurés par nos bénévoles passionnés pour venir vous entraîner 
    <span>dans une ambiance conviviale.</span>
</p>    </div>
</header>

<section class=\"horaire-section\">
    <div class=\"container\">
        <h1 class=\"horaire-title\">Horaires du CHM Saleux</h1>

        <p class=\"horaire-intro\">
            Au CHM Saleux, vous pouvez vous entraîner aux horaires suivants.  
            Attention, notre club est géré par des bénévoles, et les horaires peuvent varier légèrement en fonction de leur disponibilité.
        </p>

        <div class=\"horaire-days\">
            <div class=\"horaire-day\">
                <h2>Lundi / Mercredi / Vendredi</h2>
                <p>10H - 12H / 16H - 20H</p>
            </div>

            <div class=\"horaire-day\">
                <h2>Mardi / Jeudi</h2>
                <p>10H - 12H / 16H - 19H30</p>
            </div>
        </div>

        <div class=\"horaire-info\">
            <p>
                La salle est fermée le week-end.  
                Lors des jours de compétition, la salle ferme exceptionnellement à 18H45 le vendredi afin de préparer l’installation du plateau de tirage et le matériel nécessaire pour la compétition du lendemain.  
                Ces compétitions ne se déroulent pas toujours à Saleux.
            </p>

            <p>
                En cas de fortes chutes de neige ou d’événements exceptionnels, restez connectés via notre groupe WhatsApp et nos réseaux sociaux, car des fermetures ponctuelles peuvent survenir.
            </p>

            <p>
                Nos horaires peuvent varier exceptionnellement en fonction de la disponibilité de nos bénévoles.  
                Nous vous remercions de votre compréhension.
            </p>

            <h3>Résumé des horaires :</h3>
            <ul>
                <li><strong>Lundi / Mercredi / Vendredi :</strong> 10H - 12H / 16H - 20H</li>
                <li><strong>Mardi / Jeudi :</strong> 10H - 12H / 16H - 19H30</li>
                <li><strong>Week-end :</strong> fermé</li>
            </ul>
        </div>
    </div>
</section>
{% endblock %}
", "menu_dropdown/a_propos_de_notre_club/horaires/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/menu_dropdown/a_propos_de_notre_club/horaires/index.html.twig");
    }
}
