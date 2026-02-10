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

/* menu_dropdown/membres_du_bureau/membre_bureau/membre_bureau.html.twig */
class __TwigTemplate_67d31e96d44bf194dbabc598e9ce1125 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu_dropdown/membres_du_bureau/membre_bureau/membre_bureau.html.twig"));

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

        yield "Membres du Bureau - CHM Saleux";
        
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/menu_dropdown/membres_du_bureau/membre_bureau/membre_bureau.css"), "html", null, true);
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/menu_dropdown/services_du_club/evenements/1.jpg"), "html", null, true);
        yield "\" alt=\"Image Musculation Club\">
    </div>

    <!-- Contenu texte -->
<div class=\"hero-content\">
        <h1>Membres du Bureau</h1>
        <p>L'équipe dirigeante au complet. Au-delà des postes clés, découvrez l'ensemble des bénévoles qui œuvrent chaque jour pour organiser, décider et faire vivre <span>notre passion commune.</span></p>
    </div>
</header>

<section class=\"bureau-section\">
    <div class=\"container\">
        <h2 class=\"bureau-title\">MEMBRE DU BUREAU</h2>

        <div class=\"bureau-content\">
            <div class=\"bureau-photo\">
                <img src=\"";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/menu_dropdown/membres_du_bureau/membre_bureau/1.png"), "html", null, true);
        yield "\" alt=\"Marianne Boulanger-Bailleux CHM Saleux\">
            </div>

            <div class=\"bureau-text\">
                <p>
                    Marianne Boulanger-Bailleux est membre du bureau du CHM Saleux.  
                    Elle participe activement à la gestion et au fonctionnement du club, contribuant à la bonne organisation des activités et au suivi des membres.
                </p>

                <p>
                    Grâce à son engagement et sa disponibilité, Marianne assure un lien précieux entre les membres et l'équipe dirigeante, veillant au bon déroulement des événements et au maintien de l’esprit convivial du club.
                </p>
            </div>
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
        return "menu_dropdown/membres_du_bureau/membre_bureau/membre_bureau.html.twig";
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
        return array (  144 => 39,  125 => 23,  113 => 14,  107 => 10,  97 => 9,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Membres du Bureau - CHM Saleux{% endblock %}

{% block stylesheets %}
    <link rel=\"stylesheet\" href=\"{{ asset('css/menu_dropdown/membres_du_bureau/membre_bureau/membre_bureau.css') }}\">
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
        <img src=\"{{ asset('images/menu_dropdown/services_du_club/evenements/1.jpg') }}\" alt=\"Image Musculation Club\">
    </div>

    <!-- Contenu texte -->
<div class=\"hero-content\">
        <h1>Membres du Bureau</h1>
        <p>L'équipe dirigeante au complet. Au-delà des postes clés, découvrez l'ensemble des bénévoles qui œuvrent chaque jour pour organiser, décider et faire vivre <span>notre passion commune.</span></p>
    </div>
</header>

<section class=\"bureau-section\">
    <div class=\"container\">
        <h2 class=\"bureau-title\">MEMBRE DU BUREAU</h2>

        <div class=\"bureau-content\">
            <div class=\"bureau-photo\">
                <img src=\"{{ asset('images/menu_dropdown/membres_du_bureau/membre_bureau/1.png') }}\" alt=\"Marianne Boulanger-Bailleux CHM Saleux\">
            </div>

            <div class=\"bureau-text\">
                <p>
                    Marianne Boulanger-Bailleux est membre du bureau du CHM Saleux.  
                    Elle participe activement à la gestion et au fonctionnement du club, contribuant à la bonne organisation des activités et au suivi des membres.
                </p>

                <p>
                    Grâce à son engagement et sa disponibilité, Marianne assure un lien précieux entre les membres et l'équipe dirigeante, veillant au bon déroulement des événements et au maintien de l’esprit convivial du club.
                </p>
            </div>
        </div>
    </div>
</section>

{% endblock %}", "menu_dropdown/membres_du_bureau/membre_bureau/membre_bureau.html.twig", "/Users/dheillyenzo/projet-chm/templates/menu_dropdown/membres_du_bureau/membre_bureau/membre_bureau.html.twig");
    }
}
