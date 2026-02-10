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

/* ecole/index.html.twig */
class __TwigTemplate_e7c1acdbf90748a710445347810f07bd extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "ecole/index.html.twig"));

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

        yield "École d'Haltérophilie
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
        yield "\t<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/ecole/index.css"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 10
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 11
        yield "
\t<!-- HERO -->
<header class=\"hero-header\">
    <div class=\"hero-backgrounds\">
        <div class=\"hero-bg\" style=\"background-image: url('";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/bg2.jpg"), "html", null, true);
        yield "');\"></div>
        <div class=\"hero-bg\" style=\"background-image: url('";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/bg1.jpg"), "html", null, true);
        yield "');\"></div>
        <div class=\"hero-bg\" style=\"background-image: url('";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/bg3.jpg"), "html", null, true);
        yield "');\"></div>
    </div>
    
    <div class=\"hero-content\">
        <h1>L'ÉCOLE D'HALTÉROPHILIE</h1>
        <p>Toutes les infos sur nos entraînements, catégories et activités</p>
<a href=\"#entrainements\" class=\"cta-button\">Découvrir notre école</a>
</header>

\t<main>
\t\t<!-- SECTION 1 -->
\t\t<section id=\"entrainements\" class=\"section\">
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>LICENCES COMPÉTITION</h2>
\t\t\t\t<p>
\t\t\t\t\t<b>Catégories :</b>
\t\t\t\t\tU15, U17, U20, Séniors</p>
\t\t\t\t<p>
\t\t\t\t\t<b>Entraînements :</b>
\t\t\t\t\tLundi, Mercredi, Vendredi de 17h00 à 19h00</p>
\t\t\t\t<p>Nos athlètes bénéficient d’un suivi personnalisé avec des programmes adaptés à chaque catégorie, incluant la technique, la force et la préparation mentale.</p>
\t\t\t</div>
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/photo2.jpg"), "html", null, true);
        yield "\" alt=\"Compétition\">
\t\t\t</div>
\t\t</section>

\t\t<!-- SECTION 2 -->
\t\t<section class=\"section\">
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>U13 / DÉBUTANTS</h2>
\t\t\t\t<p>
\t\t\t\t\t<b>Catégorie :</b>
\t\t\t\t\tInitiation pour jeunes et débutants</p>
\t\t\t\t<p>
\t\t\t\t\t<b>Entraînements :</b>
\t\t\t\t\tLundi, Mercredi, Vendredi de 17h30 à 19h00</p>
\t\t\t\t<p>Cette section initie les plus jeunes aux bases de l’haltérophilie dans un environnement sécurisé et ludique, en mettant l’accent sur la posture et le respect des règles.</p>
\t\t\t</div>
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"";
        // line 57
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/photo3.jpg"), "html", null, true);
        yield "\" alt=\"Débutants\">
\t\t\t</div>
\t\t</section>

\t\t<!-- SECTION 3 -->
\t\t<section class=\"section\">
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>LICENCES LOISIR</h2>
\t\t\t\t<p>
\t\t\t\t\t<b>Catégorie :</b>
\t\t\t\t\tÉcole d’Haltérophilie et Initiation</p>
\t\t\t\t<p>
\t\t\t\t\t<b>Entraînements :</b>
\t\t\t\t\tMercredi de 17h30 à 19h00</p>
\t\t\t\t<p>Idéal pour ceux qui souhaitent pratiquer l’haltérophilie de manière ponctuelle, en découvrant la discipline sans pression de compétition.</p>
\t\t\t</div>
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/photo4.jpg"), "html", null, true);
        yield "\" alt=\"Loisir\">
\t\t\t</div>
\t\t</section>

