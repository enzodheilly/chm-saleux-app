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

/* 1_accueil/section4/section4.html.twig */
class __TwigTemplate_b7c3ade36f273a7ba83a7325913db9c6 extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "1_accueil/section4/section4.html.twig"));

        // line 1
        yield "
<main>
<section class=\"news-section\">
\t<h2 class=\"news-title\">
\t\tDÉCOUVREZ LES
\t\t<span>DERNIÈRES ACTUALITÉS</span>
\t</h2>
\t<p class=\"news-subtitle\">
\t\tSuivez les performances, événements et moments forts de notre club !
\t</p>
\t<div class=\"news-grid\">
";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), (isset($context["articles"]) || array_key_exists("articles", $context) ? $context["articles"] : (function () { throw new RuntimeError('Variable "articles" does not exist.', 12, $this->source); })()), 0, 18));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 13
            yield "    <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("article_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["article"], "id", [], "any", false, false, false, 13)]), "html", null, true);
            yield "\" class=\"news-card\">
        ";
            // line 14
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["article"], "photo", [], "any", false, false, false, 14)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 15
                yield "            <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, $context["article"], "photo", [], "any", false, false, false, 15))), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "title", [], "any", false, false, false, 15), "html", null, true);
                yield "\">
        ";
            } else {
                // line 17
                yield "            <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/default-article.png"), "html", null, true);
                yield "\" alt=\"Image par défaut\">
        ";
            }
            // line 19
            yield "        <div class=\"news-overlay\">
            <h4>
                ";
            // line 21
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["article"], "title", [], "any", false, false, false, 21)) > 30)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["article"], "title", [], "any", false, false, false, 21), 0, 30) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "title", [], "any", false, false, false, 21), "html", null, true)));
            yield "
            </h4>
            <p>
                ";
            // line 24
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["article"], "description", [], "any", false, false, false, 24)) > 50)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["article"], "description", [], "any", false, false, false, 24), 0, 50) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "description", [], "any", false, false, false, 24), "html", null, true)));
            yield "
            </p>
        </div>
    </a>
