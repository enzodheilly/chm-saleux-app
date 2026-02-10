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

/* admin/club_info/index.html.twig */
class __TwigTemplate_850fc3f60dd1d30fe1df63730ed90e4d extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/club_info/index.html.twig"));

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

        yield "Informations du club";
        
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

    /* Specific Styles */
    .category-badge {
        display: inline-block; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 700; 
        text-transform: uppercase; letter-spacing: 0.5px; background: rgba(255, 102, 0, 0.1); 
        color: var(--accent); border: 1px solid rgba(255, 102, 0, 0.2);
    }
    .content-excerpt { color: var(--text-muted); font-size: 0.9rem; max-width: 600px; line-height: 1.5; }

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

    // line 61
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 62
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <div>
            <h1>Informations du club</h1>
            <p>Gestion des textes de présentation (Horaires, Tarifs, Histoire...).</p>
        </div>
        <div>
            <a href=\"";
        // line 70
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_clubinfo_new");
        yield "\" class=\"btn-primary\">Ajouter une info</a>
        </div>
    </div>

    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\">
                <thead>
                    <tr>
                        <th width=\"20%\">Catégorie</th>
                        <th>Aperçu du contenu</th>
                        <th style=\"text-align: right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 85
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["infos"]) || array_key_exists("infos", $context) ? $context["infos"] : (function () { throw new RuntimeError('Variable "infos" does not exist.', 85, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["info"]) {
            // line 86
            yield "                        <tr>
                            <td>
                                <span class=\"category-badge\">";
            // line 88
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["info"], "category", [], "any", false, false, false, 88)), "html", null, true);
            yield "</span>
                            </td>

                            <td>
                                <div class=\"content-excerpt\">
                                    ";
            // line 93
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, $context["info"], "content", [], "any", false, false, false, 93)), 0, 100) . (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["info"], "content", [], "any", false, false, false, 93)) > 100)) ? ("...") : (""))), "html", null, true);
            yield "
                                </div>
                            </td>

                            <td>
                                <div class=\"actions-cell\">
                                    <a href=\"";
            // line 99
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_clubinfo_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["info"], "id", [], "any", false, false, false, 99)]), "html", null, true);
            yield "\" class=\"action-link link-edit\">Modifier</a>
                                    
                                    <form method=\"post\" action=\"";
            // line 101
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_clubinfo_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["info"], "id", [], "any", false, false, false, 101)]), "html", null, true);
            yield "\" onsubmit=\"return confirm('Confirmer la suppression de cette information ?');\" style=\"display:inline;\">
                                        <input type=\"hidden\" name=\"_token\" value=\"";
            // line 102
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["info"], "id", [], "any", false, false, false, 102))), "html", null, true);
            yield "\">
                                        <button class=\"action-link link-delete\">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 108
        if (!$context['_iterated']) {
            // line 109
            yield "                        <tr>
                            <td colspan=\"3\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucune information enregistrée.
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['info'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 115
        yield "                </tbody>
            </table>
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/club_info/index.html.twig";
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
        return array (  244 => 115,  233 => 109,  231 => 108,  220 => 102,  216 => 101,  211 => 99,  202 => 93,  194 => 88,  190 => 86,  185 => 85,  167 => 70,  157 => 62,  147 => 61,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Informations du club{% endblock %}

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

    /* Specific Styles */
    .category-badge {
        display: inline-block; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 700; 
        text-transform: uppercase; letter-spacing: 0.5px; background: rgba(255, 102, 0, 0.1); 
        color: var(--accent); border: 1px solid rgba(255, 102, 0, 0.2);
    }
    .content-excerpt { color: var(--text-muted); font-size: 0.9rem; max-width: 600px; line-height: 1.5; }

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
            <h1>Informations du club</h1>
            <p>Gestion des textes de présentation (Horaires, Tarifs, Histoire...).</p>
        </div>
        <div>
            <a href=\"{{ path('admin_clubinfo_new') }}\" class=\"btn-primary\">Ajouter une info</a>
        </div>
    </div>

    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\">
                <thead>
                    <tr>
                        <th width=\"20%\">Catégorie</th>
                        <th>Aperçu du contenu</th>
                        <th style=\"text-align: right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {% for info in infos %}
                        <tr>
                            <td>
                                <span class=\"category-badge\">{{ info.category|capitalize }}</span>
                            </td>

                            <td>
                                <div class=\"content-excerpt\">
                                    {{ info.content|striptags|slice(0, 100) ~ (info.content|length > 100 ? '...' : '') }}
                                </div>
                            </td>

                            <td>
                                <div class=\"actions-cell\">
                                    <a href=\"{{ path('admin_clubinfo_edit', {id: info.id}) }}\" class=\"action-link link-edit\">Modifier</a>
                                    
                                    <form method=\"post\" action=\"{{ path('admin_clubinfo_delete', {id: info.id}) }}\" onsubmit=\"return confirm('Confirmer la suppression de cette information ?');\" style=\"display:inline;\">
                                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ info.id) }}\">
                                        <button class=\"action-link link-delete\">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    {% else %}
                        <tr>
                            <td colspan=\"3\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucune information enregistrée.
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>
{% endblock %}", "admin/club_info/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/club_info/index.html.twig");
    }
}
