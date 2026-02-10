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

/* menu_dropdown/services_du_club/musculation/index.html.twig */
class __TwigTemplate_2cb31ca5bd41c2292ce55f143931dbdc extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu_dropdown/services_du_club/musculation/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Définitions Haltérophilie
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 7
        yield "\t<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/menu_dropdown/services_du_club/musculation/index.css"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 10
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 11
        yield "
\t<!-- Hero Header -->
\t<header class=\"hero-header\">
\t\t<div class=\"hero-content\">

\t\t        <a href=\"";
        // line 16
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\" class=\"back-button\">
         <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2.5\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15 19l-7-7 7-7\" />
         </svg>
         Home
    </a>
\t\t\t<h1>Musculation</h1>
\t\t\t<p>Force, puissance et discipline : une passion olympique ouverte à tous.</p>
<a href=\"#pourquoi\" class=\"cta-button\">Découvrir l'haltérophilie</a>
\t</header>

\t<!-- CONTENU PRINCIPAL -->
\t<main>
\t\t<section id=\"pourquoi\" class=\"section\">
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>Une discipline pour tous</h2>
\t\t\t\t<p>La musculation est une activité dont le but est de faire travailler ses muscles, avec une résistance qui peut être le poids du corps ou une charge légère, moyenne ou lourde en fonction des objectifs recherchés. Les différentes méthodes de Musculation permettent de travailler toutes les qualités physiques : endurance, puissance, force, tonicité musculaire, volume musculaire…</p>
\t\t\t\t<p>Notre mode de vie moderne est de plus en plus sédentaire. Les aménagements technologiques (ascenseurs, voitures…) facilitent notre quotidien mais limitent au maximum nos efforts. Résultat : notre corps s’affaiblit. Dans le même temps l’offre alimentaire explose, avec pour conséquence des déséquilibres nutritionnels à l’origine du surpoids et de l’obésité. Dans ce contexte, la nécessité de pratiquer des activités physiques dédiées à la forme s’impose comme une évidence. Nos clubs rassemblent en un même lieu une multitude d’activités accessibles par tous les temps, et à tous les pratiquants, quels que soient leur niveau et leur âge.</p>
\t\t\t</div>
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/menu_dropdown/services_du_club/musculation/1.jpg"), "html", null, true);
        yield "\" alt=\"Haltérophile\">
\t\t\t</div>
\t\t</section>

\t\t<section id=\"bienfaits\" class=\"section\">
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"";
        // line 42
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/menu_dropdown/services_du_club/musculation/2.jpg"), "html", null, true);
        yield "\" alt=\"Bienfaits\">
\t\t\t</div>
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>Santé</h2>
\t\t\t\t<p>Tous les programmes développés dans nos clubs combinent renforcement musculaire, travail cardio-vasculaire et travail de la souplesse. Ces entraînements complets permettent d’obtenir une bonne condition physique et de se sentir « en forme ». Se sentir bien dans son corps a des impacts sur d’autres éléments psychologiques importants comme la confiance en soi.

Retrouver la forme : pratique idéale pour reprendre, à son rythme et sous la surveillance d’un éducateur sportif, une activité sportive suite à une coupure.
\t\t\t\t</p>
\t\t\t\t<p>Lutter contre le stress : l’activité physique favorise la libération d’endorphine. Cette hormone est un « tranquillisant naturel » qui diminue le stress. Par ailleurs, de nombreux mouvements de renforcement musculaire induisent une respiration complète ce qui permet d’oxygéner les tissus, les muscles mais aussi le cerveau, privilégiant ainsi une meilleure détente.

Par ailleurs, la pratique de la musculation apporte un meilleur sommeil et permet de lutter contre l’insomnie.</p>
\t\t\t</div>
\t\t</section>

\t\t<section id=\"public\" class=\"section\">
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>Forme</h2>
\t\t\t\t<p>Les efforts d’endurance, de type course à pieds, sont bénéfiques, mais ils ne tonifient pas tous les muscles de votre corps comme les fessiers, l’arrière du bras ou vos abdominaux. La musculation mobilise tous ces muscles de manière très ciblée. Un entraînement régulier en musculation permet de brûler plus de calories que les efforts de type endurance (car il augmente fortement le métabolisme de base donc la dépense calorique).</p>
\t\t\t\t<p>Le volume musculaire est difficile à obtenir chez les femmes. Il demande un entraînement et une diététique spécifiques (adaptation de l’alimentation, élément indispensable pour toute démarche de perte de poids). Donc, rassurez-vous mesdames, la pratique de la Musculation ne vous donnera pas de gros muscles, mais au contraire une silhouette plus fine et plus tonique ! Pour les hommes, une pratique régulière vous permettra de développer vos pectoraux, d’avoir un dos puissant, des épaules plus larges…
\t\t\t\t</p>
\t\t\t</div>
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"";
        // line 64
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/menu_dropdown/services_du_club/musculation/3.jpg"), "html", null, true);
        yield "\" alt=\"Public\">
