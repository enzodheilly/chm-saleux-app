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

/* admin/licence/edit.html.twig */
class __TwigTemplate_a26dd56c43ebd25e0afb907e9f78991c extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/licence/edit.html.twig"));

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

        yield "Modifier la licence";
        
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
    /* ... On reprend exactement les styles de NEW pour la cohérence ... */
    .dashboard-container { width: 100%; max-width: 1000px; margin: 0 auto; }
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }
    
    .form-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; }
    .form-card > form > div { margin-bottom: 1.5rem; }
    
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    input[type=\"text\"], input[type=\"email\"], input[type=\"date\"], select { width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main); padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box; }
    input:focus, select:focus { border-color: var(--accent); }
    
    .row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
    @media(max-width: 700px) { .row-2 { grid-template-columns: 1fr; gap: 0; } }

    .form-actions { margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; } /* Différence : Space-between pour le bouton supprimer à gauche */

    .btn-submit { background: var(--accent); color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 4px; font-weight: 600; cursor: pointer; font-size: 0.9rem; transition: background 0.2s; }
    .btn-submit:hover { background: var(--accent-hover); }

    .btn-cancel { background: transparent; border: 1px solid var(--border); color: var(--text-muted); padding: 0.7rem 1.5rem; border-radius: 4px; font-weight: 500; text-decoration: none; font-size: 0.9rem; display: inline-flex; align-items: center; transition: 0.2s; }
    .btn-cancel:hover { border-color: var(--text-muted); color: var(--text-main); }
    
    .btn-delete { color: #ef4444; background: none; border: none; font-size: 0.9rem; cursor: pointer; font-weight: 500; padding: 0.5rem 0; opacity: 0.8; transition: opacity 0.2s; }
    .btn-delete:hover { opacity: 1; text-decoration: underline; }

    /* Box Avantages Dynamique */
    .avantages-preview { margin-top: 1rem; padding: 1rem; background: rgba(255, 102, 0, 0.05); border: 1px dashed var(--accent); border-radius: 4px; display: none; }
    .avantages-preview h4 { margin: 0 0 0.8rem 0; font-size: 0.9rem; color: var(--accent); text-transform: uppercase; font-weight: 700; }
    .avantages-list { list-style: none; padding: 0; margin: 0; display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 0.5rem; }
    .avantages-list li { font-size: 0.85rem; color: var(--text-main); display: flex; align-items: center; gap: 8px; }
    .avantages-list li::before { content: \"✓\"; color: var(--accent); font-weight: bold; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 43
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 44
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Modifier la licence</h1>
        <p>Mise à jour des informations pour la licence #";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["licence"]) || array_key_exists("licence", $context) ? $context["licence"] : (function () { throw new RuntimeError('Variable "licence" does not exist.', 48, $this->source); })()), "number", [], "any", false, false, false, 48), "html", null, true);
        yield "</p>
    </div>

    <div class=\"form-card\">
        ";
        // line 52
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 52, $this->source); })()), 'form_start');
        yield "
        
        <div class=\"row-2\">
            <div>
                ";
        // line 56
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 56, $this->source); })()), "firstName", [], "any", false, false, false, 56), 'label', ["label" => "Prénom"]);
        yield "
                ";
        // line 57
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 57, $this->source); })()), "firstName", [], "any", false, false, false, 57), 'widget');
        yield "
            </div>
            <div>
                ";
        // line 60
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 60, $this->source); })()), "lastName", [], "any", false, false, false, 60), 'label', ["label" => "Nom"]);
        yield "
                ";
        // line 61
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 61, $this->source); })()), "lastName", [], "any", false, false, false, 61), 'widget');
        yield "
            </div>
        </div>

        <div class=\"row-2\">
            <div>
                ";
        // line 67
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 67, $this->source); })()), "email", [], "any", false, false, false, 67), 'label', ["label" => "Email"]);
        yield "
                ";
        // line 68
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 68, $this->source); })()), "email", [], "any", false, false, false, 68), 'widget');
        yield "
            </div>
            <div>
                ";
        // line 71
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 71, $this->source); })()), "number", [], "any", false, false, false, 71), 'label', ["label" => "Numéro de Licence"]);
        yield "
                ";
        // line 72
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 72, $this->source); })()), "number", [], "any", false, false, false, 72), 'widget');
        yield "
            </div>
        </div>

        <div class=\"row-2\">
            <div>
                ";
        // line 78
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 78, $this->source); })()), "forfait", [], "any", false, false, false, 78), 'label', ["label" => "Forfait Associé"]);
        yield "
                ";
        // line 79
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 79, $this->source); })()), "forfait", [], "any", false, false, false, 79), 'widget');
        yield "
                <div id=\"forfait-avantages\" class=\"avantages-preview\"></div>
            </div>
            <div>
                ";
        // line 83
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 83, $this->source); })()), "expiryDate", [], "any", false, false, false, 83), 'label', ["label" => "Date d'Expiration"]);
        yield "
                ";
        // line 84
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 84, $this->source); })()), "expiryDate", [], "any", false, false, false, 84), 'widget');
        yield "
            </div>
        </div>

        <div class=\"form-actions\">
            <button type=\"button\" class=\"btn-delete\" onclick=\"if(confirm('⚠️ Attention : Cette action est irréversible.\\n\\nVoulez-vous vraiment supprimer la licence ";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["licence"]) || array_key_exists("licence", $context) ? $context["licence"] : (function () { throw new RuntimeError('Variable "licence" does not exist.', 89, $this->source); })()), "number", [], "any", false, false, false, 89), "html", null, true);
        yield " ?')) document.getElementById('delete-form').submit();\">
                Supprimer cette licence
            </button>

            <div style=\"display: flex; gap: 10px;\">
                <a href=\"";
        // line 94
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_licence_index");
        yield "\" class=\"btn-cancel\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\">Mettre à jour</button>
            </div>
        </div>

        ";
        // line 99
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 99, $this->source); })()), 'form_end');
        yield "
    </div>

    <form id=\"delete-form\" method=\"post\" action=\"";
        // line 102
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_licence_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["licence"]) || array_key_exists("licence", $context) ? $context["licence"] : (function () { throw new RuntimeError('Variable "licence" does not exist.', 102, $this->source); })()), "id", [], "any", false, false, false, 102)]), "html", null, true);
        yield "\" style=\"display: none;\">
        <input type=\"hidden\" name=\"_token\" value=\"";
        // line 103
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["licence"]) || array_key_exists("licence", $context) ? $context["licence"] : (function () { throw new RuntimeError('Variable "licence" does not exist.', 103, $this->source); })()), "id", [], "any", false, false, false, 103))), "html", null, true);
        yield "\">
    </form>

