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

/* admin/produit/index.html.twig */
class __TwigTemplate_39daf2d8abac758a5fcfeba418487102 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/produit/index.html.twig"));

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

        yield "Gestion des produits";
        
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

    /* Product Specifics */
    .product-thumb {
        width: 60px; height: 60px; object-fit: cover; border-radius: 4px; border: 1px solid var(--border); background: var(--bg-darker);
    }
    .no-thumb {
        width: 60px; height: 60px; border-radius: 4px; background: var(--bg-darker); border: 1px solid var(--border);
        display: flex; align-items: center; justify-content: center; font-size: 0.7rem; color: var(--text-muted);
    }
    
    .product-title { font-weight: 600; font-size: 0.95rem; color: var(--text-main); display: block; }
    .product-desc { font-size: 0.85rem; color: var(--text-muted); margin-top: 4px; }
    
    .price-tag { font-weight: 700; color: #22c55e; font-size: 1rem; }

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

    // line 74
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 75
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <div>
            <h1>Produits</h1>
            <p>Gestion du catalogue boutique et des stocks.</p>
        </div>
        <div class=\"toolbar\">
            <input type=\"text\" id=\"searchProduct\" class=\"search-input\" placeholder=\"Rechercher un produit...\">
            <a href=\"";
        // line 84
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_new");
        yield "\" class=\"btn-primary\">Ajouter un produit</a>
        </div>
    </div>

    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\" id=\"productTable\">
                <thead>
                    <tr>
                        <th width=\"80\">Image</th>
                        <th width=\"30%\">Produit</th>
                        <th>Description</th>
                        <th>Prix Unitaire</th>
                        <th style=\"text-align: right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 101
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["produits"]) || array_key_exists("produits", $context) ? $context["produits"] : (function () { throw new RuntimeError('Variable "produits" does not exist.', 101, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["produit"]) {
            // line 102
            yield "                        <tr>
                            <td>
                                ";
            // line 104
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "image", [], "any", false, false, false, 104)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 105
                yield "                                    <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "image", [], "any", false, false, false, 105))), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "titre", [], "any", false, false, false, 105), "html", null, true);
                yield "\" class=\"product-thumb\">
                                ";
            } else {
                // line 107
                yield "                                    <div class=\"no-thumb\">N/A</div>
                                ";
            }
            // line 109
            yield "                            </td>

                            <td>
                                <span class=\"product-title\">";
            // line 112
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "titre", [], "any", false, false, false, 112), "html", null, true);
            yield "</span>
                                <span style=\"font-size: 0.75rem; color: var(--text-muted);\">REF-";
            // line 113
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "id", [], "any", false, false, false, 113), "html", null, true);
            yield "</span>
                            </td>

                            <td>
                                <div class=\"product-desc\">
                                    ";
            // line 118
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", false, false, false, 118)) > 60)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", false, false, false, 118), 0, 60) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", false, false, false, 118), "html", null, true)));
            yield "
                                </div>
                            </td>

                            <td>
                                <span class=\"price-tag\">";
            // line 123
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "prix", [], "any", false, false, false, 123), 2, ",", " "), "html", null, true);
            yield " €</span>
                            </td>

                            <td>
                                <div class=\"actions-cell\">
                                    <a href=\"";
            // line 128
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "id", [], "any", false, false, false, 128)]), "html", null, true);
            yield "\" class=\"action-link link-edit\">Modifier</a>
                                    
                                    <form method=\"post\" action=\"";
            // line 130
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "id", [], "any", false, false, false, 130)]), "html", null, true);
            yield "\" onsubmit=\"return confirm('Confirmer la suppression du produit ?');\" style=\"display:inline;\">
                                        <input type=\"hidden\" name=\"_token\" value=\"";
            // line 131
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "id", [], "any", false, false, false, 131))), "html", null, true);
            yield "\">
                                        <button class=\"action-link link-delete\">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 137
        if (!$context['_iterated']) {
            // line 138
            yield "                        <tr>
                            <td colspan=\"5\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucun produit dans le catalogue.
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['produit'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 144
        yield "                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.getElementById('searchProduct').addEventListener('keyup', function() {
    const val = this.value.toLowerCase();
    const rows = document.querySelectorAll('#productTable tbody tr');
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
        return "admin/produit/index.html.twig";
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
        return array (  290 => 144,  279 => 138,  277 => 137,  266 => 131,  262 => 130,  257 => 128,  249 => 123,  241 => 118,  233 => 113,  229 => 112,  224 => 109,  220 => 107,  212 => 105,  210 => 104,  206 => 102,  201 => 101,  181 => 84,  170 => 75,  160 => 74,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Gestion des produits{% endblock %}

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

    /* Product Specifics */
    .product-thumb {
        width: 60px; height: 60px; object-fit: cover; border-radius: 4px; border: 1px solid var(--border); background: var(--bg-darker);
    }
    .no-thumb {
        width: 60px; height: 60px; border-radius: 4px; background: var(--bg-darker); border: 1px solid var(--border);
        display: flex; align-items: center; justify-content: center; font-size: 0.7rem; color: var(--text-muted);
    }
    
    .product-title { font-weight: 600; font-size: 0.95rem; color: var(--text-main); display: block; }
    .product-desc { font-size: 0.85rem; color: var(--text-muted); margin-top: 4px; }
    
    .price-tag { font-weight: 700; color: #22c55e; font-size: 1rem; }

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
            <h1>Produits</h1>
            <p>Gestion du catalogue boutique et des stocks.</p>
        </div>
        <div class=\"toolbar\">
            <input type=\"text\" id=\"searchProduct\" class=\"search-input\" placeholder=\"Rechercher un produit...\">
            <a href=\"{{ path('admin_product_new') }}\" class=\"btn-primary\">Ajouter un produit</a>
        </div>
    </div>

    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\" id=\"productTable\">
                <thead>
                    <tr>
                        <th width=\"80\">Image</th>
                        <th width=\"30%\">Produit</th>
                        <th>Description</th>
                        <th>Prix Unitaire</th>
                        <th style=\"text-align: right;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {% for produit in produits %}
                        <tr>
                            <td>
                                {% if produit.image %}
                                    <img src=\"{{ asset('uploads/' ~ produit.image) }}\" alt=\"{{ produit.titre }}\" class=\"product-thumb\">
                                {% else %}
                                    <div class=\"no-thumb\">N/A</div>
                                {% endif %}
                            </td>

                            <td>
                                <span class=\"product-title\">{{ produit.titre }}</span>
                                <span style=\"font-size: 0.75rem; color: var(--text-muted);\">REF-{{ produit.id }}</span>
                            </td>

                            <td>
                                <div class=\"product-desc\">
                                    {{ produit.description|length > 60 ? produit.description|slice(0, 60) ~ '...' : produit.description }}
                                </div>
                            </td>

                            <td>
                                <span class=\"price-tag\">{{ produit.prix|number_format(2, ',', ' ') }} €</span>
                            </td>

                            <td>
                                <div class=\"actions-cell\">
                                    <a href=\"{{ path('admin_product_edit', {id: produit.id}) }}\" class=\"action-link link-edit\">Modifier</a>
                                    
                                    <form method=\"post\" action=\"{{ path('admin_product_delete', {id: produit.id}) }}\" onsubmit=\"return confirm('Confirmer la suppression du produit ?');\" style=\"display:inline;\">
                                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ produit.id) }}\">
                                        <button class=\"action-link link-delete\">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    {% else %}
                        <tr>
                            <td colspan=\"5\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucun produit dans le catalogue.
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.getElementById('searchProduct').addEventListener('keyup', function() {
    const val = this.value.toLowerCase();
    const rows = document.querySelectorAll('#productTable tbody tr');
    rows.forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(val) ? '' : 'none';
    });
});
</script>
{% endblock %}", "admin/produit/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/produit/index.html.twig");
    }
}
