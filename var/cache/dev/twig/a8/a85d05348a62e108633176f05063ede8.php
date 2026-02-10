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

/* admin/machine/edit.html.twig */
class __TwigTemplate_ac0346993faf550ff2a4486eb872ad72 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/machine/edit.html.twig"));

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

        yield "Modifier la machine";
        
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
    /* ... Mêmes styles que NEW ... */
    .dashboard-container { width: 100%; max-width: 800px; margin: 0 auto; }
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }
    .form-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; }
    .form-card > form > div { margin-bottom: 1.5rem; }
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    input[type=\"text\"], input[type=\"file\"] { width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main); padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box; }
    input:focus { border-color: var(--accent); }

    /* Image Preview */
    .img-preview-container { display: flex; gap: 20px; align-items: flex-start; margin-top: 10px; }
    .img-box { text-align: center; }
    .img-box span { display: block; font-size: 0.75rem; color: var(--text-muted); margin-bottom: 5px; }
    .preview-img { max-width: 150px; border-radius: 4px; border: 1px solid var(--border); }

    /* Actions Edit */
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

    // line 35
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 36
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Modifier la machine</h1>
        <p>Mise à jour : ";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["machine"]) || array_key_exists("machine", $context) ? $context["machine"] : (function () { throw new RuntimeError('Variable "machine" does not exist.', 40, $this->source); })()), "name", [], "any", false, false, false, 40), "html", null, true);
        yield "</p>
    </div>

    <div class=\"form-card\">
        ";
        // line 44
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), 'form_start', ["attr" => ["enctype" => "multipart/form-data"]]);
        yield "

        <div>
            ";
        // line 47
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 47, $this->source); })()), "name", [], "any", false, false, false, 47), 'label', ["label" => "Nom de l'équipement"]);
        yield "
            ";
        // line 48
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 48, $this->source); })()), "name", [], "any", false, false, false, 48), 'widget');
        yield "
        </div>

        <div>
            ";
        // line 52
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 52, $this->source); })()), "image", [], "any", false, false, false, 52), 'label', ["label" => "Photo"]);
        yield "
            ";
        // line 53
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 53, $this->source); })()), "image", [], "any", false, false, false, 53), 'widget');
        yield "
            
            <div class=\"img-preview-container\">
                <div class=\"img-box\">
                    <span>Actuelle</span>
                    <img src=\"";
        // line 58
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/machines/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["machine"]) || array_key_exists("machine", $context) ? $context["machine"] : (function () { throw new RuntimeError('Variable "machine" does not exist.', 58, $this->source); })()), "image", [], "any", false, false, false, 58))), "html", null, true);
        yield "\" alt=\"Actuelle\" class=\"preview-img\">
                </div>
                
                <div class=\"img-box\" id=\"new-preview-box\" style=\"display:none;\">
                    <span>Nouvelle</span>
                    <img id=\"image-preview\" alt=\"Nouvelle\" class=\"preview-img\">
                </div>
            </div>
        </div>

        <div class=\"form-actions\">
            <button type=\"button\" class=\"btn-delete\" onclick=\"if(confirm('⚠️ Attention : Voulez-vous vraiment supprimer cette machine ?')) document.getElementById('delete-form').submit();\">
                Supprimer
            </button>

            <div style=\"display: flex; gap: 10px;\">
                <a href=\"";
        // line 74
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_machine_list");
        yield "\" class=\"btn-cancel\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\">Mettre à jour</button>
            </div>
        </div>

        ";
        // line 79
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 79, $this->source); })()), 'form_end');
        yield "
    </div>

    <form id=\"delete-form\" method=\"post\" action=\"";
        // line 82
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_machine_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["machine"]) || array_key_exists("machine", $context) ? $context["machine"] : (function () { throw new RuntimeError('Variable "machine" does not exist.', 82, $this->source); })()), "id", [], "any", false, false, false, 82)]), "html", null, true);
        yield "\" style=\"display: none;\">
        <input type=\"hidden\" name=\"_token\" value=\"";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["machine"]) || array_key_exists("machine", $context) ? $context["machine"] : (function () { throw new RuntimeError('Variable "machine" does not exist.', 83, $this->source); })()), "id", [], "any", false, false, false, 83))), "html", null, true);
        yield "\">
    </form>
