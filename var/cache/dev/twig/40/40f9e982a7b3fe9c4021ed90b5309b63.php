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

/* emails/licence_code.html.twig */
class __TwigTemplate_b4d82b9ffc9c45ceecf3dc4ac37df6f3 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/licence_code.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Code de confirmation</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <style>
        /* Media Query pour mobile */
        @media only screen and (max-width: 480px) {
            h2 { font-size: 18px !important; }
            h1 { font-size: 28px !important; letter-spacing: 3px !important; }
        }
    </style>
</head>
<body style=\"font-family: Arial, sans-serif; background-color: #f9f9f9; padding:20px; margin:0;\">

<div style=\"background: #ffffff; border-radius: 10px; padding: 25px 20px; max-width: 500px; margin:auto; box-shadow:0 4px 12px rgba(0,0,0,0.1); line-height:1.6; text-align:center;\">

    <!-- Logos -->
         <div style=\"margin-bottom:25px;\">
            <img src=\"";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/favicon/icon.png"), "html", null, true);
        yield "\" 
                 alt=\"CHM Saleux Logo\" 
                 style=\"max-width: 60px; width: 100%; height: auto;\">
        </div>

    <!-- Bande titre bleu -->
    <div style=\"background-color: #005b94; border-radius: 10px 10px 0 0; padding: 15px 20px; margin-bottom: 20px;\">
        <h2 style=\"color: #ffffff; margin:0; font-size:22px; line-height:1.4;\">
            Voici ton code de confirmation 👇
        </h2>
    </div>

    <p style=\"margin-bottom:15px;\">Bonjour ";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["firstName"]) || array_key_exists("firstName", $context) ? $context["firstName"] : (function () { throw new RuntimeError('Variable "firstName" does not exist.', 33, $this->source); })()), "html", null, true);
        yield ",</p>

    <p style=\"margin-bottom:15px;\">Ton code de vérification est :</p>

    <!-- Code en évidence -->
    <h1 style=\"font-size:32px; letter-spacing:4px; color:#2563eb; margin:20px 0;\">
        ";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["code"]) || array_key_exists("code", $context) ? $context["code"] : (function () { throw new RuntimeError('Variable "code" does not exist.', 39, $this->source); })()), "html", null, true);
        yield "
    </h1>

    <p style=\"margin-bottom:10px;\">Ce code est valable pendant 15 minutes</p>
    <p style=\"margin-bottom:25px;\">Ne le partage à personne.</p>

    <hr style=\"border:none; border-top:1px solid #ddd; margin:25px 0;\">

    <p style=\"font-size:13px; color:#666; text-align:center; line-height:1.5;\">
        <strong>CHM SALEUX</strong><br>
        8 rue Max Dormoy – Complexe multisports de la Grenouillère – 80480 Saleux<br>
        Siège social : 79 rue Roger Salengro – 80480 Saleux<br>
        Tél : 03.22.89.72.57 • Email : chm.saleux@orange.fr<br>
        Agréé Jeunesse et Sports – Association loi 1901<br><br>
        Vous recevez cet e-mail car vous êtes inscrit au Club Haltéro.
    </p>

</div>

</body>
</html>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "emails/licence_code.html.twig";
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
        return array (  91 => 39,  82 => 33,  67 => 21,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Code de confirmation</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <style>
        /* Media Query pour mobile */
        @media only screen and (max-width: 480px) {
            h2 { font-size: 18px !important; }
            h1 { font-size: 28px !important; letter-spacing: 3px !important; }
        }
    </style>
</head>
<body style=\"font-family: Arial, sans-serif; background-color: #f9f9f9; padding:20px; margin:0;\">

<div style=\"background: #ffffff; border-radius: 10px; padding: 25px 20px; max-width: 500px; margin:auto; box-shadow:0 4px 12px rgba(0,0,0,0.1); line-height:1.6; text-align:center;\">

    <!-- Logos -->
         <div style=\"margin-bottom:25px;\">
            <img src=\"{{ asset('images/favicon/icon.png') }}\" 
                 alt=\"CHM Saleux Logo\" 
                 style=\"max-width: 60px; width: 100%; height: auto;\">
        </div>

    <!-- Bande titre bleu -->
    <div style=\"background-color: #005b94; border-radius: 10px 10px 0 0; padding: 15px 20px; margin-bottom: 20px;\">
        <h2 style=\"color: #ffffff; margin:0; font-size:22px; line-height:1.4;\">
            Voici ton code de confirmation 👇
        </h2>
    </div>

    <p style=\"margin-bottom:15px;\">Bonjour {{ firstName }},</p>

    <p style=\"margin-bottom:15px;\">Ton code de vérification est :</p>

    <!-- Code en évidence -->
    <h1 style=\"font-size:32px; letter-spacing:4px; color:#2563eb; margin:20px 0;\">
        {{ code }}
    </h1>

    <p style=\"margin-bottom:10px;\">Ce code est valable pendant 15 minutes</p>
    <p style=\"margin-bottom:25px;\">Ne le partage à personne.</p>

    <hr style=\"border:none; border-top:1px solid #ddd; margin:25px 0;\">

    <p style=\"font-size:13px; color:#666; text-align:center; line-height:1.5;\">
        <strong>CHM SALEUX</strong><br>
        8 rue Max Dormoy – Complexe multisports de la Grenouillère – 80480 Saleux<br>
        Siège social : 79 rue Roger Salengro – 80480 Saleux<br>
        Tél : 03.22.89.72.57 • Email : chm.saleux@orange.fr<br>
        Agréé Jeunesse et Sports – Association loi 1901<br><br>
        Vous recevez cet e-mail car vous êtes inscrit au Club Haltéro.
    </p>

</div>

</body>
</html>
", "emails/licence_code.html.twig", "/Users/dheillyenzo/projet-chm/templates/emails/licence_code.html.twig");
    }
}
