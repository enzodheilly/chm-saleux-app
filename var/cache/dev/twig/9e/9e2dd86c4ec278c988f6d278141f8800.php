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

/* admin/club_info/new.html.twig */
class __TwigTemplate_722e1f92bb7b07aa0c5b7166962facae extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/club_info/new.html.twig"));

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

        yield "Nouvelle information";
        
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

    /* Form Card */
    .form-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; }
    .form-card > form > div { margin-bottom: 1.5rem; }

    /* Inputs */
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    input[type=\"text\"], textarea {
        width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main);
        padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box;
    }
    input:focus, textarea:focus { border-color: var(--accent); }
    
    textarea { min-height: 200px; line-height: 1.5; font-family: inherit; resize: vertical; }

    /* Helper Text */
    .helper-text { font-size: 0.8rem; color: var(--text-muted); margin-top: 5px; }
    .helper-text span { color: var(--accent); font-weight: 600; }

    /* Actions */
    .form-actions { margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: flex-end; gap: 1rem; }
    .btn-submit { background: var(--accent); color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 4px; font-weight: 600; cursor: pointer; font-size: 0.9rem; transition: background 0.2s; }
    .btn-submit:hover { background: var(--accent-hover); }
    .btn-cancel { background: transparent; border: 1px solid var(--border); color: var(--text-muted); padding: 0.7rem 1.5rem; border-radius: 4px; font-weight: 500; text-decoration: none; font-size: 0.9rem; display: inline-flex; align-items: center; transition: 0.2s; }
    .btn-cancel:hover { border-color: var(--text-muted); color: var(--text-main); }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 42
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 43
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Nouvelle information</h1>
        <p>Ajoutez une section d'information générale sur le club.</p>
    </div>

    <div class=\"form-card\">
        ";
        // line 51
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), 'form_start');
        yield "

        <div>
            ";
        // line 54
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 54, $this->source); })()), "category", [], "any", false, false, false, 54), 'label', ["label" => "Catégorie / Titre de section"]);
        yield "
            ";
        // line 55
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 55, $this->source); })()), "category", [], "any", false, false, false, 55), 'widget', ["attr" => ["placeholder" => "Ex: Horaires d'ouverture"]]);
        yield "
            ";
        // line 56
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 56, $this->source); })()), "category", [], "any", false, false, false, 56), 'errors');
        yield "
            
            ";
        // line 58
        if ((array_key_exists("existingCategories", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["existingCategories"]) || array_key_exists("existingCategories", $context) ? $context["existingCategories"] : (function () { throw new RuntimeError('Variable "existingCategories" does not exist.', 58, $this->source); })())) > 0))) {
            // line 59
            yield "                <div class=\"helper-text\">
                    Déjà utilisés : <span>";
            // line 60
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::join((isset($context["existingCategories"]) || array_key_exists("existingCategories", $context) ? $context["existingCategories"] : (function () { throw new RuntimeError('Variable "existingCategories" does not exist.', 60, $this->source); })()), ", "), "html", null, true);
            yield "</span>
                </div>
            ";
        }
        // line 63
        yield "        </div>

        <div>
            ";
        // line 66
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 66, $this->source); })()), "content", [], "any", false, false, false, 66), 'label', ["label" => "Contenu du texte"]);
        yield "
            ";
        // line 67
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 67, $this->source); })()), "content", [], "any", false, false, false, 67), 'widget', ["attr" => ["placeholder" => "Saisissez les informations ici..."]]);
        yield "
            ";
        // line 68
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 68, $this->source); })()), "content", [], "any", false, false, false, 68), 'errors');
        yield "
        </div>

        <div class=\"form-actions\">
            <a href=\"";
        // line 72
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_clubinfo_index");
        yield "\" class=\"btn-cancel\">Annuler</a>
            <button type=\"submit\" class=\"btn-submit\">Enregistrer</button>
        </div>

        ";
        // line 76
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 76, $this->source); })()), 'form_end');
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
        return "admin/club_info/new.html.twig";
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
        return array (  205 => 76,  198 => 72,  191 => 68,  187 => 67,  183 => 66,  178 => 63,  172 => 60,  169 => 59,  167 => 58,  162 => 56,  158 => 55,  154 => 54,  148 => 51,  138 => 43,  128 => 42,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Nouvelle information{% endblock %}

{% block stylesheets %}
<style>
    /* =================== PAGE STYLE =================== */
    .dashboard-container { width: 100%; max-width: 800px; margin: 0 auto; }

    /* Header */
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }

    /* Form Card */
    .form-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; }
    .form-card > form > div { margin-bottom: 1.5rem; }

    /* Inputs */
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    input[type=\"text\"], textarea {
        width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main);
        padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box;
    }
    input:focus, textarea:focus { border-color: var(--accent); }
    
    textarea { min-height: 200px; line-height: 1.5; font-family: inherit; resize: vertical; }

    /* Helper Text */
    .helper-text { font-size: 0.8rem; color: var(--text-muted); margin-top: 5px; }
    .helper-text span { color: var(--accent); font-weight: 600; }

    /* Actions */
    .form-actions { margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: flex-end; gap: 1rem; }
    .btn-submit { background: var(--accent); color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 4px; font-weight: 600; cursor: pointer; font-size: 0.9rem; transition: background 0.2s; }
    .btn-submit:hover { background: var(--accent-hover); }
    .btn-cancel { background: transparent; border: 1px solid var(--border); color: var(--text-muted); padding: 0.7rem 1.5rem; border-radius: 4px; font-weight: 500; text-decoration: none; font-size: 0.9rem; display: inline-flex; align-items: center; transition: 0.2s; }
    .btn-cancel:hover { border-color: var(--text-muted); color: var(--text-main); }
</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Nouvelle information</h1>
        <p>Ajoutez une section d'information générale sur le club.</p>
    </div>

    <div class=\"form-card\">
        {{ form_start(form) }}

        <div>
            {{ form_label(form.category, 'Catégorie / Titre de section') }}
            {{ form_widget(form.category, {'attr': {'placeholder': 'Ex: Horaires d\\'ouverture'}}) }}
            {{ form_errors(form.category) }}
            
            {% if existingCategories is defined and existingCategories|length > 0 %}
                <div class=\"helper-text\">
                    Déjà utilisés : <span>{{ existingCategories|join(', ') }}</span>
                </div>
            {% endif %}
        </div>

        <div>
            {{ form_label(form.content, 'Contenu du texte') }}
            {{ form_widget(form.content, {'attr': {'placeholder': 'Saisissez les informations ici...'}}) }}
            {{ form_errors(form.content) }}
        </div>

        <div class=\"form-actions\">
            <a href=\"{{ path('admin_clubinfo_index') }}\" class=\"btn-cancel\">Annuler</a>
            <button type=\"submit\" class=\"btn-submit\">Enregistrer</button>
        </div>

        {{ form_end(form) }}
    </div>
</div>
{% endblock %}", "admin/club_info/new.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/club_info/new.html.twig");
    }
}
