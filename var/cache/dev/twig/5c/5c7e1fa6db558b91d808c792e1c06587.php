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

/* 1_accueil/section2/section2.html.twig */
class __TwigTemplate_437567ed47d0b172aa3184b35c23a60e extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "1_accueil/section2/section2.html.twig"));

        // line 1
        yield "<main class=\"pricing-hero\" role=\"main\" aria-labelledby=\"abonnement-title\">
  <div class=\"pricing-head\">
    <div class=\"pricing-left\">
      <h1 id=\"abonnement-title\" class=\"pricing-title\">
        <span>SELECTIONNE L’ABONNEMENT QUI TE CORRESPOND</span>
      </h1>
      <p class=\"pricing-sub\">
        Avec plus de 800 m² d’espace d’entraînement... (ton texte intro)
      </p>
    </div>
  </div>

  <div class=\"segmented-toggle\">
    <input type=\"checkbox\" id=\"toggle\" />
    <div class=\"toggle-bg\"></div>
    <div class=\"toggle-option left\">Standard</div>
    <div class=\"toggle-option right\">Étudiant</div>
  </div>

  <section id=\"abonnements\" class=\"pricing-grid\" aria-label=\"Liste des abonnements\">
    
    ";
        // line 23
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["plans"]) || array_key_exists("plans", $context) ? $context["plans"] : (function () { throw new RuntimeError('Variable "plans" does not exist.', 23, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["plan"]) {
            // line 24
            yield "    
    <article class=\"card ";
            // line 25
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "isPopular", [], "any", false, false, false, 25)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("card-featured") : (""));
            yield "\">
      
      ";
            // line 28
            yield "      ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "isPopular", [], "any", false, false, false, 28)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 29
                yield "        <span class=\"badge-featured\">Le plus populaire</span>
      ";
            }
            // line 31
            yield "
      <h3 class=\"card-title\">";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "nom", [], "any", false, false, false, 32)), "html", null, true);
            yield "</h3>
      
      <div class=\"price-row\">
        ";
            // line 36
            yield "        ";
            $context["priceParts"] = Twig\Extension\CoreExtension::split($this->env->getCharset(), $this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "prix", [], "any", false, false, false, 36), 2, ".", ","), ".");
            // line 37
            yield "        
        <div class=\"price3\"> ";
            // line 39
            yield "            ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["priceParts"]) || array_key_exists("priceParts", $context) ? $context["priceParts"] : (function () { throw new RuntimeError('Variable "priceParts" does not exist.', 39, $this->source); })()), 0, [], "array", false, false, false, 39), "html", null, true);
            yield "€<sup>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["priceParts"]) || array_key_exists("priceParts", $context) ? $context["priceParts"] : (function () { throw new RuntimeError('Variable "priceParts" does not exist.', 39, $this->source); })()), 1, [], "array", false, false, false, 39), "html", null, true);
            yield "</sup>
        </div>
        <div class=\"period\">";
            // line 41
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "frequence", [], "any", false, false, false, 41), "html", null, true);
            yield "</div>
      </div>

      ";
            // line 45
            yield "      ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "mensualite", [], "any", false, false, false, 45)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 46
                yield "        <div class=\"subprice3\">Soit ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "mensualite", [], "any", false, false, false, 46), 2, ",", " "), "html", null, true);
                yield "€/mois</div>
      ";
            } else {
                // line 48
                yield "        <div class=\"subprice3\" style=\"visibility: hidden;\">-</div> ";
                // line 49
                yield "      ";
            }
            // line 50
            yield "
      <div class=\"trial-box\">
        <i class=\"fa-solid fa-calendar-check\"></i>
        Séance d’essai possible avant inscription
      </div>

      <ul class=\"features\">
        ";
            // line 57
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "avantages", [], "any", false, false, false, 57));
            foreach ($context['_seq'] as $context["_key"] => $context["avantage"]) {
                // line 58
                yield "            ";
                // line 59
                yield "            ";
                $context["parts"] = Twig\Extension\CoreExtension::split($this->env->getCharset(), $context["avantage"], "|");
                // line 60
                yield "            
            <li>
                ";
                // line 62
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["parts"]) || array_key_exists("parts", $context) ? $context["parts"] : (function () { throw new RuntimeError('Variable "parts" does not exist.', 62, $this->source); })())) > 1)) {
                    // line 63
                    yield "                    ";
                    // line 64
                    yield "                    <i class=\"fa-solid ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::trim(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parts"]) || array_key_exists("parts", $context) ? $context["parts"] : (function () { throw new RuntimeError('Variable "parts" does not exist.', 64, $this->source); })()), 0, [], "array", false, false, false, 64)), "html", null, true);
                    yield " feature-icon\"></i> ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::trim(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parts"]) || array_key_exists("parts", $context) ? $context["parts"] : (function () { throw new RuntimeError('Variable "parts" does not exist.', 64, $this->source); })()), 1, [], "array", false, false, false, 64)), "html", null, true);
                    yield "
                ";
                } else {
                    // line 66
                    yield "                    ";
                    // line 67
                    yield "                    <i class=\"fa-solid fa-check feature-icon\"></i> ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["avantage"], "html", null, true);
                    yield "
                ";
                }
                // line 69
                yield "            </li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['avantage'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 71
            yield "      </ul>

    </article>
    
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['plan'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        yield "    ";
        // line 77
        yield "
  </section>

  <div class=\"pricing-foot\">
    <div class=\"disclaimer\">
      ⚠️ <strong>Note :</strong> Avant d’effectuer le paiement... (ton texte disclaimer)
    </div>
  </div>
</main>

<script src=\"";
        // line 87
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/accueil/section2/section2.js"), "html", null, true);
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
        return "1_accueil/section2/section2.html.twig";
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
        return array (  204 => 87,  192 => 77,  190 => 76,  180 => 71,  173 => 69,  167 => 67,  165 => 66,  157 => 64,  155 => 63,  153 => 62,  149 => 60,  146 => 59,  144 => 58,  140 => 57,  131 => 50,  128 => 49,  126 => 48,  120 => 46,  117 => 45,  111 => 41,  103 => 39,  100 => 37,  97 => 36,  91 => 32,  88 => 31,  84 => 29,  81 => 28,  76 => 25,  73 => 24,  68 => 23,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<main class=\"pricing-hero\" role=\"main\" aria-labelledby=\"abonnement-title\">
  <div class=\"pricing-head\">
    <div class=\"pricing-left\">
      <h1 id=\"abonnement-title\" class=\"pricing-title\">
        <span>SELECTIONNE L’ABONNEMENT QUI TE CORRESPOND</span>
      </h1>
      <p class=\"pricing-sub\">
        Avec plus de 800 m² d’espace d’entraînement... (ton texte intro)
      </p>
    </div>
  </div>

  <div class=\"segmented-toggle\">
    <input type=\"checkbox\" id=\"toggle\" />
    <div class=\"toggle-bg\"></div>
    <div class=\"toggle-option left\">Standard</div>
    <div class=\"toggle-option right\">Étudiant</div>
  </div>

  <section id=\"abonnements\" class=\"pricing-grid\" aria-label=\"Liste des abonnements\">
    
    {# --- DÉBUT DE LA BOUCLE SUR LES FORFAITS --- #}
    {% for plan in plans %}
    
    <article class=\"card {{ plan.isPopular ? 'card-featured' : '' }}\">
      
      {# Badge Populaire #}
      {% if plan.isPopular %}
        <span class=\"badge-featured\">Le plus populaire</span>
      {% endif %}

      <h3 class=\"card-title\">{{ plan.nom|upper }}</h3>
      
      <div class=\"price-row\">
        {# On sépare les euros et les centimes pour le style #}
        {% set priceParts = plan.prix|number_format(2, '.', ',')|split('.') %}
        
        <div class=\"price3\"> {# Tu peux rendre cette classe dynamique si besoin #}
            {{ priceParts[0] }}€<sup>{{ priceParts[1] }}</sup>
        </div>
        <div class=\"period\">{{ plan.frequence }}</div>
      </div>

      {# Mensualité calculée #}
      {% if plan.mensualite %}
        <div class=\"subprice3\">Soit {{ plan.mensualite|number_format(2, ',', ' ') }}€/mois</div>
      {% else %}
        <div class=\"subprice3\" style=\"visibility: hidden;\">-</div> {# Garde l'espace #}
      {% endif %}

      <div class=\"trial-box\">
        <i class=\"fa-solid fa-calendar-check\"></i>
        Séance d’essai possible avant inscription
      </div>

      <ul class=\"features\">
        {% for avantage in plan.avantages %}
            {# --- LOGIQUE D'EXTRACTION DE L'ICÔNE --- #}
            {% set parts = avantage|split('|') %}
            
            <li>
                {% if parts|length > 1 %}
                    {# Si on a mis un |, partie 1 = icone, partie 2 = texte #}
                    <i class=\"fa-solid {{ parts[0]|trim }} feature-icon\"></i> {{ parts[1]|trim }}
                {% else %}
                    {# Si pas de |, on met une icône par défaut (ex: check) #}
                    <i class=\"fa-solid fa-check feature-icon\"></i> {{ avantage }}
                {% endif %}
            </li>
        {% endfor %}
      </ul>

    </article>
    
    {% endfor %}
    {# --- FIN DE LA BOUCLE --- #}

  </section>

  <div class=\"pricing-foot\">
    <div class=\"disclaimer\">
      ⚠️ <strong>Note :</strong> Avant d’effectuer le paiement... (ton texte disclaimer)
    </div>
  </div>
</main>

<script src=\"{{ asset('js/accueil/section2/section2.js') }}\"></script>
", "1_accueil/section2/section2.html.twig", "/Users/dheillyenzo/projet-chm/templates/1_accueil/section2/section2.html.twig");
    }
}
