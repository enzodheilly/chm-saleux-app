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

/* 1_accueil/section8/section8.html.twig */
class __TwigTemplate_3058155e05789273ada6c99bedd4efe3 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "1_accueil/section8/section8.html.twig"));

        // line 1
        yield "<section class=\"nos-pratiques\">
  <h2 class=\"section-title\">Nos deux espaces d'entraînement</h2>

  <div class=\"images-container\">
    <div class=\"image left\">
      <img src=\"";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/nos_pratiques/halterophilie/1.jpg"), "html", null, true);
        yield "\" alt=\"Haltérophilie\">
      <div class=\"image-title\">HALTÉROPHILIE</div>
      <a href=\"";
        // line 8
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("pratique_haltérophilie");
        yield "\" class=\"discover-btn1\">Découvrir</a>
    </div>

    <div class=\"image right\">
      <img src=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/nos_pratiques/musculation/histoire-club.jpg"), "html", null, true);
        yield "\" alt=\"Musculation\">
      <div class=\"image-title\">MUSCULATION</div>
      <a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("pratique_musculation");
        yield "\" class=\"discover-btn1\">Découvrir</a>
    </div>
  </div>
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
        return "1_accueil/section8/section8.html.twig";
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
        return array (  69 => 14,  64 => 12,  57 => 8,  52 => 6,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<section class=\"nos-pratiques\">
  <h2 class=\"section-title\">Nos deux espaces d'entraînement</h2>

  <div class=\"images-container\">
    <div class=\"image left\">
      <img src=\"{{ asset('images/nos_pratiques/halterophilie/1.jpg') }}\" alt=\"Haltérophilie\">
      <div class=\"image-title\">HALTÉROPHILIE</div>
      <a href=\"{{ path('pratique_haltérophilie') }}\" class=\"discover-btn1\">Découvrir</a>
    </div>

    <div class=\"image right\">
      <img src=\"{{ asset('images/nos_pratiques/musculation/histoire-club.jpg') }}\" alt=\"Musculation\">
      <div class=\"image-title\">MUSCULATION</div>
      <a href=\"{{ path('pratique_musculation') }}\" class=\"discover-btn1\">Découvrir</a>
    </div>
  </div>
</section>
", "1_accueil/section8/section8.html.twig", "/Users/dheillyenzo/projet-chm/templates/1_accueil/section8/section8.html.twig");
    }
}
