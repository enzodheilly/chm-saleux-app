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

/* admin/competitions/form.html.twig */
class __TwigTemplate_819d855bbda6afa233c6b217f4979232 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/competitions/form.html.twig"));

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

        yield "Modifier la compétition";
        
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
    /* ... Mêmes styles que NEW pour la cohérence ... */
    .dashboard-container { width: 100%; max-width: 1200px; margin: 0 auto; }
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .form-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; }
    
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    input[type=\"text\"], input[type=\"date\"], input[type=\"file\"], select, input[type=\"number\"] {
        width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main);
        padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box;
    }
    input:focus, select:focus { border-color: var(--accent); }

    .row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
    .row-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem; }
    
    /* Table Results */
    .results-wrapper { overflow-x: auto; margin-top: 2rem; border: 1px solid var(--border); border-radius: 4px; }
    .result-table { width: 100%; border-collapse: collapse; min-width: 1000px; }
    .result-table th { background: var(--bg-darker); padding: 0.8rem; text-align: left; font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase; }
    .result-table td { padding: 0.5rem; border-top: 1px solid var(--border); background: var(--bg-light); }
    
    /* Boutons */
    .form-actions { margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; }
    .btn-submit { background: var(--accent); color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 4px; font-weight: 600; cursor: pointer; }
    .btn-cancel { background: transparent; border: 1px solid var(--border); color: var(--text-muted); padding: 0.7rem 1.5rem; border-radius: 4px; text-decoration: none; display: inline-flex; align-items: center; }
    .btn-delete { color: #ef4444; background: none; border: none; cursor: pointer; font-weight: 500; }
    .btn-add-row { background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main); padding: 0.5rem 1rem; cursor: pointer; font-size: 0.85rem; border-radius: 4px; margin-top: 10px; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 38
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 39
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Modifier la compétition</h1>
        <p>Mise à jour : ";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["competition"]) || array_key_exists("competition", $context) ? $context["competition"] : (function () { throw new RuntimeError('Variable "competition" does not exist.', 43, $this->source); })()), "titre", [], "any", false, false, false, 43), "html", null, true);
        yield "</p>
    </div>

    <div class=\"form-card\">
        ";
        // line 47
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 47, $this->source); })()), 'form_start');
        yield "
        
        <div class=\"row-2\">
            <div>
                ";
        // line 51
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), "titre", [], "any", false, false, false, 51), 'label');
        yield "
                ";
        // line 52
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 52, $this->source); })()), "titre", [], "any", false, false, false, 52), 'widget');
        yield "
            </div>
            <div>
                ";
        // line 55
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 55, $this->source); })()), "type", [], "any", false, false, false, 55), 'label');
        yield "
                ";
        // line 56
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 56, $this->source); })()), "type", [], "any", false, false, false, 56), 'widget');
        yield "
            </div>
        </div>

        <div class=\"row-3\" style=\"margin-top: 1.5rem;\">
            <div>
                ";
        // line 62
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 62, $this->source); })()), "date", [], "any", false, false, false, 62), 'label');
        yield "
                ";
        // line 63
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 63, $this->source); })()), "date", [], "any", false, false, false, 63), 'widget');
        yield "
            </div>
            <div>
                ";
        // line 66
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 66, $this->source); })()), "lieu", [], "any", false, false, false, 66), 'label');
        yield "
                ";
        // line 67
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 67, $this->source); })()), "lieu", [], "any", false, false, false, 67), 'widget');
        yield "
            </div>
            <div>
                ";
        // line 70
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 70, $this->source); })()), "equipe", [], "any", false, false, false, 70), 'label');
        yield "
                ";
        // line 71
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 71, $this->source); })()), "equipe", [], "any", false, false, false, 71), 'widget');
        yield "
            </div>
        </div>

        <div class=\"row-2\" style=\"margin-top: 1.5rem;\">
            <div>
                ";
        // line 77
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 77, $this->source); })()), "image", [], "any", false, false, false, 77), 'label');
        yield "
                ";
        // line 78
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 78, $this->source); })()), "image", [], "any", false, false, false, 78), 'widget');
        yield "
            </div>
            <div>
                ";
        // line 82
        yield "                <label>Classement Équipe (Optionnel)</label>
                <input type=\"text\" disabled placeholder=\"Champ non mappé dans le form builder\">
            </div>
        </div>

        <h3 style=\"margin-top: 2rem; font-size: 1rem; color: var(--text-main);\">Résultats des athlètes</h3>
        
        <div class=\"results-wrapper\">
            <table class=\"result-table\" id=\"resultsTable\">
                <thead>
                    <tr>
                        <th width=\"15%\">Nom</th>
                        <th width=\"15%\">Prénom</th>
                        <th width=\"10%\">Catégorie</th>
                        <th width=\"10%\">Poids</th>
                        <th width=\"10%\">Total</th>
                        <th width=\"10%\">Points</th>
                        <th width=\"5%\">Action</th>
                    </tr>
                </thead>
                <tbody data-prototype=\"";
        // line 102
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 102, $this->source); })()), "results", [], "any", false, false, false, 102), "vars", [], "any", false, false, false, 102), "prototype", [], "any", false, false, false, 102), 'widget'), "html_attr");
        yield "\">
                    ";
        // line 103
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 103, $this->source); })()), "results", [], "any", false, false, false, 103));
        foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
            // line 104
            yield "                        <tr>
                            <td>";
            // line 105
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "nom", [], "any", false, false, false, 105), 'widget');
            yield "</td>
                            <td>";
            // line 106
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "prenom", [], "any", false, false, false, 106), 'widget');
            yield "</td>
                            <td>";
            // line 107
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "categorie", [], "any", false, false, false, 107), 'widget');
            yield "</td>
                            <td>";
            // line 108
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "categoriePoids", [], "any", false, false, false, 108), 'widget');
            yield "</td>
                            <td>";
            // line 109
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "total", [], "any", false, false, false, 109), 'widget');
            yield "</td>
                            <td>";
            // line 110
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "point", [], "any", false, false, false, 110), 'widget');
            yield "</td>
                            <td style=\"text-align: center;\">
                                <button type=\"button\" class=\"btn-delete\" onclick=\"this.closest('tr').remove();\">X</button>
                            </td>
                            ";
            // line 115
            yield "                            <td style=\"display:none;\">
                                ";
            // line 116
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "epauleJete", [], "any", false, false, false, 116), 'widget');
            yield "
                                ";
            // line 117
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "arracher", [], "any", false, false, false, 117), 'widget');
            yield "
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['result'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 121
        yield "                </tbody>
            </table>
        </div>
        
        <button type=\"button\" class=\"btn-add-row\" id=\"addResultBtn\">+ Ajouter un athlète</button>

        <div class=\"form-actions\">
            <button type=\"button\" class=\"btn-delete\" onclick=\"if(confirm('Supprimer définitivement la compétition ?')) document.getElementById('delete-form').submit();\">
                Supprimer l'événement
            </button>

            <div style=\"display: flex; gap: 10px;\">
                <a href=\"";
        // line 133
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_competition_index");
        yield "\" class=\"btn-cancel\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\">Mettre à jour</button>
            </div>
        </div>

        ";
        // line 138
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 138, $this->source); })()), 'form_end');
        yield "
    </div>

    <form id=\"delete-form\" method=\"post\" action=\"";
        // line 141
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_competition_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["competition"]) || array_key_exists("competition", $context) ? $context["competition"] : (function () { throw new RuntimeError('Variable "competition" does not exist.', 141, $this->source); })()), "id", [], "any", false, false, false, 141)]), "html", null, true);
        yield "\" style=\"display: none;\">
        <input type=\"hidden\" name=\"_token\" value=\"";
        // line 142
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["competition"]) || array_key_exists("competition", $context) ? $context["competition"] : (function () { throw new RuntimeError('Variable "competition" does not exist.', 142, $this->source); })()), "id", [], "any", false, false, false, 142))), "html", null, true);
        yield "\">
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const tableBody = document.querySelector('#resultsTable tbody');
    const addBtn = document.getElementById('addResultBtn');
    let index = tableBody.querySelectorAll('tr').length;
    
    // Si Symfony génère un prototype (data-prototype sur tbody)
    const prototype = tableBody.dataset.prototype;

    if (prototype) {
        addBtn.addEventListener('click', () => {
            let newRowHtml = prototype.replace(/__name__/g, index);
            
            // On nettoie le HTML généré par Symfony pour l'insérer dans un <tr>
            // Attention : Symfony génère souvent des <div>. Il faut adapter selon ton FormType.
            // Ici, une approche simple : on crée une TR et on injecte le contenu.
            
            let newRow = document.createElement('tr');
            newRow.innerHTML = newRowHtml; 
            
            // Ajout bouton suppression
            let tdAction = document.createElement('td');
            tdAction.style.textAlign = 'center';
            tdAction.innerHTML = '<button type=\"button\" class=\"btn-delete\" onclick=\"this.closest(\\'tr\\').remove()\">X</button>';
            newRow.appendChild(tdAction);

            tableBody.appendChild(newRow);
            index++;
        });
    } else {
        console.warn(\"Aucun prototype trouvé. Assurez-vous que 'allow_add' est activé dans le CollectionType.\");
    }
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
        return "admin/competitions/form.html.twig";
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
        return array (  329 => 142,  325 => 141,  319 => 138,  311 => 133,  297 => 121,  287 => 117,  283 => 116,  280 => 115,  273 => 110,  269 => 109,  265 => 108,  261 => 107,  257 => 106,  253 => 105,  250 => 104,  246 => 103,  242 => 102,  220 => 82,  214 => 78,  210 => 77,  201 => 71,  197 => 70,  191 => 67,  187 => 66,  181 => 63,  177 => 62,  168 => 56,  164 => 55,  158 => 52,  154 => 51,  147 => 47,  140 => 43,  134 => 39,  124 => 38,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Modifier la compétition{% endblock %}

{% block stylesheets %}
<style>
    /* ... Mêmes styles que NEW pour la cohérence ... */
    .dashboard-container { width: 100%; max-width: 1200px; margin: 0 auto; }
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .form-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; }
    
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    input[type=\"text\"], input[type=\"date\"], input[type=\"file\"], select, input[type=\"number\"] {
        width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main);
        padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box;
    }
    input:focus, select:focus { border-color: var(--accent); }

    .row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
    .row-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem; }
    
    /* Table Results */
    .results-wrapper { overflow-x: auto; margin-top: 2rem; border: 1px solid var(--border); border-radius: 4px; }
    .result-table { width: 100%; border-collapse: collapse; min-width: 1000px; }
    .result-table th { background: var(--bg-darker); padding: 0.8rem; text-align: left; font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase; }
    .result-table td { padding: 0.5rem; border-top: 1px solid var(--border); background: var(--bg-light); }
    
    /* Boutons */
    .form-actions { margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; }
    .btn-submit { background: var(--accent); color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 4px; font-weight: 600; cursor: pointer; }
    .btn-cancel { background: transparent; border: 1px solid var(--border); color: var(--text-muted); padding: 0.7rem 1.5rem; border-radius: 4px; text-decoration: none; display: inline-flex; align-items: center; }
    .btn-delete { color: #ef4444; background: none; border: none; cursor: pointer; font-weight: 500; }
    .btn-add-row { background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main); padding: 0.5rem 1rem; cursor: pointer; font-size: 0.85rem; border-radius: 4px; margin-top: 10px; }
