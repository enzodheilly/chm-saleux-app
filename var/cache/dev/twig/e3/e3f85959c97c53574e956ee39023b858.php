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

/* /navbar/navigation.html.twig */
class __TwigTemplate_e3e2222db94098f6742bec6a8e812335 extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "/navbar/navigation.html.twig"));

        // line 1
        yield "<nav class=\"nav-fixed\">
    <div class=\"info-banner\">
        <div class=\"info-banner-content\">
<div class=\"info-banner-horaire\">
    <button class=\"mobile-info-arrow mobile-info-prev\" aria-label=\"Précédent\">
        <i class=\"fa-solid fa-chevron-left\"></i>
    </button>

    <p class=\"ffhm-label info-slide active\">
        <img src=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/nav/test.png"), "html", null, true);
        yield "\" alt=\"Logo FFHM\" style=\"height: 24px; vertical-align: middle;\">
        <strong>Club affilié FFHM</strong>
    </p>

    <p class=\"location-label info-slide\">
        <i class=\"fa-solid fa-location-dot\" style=\"color: #fff;\"></i>
        <strong>Saleux – Complexe sportif</strong>
    </p>

<p class=\"phone-label info-slide\">
        <a href=\"tel:0322897257\" style=\"color: #fff; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;\">
            <i class=\"fa-solid fa-phone\"></i>
            <strong>03.22.89.72.57</strong>
        </a>
    </p>

<p class=\"info-slide\" style=\"white-space: nowrap;\">
    ";
        // line 28
        yield "    <a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_partenaire");
        yield "\" style=\"color: #fff; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;\">
        <i class=\"fa-solid fa-handshake\"></i>
        <strong>Devenir partenaire du club</strong>
    </a>
</p>

    <button class=\"mobile-info-arrow mobile-info-next\" aria-label=\"Suivant\">
        <i class=\"fa-solid fa-chevron-right\"></i>
    </button>
</div>

            <div class=\"info-banner-links\">
                <a href=\"";
        // line 40
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("faq");
        yield "\" class=\"info-link\"><i class=\"fa-solid fa-headset\"></i> J'ai besoin d'aide</a>
                ";
        // line 41
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 41, $this->source); })()), "user", [], "any", false, false, false, 41)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 42
            yield "                    <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\" class=\"info-link\"><i class=\"fa-solid fa-right-from-bracket\"></i> Déconnexion</a>
                ";
        } else {
            // line 44
            yield "<a href=\"#\" class=\"info-link js-trigger-login\">
    <i class=\"fa-regular fa-user\"></i> Mon espace adhérent
</a>                ";
        }
        // line 47
        yield "            </div>
        </div>
    </div>

    <div class=\"nav-content\">
        <div class=\"nav-logo-container\">
            <div class=\"logo-rectangle\">
                <a href=\"";
        // line 54
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\" class=\"logo-link\">
                    <img id=\"nav-logo\" src=\"";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo/new.png"), "html", null, true);
        yield "\" alt=\"CHM Saleux\"/>
                </a>
            </div>
        </div>

        <div class=\"nav-links-center\">
            <a href=\"";
        // line 61
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\">Accueil</a>
            <a class=\"nav-link has-arrow\" id=\"club-hover-link\">Club & membres du bureau<i class=\"fa-solid fa-chevron-down nav-arrow\"></i></a>
            <a href=\"";
        // line 63
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_pricing");
        yield "\">Nos tarifs</a>
            <a href=\"";
        // line 64
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("ecole");
        yield "\">Notre école</a>
            <a href=\"";
        // line 65
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("competition");
        yield "\">Competitions & résultats</a>
        </div>

        <div class=\"nav-buttons\">
            <a id=\"assistantWidgetOpen\" class=\"btn-ai-assistant mobile-item-2\" title=\"Assistant IA\">
                <img src=\"";
        // line 70
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/ia.png"), "html", null, true);
        yield "\" alt=\"Elios Avatar\" class=\"elios-avatar-icon\">
            </a>

            ";
        // line 73
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 73, $this->source); })()), "user", [], "any", false, false, false, 73)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 74
            yield "                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard");
            yield "\" class=\"btn-inscription mobile-item-1\">Mon espace</a>
            ";
        } else {
            // line 76
            yield "                <a href=\"#\" class=\"btn-inscription js-open-register-modal mobile-item-1\">S'INSCRIRE</a>
            ";
        }
        // line 78
        yield "
            <button class=\"hamburger-menu mobile-item-3\" aria-label=\"Menu\">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>

    <div class=\"mobile-nav-overlay\">
