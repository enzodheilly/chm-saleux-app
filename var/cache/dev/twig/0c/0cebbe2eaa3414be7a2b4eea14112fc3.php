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

/* assistant/assistant.html.twig */
class __TwigTemplate_a0429d14c4a40acbdbc8bf4a375c01eb extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "assistant/assistant.html.twig"));

        // line 1
        yield "<div class=\"assistant-bubble\" id=\"assistantWidgetOpen\">
    <div class=\"loader\">
        <div class=\"sphere\"></div>
        </div>
</div>

<div class=\"assistant-panel\" id=\"assistantWidgetPanel\">
    
    <div class=\"assistant-header-new\">
        <button type=\"button\" class=\"close-panel\" id=\"assistantWidgetClose\">
            <svg viewBox=\"0 0 24 24\" width=\"24\" height=\"24\"><path d=\"M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z\"/></svg>
        </button>
    </div>

    <div class=\"assistant-body\" id=\"assistantWidgetBody\">
        
        <div class=\"chat-row assistant-row\">
            <div class=\"avatar-container\">
                <img src=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/avatar-elios.png"), "html", null, true);
        yield "\" alt=\"Elios\" class=\"assistant-avatar\">
                <span class=\"bot-name\">Elios</span>
            </div>
            <div class=\"bubble assistant-bubble-text\">
                Bonjour ! Je suis Elios, en quoi puis-je vous aider aujourd'hui ? 😊
            </div>
        </div>

        <div class=\"chat-info-box\">
            <p>Pour vous aider davantage, posez-moi une question sur le club ou l'entraînement :</p>
            <button class=\"btn-action\">Consulter les tarifs</button>
        </div>

        <div class=\"chat-row user-row\">
            <div class=\"user-label\">Vous</div>
            <div class=\"bubble user-bubble-text\">
                Comment m'inscrire ?
            </div>
        </div>

    </div>

    <div class=\"assistant-footer\">
        <div class=\"input-container\">
            <input type=\"text\" id=\"assistantInput\" placeholder=\"Votre message (max. 100 caractères)\" maxlength=\"100\">
            <button type=\"submit\" id=\"sendMessage\">
                <svg viewBox=\"0 0 24 24\" width=\"20\" height=\"20\"><path d=\"M2.01 21L23 12 2.01 3 2 10l15 2-15 2z\"/></svg>
            </button>
        </div>
        <div class=\"footer-sub-links\">
             <a href=\"#\">Translate</a>
             <a href=\"#\">Envoyer la transcription</a>
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
        return "assistant/assistant.html.twig";
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
        return array (  65 => 19,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"assistant-bubble\" id=\"assistantWidgetOpen\">
    <div class=\"loader\">
        <div class=\"sphere\"></div>
        </div>
</div>

<div class=\"assistant-panel\" id=\"assistantWidgetPanel\">
    
    <div class=\"assistant-header-new\">
        <button type=\"button\" class=\"close-panel\" id=\"assistantWidgetClose\">
            <svg viewBox=\"0 0 24 24\" width=\"24\" height=\"24\"><path d=\"M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z\"/></svg>
        </button>
    </div>

    <div class=\"assistant-body\" id=\"assistantWidgetBody\">
        
        <div class=\"chat-row assistant-row\">
            <div class=\"avatar-container\">
                <img src=\"{{ asset('images/avatar-elios.png') }}\" alt=\"Elios\" class=\"assistant-avatar\">
                <span class=\"bot-name\">Elios</span>
            </div>
            <div class=\"bubble assistant-bubble-text\">
                Bonjour ! Je suis Elios, en quoi puis-je vous aider aujourd'hui ? 😊
            </div>
        </div>

        <div class=\"chat-info-box\">
            <p>Pour vous aider davantage, posez-moi une question sur le club ou l'entraînement :</p>
            <button class=\"btn-action\">Consulter les tarifs</button>
        </div>

        <div class=\"chat-row user-row\">
            <div class=\"user-label\">Vous</div>
            <div class=\"bubble user-bubble-text\">
                Comment m'inscrire ?
            </div>
        </div>

    </div>

    <div class=\"assistant-footer\">
        <div class=\"input-container\">
            <input type=\"text\" id=\"assistantInput\" placeholder=\"Votre message (max. 100 caractères)\" maxlength=\"100\">
            <button type=\"submit\" id=\"sendMessage\">
                <svg viewBox=\"0 0 24 24\" width=\"20\" height=\"20\"><path d=\"M2.01 21L23 12 2.01 3 2 10l15 2-15 2z\"/></svg>
            </button>
        </div>
        <div class=\"footer-sub-links\">
             <a href=\"#\">Translate</a>
             <a href=\"#\">Envoyer la transcription</a>
        </div>
    </div>
</div>", "assistant/assistant.html.twig", "/Users/dheillyenzo/projet-chm/templates/assistant/assistant.html.twig");
    }
}