\t\t\t</div>
\t\t</section>

\t\t<section id=\"mouvements\" class=\"section\">
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"";
        // line 70
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/menu_dropdown/services_du_club/musculation/4.jpg"), "html", null, true);
        yield "\" alt=\"Mouvements\">
\t\t\t</div>
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>Préparation physique</h2>
\t\t\t\t<p>La préparation physique est un ensemble de techniques d’entraînement visant à améliorer les qualités physiques d’un sportif quel que soit le sport pratiqué : force, vitesse, souplesse, explosivité, endurance, puissance…</p>
                <p>Les disciplines gérées par notre Fédération, et notamment l’haltérophilie, font partie des rares disciplines qui permettent le développement de la majorité de ces qualités. De ce fait, les techniques de préparation physique pour une activité de loisir et de compétition reposent notamment sur les techniques haltérophiles et de musculation. Ainsi, pour améliorer son explosivité dans le starting block, un coureur fait des épaulés ; pour améliorer la force de ses lancers, un basketteur réalise des jetés ; pour faciliter les portées de ses adversaires, un lutteur pratique les arrachés ; pour développer la force de ses membres inférieurs, un rugbyman travaille en squats, etc.</p>
                <p>Par conséquent, la FFHM devient le partenaire incontournable pour les autres fédérations qui, pour s’améliorer dans leur discipline, doivent obligatoirement passer par la connaissance et la pratique des nôtres. Aussi, les Fédérations françaises de rugby, d’aviron ou encore de moto sollicitent notre expertise notamment pour former leurs cadres et compétiteurs.</p>
                <p>La FFHM souhaite donc se positionner comme une référence et permettre ainsi à nos clubs d’être identifiés comme de véritables pôles ressources où puiser l’encadrement technique nécessaire. En effet, nos clubs constituent la ressource technique de proximité pour les sportifs extérieurs à nos disciplines et également pour les professionnels qui souhaitent acquérir des compétences en ce domaine.</p>
