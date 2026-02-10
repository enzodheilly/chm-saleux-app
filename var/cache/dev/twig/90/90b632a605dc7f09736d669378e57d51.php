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

/* 1_accueil/section5/section5.html.twig */
class __TwigTemplate_37294a38e6ce8bcba9f6c9207dfb65f3 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "1_accueil/section5/section5.html.twig"));

        // line 1
        yield "<!-- ==================== SECTION APP MOBILE ==================== -->
<section class=\"app-mobile-section\">
  <div class=\"app-mobile-container\">
    <!-- Texte et accroche -->
    <div class=\"app-mobile-text\">
      <h2>CHM SALEUX BIENTÔT DANS VOTRE POCHE</h2>
      
      <!-- Nouvelle zone explicative -->
      <div class=\"app-description\">
        <p>
          Notre application vous permet de gérer facilement vos activités avec le club. Vous pourrez consulter le planning, réserver vos séances, suivre vos progrès et rester connecté avec notre communauté, le tout depuis votre smartphone.
        </p>
      </div>
      
      <p>
        Retrouvez toutes nos fonctionnalités directement sur votre smartphone : planning, réservations, suivi de vos entraînements et plus encore !
      </p>

      <!-- Texte au-dessus du logo et boutons -->
      <h3 class=\"download-text\">Télécharge l'app <span>CHM Saleux</span></h3>

      <!-- Ligne logo + boutons -->
      <div class=\"logo-buttons-line\">
        <!-- Logo de l'application -->
        <div class=\"app-logo\">
          <img src=\"";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/app-logo.png"), "html", null, true);
        yield "\" alt=\"Logo CHM Saleux\">
        </div>

        <!-- Boutons -->
        <div class=\"app-buttons\">
          <a href=\"#\" class=\"app-btn store ios\">
            <img src=\"";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/apple-logo.png"), "html", null, true);
        yield "\" alt=\"Apple Logo\" class=\"store-logo\">
            <div class=\"store-text\">
              <span class=\"top-text\">Bientôt disponible sur</span>
              <span class=\"bottom-text\">Apple Store</span>
            </div>
          </a>

          <a href=\"#\" class=\"app-btn store android\">
            <img src=\"";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/google-play-logo.png"), "html", null, true);
        yield "\" alt=\"Google Play Logo\" class=\"store-logo\">
            <div class=\"store-text\">
              <span class=\"top-text\">Bientôt disponible sur</span>
              <span class=\"bottom-text\">Google Play</span>
            </div>
          </a>
        </div>
      </div>
    </div>

    <!-- Visuel téléphone -->
    <div class=\"app-mobile-image\">
      <img rel=\"preload\" src=\"";
        // line 52
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/mockup.png"), "html", null, true);
        yield "\" alt=\"Image du club\">
    </div>
  </div>
</section>

 <script src=\"";
        // line 57
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/accueil/section5/section5.js"), "html", null, true);
        yield "\" defer></script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "1_accueil/section5/section5.html.twig";
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
        return array (  115 => 57,  107 => 52,  92 => 40,  81 => 32,  72 => 26,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!-- ==================== SECTION APP MOBILE ==================== -->
<section class=\"app-mobile-section\">
  <div class=\"app-mobile-container\">
    <!-- Texte et accroche -->
    <div class=\"app-mobile-text\">
      <h2>CHM SALEUX BIENTÔT DANS VOTRE POCHE</h2>
      
      <!-- Nouvelle zone explicative -->
      <div class=\"app-description\">
        <p>
          Notre application vous permet de gérer facilement vos activités avec le club. Vous pourrez consulter le planning, réserver vos séances, suivre vos progrès et rester connecté avec notre communauté, le tout depuis votre smartphone.
        </p>
      </div>
      
      <p>
        Retrouvez toutes nos fonctionnalités directement sur votre smartphone : planning, réservations, suivi de vos entraînements et plus encore !
      </p>

      <!-- Texte au-dessus du logo et boutons -->
      <h3 class=\"download-text\">Télécharge l'app <span>CHM Saleux</span></h3>

      <!-- Ligne logo + boutons -->
      <div class=\"logo-buttons-line\">
        <!-- Logo de l'application -->
        <div class=\"app-logo\">
          <img src=\"{{ asset('images/app-logo.png') }}\" alt=\"Logo CHM Saleux\">
        </div>

        <!-- Boutons -->
        <div class=\"app-buttons\">
          <a href=\"#\" class=\"app-btn store ios\">
            <img src=\"{{ asset('images/apple-logo.png') }}\" alt=\"Apple Logo\" class=\"store-logo\">
            <div class=\"store-text\">
              <span class=\"top-text\">Bientôt disponible sur</span>
              <span class=\"bottom-text\">Apple Store</span>
            </div>
          </a>

          <a href=\"#\" class=\"app-btn store android\">
            <img src=\"{{ asset('images/google-play-logo.png') }}\" alt=\"Google Play Logo\" class=\"store-logo\">
            <div class=\"store-text\">
              <span class=\"top-text\">Bientôt disponible sur</span>
              <span class=\"bottom-text\">Google Play</span>
            </div>
          </a>
        </div>
      </div>
    </div>

    <!-- Visuel téléphone -->
    <div class=\"app-mobile-image\">
      <img rel=\"preload\" src=\"{{ asset('images/mockup.png') }}\" alt=\"Image du club\">
    </div>
  </div>
</section>

 <script src=\"{{ asset('js/accueil/section5/section5.js') }}\" defer></script>
", "1_accueil/section5/section5.html.twig", "/Users/dheillyenzo/projet-chm/templates/1_accueil/section5/section5.html.twig");
    }
}
