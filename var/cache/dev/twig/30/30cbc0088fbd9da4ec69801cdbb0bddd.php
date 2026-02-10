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

/* competitions/feminine.html.twig */
class __TwigTemplate_aceec07d15cab8a057c382fafcfc639e extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "competitions/feminine.html.twig"));

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

        yield "Équipe Féminine - Résultats";
        
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/competitions/feminine.css"), "html", null, true);
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/competitions/1.jpg"), "html", null, true);
        yield "\" alt=\"Image Musculation Club\">
    </div>

    <!-- Contenu texte -->
    <div class=\"hero-content\">
        <h1>Équipe Féminine & résultats</h1>
        <p>Suivez de près le parcours de nos athlètes au fil de la saison. Retrouvez ici l’intégralité des classements, les performances individuelles et l’évolution des records <span>de notre équipe féminine.</span></p>
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

    <div class=\"athlete-track-wrapper\">
        <div class=\"athlete-track\" id=\"athleteTrack\">
            ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["athletes"]) || array_key_exists("athletes", $context) ? $context["athletes"] : (function () { throw new RuntimeError('Variable "athletes" does not exist.', 46, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["athlete"]) {
            // line 47
            yield "                <div class=\"athlete-slide\">
                    <img 
                        src=\"";
            // line 49
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/athletes/" . CoreExtension::getAttribute($this->env, $this->source, $context["athlete"], "image", [], "any", false, false, false, 49))), "html", null, true);
            yield "\" 
                        alt=\"";
            // line 50
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["athlete"], "prenom", [], "any", false, false, false, 50), "html", null, true);
            yield "\"
                    >
                    <div class=\"athlete-info-center\">
                        <h3>";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["athlete"], "prenom", [], "any", false, false, false, 53), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["athlete"], "nom", [], "any", false, false, false, 53), "html", null, true);
            yield "</h3>
                        <p>Catégorie ";
            // line 54
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["athlete"], "categorie", [], "any", false, false, false, 54), "html", null, true);
            yield "</p>
                    </div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['athlete'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        yield "        </div>
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
        // line 84
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["classement"]) || array_key_exists("classement", $context) ? $context["classement"] : (function () { throw new RuntimeError('Variable "classement" does not exist.', 84, $this->source); })()));
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
            // line 85
            yield "                <tr>
                    <td>";
            // line 86
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 86), "html", null, true);
            yield "</td>
                    <td>";
            // line 87
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["rank"], "prenom", [], "any", false, false, false, 87), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["rank"], "nom", [], "any", false, false, false, 87), "html", null, true);
            yield "</td>
                    <td>";
            // line 88
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["rank"], "points", [], "any", false, false, false, 88), "html", null, true);
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
        // line 91
        yield "        </tbody>
    </table>
</section>


<!-- DERNIÈRE COMPÉTITION -->
<section class=\"last-competition-section\">
    <h1>Dernière Compétition</h1>

