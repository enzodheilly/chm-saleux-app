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

/* 1_accueil/section10/section10.html.twig */
class __TwigTemplate_ad95dce865df07c78c08a0e8a14edc8b extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "1_accueil/section10/section10.html.twig"));

        // line 1
        yield "<section class=\"container cours-section\">

  <h2 style=\"text-align:center;\">Cours Collectifs</h2>

  <!-- WRAPPER : IMAGE + TEXTE -->
  <div class=\"collectif-wrapper\">

    <!-- PHOTO À GAUCHE -->
        <div class=\"trdc-silhouette\">
            <div class=\"text-wall\">
                COURS COLLECTIFS<br>
                COURS COLLECTIFS<br>
                COURS COLLECTIFS<br>
                COURS COLLECTIFS
            </div>

            <img src=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/menu_dropdown/services_du_club/cours_collectifs/12.jpg"), "html", null, true);
        yield "\"
                 alt=\"Silhouette cours collectifs\">
        </div>

    <!-- TEXTE À DROITE -->
    <div class=\"collectif-text\">
      <p>
        Que vous soyez débutant, sportif régulier ou simplement à la recherche de motivation, 
        nos cours collectifs vous offrent un environnement idéal pour bouger, progresser et 
        vous dépasser. Encadrés par des coachs diplômés, ils combinent énergie, dépassement 
        de soi et bonne humeur.  
        <br><br>
        Au programme : séances cardio dynamiques, renforcement musculaire ciblé, fitness moderne 
        et moments de cohésion. Venez vivre l’entraînement autrement !
      </p>

      <a href=\"";
        // line 33
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cours_collectifs");
        yield "\" class=\"btn-collectif\">En savoir plus</a>
    </div>

  </div>

</section>

<section class=\"container avis-section\">


  <div class=\"avis-wrapper\">

    <div class=\"avis-card\">
    <div class=\"avis-stars\">★★★★★</div>
      <p class=\"avis-text\">
        “Super ambiance et coachs au top ! Les cours collectifs m’ont permis de reprendre
        le sport avec motivation et plaisir. On ne voit pas le temps passer.”
      </p>
      <span class=\"avis-name\">Sarah M.</span>
    </div>

    <div class=\"avis-card\">
    <div class=\"avis-stars\">★★★★★</div>
      <p class=\"avis-text\">
        “Des séances dynamiques et accessibles à tous les niveaux. On se sent encadré,
        encouragé et surtout fier de soi après chaque cours.”
      </p>
      <span class=\"avis-name\">Julien D.</span>
    </div>

    <div class=\"avis-card\">
    <div class=\"avis-stars\">★★★★★</div>
      <p class=\"avis-text\">
        “Une vraie source de motivation ! Les coachs sont professionnels, bienveillants
        et l’ambiance de groupe est incroyable.”
      </p>
      <span class=\"avis-name\">Nadia K.</span>
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
        return "1_accueil/section10/section10.html.twig";
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
        return array (  82 => 33,  63 => 17,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<section class=\"container cours-section\">

  <h2 style=\"text-align:center;\">Cours Collectifs</h2>

  <!-- WRAPPER : IMAGE + TEXTE -->
  <div class=\"collectif-wrapper\">

    <!-- PHOTO À GAUCHE -->
        <div class=\"trdc-silhouette\">
            <div class=\"text-wall\">
                COURS COLLECTIFS<br>
                COURS COLLECTIFS<br>
                COURS COLLECTIFS<br>
                COURS COLLECTIFS
            </div>

            <img src=\"{{ asset('images/menu_dropdown/services_du_club/cours_collectifs/12.jpg') }}\"
                 alt=\"Silhouette cours collectifs\">
        </div>

    <!-- TEXTE À DROITE -->
    <div class=\"collectif-text\">
      <p>
        Que vous soyez débutant, sportif régulier ou simplement à la recherche de motivation, 
        nos cours collectifs vous offrent un environnement idéal pour bouger, progresser et 
        vous dépasser. Encadrés par des coachs diplômés, ils combinent énergie, dépassement 
        de soi et bonne humeur.  
        <br><br>
        Au programme : séances cardio dynamiques, renforcement musculaire ciblé, fitness moderne 
        et moments de cohésion. Venez vivre l’entraînement autrement !
      </p>

      <a href=\"{{ path('cours_collectifs') }}\" class=\"btn-collectif\">En savoir plus</a>
    </div>

  </div>

</section>

<section class=\"container avis-section\">


  <div class=\"avis-wrapper\">

    <div class=\"avis-card\">
    <div class=\"avis-stars\">★★★★★</div>
      <p class=\"avis-text\">
        “Super ambiance et coachs au top ! Les cours collectifs m’ont permis de reprendre
        le sport avec motivation et plaisir. On ne voit pas le temps passer.”
      </p>
      <span class=\"avis-name\">Sarah M.</span>
    </div>

    <div class=\"avis-card\">
    <div class=\"avis-stars\">★★★★★</div>
      <p class=\"avis-text\">
        “Des séances dynamiques et accessibles à tous les niveaux. On se sent encadré,
        encouragé et surtout fier de soi après chaque cours.”
      </p>
      <span class=\"avis-name\">Julien D.</span>
    </div>

    <div class=\"avis-card\">
    <div class=\"avis-stars\">★★★★★</div>
      <p class=\"avis-text\">
        “Une vraie source de motivation ! Les coachs sont professionnels, bienveillants
        et l’ambiance de groupe est incroyable.”
      </p>
      <span class=\"avis-name\">Nadia K.</span>
    </div>

  </div>

</section>

", "1_accueil/section10/section10.html.twig", "/Users/dheillyenzo/projet-chm/templates/1_accueil/section10/section10.html.twig");
    }
}
