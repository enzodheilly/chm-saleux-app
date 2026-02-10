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

/* admin/articles/index.html.twig */
class __TwigTemplate_5fcd8d76c02ef864263a98b7b655a373 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/articles/index.html.twig"));

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

        yield "Gestion des articles";
        
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

    /* Article Specifics */
    .article-thumb {
        width: 60px; height: 45px; object-fit: cover; border-radius: 4px; border: 1px solid var(--border); background: var(--bg-darker);
    }
    .no-thumb {
        width: 60px; height: 45px; border-radius: 4px; background: var(--bg-darker); border: 1px solid var(--border);
        display: flex; align-items: center; justify-content: center; font-size: 0.7rem; color: var(--text-muted);
    }
    
    .article-title { font-weight: 600; font-size: 0.95rem; color: var(--text-main); display: block; }
    .article-cat { font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase; }

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

    // line 72
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 73
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <div>
            <h1>Articles & Actualités</h1>
            <p>Gestion du blog et des communications.</p>
        </div>
        <div class=\"toolbar\">
            <input type=\"text\" id=\"searchArticle\" class=\"search-input\" placeholder=\"Rechercher par titre...\">
            <a href=\"";
        // line 82
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_articles_new");
        yield "\" class=\"btn-primary\">Créer un article</a>
        </div>
    </div>

    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\" id=\"articlesTable\">
                <thead>
                    <tr>
                        <th width=\"80\">Image</th>
                        <th>Titre / Catégorie</th>
                        <th>Extrait</th>
                        <th>Publication</th>
                        <th style=\"text-align: right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 99
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["articles"]) || array_key_exists("articles", $context) ? $context["articles"] : (function () { throw new RuntimeError('Variable "articles" does not exist.', 99, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 100
            yield "                        <tr>
                            <td>
                                ";
            // line 102
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["article"], "photo", [], "any", false, false, false, 102)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 103
                yield "                                    <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, $context["article"], "photo", [], "any", false, false, false, 103))), "html", null, true);
                yield "\" alt=\"\" class=\"article-thumb\">
                                ";
            } else {
                // line 105
                yield "                                    <div class=\"no-thumb\">N/A</div>
                                ";
            }
            // line 107
            yield "                            </td>

                            <td>
                                <span class=\"article-title\">";
            // line 110
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "title", [], "any", false, false, false, 110), "html", null, true);
            yield "</span>
                                <span class=\"article-cat\">";
            // line 111
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["article"], "categorie", [], "any", false, false, false, 111)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "categorie", [], "any", false, false, false, 111), "html", null, true)) : ("Non classé"));
            yield "</span>
                            </td>

                            <td style=\"color: var(--text-muted); font-size: 0.85rem; max-width: 300px;\">
                                ";
            // line 115
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "description", [], "any", false, false, false, 115)), 0, 60) . "..."), "html", null, true);
            yield "
                            </td>

                            <td style=\"color: var(--text-muted);\">
                                ";
            // line 119
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["article"], "publishedAt", [], "any", false, false, false, 119)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["article"], "publishedAt", [], "any", false, false, false, 119), "d/m/Y"), "html", null, true)) : ("Brouillon"));
            yield "
                            </td>

                            <td>
                                <div class=\"actions-cell\">
                                    <a href=\"";
            // line 124
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_articles_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["article"], "id", [], "any", false, false, false, 124)]), "html", null, true);
            yield "\" class=\"action-link link-edit\">Modifier</a>
                                    
                                    <form method=\"post\" action=\"";
            // line 126
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_articles_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["article"], "id", [], "any", false, false, false, 126)]), "html", null, true);
            yield "\" onsubmit=\"return confirm('Confirmer la suppression de l\\'article ?');\" style=\"display:inline;\">
                                        <input type=\"hidden\" name=\"_token\" value=\"";
            // line 127
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["article"], "id", [], "any", false, false, false, 127))), "html", null, true);
            yield "\">
                                        <button class=\"action-link link-delete\">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 133
        if (!$context['_iterated']) {
            // line 134
            yield "                        <tr>
                            <td colspan=\"5\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucun article publié.
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['article'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 140
        yield "                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.getElementById('searchArticle').addEventListener('keyup', function() {
    const val = this.value.toLowerCase();
    const rows = document.querySelectorAll('#articlesTable tbody tr');
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
        return "admin/articles/index.html.twig";
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
        return array (  284 => 140,  273 => 134,  271 => 133,  260 => 127,  256 => 126,  251 => 124,  243 => 119,  236 => 115,  229 => 111,  225 => 110,  220 => 107,  216 => 105,  210 => 103,  208 => 102,  204 => 100,  199 => 99,  179 => 82,  168 => 73,  158 => 72,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Gestion des articles{% endblock %}

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

    /* Article Specifics */
    .article-thumb {
        width: 60px; height: 45px; object-fit: cover; border-radius: 4px; border: 1px solid var(--border); background: var(--bg-darker);
    }
    .no-thumb {
        width: 60px; height: 45px; border-radius: 4px; background: var(--bg-darker); border: 1px solid var(--border);
        display: flex; align-items: center; justify-content: center; font-size: 0.7rem; color: var(--text-muted);
    }
    
    .article-title { font-weight: 600; font-size: 0.95rem; color: var(--text-main); display: block; }
    .article-cat { font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase; }

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
            <h1>Articles & Actualités</h1>
            <p>Gestion du blog et des communications.</p>
        </div>
        <div class=\"toolbar\">
            <input type=\"text\" id=\"searchArticle\" class=\"search-input\" placeholder=\"Rechercher par titre...\">
            <a href=\"{{ path('admin_articles_new') }}\" class=\"btn-primary\">Créer un article</a>
        </div>
    </div>

    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\" id=\"articlesTable\">
                <thead>
                    <tr>
                        <th width=\"80\">Image</th>
                        <th>Titre / Catégorie</th>
                        <th>Extrait</th>
                        <th>Publication</th>
                        <th style=\"text-align: right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {% for article in articles %}
                        <tr>
                            <td>
                                {% if article.photo %}
                                    <img src=\"{{ asset('uploads/' ~ article.photo) }}\" alt=\"\" class=\"article-thumb\">
                                {% else %}
                                    <div class=\"no-thumb\">N/A</div>
                                {% endif %}
                            </td>

                            <td>
                                <span class=\"article-title\">{{ article.title }}</span>
                                <span class=\"article-cat\">{{ article.categorie ? article.categorie : 'Non classé' }}</span>
                            </td>

                            <td style=\"color: var(--text-muted); font-size: 0.85rem; max-width: 300px;\">
                                {{ article.description|striptags|slice(0, 60) ~ '...' }}
                            </td>

                            <td style=\"color: var(--text-muted);\">
                                {{ article.publishedAt ? article.publishedAt|date('d/m/Y') : 'Brouillon' }}
                            </td>

                            <td>
                                <div class=\"actions-cell\">
                                    <a href=\"{{ path('admin_articles_edit', {id: article.id}) }}\" class=\"action-link link-edit\">Modifier</a>
                                    
                                    <form method=\"post\" action=\"{{ path('admin_articles_delete', {id: article.id}) }}\" onsubmit=\"return confirm('Confirmer la suppression de l\\'article ?');\" style=\"display:inline;\">
                                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ article.id) }}\">
                                        <button class=\"action-link link-delete\">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    {% else %}
                        <tr>
                            <td colspan=\"5\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucun article publié.
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.getElementById('searchArticle').addEventListener('keyup', function() {
    const val = this.value.toLowerCase();
    const rows = document.querySelectorAll('#articlesTable tbody tr');
    rows.forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(val) ? '' : 'none';
    });
});
</script>
{% endblock %}", "admin/articles/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/articles/index.html.twig");
    }
}
