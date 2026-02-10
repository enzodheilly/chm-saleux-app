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

/* admin/newsletter/history.html.twig */
class __TwigTemplate_21f3e443804977cd759f0f99eaef59a7 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/newsletter/history.html.twig"));

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

        yield "Historique des campagnes";
        
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

    /* Stats Grid */
    .stats-grid {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;
    }
    .stat-card {
        background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 1.5rem;
    }
    .stat-label { font-size: 0.8rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.5rem; }
    .stat-value { font-size: 2rem; font-weight: 700; color: var(--text-main); }
    
    /* Section Headers */
    .section-title { font-size: 1.1rem; font-weight: 700; color: var(--text-main); margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center; }

    /* Filters */
    .filter-select {
        background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main);
        padding: 0.4rem 0.8rem; border-radius: 4px; font-size: 0.85rem; outline: none; cursor: pointer;
    }

    /* Chart Container */
    .chart-container { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 1.5rem; margin-bottom: 2rem; }

    /* Table Styles */
    .content-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; }
    .table { width: 100%; border-collapse: collapse; font-size: 0.9rem; }
    .table th {
        background: var(--bg-darker); color: var(--text-muted); font-weight: 600; text-align: left;
        padding: 1rem 1.5rem; border-bottom: 1px solid var(--border); text-transform: uppercase; font-size: 0.75rem;
    }
    .table td { padding: 1rem 1.5rem; border-bottom: 1px solid var(--border); color: var(--text-main); vertical-align: middle; }
    .table tr:hover { background: rgba(255,255,255,0.01); }

    /* Progress Bars */
    .progress-wrapper { width: 100%; max-width: 120px; background: var(--bg-darker); border-radius: 2px; height: 6px; overflow: hidden; margin-bottom: 4px; }
    .progress-bar { height: 100%; border-radius: 2px; }
    .bg-open { background: #22c55e; }
    .bg-click { background: #3b82f6; }
    .progress-text { font-size: 0.75rem; color: var(--text-muted); }

    /* Actions */
    .btn-view {
        background: transparent; border: 1px solid var(--border); color: var(--text-main);
        padding: 0.4rem 0.8rem; border-radius: 4px; font-size: 0.8rem; font-weight: 500; cursor: pointer; transition: 0.2s;
    }
    .btn-view:hover { border-color: var(--accent); color: var(--accent); }

    /* Modal */
    .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 1000; justify-content: center; align-items: center; }
    .modal-content { background: #fff; width: 90%; max-width: 800px; max-height: 90vh; overflow-y: auto; padding: 2rem; border-radius: 4px; position: relative; color: #000; }
    .modal-close { position: absolute; top: 1rem; right: 1rem; font-size: 1.5rem; cursor: pointer; color: #666; }
    .modal-close:hover { color: #000; }

</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 65
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 66
        yield "<div class=\"dashboard-container\">
    
    <div style=\"margin-bottom: 2rem;\">
        <h1 style=\"margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main);\">Performances Newsletter</h1>
        <p style=\"color: var(--text-muted); margin-top: 5px;\">Analyse des envois et de l'engagement.</p>
    </div>

    ";
        // line 74
        yield "    <div class=\"stats-grid\">
        <div class=\"stat-card\">
            <div class=\"stat-label\">Campagnes Envoyées</div>
            <div class=\"stat-value\">";
        // line 77
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["messages"]) || array_key_exists("messages", $context) ? $context["messages"] : (function () { throw new RuntimeError('Variable "messages" does not exist.', 77, $this->source); })())), "html", null, true);
        yield "</div>
        </div>
        
        ";
        // line 80
        $context["totalRecipients"] = Twig\Extension\CoreExtension::reduce($this->env, (isset($context["messages"]) || array_key_exists("messages", $context) ? $context["messages"] : (function () { throw new RuntimeError('Variable "messages" does not exist.', 80, $this->source); })()), function ($__carry__, $__m__) use ($context, $macros) { $context["carry"] = $__carry__; $context["m"] = $__m__; return ((isset($context["carry"]) || array_key_exists("carry", $context) ? $context["carry"] : (function () { throw new RuntimeError('Variable "carry" does not exist.', 80, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["m"]) || array_key_exists("m", $context) ? $context["m"] : (function () { throw new RuntimeError('Variable "m" does not exist.', 80, $this->source); })()), "recipientCount", [], "any", false, false, false, 80)); }, 0);
        // line 81
        yield "        <div class=\"stat-card\">
            <div class=\"stat-label\">Total Destinataires</div>
            <div class=\"stat-value\">";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalRecipients"]) || array_key_exists("totalRecipients", $context) ? $context["totalRecipients"] : (function () { throw new RuntimeError('Variable "totalRecipients" does not exist.', 83, $this->source); })()), "html", null, true);
        yield "</div>
        </div>

        ";
        // line 86
        $context["totalOpens"] = Twig\Extension\CoreExtension::reduce($this->env, (isset($context["messages"]) || array_key_exists("messages", $context) ? $context["messages"] : (function () { throw new RuntimeError('Variable "messages" does not exist.', 86, $this->source); })()), function ($__carry__, $__m__) use ($context, $macros) { $context["carry"] = $__carry__; $context["m"] = $__m__; return ((isset($context["carry"]) || array_key_exists("carry", $context) ? $context["carry"] : (function () { throw new RuntimeError('Variable "carry" does not exist.', 86, $this->source); })()) + (((CoreExtension::getAttribute($this->env, $this->source, ($context["m"] ?? null), "openCount", [], "any", true, true, false, 86) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["m"]) || array_key_exists("m", $context) ? $context["m"] : (function () { throw new RuntimeError('Variable "m" does not exist.', 86, $this->source); })()), "openCount", [], "any", false, false, false, 86)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["m"]) || array_key_exists("m", $context) ? $context["m"] : (function () { throw new RuntimeError('Variable "m" does not exist.', 86, $this->source); })()), "openCount", [], "any", false, false, false, 86)) : (0))); }, 0);
        // line 87
        yield "        ";
        $context["avgOpenRate"] = ((((isset($context["totalRecipients"]) || array_key_exists("totalRecipients", $context) ? $context["totalRecipients"] : (function () { throw new RuntimeError('Variable "totalRecipients" does not exist.', 87, $this->source); })()) > 0)) ? ((((isset($context["totalOpens"]) || array_key_exists("totalOpens", $context) ? $context["totalOpens"] : (function () { throw new RuntimeError('Variable "totalOpens" does not exist.', 87, $this->source); })()) / (isset($context["totalRecipients"]) || array_key_exists("totalRecipients", $context) ? $context["totalRecipients"] : (function () { throw new RuntimeError('Variable "totalRecipients" does not exist.', 87, $this->source); })())) * 100)) : (0));
        // line 88
        yield "        <div class=\"stat-card\">
            <div class=\"stat-label\">Taux d'Ouverture Moyen</div>
            <div class=\"stat-value\" style=\"color: #22c55e;\">";
        // line 90
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((isset($context["avgOpenRate"]) || array_key_exists("avgOpenRate", $context) ? $context["avgOpenRate"] : (function () { throw new RuntimeError('Variable "avgOpenRate" does not exist.', 90, $this->source); })()), 1), "html", null, true);
        yield "%</div>
        </div>

        ";
        // line 93
        $context["totalClicks"] = Twig\Extension\CoreExtension::reduce($this->env, (isset($context["messages"]) || array_key_exists("messages", $context) ? $context["messages"] : (function () { throw new RuntimeError('Variable "messages" does not exist.', 93, $this->source); })()), function ($__carry__, $__m__) use ($context, $macros) { $context["carry"] = $__carry__; $context["m"] = $__m__; return ((isset($context["carry"]) || array_key_exists("carry", $context) ? $context["carry"] : (function () { throw new RuntimeError('Variable "carry" does not exist.', 93, $this->source); })()) + (((CoreExtension::getAttribute($this->env, $this->source, ($context["m"] ?? null), "clickCount", [], "any", true, true, false, 93) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["m"]) || array_key_exists("m", $context) ? $context["m"] : (function () { throw new RuntimeError('Variable "m" does not exist.', 93, $this->source); })()), "clickCount", [], "any", false, false, false, 93)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["m"]) || array_key_exists("m", $context) ? $context["m"] : (function () { throw new RuntimeError('Variable "m" does not exist.', 93, $this->source); })()), "clickCount", [], "any", false, false, false, 93)) : (0))); }, 0);
        // line 94
        yield "        ";
        $context["avgClickRate"] = ((((isset($context["totalRecipients"]) || array_key_exists("totalRecipients", $context) ? $context["totalRecipients"] : (function () { throw new RuntimeError('Variable "totalRecipients" does not exist.', 94, $this->source); })()) > 0)) ? ((((isset($context["totalClicks"]) || array_key_exists("totalClicks", $context) ? $context["totalClicks"] : (function () { throw new RuntimeError('Variable "totalClicks" does not exist.', 94, $this->source); })()) / (isset($context["totalRecipients"]) || array_key_exists("totalRecipients", $context) ? $context["totalRecipients"] : (function () { throw new RuntimeError('Variable "totalRecipients" does not exist.', 94, $this->source); })())) * 100)) : (0));
        // line 95
        yield "        <div class=\"stat-card\">
            <div class=\"stat-label\">Taux de Clic Moyen</div>
            <div class=\"stat-value\" style=\"color: #3b82f6;\">";
        // line 97
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((isset($context["avgClickRate"]) || array_key_exists("avgClickRate", $context) ? $context["avgClickRate"] : (function () { throw new RuntimeError('Variable "avgClickRate" does not exist.', 97, $this->source); })()), 1), "html", null, true);
        yield "%</div>
        </div>
    </div>

    ";
        // line 102
        yield "    <div class=\"chart-container\">
        <div class=\"section-title\">
            <span>Évolution des performances</span>
            <select id=\"periodSelect\" class=\"filter-select\">
                <option value=\"90\">3 derniers mois</option>
                <option value=\"30\">30 derniers jours</option>
                <option value=\"365\">1 an</option>
            </select>
        </div>
        <canvas id=\"newsletterStatsChart\" height=\"80\"></canvas>
    </div>

    ";
        // line 115
        yield "    <div class=\"content-card\">
        <div style=\"padding: 1.5rem; border-bottom: 1px solid var(--border);\">
            <h3 style=\"margin:0; font-size:1rem;\">Historique détaillé</h3>
        </div>
        <table class=\"table\">
            <thead>
                <tr>
                    <th>Sujet</th>
                    <th>Date d'envoi</th>
                    <th>Volume</th>
                    <th>Ouverture</th>
                    <th>Clics</th>
                    <th>Type</th>
                    <th style=\"text-align: right;\">Détails</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 132
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["messages"]) || array_key_exists("messages", $context) ? $context["messages"] : (function () { throw new RuntimeError('Variable "messages" does not exist.', 132, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 133
            yield "                    ";
            $context["openRate"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "recipientCount", [], "any", false, false, false, 133) > 0)) ? (((CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "openCount", [], "any", false, false, false, 133) / CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "recipientCount", [], "any", false, false, false, 133)) * 100)) : (0));
            // line 134
            yield "                    ";
            $context["clickRate"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "recipientCount", [], "any", false, false, false, 134) > 0)) ? (((CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "clickCount", [], "any", false, false, false, 134) / CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "recipientCount", [], "any", false, false, false, 134)) * 100)) : (0));
            // line 135
            yield "                    <tr>
                        <td style=\"font-weight: 600;\">";
            // line 136
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "subject", [], "any", false, false, false, 136), "html", null, true);
            yield "</td>
                        <td style=\"color: var(--text-muted);\">";
            // line 137
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "sentAt", [], "any", false, false, false, 137), "d/m/Y H:i"), "html", null, true);
            yield "</td>
                        <td>";
            // line 138
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "recipientCount", [], "any", false, false, false, 138), "html", null, true);
            yield "</td>
                        
                        <td>
                            <div class=\"progress-wrapper\"><div class=\"progress-bar bg-open\" style=\"width: ";
            // line 141
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["openRate"]) || array_key_exists("openRate", $context) ? $context["openRate"] : (function () { throw new RuntimeError('Variable "openRate" does not exist.', 141, $this->source); })()), "html", null, true);
            yield "%;\"></div></div>
                            <span class=\"progress-text\">";
            // line 142
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((isset($context["openRate"]) || array_key_exists("openRate", $context) ? $context["openRate"] : (function () { throw new RuntimeError('Variable "openRate" does not exist.', 142, $this->source); })()), 1), "html", null, true);
            yield "%</span>
                        </td>
                        
                        <td>
                            <div class=\"progress-wrapper\"><div class=\"progress-bar bg-click\" style=\"width: ";
            // line 146
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["clickRate"]) || array_key_exists("clickRate", $context) ? $context["clickRate"] : (function () { throw new RuntimeError('Variable "clickRate" does not exist.', 146, $this->source); })()), "html", null, true);
            yield "%;\"></div></div>
                            <span class=\"progress-text\">";
            // line 147
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((isset($context["clickRate"]) || array_key_exists("clickRate", $context) ? $context["clickRate"] : (function () { throw new RuntimeError('Variable "clickRate" does not exist.', 147, $this->source); })()), 1), "html", null, true);
            yield "%</span>
                        </td>

                        <td style=\"font-size: 0.8rem; text-transform: uppercase; color: var(--text-muted);\">
                            ";
            // line 151
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "isTest", [], "any", false, false, false, 151)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Test") : ("Prod"));
            yield "
                        </td>
                        
                        <td style=\"text-align: right;\">
                            <button class=\"btn-view\" onclick=\"showPreview(";
            // line 155
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "id", [], "any", false, false, false, 155), "html", null, true);
            yield ")\">Aperçu</button>
                        </td>
                    </tr>
                ";
            $context['_iterated'] = true;
        }
        // line 158
        if (!$context['_iterated']) {
            // line 159
            yield "                    <tr><td colspan=\"7\" style=\"text-align: center; padding: 3rem; color: var(--text-muted);\">Aucun historique disponible.</td></tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 161
        yield "            </tbody>
        </table>
    </div>
</div>

<div id=\"previewModal\" class=\"modal\">
    <div class=\"modal-content\">
        <span class=\"modal-close\" id=\"closeModal\">&times;</span>
        <div id=\"modalBody\"></div>
    </div>
</div>

<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
<script>
// Data
const campaigns = ";
        // line 176
        yield json_encode(Twig\Extension\CoreExtension::map($this->env, (isset($context["messages"]) || array_key_exists("messages", $context) ? $context["messages"] : (function () { throw new RuntimeError('Variable "messages" does not exist.', 176, $this->source); })()), function ($__m__) use ($context, $macros) { $context["m"] = $__m__; return ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["m"]) || array_key_exists("m", $context) ? $context["m"] : (function () { throw new RuntimeError('Variable "m" does not exist.', 176, $this->source); })()), "id", [], "any", false, false, false, 176), "subject" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["m"]) || array_key_exists("m", $context) ? $context["m"] : (function () { throw new RuntimeError('Variable "m" does not exist.', 176, $this->source); })()), "subject", [], "any", false, false, false, 176), "content" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["m"]) || array_key_exists("m", $context) ? $context["m"] : (function () { throw new RuntimeError('Variable "m" does not exist.', 176, $this->source); })()), "content", [], "any", false, false, false, 176)]; }));
        yield ";
