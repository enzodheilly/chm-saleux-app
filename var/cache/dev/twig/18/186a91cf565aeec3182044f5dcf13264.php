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

/* dashboard/sidebar.html.twig */
class __TwigTemplate_3263d3a114a4e85aea275bccb770d002 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/sidebar.html.twig"));

        // line 1
        yield "<div class=\"sidebar\" style=\"border-top:1px solid #2a2f37; display:flex; flex-direction:column; height:100vh; overflow-y:auto;\">

    <div class=\"sidebar-content\">
        <nav class=\"sidebar-nav\">
            <div class=\"sidebar-section\">
                <button class=\"nav-item active\" data-tab=\"tab-dashboard\">
                    <span class=\"icon\">
                        <img src=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/utilisateur.png"), "html", null, true);
        yield "\" width=\"24\" height=\"24\" style=\"margin-left:0px;\">
                    </span>
                    <span class=\"label\" style=\"font-size:0.7rem;margin-top:-9px;color:#fff;\">Compte</span>
                </button>

                <button class=\"nav-item\" data-tab=\"tab-licence\">
                    <img src=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/licence.png"), "html", null, true);
        yield "\" width=\"35\" height=\"35\">
                    <span class=\"label\" style=\"font-size:0.7rem;margin-top:-15px;color:#fff;\">Licence</span>
                </button>

                <button class=\"nav-item\" data-tab=\"tab-planning\">
                    <img src=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/calendrier.png"), "html", null, true);
        yield "\" width=\"25\" height=\"25\">
                    <span class=\"label\" style=\"font-size:0.7rem;margin-top:-5px;color:#fff;\">Planning</span>
                </button>

                              <button class=\"nav-item\" data-tab=\"tab-event\">
                    <img src=\"";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/event.png"), "html", null, true);
        yield "\" width=\"25\" height=\"25\">
                    <span class=\"label\" style=\"font-size:0.7rem;margin-top:-5px;color:#fff;\">Événements</span>
                </button>

                <button class=\"nav-item\" data-tab=\"tab-messages\">
                    <img src=\"";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/message.png"), "html", null, true);
        yield "\" width=\"24\" height=\"24\">
                    <span class=\"label\" style=\"font-size:0.7rem;margin-top:-7px;color:#fff;\">Messages</span>
                </button>

                       <button class=\"nav-item\" data-tab=\"tab-boutique\">
                    <img src=\"";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/boutique.png"), "html", null, true);
        yield "\" width=\"24\" height=\"24\">
                    <span class=\"label\" style=\"font-size:0.7rem;margin-top:-7px;color:#fff;\">Boutique du club</span>
                </button>

                ";
        // line 39
        yield "                ";
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 40
            yield "                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
            yield "\" class=\"nav-item\" style=\"text-decoration: none; border: 1px solid var(--accent); margin-bottom: 10px; background: rgba(255, 102, 0, 0.05);\">
                    <span class=\"icon\">
                        ";
            // line 43
            yield "                        <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/admin_icon.png"), "html", null, true);
            yield "\" width=\"24\" height=\"24\">
                    </span>
                    <span class=\"label\" style=\"font-size:0.7rem; margin-top:-7px; color:var(--accent); font-weight: bold;\">ADMINISTRATION</span>
                </a>
                <div class=\"divider\" style=\"height: 1px; background: #2a2f37; margin: 10px 0;\"></div>
                ";
        }
        // line 49
        yield "            </div>
        </nav>


<a href=\"";
        // line 53
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\" class=\"return-button\">Retour au site</a>


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
        return "dashboard/sidebar.html.twig";
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
        return array (  127 => 53,  121 => 49,  111 => 43,  105 => 40,  102 => 39,  95 => 34,  87 => 29,  79 => 24,  71 => 19,  63 => 14,  54 => 8,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"sidebar\" style=\"border-top:1px solid #2a2f37; display:flex; flex-direction:column; height:100vh; overflow-y:auto;\">

    <div class=\"sidebar-content\">
        <nav class=\"sidebar-nav\">
            <div class=\"sidebar-section\">
                <button class=\"nav-item active\" data-tab=\"tab-dashboard\">
                    <span class=\"icon\">
                        <img src=\"{{ asset('images/utilisateur.png') }}\" width=\"24\" height=\"24\" style=\"margin-left:0px;\">
                    </span>
                    <span class=\"label\" style=\"font-size:0.7rem;margin-top:-9px;color:#fff;\">Compte</span>
                </button>

                <button class=\"nav-item\" data-tab=\"tab-licence\">
                    <img src=\"{{ asset('images/licence.png') }}\" width=\"35\" height=\"35\">
                    <span class=\"label\" style=\"font-size:0.7rem;margin-top:-15px;color:#fff;\">Licence</span>
                </button>

                <button class=\"nav-item\" data-tab=\"tab-planning\">
                    <img src=\"{{ asset('images/calendrier.png') }}\" width=\"25\" height=\"25\">
                    <span class=\"label\" style=\"font-size:0.7rem;margin-top:-5px;color:#fff;\">Planning</span>
                </button>

                              <button class=\"nav-item\" data-tab=\"tab-event\">
                    <img src=\"{{ asset('images/event.png') }}\" width=\"25\" height=\"25\">
                    <span class=\"label\" style=\"font-size:0.7rem;margin-top:-5px;color:#fff;\">Événements</span>
                </button>

                <button class=\"nav-item\" data-tab=\"tab-messages\">
                    <img src=\"{{ asset('images/message.png') }}\" width=\"24\" height=\"24\">
                    <span class=\"label\" style=\"font-size:0.7rem;margin-top:-7px;color:#fff;\">Messages</span>
                </button>

                       <button class=\"nav-item\" data-tab=\"tab-boutique\">
                    <img src=\"{{ asset('images/boutique.png') }}\" width=\"24\" height=\"24\">
                    <span class=\"label\" style=\"font-size:0.7rem;margin-top:-7px;color:#fff;\">Boutique du club</span>
                </button>

                {# === BOUTON ADMIN (Visible uniquement pour les Admins) === #}
                {% if is_granted('ROLE_ADMIN') %}
                <a href=\"{{ path('admin_dashboard') }}\" class=\"nav-item\" style=\"text-decoration: none; border: 1px solid var(--accent); margin-bottom: 10px; background: rgba(255, 102, 0, 0.05);\">
                    <span class=\"icon\">
                        {# Utilise une icône qui claque, comme un bouclier ou un engrenage #}
                        <img src=\"{{ asset('images/admin_icon.png') }}\" width=\"24\" height=\"24\">
                    </span>
                    <span class=\"label\" style=\"font-size:0.7rem; margin-top:-7px; color:var(--accent); font-weight: bold;\">ADMINISTRATION</span>
                </a>
                <div class=\"divider\" style=\"height: 1px; background: #2a2f37; margin: 10px 0;\"></div>
                {% endif %}
            </div>
        </nav>


<a href=\"{{ path('home') }}\" class=\"return-button\">Retour au site</a>


    </div>

</div>
", "dashboard/sidebar.html.twig", "/Users/dheillyenzo/projet-chm/templates/dashboard/sidebar.html.twig");
    }
}
