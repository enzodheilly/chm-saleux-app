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

/* admin/competitions/new.html.twig */
class __TwigTemplate_58bbbf9a3453cd019e9024f1d95908ef extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/competitions/new.html.twig"));

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

        yield "Nouvelle compétition";
        
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
    .dashboard-container { width: 100%; max-width: 1200px; margin: 0 auto; }

    /* Header */
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }

    /* Form Card */
    .form-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; }
    .form-section-title { font-size: 1.1rem; font-weight: 700; color: var(--text-main); margin: 2rem 0 1rem 0; padding-bottom: 0.5rem; border-bottom: 1px dashed var(--border); }

    /* Inputs */
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    input[type=\"text\"], input[type=\"date\"], input[type=\"number\"], input[type=\"file\"], select {
        width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main);
        padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box;
    }
    input:focus, select:focus { border-color: var(--accent); }

    /* Grids */
    .row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
    .row-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem; }
    @media(max-width: 800px) { .row-2, .row-3 { grid-template-columns: 1fr; gap: 1rem; } }

    /* Results Table inside Form */
    .results-wrapper { overflow-x: auto; margin-bottom: 1rem; border: 1px solid var(--border); border-radius: 4px; }
    .result-table { width: 100%; border-collapse: collapse; min-width: 1000px; }
    .result-table th { background: var(--bg-darker); padding: 0.8rem; text-align: left; font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase; }
    .result-table td { padding: 0.5rem; border-top: 1px solid var(--border); background: var(--bg-light); }
    .result-table input { padding: 0.5rem; font-size: 0.9rem; }

    /* Actions */
    .form-actions { margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: flex-end; gap: 1rem; }
    .btn-submit { background: var(--accent); color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 4px; font-weight: 600; cursor: pointer; }
    .btn-submit:hover { background: var(--accent-hover); }
    .btn-cancel { background: transparent; border: 1px solid var(--border); color: var(--text-muted); padding: 0.7rem 1.5rem; border-radius: 4px; text-decoration: none; display: inline-flex; align-items: center; }
    .btn-cancel:hover { border-color: var(--text-muted); color: var(--text-main); }
    
    .btn-add-row { background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main); padding: 0.5rem 1rem; cursor: pointer; font-size: 0.85rem; border-radius: 4px; }
    .btn-add-row:hover { border-color: var(--accent); color: var(--accent); }
    
    .btn-remove { background: #ef4444; color: white; border: none; padding: 4px 8px; border-radius: 3px; cursor: pointer; font-size: 0.75rem; }

</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 54
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 55
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Nouvelle compétition</h1>
        <p>Enregistrez un événement et saisissez les résultats.</p>
    </div>

    <div class=\"form-card\">
        <form action=\"";
        // line 63
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_competition_new");
        yield "\" method=\"POST\" enctype=\"multipart/form-data\">
            
            <div class=\"row-2\">
                <div>
                    <label for=\"titre\">Titre de la compétition</label>
                    <input type=\"text\" id=\"titre\" name=\"titre\" required placeholder=\"Ex: Championnat régional\">
                </div>
                <div>
                    <label for=\"type\">Type</label>
                    <input type=\"text\" id=\"type\" name=\"type\" placeholder=\"Ex: Qualificatif, Finale...\">
                </div>
            </div>

            <div class=\"row-3\" style=\"margin-top: 1.5rem;\">
                <div>
                    <label for=\"date\">Date</label>
                    <input type=\"date\" id=\"date\" name=\"date\" required>
                </div>
                <div>
                    <label for=\"lieu\">Lieu</label>
                    <input type=\"text\" id=\"lieu\" name=\"lieu\" required placeholder=\"Ex: Paris\">
                </div>
                <div>
                    <label for=\"equipe\">Catégorie Équipe</label>
                    <select id=\"equipe\" name=\"equipe\" required>
                        <option value=\"male\">Masculine</option>
                        <option value=\"female\">Féminine</option>
                    </select>
                </div>
            </div>

            <div class=\"row-2\" style=\"margin-top: 1.5rem;\">
                <div>
                    <label for=\"classementEquipe\">Classement Équipe</label>
                    <input type=\"text\" id=\"classementEquipe\" name=\"classementEquipe\" placeholder=\"Ex: 1/12\">
                </div>
                <div>
                    <label for=\"image\">Affiche / Photo</label>
                    <input type=\"file\" id=\"image\" name=\"image\" accept=\"image/*\">
                </div>
            </div>

            <h3 class=\"form-section-title\">Saisie des résultats</h3>
            
            <div class=\"results-wrapper\">
                <table class=\"result-table\" id=\"resultsTable\">
                    <thead>
                        <tr>
                            <th width=\"15%\">Nom</th>
                            <th width=\"15%\">Prénom</th>
                            <th width=\"10%\">Catégorie</th>
                            <th width=\"10%\">Poids</th>
                            <th width=\"10%\">Épaulé-Jeté</th>
                            <th width=\"10%\">Arraché</th>
                            <th width=\"10%\">Total</th>
                            <th width=\"10%\">Points</th>
                            <th width=\"5%\">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type=\"text\" name=\"results[0][nom]\" placeholder=\"Nom\"></td>
                            <td><input type=\"text\" name=\"results[0][prenom]\" placeholder=\"Prénom\"></td>
                            <td><input type=\"text\" name=\"results[0][categorie]\" placeholder=\"Sen -81\"></td>
                            <td><input type=\"text\" name=\"results[0][categoriePoids]\" placeholder=\"78.5\"></td>
                            <td><input type=\"number\" step=\"1\" name=\"results[0][epauleJete]\" placeholder=\"0\"></td>
                            <td><input type=\"number\" step=\"1\" name=\"results[0][arracher]\" placeholder=\"0\"></td>
                            <td><input type=\"number\" step=\"1\" name=\"results[0][total]\" placeholder=\"0\"></td>
                            <td><input type=\"number\" step=\"0.01\" name=\"results[0][point]\" placeholder=\"0\"></td>
                            <td style=\"text-align:center;\"><button type=\"button\" class=\"btn-remove\">X</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <button type=\"button\" class=\"btn-add-row\" id=\"addResultBtn\">+ Ajouter une ligne</button>

            <div class=\"form-actions\">
                <a href=\"";
        // line 141
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_competition_index");
        yield "\" class=\"btn-cancel\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\">Enregistrer la compétition</button>
            </div>

        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    let counter = 1;
    const addBtn = document.getElementById('addResultBtn');
    const tableBody = document.querySelector('#resultsTable tbody');

    addBtn.addEventListener('click', () => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td><input type=\"text\" name=\"results[\${counter}][nom]\" placeholder=\"Nom\"></td>
            <td><input type=\"text\" name=\"results[\${counter}][prenom]\" placeholder=\"Prénom\"></td>
            <td><input type=\"text\" name=\"results[\${counter}][categorie]\"></td>
            <td><input type=\"text\" name=\"results[\${counter}][categoriePoids]\"></td>
            <td><input type=\"number\" step=\"1\" name=\"results[\${counter}][epauleJete]\"></td>
            <td><input type=\"number\" step=\"1\" name=\"results[\${counter}][arracher]\"></td>
            <td><input type=\"number\" step=\"1\" name=\"results[\${counter}][total]\"></td>
            <td><input type=\"number\" step=\"0.01\" name=\"results[\${counter}][point]\"></td>
            <td style=\"text-align:center;\"><button type=\"button\" class=\"btn-remove\">X</button></td>
        `;
        tableBody.appendChild(row);
        counter++;
    });

    tableBody.addEventListener('click', (e) => {
        if(e.target.classList.contains('btn-remove')) {
            if(tableBody.rows.length > 1) {
                e.target.closest('tr').remove();
            } else {
                alert(\"Il faut au moins une ligne de résultat.\");
            }
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
        return "admin/competitions/new.html.twig";
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
        return array (  241 => 141,  160 => 63,  150 => 55,  140 => 54,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Nouvelle compétition{% endblock %}

{% block stylesheets %}
<style>
    /* =================== PAGE STYLE =================== */
    .dashboard-container { width: 100%; max-width: 1200px; margin: 0 auto; }

    /* Header */
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }

    /* Form Card */
    .form-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; }
    .form-section-title { font-size: 1.1rem; font-weight: 700; color: var(--text-main); margin: 2rem 0 1rem 0; padding-bottom: 0.5rem; border-bottom: 1px dashed var(--border); }

    /* Inputs */
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    input[type=\"text\"], input[type=\"date\"], input[type=\"number\"], input[type=\"file\"], select {
        width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main);
        padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box;
    }
    input:focus, select:focus { border-color: var(--accent); }

    /* Grids */
    .row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
    .row-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem; }
    @media(max-width: 800px) { .row-2, .row-3 { grid-template-columns: 1fr; gap: 1rem; } }

    /* Results Table inside Form */
    .results-wrapper { overflow-x: auto; margin-bottom: 1rem; border: 1px solid var(--border); border-radius: 4px; }
    .result-table { width: 100%; border-collapse: collapse; min-width: 1000px; }
    .result-table th { background: var(--bg-darker); padding: 0.8rem; text-align: left; font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase; }
    .result-table td { padding: 0.5rem; border-top: 1px solid var(--border); background: var(--bg-light); }
    .result-table input { padding: 0.5rem; font-size: 0.9rem; }

    /* Actions */
    .form-actions { margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: flex-end; gap: 1rem; }
    .btn-submit { background: var(--accent); color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 4px; font-weight: 600; cursor: pointer; }
    .btn-submit:hover { background: var(--accent-hover); }
    .btn-cancel { background: transparent; border: 1px solid var(--border); color: var(--text-muted); padding: 0.7rem 1.5rem; border-radius: 4px; text-decoration: none; display: inline-flex; align-items: center; }
    .btn-cancel:hover { border-color: var(--text-muted); color: var(--text-main); }
    
    .btn-add-row { background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main); padding: 0.5rem 1rem; cursor: pointer; font-size: 0.85rem; border-radius: 4px; }
    .btn-add-row:hover { border-color: var(--accent); color: var(--accent); }
    
    .btn-remove { background: #ef4444; color: white; border: none; padding: 4px 8px; border-radius: 3px; cursor: pointer; font-size: 0.75rem; }

</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Nouvelle compétition</h1>
        <p>Enregistrez un événement et saisissez les résultats.</p>
    </div>

    <div class=\"form-card\">
        <form action=\"{{ path('admin_competition_new') }}\" method=\"POST\" enctype=\"multipart/form-data\">
            
            <div class=\"row-2\">
                <div>
                    <label for=\"titre\">Titre de la compétition</label>
                    <input type=\"text\" id=\"titre\" name=\"titre\" required placeholder=\"Ex: Championnat régional\">
                </div>
                <div>
                    <label for=\"type\">Type</label>
                    <input type=\"text\" id=\"type\" name=\"type\" placeholder=\"Ex: Qualificatif, Finale...\">
                </div>
            </div>

            <div class=\"row-3\" style=\"margin-top: 1.5rem;\">
                <div>
                    <label for=\"date\">Date</label>
                    <input type=\"date\" id=\"date\" name=\"date\" required>
                </div>
                <div>
                    <label for=\"lieu\">Lieu</label>
                    <input type=\"text\" id=\"lieu\" name=\"lieu\" required placeholder=\"Ex: Paris\">
                </div>
                <div>
                    <label for=\"equipe\">Catégorie Équipe</label>
                    <select id=\"equipe\" name=\"equipe\" required>
                        <option value=\"male\">Masculine</option>
                        <option value=\"female\">Féminine</option>
                    </select>
                </div>
            </div>

            <div class=\"row-2\" style=\"margin-top: 1.5rem;\">
                <div>
                    <label for=\"classementEquipe\">Classement Équipe</label>
                    <input type=\"text\" id=\"classementEquipe\" name=\"classementEquipe\" placeholder=\"Ex: 1/12\">
                </div>
                <div>
                    <label for=\"image\">Affiche / Photo</label>
                    <input type=\"file\" id=\"image\" name=\"image\" accept=\"image/*\">
                </div>
            </div>

            <h3 class=\"form-section-title\">Saisie des résultats</h3>
            
            <div class=\"results-wrapper\">
                <table class=\"result-table\" id=\"resultsTable\">
                    <thead>
                        <tr>
                            <th width=\"15%\">Nom</th>
                            <th width=\"15%\">Prénom</th>
                            <th width=\"10%\">Catégorie</th>
                            <th width=\"10%\">Poids</th>
                            <th width=\"10%\">Épaulé-Jeté</th>
                            <th width=\"10%\">Arraché</th>
                            <th width=\"10%\">Total</th>
                            <th width=\"10%\">Points</th>
                            <th width=\"5%\">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type=\"text\" name=\"results[0][nom]\" placeholder=\"Nom\"></td>
                            <td><input type=\"text\" name=\"results[0][prenom]\" placeholder=\"Prénom\"></td>
                            <td><input type=\"text\" name=\"results[0][categorie]\" placeholder=\"Sen -81\"></td>
                            <td><input type=\"text\" name=\"results[0][categoriePoids]\" placeholder=\"78.5\"></td>
                            <td><input type=\"number\" step=\"1\" name=\"results[0][epauleJete]\" placeholder=\"0\"></td>
                            <td><input type=\"number\" step=\"1\" name=\"results[0][arracher]\" placeholder=\"0\"></td>
                            <td><input type=\"number\" step=\"1\" name=\"results[0][total]\" placeholder=\"0\"></td>
                            <td><input type=\"number\" step=\"0.01\" name=\"results[0][point]\" placeholder=\"0\"></td>
                            <td style=\"text-align:center;\"><button type=\"button\" class=\"btn-remove\">X</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <button type=\"button\" class=\"btn-add-row\" id=\"addResultBtn\">+ Ajouter une ligne</button>

            <div class=\"form-actions\">
                <a href=\"{{ path('admin_competition_index') }}\" class=\"btn-cancel\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\">Enregistrer la compétition</button>
            </div>

        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    let counter = 1;
    const addBtn = document.getElementById('addResultBtn');
    const tableBody = document.querySelector('#resultsTable tbody');

    addBtn.addEventListener('click', () => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td><input type=\"text\" name=\"results[\${counter}][nom]\" placeholder=\"Nom\"></td>
            <td><input type=\"text\" name=\"results[\${counter}][prenom]\" placeholder=\"Prénom\"></td>
            <td><input type=\"text\" name=\"results[\${counter}][categorie]\"></td>
            <td><input type=\"text\" name=\"results[\${counter}][categoriePoids]\"></td>
            <td><input type=\"number\" step=\"1\" name=\"results[\${counter}][epauleJete]\"></td>
            <td><input type=\"number\" step=\"1\" name=\"results[\${counter}][arracher]\"></td>
            <td><input type=\"number\" step=\"1\" name=\"results[\${counter}][total]\"></td>
            <td><input type=\"number\" step=\"0.01\" name=\"results[\${counter}][point]\"></td>
            <td style=\"text-align:center;\"><button type=\"button\" class=\"btn-remove\">X</button></td>
        `;
        tableBody.appendChild(row);
        counter++;
    });

    tableBody.addEventListener('click', (e) => {
        if(e.target.classList.contains('btn-remove')) {
            if(tableBody.rows.length > 1) {
                e.target.closest('tr').remove();
            } else {
                alert(\"Il faut au moins une ligne de résultat.\");
            }
        }
    });
});
</script>
{% endblock %}", "admin/competitions/new.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/competitions/new.html.twig");
    }
}