</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Modifier la compétition</h1>
        <p>Mise à jour : {{ competition.titre }}</p>
    </div>

    <div class=\"form-card\">
        {{ form_start(form) }}
        
        <div class=\"row-2\">
            <div>
                {{ form_label(form.titre) }}
                {{ form_widget(form.titre) }}
            </div>
            <div>
                {{ form_label(form.type) }}
                {{ form_widget(form.type) }}
            </div>
        </div>

        <div class=\"row-3\" style=\"margin-top: 1.5rem;\">
            <div>
                {{ form_label(form.date) }}
                {{ form_widget(form.date) }}
            </div>
            <div>
                {{ form_label(form.lieu) }}
                {{ form_widget(form.lieu) }}
            </div>
            <div>
                {{ form_label(form.equipe) }}
                {{ form_widget(form.equipe) }}
            </div>
        </div>

        <div class=\"row-2\" style=\"margin-top: 1.5rem;\">
            <div>
                {{ form_label(form.image) }}
                {{ form_widget(form.image) }}
            </div>
            <div>
                {# Si tu as un champ classementEquipe, ajoute-le ici #}
                <label>Classement Équipe (Optionnel)</label>
                <input type=\"text\" disabled placeholder=\"Champ non mappé dans le form builder\">
            </div>
        </div>

        <h3 style=\"margin-top: 2rem; font-size: 1rem; color: var(--text-main);\">Résultats des athlètes</h3>
        
        <div class=\"results-wrapper\">
            <table class=\"result-table\" id=\"resultsTable\">
                <thead>
                    <tr>
                        <th width=\"15%\">Nom</th>
                        <th width=\"15%\">Prénom</th>
                        <th width=\"10%\">Catégorie</th>
                        <th width=\"10%\">Poids</th>
                        <th width=\"10%\">Total</th>
                        <th width=\"10%\">Points</th>
                        <th width=\"5%\">Action</th>
                    </tr>
                </thead>
                <tbody data-prototype=\"{{ form_widget(form.results.vars.prototype)|e('html_attr') }}\">
                    {% for result in form.results %}
                        <tr>
                            <td>{{ form_widget(result.nom) }}</td>
                            <td>{{ form_widget(result.prenom) }}</td>
                            <td>{{ form_widget(result.categorie) }}</td>
                            <td>{{ form_widget(result.categoriePoids) }}</td>
                            <td>{{ form_widget(result.total) }}</td>
                            <td>{{ form_widget(result.point) }}</td>
                            <td style=\"text-align: center;\">
                                <button type=\"button\" class=\"btn-delete\" onclick=\"this.closest('tr').remove();\">X</button>
                            </td>
                            {# Champs cachés pour ne pas perdre de données #}
                            <td style=\"display:none;\">
                                {{ form_widget(result.epauleJete) }}
                                {{ form_widget(result.arracher) }}
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
        
        <button type=\"button\" class=\"btn-add-row\" id=\"addResultBtn\">+ Ajouter un athlète</button>

        <div class=\"form-actions\">
            <button type=\"button\" class=\"btn-delete\" onclick=\"if(confirm('Supprimer définitivement la compétition ?')) document.getElementById('delete-form').submit();\">
                Supprimer l'événement
            </button>

            <div style=\"display: flex; gap: 10px;\">
                <a href=\"{{ path('admin_competition_index') }}\" class=\"btn-cancel\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\">Mettre à jour</button>
            </div>
        </div>

        {{ form_end(form) }}
    </div>

    <form id=\"delete-form\" method=\"post\" action=\"{{ path('admin_competition_delete', {id: competition.id}) }}\" style=\"display: none;\">
        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ competition.id) }}\">
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const tableBody = document.querySelector('#resultsTable tbody');
    const addBtn = document.getElementById('addResultBtn');
    let index = tableBody.querySelectorAll('tr').length;
    
    // Si Symfony génère un prototype (data-prototype sur tbody)
    const prototype = tableBody.dataset.prototype;

    if (prototype) {
        addBtn.addEventListener('click', () => {
            let newRowHtml = prototype.replace(/__name__/g, index);
            
            // On nettoie le HTML généré par Symfony pour l'insérer dans un <tr>
            // Attention : Symfony génère souvent des <div>. Il faut adapter selon ton FormType.
            // Ici, une approche simple : on crée une TR et on injecte le contenu.
            
            let newRow = document.createElement('tr');
            newRow.innerHTML = newRowHtml; 
            
            // Ajout bouton suppression
            let tdAction = document.createElement('td');
            tdAction.style.textAlign = 'center';
            tdAction.innerHTML = '<button type=\"button\" class=\"btn-delete\" onclick=\"this.closest(\\'tr\\').remove()\">X</button>';
            newRow.appendChild(tdAction);

            tableBody.appendChild(newRow);
            index++;
        });
    } else {
        console.warn(\"Aucun prototype trouvé. Assurez-vous que 'allow_add' est activé dans le CollectionType.\");
    }
});
</script>
{% endblock %}", "admin/competitions/form.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/competitions/form.html.twig");
    }
}
