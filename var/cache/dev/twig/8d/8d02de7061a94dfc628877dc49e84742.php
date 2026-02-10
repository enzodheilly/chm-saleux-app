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

/* admin/dashboard.html.twig */
class __TwigTemplate_f5c2332f64b67af5835d36fadadba912 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/dashboard.html.twig"));

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

        yield "Tableau de bord";
        
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
    /* =================== 🔒 LE STYLE \"ÉCRAN TOTAL\" (MODIFIÉ) =================== */
    /* Cette classe force le bloc à prendre tout l'écran et à passer au-dessus du menu */
    .gatekeeper-overlay {
        position: fixed;       /* On le fixe par rapport à la fenêtre */
        top: 0;
        left: 0;
        width: 100vw;          /* 100% de la largeur de l'écran */
        height: 100vh;         /* 100% de la hauteur de l'écran */
        background: var(--bg-darker, #1a1d21); /* Couleur de fond opaque pour cacher le reste */
        z-index: 99999;        /* Un chiffre énorme pour être sûr d'être au-dessus de tout */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .gatekeeper-card {
        text-align: center;
        max-width: 500px;
        width: 90%;
        border: 2px solid var(--accent);
        padding: 40px;
        background: var(--bg-light, #2a2f37); /* Un peu plus clair que le fond */
        border-radius: 8px;
        box-shadow: 0 0 50px rgba(0,0,0,0.5); /* Une ombre pour l'effet \"Focus\" */
    }

    /* =================== DASHBOARD GRID (VOTRE STYLE HABITUEL) =================== */
    .dashboard-container { width: 100%; max-width: 1600px; margin: 0 auto; }
    .dashboard-header { margin-bottom: 2rem; }
    .dashboard-header h1 { font-size: 1.8rem; font-weight: 800; margin: 0; color: var(--text-main); }
    .dashboard-header p { color: var(--text-muted); margin-top: 5px; font-size: 0.9rem; }

    /* STATS CARDS */
    .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.5rem; margin-bottom: 2rem; }
    .stat-card { background: var(--bg-light); border: 1px solid var(--border); padding: 1.5rem; border-radius: 8px; display: flex; flex-direction: column; justify-content: space-between; transition: transform 0.2s, box-shadow 0.2s; }
    .stat-card:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.1); border-color: var(--accent); }
    .stat-label { color: var(--text-muted); font-size: 0.85rem; font-weight: 600; text-transform: uppercase; margin-bottom: 0.5rem; }
    .stat-value { font-size: 2rem; font-weight: 800; color: var(--text-main); line-height: 1; }
    .stat-trend { font-size: 0.8rem; margin-top: 0.5rem; display: flex; align-items: center; gap: 5px; }
    .trend-up { color: var(--success, #22c55e); }
    .trend-neutral { color: var(--text-muted); }

    /* CHARTS */
    .charts-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 1.5rem; margin-bottom: 2rem; }
    .chart-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 8px; padding: 1.5rem; }
    .chart-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
    .chart-title { font-weight: 700; color: var(--text-main); }

    /* CONTENT GRID */
    .content-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; }
    @media(max-width: 1200px) { .content-grid { grid-template-columns: 1fr; } }

    .section-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 8px; overflow: hidden; display: flex; flex-direction: column; }
    .section-header { padding: 1.2rem 1.5rem; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; }
    .section-title { font-size: 1rem; font-weight: 700; color: var(--text-main); margin: 0; }

    /* TABLES & LISTS */
    .table-container { overflow-x: auto; }
    .table { width: 100%; border-collapse: collapse; font-size: 0.9rem; }
    .table th { background: var(--bg-darker); color: var(--text-muted); font-weight: 600; text-align: left; padding: 0.8rem 1.5rem; border-bottom: 1px solid var(--border); }
    .table td { padding: 0.8rem 1.5rem; border-bottom: 1px solid var(--border); color: var(--text-main); }
    .table tr:last-child td { border-bottom: none; }
    .status-badge { padding: 3px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 700; }
    .status-success { background: rgba(34, 197, 94, 0.1); color: #22c55e; }
    .status-failed { background: rgba(239, 68, 68, 0.1); color: #ef4444; }
    
    .activity-list { padding: 0; margin: 0; list-style: none; }
    .activity-item { padding: 1rem 1.5rem; border-bottom: 1px solid var(--border); display: flex; gap: 1rem; }
    .activity-dot { width: 10px; height: 10px; border-radius: 50%; background: var(--accent); margin-top: 5px; flex-shrink: 0; }
    .activity-content { font-size: 0.9rem; color: var(--text-main); }
    .activity-time { font-size: 0.8rem; color: var(--text-muted); display: block; margin-top: 4px; }
    
    .quick-actions { display: flex; gap: 10px; flex-wrap: wrap; padding: 1.5rem; }
    .action-btn { background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main); padding: 0.6rem 1rem; border-radius: 6px; font-size: 0.9rem; font-weight: 500; cursor: pointer; transition: 0.2s; }
    .action-btn:hover { border-color: var(--accent); color: var(--accent); }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 85
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 86
        yield "
";
        // line 90
        if ((array_key_exists("qrCodeContent", $context) && (isset($context["qrCodeContent"]) || array_key_exists("qrCodeContent", $context) ? $context["qrCodeContent"] : (function () { throw new RuntimeError('Variable "qrCodeContent" does not exist.', 90, $this->source); })()))) {
            // line 91
            yield "
    ";
            // line 93
            yield "    <div class=\"gatekeeper-overlay\">
        <div class=\"gatekeeper-card\">
            <h1 style=\"color: var(--accent); margin-bottom: 20px; font-size: 2rem;\">🛑 Accès Restreint</h1>
            <p style=\"color: var(--text-main); margin-bottom: 20px;\">
                Pour accéder aux données sensibles du club, vous devez sécuriser votre compte Administrateur.
            </p>
            
            <div style=\"background: white; padding: 15px; display: inline-block; margin-bottom: 25px; border-radius: 12px;\">
                <img src=\"";
            // line 101
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Endroid\QrCodeBundle\Twig\QrCodeRuntime')->qrCodeDataUriFunction((isset($context["qrCodeContent"]) || array_key_exists("qrCodeContent", $context) ? $context["qrCodeContent"] : (function () { throw new RuntimeError('Variable "qrCodeContent" does not exist.', 101, $this->source); })())), "html", null, true);
            yield "\" alt=\"QR Code\" width=\"200\" height=\"200\">
            </div>

            <p style=\"font-size: 0.9rem; color: var(--text-muted); margin-bottom: 15px;\">
                Scannez ce code avec <strong>Google Authenticator</strong> puis entrez le code ci-dessous :
            </p>

            <form method=\"POST\">
                <input type=\"text\" name=\"auth_code\" placeholder=\"000 000\" autofocus autocomplete=\"off\"
                       style=\"font-size: 2rem; text-align: center; letter-spacing: 5px; width: 100%; max-width: 250px; padding: 10px; background: var(--bg-dark); color: white; border: 1px solid var(--border); border-radius: 5px; margin-bottom: 20px;\">
                <br>
                <button type=\"submit\" class=\"action-btn\" style=\"width: 100%; font-weight: bold; font-size: 1.1rem; padding: 1rem; background: var(--accent); color: white; border: none;\">
                    🔓 Déverrouiller le Dashboard
                </button>
            </form>
            
            <a href=\"";
            // line 117
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
            yield "\" style=\"display:block; margin-top:20px; color: var(--text-muted); text-decoration: underline;\">Retourner à l'accueil du site</a>
        </div>
    </div>

";
        } else {
            // line 125
            yield "
    <div class=\"dashboard-container\">
        
        <div class=\"dashboard-header\">
            <h1>Vue d'ensemble</h1>
            <p>Bienvenue sur votre espace d'administration.</p>
        </div>

        ";
            // line 134
            yield "        <div class=\"stats-grid\">
            <div class=\"stat-card\">
                <div class=\"stat-label\">Utilisateurs Totaux</div>
                <div class=\"stat-value\">";
            // line 137
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("totalUsers", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["totalUsers"]) || array_key_exists("totalUsers", $context) ? $context["totalUsers"] : (function () { throw new RuntimeError('Variable "totalUsers" does not exist.', 137, $this->source); })()), 0)) : (0)), "html", null, true);
            yield "</div>
                <div class=\"stat-trend trend-neutral\">Inscrits</div>
            </div>
            <div class=\"stat-card\">
                <div class=\"stat-label\">Comptes Vérifiés</div>
                <div class=\"stat-value\">";
            // line 142
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("verifiedUsers", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["verifiedUsers"]) || array_key_exists("verifiedUsers", $context) ? $context["verifiedUsers"] : (function () { throw new RuntimeError('Variable "verifiedUsers" does not exist.', 142, $this->source); })()), 0)) : (0)), "html", null, true);
            yield "</div>
                <div class=\"stat-trend trend-up\">Actifs</div>
            </div>
            <div class=\"stat-card\">
                <div class=\"stat-label\">Abonnés Newsletter</div>
                <div class=\"stat-value\">";
            // line 147
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("newsletterSubscribers", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["newsletterSubscribers"]) || array_key_exists("newsletterSubscribers", $context) ? $context["newsletterSubscribers"] : (function () { throw new RuntimeError('Variable "newsletterSubscribers" does not exist.', 147, $this->source); })()), 0)) : (0)), "html", null, true);
            yield "</div>
                <div class=\"stat-trend trend-up\">+";
            // line 148
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("newSubscribersToday", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["newSubscribersToday"]) || array_key_exists("newSubscribersToday", $context) ? $context["newSubscribersToday"] : (function () { throw new RuntimeError('Variable "newSubscribersToday" does not exist.', 148, $this->source); })()), 0)) : (0)), "html", null, true);
            yield " aujourd'hui</div>
            </div>
            <div class=\"stat-card\">
                <div class=\"stat-label\">Connexions (24h)</div>
                <div class=\"stat-value\">";
            // line 152
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("successfulAttempts", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["successfulAttempts"]) || array_key_exists("successfulAttempts", $context) ? $context["successfulAttempts"] : (function () { throw new RuntimeError('Variable "successfulAttempts" does not exist.', 152, $this->source); })()), 0)) : (0)), "html", null, true);
            yield "</div>
                <div class=\"stat-trend trend-neutral\">Authentifications</div>
            </div>
        </div>

        ";
            // line 158
            yield "        <div class=\"charts-grid\">
            <div class=\"chart-card\">
                <div class=\"chart-header\">
                    <span class=\"chart-title\">Connexions (7 derniers jours)</span>
                </div>
                <canvas id=\"loginChart\"></canvas>
            </div>
            <div class=\"chart-card\">
                <div class=\"chart-header\">
                    <span class=\"chart-title\">Nouveaux abonnés</span>
                </div>
                <canvas id=\"newsletterChart\"></canvas>
            </div>
        </div>

        ";
            // line 174
            yield "        <div class=\"content-grid\">
            
            <div class=\"section-card\">
                <div class=\"section-header\">
                    <h3 class=\"section-title\">Dernières connexions</h3>
                    <button class=\"action-btn\" onclick=\"location.href='";
            // line 179
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_security_logs");
            yield "'\">Voir tout</button>
                </div>
                <div class=\"table-container\">
                    <table class=\"table\">
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>IP</th>
                                <th>Date</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
            // line 192
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), (isset($context["recentAttempts"]) || array_key_exists("recentAttempts", $context) ? $context["recentAttempts"] : (function () { throw new RuntimeError('Variable "recentAttempts" does not exist.', 192, $this->source); })()), 0, 5));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["attempt"]) {
                // line 193
                yield "                                <tr>
                                    <td><strong>";
                // line 194
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["attempt"], "emailAttempt", [], "any", false, false, false, 194), "html", null, true);
                yield "</strong></td>
                                    <td>";
                // line 195
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["attempt"], "ip", [], "any", true, true, false, 195) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["attempt"], "ip", [], "any", false, false, false, 195)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["attempt"], "ip", [], "any", false, false, false, 195), "html", null, true)) : ("-"));
                yield "</td>
                                    <td>";
                // line 196
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["attempt"], "createdAt", [], "any", false, false, false, 196), "d/m H:i"), "html", null, true);
                yield "</td>
                                    <td>
                                        ";
                // line 198
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["attempt"], "success", [], "any", false, false, false, 198)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 199
                    yield "                                            <span class=\"status-badge status-success\">Succès</span>
                                        ";
                } else {
                    // line 201
                    yield "                                            <span class=\"status-badge status-failed\">Échec</span>
                                        ";
                }
                // line 203
                yield "                                    </td>
                                </tr>
                            ";
                $context['_iterated'] = true;
            }
            // line 205
            if (!$context['_iterated']) {
                // line 206
                yield "                                <tr><td colspan=\"4\" style=\"text-align:center; padding: 2rem;\">Aucune donnée.</td></tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['attempt'], $context['_parent'], $context['_iterated']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 208
            yield "                        </tbody>
                    </table>
                </div>
            </div>

            <div style=\"display: flex; flex-direction: column; gap: 1.5rem;\">
                <div class=\"section-card\" style=\"flex: 1;\">
                    <div class=\"section-header\">
                        <h3 class=\"section-title\">Fil d'activité</h3>
                    </div>
                    <div class=\"activity-list\">
                        ";
            // line 219
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ((array_key_exists("recentActivity", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["recentActivity"]) || array_key_exists("recentActivity", $context) ? $context["recentActivity"] : (function () { throw new RuntimeError('Variable "recentActivity" does not exist.', 219, $this->source); })()), [])) : ([])), 0, 5));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 220
                yield "                            <div class=\"activity-item\">
                                <div class=\"activity-dot\"></div>
                                <div style=\"flex: 1;\">
                                    <div class=\"activity-content\">";
                // line 223
                yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, false, 223);
                yield "</div>
                                    <span class=\"activity-time\">";
                // line 224
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "date", [], "any", false, false, false, 224), "d/m/Y à H:i"), "html", null, true);
                yield "</span>
                                </div>
                            </div>
                        ";
                $context['_iterated'] = true;
            }
            // line 227
            if (!$context['_iterated']) {
                // line 228
                yield "                            <div style=\"padding: 1.5rem; text-align: center; color: var(--text-muted);\">
                                Rien à signaler aujourd'hui.
                            </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['_iterated']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 232
            yield "                    </div>
                </div>
            </div>
        </div>
    </div>

    ";
            // line 239
            yield "    <script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
    <script>
        Chart.defaults.color = '#9ca3af';
        Chart.defaults.borderColor = '#2a2a2d';
        
        const loginsData = ";
            // line 244
            yield json_encode(((array_key_exists("loginsSuccessByDay", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["loginsSuccessByDay"]) || array_key_exists("loginsSuccessByDay", $context) ? $context["loginsSuccessByDay"] : (function () { throw new RuntimeError('Variable "loginsSuccessByDay" does not exist.', 244, $this->source); })()), [0, 0, 0, 0, 0, 0, 0])) : ([0, 0, 0, 0, 0, 0, 0])));
            yield ";
        const subsData   = ";
            // line 245
            yield json_encode(((array_key_exists("newSubscribersByDay", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["newSubscribersByDay"]) || array_key_exists("newSubscribersByDay", $context) ? $context["newSubscribersByDay"] : (function () { throw new RuntimeError('Variable "newSubscribersByDay" does not exist.', 245, $this->source); })()), [0, 0, 0, 0, 0, 0, 0])) : ([0, 0, 0, 0, 0, 0, 0])));
            yield ";
        const labels7    = ";
            // line 246
            yield json_encode(((array_key_exists("labels7", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["labels7"]) || array_key_exists("labels7", $context) ? $context["labels7"] : (function () { throw new RuntimeError('Variable "labels7" does not exist.', 246, $this->source); })()), ["L", "M", "M", "J", "V", "S", "D"])) : (["L", "M", "M", "J", "V", "S", "D"])));
            yield ";

        // Sécurité JS : on vérifie que le canvas existe
        const c1 = document.getElementById('loginChart');
        if (c1) {
            new Chart(c1.getContext('2d'), {
                type: 'line',
                data: { labels: labels7, datasets: [{ label: 'Connexions', data: loginsData, borderColor: '#ff6600', backgroundColor: 'rgba(255, 102, 0, 0.1)', borderWidth: 2, tension: 0.4, fill: true, pointRadius: 3 }] },
                options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, grid: { borderDash: [2, 4] } }, x: { grid: { display: false } } } }
            });
        }

        const c2 = document.getElementById('newsletterChart');
        if (c2) {
            new Chart(c2.getContext('2d'), {
                type: 'bar',
                data: { labels: labels7, datasets: [{ label: 'Nouveaux Inscrits', data: subsData, backgroundColor: '#e5e7eb', borderRadius: 4, barThickness: 20 }] },
                options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, grid: { borderDash: [2, 4] } }, x: { grid: { display: false } } } }
            });
        }
    </script>

