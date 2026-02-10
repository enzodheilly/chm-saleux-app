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

/* admin/users/index.html.twig */
class __TwigTemplate_279d1060597c37552913fef865145489 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/users/index.html.twig"));

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

        yield "Gestion des utilisateurs";
        
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
    /* =================== PAGE SPECIFIC STYLES =================== */
    .dashboard-container {
        width: 100%;
        max-width: 1600px;
        margin: 0 auto;
    }

    /* Header de page */
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
    
    /* Toolbar (Recherche + Bouton) */
    .toolbar {
        display: flex;
        gap: 1rem;
        align-items: center;
    }
    
    /* Input Recherche Sobre */
    .search-input {
        background: transparent;
        border: 1px solid var(--border);
        color: var(--text-main);
        padding: 0.6rem 1rem;
        border-radius: 4px; /* Coins moins arrondis */
        outline: none;
        min-width: 300px;
        font-size: 0.9rem;
        transition: border-color 0.2s;
    }
    .search-input:focus { border-color: var(--accent); }
    .search-input::placeholder { color: var(--text-muted); opacity: 0.6; }

    /* Bouton Principal Textuel */
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
    }
    .btn-primary:hover { background: var(--accent-hover); }

    /* Carte Principale */
    .content-card {
        background: var(--bg-light);
        border: 1px solid var(--border);
        border-radius: 4px;
    }

    /* Table Styles */
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
    
    /* Hover discret sur les lignes */
    .table tr:hover { background: rgba(255,255,255,0.01); }

    /* Avatar Initials (Gardé car c'est du texte, très pro) */
    .user-avatar {
        width: 32px; height: 32px;
        border-radius: 4px; /* Carré arrondi plus pro que le rond parfois */
        background: var(--border);
        color: var(--text-main);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.8rem;
        flex-shrink: 0;
        text-transform: uppercase;
    }
    .user-info { display: flex; align-items: center; gap: 1rem; }
    .user-name { font-weight: 600; display: block; color: var(--text-main); }
    .user-email { font-size: 0.8rem; color: var(--text-muted); }

    /* Badges Rôles Textuels */
    .role-text {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .role-admin { color: #ef4444; } /* Rouge */
    .role-user { color: var(--accent); } /* Orange */

    /* Actions Textuelles (Liens) */
    .actions-cell {
        display: flex;
        gap: 15px;
        justify-content: flex-end;
    }
    
    .action-link {
        font-size: 0.85rem;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.2s;
        cursor: pointer;
        background: none;
        border: none;
        padding: 0;
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

    // line 163
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 164
        yield "<div class=\"dashboard-container\">
    
    ";
        // line 167
        yield "    <div class=\"page-header\">
        <div>
            <h1>Utilisateurs</h1>
            <p>Gestion des comptes et des permissions</p>
        </div>
        <div class=\"toolbar\">
            <input type=\"text\" id=\"searchUsers\" class=\"search-input\" placeholder=\"Rechercher par nom ou email...\">
            <button class=\"btn-primary\" onclick=\"location.href='";
        // line 174
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_new");
        yield "'\">
                Nouveau membre
            </button>
        </div>
    </div>

    ";
        // line 181
        yield "    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\" id=\"usersTable\">
                <thead>
                    <tr>
                        <th width=\"60\">ID</th>
                        <th>Identité</th>
                        <th>Rôle</th>
                        <th>Inscription</th>
                        <th style=\"text-align: right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 194
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 194, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 195
            yield "                        <tr>
                            <td><span style=\"color: var(--text-muted); font-family: monospace;\">#";
            // line 196
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 196), "html", null, true);
            yield "</span></td>
                            
                            <td>
                                <div class=\"user-info\">
                                    ";
            // line 201
            yield "                                    <div class=\"user-avatar\">
                                        ";
            // line 202
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "firstName", [], "any", false, false, false, 202))), "html", null, true);
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "lastName", [], "any", false, false, false, 202))), "html", null, true);
            yield "
                                    </div>
                                    <div>
                                        <span class=\"user-name\">";
            // line 205
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "firstName", [], "any", false, false, false, 205), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "lastName", [], "any", false, false, false, 205), "html", null, true);
            yield "</span>
                                        <span class=\"user-email\">";
            // line 206
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 206), "html", null, true);
            yield "</span>
                                    </div>
                                </div>
                            </td>

                            <td>
                                ";
            // line 212
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "roles", [], "any", false, false, false, 212));
            foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                // line 213
                yield "                                    ";
                if (($context["role"] == "ROLE_ADMIN")) {
                    // line 214
                    yield "                                        <span class=\"role-text role-admin\">Admin</span>
                                    ";
                } elseif ((                // line 215
$context["role"] == "ROLE_USER")) {
                    // line 216
                    yield "                                        <span class=\"role-text role-user\">Membre</span>
                                    ";
                } else {
                    // line 218
                    yield "                                        <span class=\"role-text\" style=\"color: var(--text-muted)\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["role"], "html", null, true);
                    yield "</span>
                                    ";
                }
                // line 220
                yield "                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['role'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 221
            yield "                            </td>

                            <td style=\"color: var(--text-muted); font-size: 0.85rem;\">
                                ";
            // line 224
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user"], "createdAt", [], "any", false, false, false, 224)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "createdAt", [], "any", false, false, false, 224), "d/m/Y"), "html", null, true)) : ("—"));
            yield "
                            </td>

                            <td>
                                <div class=\"actions-cell\">
                                    ";
            // line 230
            yield "<a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 230)]), "html", null, true);
            yield "\" class=\"action-link link-edit\">
    Modifier
