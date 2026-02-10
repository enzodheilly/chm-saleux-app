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

/* competitions/masculine.html.twig */
class __TwigTemplate_26e92bafe7ea9eb44815f3250c541871 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "competitions/masculine.html.twig"));

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

        yield "Équipe Féminine - Compétitions";
        
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/competitions/masculine.css"), "html", null, true);
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
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("competition");
        yield "\" class=\"back-button\">
         <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2.5\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15 19l-7-7 7-7\" />
         </svg>
         Retour
    </a>

    <!-- Image diagonale sur la droite -->
    <div class=\"hero-diagonal-image\">
        <img src=\"";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/competitions/2.jpg"), "html", null, true);
        yield "\" alt=\"Image Musculation Club\">
    </div>

    <!-- Contenu texte -->
    <div class=\"hero-content\">
        <h1>Équipe masculine & résultats</h1>
        <p>Suivez de près le parcours de nos athlètes au fil de la saison. Retrouvez ici l’intégralité des classements, les performances individuelles et l’évolution des records <span>de notre équipe masculine.</span></p>
    </div>
</header>

<section class=\"athlete-slider-section\">
        <h1> les membres de Notre équipe</h1>

    <div class=\"athlete-slider\">

            <button id=\"prevAthlete\" class=\"nav-arrow left\" aria-label=\"Précédent\">
        <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"3\" stroke=\"currentColor\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15.75 19.5L8.25 12l7.5-7.5\" />
        </svg>
    </button>

        <!-- Wrapper manquant dans ton HTML -->
        <div class=\"athlete-track-wrapper\">
            <div class=\"athlete-track\" id=\"athleteTrack\">

                ";
        // line 48
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["athletes"]) || array_key_exists("athletes", $context) ? $context["athletes"] : (function () { throw new RuntimeError('Variable "athletes" does not exist.', 48, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["athlete"]) {
            // line 49
            yield "                    <div class=\"athlete-slide\">
                        <img 
                            src=\"";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/athletes/" . CoreExtension::getAttribute($this->env, $this->source, $context["athlete"], "image", [], "any", false, false, false, 51))), "html", null, true);
            yield "\" 
                            alt=\"";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["athlete"], "prenom", [], "any", false, false, false, 52), "html", null, true);
            yield "\"
                        >

                        <div class=\"athlete-info-center\">
                            <h3>";
            // line 56
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["athlete"], "prenom", [], "any", false, false, false, 56), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["athlete"], "nom", [], "any", false, false, false, 56), "html", null, true);
            yield "</h3>
                            <p>Catégorie ";
            // line 57
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["athlete"], "categorie", [], "any", false, false, false, 57), "html", null, true);
            yield "</p>
                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['athlete'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        yield "
            </div>
        </div>

            <button id=\"nextAthlete\" class=\"nav-arrow right\" aria-label=\"Suivant\">
        <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"3\" stroke=\"currentColor\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M8.25 4.5l7.5 7.5-7.5 7.5\" />
        </svg>
    </button>

    </div>
</section>


<!-- SECTION CLASSEMENT -->
<section class=\"ranking-section\">
    <h1>Classement de l’Équipe</h1>

    <table class=\"ranking-table\">
        <thead>
            <tr>
                <th>Place</th>
                <th>Athlète</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 88
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["classement"]) || array_key_exists("classement", $context) ? $context["classement"] : (function () { throw new RuntimeError('Variable "classement" does not exist.', 88, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["rank"]) {
            // line 89
            yield "                <tr>
                    <td>";
            // line 90
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 90), "html", null, true);
            yield "</td>
                    <td>";
            // line 91
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["rank"], "prenom", [], "any", false, false, false, 91), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["rank"], "nom", [], "any", false, false, false, 91), "html", null, true);
            yield "</td>
                    <td>";
            // line 92
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["rank"], "points", [], "any", false, false, false, 92), "html", null, true);
            yield "</td>
                </tr>
            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['rank'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 95
        yield "        </tbody>
    </table>
</section>


<!-- DERNIÈRE COMPÉTITION -->
<section class=\"last-competition-section\">
    <h1>Dernière Compétition</h1>

    ";
        // line 104
        $context["lastCompetition"] = Twig\Extension\CoreExtension::last($this->env->getCharset(), (isset($context["competitions"]) || array_key_exists("competitions", $context) ? $context["competitions"] : (function () { throw new RuntimeError('Variable "competitions" does not exist.', 104, $this->source); })()));
        // line 105
        yield "
    ";
        // line 106
        if ((($tmp = (isset($context["lastCompetition"]) || array_key_exists("lastCompetition", $context) ? $context["lastCompetition"] : (function () { throw new RuntimeError('Variable "lastCompetition" does not exist.', 106, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 107
            yield "        <div class=\"last-competition-card\">
            <h3>";
            // line 108
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastCompetition"]) || array_key_exists("lastCompetition", $context) ? $context["lastCompetition"] : (function () { throw new RuntimeError('Variable "lastCompetition" does not exist.', 108, $this->source); })()), "titre", [], "any", false, false, false, 108), "html", null, true);
            yield "</h3>
            <p><strong>Date :</strong> ";
            // line 109
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastCompetition"]) || array_key_exists("lastCompetition", $context) ? $context["lastCompetition"] : (function () { throw new RuntimeError('Variable "lastCompetition" does not exist.', 109, $this->source); })()), "date", [], "any", false, false, false, 109), "d/m/Y"), "html", null, true);
            yield "</p>
            <p><strong>Lieu :</strong> ";
            // line 110
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastCompetition"]) || array_key_exists("lastCompetition", $context) ? $context["lastCompetition"] : (function () { throw new RuntimeError('Variable "lastCompetition" does not exist.', 110, $this->source); })()), "lieu", [], "any", false, false, false, 110), "html", null, true);
            yield "</p>

            <h4>Résultats des Athlètes</h4>
            <div class=\"results-grid\">
                ";
            // line 114
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastCompetition"]) || array_key_exists("lastCompetition", $context) ? $context["lastCompetition"] : (function () { throw new RuntimeError('Variable "lastCompetition" does not exist.', 114, $this->source); })()), "results", [], "any", false, false, false, 114));
            foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
                // line 115
                yield "                    <div class=\"result-item\">
                        <h5>";
                // line 116
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "prenom", [], "any", false, false, false, 116), "html", null, true);
                yield "</h5>
                        <p><strong>Épaulé-Jeté :</strong> ";
                // line 117
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "epauleJete", [], "any", false, false, false, 117), "html", null, true);
                yield " kg</p>
                        <p><strong>Tirage :</strong> ";
                // line 118
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "tirage", [], "any", false, false, false, 118), "html", null, true);
                yield " kg</p>
                        <p><strong>Total :</strong> ";
                // line 119
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "total", [], "any", false, false, false, 119), "html", null, true);
                yield " kg</p>
                        <p><strong>Place :</strong> ";
                // line 120
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "place", [], "any", false, false, false, 120), "html", null, true);
                yield "</p>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['result'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 123
            yield "            </div>
        </div>

        <div class=\"more-results\">
            <a class=\"more-btn\" href=\"#historique\">Voir plus de résultats</a>
        </div>

    ";
        } else {
            // line 131
            yield "        <p>Aucune compétition trouvée.</p>
    ";
        }
        // line 133
        yield "</section>


