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

/* menu_dropdown/a_propos_de_notre_club/labels/index.html.twig */
class __TwigTemplate_4274d6ff3cef6d41e8bf3147c872796d extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu_dropdown/a_propos_de_notre_club/labels/index.html.twig"));

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

        yield "Labels du Club - CHM Saleux";
        
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/menu_dropdown/a_propos_de_notre_club/labels/index.css"), "html", null, true);
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/menu_dropdown/a_propos_de_notre_club/labels/1.jpg"), "html", null, true);
        yield "\" alt=\"Image Musculation Club\">
    </div>

    <!-- Contenu texte -->
<div class=\"hero-content\">
        <h1>Labels & Certifications</h1>
        <p>La reconnaissance de notre savoir-faire. De l'école d'haltérophilie au label Sport-Santé, découvrez les certifications qui valident notre engagement pédagogique auprès <span>de tous les publics.</span></p>
    </div>
</header>

<section class=\"labels-section\">
    <div class=\"container\">
        <h1 class=\"labels-title\">Nos labels actuels</h1>

        <p class=\"labels-intro\">
            Le CHM Saleux est fier de ses labels qui témoignent de la qualité de son encadrement, de ses formations et de son engagement pour la santé et le bien-être des pratiquants.
        </p>

        <div class=\"labels-list\">
            <ul>
                <li><strong>Label Club Formateur</strong> : reconnaissance de notre excellence dans la formation des jeunes haltérophiles.</li>
                <li><strong>Label École d'Haltérophilie</strong> : attestant de notre école structurée et adaptée aux différents niveaux.</li>
                <li><strong>Label Santé Musculation Loisir</strong> : pour les activités de remise en forme et de bien-être ouvertes à tous.</li>
                                <li><strong>Label Santé Musculation Bien-être</strong> : pour la promotion de la pratique sécurisée et adaptée de la musculation.</li>
            </ul>
        </div>

        <div class=\"labels-info\">
            <p>
                Ces labels sont délivrés par la Fédération Française d’Haltérophilie, Musculation, Force Athlétique et Culturisme (FFHM) et sont régulièrement contrôlés afin de garantir la qualité de nos programmes et de nos encadrants.
            </p>

            <p>
                Ils reflètent notre engagement à offrir un environnement sûr, formateur et agréable pour tous nos membres, que ce soit pour la performance, le loisir ou le bien-être.
            </p>
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
        return "menu_dropdown/a_propos_de_notre_club/labels/index.html.twig";
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

{% block title %}Labels du Club - CHM Saleux{% endblock %}

{% block stylesheets %}
    <link rel=\"stylesheet\" href=\"{{ asset('css/menu_dropdown/a_propos_de_notre_club/labels/index.css') }}\">
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
        <img src=\"{{ asset('images/menu_dropdown/a_propos_de_notre_club/labels/1.jpg') }}\" alt=\"Image Musculation Club\">
    </div>

    <!-- Contenu texte -->
<div class=\"hero-content\">
        <h1>Labels & Certifications</h1>
        <p>La reconnaissance de notre savoir-faire. De l'école d'haltérophilie au label Sport-Santé, découvrez les certifications qui valident notre engagement pédagogique auprès <span>de tous les publics.</span></p>
    </div>
</header>

<section class=\"labels-section\">
    <div class=\"container\">
        <h1 class=\"labels-title\">Nos labels actuels</h1>

        <p class=\"labels-intro\">
            Le CHM Saleux est fier de ses labels qui témoignent de la qualité de son encadrement, de ses formations et de son engagement pour la santé et le bien-être des pratiquants.
        </p>

        <div class=\"labels-list\">
            <ul>
                <li><strong>Label Club Formateur</strong> : reconnaissance de notre excellence dans la formation des jeunes haltérophiles.</li>
                <li><strong>Label École d'Haltérophilie</strong> : attestant de notre école structurée et adaptée aux différents niveaux.</li>
                <li><strong>Label Santé Musculation Loisir</strong> : pour les activités de remise en forme et de bien-être ouvertes à tous.</li>
                                <li><strong>Label Santé Musculation Bien-être</strong> : pour la promotion de la pratique sécurisée et adaptée de la musculation.</li>
            </ul>
        </div>

        <div class=\"labels-info\">
            <p>
                Ces labels sont délivrés par la Fédération Française d’Haltérophilie, Musculation, Force Athlétique et Culturisme (FFHM) et sont régulièrement contrôlés afin de garantir la qualité de nos programmes et de nos encadrants.
            </p>

            <p>
                Ils reflètent notre engagement à offrir un environnement sûr, formateur et agréable pour tous nos membres, que ce soit pour la performance, le loisir ou le bien-être.
            </p>
        </div>
    </div>
</section>

{% endblock %}
", "menu_dropdown/a_propos_de_notre_club/labels/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/menu_dropdown/a_propos_de_notre_club/labels/index.html.twig");
    }
}
