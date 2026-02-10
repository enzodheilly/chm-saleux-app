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

/* dashboard/components/modal_licence.html.twig */
class __TwigTemplate_ec57b84657a083a8df73f8c766ab0ae8 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/components/modal_licence.html.twig"));

        // line 1
        yield "<div class=\"card\">
    <div class=\"card-body\" id=\"licenceCard\">
        <button class=\"btn-primary\" id=\"openLicenceModal\">Ajouter mon numéro de licence</button>
    </div>
</div>

<!-- Modal -->
<div id=\"modalLicence\" class=\"modal\">
    <div class=\"modal-content\">
        <h2>Ajouter votre numéro de licence</h2>

        <input type=\"text\" id=\"licenceInput\" placeholder=\"CHM-XXXX\" required>
        <button class=\"btn-primary\" id=\"validateLicence\">Valider</button>
        <button class=\"btn-secondary close-modal\">Fermer</button>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "dashboard/components/modal_licence.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"card\">
    <div class=\"card-body\" id=\"licenceCard\">
        <button class=\"btn-primary\" id=\"openLicenceModal\">Ajouter mon numéro de licence</button>
    </div>
</div>

<!-- Modal -->
<div id=\"modalLicence\" class=\"modal\">
    <div class=\"modal-content\">
        <h2>Ajouter votre numéro de licence</h2>

        <input type=\"text\" id=\"licenceInput\" placeholder=\"CHM-XXXX\" required>
        <button class=\"btn-primary\" id=\"validateLicence\">Valider</button>
        <button class=\"btn-secondary close-modal\">Fermer</button>
    </div>
</div>
", "dashboard/components/modal_licence.html.twig", "/Users/dheillyenzo/projet-chm/templates/dashboard/components/modal_licence.html.twig");
    }
}
