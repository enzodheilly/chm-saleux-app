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

/* admin/base_admin.html.twig */
class __TwigTemplate_bca27d04d34e62232faa9884b3cd9866 extends Template
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

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/base_admin.html.twig"));

        // line 2
        yield "<!DOCTYPE html>
<html lang=\"fr\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>";
        // line 7
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
        <link rel=\"icon\" type=\"image/png\" href=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/favicon/icon2.png"), "html", null, true);
        yield "\">

        <style>
        /* =================== VARIABLES (THEME SOMBRE) =================== */
        :root {
            --bg-dark: #0e0e10;
            --bg-darker: #141416;     /* Sidebar */
            --bg-light: #1c1c1f;
            --text-main: #e5e7eb;
            --text-muted: #9ca3af;
            --accent: #ff6600;
            --accent-hover: #e25500;
            --border: #2a2a2d;
            --scrollbar-thumb: #333;
            --scrollbar-track: #141416;
        }

        /* =================== THEME CLAIR =================== */
        [data-theme=\"light\"] {
            --bg-dark: #f3f4f6;
            --bg-darker: #ffffff;
            --bg-light: #ffffff;
            --text-main: #111827;
            --text-muted: #6b7280;
            --accent: #ff6600;
            --accent-hover: #e25500;
            --border: #e5e7eb;
            --scrollbar-thumb: #d1d5db;
            --scrollbar-track: #f9fafb;
        }

        /* =================== BASE =================== */
        body {
            font-family: \"Inter\", -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, sans-serif;
            background: var(--bg-dark);
            color: var(--text-main);
            margin: 0;
            display: flex;
            height: 100vh; /* Force la hauteur écran */
            overflow: hidden; /* Empêche le scroll sur le body entier */
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        a { text-decoration: none; color: inherit; }

        /* =================== SIDEBAR PRO (SCROLLABLE) =================== */
        .sidebar {
            width: 240px;
            background: var(--bg-darker);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 100;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            
            /* Gestion du Scrollbar */
            overflow-y: auto; /* Scroll vertical activé */
            overflow-x: hidden;
        }

        /* Design de la Scrollbar (Chrome, Safari, Edge) */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: var(--scrollbar-track);
        }
        .sidebar::-webkit-scrollbar-thumb {
            background-color: var(--scrollbar-thumb);
            border-radius: 10px;
        }
        .sidebar::-webkit-scrollbar-thumb:hover {
            background-color: var(--text-muted);
        }

        /* Header Sidebar */
        .sidebar-header {
            padding: 1.5rem 1.5rem 2rem 1.5rem;
            flex-shrink: 0; /* Ne rétrécit pas au scroll */
        }
        .sidebar-header h2 {
            font-size: 1.1rem;
            font-weight: 800;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-main);
        }
        .sidebar-header h2 span { color: var(--accent); }

        /* Navigation Links */
        .nav-group {
            padding: 0 0.8rem;
            margin-bottom: 0.5rem;
        }

        .nav-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: var(--text-muted);
            font-weight: 700;
            padding: 0 0.8rem;
            margin-bottom: 0.5rem;
            margin-top: 1.5rem;
            letter-spacing: 0.5px;
            opacity: 0.7;
        }

        .nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.6rem 0.8rem;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-muted);
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-bottom: 2px;
        }

        .nav-link:hover {
            background: rgba(125, 125, 125, 0.08);
            color: var(--text-main);
        }

        .nav-link.active {
            background: rgba(255, 102, 0, 0.1);
            color: var(--accent);
            font-weight: 600;
        }

        /* Indicateur dropdown (flèche simple) */
        .caret {
            font-size: 0.7rem;
            transition: transform 0.2s;
            opacity: 0.5;
        }
        .nav-link[aria-expanded=\"true\"] .caret { transform: rotate(180deg); }

        /* Submenus */
        .submenu {
            display: none;
            flex-direction: column;
            padding-left: 1.8rem; /* Décalage */
            margin-bottom: 0.5rem;
        }

        .submenu a {
            font-size: 0.85rem;
            color: var(--text-muted);
            padding: 0.4rem 0;
            position: relative;
            transition: color 0.2s;
        }
        
        .submenu a:hover { color: var(--text-main); }
        .submenu a.active-sub { color: var(--accent); }
        
        /* Ligne verticale fine pour les sous-menus (Optionnel, très pro) */
        .submenu { border-left: 1px solid var(--border); margin-left: 1.2rem; padding-left: 1rem; }

        /* =================== MAIN CONTENT =================== */
        .main-content {
            flex: 1;
            margin-left: 240px; /* Doit matcher width sidebar */
            padding: 2.5rem 3rem;
            overflow-y: auto; /* Le contenu scrolle indépendamment */
            background: var(--bg-dark);
            height: 100vh;
        }

        /* =================== UTILS =================== */
        .divider {
            height: 1px;
            background: var(--border);
            margin: 1rem 1.5rem;
            opacity: 0.5;
        }

        .logout-btn {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--text-muted);
            width: calc(100% - 3rem);
            margin: 1.5rem;
            padding: 0.7rem;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.2s;
            text-align: center;
        }
        .logout-btn:hover {
            border-color: var(--accent);
            color: var(--accent);
        }
        
        /* Config Bouton */
        .config-btn { cursor: pointer; user-select: none; }

        /* Responsive Mobile */
        @media(max-width: 900px) {
            .sidebar { display: none; } /* Pour simplifier ici */
            .main-content { margin-left: 0; padding: 1.5rem; }
        }
        </style>

        ";
        // line 221
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 222
        yield "    </head>

