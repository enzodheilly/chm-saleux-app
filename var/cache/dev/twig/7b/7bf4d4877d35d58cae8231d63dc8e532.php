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

/* contact/contact.html.twig */
class __TwigTemplate_568ad82c21c91e469408fa1a540343b5 extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "contact/contact.html.twig"));

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

        yield "Contact | CHM SALEUX
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 7
        yield "\t<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/contact/contact.css"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 10
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 11
        yield "
\t<header class=\"hero-header\">
\t\t<div class=\"overlay\"></div>
\t\t<div class=\"hero-content\">
<h1>Besoin d’informations ?
<span>Notre équipe vous répond</span></h1>
</header>

<div class=\"hero-transition-image\">
    <img src=\"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/contact.jpg"), "html", null, true);
        yield "\" alt=\"Transition image\">
</div>

\t<section class=\"test\">
\t    <p>
        Retrouvez ici les réponses aux questions les plus fréquentes posées par les membres 
        et futurs adhérents du CHM Saleux. Notre objectif est de vous guider et de vous aider 
        à trouver rapidement l’information dont vous avez besoin : abonnement, entraînement, 
        équipements, compétitions ou encore démarches pratiques.
    </p>
\t</section>
\t
\t<section class=\"contact-section\">

\t\t";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 34, $this->source); })()), "flashes", ["success"], "method", false, false, false, 34));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 35
            yield "\t\t\t<div class=\"flash-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        yield "
\t\t<header class=\"contact-header\">
\t\t\t<h1>CONTACTEZ-NOUS</h1>
\t\t\t<p>Une question, un projet ou une demande d'information ? Remplissez le formulaire ci-dessous, nous vous répondrons rapidement.</p>

\t\t</header>

\t\t<div class=\"contact-grid\">
\t\t\t<div class=\"form-area\">
\t\t\t\t<form action=\"";
        // line 46
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("contact_submit");
        yield "\" method=\"POST\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"nom\">Nom</label>
\t\t\t\t\t\t<input type=\"text\" id=\"nom\" name=\"nom\" required>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"prenom\">Prénom</label>
\t\t\t\t\t\t<input type=\"text\" id=\"prenom\" name=\"prenom\" required>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"email\">Email</label>
\t\t\t\t\t\t<input type=\"email\" id=\"email\" name=\"email\" required>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"telephone\">Téléphone</label>
\t\t\t\t\t\t<input type=\"text\" id=\"telephone\" name=\"telephone\">
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"message\">Message</label>
\t\t\t\t\t\t<textarea id=\"message\" name=\"message\" rows=\"4\" required></textarea>
\t\t\t\t\t</div>

\t\t\t\t\t<button type=\"submit\" class=\"btn-modern\">
\t\t\t\t\t\t<span class=\"btn-text\">Envoyer</span>
\t\t\t\t\t\t<span class=\"spinner\" style=\"display: none;\"></span>
\t\t\t\t\t</button>

\t\t\t\t</form>
\t\t\t</div>

