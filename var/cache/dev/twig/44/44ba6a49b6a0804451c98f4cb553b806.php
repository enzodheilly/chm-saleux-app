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

/* admin/user/new_admin.html.twig */
class __TwigTemplate_75aca9bc3264a766c6bdd4d9a48d8709 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/user/new_admin.html.twig"));

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

        yield "Ajouter un Administrateur";
        
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
    /* =================== PAGE STYLE (IDENTIQUE UTILISATEUR) =================== */
    .dashboard-container {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
    }

    /* Header */
    .page-header {
        margin-bottom: 2rem;
        border-bottom: 1px solid var(--border);
        padding-bottom: 1rem;
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

    /* Carte du formulaire */
    .form-card {
        background: var(--bg-light);
        border: 1px solid var(--border);
        border-radius: 4px;
        padding: 2rem;
    }

    /* Espacement des blocs */
    .form-group-custom {
        margin-bottom: 1.5rem;
    }

    /* Labels */
    label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text-main);
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Inputs */
    input[type=\"text\"],
    input[type=\"email\"],
    input[type=\"password\"] {
        width: 100%;
        background: var(--bg-darker);
        border: 1px solid var(--border);
        color: var(--text-main);
        padding: 0.7rem 1rem;
        border-radius: 4px;
        font-size: 0.95rem;
        outline: none;
        transition: border-color 0.2s;
        box-sizing: border-box;
    }

    input:focus {
        border-color: var(--accent);
    }

    /* Zone des Actions */
    .form-actions {
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border);
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }

    .btn-submit {
        background: var(--accent);
        color: #fff;
        padding: 0.7rem 1.5rem;
        border: none;
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
        font-size: 0.9rem;
        transition: background 0.2s;
    }
    .btn-submit:hover {
        background: var(--accent-hover);
    }

    .btn-cancel {
        background: transparent;
        border: 1px solid var(--border);
        color: var(--text-muted);
        padding: 0.7rem 1.5rem;
        border-radius: 4px;
        font-weight: 500;
        text-decoration: none;
        font-size: 0.9rem;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
    }
    .btn-cancel:hover {
        border-color: var(--text-muted);
        color: var(--text-main);
    }

    .row-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }
    @media(max-width: 700px) { .row-2 { grid-template-columns: 1fr; gap: 0; } }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 129
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 130
        yield "<div class=\"dashboard-container\">
    <div class=\"page-header\">
        <h1>Gestion des Administrateurs</h1>
        <p>Recherchez un utilisateur existant pour le promouvoir, ou remplissez tout pour en créer un nouveau.</p>
    </div>

    <div class=\"form-card\">
        <form method=\"POST\" autocomplete=\"off\">
            
            <div class=\"form-group-custom\">
                <label>Adresse Email ou Recherche Utilisateur</label>
                <input type=\"email\" name=\"email\" list=\"users_list\" placeholder=\"Commencez à taper un email...\" required>
                
                <datalist id=\"users_list\">
                    ";
        // line 144
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 144, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 145
            yield "                        <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 145), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "firstName", [], "any", false, false, false, 145), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "lastName", [], "any", false, false, false, 145), "html", null, true);
            yield "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['user'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 147
        yield "                </datalist>
                <small style=\"color: var(--accent); margin-top: 5px; display: block;\">
                    💡 Astuce : Sélectionnez un email existant pour ajouter les droits Admin sans recréer le compte.
                </small>
            </div>

            <div class=\"row-2\">
                <div class=\"form-group-custom\">
                    <label>Prénom <span style=\"font-weight:normal; font-size:0.7em; color:var(--text-muted)\">(Uniquement si nouveau)</span></label>
                    <input type=\"text\" name=\"firstname\" placeholder=\"Ex: Jean\">
                </div>
                <div class=\"form-group-custom\">
                    <label>Nom <span style=\"font-weight:normal; font-size:0.7em; color:var(--text-muted)\">(Uniquement si nouveau)</span></label>
                    <input type=\"text\" name=\"lastname\" placeholder=\"Ex: Dupont\">
                </div>
            </div>

            <div class=\"form-group-custom\">
                <label>Mot de passe <span style=\"font-weight:normal; font-size:0.7em; color:var(--text-muted)\">(Uniquement si nouveau)</span></label>
                <input type=\"password\" name=\"password\" autocomplete=\"new-password\">
                <small style=\"color: var(--text-muted); font-size: 0.8rem; margin-top:5px; display:block;\">
                    Laissez vide si vous sélectionnez un utilisateur existant (son mot de passe actuel sera conservé).
                </small>
            </div>

            <div class=\"form-actions\">
                <a href=\"";
        // line 173
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_index");
        yield "\" class=\"btn-cancel\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\">Valider (Promouvoir ou Créer)</button>
            </div>
        </form>
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
        return "admin/user/new_admin.html.twig";
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
        return array (  286 => 173,  258 => 147,  245 => 145,  241 => 144,  225 => 130,  215 => 129,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Ajouter un Administrateur{% endblock %}

{% block stylesheets %}
<style>
    /* =================== PAGE STYLE (IDENTIQUE UTILISATEUR) =================== */
    .dashboard-container {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
    }

    /* Header */
    .page-header {
        margin-bottom: 2rem;
        border-bottom: 1px solid var(--border);
        padding-bottom: 1rem;
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

    /* Carte du formulaire */
    .form-card {
        background: var(--bg-light);
        border: 1px solid var(--border);
        border-radius: 4px;
        padding: 2rem;
    }

    /* Espacement des blocs */
    .form-group-custom {
        margin-bottom: 1.5rem;
    }

    /* Labels */
    label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text-main);
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Inputs */
    input[type=\"text\"],
    input[type=\"email\"],
    input[type=\"password\"] {
        width: 100%;
        background: var(--bg-darker);
        border: 1px solid var(--border);
        color: var(--text-main);
        padding: 0.7rem 1rem;
        border-radius: 4px;
        font-size: 0.95rem;
        outline: none;
        transition: border-color 0.2s;
        box-sizing: border-box;
    }

    input:focus {
        border-color: var(--accent);
    }

    /* Zone des Actions */
    .form-actions {
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border);
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }

    .btn-submit {
        background: var(--accent);
        color: #fff;
        padding: 0.7rem 1.5rem;
        border: none;
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
        font-size: 0.9rem;
        transition: background 0.2s;
    }
    .btn-submit:hover {
        background: var(--accent-hover);
    }

    .btn-cancel {
        background: transparent;
        border: 1px solid var(--border);
        color: var(--text-muted);
        padding: 0.7rem 1.5rem;
        border-radius: 4px;
        font-weight: 500;
        text-decoration: none;
        font-size: 0.9rem;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
    }
    .btn-cancel:hover {
        border-color: var(--text-muted);
        color: var(--text-main);
    }

    .row-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }
    @media(max-width: 700px) { .row-2 { grid-template-columns: 1fr; gap: 0; } }
</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    <div class=\"page-header\">
        <h1>Gestion des Administrateurs</h1>
        <p>Recherchez un utilisateur existant pour le promouvoir, ou remplissez tout pour en créer un nouveau.</p>
    </div>

    <div class=\"form-card\">
        <form method=\"POST\" autocomplete=\"off\">
            
            <div class=\"form-group-custom\">
                <label>Adresse Email ou Recherche Utilisateur</label>
                <input type=\"email\" name=\"email\" list=\"users_list\" placeholder=\"Commencez à taper un email...\" required>
                
                <datalist id=\"users_list\">
                    {% for user in users %}
                        <option value=\"{{ user.email }}\">{{ user.firstName }} {{ user.lastName }}</option>
                    {% endfor %}
                </datalist>
                <small style=\"color: var(--accent); margin-top: 5px; display: block;\">
                    💡 Astuce : Sélectionnez un email existant pour ajouter les droits Admin sans recréer le compte.
                </small>
            </div>

            <div class=\"row-2\">
                <div class=\"form-group-custom\">
                    <label>Prénom <span style=\"font-weight:normal; font-size:0.7em; color:var(--text-muted)\">(Uniquement si nouveau)</span></label>
                    <input type=\"text\" name=\"firstname\" placeholder=\"Ex: Jean\">
                </div>
                <div class=\"form-group-custom\">
                    <label>Nom <span style=\"font-weight:normal; font-size:0.7em; color:var(--text-muted)\">(Uniquement si nouveau)</span></label>
                    <input type=\"text\" name=\"lastname\" placeholder=\"Ex: Dupont\">
                </div>
            </div>

            <div class=\"form-group-custom\">
                <label>Mot de passe <span style=\"font-weight:normal; font-size:0.7em; color:var(--text-muted)\">(Uniquement si nouveau)</span></label>
                <input type=\"password\" name=\"password\" autocomplete=\"new-password\">
                <small style=\"color: var(--text-muted); font-size: 0.8rem; margin-top:5px; display:block;\">
                    Laissez vide si vous sélectionnez un utilisateur existant (son mot de passe actuel sera conservé).
                </small>
            </div>

            <div class=\"form-actions\">
                <a href=\"{{ path('admin_users_index') }}\" class=\"btn-cancel\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\">Valider (Promouvoir ou Créer)</button>
            </div>
        </form>
    </div>
</div>
{% endblock %}", "admin/user/new_admin.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/user/new_admin.html.twig");
    }
}