<body>
    <nav class=\"sidebar\">
        
<div class=\"sidebar-header\" style=\"display: flex; align-items: center; gap: 10px;\">
    
    ";
        // line 230
        yield "    <img src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/favicon/icon2.png"), "html", null, true);
        yield "\" alt=\"Logo CHM\" style=\"width: 35px; height: auto;\">
    
    <h2 style=\"font-size: 1rem;\">ADMIN<span>PANEL</span></h2>
</div>

        <div class=\"nav-group\">
            <a href=\"";
        // line 236
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\" class=\"nav-link ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 236, $this->source); })()), "request", [], "any", false, false, false, 236), "get", ["_route"], "method", false, false, false, 236) == "admin_dashboard")) {
            yield "active";
        }
        yield "\">
                Tableau de bord
            </a>
        </div>

        <div class=\"divider\"></div>

        <div class=\"nav-label\">Gestion</div>
        <div class=\"nav-group\">
            
            <div class=\"nav-link\" onclick=\"toggleMenu('userMenu', this)\">
                Utilisateurs <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"userMenu\">
                <a href=\"";
        // line 250
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_index");
        yield "\">Liste complète</a>
                <a href=\"";
        // line 251
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_new");
        yield "\">Ajouter un membre</a>
                <a href=\"";
        // line 252
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_new_admin");
        yield "\" style=\"color: var(--accent);\">Ajouter un Admin (2FA)</a>
            </div>

            <div class=\"nav-link\" onclick=\"toggleMenu('licenceMenu', this)\">
                Licences <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"licenceMenu\">
                <a href=\"";
        // line 259
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_licence_index");
        yield "\">Toutes les licences</a>
                <a href=\"";
        // line 260
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_licence_new");
        yield "\">Nouvelle licence</a>
            </div>

            <div class=\"nav-link\" onclick=\"toggleMenu('forfaitMenu', this)\">
                Abonnements <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"forfaitMenu\">
                <a href=\"";
        // line 267
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_forfait_index");
        yield "\">Offres & Prix</a>
                <a href=\"";
        // line 268
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_forfait_new");
        yield "\">Créer une offre</a>
            </div>

            <div class=\"nav-link\" onclick=\"toggleMenu('athleteMenu', this)\">
                Athlètes <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"athleteMenu\">
                <a href=\"";
        // line 275
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_athlete_index");
        yield "\">Liste des athlètes</a>
                <a href=\"";
        // line 276
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_athlete_new");
        yield "\">Ajouter un athlète</a>
            </div>
        </div>

        <div class=\"nav-label\">Contenu & Marketing</div>
        <div class=\"nav-group\">
            
            <div class=\"nav-link\" onclick=\"toggleMenu('contentMenu', this)\">
                Pages & Articles <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"contentMenu\">
                <a href=\"";
        // line 287
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_pages_index");
        yield "\">Pages du site</a>
                <a href=\"";
        // line 288
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_articles_index");
        yield "\">Blog / Actualités</a>
                <a href=\"";
        // line 289
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_clubinfo_index");
        yield "\">Club Info / Présentation</a> </div>

            <div class=\"nav-link\" onclick=\"toggleMenu('eventMenu', this)\">
                Événements <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"eventMenu\">
                <a href=\"";
        // line 295
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_event_index");
        yield "\">Calendrier</a>
                <a href=\"";
        // line 296
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_event_new");
        yield "\">Créer un event</a>
                <a href=\"";
        // line 297
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_competition_index");
        yield "\">Compétitions</a> </div>

            <div class=\"nav-link\" onclick=\"toggleMenu('newsletterMenu', this)\">
                Newsletter <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"newsletterMenu\">
                <a href=\"";
        // line 303
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_newsletter_index");
        yield "\">Abonnés</a>
                <a href=\"";
        // line 304
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_newsletter_compose");
        yield "\">Envoyer un email</a>
                <a href=\"";
        // line 305
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_newsletter_history");
        yield "\">Historique</a>
            </div>

            <a href=\"";
        // line 308
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_contact_index");
        yield "\" class=\"nav-link\">
                Messages reçus
            </a>
        </div>

        <div class=\"nav-label\">Matériel</div>
        <div class=\"nav-group\">
            <div class=\"nav-link\" onclick=\"toggleMenu('machineMenu', this)\">
                Machines <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"machineMenu\">
                <a href=\"";
        // line 319
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_machine_list");
        yield "\">Inventaire</a>
                <a href=\"";
        // line 320
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_machine_new");
        yield "\">Ajouter</a>
            </div>

            <div class=\"nav-link\" onclick=\"toggleMenu('productMenu', this)\">
                Boutique / Produits <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"productMenu\">
                <a href=\"";
        // line 327
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_index");
        yield "\">Stocks</a>
                <a href=\"";
        // line 328
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_new");
        yield "\">Nouveau produit</a>
            </div>
        </div>

        <div class=\"nav-label\">Système</div>
        <div class=\"nav-group\">
            <a href=\"";
        // line 334
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_stats_index");
        yield "\" class=\"nav-link\">
                Statistiques
            </a>

            <div class=\"nav-link\" onclick=\"toggleMenu('configMenu', this)\">
                Configuration <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"configMenu\">
                <a href=\"";
        // line 342
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_settings_index");
        yield "\">Paramètres généraux</a>
                <a href=\"";
        // line 343
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_security_logs");
        yield "\">Sécurité & Logs</a>
                <a href=\"";
        // line 344
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_security_blocklist");
        yield "\">IP Bloquées</a>
                <a href=\"";
        // line 345
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_backups_index");
        yield "\">Sauvegardes</a>
                <a href=\"";
        // line 346
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_updates_index");
        yield "\">Mises à jour</a>
            </div>
        </div>

        <button class=\"logout-btn\" onclick=\"window.location='";
        // line 350
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "'\">
            Déconnexion
        </button>
        
        <div style=\"height: 50px;\"></div>

    </nav>

    <main class=\"main-content\"> 
        ";
        // line 359
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 360
        yield "    </main>

    <script>
        // Gestion Menu Déroulant
        function toggleMenu(id, element) {
            const el = document.getElementById(id);
            const isFlex = el.style.display === \"flex\";
            
            el.style.display = isFlex ? \"none\" : \"flex\";
            
            // Gestion de la petite flèche
            if(element) {
                if(!isFlex) element.setAttribute('aria-expanded', 'true');
                else element.setAttribute('aria-expanded', 'false');
            }
        }

        // --- THEME SWITCHER LOGIC ---
        const html = document.documentElement;
        const themeText = document.getElementById('theme-text');

        // Check local storage
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            html.setAttribute('data-theme', savedTheme);
            updateThemeText(savedTheme);
        }

        function toggleTheme() {
            const current = html.getAttribute('data-theme');
            const newTheme = current === 'light' ? 'dark' : 'light';
            html.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeText(newTheme);
        }

        function updateThemeText(theme) {
            if(themeText) {
                themeText.textContent = theme === 'light' ? 'Passer en mode Sombre' : 'Passer en mode Clair';
            }
        }
    </script>

    ";
        // line 403
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 404
        yield "</body>