</div>

<script>
document.addEventListener(\"DOMContentLoaded\", () => {
    const input = document.querySelector(\"input[type='file']\");
    const preview = document.getElementById(\"image-preview\");
    const previewBox = document.getElementById(\"new-preview-box\");

    if (input) {
        input.addEventListener(\"change\", () => {
            const file = input.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                previewBox.style.display = \"block\";
            }
        });
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
        return "admin/machine/edit.html.twig";
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
        return array (  210 => 83,  206 => 82,  200 => 79,  192 => 74,  173 => 58,  165 => 53,  161 => 52,  154 => 48,  150 => 47,  144 => 44,  137 => 40,  131 => 36,  121 => 35,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Modifier la machine{% endblock %}

{% block stylesheets %}
<style>
    /* ... Mêmes styles que NEW ... */
    .dashboard-container { width: 100%; max-width: 800px; margin: 0 auto; }
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }
    .form-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; }
    .form-card > form > div { margin-bottom: 1.5rem; }
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    input[type=\"text\"], input[type=\"file\"] { width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main); padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box; }
    input:focus { border-color: var(--accent); }

    /* Image Preview */
    .img-preview-container { display: flex; gap: 20px; align-items: flex-start; margin-top: 10px; }
    .img-box { text-align: center; }
    .img-box span { display: block; font-size: 0.75rem; color: var(--text-muted); margin-bottom: 5px; }
    .preview-img { max-width: 150px; border-radius: 4px; border: 1px solid var(--border); }

    /* Actions Edit */
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
        <h1>Modifier la machine</h1>
        <p>Mise à jour : {{ machine.name }}</p>
    </div>

    <div class=\"form-card\">
        {{ form_start(form, {'attr': {'enctype': 'multipart/form-data'}}) }}

        <div>
            {{ form_label(form.name, 'Nom de l\\'équipement') }}
            {{ form_widget(form.name) }}
        </div>

        <div>
            {{ form_label(form.image, 'Photo') }}
            {{ form_widget(form.image) }}
            
            <div class=\"img-preview-container\">
                <div class=\"img-box\">
                    <span>Actuelle</span>
                    <img src=\"{{ asset('uploads/machines/' ~ machine.image) }}\" alt=\"Actuelle\" class=\"preview-img\">
                </div>
                
                <div class=\"img-box\" id=\"new-preview-box\" style=\"display:none;\">
                    <span>Nouvelle</span>
                    <img id=\"image-preview\" alt=\"Nouvelle\" class=\"preview-img\">
                </div>
            </div>
        </div>

        <div class=\"form-actions\">
            <button type=\"button\" class=\"btn-delete\" onclick=\"if(confirm('⚠️ Attention : Voulez-vous vraiment supprimer cette machine ?')) document.getElementById('delete-form').submit();\">
                Supprimer
            </button>

            <div style=\"display: flex; gap: 10px;\">
                <a href=\"{{ path('admin_machine_list') }}\" class=\"btn-cancel\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\">Mettre à jour</button>
            </div>
        </div>

        {{ form_end(form) }}
    </div>

    <form id=\"delete-form\" method=\"post\" action=\"{{ path('admin_machine_delete', {id: machine.id}) }}\" style=\"display: none;\">
        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ machine.id) }}\">
    </form>
</div>

<script>
document.addEventListener(\"DOMContentLoaded\", () => {
    const input = document.querySelector(\"input[type='file']\");
    const preview = document.getElementById(\"image-preview\");
    const previewBox = document.getElementById(\"new-preview-box\");

    if (input) {
        input.addEventListener(\"change\", () => {
            const file = input.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                previewBox.style.display = \"block\";
            }
        });
    }
});
</script>
{% endblock %}", "admin/machine/edit.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/machine/edit.html.twig");
    }
}
