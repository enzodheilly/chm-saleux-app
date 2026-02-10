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

/* assistant/license_confirm_result.html.twig */
class __TwigTemplate_570341f22ac76b40e60a85bfb9794c75 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "assistant/license_confirm_result.html.twig"));

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

        yield "Confirmation licence
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 7
        yield "\t <script>
\t\t\t    // Dès que la page se charge, on envoie un \"signal\" au parent
\t\t\t    window.addEventListener(\"load\", () => {
\t\t\t        if (window.opener && !window.opener.closed) {
\t\t\t            window.opener.postMessage({
\t\t\t                type: \"licenseConfirmed\",
\t\t\t                ok: ";
        // line 13
        yield (((($tmp = (isset($context["ok"]) || array_key_exists("ok", $context) ? $context["ok"] : (function () { throw new RuntimeError('Variable "ok" does not exist.', 13, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("true") : ("false"));
        yield ",
\t\t\t                reason: \"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["reason"]) || array_key_exists("reason", $context) ? $context["reason"] : (function () { throw new RuntimeError('Variable "reason" does not exist.', 14, $this->source); })()), "js"), "html", null, true);
        yield "\"
\t\t\t            }, \"*\");
\t\t\t        }
\t\t\t        // Ferme automatiquement la fenêtre au bout de 1 seconde
\t\t\t        setTimeout(() => window.close(), 1000);
\t\t\t    });
\t\t\t</script>

\t<div style=\"display:flex;justify-content:center;align-items:center;min-height:60vh;\">
\t\t";
        // line 23
        if ((($tmp = (isset($context["ok"]) || array_key_exists("ok", $context) ? $context["ok"] : (function () { throw new RuntimeError('Variable "ok" does not exist.', 23, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 24
            yield "\t\t\t<div style=\"text-align:center;padding:2rem;background:#f0fdf4;border-radius:10px;box-shadow:0 4px 10px rgba(0,0,0,0.1);\">
\t\t\t\t<h2 style=\"color:#22c55e;\">🎉 Confirmation réussie</h2>
\t\t\t\t<p>Vous pouvez fermer cette page.</p>
\t\t\t</div>
\t\t";
        } else {
            // line 29
            yield "\t\t\t<div style=\"text-align:center;padding:2rem;background:#fee2e2;border-radius:10px;\">
\t\t\t\t<h2 style=\"color:#ef4444;\">❌ Erreur</h2>
\t\t\t\t<p>
\t\t\t\t\t";
            // line 32
            if (((isset($context["reason"]) || array_key_exists("reason", $context) ? $context["reason"] : (function () { throw new RuntimeError('Variable "reason" does not exist.', 32, $this->source); })()) == "invalid")) {
                // line 33
                yield "\t\t\t\t\t\tLien de confirmation invalide.
\t\t\t\t\t";
            } elseif ((            // line 34
(isset($context["reason"]) || array_key_exists("reason", $context) ? $context["reason"] : (function () { throw new RuntimeError('Variable "reason" does not exist.', 34, $this->source); })()) == "expired")) {
                // line 35
                yield "\t\t\t\t\t\tLe lien de confirmation a expiré.
\t\t\t\t\t";
            } else {
                // line 37
                yield "\t\t\t\t\t\tUne erreur est survenue.
\t\t\t\t\t";
            }
            // line 39
            yield "\t\t\t\t</p>
\t\t\t</div>
\t\t";
        }
        // line 42
        yield "\t</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "assistant/license_confirm_result.html.twig";
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
        return array (  144 => 42,  139 => 39,  135 => 37,  131 => 35,  129 => 34,  126 => 33,  124 => 32,  119 => 29,  112 => 24,  110 => 23,  98 => 14,  94 => 13,  86 => 7,  76 => 6,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Confirmation licence
{% endblock %}

{% block body %}
\t <script>
\t\t\t    // Dès que la page se charge, on envoie un \"signal\" au parent
\t\t\t    window.addEventListener(\"load\", () => {
\t\t\t        if (window.opener && !window.opener.closed) {
\t\t\t            window.opener.postMessage({
\t\t\t                type: \"licenseConfirmed\",
\t\t\t                ok: {{ ok ? 'true' : 'false' }},
\t\t\t                reason: \"{{ reason|e('js') }}\"
\t\t\t            }, \"*\");
\t\t\t        }
\t\t\t        // Ferme automatiquement la fenêtre au bout de 1 seconde
\t\t\t        setTimeout(() => window.close(), 1000);
\t\t\t    });
\t\t\t</script>

\t<div style=\"display:flex;justify-content:center;align-items:center;min-height:60vh;\">
\t\t{% if ok %}
\t\t\t<div style=\"text-align:center;padding:2rem;background:#f0fdf4;border-radius:10px;box-shadow:0 4px 10px rgba(0,0,0,0.1);\">
\t\t\t\t<h2 style=\"color:#22c55e;\">🎉 Confirmation réussie</h2>
\t\t\t\t<p>Vous pouvez fermer cette page.</p>
\t\t\t</div>
\t\t{% else %}
\t\t\t<div style=\"text-align:center;padding:2rem;background:#fee2e2;border-radius:10px;\">
\t\t\t\t<h2 style=\"color:#ef4444;\">❌ Erreur</h2>
\t\t\t\t<p>
\t\t\t\t\t{% if reason == 'invalid' %}
\t\t\t\t\t\tLien de confirmation invalide.
\t\t\t\t\t{% elseif reason == 'expired' %}
\t\t\t\t\t\tLe lien de confirmation a expiré.
\t\t\t\t\t{% else %}
\t\t\t\t\t\tUne erreur est survenue.
\t\t\t\t\t{% endif %}
\t\t\t\t</p>
\t\t\t</div>
\t\t{% endif %}
\t</div>
{% endblock %}
", "assistant/license_confirm_result.html.twig", "/Users/dheillyenzo/projet-chm/templates/assistant/license_confirm_result.html.twig");
    }
}
