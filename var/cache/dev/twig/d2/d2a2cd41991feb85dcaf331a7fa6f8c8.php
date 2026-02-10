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

/* dashboard/index.html.twig */
class __TwigTemplate_944c806fb5705546808ebd7d06fed3e4 extends Template
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
            'navbar' => [$this, 'block_navbar'],
            'footer' => [$this, 'block_footer'],
            'newsletter_script' => [$this, 'block_newsletter_script'],
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_navbar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "navbar"));

        // line 4
        yield "    ";
        yield from $this->load("dashboard/nav.html.twig", 4)->unwrap()->yield($context);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 8
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_newsletter_script(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "newsletter_script"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 10
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "CHM Saleux – Espace membre";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 12
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 13
        yield "\t";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
\t<link rel=\"stylesheet\" href=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/dashboard/dashboard.css"), "html", null, true);
        yield "\">
\t<link rel=\"stylesheet\" href=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/dashboard/nav.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/dashboard/licence.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/dashboard/event.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/dashboard/boutique.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/dashboard/user.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/dashboard/sidebar.css"), "html", null, true);
        yield "\">

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 24
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 25
        yield "
<div id=\"dashboard-loader\" style=\"
    position: fixed;
    inset: 0;
    background: #0D0D0D; /* fond blanc total */
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
\">
    <!-- Spinner + logo centré -->
    <div style=\"position: relative; width:90px; height:90px;\">
        
        <!-- Spinner -->
        <div style=\"
            width:90px;
            height:90px;
            border:3px solid #ddd;
            border-top-color:#000;
            border-radius:50%;
            animation: spin 1s linear infinite;
            position: absolute;
            top:0; left:0;
        \"></div>

        <!-- Logo centré, tourne doucement -->
        <img src=\"";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/favicon/icon.png"), "html", null, true);
        yield "\" alt=\"Logo Club\" style=\"
            width:50px;
            height:50px;
            position: absolute;
            top:50%;
            left:50%;
            transform: translate(-50%, -50%) rotate(0deg);
            animation: logo-spin 3s linear infinite;
        \">
    </div>
</div>

<div id=\"dashboard-overlay\"></div> ";
        // line 64
        yield "
<div class=\"dashboard-wrapper\">

";
        // line 67
        yield from $this->load("dashboard/sidebar.html.twig", 67)->unwrap()->yield($context);
        // line 68
        yield "\t
\t<div class=\"dashboard-main\">
\t\t
\t\t";
        // line 71
        yield from $this->load("dashboard/user_profile.html.twig", 71)->unwrap()->yield($context);
        // line 72
        yield "\t\t
\t\t<div class=\"dashboard-content\">
\t\t\t
\t\t\t";
        // line 75
        yield from $this->load("dashboard/tabs/dashboard.html.twig", 75)->unwrap()->yield($context);
        // line 76
        yield "\t\t\t";
        yield from $this->load("dashboard/tabs/licence.html.twig", 76)->unwrap()->yield($context);
        // line 77
        yield "\t\t\t";
        yield from $this->load("dashboard/tabs/planning.html.twig", 77)->unwrap()->yield($context);
        // line 78
        yield "            ";
        yield from $this->load("dashboard/tabs/event.html.twig", 78)->unwrap()->yield($context);
        // line 79
        yield "\t\t\t";
        yield from $this->load("dashboard/tabs/messages.html.twig", 79)->unwrap()->yield($context);
        // line 80
        yield "            ";
        yield from $this->load("dashboard/tabs/boutique.html.twig", 80)->unwrap()->yield(CoreExtension::merge($context, ["produits" => (isset($context["produits"]) || array_key_exists("produits", $context) ? $context["produits"] : (function () { throw new RuntimeError('Variable "produits" does not exist.', 80, $this->source); })())]));
        // line 81
        yield "            ";
        yield from $this->load("dashboard/change_password_sidebar.html.twig", 81)->unwrap()->yield($context);
        // line 82
        yield "\t\t\t
\t\t</div>
\t</div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 89
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 90
        yield "\t";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