<div class=\"mobile-nav-links\">
    <a href=\"";
        // line 89
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\">Accueil</a>

    <div class=\"mobile-dropdown-container\">
        <div class=\"mobile-dropdown-trigger\">
            <span>Club & membres du bureau</span>
            <i class=\"fa-solid fa-chevron-down mobile-arrow-icon\"></i>
        </div>

        <div class=\"mobile-dropdown-content\">
            
            <div class=\"mobile-sub-group\">
                <span class=\"mobile-sub-title\">Services du Club</span>
                <a href=\"";
        // line 101
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("halterophilie");
        yield "\">Haltérophilie</a>
                <a href=\"";
        // line 102
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("musculation");
        yield "\">Musculation</a>
                <a href=\"";
        // line 103
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cours_collectifs");
        yield "\">Cours collectifs</a>
                <a href=\"";
        // line 104
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("seance_essai");
        yield "\">Séance d'essai</a>
                <a href=\"";
        // line 105
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("evenements");
        yield "\">Événements organisés</a>
                <a href=\"";
        // line 106
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sauna");
        yield "\">Sauna</a>
            </div>

            <div class=\"mobile-sub-group\">
                <span class=\"mobile-sub-title\">Membres du bureau</span>
                <a href=\"";
        // line 111
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("president");
        yield "\">Le Président</a>
                <a href=\"";
        // line 112
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("tresorier");
        yield "\">Le Trésorier</a>
                <a href=\"";
        // line 113
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("secretaire");
        yield "\">La Secrétaire</a>
                <a href=\"";
        // line 114
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("membres_bureau");
        yield "\">Les membres du bureau</a>
            </div>

            <div class=\"mobile-sub-group\">
                <span class=\"mobile-sub-title\">À propos de notre club</span>
                <a href=\"";
        // line 119
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_club");
        yield "\">Présentation du club</a>
                <a href=\"";
        // line 120
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("labels_club");
        yield "\">Les labels du club</a>
                <a href=\"";
        // line 121
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("horaires");
        yield "\">Les horaires</a>
            </div>
        </div>
    </div>
    <a href=\"";
        // line 125
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("halterophilie");
        yield "\">Nos tarifs</a>
    <a href=\"";
        // line 126
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("ecole");
        yield "\">Notre école</a>
    <a href=\"";
        // line 127
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("competition");
        yield "\">Compétitions</a>
    
    <hr>
    
    <a href=\"";
        // line 131
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("faq");
        yield "\"><i class=\"fa-solid fa-headset\"></i> Aide</a>
    ";
        // line 132
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 132, $this->source); })()), "user", [], "any", false, false, false, 132)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 133
            yield "        <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\"><i class=\"fa-regular fa-user\"></i> Espace adhérent</a>
    ";
        }
        // line 135
        yield "</div>
    </div>
</nav>

