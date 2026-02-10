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

/* admin/users/edit.html.twig */
class __TwigTemplate_f63e8fc3eba328cf0bb72e0378281580 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/users/edit.html.twig"));

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

        yield "Modifier l'utilisateur";
        
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
    /* (C'est exactement le même CSS que votre page 'new') */
    .dashboard-container {
        width: 100%;
        max-width: 1000px;
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
        background: var(--bg-darker);
        border: 1px solid var(--border);
        color: var(--text-main);
        padding: 0.7rem 1rem;
        border-radius: 4px;
        font-size: 0.95rem;
        outline: none;
        transition: border-color 0.2s;
        box-sizing: border-box;
    }

    input:focus,
    select:focus {
        border-color: var(--accent);
    }

    /* Gestion des erreurs */
    .invalid-feedback, ul li {
        color: #ef4444;
        font-size: 0.85rem;
        margin-top: 5px;
        list-style: none;
    }

    /* Zone des Actions */
    .form-actions {
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border);
        display: flex;
        justify-content: flex-end;
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

    /* Bouton Secondaire */
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

    /* Layout en grille */
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

    // line 143
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 144
        yield "<div class=\"dashboard-container\">
    
    ";
        // line 147
        yield "    <div class=\"page-header\">
        <h1>Modifier l'utilisateur</h1>
        ";
        // line 150
        yield "        <p>Modification du compte : <strong>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 150, $this->source); })()), "email", [], "any", false, false, false, 150), "html", null, true);
        yield "</strong></p>
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
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 159, $this->source); })()), "firstName", [], "any", false, false, false, 159), 'widget');
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
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 164, $this->source); })()), "lastName", [], "any", false, false, false, 164), 'widget');
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
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 171, $this->source); })()), "email", [], "any", false, false, false, 171), 'widget');
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
        // line 178
        yield "            ";
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 178, $this->source); })()), "password", [], "any", false, false, false, 178), 'widget', ["attr" => ["placeholder" => "Laisser vide pour ne pas changer"]]);
        yield "
            ";
        // line 179
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 179, $this->source); })()), "password", [], "any", false, false, false, 179), 'errors');
        yield "
            
            ";
        // line 182
        yield "            <small style=\"color: var(--text-muted); font-size: 0.8rem; margin-top:5px; display:block;\">
                ⚠️ Laissez ce champ vide si vous souhaitez conserver le mot de passe actuel.
            </small>
        </div>

        <div>
            ";
        // line 188
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 188, $this->source); })()), "roles", [], "any", false, false, false, 188), 'label', ["label" => "Rôle et Permissions"]);
        yield "
            ";
        // line 189
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 189, $this->source); })()), "roles", [], "any", false, false, false, 189), 'widget');
        yield "
            ";
        // line 190
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 190, $this->source); })()), "roles", [], "any", false, false, false, 190), 'errors');
        yield "
        </div>

        <div class=\"form-actions\">
            <a href=\"";
        // line 194
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_index");
        yield "\" class=\"btn-cancel\">
                Annuler
            </a>
            <button type=\"submit\" class=\"btn-submit\">
                Enregistrer les modifications
            </button>
        </div>

        ";
        // line 202
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 202, $this->source); })()), 'form_end');
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
        return "admin/users/edit.html.twig";
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
        return array (  355 => 202,  344 => 194,  337 => 190,  333 => 189,  329 => 188,  321 => 182,  316 => 179,  311 => 178,  307 => 176,  300 => 172,  296 => 171,  292 => 170,  284 => 165,  280 => 164,  276 => 163,  270 => 160,  266 => 159,  262 => 158,  255 => 154,  247 => 150,  243 => 147,  239 => 144,  229 => 143,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Modifier l'utilisateur{% endblock %}

{% block stylesheets %}
<style>
    /* =================== PAGE STYLE =================== */
    /* (C'est exactement le même CSS que votre page 'new') */
    .dashboard-container {
        width: 100%;
        max-width: 1000px;
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
        background: var(--bg-darker);
        border: 1px solid var(--border);
        color: var(--text-main);
        padding: 0.7rem 1rem;
        border-radius: 4px;
        font-size: 0.95rem;
        outline: none;
        transition: border-color 0.2s;
        box-sizing: border-box;
    }

    input:focus,
    select:focus {
        border-color: var(--accent);
    }

    /* Gestion des erreurs */
    .invalid-feedback, ul li {
        color: #ef4444;
        font-size: 0.85rem;
        margin-top: 5px;
        list-style: none;
    }

    /* Zone des Actions */
    .form-actions {
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border);
        display: flex;
        justify-content: flex-end;
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

    /* Bouton Secondaire */
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

    /* Layout en grille */
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
    
    {# En-tête adapté pour l'édition #}
    <div class=\"page-header\">
        <h1>Modifier l'utilisateur</h1>
        {# On affiche l'email de l'user en cours d'édition pour être clair #}
        <p>Modification du compte : <strong>{{ user.email }}</strong></p>
    </div>

    <div class=\"form-card\">
        {{ form_start(form) }}
        
        <div class=\"row-2\">
            <div>
                {{ form_label(form.firstName, 'Prénom') }}
                {{ form_widget(form.firstName) }}
                {{ form_errors(form.firstName) }}
            </div>
            <div>
                {{ form_label(form.lastName, 'Nom') }}
                {{ form_widget(form.lastName) }}
                {{ form_errors(form.lastName) }}
            </div>
        </div>

        <div>
            {{ form_label(form.email, 'Adresse Email') }}
            {{ form_widget(form.email) }}
            {{ form_errors(form.email) }}
        </div>

        <div>
            {{ form_label(form.password, 'Mot de passe') }}
            {# On change le placeholder pour indiquer que c'est optionnel #}
            {{ form_widget(form.password, {'attr': {'placeholder': 'Laisser vide pour ne pas changer'}}) }}
            {{ form_errors(form.password) }}
            
            {# Message d'aide spécifique à l'édition #}
            <small style=\"color: var(--text-muted); font-size: 0.8rem; margin-top:5px; display:block;\">
                ⚠️ Laissez ce champ vide si vous souhaitez conserver le mot de passe actuel.
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
                Enregistrer les modifications
            </button>
        </div>

        {{ form_end(form) }}
    </div>

</div>
{% endblock %}", "admin/users/edit.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/users/edit.html.twig");
    }
}