\t\t\t</div>
\t\t</section>
\t</main>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "menu_dropdown/services_du_club/musculation/index.html.twig";
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
        return array (  181 => 70,  172 => 64,  147 => 42,  138 => 36,  115 => 16,  108 => 11,  98 => 10,  87 => 7,  77 => 6,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Définitions Haltérophilie
{% endblock %}

{% block stylesheets %}
\t<link rel=\"stylesheet\" href=\"{{ asset('css/menu_dropdown/services_du_club/musculation/index.css') }}\">
{% endblock %}

{% block body %}

\t<!-- Hero Header -->
\t<header class=\"hero-header\">
\t\t<div class=\"hero-content\">

\t\t        <a href=\"{{ path('home') }}\" class=\"back-button\">
         <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2.5\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15 19l-7-7 7-7\" />
         </svg>
         Home
    </a>
\t\t\t<h1>Musculation</h1>
\t\t\t<p>Force, puissance et discipline : une passion olympique ouverte à tous.</p>
<a href=\"#pourquoi\" class=\"cta-button\">Découvrir l'haltérophilie</a>
\t</header>

\t<!-- CONTENU PRINCIPAL -->
\t<main>
\t\t<section id=\"pourquoi\" class=\"section\">
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>Une discipline pour tous</h2>
\t\t\t\t<p>La musculation est une activité dont le but est de faire travailler ses muscles, avec une résistance qui peut être le poids du corps ou une charge légère, moyenne ou lourde en fonction des objectifs recherchés. Les différentes méthodes de Musculation permettent de travailler toutes les qualités physiques : endurance, puissance, force, tonicité musculaire, volume musculaire…</p>
\t\t\t\t<p>Notre mode de vie moderne est de plus en plus sédentaire. Les aménagements technologiques (ascenseurs, voitures…) facilitent notre quotidien mais limitent au maximum nos efforts. Résultat : notre corps s’affaiblit. Dans le même temps l’offre alimentaire explose, avec pour conséquence des déséquilibres nutritionnels à l’origine du surpoids et de l’obésité. Dans ce contexte, la nécessité de pratiquer des activités physiques dédiées à la forme s’impose comme une évidence. Nos clubs rassemblent en un même lieu une multitude d’activités accessibles par tous les temps, et à tous les pratiquants, quels que soient leur niveau et leur âge.</p>
\t\t\t</div>
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"{{ asset('images/menu_dropdown/services_du_club/musculation/1.jpg') }}\" alt=\"Haltérophile\">
\t\t\t</div>
\t\t</section>

\t\t<section id=\"bienfaits\" class=\"section\">
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"{{ asset('images/menu_dropdown/services_du_club/musculation/2.jpg') }}\" alt=\"Bienfaits\">
\t\t\t</div>
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>Santé</h2>
\t\t\t\t<p>Tous les programmes développés dans nos clubs combinent renforcement musculaire, travail cardio-vasculaire et travail de la souplesse. Ces entraînements complets permettent d’obtenir une bonne condition physique et de se sentir « en forme ». Se sentir bien dans son corps a des impacts sur d’autres éléments psychologiques importants comme la confiance en soi.

Retrouver la forme : pratique idéale pour reprendre, à son rythme et sous la surveillance d’un éducateur sportif, une activité sportive suite à une coupure.
\t\t\t\t</p>
\t\t\t\t<p>Lutter contre le stress : l’activité physique favorise la libération d’endorphine. Cette hormone est un « tranquillisant naturel » qui diminue le stress. Par ailleurs, de nombreux mouvements de renforcement musculaire induisent une respiration complète ce qui permet d’oxygéner les tissus, les muscles mais aussi le cerveau, privilégiant ainsi une meilleure détente.

Par ailleurs, la pratique de la musculation apporte un meilleur sommeil et permet de lutter contre l’insomnie.</p>
\t\t\t</div>
\t\t</section>

\t\t<section id=\"public\" class=\"section\">
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>Forme</h2>
\t\t\t\t<p>Les efforts d’endurance, de type course à pieds, sont bénéfiques, mais ils ne tonifient pas tous les muscles de votre corps comme les fessiers, l’arrière du bras ou vos abdominaux. La musculation mobilise tous ces muscles de manière très ciblée. Un entraînement régulier en musculation permet de brûler plus de calories que les efforts de type endurance (car il augmente fortement le métabolisme de base donc la dépense calorique).</p>
\t\t\t\t<p>Le volume musculaire est difficile à obtenir chez les femmes. Il demande un entraînement et une diététique spécifiques (adaptation de l’alimentation, élément indispensable pour toute démarche de perte de poids). Donc, rassurez-vous mesdames, la pratique de la Musculation ne vous donnera pas de gros muscles, mais au contraire une silhouette plus fine et plus tonique ! Pour les hommes, une pratique régulière vous permettra de développer vos pectoraux, d’avoir un dos puissant, des épaules plus larges…
\t\t\t\t</p>
\t\t\t</div>
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"{{ asset('images/menu_dropdown/services_du_club/musculation/3.jpg') }}\" alt=\"Public\">
\t\t\t</div>
\t\t</section>

\t\t<section id=\"mouvements\" class=\"section\">
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"{{ asset('images/menu_dropdown/services_du_club/musculation/4.jpg') }}\" alt=\"Mouvements\">
\t\t\t</div>
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>Préparation physique</h2>
\t\t\t\t<p>La préparation physique est un ensemble de techniques d’entraînement visant à améliorer les qualités physiques d’un sportif quel que soit le sport pratiqué : force, vitesse, souplesse, explosivité, endurance, puissance…</p>
                <p>Les disciplines gérées par notre Fédération, et notamment l’haltérophilie, font partie des rares disciplines qui permettent le développement de la majorité de ces qualités. De ce fait, les techniques de préparation physique pour une activité de loisir et de compétition reposent notamment sur les techniques haltérophiles et de musculation. Ainsi, pour améliorer son explosivité dans le starting block, un coureur fait des épaulés ; pour améliorer la force de ses lancers, un basketteur réalise des jetés ; pour faciliter les portées de ses adversaires, un lutteur pratique les arrachés ; pour développer la force de ses membres inférieurs, un rugbyman travaille en squats, etc.</p>
                <p>Par conséquent, la FFHM devient le partenaire incontournable pour les autres fédérations qui, pour s’améliorer dans leur discipline, doivent obligatoirement passer par la connaissance et la pratique des nôtres. Aussi, les Fédérations françaises de rugby, d’aviron ou encore de moto sollicitent notre expertise notamment pour former leurs cadres et compétiteurs.</p>
                <p>La FFHM souhaite donc se positionner comme une référence et permettre ainsi à nos clubs d’être identifiés comme de véritables pôles ressources où puiser l’encadrement technique nécessaire. En effet, nos clubs constituent la ressource technique de proximité pour les sportifs extérieurs à nos disciplines et également pour les professionnels qui souhaitent acquérir des compétences en ce domaine.</p>
\t\t\t</div>
\t\t</section>
\t</main>
{% endblock %}
", "menu_dropdown/services_du_club/musculation/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/menu_dropdown/services_du_club/musculation/index.html.twig");
    }
}
