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

/* menu_dropdown/a_propos_de_notre_club/presentation_club/index.html.twig */
class __TwigTemplate_b97ff774180c601560438e8c9e86c301 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu_dropdown/a_propos_de_notre_club/presentation_club/index.html.twig"));

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

        yield "Le club - CHM Saleux
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/menu_dropdown/a_propos_de_notre_club/presentation_club/index.css"), "html", null, true);
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
<header class=\"hero-header\">
    <div class=\"overlay\"></div>

        <a href=\"";
        // line 15
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
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/menu_dropdown/a_propos_de_notre_club/presentation_club/ddd.jpg"), "html", null, true);
        yield "\" alt=\"Image Musculation Club\">
    </div>

    <!-- Contenu texte -->
<div class=\"hero-content\">
        <h1>Présentation du Club</h1>
        <p>Notre club, c'est un peu votre deuxième maison. Découvrez l'histoire d'une association bâtie sur l'amitié et le partage, où l'on vient pour soulever des barres mais où l'on reste pour <span>les bons moments.</span></p>
    </div>
</header>

<main class=\"club-page\">

    ";
        // line 37
        yield "    <section id=\"club-histoire\" class=\"club-section club-section-alt\">
        <div class=\"container club-section-grid\">
            <div class=\"club-text-block\">
                <h2>NOTRE HISTOIRE</h2>
            <p>
    Fondé en 1984 au cœur de Saleux par Michel et Francine, le CHM est né d’une volonté simple : offrir un espace sérieux, chaleureux et accessible où chacun peut évoluer en halterophilie & musculation. Au fil des années, le club s’est développé autour de valeurs fortes telles que la progression, le partage et le respect. Grâce à l’engagement de ses fondateurs et de ses membres, le CHM est devenu un lieu incontournable pour tous ceux qui souhaitent s’entraîner dans une ambiance conviviale et motivante.
</p>

                <p>
                    Des centaines d’adhérents sont passés par nos bancs, chacun avec son objectif : prise de masse, perte de poids, préparation physique, bien-être ou performance. Le CHM Saleux est devenu un acteur incontournable du sport local.
                </p>
            </div>

            <div class=\"club-image-block\">
                <img src=\"";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/menu_dropdown/a_propos_de_notre_club/presentation_club/2.jpg"), "html", null, true);
        yield "\" alt=\"Photo du club\">
            </div>
        </div>
    </section>

    ";
        // line 57
        yield "    <section id=\"club-president\" class=\"club-section\">
        <div class=\"container club-section-grid\">
            <div class=\"club-president-photo\">
                <img src=\"";
        // line 60
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/president.jpg"), "html", null, true);
        yield "\" alt=\"Président du CHM Saleux\">
            </div>

            <div class=\"club-president-text\">
                <h2>NOTRE PRÉSIDENT</h2>
                <h3>Florian ROHAUT</h3>

                <p>
                    À la tête du club, Florian porte les valeurs fondatrices du CHM : passion, discipline et convivialité. Ancien compétiteur, il met son expérience au service de tous, du débutant au confirmé.
                </p>
                <p>
                    Sous son impulsion, le club s’est modernisé tout en conservant l’esprit associatif qui fait sa force : entraide, respect et motivation collective.
                </p>
            </div>
        </div>
    </section>

    ";
        // line 78
        yield "    <section class=\"club-section\">
        <div class=\"container\">
            <h2>NOS VALEURS</h2>

            <div class=\"club-values-grid\">
                <article class=\"club-value-card\">
                    <h3>Dépassement de soi</h3>
                    <p>La progression se construit dans la constance. Au CHM, nous valorisons l’effort intelligent et durable.</p>
                </article>

                <article class=\"club-value-card\">
                    <h3>Respect & convivialité</h3>
                    <p>Quel que soit ton niveau, tu es accueilli ici avec bienveillance. L’esprit du club : se soutenir et progresser ensemble.</p>
                </article>

                <article class=\"club-value-card\">
                    <h3>Accessibilité</h3>
                    <p>Débuter ici ne demande aucune condition préalable. Tu évolues à ton rythme, accompagné si besoin.</p>
                </article>

                <article class=\"club-value-card\">
                    <h3>Encadrement & sécurité</h3>
                    <p>Nos priorités : technique, charge adaptée, sécurité et prévention des blessures.</p>
                </article>
            </div>
        </div>
    </section>

    ";
        // line 107
        yield "    <section id=\"club-bureau\" class=\"club-section club-section-alt\">
        <div class=\"container\">
            <h2>LE BUREAU DU CLUB</h2>

            <div class=\"club-bureau-grid\">

                <article class=\"bureau-card\">
                    <img src=\"";
        // line 114
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/bureau-president.png"), "html", null, true);
        yield "\" alt=\"Président du club\">
                    <h3>Président</h3>
                    <p>Florian ROHAUT</p>
                </article>

                <article class=\"bureau-card\">
                    <img src=\"";
        // line 120
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/bureau-secretaire.png"), "html", null, true);
        yield "\" alt=\"Secrétaire du club\">
                    <h3>Secrétaire</h3>
                    <p>Ema BERTRAND</p>
                </article>

                <article class=\"bureau-card\">
                    <img src=\"";
        // line 126
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/bureau-tresorier.png"), "html", null, true);
        yield "\" alt=\"Trésorier du club\">
                    <h3>Trésorier</h3>
                    <p>Aurore BERTRAND</p>
                </article>

                <article class=\"bureau-card\">
                    <img src=\"";
        // line 132
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/bg3.jpg"), "html", null, true);
        yield "\" alt=\"Membre du bureau\">
                    <h3>Membre</h3>
                    <p>Marianne NOM</p>
                </article>

            </div>
        </div>
    </section>

    ";
        // line 142
        yield "    <section class=\"next-section album-section\">
        <div class=\"container\">
            <h2 class=\"section-title\">ALBUM PHOTOS DU CLUB</h2>

            <div class=\"album-marquee\">
                <div class=\"album-track\">
                    ";
        // line 148
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 17));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 149
            yield "                        <div class=\"album-slide\"><img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("images/club" . $context["i"]) . ".jpg")), "html", null, true);
            yield "\" alt=\"Photo du club ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
            yield "\"></div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 151
        yield "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 17));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 152
            yield "                        <div class=\"album-slide\"><img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("images/club" . $context["i"]) . ".jpg")), "html", null, true);
            yield "\" alt=\"Photo du club ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
            yield "\"></div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 154
        yield "                </div>
            </div>
        </div>
    </section>

    ";
        // line 160
        yield "    <section class=\"club-cta-final\">
        <div class=\"container\">
            <h2>ENVIE DE REJOINDRE LE CHM SALEUX ?</h2>
            <p>Viens découvrir le club lors de ta première séance. Pas de pression : juste l’envie de progresser dans une ambiance motivante.</p>

            <div class=\"club-cta-actions\">
                <a href=\"#\" class=\"btn-primary js-open-register-modal\">CRÉER MON COMPTE</a>
            </div>
        </div>
    </section>