</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const selectForfait = document.querySelector('#licence_forfait');
    const avantagesBox = document.getElementById('forfait-avantages');

    if (!selectForfait) return;

    async function loadAvantages() {
        const id = selectForfait.value;
        if (!id) {
            avantagesBox.style.display = 'none';
            return;
        }

        try {
            const resp = await fetch(`/admin/licences/forfait/\${id}/avantages`);
            const data = await resp.json();

            if (data.avantages && data.avantages.length > 0) {
                const cleanList = data.avantages.map(a => {
                    const parts = a.split('|');
                    return parts.length > 1 ? parts[1].trim() : a;
                });

                avantagesBox.innerHTML = `
                    <h4>Inclus dans \${data.nom} :</h4>
                    <ul class=\"avantages-list\">
                        \${cleanList.map(item => `<li>\${item}</li>`).join('')}
                    </ul>
                `;
                avantagesBox.style.display = 'block';
            } else {
                avantagesBox.style.display = 'none';
            }
        } catch (e) {
            console.error(\"Erreur\", e);
            avantagesBox.style.display = 'none';
        }
    }

    selectForfait.addEventListener('change', loadAvantages);
    if(selectForfait.value) loadAvantages();
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
        return "admin/licence/edit.html.twig";
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
        return array (  254 => 103,  250 => 102,  244 => 99,  236 => 94,  228 => 89,  220 => 84,  216 => 83,  209 => 79,  205 => 78,  196 => 72,  192 => 71,  186 => 68,  182 => 67,  173 => 61,  169 => 60,  163 => 57,  159 => 56,  152 => 52,  145 => 48,  139 => 44,  129 => 43,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Modifier la licence{% endblock %}

{% block stylesheets %}
<style>
    /* ... On reprend exactement les styles de NEW pour la cohérence ... */
    .dashboard-container { width: 100%; max-width: 1000px; margin: 0 auto; }
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }
    
    .form-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; }
    .form-card > form > div { margin-bottom: 1.5rem; }
    
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    input[type=\"text\"], input[type=\"email\"], input[type=\"date\"], select { width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main); padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box; }
    input:focus, select:focus { border-color: var(--accent); }
    
    .row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
    @media(max-width: 700px) { .row-2 { grid-template-columns: 1fr; gap: 0; } }

    .form-actions { margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; } /* Différence : Space-between pour le bouton supprimer à gauche */

    .btn-submit { background: var(--accent); color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 4px; font-weight: 600; cursor: pointer; font-size: 0.9rem; transition: background 0.2s; }
    .btn-submit:hover { background: var(--accent-hover); }

    .btn-cancel { background: transparent; border: 1px solid var(--border); color: var(--text-muted); padding: 0.7rem 1.5rem; border-radius: 4px; font-weight: 500; text-decoration: none; font-size: 0.9rem; display: inline-flex; align-items: center; transition: 0.2s; }
    .btn-cancel:hover { border-color: var(--text-muted); color: var(--text-main); }
    
    .btn-delete { color: #ef4444; background: none; border: none; font-size: 0.9rem; cursor: pointer; font-weight: 500; padding: 0.5rem 0; opacity: 0.8; transition: opacity 0.2s; }
    .btn-delete:hover { opacity: 1; text-decoration: underline; }

    /* Box Avantages Dynamique */
    .avantages-preview { margin-top: 1rem; padding: 1rem; background: rgba(255, 102, 0, 0.05); border: 1px dashed var(--accent); border-radius: 4px; display: none; }
    .avantages-preview h4 { margin: 0 0 0.8rem 0; font-size: 0.9rem; color: var(--accent); text-transform: uppercase; font-weight: 700; }
    .avantages-list { list-style: none; padding: 0; margin: 0; display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 0.5rem; }
    .avantages-list li { font-size: 0.85rem; color: var(--text-main); display: flex; align-items: center; gap: 8px; }
    .avantages-list li::before { content: \"✓\"; color: var(--accent); font-weight: bold; }
</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Modifier la licence</h1>
        <p>Mise à jour des informations pour la licence #{{ licence.number }}</p>
    </div>

    <div class=\"form-card\">
        {{ form_start(form) }}
        
        <div class=\"row-2\">
            <div>
                {{ form_label(form.firstName, 'Prénom') }}
                {{ form_widget(form.firstName) }}
            </div>
            <div>
                {{ form_label(form.lastName, 'Nom') }}
                {{ form_widget(form.lastName) }}
            </div>
        </div>

        <div class=\"row-2\">
            <div>
                {{ form_label(form.email, 'Email') }}
                {{ form_widget(form.email) }}
            </div>
            <div>
                {{ form_label(form.number, 'Numéro de Licence') }}
                {{ form_widget(form.number) }}
            </div>
        </div>

        <div class=\"row-2\">
            <div>
                {{ form_label(form.forfait, 'Forfait Associé') }}
                {{ form_widget(form.forfait) }}
                <div id=\"forfait-avantages\" class=\"avantages-preview\"></div>
            </div>
            <div>
                {{ form_label(form.expiryDate, 'Date d\\'Expiration') }}
                {{ form_widget(form.expiryDate) }}
            </div>
        </div>

        <div class=\"form-actions\">
            <button type=\"button\" class=\"btn-delete\" onclick=\"if(confirm('⚠️ Attention : Cette action est irréversible.\\n\\nVoulez-vous vraiment supprimer la licence {{ licence.number }} ?')) document.getElementById('delete-form').submit();\">
                Supprimer cette licence
            </button>

            <div style=\"display: flex; gap: 10px;\">
                <a href=\"{{ path('admin_licence_index') }}\" class=\"btn-cancel\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\">Mettre à jour</button>
            </div>
        </div>

        {{ form_end(form) }}
    </div>

    <form id=\"delete-form\" method=\"post\" action=\"{{ path('admin_licence_delete', {id: licence.id}) }}\" style=\"display: none;\">
        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ licence.id) }}\">
    </form>

</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const selectForfait = document.querySelector('#licence_forfait');
    const avantagesBox = document.getElementById('forfait-avantages');

    if (!selectForfait) return;

    async function loadAvantages() {
        const id = selectForfait.value;
        if (!id) {
            avantagesBox.style.display = 'none';
            return;
        }

        try {
            const resp = await fetch(`/admin/licences/forfait/\${id}/avantages`);
            const data = await resp.json();

            if (data.avantages && data.avantages.length > 0) {
                const cleanList = data.avantages.map(a => {
                    const parts = a.split('|');
                    return parts.length > 1 ? parts[1].trim() : a;
                });

                avantagesBox.innerHTML = `
                    <h4>Inclus dans \${data.nom} :</h4>
                    <ul class=\"avantages-list\">
                        \${cleanList.map(item => `<li>\${item}</li>`).join('')}
                    </ul>
                `;
                avantagesBox.style.display = 'block';
            } else {
                avantagesBox.style.display = 'none';
            }
        } catch (e) {
            console.error(\"Erreur\", e);
            avantagesBox.style.display = 'none';
        }
    }

    selectForfait.addEventListener('change', loadAvantages);
    if(selectForfait.value) loadAvantages();
});
</script>
{% endblock %}", "admin/licence/edit.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/licence/edit.html.twig");
    }
}
