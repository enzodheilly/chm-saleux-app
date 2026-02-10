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

/* _shared/_elios_widget.html.twig */
class __TwigTemplate_64c299cb75e76d6695d7266809bf33e3 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_shared/_elios_widget.html.twig"));

        // line 2
        yield "<div class=\"elios-panel\" id=\"eliosPanel\">
    <div class=\"elios-header\" style=\"justify-content: flex-end; background: transparent; padding: 10px;\">
        <button class=\"elios-close-btn\" id=\"eliosCloseBtn\" style=\"background: none; border: none; cursor: pointer; color: #666;\">
            <svg viewBox=\"0 0 24 24\" width=\"24\" height=\"24\"><path fill=\"currentColor\" d=\"M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z\"/></svg>
        </button>
    </div>

    <div class=\"elios-chat-body\" id=\"eliosChatBody\"></div>

    <div class=\"elios-footer\">
        <div class=\"elios-input-group\">
            <input type=\"text\" id=\"eliosInput\" placeholder=\"Posez votre question...\" maxlength=\"100\">
            <button id=\"eliosSendBtn\">
                <svg viewBox=\"0 0 24 24\" width=\"20\" height=\"20\"><path fill=\"currentColor\" d=\"M2.01 21L23 12 2.01 3 2 10l15 2-15 2z\"/></svg>
            </button>
        </div>
    </div>
</div>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "_shared/_elios_widget.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  45 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/_shared/_elios_widget.html.twig #}
<div class=\"elios-panel\" id=\"eliosPanel\">
    <div class=\"elios-header\" style=\"justify-content: flex-end; background: transparent; padding: 10px;\">
        <button class=\"elios-close-btn\" id=\"eliosCloseBtn\" style=\"background: none; border: none; cursor: pointer; color: #666;\">
            <svg viewBox=\"0 0 24 24\" width=\"24\" height=\"24\"><path fill=\"currentColor\" d=\"M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z\"/></svg>
        </button>
    </div>

    <div class=\"elios-chat-body\" id=\"eliosChatBody\"></div>

    <div class=\"elios-footer\">
        <div class=\"elios-input-group\">
            <input type=\"text\" id=\"eliosInput\" placeholder=\"Posez votre question...\" maxlength=\"100\">
            <button id=\"eliosSendBtn\">
                <svg viewBox=\"0 0 24 24\" width=\"20\" height=\"20\"><path fill=\"currentColor\" d=\"M2.01 21L23 12 2.01 3 2 10l15 2-15 2z\"/></svg>
            </button>
        </div>
    </div>
</div>", "_shared/_elios_widget.html.twig", "/Users/dheillyenzo/projet-chm/templates/_shared/_elios_widget.html.twig");
    }
}