\t<script src=\"";
        // line 91
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/dashboard/avatar-upload.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 92
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/dashboard/calendar.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 93
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/dashboard/licence.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 94
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/dashboard/loader.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 95
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/dashboard/sidebar.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 96
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/dashboard/refresh.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 97
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/dashboard/tabs.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 98
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/dashboard/event.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 99
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/dashboard/boutique.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 100
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/dashboard/nav.js"), "html", null, true);
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
        return "dashboard/index.html.twig";
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
        return array (  336 => 100,  332 => 99,  328 => 98,  324 => 97,  320 => 96,  316 => 95,  312 => 94,  308 => 93,  304 => 92,  300 => 91,  295 => 90,  285 => 89,  273 => 82,  270 => 81,  267 => 80,  264 => 79,  261 => 78,  258 => 77,  255 => 76,  253 => 75,  248 => 72,  246 => 71,  241 => 68,  239 => 67,  234 => 64,  219 => 51,  191 => 25,  181 => 24,  170 => 20,  166 => 19,  162 => 18,  158 => 17,  154 => 16,  150 => 15,  146 => 14,  141 => 13,  131 => 12,  114 => 10,  98 => 8,  82 => 7,  73 => 4,  63 => 3,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block navbar %}
    {% include 'dashboard/nav.html.twig' %}
{% endblock %}

{% block footer %}{% endblock %}
{% block newsletter_script %}{% endblock %}

{% block title %}CHM Saleux – Espace membre{% endblock %}

{% block stylesheets %}
\t{{ parent() }}
\t<link rel=\"stylesheet\" href=\"{{ asset('css/dashboard/dashboard.css') }}\">
\t<link rel=\"stylesheet\" href=\"{{ asset('css/dashboard/nav.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/dashboard/licence.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/dashboard/event.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/dashboard/boutique.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/dashboard/user.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/dashboard/sidebar.css') }}\">

{% endblock %}

{% block body %}

<div id=\"dashboard-loader\" style=\"
    position: fixed;
    inset: 0;
    background: #0D0D0D; /* fond blanc total */
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
\">
    <!-- Spinner + logo centré -->
    <div style=\"position: relative; width:90px; height:90px;\">
        
        <!-- Spinner -->
        <div style=\"
            width:90px;
            height:90px;
            border:3px solid #ddd;
            border-top-color:#000;
            border-radius:50%;
            animation: spin 1s linear infinite;
            position: absolute;
            top:0; left:0;
        \"></div>

        <!-- Logo centré, tourne doucement -->
        <img src=\"{{ asset('images/favicon/icon.png') }}\" alt=\"Logo Club\" style=\"
            width:50px;
            height:50px;
            position: absolute;
            top:50%;
            left:50%;
            transform: translate(-50%, -50%) rotate(0deg);
            animation: logo-spin 3s linear infinite;
        \">
    </div>
</div>

<div id=\"dashboard-overlay\"></div> {# doit être avant tout le reste pour couvrir tout #}

<div class=\"dashboard-wrapper\">

{% include 'dashboard/sidebar.html.twig' %}
\t
\t<div class=\"dashboard-main\">
\t\t
\t\t{% include 'dashboard/user_profile.html.twig' %}
\t\t
\t\t<div class=\"dashboard-content\">
\t\t\t
\t\t\t{% include 'dashboard/tabs/dashboard.html.twig' %}
\t\t\t{% include 'dashboard/tabs/licence.html.twig' %}
\t\t\t{% include 'dashboard/tabs/planning.html.twig' %}
            {% include 'dashboard/tabs/event.html.twig' %}
\t\t\t{% include 'dashboard/tabs/messages.html.twig' %}
            {% include 'dashboard/tabs/boutique.html.twig' with {'produits': produits} %}
            {% include 'dashboard/change_password_sidebar.html.twig' %}
\t\t\t
\t\t</div>
\t</div>
</div>
{% endblock %}


{% block javascripts %}
\t{{ parent() }}
\t<script src=\"{{ asset('js/dashboard/avatar-upload.js') }}\"></script>
    <script src=\"{{ asset('js/dashboard/calendar.js') }}\"></script>
    <script src=\"{{ asset('js/dashboard/licence.js') }}\"></script>
    <script src=\"{{ asset('js/dashboard/loader.js') }}\"></script>
    <script src=\"{{ asset('js/dashboard/sidebar.js') }}\"></script>
    <script src=\"{{ asset('js/dashboard/refresh.js') }}\"></script>
    <script src=\"{{ asset('js/dashboard/tabs.js') }}\"></script>
    <script src=\"{{ asset('js/dashboard/event.js') }}\"></script>
    <script src=\"{{ asset('js/dashboard/boutique.js') }}\"></script>
    <script src=\"{{ asset('js/dashboard/nav.js') }}\"></script>


{% endblock %}
", "dashboard/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/dashboard/index.html.twig");
    }
}