</html>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Admin Dashboard";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 221
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 359
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 403
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/base_admin.html.twig";
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
        return array (  624 => 403,  608 => 359,  592 => 221,  575 => 7,  566 => 404,  564 => 403,  519 => 360,  517 => 359,  505 => 350,  498 => 346,  494 => 345,  490 => 344,  486 => 343,  482 => 342,  471 => 334,  462 => 328,  458 => 327,  448 => 320,  444 => 319,  430 => 308,  424 => 305,  420 => 304,  416 => 303,  407 => 297,  403 => 296,  399 => 295,  390 => 289,  386 => 288,  382 => 287,  368 => 276,  364 => 275,  354 => 268,  350 => 267,  340 => 260,  336 => 259,  326 => 252,  322 => 251,  318 => 250,  297 => 236,  287 => 230,  278 => 222,  276 => 221,  60 => 8,  56 => 7,  49 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/admin/base_admin.html.twig #}
<!DOCTYPE html>
<html lang=\"fr\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>{% block title %}Admin Dashboard{% endblock %}</title>
        <link rel=\"icon\" type=\"image/png\" href=\"{{ asset('images/favicon/icon2.png') }}\">

        <style>
        /* =================== VARIABLES (THEME SOMBRE) =================== */
        :root {
            --bg-dark: #0e0e10;
            --bg-darker: #141416;     /* Sidebar */
            --bg-light: #1c1c1f;
            --text-main: #e5e7eb;
            --text-muted: #9ca3af;
            --accent: #ff6600;
            --accent-hover: #e25500;
            --border: #2a2a2d;
            --scrollbar-thumb: #333;
            --scrollbar-track: #141416;
        }

        /* =================== THEME CLAIR =================== */
        [data-theme=\"light\"] {
            --bg-dark: #f3f4f6;
            --bg-darker: #ffffff;
            --bg-light: #ffffff;
            --text-main: #111827;
            --text-muted: #6b7280;
            --accent: #ff6600;
            --accent-hover: #e25500;
            --border: #e5e7eb;
            --scrollbar-thumb: #d1d5db;
            --scrollbar-track: #f9fafb;
        }

        /* =================== BASE =================== */
        body {
            font-family: \"Inter\", -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, sans-serif;
            background: var(--bg-dark);
            color: var(--text-main);
            margin: 0;
            display: flex;
            height: 100vh; /* Force la hauteur écran */
            overflow: hidden; /* Empêche le scroll sur le body entier */
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        a { text-decoration: none; color: inherit; }

        /* =================== SIDEBAR PRO (SCROLLABLE) =================== */
        .sidebar {
            width: 240px;
            background: var(--bg-darker);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 100;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            
            /* Gestion du Scrollbar */
            overflow-y: auto; /* Scroll vertical activé */
            overflow-x: hidden;
        }

        /* Design de la Scrollbar (Chrome, Safari, Edge) */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: var(--scrollbar-track);
        }
        .sidebar::-webkit-scrollbar-thumb {
            background-color: var(--scrollbar-thumb);
            border-radius: 10px;
        }
        .sidebar::-webkit-scrollbar-thumb:hover {
            background-color: var(--text-muted);
        }

        /* Header Sidebar */
        .sidebar-header {
            padding: 1.5rem 1.5rem 2rem 1.5rem;
            flex-shrink: 0; /* Ne rétrécit pas au scroll */
        }
        .sidebar-header h2 {
            font-size: 1.1rem;
            font-weight: 800;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-main);
        }
        .sidebar-header h2 span { color: var(--accent); }

        /* Navigation Links */
        .nav-group {
            padding: 0 0.8rem;
            margin-bottom: 0.5rem;
        }

        .nav-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: var(--text-muted);
            font-weight: 700;
            padding: 0 0.8rem;
            margin-bottom: 0.5rem;
            margin-top: 1.5rem;
            letter-spacing: 0.5px;
            opacity: 0.7;
        }

        .nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.6rem 0.8rem;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-muted);
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-bottom: 2px;
        }

        .nav-link:hover {
            background: rgba(125, 125, 125, 0.08);
            color: var(--text-main);
        }

        .nav-link.active {
            background: rgba(255, 102, 0, 0.1);
            color: var(--accent);
            font-weight: 600;
        }

        /* Indicateur dropdown (flèche simple) */
        .caret {
            font-size: 0.7rem;
            transition: transform 0.2s;
            opacity: 0.5;
        }
        .nav-link[aria-expanded=\"true\"] .caret { transform: rotate(180deg); }

        /* Submenus */
        .submenu {
            display: none;
            flex-direction: column;
            padding-left: 1.8rem; /* Décalage */
            margin-bottom: 0.5rem;
        }

        .submenu a {
            font-size: 0.85rem;
            color: var(--text-muted);
            padding: 0.4rem 0;
            position: relative;
            transition: color 0.2s;
        }
        
        .submenu a:hover { color: var(--text-main); }
        .submenu a.active-sub { color: var(--accent); }
        
        /* Ligne verticale fine pour les sous-menus (Optionnel, très pro) */
        .submenu { border-left: 1px solid var(--border); margin-left: 1.2rem; padding-left: 1rem; }

        /* =================== MAIN CONTENT =================== */
        .main-content {
            flex: 1;
            margin-left: 240px; /* Doit matcher width sidebar */
            padding: 2.5rem 3rem;
            overflow-y: auto; /* Le contenu scrolle indépendamment */
            background: var(--bg-dark);
            height: 100vh;
        }

        /* =================== UTILS =================== */
        .divider {
            height: 1px;
            background: var(--border);
            margin: 1rem 1.5rem;
            opacity: 0.5;
        }

        .logout-btn {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--text-muted);
            width: calc(100% - 3rem);
            margin: 1.5rem;
            padding: 0.7rem;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.2s;
            text-align: center;
        }
        .logout-btn:hover {
            border-color: var(--accent);
            color: var(--accent);
        }
        
        /* Config Bouton */
        .config-btn { cursor: pointer; user-select: none; }

        /* Responsive Mobile */
        @media(max-width: 900px) {
            .sidebar { display: none; } /* Pour simplifier ici */
            .main-content { margin-left: 0; padding: 1.5rem; }
        }
        </style>

        {% block stylesheets %}{% endblock %}
    </head>

