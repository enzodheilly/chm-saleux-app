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

/* 1_accueil/section3/section3.html.twig */
class __TwigTemplate_895cc246cc567d69e6280c279a0f14f8 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "1_accueil/section3/section3.html.twig"));

        // line 1
        yield "<div class=\"slider-section\">
\t<div class=\"slider-title\">NOS NOUVEAUX ÉQUIPEMENTS</div>
\t<div class=\"slider-subtitle\">
\t\tDécouvrez les toutes dernières arrivées dans notre salle ! Des équipements modernes et performants pour améliorer vos entraînements.
\t</div>

\t<div class=\"slider-wrapper\">

\t\t<div class=\"slider-container\">
<div class=\"slider\">
    ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["machines"]) || array_key_exists("machines", $context) ? $context["machines"] : (function () { throw new RuntimeError('Variable "machines" does not exist.', 11, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["machine"]) {
            // line 12
            yield "        <div class=\"slide ";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 12)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : (""));
            yield "\">
            <img src=\"";
            // line 13
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/machines/" . CoreExtension::getAttribute($this->env, $this->source, $context["machine"], "image", [], "any", false, false, false, 13))), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["machine"], "name", [], "any", false, false, false, 13), "html", null, true);
            yield "\">
            <p>";
            // line 14
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["machine"], "name", [], "any", false, false, false, 14), "html", null, true);
            yield "</p>
            <a href=\"#\" class=\"discover1\">Découvrir</a>
        </div>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['machine'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        yield "</div>

\t\t</div>
\t</div>

\t<div class=\"equipment-benefits\">
  <h3>Pourquoi ces nouveaux équipements ?</h3>

  <p>
    Chaque année, notre club investit dans de nouveaux équipements afin de permettre
    à nos adhérents de s’entraîner avec du matériel toujours plus moderne,
    performant et adapté à tous les niveaux.
    Nous sélectionnons nos machines pour leur ergonomie, leur robustesse
    et leur efficacité, afin de garantir des entraînements sûrs et optimisés.
  </p>

  <div class=\"benefits-grid\">
    <div class=\"benefit\">
      <strong>✔ Innovation continue</strong>
      <span>Des équipements renouvelés régulièrement pour rester à la pointe</span>
    </div>

    <div class=\"benefit\">
      <strong>✔ Performance & confort</strong>
      <span>Mouvements fluides, charges maîtrisées et ergonomie optimale</span>
    </div>

    <div class=\"benefit\">
      <strong>✔ Sécurité pour tous</strong>
      <span>Matériel adapté aux débutants comme aux sportifs confirmés</span>
    </div>
  </div>
</div>

</div>

 <script src=\"";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/accueil/section3/section3.js"), "html", null, true);
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
        return "1_accueil/section3/section3.html.twig";
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
        return array (  141 => 54,  103 => 18,  85 => 14,  79 => 13,  74 => 12,  57 => 11,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"slider-section\">
\t<div class=\"slider-title\">NOS NOUVEAUX ÉQUIPEMENTS</div>
\t<div class=\"slider-subtitle\">
\t\tDécouvrez les toutes dernières arrivées dans notre salle ! Des équipements modernes et performants pour améliorer vos entraînements.
\t</div>

\t<div class=\"slider-wrapper\">

\t\t<div class=\"slider-container\">
<div class=\"slider\">
    {% for machine in machines %}
        <div class=\"slide {{ loop.first ? 'active' : '' }}\">
            <img src=\"{{ asset('uploads/machines/' ~ machine.image) }}\" alt=\"{{ machine.name }}\">
            <p>{{ machine.name }}</p>
            <a href=\"#\" class=\"discover1\">Découvrir</a>
        </div>
    {% endfor %}
</div>

\t\t</div>
\t</div>

\t<div class=\"equipment-benefits\">
  <h3>Pourquoi ces nouveaux équipements ?</h3>

  <p>
    Chaque année, notre club investit dans de nouveaux équipements afin de permettre
    à nos adhérents de s’entraîner avec du matériel toujours plus moderne,
    performant et adapté à tous les niveaux.
    Nous sélectionnons nos machines pour leur ergonomie, leur robustesse
    et leur efficacité, afin de garantir des entraînements sûrs et optimisés.
  </p>

  <div class=\"benefits-grid\">
    <div class=\"benefit\">
      <strong>✔ Innovation continue</strong>
      <span>Des équipements renouvelés régulièrement pour rester à la pointe</span>
    </div>

    <div class=\"benefit\">
      <strong>✔ Performance & confort</strong>
      <span>Mouvements fluides, charges maîtrisées et ergonomie optimale</span>
    </div>

    <div class=\"benefit\">
      <strong>✔ Sécurité pour tous</strong>
      <span>Matériel adapté aux débutants comme aux sportifs confirmés</span>
    </div>
  </div>
</div>

</div>

 <script src=\"{{ asset('js/accueil/section3/section3.js') }}\" defer></script>
", "1_accueil/section3/section3.html.twig", "/Users/dheillyenzo/projet-chm/templates/1_accueil/section3/section3.html.twig");
    }
}