";
        // line 100
        $context["lastCompetition"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), (isset($context["competitions"]) || array_key_exists("competitions", $context) ? $context["competitions"] : (function () { throw new RuntimeError('Variable "competitions" does not exist.', 100, $this->source); })()));
        // line 101
        yield "
    ";
        // line 102
        if ((($tmp = (isset($context["lastCompetition"]) || array_key_exists("lastCompetition", $context) ? $context["lastCompetition"] : (function () { throw new RuntimeError('Variable "lastCompetition" does not exist.', 102, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 103
            yield "        <div class=\"last-competition-card\">

            <div class=\"competition-header\">
                <div class=\"competition-info-text\">
                    <h3>";
            // line 107
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastCompetition"]) || array_key_exists("lastCompetition", $context) ? $context["lastCompetition"] : (function () { throw new RuntimeError('Variable "lastCompetition" does not exist.', 107, $this->source); })()), "titre", [], "any", false, false, false, 107), "html", null, true);
            yield "</h3>
                    <p><strong>Date :</strong> ";
            // line 108
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastCompetition"]) || array_key_exists("lastCompetition", $context) ? $context["lastCompetition"] : (function () { throw new RuntimeError('Variable "lastCompetition" does not exist.', 108, $this->source); })()), "date", [], "any", false, false, false, 108), "d/m/Y"), "html", null, true);
            yield "</p>
                    <p><strong>Lieu :</strong> ";
            // line 109
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastCompetition"]) || array_key_exists("lastCompetition", $context) ? $context["lastCompetition"] : (function () { throw new RuntimeError('Variable "lastCompetition" does not exist.', 109, $this->source); })()), "lieu", [], "any", false, false, false, 109), "html", null, true);
            yield "</p>
                    ";
            // line 110
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastCompetition"]) || array_key_exists("lastCompetition", $context) ? $context["lastCompetition"] : (function () { throw new RuntimeError('Variable "lastCompetition" does not exist.', 110, $this->source); })()), "classementEquipe", [], "any", false, false, false, 110)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 111
                yield "                        <p><strong>Classement de l'équipe :</strong> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastCompetition"]) || array_key_exists("lastCompetition", $context) ? $context["lastCompetition"] : (function () { throw new RuntimeError('Variable "lastCompetition" does not exist.', 111, $this->source); })()), "classementEquipe", [], "any", false, false, false, 111), "html", null, true);
                yield "</p>
                    ";
            }
            // line 113
            yield "                </div>

                ";
            // line 115
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastCompetition"]) || array_key_exists("lastCompetition", $context) ? $context["lastCompetition"] : (function () { throw new RuntimeError('Variable "lastCompetition" does not exist.', 115, $this->source); })()), "image", [], "any", false, false, false, 115)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 116
                yield "                    <div class=\"competition-photo\">
                        <img src=\"";
                // line 117
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/competitions/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastCompetition"]) || array_key_exists("lastCompetition", $context) ? $context["lastCompetition"] : (function () { throw new RuntimeError('Variable "lastCompetition" does not exist.', 117, $this->source); })()), "image", [], "any", false, false, false, 117))), "html", null, true);
                yield "\" alt=\"Photo compétition ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastCompetition"]) || array_key_exists("lastCompetition", $context) ? $context["lastCompetition"] : (function () { throw new RuntimeError('Variable "lastCompetition" does not exist.', 117, $this->source); })()), "titre", [], "any", false, false, false, 117), "html", null, true);
                yield "\">
                    </div>
                ";
            }
            // line 120
            yield "            </div>

            <h4>Résultats des Athlètes</h4>

<div class=\"results-table-container\">
    <table class=\"results-table\">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Catégorie</th>
                <th>Catégorie Poids(Kg)</th>
                <th>PDC (kg)</th>
                <th>Arraché (kg)</th>
                <th>Épaulé-Jeté (kg)</th>
                <th>Total (kg)</th>
                <th>Points</th>
                <th>Classée</th>
            </tr>
        </thead>
        <tbody>
            ";
            // line 141
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastCompetition"]) || array_key_exists("lastCompetition", $context) ? $context["lastCompetition"] : (function () { throw new RuntimeError('Variable "lastCompetition" does not exist.', 141, $this->source); })()), "results", [], "any", false, false, false, 141));
            foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
                // line 142
                yield "                <tr>
                    <td>";
                // line 143
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "nom", [], "any", false, false, false, 143), "html", null, true);
                yield "</td>
                    <td>";
                // line 144
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "prenom", [], "any", false, false, false, 144), "html", null, true);
                yield "</td>
                    <td>";
                // line 145
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "categorie", [], "any", false, false, false, 145), "html", null, true);
                yield "</td>
                    <td>";
                // line 146
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "categoriePoids", [], "any", false, false, false, 146), "html", null, true);
                yield "</td>
                     <td>";
                // line 147
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "pdc", [], "any", false, false, false, 147), "html", null, true);
                yield "</td>
                    <td>";
                // line 148
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "arracher", [], "any", false, false, false, 148), "html", null, true);
                yield "</td>
                    <td>";
                // line 149
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "epauleJete", [], "any", false, false, false, 149), "html", null, true);
                yield "</td>
                    <td>";
                // line 150
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "total", [], "any", false, false, false, 150), "html", null, true);
                yield "</td>
                    <td>";
                // line 151
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "point", [], "any", false, false, false, 151), "html", null, true);
                yield "</td>
                    <td>";
                // line 152
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "classee", [], "any", false, false, false, 152), "html", null, true);
                yield "</td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['result'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 155
            yield "        </tbody>
    </table>
