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
class __TwigTemplate_e5ffaeb70272d5b8e0a770d37b4fcb20 extends Template
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
        Avec plus de 800 m² d’espace d’entraînement, retrouve tout ce qu’il te faut pour progresser : Cardio, Musculation, Haltérophilie, et même des cours collectifs chaque semaine pour te dépasser dans une super ambiance ! Découvre nos 4 forfaits annuels, adaptés à tous les niveaux à partir de 5,83 €/semaine 🔥
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
        ";
            // line 39
            yield "        ";
            // line 40
            yield "        ";
            $context["studentPrice"] = CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "prix", [], "any", false, false, false, 40);
            // line 41
            yield "        
        ";
            // line 43
            yield "        ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "prix", [], "any", false, false, false, 43) >= 195)) {
                // line 44
                yield "            ";
                $context["studentPrice"] = 185;
                // line 45
                yield "        ";
                // line 46
                yield "        ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "prix_etudiant", [], "any", true, true, false, 46) && CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "prix_etudiant", [], "any", false, false, false, 46))) {
                // line 47
                yield "            ";
                $context["studentPrice"] = CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "prix_etudiant", [], "any", false, false, false, 47);
                // line 48
                yield "        ";
            }
            // line 49
            yield "
        <div class=\"price3\">
            ";
            // line 52
            yield "            <span class=\"dynamic-price\" 
                  data-standard=\"";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "prix", [], "any", false, false, false, 53), "html", null, true);
            yield "\" 
                  data-student=\"";
            // line 54
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["studentPrice"]) || array_key_exists("studentPrice", $context) ? $context["studentPrice"] : (function () { throw new RuntimeError('Variable "studentPrice" does not exist.', 54, $this->source); })()), "html", null, true);
            yield "\">
                ";
            // line 55
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["priceParts"]) || array_key_exists("priceParts", $context) ? $context["priceParts"] : (function () { throw new RuntimeError('Variable "priceParts" does not exist.', 55, $this->source); })()), 0, [], "array", false, false, false, 55), "html", null, true);
            yield "
            </span>
            €<sup>";
            // line 57
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["priceParts"]) || array_key_exists("priceParts", $context) ? $context["priceParts"] : (function () { throw new RuntimeError('Variable "priceParts" does not exist.', 57, $this->source); })()), 1, [], "array", false, false, false, 57), "html", null, true);
            yield "</sup>
        </div>
        
        <div class=\"period\">";
            // line 60
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "frequence", [], "any", false, false, false, 60), "html", null, true);
            yield "</div>
      </div>

      ";
            // line 64
            yield "      ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "mensualite", [], "any", false, false, false, 64)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 65
                yield "        ";
                // line 66
                yield "        <div class=\"subprice3\">Soit ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "mensualite", [], "any", false, false, false, 66), 2, ",", " "), "html", null, true);
                yield "€/mois</div>
      ";
            } else {
                // line 68
                yield "        <div class=\"subprice3\" style=\"visibility: hidden;\">-</div> ";
                // line 69
                yield "      ";
            }
            // line 70
            yield "
      <div class=\"trial-box\">
        <i class=\"fa-solid fa-calendar-check\"></i>
        Séance d’essai possible avant inscription
      </div>

      <ul class=\"features\">
        ";
            // line 77
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "avantages", [], "any", false, false, false, 77));
            foreach ($context['_seq'] as $context["_key"] => $context["avantage"]) {
                // line 78
                yield "            ";
                // line 79
                yield "            ";
                $context["parts"] = Twig\Extension\CoreExtension::split($this->env->getCharset(), $context["avantage"], "|");
                // line 80
                yield "            
            <li>
                ";
                // line 82
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["parts"]) || array_key_exists("parts", $context) ? $context["parts"] : (function () { throw new RuntimeError('Variable "parts" does not exist.', 82, $this->source); })())) > 1)) {
                    // line 83
                    yield "                    ";
                    // line 84
                    yield "                    <i class=\"fa-solid ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::trim(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parts"]) || array_key_exists("parts", $context) ? $context["parts"] : (function () { throw new RuntimeError('Variable "parts" does not exist.', 84, $this->source); })()), 0, [], "array", false, false, false, 84)), "html", null, true);
                    yield " feature-icon\"></i> ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::trim(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parts"]) || array_key_exists("parts", $context) ? $context["parts"] : (function () { throw new RuntimeError('Variable "parts" does not exist.', 84, $this->source); })()), 1, [], "array", false, false, false, 84)), "html", null, true);
                    yield "
                ";
                } else {
                    // line 86
                    yield "                    ";
                    // line 87
                    yield "                    <i class=\"fa-solid fa-check feature-icon\"></i> ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["avantage"], "html", null, true);
                    yield "
                ";
                }
                // line 89
                yield "            </li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['avantage'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 91
            yield "      </ul>

    </article>
    
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['plan'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 96
        yield "    ";
        // line 97
        yield "
  </section>

  <div class=\"pricing-foot\">
    <div class=\"disclaimer\">
      ⚠️
      <strong>Note :</strong>
      Avant d’effectuer le paiement, veuillez vous assurer d’avoir bien rempli le
      <strong>formulaire de licence</strong>.<br>
      Une fois le paiement effectué, merci de remettre le formulaire complété directement
                                                  au bureau du club.<br>
      Si vous ne l’avez pas encore, vous pouvez le télécharger
      <a href=\"URL_DU_FORMULAIRE\" target=\"_blank\">ici</a>.
    </div>
  </div>
</main>

<script src=\"";
        // line 114
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/accueil/section2/section2.js"), "html", null, true);
        yield "\"></script>";
        
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
        return array (  256 => 114,  237 => 97,  235 => 96,  225 => 91,  218 => 89,  212 => 87,  210 => 86,  202 => 84,  200 => 83,  198 => 82,  194 => 80,  191 => 79,  189 => 78,  185 => 77,  176 => 70,  173 => 69,  171 => 68,  165 => 66,  163 => 65,  160 => 64,  154 => 60,  148 => 57,  143 => 55,  139 => 54,  135 => 53,  132 => 52,  128 => 49,  125 => 48,  122 => 47,  119 => 46,  117 => 45,  114 => 44,  111 => 43,  108 => 41,  105 => 40,  103 => 39,  100 => 37,  97 => 36,  91 => 32,  88 => 31,  84 => 29,  81 => 28,  76 => 25,  73 => 24,  68 => 23,  45 => 1,);
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
        Avec plus de 800 m² d’espace d’entraînement, retrouve tout ce qu’il te faut pour progresser : Cardio, Musculation, Haltérophilie, et même des cours collectifs chaque semaine pour te dépasser dans une super ambiance ! Découvre nos 4 forfaits annuels, adaptés à tous les niveaux à partir de 5,83 €/semaine 🔥
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
        
        {# --- LOGIQUE DE PRIX ETUDIANT --- #}
        {# 1. Par défaut, prix étudiant = prix normal #}
        {% set studentPrice = plan.prix %}
        
        {# 2. Si le prix est >= 195€ (ex: 200€), on force le prix étudiant à 185€ #}
        {% if plan.prix >= 195 %}
            {% set studentPrice = 185 %}
        {# Optionnel : Sinon, si un prix étudiant existe en BDD, on le prend #}
        {% elseif plan.prix_etudiant is defined and plan.prix_etudiant %}
            {% set studentPrice = plan.prix_etudiant %}
        {% endif %}

        <div class=\"price3\">
            {# Le span dynamic-price contient les deux valeurs pour le JS #}
            <span class=\"dynamic-price\" 
                  data-standard=\"{{ plan.prix }}\" 
                  data-student=\"{{ studentPrice }}\">
                {{ priceParts[0] }}
            </span>
            €<sup>{{ priceParts[1] }}</sup>
        </div>
        
        <div class=\"period\">{{ plan.frequence }}</div>
      </div>

      {# Mensualité calculée #}
      {% if plan.mensualite %}
        {# On garde la classe subprice3 pour que le JS puisse mettre à jour le \"Soit X €/mois\" #}
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
      ⚠️
      <strong>Note :</strong>
      Avant d’effectuer le paiement, veuillez vous assurer d’avoir bien rempli le
      <strong>formulaire de licence</strong>.<br>
      Une fois le paiement effectué, merci de remettre le formulaire complété directement
                                                  au bureau du club.<br>
      Si vous ne l’avez pas encore, vous pouvez le télécharger
      <a href=\"URL_DU_FORMULAIRE\" target=\"_blank\">ici</a>.
    </div>
  </div>
</main>

<script src=\"{{ asset('js/accueil/section2/section2.js') }}\"></script>", "1_accueil/section2/section2.html.twig", "/Users/dheillyenzo/projet-chm/templates/1_accueil/section2/section2.html.twig");
    }
}
