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

/* admin/settings/index.html.twig */
class __TwigTemplate_078dd3742ccdb6c273568afdc0dfeab7 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/settings/index.html.twig"));

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

        yield "Paramètres";
        
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
    .settings-card {
        background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; margin-bottom: 2rem;
    }
    .card-title {
        font-size: 1rem; font-weight: 700; color: var(--text-main); margin: 0 0 1.5rem 0;
        padding-bottom: 1rem; border-bottom: 1px solid var(--border); text-transform: uppercase; letter-spacing: 0.5px;
    }

    /* Forms */
    .form-group { margin-bottom: 1.5rem; }
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    
    input[type=\"text\"], input[type=\"email\"] {
        width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main);
        padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; box-sizing: border-box;
    }
    
    /* Readonly style */
    input[readonly] {
        background: rgba(255,255,255,0.02); color: var(--text-muted); border-color: transparent; cursor: not-allowed;
    }

    /* Buttons */
    .btn {
        padding: 0.6rem 1.2rem; border-radius: 4px; font-weight: 600; cursor: pointer; transition: 0.2s; border: none; font-size: 0.9rem; display: inline-block; text-decoration: none;
    }
    .btn-primary { background: var(--accent); color: #fff; }
    .btn-primary:hover { background: var(--accent-hover); }
    
    .btn-danger { background: transparent; border: 1px solid #ef4444; color: #ef4444; }
    .btn-danger:hover { background: #ef4444; color: #fff; }

    /* --- TOGGLE SWITCH (Pour le mode sombre) --- */
    .switch-row { display: flex; justify-content: space-between; align-items: center; padding: 1rem 0; }
    .switch-info h4 { margin: 0; font-size: 0.95rem; color: var(--text-main); }
    .switch-info p { margin: 4px 0 0 0; font-size: 0.8rem; color: var(--text-muted); }

    .switch { position: relative; display: inline-block; width: 44px; height: 24px; }
    .switch input { opacity: 0; width: 0; height: 0; }
    .slider {
        position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0;
        background-color: var(--bg-darker); border: 1px solid var(--border);
        transition: .4s; border-radius: 24px;
    }
    .slider:before {
        position: absolute; content: \"\"; height: 16px; width: 16px; left: 3px; bottom: 3px;
        background-color: var(--text-muted); transition: .4s; border-radius: 50%;
    }
    input:checked + .slider { background-color: var(--accent); border-color: var(--accent); }
    input:checked + .slider:before { transform: translateX(20px); background-color: #fff; }

</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 70
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 71
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Paramètres</h1>
        <p>Gérez vos préférences personnelles et la sécurité du compte.</p>
    </div>

    <div class=\"settings-card\">
        <h3 class=\"card-title\">Mon Profil</h3>
        
        <div class=\"form-group\">
            <label>Identité</label>
            <input type=\"text\" value=\"";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 83, $this->source); })()), "user", [], "any", false, false, false, 83), "firstName", [], "any", false, false, false, 83), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 83, $this->source); })()), "user", [], "any", false, false, false, 83), "lastName", [], "any", false, false, false, 83), "html", null, true);
        yield "\" readonly>
        </div>

        <div class=\"form-group\">
            <label>Adresse E-mail</label>
            <input type=\"email\" value=\"";
        // line 88
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 88, $this->source); })()), "user", [], "any", false, false, false, 88), "email", [], "any", false, false, false, 88), "html", null, true);
        yield "\" readonly>
        </div>

        <div style=\"text-align: right;\">
            ";
        // line 93
        yield "            <button class=\"btn btn-primary\">Modifier le mot de passe</button>
        </div>
    </div>

    <div class=\"settings-card\">
        <h3 class=\"card-title\">Apparence & Interface</h3>
        
        <div class=\"switch-row\">
            <div class=\"switch-info\">
                <h4>Thème Sombre</h4>
                <p>Basculer entre le mode clair et le mode sombre.</p>
            </div>
            <label class=\"switch\">
                <input type=\"checkbox\" id=\"themeToggleCheckbox\">
                <span class=\"slider\"></span>
            </label>
        </div>
    </div>

    <div class=\"settings-card\">
        <h3 class=\"card-title\">Sécurité</h3>
        
        <div class=\"form-group\">
            <label>Dernière connexion</label>
            <div style=\"font-family: monospace; color: var(--text-main);\">
                ";
        // line 118
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 118, $this->source); })()), "user", [], "any", false, false, false, 118), "lastLoginAt", [], "any", false, false, false, 118)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 118, $this->source); })()), "user", [], "any", false, false, false, 118), "lastLoginAt", [], "any", false, false, false, 118), "d/m/Y à H:i:s"), "html", null, true)) : ("N/A"));
        yield "
            </div>
        </div>

        <div class=\"form-group\">
            <label>Adresse IP</label>
            <div style=\"font-family: monospace; color: var(--text-main);\">
                ";
        // line 125
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 125), "lastLoginIp", [], "any", true, true, false, 125) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 125, $this->source); })()), "user", [], "any", false, false, false, 125), "lastLoginIp", [], "any", false, false, false, 125)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 125, $this->source); })()), "user", [], "any", false, false, false, 125), "lastLoginIp", [], "any", false, false, false, 125), "html", null, true)) : ("Non enregistrée"));
        yield "
            </div>
        </div>

        <div style=\"margin-top: 2rem; border-top: 1px solid var(--border); padding-top: 1.5rem;\">
            <button class=\"btn btn-danger\" onclick=\"alert('Fonctionnalité de déconnexion globale à implémenter.');\">
                Déconnecter toutes les autres sessions
            </button>
        </div>
    </div>