";
        }
        // line 269
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/dashboard.html.twig";
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
        return array (  457 => 269,  431 => 246,  427 => 245,  423 => 244,  416 => 239,  408 => 232,  399 => 228,  397 => 227,  389 => 224,  385 => 223,  380 => 220,  375 => 219,  362 => 208,  355 => 206,  353 => 205,  347 => 203,  343 => 201,  339 => 199,  337 => 198,  332 => 196,  328 => 195,  324 => 194,  321 => 193,  316 => 192,  300 => 179,  293 => 174,  276 => 158,  268 => 152,  261 => 148,  257 => 147,  249 => 142,  241 => 137,  236 => 134,  226 => 125,  218 => 117,  199 => 101,  189 => 93,  186 => 91,  184 => 90,  181 => 86,  171 => 85,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Tableau de bord{% endblock %}

{% block stylesheets %}
<style>
    /* =================== 🔒 LE STYLE \"ÉCRAN TOTAL\" (MODIFIÉ) =================== */
    /* Cette classe force le bloc à prendre tout l'écran et à passer au-dessus du menu */
    .gatekeeper-overlay {
        position: fixed;       /* On le fixe par rapport à la fenêtre */
        top: 0;
        left: 0;
        width: 100vw;          /* 100% de la largeur de l'écran */
        height: 100vh;         /* 100% de la hauteur de l'écran */
        background: var(--bg-darker, #1a1d21); /* Couleur de fond opaque pour cacher le reste */
        z-index: 99999;        /* Un chiffre énorme pour être sûr d'être au-dessus de tout */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .gatekeeper-card {
        text-align: center;
        max-width: 500px;
        width: 90%;
        border: 2px solid var(--accent);
        padding: 40px;
        background: var(--bg-light, #2a2f37); /* Un peu plus clair que le fond */
        border-radius: 8px;
        box-shadow: 0 0 50px rgba(0,0,0,0.5); /* Une ombre pour l'effet \"Focus\" */
    }

    /* =================== DASHBOARD GRID (VOTRE STYLE HABITUEL) =================== */
    .dashboard-container { width: 100%; max-width: 1600px; margin: 0 auto; }
    .dashboard-header { margin-bottom: 2rem; }
    .dashboard-header h1 { font-size: 1.8rem; font-weight: 800; margin: 0; color: var(--text-main); }
    .dashboard-header p { color: var(--text-muted); margin-top: 5px; font-size: 0.9rem; }

    /* STATS CARDS */
    .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.5rem; margin-bottom: 2rem; }
    .stat-card { background: var(--bg-light); border: 1px solid var(--border); padding: 1.5rem; border-radius: 8px; display: flex; flex-direction: column; justify-content: space-between; transition: transform 0.2s, box-shadow 0.2s; }
    .stat-card:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.1); border-color: var(--accent); }
    .stat-label { color: var(--text-muted); font-size: 0.85rem; font-weight: 600; text-transform: uppercase; margin-bottom: 0.5rem; }
    .stat-value { font-size: 2rem; font-weight: 800; color: var(--text-main); line-height: 1; }
    .stat-trend { font-size: 0.8rem; margin-top: 0.5rem; display: flex; align-items: center; gap: 5px; }
    .trend-up { color: var(--success, #22c55e); }
    .trend-neutral { color: var(--text-muted); }

    /* CHARTS */
    .charts-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 1.5rem; margin-bottom: 2rem; }
    .chart-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 8px; padding: 1.5rem; }
    .chart-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
    .chart-title { font-weight: 700; color: var(--text-main); }

    /* CONTENT GRID */
    .content-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; }
    @media(max-width: 1200px) { .content-grid { grid-template-columns: 1fr; } }

    .section-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 8px; overflow: hidden; display: flex; flex-direction: column; }
    .section-header { padding: 1.2rem 1.5rem; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; }
    .section-title { font-size: 1rem; font-weight: 700; color: var(--text-main); margin: 0; }

    /* TABLES & LISTS */
    .table-container { overflow-x: auto; }
    .table { width: 100%; border-collapse: collapse; font-size: 0.9rem; }
    .table th { background: var(--bg-darker); color: var(--text-muted); font-weight: 600; text-align: left; padding: 0.8rem 1.5rem; border-bottom: 1px solid var(--border); }
    .table td { padding: 0.8rem 1.5rem; border-bottom: 1px solid var(--border); color: var(--text-main); }
    .table tr:last-child td { border-bottom: none; }
    .status-badge { padding: 3px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 700; }
    .status-success { background: rgba(34, 197, 94, 0.1); color: #22c55e; }
    .status-failed { background: rgba(239, 68, 68, 0.1); color: #ef4444; }
    
    .activity-list { padding: 0; margin: 0; list-style: none; }
    .activity-item { padding: 1rem 1.5rem; border-bottom: 1px solid var(--border); display: flex; gap: 1rem; }
    .activity-dot { width: 10px; height: 10px; border-radius: 50%; background: var(--accent); margin-top: 5px; flex-shrink: 0; }
    .activity-content { font-size: 0.9rem; color: var(--text-main); }
    .activity-time { font-size: 0.8rem; color: var(--text-muted); display: block; margin-top: 4px; }
    
    .quick-actions { display: flex; gap: 10px; flex-wrap: wrap; padding: 1.5rem; }
    .action-btn { background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main); padding: 0.6rem 1rem; border-radius: 6px; font-size: 0.9rem; font-weight: 500; cursor: pointer; transition: 0.2s; }
    .action-btn:hover { border-color: var(--accent); color: var(--accent); }
</style>
{% endblock %}

{% block body %}

{# ================================================================= #}
{# 🔒 CAS 1 : MODE VERRUILLÉ (FULL SCREEN OVERLAY)                  #}
{# ================================================================= #}
{% if qrCodeContent is defined and qrCodeContent %}

    {# Ce div va recouvrir TOUT l'écran, sidebar comprise #}
    <div class=\"gatekeeper-overlay\">
        <div class=\"gatekeeper-card\">
            <h1 style=\"color: var(--accent); margin-bottom: 20px; font-size: 2rem;\">🛑 Accès Restreint</h1>
            <p style=\"color: var(--text-main); margin-bottom: 20px;\">
                Pour accéder aux données sensibles du club, vous devez sécuriser votre compte Administrateur.
            </p>
            
            <div style=\"background: white; padding: 15px; display: inline-block; margin-bottom: 25px; border-radius: 12px;\">
                <img src=\"{{ qr_code_data_uri(qrCodeContent) }}\" alt=\"QR Code\" width=\"200\" height=\"200\">
            </div>

            <p style=\"font-size: 0.9rem; color: var(--text-muted); margin-bottom: 15px;\">
                Scannez ce code avec <strong>Google Authenticator</strong> puis entrez le code ci-dessous :
            </p>

            <form method=\"POST\">
                <input type=\"text\" name=\"auth_code\" placeholder=\"000 000\" autofocus autocomplete=\"off\"
                       style=\"font-size: 2rem; text-align: center; letter-spacing: 5px; width: 100%; max-width: 250px; padding: 10px; background: var(--bg-dark); color: white; border: 1px solid var(--border); border-radius: 5px; margin-bottom: 20px;\">
                <br>
                <button type=\"submit\" class=\"action-btn\" style=\"width: 100%; font-weight: bold; font-size: 1.1rem; padding: 1rem; background: var(--accent); color: white; border: none;\">
                    🔓 Déverrouiller le Dashboard
                </button>
            </form>
            
            <a href=\"{{ path('home') }}\" style=\"display:block; margin-top:20px; color: var(--text-muted); text-decoration: underline;\">Retourner à l'accueil du site</a>
        </div>
    </div>

{# ================================================================= #}
{# 📊 CAS 2 : MODE NORMAL (DASHBOARD VISIBLE)                        #}
{# ================================================================= #}
{% else %}

    <div class=\"dashboard-container\">
        
        <div class=\"dashboard-header\">
            <h1>Vue d'ensemble</h1>
            <p>Bienvenue sur votre espace d'administration.</p>
        </div>

        {# ---------- 1. STATISTIQUES (GRID) ---------- #}
        <div class=\"stats-grid\">
            <div class=\"stat-card\">
                <div class=\"stat-label\">Utilisateurs Totaux</div>
                <div class=\"stat-value\">{{ totalUsers|default(0) }}</div>
                <div class=\"stat-trend trend-neutral\">Inscrits</div>
            </div>
            <div class=\"stat-card\">
                <div class=\"stat-label\">Comptes Vérifiés</div>
                <div class=\"stat-value\">{{ verifiedUsers|default(0) }}</div>
                <div class=\"stat-trend trend-up\">Actifs</div>
            </div>
            <div class=\"stat-card\">
                <div class=\"stat-label\">Abonnés Newsletter</div>
                <div class=\"stat-value\">{{ newsletterSubscribers|default(0) }}</div>
                <div class=\"stat-trend trend-up\">+{{ newSubscribersToday|default(0) }} aujourd'hui</div>
            </div>
            <div class=\"stat-card\">
                <div class=\"stat-label\">Connexions (24h)</div>
                <div class=\"stat-value\">{{ successfulAttempts|default(0) }}</div>
                <div class=\"stat-trend trend-neutral\">Authentifications</div>
            </div>
        </div>

        {# ---------- 2. GRAPHIQUES ---------- #}
        <div class=\"charts-grid\">
            <div class=\"chart-card\">
                <div class=\"chart-header\">
                    <span class=\"chart-title\">Connexions (7 derniers jours)</span>
                </div>
                <canvas id=\"loginChart\"></canvas>
            </div>
            <div class=\"chart-card\">
                <div class=\"chart-header\">
                    <span class=\"chart-title\">Nouveaux abonnés</span>
                </div>
                <canvas id=\"newsletterChart\"></canvas>
            </div>
        </div>

        {# ---------- 3. CONTENU MIXTE ---------- #}
        <div class=\"content-grid\">
            
            <div class=\"section-card\">
                <div class=\"section-header\">
                    <h3 class=\"section-title\">Dernières connexions</h3>
                    <button class=\"action-btn\" onclick=\"location.href='{{ path('admin_security_logs') }}'\">Voir tout</button>
                </div>
                <div class=\"table-container\">
                    <table class=\"table\">
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>IP</th>
                                <th>Date</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            {% for attempt in recentAttempts|slice(0, 5) %}
                                <tr>
                                    <td><strong>{{ attempt.emailAttempt }}</strong></td>
                                    <td>{{ attempt.ip ?? '-' }}</td>
                                    <td>{{ attempt.createdAt|date('d/m H:i') }}</td>
                                    <td>
                                        {% if attempt.success %}
                                            <span class=\"status-badge status-success\">Succès</span>
                                        {% else %}
                                            <span class=\"status-badge status-failed\">Échec</span>
                                        {% endif %}
                                    </td>
                                </tr>
                            {% else %}
                                <tr><td colspan=\"4\" style=\"text-align:center; padding: 2rem;\">Aucune donnée.</td></tr>
                            {% endfor %}
                        </tbody>
                    </table>
                </div>
            </div>

            <div style=\"display: flex; flex-direction: column; gap: 1.5rem;\">
                <div class=\"section-card\" style=\"flex: 1;\">
                    <div class=\"section-header\">
                        <h3 class=\"section-title\">Fil d'activité</h3>
                    </div>
                    <div class=\"activity-list\">
                        {% for item in recentActivity|default([])|slice(0, 5) %}
                            <div class=\"activity-item\">
                                <div class=\"activity-dot\"></div>
                                <div style=\"flex: 1;\">
                                    <div class=\"activity-content\">{{ item.text|raw }}</div>
                                    <span class=\"activity-time\">{{ item.date|date('d/m/Y à H:i') }}</span>
                                </div>
                            </div>
                        {% else %}
                            <div style=\"padding: 1.5rem; text-align: center; color: var(--text-muted);\">
                                Rien à signaler aujourd'hui.
                            </div>
                        {% endfor %}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {# SCRIPTS (Uniquement chargés si le Dashboard est affiché) #}
    <script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
    <script>
        Chart.defaults.color = '#9ca3af';
        Chart.defaults.borderColor = '#2a2a2d';
        
        const loginsData = {{ loginsSuccessByDay|default([0,0,0,0,0,0,0])|json_encode|raw }};
        const subsData   = {{ newSubscribersByDay|default([0,0,0,0,0,0,0])|json_encode|raw }};
        const labels7    = {{ labels7|default(['L','M','M','J','V','S','D'])|json_encode|raw }};

        // Sécurité JS : on vérifie que le canvas existe
        const c1 = document.getElementById('loginChart');
        if (c1) {
            new Chart(c1.getContext('2d'), {
                type: 'line',
                data: { labels: labels7, datasets: [{ label: 'Connexions', data: loginsData, borderColor: '#ff6600', backgroundColor: 'rgba(255, 102, 0, 0.1)', borderWidth: 2, tension: 0.4, fill: true, pointRadius: 3 }] },
                options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, grid: { borderDash: [2, 4] } }, x: { grid: { display: false } } } }
            });
        }

        const c2 = document.getElementById('newsletterChart');
        if (c2) {
            new Chart(c2.getContext('2d'), {
                type: 'bar',
                data: { labels: labels7, datasets: [{ label: 'Nouveaux Inscrits', data: subsData, backgroundColor: '#e5e7eb', borderRadius: 4, barThickness: 20 }] },
                options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, grid: { borderDash: [2, 4] } }, x: { grid: { display: false } } } }
            });
        }
    </script>

{% endif %}

{% endblock %}", "admin/dashboard.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/dashboard.html.twig");
    }
}
