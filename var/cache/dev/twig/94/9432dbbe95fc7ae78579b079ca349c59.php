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

/* security/2fa_login.html.twig */
class __TwigTemplate_10d70b49b54a56625a525e9e9036a83c extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/2fa_login.html.twig"));

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

        yield "Double Authentification";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "<div style=\"display: flex; justify-content: center; align-items: center; height: 80vh;\">
    <div class=\"form-card\" style=\"width: 100%; max-width: 400px; text-align: center;\">
        <h2 style=\"color: var(--accent); margin-bottom: 1rem;\">🔐 Vérification de sécurité</h2>
        <p style=\"color: var(--text-muted); margin-bottom: 2rem;\">
            Veuillez entrer le code à 6 chiffres de votre application Google Authenticator.
        </p>

        ";
        // line 14
        yield "        <form class=\"form\" action=\"";
        yield (((($tmp = (isset($context["checkPathUrl"]) || array_key_exists("checkPathUrl", $context) ? $context["checkPathUrl"] : (function () { throw new RuntimeError('Variable "checkPathUrl" does not exist.', 14, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["checkPathUrl"]) || array_key_exists("checkPathUrl", $context) ? $context["checkPathUrl"] : (function () { throw new RuntimeError('Variable "checkPathUrl" does not exist.', 14, $this->source); })()), "html", null, true)) : ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["checkPathRoute"]) || array_key_exists("checkPathRoute", $context) ? $context["checkPathRoute"] : (function () { throw new RuntimeError('Variable "checkPathRoute" does not exist.', 14, $this->source); })()))));
        yield "\" method=\"post\">
            
            <div style=\"margin-bottom: 20px;\">
                <input 
                    id=\"auth_code\" 
                    type=\"text\" 
                    name=\"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["authCodeParameterName"]) || array_key_exists("authCodeParameterName", $context) ? $context["authCodeParameterName"] : (function () { throw new RuntimeError('Variable "authCodeParameterName" does not exist.', 20, $this->source); })()), "html", null, true);
        yield "\" 
                    autocomplete=\"one-time-code\" 
                    autofocus
                    placeholder=\"000 000\"
                    style=\"font-size: 1.5rem; text-align: center; letter-spacing: 5px; padding: 10px; width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: white; border-radius: 5px;\"
                />
            </div>

            ";
        // line 28
        if ((($tmp = (isset($context["authenticationError"]) || array_key_exists("authenticationError", $context) ? $context["authenticationError"] : (function () { throw new RuntimeError('Variable "authenticationError" does not exist.', 28, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 29
            yield "                <div style=\"color: #ef4444; margin-bottom: 15px;\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["authenticationError"]) || array_key_exists("authenticationError", $context) ? $context["authenticationError"] : (function () { throw new RuntimeError('Variable "authenticationError" does not exist.', 29, $this->source); })()), (isset($context["authenticationErrorData"]) || array_key_exists("authenticationErrorData", $context) ? $context["authenticationErrorData"] : (function () { throw new RuntimeError('Variable "authenticationErrorData" does not exist.', 29, $this->source); })()), "SchebTwoFactorBundle"), "html", null, true);
            yield "</div>
            ";
        }
        // line 31
        yield "
            <div style=\"display: flex; gap: 10px;\">
                <a href=\"";
        // line 33
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" class=\"btn-cancel\" style=\"flex:1; justify-content: center;\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\" style=\"flex:1;\">Vérifier</button>
            </div>

            ";
        // line 38
        yield "            ";
        if ((($tmp = (isset($context["csrf_token"]) || array_key_exists("csrf_token", $context) ? $context["csrf_token"] : (function () { throw new RuntimeError('Variable "csrf_token" does not exist.', 38, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 39
            yield "                <input type=\"hidden\" name=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["csrfParameterName"]) || array_key_exists("csrfParameterName", $context) ? $context["csrfParameterName"] : (function () { throw new RuntimeError('Variable "csrfParameterName" does not exist.', 39, $this->source); })()), "html", null, true);
            yield "\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["csrf_token"]) || array_key_exists("csrf_token", $context) ? $context["csrf_token"] : (function () { throw new RuntimeError('Variable "csrf_token" does not exist.', 39, $this->source); })()), "html", null, true);
            yield "\" />
            ";
        }
        // line 41
        yield "        </form>
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
        return "security/2fa_login.html.twig";
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
        return array (  145 => 41,  137 => 39,  134 => 38,  127 => 33,  123 => 31,  117 => 29,  115 => 28,  104 => 20,  94 => 14,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Double Authentification{% endblock %}

{% block body %}
<div style=\"display: flex; justify-content: center; align-items: center; height: 80vh;\">
    <div class=\"form-card\" style=\"width: 100%; max-width: 400px; text-align: center;\">
        <h2 style=\"color: var(--accent); margin-bottom: 1rem;\">🔐 Vérification de sécurité</h2>
        <p style=\"color: var(--text-muted); margin-bottom: 2rem;\">
            Veuillez entrer le code à 6 chiffres de votre application Google Authenticator.
        </p>

        {# Le formulaire généré par le bundle #}
        <form class=\"form\" action=\"{{ checkPathUrl ? checkPathUrl : path(checkPathRoute) }}\" method=\"post\">
            
            <div style=\"margin-bottom: 20px;\">
                <input 
                    id=\"auth_code\" 
                    type=\"text\" 
                    name=\"{{ authCodeParameterName }}\" 
                    autocomplete=\"one-time-code\" 
                    autofocus
                    placeholder=\"000 000\"
                    style=\"font-size: 1.5rem; text-align: center; letter-spacing: 5px; padding: 10px; width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: white; border-radius: 5px;\"
                />
            </div>

            {% if authenticationError %}
                <div style=\"color: #ef4444; margin-bottom: 15px;\">{{ authenticationError|trans(authenticationErrorData, 'SchebTwoFactorBundle') }}</div>
            {% endif %}

            <div style=\"display: flex; gap: 10px;\">
                <a href=\"{{ path('app_logout') }}\" class=\"btn-cancel\" style=\"flex:1; justify-content: center;\">Annuler</a>
                <button type=\"submit\" class=\"btn-submit\" style=\"flex:1;\">Vérifier</button>
            </div>

            {# Token CSRF requis #}
            {% if csrf_token %}
                <input type=\"hidden\" name=\"{{ csrfParameterName }}\" value=\"{{ csrf_token }}\" />
            {% endif %}
        </form>
    </div>
</div>
{% endblock %}", "security/2fa_login.html.twig", "/Users/dheillyenzo/projet-chm/templates/security/2fa_login.html.twig");
    }
}
