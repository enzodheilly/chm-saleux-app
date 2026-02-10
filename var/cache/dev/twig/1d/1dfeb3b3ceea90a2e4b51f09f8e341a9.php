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

/* admin/athlete/edit.html.twig */
class __TwigTemplate_28fab13904aa7c78e59dabc3975cbc84 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/athlete/edit.html.twig"));

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

        yield "Modifier l'athlète";
        
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
    /* ... Mêmes styles que NEW pour la cohérence ... */
    .dashboard-container { width: 100%; max-width: 1000px; margin: 0 auto; }
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }
    .form-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; }
    .form-card > form > div { margin-bottom: 1.5rem; }
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    input[type=\"text\"], input[type=\"date\"], input[type=\"file\"], select { width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main); padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box; }
    input:focus, select:focus { border-color: var(--accent); }
    .row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
    @media(max-width: 700px) { .row-2 { grid-template-columns: 1fr; gap: 0; } }

    /* Actions Edit */
    .form-actions { margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; }
    .btn-submit { background: var(--accent); color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 4px; font-weight: 600; cursor: pointer; font-size: 0.9rem; transition: background 0.2s; }
    .btn-submit:hover { background: var(--accent-hover); }
    .btn-cancel { background: transparent; border: 1px solid var(--border); color: var(--text-muted); padding: 0.7rem 1.5rem; border-radius: 4px; font-weight: 500; text-decoration: none; font-size: 0.9rem; display: inline-flex; align-items: center; transition: 0.2s; }
    .btn-cancel:hover { border-color: var(--text-muted); color: var(--text-main); }
    .btn-delete { color: #ef4444; background: none; border: none; font-size: 0.9rem; cursor: pointer; font-weight: 500; padding: 0.5rem 0; opacity: 0.8; transition: opacity 0.2s; }
    .btn-delete:hover { opacity: 1; text-decoration: underline; }

    /* Preview Image */
    .img-preview { margin-bottom: 1rem; display: block; width: 100px; height: 100px; object-fit: cover; border-radius: 4px; border: 1px solid var(--border); }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 34
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 35
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Modifier l'athlète</h1>
        <p>Mise à jour des informations pour : ";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["athlete"]) || array_key_exists("athlete", $context) ? $context["athlete"] : (function () { throw new RuntimeError('Variable "athlete" does not exist.', 39, $this->source); })()), "prenom", [], "any", false, false, false, 39), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["athlete"]) || array_key_exists("athlete", $context) ? $context["athlete"] : (function () { throw new RuntimeError('Variable "athlete" does not exist.', 39, $this->source); })()), "nom", [], "any", false, false, false, 39), "html", null, true);
        yield "</p>
    </div>

    <div class=\"form-card\">
        ";
        // line 43
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 43, $this->source); })()), 'form_start');
        yield "

        <div class=\"row-2\">
            <div>
                ";
        // line 47
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 47, $this->source); })()), "prenom", [], "any", false, false, false, 47), 'label', ["label" => "Prénom"]);
        yield "
                ";
        // line 48
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 48, $this->source); })()), "prenom", [], "any", false, false, false, 48), 'widget');
        yield "
            </div>
            <div>
                ";
        // line 51
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), "nom", [], "any", false, false, false, 51), 'label', ["label" => "Nom"]);
        yield "
                ";
        // line 52
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 52, $this->source); })()), "nom", [], "any", false, false, false, 52), 'widget');
        yield "
            </div>
        </div>

        <div class=\"row-2\">
            <div>
                ";
        // line 58
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 58, $this->source); })()), "dateNaissance", [], "any", false, false, false, 58), 'label', ["label" => "Date de Naissance"]);
        yield "
                ";
        // line 59
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 59, $this->source); })()), "dateNaissance", [], "any", false, false, false, 59), 'widget');
        yield "
            </div>
            <div>
                ";
        // line 62
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 62, $this->source); })()), "equipe", [], "any", false, false, false, 62), 'label', ["label" => "Équipe"]);
        yield "
                ";
        // line 63
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 63, $this->source); })()), "equipe", [], "any", false, false, false, 63), 'widget');
        yield "
            </div>
        </div>

        <div class=\"row-2\">
            <div>
                ";
        // line 69
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 69, $this->source); })()), "categorie", [], "any", false, false, false, 69), 'label', ["label" => "Catégorie Sportive"]);
        yield "
                ";
        // line 70
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 70, $this->source); })()), "categorie", [], "any", false, false, false, 70), 'widget');
        yield "
            </div>
            <div>
                ";
        // line 73
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 73, $this->source); })()), "categoriePoids", [], "any", false, false, false, 73), 'label', ["label" => "Catégorie de Poids"]);
        yield "
                ";
        // line 74
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 74, $this->source); })()), "categoriePoids", [], "any", false, false, false, 74), 'widget');
        yield "
            </div>
        </div>

        <div>
            ";
        // line 79
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 79, $this->source); })()), "image", [], "any", false, false, false, 79), 'label', ["label" => "Photo de Profil"]);
        yield "
            ";
        // line 80
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["athlete"]) || array_key_exists("athlete", $context) ? $context["athlete"] : (function () { throw new RuntimeError('Variable "athlete" does not exist.', 80, $this->source); })()), "image", [], "any", false, false, false, 80)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 81
            yield "                <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/athletes/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["athlete"]) || array_key_exists("athlete", $context) ? $context["athlete"] : (function () { throw new RuntimeError('Variable "athlete" does not exist.', 81, $this->source); })()), "image", [], "any", false, false, false, 81))), "html", null, true);
            yield "\" alt=\"Aperçu\" class=\"img-preview\">
            ";
        }
        // line 83
        yield "            ";
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 83, $this->source); })()), "image", [], "any", false, false, false, 83), 'widget');
        yield "
        </div>

        <div class=\"form-actions\">
            <button type=\"button\" class=\"btn-delete\" onclick=\"if(confirm('⚠️ Attention : Voulez-vous vraiment supprimer cet athlète ?')) document.getElementById('delete-form').submit();\">
                Supprimer le profil
            </button>

            <div style=\"display: flex; gap: 10px;\">
                <a href=\"";
        // line 92
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_athlete_index");
        yield "\" class=\"btn-cancel\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\">Enregistrer</button>
            </div>
        </div>

        ";
        // line 97
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 97, $this->source); })()), 'form_end');
        yield "
    </div>

    <form id=\"delete-form\" method=\"post\" action=\"";
        // line 100
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_athlete_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["athlete"]) || array_key_exists("athlete", $context) ? $context["athlete"] : (function () { throw new RuntimeError('Variable "athlete" does not exist.', 100, $this->source); })()), "id", [], "any", false, false, false, 100)]), "html", null, true);
        yield "\" style=\"display: none;\">
        <input type=\"hidden\" name=\"_token\" value=\"";
        // line 101
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["athlete"]) || array_key_exists("athlete", $context) ? $context["athlete"] : (function () { throw new RuntimeError('Variable "athlete" does not exist.', 101, $this->source); })()), "id", [], "any", false, false, false, 101))), "html", null, true);
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
        return "admin/athlete/edit.html.twig";
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
        return array (  263 => 101,  259 => 100,  253 => 97,  245 => 92,  232 => 83,  226 => 81,  224 => 80,  220 => 79,  212 => 74,  208 => 73,  202 => 70,  198 => 69,  189 => 63,  185 => 62,  179 => 59,  175 => 58,  166 => 52,  162 => 51,  156 => 48,  152 => 47,  145 => 43,  136 => 39,  130 => 35,  120 => 34,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Modifier l'athlète{% endblock %}

{% block stylesheets %}
<style>
    /* ... Mêmes styles que NEW pour la cohérence ... */
    .dashboard-container { width: 100%; max-width: 1000px; margin: 0 auto; }
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }
    .form-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; }
    .form-card > form > div { margin-bottom: 1.5rem; }
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    input[type=\"text\"], input[type=\"date\"], input[type=\"file\"], select { width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main); padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box; }
    input:focus, select:focus { border-color: var(--accent); }
    .row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
    @media(max-width: 700px) { .row-2 { grid-template-columns: 1fr; gap: 0; } }

    /* Actions Edit */
    .form-actions { margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; }
    .btn-submit { background: var(--accent); color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 4px; font-weight: 600; cursor: pointer; font-size: 0.9rem; transition: background 0.2s; }
    .btn-submit:hover { background: var(--accent-hover); }
    .btn-cancel { background: transparent; border: 1px solid var(--border); color: var(--text-muted); padding: 0.7rem 1.5rem; border-radius: 4px; font-weight: 500; text-decoration: none; font-size: 0.9rem; display: inline-flex; align-items: center; transition: 0.2s; }
    .btn-cancel:hover { border-color: var(--text-muted); color: var(--text-main); }
    .btn-delete { color: #ef4444; background: none; border: none; font-size: 0.9rem; cursor: pointer; font-weight: 500; padding: 0.5rem 0; opacity: 0.8; transition: opacity 0.2s; }
    .btn-delete:hover { opacity: 1; text-decoration: underline; }

    /* Preview Image */
    .img-preview { margin-bottom: 1rem; display: block; width: 100px; height: 100px; object-fit: cover; border-radius: 4px; border: 1px solid var(--border); }
</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Modifier l'athlète</h1>
        <p>Mise à jour des informations pour : {{ athlete.prenom }} {{ athlete.nom }}</p>
    </div>

    <div class=\"form-card\">
        {{ form_start(form) }}

        <div class=\"row-2\">
            <div>
                {{ form_label(form.prenom, 'Prénom') }}
                {{ form_widget(form.prenom) }}
            </div>
            <div>
                {{ form_label(form.nom, 'Nom') }}
                {{ form_widget(form.nom) }}
            </div>
        </div>

        <div class=\"row-2\">
            <div>
                {{ form_label(form.dateNaissance, 'Date de Naissance') }}
                {{ form_widget(form.dateNaissance) }}
            </div>
            <div>
                {{ form_label(form.equipe, 'Équipe') }}
                {{ form_widget(form.equipe) }}
            </div>
        </div>

        <div class=\"row-2\">
            <div>
                {{ form_label(form.categorie, 'Catégorie Sportive') }}
                {{ form_widget(form.categorie) }}
            </div>
            <div>
                {{ form_label(form.categoriePoids, 'Catégorie de Poids') }}
                {{ form_widget(form.categoriePoids) }}
            </div>
        </div>

        <div>
            {{ form_label(form.image, 'Photo de Profil') }}
            {% if athlete.image %}
                <img src=\"{{ asset('uploads/athletes/' ~ athlete.image) }}\" alt=\"Aperçu\" class=\"img-preview\">
            {% endif %}
            {{ form_widget(form.image) }}
        </div>

        <div class=\"form-actions\">
            <button type=\"button\" class=\"btn-delete\" onclick=\"if(confirm('⚠️ Attention : Voulez-vous vraiment supprimer cet athlète ?')) document.getElementById('delete-form').submit();\">
                Supprimer le profil
            </button>

            <div style=\"display: flex; gap: 10px;\">
                <a href=\"{{ path('admin_athlete_index') }}\" class=\"btn-cancel\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\">Enregistrer</button>
            </div>
        </div>

        {{ form_end(form) }}
    </div>

    <form id=\"delete-form\" method=\"post\" action=\"{{ path('admin_athlete_delete', {id: athlete.id}) }}\" style=\"display: none;\">
        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ athlete.id) }}\">
    </form>
</div>
{% endblock %}", "admin/athlete/edit.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/athlete/edit.html.twig");
    }
}
