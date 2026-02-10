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

/* 1_accueil/section4/actualites/articles.html.twig */
class __TwigTemplate_05d9989ebfc0fe0197ed57e6fa3d2b09 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "1_accueil/section4/actualites/articles.html.twig"));

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

        yield "Actualités";
        
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
        yield "\t";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
\t<link rel=\"stylesheet\" href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/accueil/section4/actualites/articles.css"), "html", null, true);
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
        yield "<main>
\t<section class=\"page-banner\">
\t\t<h1>Actualités</h1>
\t</section>
\t
\t<section class=\"filter-bar\">
\t\t<form method=\"get\" action=\"";
        // line 17
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("actualites", ["page" => 1]);
        yield "\">

\t\t\t";
        // line 20
        yield "\t\t\t<select name=\"categorie\">
\t\t\t\t<option value=\"\">Toutes les catégories</option>
\t\t\t\t";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 22, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 23
            yield "\t\t\t\t\t<option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["cat"], "html", null, true);
            yield "\" ";
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "categorie", [], "any", true, true, false, 23) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 23, $this->source); })()), "categorie", [], "any", false, false, false, 23) == $context["cat"]))) {
                yield "selected";
            }
            yield ">
\t\t\t\t\t\t";
            // line 24
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), $context["cat"]), "html", null, true);
            yield "
\t\t\t\t\t</option>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['cat'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        yield "\t\t\t</select>

\t\t\t";
        // line 30
        yield "\t\t\t<div class=\"date-input\">
\t\t\t\t<label for=\"date_from\">De :</label>
\t\t\t\t<div class=\"input-wrapper\">
\t\t\t\t\t<input type=\"date\" id=\"date_from\" name=\"date_from\" value=\"";
        // line 33
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "date_from", [], "any", true, true, false, 33) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 33, $this->source); })()), "date_from", [], "any", false, false, false, 33)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 33, $this->source); })()), "date_from", [], "any", false, false, false, 33), "html", null, true)) : (""));
        yield "\">
\t\t\t\t\t<span class=\"clear-icon\" onclick=\"clearDate('date_from')\">×</span>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t";
        // line 39
        yield "\t\t\t<div class=\"date-input\">
\t\t\t\t<label for=\"date_to\">À :</label>
\t\t\t\t<div class=\"input-wrapper\">
\t\t\t\t\t<input type=\"date\" id=\"date_to\" name=\"date_to\" value=\"";
        // line 42
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "date_to", [], "any", true, true, false, 42) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 42, $this->source); })()), "date_to", [], "any", false, false, false, 42)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 42, $this->source); })()), "date_to", [], "any", false, false, false, 42), "html", null, true)) : (""));
        yield "\">
\t\t\t\t\t<span class=\"clear-icon\" onclick=\"clearDate('date_to')\">×</span>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<button type=\"submit\">Rechercher</button>
\t\t</form>
\t</section>

\t<section class=\"actualites-section\">
\t\t";
        // line 52
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["articles"]) || array_key_exists("articles", $context) ? $context["articles"] : (function () { throw new RuntimeError('Variable "articles" does not exist.', 52, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 53
            yield "\t\t\t<ul class=\"news-grid\">
\t\t\t\t";
            // line 54
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["articles"]) || array_key_exists("articles", $context) ? $context["articles"] : (function () { throw new RuntimeError('Variable "articles" does not exist.', 54, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
                // line 55
                yield "\t\t\t\t\t<li class=\"news-card\">
\t\t\t\t\t\t<img src=\"";
                // line 56
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, $context["article"], "photo", [], "any", false, false, false, 56))), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "title", [], "any", false, false, false, 56), "html", null, true);
                yield "\">
\t\t\t\t\t\t<div class=\"news-info\">

\t\t\t\t\t\t\t<span class=\"news-category\">
\t\t\t\t\t\t\t\t";
                // line 60
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["article"], "categorie", [], "any", false, false, false, 60)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["article"], "categorie", [], "any", false, false, false, 60)), "html", null, true)) : ("SANS CATÉGORIE"));
                yield "
