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

/* 1_accueil/section1/section1.html.twig */
class __TwigTemplate_d0c7b5b715db8bb39e6811cdd895784c extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "1_accueil/section1/section1.html.twig"));

        // line 1
        yield "<section id=\"accueil\" class=\"hero-section ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1, $this->source); })()), "user", [], "any", false, false, false, 1)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "hero-logged";
        }
        yield "\">
    <div class=\"hero-photos\">
        <img rel=\"preload\" src=\"";
        // line 3
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/club.png"), "html", null, true);
        yield "\" alt=\"Image du club\">
    </div>

    <div class=\"hero-content\">
        ";
        // line 7
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 7, $this->source); })()), "user", [], "any", false, false, false, 7)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 8
            yield "            <!-- Utilisateur non connecté : version classique -->
            <h1 class=\"club-title\">CLUB HALTÉROPHILIE & MUSCULATION</h1>
            <p class=\"club-subtitle default-subtitle\">Relevez vos limites et dépassez-vous chaque jour !</p>

            <div class=\"hero-inner\">
                <div class=\"hero-line\" id=\"adherents-counter\">
                    + 0
                    <span class=\"thin-text\">ADHÉRENTS</span>
                </div>
                <div class=\"hero-line\">
                    + 30
                    <span class=\"thin-text\">COMPÉTITIONS</span>
                </div>
            </div>

            <div class=\"hero-buttons\">
                <a href=\"#plus\" class=\"nous-rejoindre js-open-register-modal\">NOUS REJOINDRE</a>
                <a href=\"";
            // line 25
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_club");
            yield "\" class=\"btn-en-savoir-plus\">DÉCOUVRIR LE CLUB</a>
            </div>

        ";
        } else {
            // line 29
            yield "            <!-- Utilisateur connecté : version personnalisée -->
            <h1 class=\"club-title user-welcome\">Bonjour ";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 30, $this->source); })()), "user", [], "any", false, false, false, 30), "firstName", [], "any", false, false, false, 30), "html", null, true);
            yield " !</h1>

            <p class=\"club-date\">
                ";
            // line 33
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extra\Intl\IntlExtension']->formatDate($this->env, "now", "medium", "d MMMM Y", null, "gregorian", "fr"), "html", null, true);
            yield "
            </p>

            <p class=\"club-subtitle user-subtitle\" style=\"max-width:500px\">Ravi de vous revoir. Découvrez vos statistiques et vos prochains objectifs !</p>

            <div class=\"hero-buttons\">
                <a href=\"";
            // line 39
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard");
            yield "\" class=\"nous-rejoindre\">ACCÉDER AU DASHBOARD</a>
                <a href=\"";
            // line 40
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("actualites");
            yield "\" class=\"btn-en-savoir-plus\">ACTUALITES</a>
            </div>
        ";
        }
        // line 43
        yield "
        <div class=\"ffhm-container\">
            <img src=\"";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/ffhm.png"), "html", null, true);
        yield "\" alt=\"Logo FFHM\" class=\"ffhm-logo\">
        </div>
    </div>
</section>

<script src=\"";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/accueil/section1/section1.js"), "html", null, true);
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
        return "1_accueil/section1/section1.html.twig";
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
        return array (  128 => 50,  120 => 45,  116 => 43,  110 => 40,  106 => 39,  97 => 33,  91 => 30,  88 => 29,  81 => 25,  62 => 8,  60 => 7,  53 => 3,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<section id=\"accueil\" class=\"hero-section {% if app.user %}hero-logged{% endif %}\">
    <div class=\"hero-photos\">
        <img rel=\"preload\" src=\"{{ asset('images/club/club.png') }}\" alt=\"Image du club\">
    </div>

    <div class=\"hero-content\">
        {% if not app.user %}
            <!-- Utilisateur non connecté : version classique -->
            <h1 class=\"club-title\">CLUB HALTÉROPHILIE & MUSCULATION</h1>
            <p class=\"club-subtitle default-subtitle\">Relevez vos limites et dépassez-vous chaque jour !</p>

            <div class=\"hero-inner\">
                <div class=\"hero-line\" id=\"adherents-counter\">
                    + 0
                    <span class=\"thin-text\">ADHÉRENTS</span>
                </div>
                <div class=\"hero-line\">
                    + 30
                    <span class=\"thin-text\">COMPÉTITIONS</span>
                </div>
            </div>

            <div class=\"hero-buttons\">
                <a href=\"#plus\" class=\"nous-rejoindre js-open-register-modal\">NOUS REJOINDRE</a>
                <a href=\"{{ path('app_club') }}\" class=\"btn-en-savoir-plus\">DÉCOUVRIR LE CLUB</a>
            </div>

        {% else %}
            <!-- Utilisateur connecté : version personnalisée -->
            <h1 class=\"club-title user-welcome\">Bonjour {{ app.user.firstName }} !</h1>

            <p class=\"club-date\">
                {{ \"now\"|format_date(locale='fr', pattern='d MMMM Y') }}
            </p>

            <p class=\"club-subtitle user-subtitle\" style=\"max-width:500px\">Ravi de vous revoir. Découvrez vos statistiques et vos prochains objectifs !</p>

            <div class=\"hero-buttons\">
                <a href=\"{{ path('dashboard') }}\" class=\"nous-rejoindre\">ACCÉDER AU DASHBOARD</a>
                <a href=\"{{ path('actualites') }}\" class=\"btn-en-savoir-plus\">ACTUALITES</a>
            </div>
        {% endif %}

        <div class=\"ffhm-container\">
            <img src=\"{{ asset('images/ffhm.png') }}\" alt=\"Logo FFHM\" class=\"ffhm-logo\">
        </div>
    </div>
</section>

<script src=\"{{ asset('js/accueil/section1/section1.js') }}\"></script>
", "1_accueil/section1/section1.html.twig", "/Users/dheillyenzo/projet-chm/templates/1_accueil/section1/section1.html.twig");
    }
}