</a>                                    
                                    <a href=\"";
            // line 233
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 233)]), "html", null, true);
            yield "\" 
                                       class=\"action-link link-delete\"
                                       onclick=\"return confirm('Confirmer la suppression du compte de ";
            // line 235
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "firstName", [], "any", false, false, false, 235), "html", null, true);
            yield " ?');\">
                                        Supprimer
                                    </a>
                                </div>
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 241
        if (!$context['_iterated']) {
            // line 242
            yield "                        <tr>
                            <td colspan=\"5\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucun utilisateur trouvé dans la base de données.
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['user'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 248
        yield "                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Script de recherche
    document.getElementById('searchUsers').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#usersTable tbody tr');

        rows.forEach(row => {
            const userName = row.querySelector('.user-name')?.textContent.toLowerCase() || '';
            const userEmail = row.querySelector('.user-email')?.textContent.toLowerCase() || '';
            
            if (userName.includes(searchValue) || userEmail.includes(searchValue)) {
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
        return "admin/users/index.html.twig";
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
        return array (  413 => 248,  402 => 242,  400 => 241,  389 => 235,  384 => 233,  377 => 230,  369 => 224,  364 => 221,  358 => 220,  352 => 218,  348 => 216,  346 => 215,  343 => 214,  340 => 213,  336 => 212,  327 => 206,  321 => 205,  314 => 202,  311 => 201,  304 => 196,  301 => 195,  296 => 194,  281 => 181,  272 => 174,  263 => 167,  259 => 164,  249 => 163,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Gestion des utilisateurs{% endblock %}

{% block stylesheets %}
<style>
    /* =================== PAGE SPECIFIC STYLES =================== */
    .dashboard-container {
        width: 100%;
        max-width: 1600px;
        margin: 0 auto;
    }

    /* Header de page */
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
    
    /* Toolbar (Recherche + Bouton) */
    .toolbar {
        display: flex;
        gap: 1rem;
        align-items: center;
    }
    
    /* Input Recherche Sobre */
    .search-input {
        background: transparent;
        border: 1px solid var(--border);
        color: var(--text-main);
        padding: 0.6rem 1rem;
        border-radius: 4px; /* Coins moins arrondis */
        outline: none;
        min-width: 300px;
        font-size: 0.9rem;
        transition: border-color 0.2s;
    }
    .search-input:focus { border-color: var(--accent); }
    .search-input::placeholder { color: var(--text-muted); opacity: 0.6; }

    /* Bouton Principal Textuel */
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
    }
    .btn-primary:hover { background: var(--accent-hover); }

    /* Carte Principale */
    .content-card {
        background: var(--bg-light);
        border: 1px solid var(--border);
        border-radius: 4px;
    }

    /* Table Styles */
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
    
    /* Hover discret sur les lignes */
    .table tr:hover { background: rgba(255,255,255,0.01); }

    /* Avatar Initials (Gardé car c'est du texte, très pro) */
    .user-avatar {
        width: 32px; height: 32px;
        border-radius: 4px; /* Carré arrondi plus pro que le rond parfois */
        background: var(--border);
        color: var(--text-main);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.8rem;
        flex-shrink: 0;
        text-transform: uppercase;
    }
    .user-info { display: flex; align-items: center; gap: 1rem; }
    .user-name { font-weight: 600; display: block; color: var(--text-main); }
    .user-email { font-size: 0.8rem; color: var(--text-muted); }

    /* Badges Rôles Textuels */
    .role-text {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .role-admin { color: #ef4444; } /* Rouge */
    .role-user { color: var(--accent); } /* Orange */

    /* Actions Textuelles (Liens) */
    .actions-cell {
        display: flex;
        gap: 15px;
        justify-content: flex-end;
    }
    
    .action-link {
        font-size: 0.85rem;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.2s;
        cursor: pointer;
        background: none;
        border: none;
        padding: 0;
    }

    .link-edit { color: var(--text-muted); }
    .link-edit:hover { color: var(--text-main); text-decoration: underline; }

    .link-delete { color: #ef4444; opacity: 0.8; }
    .link-delete:hover { opacity: 1; text-decoration: underline; }

</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    {# Header & Toolbar #}
    <div class=\"page-header\">
        <div>
            <h1>Utilisateurs</h1>
            <p>Gestion des comptes et des permissions</p>
        </div>
        <div class=\"toolbar\">
            <input type=\"text\" id=\"searchUsers\" class=\"search-input\" placeholder=\"Rechercher par nom ou email...\">
            <button class=\"btn-primary\" onclick=\"location.href='{{ path('admin_users_new') }}'\">
                Nouveau membre
            </button>
        </div>
    </div>

    {# Tableau #}
    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\" id=\"usersTable\">
                <thead>
                    <tr>
                        <th width=\"60\">ID</th>
                        <th>Identité</th>
                        <th>Rôle</th>
                        <th>Inscription</th>
                        <th style=\"text-align: right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {% for user in users %}
                        <tr>
                            <td><span style=\"color: var(--text-muted); font-family: monospace;\">#{{ user.id }}</span></td>
                            
                            <td>
                                <div class=\"user-info\">
                                    {# Avatar carré avec initiales (Texte uniquement) #}
                                    <div class=\"user-avatar\">
                                        {{ user.firstName|first|upper }}{{ user.lastName|first|upper }}
                                    </div>
                                    <div>
                                        <span class=\"user-name\">{{ user.firstName }} {{ user.lastName }}</span>
                                        <span class=\"user-email\">{{ user.email }}</span>
                                    </div>
                                </div>
                            </td>

                            <td>
                                {% for role in user.roles %}
                                    {% if role == 'ROLE_ADMIN' %}
                                        <span class=\"role-text role-admin\">Admin</span>
                                    {% elseif role == 'ROLE_USER' %}
                                        <span class=\"role-text role-user\">Membre</span>
                                    {% else %}
                                        <span class=\"role-text\" style=\"color: var(--text-muted)\">{{ role }}</span>
                                    {% endif %}
                                {% endfor %}
                            </td>

                            <td style=\"color: var(--text-muted); font-size: 0.85rem;\">
                                {{ user.createdAt ? user.createdAt|date('d/m/Y') : '—' }}
                            </td>

                            <td>
                                <div class=\"actions-cell\">
                                    {# Actions textuelles uniquement #}
<a href=\"{{ path('admin_users_edit', {'id': user.id}) }}\" class=\"action-link link-edit\">
    Modifier
</a>                                    
                                    <a href=\"{{ path('admin_users_delete', {'id': user.id}) }}\" 
                                       class=\"action-link link-delete\"
                                       onclick=\"return confirm('Confirmer la suppression du compte de {{ user.firstName }} ?');\">
                                        Supprimer
                                    </a>
                                </div>
                            </td>
                        </tr>
                    {% else %}
                        <tr>
                            <td colspan=\"5\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucun utilisateur trouvé dans la base de données.
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Script de recherche
    document.getElementById('searchUsers').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#usersTable tbody tr');

        rows.forEach(row => {
            const userName = row.querySelector('.user-name')?.textContent.toLowerCase() || '';
            const userEmail = row.querySelector('.user-email')?.textContent.toLowerCase() || '';
            
            if (userName.includes(searchValue) || userEmail.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
{% endblock %}", "admin/users/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/users/index.html.twig");
    }
}
