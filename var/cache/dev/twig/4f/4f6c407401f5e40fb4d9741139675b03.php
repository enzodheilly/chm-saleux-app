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

/* nos_pratiques/halterophilie.html.twig */
class __TwigTemplate_9a0f006dc0b38ed0ed8756dd4f45c61e extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "nos_pratiques/halterophilie.html.twig"));

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

        yield "Haltérophilie - CHM Saleux";
        
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/nos_pratiques/halterophilie.css"), "html", null, true);
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

    <!-- Image diagonale -->
    <div class=\"hero-diagonal-image\">
        <img src=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/nos_pratiques/halterophilie/1.jpg"), "html", null, true);
        yield "\" alt=\"Haltérophilie CHM Saleux\">
    </div>

    <!-- Texte de présentation -->
    <div class=\"hero-content\">
        <h1>HALTÉROPHILIE</h1>
        <p>Force, explosivité, technique : découvrez la discipline olympique du CHM Saleux.</p>
    </div>
</header>


<section class=\"practice-detail\">
    <div class=\"container\">
        
        <h1>Haltérophilie</h1>
        <p class=\"practice-intro\">
            Notre espace haltérophilie est conçu pour offrir des conditions d’entraînement dignes des salles spécialisées.
            Les athlètes, du débutant au compétiteur, y trouvent un matériel adapté et des entraîneurs qualifiés.
        </p>

        <!-- Zone Podiums -->
        <section class=\"zone-section\" id=\"podiums\">
            <h2>Podiums & Plateformes</h2>
            <img src=\"";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/halterophilie/podiums.jpg"), "html", null, true);
        yield "\" alt=\"Podiums Haltérophilie\">

            <h3>Équipements :</h3>
            <ul>
                <li>3 à 5 plateformes d’haltérophilie</li>
                <li>Dalles amortissantes</li>
                <li>Espace sécurisé pour les barres tombées</li>
            </ul>

            <h3>Travail possible :</h3>
            <ul>
                <li>Arraché (Snatch)</li>
                <li>Épaulé-jeté (Clean & Jerk)</li>
                <li>Tirages techniques</li>
                <li>Travail d’explosivité</li>
            </ul>

            <p class=\"zone-text\">
                Un espace conçu pour absorber les chocs et permettre un entraînement technique et sécurisé.
            </p>
        </section>


        <!-- Zone Barres & Disques -->
        <section class=\"zone-section\" id=\"barres\">
            <h2>Barres & Disques</h2>
            <img src=\"";
        // line 65
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/halterophilie/barres.jpg"), "html", null, true);
        yield "\" alt=\"Barres Haltérophilie\">

            <h3>Équipements :</h3>
            <ul>
                <li>Barres olympiques hommes (20 kg)</li>
                <li>Barres olympiques femmes (15 kg)</li>
                <li>Barres techniques aluminium</li>
                <li>Disques bumper (5 à 25 kg)</li>
                <li>Disques compétition IWF</li>
            </ul>

            <h3>Travail possible :</h3>
            <ul>
                <li>Progressions techniques</li>
                <li>Travail de charge contrôlée</li>
                <li>Préparation à la compétition</li>
            </ul>

            <p class=\"zone-text\">
                Le matériel officiel garantit une progression fluide et une préparation optimale aux compétitions.
            </p>
        </section>


        <!-- Zone Accessoires -->
        <section class=\"zone-section\" id=\"accessoires\">
            <h2>Accessoires & Renfo</h2>
            <img src=\"";
        // line 92
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/halterophilie/accessoires.jpg"), "html", null, true);
        yield "\" alt=\"Accessoires Haltérophilie\">

            <h3>Équipements :</h3>
            <ul>
                <li>Ceintures de maintien</li>
                <li>Blocks d’arraché</li>
                <li>Bandes de poignets / genoux</li>
                <li>Bancs et supports techniques</li>
            </ul>

            <h3>Travail possible :</h3>
            <ul>
                <li>Renforcement spécifique</li>
                <li>Mobilité & stabilité</li>
                <li>Préparation physique générale</li>
            </ul>

            <p class=\"zone-text\">
                Idéal pour travailler la technique, la mobilité et le renforcement spécifique lié à l’haltérophilie.
            </p>
        </section>
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
        return "nos_pratiques/halterophilie.html.twig";
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
        return array (  200 => 92,  170 => 65,  141 => 39,  115 => 16,  107 => 10,  97 => 9,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Haltérophilie - CHM Saleux{% endblock %}

{% block stylesheets %}
    <link rel=\"stylesheet\" href=\"{{ asset('css/nos_pratiques/halterophilie.css') }}\">
{% endblock %}

{% block body %}

<header class=\"hero-header\">
    <div class=\"overlay\"></div>

    <!-- Image diagonale -->
    <div class=\"hero-diagonal-image\">
        <img src=\"{{ asset('images/nos_pratiques/halterophilie/1.jpg') }}\" alt=\"Haltérophilie CHM Saleux\">
    </div>

    <!-- Texte de présentation -->
    <div class=\"hero-content\">
        <h1>HALTÉROPHILIE</h1>
        <p>Force, explosivité, technique : découvrez la discipline olympique du CHM Saleux.</p>
    </div>
</header>


<section class=\"practice-detail\">
    <div class=\"container\">
        
        <h1>Haltérophilie</h1>
        <p class=\"practice-intro\">
            Notre espace haltérophilie est conçu pour offrir des conditions d’entraînement dignes des salles spécialisées.
            Les athlètes, du débutant au compétiteur, y trouvent un matériel adapté et des entraîneurs qualifiés.
        </p>

        <!-- Zone Podiums -->
        <section class=\"zone-section\" id=\"podiums\">
            <h2>Podiums & Plateformes</h2>
            <img src=\"{{ asset('images/halterophilie/podiums.jpg') }}\" alt=\"Podiums Haltérophilie\">

            <h3>Équipements :</h3>
            <ul>
                <li>3 à 5 plateformes d’haltérophilie</li>
                <li>Dalles amortissantes</li>
                <li>Espace sécurisé pour les barres tombées</li>
            </ul>

            <h3>Travail possible :</h3>
            <ul>
                <li>Arraché (Snatch)</li>
                <li>Épaulé-jeté (Clean & Jerk)</li>
                <li>Tirages techniques</li>
                <li>Travail d’explosivité</li>
            </ul>

            <p class=\"zone-text\">
                Un espace conçu pour absorber les chocs et permettre un entraînement technique et sécurisé.
            </p>
        </section>


        <!-- Zone Barres & Disques -->
        <section class=\"zone-section\" id=\"barres\">
            <h2>Barres & Disques</h2>
            <img src=\"{{ asset('images/halterophilie/barres.jpg') }}\" alt=\"Barres Haltérophilie\">

            <h3>Équipements :</h3>
            <ul>
                <li>Barres olympiques hommes (20 kg)</li>
                <li>Barres olympiques femmes (15 kg)</li>
                <li>Barres techniques aluminium</li>
                <li>Disques bumper (5 à 25 kg)</li>
                <li>Disques compétition IWF</li>
            </ul>

            <h3>Travail possible :</h3>
            <ul>
                <li>Progressions techniques</li>
                <li>Travail de charge contrôlée</li>
                <li>Préparation à la compétition</li>
            </ul>

            <p class=\"zone-text\">
                Le matériel officiel garantit une progression fluide et une préparation optimale aux compétitions.
            </p>
        </section>


        <!-- Zone Accessoires -->
        <section class=\"zone-section\" id=\"accessoires\">
            <h2>Accessoires & Renfo</h2>
            <img src=\"{{ asset('images/halterophilie/accessoires.jpg') }}\" alt=\"Accessoires Haltérophilie\">

            <h3>Équipements :</h3>
            <ul>
                <li>Ceintures de maintien</li>
                <li>Blocks d’arraché</li>
                <li>Bandes de poignets / genoux</li>
                <li>Bancs et supports techniques</li>
            </ul>

            <h3>Travail possible :</h3>
            <ul>
                <li>Renforcement spécifique</li>
                <li>Mobilité & stabilité</li>
                <li>Préparation physique générale</li>
            </ul>

            <p class=\"zone-text\">
                Idéal pour travailler la technique, la mobilité et le renforcement spécifique lié à l’haltérophilie.
            </p>
        </section>
    </div>
</section>

{% endblock %}
", "nos_pratiques/halterophilie.html.twig", "/Users/dheillyenzo/projet-chm/templates/nos_pratiques/halterophilie.html.twig");
    }
}
