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

/* emails/event_unregistration.html.twig */
class __TwigTemplate_a0f6271a87d2af61f5d0b6e5aac10931 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/event_unregistration.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Désinscription effectuée</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <style type=\"text/css\">
        /* Ajustement des titres sur mobile */
        @media only screen and (max-width: 480px) {
            h2 { font-size: 18px !important; }
            h3 { font-size: 16px !important; }
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

<div style=\"background-color: #005b94; border-radius: 10px 10px 0 0; padding: 15px 20px; margin-bottom: 20px;\">
    <h2 style=\"color: #ffffff; margin:0; font-size:22px; line-height:1.4;\">
         Désinscription effectuée
    </h2>
</div>
        <p style=\"margin-bottom:15px;\">Bonjour,</p>

        <p style=\"margin-bottom:20px;\">Vous vous êtes désinscrit de l’événement :</p>

        <h3 style=\"color:#003366; margin:10px 0 15px 0;\">";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 35, $this->source); })()), "title", [], "any", false, false, false, 35), "html", null, true);
        yield "</h3>

        <div style=\"color:#555; font-size:15px; margin-bottom:25px;\">
            <!-- Date et heure séparées -->
            <p style=\"margin:5px 0;\"><strong>Date :</strong> ";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 39, $this->source); })()), "startAt", [], "any", false, false, false, 39), "d/m/Y"), "html", null, true);
        yield "</p>
            <p style=\"margin:5px 0;\">
                <strong>Heure :</strong>
                ";
        // line 42
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 42, $this->source); })()), "endAt", [], "any", false, false, false, 42)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 43
            yield "                    de ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 43, $this->source); })()), "startAt", [], "any", false, false, false, 43), "Hhi"), "html", null, true);
            yield " à ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 43, $this->source); })()), "endAt", [], "any", false, false, false, 43), "Hhi"), "html", null, true);
            yield "
                ";
        } else {
            // line 45
            yield "                    à partir de ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 45, $this->source); })()), "startAt", [], "any", false, false, false, 45), "Hhi"), "html", null, true);
            yield "
                ";
        }
        // line 47
        yield "            </p>
        </div>

        <p style=\"margin-bottom:25px;\">Nous espérons vous revoir à un autre événement !</p>

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
        return "emails/event_unregistration.html.twig";
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
        return array (  110 => 47,  104 => 45,  96 => 43,  94 => 42,  88 => 39,  81 => 35,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Désinscription effectuée</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <style type=\"text/css\">
        /* Ajustement des titres sur mobile */
        @media only screen and (max-width: 480px) {
            h2 { font-size: 18px !important; }
            h3 { font-size: 16px !important; }
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

<div style=\"background-color: #005b94; border-radius: 10px 10px 0 0; padding: 15px 20px; margin-bottom: 20px;\">
    <h2 style=\"color: #ffffff; margin:0; font-size:22px; line-height:1.4;\">
         Désinscription effectuée
    </h2>
</div>
        <p style=\"margin-bottom:15px;\">Bonjour,</p>

        <p style=\"margin-bottom:20px;\">Vous vous êtes désinscrit de l’événement :</p>

        <h3 style=\"color:#003366; margin:10px 0 15px 0;\">{{ event.title }}</h3>

        <div style=\"color:#555; font-size:15px; margin-bottom:25px;\">
            <!-- Date et heure séparées -->
            <p style=\"margin:5px 0;\"><strong>Date :</strong> {{ event.startAt|date('d/m/Y') }}</p>
            <p style=\"margin:5px 0;\">
                <strong>Heure :</strong>
                {% if event.endAt %}
                    de {{ event.startAt|date('H\\hi') }} à {{ event.endAt|date('H\\hi') }}
                {% else %}
                    à partir de {{ event.startAt|date('H\\hi') }}
                {% endif %}
            </p>
        </div>

        <p style=\"margin-bottom:25px;\">Nous espérons vous revoir à un autre événement !</p>

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
", "emails/event_unregistration.html.twig", "/Users/dheillyenzo/projet-chm/templates/emails/event_unregistration.html.twig");
    }
}