<!-- HISTORIQUE COMPLET -->
<section id=\"historique\" class=\"history-section\">
    <h1>Historique des Compétitions</h1>

    <div class=\"history-list\">
        ";
        // line 141
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["competitions"]) || array_key_exists("competitions", $context) ? $context["competitions"] : (function () { throw new RuntimeError('Variable "competitions" does not exist.', 141, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["comp"]) {
            // line 142
            yield "            <div class=\"history-item\">
                <h3>";
            // line 143
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "titre", [], "any", false, false, false, 143), "html", null, true);
            yield "</h3>
                <p><strong>Date :</strong> ";
            // line 144
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "date", [], "any", false, false, false, 144), "d/m/Y"), "html", null, true);
            yield "</p>
                <p><strong>Lieu :</strong> ";
            // line 145
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "lieu", [], "any", false, false, false, 145), "html", null, true);
            yield "</p>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['comp'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 148
        yield "    </div>
</section>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 153
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 154
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
\t <script src=\"";
        // line 155
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
        return "competitions/masculine.html.twig";
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
        return array (  405 => 155,  401 => 154,  391 => 153,  381 => 148,  372 => 145,  368 => 144,  364 => 143,  361 => 142,  357 => 141,  347 => 133,  343 => 131,  333 => 123,  324 => 120,  320 => 119,  316 => 118,  312 => 117,  308 => 116,  305 => 115,  301 => 114,  294 => 110,  290 => 109,  286 => 108,  283 => 107,  281 => 106,  278 => 105,  276 => 104,  265 => 95,  248 => 92,  242 => 91,  238 => 90,  235 => 89,  218 => 88,  189 => 61,  179 => 57,  173 => 56,  166 => 52,  162 => 51,  158 => 49,  154 => 48,  126 => 23,  114 => 14,  108 => 10,  98 => 9,  87 => 6,  77 => 5,  60 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Équipe Féminine - Compétitions{% endblock %}

{% block stylesheets %}
<link rel=\"stylesheet\" href=\"{{ asset('css/competitions/masculine.css') }}\">
{% endblock %}

{% block body %}

<header class=\"hero-header\">
    <div class=\"overlay\"></div>

        <a href=\"{{ path('competition') }}\" class=\"back-button\">
         <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2.5\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15 19l-7-7 7-7\" />
         </svg>
         Retour
    </a>

    <!-- Image diagonale sur la droite -->
    <div class=\"hero-diagonal-image\">
        <img src=\"{{ asset('images/competitions/2.jpg') }}\" alt=\"Image Musculation Club\">
    </div>

    <!-- Contenu texte -->
    <div class=\"hero-content\">
        <h1>Équipe masculine & résultats</h1>
        <p>Suivez de près le parcours de nos athlètes au fil de la saison. Retrouvez ici l’intégralité des classements, les performances individuelles et l’évolution des records <span>de notre équipe masculine.</span></p>
    </div>
</header>

<section class=\"athlete-slider-section\">
        <h1> les membres de Notre équipe</h1>

    <div class=\"athlete-slider\">

            <button id=\"prevAthlete\" class=\"nav-arrow left\" aria-label=\"Précédent\">
        <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"3\" stroke=\"currentColor\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15.75 19.5L8.25 12l7.5-7.5\" />
        </svg>
    </button>

        <!-- Wrapper manquant dans ton HTML -->
        <div class=\"athlete-track-wrapper\">
            <div class=\"athlete-track\" id=\"athleteTrack\">

                {% for athlete in athletes %}
                    <div class=\"athlete-slide\">
                        <img 
                            src=\"{{ asset('uploads/athletes/' ~ athlete.image) }}\" 
                            alt=\"{{ athlete.prenom }}\"
                        >

                        <div class=\"athlete-info-center\">
                            <h3>{{ athlete.prenom }} {{ athlete.nom }}</h3>
                            <p>Catégorie {{ athlete.categorie }}</p>
                        </div>
                    </div>
                {% endfor %}

            </div>
        </div>

            <button id=\"nextAthlete\" class=\"nav-arrow right\" aria-label=\"Suivant\">
        <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"3\" stroke=\"currentColor\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M8.25 4.5l7.5 7.5-7.5 7.5\" />
        </svg>
    </button>

    </div>
</section>


<!-- SECTION CLASSEMENT -->
<section class=\"ranking-section\">
    <h1>Classement de l’Équipe</h1>

    <table class=\"ranking-table\">
        <thead>
            <tr>
                <th>Place</th>
                <th>Athlète</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
            {% for rank in classement %}
                <tr>
                    <td>{{ loop.index }}</td>
                    <td>{{ rank.prenom }} {{ rank.nom }}</td>
                    <td>{{ rank.points }}</td>
                </tr>
            {% endfor %}
        </tbody>
    </table>
</section>


<!-- DERNIÈRE COMPÉTITION -->
<section class=\"last-competition-section\">
    <h1>Dernière Compétition</h1>

    {% set lastCompetition = competitions|last %}

    {% if lastCompetition %}
        <div class=\"last-competition-card\">
            <h3>{{ lastCompetition.titre }}</h3>
            <p><strong>Date :</strong> {{ lastCompetition.date|date('d/m/Y') }}</p>
            <p><strong>Lieu :</strong> {{ lastCompetition.lieu }}</p>

            <h4>Résultats des Athlètes</h4>
            <div class=\"results-grid\">
                {% for result in lastCompetition.results %}
                    <div class=\"result-item\">
                        <h5>{{ result.prenom }}</h5>
                        <p><strong>Épaulé-Jeté :</strong> {{ result.epauleJete }} kg</p>
                        <p><strong>Tirage :</strong> {{ result.tirage }} kg</p>
                        <p><strong>Total :</strong> {{ result.total }} kg</p>
                        <p><strong>Place :</strong> {{ result.place }}</p>
                    </div>
                {% endfor %}
            </div>
        </div>

        <div class=\"more-results\">
            <a class=\"more-btn\" href=\"#historique\">Voir plus de résultats</a>
        </div>

    {% else %}
        <p>Aucune compétition trouvée.</p>
    {% endif %}
</section>


<!-- HISTORIQUE COMPLET -->
<section id=\"historique\" class=\"history-section\">
    <h1>Historique des Compétitions</h1>

    <div class=\"history-list\">
        {% for comp in competitions %}
            <div class=\"history-item\">
                <h3>{{ comp.titre }}</h3>
                <p><strong>Date :</strong> {{ comp.date|date('d/m/Y') }}</p>
                <p><strong>Lieu :</strong> {{ comp.lieu }}</p>
            </div>
        {% endfor %}
    </div>
</section>
{% endblock %}


{% block javascripts %}
{{ parent() }}
\t <script src=\"{{ asset('js/competitions/competitions.js') }}\"></script>
{% endblock %}", "competitions/masculine.html.twig", "/Users/dheillyenzo/projet-chm/templates/competitions/masculine.html.twig");
    }
}
