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

/* 0_home/index.html.twig */
class __TwigTemplate_f1cc191309a5a2d7acdb613178f4f578 extends Template
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
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 2
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "0_home/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 5
        yield "\t";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
\t<link rel=\"stylesheet\" href=\"";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/accueil/section1/section1.css"), "html", null, true);
        yield "\">
\t<link rel=\"stylesheet\" href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/accueil/section2/section2.css"), "html", null, true);
        yield "\">
\t<link rel=\"stylesheet\" href=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/accueil/section3/section3.css"), "html", null, true);
        yield "\">
\t<link rel=\"stylesheet\" href=\"";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/accueil/section4/section4.css"), "html", null, true);
        yield "\">
\t<link rel=\"stylesheet\" href=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/accueil/section5/section5.css"), "html", null, true);
        yield "\">
\t<link rel=\"stylesheet\" href=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/accueil/section6/section6.css"), "html", null, true);
        yield "\">
\t<link rel=\"stylesheet\" href=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/accueil/section8/section8.css"), "html", null, true);
        yield "\">
\t<link rel=\"stylesheet\" href=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/accueil/section9/section9.css"), "html", null, true);
        yield "\">
\t<link rel=\"stylesheet\" href=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/accueil/section10/section10.css"), "html", null, true);
        yield "\">
\t
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 18
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Accueil – CHM Saleux
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 21
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 22
        yield from $this->load("1_accueil/section1/section1.html.twig", 22)->unwrap()->yield(CoreExtension::merge($context, ["membershipDuration" =>         // line 23
(isset($context["membershipDuration"]) || array_key_exists("membershipDuration", $context) ? $context["membershipDuration"] : (function () { throw new RuntimeError('Variable "membershipDuration" does not exist.', 23, $this->source); })())]));
        // line 25
        yield "\t";
        yield from $this->load("1_accueil/section2/section2.html.twig", 25)->unwrap()->yield($context);
        // line 26
        yield "\t";
        yield from $this->load("1_accueil/section8/section8.html.twig", 26)->unwrap()->yield($context);
        // line 27
        yield "\t";
        yield from $this->load("1_accueil/section10/section10.html.twig", 27)->unwrap()->yield($context);
        // line 28
        yield "\t";
        yield from $this->load("1_accueil/section3/section3.html.twig", 28)->unwrap()->yield($context);
        // line 29
        yield "\t";
        yield from $this->load("1_accueil/section5/section5.html.twig", 29)->unwrap()->yield($context);
        // line 30
        yield "\t";
        yield from $this->load("1_accueil/section9/section9.html.twig", 30)->unwrap()->yield($context);
        // line 31
        yield "\t";
        yield from $this->load("1_accueil/section4/section4.html.twig", 31)->unwrap()->yield($context);
        // line 32
        yield "
";
        // line 33
        if ((($tmp = (isset($context["showSetPasswordModal"]) || array_key_exists("showSetPasswordModal", $context) ? $context["showSetPasswordModal"] : (function () { throw new RuntimeError('Variable "showSetPasswordModal" does not exist.', 33, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 34
            yield "    <script>
        document.addEventListener(\"DOMContentLoaded\", function() {
            const modal = document.getElementById('setPasswordModal');
            if (modal) modal.classList.add('is-open');
        });
    </script>
";
        }
        // line 41
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "0_home/index.html.twig";
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
        return array (  183 => 41,  174 => 34,  172 => 33,  169 => 32,  166 => 31,  163 => 30,  160 => 29,  157 => 28,  154 => 27,  151 => 26,  148 => 25,  146 => 23,  145 => 22,  135 => 21,  117 => 18,  106 => 14,  102 => 13,  98 => 12,  94 => 11,  90 => 10,  86 => 9,  82 => 8,  78 => 7,  74 => 6,  69 => 5,  59 => 4,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/0_home/index.html.twig #}
{% extends 'base.html.twig' %}

{% block stylesheets %}
\t{{ parent() }}
\t<link rel=\"stylesheet\" href=\"{{ asset('css/accueil/section1/section1.css') }}\">
\t<link rel=\"stylesheet\" href=\"{{ asset('css/accueil/section2/section2.css') }}\">
\t<link rel=\"stylesheet\" href=\"{{ asset('css/accueil/section3/section3.css') }}\">
\t<link rel=\"stylesheet\" href=\"{{ asset('css/accueil/section4/section4.css') }}\">
\t<link rel=\"stylesheet\" href=\"{{ asset('css/accueil/section5/section5.css') }}\">
\t<link rel=\"stylesheet\" href=\"{{ asset('css/accueil/section6/section6.css') }}\">
\t<link rel=\"stylesheet\" href=\"{{ asset('css/accueil/section8/section8.css') }}\">
\t<link rel=\"stylesheet\" href=\"{{ asset('css/accueil/section9/section9.css') }}\">
\t<link rel=\"stylesheet\" href=\"{{ asset('css/accueil/section10/section10.css') }}\">
\t
{% endblock %}

{% block title %}Accueil – CHM Saleux
{% endblock %}

{% block body %}
{% include '1_accueil/section1/section1.html.twig' with {
    membershipDuration: membershipDuration
} %}
\t{% include '1_accueil/section2/section2.html.twig' %}
\t{% include '1_accueil/section8/section8.html.twig' %}
\t{% include '1_accueil/section10/section10.html.twig'%}
\t{% include '1_accueil/section3/section3.html.twig' %}
\t{% include '1_accueil/section5/section5.html.twig' %}
\t{% include '1_accueil/section9/section9.html.twig' %}
\t{% include '1_accueil/section4/section4.html.twig' %}

{% if showSetPasswordModal %}
    <script>
        document.addEventListener(\"DOMContentLoaded\", function() {
            const modal = document.getElementById('setPasswordModal');
            if (modal) modal.classList.add('is-open');
        });
    </script>
{% endif %}

{% endblock %}
", "0_home/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/0_home/index.html.twig");
    }
}
