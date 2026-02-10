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

/* nos_pratiques/musculation.html.twig */
class __TwigTemplate_a4911f5552233fb00c7d6e374b499234 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "nos_pratiques/musculation.html.twig"));

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

        yield "Musculation - CHM Saleux";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        yield "    <link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/nos_pratiques/musculation.css"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 10
        yield "
<header class=\"hero-header\">
    <div class=\"overlay\"></div>

    <!-- Image diagonale sur la droite -->
    <div class=\"hero-diagonal-image\">
        <img src=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/nos_pratiques/musculation/histoire-club.jpg"), "html", null, true);
        yield "\" alt=\"Image Musculation Club\">
    </div>  

    <!-- Contenu texte -->
    <div class=\"hero-content\">
        <h1>ZONE MUSCULATION</h1>
        <p>Découvrez notre espace musculation : équipements, zones d’entraînement.</p>
    </div>
</header>

<section class=\"practice-detail\">
    <div class=\"container\">
        <h1>Musculation</h1>
        <p class=\"practice-intro\">
            Notre espace musculation offre un environnement optimal pour développer votre force et votre endurance.
            Des coachs expérimentés vous accompagnent dans vos séances personnalisées.
        </p>

        <!-- Coin Pecs -->
        <section class=\"zone-section\" id=\"pecs\">
            <h2>Pecs</h2>
            <img src=\"";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/zones/pecs.jpg"), "html", null, true);
        yield "\" alt=\"Coin Pecs\">

            <h3>Équipements :</h3>
            <ul>
                <li>2 Développé couché</li>
                <li>2 bancs développé incliné</li>
                <li>1 Développé décliné</li>
                <li>1 Machine Pec Deck / Butterfly</li>
                <li>Haltères de 1 à 34 kg</li>
                <li>1 Poulis vis a vis</li>


            </ul>

            <h3>Travail possible :</h3>
            <ul>
                <li>Pectoraux (haut, milieu, bas)</li>
                <li>Triceps</li>
                <li>Épaules avant</li>
                <li>Stabilité scapulaire</li>
            </ul>

            <p class=\"zone-text\">
                Idéal pour le travail polyarticulaire et l’isolation, adapté aux débutants comme aux confirmés.
            </p>
        </section>

        <!-- Coin Bras -->
        <section class=\"zone-section\" id=\"bras\">
            <h2>Bras</h2>
            <img src=\"";
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/zones/bras.jpg"), "html", null, true);
        yield "\" alt=\"Coin Bras\">

            <h3>Équipements :</h3>
            <ul>
                <li>Haltères de 1 à 34 kg</li>
                <li>1 Barre ez</li>
                <li>1 Barre droite</li>
                <li>1 Barre au frond</li>
                <li>1 Poulis vis a vis</li>
                <li>1 Station a dips</li>
            </ul>

            <h3>Travail possible :</h3>
            <ul>
                <li>Biceps</li>
                <li>Triceps</li>
                <li>Avant-bras</li>
                <li>Travail d’isolation précis</li>
            </ul>

            <p class=\"zone-text\">
                Parfait pour renforcer et sculpter les bras avec un travail ciblé.
            </p>
        </section>

        <!-- Coin Jambes -->
        <section class=\"zone-section\" id=\"jambes\">
            <h2>Jambes</h2>
            <img src=\"";
        // line 95
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/zones/jambes.jpg"), "html", null, true);
        yield "\" alt=\"Coin Jambes\">

            <h3>Équipements :</h3>
            <ul>
                <li>1 Presse à cuisses inclinée 45 degrès</li>
                <li>1 Hip thrust</li>
                <li>1 Leg extension</li>
                <li>1 Leg curl allongé</li>
                <li>Barres + disques (deadlift)</li>
                <li>1 Hip machine fessiers adducteurs</li>
                <li>1 Squat rack (barres + disques)</li>
                <li>1 Trap Bar</li>
            </ul>

            <h3>Travail possible :</h3>
            <ul>
                <li>Quadriceps</li>
                <li>Ischios-jambiers</li>
                <li>Fessiers</li>
            </ul>

            <p class=\"zone-text\">
                Une zone complète pour travailler la force, la mobilité et la puissance des jambes.
            </p>
        </section>

        <!-- Coin Cardio -->
        <section class=\"zone-section\" id=\"cardio\">
            <h2>Cardio</h2>
            <img src=\"";
        // line 124
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/zones/cardio.jpg"), "html", null, true);
        yield "\" alt=\"Coin Cardio\">

            <h3>Équipements :</h3>
            <ul>
                <li>4 tapis de course</li>
                <li>2 vélos elliptiques</li>
                <li>2 rameurs</li>
                <li>2 vélos semi-allongés</li>
                <li>3 vélos de course</li>
                <li>2 vélos d'appartement</li>
                <li>2 stair climber</li>
                <li>1 Skierg CONCEPT2</li>
            </ul>

            <h3>Travail possible :</h3>
            <ul>
                <li>Endurance</li>
                <li>Cardio training</li>
                <li>Perte calorique</li>
                <li>Échauffement / récupération</li>
            </ul>

            <p class=\"zone-text\">
                Idéal pour améliorer votre condition physique et travailler votre système cardio-respiratoire.
            </p>
        </section>

                <!-- Coin Dos -->
        <section class=\"zone-section\" id=\"dos\">
            <h2>Dos</h2>
            <img src=\"";
        // line 154
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/zones/dos.jpg"), "html", null, true);
        yield "\" alt=\"Coin Dos\">

            <h3>Équipements :</h3>
            <ul>
                <li>1 Machine 4 tirages (vertical et horizontal)</li>
                <li>2 barres de tractions</li>
                <li>Barres + disques (deadlift, rowing)</li>
                <li>Haltères de 1 à 34 kg</li>
                <li>2 bancs lombaire</li>
                <li>1 butterfly (deltoïdes arrière)</li>
            </ul>

            <h3>Travail possible :</h3>
            <ul>
                <li>Grand dorsal</li>
                <li>Trapèzes</li>
                <li>Rhomboïdes</li>
                <li>Lombaires</li>
                <li>Renforcement de la chaîne postérieure</li>
            </ul>

            <p class=\"zone-text\">
                Une zone polyvalente idéale pour solliciter le dos sous tous les angles grâce à notre machine 4 tirages complète.
            </p>
        </section>

                <!-- Coin Épaules -->
        <section class=\"zone-section\" id=\"epaules\">
            <h2>Épaules</h2>
            <img src=\"";
        // line 183
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/zones/epaules.jpg"), "html", null, true);
        yield "\" alt=\"Coin Épaules\">

            <h3>Équipements :</h3>
            <ul>
                <li>1 Presse à épaules convergente</li>
                <li>1 Développé épaules à la machine</li>
                <li>Haltères de 1 à 34 kg</li>
                <li>1 butterfly (arrière épaules)</li>
            </ul>

            <h3>Travail possible :</h3>
            <ul>
                <li>Deltoïdes (avant, médian, arrière)</li>
                <li>Trapèzes</li>
                <li>Stabilité de l’épaule</li>
                <li>Renforcement fonctionnel du haut du corps</li>
            </ul>

            <p class=\"zone-text\">
                Une zone idéale pour développer la force et la stabilité des épaules, avec des machines adaptées à tous les niveaux.
            </p>
        </section>

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
        return "nos_pratiques/musculation.html.twig";
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
        return array (  300 => 183,  268 => 154,  235 => 124,  203 => 95,  172 => 67,  139 => 37,  115 => 16,  107 => 10,  97 => 9,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Musculation - CHM Saleux{% endblock %}

{% block stylesheets %}
    <link rel=\"stylesheet\" href=\"{{ asset('css/nos_pratiques/musculation.css') }}\">
{% endblock %}

{% block body %}

<header class=\"hero-header\">
    <div class=\"overlay\"></div>

    <!-- Image diagonale sur la droite -->
    <div class=\"hero-diagonal-image\">
        <img src=\"{{ asset('images/nos_pratiques/musculation/histoire-club.jpg') }}\" alt=\"Image Musculation Club\">
    </div>  

    <!-- Contenu texte -->
    <div class=\"hero-content\">
        <h1>ZONE MUSCULATION</h1>
        <p>Découvrez notre espace musculation : équipements, zones d’entraînement.</p>
    </div>
</header>

<section class=\"practice-detail\">
    <div class=\"container\">
        <h1>Musculation</h1>
        <p class=\"practice-intro\">
            Notre espace musculation offre un environnement optimal pour développer votre force et votre endurance.
            Des coachs expérimentés vous accompagnent dans vos séances personnalisées.
        </p>

        <!-- Coin Pecs -->
        <section class=\"zone-section\" id=\"pecs\">
            <h2>Pecs</h2>
            <img src=\"{{ asset('images/zones/pecs.jpg') }}\" alt=\"Coin Pecs\">

            <h3>Équipements :</h3>
            <ul>
                <li>2 Développé couché</li>
                <li>2 bancs développé incliné</li>
                <li>1 Développé décliné</li>
                <li>1 Machine Pec Deck / Butterfly</li>
                <li>Haltères de 1 à 34 kg</li>
                <li>1 Poulis vis a vis</li>


            </ul>

            <h3>Travail possible :</h3>
            <ul>
                <li>Pectoraux (haut, milieu, bas)</li>
                <li>Triceps</li>
                <li>Épaules avant</li>
                <li>Stabilité scapulaire</li>
            </ul>

            <p class=\"zone-text\">
                Idéal pour le travail polyarticulaire et l’isolation, adapté aux débutants comme aux confirmés.
            </p>
        </section>

        <!-- Coin Bras -->
        <section class=\"zone-section\" id=\"bras\">
            <h2>Bras</h2>
            <img src=\"{{ asset('images/zones/bras.jpg') }}\" alt=\"Coin Bras\">

            <h3>Équipements :</h3>
            <ul>
                <li>Haltères de 1 à 34 kg</li>
                <li>1 Barre ez</li>
                <li>1 Barre droite</li>
                <li>1 Barre au frond</li>
                <li>1 Poulis vis a vis</li>
                <li>1 Station a dips</li>
            </ul>

            <h3>Travail possible :</h3>
            <ul>
                <li>Biceps</li>
                <li>Triceps</li>
                <li>Avant-bras</li>
                <li>Travail d’isolation précis</li>
            </ul>

            <p class=\"zone-text\">
                Parfait pour renforcer et sculpter les bras avec un travail ciblé.
            </p>
        </section>

        <!-- Coin Jambes -->
        <section class=\"zone-section\" id=\"jambes\">
            <h2>Jambes</h2>
            <img src=\"{{ asset('images/zones/jambes.jpg') }}\" alt=\"Coin Jambes\">

            <h3>Équipements :</h3>
            <ul>
                <li>1 Presse à cuisses inclinée 45 degrès</li>
                <li>1 Hip thrust</li>
                <li>1 Leg extension</li>
                <li>1 Leg curl allongé</li>
                <li>Barres + disques (deadlift)</li>
                <li>1 Hip machine fessiers adducteurs</li>
                <li>1 Squat rack (barres + disques)</li>
                <li>1 Trap Bar</li>
            </ul>

            <h3>Travail possible :</h3>
            <ul>
                <li>Quadriceps</li>
                <li>Ischios-jambiers</li>
                <li>Fessiers</li>
            </ul>

            <p class=\"zone-text\">
                Une zone complète pour travailler la force, la mobilité et la puissance des jambes.
            </p>
        </section>

        <!-- Coin Cardio -->
        <section class=\"zone-section\" id=\"cardio\">
            <h2>Cardio</h2>
            <img src=\"{{ asset('images/zones/cardio.jpg') }}\" alt=\"Coin Cardio\">

            <h3>Équipements :</h3>
            <ul>
                <li>4 tapis de course</li>
                <li>2 vélos elliptiques</li>
                <li>2 rameurs</li>
                <li>2 vélos semi-allongés</li>
                <li>3 vélos de course</li>
                <li>2 vélos d'appartement</li>
                <li>2 stair climber</li>
                <li>1 Skierg CONCEPT2</li>
            </ul>

            <h3>Travail possible :</h3>
            <ul>
                <li>Endurance</li>
                <li>Cardio training</li>
                <li>Perte calorique</li>
                <li>Échauffement / récupération</li>
            </ul>

            <p class=\"zone-text\">
                Idéal pour améliorer votre condition physique et travailler votre système cardio-respiratoire.
            </p>
        </section>

                <!-- Coin Dos -->
        <section class=\"zone-section\" id=\"dos\">
            <h2>Dos</h2>
            <img src=\"{{ asset('images/zones/dos.jpg') }}\" alt=\"Coin Dos\">

            <h3>Équipements :</h3>
            <ul>
                <li>1 Machine 4 tirages (vertical et horizontal)</li>
                <li>2 barres de tractions</li>
                <li>Barres + disques (deadlift, rowing)</li>
                <li>Haltères de 1 à 34 kg</li>
                <li>2 bancs lombaire</li>
                <li>1 butterfly (deltoïdes arrière)</li>
            </ul>

            <h3>Travail possible :</h3>
            <ul>
                <li>Grand dorsal</li>
                <li>Trapèzes</li>
                <li>Rhomboïdes</li>
                <li>Lombaires</li>
                <li>Renforcement de la chaîne postérieure</li>
            </ul>

            <p class=\"zone-text\">
                Une zone polyvalente idéale pour solliciter le dos sous tous les angles grâce à notre machine 4 tirages complète.
            </p>
        </section>

                <!-- Coin Épaules -->
        <section class=\"zone-section\" id=\"epaules\">
            <h2>Épaules</h2>
            <img src=\"{{ asset('images/zones/epaules.jpg') }}\" alt=\"Coin Épaules\">

            <h3>Équipements :</h3>
            <ul>
                <li>1 Presse à épaules convergente</li>
                <li>1 Développé épaules à la machine</li>
                <li>Haltères de 1 à 34 kg</li>
                <li>1 butterfly (arrière épaules)</li>
            </ul>

            <h3>Travail possible :</h3>
            <ul>
                <li>Deltoïdes (avant, médian, arrière)</li>
                <li>Trapèzes</li>
                <li>Stabilité de l’épaule</li>
                <li>Renforcement fonctionnel du haut du corps</li>
            </ul>

            <p class=\"zone-text\">
                Une zone idéale pour développer la force et la stabilité des épaules, avec des machines adaptées à tous les niveaux.
            </p>
        </section>

    </div>
</section>


{% endblock %}
", "nos_pratiques/musculation.html.twig", "/Users/dheillyenzo/projet-chm/templates/nos_pratiques/musculation.html.twig");
    }
}