</div>


        </div>

    ";
        } else {
            // line 163
            yield "        <p>Aucune compétition trouvée.</p>
    ";
        }
        // line 165
        yield "</section>


<section id=\"historique\" class=\"history-section\">
    <h1>Historique des Compétitions</h1 >

    <div class=\"history-list\">
        ";
        // line 172
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["competitions"]) || array_key_exists("competitions", $context) ? $context["competitions"] : (function () { throw new RuntimeError('Variable "competitions" does not exist.', 172, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["comp"]) {
            // line 173
            yield "            ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "id", [], "any", false, false, false, 173) != CoreExtension::getAttribute($this->env, $this->source, (isset($context["lastCompetition"]) || array_key_exists("lastCompetition", $context) ? $context["lastCompetition"] : (function () { throw new RuntimeError('Variable "lastCompetition" does not exist.', 173, $this->source); })()), "id", [], "any", false, false, false, 173))) {
                yield " ";
                // line 174
                yield "                <div class=\"history-card\">
                    <div class=\"card-banner\" style=\"background-image: url('";
                // line 175
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/competitions/" . CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "image", [], "any", false, false, false, 175))), "html", null, true);
                yield "');\"></div>
                    <div class=\"card-content\">
                        <h3>";
                // line 177
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "titre", [], "any", false, false, false, 177), "html", null, true);
                yield "</h3>
                        <p><strong>Date :</strong> ";
                // line 178
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "date", [], "any", false, false, false, 178), "d/m/Y"), "html", null, true);
                yield "</p>
                        <p><strong>Lieu :</strong> ";
                // line 179
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "lieu", [], "any", false, false, false, 179), "html", null, true);
                yield "</p>
                    </div>
                </div>
            ";
            }
            // line 183
            yield "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['comp'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 184
        yield "    </div>

    <div class=\"more-results\">
        <a class=\"more-btn\" href=\"#historique\">Voir plus de résultats</a>
    </div>
</section>


