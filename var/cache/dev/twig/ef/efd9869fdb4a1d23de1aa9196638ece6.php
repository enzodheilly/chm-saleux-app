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

/* menu_dropdown/services_du_club/halterophilie/index.html.twig */
class __TwigTemplate_35a46a989d1255d8453975a782ed35b7 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu_dropdown/services_du_club/halterophilie/index.html.twig"));

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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/menu_dropdown/services_du_club/halterophilie/index.css"), "html", null, true);
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
\t\t\t<h1>Haltérophilie</h1>
\t\t\t<p>Force, puissance et discipline : une passion olympique ouverte à tous.</p>
<a href=\"#pourquoi\" class=\"cta-button\">Découvrir l'haltérophilie</a>
\t</header>

\t<!-- CONTENU PRINCIPAL -->
\t<main>
\t\t<section id=\"pourquoi\" class=\"section\">
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>POURQUOI PRATIQUER L'HALTÉROPHILIE ?</h2>
\t\t\t\t<p>L’haltérophilie est un sport olympique fondé sur deux mouvements essentiels : l’arraché et l’épaulé-jeté. Pratiquée régulièrement, elle améliore les qualités physiques telles que la puissance explosive, cruciale dans de nombreux sports comme le rugby, le football ou le basketball.</p>
\t\t\t\t<p>Elle contribue également à développer la vitesse, l’agilité et la capacité de saut, tout en renforçant l’ensemble de la musculature pour une force globale du corps. Au-delà de l’aspect physique, l’haltérophilie forge la discipline mentale, la concentration et la persévérance. Atteindre ses objectifs de charges soulignera rapidement vos progrès, renforçant la confiance en soi et l’estime personnelle.</p>
\t\t\t</div>
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"https://www.ffhaltero.fr/wp-content/uploads/2024/08/IMS0002-scaled.jpg\" alt=\"Haltérophile\">
\t\t\t</div>
\t\t</section>

\t\t<section id=\"bienfaits\" class=\"section\">
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"https://www.ffhaltero.fr/wp-content/uploads/2024/08/IMS4771-scaled.jpg\" alt=\"Bienfaits\">
\t\t\t</div>
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>LES BIENFAITS DE L'HALTÉROPHILIE</h2>
\t\t\t\t<p>L’haltérophilie favorise l’augmentation de la masse musculaire, car soulever des charges sollicite constamment les muscles et stimule leur hypertrophie. Pratiquée régulièrement, elle contribue à renforcer la densité osseuse, un atout majeur pour prévenir l’ostéoporose. Elle enseigne également les bonnes postures, les techniques de levage et de manutention, tout en tonifiant le dos et l’ensemble du corps.
\t\t\t\t</p>
\t\t\t\t<p>Les mouvements complexes, tels que l’arraché ou l’épaulé-jeté, améliorent la coordination, l’équilibre et la mobilité, tout en préservant la souplesse. Comme toute activité physique intense, l’haltérophilie stimule la production d’endorphines, réduisant le stress et favorisant une meilleure humeur.</p>
\t\t\t</div>
\t\t</section>

\t\t<section id=\"public\" class=\"section\">
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>À QUI S'ADRESSE L'HALTÉROPHILIE ?</h2>
\t\t\t\t<p>L’haltérophilie s’adresse à un public très large et peut se pratiquer dès l’âge de 7-8 ans, sous encadrement adapté pour apprendre correctement les techniques. À ce stade, l’accent est mis sur la précision et la sécurité, plutôt que sur la charge.</p>
\t\t\t\t<p>Adolescents et adultes y trouvent un moyen efficace de développer force et masse musculaire, ou d’améliorer leurs performances dans d’autres sports. La discipline est mixte : les femmes participent aux compétitions depuis 1987.
\t\t\t\t</p>
\t\t\t\t<p>
\t\t\t\t\tMême les personnes âgées peuvent en bénéficier grâce à des charges adaptées, favorisant le maintien de la masse musculaire, de la densité osseuse et de la mobilité, tout en réduisant les risques de chute. Avec un encadrement professionnel, l’haltérophilie est une discipline accessible, sûre et extrêmement bénéfique pour tous.</p>
\t\t\t</div>
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"https://www.ffhaltero.fr/wp-content/uploads/2024/08/KOCHETOVA-MARGOT_FRA_W49A__IMS7633-scaled.jpg\" alt=\"Public\">
\t\t\t</div>
\t\t</section>

