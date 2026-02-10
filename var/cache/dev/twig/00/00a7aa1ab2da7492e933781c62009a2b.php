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

/* 1_accueil/section6/section6.html.twig */
class __TwigTemplate_bfdfda70a35a18094c57af16078813d9 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "1_accueil/section6/section6.html.twig"));

        // line 1
        yield "<section class=\"partners-section\">
    <div class=\"partners-header\">
        <h2>ILS NOUS ACCOMPAGNENT</h2>
        <p class=\"partners-subtitle\">
            Nous remercions chaleureusement l’ensemble de nos partenaires pour leur soutien et leur engagement à nos côtés. 
            Leur confiance nous permet de développer nos projets et de faire rayonner nos actions au quotidien.
        </p>
    </div>

    <div class=\"partners-marquee\">
        <div class=\"partners-track\">
            <!-- Logos du premier cycle -->
            <div class=\"partner-item\">
                <img src=\"/images/sponsors/FFHMFAC.png\" alt=\"FFHMFAC\">
                <span>FFHMFAC</span>
            </div>

            <div class=\"partner-item\">
                <img src=\"/images/sponsors/logo-conseil-departemental-somme.png\" alt=\"Conseil Départemental de la Somme\">
                <span>Conseil Départemental de la Somme</span>
            </div>

            <div class=\"partner-item\">
                <img src=\"/images/sponsors/logo-hdf.png\" alt=\"Région Hauts-de-France\">
                <span>Région Hauts-de-France</span>
            </div>

            <div class=\"partner-item\">
                <img src=\"/images/sponsors/logo-vectoriel-amiens-metropole.png\" alt=\"Amiens Métropole\">
                <span>Amiens Métropole</span>
            </div>

            <div class=\"partner-item\">
                <img src=\"/images/sponsors/Logo-legue-chauffage.png\" alt=\"Legué Chauffage\">
                <span>Legué Chauffage</span>
            </div>

            <!-- Reprise pour boucle infinie -->
            <div class=\"partner-item\">
                <img src=\"/images/sponsors/FFHMFAC.png\" alt=\"FFHMFAC\">
                <span>FFHMFAC</span>
            </div>

            <div class=\"partner-item\">
                <img src=\"/images/sponsors/logo-conseil-departemental-somme.png\" alt=\"Conseil Départemental de la Somme\">
                <span>Conseil Départemental de la Somme</span>
            </div>

            <div class=\"partner-item\">
                <img src=\"/images/sponsors/logo-hdf.png\" alt=\"Région Hauts-de-France\">
                <span>Région Hauts-de-France</span>
            </div>

            <div class=\"partner-item\">
                <img src=\"/images/sponsors/logo-vectoriel-amiens-metropole.png\" alt=\"Amiens Métropole\">
                <span>Amiens Métropole</span>
            </div>

            <div class=\"partner-item\">
                <img src=\"/images/sponsors/Logo-legue-chauffage.png\" alt=\"Legué Chauffage\">
                <span>Legué Chauffage</span>
            </div>
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
        return "1_accueil/section6/section6.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<section class=\"partners-section\">
    <div class=\"partners-header\">
        <h2>ILS NOUS ACCOMPAGNENT</h2>
        <p class=\"partners-subtitle\">
            Nous remercions chaleureusement l’ensemble de nos partenaires pour leur soutien et leur engagement à nos côtés. 
            Leur confiance nous permet de développer nos projets et de faire rayonner nos actions au quotidien.
        </p>
    </div>

    <div class=\"partners-marquee\">
        <div class=\"partners-track\">
            <!-- Logos du premier cycle -->
            <div class=\"partner-item\">
                <img src=\"/images/sponsors/FFHMFAC.png\" alt=\"FFHMFAC\">
                <span>FFHMFAC</span>
            </div>

            <div class=\"partner-item\">
                <img src=\"/images/sponsors/logo-conseil-departemental-somme.png\" alt=\"Conseil Départemental de la Somme\">
                <span>Conseil Départemental de la Somme</span>
            </div>

            <div class=\"partner-item\">
                <img src=\"/images/sponsors/logo-hdf.png\" alt=\"Région Hauts-de-France\">
                <span>Région Hauts-de-France</span>
            </div>

            <div class=\"partner-item\">
                <img src=\"/images/sponsors/logo-vectoriel-amiens-metropole.png\" alt=\"Amiens Métropole\">
                <span>Amiens Métropole</span>
            </div>

            <div class=\"partner-item\">
                <img src=\"/images/sponsors/Logo-legue-chauffage.png\" alt=\"Legué Chauffage\">
                <span>Legué Chauffage</span>
            </div>

            <!-- Reprise pour boucle infinie -->
            <div class=\"partner-item\">
                <img src=\"/images/sponsors/FFHMFAC.png\" alt=\"FFHMFAC\">
                <span>FFHMFAC</span>
            </div>

            <div class=\"partner-item\">
                <img src=\"/images/sponsors/logo-conseil-departemental-somme.png\" alt=\"Conseil Départemental de la Somme\">
                <span>Conseil Départemental de la Somme</span>
            </div>

            <div class=\"partner-item\">
                <img src=\"/images/sponsors/logo-hdf.png\" alt=\"Région Hauts-de-France\">
                <span>Région Hauts-de-France</span>
            </div>

            <div class=\"partner-item\">
                <img src=\"/images/sponsors/logo-vectoriel-amiens-metropole.png\" alt=\"Amiens Métropole\">
                <span>Amiens Métropole</span>
            </div>

            <div class=\"partner-item\">
                <img src=\"/images/sponsors/Logo-legue-chauffage.png\" alt=\"Legué Chauffage\">
                <span>Legué Chauffage</span>
            </div>
        </div>
    </div>
</section>
", "1_accueil/section6/section6.html.twig", "/Users/dheillyenzo/projet-chm/templates/1_accueil/section6/section6.html.twig");
    }
}
