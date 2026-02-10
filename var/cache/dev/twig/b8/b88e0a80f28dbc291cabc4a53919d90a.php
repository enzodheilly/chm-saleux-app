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
class __TwigTemplate_956fca53d2cd1fdb62fd42bba54f2fd9 extends Template
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
        yield "    <link rel=\"stylesheet\" href=\"";
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
        // line 16
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

<main class=\"main-container\">

    <section class=\"section calendar-section\">
        <div class=\"section-header\">
            <h2>Agenda Sportif</h2>
            <div class=\"header-line\"></div>
        </div>

        <div class=\"calendar-wrapper\">
            <div class=\"calendar-card\">
                <div class=\"calendar-header\">
                    <button class=\"nav-btn prev-month\" aria-label=\"Précédent\">&lt;</button>
                    <h3>Décembre 2025</h3>
                    <button class=\"nav-btn next-month\" aria-label=\"Suivant\">&gt;</button>
                </div>
                
                <div class=\"calendar-grid\">
                    <div class=\"day-name\">Lun</div>
                    <div class=\"day-name\">Mar</div>
                    <div class=\"day-name\">Mer</div>
                    <div class=\"day-name\">Jeu</div>
                    <div class=\"day-name\">Ven</div>
                    <div class=\"day-name\">Sam</div>
                    <div class=\"day-name\">Dim</div>

                    ";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["day"]) {
            // line 55
            yield "                        ";
            // line 56
            yield "                        ";
            $context["is_competition"] = CoreExtension::inFilter($context["day"], [5, 12, 20]);
            // line 57
            yield "                        
                        <div class=\"day-cell ";
            // line 58
            if ((($tmp = (isset($context["is_competition"]) || array_key_exists("is_competition", $context) ? $context["is_competition"] : (function () { throw new RuntimeError('Variable "is_competition" does not exist.', 58, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "has-event";
            }
            yield "\">
                            <span class=\"day-number\">";
            // line 59
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["day"], "html", null, true);
            yield "</span>
                            ";
            // line 60
            if ((($tmp = (isset($context["is_competition"]) || array_key_exists("is_competition", $context) ? $context["is_competition"] : (function () { throw new RuntimeError('Variable "is_competition" does not exist.', 60, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 61
                yield "                                <div class=\"event-dot\"></div>
                                <div class=\"event-pill\">Compétition</div>
                            ";
            }
            // line 64
            yield "                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['day'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        yield "                </div>
            </div>
        </div>
    </section>

<section class=\"section teams-section\">
        <div class=\"section-header\">
            <h2>Nos Équipes</h2>
            <div class=\"header-line\"></div>
        </div>

        <div class=\"teams-grid\">
            <a href=\"";
        // line 78
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("competitions_feminine");
        yield "\" class=\"team-card card-feminine\">
                <div class=\"card-image-wrapper\">
                    <div class=\"card-bg\" style=\"background-image: url('";
        // line 80
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/female-team.jpg"), "html", null, true);
        yield "');\"></div>
                    <div class=\"card-gradient\"></div>
                </div>
                
                <div class=\"card-content\">
                    <div class=\"card-top\">
                        <span class=\"category-pill\">Division 1</span>
                        <div class=\"card-icon\">
                            <i class=\"icon-arrow-right\"></i> </div>
                    </div>
                    
                    <div class=\"card-bottom\">
                        <h3 class=\"team-title\">Section<br><span>Féminine</span></h3>
                        <p class=\"team-desc\">Résultats, classements et agenda des matchs.</p>
                        <div class=\"card-cta\">
                            <span class=\"cta-text\">Voir le détail</span>
                            <span class=\"cta-line\"></span>
                        </div>
                    </div>
                </div>
            </a>

            <a href=\"";
        // line 102
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("competitions_masculine");
        yield "\" class=\"team-card card-masculine\">
                <div class=\"card-image-wrapper\">
                    <div class=\"card-bg\" style=\"background-image: url('";
        // line 104
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/male-team.jpg"), "html", null, true);
        yield "');\"></div>
                    <div class=\"card-gradient\"></div>
                </div>
                
                <div class=\"card-content\">
                    <div class=\"card-top\">
                        <span class=\"category-pill\">Division 1</span>
                        <div class=\"card-icon\">
                            <i class=\"icon-arrow-right\"></i>
                        </div>
                    </div>
                    
                    <div class=\"card-bottom\">
                        <h3 class=\"team-title\">Section<br><span>Masculine</span></h3>
                        <p class=\"team-desc\">Performances, effectifs et calendriers.</p>
                        <div class=\"card-cta\">
                            <span class=\"cta-text\">Voir le détail</span>
                            <span class=\"cta-line\"></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </section>

</main>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 132
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 133
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script src=\"";
        // line 134
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
        return array (  295 => 134,  290 => 133,  280 => 132,  245 => 104,  240 => 102,  215 => 80,  210 => 78,  196 => 66,  189 => 64,  184 => 61,  182 => 60,  178 => 59,  172 => 58,  169 => 57,  166 => 56,  164 => 55,  160 => 54,  119 => 16,  112 => 12,  108 => 10,  98 => 9,  87 => 6,  77 => 5,  60 => 3,  43 => 1,);
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

<main class=\"main-container\">

    <section class=\"section calendar-section\">
        <div class=\"section-header\">
            <h2>Agenda Sportif</h2>
            <div class=\"header-line\"></div>
        </div>

        <div class=\"calendar-wrapper\">
            <div class=\"calendar-card\">
                <div class=\"calendar-header\">
                    <button class=\"nav-btn prev-month\" aria-label=\"Précédent\">&lt;</button>
                    <h3>Décembre 2025</h3>
                    <button class=\"nav-btn next-month\" aria-label=\"Suivant\">&gt;</button>
                </div>
                
                <div class=\"calendar-grid\">
                    <div class=\"day-name\">Lun</div>
                    <div class=\"day-name\">Mar</div>
                    <div class=\"day-name\">Mer</div>
                    <div class=\"day-name\">Jeu</div>
                    <div class=\"day-name\">Ven</div>
                    <div class=\"day-name\">Sam</div>
                    <div class=\"day-name\">Dim</div>

                    {% for day in 1..31 %}
                        {# Exemple de logique pour les compétitions #}
                        {% set is_competition = day in [5,12,20] %}
                        
                        <div class=\"day-cell {% if is_competition %}has-event{% endif %}\">
                            <span class=\"day-number\">{{ day }}</span>
                            {% if is_competition %}
                                <div class=\"event-dot\"></div>
                                <div class=\"event-pill\">Compétition</div>
                            {% endif %}
                        </div>
                    {% endfor %}
                </div>
            </div>
        </div>
    </section>

<section class=\"section teams-section\">
        <div class=\"section-header\">
            <h2>Nos Équipes</h2>
            <div class=\"header-line\"></div>
        </div>

        <div class=\"teams-grid\">
            <a href=\"{{ path('competitions_feminine') }}\" class=\"team-card card-feminine\">
                <div class=\"card-image-wrapper\">
                    <div class=\"card-bg\" style=\"background-image: url('{{ asset('images/female-team.jpg') }}');\"></div>
                    <div class=\"card-gradient\"></div>
                </div>
                
                <div class=\"card-content\">
                    <div class=\"card-top\">
                        <span class=\"category-pill\">Division 1</span>
                        <div class=\"card-icon\">
                            <i class=\"icon-arrow-right\"></i> </div>
                    </div>
                    
                    <div class=\"card-bottom\">
                        <h3 class=\"team-title\">Section<br><span>Féminine</span></h3>
                        <p class=\"team-desc\">Résultats, classements et agenda des matchs.</p>
                        <div class=\"card-cta\">
                            <span class=\"cta-text\">Voir le détail</span>
                            <span class=\"cta-line\"></span>
                        </div>
                    </div>
                </div>
            </a>

            <a href=\"{{ path('competitions_masculine') }}\" class=\"team-card card-masculine\">
                <div class=\"card-image-wrapper\">
                    <div class=\"card-bg\" style=\"background-image: url('{{ asset('images/male-team.jpg') }}');\"></div>
                    <div class=\"card-gradient\"></div>
                </div>
                
                <div class=\"card-content\">
                    <div class=\"card-top\">
                        <span class=\"category-pill\">Division 1</span>
                        <div class=\"card-icon\">
                            <i class=\"icon-arrow-right\"></i>
                        </div>
                    </div>
                    
                    <div class=\"card-bottom\">
                        <h3 class=\"team-title\">Section<br><span>Masculine</span></h3>
                        <p class=\"team-desc\">Performances, effectifs et calendriers.</p>
                        <div class=\"card-cta\">
                            <span class=\"cta-text\">Voir le détail</span>
                            <span class=\"cta-line\"></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </section>

</main>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src=\"{{ asset('js/competitions/competitions.js') }}\"></script>
{% endblock %}", "competitions/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/competitions/index.html.twig");
    }
}
