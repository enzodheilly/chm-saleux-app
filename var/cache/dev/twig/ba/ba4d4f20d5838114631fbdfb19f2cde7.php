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

/* emails/confirm.html.twig */
class __TwigTemplate_c3ec0815e525bc28ee40380cfa1b1cf7 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/confirm.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Confirmation d’inscription à la newsletter</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <style type=\"text/css\">
        /* Ajustement des titres sur mobile */
        @media only screen and (max-width: 480px) {
            h2 { font-size: 18px !important; }
        }
    </style>
</head>
<body style=\"font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; margin:0;\">

    <div style=\"background: #ffffff; border-radius: 10px; padding: 30px 25px; max-width: 500px; margin: auto; box-shadow: 0 4px 12px rgba(0,0,0,0.1); line-height:1.6; text-align:center;\">

        <!-- Logo en haut -->
        <div style=\"margin-bottom:25px;\">
            <img src=\"https://ci3.googleusercontent.com/meips/ADKq_Nbd-OO8ZyUb6y2eeEHHSnVNdD2OPlmRJ_-HTGO0-Ump5s5dUXnE9gdclGpgAR9ndxvIE9_5DgHlnLfg97JJ-4j3-3HkdOA-7QBH5p82gzZ78OTe1nWhGd5rwuFtGmBqQs-fpbiGtaJVNt3alIOQCy0RUg=s0-d-e1-ft#https://raw.githubusercontent.com/enzodheilly/projet-chm/main/public/images/favicon/icon.png\" 
                 alt=\"CHM Saleux Logo\" 
                 style=\"max-width: 60px; width: 100%; height: auto;\">
        </div>

<!-- Bande de titre avec fond -->
<div style=\"background-color: #005b94; border-radius: 10px 10px 0 0; padding: 15px 20px; margin-bottom: 20px;\">
    <h2 style=\"color: #ffffff; margin:0; font-size:22px; line-height:1.4;\">
        Confirmation d’inscription à la newsletter
    </h2>
