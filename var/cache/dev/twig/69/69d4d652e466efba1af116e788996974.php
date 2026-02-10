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

/* admin/stats/index.html.twig */
class __TwigTemplate_86bb6d90cc1e11cfb6bd7e5a79cf927b extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/stats/index.html.twig"));

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

        yield "Statistiques";
        
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
        margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1.5rem;
    }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }

    /* KPI Cards (Grid) */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: var(--bg-light);
        border: 1px solid var(--border);
        padding: 1.5rem;
        border-radius: 4px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        transition: transform 0.2s, border-color 0.2s;
    }
    .stat-card:hover { transform: translateY(-2px); border-color: var(--accent); }

    .stat-label {
        color: var(--text-muted);
        font-size: 0.8rem;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
    }

    .stat-value {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--text-main);
        line-height: 1;
    }

    /* Charts Layout */
    .charts-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }
    @media(max-width: 1000px) { .charts-row { grid-template-columns: 1fr; } }

    .chart-card {
        background: var(--bg-light);
        border: 1px solid var(--border);
        padding: 1.5rem;
        border-radius: 4px;
    }

    .chart-title {
        margin: 0 0 1.5rem 0;
        font-size: 1rem;
        font-weight: 600;
        color: var(--text-main);
    }

</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 78
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 79
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Statistiques</h1>
        <p>Vue d'ensemble de l'activité du site et des inscriptions.</p>
    </div>

    <div class=\"stats-grid\">
        <div class=\"stat-card\">
            <span class=\"stat-label\">Utilisateurs Inscrits</span>
            <span class=\"stat-value\">";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalUsers"]) || array_key_exists("totalUsers", $context) ? $context["totalUsers"] : (function () { throw new RuntimeError('Variable "totalUsers" does not exist.', 89, $this->source); })()), "html", null, true);
        yield "</span>
        </div>
        <div class=\"stat-card\">
            <span class=\"stat-label\">Articles Publiés</span>
            <span class=\"stat-value\">";
        // line 93
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalArticles"]) || array_key_exists("totalArticles", $context) ? $context["totalArticles"] : (function () { throw new RuntimeError('Variable "totalArticles" does not exist.', 93, $this->source); })()), "html", null, true);
        yield "</span>
        </div>
        <div class=\"stat-card\">
            <span class=\"stat-label\">Abonnés Newsletter</span>
            <span class=\"stat-value\">";
        // line 97
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["newsletterSubscribers"]) || array_key_exists("newsletterSubscribers", $context) ? $context["newsletterSubscribers"] : (function () { throw new RuntimeError('Variable "newsletterSubscribers" does not exist.', 97, $this->source); })()), "html", null, true);
        yield "</span>
        </div>
        </div>

    <div class=\"charts-row\">
        
        <div class=\"chart-card\">
            <h3 class=\"chart-title\">Inscriptions (7 derniers jours)</h3>
            <canvas id=\"usersChart\"></canvas>
        </div>

        <div class=\"chart-card\">
            <h3 class=\"chart-title\">Activité éditoriale</h3>
            <canvas id=\"articlesChart\"></canvas>
        </div>

    </div>
</div>

