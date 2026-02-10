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

/* @SchebTwoFactor/Authentication/form.html.twig */
class __TwigTemplate_509f9c36e2e9d3982c8c7fe46d9978df extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SchebTwoFactor/Authentication/form.html.twig"));

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

        yield "Vérification 2FA";
        
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
        yield "    ";
        // line 7
        yield "    <style>
        .auth-overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100vh;
            background: var(--bg-darker); /* Fond sombre */
            display: flex; justify-content: center; align-items: center;
            z-index: 1000;
        }

        .auth-card {
            background: var(--bg-light);
            width: 100%; max-width: 420px;
            padding: 40px;
            border-radius: 16px;
            border: 1px solid var(--border);
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            text-align: center;
        }

        .icon-circle {
            width: 60px; height: 60px;
            background: rgba(255, 102, 0, 0.1); /* Couleur accent légère */
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 20px auto;
        }
        .icon-circle svg { stroke: var(--accent); width: 30px; height: 30px; }

        .auth-title { font-size: 1.5rem; color: var(--text-main); font-weight: 700; margin-bottom: 10px; }
        .auth-desc { color: var(--text-muted); font-size: 0.95rem; line-height: 1.5; margin-bottom: 30px; }

        .code-input {
            width: 100%;
            background: var(--bg-darker);
            border: 2px solid var(--border);
            color: var(--text-main);
            font-size: 2rem;
            text-align: center;
            letter-spacing: 8px;
            padding: 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-family: monospace; /* Pour aligner les chiffres */
            outline: none;
        }

        .code-input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(255, 102, 0, 0.1);
        }

        .error-message {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            padding: 10px;
            border-radius: 6px;
            font-size: 0.9rem;
            margin-top: 15px;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }

        .actions { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-top: 30px; }

        .btn {
            padding: 12px; border-radius: 8px; font-weight: 600; cursor: pointer;
            text-decoration: none; display: flex; align-items: center; justify-content: center;
            font-size: 0.95rem; transition: transform 0.2s; border: none;
        }
        .btn:active { transform: scale(0.98); }

        .btn-primary { background: var(--accent); color: white; }
        .btn-primary:hover { filter: brightness(1.1); }

        .btn-secondary { background: transparent; border: 1px solid var(--border); color: var(--text-muted); }
        .btn-secondary:hover { border-color: var(--text-muted); color: var(--text-main); }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 84
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 85
        yield "<div class=\"auth-overlay\">
    <div class=\"auth-card\">
        
        ";
        // line 89
        yield "        <div class=\"icon-circle\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\">
                <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z\" />
            </svg>
        </div>

        <h1 class=\"auth-title\">Double Authentification</h1>
        <p class=\"auth-desc\">
            Pour accéder à l'administration, veuillez saisir le code temporaire généré par votre application mobile.
        </p>

        <form class=\"form\" action=\"";
        // line 100
        yield (((($tmp = (isset($context["checkPathUrl"]) || array_key_exists("checkPathUrl", $context) ? $context["checkPathUrl"] : (function () { throw new RuntimeError('Variable "checkPathUrl" does not exist.', 100, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["checkPathUrl"]) || array_key_exists("checkPathUrl", $context) ? $context["checkPathUrl"] : (function () { throw new RuntimeError('Variable "checkPathUrl" does not exist.', 100, $this->source); })()), "html", null, true)) : ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["checkPathRoute"]) || array_key_exists("checkPathRoute", $context) ? $context["checkPathRoute"] : (function () { throw new RuntimeError('Variable "checkPathRoute" does not exist.', 100, $this->source); })()))));
        yield "\" method=\"post\">
            
            <div style=\"position: relative;\">
                <input 
                    id=\"auth_code\" 
                    type=\"text\" 
                    name=\"";
        // line 106
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["authCodeParameterName"]) || array_key_exists("authCodeParameterName", $context) ? $context["authCodeParameterName"] : (function () { throw new RuntimeError('Variable "authCodeParameterName" does not exist.', 106, $this->source); })()), "html", null, true);
        yield "\" 
                    class=\"code-input\"
                    autocomplete=\"one-time-code\" 
                    inputmode=\"numeric\" 
                    pattern=\"[0-9]*\"
                    autofocus
                    required
                    placeholder=\"000 000\"
                />
            </div>

            ";
        // line 117
        if ((($tmp = (isset($context["authenticationError"]) || array_key_exists("authenticationError", $context) ? $context["authenticationError"] : (function () { throw new RuntimeError('Variable "authenticationError" does not exist.', 117, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 118
            yield "                <div class=\"error-message\">
                    <svg style=\"width:16px; height:16px;\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z\" /></svg>
                    ";
            // line 120
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["authenticationError"]) || array_key_exists("authenticationError", $context) ? $context["authenticationError"] : (function () { throw new RuntimeError('Variable "authenticationError" does not exist.', 120, $this->source); })()), (isset($context["authenticationErrorData"]) || array_key_exists("authenticationErrorData", $context) ? $context["authenticationErrorData"] : (function () { throw new RuntimeError('Variable "authenticationErrorData" does not exist.', 120, $this->source); })()), "SchebTwoFactorBundle"), "html", null, true);
            yield "
                </div>
            ";
        }
        // line 123
        yield "
            <div class=\"actions\">
                ";
        // line 126
        yield "                <a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" class=\"btn btn-secondary\">
                    Annuler
                </a>
                
                ";
        // line 131
        yield "                <button type=\"submit\" class=\"btn btn-primary\">
                    Vérifier
                </button>
            </div>

            ";
        // line 137
        yield "            ";
        if ((array_key_exists("csrfToken", $context) && (isset($context["csrfToken"]) || array_key_exists("csrfToken", $context) ? $context["csrfToken"] : (function () { throw new RuntimeError('Variable "csrfToken" does not exist.', 137, $this->source); })()))) {
            // line 138
            yield "                <input type=\"hidden\" name=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["csrfParameterName"]) || array_key_exists("csrfParameterName", $context) ? $context["csrfParameterName"] : (function () { throw new RuntimeError('Variable "csrfParameterName" does not exist.', 138, $this->source); })()), "html", null, true);
            yield "\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["csrfToken"]) || array_key_exists("csrfToken", $context) ? $context["csrfToken"] : (function () { throw new RuntimeError('Variable "csrfToken" does not exist.', 138, $this->source); })()), "html", null, true);
            yield "\" />
            ";
        }
        // line 140
        yield "            
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
        return "@SchebTwoFactor/Authentication/form.html.twig";
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
        return array (  264 => 140,  256 => 138,  253 => 137,  246 => 131,  238 => 126,  234 => 123,  228 => 120,  224 => 118,  222 => 117,  208 => 106,  199 => 100,  186 => 89,  181 => 85,  171 => 84,  88 => 7,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Vérification 2FA{% endblock %}

{% block stylesheets %}
    {# On peut inclure le CSS directement ici pour que cette page soit autonome #}
    <style>
        .auth-overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100vh;
            background: var(--bg-darker); /* Fond sombre */
            display: flex; justify-content: center; align-items: center;
            z-index: 1000;
        }

        .auth-card {
            background: var(--bg-light);
            width: 100%; max-width: 420px;
            padding: 40px;
            border-radius: 16px;
            border: 1px solid var(--border);
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            text-align: center;
        }

        .icon-circle {
            width: 60px; height: 60px;
            background: rgba(255, 102, 0, 0.1); /* Couleur accent légère */
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 20px auto;
        }
        .icon-circle svg { stroke: var(--accent); width: 30px; height: 30px; }

        .auth-title { font-size: 1.5rem; color: var(--text-main); font-weight: 700; margin-bottom: 10px; }
        .auth-desc { color: var(--text-muted); font-size: 0.95rem; line-height: 1.5; margin-bottom: 30px; }

        .code-input {
            width: 100%;
            background: var(--bg-darker);
            border: 2px solid var(--border);
            color: var(--text-main);
            font-size: 2rem;
            text-align: center;
            letter-spacing: 8px;
            padding: 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-family: monospace; /* Pour aligner les chiffres */
            outline: none;
        }

        .code-input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(255, 102, 0, 0.1);
        }

        .error-message {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            padding: 10px;
            border-radius: 6px;
            font-size: 0.9rem;
            margin-top: 15px;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }

        .actions { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-top: 30px; }

        .btn {
            padding: 12px; border-radius: 8px; font-weight: 600; cursor: pointer;
            text-decoration: none; display: flex; align-items: center; justify-content: center;
            font-size: 0.95rem; transition: transform 0.2s; border: none;
        }
        .btn:active { transform: scale(0.98); }

        .btn-primary { background: var(--accent); color: white; }
        .btn-primary:hover { filter: brightness(1.1); }

        .btn-secondary { background: transparent; border: 1px solid var(--border); color: var(--text-muted); }
        .btn-secondary:hover { border-color: var(--text-muted); color: var(--text-main); }
    </style>
{% endblock %}

{% block body %}
<div class=\"auth-overlay\">
    <div class=\"auth-card\">
        
        {# Icône de sécurité SVG #}
        <div class=\"icon-circle\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\">
                <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z\" />
            </svg>
        </div>

        <h1 class=\"auth-title\">Double Authentification</h1>
        <p class=\"auth-desc\">
            Pour accéder à l'administration, veuillez saisir le code temporaire généré par votre application mobile.
        </p>

        <form class=\"form\" action=\"{{ checkPathUrl ? checkPathUrl : path(checkPathRoute) }}\" method=\"post\">
            
            <div style=\"position: relative;\">
                <input 
                    id=\"auth_code\" 
                    type=\"text\" 
                    name=\"{{ authCodeParameterName }}\" 
                    class=\"code-input\"
                    autocomplete=\"one-time-code\" 
                    inputmode=\"numeric\" 
                    pattern=\"[0-9]*\"
                    autofocus
                    required
                    placeholder=\"000 000\"
                />
            </div>

            {% if authenticationError %}
                <div class=\"error-message\">
                    <svg style=\"width:16px; height:16px;\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z\" /></svg>
                    {{ authenticationError|trans(authenticationErrorData, 'SchebTwoFactorBundle') }}
                </div>
            {% endif %}

            <div class=\"actions\">
                {# Bouton Annuler #}
                <a href=\"{{ path('app_logout') }}\" class=\"btn btn-secondary\">
                    Annuler
                </a>
                
                {# Bouton Valider #}
                <button type=\"submit\" class=\"btn btn-primary\">
                    Vérifier
                </button>
            </div>

            {# Gestion sécurisée du CSRF Token #}
            {% if csrfToken is defined and csrfToken %}
                <input type=\"hidden\" name=\"{{ csrfParameterName }}\" value=\"{{ csrfToken }}\" />
            {% endif %}
            
        </form>
    </div>
</div>
{% endblock %}", "@SchebTwoFactor/Authentication/form.html.twig", "/Users/dheillyenzo/projet-chm/templates/bundles/SchebTwoFactorBundle/Authentication/form.html.twig");
    }
}
