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

/* emails/event_pending.html.twig */
class __TwigTemplate_6bf261ec0a4971058cc6c865a5e4016f extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/event_pending.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Confirmation d'inscription</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

        <style type=\"text/css\">
        /* Ajustement titres sur mobile */
        @media only screen and (max-width: 480px) {
            h2 { font-size: 18px !important; }
            h3 { font-size: 18px !important; }
        }
    </style>

</head>
<body style=\"font-family: Arial, sans-serif; background-color: #f9f9f9; margin:0; padding:20px;\">

    <div style=\"background: #ffffff; border-radius: 10px; padding: 30px 25px; max-width: 500px; margin: auto; box-shadow: 0 4px 12px rgba(0,0,0,0.1); line-height:1.6; text-align:center;\">

         <div style=\"margin-bottom:25px;\">
            <img src=\"https://ci3.googleusercontent.com/meips/ADKq_Nbd-OO8ZyUb6y2eeEHHSnVNdD2OPlmRJ_-HTGO0-Ump5s5dUXnE9gdclGpgAR9ndxvIE9_5DgHlnLfg97JJ-4j3-3HkdOA-7QBH5p82gzZ78OTe1nWhGd5rwuFtGmBqQs-fpbiGtaJVNt3alIOQCy0RUg=s0-d-e1-ft#https://raw.githubusercontent.com/enzodheilly/projet-chm/main/public/images/favicon/icon.png\" 
                 alt=\"CHM Saleux Logo\" 
                 style=\"max-width: 60px; width: 100%; height: auto;\">
        </div>

<!-- Bande de titre avec fond -->
<div style=\"background-color: #005b94; border-radius: 10px 10px 0 0; padding: 15px 20px; margin-bottom: 20px; text-align:center;\">
    <h2 style=\"color: #ffffff; margin:0; font-size:22px; line-height:1.4;\">
        Confirmation d'inscription
    </h2>
</div>

        <p style=\"margin-bottom:15px;\">Bonjour <strong>";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 34, $this->source); })()), "user", [], "any", false, false, false, 34), "firstName", [], "any", false, false, false, 34), "html", null, true);
        yield "</strong>,</p>

        <p style=\"margin-bottom:20px;\">
            Vous avez demandé votre inscription à l’événement suivant :
        </p>

        <h3 style=\"color:#003366; margin:10px 0 15px 0; font-size:20px;\">
            ";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 41, $this->source); })()), "title", [], "any", false, false, false, 41), "html", null, true);
        yield "
        </h3>

<div style=\"color:#555; font-size:15px; margin-bottom:25px; text-align:center;\">
    <!-- Date -->
    <p style=\"margin:5px 0;\"><strong>Date :</strong> ";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 46, $this->source); })()), "startAt", [], "any", false, false, false, 46), "d/m/Y"), "html", null, true);
        yield "</p>

    <!-- Heure (format flexible) -->
    <p style=\"margin:5px 0;\">
        <strong>Heure :</strong> 
        ";
        // line 51
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 51, $this->source); })()), "endAt", [], "any", false, false, false, 51)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 52
            yield "            de ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 52, $this->source); })()), "startAt", [], "any", false, false, false, 52), "Hhi"), "html", null, true);
            yield " à ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 52, $this->source); })()), "endAt", [], "any", false, false, false, 52), "Hhi"), "html", null, true);
            yield "
        ";
        } else {
            // line 54
            yield "            à partir de ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 54, $this->source); })()), "startAt", [], "any", false, false, false, 54), "Hhi"), "html", null, true);
            yield "
        ";
        }
        // line 56
        yield "    </p>

    <!-- Lieu -->
    <p style=\"margin:5px 0;\"><strong>Lieu :</strong> ";
        // line 59
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["event"] ?? null), "location", [], "any", true, true, false, 59) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 59, $this->source); })()), "location", [], "any", false, false, false, 59)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 59, $this->source); })()), "location", [], "any", false, false, false, 59), "html", null, true)) : ("Non communiqué"));
        yield "</p>