const rawData = ";
        // line 177
        yield json_encode(Twig\Extension\CoreExtension::map($this->env, (isset($context["messages"]) || array_key_exists("messages", $context) ? $context["messages"] : (function () { throw new RuntimeError('Variable "messages" does not exist.', 177, $this->source); })()), function ($__m__) use ($context, $macros) { $context["m"] = $__m__; return ["subject" => CoreExtension::getAttribute($this->env, $this->source,         // line 178
(isset($context["m"]) || array_key_exists("m", $context) ? $context["m"] : (function () { throw new RuntimeError('Variable "m" does not exist.', 178, $this->source); })()), "subject", [], "any", false, false, false, 178), "sentAt" => $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source,         // line 179
(isset($context["m"]) || array_key_exists("m", $context) ? $context["m"] : (function () { throw new RuntimeError('Variable "m" does not exist.', 179, $this->source); })()), "sentAt", [], "any", false, false, false, 179), "Y-m-d"), "recipientCount" => CoreExtension::getAttribute($this->env, $this->source,         // line 180
(isset($context["m"]) || array_key_exists("m", $context) ? $context["m"] : (function () { throw new RuntimeError('Variable "m" does not exist.', 180, $this->source); })()), "recipientCount", [], "any", false, false, false, 180), "openCount" => (((CoreExtension::getAttribute($this->env, $this->source,         // line 181
($context["m"] ?? null), "openCount", [], "any", true, true, false, 181) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["m"]) || array_key_exists("m", $context) ? $context["m"] : (function () { throw new RuntimeError('Variable "m" does not exist.', 181, $this->source); })()), "openCount", [], "any", false, false, false, 181)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["m"]) || array_key_exists("m", $context) ? $context["m"] : (function () { throw new RuntimeError('Variable "m" does not exist.', 181, $this->source); })()), "openCount", [], "any", false, false, false, 181)) : (0)), "clickCount" => (((CoreExtension::getAttribute($this->env, $this->source,         // line 182
($context["m"] ?? null), "clickCount", [], "any", true, true, false, 182) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["m"]) || array_key_exists("m", $context) ? $context["m"] : (function () { throw new RuntimeError('Variable "m" does not exist.', 182, $this->source); })()), "clickCount", [], "any", false, false, false, 182)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["m"]) || array_key_exists("m", $context) ? $context["m"] : (function () { throw new RuntimeError('Variable "m" does not exist.', 182, $this->source); })()), "clickCount", [], "any", false, false, false, 182)) : (0))]; }));
        // line 183
        yield ";