";
        // line 139
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 140
        yield "    <script src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/nav/nav.js"), "html", null, true);
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
        return "/navbar/navigation.html.twig";
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
        return array (  312 => 140,  295 => 139,  289 => 135,  283 => 133,  281 => 132,  277 => 131,  270 => 127,  266 => 126,  262 => 125,  255 => 121,  251 => 120,  247 => 119,  239 => 114,  235 => 113,  231 => 112,  227 => 111,  219 => 106,  215 => 105,  211 => 104,  207 => 103,  203 => 102,  199 => 101,  184 => 89,  171 => 78,  167 => 76,  161 => 74,  159 => 73,  153 => 70,  145 => 65,  141 => 64,  137 => 63,  132 => 61,  123 => 55,  119 => 54,  110 => 47,  105 => 44,  99 => 42,  97 => 41,  93 => 40,  77 => 28,  57 => 10,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<nav class=\"nav-fixed\">
    <div class=\"info-banner\">
        <div class=\"info-banner-content\">
<div class=\"info-banner-horaire\">
    <button class=\"mobile-info-arrow mobile-info-prev\" aria-label=\"Précédent\">
        <i class=\"fa-solid fa-chevron-left\"></i>
    </button>

    <p class=\"ffhm-label info-slide active\">
        <img src=\"{{ asset('images/nav/test.png') }}\" alt=\"Logo FFHM\" style=\"height: 24px; vertical-align: middle;\">
        <strong>Club affilié FFHM</strong>
    </p>

    <p class=\"location-label info-slide\">
        <i class=\"fa-solid fa-location-dot\" style=\"color: #fff;\"></i>
        <strong>Saleux – Complexe sportif</strong>
    </p>

<p class=\"phone-label info-slide\">
        <a href=\"tel:0322897257\" style=\"color: #fff; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;\">
            <i class=\"fa-solid fa-phone\"></i>
            <strong>03.22.89.72.57</strong>
        </a>
    </p>

<p class=\"info-slide\" style=\"white-space: nowrap;\">
    {# J'ai remplacé # par path('app_partenaire') #}
    <a href=\"{{ path('app_partenaire') }}\" style=\"color: #fff; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;\">
        <i class=\"fa-solid fa-handshake\"></i>
        <strong>Devenir partenaire du club</strong>
    </a>
</p>

    <button class=\"mobile-info-arrow mobile-info-next\" aria-label=\"Suivant\">
        <i class=\"fa-solid fa-chevron-right\"></i>
    </button>
</div>

            <div class=\"info-banner-links\">
                <a href=\"{{ path('faq') }}\" class=\"info-link\"><i class=\"fa-solid fa-headset\"></i> J'ai besoin d'aide</a>
                {% if app.user %}
                    <a href=\"{{ path('app_logout') }}\" class=\"info-link\"><i class=\"fa-solid fa-right-from-bracket\"></i> Déconnexion</a>
                {% else %}
<a href=\"#\" class=\"info-link js-trigger-login\">
    <i class=\"fa-regular fa-user\"></i> Mon espace adhérent
</a>                {% endif %}
            </div>
        </div>
    </div>

    <div class=\"nav-content\">
        <div class=\"nav-logo-container\">
            <div class=\"logo-rectangle\">
                <a href=\"{{ path('home') }}\" class=\"logo-link\">
                    <img id=\"nav-logo\" src=\"{{ asset('images/logo/new.png') }}\" alt=\"CHM Saleux\"/>
                </a>
            </div>
        </div>

        <div class=\"nav-links-center\">
            <a href=\"{{ path('home') }}\">Accueil</a>
            <a class=\"nav-link has-arrow\" id=\"club-hover-link\">Club & membres du bureau<i class=\"fa-solid fa-chevron-down nav-arrow\"></i></a>
            <a href=\"{{ path('app_pricing') }}\">Nos tarifs</a>
            <a href=\"{{ path('ecole') }}\">Notre école</a>
            <a href=\"{{ path('competition') }}\">Competitions & résultats</a>
        </div>

        <div class=\"nav-buttons\">
            <a id=\"assistantWidgetOpen\" class=\"btn-ai-assistant mobile-item-2\" title=\"Assistant IA\">
                <img src=\"{{ asset('images/ia.png') }}\" alt=\"Elios Avatar\" class=\"elios-avatar-icon\">
            </a>

            {% if app.user %}
                <a href=\"{{ path('dashboard') }}\" class=\"btn-inscription mobile-item-1\">Mon espace</a>
            {% else %}
                <a href=\"#\" class=\"btn-inscription js-open-register-modal mobile-item-1\">S'INSCRIRE</a>
            {% endif %}

            <button class=\"hamburger-menu mobile-item-3\" aria-label=\"Menu\">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>

    <div class=\"mobile-nav-overlay\">
<div class=\"mobile-nav-links\">
    <a href=\"{{ path('home') }}\">Accueil</a>

    <div class=\"mobile-dropdown-container\">
        <div class=\"mobile-dropdown-trigger\">
            <span>Club & membres du bureau</span>
            <i class=\"fa-solid fa-chevron-down mobile-arrow-icon\"></i>
        </div>

        <div class=\"mobile-dropdown-content\">
            
            <div class=\"mobile-sub-group\">
                <span class=\"mobile-sub-title\">Services du Club</span>
                <a href=\"{{ path('halterophilie') }}\">Haltérophilie</a>
                <a href=\"{{ path('musculation') }}\">Musculation</a>
                <a href=\"{{ path('cours_collectifs') }}\">Cours collectifs</a>
                <a href=\"{{ path('seance_essai') }}\">Séance d'essai</a>
                <a href=\"{{ path('evenements') }}\">Événements organisés</a>
                <a href=\"{{ path('sauna') }}\">Sauna</a>
            </div>

            <div class=\"mobile-sub-group\">
                <span class=\"mobile-sub-title\">Membres du bureau</span>
                <a href=\"{{ path('president') }}\">Le Président</a>
                <a href=\"{{ path('tresorier') }}\">Le Trésorier</a>
                <a href=\"{{ path('secretaire') }}\">La Secrétaire</a>
                <a href=\"{{ path('membres_bureau') }}\">Les membres du bureau</a>
            </div>

            <div class=\"mobile-sub-group\">
                <span class=\"mobile-sub-title\">À propos de notre club</span>
                <a href=\"{{ path('app_club') }}\">Présentation du club</a>
                <a href=\"{{ path('labels_club') }}\">Les labels du club</a>
                <a href=\"{{ path('horaires') }}\">Les horaires</a>
            </div>
        </div>
    </div>
    <a href=\"{{ path('halterophilie') }}\">Nos tarifs</a>
    <a href=\"{{ path('ecole') }}\">Notre école</a>
    <a href=\"{{ path('competition') }}\">Compétitions</a>
    
    <hr>
    
    <a href=\"{{ path('faq') }}\"><i class=\"fa-solid fa-headset\"></i> Aide</a>
    {% if not app.user %}
        <a href=\"{{ path('app_login') }}\"><i class=\"fa-regular fa-user\"></i> Espace adhérent</a>
    {% endif %}
</div>
    </div>
</nav>

{% block javascripts %}
    <script src=\"{{ asset('js/nav/nav.js') }}\"></script>

{% endblock %}", "/navbar/navigation.html.twig", "/Users/dheillyenzo/projet-chm/templates/navbar/navigation.html.twig");
    }
}