\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t<h3>";
                // line 63
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "title", [], "any", false, false, false, 63), "html", null, true);
                yield "</h3>

\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t";
                // line 66
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["article"], "description", [], "any", false, false, false, 66)) > 130)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source,                 // line 67
$context["article"], "description", [], "any", false, false, false, 67), 0, 130) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source,                 // line 68
$context["article"], "description", [], "any", false, false, false, 68), "html", null, true)));
                // line 69
                yield "
\t\t\t\t\t\t\t</p>

\t\t\t\t\t\t\t<span class=\"news-date\">";
                // line 72
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "publishedAt", [], "any", false, false, false, 72), "d/m/Y"), "html", null, true);
                yield "</span>
\t\t\t\t\t\t\t<a href=\"";
                // line 73
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("article_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["article"], "id", [], "any", false, false, false, 73)]), "html", null, true);
                yield "\">Lire la suite</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</li>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['article'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            yield "\t\t\t</ul>

\t\t\t";
            // line 80
            yield "\t\t\t<div class=\"pagination\">
\t\t\t\t";
            // line 81
            $context["query"] = ["categorie" => CoreExtension::getAttribute($this->env, $this->source,             // line 82
(isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 82, $this->source); })()), "categorie", [], "any", false, false, false, 82), "date_from" => CoreExtension::getAttribute($this->env, $this->source,             // line 83
(isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 83, $this->source); })()), "date_from", [], "any", false, false, false, 83), "date_to" => CoreExtension::getAttribute($this->env, $this->source,             // line 84
(isset($context["filters"]) || array_key_exists("filters", $context) ? $context["filters"] : (function () { throw new RuntimeError('Variable "filters" does not exist.', 84, $this->source); })()), "date_to", [], "any", false, false, false, 84)];
            // line 86
            yield "
\t\t\t\t";
            // line 88
            yield "\t\t\t\t";
            if (((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 88, $this->source); })()) > 1)) {
                // line 89
                yield "\t\t\t\t\t<a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("actualites", Twig\Extension\CoreExtension::merge((isset($context["query"]) || array_key_exists("query", $context) ? $context["query"] : (function () { throw new RuntimeError('Variable "query" does not exist.', 89, $this->source); })()), ["page" => ((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 89, $this->source); })()) - 1)])), "html", null, true);
                yield "\" class=\"page-arrow\">&lsaquo;</a>
\t\t\t\t";
            } else {
                // line 91
                yield "\t\t\t\t\t<span class=\"page-arrow disabled\">&lsaquo;</span>
\t\t\t\t";
            }
            // line 93
            yield "
\t\t\t\t";
            // line 95
            yield "\t\t\t\t";
            $context["start"] = ((((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 95, $this->source); })()) > 3)) ? (((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 95, $this->source); })()) - 2)) : (1));
            // line 96
            yield "\t\t\t\t";
            $context["end"] = ((((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 96, $this->source); })()) < ((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 96, $this->source); })()) - 2))) ? (((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 96, $this->source); })()) + 2)) : ((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 96, $this->source); })())));
            // line 97
            yield "
\t\t\t\t";
            // line 98
            if (((isset($context["start"]) || array_key_exists("start", $context) ? $context["start"] : (function () { throw new RuntimeError('Variable "start" does not exist.', 98, $this->source); })()) > 1)) {
                // line 99
                yield "\t\t\t\t\t<a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("actualites", Twig\Extension\CoreExtension::merge((isset($context["query"]) || array_key_exists("query", $context) ? $context["query"] : (function () { throw new RuntimeError('Variable "query" does not exist.', 99, $this->source); })()), ["page" => 1])), "html", null, true);
                yield "\">1</a>
\t\t\t\t\t";
                // line 100
                if (((isset($context["start"]) || array_key_exists("start", $context) ? $context["start"] : (function () { throw new RuntimeError('Variable "start" does not exist.', 100, $this->source); })()) > 2)) {
                    // line 101
                    yield "\t\t\t\t\t\t<span class=\"dots\">...</span>
\t\t\t\t\t";
                }
                // line 103
                yield "\t\t\t\t";
            }
            // line 104
            yield "
