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

/* 1_accueil/section4/actualites/showarticles.html.twig */
class __TwigTemplate_dd574a770450928d1090c36ceb474486 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "1_accueil/section4/actualites/showarticles.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 4
        yield "\t";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
\t<link rel=\"stylesheet\" href=\"";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/accueil/section4/actualites/showarticles.css"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 8
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 9
        yield "
<!-- Fil d’Ariane -->
<section class=\"breadcrumb-banner\">
    <div class=\"breadcrumb-container\">
        <a href=\"";
        // line 13
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\">ACCUEIL</a>
        <span>&gt;</span>
        <a href=\"";
        // line 15
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("actualites");
        yield "\">ACTUALITÉS</a>
        <span>&gt;</span>
        <span class=\"current\">";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 17, $this->source); })()), "title", [], "any", false, false, false, 17)), "html", null, true);
        yield "</span>
    </div>
</section>

<!-- Contenu de l’article -->
<article class=\"article-detail\">
    <a href=\"";
        // line 23
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("actualites");
        yield "\" class=\"back-link\">← Retour aux actualités</a>

    ";
        // line 25
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["article"] ?? null), "categorie", [], "any", true, true, false, 25) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 25, $this->source); })()), "categorie", [], "any", false, false, false, 25))) {
            // line 26
            yield "        <span class=\"article-category\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 26, $this->source); })()), "categorie", [], "any", false, false, false, 26)), "html", null, true);
            yield "</span>
    ";
        }
        // line 28
        yield "
    <h1>";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 29, $this->source); })()), "title", [], "any", false, false, false, 29), "html", null, true);
        yield "</h1>

    ";
        // line 31
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 31, $this->source); })()), "publishedAt", [], "any", false, false, false, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 32
            yield "        <span class=\"news-date\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 32, $this->source); })()), "publishedAt", [], "any", false, false, false, 32), "d F Y"), "html", null, true);
            yield "</span>
    ";
        }
        // line 34
        yield "
    ";
        // line 35
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 35, $this->source); })()), "photo", [], "any", false, false, false, 35)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 36
            yield "        <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 36, $this->source); })()), "photo", [], "any", false, false, false, 36))), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 36, $this->source); })()), "title", [], "any", false, false, false, 36), "html", null, true);
            yield "\">
    ";
        }
        // line 38
        yield "
    ";
        // line 39
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 39, $this->source); })()), "description", [], "any", false, false, false, 39)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 40
            yield "        <p>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 40, $this->source); })()), "description", [], "any", false, false, false, 40), "html", null, true);
            yield "</p>
    ";
        }
        // line 42
        yield "
    ";
        // line 43
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["article"] ?? null), "content", [], "any", true, true, false, 43) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 43, $this->source); })()), "content", [], "any", false, false, false, 43))) {
            // line 44
            yield "        <div class=\"article-content\">
            ";
            // line 45
            yield CoreExtension::getAttribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 45, $this->source); })()), "content", [], "any", false, false, false, 45);
            yield "
        </div>
    ";
        }
        // line 48
        yield "</article>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "1_accueil/section4/actualites/showarticles.html.twig";
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
        return array (  185 => 48,  179 => 45,  176 => 44,  174 => 43,  171 => 42,  165 => 40,  163 => 39,  160 => 38,  152 => 36,  150 => 35,  147 => 34,  141 => 32,  139 => 31,  134 => 29,  131 => 28,  125 => 26,  123 => 25,  118 => 23,  109 => 17,  104 => 15,  99 => 13,  93 => 9,  83 => 8,  73 => 5,  68 => 4,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block stylesheets %}
\t{{ parent() }}
\t<link rel=\"stylesheet\" href=\"{{ asset('css/accueil/section4/actualites/showarticles.css') }}\">
{% endblock %}

{% block body %}

<!-- Fil d’Ariane -->
<section class=\"breadcrumb-banner\">
    <div class=\"breadcrumb-container\">
        <a href=\"{{ path('home') }}\">ACCUEIL</a>
        <span>&gt;</span>
        <a href=\"{{ path('actualites') }}\">ACTUALITÉS</a>
        <span>&gt;</span>
        <span class=\"current\">{{ article.title|upper }}</span>
    </div>
</section>

<!-- Contenu de l’article -->
<article class=\"article-detail\">
    <a href=\"{{ path('actualites') }}\" class=\"back-link\">← Retour aux actualités</a>

    {% if article.categorie is defined and article.categorie %}
        <span class=\"article-category\">{{ article.categorie|upper }}</span>
    {% endif %}

    <h1>{{ article.title }}</h1>

    {% if article.publishedAt %}
        <span class=\"news-date\">{{ article.publishedAt|date('d F Y') }}</span>
    {% endif %}

    {% if article.photo %}
        <img src=\"{{ asset('uploads/' ~ article.photo) }}\" alt=\"{{ article.title }}\">
    {% endif %}

    {% if article.description %}
        <p>{{ article.description }}</p>
    {% endif %}

    {% if article.content is defined and article.content %}
        <div class=\"article-content\">
            {{ article.content|raw }}
        </div>
    {% endif %}
</article>
{% endblock %}
", "1_accueil/section4/actualites/showarticles.html.twig", "/Users/dheillyenzo/projet-chm/templates/1_accueil/section4/actualites/showarticles.html.twig");
    }
}