\t\t\t<div class=\"map-area\">
\t\t\t\t<h2>OÙ NOUS TROUVER</h2>
\t\t\t\t<iframe src=\"https://www.google.com/maps?q=49.8609999,2.2373333+(Hangar+GERIS+Saleux)&hl=fr&z=18&output=embed\" allowfullscreen loading=\"lazy\"></iframe>
\t\t\t\t<div class=\"contact-info\">
\t\t\t\t\t<p>
\t\t\t\t\t\t<strong>Adresse :</strong>
\t\t\t\t\t\t8 rue Marx Dormoy (en face de la mairie), 80480 Saleux</p>
\t\t\t\t\t<p>
\t\t\t\t\t\t<strong>Téléphone :</strong>
\t\t\t\t\t\t03.22.89.72.57</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</section>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 97
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 98
        yield "\t <script src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/contact/contact.js"), "html", null, true);
        yield "\"></script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "contact/contact.html.twig";
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
        return array (  229 => 98,  219 => 97,  161 => 46,  150 => 37,  141 => 35,  137 => 34,  120 => 20,  109 => 11,  99 => 10,  88 => 7,  78 => 6,  60 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Contact | CHM SALEUX
{% endblock %}

{% block stylesheets %}
\t<link rel=\"stylesheet\" href=\"{{ asset('css/contact/contact.css') }}\">
{% endblock %}

{% block body %}

\t<header class=\"hero-header\">
\t\t<div class=\"overlay\"></div>
\t\t<div class=\"hero-content\">
<h1>Besoin d’informations ?
<span>Notre équipe vous répond</span></h1>
</header>

<div class=\"hero-transition-image\">
    <img src=\"{{ asset('images/club/contact.jpg') }}\" alt=\"Transition image\">
</div>

\t<section class=\"test\">
\t    <p>
        Retrouvez ici les réponses aux questions les plus fréquentes posées par les membres 
        et futurs adhérents du CHM Saleux. Notre objectif est de vous guider et de vous aider 
        à trouver rapidement l’information dont vous avez besoin : abonnement, entraînement, 
        équipements, compétitions ou encore démarches pratiques.
    </p>
\t</section>
\t
\t<section class=\"contact-section\">

\t\t{% for message in app.flashes('success') %}
\t\t\t<div class=\"flash-success\">{{ message }}</div>
\t\t{% endfor %}

\t\t<header class=\"contact-header\">
\t\t\t<h1>CONTACTEZ-NOUS</h1>
\t\t\t<p>Une question, un projet ou une demande d'information ? Remplissez le formulaire ci-dessous, nous vous répondrons rapidement.</p>

\t\t</header>

\t\t<div class=\"contact-grid\">
\t\t\t<div class=\"form-area\">
\t\t\t\t<form action=\"{{ path('contact_submit') }}\" method=\"POST\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"nom\">Nom</label>
\t\t\t\t\t\t<input type=\"text\" id=\"nom\" name=\"nom\" required>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"prenom\">Prénom</label>
\t\t\t\t\t\t<input type=\"text\" id=\"prenom\" name=\"prenom\" required>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"email\">Email</label>
\t\t\t\t\t\t<input type=\"email\" id=\"email\" name=\"email\" required>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"telephone\">Téléphone</label>
\t\t\t\t\t\t<input type=\"text\" id=\"telephone\" name=\"telephone\">
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"message\">Message</label>
\t\t\t\t\t\t<textarea id=\"message\" name=\"message\" rows=\"4\" required></textarea>
\t\t\t\t\t</div>

\t\t\t\t\t<button type=\"submit\" class=\"btn-modern\">
\t\t\t\t\t\t<span class=\"btn-text\">Envoyer</span>
\t\t\t\t\t\t<span class=\"spinner\" style=\"display: none;\"></span>
\t\t\t\t\t</button>

\t\t\t\t</form>
\t\t\t</div>

\t\t\t<div class=\"map-area\">
\t\t\t\t<h2>OÙ NOUS TROUVER</h2>
\t\t\t\t<iframe src=\"https://www.google.com/maps?q=49.8609999,2.2373333+(Hangar+GERIS+Saleux)&hl=fr&z=18&output=embed\" allowfullscreen loading=\"lazy\"></iframe>
\t\t\t\t<div class=\"contact-info\">
\t\t\t\t\t<p>
\t\t\t\t\t\t<strong>Adresse :</strong>
\t\t\t\t\t\t8 rue Marx Dormoy (en face de la mairie), 80480 Saleux</p>
\t\t\t\t\t<p>
\t\t\t\t\t\t<strong>Téléphone :</strong>
\t\t\t\t\t\t03.22.89.72.57</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</section>

{% endblock %}

{% block javascripts %}
\t <script src=\"{{ asset('js/contact/contact.js') }}\"></script>
{% endblock %}
", "contact/contact.html.twig", "/Users/dheillyenzo/projet-chm/templates/contact/contact.html.twig");
    }
}
