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

/* admin/security/logs.html.twig */
class __TwigTemplate_1c8036b6c96bb2a3a41b9e2c622c9de4 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/security/logs.html.twig"));

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

        yield "Journal des connexions";
        
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

    /* Toolbar & Search */
    .toolbar-container {
        display: flex; flex-wrap: wrap; gap: 1rem; justify-content: space-between; align-items: center;
        margin-bottom: 1.5rem; background: var(--bg-light); padding: 1rem; border: 1px solid var(--border); border-radius: 4px;
    }

    .search-bar {
        background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main);
        padding: 0.6rem 1rem; border-radius: 4px; outline: none; min-width: 250px; font-size: 0.9rem;
    }
    .search-bar:focus { border-color: var(--accent); }

    /* Filter Buttons */
    .filter-group { display: flex; gap: 0.5rem; flex-wrap: wrap; }
    .filter-btn {
        background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-muted);
        padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600; cursor: pointer; transition: 0.2s;
        text-transform: capitalize;
    }
    .filter-btn:hover { color: var(--text-main); border-color: var(--text-muted); }
    .filter-btn.active { background: var(--accent); color: #fff; border-color: var(--accent); }

    /* Purge Button */
    .btn-danger {
        background: transparent; color: #ef4444; padding: 0.6rem 1.5rem; border: 1px solid #ef4444; border-radius: 4px;
        font-weight: 600; font-size: 0.9rem; cursor: pointer; transition: 0.2s;
        text-transform: uppercase; letter-spacing: 0.5px; text-decoration: none; display: inline-block;
    }
    .btn-danger:hover { background: #ef4444; color: #fff; }

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

    /* Log Specifics */
    .log-success { color: #22c55e; font-weight: 600; display:inline-flex; align-items:center; gap:5px; }
    .log-failed { color: #ef4444; font-weight: 600; display:inline-flex; align-items:center; gap:5px; }
    
    .log-warning-row { background: rgba(245, 158, 11, 0.05) !important; }
    .warning-icon { color: #f59e0b; margin-right: 5px; }

    .ip-address { font-family: monospace; color: var(--text-muted); background: rgba(0,0,0,0.2); padding: 2px 6px; border-radius: 4px; font-size: 0.85rem; }
    .browser-info { font-size: 0.8rem; color: var(--text-muted); }

    /* Flash */
    .flash-success {
        background: rgba(34, 197, 94, 0.1); color: #22c55e; border: 1px solid rgba(34, 197, 94, 0.2);
        padding: 1rem; border-radius: 4px; margin-bottom: 1.5rem; font-weight: 500;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 82
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 83
        yield "<div class=\"dashboard-container\">
    
    ";
        // line 85
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 85, $this->source); })()), "flashes", ["success"], "method", false, false, false, 85));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 86
            yield "        <div class=\"flash-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        yield "
    <div class=\"page-header\">
        <div>
            <h1>Journal des connexions</h1>
            <p>Historique des tentatives d'authentification et alertes de sécurité.</p>
        </div>
        <div>
            <a href=\"";
        // line 95
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_security_purge_logs");
        yield "\" class=\"btn-danger\" onclick=\"return confirm('Attention : Vous allez effacer TOUT l\\'historique des connexions.\\n\\nConfirmer ?');\">
                Purger l'historique
            </a>
        </div>
    </div>

    <div class=\"toolbar-container\">
        <div class=\"filter-group\">
            <button class=\"filter-btn active\" data-filter=\"all\">Tous</button>
            <button class=\"filter-btn\" data-filter=\"success\">Succès</button>
            <button class=\"filter-btn\" data-filter=\"failed\">Échecs</button>
            <button class=\"filter-btn\" data-filter=\"session\">Alertes</button>
        </div>
        <div>
            <input type=\"text\" id=\"searchLogs\" class=\"search-bar\" placeholder=\"Rechercher (IP, Email)...\">
        </div>
    </div>

    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\" id=\"logsTable\">
                <thead>
                    <tr>
                        <th width=\"50\">ID</th>
                        <th>Utilisateur / Email</th>
                        <th>IP & Localisation</th>
                        <th>Appareil</th>
                        <th>Type d'événement</th>
                        <th>Détail</th>
                        <th>Résultat</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 129
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["logs"]) || array_key_exists("logs", $context) ? $context["logs"] : (function () { throw new RuntimeError('Variable "logs" does not exist.', 129, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
            // line 130
            yield "                        ";
            // line 134
            yield "                        ";
            $context["rowStatus"] = "success";
            // line 135
            yield "                        ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "success", [], "any", false, false, false, 135) == false)) {
                // line 136
                yield "                            ";
                $context["rowStatus"] = "failed";
                // line 137
                yield "                        ";
            }
            // line 138
            yield "                        ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 138) == "Session")) {
                // line 139
                yield "                            ";
                $context["rowStatus"] = "session";
                // line 140
                yield "                        ";
            }
            // line 141
            yield "
                        <tr class=\"log-row ";
            // line 142
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 142) == "Session")) {
                yield "log-warning-row";
            }
            yield "\" data-status=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["rowStatus"]) || array_key_exists("rowStatus", $context) ? $context["rowStatus"] : (function () { throw new RuntimeError('Variable "rowStatus" does not exist.', 142, $this->source); })()), "html", null, true);
            yield "\">
                            <td style=\"color: var(--text-muted); font-size: 0.8rem;\">#";
            // line 143
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "id", [], "any", false, false, false, 143), "html", null, true);
            yield "</td>
                            
                            <td>
                                <strong>";
            // line 146
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "emailAttempt", [], "any", true, true, false, 146) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["log"], "emailAttempt", [], "any", false, false, false, 146)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "emailAttempt", [], "any", false, false, false, 146), "html", null, true)) : ("Système"));
            yield "</strong>
                            </td>

                            <td>
                                <span class=\"ip-address\">";
            // line 150
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "ip", [], "any", true, true, false, 150) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["log"], "ip", [], "any", false, false, false, 150)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "ip", [], "any", false, false, false, 150), "html", null, true)) : ("—"));
            yield "</span>
                            </td>

                            <td>
                                <div class=\"browser-info\">
                                    ";
            // line 155
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "os", [], "any", true, true, false, 155) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["log"], "os", [], "any", false, false, false, 155)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "os", [], "any", false, false, false, 155), "html", null, true)) : ("?"));
            yield " / ";
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "browser", [], "any", true, true, false, 155) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["log"], "browser", [], "any", false, false, false, 155)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "browser", [], "any", false, false, false, 155), "html", null, true)) : ("?"));
            yield "
                                </div>
                            </td>

                            <td>";
            // line 159
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", true, true, false, 159) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 159)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 159), "html", null, true)) : ("Connexion"));
            yield "</td>

                            <td>
                                ";
            // line 162
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 162) == "Session")) {
                // line 163
                yield "                                    <span class=\"warning-icon\">⚠️</span>
                                ";
            }
            // line 165
            yield "                                <span style=\"font-size: 0.85rem;\">";
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "message", [], "any", true, true, false, 165) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["log"], "message", [], "any", false, false, false, 165)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "message", [], "any", false, false, false, 165), "html", null, true)) : ("—"));
            yield "</span>
                            </td>

                            <td>
                                ";
            // line 169
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["log"], "success", [], "any", false, false, false, 169)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 170
                yield "                                    <span class=\"log-success\">✅ Succès</span>
                                ";
            } else {
                // line 172
                yield "                                    <span class=\"log-failed\">❌ Échec</span>
                                ";
            }
            // line 174
            yield "                            </td>

                            <td style=\"color: var(--text-muted); font-size: 0.85rem;\">
                                ";
            // line 177
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "createdAt", [], "any", false, false, false, 177), "d/m/Y H:i:s"), "html", null, true);
            yield "
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 180
        if (!$context['_iterated']) {
            // line 181
            yield "                        <tr>
                            <td colspan=\"8\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucun journal d'activité enregistré.
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['log'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 187
        yield "                </tbody>
            </table>
            
            <div id=\"noResults\" style=\"display:none; text-align:center; padding:2rem; color:var(--text-muted);\">
                Aucune entrée ne correspond à vos filtres.
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchLogs');
    const filterButtons = document.querySelectorAll('.filter-btn');
    const tableRows = document.querySelectorAll('.log-row');
    const noResultsMsg = document.getElementById('noResults');

    let currentFilter = 'all';
    let currentSearch = '';

    function applyFilters() {
        let visibleCount = 0;

        tableRows.forEach(row => {
            const rowStatus = row.getAttribute('data-status'); // success, failed, session
            const rowText = row.textContent.toLowerCase(); 

            // Filtre par catégorie
            const matchesFilter = (currentFilter === 'all') || (rowStatus === currentFilter);
            
            // Filtre par recherche texte
            const matchesSearch = rowText.includes(currentSearch);

            if (matchesFilter && matchesSearch) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        noResultsMsg.style.display = (visibleCount === 0) ? 'block' : 'none';
    }

    // Clic sur les boutons
    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            filterButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            currentFilter = btn.getAttribute('data-filter');
            applyFilters();
        });
    });

    // Recherche clavier
    searchInput.addEventListener('keyup', (e) => {
        currentSearch = e.target.value.toLowerCase();
        applyFilters();
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
        return "admin/security/logs.html.twig";
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
        return array (  366 => 187,  355 => 181,  353 => 180,  345 => 177,  340 => 174,  336 => 172,  332 => 170,  330 => 169,  322 => 165,  318 => 163,  316 => 162,  310 => 159,  301 => 155,  293 => 150,  286 => 146,  280 => 143,  272 => 142,  269 => 141,  266 => 140,  263 => 139,  260 => 138,  257 => 137,  254 => 136,  251 => 135,  248 => 134,  246 => 130,  241 => 129,  204 => 95,  195 => 88,  186 => 86,  182 => 85,  178 => 83,  168 => 82,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Journal des connexions{% endblock %}

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

    /* Toolbar & Search */
    .toolbar-container {
        display: flex; flex-wrap: wrap; gap: 1rem; justify-content: space-between; align-items: center;
        margin-bottom: 1.5rem; background: var(--bg-light); padding: 1rem; border: 1px solid var(--border); border-radius: 4px;
    }

    .search-bar {
        background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main);
        padding: 0.6rem 1rem; border-radius: 4px; outline: none; min-width: 250px; font-size: 0.9rem;
    }
    .search-bar:focus { border-color: var(--accent); }

    /* Filter Buttons */
    .filter-group { display: flex; gap: 0.5rem; flex-wrap: wrap; }
    .filter-btn {
        background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-muted);
        padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600; cursor: pointer; transition: 0.2s;
        text-transform: capitalize;
    }
    .filter-btn:hover { color: var(--text-main); border-color: var(--text-muted); }
    .filter-btn.active { background: var(--accent); color: #fff; border-color: var(--accent); }

    /* Purge Button */
    .btn-danger {
        background: transparent; color: #ef4444; padding: 0.6rem 1.5rem; border: 1px solid #ef4444; border-radius: 4px;
        font-weight: 600; font-size: 0.9rem; cursor: pointer; transition: 0.2s;
        text-transform: uppercase; letter-spacing: 0.5px; text-decoration: none; display: inline-block;
    }
    .btn-danger:hover { background: #ef4444; color: #fff; }

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

    /* Log Specifics */
    .log-success { color: #22c55e; font-weight: 600; display:inline-flex; align-items:center; gap:5px; }
    .log-failed { color: #ef4444; font-weight: 600; display:inline-flex; align-items:center; gap:5px; }
    
    .log-warning-row { background: rgba(245, 158, 11, 0.05) !important; }
    .warning-icon { color: #f59e0b; margin-right: 5px; }

    .ip-address { font-family: monospace; color: var(--text-muted); background: rgba(0,0,0,0.2); padding: 2px 6px; border-radius: 4px; font-size: 0.85rem; }
    .browser-info { font-size: 0.8rem; color: var(--text-muted); }

    /* Flash */
    .flash-success {
        background: rgba(34, 197, 94, 0.1); color: #22c55e; border: 1px solid rgba(34, 197, 94, 0.2);
        padding: 1rem; border-radius: 4px; margin-bottom: 1.5rem; font-weight: 500;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    {% for message in app.flashes('success') %}
        <div class=\"flash-success\">{{ message }}</div>
    {% endfor %}

    <div class=\"page-header\">
        <div>
            <h1>Journal des connexions</h1>
            <p>Historique des tentatives d'authentification et alertes de sécurité.</p>
        </div>
        <div>
            <a href=\"{{ path('admin_security_purge_logs') }}\" class=\"btn-danger\" onclick=\"return confirm('Attention : Vous allez effacer TOUT l\\'historique des connexions.\\n\\nConfirmer ?');\">
                Purger l'historique
            </a>
        </div>
    </div>

    <div class=\"toolbar-container\">
        <div class=\"filter-group\">
            <button class=\"filter-btn active\" data-filter=\"all\">Tous</button>
            <button class=\"filter-btn\" data-filter=\"success\">Succès</button>
            <button class=\"filter-btn\" data-filter=\"failed\">Échecs</button>
            <button class=\"filter-btn\" data-filter=\"session\">Alertes</button>
        </div>
        <div>
            <input type=\"text\" id=\"searchLogs\" class=\"search-bar\" placeholder=\"Rechercher (IP, Email)...\">
        </div>
    </div>

    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\" id=\"logsTable\">
                <thead>
                    <tr>
                        <th width=\"50\">ID</th>
                        <th>Utilisateur / Email</th>
                        <th>IP & Localisation</th>
                        <th>Appareil</th>
                        <th>Type d'événement</th>
                        <th>Détail</th>
                        <th>Résultat</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    {% for log in logs %}
                        {# 
                           Définition du statut pour le filtrage JS 
                           Priority : Session > Failed > Success
                        #}
                        {% set rowStatus = 'success' %}
                        {% if log.success == false %}
                            {% set rowStatus = 'failed' %}
                        {% endif %}
                        {% if log.type == 'Session' %}
                            {% set rowStatus = 'session' %}
                        {% endif %}

                        <tr class=\"log-row {% if log.type == 'Session' %}log-warning-row{% endif %}\" data-status=\"{{ rowStatus }}\">
                            <td style=\"color: var(--text-muted); font-size: 0.8rem;\">#{{ log.id }}</td>
                            
                            <td>
                                <strong>{{ log.emailAttempt ?? 'Système' }}</strong>
                            </td>

                            <td>
                                <span class=\"ip-address\">{{ log.ip ?? '—' }}</span>
                            </td>

                            <td>
                                <div class=\"browser-info\">
                                    {{ log.os ?? '?' }} / {{ log.browser ?? '?' }}
                                </div>
                            </td>

                            <td>{{ log.type ?? 'Connexion' }}</td>

                            <td>
                                {% if log.type == 'Session' %}
                                    <span class=\"warning-icon\">⚠️</span>
                                {% endif %}
                                <span style=\"font-size: 0.85rem;\">{{ log.message ?? '—' }}</span>
                            </td>

                            <td>
                                {% if log.success %}
                                    <span class=\"log-success\">✅ Succès</span>
                                {% else %}
                                    <span class=\"log-failed\">❌ Échec</span>
                                {% endif %}
                            </td>

                            <td style=\"color: var(--text-muted); font-size: 0.85rem;\">
                                {{ log.createdAt|date('d/m/Y H:i:s') }}
                            </td>
                        </tr>
                    {% else %}
                        <tr>
                            <td colspan=\"8\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucun journal d'activité enregistré.
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
            
            <div id=\"noResults\" style=\"display:none; text-align:center; padding:2rem; color:var(--text-muted);\">
                Aucune entrée ne correspond à vos filtres.
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchLogs');
    const filterButtons = document.querySelectorAll('.filter-btn');
    const tableRows = document.querySelectorAll('.log-row');
    const noResultsMsg = document.getElementById('noResults');

    let currentFilter = 'all';
    let currentSearch = '';

    function applyFilters() {
        let visibleCount = 0;

        tableRows.forEach(row => {
            const rowStatus = row.getAttribute('data-status'); // success, failed, session
            const rowText = row.textContent.toLowerCase(); 

            // Filtre par catégorie
            const matchesFilter = (currentFilter === 'all') || (rowStatus === currentFilter);
            
            // Filtre par recherche texte
            const matchesSearch = rowText.includes(currentSearch);

            if (matchesFilter && matchesSearch) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        noResultsMsg.style.display = (visibleCount === 0) ? 'block' : 'none';
    }

    // Clic sur les boutons
    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            filterButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            currentFilter = btn.getAttribute('data-filter');
            applyFilters();
        });
    });

    // Recherche clavier
    searchInput.addEventListener('keyup', (e) => {
        currentSearch = e.target.value.toLowerCase();
        applyFilters();
    });
});
</script>
{% endblock %}", "admin/security/logs.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/security/logs.html.twig");
    }
}
