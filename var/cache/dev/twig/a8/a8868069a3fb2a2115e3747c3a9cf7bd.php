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

/* admin/updates/index.html.twig */
class __TwigTemplate_5fe4da542e031b655a53dbec0d348c8e extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/updates/index.html.twig"));

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

        yield "Mises à jour système";
        
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
    .dashboard-container { width: 100%; max-width: 800px; margin: 0 auto; }

    /* Header */
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }

    /* Cards */
    .content-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; }

    /* Version Display */
    .version-display {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: var(--bg-darker);
        border: 1px solid var(--border);
        padding: 2rem;
        border-radius: 4px;
        margin-bottom: 2rem;
    }

    .version-info h3 { margin: 0 0 0.5rem 0; font-size: 0.9rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; }
    .version-number { font-size: 2.5rem; font-weight: 800; color: var(--text-main); line-height: 1; }
    .version-status { display: inline-block; margin-top: 10px; font-size: 0.8rem; color: #22c55e; background: rgba(34, 197, 94, 0.1); padding: 4px 8px; border-radius: 4px; }

    /* Warning Box */
    .warning-box {
        background: rgba(245, 158, 11, 0.05);
        border-left: 4px solid #f59e0b;
        padding: 1rem 1.5rem;
        margin-bottom: 2rem;
        color: #e5e7eb;
        font-size: 0.95rem;
        line-height: 1.6;
    }
    .warning-title { display: block; font-weight: 700; color: #f59e0b; margin-bottom: 0.5rem; text-transform: uppercase; font-size: 0.8rem; }

    /* Actions */
    .actions-row { display: flex; justify-content: flex-end; }
    
    .btn-update {
        background: var(--accent); color: #fff; padding: 0.8rem 2rem; border: none; border-radius: 4px;
        font-weight: 600; cursor: pointer; font-size: 1rem; text-decoration: none; display: inline-flex; align-items: center;
        transition: background 0.2s; box-shadow: 0 4px 12px rgba(255, 102, 0, 0.2);
    }
    .btn-update:hover { background: var(--accent-hover); transform: translateY(-1px); }

</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 59
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 60
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Mises à jour système</h1>
        <p>Gestion de la version de l'application et maintenance.</p>
    </div>

    <div class=\"content-card\">
        
        <div class=\"version-display\">
            <div class=\"version-info\">
                <h3>Version Actuelle</h3>
                <div class=\"version-number\">";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["version"]) || array_key_exists("version", $context) ? $context["version"] : (function () { throw new RuntimeError('Variable "version" does not exist.', 72, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"version-status\">Système opérationnel</div>
            </div>
            
            <div style=\"opacity: 0.2;\">
                <svg width=\"64\" height=\"64\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1\" stroke-linecap=\"round\" stroke-linejoin=\"round\" style=\"color: var(--text-main);\">
                    <path d=\"M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8\"></path>
                    <path d=\"M3 3v5h5\"></path>
                    <path d=\"M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16\"></path>
                    <path d=\"M16 16h5v5\"></path>
                </svg>
            </div>
        </div>

        <div class=\"warning-box\">
            <span class=\"warning-title\">Important avant de procéder</span>
            Lancer une mise à jour peut entraîner une indisponibilité temporaire du site (quelques secondes).
            Assurez-vous d'avoir effectué une sauvegarde de la base de données récemment.
        </div>

        <div class=\"actions-row\">
            <a href=\"";
        // line 93
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_updates_run");
        yield "\" class=\"btn-update\" onclick=\"return confirm('⚠️ Êtes-vous sûr de vouloir lancer la mise à jour ?\\n\\nCela va récupérer le dernier code et mettre à jour la base de données.');\">
                Rechercher et installer les mises à jour
            </a>
        </div>

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
        return "admin/updates/index.html.twig";
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
        return array (  193 => 93,  169 => 72,  155 => 60,  145 => 59,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Mises à jour système{% endblock %}

{% block stylesheets %}
<style>
    /* =================== PAGE STYLE =================== */
    .dashboard-container { width: 100%; max-width: 800px; margin: 0 auto; }

    /* Header */
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }

    /* Cards */
    .content-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; }

    /* Version Display */
    .version-display {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: var(--bg-darker);
        border: 1px solid var(--border);
        padding: 2rem;
        border-radius: 4px;
        margin-bottom: 2rem;
    }

    .version-info h3 { margin: 0 0 0.5rem 0; font-size: 0.9rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; }
    .version-number { font-size: 2.5rem; font-weight: 800; color: var(--text-main); line-height: 1; }
    .version-status { display: inline-block; margin-top: 10px; font-size: 0.8rem; color: #22c55e; background: rgba(34, 197, 94, 0.1); padding: 4px 8px; border-radius: 4px; }

    /* Warning Box */
    .warning-box {
        background: rgba(245, 158, 11, 0.05);
        border-left: 4px solid #f59e0b;
        padding: 1rem 1.5rem;
        margin-bottom: 2rem;
        color: #e5e7eb;
        font-size: 0.95rem;
        line-height: 1.6;
    }
    .warning-title { display: block; font-weight: 700; color: #f59e0b; margin-bottom: 0.5rem; text-transform: uppercase; font-size: 0.8rem; }

    /* Actions */
    .actions-row { display: flex; justify-content: flex-end; }
    
    .btn-update {
        background: var(--accent); color: #fff; padding: 0.8rem 2rem; border: none; border-radius: 4px;
        font-weight: 600; cursor: pointer; font-size: 1rem; text-decoration: none; display: inline-flex; align-items: center;
        transition: background 0.2s; box-shadow: 0 4px 12px rgba(255, 102, 0, 0.2);
    }
    .btn-update:hover { background: var(--accent-hover); transform: translateY(-1px); }

</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Mises à jour système</h1>
        <p>Gestion de la version de l'application et maintenance.</p>
    </div>

    <div class=\"content-card\">
        
        <div class=\"version-display\">
            <div class=\"version-info\">
                <h3>Version Actuelle</h3>
                <div class=\"version-number\">{{ version }}</div>
                <div class=\"version-status\">Système opérationnel</div>
            </div>
            
            <div style=\"opacity: 0.2;\">
                <svg width=\"64\" height=\"64\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1\" stroke-linecap=\"round\" stroke-linejoin=\"round\" style=\"color: var(--text-main);\">
                    <path d=\"M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8\"></path>
                    <path d=\"M3 3v5h5\"></path>
                    <path d=\"M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16\"></path>
                    <path d=\"M16 16h5v5\"></path>
                </svg>
            </div>
        </div>

        <div class=\"warning-box\">
            <span class=\"warning-title\">Important avant de procéder</span>
            Lancer une mise à jour peut entraîner une indisponibilité temporaire du site (quelques secondes).
            Assurez-vous d'avoir effectué une sauvegarde de la base de données récemment.
        </div>

        <div class=\"actions-row\">
            <a href=\"{{ path('admin_updates_run') }}\" class=\"btn-update\" onclick=\"return confirm('⚠️ Êtes-vous sûr de vouloir lancer la mise à jour ?\\n\\nCela va récupérer le dernier code et mettre à jour la base de données.');\">
                Rechercher et installer les mises à jour
            </a>
        </div>

    </div>
</div>
{% endblock %}", "admin/updates/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/updates/index.html.twig");
    }
}
