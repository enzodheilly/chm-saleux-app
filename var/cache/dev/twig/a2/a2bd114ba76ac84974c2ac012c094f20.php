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

/* admin/users/new.html.twig */
class __TwigTemplate_9f80df078ca7491d481b6ae82b1af129 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/users/new.html.twig"));

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

        yield "Nouvel utilisateur";
        
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
    .dashboard-container {
        width: 100%;
        max-width: 1000px; /* On limite la largeur pour la lisibilité du formulaire */
        margin: 0 auto;
    }

    /* Header */
    .page-header {
        margin-bottom: 2rem;
        border-bottom: 1px solid var(--border);
        padding-bottom: 1rem;
    }
    .page-header h1 {
        margin: 0;
        font-size: 1.6rem;
        font-weight: 700;
        color: var(--text-main);
        letter-spacing: -0.5px;
    }
    .page-header p {
        margin: 5px 0 0 0;
        color: var(--text-muted);
        font-size: 0.9rem;
    }

    /* Carte du formulaire */
    .form-card {
        background: var(--bg-light);
        border: 1px solid var(--border);
        border-radius: 4px;
        padding: 2rem;
    }

    /* Styles des Champs Symfony */
    /* Note : Symfony entoure souvent les form_row d'une div. On cible ces divs ici. */
    .form-card > form > div {
        margin-bottom: 1.5rem;
    }

    /* Labels */
    label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text-main);
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Inputs & Selects */
    input[type=\"text\"],
    input[type=\"email\"],
    input[type=\"password\"],
    select {
        width: 100%;
        background: var(--bg-darker); /* Fond légèrement plus foncé que la carte */
        border: 1px solid var(--border);
        color: var(--text-main);
        padding: 0.7rem 1rem;
        border-radius: 4px;
        font-size: 0.95rem;
        outline: none;
        transition: border-color 0.2s;
        box-sizing: border-box; /* Important pour ne pas déborder */
    }

    input:focus,
    select:focus {
        border-color: var(--accent);
    }

    /* Gestion des erreurs (Symfony helper) */
    .invalid-feedback, ul li {
        color: #ef4444;
        font-size: 0.85rem;
        margin-top: 5px;
        list-style: none;
    }

    /* Zone des Actions (Boutons) */
    .form-actions {
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border);
        display: flex;
        justify-content: flex-end; /* Alignement à droite standard pro */
        gap: 1rem;
    }

    /* Bouton Principal */
    .btn-submit {
        background: var(--accent);
        color: #fff;
        padding: 0.7rem 1.5rem;
        border: none;
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
        font-size: 0.9rem;
        transition: background 0.2s;
    }
    .btn-submit:hover {
        background: var(--accent-hover);
    }

    /* Bouton Secondaire (Annuler) */
    .btn-cancel {
        background: transparent;
        border: 1px solid var(--border);
        color: var(--text-muted);
        padding: 0.7rem 1.5rem;
        border-radius: 4px;
        font-weight: 500;
        text-decoration: none;
        font-size: 0.9rem;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
    }
    .btn-cancel:hover {
        border-color: var(--text-muted);
        color: var(--text-main);
    }

    /* Layout en grille pour Nom/Prénom (Optionnel, rend le form plus compact) */
    .row-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }
    @media(max-width: 700px) { .row-2 { grid-template-columns: 1fr; gap: 0; } }

</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 144
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 145
        yield "<div class=\"dashboard-container\">
    
    ";
        // line 148
        yield "    <div class=\"page-header\">
        <h1>Nouvel utilisateur</h1>
        <p>Remplissez les informations ci-dessous pour créer un nouveau compte.</p>
    </div>

    <div class=\"form-card\">
        ";
        // line 154
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 154, $this->source); })()), 'form_start');
        yield "
        
        <div class=\"row-2\">
            <div>
                ";
        // line 158
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 158, $this->source); })()), "firstName", [], "any", false, false, false, 158), 'label', ["label" => "Prénom"]);
        yield "
                ";
        // line 159
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 159, $this->source); })()), "firstName", [], "any", false, false, false, 159), 'widget', ["attr" => ["placeholder" => "Ex: Jean"]]);
        yield "
                ";
        // line 160
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 160, $this->source); })()), "firstName", [], "any", false, false, false, 160), 'errors');
        yield "
            </div>
            <div>
                ";
        // line 163
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 163, $this->source); })()), "lastName", [], "any", false, false, false, 163), 'label', ["label" => "Nom"]);
        yield "
                ";
        // line 164
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 164, $this->source); })()), "lastName", [], "any", false, false, false, 164), 'widget', ["attr" => ["placeholder" => "Ex: Dupont"]]);
        yield "
                ";
        // line 165
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 165, $this->source); })()), "lastName", [], "any", false, false, false, 165), 'errors');
        yield "
            </div>
        </div>

        <div>
            ";
        // line 170
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 170, $this->source); })()), "email", [], "any", false, false, false, 170), 'label', ["label" => "Adresse Email"]);
        yield "
            ";
        // line 171
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 171, $this->source); })()), "email", [], "any", false, false, false, 171), 'widget', ["attr" => ["placeholder" => "jean.dupont@exemple.com"]]);
        yield "
            ";
        // line 172
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 172, $this->source); })()), "email", [], "any", false, false, false, 172), 'errors');
        yield "
        </div>

        <div>
            ";
        // line 176
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 176, $this->source); })()), "password", [], "any", false, false, false, 176), 'label', ["label" => "Mot de passe"]);
        yield "
            ";
        // line 177
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 177, $this->source); })()), "password", [], "any", false, false, false, 177), 'widget');
        yield "
            ";
        // line 178
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 178, $this->source); })()), "password", [], "any", false, false, false, 178), 'errors');
        yield "
            <small style=\"color: var(--text-muted); font-size: 0.8rem; margin-top:5px; display:block;\">
                Le mot de passe doit contenir au moins 6 caractères.
            </small>
        </div>

        <div>
            ";
        // line 185
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 185, $this->source); })()), "roles", [], "any", false, false, false, 185), 'label', ["label" => "Rôle et Permissions"]);
        yield "
            ";
        // line 186
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 186, $this->source); })()), "roles", [], "any", false, false, false, 186), 'widget');
        yield "
            ";
        // line 187
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 187, $this->source); })()), "roles", [], "any", false, false, false, 187), 'errors');
        yield "
        </div>

        <div class=\"form-actions\">
            <a href=\"";
        // line 191
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_index");
        yield "\" class=\"btn-cancel\">
                Annuler
            </a>
            <button type=\"submit\" class=\"btn-submit\">
                Créer l'utilisateur
            </button>
        </div>

        ";
        // line 199
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 199, $this->source); })()), 'form_end');
        yield "
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
        return "admin/users/new.html.twig";
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
        return array (  348 => 199,  337 => 191,  330 => 187,  326 => 186,  322 => 185,  312 => 178,  308 => 177,  304 => 176,  297 => 172,  293 => 171,  289 => 170,  281 => 165,  277 => 164,  273 => 163,  267 => 160,  263 => 159,  259 => 158,  252 => 154,  244 => 148,  240 => 145,  230 => 144,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Nouvel utilisateur{% endblock %}

{% block stylesheets %}
<style>
    /* =================== PAGE STYLE =================== */
    .dashboard-container {
        width: 100%;
        max-width: 1000px; /* On limite la largeur pour la lisibilité du formulaire */
        margin: 0 auto;
    }

    /* Header */
    .page-header {
        margin-bottom: 2rem;
        border-bottom: 1px solid var(--border);
        padding-bottom: 1rem;
    }
    .page-header h1 {
        margin: 0;
        font-size: 1.6rem;
        font-weight: 700;
        color: var(--text-main);
        letter-spacing: -0.5px;
    }
    .page-header p {
        margin: 5px 0 0 0;
        color: var(--text-muted);
        font-size: 0.9rem;
    }

    /* Carte du formulaire */
    .form-card {
        background: var(--bg-light);
        border: 1px solid var(--border);
        border-radius: 4px;
        padding: 2rem;
    }

    /* Styles des Champs Symfony */
    /* Note : Symfony entoure souvent les form_row d'une div. On cible ces divs ici. */
    .form-card > form > div {
        margin-bottom: 1.5rem;
    }

    /* Labels */
    label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text-main);
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Inputs & Selects */
    input[type=\"text\"],
    input[type=\"email\"],
    input[type=\"password\"],
    select {
        width: 100%;
        background: var(--bg-darker); /* Fond légèrement plus foncé que la carte */
        border: 1px solid var(--border);
        color: var(--text-main);
        padding: 0.7rem 1rem;
        border-radius: 4px;
        font-size: 0.95rem;
        outline: none;
        transition: border-color 0.2s;
        box-sizing: border-box; /* Important pour ne pas déborder */
    }

    input:focus,
    select:focus {
        border-color: var(--accent);
    }

    /* Gestion des erreurs (Symfony helper) */
    .invalid-feedback, ul li {
        color: #ef4444;
        font-size: 0.85rem;
        margin-top: 5px;
        list-style: none;
    }

    /* Zone des Actions (Boutons) */
    .form-actions {
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border);
        display: flex;
        justify-content: flex-end; /* Alignement à droite standard pro */
        gap: 1rem;
    }

    /* Bouton Principal */
    .btn-submit {
        background: var(--accent);
        color: #fff;
        padding: 0.7rem 1.5rem;
        border: none;
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
        font-size: 0.9rem;
        transition: background 0.2s;
    }
    .btn-submit:hover {
        background: var(--accent-hover);
    }

    /* Bouton Secondaire (Annuler) */
    .btn-cancel {
        background: transparent;
        border: 1px solid var(--border);
        color: var(--text-muted);
        padding: 0.7rem 1.5rem;
        border-radius: 4px;
        font-weight: 500;
        text-decoration: none;
        font-size: 0.9rem;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
    }
    .btn-cancel:hover {
        border-color: var(--text-muted);
        color: var(--text-main);
    }

    /* Layout en grille pour Nom/Prénom (Optionnel, rend le form plus compact) */
    .row-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }
    @media(max-width: 700px) { .row-2 { grid-template-columns: 1fr; gap: 0; } }

</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    {# En-tête sobre #}
    <div class=\"page-header\">
        <h1>Nouvel utilisateur</h1>
        <p>Remplissez les informations ci-dessous pour créer un nouveau compte.</p>
    </div>

    <div class=\"form-card\">
        {{ form_start(form) }}
        
        <div class=\"row-2\">
            <div>
                {{ form_label(form.firstName, 'Prénom') }}
                {{ form_widget(form.firstName, {'attr': {'placeholder': 'Ex: Jean'}}) }}
                {{ form_errors(form.firstName) }}
            </div>
            <div>
                {{ form_label(form.lastName, 'Nom') }}
                {{ form_widget(form.lastName, {'attr': {'placeholder': 'Ex: Dupont'}}) }}
                {{ form_errors(form.lastName) }}
            </div>
        </div>

        <div>
            {{ form_label(form.email, 'Adresse Email') }}
            {{ form_widget(form.email, {'attr': {'placeholder': 'jean.dupont@exemple.com'}}) }}
            {{ form_errors(form.email) }}
        </div>

        <div>
            {{ form_label(form.password, 'Mot de passe') }}
            {{ form_widget(form.password) }}
            {{ form_errors(form.password) }}
            <small style=\"color: var(--text-muted); font-size: 0.8rem; margin-top:5px; display:block;\">
                Le mot de passe doit contenir au moins 6 caractères.
            </small>
        </div>

        <div>
            {{ form_label(form.roles, 'Rôle et Permissions') }}
            {{ form_widget(form.roles) }}
            {{ form_errors(form.roles) }}
        </div>

        <div class=\"form-actions\">
            <a href=\"{{ path('admin_users_index') }}\" class=\"btn-cancel\">
                Annuler
            </a>
            <button type=\"submit\" class=\"btn-submit\">
                Créer l'utilisateur
            </button>
        </div>

        {{ form_end(form) }}
    </div>

</div>
{% endblock %}", "admin/users/new.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/users/new.html.twig");
    }
}
