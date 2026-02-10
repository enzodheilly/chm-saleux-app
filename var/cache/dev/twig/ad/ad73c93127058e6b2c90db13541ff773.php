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

/* admin/forfait/index.html.twig */
class __TwigTemplate_814bf4c0311d8c3217abab9b2b337638 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/forfait/index.html.twig"));

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

        yield "Gestion des forfaits";
        
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
    .search-input {
        background: transparent; border: 1px solid var(--border); color: var(--text-main);
        padding: 0.6rem 1rem; border-radius: 4px; outline: none; min-width: 300px; font-size: 0.9rem;
    }
    .search-input:focus { border-color: var(--accent); }

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
        padding: 1rem 1.5rem; border-bottom: 1px solid var(--border); color: var(--text-main); vertical-align: middle;
    }
    .table tr:last-child td { border-bottom: none; }
    .table tr:hover { background: rgba(255,255,255,0.01); }

    /* Specific Data Styles */
    .price-main { font-weight: 700; font-size: 1rem; color: var(--text-main); }
    .price-sub { font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase; }
    
    .monthly-badge {
        color: #22c55e; background: rgba(34, 197, 94, 0.1); 
        padding: 4px 8px; border-radius: 4px; font-weight: 600; font-size: 0.85rem;
        border: 1px solid rgba(34, 197, 94, 0.2);
    }

    .badge-pop {
        color: var(--accent); background: rgba(255, 102, 0, 0.1); 
        padding: 4px 8px; border-radius: 4px; font-weight: 700; font-size: 0.75rem; 
        text-transform: uppercase; border: 1px solid rgba(255, 102, 0, 0.2);
    }
    .badge-std { font-size: 0.8rem; color: var(--text-muted); }

    /* Avantages List (Compact) */
    .features-mini { list-style: none; padding: 0; margin: 0; font-size: 0.85rem; color: var(--text-muted); }
    .features-mini li { display: inline-block; margin-right: 10px; }
    .features-mini li::after { content: \"•\"; margin-left: 10px; opacity: 0.5; }
    .features-mini li:last-child::after { content: \"\"; }

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

    // line 83
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 84
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <div>
            <h1>Forfaits & Abonnements</h1>
            <p>Gérez les offres commerciales et leurs tarifs.</p>
        </div>
        <div class=\"toolbar\">
            <input type=\"text\" id=\"searchForfait\" class=\"search-input\" placeholder=\"Rechercher une offre...\">
            <a href=\"";
        // line 93
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_forfait_new");
        yield "\" class=\"btn-primary\">Créer une offre</a>
        </div>
    </div>

    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\" id=\"forfaitTable\">
                <thead>
                    <tr>
                        <th width=\"20%\">Offre</th>
                        <th width=\"15%\">Tarif</th>
                        <th width=\"15%\">Mensualité</th>
                        <th width=\"10%\">Type</th>
                        <th width=\"30%\">Aperçu Avantages</th>
                        <th style=\"text-align: right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 112
        yield "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["forfaits"]) || array_key_exists("forfaits", $context) ? $context["forfaits"] : (function () { throw new RuntimeError('Variable "forfaits" does not exist.', 112, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["forfait"]) {
            // line 113
            yield "                        <tr>
                            <td>
                                <span style=\"font-weight: 700; font-size: 1rem;\">";
            // line 115
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["forfait"], "nom", [], "any", false, false, false, 115), "html", null, true);
            yield "</span>
                                ";
            // line 116
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["forfait"], "isPopular", [], "any", false, false, false, 116)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 117
                yield "                                    <div style=\"margin-top: 5px;\"><span class=\"badge-pop\">Populaire</span></div>
                                ";
            }
            // line 119
            yield "                            </td>

                            <td>
                                ";
            // line 122
            if ((($tmp =  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["forfait"], "prix", [], "any", false, false, false, 122))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 123
                yield "                                    <div class=\"price-main\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["forfait"], "prix", [], "any", false, false, false, 123), 0), "html", null, true);
                yield " €</div>
                                    <div class=\"price-sub\">";
                // line 124
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["forfait"], "frequence", [], "any", false, false, false, 124), "html", null, true);
                yield "</div>
                                ";
            } else {
                // line 126
                yield "                                    <span style=\"color: var(--text-muted);\">—</span>
                                ";
            }
            // line 128
            yield "                            </td>

                            <td>
                                ";
            // line 131
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["forfait"], "mensualite", [], "any", false, false, false, 131)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 132
                yield "                                    <span class=\"monthly-badge\">
                                        ";
                // line 133
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["forfait"], "mensualite", [], "any", false, false, false, 133), "html", null, true);
                yield " € /mois
                                    </span>
                                ";
            } else {
                // line 136
                yield "                                    <span style=\"color: var(--text-muted); font-size: 0.8rem;\">—</span>
                                ";
            }
            // line 138
            yield "                            </td>

                            <td>
                                <span class=\"badge-std\">";
            // line 141
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["forfait"], "frequence", [], "any", false, false, false, 141), "html", null, true);
            yield "</span>
                            </td>

                            <td>
                                ";
            // line 145
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["forfait"], "avantages", [], "any", false, false, false, 145))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 146
                yield "                                    <ul class=\"features-mini\">
                                        ";
                // line 148
                yield "                                        ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["forfait"], "avantages", [], "any", false, false, false, 148), 0, 3));
                foreach ($context['_seq'] as $context["_key"] => $context["avantage"]) {
                    // line 149
                    yield "                                            ";
                    // line 150
                    yield "                                            ";
                    $context["text"] = Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::last($this->env->getCharset(), Twig\Extension\CoreExtension::split($this->env->getCharset(), $context["avantage"], "|")));
                    // line 151
                    yield "                                            <li>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["text"]) || array_key_exists("text", $context) ? $context["text"] : (function () { throw new RuntimeError('Variable "text" does not exist.', 151, $this->source); })()), "html", null, true);
                    yield "</li>
                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['avantage'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 153
                yield "                                        ";
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["forfait"], "avantages", [], "any", false, false, false, 153)) > 3)) {
                    // line 154
                    yield "                                            <li>+ ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["forfait"], "avantages", [], "any", false, false, false, 154)) - 3), "html", null, true);
                    yield " autres...</li>
                                        ";
                }
                // line 156
                yield "                                    </ul>
                                ";
            } else {
                // line 158
                yield "                                    <span style=\"color: var(--text-muted); font-size: 0.8rem; font-style: italic;\">Aucun avantage listé</span>
                                ";
            }
            // line 160
            yield "                            </td>

                            <td>
                                <div class=\"actions-cell\">
                                    <a href=\"";
            // line 164
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_forfait_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["forfait"], "id", [], "any", false, false, false, 164)]), "html", null, true);
            yield "\" class=\"action-link link-edit\">Modifier</a>
                                    
                                    ";
            // line 167
            yield "                                    <form method=\"post\" action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_forfait_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["forfait"], "id", [], "any", false, false, false, 167)]), "html", null, true);
            yield "\" onsubmit=\"return confirm('Confirmer la suppression de l\\'offre ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["forfait"], "nom", [], "any", false, false, false, 167), "html", null, true);
            yield " ?');\" style=\"display:inline;\">
                                        <input type=\"hidden\" name=\"_token\" value=\"";
            // line 168
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["forfait"], "id", [], "any", false, false, false, 168))), "html", null, true);
            yield "\">
                                        <button class=\"action-link link-delete\">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 174
        if (!$context['_iterated']) {
            // line 175
            yield "                        ";
            // line 176
            yield "                        <tr>
                            <td colspan=\"6\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucune offre configurée.
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['forfait'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 182
        yield "                    ";
        // line 183
        yield "                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// Script de recherche JS (Il est hors de la boucle, donc pas de variable forfait ici)
document.getElementById('searchForfait').addEventListener('keyup', function() {
    const val = this.value.toLowerCase();
    const rows = document.querySelectorAll('#forfaitTable tbody tr');
    rows.forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(val) ? '' : 'none';
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
        return "admin/forfait/index.html.twig";
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
        return array (  371 => 183,  369 => 182,  358 => 176,  356 => 175,  354 => 174,  343 => 168,  336 => 167,  331 => 164,  325 => 160,  321 => 158,  317 => 156,  311 => 154,  308 => 153,  299 => 151,  296 => 150,  294 => 149,  289 => 148,  286 => 146,  284 => 145,  277 => 141,  272 => 138,  268 => 136,  262 => 133,  259 => 132,  257 => 131,  252 => 128,  248 => 126,  243 => 124,  238 => 123,  236 => 122,  231 => 119,  227 => 117,  225 => 116,  221 => 115,  217 => 113,  211 => 112,  190 => 93,  179 => 84,  169 => 83,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Gestion des forfaits{% endblock %}

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
    .search-input {
        background: transparent; border: 1px solid var(--border); color: var(--text-main);
        padding: 0.6rem 1rem; border-radius: 4px; outline: none; min-width: 300px; font-size: 0.9rem;
    }
    .search-input:focus { border-color: var(--accent); }

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
        padding: 1rem 1.5rem; border-bottom: 1px solid var(--border); color: var(--text-main); vertical-align: middle;
    }
    .table tr:last-child td { border-bottom: none; }
    .table tr:hover { background: rgba(255,255,255,0.01); }

    /* Specific Data Styles */
    .price-main { font-weight: 700; font-size: 1rem; color: var(--text-main); }
    .price-sub { font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase; }
    
    .monthly-badge {
        color: #22c55e; background: rgba(34, 197, 94, 0.1); 
        padding: 4px 8px; border-radius: 4px; font-weight: 600; font-size: 0.85rem;
        border: 1px solid rgba(34, 197, 94, 0.2);
    }

    .badge-pop {
        color: var(--accent); background: rgba(255, 102, 0, 0.1); 
        padding: 4px 8px; border-radius: 4px; font-weight: 700; font-size: 0.75rem; 
        text-transform: uppercase; border: 1px solid rgba(255, 102, 0, 0.2);
    }
    .badge-std { font-size: 0.8rem; color: var(--text-muted); }

    /* Avantages List (Compact) */
    .features-mini { list-style: none; padding: 0; margin: 0; font-size: 0.85rem; color: var(--text-muted); }
    .features-mini li { display: inline-block; margin-right: 10px; }
    .features-mini li::after { content: \"•\"; margin-left: 10px; opacity: 0.5; }
    .features-mini li:last-child::after { content: \"\"; }

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
            <h1>Forfaits & Abonnements</h1>
            <p>Gérez les offres commerciales et leurs tarifs.</p>
        </div>
        <div class=\"toolbar\">
            <input type=\"text\" id=\"searchForfait\" class=\"search-input\" placeholder=\"Rechercher une offre...\">
            <a href=\"{{ path('admin_forfait_new') }}\" class=\"btn-primary\">Créer une offre</a>
        </div>
    </div>

    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\" id=\"forfaitTable\">
                <thead>
                    <tr>
                        <th width=\"20%\">Offre</th>
                        <th width=\"15%\">Tarif</th>
                        <th width=\"15%\">Mensualité</th>
                        <th width=\"10%\">Type</th>
                        <th width=\"30%\">Aperçu Avantages</th>
                        <th style=\"text-align: right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {# DÉBUT DE LA BOUCLE #}
                    {% for forfait in forfaits %}
                        <tr>
                            <td>
                                <span style=\"font-weight: 700; font-size: 1rem;\">{{ forfait.nom }}</span>
                                {% if forfait.isPopular %}
                                    <div style=\"margin-top: 5px;\"><span class=\"badge-pop\">Populaire</span></div>
                                {% endif %}
                            </td>

                            <td>
                                {% if forfait.prix is not null %}
                                    <div class=\"price-main\">{{ forfait.prix|number_format(0) }} €</div>
                                    <div class=\"price-sub\">{{ forfait.frequence }}</div>
                                {% else %}
                                    <span style=\"color: var(--text-muted);\">—</span>
                                {% endif %}
                            </td>

                            <td>
                                {% if forfait.mensualite %}
                                    <span class=\"monthly-badge\">
                                        {{ forfait.mensualite }} € /mois
                                    </span>
                                {% else %}
                                    <span style=\"color: var(--text-muted); font-size: 0.8rem;\">—</span>
                                {% endif %}
                            </td>

                            <td>
                                <span class=\"badge-std\">{{ forfait.frequence }}</span>
                            </td>

                            <td>
                                {% if forfait.avantages is not empty %}
                                    <ul class=\"features-mini\">
                                        {# On affiche max 3 avantages #}
                                        {% for avantage in forfait.avantages|slice(0, 3) %}
                                            {# Nettoyage rapide de l'affichage icone pour l'admin #}
                                            {% set text = avantage|split('|')|last|trim %}
                                            <li>{{ text }}</li>
                                        {% endfor %}
                                        {% if forfait.avantages|length > 3 %}
                                            <li>+ {{ forfait.avantages|length - 3 }} autres...</li>
                                        {% endif %}
                                    </ul>
                                {% else %}
                                    <span style=\"color: var(--text-muted); font-size: 0.8rem; font-style: italic;\">Aucun avantage listé</span>
                                {% endif %}
                            </td>

                            <td>
                                <div class=\"actions-cell\">
                                    <a href=\"{{ path('admin_forfait_edit', {'id': forfait.id}) }}\" class=\"action-link link-edit\">Modifier</a>
                                    
                                    {# Le formulaire de suppression est DANS la boucle pour avoir accès à l'ID #}
                                    <form method=\"post\" action=\"{{ path('admin_forfait_delete', {'id': forfait.id}) }}\" onsubmit=\"return confirm('Confirmer la suppression de l\\'offre {{ forfait.nom }} ?');\" style=\"display:inline;\">
                                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ forfait.id) }}\">
                                        <button class=\"action-link link-delete\">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    {% else %}
                        {# SI AUCUN FORFAIT N'EXISTE #}
                        <tr>
                            <td colspan=\"6\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucune offre configurée.
                            </td>
                        </tr>
                    {% endfor %}
                    {# FIN DE LA BOUCLE #}
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// Script de recherche JS (Il est hors de la boucle, donc pas de variable forfait ici)
document.getElementById('searchForfait').addEventListener('keyup', function() {
    const val = this.value.toLowerCase();
    const rows = document.querySelectorAll('#forfaitTable tbody tr');
    rows.forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(val) ? '' : 'none';
    });
});
</script>
{% endblock %}", "admin/forfait/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/forfait/index.html.twig");
    }
}