";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 194
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 195
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
\t <script src=\"";
        // line 196
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
        return "competitions/feminine.html.twig";
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
        return array (  487 => 196,  483 => 195,  473 => 194,  457 => 184,  451 => 183,  444 => 179,  440 => 178,  436 => 177,  431 => 175,  428 => 174,  424 => 173,  420 => 172,  411 => 165,  407 => 163,  397 => 155,  388 => 152,  384 => 151,  380 => 150,  376 => 149,  372 => 148,  368 => 147,  364 => 146,  360 => 145,  356 => 144,  352 => 143,  349 => 142,  345 => 141,  322 => 120,  314 => 117,  311 => 116,  309 => 115,  305 => 113,  299 => 111,  297 => 110,  293 => 109,  289 => 108,  285 => 107,  279 => 103,  277 => 102,  274 => 101,  272 => 100,  261 => 91,  244 => 88,  238 => 87,  234 => 86,  231 => 85,  214 => 84,  186 => 58,  176 => 54,  170 => 53,  164 => 50,  160 => 49,  156 => 47,  152 => 46,  126 => 23,  114 => 14,  108 => 10,  98 => 9,  87 => 6,  77 => 5,  60 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Équipe Féminine - Résultats{% endblock %}

{% block stylesheets %}
<link rel=\"stylesheet\" href=\"{{ asset('css/competitions/feminine.css') }}\">
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
        <img src=\"{{ asset('images/competitions/1.jpg') }}\" alt=\"Image Musculation Club\">
    </div>

    <!-- Contenu texte -->
    <div class=\"hero-content\">
        <h1>Équipe Féminine & résultats</h1>
        <p>Suivez de près le parcours de nos athlètes au fil de la saison. Retrouvez ici l’intégralité des classements, les performances individuelles et l’évolution des records <span>de notre équipe féminine.</span></p>
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

{% set lastCompetition = competitions|first %}

    {% if lastCompetition %}
        <div class=\"last-competition-card\">

            <div class=\"competition-header\">
                <div class=\"competition-info-text\">
                    <h3>{{ lastCompetition.titre }}</h3>
                    <p><strong>Date :</strong> {{ lastCompetition.date|date('d/m/Y') }}</p>
                    <p><strong>Lieu :</strong> {{ lastCompetition.lieu }}</p>
                    {% if lastCompetition.classementEquipe %}
                        <p><strong>Classement de l'équipe :</strong> {{ lastCompetition.classementEquipe }}</p>
                    {% endif %}
                </div>

                {% if lastCompetition.image %}
                    <div class=\"competition-photo\">
                        <img src=\"{{ asset('uploads/competitions/' ~ lastCompetition.image) }}\" alt=\"Photo compétition {{ lastCompetition.titre }}\">
                    </div>
                {% endif %}
            </div>

            <h4>Résultats des Athlètes</h4>

<div class=\"results-table-container\">
    <table class=\"results-table\">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Catégorie</th>
                <th>Catégorie Poids(Kg)</th>
                <th>PDC (kg)</th>
                <th>Arraché (kg)</th>
                <th>Épaulé-Jeté (kg)</th>
                <th>Total (kg)</th>
                <th>Points</th>
                <th>Classée</th>
            </tr>
        </thead>
        <tbody>
            {% for result in lastCompetition.results %}
                <tr>
                    <td>{{ result.nom }}</td>
                    <td>{{ result.prenom }}</td>
                    <td>{{ result.categorie }}</td>
                    <td>{{ result.categoriePoids }}</td>
                     <td>{{ result.pdc }}</td>
                    <td>{{ result.arracher }}</td>
                    <td>{{ result.epauleJete }}</td>
                    <td>{{ result.total }}</td>
                    <td>{{ result.point }}</td>
                    <td>{{ result.classee }}</td>
                </tr>
            {% endfor %}
        </tbody>
    </table>
</div>


        </div>

    {% else %}
        <p>Aucune compétition trouvée.</p>
    {% endif %}
</section>


<section id=\"historique\" class=\"history-section\">
    <h1>Historique des Compétitions</h1 >

    <div class=\"history-list\">
        {% for comp in competitions %}
            {% if comp.id != lastCompetition.id %} {# on exclut la dernière compétition #}
                <div class=\"history-card\">
                    <div class=\"card-banner\" style=\"background-image: url('{{ asset('uploads/competitions/' ~ comp.image) }}');\"></div>
                    <div class=\"card-content\">
                        <h3>{{ comp.titre }}</h3>
                        <p><strong>Date :</strong> {{ comp.date|date('d/m/Y') }}</p>
                        <p><strong>Lieu :</strong> {{ comp.lieu }}</p>
                    </div>
                </div>
            {% endif %}
        {% endfor %}
    </div>

    <div class=\"more-results\">
        <a class=\"more-btn\" href=\"#historique\">Voir plus de résultats</a>
    </div>
</section>


{% endblock %}

{% block javascripts %}
{{ parent() }}
\t <script src=\"{{ asset('js/competitions/competitions.js') }}\"></script>
{% endblock %}", "competitions/feminine.html.twig", "/Users/dheillyenzo/projet-chm/templates/competitions/feminine.html.twig");
    }
}
