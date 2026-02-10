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

/* admin/competitions/list.html.twig */
class __TwigTemplate_f35de577a579a4950b17d578bf215edf extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/competitions/list.html.twig"));

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

        yield "Compétitions";
        
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
    .dashboard-container { width: 100%; max-width: 1600px; margin: 0 auto; }

    /* Header */
    .page-header {
        display: flex; justify-content: space-between; align-items: center;
        margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1.5rem;
    }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }

    /* Toolbar */
    .toolbar { display: flex; gap: 1rem; align-items: center; }
    .btn-primary {
        background: var(--accent); color: #fff; padding: 0.6rem 1.5rem; border-radius: 4px;
        font-weight: 600; font-size: 0.9rem; cursor: pointer; transition: 0.2s; border: none;
        text-transform: uppercase; letter-spacing: 0.5px; text-decoration: none; display: inline-block;
    }
    .btn-primary:hover { background: var(--accent-hover); }

    /* Table */
    .content-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; }
    .table-responsive { overflow-x: auto; }
    .table { width: 100%; border-collapse: collapse; font-size: 0.9rem; }
    
    .table th {
        background: var(--bg-darker); color: var(--text-muted); font-weight: 600; text-align: left;
        padding: 1rem 1.5rem; border-bottom: 1px solid var(--border); text-transform: uppercase;
        font-size: 0.75rem; letter-spacing: 1px;
    }
    .table td {
        padding: 1rem 1.5rem; border-bottom: 1px solid var(--border); color: var(--text-main); vertical-align: top;
    }
    .table tr:last-child td { border-bottom: none; }
    .table tr:hover { background: rgba(255,255,255,0.01); }

    /* Competition Specifics */
    .comp-thumb {
        width: 80px; height: 60px; object-fit: cover; border-radius: 4px; border: 1px solid var(--border); background: var(--bg-darker);
    }
    .comp-title { font-weight: 600; font-size: 1rem; color: var(--text-main); display: block; }
    .comp-meta { font-size: 0.8rem; color: var(--text-muted); margin-top: 4px; }
    
    /* Results List */
    .results-list { list-style: none; padding: 0; margin: 0; font-size: 0.85rem; }
    .results-list li { margin-bottom: 4px; padding-left: 10px; border-left: 2px solid var(--accent); }
    .results-list span { color: var(--text-muted); font-size: 0.8rem; }

    /* Actions */
    .actions-cell { display: flex; gap: 15px; justify-content: flex-end; }
    .action-link { font-size: 0.85rem; font-weight: 500; text-decoration: none; border: none; background: none; cursor: pointer; padding: 0; }
    .link-edit { color: var(--text-muted); }
    .link-edit:hover { color: var(--text-main); text-decoration: underline; }
    .link-delete { color: #ef4444; opacity: 0.8; }
    .link-delete:hover { opacity: 1; text-decoration: underline; }

</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 66
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 67
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <div>
            <h1>Compétitions</h1>
            <p>Gestion des événements sportifs et des résultats.</p>
        </div>
        <div class=\"toolbar\">
            <a href=\"";
        // line 75
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_competition_new");
        yield "\" class=\"btn-primary\">Ajouter une compétition</a>
        </div>
    </div>

    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\">
                <thead>
                    <tr>
                        <th width=\"100\">Visuel</th>
                        <th width=\"25%\">Compétition</th>
                        <th>Détails</th>
                        <th>Aperçu Résultats</th>
                        <th style=\"text-align: right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 92
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["competitions"]) || array_key_exists("competitions", $context) ? $context["competitions"] : (function () { throw new RuntimeError('Variable "competitions" does not exist.', 92, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["comp"]) {
            // line 93
            yield "                        <tr>
                            <td>
                                ";
            // line 95
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "image", [], "any", false, false, false, 95)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 96
                yield "                                    <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/competitions/" . CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "image", [], "any", false, false, false, 96))), "html", null, true);
                yield "\" alt=\"\" class=\"comp-thumb\">
                                ";
            } else {
                // line 98
                yield "                                    <div class=\"comp-thumb\" style=\"display:flex;align-items:center;justify-content:center;color:#666;font-size:0.7rem;\">N/A</div>
                                ";
            }
            // line 100
            yield "                            </td>

                            <td>
                                <span class=\"comp-title\">";
            // line 103
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "titre", [], "any", false, false, false, 103), "html", null, true);
            yield "</span>
                                <div class=\"comp-meta\">
                                    ";
            // line 105
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "date", [], "any", false, false, false, 105), "d/m/Y"), "html", null, true);
            yield " • ";
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "type", [], "any", false, false, false, 105)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "type", [], "any", false, false, false, 105), "html", null, true)) : ("Non classé"));
            yield "
                                </div>
                            </td>

                            <td style=\"font-size: 0.9rem;\">
                                <div><strong>Lieu :</strong> ";
            // line 110
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "lieu", [], "any", false, false, false, 110)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "lieu", [], "any", false, false, false, 110), "html", null, true)) : ("—"));
            yield "</div>
                                <div><strong>Équipe :</strong> ";
            // line 111
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "equipe", [], "any", false, false, false, 111) == "male")) ? ("Masculine") : ("Féminine"));
            yield "</div>
                                ";
            // line 112
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "classementEquipe", [], "any", false, false, false, 112)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 113
                yield "                                    <div style=\"margin-top:4px; color:var(--accent);\">Rang : ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "classementEquipe", [], "any", false, false, false, 113), "html", null, true);
                yield "</div>
                                ";
            }
            // line 115
            yield "                            </td>

                            <td>
                                ";
            // line 118
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "results", [], "any", false, false, false, 118)) > 0)) {
                // line 119
                yield "                                    <ul class=\"results-list\">
                                        ";
                // line 120
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "results", [], "any", false, false, false, 120), 0, 3));
                foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
                    // line 121
                    yield "                                            <li>
                                                <strong>";
                    // line 122
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "prenom", [], "any", false, false, false, 122), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["result"], "nom", [], "any", false, false, false, 122), 0, 1), "html", null, true);
                    yield ".</strong> 
                                                <span>(Total: ";
                    // line 123
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "total", [], "any", false, false, false, 123), "html", null, true);
                    yield ")</span>
                                            </li>
                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['result'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 126
                yield "                                        ";
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "results", [], "any", false, false, false, 126)) > 3)) {
                    // line 127
                    yield "                                            <li style=\"border:none; padding-left:0; color:var(--text-muted); font-style:italic;\">
                                                + ";
                    // line 128
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "results", [], "any", false, false, false, 128)) - 3), "html", null, true);
                    yield " autres...
                                            </li>
                                        ";
                }
                // line 131
                yield "                                    </ul>
                                ";
            } else {
                // line 133
                yield "                                    <span style=\"color:var(--text-muted); font-style:italic; font-size:0.85rem;\">Aucun résultat saisi</span>
                                ";
            }
            // line 135
            yield "                            </td>

                            <td>
                                <div class=\"actions-cell\">
                                    <a href=\"";
            // line 139
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_competition_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "id", [], "any", false, false, false, 139)]), "html", null, true);
            yield "\" class=\"action-link link-edit\">Modifier</a>
                                    
                                    <form method=\"post\" action=\"";
            // line 141
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_competition_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "id", [], "any", false, false, false, 141)]), "html", null, true);
            yield "\" onsubmit=\"return confirm('Confirmer la suppression de cette compétition ?');\" style=\"display:inline;\">
                                        <input type=\"hidden\" name=\"_token\" value=\"";
            // line 142
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["comp"], "id", [], "any", false, false, false, 142))), "html", null, true);
            yield "\">
                                        <button class=\"action-link link-delete\">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 148
        if (!$context['_iterated']) {
            // line 149
            yield "                        <tr>
                            <td colspan=\"5\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucune compétition enregistrée.
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['comp'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 155
        yield "                </tbody>
            </table>
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
        return "admin/competitions/list.html.twig";
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
        return array (  340 => 155,  329 => 149,  327 => 148,  316 => 142,  312 => 141,  307 => 139,  301 => 135,  297 => 133,  293 => 131,  287 => 128,  284 => 127,  281 => 126,  272 => 123,  266 => 122,  263 => 121,  259 => 120,  256 => 119,  254 => 118,  249 => 115,  243 => 113,  241 => 112,  237 => 111,  233 => 110,  223 => 105,  218 => 103,  213 => 100,  209 => 98,  203 => 96,  201 => 95,  197 => 93,  192 => 92,  172 => 75,  162 => 67,  152 => 66,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Compétitions{% endblock %}

{% block stylesheets %}
<style>
    /* =================== PAGE STYLE =================== */
    .dashboard-container { width: 100%; max-width: 1600px; margin: 0 auto; }

    /* Header */
    .page-header {
        display: flex; justify-content: space-between; align-items: center;
        margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1.5rem;
    }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }

    /* Toolbar */
    .toolbar { display: flex; gap: 1rem; align-items: center; }
    .btn-primary {
        background: var(--accent); color: #fff; padding: 0.6rem 1.5rem; border-radius: 4px;
        font-weight: 600; font-size: 0.9rem; cursor: pointer; transition: 0.2s; border: none;
        text-transform: uppercase; letter-spacing: 0.5px; text-decoration: none; display: inline-block;
    }
    .btn-primary:hover { background: var(--accent-hover); }

    /* Table */
    .content-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; }
    .table-responsive { overflow-x: auto; }
    .table { width: 100%; border-collapse: collapse; font-size: 0.9rem; }
    
    .table th {
        background: var(--bg-darker); color: var(--text-muted); font-weight: 600; text-align: left;
        padding: 1rem 1.5rem; border-bottom: 1px solid var(--border); text-transform: uppercase;
        font-size: 0.75rem; letter-spacing: 1px;
    }
    .table td {
        padding: 1rem 1.5rem; border-bottom: 1px solid var(--border); color: var(--text-main); vertical-align: top;
    }
    .table tr:last-child td { border-bottom: none; }
    .table tr:hover { background: rgba(255,255,255,0.01); }

    /* Competition Specifics */
    .comp-thumb {
        width: 80px; height: 60px; object-fit: cover; border-radius: 4px; border: 1px solid var(--border); background: var(--bg-darker);
    }
    .comp-title { font-weight: 600; font-size: 1rem; color: var(--text-main); display: block; }
    .comp-meta { font-size: 0.8rem; color: var(--text-muted); margin-top: 4px; }
    
    /* Results List */
    .results-list { list-style: none; padding: 0; margin: 0; font-size: 0.85rem; }
    .results-list li { margin-bottom: 4px; padding-left: 10px; border-left: 2px solid var(--accent); }
    .results-list span { color: var(--text-muted); font-size: 0.8rem; }

    /* Actions */
    .actions-cell { display: flex; gap: 15px; justify-content: flex-end; }
    .action-link { font-size: 0.85rem; font-weight: 500; text-decoration: none; border: none; background: none; cursor: pointer; padding: 0; }
    .link-edit { color: var(--text-muted); }
    .link-edit:hover { color: var(--text-main); text-decoration: underline; }
    .link-delete { color: #ef4444; opacity: 0.8; }
    .link-delete:hover { opacity: 1; text-decoration: underline; }

</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <div>
            <h1>Compétitions</h1>
            <p>Gestion des événements sportifs et des résultats.</p>
        </div>
        <div class=\"toolbar\">
            <a href=\"{{ path('admin_competition_new') }}\" class=\"btn-primary\">Ajouter une compétition</a>
        </div>
    </div>

    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\">
                <thead>
                    <tr>
                        <th width=\"100\">Visuel</th>
                        <th width=\"25%\">Compétition</th>
                        <th>Détails</th>
                        <th>Aperçu Résultats</th>
                        <th style=\"text-align: right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {% for comp in competitions %}
                        <tr>
                            <td>
                                {% if comp.image %}
                                    <img src=\"{{ asset('uploads/competitions/' ~ comp.image) }}\" alt=\"\" class=\"comp-thumb\">
                                {% else %}
                                    <div class=\"comp-thumb\" style=\"display:flex;align-items:center;justify-content:center;color:#666;font-size:0.7rem;\">N/A</div>
                                {% endif %}
                            </td>

                            <td>
                                <span class=\"comp-title\">{{ comp.titre }}</span>
                                <div class=\"comp-meta\">
                                    {{ comp.date|date(\"d/m/Y\") }} • {{ comp.type ?: 'Non classé' }}
                                </div>
                            </td>

                            <td style=\"font-size: 0.9rem;\">
                                <div><strong>Lieu :</strong> {{ comp.lieu ?: '—' }}</div>
                                <div><strong>Équipe :</strong> {{ comp.equipe == 'male' ? 'Masculine' : 'Féminine' }}</div>
                                {% if comp.classementEquipe %}
                                    <div style=\"margin-top:4px; color:var(--accent);\">Rang : {{ comp.classementEquipe }}</div>
                                {% endif %}
                            </td>

                            <td>
                                {% if comp.results|length > 0 %}
                                    <ul class=\"results-list\">
                                        {% for result in comp.results|slice(0, 3) %}
                                            <li>
                                                <strong>{{ result.prenom }} {{ result.nom|slice(0,1) }}.</strong> 
                                                <span>(Total: {{ result.total }})</span>
                                            </li>
                                        {% endfor %}
                                        {% if comp.results|length > 3 %}
                                            <li style=\"border:none; padding-left:0; color:var(--text-muted); font-style:italic;\">
                                                + {{ comp.results|length - 3 }} autres...
                                            </li>
                                        {% endif %}
                                    </ul>
                                {% else %}
                                    <span style=\"color:var(--text-muted); font-style:italic; font-size:0.85rem;\">Aucun résultat saisi</span>
                                {% endif %}
                            </td>

                            <td>
                                <div class=\"actions-cell\">
                                    <a href=\"{{ path('admin_competition_edit', {id: comp.id}) }}\" class=\"action-link link-edit\">Modifier</a>
                                    
                                    <form method=\"post\" action=\"{{ path('admin_competition_delete', {id: comp.id}) }}\" onsubmit=\"return confirm('Confirmer la suppression de cette compétition ?');\" style=\"display:inline;\">
                                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ comp.id) }}\">
                                        <button class=\"action-link link-delete\">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    {% else %}
                        <tr>
                            <td colspan=\"5\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucune compétition enregistrée.
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>
{% endblock %}", "admin/competitions/list.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/competitions/list.html.twig");
    }
}