</div>

        <p style=\"margin-bottom:20px;\">
            Pour confirmer votre inscription, cliquez sur le bouton ci-dessous :
        </p>

        <div style=\"margin-bottom:25px;\">
            <a href=\"";
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["confirmUrl"]) || array_key_exists("confirmUrl", $context) ? $context["confirmUrl"] : (function () { throw new RuntimeError('Variable "confirmUrl" does not exist.', 67, $this->source); })()), "html", null, true);
        yield "\" 
               style=\"display:inline-block; background-color:#005b94; color:white;
                      padding:10px 18px; text-decoration:none; border-radius:6px;
                      font-weight:bold; font-size:14px; letter-spacing:0.5px; text-transform:uppercase; min-width:180px;\">
                Confirmer mon inscription
            </a>
        </div>

        <p style=\"font-size:14px; color: #555; margin-bottom:25px;\">
            À bientôt !
        </p>

        <hr style=\"border:none; border-top:1px solid #ddd; margin:25px 0;\">

        <p style=\"font-size:13px; color:#666; line-height:1.5;\">
            <strong>CHM SALEUX</strong><br>
            8 rue Max Dormoy – Complexe multisports de la Grenouillère – 80480 Saleux<br>
            Siège social : 79 rue Roger Salengro – 80480 Saleux<br>
            Tél : 03.22.89.72.57 • Email : chm.saleux@orange.fr<br>
            Agréé Jeunesse et Sports – Association loi 1901<br><br>
            Vous recevez cet e-mail car vous êtes inscrit à un événement du CHM Saleux.
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
        return "emails/event_pending.html.twig";
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
        return array (  138 => 67,  127 => 59,  122 => 56,  116 => 54,  108 => 52,  106 => 51,  98 => 46,  90 => 41,  80 => 34,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Confirmation d'inscription</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

        <style type=\"text/css\">
        /* Ajustement titres sur mobile */
        @media only screen and (max-width: 480px) {
            h2 { font-size: 18px !important; }
            h3 { font-size: 18px !important; }
        }
    </style>

</head>
<body style=\"font-family: Arial, sans-serif; background-color: #f9f9f9; margin:0; padding:20px;\">

    <div style=\"background: #ffffff; border-radius: 10px; padding: 30px 25px; max-width: 500px; margin: auto; box-shadow: 0 4px 12px rgba(0,0,0,0.1); line-height:1.6; text-align:center;\">

         <div style=\"margin-bottom:25px;\">
            <img src=\"https://ci3.googleusercontent.com/meips/ADKq_Nbd-OO8ZyUb6y2eeEHHSnVNdD2OPlmRJ_-HTGO0-Ump5s5dUXnE9gdclGpgAR9ndxvIE9_5DgHlnLfg97JJ-4j3-3HkdOA-7QBH5p82gzZ78OTe1nWhGd5rwuFtGmBqQs-fpbiGtaJVNt3alIOQCy0RUg=s0-d-e1-ft#https://raw.githubusercontent.com/enzodheilly/projet-chm/main/public/images/favicon/icon.png\" 
                 alt=\"CHM Saleux Logo\" 
                 style=\"max-width: 60px; width: 100%; height: auto;\">
        </div>

<!-- Bande de titre avec fond -->
<div style=\"background-color: #005b94; border-radius: 10px 10px 0 0; padding: 15px 20px; margin-bottom: 20px; text-align:center;\">
    <h2 style=\"color: #ffffff; margin:0; font-size:22px; line-height:1.4;\">
        Confirmation d'inscription
    </h2>
</div>

        <p style=\"margin-bottom:15px;\">Bonjour <strong>{{ app.user.firstName }}</strong>,</p>

        <p style=\"margin-bottom:20px;\">
            Vous avez demandé votre inscription à l’événement suivant :
        </p>

        <h3 style=\"color:#003366; margin:10px 0 15px 0; font-size:20px;\">
            {{ event.title }}
        </h3>

<div style=\"color:#555; font-size:15px; margin-bottom:25px; text-align:center;\">
    <!-- Date -->
    <p style=\"margin:5px 0;\"><strong>Date :</strong> {{ event.startAt|date('d/m/Y') }}</p>

    <!-- Heure (format flexible) -->
    <p style=\"margin:5px 0;\">
        <strong>Heure :</strong> 
        {% if event.endAt %}
            de {{ event.startAt|date('H\\hi') }} à {{ event.endAt|date('H\\hi') }}
        {% else %}
            à partir de {{ event.startAt|date('H\\hi') }}
        {% endif %}
    </p>

    <!-- Lieu -->
    <p style=\"margin:5px 0;\"><strong>Lieu :</strong> {{ event.location ?? 'Non communiqué' }}</p>
</div>

        <p style=\"margin-bottom:20px;\">
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

        <p style=\"font-size:14px; color: #555; margin-bottom:25px;\">
            À bientôt !
        </p>

        <hr style=\"border:none; border-top:1px solid #ddd; margin:25px 0;\">

        <p style=\"font-size:13px; color:#666; line-height:1.5;\">
            <strong>CHM SALEUX</strong><br>
            8 rue Max Dormoy – Complexe multisports de la Grenouillère – 80480 Saleux<br>
            Siège social : 79 rue Roger Salengro – 80480 Saleux<br>
            Tél : 03.22.89.72.57 • Email : chm.saleux@orange.fr<br>
            Agréé Jeunesse et Sports – Association loi 1901<br><br>
            Vous recevez cet e-mail car vous êtes inscrit à un événement du CHM Saleux.
        </p>

    </div>

</body>
</html>
", "emails/event_pending.html.twig", "/Users/dheillyenzo/projet-chm/templates/emails/event_pending.html.twig");
    }
}