// Modal Logic
const modal = document.getElementById('previewModal');
const modalBody = document.getElementById('modalBody');
const closeModal = document.getElementById('closeModal');

function showPreview(id) {
    const camp = campaigns.find(c => c.id === id);
    if (!camp) return;
    modalBody.innerHTML = `<h2 style=\"margin-top:0; border-bottom:1px solid #eee; padding-bottom:10px;\">\${camp.subject}</h2><div style=\"padding-top:10px;\">\${camp.content}</div>`;
    modal.style.display = 'flex';
}
closeModal.onclick = () => modal.style.display = 'none';
window.onclick = (e) => { if (e.target === modal) modal.style.display = 'none'; };

// Chart Logic
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('newsletterStatsChart').getContext('2d');
    const periodSelect = document.getElementById('periodSelect');
    let chartInstance;

    function renderChart(period) {
        // Filtrage simple (logique à adapter selon besoin réel)
        const filtered = rawData.slice(0, 10); // Prend les 10 dernières pour l'exemple

        const labels = filtered.map(c => c.subject.substring(0, 20) + '...');
        const openRates = filtered.map(c => c.recipientCount > 0 ? (c.openCount / c.recipientCount * 100) : 0);
        const clickRates = filtered.map(c => c.recipientCount > 0 ? (c.clickCount / c.recipientCount * 100) : 0);

        if (chartInstance) chartInstance.destroy();

        chartInstance = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    { label: 'Taux d\\'ouverture', data: openRates, borderColor: '#22c55e', backgroundColor: 'rgba(34,197,94,0.1)', tension: 0.3, fill: true },
                    { label: 'Taux de clic', data: clickRates, borderColor: '#3b82f6', backgroundColor: 'rgba(59,130,246,0.1)', tension: 0.3, fill: true }
                ]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: true, labels: { color: '#9ca3af' } } },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#2a2a2d' }, ticks: { color: '#9ca3af' } },
                    x: { grid: { display: false }, ticks: { color: '#9ca3af' } }
                }
            }
        });
    }

    renderChart(90);
    periodSelect.addEventListener('change', (e) => renderChart(e.target.value));
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
        return "admin/newsletter/history.html.twig";
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
        return array (  359 => 183,  357 => 182,  356 => 181,  355 => 180,  354 => 179,  353 => 178,  352 => 177,  348 => 176,  331 => 161,  324 => 159,  322 => 158,  314 => 155,  307 => 151,  300 => 147,  296 => 146,  289 => 142,  285 => 141,  279 => 138,  275 => 137,  271 => 136,  268 => 135,  265 => 134,  262 => 133,  257 => 132,  238 => 115,  224 => 102,  217 => 97,  213 => 95,  210 => 94,  208 => 93,  202 => 90,  198 => 88,  195 => 87,  193 => 86,  187 => 83,  183 => 81,  181 => 80,  175 => 77,  170 => 74,  161 => 66,  151 => 65,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Historique des campagnes{% endblock %}

{% block stylesheets %}
<style>
    /* =================== PAGE STYLE =================== */
    .dashboard-container { width: 100%; max-width: 1600px; margin: 0 auto; }

    /* Stats Grid */
    .stats-grid {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;
    }
    .stat-card {
        background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 1.5rem;
    }
    .stat-label { font-size: 0.8rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.5rem; }
    .stat-value { font-size: 2rem; font-weight: 700; color: var(--text-main); }
    
    /* Section Headers */
    .section-title { font-size: 1.1rem; font-weight: 700; color: var(--text-main); margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center; }

    /* Filters */
    .filter-select {
        background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main);
        padding: 0.4rem 0.8rem; border-radius: 4px; font-size: 0.85rem; outline: none; cursor: pointer;
    }

    /* Chart Container */
    .chart-container { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 1.5rem; margin-bottom: 2rem; }

    /* Table Styles */
    .content-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; }
    .table { width: 100%; border-collapse: collapse; font-size: 0.9rem; }
    .table th {
        background: var(--bg-darker); color: var(--text-muted); font-weight: 600; text-align: left;
        padding: 1rem 1.5rem; border-bottom: 1px solid var(--border); text-transform: uppercase; font-size: 0.75rem;
    }
    .table td { padding: 1rem 1.5rem; border-bottom: 1px solid var(--border); color: var(--text-main); vertical-align: middle; }
    .table tr:hover { background: rgba(255,255,255,0.01); }

    /* Progress Bars */
    .progress-wrapper { width: 100%; max-width: 120px; background: var(--bg-darker); border-radius: 2px; height: 6px; overflow: hidden; margin-bottom: 4px; }
    .progress-bar { height: 100%; border-radius: 2px; }
    .bg-open { background: #22c55e; }
    .bg-click { background: #3b82f6; }
    .progress-text { font-size: 0.75rem; color: var(--text-muted); }

    /* Actions */
    .btn-view {
        background: transparent; border: 1px solid var(--border); color: var(--text-main);
        padding: 0.4rem 0.8rem; border-radius: 4px; font-size: 0.8rem; font-weight: 500; cursor: pointer; transition: 0.2s;
    }
    .btn-view:hover { border-color: var(--accent); color: var(--accent); }

    /* Modal */
    .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 1000; justify-content: center; align-items: center; }
    .modal-content { background: #fff; width: 90%; max-width: 800px; max-height: 90vh; overflow-y: auto; padding: 2rem; border-radius: 4px; position: relative; color: #000; }
    .modal-close { position: absolute; top: 1rem; right: 1rem; font-size: 1.5rem; cursor: pointer; color: #666; }
    .modal-close:hover { color: #000; }

</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    <div style=\"margin-bottom: 2rem;\">
        <h1 style=\"margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main);\">Performances Newsletter</h1>
        <p style=\"color: var(--text-muted); margin-top: 5px;\">Analyse des envois et de l'engagement.</p>
    </div>

    {# STATS GLOBALES #}
    <div class=\"stats-grid\">
        <div class=\"stat-card\">
            <div class=\"stat-label\">Campagnes Envoyées</div>
            <div class=\"stat-value\">{{ messages|length }}</div>
        </div>
        
        {% set totalRecipients = messages|reduce((carry, m) => carry + m.recipientCount, 0) %}
        <div class=\"stat-card\">
            <div class=\"stat-label\">Total Destinataires</div>
            <div class=\"stat-value\">{{ totalRecipients }}</div>
        </div>

        {% set totalOpens = messages|reduce((carry, m) => carry + (m.openCount ?? 0), 0) %}
        {% set avgOpenRate = totalRecipients > 0 ? (totalOpens / totalRecipients * 100) : 0 %}
        <div class=\"stat-card\">
            <div class=\"stat-label\">Taux d'Ouverture Moyen</div>
            <div class=\"stat-value\" style=\"color: #22c55e;\">{{ avgOpenRate|number_format(1) }}%</div>
        </div>

        {% set totalClicks = messages|reduce((carry, m) => carry + (m.clickCount ?? 0), 0) %}
        {% set avgClickRate = totalRecipients > 0 ? (totalClicks / totalRecipients * 100) : 0 %}
        <div class=\"stat-card\">
            <div class=\"stat-label\">Taux de Clic Moyen</div>
            <div class=\"stat-value\" style=\"color: #3b82f6;\">{{ avgClickRate|number_format(1) }}%</div>
        </div>
    </div>

    {# GRAPHIQUE #}
    <div class=\"chart-container\">
        <div class=\"section-title\">
            <span>Évolution des performances</span>
            <select id=\"periodSelect\" class=\"filter-select\">
                <option value=\"90\">3 derniers mois</option>
                <option value=\"30\">30 derniers jours</option>
                <option value=\"365\">1 an</option>
            </select>
        </div>
        <canvas id=\"newsletterStatsChart\" height=\"80\"></canvas>
    </div>

    {# TABLEAU HISTORIQUE #}
    <div class=\"content-card\">
        <div style=\"padding: 1.5rem; border-bottom: 1px solid var(--border);\">
            <h3 style=\"margin:0; font-size:1rem;\">Historique détaillé</h3>
        </div>
        <table class=\"table\">
            <thead>
                <tr>
                    <th>Sujet</th>
                    <th>Date d'envoi</th>
                    <th>Volume</th>
                    <th>Ouverture</th>
                    <th>Clics</th>
                    <th>Type</th>
                    <th style=\"text-align: right;\">Détails</th>
                </tr>
            </thead>
            <tbody>
                {% for msg in messages %}
                    {% set openRate = msg.recipientCount > 0 ? (msg.openCount / msg.recipientCount * 100) : 0 %}
                    {% set clickRate = msg.recipientCount > 0 ? (msg.clickCount / msg.recipientCount * 100) : 0 %}
                    <tr>
                        <td style=\"font-weight: 600;\">{{ msg.subject }}</td>
                        <td style=\"color: var(--text-muted);\">{{ msg.sentAt|date('d/m/Y H:i') }}</td>
                        <td>{{ msg.recipientCount }}</td>
                        
                        <td>
                            <div class=\"progress-wrapper\"><div class=\"progress-bar bg-open\" style=\"width: {{ openRate }}%;\"></div></div>
                            <span class=\"progress-text\">{{ openRate|number_format(1) }}%</span>
                        </td>
                        
                        <td>
                            <div class=\"progress-wrapper\"><div class=\"progress-bar bg-click\" style=\"width: {{ clickRate }}%;\"></div></div>
                            <span class=\"progress-text\">{{ clickRate|number_format(1) }}%</span>
                        </td>

                        <td style=\"font-size: 0.8rem; text-transform: uppercase; color: var(--text-muted);\">
                            {{ msg.isTest ? 'Test' : 'Prod' }}
                        </td>
                        
                        <td style=\"text-align: right;\">
                            <button class=\"btn-view\" onclick=\"showPreview({{ msg.id }})\">Aperçu</button>
                        </td>
                    </tr>
                {% else %}
                    <tr><td colspan=\"7\" style=\"text-align: center; padding: 3rem; color: var(--text-muted);\">Aucun historique disponible.</td></tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>

<div id=\"previewModal\" class=\"modal\">
    <div class=\"modal-content\">
        <span class=\"modal-close\" id=\"closeModal\">&times;</span>
        <div id=\"modalBody\"></div>
    </div>
</div>

<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
<script>
// Data
const campaigns = {{ messages|map(m => {id:m.id,subject:m.subject,content:m.content})|json_encode|raw }};
const rawData = {{ messages|map(m => {
    subject: m.subject,
    sentAt: m.sentAt|date('Y-m-d'),
    recipientCount: m.recipientCount,
    openCount: m.openCount ?? 0,
    clickCount: m.clickCount ?? 0
})|json_encode|raw }};

// Modal Logic
const modal = document.getElementById('previewModal');
const modalBody = document.getElementById('modalBody');
const closeModal = document.getElementById('closeModal');

function showPreview(id) {
    const camp = campaigns.find(c => c.id === id);
    if (!camp) return;
    modalBody.innerHTML = `<h2 style=\"margin-top:0; border-bottom:1px solid #eee; padding-bottom:10px;\">\${camp.subject}</h2><div style=\"padding-top:10px;\">\${camp.content}</div>`;
    modal.style.display = 'flex';
}
closeModal.onclick = () => modal.style.display = 'none';
window.onclick = (e) => { if (e.target === modal) modal.style.display = 'none'; };

// Chart Logic
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('newsletterStatsChart').getContext('2d');
    const periodSelect = document.getElementById('periodSelect');
    let chartInstance;

    function renderChart(period) {
        // Filtrage simple (logique à adapter selon besoin réel)
        const filtered = rawData.slice(0, 10); // Prend les 10 dernières pour l'exemple

        const labels = filtered.map(c => c.subject.substring(0, 20) + '...');
        const openRates = filtered.map(c => c.recipientCount > 0 ? (c.openCount / c.recipientCount * 100) : 0);
        const clickRates = filtered.map(c => c.recipientCount > 0 ? (c.clickCount / c.recipientCount * 100) : 0);

        if (chartInstance) chartInstance.destroy();

        chartInstance = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    { label: 'Taux d\\'ouverture', data: openRates, borderColor: '#22c55e', backgroundColor: 'rgba(34,197,94,0.1)', tension: 0.3, fill: true },
                    { label: 'Taux de clic', data: clickRates, borderColor: '#3b82f6', backgroundColor: 'rgba(59,130,246,0.1)', tension: 0.3, fill: true }
                ]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: true, labels: { color: '#9ca3af' } } },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#2a2a2d' }, ticks: { color: '#9ca3af' } },
                    x: { grid: { display: false }, ticks: { color: '#9ca3af' } }
                }
            }
        });
    }

    renderChart(90);
    periodSelect.addEventListener('change', (e) => renderChart(e.target.value));
});
</script>
{% endblock %}", "admin/newsletter/history.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/newsletter/history.html.twig");
    }
}
