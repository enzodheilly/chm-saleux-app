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

/* admin/licence/new.html.twig */
class __TwigTemplate_8a4f2f25e3b14391d4406d0d8aebd780 extends Template
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
        // line 2
        return "admin/base_admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/licence/new.html.twig"));

        $this->parent = $this->load("admin/base_admin.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Nouvelle licence";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 7
        yield "<style>
    /* =================== PAGE STYLE =================== */
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

    /* Carte Formulaire */
    .form-card {
        background: var(--bg-light);
        border: 1px solid var(--border);
        border-radius: 4px;
        padding: 2rem;
    }

    /* Styles des Champs */
    .form-card > form > div { margin-bottom: 1.5rem; }

    label {
        display: block;
        font-size: 0.8rem;
        font-weight: 700;
        color: var(--text-muted);
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    input[type=\"text\"], input[type=\"email\"], input[type=\"date\"], select {
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
    
    input:focus, select:focus { border-color: var(--accent); }

    /* Grille 2 colonnes */
    .row-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }
    @media(max-width: 700px) { .row-2 { grid-template-columns: 1fr; gap: 0; } }

    /* Actions */
    .form-actions {
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border);
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }

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
    .btn-submit:hover { background: var(--accent-hover); }

    .btn-cancel {
        background: transparent;
        border: 1px solid var(--border);
        color: var(--text-muted);
        padding: 0.7rem 1.5rem;
        border-radius: 4px;
        font-weight: 500;
        text-decoration: none;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        transition: 0.2s;
    }
    .btn-cancel:hover { border-color: var(--text-muted); color: var(--text-main); }

    /* Box Avantages Dynamique */
    .avantages-preview {
        margin-top: 1rem;
        padding: 1rem;
        background: rgba(255, 102, 0, 0.05);
        border: 1px dashed var(--accent);
        border-radius: 4px;
        display: none; /* Caché par défaut */
    }
    .avantages-preview h4 {
        margin: 0 0 0.8rem 0;
        font-size: 0.9rem;
        color: var(--accent);
        text-transform: uppercase;
        font-weight: 700;
    }
    .avantages-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 0.5rem;
    }
    .avantages-list li {
        font-size: 0.85rem;
        color: var(--text-main);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .avantages-list li::before {
        content: \"✓\";
        color: var(--accent);
        font-weight: bold;
    }

</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 156
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 157
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Créer une licence</h1>
        <p>Enregistrez un nouveau membre licencié.</p>
    </div>

    <div class=\"form-card\">
        ";
        // line 165
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 165, $this->source); })()), 'form_start');
        yield "
        
        <div class=\"row-2\">
            <div>
                ";
        // line 169
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 169, $this->source); })()), "firstName", [], "any", false, false, false, 169), 'label', ["label" => "Prénom"]);
        yield "
                ";
        // line 170
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 170, $this->source); })()), "firstName", [], "any", false, false, false, 170), 'widget', ["attr" => ["placeholder" => "Ex: Thomas"]]);
        yield "
                ";
        // line 171
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 171, $this->source); })()), "firstName", [], "any", false, false, false, 171), 'errors');
        yield "
            </div>
            <div>
                ";
        // line 174
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 174, $this->source); })()), "lastName", [], "any", false, false, false, 174), 'label', ["label" => "Nom"]);
        yield "
                ";
        // line 175
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 175, $this->source); })()), "lastName", [], "any", false, false, false, 175), 'widget', ["attr" => ["placeholder" => "Ex: Martin"]]);
        yield "
                ";
        // line 176
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 176, $this->source); })()), "lastName", [], "any", false, false, false, 176), 'errors');
        yield "
            </div>
        </div>

        <div class=\"row-2\">
            <div>
                ";
        // line 182
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 182, $this->source); })()), "email", [], "any", false, false, false, 182), 'label', ["label" => "Email"]);
        yield "
                ";
        // line 183
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 183, $this->source); })()), "email", [], "any", false, false, false, 183), 'widget', ["attr" => ["placeholder" => "thomas.martin@email.com"]]);
        yield "
                ";
        // line 184
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 184, $this->source); })()), "email", [], "any", false, false, false, 184), 'errors');
        yield "
            </div>
            <div>
                ";
        // line 187
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 187, $this->source); })()), "number", [], "any", false, false, false, 187), 'label', ["label" => "Numéro de Licence"]);
        yield "
                ";
        // line 188
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 188, $this->source); })()), "number", [], "any", false, false, false, 188), 'widget', ["attr" => ["placeholder" => "Ex: 2024-00123"]]);
        yield "
                ";
        // line 189
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 189, $this->source); })()), "number", [], "any", false, false, false, 189), 'errors');
        yield "
            </div>
        </div>

        <div class=\"row-2\">
            <div>
                ";
        // line 195
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 195, $this->source); })()), "forfait", [], "any", false, false, false, 195), 'label', ["label" => "Forfait Associé"]);
        yield "
                ";
        // line 196
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 196, $this->source); })()), "forfait", [], "any", false, false, false, 196), 'widget');
        yield "
                ";
        // line 197
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 197, $this->source); })()), "forfait", [], "any", false, false, false, 197), 'errors');
        yield "
                
                <div id=\"forfait-avantages\" class=\"avantages-preview\"></div>
            </div>
            <div>
                ";
        // line 202
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 202, $this->source); })()), "expiryDate", [], "any", false, false, false, 202), 'label', ["label" => "Date d'Expiration"]);
        yield "
                ";
        // line 203
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 203, $this->source); })()), "expiryDate", [], "any", false, false, false, 203), 'widget');
        yield "
                ";
        // line 204
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 204, $this->source); })()), "expiryDate", [], "any", false, false, false, 204), 'errors');
        yield "
            </div>
        </div>

        <div class=\"form-actions\">
            <a href=\"";
        // line 209
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_licence_index");
        yield "\" class=\"btn-cancel\">Annuler</a>
            <button type=\"submit\" class=\"btn-submit\">Enregistrer la licence</button>
        </div>

        ";
        // line 213
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 213, $this->source); })()), 'form_end');
        yield "
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const selectForfait = document.querySelector('#licence_forfait'); // Vérifie l'ID généré par Symfony
    const avantagesBox = document.getElementById('forfait-avantages');

    if (!selectForfait) return;

    // Fonction pour charger et afficher les avantages
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
                // Nettoyage des chaînes (enlève \"fa-icon | \")
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
            console.error(\"Erreur chargement avantages\", e);
            avantagesBox.style.display = 'none';
        }
    }

    selectForfait.addEventListener('change', loadAvantages);
    // Charger au démarrage si un forfait est déjà sélectionné (cas d'erreur formulaire)
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
        return "admin/licence/new.html.twig";
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
        return array (  369 => 213,  362 => 209,  354 => 204,  350 => 203,  346 => 202,  338 => 197,  334 => 196,  330 => 195,  321 => 189,  317 => 188,  313 => 187,  307 => 184,  303 => 183,  299 => 182,  290 => 176,  286 => 175,  282 => 174,  276 => 171,  272 => 170,  268 => 169,  261 => 165,  251 => 157,  241 => 156,  86 => 7,  76 => 6,  59 => 4,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("
{% extends 'admin/base_admin.html.twig' %}

{% block title %}Nouvelle licence{% endblock %}

{% block stylesheets %}
<style>
    /* =================== PAGE STYLE =================== */
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

    /* Carte Formulaire */
    .form-card {
        background: var(--bg-light);
        border: 1px solid var(--border);
        border-radius: 4px;
        padding: 2rem;
    }

    /* Styles des Champs */
    .form-card > form > div { margin-bottom: 1.5rem; }

    label {
        display: block;
        font-size: 0.8rem;
        font-weight: 700;
        color: var(--text-muted);
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    input[type=\"text\"], input[type=\"email\"], input[type=\"date\"], select {
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
    
    input:focus, select:focus { border-color: var(--accent); }

    /* Grille 2 colonnes */
    .row-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }
    @media(max-width: 700px) { .row-2 { grid-template-columns: 1fr; gap: 0; } }

    /* Actions */
    .form-actions {
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border);
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }

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
    .btn-submit:hover { background: var(--accent-hover); }

    .btn-cancel {
        background: transparent;
        border: 1px solid var(--border);
        color: var(--text-muted);
        padding: 0.7rem 1.5rem;
        border-radius: 4px;
        font-weight: 500;
        text-decoration: none;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        transition: 0.2s;
    }
    .btn-cancel:hover { border-color: var(--text-muted); color: var(--text-main); }

    /* Box Avantages Dynamique */
    .avantages-preview {
        margin-top: 1rem;
        padding: 1rem;
        background: rgba(255, 102, 0, 0.05);
        border: 1px dashed var(--accent);
        border-radius: 4px;
        display: none; /* Caché par défaut */
    }
    .avantages-preview h4 {
        margin: 0 0 0.8rem 0;
        font-size: 0.9rem;
        color: var(--accent);
        text-transform: uppercase;
        font-weight: 700;
    }
    .avantages-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 0.5rem;
    }
    .avantages-list li {
        font-size: 0.85rem;
        color: var(--text-main);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .avantages-list li::before {
        content: \"✓\";
        color: var(--accent);
        font-weight: bold;
    }

</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Créer une licence</h1>
        <p>Enregistrez un nouveau membre licencié.</p>
    </div>

    <div class=\"form-card\">
        {{ form_start(form) }}
        
        <div class=\"row-2\">
            <div>
                {{ form_label(form.firstName, 'Prénom') }}
                {{ form_widget(form.firstName, {'attr': {'placeholder': 'Ex: Thomas'}}) }}
                {{ form_errors(form.firstName) }}
            </div>
            <div>
                {{ form_label(form.lastName, 'Nom') }}
                {{ form_widget(form.lastName, {'attr': {'placeholder': 'Ex: Martin'}}) }}
                {{ form_errors(form.lastName) }}
            </div>
        </div>

        <div class=\"row-2\">
            <div>
                {{ form_label(form.email, 'Email') }}
                {{ form_widget(form.email, {'attr': {'placeholder': 'thomas.martin@email.com'}}) }}
                {{ form_errors(form.email) }}
            </div>
            <div>
                {{ form_label(form.number, 'Numéro de Licence') }}
                {{ form_widget(form.number, {'attr': {'placeholder': 'Ex: 2024-00123'}}) }}
                {{ form_errors(form.number) }}
            </div>
        </div>

        <div class=\"row-2\">
            <div>
                {{ form_label(form.forfait, 'Forfait Associé') }}
                {{ form_widget(form.forfait) }}
                {{ form_errors(form.forfait) }}
                
                <div id=\"forfait-avantages\" class=\"avantages-preview\"></div>
            </div>
            <div>
                {{ form_label(form.expiryDate, 'Date d\\'Expiration') }}
                {{ form_widget(form.expiryDate) }}
                {{ form_errors(form.expiryDate) }}
            </div>
        </div>

        <div class=\"form-actions\">
            <a href=\"{{ path('admin_licence_index') }}\" class=\"btn-cancel\">Annuler</a>
            <button type=\"submit\" class=\"btn-submit\">Enregistrer la licence</button>
        </div>

        {{ form_end(form) }}
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const selectForfait = document.querySelector('#licence_forfait'); // Vérifie l'ID généré par Symfony
    const avantagesBox = document.getElementById('forfait-avantages');

    if (!selectForfait) return;

    // Fonction pour charger et afficher les avantages
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
                // Nettoyage des chaînes (enlève \"fa-icon | \")
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
            console.error(\"Erreur chargement avantages\", e);
            avantagesBox.style.display = 'none';
        }
    }

    selectForfait.addEventListener('change', loadAvantages);
    // Charger au démarrage si un forfait est déjà sélectionné (cas d'erreur formulaire)
    if(selectForfait.value) loadAvantages();
});
</script>
{% endblock %}", "admin/licence/new.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/licence/new.html.twig");
    }
}