</div>

        <p style=\"margin-bottom:15px;\">
            Bonjour";
        // line 33
        yield (((array_key_exists("subscriber", $context) && (isset($context["subscriber"]) || array_key_exists("subscriber", $context) ? $context["subscriber"] : (function () { throw new RuntimeError('Variable "subscriber" does not exist.', 33, $this->source); })()))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((" " . (((CoreExtension::getAttribute($this->env, $this->source, ($context["subscriber"] ?? null), "getFirstname", [], "method", true, true, false, 33) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["subscriber"]) || array_key_exists("subscriber", $context) ? $context["subscriber"] : (function () { throw new RuntimeError('Variable "subscriber" does not exist.', 33, $this->source); })()), "getFirstname", [], "method", false, false, false, 33)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["subscriber"]) || array_key_exists("subscriber", $context) ? $context["subscriber"] : (function () { throw new RuntimeError('Variable "subscriber" does not exist.', 33, $this->source); })()), "getFirstname", [], "method", false, false, false, 33)) : (""))), "html", null, true)) : (""));
        yield ",
        </p>

        <p style=\"margin-bottom:20px;\">
            Merci de vous être inscrit à notre newsletter !  
            Pour confirmer votre inscription, cliquez sur le bouton ci-dessous :
        </p>

        <div style=\"margin-bottom:25px;\">
            <a href=\"";
        // line 42
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["confirmUrl"]) || array_key_exists("confirmUrl", $context) ? $context["confirmUrl"] : (function () { throw new RuntimeError('Variable "confirmUrl" does not exist.', 42, $this->source); })()), "html", null, true);
        yield "\" 
               style=\"display:inline-block; background-color:#005b94; color:white;
                      padding:10px 18px; text-decoration:none; border-radius:6px;
                      font-weight:bold; font-size:14px; letter-spacing:0.5px; text-transform:uppercase; min-width:180px;\">
                Confirmer mon inscription
            </a>
        </div>

        <p style=\"font-size: 0.9rem; color: #555; margin-bottom:25px;\">
            Si vous n’avez pas demandé cette inscription, ignorez simplement cet e-mail.
        </p>

        <hr style=\"border:none; border-top:1px solid #ddd; margin:25px 0;\">

        <p style=\"font-size:13px; color:#666; line-height:1.5;\">
            <strong>CHM SALEUX</strong><br>
            8 rue Max Dormoy – Complexe multisports de la Grenouillère – 80480 Saleux<br>
            Siège social : 79 rue Roger Salengro – 80480 Saleux<br>
            Tél : 03.22.89.72.57 • Email : chm.saleux@orange.fr<br>
            Agréé Jeunesse et Sports – Association loi 1901<br><br>
            Vous recevez cet e-mail car vous êtes abonné à la newsletter du CHM Saleux.<br>
            <a href=\"";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["subscriber"]) || array_key_exists("subscriber", $context) ? $context["subscriber"] : (function () { throw new RuntimeError('Variable "subscriber" does not exist.', 63, $this->source); })()), "getUnsubscribeUrl", [], "method", false, false, false, 63), "html", null, true);
        yield "\" style=\"color:#ff4444 !important;\">Se désabonner</a>
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
        return "emails/confirm.html.twig";
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
        return array (  115 => 63,  91 => 42,  79 => 33,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Confirmation d’inscription à la newsletter</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <style type=\"text/css\">
        /* Ajustement des titres sur mobile */
        @media only screen and (max-width: 480px) {
            h2 { font-size: 18px !important; }
        }
    </style>
</head>
<body style=\"font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; margin:0;\">

    <div style=\"background: #ffffff; border-radius: 10px; padding: 30px 25px; max-width: 500px; margin: auto; box-shadow: 0 4px 12px rgba(0,0,0,0.1); line-height:1.6; text-align:center;\">

        <!-- Logo en haut -->
        <div style=\"margin-bottom:25px;\">
            <img src=\"https://ci3.googleusercontent.com/meips/ADKq_Nbd-OO8ZyUb6y2eeEHHSnVNdD2OPlmRJ_-HTGO0-Ump5s5dUXnE9gdclGpgAR9ndxvIE9_5DgHlnLfg97JJ-4j3-3HkdOA-7QBH5p82gzZ78OTe1nWhGd5rwuFtGmBqQs-fpbiGtaJVNt3alIOQCy0RUg=s0-d-e1-ft#https://raw.githubusercontent.com/enzodheilly/projet-chm/main/public/images/favicon/icon.png\" 
                 alt=\"CHM Saleux Logo\" 
                 style=\"max-width: 60px; width: 100%; height: auto;\">
        </div>

<!-- Bande de titre avec fond -->
<div style=\"background-color: #005b94; border-radius: 10px 10px 0 0; padding: 15px 20px; margin-bottom: 20px;\">
    <h2 style=\"color: #ffffff; margin:0; font-size:22px; line-height:1.4;\">
        Confirmation d’inscription à la newsletter
    </h2>
</div>

        <p style=\"margin-bottom:15px;\">
            Bonjour{{ subscriber is defined and subscriber ? ' ' ~ (subscriber.getFirstname() ?? '') : '' }},
        </p>

        <p style=\"margin-bottom:20px;\">
            Merci de vous être inscrit à notre newsletter !  
            Pour confirmer votre inscription, cliquez sur le bouton ci-dessous :
        </p>

        <div style=\"margin-bottom:25px;\">
            <a href=\"{{ confirmUrl }}\" 
               style=\"display:inline-block; background-color:#005b94; color:white;
                      padding:10px 18px; text-decoration:none; border-radius:6px;
                      font-weight:bold; font-size:14px; letter-spacing:0.5px; text-transform:uppercase; min-width:180px;\">
                Confirmer mon inscription
            </a>
        </div>

        <p style=\"font-size: 0.9rem; color: #555; margin-bottom:25px;\">
            Si vous n’avez pas demandé cette inscription, ignorez simplement cet e-mail.
        </p>

        <hr style=\"border:none; border-top:1px solid #ddd; margin:25px 0;\">

        <p style=\"font-size:13px; color:#666; line-height:1.5;\">
            <strong>CHM SALEUX</strong><br>
            8 rue Max Dormoy – Complexe multisports de la Grenouillère – 80480 Saleux<br>
            Siège social : 79 rue Roger Salengro – 80480 Saleux<br>
            Tél : 03.22.89.72.57 • Email : chm.saleux@orange.fr<br>
            Agréé Jeunesse et Sports – Association loi 1901<br><br>
            Vous recevez cet e-mail car vous êtes abonné à la newsletter du CHM Saleux.<br>
            <a href=\"{{ subscriber.getUnsubscribeUrl() }}\" style=\"color:#ff4444 !important;\">Se désabonner</a>
        </p>

    </div>

</body>
</html>
", "emails/confirm.html.twig", "/Users/dheillyenzo/projet-chm/templates/emails/confirm.html.twig");
    }
}
