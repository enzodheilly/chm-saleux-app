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

/* emails/confirmation.html.twig */
class __TwigTemplate_337a6d3062fdd684e6e43158f2e54e4c extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/confirmation.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Inscription réussie</title>
    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap\" rel=\"stylesheet\">
    <style>
        /* Reset & Base */
        * { box-sizing: border-box; margin: 0; padding: 0; }
body {
    font-family: \"Inter\", sans-serif;
    background-color: #f9f9f9;
    color: #111;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 1rem;
}
/* Carte */
/* Carte */
.confirmation-card {
    background-color: #ffffff;
    padding: 3rem 3rem;           /* padding généreux */
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    text-align: center;
    width: 400px;                 /* largeur fixe sur desktop */
    height: 500px;                /* hauteur fixe sur desktop */
    max-width: 95vw;              /* s’adapte si écran trop petit */
    max-height: 95vh;             /* s’adapte si écran trop petit */
    animation: slideFadeIn 0.6s ease-out forwards;
    opacity: 0;
    transform: translateY(-20px);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease-in-out;
    display: flex;
    flex-direction: column;
    justify-content: center;      /* centre verticalement le contenu */
    align-items: center;          /* centre horizontalement le contenu */
    overflow: auto;               /* scroll si le contenu dépasse */
}


        @keyframes slideFadeIn {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* Logo */
        .logo {
            max-width: 120px;
            width: 100%;
            height: auto;
            margin: 0 auto 1.5rem auto;
            display: block;
        }

        /* Titres et texte */
        h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        p {
            font-size: 1rem;
            margin-bottom: 2rem;
            line-height: 1.5;
            color: #4b5563;
        }
        strong { color: #111; }

        /* Bouton */
        .btn-return {
            display: inline-block;
            padding: 0.65rem 1.8rem;
            background: #005b94;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1rem;
            transition: transform 0.2s, box-shadow 0.2s, background 0.3s;
        }
        .btn-return:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
            background: #003d66;
        }

/* Responsive pour tablettes et mobiles */
@media (max-width: 768px) {
    .confirmation-card {
        padding: 2.5rem 2.5rem; /* un peu plus grand */
        max-width: 90%; /* occupe plus de largeur */
    }
    h1 { font-size: 1.7rem; }  /* légèrement plus grand */
    p { font-size: 1rem; }
    .btn-return { font-size: 1rem; padding: 0.65rem 1.7rem; }
    .logo { max-width: 110px; }
}

@media (max-width: 480px) {
    .confirmation-card {
        padding: 2rem 1.8rem; /* plus de padding que avant */
        max-width: 95%; /* presque toute la largeur */
    }
    h1 { font-size: 1.5rem; }
    p { font-size: 0.95rem; }
    .btn-return { font-size: 0.95rem; padding: 0.6rem 1.5rem; }
    .logo { max-width: 90px; }
}

    </style>
</head>
<body>
    <div class=\"confirmation-card\">
        <!-- Logo du club -->
        <img src=\"";
        // line 119
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/favicon/icon.png"), "html", null, true);
        yield "\" alt=\"Logo du club\" class=\"logo\">

        <!-- Titre et message -->
        <h1>Inscription réussie !</h1>
        <p>Vous êtes bien inscrit à l'événement : <strong>";
        // line 123
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 123, $this->source); })()), "title", [], "any", false, false, false, 123), "html", null, true);
        yield "</strong>.</p>

        <!-- Bouton retour -->
        <a href=\"";
        // line 126
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("adherent_dashboard");
        yield "\" class=\"btn-return\">Retour à mon espace adhérent</a>
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
        return "emails/confirmation.html.twig";
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
        return array (  178 => 126,  172 => 123,  165 => 119,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Inscription réussie</title>
    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap\" rel=\"stylesheet\">
    <style>
        /* Reset & Base */
        * { box-sizing: border-box; margin: 0; padding: 0; }
body {
    font-family: \"Inter\", sans-serif;
    background-color: #f9f9f9;
    color: #111;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 1rem;
}
/* Carte */
/* Carte */
.confirmation-card {
    background-color: #ffffff;
    padding: 3rem 3rem;           /* padding généreux */
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    text-align: center;
    width: 400px;                 /* largeur fixe sur desktop */
    height: 500px;                /* hauteur fixe sur desktop */
    max-width: 95vw;              /* s’adapte si écran trop petit */
    max-height: 95vh;             /* s’adapte si écran trop petit */
    animation: slideFadeIn 0.6s ease-out forwards;
    opacity: 0;
    transform: translateY(-20px);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease-in-out;
    display: flex;
    flex-direction: column;
    justify-content: center;      /* centre verticalement le contenu */
    align-items: center;          /* centre horizontalement le contenu */
    overflow: auto;               /* scroll si le contenu dépasse */
}


        @keyframes slideFadeIn {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* Logo */
        .logo {
            max-width: 120px;
            width: 100%;
            height: auto;
            margin: 0 auto 1.5rem auto;
            display: block;
        }

        /* Titres et texte */
        h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        p {
            font-size: 1rem;
            margin-bottom: 2rem;
            line-height: 1.5;
            color: #4b5563;
        }
        strong { color: #111; }

        /* Bouton */
        .btn-return {
            display: inline-block;
            padding: 0.65rem 1.8rem;
            background: #005b94;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1rem;
            transition: transform 0.2s, box-shadow 0.2s, background 0.3s;
        }
        .btn-return:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
            background: #003d66;
        }

/* Responsive pour tablettes et mobiles */
@media (max-width: 768px) {
    .confirmation-card {
        padding: 2.5rem 2.5rem; /* un peu plus grand */
        max-width: 90%; /* occupe plus de largeur */
    }
    h1 { font-size: 1.7rem; }  /* légèrement plus grand */
    p { font-size: 1rem; }
    .btn-return { font-size: 1rem; padding: 0.65rem 1.7rem; }
    .logo { max-width: 110px; }
}

@media (max-width: 480px) {
    .confirmation-card {
        padding: 2rem 1.8rem; /* plus de padding que avant */
        max-width: 95%; /* presque toute la largeur */
    }
    h1 { font-size: 1.5rem; }
    p { font-size: 0.95rem; }
    .btn-return { font-size: 0.95rem; padding: 0.6rem 1.5rem; }
    .logo { max-width: 90px; }
}

    </style>
</head>
<body>
    <div class=\"confirmation-card\">
        <!-- Logo du club -->
        <img src=\"{{ asset('images/favicon/icon.png') }}\" alt=\"Logo du club\" class=\"logo\">

        <!-- Titre et message -->
        <h1>Inscription réussie !</h1>
        <p>Vous êtes bien inscrit à l'événement : <strong>{{ event.title }}</strong>.</p>

        <!-- Bouton retour -->
        <a href=\"{{ path('adherent_dashboard') }}\" class=\"btn-return\">Retour à mon espace adhérent</a>
    </div>
</body>
</html>
", "emails/confirmation.html.twig", "/Users/dheillyenzo/projet-chm/templates/emails/confirmation.html.twig");
    }
}