\t\t\t\t";
            // line 105
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range((isset($context["start"]) || array_key_exists("start", $context) ? $context["start"] : (function () { throw new RuntimeError('Variable "start" does not exist.', 105, $this->source); })()), (isset($context["end"]) || array_key_exists("end", $context) ? $context["end"] : (function () { throw new RuntimeError('Variable "end" does not exist.', 105, $this->source); })())));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 106
                yield "\t\t\t\t\t";
                if (($context["i"] == (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 106, $this->source); })()))) {
                    // line 107
                    yield "\t\t\t\t\t\t<span class=\"current\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                    yield "</span>
\t\t\t\t\t";
                } else {
                    // line 109
                    yield "\t\t\t\t\t\t<a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("actualites", Twig\Extension\CoreExtension::merge((isset($context["query"]) || array_key_exists("query", $context) ? $context["query"] : (function () { throw new RuntimeError('Variable "query" does not exist.', 109, $this->source); })()), ["page" => $context["i"]])), "html", null, true);
                    yield "\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                    yield "</a>
\t\t\t\t\t";
                }
                // line 111
                yield "\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 112
            yield "
\t\t\t\t";
            // line 113
            if (((isset($context["end"]) || array_key_exists("end", $context) ? $context["end"] : (function () { throw new RuntimeError('Variable "end" does not exist.', 113, $this->source); })()) < (isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 113, $this->source); })()))) {
                // line 114
                yield "\t\t\t\t\t";
                if (((isset($context["end"]) || array_key_exists("end", $context) ? $context["end"] : (function () { throw new RuntimeError('Variable "end" does not exist.', 114, $this->source); })()) < ((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 114, $this->source); })()) - 1))) {
                    // line 115
                    yield "\t\t\t\t\t\t<span class=\"dots\">...</span>
\t\t\t\t\t";
                }
                // line 117
                yield "\t\t\t\t\t<a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("actualites", Twig\Extension\CoreExtension::merge((isset($context["query"]) || array_key_exists("query", $context) ? $context["query"] : (function () { throw new RuntimeError('Variable "query" does not exist.', 117, $this->source); })()), ["page" => (isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 117, $this->source); })())])), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 117, $this->source); })()), "html", null, true);
                yield "</a>
\t\t\t\t";
            }
            // line 119
            yield "
\t\t\t\t";
            // line 121
            yield "\t\t\t\t";
            if (((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 121, $this->source); })()) < (isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 121, $this->source); })()))) {
                // line 122
                yield "\t\t\t\t\t<a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("actualites", Twig\Extension\CoreExtension::merge((isset($context["query"]) || array_key_exists("query", $context) ? $context["query"] : (function () { throw new RuntimeError('Variable "query" does not exist.', 122, $this->source); })()), ["page" => ((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 122, $this->source); })()) + 1)])), "html", null, true);
                yield "\" class=\"page-arrow\">&rsaquo;</a>
\t\t\t\t";
            } else {
                // line 124
                yield "\t\t\t\t\t<span class=\"page-arrow disabled\">&rsaquo;</span>
\t\t\t\t";
            }
            // line 126
            yield "\t\t\t</div>

\t\t";
        } else {
            // line 129
            yield "\t\t\t<p style=\"text-align:center; color:#777;\">Aucune actualité pour le moment.</p>
\t\t";
        }
        // line 131
        yield "\t</section>