<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
<script>
    // Configuration globale des couleurs pour le thème sombre
    Chart.defaults.color = '#9ca3af';
    Chart.defaults.borderColor = '#2a2a2d';

    const labels = ";
        // line 122
        yield json_encode((isset($context["labels"]) || array_key_exists("labels", $context) ? $context["labels"] : (function () { throw new RuntimeError('Variable "labels" does not exist.', 122, $this->source); })()));
        yield ";
    const userRegistrations = ";
        // line 123
        yield json_encode((isset($context["userRegistrations"]) || array_key_exists("userRegistrations", $context) ? $context["userRegistrations"] : (function () { throw new RuntimeError('Variable "userRegistrations" does not exist.', 123, $this->source); })()));
        yield ";
    const articlesPublished = ";
        // line 124
        yield json_encode((isset($context["articlesPublished"]) || array_key_exists("articlesPublished", $context) ? $context["articlesPublished"] : (function () { throw new RuntimeError('Variable "articlesPublished" does not exist.', 124, $this->source); })()));
        yield ";

    // 1. Graphique Inscriptions (Ligne courbée)
    new Chart(document.getElementById('usersChart'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Nouveaux utilisateurs',
                data: userRegistrations,
                borderColor: '#ff6600',
                backgroundColor: 'rgba(255, 102, 0, 0.1)',
                borderWidth: 2,
                tension: 0.4, // Courbe lisse
                fill: true,
                pointRadius: 4,
                pointBackgroundColor: '#ff6600'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true, grid: { borderDash: [4, 4] } },
                x: { grid: { display: false } }
            }
        }
    });

    // 2. Graphique Articles (Barres)
    new Chart(document.getElementById('articlesChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Articles publiés',
                data: articlesPublished,
                backgroundColor: '#3b82f6', // Bleu pour différencier
                borderRadius: 4,
                barThickness: 20
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1 } },
                x: { grid: { display: false } }
            }
        }
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
        return "admin/stats/index.html.twig";
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
        return array (  236 => 124,  232 => 123,  228 => 122,  200 => 97,  193 => 93,  186 => 89,  174 => 79,  164 => 78,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Statistiques{% endblock %}

{% block stylesheets %}
<style>
    /* =================== PAGE STYLE =================== */
    .dashboard-container { width: 100%; max-width: 1600px; margin: 0 auto; }

    /* Header */
    .page-header {
        margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1.5rem;
    }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }

    /* KPI Cards (Grid) */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: var(--bg-light);
        border: 1px solid var(--border);
        padding: 1.5rem;
        border-radius: 4px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        transition: transform 0.2s, border-color 0.2s;
    }
    .stat-card:hover { transform: translateY(-2px); border-color: var(--accent); }

    .stat-label {
        color: var(--text-muted);
        font-size: 0.8rem;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
    }

    .stat-value {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--text-main);
        line-height: 1;
    }

    /* Charts Layout */
    .charts-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }
    @media(max-width: 1000px) { .charts-row { grid-template-columns: 1fr; } }

    .chart-card {
        background: var(--bg-light);
        border: 1px solid var(--border);
        padding: 1.5rem;
        border-radius: 4px;
    }

    .chart-title {
        margin: 0 0 1.5rem 0;
        font-size: 1rem;
        font-weight: 600;
        color: var(--text-main);
    }

</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Statistiques</h1>
        <p>Vue d'ensemble de l'activité du site et des inscriptions.</p>
    </div>

    <div class=\"stats-grid\">
        <div class=\"stat-card\">
            <span class=\"stat-label\">Utilisateurs Inscrits</span>
            <span class=\"stat-value\">{{ totalUsers }}</span>
        </div>
        <div class=\"stat-card\">
            <span class=\"stat-label\">Articles Publiés</span>
            <span class=\"stat-value\">{{ totalArticles }}</span>
        </div>
        <div class=\"stat-card\">
            <span class=\"stat-label\">Abonnés Newsletter</span>
            <span class=\"stat-value\">{{ newsletterSubscribers }}</span>
        </div>
        </div>

    <div class=\"charts-row\">
        
        <div class=\"chart-card\">
            <h3 class=\"chart-title\">Inscriptions (7 derniers jours)</h3>
            <canvas id=\"usersChart\"></canvas>
        </div>

        <div class=\"chart-card\">
            <h3 class=\"chart-title\">Activité éditoriale</h3>
            <canvas id=\"articlesChart\"></canvas>
        </div>

    </div>
</div>

<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
<script>
    // Configuration globale des couleurs pour le thème sombre
    Chart.defaults.color = '#9ca3af';
    Chart.defaults.borderColor = '#2a2a2d';

    const labels = {{ labels|json_encode|raw }};
    const userRegistrations = {{ userRegistrations|json_encode|raw }};
    const articlesPublished = {{ articlesPublished|json_encode|raw }};

    // 1. Graphique Inscriptions (Ligne courbée)
    new Chart(document.getElementById('usersChart'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Nouveaux utilisateurs',
                data: userRegistrations,
                borderColor: '#ff6600',
                backgroundColor: 'rgba(255, 102, 0, 0.1)',
                borderWidth: 2,
                tension: 0.4, // Courbe lisse
                fill: true,
                pointRadius: 4,
                pointBackgroundColor: '#ff6600'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true, grid: { borderDash: [4, 4] } },
                x: { grid: { display: false } }
            }
        }
    });

    // 2. Graphique Articles (Barres)
    new Chart(document.getElementById('articlesChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Articles publiés',
                data: articlesPublished,
                backgroundColor: '#3b82f6', // Bleu pour différencier
                borderRadius: 4,
                barThickness: 20
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1 } },
                x: { grid: { display: false } }
            }
        }
    });
</script>
{% endblock %}", "admin/stats/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/stats/index.html.twig");
    }
}
