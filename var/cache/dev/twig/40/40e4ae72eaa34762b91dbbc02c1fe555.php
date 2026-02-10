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

/* partenaire/index.html.twig */
class __TwigTemplate_0bb68afd1e5a2461df46bba8cbaaa555 extends Template
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
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partenaire/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
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

        yield "Devenir Partenaire - CHM Saleux";
        
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
        /* --- SECTION ARGUMENTS --- */
        .partners-section {
            padding: 80px 20px;
            background-color: #f8f9fa;
        }
        
        .partners-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 50px auto 0;
        }

        .partner-card {
            background: white;
            padding: 40px 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .partner-card:hover {
            transform: translateY(-10px);
        }

        .partner-icon {
            font-size: 3rem;
            color: #005b94; /* Bleu du club */
            margin-bottom: 20px;
        }

        .partner-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #333;
        }

        .partner-card p {
            color: #666;
            line-height: 1.6;
        }

        /* --- SECTION FISCALITÉ (Mécénat) --- */
        .tax-section {
            padding: 80px 20px;
            background: #005b94;
            color: white;
            text-align: center;
        }

        .tax-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .tax-highlight {
            font-size: 3rem;
            font-weight: 900;
            color: #E6822E; /* Orange */
            display: block;
            margin: 20px 0;
        }

        /* --- SECTION CONTACT --- */
        .contact-partner-section {
            padding: 80px 20px;
            text-align: center;
            color:#fff;
        }

        .contact-btn {
            display: inline-block;
            background-color: #E6822E;
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: bold;
            font-size: 1.2rem;
            text-decoration: none;
            margin-top: 20px;
            transition: background 0.3s;
        }

        .contact-btn:hover {
            background-color: #cc7025;
            color: white;
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 100
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 101
        yield "
";
        // line 103
        yield "<header class=\"hero-header\" style=\"
    background-image: url('";
        // line 104
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/partenariat.jpg"), "html", null, true);
        yield "'); 
    background-size: cover; 
    background-position: center;
\">
    ";
        // line 109
        yield "    <a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\" class=\"back-button\">
         <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2.5\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15 19l-7-7 7-7\" />
         </svg>
         Retour à l'accueil
    </a>

    <div class=\"hero-content\">
        <h1>Devenir Partenaire <span>du Club</span></h1>
        <p>
            Associez votre image aux valeurs de performance, de solidarité et de dépassement de soi. 
            Soutenez le CHM Saleux et participez activement à la réussite sportive 
            <span>de nos athlètes.</span>
        </p>
    </div>
</header>

";
        // line 127
        yield "<section class=\"partners-section\">
    <div class=\"section-title\" style=\"text-align: center;\">
        <h1 style=\"color: #333; margin-top:0;\">Pourquoi nous soutenir ?</h1>
    </div>

    <div class=\"partners-grid\">
        ";
        // line 134
        yield "        <div class=\"partner-card\">
            <div class=\"partner-icon\"><i class=\"fa-solid fa-eye\"></i></div>
            <h3>Visibilité Locale & Régionale</h3>
            <p>Affichez votre logo sur nos tenues, nos réseaux sociaux et lors de nos compétitions. Touchez un public large et engagé autour des valeurs du sport.</p>
        </div>

        ";
        // line 141
        yield "        <div class=\"partner-card\">
            <div class=\"partner-icon\"><i class=\"fa-solid fa-users\"></i></div>
            <h3>Engagement Sociétal</h3>
            <p>Montrez votre soutien à la jeunesse, à la santé et au tissu associatif local. Associez votre entreprise à une image dynamique et positive.</p>
        </div>

        ";
        // line 148
        yield "        <div class=\"partner-card\">
            <div class=\"partner-icon\"><i class=\"fa-solid fa-handshake\"></i></div>
            <h3>Réseau Partenaires</h3>
            <p>Rejoignez le cercle des partenaires du CHM Saleux. Participez à nos événements conviviaux et développez votre réseau professionnel local.</p>
        </div>
    </div>
</section>

";
        // line 157
        yield "<section class=\"tax-section\">
    <div class=\"tax-content\">
        <h2>Avantage Fiscal (Mécénat)</h2>
        <p style=\"font-size: 1.2rem; margin-top: 20px;\">
            Le CHM Saleux est une association d'intérêt général. Votre don (financier ou matériel) ouvre droit à une réduction d'impôt sur les sociétés de :
        </p>
        <span class=\"tax-highlight\">60 %</span>
        <p>du montant du don, dans la limite de 20 000 € ou 5 ‰ du chiffre d'affaires.</p>
    </div>
</section>

";
        // line 169
        yield "<section class=\"contact-partner-section\">
    <h1>Prêt à nous rejoindre ?</h1>
    <p style=\"font-size: 1.2rem; color: #666; max-width: 700px; margin: 0 auto;\">
        Nous sommes à votre écoute pour construire ensemble un partenariat sur mesure, adapté à vos objectifs et à votre budget.
    </p>
    
    <div style=\"margin-top: 40px;\">
        <p><strong>Contactez directement notre Président ou Trésorier :</strong></p>
        <p><i class=\"fa-solid fa-envelope\"></i> contact@chmsaleux.fr</p>
        <p><i class=\"fa-solid fa-phone\"></i> 03.22.89.72.57</p>
    </div>

    <a href=\"";
        // line 181
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("faq");
        yield "\" class=\"contact-btn\">Nous contacter</a>
</section>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partenaire/index.html.twig";
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
        return array (  292 => 181,  278 => 169,  265 => 157,  255 => 148,  247 => 141,  239 => 134,  231 => 127,  210 => 109,  203 => 104,  200 => 103,  197 => 101,  187 => 100,  88 => 7,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Devenir Partenaire - CHM Saleux{% endblock %}

{% block stylesheets %}
    {# On peut mettre le CSS spécifique ici ou dans un fichier à part #}
    <style>
        /* --- SECTION ARGUMENTS --- */
        .partners-section {
            padding: 80px 20px;
            background-color: #f8f9fa;
        }
        
        .partners-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 50px auto 0;
        }

        .partner-card {
            background: white;
            padding: 40px 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .partner-card:hover {
            transform: translateY(-10px);
        }

        .partner-icon {
            font-size: 3rem;
            color: #005b94; /* Bleu du club */
            margin-bottom: 20px;
        }

        .partner-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #333;
        }

        .partner-card p {
            color: #666;
            line-height: 1.6;
        }

        /* --- SECTION FISCALITÉ (Mécénat) --- */
        .tax-section {
            padding: 80px 20px;
            background: #005b94;
            color: white;
            text-align: center;
        }

        .tax-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .tax-highlight {
            font-size: 3rem;
            font-weight: 900;
            color: #E6822E; /* Orange */
            display: block;
            margin: 20px 0;
        }

        /* --- SECTION CONTACT --- */
        .contact-partner-section {
            padding: 80px 20px;
            text-align: center;
            color:#fff;
        }

        .contact-btn {
            display: inline-block;
            background-color: #E6822E;
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: bold;
            font-size: 1.2rem;
            text-decoration: none;
            margin-top: 20px;
            transition: background 0.3s;
        }

        .contact-btn:hover {
            background-color: #cc7025;
            color: white;
        }
    </style>
{% endblock %}

{% block body %}

{# --- 1. HERO HEADER (Style que tu connais) --- #}
<header class=\"hero-header\" style=\"
    background-image: url('{{ asset('images/partenariat.jpg') }}'); 
    background-size: cover; 
    background-position: center;
\">
    {# Bouton Retour #}
    <a href=\"{{ path('home') }}\" class=\"back-button\">
         <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2.5\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15 19l-7-7 7-7\" />
         </svg>
         Retour à l'accueil
    </a>

    <div class=\"hero-content\">
        <h1>Devenir Partenaire <span>du Club</span></h1>
        <p>
            Associez votre image aux valeurs de performance, de solidarité et de dépassement de soi. 
            Soutenez le CHM Saleux et participez activement à la réussite sportive 
            <span>de nos athlètes.</span>
        </p>
    </div>
</header>

{# --- 2. POURQUOI NOUS SOUTENIR ? --- #}
<section class=\"partners-section\">
    <div class=\"section-title\" style=\"text-align: center;\">
        <h1 style=\"color: #333; margin-top:0;\">Pourquoi nous soutenir ?</h1>
    </div>

    <div class=\"partners-grid\">
        {# Argument 1 : Visibilité #}
        <div class=\"partner-card\">
            <div class=\"partner-icon\"><i class=\"fa-solid fa-eye\"></i></div>
            <h3>Visibilité Locale & Régionale</h3>
            <p>Affichez votre logo sur nos tenues, nos réseaux sociaux et lors de nos compétitions. Touchez un public large et engagé autour des valeurs du sport.</p>
        </div>

        {# Argument 2 : Image de marque #}
        <div class=\"partner-card\">
            <div class=\"partner-icon\"><i class=\"fa-solid fa-users\"></i></div>
            <h3>Engagement Sociétal</h3>
            <p>Montrez votre soutien à la jeunesse, à la santé et au tissu associatif local. Associez votre entreprise à une image dynamique et positive.</p>
        </div>

        {# Argument 3 : Réseau #}
        <div class=\"partner-card\">
            <div class=\"partner-icon\"><i class=\"fa-solid fa-handshake\"></i></div>
            <h3>Réseau Partenaires</h3>
            <p>Rejoignez le cercle des partenaires du CHM Saleux. Participez à nos événements conviviaux et développez votre réseau professionnel local.</p>
        </div>
    </div>
</section>

{# --- 3. FISCALITÉ (Argument fort) --- #}
<section class=\"tax-section\">
    <div class=\"tax-content\">
        <h2>Avantage Fiscal (Mécénat)</h2>
        <p style=\"font-size: 1.2rem; margin-top: 20px;\">
            Le CHM Saleux est une association d'intérêt général. Votre don (financier ou matériel) ouvre droit à une réduction d'impôt sur les sociétés de :
        </p>
        <span class=\"tax-highlight\">60 %</span>
        <p>du montant du don, dans la limite de 20 000 € ou 5 ‰ du chiffre d'affaires.</p>
    </div>
</section>

{# --- 4. CONTACT / CTA --- #}
<section class=\"contact-partner-section\">
    <h1>Prêt à nous rejoindre ?</h1>
    <p style=\"font-size: 1.2rem; color: #666; max-width: 700px; margin: 0 auto;\">
        Nous sommes à votre écoute pour construire ensemble un partenariat sur mesure, adapté à vos objectifs et à votre budget.
    </p>
    
    <div style=\"margin-top: 40px;\">
        <p><strong>Contactez directement notre Président ou Trésorier :</strong></p>
        <p><i class=\"fa-solid fa-envelope\"></i> contact@chmsaleux.fr</p>
        <p><i class=\"fa-solid fa-phone\"></i> 03.22.89.72.57</p>
    </div>

    <a href=\"{{ path('faq') }}\" class=\"contact-btn\">Nous contacter</a>
</section>

{% endblock %}", "partenaire/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/partenaire/index.html.twig");
    }
}
