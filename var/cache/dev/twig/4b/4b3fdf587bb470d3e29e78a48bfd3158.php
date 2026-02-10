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

/* admin/forfait/edit.html.twig */
class __TwigTemplate_b123735e8d4d2630a2ecba7c6cff59c7 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/forfait/edit.html.twig"));

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

        yield "Modifier le forfait";
        
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
    .dashboard-container { width: 100%; max-width: 1000px; margin: 0 auto; }
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }
    .form-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; }
    .form-card > form > div { margin-bottom: 1.5rem; }
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    input[type=\"text\"], input[type=\"number\"], select, textarea { width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main); padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box; }
    input:focus, textarea:focus, select:focus { border-color: var(--accent); }
    .row-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem; }
    @media(max-width: 800px) { .row-3 { grid-template-columns: 1fr; gap: 1rem; } }
    .checkbox-row { display: flex; align-items: center; gap: 10px; padding: 1rem; background: var(--bg-darker); border: 1px solid var(--border); border-radius: 4px; }
    .checkbox-row input[type=\"checkbox\"] { width: auto; transform: scale(1.2); cursor: pointer; }
    .checkbox-row label { margin: 0; color: var(--text-main); font-weight: 600; cursor: pointer; text-transform: none; font-size: 0.95rem; }
    .help-box { background: rgba(255,255,255,0.03); border: 1px solid var(--border); padding: 1rem; border-radius: 4px; margin-top: 0.5rem; }
    .help-box p { margin: 0 0 0.5rem 0; font-weight: 600; font-size: 0.85rem; color: var(--text-main); }
    .help-box ul { margin: 0; padding-left: 1.2rem; color: var(--text-muted); font-size: 0.85rem; }
    .help-box li { margin-bottom: 0.2rem; }
    .help-box code { background: rgba(0,0,0,0.3); padding: 2px 5px; border-radius: 3px; font-family: monospace; color: var(--accent); }

    /* Actions Spécifiques Edit (Space Between) */
    .form-actions { margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; }
    
    .btn-submit { background: var(--accent); color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 4px; font-weight: 600; cursor: pointer; font-size: 0.9rem; transition: background 0.2s; }
    .btn-submit:hover { background: var(--accent-hover); }

    .btn-cancel { background: transparent; border: 1px solid var(--border); color: var(--text-muted); padding: 0.7rem 1.5rem; border-radius: 4px; font-weight: 500; text-decoration: none; font-size: 0.9rem; display: inline-flex; align-items: center; transition: 0.2s; }
    .btn-cancel:hover { border-color: var(--text-muted); color: var(--text-main); }

    .btn-delete { color: #ef4444; background: none; border: none; font-size: 0.9rem; cursor: pointer; font-weight: 500; padding: 0.5rem 0; opacity: 0.8; transition: opacity 0.2s; }
    .btn-delete:hover { opacity: 1; text-decoration: underline; }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 42
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 43
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Modifier le forfait</h1>
        <p>Mise à jour des informations de l'offre : ";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["forfait"]) || array_key_exists("forfait", $context) ? $context["forfait"] : (function () { throw new RuntimeError('Variable "forfait" does not exist.', 47, $this->source); })()), "nom", [], "any", false, false, false, 47), "html", null, true);
        yield "</p>
    </div>

    <div class=\"form-card\">
        ";
        // line 51
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), 'form_start');
        yield "

        <div>
            ";
        // line 54
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 54, $this->source); })()), "nom", [], "any", false, false, false, 54), 'label');
        yield "
            ";
        // line 55
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 55, $this->source); })()), "nom", [], "any", false, false, false, 55), 'widget');
        yield "
        </div>

        <div class=\"row-3\">
            <div>
                ";
        // line 60
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 60, $this->source); })()), "prix", [], "any", false, false, false, 60), 'label');
        yield "
                ";
        // line 61
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 61, $this->source); })()), "prix", [], "any", false, false, false, 61), 'widget');
        yield "
            </div>
            <div>
                ";
        // line 64
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 64, $this->source); })()), "frequence", [], "any", false, false, false, 64), 'label');
        yield "
                ";
        // line 65
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 65, $this->source); })()), "frequence", [], "any", false, false, false, 65), 'widget');
        yield "
            </div>
            <div>
                ";
        // line 68
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 68, $this->source); })()), "mensualite", [], "any", false, false, false, 68), 'label');
        yield "
                ";
        // line 69
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 69, $this->source); })()), "mensualite", [], "any", false, false, false, 69), 'widget');
        yield "
                <div style=\"font-size: 0.75rem; color: var(--text-muted); margin-top: 5px;\">Calculé à titre indicatif</div>
            </div>
        </div>

        <div class=\"checkbox-row\" onclick=\"document.getElementById('";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 74, $this->source); })()), "isPopular", [], "any", false, false, false, 74), "vars", [], "any", false, false, false, 74), "id", [], "any", false, false, false, 74), "html", null, true);
        yield "').click()\">
            ";
        // line 75
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 75, $this->source); })()), "isPopular", [], "any", false, false, false, 75), 'widget');
        yield "
            <label for=\"";
        // line 76
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 76, $this->source); })()), "isPopular", [], "any", false, false, false, 76), "vars", [], "any", false, false, false, 76), "id", [], "any", false, false, false, 76), "html", null, true);
        yield "\">Mettre en avant cette offre (Badge Populaire)</label>
        </div>

        <div style=\"margin-top: 1.5rem;\">
            ";
        // line 80
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 80, $this->source); })()), "description", [], "any", false, false, false, 80), 'label');
        yield "
            ";
        // line 81
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 81, $this->source); })()), "description", [], "any", false, false, false, 81), 'widget');
        yield "
        </div>

        <div style=\"margin-top: 1.5rem;\">
            ";
        // line 85
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 85, $this->source); })()), "avantages", [], "any", false, false, false, 85), 'label');
        yield "
            ";
        // line 86
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 86, $this->source); })()), "avantages", [], "any", false, false, false, 86), 'widget', ["attr" => ["rows" => 8]]);
        yield "
            
            <div class=\"help-box\">
                <p>Gestion des icônes :</p>
                <ul>
                    <li>Format : <code>nom-icone | Votre texte</code></li>
                    <li>Exemple : <code>fa-trophy | Accès compétition</code></li>
                </ul>
            </div>
        </div>

        <div class=\"form-actions\">
            <button type=\"button\" class=\"btn-delete\" onclick=\"if(confirm('⚠️ Attention : Supprimer cette offre peut impacter les membres actifs.\\n\\nConfirmer la suppression ?')) document.getElementById('delete-form').submit();\">
                Supprimer l'offre
            </button>

            <div style=\"display: flex; gap: 10px;\">
                <a href=\"";
        // line 103
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_forfait_index");
        yield "\" class=\"btn-cancel\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\">Mettre à jour</button>
            </div>
        </div>

        ";
        // line 108
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 108, $this->source); })()), 'form_end');
        yield "
    </div>

    <form id=\"delete-form\" method=\"post\" action=\"";
        // line 111
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_forfait_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["forfait"]) || array_key_exists("forfait", $context) ? $context["forfait"] : (function () { throw new RuntimeError('Variable "forfait" does not exist.', 111, $this->source); })()), "id", [], "any", false, false, false, 111)]), "html", null, true);
        yield "\" style=\"display: none;\">
        <input type=\"hidden\" name=\"_token\" value=\"";
        // line 112
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["forfait"]) || array_key_exists("forfait", $context) ? $context["forfait"] : (function () { throw new RuntimeError('Variable "forfait" does not exist.', 112, $this->source); })()), "id", [], "any", false, false, false, 112))), "html", null, true);
        yield "\">
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const priceInput = document.getElementById('forfait_prix');
    const freqSelect = document.getElementById('forfait_frequence');
    const monthlyInput = document.getElementById('forfait_mensualite');

    function updateMonthlyPrice() {
        let price = parseFloat(priceInput.value.replace(',', '.'));
        const frequency = freqSelect.value; 

        if (isNaN(price) || price <= 0) {
            monthlyInput.value = '';
            return;
        }

        let monthly = 0;
        let valid = false;

        if (frequency === '/an') { monthly = price / 12; valid = true; } 
        else if (frequency === '/trimestre') { monthly = price / 3; valid = true; } 
        else if (frequency === '/semestre') { monthly = price / 6; valid = true; } 
        else if (frequency === '/mois') { monthly = price; valid = true; }

        if (valid) monthlyInput.value = monthly.toFixed(2);
        else monthlyInput.value = '';
    }

    if (priceInput && freqSelect && monthlyInput) {
        priceInput.addEventListener('input', updateMonthlyPrice);
        freqSelect.addEventListener('change', updateMonthlyPrice);
        // Calcul initial au chargement pour le mode Edit
        updateMonthlyPrice();
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
        return "admin/forfait/edit.html.twig";
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
        return array (  269 => 112,  265 => 111,  259 => 108,  251 => 103,  231 => 86,  227 => 85,  220 => 81,  216 => 80,  209 => 76,  205 => 75,  201 => 74,  193 => 69,  189 => 68,  183 => 65,  179 => 64,  173 => 61,  169 => 60,  161 => 55,  157 => 54,  151 => 51,  144 => 47,  138 => 43,  128 => 42,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Modifier le forfait{% endblock %}

{% block stylesheets %}
<style>
    /* ... Mêmes styles que NEW pour la cohérence ... */
    .dashboard-container { width: 100%; max-width: 1000px; margin: 0 auto; }
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }
    .form-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; }
    .form-card > form > div { margin-bottom: 1.5rem; }
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    input[type=\"text\"], input[type=\"number\"], select, textarea { width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main); padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box; }
    input:focus, textarea:focus, select:focus { border-color: var(--accent); }
    .row-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem; }
    @media(max-width: 800px) { .row-3 { grid-template-columns: 1fr; gap: 1rem; } }
    .checkbox-row { display: flex; align-items: center; gap: 10px; padding: 1rem; background: var(--bg-darker); border: 1px solid var(--border); border-radius: 4px; }
    .checkbox-row input[type=\"checkbox\"] { width: auto; transform: scale(1.2); cursor: pointer; }
    .checkbox-row label { margin: 0; color: var(--text-main); font-weight: 600; cursor: pointer; text-transform: none; font-size: 0.95rem; }
    .help-box { background: rgba(255,255,255,0.03); border: 1px solid var(--border); padding: 1rem; border-radius: 4px; margin-top: 0.5rem; }
    .help-box p { margin: 0 0 0.5rem 0; font-weight: 600; font-size: 0.85rem; color: var(--text-main); }
    .help-box ul { margin: 0; padding-left: 1.2rem; color: var(--text-muted); font-size: 0.85rem; }
    .help-box li { margin-bottom: 0.2rem; }
    .help-box code { background: rgba(0,0,0,0.3); padding: 2px 5px; border-radius: 3px; font-family: monospace; color: var(--accent); }

    /* Actions Spécifiques Edit (Space Between) */
    .form-actions { margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; }
    
    .btn-submit { background: var(--accent); color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 4px; font-weight: 600; cursor: pointer; font-size: 0.9rem; transition: background 0.2s; }
    .btn-submit:hover { background: var(--accent-hover); }

    .btn-cancel { background: transparent; border: 1px solid var(--border); color: var(--text-muted); padding: 0.7rem 1.5rem; border-radius: 4px; font-weight: 500; text-decoration: none; font-size: 0.9rem; display: inline-flex; align-items: center; transition: 0.2s; }
    .btn-cancel:hover { border-color: var(--text-muted); color: var(--text-main); }

    .btn-delete { color: #ef4444; background: none; border: none; font-size: 0.9rem; cursor: pointer; font-weight: 500; padding: 0.5rem 0; opacity: 0.8; transition: opacity 0.2s; }
    .btn-delete:hover { opacity: 1; text-decoration: underline; }
</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Modifier le forfait</h1>
        <p>Mise à jour des informations de l'offre : {{ forfait.nom }}</p>
    </div>

    <div class=\"form-card\">
        {{ form_start(form) }}

        <div>
            {{ form_label(form.nom) }}
            {{ form_widget(form.nom) }}
        </div>

        <div class=\"row-3\">
            <div>
                {{ form_label(form.prix) }}
                {{ form_widget(form.prix) }}
            </div>
            <div>
                {{ form_label(form.frequence) }}
                {{ form_widget(form.frequence) }}
            </div>
            <div>
                {{ form_label(form.mensualite) }}
                {{ form_widget(form.mensualite) }}
                <div style=\"font-size: 0.75rem; color: var(--text-muted); margin-top: 5px;\">Calculé à titre indicatif</div>
            </div>
        </div>

        <div class=\"checkbox-row\" onclick=\"document.getElementById('{{ form.isPopular.vars.id }}').click()\">
            {{ form_widget(form.isPopular) }}
            <label for=\"{{ form.isPopular.vars.id }}\">Mettre en avant cette offre (Badge Populaire)</label>
        </div>

        <div style=\"margin-top: 1.5rem;\">
            {{ form_label(form.description) }}
            {{ form_widget(form.description) }}
        </div>

        <div style=\"margin-top: 1.5rem;\">
            {{ form_label(form.avantages) }}
            {{ form_widget(form.avantages, {'attr': {'rows': 8}}) }}
            
            <div class=\"help-box\">
                <p>Gestion des icônes :</p>
                <ul>
                    <li>Format : <code>nom-icone | Votre texte</code></li>
                    <li>Exemple : <code>fa-trophy | Accès compétition</code></li>
                </ul>
            </div>
        </div>

        <div class=\"form-actions\">
            <button type=\"button\" class=\"btn-delete\" onclick=\"if(confirm('⚠️ Attention : Supprimer cette offre peut impacter les membres actifs.\\n\\nConfirmer la suppression ?')) document.getElementById('delete-form').submit();\">
                Supprimer l'offre
            </button>

            <div style=\"display: flex; gap: 10px;\">
                <a href=\"{{ path('admin_forfait_index') }}\" class=\"btn-cancel\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\">Mettre à jour</button>
            </div>
        </div>

        {{ form_end(form) }}
    </div>

    <form id=\"delete-form\" method=\"post\" action=\"{{ path('admin_forfait_delete', {id: forfait.id}) }}\" style=\"display: none;\">
        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ forfait.id) }}\">
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const priceInput = document.getElementById('forfait_prix');
    const freqSelect = document.getElementById('forfait_frequence');
    const monthlyInput = document.getElementById('forfait_mensualite');

    function updateMonthlyPrice() {
        let price = parseFloat(priceInput.value.replace(',', '.'));
        const frequency = freqSelect.value; 

        if (isNaN(price) || price <= 0) {
            monthlyInput.value = '';
            return;
        }

        let monthly = 0;
        let valid = false;

        if (frequency === '/an') { monthly = price / 12; valid = true; } 
        else if (frequency === '/trimestre') { monthly = price / 3; valid = true; } 
        else if (frequency === '/semestre') { monthly = price / 6; valid = true; } 
        else if (frequency === '/mois') { monthly = price; valid = true; }

        if (valid) monthlyInput.value = monthly.toFixed(2);
        else monthlyInput.value = '';
    }

    if (priceInput && freqSelect && monthlyInput) {
        priceInput.addEventListener('input', updateMonthlyPrice);
        freqSelect.addEventListener('change', updateMonthlyPrice);
        // Calcul initial au chargement pour le mode Edit
        updateMonthlyPrice();
    }
});
</script>
{% endblock %}", "admin/forfait/edit.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/forfait/edit.html.twig");
    }
}