\t\t<!-- NOUVELLE SECTION: Nos Coachs -->
\t\t<section class=\"section\">
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>NOS COACHS</h2>
\t\t\t\t<p>Notre équipe est composée de coachs diplômés et expérimentés, passionnés par la pédagogie et la performance. Chaque coach apporte un suivi personnalisé selon les besoins et les objectifs des élèves.</p>
\t\t\t\t<p>Ils supervisent la progression technique, la sécurité des mouvements et l’encouragement dans la pratique quotidienne.</p>
\t\t\t</div>
\t\t<div class=\"section-image\">
\t\t<div class=\"coach-wrapper\">
    <div class=\"coach-slider\">
        <button class=\"prev-btn\">‹</button>

        <div class=\"slides\">
            <img src=\"";
        // line 91
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/3.jpg"), "html", null, true);
        yield "\" alt=\"Coach 1\" data-name=\"Ema\">
            <img src=\"";
        // line 92
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/florian.jpg"), "html", null, true);
        yield "\" alt=\"Coach 2\" data-name=\"Florian\">
            <img src=\"";
        // line 93
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/jeanne.jpg"), "html", null, true);
        yield "\" alt=\"Coach 3\" data-name=\"Jeanne\">
\t\t\t<img src=\"";
        // line 94
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/robert.jpg"), "html", null, true);
        yield "\" alt=\"Coach 4\" data-name=\"Robert\">
        </div>

        <button class=\"next-btn\">›</button>
    </div>

\t<p id=\"coach-name\">Ema</p>
\t</div>
</div>

\t\t</section>

\t\t<!-- NOUVELLE SECTION: Nos Valeurs -->
\t\t<section class=\"section\">
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>NOS VALEURS</h2>
\t\t\t\t<p>Respect, discipline et persévérance sont les piliers de notre école. Nous valorisons le dépassement de soi dans un environnement bienveillant et stimulant.</p>
\t\t\t\t<p>Nous encourageons l’esprit d’équipe, le fair-play et la passion pour l’haltérophilie, quel que soit le niveau de pratique.</p>
\t\t\t</div>
\t\t\t<div class=\"section-image\">
<img src=\"";
        // line 114
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/valeur.jpg"), "html", null, true);
        yield "\" class=\"valeur-img\" alt=\"Valeurs\">
\t\t\t</div>
\t\t</section>

\t\t<!-- TABLE -->
\t\t<div class=\"table-container\">
\t\t\t<h2>CATÉGORIES D’ÂGE</h2>

\t\t\t<div class=\"modern-table\">
\t\t\t\t<div class=\"table-header\">
\t\t\t\t\t<div>Catégorie</div>
\t\t\t\t\t<div>Nom</div>
\t\t\t\t\t<div>Âge</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"table-row\">
\t\t\t\t\t<div>U10</div>
\t\t\t\t\t<div>Benjamin</div>
\t\t\t\t\t<div>7 à 10 ans</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"table-row\">
\t\t\t\t\t<div>U13</div>
\t\t\t\t\t<div>Minime</div>
\t\t\t\t\t<div>11 à 13 ans</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"table-row\">
\t\t\t\t\t<div>U15</div>
\t\t\t\t\t<div>Cadet 1</div>
\t\t\t\t\t<div>14 à 15 ans</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"table-row\">
\t\t\t\t\t<div>U17</div>
\t\t\t\t\t<div>Cadet 2</div>
\t\t\t\t\t<div>16 à 17 ans</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"table-row\">
\t\t\t\t\t<div>U20</div>
\t\t\t\t\t<div>Junior</div>
\t\t\t\t\t<div>18 à 20 ans</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"table-row\">
\t\t\t\t\t<div>Sénior</div>
\t\t\t\t\t<div>Sénior</div>
\t\t\t\t\t<div>21 à 34 ans</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>

\t\t<!-- CTA -->
\t\t<div class=\"prices-link\">
\t\t\t<p>Consultez nos
\t\t\t\t<a href=\"";
        // line 170
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "#abonnements\">tarifs et abonnements</a>
\t\t\t\tpour plus d’infos.</p>
\t\t</div>
\t</main>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 176
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 177
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield " ";
        // line 178
        yield "    <script src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/halterophilie/ecole/ecole.js"), "html", null, true);
        yield "\"></script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "ecole/index.html.twig";
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
        return array (  330 => 178,  326 => 177,  316 => 176,  303 => 170,  244 => 114,  221 => 94,  217 => 93,  213 => 92,  209 => 91,  189 => 74,  169 => 57,  149 => 40,  123 => 17,  119 => 16,  115 => 15,  109 => 11,  99 => 10,  88 => 7,  78 => 6,  60 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}École d'Haltérophilie
{% endblock %}

