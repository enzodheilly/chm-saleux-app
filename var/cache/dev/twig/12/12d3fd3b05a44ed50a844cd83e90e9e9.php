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

/* admin/pages/index.html.twig */
class __TwigTemplate_7799a3716228d221376f4f2bd775d25b extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/pages/index.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 3, $this->source); })()), "html", null, true);
        
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

    /* Slug Style */
    .slug-code { font-family: monospace; color: var(--accent); background: rgba(255, 102, 0, 0.1); padding: 2px 6px; border-radius: 3px; font-size: 0.85rem; }

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

    // line 62
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 63
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <div>
            <h1>";
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 67, $this->source); })()), "html", null, true);
        yield "</h1>
            <p>Gérez les pages de contenu statique du site.</p>
        </div>
        <div class=\"toolbar\">
            <input type=\"text\" id=\"searchPages\" class=\"search-input\" placeholder=\"Rechercher une page...\">
            <a href=\"";
        // line 72
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_pages_new");
        yield "\" class=\"btn-primary\">Créer une page</a>
        </div>
    </div>

    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\" id=\"pagesTable\">
                <thead>
                    <tr>
                        <th width=\"60\">ID</th>
                        <th>Titre</th>
                        <th>Slug (URL)</th>
                        <th>Dernière mise à jour</th>
                        <th style=\"text-align: right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 89
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["pages"]) || array_key_exists("pages", $context) ? $context["pages"] : (function () { throw new RuntimeError('Variable "pages" does not exist.', 89, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 90
            yield "                        <tr>
                            <td><span style=\"color: var(--text-muted); font-family: monospace;\">#";
            // line 91
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 91), "html", null, true);
            yield "</span></td>
                            
                            <td>
                                <strong style=\"font-size: 0.95rem;\">";
            // line 94
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["page"], "title", [], "any", false, false, false, 94), "html", null, true);
            yield "</strong>
                            </td>

                            <td>
                                <span class=\"slug-code\">/";
            // line 98
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["page"], "slug", [], "any", false, false, false, 98), "html", null, true);
            yield "</span>
                            </td>

                            <td style=\"color: var(--text-muted);\">
                                ";
            // line 102
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["page"], "updatedAt", [], "any", false, false, false, 102)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["page"], "updatedAt", [], "any", false, false, false, 102), "d/m/Y à H:i"), "html", null, true)) : ("Jamais modifié"));
            yield "
                            </td>

                            <td>
                                <div class=\"actions-cell\">
                                    <a href=\"";
            // line 107
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_pages_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 107)]), "html", null, true);
            yield "\" class=\"action-link link-edit\">Modifier</a>
                                    
                                    <form method=\"post\" action=\"";
            // line 109
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_pages_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 109)]), "html", null, true);
            yield "\" onsubmit=\"return confirm('⚠️ Attention : Supprimer cette page peut casser des liens.\\n\\nConfirmer la suppression ?');\" style=\"display:inline;\">
                                        <input type=\"hidden\" name=\"_token\" value=\"";
            // line 110
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 110))), "html", null, true);
            yield "\">
                                        <button class=\"action-link link-delete\">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 116
        if (!$context['_iterated']) {
            // line 117
            yield "                        <tr>
                            <td colspan=\"5\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucune page créée pour le moment.
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['page'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 123
        yield "                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.getElementById('searchPages').addEventListener('keyup', function() {
    const val = this.value.toLowerCase();
    const rows = document.querySelectorAll('#pagesTable tbody tr');
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
        return "admin/pages/index.html.twig";
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
        return array (  261 => 123,  250 => 117,  248 => 116,  237 => 110,  233 => 109,  228 => 107,  220 => 102,  213 => 98,  206 => 94,  200 => 91,  197 => 90,  192 => 89,  172 => 72,  164 => 67,  158 => 63,  148 => 62,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}{{ title }}{% endblock %}

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

    /* Slug Style */
    .slug-code { font-family: monospace; color: var(--accent); background: rgba(255, 102, 0, 0.1); padding: 2px 6px; border-radius: 3px; font-size: 0.85rem; }

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
            <h1>{{ title }}</h1>
            <p>Gérez les pages de contenu statique du site.</p>
        </div>
        <div class=\"toolbar\">
            <input type=\"text\" id=\"searchPages\" class=\"search-input\" placeholder=\"Rechercher une page...\">
            <a href=\"{{ path('admin_pages_new') }}\" class=\"btn-primary\">Créer une page</a>
        </div>
    </div>

    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\" id=\"pagesTable\">
                <thead>
                    <tr>
                        <th width=\"60\">ID</th>
                        <th>Titre</th>
                        <th>Slug (URL)</th>
                        <th>Dernière mise à jour</th>
                        <th style=\"text-align: right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {% for page in pages %}
                        <tr>
                            <td><span style=\"color: var(--text-muted); font-family: monospace;\">#{{ page.id }}</span></td>
                            
                            <td>
                                <strong style=\"font-size: 0.95rem;\">{{ page.title }}</strong>
                            </td>

                            <td>
                                <span class=\"slug-code\">/{{ page.slug }}</span>
                            </td>

                            <td style=\"color: var(--text-muted);\">
                                {{ page.updatedAt ? page.updatedAt|date('d/m/Y à H:i') : 'Jamais modifié' }}
                            </td>

                            <td>
                                <div class=\"actions-cell\">
                                    <a href=\"{{ path('admin_pages_edit', { id: page.id }) }}\" class=\"action-link link-edit\">Modifier</a>
                                    
                                    <form method=\"post\" action=\"{{ path('admin_pages_delete', { id: page.id }) }}\" onsubmit=\"return confirm('⚠️ Attention : Supprimer cette page peut casser des liens.\\n\\nConfirmer la suppression ?');\" style=\"display:inline;\">
                                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ page.id) }}\">
                                        <button class=\"action-link link-delete\">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    {% else %}
                        <tr>
                            <td colspan=\"5\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucune page créée pour le moment.
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.getElementById('searchPages').addEventListener('keyup', function() {
    const val = this.value.toLowerCase();
    const rows = document.querySelectorAll('#pagesTable tbody tr');
    rows.forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(val) ? '' : 'none';
    });
});
</script>
{% endblock %}", "admin/pages/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/pages/index.html.twig");
    }
}
