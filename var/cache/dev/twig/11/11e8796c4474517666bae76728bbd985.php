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

/* admin/updates/result.html.twig */
class __TwigTemplate_3968927ac77e04ca09feb43105ea9f0b extends Template
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
        return "admin/base_admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/updates/result.html.twig"));

        $this->parent = $this->load("admin/base_admin.html.twig", 1);
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

        yield "Résultat de la mise à jour";
        
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
        yield "<style>
    /* =================== PAGE STYLE =================== */
    .dashboard-container { width: 100%; max-width: 1000px; margin: 0 auto; }

    /* Header */
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }

    /* Terminal / Console Style */
    .terminal-window {
        background-color: #09090b; /* Noir très profond */
        border: 1px solid #333;
        border-radius: 6px;
        padding: 1.5rem;
        font-family: \"Consolas\", \"Monaco\", \"Courier New\", monospace;
        font-size: 0.9rem;
        color: #d4d4d8;
        overflow-x: auto;
        box-shadow: 0 4px 20px rgba(0,0,0,0.4);
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .log-line {
        display: block;
        border-bottom: 1px solid rgba(255,255,255,0.03);
        padding: 2px 0;
    }
    
    /* Coloration syntaxique simple */
    .log-line:before { content: \"> \"; color: #555; user-select: none; }
    
    .text-success { color: #22c55e; }
    .text-error { color: #ef4444; }
    .text-info { color: #3b82f6; }

    /* Actions */
    .btn-return {
        background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main);
        padding: 0.7rem 1.5rem; border-radius: 4px; font-weight: 600; text-decoration: none;
        display: inline-flex; align-items: center; transition: 0.2s;
    }
    .btn-return:hover { border-color: var(--text-muted); }

</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 54
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 55
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Rapport d'exécution</h1>
        <p>Détail des opérations effectuées sur le serveur.</p>
    </div>

    <div class=\"terminal-window\">
        ";
        // line 63
        if ((array_key_exists("output", $context) &&  !Twig\Extension\CoreExtension::testEmpty((isset($context["output"]) || array_key_exists("output", $context) ? $context["output"] : (function () { throw new RuntimeError('Variable "output" does not exist.', 63, $this->source); })())))) {
            // line 64
            yield "            ";
            // line 65
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["output"]) || array_key_exists("output", $context) ? $context["output"] : (function () { throw new RuntimeError('Variable "output" does not exist.', 65, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
                // line 66
                yield "                <span class=\"log-line\">
                    ";
                // line 68
                yield "                    ";
                if ((CoreExtension::inFilter("success", Twig\Extension\CoreExtension::lower($this->env->getCharset(), $context["line"])) || CoreExtension::inFilter("ok", Twig\Extension\CoreExtension::lower($this->env->getCharset(), $context["line"])))) {
                    // line 69
                    yield "                        <span class=\"text-success\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["line"], "html", null, true);
                    yield "</span>
                    ";
                } elseif (((CoreExtension::inFilter("error", Twig\Extension\CoreExtension::lower($this->env->getCharset(),                 // line 70
$context["line"])) || CoreExtension::inFilter("fail", Twig\Extension\CoreExtension::lower($this->env->getCharset(), $context["line"]))) || CoreExtension::inFilter("exception", Twig\Extension\CoreExtension::lower($this->env->getCharset(), $context["line"])))) {
                    // line 71
                    yield "                        <span class=\"text-error\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["line"], "html", null, true);
                    yield "</span>
                    ";
                } else {
                    // line 73
                    yield "                        ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["line"], "html", null, true);
                    yield "
                    ";
                }
                // line 75
                yield "                </span>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['line'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            yield "        ";
        } else {
            // line 78
            yield "            <span class=\"log-line text-error\">Aucune sortie de commande disponible ou variable 'output' manquante.</span>
        ";
        }
        // line 80
        yield "        
        <br>
        <span class=\"log-line text-info\">--- Fin du processus ---</span>
    </div>

    <div>
        <a href=\"";
        // line 86
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_updates_index");
        yield "\" class=\"btn-return\">
            ⬅ Retour aux mises à jour
        </a>
    </div>

</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/updates/result.html.twig";
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
        return array (  216 => 86,  208 => 80,  204 => 78,  201 => 77,  194 => 75,  188 => 73,  182 => 71,  180 => 70,  175 => 69,  172 => 68,  169 => 66,  164 => 65,  162 => 64,  160 => 63,  150 => 55,  140 => 54,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Résultat de la mise à jour{% endblock %}

{% block stylesheets %}
<style>
    /* =================== PAGE STYLE =================== */
    .dashboard-container { width: 100%; max-width: 1000px; margin: 0 auto; }

    /* Header */
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }

    /* Terminal / Console Style */
    .terminal-window {
        background-color: #09090b; /* Noir très profond */
        border: 1px solid #333;
        border-radius: 6px;
        padding: 1.5rem;
        font-family: \"Consolas\", \"Monaco\", \"Courier New\", monospace;
        font-size: 0.9rem;
        color: #d4d4d8;
        overflow-x: auto;
        box-shadow: 0 4px 20px rgba(0,0,0,0.4);
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .log-line {
        display: block;
        border-bottom: 1px solid rgba(255,255,255,0.03);
        padding: 2px 0;
    }
    
    /* Coloration syntaxique simple */
    .log-line:before { content: \"> \"; color: #555; user-select: none; }
    
    .text-success { color: #22c55e; }
    .text-error { color: #ef4444; }
    .text-info { color: #3b82f6; }

    /* Actions */
    .btn-return {
        background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main);
        padding: 0.7rem 1.5rem; border-radius: 4px; font-weight: 600; text-decoration: none;
        display: inline-flex; align-items: center; transition: 0.2s;
    }
    .btn-return:hover { border-color: var(--text-muted); }

</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Rapport d'exécution</h1>
        <p>Détail des opérations effectuées sur le serveur.</p>
    </div>

    <div class=\"terminal-window\">
        {% if output is defined and output is not empty %}
            {# On boucle sur 'output' et on appelle chaque ligne 'line' #}
            {% for line in output %}
                <span class=\"log-line\">
                    {# Petite logique pour colorer si succès ou erreur #}
                    {% if 'success' in line|lower or 'ok' in line|lower %}
                        <span class=\"text-success\">{{ line }}</span>
                    {% elseif 'error' in line|lower or 'fail' in line|lower or 'exception' in line|lower %}
                        <span class=\"text-error\">{{ line }}</span>
                    {% else %}
                        {{ line }}
                    {% endif %}
                </span>
            {% endfor %}
        {% else %}
            <span class=\"log-line text-error\">Aucune sortie de commande disponible ou variable 'output' manquante.</span>
        {% endif %}
        
        <br>
        <span class=\"log-line text-info\">--- Fin du processus ---</span>
    </div>

    <div>
        <a href=\"{{ path('admin_updates_index') }}\" class=\"btn-return\">
            ⬅ Retour aux mises à jour
        </a>
    </div>

</div>
{% endblock %}", "admin/updates/result.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/updates/result.html.twig");
    }
}