";
            $context['_iterated'] = true;
        }
        // line 28
        if (!$context['_iterated']) {
            // line 29
            yield "    <p>Aucune actualité pour le moment.</p>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['article'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        yield "

\t</div>

        <a href=\"";
        // line 35
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("actualites");
        yield "\" class=\"btn-news\">Voir plus d'actualités</a>

</section>
<section class=\"faq-section\">
\t<div class=\"faq-header\">
\t\t<h2>Questions fréquentes</h2>
\t\t<p>Retrouvez ici les réponses aux questions les plus courantes sur nos abonnements et nos activités.</p>
\t</div>

\t<div
\t\tclass=\"faq-page\">
\t\t<!-- ✅ même classe que dans le CSS -->
\t\t<div
\t\t\tclass=\"faq-items\">
\t\t\t<!-- ✅ même classe que dans le CSS -->
\t\t\t<div class=\"faq-item\">
\t\t\t\t<button class=\"faq-question\">Quels types d'abonnements propose le CHM Saleux ?</button>
\t\t\t\t<div class=\"faq-answer\">
\t\t\t\t\tNous proposons des abonnements adaptés à tous les âges et niveaux :
\t\t\t\t\t<ul>
\t\t\t\t\t\t<li>Compétition Haltérophilie (Jeunes, Adultes)</li>
\t\t\t\t\t\t<li>Loisir Musculation & Haltérophilie (tout âge)</li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<button class=\"faq-question\">Quelle est la différence entre les licences ?</button>
\t\t\t\t<div class=\"faq-answer\">
\t\t\t\t\tLa licence compétition jeune (14-20 ans) inclut un encadrement adapté et des compétitions juniors, tandis que la licence adulte donne accès complet à la salle et aux compétitions officielles.
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<button class=\"faq-question\">Que comprend l'abonnement Loisir Musculation & Haltérophilie ?</button>
\t\t\t\t<div class=\"faq-answer\">
\t\t\t\t\tIl comprend l’accès libre à la salle de musculation, l’haltérophilie loisir encadrée, le cardio, les cours collectifs et une ambiance conviviale.
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<button class=\"faq-question\">Quels équipements sont disponibles dans la salle ?</button>
\t\t\t\t<div class=\"faq-answer\">
\t\t\t\t\tRacks, bancs, barres olympiques, haltères, kettlebells, machines de musculation et un espace cardio complet sont disponibles.
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<a href=\"";
        // line 82
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("faq");
        yield "\" class=\"faq-more\">VOIR TOUTES LES FAQ ➜</a>
\t\t</div>

\t\t<div class=\"faq-contact\">
\t\t\t<h3>VOUS NE TROUVEZ PAS VOTRE RÉPONSE ?</h3>
\t\t\t<p>Contactez-nous pour toute question spécifique, notre équipe se fera un plaisir de vous répondre.</p>

\t\t\t<div class=\"button-wrap\">
  <a href=\"";
        // line 90
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("contact");
        yield "\" class=\"btn-club\">
    <span style=\"color:black;\">NOUS CONTACTER</span>
  </a>
  <div class=\"button-shadow\"></div>
</div>
\t\t</div>
\t</div>
</section>
</main>
 <script src=\"";
        // line 99
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/accueil/section4/faq.js"), "html", null, true);
        yield "\" defer></script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "1_accueil/section4/section4.html.twig";
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
        return array (  191 => 99,  179 => 90,  168 => 82,  118 => 35,  112 => 31,  105 => 29,  103 => 28,  94 => 24,  88 => 21,  84 => 19,  78 => 17,  70 => 15,  68 => 14,  63 => 13,  58 => 12,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("
<main>
<section class=\"news-section\">
\t<h2 class=\"news-title\">
\t\tDÉCOUVREZ LES
\t\t<span>DERNIÈRES ACTUALITÉS</span>
\t</h2>
\t<p class=\"news-subtitle\">
\t\tSuivez les performances, événements et moments forts de notre club !
\t</p>
\t<div class=\"news-grid\">
{% for article in articles|slice(0, 18) %}
    <a href=\"{{ path('article_show', { id: article.id }) }}\" class=\"news-card\">
        {% if article.photo %}
            <img src=\"{{ asset('uploads/' ~ article.photo) }}\" alt=\"{{ article.title }}\">
        {% else %}
            <img src=\"{{ asset('images/default-article.png') }}\" alt=\"Image par défaut\">
        {% endif %}
        <div class=\"news-overlay\">
            <h4>
                {{ article.title|length > 30 ? article.title|slice(0, 30) ~ '...' : article.title }}
            </h4>
            <p>
                {{ article.description|length > 50 ? article.description|slice(0,50) ~ '...' : article.description }}
            </p>
        </div>
    </a>
{% else %}
    <p>Aucune actualité pour le moment.</p>
{% endfor %}


\t</div>

        <a href=\"{{ path('actualites') }}\" class=\"btn-news\">Voir plus d'actualités</a>

</section>
<section class=\"faq-section\">
\t<div class=\"faq-header\">
\t\t<h2>Questions fréquentes</h2>
\t\t<p>Retrouvez ici les réponses aux questions les plus courantes sur nos abonnements et nos activités.</p>
\t</div>

\t<div
\t\tclass=\"faq-page\">
\t\t<!-- ✅ même classe que dans le CSS -->
\t\t<div
\t\t\tclass=\"faq-items\">
\t\t\t<!-- ✅ même classe que dans le CSS -->
\t\t\t<div class=\"faq-item\">
\t\t\t\t<button class=\"faq-question\">Quels types d'abonnements propose le CHM Saleux ?</button>
\t\t\t\t<div class=\"faq-answer\">
\t\t\t\t\tNous proposons des abonnements adaptés à tous les âges et niveaux :
\t\t\t\t\t<ul>
\t\t\t\t\t\t<li>Compétition Haltérophilie (Jeunes, Adultes)</li>
\t\t\t\t\t\t<li>Loisir Musculation & Haltérophilie (tout âge)</li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<button class=\"faq-question\">Quelle est la différence entre les licences ?</button>
\t\t\t\t<div class=\"faq-answer\">
\t\t\t\t\tLa licence compétition jeune (14-20 ans) inclut un encadrement adapté et des compétitions juniors, tandis que la licence adulte donne accès complet à la salle et aux compétitions officielles.
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<button class=\"faq-question\">Que comprend l'abonnement Loisir Musculation & Haltérophilie ?</button>
\t\t\t\t<div class=\"faq-answer\">
\t\t\t\t\tIl comprend l’accès libre à la salle de musculation, l’haltérophilie loisir encadrée, le cardio, les cours collectifs et une ambiance conviviale.
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"faq-item\">
\t\t\t\t<button class=\"faq-question\">Quels équipements sont disponibles dans la salle ?</button>
\t\t\t\t<div class=\"faq-answer\">
\t\t\t\t\tRacks, bancs, barres olympiques, haltères, kettlebells, machines de musculation et un espace cardio complet sont disponibles.
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<a href=\"{{ path('faq') }}\" class=\"faq-more\">VOIR TOUTES LES FAQ ➜</a>
\t\t</div>

\t\t<div class=\"faq-contact\">
\t\t\t<h3>VOUS NE TROUVEZ PAS VOTRE RÉPONSE ?</h3>
\t\t\t<p>Contactez-nous pour toute question spécifique, notre équipe se fera un plaisir de vous répondre.</p>

\t\t\t<div class=\"button-wrap\">
  <a href=\"{{ path('contact') }}\" class=\"btn-club\">
    <span style=\"color:black;\">NOUS CONTACTER</span>
  </a>
  <div class=\"button-shadow\"></div>
</div>
\t\t</div>
\t</div>
</section>
</main>
 <script src=\"{{ asset('js/accueil/section4/faq.js') }}\" defer></script>
", "1_accueil/section4/section4.html.twig", "/Users/dheillyenzo/projet-chm/templates/1_accueil/section4/section4.html.twig");
    }
}