{% block stylesheets %}
\t<link rel=\"stylesheet\" href=\"{{ asset('css/ecole/index.css') }}\">
{% endblock %}

{% block body %}

\t<!-- HERO -->
<header class=\"hero-header\">
    <div class=\"hero-backgrounds\">
        <div class=\"hero-bg\" style=\"background-image: url('{{ asset('images/club/bg2.jpg') }}');\"></div>
        <div class=\"hero-bg\" style=\"background-image: url('{{ asset('images/club/bg1.jpg') }}');\"></div>
        <div class=\"hero-bg\" style=\"background-image: url('{{ asset('images/club/bg3.jpg') }}');\"></div>
    </div>
    
    <div class=\"hero-content\">
        <h1>L'ÉCOLE D'HALTÉROPHILIE</h1>
        <p>Toutes les infos sur nos entraînements, catégories et activités</p>
<a href=\"#entrainements\" class=\"cta-button\">Découvrir notre école</a>
</header>

\t<main>
\t\t<!-- SECTION 1 -->
\t\t<section id=\"entrainements\" class=\"section\">
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>LICENCES COMPÉTITION</h2>
\t\t\t\t<p>
\t\t\t\t\t<b>Catégories :</b>
\t\t\t\t\tU15, U17, U20, Séniors</p>
\t\t\t\t<p>
\t\t\t\t\t<b>Entraînements :</b>
\t\t\t\t\tLundi, Mercredi, Vendredi de 17h00 à 19h00</p>
\t\t\t\t<p>Nos athlètes bénéficient d’un suivi personnalisé avec des programmes adaptés à chaque catégorie, incluant la technique, la force et la préparation mentale.</p>
\t\t\t</div>
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"{{ asset('images/club/photo2.jpg') }}\" alt=\"Compétition\">
\t\t\t</div>
\t\t</section>

\t\t<!-- SECTION 2 -->
\t\t<section class=\"section\">
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>U13 / DÉBUTANTS</h2>
\t\t\t\t<p>
\t\t\t\t\t<b>Catégorie :</b>
\t\t\t\t\tInitiation pour jeunes et débutants</p>
\t\t\t\t<p>
\t\t\t\t\t<b>Entraînements :</b>
\t\t\t\t\tLundi, Mercredi, Vendredi de 17h30 à 19h00</p>
\t\t\t\t<p>Cette section initie les plus jeunes aux bases de l’haltérophilie dans un environnement sécurisé et ludique, en mettant l’accent sur la posture et le respect des règles.</p>
\t\t\t</div>
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"{{ asset('images/club/photo3.jpg') }}\" alt=\"Débutants\">
\t\t\t</div>
\t\t</section>

\t\t<!-- SECTION 3 -->
\t\t<section class=\"section\">
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>LICENCES LOISIR</h2>
\t\t\t\t<p>
\t\t\t\t\t<b>Catégorie :</b>
\t\t\t\t\tÉcole d’Haltérophilie et Initiation</p>
\t\t\t\t<p>
\t\t\t\t\t<b>Entraînements :</b>
\t\t\t\t\tMercredi de 17h30 à 19h00</p>
\t\t\t\t<p>Idéal pour ceux qui souhaitent pratiquer l’haltérophilie de manière ponctuelle, en découvrant la discipline sans pression de compétition.</p>
\t\t\t</div>
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"{{ asset('images/club/photo4.jpg') }}\" alt=\"Loisir\">
\t\t\t</div>
\t\t</section>

