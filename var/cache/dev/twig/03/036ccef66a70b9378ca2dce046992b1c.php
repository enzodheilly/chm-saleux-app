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

/* competitions/index.html.twig */
class __TwigTemplate_689ce856453ac12c5dde7eb6ccd03080 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "competitions/index.html.twig"));

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

        yield "Compétitions & Résultats";
        
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
        yield "<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/competitions/competitions.css"), "html", null, true);
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
<header class=\"hero-header\" style=\"
    background-image: url('";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/90.jpg"), "html", null, true);
        yield "');
    background-size: cover;
    background-position: center 20%;
\">

        <a href=\"";
        // line 17
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\" class=\"back-button\">
         <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2.5\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15 19l-7-7 7-7\" />
         </svg>
         Home
    </a>

    <div class=\"hero-content\">
        <h1>COMPÉTITIONS & RÉSULTATS</h1>
        <p>Retrouvez toutes les compétitions et les résultats de nos athlètes</p>
    </div>
</header>

<main>

<!-- ================= CALENDRIER ================= --> <section class=\"section calendar-section\"> <div class=\"section-content\"> <h2>Calendrier des prochaines compétitions</h2> <div class=\"calendar-container\"> <div class=\"calendar-fake\"> <div class=\"calendar-header\"> <button class=\"prev-month\">&lt;</button> <h3>Décembre 2025</h3> <button class=\"next-month\">&gt;</button> </div> <div class=\"calendar-days\"> <div class=\"day-label\">Lun</div> <div class=\"day-label\">Mar</div> <div class=\"day-label\">Mer</div> <div class=\"day-label\">Jeu</div> <div class=\"day-label\">Ven</div> <div class=\"day-label\">Sam</div> <div class=\"day-label\">Dim</div> ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["day"]) {
            yield " ";
            $context["competition"] = CoreExtension::inFilter($context["day"], [5, 12, 20]);
            yield " <div class=\"day";
            if ((($tmp = (isset($context["competition"]) || array_key_exists("competition", $context) ? $context["competition"] : (function () { throw new RuntimeError('Variable "competition" does not exist.', 32, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield " competition";
            }
            yield "\"> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["day"], "html", null, true);
            yield " ";
            if ((($tmp = (isset($context["competition"]) || array_key_exists("competition", $context) ? $context["competition"] : (function () { throw new RuntimeError('Variable "competition" does not exist.', 32, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield " <span class=\"comp-text\">Compétition</span> ";
            }
            yield " </div> ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['day'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        yield " </div> </div> </div> </div> </section>

    <!-- ================= DERNIÈRES COMPÉTITIONS ================= -->
    <section class=\"section last-competitions-section\">
        <div class=\"section-content\">
            <h2>Dernières compétitions</h2>
<div class=\"teams-container\">

    <a href=\"";
        // line 40
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("competitions_feminine");
        yield "\" class=\"team-card\">
        <div class=\"team-image\" style=\"background-image: url('";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/female-team.jpg"), "html", null, true);
        yield "');\"></div>
        <div class=\"team-overlay\">
            <h3>Équipe féminine</h3>
            <button class=\"team-btn\">Voir les détails</button>
        </div>
    </a>

    <a href=\"";
        // line 48
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("competitions_masculine");
        yield "\" class=\"team-card\">
        <div class=\"team-image\" style=\"background-image: url('";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/male-team.jpg"), "html", null, true);
        yield "');\"></div>
        <div class=\"team-overlay\">
            <h3>Équipe masculine</h3>
            <button class=\"team-btn\">Voir les détails</button>
        </div>
    </a>

</div>

        </div>
    </section>
</main>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 63
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 64
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield " ";
        // line 65
        yield "    <script src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/competitions/competitions.js"), "html", null, true);
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
        return "competitions/index.html.twig";
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
        return array (  221 => 65,  217 => 64,  207 => 63,  186 => 49,  182 => 48,  172 => 41,  168 => 40,  138 => 32,  120 => 17,  112 => 12,  108 => 10,  98 => 9,  87 => 6,  77 => 5,  60 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Compétitions & Résultats{% endblock %}

{% block stylesheets %}
<link rel=\"stylesheet\" href=\"{{ asset('css/competitions/competitions.css') }}\">
{% endblock %}

{% block body %}

<header class=\"hero-header\" style=\"
    background-image: url('{{ asset('images/90.jpg') }}');
    background-size: cover;
    background-position: center 20%;
\">

        <a href=\"{{ path('home') }}\" class=\"back-button\">
         <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2.5\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15 19l-7-7 7-7\" />
         </svg>
         Home
    </a>

    <div class=\"hero-content\">
        <h1>COMPÉTITIONS & RÉSULTATS</h1>
        <p>Retrouvez toutes les compétitions et les résultats de nos athlètes</p>
    </div>
</header>

<main>

<!-- ================= CALENDRIER ================= --> <section class=\"section calendar-section\"> <div class=\"section-content\"> <h2>Calendrier des prochaines compétitions</h2> <div class=\"calendar-container\"> <div class=\"calendar-fake\"> <div class=\"calendar-header\"> <button class=\"prev-month\">&lt;</button> <h3>Décembre 2025</h3> <button class=\"next-month\">&gt;</button> </div> <div class=\"calendar-days\"> <div class=\"day-label\">Lun</div> <div class=\"day-label\">Mar</div> <div class=\"day-label\">Mer</div> <div class=\"day-label\">Jeu</div> <div class=\"day-label\">Ven</div> <div class=\"day-label\">Sam</div> <div class=\"day-label\">Dim</div> {% for day in 1..31 %} {% set competition = day in [5,12,20] %} <div class=\"day{% if competition %} competition{% endif %}\"> {{ day }} {% if competition %} <span class=\"comp-text\">Compétition</span> {% endif %} </div> {% endfor %} </div> </div> </div> </div> </section>

    <!-- ================= DERNIÈRES COMPÉTITIONS ================= -->
    <section class=\"section last-competitions-section\">
        <div class=\"section-content\">
            <h2>Dernières compétitions</h2>
<div class=\"teams-container\">

    <a href=\"{{ path('competitions_feminine') }}\" class=\"team-card\">
        <div class=\"team-image\" style=\"background-image: url('{{ asset('images/female-team.jpg') }}');\"></div>
        <div class=\"team-overlay\">
            <h3>Équipe féminine</h3>
            <button class=\"team-btn\">Voir les détails</button>
        </div>
    </a>

    <a href=\"{{ path('competitions_masculine') }}\" class=\"team-card\">
        <div class=\"team-image\" style=\"background-image: url('{{ asset('images/male-team.jpg') }}');\"></div>
        <div class=\"team-overlay\">
            <h3>Équipe masculine</h3>
            <button class=\"team-btn\">Voir les détails</button>
        </div>
    </a>

</div>

        </div>
    </section>
</main>
{% endblock %}

{% block javascripts %}
    {{ parent() }} {# charge d'abord le JS du base.html.twig #}
    <script src=\"{{ asset('js/competitions/competitions.js') }}\"></script>
{% endblock %}
", "competitions/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/competitions/index.html.twig");
    }
}