</main>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 135
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 136
        yield "\t<script src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/accueil/section4/actualites/articles.js"), "html", null, true);
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
        return "1_accueil/section4/actualites/articles.html.twig";
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
        return array (  393 => 136,  383 => 135,  373 => 131,  369 => 129,  364 => 126,  360 => 124,  354 => 122,  351 => 121,  348 => 119,  340 => 117,  336 => 115,  333 => 114,  331 => 113,  328 => 112,  322 => 111,  314 => 109,  308 => 107,  305 => 106,  301 => 105,  298 => 104,  295 => 103,  291 => 101,  289 => 100,  284 => 99,  282 => 98,  279 => 97,  276 => 96,  273 => 95,  270 => 93,  266 => 91,  260 => 89,  257 => 88,  254 => 86,  252 => 84,  251 => 83,  250 => 82,  249 => 81,  246 => 80,  242 => 77,  232 => 73,  228 => 72,  223 => 69,  221 => 68,  220 => 67,  219 => 66,  213 => 63,  207 => 60,  198 => 56,  195 => 55,  191 => 54,  188 => 53,  186 => 52,  173 => 42,  168 => 39,  160 => 33,  155 => 30,  151 => 27,  142 => 24,  133 => 23,  129 => 22,  125 => 20,  120 => 17,  112 => 11,  102 => 10,  92 => 7,  87 => 6,  77 => 5,  60 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Actualités{% endblock %}

{% block stylesheets %}
\t{{ parent() }}
\t<link rel=\"stylesheet\" href=\"{{ asset('css/accueil/section4/actualites/articles.css') }}\">
{% endblock %}

{% block body %}
<main>
\t<section class=\"page-banner\">
\t\t<h1>Actualités</h1>
\t</section>
\t
\t<section class=\"filter-bar\">
\t\t<form method=\"get\" action=\"{{ path('actualites', {'page': 1}) }}\">

\t\t\t{# ----- FILTRE CATEGORIES (STRING) ----- #}
\t\t\t<select name=\"categorie\">
\t\t\t\t<option value=\"\">Toutes les catégories</option>
\t\t\t\t{% for cat in categories %}
\t\t\t\t\t<option value=\"{{ cat }}\" {% if filters.categorie is defined and filters.categorie == cat %}selected{% endif %}>
\t\t\t\t\t\t{{ cat|capitalize }}
\t\t\t\t\t</option>
\t\t\t\t{% endfor %}
\t\t\t</select>

\t\t\t{# ----- DATE DE ----- #}
\t\t\t<div class=\"date-input\">
\t\t\t\t<label for=\"date_from\">De :</label>
\t\t\t\t<div class=\"input-wrapper\">
\t\t\t\t\t<input type=\"date\" id=\"date_from\" name=\"date_from\" value=\"{{ filters.date_from ?? '' }}\">
\t\t\t\t\t<span class=\"clear-icon\" onclick=\"clearDate('date_from')\">×</span>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t{# ----- DATE À ----- #}
\t\t\t<div class=\"date-input\">
\t\t\t\t<label for=\"date_to\">À :</label>
\t\t\t\t<div class=\"input-wrapper\">
\t\t\t\t\t<input type=\"date\" id=\"date_to\" name=\"date_to\" value=\"{{ filters.date_to ?? '' }}\">
\t\t\t\t\t<span class=\"clear-icon\" onclick=\"clearDate('date_to')\">×</span>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<button type=\"submit\">Rechercher</button>
\t\t</form>
\t</section>

\t<section class=\"actualites-section\">
\t\t{% if articles is not empty %}
\t\t\t<ul class=\"news-grid\">
\t\t\t\t{% for article in articles %}
\t\t\t\t\t<li class=\"news-card\">
\t\t\t\t\t\t<img src=\"{{ asset('uploads/' ~ article.photo) }}\" alt=\"{{ article.title }}\">
\t\t\t\t\t\t<div class=\"news-info\">

\t\t\t\t\t\t\t<span class=\"news-category\">
\t\t\t\t\t\t\t\t{{ article.categorie ? article.categorie|upper : 'SANS CATÉGORIE' }}
\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t<h3>{{ article.title }}</h3>

\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t{{ article.description|length > 130 
\t\t\t\t\t\t\t\t\t? article.description|slice(0,130) ~ '...' 
\t\t\t\t\t\t\t\t\t: article.description 
\t\t\t\t\t\t\t\t}}
\t\t\t\t\t\t\t</p>

\t\t\t\t\t\t\t<span class=\"news-date\">{{ article.publishedAt|date('d/m/Y') }}</span>
\t\t\t\t\t\t\t<a href=\"{{ path('article_show', {'id': article.id}) }}\">Lire la suite</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</li>
\t\t\t\t{% endfor %}
\t\t\t</ul>

\t\t\t{# ----- PAGINATION ----- #}
\t\t\t<div class=\"pagination\">
\t\t\t\t{% set query = {
\t\t\t\t\t'categorie': filters.categorie,
\t\t\t\t\t'date_from': filters.date_from,
\t\t\t\t\t'date_to': filters.date_to
\t\t\t\t} %}

\t\t\t\t{# Précédent #}
\t\t\t\t{% if page > 1 %}
\t\t\t\t\t<a href=\"{{ path('actualites', query|merge({'page': page - 1})) }}\" class=\"page-arrow\">&lsaquo;</a>
\t\t\t\t{% else %}
\t\t\t\t\t<span class=\"page-arrow disabled\">&lsaquo;</span>
\t\t\t\t{% endif %}

\t\t\t\t{# Pages visibles #}
\t\t\t\t{% set start = (page > 3) ? page - 2 : 1 %}
\t\t\t\t{% set end = (page < totalPages - 2) ? page + 2 : totalPages %}

\t\t\t\t{% if start > 1 %}
\t\t\t\t\t<a href=\"{{ path('actualites', query|merge({'page': 1})) }}\">1</a>
\t\t\t\t\t{% if start > 2 %}
\t\t\t\t\t\t<span class=\"dots\">...</span>
\t\t\t\t\t{% endif %}
\t\t\t\t{% endif %}

\t\t\t\t{% for i in start..end %}
\t\t\t\t\t{% if i == page %}
\t\t\t\t\t\t<span class=\"current\">{{ i }}</span>
\t\t\t\t\t{% else %}
\t\t\t\t\t\t<a href=\"{{ path('actualites', query|merge({'page': i})) }}\">{{ i }}</a>
\t\t\t\t\t{% endif %}
\t\t\t\t{% endfor %}

\t\t\t\t{% if end < totalPages %}
\t\t\t\t\t{% if end < totalPages - 1 %}
\t\t\t\t\t\t<span class=\"dots\">...</span>
\t\t\t\t\t{% endif %}
\t\t\t\t\t<a href=\"{{ path('actualites', query|merge({'page': totalPages})) }}\">{{ totalPages }}</a>
\t\t\t\t{% endif %}

\t\t\t\t{# Suivant #}
\t\t\t\t{% if page < totalPages %}
\t\t\t\t\t<a href=\"{{ path('actualites', query|merge({'page': page + 1})) }}\" class=\"page-arrow\">&rsaquo;</a>
\t\t\t\t{% else %}
\t\t\t\t\t<span class=\"page-arrow disabled\">&rsaquo;</span>
\t\t\t\t{% endif %}
\t\t\t</div>

\t\t{% else %}
\t\t\t<p style=\"text-align:center; color:#777;\">Aucune actualité pour le moment.</p>
\t\t{% endif %}
\t</section>
</main>
{% endblock %}

{% block javascripts %}
\t<script src=\"{{ asset('js/accueil/section4/actualites/articles.js') }}\"></script>
{% endblock %}
", "1_accueil/section4/actualites/articles.html.twig", "/Users/dheillyenzo/projet-chm/templates/1_accueil/section4/actualites/articles.html.twig");
    }
}