\t\t<!-- NOUVELLE SECTION: Nos Coachs -->
\t\t<section class=\"section\">
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>NOS COACHS</h2>
\t\t\t\t<p>Notre équipe est composée de coachs diplômés et expérimentés, passionnés par la pédagogie et la performance. Chaque coach apporte un suivi personnalisé selon les besoins et les objectifs des élèves.</p>
\t\t\t\t<p>Ils supervisent la progression technique, la sécurité des mouvements et l’encouragement dans la pratique quotidienne.</p>
\t\t\t</div>
\t\t<div class=\"section-image\">
\t\t<div class=\"coach-wrapper\">
    <div class=\"coach-slider\">
        <button class=\"prev-btn\">‹</button>

        <div class=\"slides\">
            <img src=\"{{ asset('images/club/3.jpg') }}\" alt=\"Coach 1\" data-name=\"Ema\">
            <img src=\"{{ asset('images/club/florian.jpg') }}\" alt=\"Coach 2\" data-name=\"Florian\">
            <img src=\"{{ asset('images/club/jeanne.jpg') }}\" alt=\"Coach 3\" data-name=\"Jeanne\">
\t\t\t<img src=\"{{ asset('images/club/robert.jpg') }}\" alt=\"Coach 4\" data-name=\"Robert\">
        </div>

        <button class=\"next-btn\">›</button>
    </div>

\t<p id=\"coach-name\">Ema</p>
\t</div>
</div>

\t\t</section>

\t\t<!-- NOUVELLE SECTION: Nos Valeurs -->
\t\t<section class=\"section\">
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>NOS VALEURS</h2>
\t\t\t\t<p>Respect, discipline et persévérance sont les piliers de notre école. Nous valorisons le dépassement de soi dans un environnement bienveillant et stimulant.</p>
\t\t\t\t<p>Nous encourageons l’esprit d’équipe, le fair-play et la passion pour l’haltérophilie, quel que soit le niveau de pratique.</p>
\t\t\t</div>
\t\t\t<div class=\"section-image\">
<img src=\"{{ asset('images/valeur.jpg') }}\" class=\"valeur-img\" alt=\"Valeurs\">
\t\t\t</div>
\t\t</section>

\t\t<!-- TABLE -->
\t\t<div class=\"table-container\">
\t\t\t<h2>CATÉGORIES D’ÂGE</h2>

\t\t\t<div class=\"modern-table\">
\t\t\t\t<div class=\"table-header\">
\t\t\t\t\t<div>Catégorie</div>
\t\t\t\t\t<div>Nom</div>
\t\t\t\t\t<div>Âge</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"table-row\">
\t\t\t\t\t<div>U10</div>
\t\t\t\t\t<div>Benjamin</div>
\t\t\t\t\t<div>7 à 10 ans</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"table-row\">
\t\t\t\t\t<div>U13</div>
\t\t\t\t\t<div>Minime</div>
\t\t\t\t\t<div>11 à 13 ans</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"table-row\">
\t\t\t\t\t<div>U15</div>
\t\t\t\t\t<div>Cadet 1</div>
\t\t\t\t\t<div>14 à 15 ans</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"table-row\">
\t\t\t\t\t<div>U17</div>
\t\t\t\t\t<div>Cadet 2</div>
\t\t\t\t\t<div>16 à 17 ans</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"table-row\">
\t\t\t\t\t<div>U20</div>
\t\t\t\t\t<div>Junior</div>
\t\t\t\t\t<div>18 à 20 ans</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"table-row\">
\t\t\t\t\t<div>Sénior</div>
\t\t\t\t\t<div>Sénior</div>
\t\t\t\t\t<div>21 à 34 ans</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>

\t\t<!-- CTA -->
\t\t<div class=\"prices-link\">
\t\t\t<p>Consultez nos
\t\t\t\t<a href=\"{{ path('home') }}#abonnements\">tarifs et abonnements</a>
\t\t\t\tpour plus d’infos.</p>
\t\t</div>
\t</main>
{% endblock %}

{% block javascripts %}
    {{ parent() }} {# charge d'abord le JS du base.html.twig #}
    <script src=\"{{ asset('js/halterophilie/ecole/ecole.js') }}\"></script>
{% endblock %}", "ecole/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/ecole/index.html.twig");
    }
}
