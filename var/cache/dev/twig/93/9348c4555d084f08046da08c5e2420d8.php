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

/* menu_dropdown/index.html.twig */
class __TwigTemplate_2841093df4e3eb0fb189f06687d44258 extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
            'page_stylesheets' => [$this, 'block_page_stylesheets'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu_dropdown/index.html.twig"));

        // line 1
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 8
        yield "
<div id=\"club-panel\" class=\"nav-hover-panel\">
    <div class=\"nav-hover-panel-content\">
        <div class=\"panel-column\">
            <h3>Services du Club</h3>
            <a href=\"";
        // line 13
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("halterophilie");
        yield "\">Haltérophilie</a>
            <a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("musculation");
        yield "\">Musculation</a>
            <a href=\"";
        // line 15
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cours_collectifs");
        yield "\">Cours collectifs</a>
            <a href=\"";
        // line 16
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("seance_essai");
        yield "\">Séance d'essai</a>
            <a href=\"";
        // line 17
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("evenements");
        yield "\">Événements organisés</a>
            <a href=\"";
        // line 18
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sauna");
        yield "\">Sauna</a>
        </div>

        <div class=\"panel-column\">
            <h3>Membres du bureau</h3>
            <a href=\"";
        // line 23
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("president");
        yield "\">Le Président</a>
            <a href=\"";
        // line 24
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("tresorier");
        yield "\">Le Trésorier</a>
            <a href=\"";
        // line 25
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("secretaire");
        yield "\">La Secrétaire</a>
            <a href=\"";
        // line 26
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("membres_bureau");
        yield "\">Les membres du bureau</a>
        </div>

        <div class=\"panel-column\">
            <h3>A propos de notre club</h3>
            <a href=\"";
        // line 31
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_club");
        yield "\">Présentation du club</a>
            <a href=\"";
        // line 32
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("labels_club");
        yield "\">Les labels du club</a>
            <a href=\"";
        // line 33
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("horaires");
        yield "\">Les horaires</a>
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 1
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 2
        yield "    ";
        // line 3
        yield "    <link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/menu_dropdown/index.css"), "html", null, true);
        yield "\">
    
    ";
        // line 6
        yield "    ";
        yield from $this->unwrap()->yieldBlock('page_stylesheets', $context, $blocks);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_stylesheets"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "menu_dropdown/index.html.twig";
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
        return array (  143 => 6,  137 => 3,  135 => 2,  125 => 1,  112 => 33,  108 => 32,  104 => 31,  96 => 26,  92 => 25,  88 => 24,  84 => 23,  76 => 18,  72 => 17,  68 => 16,  64 => 15,  60 => 14,  56 => 13,  49 => 8,  47 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% block stylesheets %}
    {# CSS global du menu dropdown #}
    <link rel=\"stylesheet\" href=\"{{ asset('css/menu_dropdown/index.css') }}\">
    
    {# CSS spécifique à chaque page #}
    {% block page_stylesheets %}{% endblock %}
{% endblock %}

<div id=\"club-panel\" class=\"nav-hover-panel\">
    <div class=\"nav-hover-panel-content\">
        <div class=\"panel-column\">
            <h3>Services du Club</h3>
            <a href=\"{{ path('halterophilie') }}\">Haltérophilie</a>
            <a href=\"{{ path('musculation') }}\">Musculation</a>
            <a href=\"{{ path('cours_collectifs') }}\">Cours collectifs</a>
            <a href=\"{{ path('seance_essai') }}\">Séance d'essai</a>
            <a href=\"{{ path('evenements') }}\">Événements organisés</a>
            <a href=\"{{ path('sauna') }}\">Sauna</a>
        </div>

        <div class=\"panel-column\">
            <h3>Membres du bureau</h3>
            <a href=\"{{ path('president') }}\">Le Président</a>
            <a href=\"{{ path('tresorier') }}\">Le Trésorier</a>
            <a href=\"{{ path('secretaire') }}\">La Secrétaire</a>
            <a href=\"{{ path('membres_bureau') }}\">Les membres du bureau</a>
        </div>

        <div class=\"panel-column\">
            <h3>A propos de notre club</h3>
            <a href=\"{{ path('app_club') }}\">Présentation du club</a>
            <a href=\"{{ path('labels_club') }}\">Les labels du club</a>
            <a href=\"{{ path('horaires') }}\">Les horaires</a>
        </div>
    </div>
</div>
", "menu_dropdown/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/menu_dropdown/index.html.twig");
    }
}