</main>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "menu_dropdown/a_propos_de_notre_club/presentation_club/index.html.twig";
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
        return array (  314 => 160,  307 => 154,  296 => 152,  291 => 151,  280 => 149,  276 => 148,  268 => 142,  256 => 132,  247 => 126,  238 => 120,  229 => 114,  220 => 107,  190 => 78,  170 => 60,  165 => 57,  157 => 51,  141 => 37,  126 => 24,  114 => 15,  108 => 11,  98 => 10,  87 => 7,  77 => 6,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Le club - CHM Saleux
{% endblock %}

{% block stylesheets %}
\t<link rel=\"stylesheet\" href=\"{{ asset('css/menu_dropdown/a_propos_de_notre_club/presentation_club/index.css') }}\">
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
        <img src=\"{{ asset('images/menu_dropdown/a_propos_de_notre_club/presentation_club/ddd.jpg') }}\" alt=\"Image Musculation Club\">
    </div>

    <!-- Contenu texte -->
<div class=\"hero-content\">
        <h1>Présentation du Club</h1>
        <p>Notre club, c'est un peu votre deuxième maison. Découvrez l'histoire d'une association bâtie sur l'amitié et le partage, où l'on vient pour soulever des barres mais où l'on reste pour <span>les bons moments.</span></p>
    </div>
</header>

<main class=\"club-page\">

    {# ========================== HISTOIRE ========================== #}
    <section id=\"club-histoire\" class=\"club-section club-section-alt\">
        <div class=\"container club-section-grid\">
            <div class=\"club-text-block\">
                <h2>NOTRE HISTOIRE</h2>
            <p>
    Fondé en 1984 au cœur de Saleux par Michel et Francine, le CHM est né d’une volonté simple : offrir un espace sérieux, chaleureux et accessible où chacun peut évoluer en halterophilie & musculation. Au fil des années, le club s’est développé autour de valeurs fortes telles que la progression, le partage et le respect. Grâce à l’engagement de ses fondateurs et de ses membres, le CHM est devenu un lieu incontournable pour tous ceux qui souhaitent s’entraîner dans une ambiance conviviale et motivante.
</p>

                <p>
                    Des centaines d’adhérents sont passés par nos bancs, chacun avec son objectif : prise de masse, perte de poids, préparation physique, bien-être ou performance. Le CHM Saleux est devenu un acteur incontournable du sport local.
                </p>
            </div>

            <div class=\"club-image-block\">
                <img src=\"{{ asset('images/menu_dropdown/a_propos_de_notre_club/presentation_club/2.jpg') }}\" alt=\"Photo du club\">
            </div>
        </div>
    </section>

    {# ========================== PRÉSIDENT ========================== #}
    <section id=\"club-president\" class=\"club-section\">
        <div class=\"container club-section-grid\">
            <div class=\"club-president-photo\">
                <img src=\"{{ asset('images/club/president.jpg') }}\" alt=\"Président du CHM Saleux\">
            </div>

            <div class=\"club-president-text\">
                <h2>NOTRE PRÉSIDENT</h2>
                <h3>Florian ROHAUT</h3>

                <p>
                    À la tête du club, Florian porte les valeurs fondatrices du CHM : passion, discipline et convivialité. Ancien compétiteur, il met son expérience au service de tous, du débutant au confirmé.
                </p>
                <p>
                    Sous son impulsion, le club s’est modernisé tout en conservant l’esprit associatif qui fait sa force : entraide, respect et motivation collective.
                </p>
            </div>
        </div>
    </section>

    {# ========================== VALEURS ========================== #}
    <section class=\"club-section\">
        <div class=\"container\">
            <h2>NOS VALEURS</h2>

            <div class=\"club-values-grid\">
                <article class=\"club-value-card\">
                    <h3>Dépassement de soi</h3>
                    <p>La progression se construit dans la constance. Au CHM, nous valorisons l’effort intelligent et durable.</p>
                </article>

                <article class=\"club-value-card\">
                    <h3>Respect & convivialité</h3>
                    <p>Quel que soit ton niveau, tu es accueilli ici avec bienveillance. L’esprit du club : se soutenir et progresser ensemble.</p>
                </article>

                <article class=\"club-value-card\">
                    <h3>Accessibilité</h3>
                    <p>Débuter ici ne demande aucune condition préalable. Tu évolues à ton rythme, accompagné si besoin.</p>
                </article>

                <article class=\"club-value-card\">
                    <h3>Encadrement & sécurité</h3>
                    <p>Nos priorités : technique, charge adaptée, sécurité et prévention des blessures.</p>
                </article>
            </div>
        </div>
    </section>

    {# ========================== BUREAU ========================== #}
    <section id=\"club-bureau\" class=\"club-section club-section-alt\">
        <div class=\"container\">
            <h2>LE BUREAU DU CLUB</h2>

            <div class=\"club-bureau-grid\">

                <article class=\"bureau-card\">
                    <img src=\"{{ asset('images/club/bureau-president.png') }}\" alt=\"Président du club\">
                    <h3>Président</h3>
                    <p>Florian ROHAUT</p>
                </article>

                <article class=\"bureau-card\">
                    <img src=\"{{ asset('images/club/bureau-secretaire.png') }}\" alt=\"Secrétaire du club\">
                    <h3>Secrétaire</h3>
                    <p>Ema BERTRAND</p>
                </article>

                <article class=\"bureau-card\">
                    <img src=\"{{ asset('images/club/bureau-tresorier.png') }}\" alt=\"Trésorier du club\">
                    <h3>Trésorier</h3>
                    <p>Aurore BERTRAND</p>
                </article>

                <article class=\"bureau-card\">
                    <img src=\"{{ asset('images/club/bg3.jpg') }}\" alt=\"Membre du bureau\">
                    <h3>Membre</h3>
                    <p>Marianne NOM</p>
                </article>

            </div>
        </div>
    </section>

    {# ========================== ALBUM ========================== #}
    <section class=\"next-section album-section\">
        <div class=\"container\">
            <h2 class=\"section-title\">ALBUM PHOTOS DU CLUB</h2>

            <div class=\"album-marquee\">
                <div class=\"album-track\">
                    {% for i in 1..17 %}
                        <div class=\"album-slide\"><img src=\"{{ asset('images/club' ~ i ~ '.jpg') }}\" alt=\"Photo du club {{ i }}\"></div>
                    {% endfor %}
                    {% for i in 1..17 %}
                        <div class=\"album-slide\"><img src=\"{{ asset('images/club' ~ i ~ '.jpg') }}\" alt=\"Photo du club {{ i }}\"></div>
                    {% endfor %}
                </div>
            </div>
        </div>
    </section>

    {# ========================== CTA FINAL ========================== #}
    <section class=\"club-cta-final\">
        <div class=\"container\">
            <h2>ENVIE DE REJOINDRE LE CHM SALEUX ?</h2>
            <p>Viens découvrir le club lors de ta première séance. Pas de pression : juste l’envie de progresser dans une ambiance motivante.</p>

            <div class=\"club-cta-actions\">
                <a href=\"#\" class=\"btn-primary js-open-register-modal\">CRÉER MON COMPTE</a>
            </div>
        </div>
    </section>

</main>
{% endblock %}
", "menu_dropdown/a_propos_de_notre_club/presentation_club/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/menu_dropdown/a_propos_de_notre_club/presentation_club/index.html.twig");
    }
}
