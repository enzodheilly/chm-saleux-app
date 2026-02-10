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

/* admin/security/blocklist.html.twig */
class __TwigTemplate_9c962e2bf8cbeec048b097c2392b015c extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/security/blocklist.html.twig"));

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

        yield "Blocklist IP";
        
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
    .dashboard-container { width: 100%; max-width: 1200px; margin: 0 auto; }

    /* Header */
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }

    /* Toolbar */
    .toolbar { display: flex; gap: 1rem; align-items: center; margin-bottom: 1rem; }
    .search-input {
        background: transparent; border: 1px solid var(--border); color: var(--text-main);
        padding: 0.6rem 1rem; border-radius: 4px; outline: none; min-width: 300px; font-size: 0.9rem;
    }
    .search-input:focus { border-color: var(--accent); }

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

    /* Status Badge */
    .badge-blocked {
        color: #ef4444; background: rgba(239, 68, 68, 0.1); 
        padding: 4px 8px; border-radius: 4px; font-weight: 700; font-size: 0.75rem; 
        text-transform: uppercase; border: 1px solid rgba(239, 68, 68, 0.2);
    }

</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 49
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 50
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Blocklist IP</h1>
        <p>Gestion des adresses IP bannies pour activités suspectes.</p>
    </div>

    <div class=\"toolbar\">
        <input type=\"text\" id=\"searchBlock\" class=\"search-input\" placeholder=\"Rechercher une IP...\">
    </div>

    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\" id=\"blockTable\">
                <thead>
                    <tr>
                        <th width=\"150\">Adresse IP</th>
                        <th>Raison du blocage</th>
                        <th>Date de blocage</th>
                        <th>Statut</th>
                        <th style=\"text-align: right;\">Action</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 74
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(((array_key_exists("blockedIps", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["blockedIps"]) || array_key_exists("blockedIps", $context) ? $context["blockedIps"] : (function () { throw new RuntimeError('Variable "blockedIps" does not exist.', 74, $this->source); })()), [])) : ([])));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 75
            yield "                        <tr>
                            <td style=\"font-family: monospace; color: var(--text-main); font-weight: 600;\">
                                ";
            // line 77
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "ip", [], "any", false, false, false, 77), "html", null, true);
            yield "
                            </td>
                            
                            <td style=\"color: var(--text-muted);\">
                                ";
            // line 81
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["row"], "reason", [], "any", true, true, false, 81) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["row"], "reason", [], "any", false, false, false, 81)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "reason", [], "any", false, false, false, 81), "html", null, true)) : ("—"));
            yield "
                            </td>

                            <td style=\"color: var(--text-muted);\">
                                ";
            // line 85
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["row"], "blockedAt", [], "any", false, false, false, 85)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "blockedAt", [], "any", false, false, false, 85), "d/m/Y H:i"), "html", null, true)) : ("—"));
            yield "
                            </td>

                            <td>
                                <span class=\"badge-blocked\">Bloquée</span>
                            </td>

                            <td style=\"text-align: right;\">
                                ";
            // line 94
            yield "                                <span style=\"color: var(--text-muted); font-size: 0.8rem;\">—</span>
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 97
        if (!$context['_iterated']) {
            // line 98
            yield "                        <tr>
                            <td colspan=\"5\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucune adresse IP bloquée actuellement.
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['row'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 104
        yield "                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.getElementById('searchBlock').addEventListener('keyup', function() {
    const val = this.value.toLowerCase();
    const rows = document.querySelectorAll('#blockTable tbody tr');
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
        return "admin/security/blocklist.html.twig";
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
        return array (  225 => 104,  214 => 98,  212 => 97,  205 => 94,  194 => 85,  187 => 81,  180 => 77,  176 => 75,  171 => 74,  145 => 50,  135 => 49,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Blocklist IP{% endblock %}

{% block stylesheets %}
<style>
    /* =================== PAGE STYLE =================== */
    .dashboard-container { width: 100%; max-width: 1200px; margin: 0 auto; }

    /* Header */
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }

    /* Toolbar */
    .toolbar { display: flex; gap: 1rem; align-items: center; margin-bottom: 1rem; }
    .search-input {
        background: transparent; border: 1px solid var(--border); color: var(--text-main);
        padding: 0.6rem 1rem; border-radius: 4px; outline: none; min-width: 300px; font-size: 0.9rem;
    }
    .search-input:focus { border-color: var(--accent); }

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

    /* Status Badge */
    .badge-blocked {
        color: #ef4444; background: rgba(239, 68, 68, 0.1); 
        padding: 4px 8px; border-radius: 4px; font-weight: 700; font-size: 0.75rem; 
        text-transform: uppercase; border: 1px solid rgba(239, 68, 68, 0.2);
    }

</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Blocklist IP</h1>
        <p>Gestion des adresses IP bannies pour activités suspectes.</p>
    </div>

    <div class=\"toolbar\">
        <input type=\"text\" id=\"searchBlock\" class=\"search-input\" placeholder=\"Rechercher une IP...\">
    </div>

    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\" id=\"blockTable\">
                <thead>
                    <tr>
                        <th width=\"150\">Adresse IP</th>
                        <th>Raison du blocage</th>
                        <th>Date de blocage</th>
                        <th>Statut</th>
                        <th style=\"text-align: right;\">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {% for row in blockedIps|default([]) %}
                        <tr>
                            <td style=\"font-family: monospace; color: var(--text-main); font-weight: 600;\">
                                {{ row.ip }}
                            </td>
                            
                            <td style=\"color: var(--text-muted);\">
                                {{ row.reason ?? '—' }}
                            </td>

                            <td style=\"color: var(--text-muted);\">
                                {{ row.blockedAt ? row.blockedAt|date('d/m/Y H:i') : '—' }}
                            </td>

                            <td>
                                <span class=\"badge-blocked\">Bloquée</span>
                            </td>

                            <td style=\"text-align: right;\">
                                {# Bouton de déblocage si tu as une route pour ça, sinon juste indicatif #}
                                <span style=\"color: var(--text-muted); font-size: 0.8rem;\">—</span>
                            </td>
                        </tr>
                    {% else %}
                        <tr>
                            <td colspan=\"5\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucune adresse IP bloquée actuellement.
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.getElementById('searchBlock').addEventListener('keyup', function() {
    const val = this.value.toLowerCase();
    const rows = document.querySelectorAll('#blockTable tbody tr');
    rows.forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(val) ? '' : 'none';
    });
});
</script>
{% endblock %}", "admin/security/blocklist.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/security/blocklist.html.twig");
    }
}
