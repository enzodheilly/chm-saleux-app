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

/* menu_dropdown/membres_du_bureau/tresorier/tresorier.html.twig */
class __TwigTemplate_af34112dbe8071138caca8f68b93ab8a extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu_dropdown/membres_du_bureau/tresorier/tresorier.html.twig"));

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

        yield "Trésorier - CHM Saleux";
        
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/menu_dropdown/membres_du_bureau/tresorier/tresorier.css"), "html", null, true);
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
        <h1>Trésorier</h1>
        <p>Le garant de notre équilibre financier. Découvrez celui qui gère les budgets, les subventions et veille scrupuleusement à la bonne santé économique <span>de notre association.</span></p>
    </div>
</header>

<section class=\"tresorier-section\">
    <div class=\"container\">
        <h2 class=\"tresorier-title\">Présentation</h2>

        <div class=\"tresorier-content\">
            <div class=\"tresorier-photo\">
                <img src=\"";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/menu_dropdown/membres_du_bureau/tresorier/tresorier.jpg"), "html", null, true);
        yield "\" alt=\"Aurore Bertrand\">
            </div>

            <div class=\"tresorier-text\">
                <p>
                    Aurore Bertrand est trésorière du CHM Saleux depuis 2025.  
                    Elle est responsable de la gestion financière du club, veillant à la transparence et à la bonne tenue des comptes.
                </p>

                <p>
                    Grâce à son sérieux et son organisation, elle assure le suivi des budgets, des dépenses et des recettes, contribuant au bon fonctionnement et à la pérennité du club.
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
        return "menu_dropdown/membres_du_bureau/tresorier/tresorier.html.twig";
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

{% block title %}Trésorier - CHM Saleux{% endblock %}

{% block stylesheets %}
    <link rel=\"stylesheet\" href=\"{{ asset('css/menu_dropdown/membres_du_bureau/tresorier/tresorier.css') }}\">
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
        <h1>Trésorier</h1>
        <p>Le garant de notre équilibre financier. Découvrez celui qui gère les budgets, les subventions et veille scrupuleusement à la bonne santé économique <span>de notre association.</span></p>
    </div>
</header>

<section class=\"tresorier-section\">
    <div class=\"container\">
        <h2 class=\"tresorier-title\">Présentation</h2>

        <div class=\"tresorier-content\">
            <div class=\"tresorier-photo\">
                <img src=\"{{ asset('images/menu_dropdown/membres_du_bureau/tresorier/tresorier.jpg') }}\" alt=\"Aurore Bertrand\">
            </div>

            <div class=\"tresorier-text\">
                <p>
                    Aurore Bertrand est trésorière du CHM Saleux depuis 2025.  
                    Elle est responsable de la gestion financière du club, veillant à la transparence et à la bonne tenue des comptes.
                </p>

                <p>
                    Grâce à son sérieux et son organisation, elle assure le suivi des budgets, des dépenses et des recettes, contribuant au bon fonctionnement et à la pérennité du club.
                </p>
            </div>
        </div>
    </div>
</section>

{% endblock %}
", "menu_dropdown/membres_du_bureau/tresorier/tresorier.html.twig", "/Users/dheillyenzo/projet-chm/templates/menu_dropdown/membres_du_bureau/tresorier/tresorier.html.twig");
    }
}