</div>

<script>
    // Logique du Toggle Switch pour le thème
    document.addEventListener('DOMContentLoaded', () => {
        const toggle = document.getElementById('themeToggleCheckbox');
        const currentTheme = localStorage.getItem('theme');

        // État initial
        if (currentTheme === 'light') {
            toggle.checked = false; // \"Sombre\" est off
        } else {
            toggle.checked = true; // \"Sombre\" est on (par défaut)
        }

        toggle.addEventListener('change', () => {
            if (toggle.checked) {
                // Activer Dark Mode
                document.documentElement.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
            } else {
                // Activer Light Mode
                document.documentElement.setAttribute('data-theme', 'light');
                localStorage.setItem('theme', 'light');
            }
        });
    });
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/settings/index.html.twig";
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
        return array (  234 => 125,  224 => 118,  197 => 93,  190 => 88,  180 => 83,  166 => 71,  156 => 70,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Paramètres{% endblock %}

{% block stylesheets %}
<style>
    /* =================== PAGE STYLE =================== */
    .dashboard-container { width: 100%; max-width: 800px; margin: 0 auto; }

    /* Header */
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }

    /* Cards */
    .settings-card {
        background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; margin-bottom: 2rem;
    }
    .card-title {
        font-size: 1rem; font-weight: 700; color: var(--text-main); margin: 0 0 1.5rem 0;
        padding-bottom: 1rem; border-bottom: 1px solid var(--border); text-transform: uppercase; letter-spacing: 0.5px;
    }

    /* Forms */
    .form-group { margin-bottom: 1.5rem; }
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    
    input[type=\"text\"], input[type=\"email\"] {
        width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main);
        padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; box-sizing: border-box;
    }
    
    /* Readonly style */
    input[readonly] {
        background: rgba(255,255,255,0.02); color: var(--text-muted); border-color: transparent; cursor: not-allowed;
    }

    /* Buttons */
    .btn {
        padding: 0.6rem 1.2rem; border-radius: 4px; font-weight: 600; cursor: pointer; transition: 0.2s; border: none; font-size: 0.9rem; display: inline-block; text-decoration: none;
    }
    .btn-primary { background: var(--accent); color: #fff; }
    .btn-primary:hover { background: var(--accent-hover); }
    
    .btn-danger { background: transparent; border: 1px solid #ef4444; color: #ef4444; }
    .btn-danger:hover { background: #ef4444; color: #fff; }

    /* --- TOGGLE SWITCH (Pour le mode sombre) --- */
    .switch-row { display: flex; justify-content: space-between; align-items: center; padding: 1rem 0; }
    .switch-info h4 { margin: 0; font-size: 0.95rem; color: var(--text-main); }
    .switch-info p { margin: 4px 0 0 0; font-size: 0.8rem; color: var(--text-muted); }

    .switch { position: relative; display: inline-block; width: 44px; height: 24px; }
    .switch input { opacity: 0; width: 0; height: 0; }
    .slider {
        position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0;
        background-color: var(--bg-darker); border: 1px solid var(--border);
        transition: .4s; border-radius: 24px;
    }
    .slider:before {
        position: absolute; content: \"\"; height: 16px; width: 16px; left: 3px; bottom: 3px;
        background-color: var(--text-muted); transition: .4s; border-radius: 50%;
    }
    input:checked + .slider { background-color: var(--accent); border-color: var(--accent); }
    input:checked + .slider:before { transform: translateX(20px); background-color: #fff; }

</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Paramètres</h1>
        <p>Gérez vos préférences personnelles et la sécurité du compte.</p>
    </div>

    <div class=\"settings-card\">
        <h3 class=\"card-title\">Mon Profil</h3>
        
        <div class=\"form-group\">
            <label>Identité</label>
            <input type=\"text\" value=\"{{ app.user.firstName }} {{ app.user.lastName }}\" readonly>
        </div>

        <div class=\"form-group\">
            <label>Adresse E-mail</label>
            <input type=\"email\" value=\"{{ app.user.email }}\" readonly>
        </div>

        <div style=\"text-align: right;\">
            {# Lien vers une page de modification de mot de passe si elle existe, sinon bouton fictif #}
            <button class=\"btn btn-primary\">Modifier le mot de passe</button>
        </div>
    </div>

    <div class=\"settings-card\">
        <h3 class=\"card-title\">Apparence & Interface</h3>
        
        <div class=\"switch-row\">
            <div class=\"switch-info\">
                <h4>Thème Sombre</h4>
                <p>Basculer entre le mode clair et le mode sombre.</p>
            </div>
            <label class=\"switch\">
                <input type=\"checkbox\" id=\"themeToggleCheckbox\">
                <span class=\"slider\"></span>
            </label>
        </div>
    </div>

    <div class=\"settings-card\">
        <h3 class=\"card-title\">Sécurité</h3>
        
        <div class=\"form-group\">
            <label>Dernière connexion</label>
            <div style=\"font-family: monospace; color: var(--text-main);\">
                {{ app.user.lastLoginAt ? app.user.lastLoginAt|date('d/m/Y à H:i:s') : 'N/A' }}
            </div>
        </div>

        <div class=\"form-group\">
            <label>Adresse IP</label>
            <div style=\"font-family: monospace; color: var(--text-main);\">
                {{ app.user.lastLoginIp ?? 'Non enregistrée' }}
            </div>
        </div>

        <div style=\"margin-top: 2rem; border-top: 1px solid var(--border); padding-top: 1.5rem;\">
            <button class=\"btn btn-danger\" onclick=\"alert('Fonctionnalité de déconnexion globale à implémenter.');\">
                Déconnecter toutes les autres sessions
            </button>
        </div>
    </div>

</div>

<script>
    // Logique du Toggle Switch pour le thème
    document.addEventListener('DOMContentLoaded', () => {
        const toggle = document.getElementById('themeToggleCheckbox');
        const currentTheme = localStorage.getItem('theme');

        // État initial
        if (currentTheme === 'light') {
            toggle.checked = false; // \"Sombre\" est off
        } else {
            toggle.checked = true; // \"Sombre\" est on (par défaut)
        }

        toggle.addEventListener('change', () => {
            if (toggle.checked) {
                // Activer Dark Mode
                document.documentElement.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
            } else {
                // Activer Light Mode
                document.documentElement.setAttribute('data-theme', 'light');
                localStorage.setItem('theme', 'light');
            }
        });
    });
</script>
{% endblock %}", "admin/settings/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/settings/index.html.twig");
    }
}