<body>
    <nav class=\"sidebar\">
        
<div class=\"sidebar-header\" style=\"display: flex; align-items: center; gap: 10px;\">
    
    {# Assure-toi que l'image existe dans public/images/ #}
    <img src=\"{{ asset('images/favicon/icon2.png') }}\" alt=\"Logo CHM\" style=\"width: 35px; height: auto;\">
    
    <h2 style=\"font-size: 1rem;\">ADMIN<span>PANEL</span></h2>
</div>

        <div class=\"nav-group\">
            <a href=\"{{ path('admin_dashboard') }}\" class=\"nav-link {% if app.request.get('_route') == 'admin_dashboard' %}active{% endif %}\">
                Tableau de bord
            </a>
        </div>

        <div class=\"divider\"></div>

        <div class=\"nav-label\">Gestion</div>
        <div class=\"nav-group\">
            
            <div class=\"nav-link\" onclick=\"toggleMenu('userMenu', this)\">
                Utilisateurs <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"userMenu\">
                <a href=\"{{ path('admin_users_index') }}\">Liste complète</a>
                <a href=\"{{ path('admin_users_new') }}\">Ajouter un membre</a>
                <a href=\"{{ path('admin_users_new_admin') }}\" style=\"color: var(--accent);\">Ajouter un Admin (2FA)</a>
            </div>

            <div class=\"nav-link\" onclick=\"toggleMenu('licenceMenu', this)\">
                Licences <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"licenceMenu\">
                <a href=\"{{ path('admin_licence_index') }}\">Toutes les licences</a>
                <a href=\"{{ path('admin_licence_new') }}\">Nouvelle licence</a>
            </div>

            <div class=\"nav-link\" onclick=\"toggleMenu('forfaitMenu', this)\">
                Abonnements <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"forfaitMenu\">
                <a href=\"{{ path('admin_forfait_index') }}\">Offres & Prix</a>
                <a href=\"{{ path('admin_forfait_new') }}\">Créer une offre</a>
            </div>

            <div class=\"nav-link\" onclick=\"toggleMenu('athleteMenu', this)\">
                Athlètes <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"athleteMenu\">
                <a href=\"{{ path('admin_athlete_index') }}\">Liste des athlètes</a>
                <a href=\"{{ path('admin_athlete_new') }}\">Ajouter un athlète</a>
            </div>
        </div>

        <div class=\"nav-label\">Contenu & Marketing</div>
        <div class=\"nav-group\">
            
            <div class=\"nav-link\" onclick=\"toggleMenu('contentMenu', this)\">
                Pages & Articles <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"contentMenu\">
                <a href=\"{{ path('admin_pages_index') }}\">Pages du site</a>
                <a href=\"{{ path('admin_articles_index') }}\">Blog / Actualités</a>
                <a href=\"{{ path('admin_clubinfo_index') }}\">Club Info / Présentation</a> </div>

            <div class=\"nav-link\" onclick=\"toggleMenu('eventMenu', this)\">
                Événements <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"eventMenu\">
                <a href=\"{{ path('admin_event_index') }}\">Calendrier</a>
                <a href=\"{{ path('admin_event_new') }}\">Créer un event</a>
                <a href=\"{{ path('admin_competition_index') }}\">Compétitions</a> </div>

            <div class=\"nav-link\" onclick=\"toggleMenu('newsletterMenu', this)\">
                Newsletter <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"newsletterMenu\">
                <a href=\"{{ path('admin_newsletter_index') }}\">Abonnés</a>
                <a href=\"{{ path('admin_newsletter_compose') }}\">Envoyer un email</a>
                <a href=\"{{ path('admin_newsletter_history') }}\">Historique</a>
            </div>

            <a href=\"{{ path('admin_contact_index') }}\" class=\"nav-link\">
                Messages reçus
            </a>
        </div>

        <div class=\"nav-label\">Matériel</div>
        <div class=\"nav-group\">
            <div class=\"nav-link\" onclick=\"toggleMenu('machineMenu', this)\">
                Machines <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"machineMenu\">
                <a href=\"{{ path('admin_machine_list') }}\">Inventaire</a>
                <a href=\"{{ path('admin_machine_new') }}\">Ajouter</a>
            </div>

            <div class=\"nav-link\" onclick=\"toggleMenu('productMenu', this)\">
                Boutique / Produits <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"productMenu\">
                <a href=\"{{ path('admin_product_index') }}\">Stocks</a>
                <a href=\"{{ path('admin_product_new') }}\">Nouveau produit</a>
            </div>
        </div>

        <div class=\"nav-label\">Système</div>
        <div class=\"nav-group\">
            <a href=\"{{ path('admin_stats_index') }}\" class=\"nav-link\">
                Statistiques
            </a>

            <div class=\"nav-link\" onclick=\"toggleMenu('configMenu', this)\">
                Configuration <span class=\"caret\">▼</span>
            </div>
            <div class=\"submenu\" id=\"configMenu\">
                <a href=\"{{ path('admin_settings_index') }}\">Paramètres généraux</a>
                <a href=\"{{ path('admin_security_logs') }}\">Sécurité & Logs</a>
                <a href=\"{{ path('admin_security_blocklist') }}\">IP Bloquées</a>
                <a href=\"{{ path('admin_backups_index') }}\">Sauvegardes</a>
                <a href=\"{{ path('admin_updates_index') }}\">Mises à jour</a>
            </div>
        </div>

        <button class=\"logout-btn\" onclick=\"window.location='{{ path('app_logout') }}'\">
            Déconnexion
        </button>
        
        <div style=\"height: 50px;\"></div>

    </nav>

    <main class=\"main-content\"> 
        {% block body %}{% endblock %}
    </main>

    <script>
        // Gestion Menu Déroulant
        function toggleMenu(id, element) {
            const el = document.getElementById(id);
            const isFlex = el.style.display === \"flex\";
            
            el.style.display = isFlex ? \"none\" : \"flex\";
            
            // Gestion de la petite flèche
            if(element) {
                if(!isFlex) element.setAttribute('aria-expanded', 'true');
                else element.setAttribute('aria-expanded', 'false');
            }
        }

        // --- THEME SWITCHER LOGIC ---
        const html = document.documentElement;
        const themeText = document.getElementById('theme-text');

        // Check local storage
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            html.setAttribute('data-theme', savedTheme);
            updateThemeText(savedTheme);
        }

        function toggleTheme() {
            const current = html.getAttribute('data-theme');
            const newTheme = current === 'light' ? 'dark' : 'light';
            html.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeText(newTheme);
        }

        function updateThemeText(theme) {
            if(themeText) {
                themeText.textContent = theme === 'light' ? 'Passer en mode Sombre' : 'Passer en mode Clair';
            }
        }
    </script>

    {% block javascripts %}{% endblock %}
</body>
</html>", "admin/base_admin.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/base_admin.html.twig");
    }
}
