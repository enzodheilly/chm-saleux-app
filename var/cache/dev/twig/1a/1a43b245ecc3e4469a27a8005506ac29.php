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

/* admin/event/event_pending.html.twig */
class __TwigTemplate_c514c68dce08ca47cbe0ae9b270e792a extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/event/event_pending.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Inscription confirmée</title>
    <style>
        /* Variables cohérentes avec l'admin */
        :root {
            --bg-dark: #0e0e10;
            --bg-card: #141416;
            --text-main: #e5e7eb;
            --text-muted: #9ca3af;
            --accent: #ff6600;
            --accent-hover: #e25500;
            --border: #2a2a2d;
            --success: #22c55e;
        }

        /* Reset & Base */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: \"Inter\", system-ui, sans-serif; }
        
        body {
            background-color: var(--bg-dark);
            color: var(--text-main);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        /* Card */
        .confirmation-card {
            background-color: var(--bg-card);
            padding: 3rem 2.5rem;
            border-radius: 8px; /* Coins moins ronds = plus pro */
            border: 1px solid var(--border);
            text-align: center;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            animation: fadeIn 0.5s ease-out forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Icon SVG */
        .icon-box {
            width: 60px; height: 60px;
            background: rgba(34, 197, 94, 0.1);
            color: var(--success);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.5rem auto;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }
        .icon-box svg { width: 30px; height: 30px; stroke-width: 3; }

        /* Typography */
        h1 { font-size: 1.5rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--text-main); letter-spacing: -0.5px; }
        p { font-size: 0.95rem; color: var(--text-muted); margin-bottom: 2rem; line-height: 1.5; }
        strong { color: var(--text-main); font-weight: 600; }

        /* Button */
        .btn-return {
            display: inline-block;
            width: 100%;
            padding: 0.8rem 1.5rem;
            background: var(--accent);
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: background 0.2s;
        }
        .btn-return:hover { background: var(--accent-hover); }

    </style>
</head>
<body>
    <div class=\"confirmation-card\">
        <div class=\"icon-box\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M4.5 12.75l6 6 9-13.5\" />
            </svg>
        </div>
        
        <h1>Inscription réussie</h1>
        
        <p>
            Votre participation à l'événement<br>
            <strong>";
        // line 97
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["eventName"]) || array_key_exists("eventName", $context) ? $context["eventName"] : (function () { throw new RuntimeError('Variable "eventName" does not exist.', 97, $this->source); })()), "html", null, true);
        yield "</strong> a bien été enregistrée.
        </p>
        
        <a href=\"/espace-adherent\" class=\"btn-return\">Retour à l'espace membre</a>
    </div>
</body>
</html>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/event/event_pending.html.twig";
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
        return array (  143 => 97,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Inscription confirmée</title>
    <style>
        /* Variables cohérentes avec l'admin */
        :root {
            --bg-dark: #0e0e10;
            --bg-card: #141416;
            --text-main: #e5e7eb;
            --text-muted: #9ca3af;
            --accent: #ff6600;
            --accent-hover: #e25500;
            --border: #2a2a2d;
            --success: #22c55e;
        }

        /* Reset & Base */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: \"Inter\", system-ui, sans-serif; }
        
        body {
            background-color: var(--bg-dark);
            color: var(--text-main);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        /* Card */
        .confirmation-card {
            background-color: var(--bg-card);
            padding: 3rem 2.5rem;
            border-radius: 8px; /* Coins moins ronds = plus pro */
            border: 1px solid var(--border);
            text-align: center;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            animation: fadeIn 0.5s ease-out forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Icon SVG */
        .icon-box {
            width: 60px; height: 60px;
            background: rgba(34, 197, 94, 0.1);
            color: var(--success);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.5rem auto;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }
        .icon-box svg { width: 30px; height: 30px; stroke-width: 3; }

        /* Typography */
        h1 { font-size: 1.5rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--text-main); letter-spacing: -0.5px; }
        p { font-size: 0.95rem; color: var(--text-muted); margin-bottom: 2rem; line-height: 1.5; }
        strong { color: var(--text-main); font-weight: 600; }

        /* Button */
        .btn-return {
            display: inline-block;
            width: 100%;
            padding: 0.8rem 1.5rem;
            background: var(--accent);
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: background 0.2s;
        }
        .btn-return:hover { background: var(--accent-hover); }

    </style>
</head>
<body>
    <div class=\"confirmation-card\">
        <div class=\"icon-box\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M4.5 12.75l6 6 9-13.5\" />
            </svg>
        </div>
        
        <h1>Inscription réussie</h1>
        
        <p>
            Votre participation à l'événement<br>
            <strong>{{ eventName }}</strong> a bien été enregistrée.
        </p>
        
        <a href=\"/espace-adherent\" class=\"btn-return\">Retour à l'espace membre</a>
    </div>
</body>
</html>", "admin/event/event_pending.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/event/event_pending.html.twig");
    }
}
