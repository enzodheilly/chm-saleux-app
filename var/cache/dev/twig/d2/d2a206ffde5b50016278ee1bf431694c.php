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

/* @!SchebTwoFactor/Authentication/form.html.twig */
class __TwigTemplate_3de96acda5b5663628df9a6398d1ae09 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@!SchebTwoFactor/Authentication/form.html.twig"));

        // line 5
        yield "
";
        // line 7
        if ((($tmp = (isset($context["authenticationError"]) || array_key_exists("authenticationError", $context) ? $context["authenticationError"] : (function () { throw new RuntimeError('Variable "authenticationError" does not exist.', 7, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 8
            yield "<p>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["authenticationError"]) || array_key_exists("authenticationError", $context) ? $context["authenticationError"] : (function () { throw new RuntimeError('Variable "authenticationError" does not exist.', 8, $this->source); })()), (isset($context["authenticationErrorData"]) || array_key_exists("authenticationErrorData", $context) ? $context["authenticationErrorData"] : (function () { throw new RuntimeError('Variable "authenticationErrorData" does not exist.', 8, $this->source); })()), "SchebTwoFactorBundle"), "html", null, true);
            yield "</p>
";
        }
        // line 10
        yield "
";
        // line 12
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["availableTwoFactorProviders"]) || array_key_exists("availableTwoFactorProviders", $context) ? $context["availableTwoFactorProviders"] : (function () { throw new RuntimeError('Variable "availableTwoFactorProviders" does not exist.', 12, $this->source); })())) > 1)) {
            // line 13
            yield "    <p>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("choose_provider", [], "SchebTwoFactorBundle"), "html", null, true);
            yield ":
        ";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableTwoFactorProviders"]) || array_key_exists("availableTwoFactorProviders", $context) ? $context["availableTwoFactorProviders"] : (function () { throw new RuntimeError('Variable "availableTwoFactorProviders" does not exist.', 14, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["provider"]) {
                // line 15
                yield "            <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("2fa_login", ["preferProvider" => $context["provider"]]), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["provider"], "html", null, true);
                yield "</a>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['provider'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            yield "    </p>
";
        }
        // line 19
        yield "
";
        // line 21
        yield "<p class=\"label\"><label for=\"_auth_code\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("auth_code", [], "SchebTwoFactorBundle"), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["twoFactorProvider"]) || array_key_exists("twoFactorProvider", $context) ? $context["twoFactorProvider"] : (function () { throw new RuntimeError('Variable "twoFactorProvider" does not exist.', 21, $this->source); })()), "html", null, true);
        yield ":</label></p>

<form class=\"form\" action=\"";
        // line 23
        yield (((($tmp = (isset($context["checkPathUrl"]) || array_key_exists("checkPathUrl", $context) ? $context["checkPathUrl"] : (function () { throw new RuntimeError('Variable "checkPathUrl" does not exist.', 23, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["checkPathUrl"]) || array_key_exists("checkPathUrl", $context) ? $context["checkPathUrl"] : (function () { throw new RuntimeError('Variable "checkPathUrl" does not exist.', 23, $this->source); })()), "html", null, true)) : ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["checkPathRoute"]) || array_key_exists("checkPathRoute", $context) ? $context["checkPathRoute"] : (function () { throw new RuntimeError('Variable "checkPathRoute" does not exist.', 23, $this->source); })()))));
        yield "\" method=\"post\">
    <p class=\"widget\">
        <input
            id=\"_auth_code\"
            type=\"text\"
            name=\"";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["authCodeParameterName"]) || array_key_exists("authCodeParameterName", $context) ? $context["authCodeParameterName"] : (function () { throw new RuntimeError('Variable "authCodeParameterName" does not exist.', 28, $this->source); })()), "html", null, true);
        yield "\"
            autocomplete=\"one-time-code\"
            autofocus
            ";
        // line 37
        yield "        />
    </p>

    ";
        // line 40
        if ((($tmp = (isset($context["displayTrustedOption"]) || array_key_exists("displayTrustedOption", $context) ? $context["displayTrustedOption"] : (function () { throw new RuntimeError('Variable "displayTrustedOption" does not exist.', 40, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 41
            yield "        <p class=\"widget\"><label for=\"_trusted\"><input id=\"_trusted\" type=\"checkbox\" name=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["trustedParameterName"]) || array_key_exists("trustedParameterName", $context) ? $context["trustedParameterName"] : (function () { throw new RuntimeError('Variable "trustedParameterName" does not exist.', 41, $this->source); })()), "html", null, true);
            yield "\" /> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("trusted", [], "SchebTwoFactorBundle"), "html", null, true);
            yield "</label></p>
    ";
        }
        // line 43
        yield "    ";
        if ((($tmp = (isset($context["isCsrfProtectionEnabled"]) || array_key_exists("isCsrfProtectionEnabled", $context) ? $context["isCsrfProtectionEnabled"] : (function () { throw new RuntimeError('Variable "isCsrfProtectionEnabled" does not exist.', 43, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 44
            yield "        <input type=\"hidden\" name=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["csrfParameterName"]) || array_key_exists("csrfParameterName", $context) ? $context["csrfParameterName"] : (function () { throw new RuntimeError('Variable "csrfParameterName" does not exist.', 44, $this->source); })()), "html", null, true);
            yield "\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken((isset($context["csrfTokenId"]) || array_key_exists("csrfTokenId", $context) ? $context["csrfTokenId"] : (function () { throw new RuntimeError('Variable "csrfTokenId" does not exist.', 44, $this->source); })())), "html", null, true);
            yield "\">
    ";
        }
        // line 46
        yield "    <p class=\"submit\"><input type=\"submit\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("login", [], "SchebTwoFactorBundle"), "html", null, true);
        yield "\" /></p>
</form>

";
        // line 50
        yield "<p class=\"cancel\"><a href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["logoutPath"]) || array_key_exists("logoutPath", $context) ? $context["logoutPath"] : (function () { throw new RuntimeError('Variable "logoutPath" does not exist.', 50, $this->source); })()), "html", null, true);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("cancel", [], "SchebTwoFactorBundle"), "html", null, true);
        yield "</a></p>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@!SchebTwoFactor/Authentication/form.html.twig";
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
        return array (  143 => 50,  136 => 46,  128 => 44,  125 => 43,  117 => 41,  115 => 40,  110 => 37,  104 => 28,  96 => 23,  88 => 21,  85 => 19,  81 => 17,  70 => 15,  66 => 14,  61 => 13,  59 => 12,  56 => 10,  50 => 8,  48 => 7,  45 => 5,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{#
This is a demo template for the authentication form. Please consider overwriting this with your own template,
especially when you're using different route names than the ones used here.
#}

{# Authentication errors #}
{% if authenticationError %}
<p>{{ authenticationError|trans(authenticationErrorData, 'SchebTwoFactorBundle') }}</p>
{% endif %}

{# Let the user select the authentication method #}
{% if availableTwoFactorProviders|length > 1 %}
    <p>{{ \"choose_provider\"|trans({}, 'SchebTwoFactorBundle') }}:
        {% for provider in availableTwoFactorProviders %}
            <a href=\"{{ path(\"2fa_login\", {\"preferProvider\": provider}) }}\">{{ provider }}</a>
        {% endfor %}
    </p>
{% endif %}

{# Display current two-factor provider #}
<p class=\"label\"><label for=\"_auth_code\">{{ \"auth_code\"|trans({}, 'SchebTwoFactorBundle') }} {{ twoFactorProvider }}:</label></p>

<form class=\"form\" action=\"{{ checkPathUrl ? checkPathUrl: path(checkPathRoute) }}\" method=\"post\">
    <p class=\"widget\">
        <input
            id=\"_auth_code\"
            type=\"text\"
            name=\"{{ authCodeParameterName }}\"
            autocomplete=\"one-time-code\"
            autofocus
            {#
            https://www.twilio.com/blog/html-attributes-two-factor-authentication-autocomplete
            If your 2fa methods are using numeric codes only, add these attributes for better user experience:
            inputmode=\"numeric\"
            pattern=\"[0-9]*\"
            #}
        />
    </p>

    {% if displayTrustedOption %}
        <p class=\"widget\"><label for=\"_trusted\"><input id=\"_trusted\" type=\"checkbox\" name=\"{{ trustedParameterName }}\" /> {{ \"trusted\"|trans({}, 'SchebTwoFactorBundle') }}</label></p>
    {% endif %}
    {% if isCsrfProtectionEnabled %}
        <input type=\"hidden\" name=\"{{ csrfParameterName }}\" value=\"{{ csrf_token(csrfTokenId) }}\">
    {% endif %}
    <p class=\"submit\"><input type=\"submit\" value=\"{{ \"login\"|trans({}, 'SchebTwoFactorBundle') }}\" /></p>
</form>

{# The logout link gives the user a way out if they can't complete two-factor authentication #}
<p class=\"cancel\"><a href=\"{{ logoutPath }}\">{{ \"cancel\"|trans({}, 'SchebTwoFactorBundle') }}</a></p>
", "@!SchebTwoFactor/Authentication/form.html.twig", "/Users/dheillyenzo/projet-chm/vendor/scheb/2fa-bundle/Resources/views/Authentication/form.html.twig");
    }
}
