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
class __TwigTemplate_0ef7873acef326aa95c10cb1dab42931 extends Template
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
        yield "
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

.badge-nocturne {
    background: rgba(99, 102, 241, 0.1);
    color: #6366f1;
    border: 1px solid rgba(99, 102, 241, 0.2);
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 600;
}

    .btn-ban {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
    border: 1px solid rgba(239, 68, 68, 0.2);
    padding: 5px 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 1.1rem;
    transition: 0.2s;
    display: inline-block;
}
.btn-ban:hover {
    background: #ef4444;
    color: #fff;
}

.btn-export {
    background: var(--bg-darker);
    color: var(--text-main);
    border: 1px solid var(--border);
    padding: 0.6rem 1rem;
    border-radius: 4px;
    font-size: 0.85rem;
    font-weight: 600;
    text-decoration: none;
    transition: 0.2s;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
}

.btn-export:hover {
    background: var(--accent);
    color: #fff;
    border-color: var(--accent);
}
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 131
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 132
        yield "<div class=\"dashboard-container\">
    
    ";
        // line 134
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 134, $this->source); })()), "flashes", ["success"], "method", false, false, false, 134));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 135
            yield "        <div class=\"flash-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 137
        yield "
    <div class=\"page-header\">
        <div>
            <h1>Journal des connexions</h1>
            <p>Historique des tentatives d'authentification et alertes de sécurité.</p>
        </div>
        <div>
    <a href=\"";
        // line 144
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_security_purge_logs");
        yield "\" class=\"btn-danger\" onclick=\"return confirm('Attention : Vous allez effacer TOUT l\\'historique.\\n\\nConfirmer ?');\">
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

        <div style=\"display: flex; gap: 10px; align-items: center;\">        
        ";
        // line 160
        yield "        <a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_security_export_csv");
        yield "\" class=\"btn-export\" title=\"Télécharger l'historique\">
            📥 Export CSV
        </a>
    </div>
        <div>
            <input type=\"text\" id=\"searchLogs\" class=\"search-bar\" placeholder=\"Rechercher (Utilisateur, Message)...\">
        </div>
    </div>

    ";
        // line 170
        yield "<div class=\"content-card\" style=\"margin-bottom: 1.5rem; padding: 1.5rem;\">
    <h3 style=\"margin-top:0; font-size: 1rem; margin-bottom: 1rem; color: var(--text-main); display: flex; align-items: center; gap: 8px;\">
        🎯 Comptes les plus visés (Échecs)
    </h3>
    <div style=\"display: flex; gap: 1rem; flex-wrap: wrap;\">
        ";
        // line 175
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(((array_key_exists("topTargets", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["topTargets"]) || array_key_exists("topTargets", $context) ? $context["topTargets"] : (function () { throw new RuntimeError('Variable "topTargets" does not exist.', 175, $this->source); })()), [])) : ([])));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["target"]) {
            // line 176
            yield "            <div style=\"background: var(--bg-darker); padding: 12px; border-radius: 6px; border-left: 4px solid #ef4444; flex: 1; min-width: 200px;\">
                <div style=\"font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px;\">
                    Utilisateur
                </div>
                <div style=\"font-weight: bold; color: var(--text-main); font-size: 0.9rem; word-break: break-all;\">
                    ";
            // line 181
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["target"], "user", [], "any", false, false, false, 181), "html", null, true);
            yield "
                </div>
                <div style=\"margin-top: 8px; font-size: 1.1rem; font-weight: 800; color: #ef4444;\">
                    ";
            // line 184
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["target"], "attempts", [], "any", false, false, false, 184), "html", null, true);
            yield " <span style=\"font-size: 0.7rem; font-weight: 400;\">tentatives</span>
                </div>
            </div>
        ";
            $context['_iterated'] = true;
        }
        // line 187
        if (!$context['_iterated']) {
            // line 188
            yield "            <div style=\"color: var(--text-muted); font-size: 0.9rem; font-style: italic;\">
                Aucune tentative suspecte détectée récemment.
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['target'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 192
        yield "    </div>
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
                        <th width=\"100\">Actions</th>
                    </tr>
                </thead>
<tbody>
    ";
        // line 213
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(((array_key_exists("logs", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["logs"]) || array_key_exists("logs", $context) ? $context["logs"] : (function () { throw new RuntimeError('Variable "logs" does not exist.', 213, $this->source); })()), [])) : ([])));
        $context['_iterated'] = false;
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
            // line 214
            yield "        ";
            // line 215
            yield "        ";
            $context["rowStatus"] = "success";
            // line 216
            yield "        ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 216) == "erreur")) {
                // line 217
                yield "            ";
                $context["rowStatus"] = "failed";
                // line 218
                yield "        ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 218) == "Session")) {
                // line 219
                yield "            ";
                $context["rowStatus"] = "session";
                // line 220
                yield "        ";
            }
            // line 221
            yield "
        <tr class=\"log-row ";
            // line 222
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 222) == "Session")) {
                yield "log-warning-row";
            }
            yield "\" data-status=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["rowStatus"]) || array_key_exists("rowStatus", $context) ? $context["rowStatus"] : (function () { throw new RuntimeError('Variable "rowStatus" does not exist.', 222, $this->source); })()), "html", null, true);
            yield "\">
            <td style=\"color: var(--text-muted); font-size: 0.8rem;\">#";
            // line 223
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "id", [], "any", false, false, false, 223), "html", null, true);
            yield "</td>
            
            <td>
                <strong>";
            // line 226
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "user", [], "any", true, true, false, 226) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["log"], "user", [], "any", false, false, false, 226)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "user", [], "any", false, false, false, 226), "html", null, true)) : ("Système"));
            yield "</strong>
            </td>

            <td>
                <div class=\"ip-container\" style=\"display: flex; flex-direction: column;\">
                    <span class=\"ip-address ip-lookup\" data-ip=\"";
            // line 231
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "ip", [], "any", false, false, false, 231), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "ip", [], "any", true, true, false, 231)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "ip", [], "any", false, false, false, 231), "—")) : ("—")), "html", null, true);
            yield "</span>
                    <span class=\"geo-info\" id=\"geo-";
            // line 232
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 232), "html", null, true);
            yield "\" style=\"font-size: 0.7rem; color: var(--accent); font-weight: 500;\"></span>
                </div>
                <div style=\"font-size: 0.7rem; color: var(--text-muted); margin-top: 4px;\">
                    Méthode: <strong>";
            // line 235
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "method", [], "any", true, true, false, 235)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "method", [], "any", false, false, false, 235), "GET")) : ("GET")), "html", null, true);
            yield "</strong>
                </div>
            </td>

            <td>
                ";
            // line 241
            yield "                <div class=\"browser-info\">
                    ";
            // line 242
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["log"], "userAgent", [], "any", false, false, false, 242)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 243
                yield "                        ";
                if (CoreExtension::inFilter("Mobi", CoreExtension::getAttribute($this->env, $this->source, $context["log"], "userAgent", [], "any", false, false, false, 243))) {
                    yield "📱 Mobile
                        ";
                } elseif (CoreExtension::inFilter("Windows", CoreExtension::getAttribute($this->env, $this->source,                 // line 244
$context["log"], "userAgent", [], "any", false, false, false, 244))) {
                    yield "💻 Windows
                        ";
                } elseif (CoreExtension::inFilter("Macintosh", CoreExtension::getAttribute($this->env, $this->source,                 // line 245
$context["log"], "userAgent", [], "any", false, false, false, 245))) {
                    yield "🖥️ macOS
                        ";
                } elseif (CoreExtension::inFilter("Linux", CoreExtension::getAttribute($this->env, $this->source,                 // line 246
$context["log"], "userAgent", [], "any", false, false, false, 246))) {
                    yield "🐧 Linux
                        ";
                } else {
                    // line 247
                    yield "🌐 Navigateur";
                }
                // line 248
                yield "                        <br>
                        <small title=\"";
                // line 249
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "userAgent", [], "any", false, false, false, 249), "html", null, true);
                yield "\" style=\"opacity: 0.6; cursor: help;\">
                            ";
                // line 250
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["log"], "userAgent", [], "any", false, false, false, 250), 0, 25), "html", null, true);
                yield "...
                        </small>
                    ";
            } else {
                // line 253
                yield "                        <span style=\"color: var(--text-muted);\">—</span>
                    ";
            }
            // line 255
            yield "                </div>
            </td>

            <td>
                <span style=\"text-transform: capitalize;\">";
            // line 259
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", true, true, false, 259) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 259)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 259), "html", null, true)) : ("Action"));
            yield "</span>
            </td>

            <td>
                ";
            // line 263
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 263) == "Session")) {
                // line 264
                yield "                    <span class=\"warning-icon\">⚠️</span>
                ";
            }
            // line 266
            yield "                
                <span style=\"font-size: 0.85rem;\">";
            // line 267
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "message", [], "any", true, true, false, 267) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["log"], "message", [], "any", false, false, false, 267)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "message", [], "any", false, false, false, 267), "html", null, true)) : ("—"));
            yield "</span>

                ";
            // line 270
            yield "                <div style=\"margin-top: 5px; display: flex; gap: 5px; flex-wrap: wrap;\">
                    ";
            // line 272
            yield "                    ";
            $context["hour"] = $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "createdAt", [], "any", false, false, false, 272), "H");
            // line 273
            yield "                    ";
            if ((((isset($context["hour"]) || array_key_exists("hour", $context) ? $context["hour"] : (function () { throw new RuntimeError('Variable "hour" does not exist.', 273, $this->source); })()) < 7) || ((isset($context["hour"]) || array_key_exists("hour", $context) ? $context["hour"] : (function () { throw new RuntimeError('Variable "hour" does not exist.', 273, $this->source); })()) > 21))) {
                // line 274
                yield "                        <span class=\"badge-nocturne\" title=\"Connexion en dehors des heures de bureau\">🌙 Nocturne</span>
                    ";
            }
            // line 276
            yield "
                    ";
            // line 278
            yield "                    ";
            $context["day"] = $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "createdAt", [], "any", false, false, false, 278), "N");
            // line 279
            yield "                    ";
            if (((isset($context["day"]) || array_key_exists("day", $context) ? $context["day"] : (function () { throw new RuntimeError('Variable "day" does not exist.', 279, $this->source); })()) >= 6)) {
                // line 280
                yield "                        <span class=\"badge-weekend\" style=\"background: rgba(245, 158, 11, 0.1); color: #f59e0b; border: 1px solid rgba(245, 158, 11, 0.2); padding: 2px 8px; border-radius: 12px; font-size: 0.7rem; font-weight: 600;\">🗓️ Week-end</span>
                    ";
            }
            // line 282
            yield "                </div>
            </td>

            <td>
                ";
            // line 286
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 286) == "erreur")) {
                // line 287
                yield "                    <span class=\"log-failed\">❌ Échec</span>
                ";
            } else {
                // line 289
                yield "                    <span class=\"log-success\">✅ Succès</span>
                ";
            }
            // line 291
            yield "            </td>

            <td style=\"color: var(--text-muted); font-size: 0.85rem;\">
                ";
            // line 294
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "createdAt", [], "any", false, false, false, 294), "d/m/Y H:i:s"), "html", null, true);
            yield "
            </td>

            <td>
                ";
            // line 298
            if (((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "ip", [], "any", false, false, false, 298) && (CoreExtension::getAttribute($this->env, $this->source, $context["log"], "ip", [], "any", false, false, false, 298) != "127.0.0.1")) && (CoreExtension::getAttribute($this->env, $this->source, $context["log"], "ip", [], "any", false, false, false, 298) != "::1"))) {
                // line 299
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_security_ban_ip", ["ip" => CoreExtension::getAttribute($this->env, $this->source, $context["log"], "ip", [], "any", false, false, false, 299)]), "html", null, true);
                yield "\" 
                       class=\"btn-ban\" 
                       onclick=\"return confirm('Voulez-vous vraiment bannir l\\'IP ";
                // line 301
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "ip", [], "any", false, false, false, 301), "html", null, true);
                yield " ?');\"
                       title=\"Bannir cette IP\">
                        🚫
                    </a>
                ";
            } else {
                // line 306
                yield "                    <span style=\"opacity: 0.3;\">—</span>
                ";
            }
            // line 308
            yield "            </td>
        </tr>
    ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        // line 310
        if (!$context['_iterated']) {
            // line 311
            yield "        <tr>
            <td colspan=\"9\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                Aucun journal d'activité enregistré.
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['log'], $context['_parent'], $context['_iterated'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 317
        yield "</tbody>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // On récupère toutes les IP uniques pour éviter de saturer l'API
    const ipElements = document.querySelectorAll('.ip-lookup');
    const uniqueIps = [...new Set(Array.from(ipElements).map(el => el.dataset.ip))].filter(ip => ip && ip !== '127.0.0.1' && ip !== '::1' && ip !== '—');

    uniqueIps.forEach(ip => {
        fetch(`https://ipapi.co/\${ip}/json/`)
            .then(response => response.json())
            .then(data => {
                if (data.city) {
                    // On met à jour tous les éléments qui ont cette IP
                    document.querySelectorAll(`.ip-lookup[data-ip=\"\${ip}\"]`).forEach(el => {
                        const geoSpan = el.nextElementSibling;
                        const flag = data.country_code ? ` <img src=\"https://flagcdn.com/16x12/\${data.country_code.toLowerCase()}.png\" style=\"vertical-align: middle;\">` : '';
                        geoSpan.innerHTML = `\${flag} \${data.city}, \${data.country_name}`;
                    });
                }
            })
            .catch(err => console.error(\"Erreur géo-IP:\", err));
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
        return array (  605 => 317,  594 => 311,  592 => 310,  578 => 308,  574 => 306,  566 => 301,  560 => 299,  558 => 298,  551 => 294,  546 => 291,  542 => 289,  538 => 287,  536 => 286,  530 => 282,  526 => 280,  523 => 279,  520 => 278,  517 => 276,  513 => 274,  510 => 273,  507 => 272,  504 => 270,  499 => 267,  496 => 266,  492 => 264,  490 => 263,  483 => 259,  477 => 255,  473 => 253,  467 => 250,  463 => 249,  460 => 248,  457 => 247,  452 => 246,  448 => 245,  444 => 244,  439 => 243,  437 => 242,  434 => 241,  426 => 235,  420 => 232,  414 => 231,  406 => 226,  400 => 223,  392 => 222,  389 => 221,  386 => 220,  383 => 219,  380 => 218,  377 => 217,  374 => 216,  371 => 215,  369 => 214,  350 => 213,  328 => 192,  319 => 188,  317 => 187,  309 => 184,  303 => 181,  296 => 176,  291 => 175,  284 => 170,  271 => 160,  253 => 144,  244 => 137,  235 => 135,  231 => 134,  227 => 132,  217 => 131,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
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

.badge-nocturne {
    background: rgba(99, 102, 241, 0.1);
    color: #6366f1;
    border: 1px solid rgba(99, 102, 241, 0.2);
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 600;
}

    .btn-ban {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
    border: 1px solid rgba(239, 68, 68, 0.2);
    padding: 5px 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 1.1rem;
    transition: 0.2s;
    display: inline-block;
}
.btn-ban:hover {
    background: #ef4444;
    color: #fff;
}

.btn-export {
    background: var(--bg-darker);
    color: var(--text-main);
    border: 1px solid var(--border);
    padding: 0.6rem 1rem;
    border-radius: 4px;
    font-size: 0.85rem;
    font-weight: 600;
    text-decoration: none;
    transition: 0.2s;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
}

.btn-export:hover {
    background: var(--accent);
    color: #fff;
    border-color: var(--accent);
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
    <a href=\"{{ path('admin_security_purge_logs') }}\" class=\"btn-danger\" onclick=\"return confirm('Attention : Vous allez effacer TOUT l\\'historique.\\n\\nConfirmer ?');\">
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

        <div style=\"display: flex; gap: 10px; align-items: center;\">        
        {# Bouton d'export CSV #}
        <a href=\"{{ path('admin_security_export_csv') }}\" class=\"btn-export\" title=\"Télécharger l'historique\">
            📥 Export CSV
        </a>
    </div>
        <div>
            <input type=\"text\" id=\"searchLogs\" class=\"search-bar\" placeholder=\"Rechercher (Utilisateur, Message)...\">
        </div>
    </div>

    {# --- SECTION TOP CIBLES --- #}
<div class=\"content-card\" style=\"margin-bottom: 1.5rem; padding: 1.5rem;\">
    <h3 style=\"margin-top:0; font-size: 1rem; margin-bottom: 1rem; color: var(--text-main); display: flex; align-items: center; gap: 8px;\">
        🎯 Comptes les plus visés (Échecs)
    </h3>
    <div style=\"display: flex; gap: 1rem; flex-wrap: wrap;\">
        {% for target in topTargets|default([]) %}
            <div style=\"background: var(--bg-darker); padding: 12px; border-radius: 6px; border-left: 4px solid #ef4444; flex: 1; min-width: 200px;\">
                <div style=\"font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px;\">
                    Utilisateur
                </div>
                <div style=\"font-weight: bold; color: var(--text-main); font-size: 0.9rem; word-break: break-all;\">
                    {{ target.user }}
                </div>
                <div style=\"margin-top: 8px; font-size: 1.1rem; font-weight: 800; color: #ef4444;\">
                    {{ target.attempts }} <span style=\"font-size: 0.7rem; font-weight: 400;\">tentatives</span>
                </div>
            </div>
        {% else %}
            <div style=\"color: var(--text-muted); font-size: 0.9rem; font-style: italic;\">
                Aucune tentative suspecte détectée récemment.
            </div>
        {% endfor %}
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
                        <th width=\"100\">Actions</th>
                    </tr>
                </thead>
<tbody>
    {# Utilisation du filtre default([]) pour éviter le crash si logs est manquant #}
    {% for log in logs|default([]) %}
        {# Détermination du statut pour le filtrage JS #}
        {% set rowStatus = 'success' %}
        {% if log.type == 'erreur' %}
            {% set rowStatus = 'failed' %}
        {% elseif log.type == 'Session' %}
            {% set rowStatus = 'session' %}
        {% endif %}

        <tr class=\"log-row {% if log.type == 'Session' %}log-warning-row{% endif %}\" data-status=\"{{ rowStatus }}\">
            <td style=\"color: var(--text-muted); font-size: 0.8rem;\">#{{ log.id }}</td>
            
            <td>
                <strong>{{ log.user ?? 'Système' }}</strong>
            </td>

            <td>
                <div class=\"ip-container\" style=\"display: flex; flex-direction: column;\">
                    <span class=\"ip-address ip-lookup\" data-ip=\"{{ log.ip }}\">{{ log.ip|default('—') }}</span>
                    <span class=\"geo-info\" id=\"geo-{{ loop.index }}\" style=\"font-size: 0.7rem; color: var(--accent); font-weight: 500;\"></span>
                </div>
                <div style=\"font-size: 0.7rem; color: var(--text-muted); margin-top: 4px;\">
                    Méthode: <strong>{{ log.method|default('GET') }}</strong>
                </div>
            </td>

            <td>
                {# Détection visuelle de l'appareil #}
                <div class=\"browser-info\">
                    {% if log.userAgent %}
                        {% if 'Mobi' in log.userAgent %}📱 Mobile
                        {% elseif 'Windows' in log.userAgent %}💻 Windows
                        {% elseif 'Macintosh' in log.userAgent %}🖥️ macOS
                        {% elseif 'Linux' in log.userAgent %}🐧 Linux
                        {% else %}🌐 Navigateur{% endif %}
                        <br>
                        <small title=\"{{ log.userAgent }}\" style=\"opacity: 0.6; cursor: help;\">
                            {{ log.userAgent|slice(0, 25) }}...
                        </small>
                    {% else %}
                        <span style=\"color: var(--text-muted);\">—</span>
                    {% endif %}
                </div>
            </td>

            <td>
                <span style=\"text-transform: capitalize;\">{{ log.type ?? 'Action' }}</span>
            </td>

            <td>
                {% if log.type == 'Session' %}
                    <span class=\"warning-icon\">⚠️</span>
                {% endif %}
                
                <span style=\"font-size: 0.85rem;\">{{ log.message ?? '—' }}</span>

                {# --- SUPERVISION COMPORTEMENTALE --- #}
                <div style=\"margin-top: 5px; display: flex; gap: 5px; flex-wrap: wrap;\">
                    {# Alerte Nocturne (entre 21h et 7h) #}
                    {% set hour = log.createdAt|date('H') %}
                    {% if hour < 7 or hour > 21 %}
                        <span class=\"badge-nocturne\" title=\"Connexion en dehors des heures de bureau\">🌙 Nocturne</span>
                    {% endif %}

                    {# Alerte Week-end #}
                    {% set day = log.createdAt|date('N') %}
                    {% if day >= 6 %}
                        <span class=\"badge-weekend\" style=\"background: rgba(245, 158, 11, 0.1); color: #f59e0b; border: 1px solid rgba(245, 158, 11, 0.2); padding: 2px 8px; border-radius: 12px; font-size: 0.7rem; font-weight: 600;\">🗓️ Week-end</span>
                    {% endif %}
                </div>
            </td>

            <td>
                {% if log.type == 'erreur' %}
                    <span class=\"log-failed\">❌ Échec</span>
                {% else %}
                    <span class=\"log-success\">✅ Succès</span>
                {% endif %}
            </td>

            <td style=\"color: var(--text-muted); font-size: 0.85rem;\">
                {{ log.createdAt|date('d/m/Y H:i:s') }}
            </td>

            <td>
                {% if log.ip and log.ip != '127.0.0.1' and log.ip != '::1' %}
                    <a href=\"{{ path('admin_security_ban_ip', {'ip': log.ip}) }}\" 
                       class=\"btn-ban\" 
                       onclick=\"return confirm('Voulez-vous vraiment bannir l\\'IP {{ log.ip }} ?');\"
                       title=\"Bannir cette IP\">
                        🚫
                    </a>
                {% else %}
                    <span style=\"opacity: 0.3;\">—</span>
                {% endif %}
            </td>
        </tr>
    {% else %}
        <tr>
            <td colspan=\"9\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // On récupère toutes les IP uniques pour éviter de saturer l'API
    const ipElements = document.querySelectorAll('.ip-lookup');
    const uniqueIps = [...new Set(Array.from(ipElements).map(el => el.dataset.ip))].filter(ip => ip && ip !== '127.0.0.1' && ip !== '::1' && ip !== '—');

    uniqueIps.forEach(ip => {
        fetch(`https://ipapi.co/\${ip}/json/`)
            .then(response => response.json())
            .then(data => {
                if (data.city) {
                    // On met à jour tous les éléments qui ont cette IP
                    document.querySelectorAll(`.ip-lookup[data-ip=\"\${ip}\"]`).forEach(el => {
                        const geoSpan = el.nextElementSibling;
                        const flag = data.country_code ? ` <img src=\"https://flagcdn.com/16x12/\${data.country_code.toLowerCase()}.png\" style=\"vertical-align: middle;\">` : '';
                        geoSpan.innerHTML = `\${flag} \${data.city}, \${data.country_name}`;
                    });
                }
            })
            .catch(err => console.error(\"Erreur géo-IP:\", err));
    });
});
</script>
{% endblock %}", "admin/security/logs.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/security/logs.html.twig");
    }
}
