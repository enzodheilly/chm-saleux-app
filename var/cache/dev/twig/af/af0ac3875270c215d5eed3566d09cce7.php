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

/* 1_accueil/section9/section9.html.twig */
class __TwigTemplate_ec2e176cc569f1e930143b529d9ec983 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "1_accueil/section9/section9.html.twig"));

        // line 1
        yield "<section class=\"hero\">
  <div class=\"hero-slider\">
    <button class=\"slider-btn prev\">&#10094;</button>

    <div class=\"slider-track\">
      <img src=\"";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/club1.jpg"), "html", null, true);
        yield "\" alt=\"\">
      <img src=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/1.jpg"), "html", null, true);
        yield "\" alt=\"\">
      <img src=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/4.jpg"), "html", null, true);
        yield "\" alt=\"\">
      <img src=\"";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/3.jpg"), "html", null, true);
        yield "\" alt=\"\">
      <!-- ajoute autant d'images que tu veux -->
    </div>

    <button class=\"slider-btn next\">&#10095;</button>
  </div>
</section>

<script src=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/accueil/section9/section9.js"), "html", null, true);
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
        return "1_accueil/section9/section9.html.twig";
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
        return array (  75 => 17,  64 => 9,  60 => 8,  56 => 7,  52 => 6,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<section class=\"hero\">
  <div class=\"hero-slider\">
    <button class=\"slider-btn prev\">&#10094;</button>

    <div class=\"slider-track\">
      <img src=\"{{ asset('images/club/club1.jpg') }}\" alt=\"\">
      <img src=\"{{ asset('images/club/1.jpg') }}\" alt=\"\">
      <img src=\"{{ asset('images/club/4.jpg') }}\" alt=\"\">
      <img src=\"{{ asset('images/club/3.jpg') }}\" alt=\"\">
      <!-- ajoute autant d'images que tu veux -->
    </div>

    <button class=\"slider-btn next\">&#10095;</button>
  </div>
</section>

<script src=\"{{ asset('js/accueil/section9/section9.js') }}\"></script>
", "1_accueil/section9/section9.html.twig", "/Users/dheillyenzo/projet-chm/templates/1_accueil/section9/section9.html.twig");
    }
}
