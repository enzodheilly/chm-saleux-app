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

/* dashboard/components/card.html.twig */
class __TwigTemplate_bb89f56e9680e47772df29d5b01e33a6 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/components/card.html.twig"));

        // line 1
        yield "<div class=\"card ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 1, $this->source); })()), "html", null, true);
        yield "\">

    ";
        // line 3
        if ((array_key_exists("image", $context) && (isset($context["image"]) || array_key_exists("image", $context) ? $context["image"] : (function () { throw new RuntimeError('Variable "image" does not exist.', 3, $this->source); })()))) {
            // line 4
            yield "        <!-- MODE IMAGE (overlay + gradient) -->
        <div class=\"card-image-overlay\">
            <img src=\"";
            // line 6
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((isset($context["image"]) || array_key_exists("image", $context) ? $context["image"] : (function () { throw new RuntimeError('Variable "image" does not exist.', 6, $this->source); })())), "html", null, true);
            yield "\" alt=\"Image\">

            <div class=\"card-gradient\"></div>

            <div class=\"card-content-overlay\">
                ";
            // line 11
            yield (isset($context["content"]) || array_key_exists("content", $context) ? $context["content"] : (function () { throw new RuntimeError('Variable "content" does not exist.', 11, $this->source); })());
            yield "
            </div>
        </div>

    ";
        } else {
            // line 16
            yield "        <!-- MODE NORMAL (pour la LICENCE) -->
        <div class=\"card-content\">
            ";
            // line 18
            yield (isset($context["content"]) || array_key_exists("content", $context) ? $context["content"] : (function () { throw new RuntimeError('Variable "content" does not exist.', 18, $this->source); })());
            yield "
        </div>
    ";
        }
        // line 21
        yield "</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "dashboard/components/card.html.twig";
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
        return array (  83 => 21,  77 => 18,  73 => 16,  65 => 11,  57 => 6,  53 => 4,  51 => 3,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"card {{ class }}\">

    {% if image is defined and image %}
        <!-- MODE IMAGE (overlay + gradient) -->
        <div class=\"card-image-overlay\">
            <img src=\"{{ asset(image) }}\" alt=\"Image\">

            <div class=\"card-gradient\"></div>

            <div class=\"card-content-overlay\">
                {{ content|raw }}
            </div>
        </div>

    {% else %}
        <!-- MODE NORMAL (pour la LICENCE) -->
        <div class=\"card-content\">
            {{ content|raw }}
        </div>
    {% endif %}
</div>
", "dashboard/components/card.html.twig", "/Users/dheillyenzo/projet-chm/templates/dashboard/components/card.html.twig");
    }
}
