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

/* admin/produit/edit.html.twig */
class __TwigTemplate_33c69b9b7630d4dc8fbc35039e54164b extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/produit/edit.html.twig"));

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

        yield "Modifier le produit";
        
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
    input[type=\"text\"], input[type=\"number\"], input[type=\"file\"], textarea { width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main); padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box; }
    input:focus, textarea:focus { border-color: var(--accent); }
    textarea { min-height: 120px; line-height: 1.5; font-family: inherit; resize: vertical; }
    .row-2 { display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; }
    @media(max-width: 600px) { .row-2 { grid-template-columns: 1fr; gap: 0; } }

    /* Image Preview */
    .img-preview-container { display: flex; gap: 20px; align-items: flex-start; margin-top: 10px; }
    .img-box { text-align: center; }
    .img-box span { display: block; font-size: 0.75rem; color: var(--text-muted); margin-bottom: 5px; }
    .preview-img { max-width: 120px; border-radius: 4px; border: 1px solid var(--border); }

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
        <h1>Modifier le produit</h1>
        <p>Édition de : ";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 43, $this->source); })()), "titre", [], "any", false, false, false, 43), "html", null, true);
        yield "</p>
    </div>

    <div class=\"form-card\">
        ";
        // line 47
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 47, $this->source); })()), 'form_start', ["attr" => ["enctype" => "multipart/form-data"]]);
        yield "

        <div class=\"row-2\">
            <div>
                ";
        // line 51
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), "titre", [], "any", false, false, false, 51), 'label', ["label" => "Nom du produit"]);
        yield "
                ";
        // line 52
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 52, $this->source); })()), "titre", [], "any", false, false, false, 52), 'widget');
        yield "
            </div>
            <div>
                ";
        // line 55
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 55, $this->source); })()), "prix", [], "any", false, false, false, 55), 'label', ["label" => "Prix (€)"]);
        yield "
                ";
        // line 56
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 56, $this->source); })()), "prix", [], "any", false, false, false, 56), 'widget');
        yield "
            </div>
        </div>

        <div>
            ";
        // line 61
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 61, $this->source); })()), "description", [], "any", false, false, false, 61), 'label', ["label" => "Description"]);
        yield "
            ";
        // line 62
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 62, $this->source); })()), "description", [], "any", false, false, false, 62), 'widget');
        yield "
        </div>

        <div>
            ";
        // line 66
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 66, $this->source); })()), "image", [], "any", false, false, false, 66), 'label', ["label" => "Photo"]);
        yield "
            ";
        // line 67
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 67, $this->source); })()), "image", [], "any", false, false, false, 67), 'widget');
        yield "
            
            <div class=\"img-preview-container\">
                ";
        // line 70
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 70, $this->source); })()), "image", [], "any", false, false, false, 70)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 71
            yield "                    <div class=\"img-box\">
                        <span>Actuelle</span>
                        <img src=\"";
            // line 73
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 73, $this->source); })()), "image", [], "any", false, false, false, 73))), "html", null, true);
            yield "\" alt=\"Actuelle\" class=\"preview-img\">
                    </div>
                ";
        }
        // line 76
        yield "                
                <div class=\"img-box\" id=\"new-preview-box\" style=\"display:none;\">
                    <span>Nouvelle</span>
                    <img id=\"image-preview\" alt=\"Nouvelle\" class=\"preview-img\">
                </div>
            </div>
        </div>

        <div class=\"form-actions\">
            <button type=\"button\" class=\"btn-delete\" onclick=\"if(confirm('⚠️ Attention : Voulez-vous vraiment supprimer ce produit ?')) document.getElementById('delete-form').submit();\">
                Supprimer
            </button>

            <div style=\"display: flex; gap: 10px;\">
                <a href=\"";
        // line 90
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_index");
        yield "\" class=\"btn-cancel\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\">Mettre à jour</button>
            </div>
        </div>

        ";
        // line 95
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 95, $this->source); })()), 'form_end');
        yield "
    </div>

    <form id=\"delete-form\" method=\"post\" action=\"";
        // line 98
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_product_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 98, $this->source); })()), "id", [], "any", false, false, false, 98)]), "html", null, true);
        yield "\" style=\"display: none;\">
        <input type=\"hidden\" name=\"_token\" value=\"";
        // line 99
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 99, $this->source); })()), "id", [], "any", false, false, false, 99))), "html", null, true);
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
        return "admin/produit/edit.html.twig";
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
        return array (  243 => 99,  239 => 98,  233 => 95,  225 => 90,  209 => 76,  203 => 73,  199 => 71,  197 => 70,  191 => 67,  187 => 66,  180 => 62,  176 => 61,  168 => 56,  164 => 55,  158 => 52,  154 => 51,  147 => 47,  140 => 43,  134 => 39,  124 => 38,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Modifier le produit{% endblock %}

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
    input[type=\"text\"], input[type=\"number\"], input[type=\"file\"], textarea { width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main); padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box; }
    input:focus, textarea:focus { border-color: var(--accent); }
    textarea { min-height: 120px; line-height: 1.5; font-family: inherit; resize: vertical; }
    .row-2 { display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; }
    @media(max-width: 600px) { .row-2 { grid-template-columns: 1fr; gap: 0; } }

    /* Image Preview */
    .img-preview-container { display: flex; gap: 20px; align-items: flex-start; margin-top: 10px; }
    .img-box { text-align: center; }
    .img-box span { display: block; font-size: 0.75rem; color: var(--text-muted); margin-bottom: 5px; }
    .preview-img { max-width: 120px; border-radius: 4px; border: 1px solid var(--border); }

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
        <h1>Modifier le produit</h1>
        <p>Édition de : {{ produit.titre }}</p>
    </div>

    <div class=\"form-card\">
        {{ form_start(form, {'attr': {'enctype': 'multipart/form-data'}}) }}

        <div class=\"row-2\">
            <div>
                {{ form_label(form.titre, 'Nom du produit') }}
                {{ form_widget(form.titre) }}
            </div>
            <div>
                {{ form_label(form.prix, 'Prix (€)') }}
                {{ form_widget(form.prix) }}
            </div>
        </div>

        <div>
            {{ form_label(form.description, 'Description') }}
            {{ form_widget(form.description) }}
        </div>

        <div>
            {{ form_label(form.image, 'Photo') }}
            {{ form_widget(form.image) }}
            
            <div class=\"img-preview-container\">
                {% if produit.image %}
                    <div class=\"img-box\">
                        <span>Actuelle</span>
                        <img src=\"{{ asset('uploads/' ~ produit.image) }}\" alt=\"Actuelle\" class=\"preview-img\">
                    </div>
                {% endif %}
                
                <div class=\"img-box\" id=\"new-preview-box\" style=\"display:none;\">
                    <span>Nouvelle</span>
                    <img id=\"image-preview\" alt=\"Nouvelle\" class=\"preview-img\">
                </div>
            </div>
        </div>

        <div class=\"form-actions\">
            <button type=\"button\" class=\"btn-delete\" onclick=\"if(confirm('⚠️ Attention : Voulez-vous vraiment supprimer ce produit ?')) document.getElementById('delete-form').submit();\">
                Supprimer
            </button>

            <div style=\"display: flex; gap: 10px;\">
                <a href=\"{{ path('admin_product_index') }}\" class=\"btn-cancel\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\">Mettre à jour</button>
            </div>
        </div>

        {{ form_end(form) }}
    </div>

    <form id=\"delete-form\" method=\"post\" action=\"{{ path('admin_product_delete', {id: produit.id}) }}\" style=\"display: none;\">
        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ produit.id) }}\">
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
{% endblock %}", "admin/produit/edit.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/produit/edit.html.twig");
    }
}
