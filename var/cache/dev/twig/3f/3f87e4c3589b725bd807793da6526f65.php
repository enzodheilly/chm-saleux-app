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

/* admin/club_info/edit.html.twig */
class __TwigTemplate_1f585f00112dd64a5551f7dc2a735e51 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/club_info/edit.html.twig"));

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

        yield "Modifier l'information";
        
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
    /* ... Mêmes styles que NEW ... */
    .dashboard-container { width: 100%; max-width: 800px; margin: 0 auto; }
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }
    .form-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; }
    .form-card > form > div { margin-bottom: 1.5rem; }
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    input[type=\"text\"], textarea { width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main); padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box; }
    input:focus, textarea:focus { border-color: var(--accent); }
    textarea { min-height: 200px; line-height: 1.5; font-family: inherit; resize: vertical; }

    /* Actions Edit */
    .form-actions { margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; }
    .btn-submit { background: var(--accent); color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 4px; font-weight: 600; cursor: pointer; font-size: 0.9rem; transition: background 0.2s; }
    .btn-submit:hover { background: var(--accent-hover); }
    .btn-cancel { background: transparent; border: 1px solid var(--border); color: var(--text-muted); padding: 0.7rem 1.5rem; border-radius: 4px; font-weight: 500; text-decoration: none; font-size: 0.9rem; display: inline-flex; align-items: center; transition: 0.2s; }
    .btn-cancel:hover { border-color: var(--text-muted); color: var(--text-main); }
    .btn-delete { color: #ef4444; background: none; border: none; font-size: 0.9rem; cursor: pointer; font-weight: 500; padding: 0.5rem 0; opacity: 0.8; transition: opacity 0.2s; }
    .btn-delete:hover { opacity: 1; text-decoration: underline; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 30
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 31
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Modifier l'information</h1>
        ";
        // line 36
        yield "        <p>Mise à jour de la section : ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 36, $this->source); })()), "vars", [], "any", false, false, false, 36), "value", [], "any", false, false, false, 36), "category", [], "any", false, false, false, 36), "html", null, true);
        yield "</p>
    </div>

    <div class=\"form-card\">
        ";
        // line 40
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 40, $this->source); })()), 'form_start');
        yield "

        <div>
            ";
        // line 43
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 43, $this->source); })()), "category", [], "any", false, false, false, 43), 'label', ["label" => "Catégorie / Titre"]);
        yield "
            ";
        // line 44
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), "category", [], "any", false, false, false, 44), 'widget');
        yield "
            ";
        // line 45
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 45, $this->source); })()), "category", [], "any", false, false, false, 45), 'errors');
        yield "
        </div>

        <div>
            ";
        // line 49
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 49, $this->source); })()), "content", [], "any", false, false, false, 49), 'label', ["label" => "Contenu du texte"]);
        yield "
            ";
        // line 50
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 50, $this->source); })()), "content", [], "any", false, false, false, 50), 'widget');
        yield "
            ";
        // line 51
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), "content", [], "any", false, false, false, 51), 'errors');
        yield "
        </div>

        <div class=\"form-actions\">
            <button type=\"button\" class=\"btn-delete\" onclick=\"if(confirm('⚠️ Attention : Voulez-vous vraiment supprimer cette information ?')) document.getElementById('delete-form').submit();\">
                Supprimer
            </button>

            <div style=\"display: flex; gap: 10px;\">
                <a href=\"";
        // line 60
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_clubinfo_index");
        yield "\" class=\"btn-cancel\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\">Mettre à jour</button>
            </div>
        </div>

        ";
        // line 65
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 65, $this->source); })()), 'form_end');
        yield "
    </div>

    ";
        // line 69
        yield "    <form id=\"delete-form\" method=\"post\" action=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_clubinfo_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 69, $this->source); })()), "vars", [], "any", false, false, false, 69), "value", [], "any", false, false, false, 69), "id", [], "any", false, false, false, 69)]), "html", null, true);
        yield "\" style=\"display: none;\">
        <input type=\"hidden\" name=\"_token\" value=\"";
        // line 70
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 70, $this->source); })()), "vars", [], "any", false, false, false, 70), "value", [], "any", false, false, false, 70), "id", [], "any", false, false, false, 70))), "html", null, true);
        yield "\">
    </form>
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
        return "admin/club_info/edit.html.twig";
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
        return array (  200 => 70,  195 => 69,  189 => 65,  181 => 60,  169 => 51,  165 => 50,  161 => 49,  154 => 45,  150 => 44,  146 => 43,  140 => 40,  132 => 36,  126 => 31,  116 => 30,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Modifier l'information{% endblock %}

{% block stylesheets %}
<style>
    /* ... Mêmes styles que NEW ... */
    .dashboard-container { width: 100%; max-width: 800px; margin: 0 auto; }
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }
    .form-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; }
    .form-card > form > div { margin-bottom: 1.5rem; }
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    input[type=\"text\"], textarea { width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main); padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box; }
    input:focus, textarea:focus { border-color: var(--accent); }
    textarea { min-height: 200px; line-height: 1.5; font-family: inherit; resize: vertical; }

    /* Actions Edit */
    .form-actions { margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; }
    .btn-submit { background: var(--accent); color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 4px; font-weight: 600; cursor: pointer; font-size: 0.9rem; transition: background 0.2s; }
    .btn-submit:hover { background: var(--accent-hover); }
    .btn-cancel { background: transparent; border: 1px solid var(--border); color: var(--text-muted); padding: 0.7rem 1.5rem; border-radius: 4px; font-weight: 500; text-decoration: none; font-size: 0.9rem; display: inline-flex; align-items: center; transition: 0.2s; }
    .btn-cancel:hover { border-color: var(--text-muted); color: var(--text-main); }
    .btn-delete { color: #ef4444; background: none; border: none; font-size: 0.9rem; cursor: pointer; font-weight: 500; padding: 0.5rem 0; opacity: 0.8; transition: opacity 0.2s; }
    .btn-delete:hover { opacity: 1; text-decoration: underline; }
</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Modifier l'information</h1>
        {# On utilise form.vars.value pour accéder aux données si clubInfo n'est pas passé #}
        <p>Mise à jour de la section : {{ form.vars.value.category }}</p>
    </div>

    <div class=\"form-card\">
        {{ form_start(form) }}

        <div>
            {{ form_label(form.category, 'Catégorie / Titre') }}
            {{ form_widget(form.category) }}
            {{ form_errors(form.category) }}
        </div>

        <div>
            {{ form_label(form.content, 'Contenu du texte') }}
            {{ form_widget(form.content) }}
            {{ form_errors(form.content) }}
        </div>

        <div class=\"form-actions\">
            <button type=\"button\" class=\"btn-delete\" onclick=\"if(confirm('⚠️ Attention : Voulez-vous vraiment supprimer cette information ?')) document.getElementById('delete-form').submit();\">
                Supprimer
            </button>

            <div style=\"display: flex; gap: 10px;\">
                <a href=\"{{ path('admin_clubinfo_index') }}\" class=\"btn-cancel\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\">Mettre à jour</button>
            </div>
        </div>

        {{ form_end(form) }}
    </div>

    {# On récupère l'ID via form.vars.value.id #}
    <form id=\"delete-form\" method=\"post\" action=\"{{ path('admin_clubinfo_delete', {id: form.vars.value.id}) }}\" style=\"display: none;\">
        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ form.vars.value.id) }}\">
    </form>
</div>
{% endblock %}", "admin/club_info/edit.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/club_info/edit.html.twig");
    }
}
