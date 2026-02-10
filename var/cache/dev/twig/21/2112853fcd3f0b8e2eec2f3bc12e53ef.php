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

/* admin/licence/index.html.twig */
class __TwigTemplate_b897b3a43dc6243f95f2379fa8f27294 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/licence/index.html.twig"));

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

        yield "Gestion des licences";
        
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
        max-width: 1600px;
        margin: 0 auto;
    }

    /* Header */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        border-bottom: 1px solid var(--border);
        padding-bottom: 1.5rem;
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

    /* Toolbar */
    .toolbar {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .search-input {
        background: transparent;
        border: 1px solid var(--border);
        color: var(--text-main);
        padding: 0.6rem 1rem;
        border-radius: 4px;
        outline: none;
        min-width: 300px;
        font-size: 0.9rem;
        transition: border-color 0.2s;
    }
    .search-input:focus { border-color: var(--accent); }
    .search-input::placeholder { color: var(--text-muted); opacity: 0.6; }

    .btn-primary {
        background: var(--accent);
        color: #fff;
        padding: 0.6rem 1.5rem;
        border-radius: 4px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: 0.2s;
        border: none;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-decoration: none;
        display: inline-block;
    }
    .btn-primary:hover { background: var(--accent-hover); }

    /* Carte Principale */
    .content-card {
        background: var(--bg-light);
        border: 1px solid var(--border);
        border-radius: 4px;
    }

    /* Table */
    .table-responsive { overflow-x: auto; }
    .table { width: 100%; border-collapse: collapse; font-size: 0.9rem; }
    
    .table th {
        background: var(--bg-darker);
        color: var(--text-muted);
        font-weight: 600;
        text-align: left;
        padding: 1rem 1.5rem;
        border-bottom: 1px solid var(--border);
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
    }
    
    .table td {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid var(--border);
        color: var(--text-main);
        vertical-align: middle;
    }
    .table tr:last-child td { border-bottom: none; }
    .table tr:hover { background: rgba(255,255,255,0.01); }

    /* Data Styling */
    .licence-number {
        font-family: \"Courier New\", Courier, monospace; /* Style Code */
        font-weight: 700;
        letter-spacing: 1px;
        background: var(--bg-darker);
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.85rem;
        color: var(--text-main);
        border: 1px solid var(--border);
    }

    .info-primary { font-weight: 600; display: block; color: var(--text-main); }
    .info-secondary { font-size: 0.8rem; color: var(--text-muted); }

    /* Status Badges */
    .badge {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 4px 8px;
        border-radius: 4px;
    }
    .badge-active { color: #22c55e; background: rgba(34, 197, 94, 0.1); border: 1px solid rgba(34, 197, 94, 0.2); }
    .badge-expired { color: #ef4444; background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); }
    .badge-type { color: var(--accent); border: 1px solid var(--border); }

    /* Actions */
    .actions-cell {
        display: flex;
        gap: 15px;
        justify-content: flex-end;
    }
    .action-link {
        font-size: 0.85rem;
        font-weight: 500;
        text-decoration: none;
        background: none;
        border: none;
        padding: 0;
        cursor: pointer;
    }
    .link-edit { color: var(--text-muted); }
    .link-edit:hover { color: var(--text-main); text-decoration: underline; }
    .link-delete { color: #ef4444; opacity: 0.8; }
    .link-delete:hover { opacity: 1; text-decoration: underline; }

</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 158
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 159
        yield "<div class=\"dashboard-container\">
    
    ";
        // line 162
        yield "    <div class=\"page-header\">
        <div>
            <h1>Licences</h1>
            <p>Suivi des licences sportives et dates d'expiration</p>
        </div>
        <div class=\"toolbar\">
            <input type=\"text\" id=\"searchLicence\" class=\"search-input\" placeholder=\"Nom, email ou numéro...\">
            <a href=\"";
        // line 169
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_licence_new");
        yield "\" class=\"btn-primary\">
                Créer une licence
            </a>
        </div>
    </div>

    ";
        // line 176
        yield "    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\" id=\"licenceTable\">
                <thead>
                    <tr>
                        <th width=\"80\">ID</th>
                        <th>Numéro</th>
                        <th>Titulaire</th>
                        <th>Type</th>
                        <th>Validité</th>
                        <th>Statut</th>
                        <th style=\"text-align: right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 191
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["licences"]) || array_key_exists("licences", $context) ? $context["licences"] : (function () { throw new RuntimeError('Variable "licences" does not exist.', 191, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["licence"]) {
            // line 192
            yield "                        ";
            // line 193
            yield "                        ";
            $context["isExpired"] = (CoreExtension::getAttribute($this->env, $this->source, $context["licence"], "expiryDate", [], "any", false, false, false, 193) < $this->extensions['Twig\Extension\CoreExtension']->convertDate());
            // line 194
            yield "                        
                        <tr>
                            <td style=\"color: var(--text-muted); font-family: monospace;\">#";
            // line 196
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["licence"], "id", [], "any", false, false, false, 196), "html", null, true);
            yield "</td>
                            
                            <td>
                                <span class=\"licence-number\">";
            // line 199
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["licence"], "number", [], "any", false, false, false, 199), "html", null, true);
            yield "</span>
                            </td>

                            <td>
                                <span class=\"info-primary search-target\">";
            // line 203
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["licence"], "firstName", [], "any", false, false, false, 203), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["licence"], "lastName", [], "any", false, false, false, 203), "html", null, true);
            yield "</span>
                                <span class=\"info-secondary search-target\">";
            // line 204
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["licence"], "email", [], "any", false, false, false, 204), "html", null, true);
            yield "</span>
                            </td>

                            <td>
                                <span class=\"badge badge-type\">";
            // line 208
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["licence"], "type", [], "any", false, false, false, 208)), "html", null, true);
            yield "</span>
                            </td>

                            <td>
                                <span class=\"info-primary\">";
            // line 212
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["licence"], "expiryDate", [], "any", false, false, false, 212)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["licence"], "expiryDate", [], "any", false, false, false, 212), "d/m/Y"), "html", null, true)) : ("—"));
            yield "</span>
                            </td>

                            <td>
                                ";
            // line 216
            if ((($tmp = (isset($context["isExpired"]) || array_key_exists("isExpired", $context) ? $context["isExpired"] : (function () { throw new RuntimeError('Variable "isExpired" does not exist.', 216, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 217
                yield "                                    <span class=\"badge badge-expired\">Expirée</span>
                                ";
            } else {
                // line 219
                yield "                                    <span class=\"badge badge-active\">Active</span>
                                ";
            }
            // line 221
            yield "                            </td>

                            <td>
                                <div class=\"actions-cell\">
                                    <a href=\"";
            // line 225
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_licence_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["licence"], "id", [], "any", false, false, false, 225)]), "html", null, true);
            yield "\" class=\"action-link link-edit\">Modifier</a>
                                    
                                    <form method=\"post\" action=\"";
            // line 227
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_licence_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["licence"], "id", [], "any", false, false, false, 227)]), "html", null, true);
            yield "\" onsubmit=\"return confirm('Supprimer définitivement la licence ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["licence"], "number", [], "any", false, false, false, 227), "html", null, true);
            yield " ?');\" style=\"display:inline;\">
                                        <input type=\"hidden\" name=\"_token\" value=\"";
            // line 228
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["licence"], "id", [], "any", false, false, false, 228))), "html", null, true);
            yield "\">
                                        <button class=\"action-link link-delete\">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 234
        if (!$context['_iterated']) {
            // line 235
            yield "                        <tr>
                            <td colspan=\"7\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucune licence enregistrée.
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['licence'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 241
        yield "                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    // Recherche simple en JS
    document.getElementById('searchLicence').addEventListener('keyup', function() {
        const val = this.value.toLowerCase();
        const rows = document.querySelectorAll('#licenceTable tbody tr');

        rows.forEach(row => {
            // On cherche dans le numéro et dans le nom/email
            const number = row.querySelector('.licence-number')?.textContent.toLowerCase() || '';
            const text = row.querySelector('td:nth-child(3)')?.textContent.toLowerCase() || ''; // Colonne Titulaire
            
            if (number.includes(val) || text.includes(val)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
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
        return "admin/licence/index.html.twig";
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
        return array (  398 => 241,  387 => 235,  385 => 234,  374 => 228,  368 => 227,  363 => 225,  357 => 221,  353 => 219,  349 => 217,  347 => 216,  340 => 212,  333 => 208,  326 => 204,  320 => 203,  313 => 199,  307 => 196,  303 => 194,  300 => 193,  298 => 192,  293 => 191,  276 => 176,  267 => 169,  258 => 162,  254 => 159,  244 => 158,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Gestion des licences{% endblock %}

{% block stylesheets %}
<style>
    /* =================== PAGE STYLE =================== */
    .dashboard-container {
        width: 100%;
        max-width: 1600px;
        margin: 0 auto;
    }

    /* Header */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        border-bottom: 1px solid var(--border);
        padding-bottom: 1.5rem;
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

    /* Toolbar */
    .toolbar {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .search-input {
        background: transparent;
        border: 1px solid var(--border);
        color: var(--text-main);
        padding: 0.6rem 1rem;
        border-radius: 4px;
        outline: none;
        min-width: 300px;
        font-size: 0.9rem;
        transition: border-color 0.2s;
    }
    .search-input:focus { border-color: var(--accent); }
    .search-input::placeholder { color: var(--text-muted); opacity: 0.6; }

    .btn-primary {
        background: var(--accent);
        color: #fff;
        padding: 0.6rem 1.5rem;
        border-radius: 4px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: 0.2s;
        border: none;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-decoration: none;
        display: inline-block;
    }
    .btn-primary:hover { background: var(--accent-hover); }

    /* Carte Principale */
    .content-card {
        background: var(--bg-light);
        border: 1px solid var(--border);
        border-radius: 4px;
    }

    /* Table */
    .table-responsive { overflow-x: auto; }
    .table { width: 100%; border-collapse: collapse; font-size: 0.9rem; }
    
    .table th {
        background: var(--bg-darker);
        color: var(--text-muted);
        font-weight: 600;
        text-align: left;
        padding: 1rem 1.5rem;
        border-bottom: 1px solid var(--border);
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
    }
    
    .table td {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid var(--border);
        color: var(--text-main);
        vertical-align: middle;
    }
    .table tr:last-child td { border-bottom: none; }
    .table tr:hover { background: rgba(255,255,255,0.01); }

    /* Data Styling */
    .licence-number {
        font-family: \"Courier New\", Courier, monospace; /* Style Code */
        font-weight: 700;
        letter-spacing: 1px;
        background: var(--bg-darker);
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.85rem;
        color: var(--text-main);
        border: 1px solid var(--border);
    }

    .info-primary { font-weight: 600; display: block; color: var(--text-main); }
    .info-secondary { font-size: 0.8rem; color: var(--text-muted); }

    /* Status Badges */
    .badge {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 4px 8px;
        border-radius: 4px;
    }
    .badge-active { color: #22c55e; background: rgba(34, 197, 94, 0.1); border: 1px solid rgba(34, 197, 94, 0.2); }
    .badge-expired { color: #ef4444; background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); }
    .badge-type { color: var(--accent); border: 1px solid var(--border); }

    /* Actions */
    .actions-cell {
        display: flex;
        gap: 15px;
        justify-content: flex-end;
    }
    .action-link {
        font-size: 0.85rem;
        font-weight: 500;
        text-decoration: none;
        background: none;
        border: none;
        padding: 0;
        cursor: pointer;
    }
    .link-edit { color: var(--text-muted); }
    .link-edit:hover { color: var(--text-main); text-decoration: underline; }
    .link-delete { color: #ef4444; opacity: 0.8; }
    .link-delete:hover { opacity: 1; text-decoration: underline; }

</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    {# Header #}
    <div class=\"page-header\">
        <div>
            <h1>Licences</h1>
            <p>Suivi des licences sportives et dates d'expiration</p>
        </div>
        <div class=\"toolbar\">
            <input type=\"text\" id=\"searchLicence\" class=\"search-input\" placeholder=\"Nom, email ou numéro...\">
            <a href=\"{{ path('admin_licence_new') }}\" class=\"btn-primary\">
                Créer une licence
            </a>
        </div>
    </div>

    {# Table #}
    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\" id=\"licenceTable\">
                <thead>
                    <tr>
                        <th width=\"80\">ID</th>
                        <th>Numéro</th>
                        <th>Titulaire</th>
                        <th>Type</th>
                        <th>Validité</th>
                        <th>Statut</th>
                        <th style=\"text-align: right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {% for licence in licences %}
                        {# Calcul de l'état (Active / Expirée) #}
                        {% set isExpired = licence.expiryDate < date() %}
                        
                        <tr>
                            <td style=\"color: var(--text-muted); font-family: monospace;\">#{{ licence.id }}</td>
                            
                            <td>
                                <span class=\"licence-number\">{{ licence.number }}</span>
                            </td>

                            <td>
                                <span class=\"info-primary search-target\">{{ licence.firstName }} {{ licence.lastName }}</span>
                                <span class=\"info-secondary search-target\">{{ licence.email }}</span>
                            </td>

                            <td>
                                <span class=\"badge badge-type\">{{ licence.type|capitalize }}</span>
                            </td>

                            <td>
                                <span class=\"info-primary\">{{ licence.expiryDate ? licence.expiryDate|date('d/m/Y') : '—' }}</span>
                            </td>

                            <td>
                                {% if isExpired %}
                                    <span class=\"badge badge-expired\">Expirée</span>
                                {% else %}
                                    <span class=\"badge badge-active\">Active</span>
                                {% endif %}
                            </td>

                            <td>
                                <div class=\"actions-cell\">
                                    <a href=\"{{ path('admin_licence_edit', {id: licence.id}) }}\" class=\"action-link link-edit\">Modifier</a>
                                    
                                    <form method=\"post\" action=\"{{ path('admin_licence_delete', {id: licence.id}) }}\" onsubmit=\"return confirm('Supprimer définitivement la licence {{ licence.number }} ?');\" style=\"display:inline;\">
                                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ licence.id) }}\">
                                        <button class=\"action-link link-delete\">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    {% else %}
                        <tr>
                            <td colspan=\"7\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucune licence enregistrée.
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    // Recherche simple en JS
    document.getElementById('searchLicence').addEventListener('keyup', function() {
        const val = this.value.toLowerCase();
        const rows = document.querySelectorAll('#licenceTable tbody tr');

        rows.forEach(row => {
            // On cherche dans le numéro et dans le nom/email
            const number = row.querySelector('.licence-number')?.textContent.toLowerCase() || '';
            const text = row.querySelector('td:nth-child(3)')?.textContent.toLowerCase() || ''; // Colonne Titulaire
            
            if (number.includes(val) || text.includes(val)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
{% endblock %}", "admin/licence/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/licence/index.html.twig");
    }
}
