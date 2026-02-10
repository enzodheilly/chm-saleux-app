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

/* dashboard/change_password_sidebar.html.twig */
class __TwigTemplate_ded685cbbfb4fc7c9c5a9f660c5c1aed extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/change_password_sidebar.html.twig"));

        // line 1
        yield "<div id=\"sidebar-password\" class=\"sidebar-right\">
  <div class=\"sidebar-header\">
    <h3 style=\"color:#fff;\">Modifier mon mot de passe</h3>
    <span id=\"close-password\" class=\"close-btn\">&times;</span>
  </div>

  <div class=\"sidebar-separator\"></div>

  <div class=\"settings-section\">
    <!-- Conteneur des messages flash -->
    <div id=\"password-flash-container\"></div>

    <form id=\"change-password-form\" action=\"";
        // line 13
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("change_password");
        yield "\" method=\"POST\">
      <ul>
        <li>
          <label for=\"current-password\"><strong>Mot de passe actuel</strong></label>
          <input type=\"password\" id=\"current-password\" name=\"current_password\" required>
        </li>
        <li>
          <label for=\"new-password\"><strong>Nouveau mot de passe</strong></label>
          <input type=\"password\" id=\"new-password\" name=\"new_password\" required>
        </li>
        <li>
          <label for=\"confirm-password\"><strong>Confirmer le mot de passe</strong></label>
          <input type=\"password\" id=\"confirm-password\" name=\"confirm_password\" required>
        </li>
        <li>
          <button type=\"submit\">Valider</button>
        </li>
      </ul>
    </form>
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
        return "dashboard/change_password_sidebar.html.twig";
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
        return array (  59 => 13,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div id=\"sidebar-password\" class=\"sidebar-right\">
  <div class=\"sidebar-header\">
    <h3 style=\"color:#fff;\">Modifier mon mot de passe</h3>
    <span id=\"close-password\" class=\"close-btn\">&times;</span>
  </div>

  <div class=\"sidebar-separator\"></div>

  <div class=\"settings-section\">
    <!-- Conteneur des messages flash -->
    <div id=\"password-flash-container\"></div>

    <form id=\"change-password-form\" action=\"{{ path('change_password') }}\" method=\"POST\">
      <ul>
        <li>
          <label for=\"current-password\"><strong>Mot de passe actuel</strong></label>
          <input type=\"password\" id=\"current-password\" name=\"current_password\" required>
        </li>
        <li>
          <label for=\"new-password\"><strong>Nouveau mot de passe</strong></label>
          <input type=\"password\" id=\"new-password\" name=\"new_password\" required>
        </li>
        <li>
          <label for=\"confirm-password\"><strong>Confirmer le mot de passe</strong></label>
          <input type=\"password\" id=\"confirm-password\" name=\"confirm_password\" required>
        </li>
        <li>
          <button type=\"submit\">Valider</button>
        </li>
      </ul>
    </form>
  </div>
</div>
", "dashboard/change_password_sidebar.html.twig", "/Users/dheillyenzo/projet-chm/templates/dashboard/change_password_sidebar.html.twig");
    }
}
