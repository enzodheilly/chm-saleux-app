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

/* footer/newsletter/unsubscribe.html.twig */
class __TwigTemplate_c5f14cafe3956e13f96ae69ae711b22c extends Template
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
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "footer/newsletter/unsubscribe.html.twig"));

        // line 1
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        // line 3
        yield "
";
        // line 4
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 1
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Désinscription
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 5
        yield "\t<div style=\"max-width:600px;margin:60px auto;padding:30px;background:#f9fafb;border-radius:12px;
\t\t\t\t\t\t              box-shadow:0 0 10px rgba(0,0,0,0.1);font-family:'Inter',sans-serif;text-align:center;\">

\t\t";
        // line 8
        if ((($tmp = (isset($context["alreadyUnsubscribed"]) || array_key_exists("alreadyUnsubscribed", $context) ? $context["alreadyUnsubscribed"] : (function () { throw new RuntimeError('Variable "alreadyUnsubscribed" does not exist.', 8, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 9
            yield "\t\t\t<h1 style=\"color:#ff6600;\">🚪 Vous êtes déjà désinscrit(e)</h1>
\t\t\t<p>L’adresse
\t\t\t\t<strong>";
            // line 11
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["email"]) || array_key_exists("email", $context) ? $context["email"] : (function () { throw new RuntimeError('Variable "email" does not exist.', 11, $this->source); })()), "html", null, true);
            yield "</strong>
\t\t\t\tne recevra plus nos newsletters.</p>
\t\t\t<p style=\"color:#777;\">Si vous changez d’avis, vous pouvez vous réinscrire à tout moment sur notre site.</p>
\t\t";
        } else {
            // line 15
            yield "\t\t\t<h1 style=\"color:#ff6600;\">✅ Désinscription confirmée</h1>
\t\t\t<p>L’adresse
\t\t\t\t<strong>";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["email"]) || array_key_exists("email", $context) ? $context["email"] : (function () { throw new RuntimeError('Variable "email" does not exist.', 17, $this->source); })()), "html", null, true);
            yield "</strong>
\t\t\t\ta bien été retirée de notre liste de diffusion.</p>
\t\t\t<p style=\"color:#777;\">Vous ne recevrez plus de messages de notre part.</p>
\t\t";
        }
        // line 21
        yield "
\t\t<hr style=\"margin:30px 0;border:none;border-top:1px solid #ddd;\">

\t\t<a href=\"";
        // line 24
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\" style=\"text-decoration:none;color:#ff6600;font-weight:bold;\">
\t\t\t🔙 Retour au site CHM
\t\t</a>
\t</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "footer/newsletter/unsubscribe.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  122 => 24,  117 => 21,  110 => 17,  106 => 15,  99 => 11,  95 => 9,  93 => 8,  88 => 5,  78 => 4,  60 => 1,  52 => 4,  49 => 3,  47 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% block title %}Désinscription
{% endblock %}

{% block body %}
\t<div style=\"max-width:600px;margin:60px auto;padding:30px;background:#f9fafb;border-radius:12px;
\t\t\t\t\t\t              box-shadow:0 0 10px rgba(0,0,0,0.1);font-family:'Inter',sans-serif;text-align:center;\">

\t\t{% if alreadyUnsubscribed %}
\t\t\t<h1 style=\"color:#ff6600;\">🚪 Vous êtes déjà désinscrit(e)</h1>
\t\t\t<p>L’adresse
\t\t\t\t<strong>{{ email }}</strong>
\t\t\t\tne recevra plus nos newsletters.</p>
\t\t\t<p style=\"color:#777;\">Si vous changez d’avis, vous pouvez vous réinscrire à tout moment sur notre site.</p>
\t\t{% else %}
\t\t\t<h1 style=\"color:#ff6600;\">✅ Désinscription confirmée</h1>
\t\t\t<p>L’adresse
\t\t\t\t<strong>{{ email }}</strong>
\t\t\t\ta bien été retirée de notre liste de diffusion.</p>
\t\t\t<p style=\"color:#777;\">Vous ne recevrez plus de messages de notre part.</p>
\t\t{% endif %}

\t\t<hr style=\"margin:30px 0;border:none;border-top:1px solid #ddd;\">

\t\t<a href=\"{{ path('home') }}\" style=\"text-decoration:none;color:#ff6600;font-weight:bold;\">
\t\t\t🔙 Retour au site CHM
\t\t</a>
\t</div>
{% endblock %}
", "footer/newsletter/unsubscribe.html.twig", "/Users/dheillyenzo/projet-chm/templates/footer/newsletter/unsubscribe.html.twig");
    }
}