\t\t<section id=\"mouvements\" class=\"section\">
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"https://www.ffhaltero.fr/wp-content/uploads/2024/08/Design-sans-titre-32.png\" alt=\"Mouvements\">
\t\t\t</div>
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>LES MOUVEMENTS</h2>
\t\t\t\t<p>L’haltérophilie est un exercice qui demande force, souplesse et dynamisme. Ce sport se décompose en deux mouvements qui sont respectivement :
\t\t\t\t\t<b>L’ARRACHÉ
\t\t\t\t\t</b>
\t\t\t\t\t(La barre est placée horizontalement devant les jambes de l’athlète. Celui-ci doit l’agripper, les mains en pronation et la tirer d’un seul mouvement, du plateau jusqu’au bout des bras tendus au-dessus de la tête. Le mouvement s’effectue, soit en fléchissant ou en fendant les jambes. La barre doit longer le corps d’un mouvement ininterrompu, sans qu’aucune autre partie que les pieds touche le plateau. Le poids soulevé doit être maintenu immobile, bras et jambes tendus, pieds alignés, jusqu’au signal de replacer la barre sur le plateau. Le retournement des poignets ne doit s’effectuer que lorsque la barre a dépassé la tête de l’athlète. L’athlète se redresse aussitôt qu’il le peut, en plaçant les pieds perpendiculairement au tronc et à l’haltère. Le signal doit être donné aussitôt que l’athlète est immobile de toutes les parties de son corps.) et
\t\t\t\t\t<b>l'Épaulé-jeté</b>
\t\t\t\t\t(L’épaulé-jeté se décompose en deux temps :
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tD’abord avec l’épaulé : la barre est placée horizontalement devant les jambes de l’athlète. L’athlète soulève la barre jusqu’aux épaules. Ce mouvement s’effectue soit en fléchissant ou en soit fendant les jambes.
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tEnsuite avec le jeté : la barre repose sur les épaules de l’athlète. Celui-ci effectue une légère flexion des jambes et une poussée simultanée des bras pour amener la barre à bout de bras. Le poids soulevé doit être maintenu immobile, bras et jambes tendus, pieds alignés, jusqu’au signal de replacer la barre sur le plateau.).</p>
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
        return "menu_dropdown/services_du_club/halterophilie/index.html.twig";
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
        return array (  115 => 16,  108 => 11,  98 => 10,  87 => 7,  77 => 6,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Définitions Haltérophilie
{% endblock %}

{% block stylesheets %}
\t<link rel=\"stylesheet\" href=\"{{ asset('css/menu_dropdown/services_du_club/halterophilie/index.css') }}\">
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
\t\t\t<h1>Haltérophilie</h1>
\t\t\t<p>Force, puissance et discipline : une passion olympique ouverte à tous.</p>
<a href=\"#pourquoi\" class=\"cta-button\">Découvrir l'haltérophilie</a>
\t</header>

\t<!-- CONTENU PRINCIPAL -->
\t<main>
\t\t<section id=\"pourquoi\" class=\"section\">
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>POURQUOI PRATIQUER L'HALTÉROPHILIE ?</h2>
\t\t\t\t<p>L’haltérophilie est un sport olympique fondé sur deux mouvements essentiels : l’arraché et l’épaulé-jeté. Pratiquée régulièrement, elle améliore les qualités physiques telles que la puissance explosive, cruciale dans de nombreux sports comme le rugby, le football ou le basketball.</p>
\t\t\t\t<p>Elle contribue également à développer la vitesse, l’agilité et la capacité de saut, tout en renforçant l’ensemble de la musculature pour une force globale du corps. Au-delà de l’aspect physique, l’haltérophilie forge la discipline mentale, la concentration et la persévérance. Atteindre ses objectifs de charges soulignera rapidement vos progrès, renforçant la confiance en soi et l’estime personnelle.</p>
\t\t\t</div>
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"https://www.ffhaltero.fr/wp-content/uploads/2024/08/IMS0002-scaled.jpg\" alt=\"Haltérophile\">
\t\t\t</div>
\t\t</section>

\t\t<section id=\"bienfaits\" class=\"section\">
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"https://www.ffhaltero.fr/wp-content/uploads/2024/08/IMS4771-scaled.jpg\" alt=\"Bienfaits\">
\t\t\t</div>
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>LES BIENFAITS DE L'HALTÉROPHILIE</h2>
\t\t\t\t<p>L’haltérophilie favorise l’augmentation de la masse musculaire, car soulever des charges sollicite constamment les muscles et stimule leur hypertrophie. Pratiquée régulièrement, elle contribue à renforcer la densité osseuse, un atout majeur pour prévenir l’ostéoporose. Elle enseigne également les bonnes postures, les techniques de levage et de manutention, tout en tonifiant le dos et l’ensemble du corps.
\t\t\t\t</p>
\t\t\t\t<p>Les mouvements complexes, tels que l’arraché ou l’épaulé-jeté, améliorent la coordination, l’équilibre et la mobilité, tout en préservant la souplesse. Comme toute activité physique intense, l’haltérophilie stimule la production d’endorphines, réduisant le stress et favorisant une meilleure humeur.</p>
\t\t\t</div>
\t\t</section>

\t\t<section id=\"public\" class=\"section\">
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>À QUI S'ADRESSE L'HALTÉROPHILIE ?</h2>
\t\t\t\t<p>L’haltérophilie s’adresse à un public très large et peut se pratiquer dès l’âge de 7-8 ans, sous encadrement adapté pour apprendre correctement les techniques. À ce stade, l’accent est mis sur la précision et la sécurité, plutôt que sur la charge.</p>
\t\t\t\t<p>Adolescents et adultes y trouvent un moyen efficace de développer force et masse musculaire, ou d’améliorer leurs performances dans d’autres sports. La discipline est mixte : les femmes participent aux compétitions depuis 1987.
\t\t\t\t</p>
\t\t\t\t<p>
\t\t\t\t\tMême les personnes âgées peuvent en bénéficier grâce à des charges adaptées, favorisant le maintien de la masse musculaire, de la densité osseuse et de la mobilité, tout en réduisant les risques de chute. Avec un encadrement professionnel, l’haltérophilie est une discipline accessible, sûre et extrêmement bénéfique pour tous.</p>
\t\t\t</div>
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"https://www.ffhaltero.fr/wp-content/uploads/2024/08/KOCHETOVA-MARGOT_FRA_W49A__IMS7633-scaled.jpg\" alt=\"Public\">
\t\t\t</div>
\t\t</section>

\t\t<section id=\"mouvements\" class=\"section\">
\t\t\t<div class=\"section-image\">
\t\t\t\t<img src=\"https://www.ffhaltero.fr/wp-content/uploads/2024/08/Design-sans-titre-32.png\" alt=\"Mouvements\">
\t\t\t</div>
\t\t\t<div class=\"section-content\">
\t\t\t\t<h2>LES MOUVEMENTS</h2>
\t\t\t\t<p>L’haltérophilie est un exercice qui demande force, souplesse et dynamisme. Ce sport se décompose en deux mouvements qui sont respectivement :
\t\t\t\t\t<b>L’ARRACHÉ
\t\t\t\t\t</b>
\t\t\t\t\t(La barre est placée horizontalement devant les jambes de l’athlète. Celui-ci doit l’agripper, les mains en pronation et la tirer d’un seul mouvement, du plateau jusqu’au bout des bras tendus au-dessus de la tête. Le mouvement s’effectue, soit en fléchissant ou en fendant les jambes. La barre doit longer le corps d’un mouvement ininterrompu, sans qu’aucune autre partie que les pieds touche le plateau. Le poids soulevé doit être maintenu immobile, bras et jambes tendus, pieds alignés, jusqu’au signal de replacer la barre sur le plateau. Le retournement des poignets ne doit s’effectuer que lorsque la barre a dépassé la tête de l’athlète. L’athlète se redresse aussitôt qu’il le peut, en plaçant les pieds perpendiculairement au tronc et à l’haltère. Le signal doit être donné aussitôt que l’athlète est immobile de toutes les parties de son corps.) et
\t\t\t\t\t<b>l'Épaulé-jeté</b>
\t\t\t\t\t(L’épaulé-jeté se décompose en deux temps :
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tD’abord avec l’épaulé : la barre est placée horizontalement devant les jambes de l’athlète. L’athlète soulève la barre jusqu’aux épaules. Ce mouvement s’effectue soit en fléchissant ou en soit fendant les jambes.
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tEnsuite avec le jeté : la barre repose sur les épaules de l’athlète. Celui-ci effectue une légère flexion des jambes et une poussée simultanée des bras pour amener la barre à bout de bras. Le poids soulevé doit être maintenu immobile, bras et jambes tendus, pieds alignés, jusqu’au signal de replacer la barre sur le plateau.).</p>
\t\t\t</div>
\t\t</section>
\t</main>
{% endblock %}
", "menu_dropdown/services_du_club/halterophilie/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/menu_dropdown/services_du_club/halterophilie/index.html.twig");
    }
}
