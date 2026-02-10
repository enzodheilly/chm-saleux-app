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

/* dashboard/tabs/licence.html.twig */
class __TwigTemplate_d96a22d42e654e194eaa20a9a60cf28e extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/tabs/licence.html.twig"));

        // line 1
        yield "<div class=\"tab\" id=\"tab-licence\">
  <div class=\"tab-inner\">

    <!-- Colonne principale -->
    <div class=\"main-column\">

      <!-- Header -->
      <div class=\"card-header\">
        <span>Votre licence</span>
      </div>

      <!-- Wrapper des cards -->
      <div class=\"card-wrapper\">

        ";
        // line 15
        $context["licence"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 15, $this->source); })()), "user", [], "any", false, false, false, 15), "licences", [], "any", false, false, false, 15));
        // line 16
        yield "
";
        // line 17
        if ((($tmp = (isset($context["licence"]) || array_key_exists("licence", $context) ? $context["licence"] : (function () { throw new RuntimeError('Variable "licence" does not exist.', 17, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 18
            yield "  <!-- Affichage infos licence -->
  <div class=\"event-card flex-row align-center justify-start\" style=\"padding:1rem; gap:2.5rem; flex-wrap:wrap;\">
    <!-- Titre + numéro -->
    <div class=\"licence-title-block\">
      <span class=\"uppercase font-bold\">";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["licence"]) || array_key_exists("licence", $context) ? $context["licence"] : (function () { throw new RuntimeError('Variable "licence" does not exist.', 22, $this->source); })()), "type", [], "any", false, false, false, 22), "html", null, true);
            yield "</span>
      <span class=\"small-text\" style=\"margin-top:-3px;color:#fff;\">N°";
            // line 23
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["licence"]) || array_key_exists("licence", $context) ? $context["licence"] : (function () { throw new RuntimeError('Variable "licence" does not exist.', 23, $this->source); })()), "number", [], "any", false, false, false, 23), "html", null, true);
            yield "</span>
    </div>
    <!-- Nom + prénom -->
    <div class=\"flex items-center\" style=\"min-width:150px;margin-left:30px;\">
      <span class=\"small-text\" style=\"color:#fff;\">";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 27, $this->source); })()), "user", [], "any", false, false, false, 27), "lastName", [], "any", false, false, false, 27)), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 27, $this->source); })()), "user", [], "any", false, false, false, 27), "firstName", [], "any", false, false, false, 27)), "html", null, true);
            yield "</span>
    </div>
    <!-- Prix -->
    <div class=\"flex items-center\" style=\"min-width:80px;margin-left:0px\">
      <span class=\"small-text\" style=\"color:#fff;\">
        ";
            // line 32
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["licence"]) || array_key_exists("licence", $context) ? $context["licence"] : (function () { throw new RuntimeError('Variable "licence" does not exist.', 32, $this->source); })()), "forfait", [], "any", false, false, false, 32)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["licence"]) || array_key_exists("licence", $context) ? $context["licence"] : (function () { throw new RuntimeError('Variable "licence" does not exist.', 32, $this->source); })()), "forfait", [], "any", false, false, false, 32), "getPrix", [], "method", false, false, false, 32), "html", null, true)) : ("Non défini"));
            yield " €
      </span>
    </div>
    <!-- Date de fin -->
    <div class=\"flex items-center\" style=\"min-width:100px;margin-left:35px;\">
      <span class=\"small-text\" style=\"color:#fff;\">Expire le : ";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["licence"]) || array_key_exists("licence", $context) ? $context["licence"] : (function () { throw new RuntimeError('Variable "licence" does not exist.', 37, $this->source); })()), "expiryDate", [], "any", false, false, false, 37), "d/m/Y"), "html", null, true);
            yield "</span>
    </div>
    <!-- Statut -->
    <div class=\"flex-1 text-right flex-row align-center justify-end gap-1\">
      <span class=\"status-dot\"></span>
      <span style=\"margin-right:20px; color:";
            // line 42
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 42, $this->source); })()), "licenceStatus", [], "any", false, false, false, 42) == "Active")) ? ("#0CFF00") : ("#FF0000"));
            yield ";\">
        ";
            // line 43
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 43, $this->source); })()), "licenceStatus", [], "any", false, false, false, 43)), "html", null, true);
            yield "
      </span>
    </div>
  </div>

  <!-- Avantages -->
  ";
            // line 49
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["licence"]) || array_key_exists("licence", $context) ? $context["licence"] : (function () { throw new RuntimeError('Variable "licence" does not exist.', 49, $this->source); })()), "benefits", [], "any", false, false, false, 49))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 50
                yield "    <div class=\"card-header\">
      <span style=\"margin-left:-20px;\">Vos avantages</span>
    </div>
    <div class=\"event-card flex-row justify-between\" style=\"padding:1rem; gap:2rem;\">
      <ul class=\"licence-benefits\" style=\"list-style-type: disc; padding-left: 1rem;\">
        ";
                // line 55
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["licence"]) || array_key_exists("licence", $context) ? $context["licence"] : (function () { throw new RuntimeError('Variable "licence" does not exist.', 55, $this->source); })()), "benefits", [], "any", false, false, false, 55));
                foreach ($context['_seq'] as $context["_key"] => $context["benefit"]) {
                    // line 56
                    yield "          <li>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["benefit"], "html", null, true);
                    yield "</li>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['benefit'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 58
                yield "      </ul>
    </div>
  ";
            }
            // line 61
            yield "
";
        } else {
            // line 63
            yield "  <!-- Ajouter licence si pas de licence -->
      <div class=\"event-card flex-row align-center justify-center\">
          <button class=\"btn-primary\" id=\"open-licence-modal\">Ajouter ma licence</button>
        </div>

  <!-- Modal ajout licence -->
  <div id=\"licence-modal\" class=\"modal\">
    <div class=\"modal-content\">
      <span class=\"close-modal\">&times;</span>
      <h3>Ajouter votre licence</h3>
      <form id=\"licence-form\" data-url=\"";
            // line 73
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("add_licence");
            yield "\">
        <input type=\"text\" name=\"licence_number\" placeholder=\"Entrez votre numéro de licence\" required>
        <button type=\"submit\" class=\"btn-primary\">Valider</button>
      </form>
      <div class=\"licence-help-link\">
        <a href=\"#\">Vous ne connaissez pas votre numéro de licence ?</a>
      </div>
    </div>
  </div>

  <!-- Modal confirmation suppression licence -->
  <div id=\"delete-licence-modal\" class=\"modal\">
    <div class=\"modal-content\">
      <span class=\"close-modal\">&times;</span>
      <h3>Confirmer la suppression</h3>
      <p style=\"color:#111;\">Voulez-vous vraiment supprimer votre licence ?</p>
      <div class=\"flex-row gap-2 justify-end\" style=\"margin-top:1rem;\">
        <button class=\"btn-secondary\" id=\"cancel-delete-btn\">Annuler</button>
        <button class=\"btn-danger\" id=\"confirm-delete-btn\">Supprimer</button>
      </div>
    </div>
  </div>
";
        }
        // line 96
        yield "



      </div>

    </div>

    <!-- Colonne droite -->
    <div class=\"sidebar-right-tools flex-column gap-1\">
      <span>Outils complémentaires</span>

      <div class=\"separator\" style=\"height: 1px; width: 93%; background: #ccc;\"></div>

      <a href=\"/faq\" class=\"btn-outils\">
        <img src=\"";
        // line 111
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/help-icon.png"), "html", null, true);
        yield "\" alt=\"Aide\" style=\"width:22px; height:22px;\">
        J'ai besoin d'aide
      </a>

      <div class=\"separator\" style=\"height: 1px; width: 93%; background: #ccc;\"></div>

      <div class=\"card prevention-card-infographic\">
        <div class=\"card-header\">
          <h4 class=\"card-title\">Conseils pour l’événement</h4>
        </div>
        <div class=\"card-body\">
          <div class=\"prevention-item\">
            <img src=\"";
        // line 123
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/towel-icon.png"), "html", null, true);
        yield "\" alt=\"Serviette\" class=\"prevention-icon\">
            <p>Venez avec votre serviette.</p>
          </div>
          <div class=\"prevention-item\">
            <img src=\"";
        // line 127
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/friend-icon.png"), "html", null, true);
        yield "\" alt=\"Convivialité\" class=\"prevention-icon\">
            <p>Pensez à être convivial avec les autres participants.</p>
          </div>
          <div class=\"prevention-item\">
            <img src=\"";
        // line 131
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/coach-icon.png"), "html", null, true);
        yield "\" alt=\"Coach\" class=\"prevention-icon\">
            <p>N’hésitez pas à demander de l’aide aux organisateurs si besoin.</p>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "dashboard/tabs/licence.html.twig";
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
        return array (  239 => 131,  232 => 127,  225 => 123,  210 => 111,  193 => 96,  167 => 73,  155 => 63,  151 => 61,  146 => 58,  137 => 56,  133 => 55,  126 => 50,  124 => 49,  115 => 43,  111 => 42,  103 => 37,  95 => 32,  85 => 27,  78 => 23,  74 => 22,  68 => 18,  66 => 17,  63 => 16,  61 => 15,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"tab\" id=\"tab-licence\">
  <div class=\"tab-inner\">

    <!-- Colonne principale -->
    <div class=\"main-column\">

      <!-- Header -->
      <div class=\"card-header\">
        <span>Votre licence</span>
      </div>

      <!-- Wrapper des cards -->
      <div class=\"card-wrapper\">

        {% set licence = app.user.licences|first %}

{% if licence %}
  <!-- Affichage infos licence -->
  <div class=\"event-card flex-row align-center justify-start\" style=\"padding:1rem; gap:2.5rem; flex-wrap:wrap;\">
    <!-- Titre + numéro -->
    <div class=\"licence-title-block\">
      <span class=\"uppercase font-bold\">{{ licence.type }}</span>
      <span class=\"small-text\" style=\"margin-top:-3px;color:#fff;\">N°{{ licence.number }}</span>
    </div>
    <!-- Nom + prénom -->
    <div class=\"flex items-center\" style=\"min-width:150px;margin-left:30px;\">
      <span class=\"small-text\" style=\"color:#fff;\">{{ app.user.lastName|upper }} {{ app.user.firstName|upper }}</span>
    </div>
    <!-- Prix -->
    <div class=\"flex items-center\" style=\"min-width:80px;margin-left:0px\">
      <span class=\"small-text\" style=\"color:#fff;\">
        {{ licence.forfait ? licence.forfait.getPrix() : 'Non défini' }} €
      </span>
    </div>
    <!-- Date de fin -->
    <div class=\"flex items-center\" style=\"min-width:100px;margin-left:35px;\">
      <span class=\"small-text\" style=\"color:#fff;\">Expire le : {{ licence.expiryDate|date('d/m/Y') }}</span>
    </div>
    <!-- Statut -->
    <div class=\"flex-1 text-right flex-row align-center justify-end gap-1\">
      <span class=\"status-dot\"></span>
      <span style=\"margin-right:20px; color:{{ user.licenceStatus == 'Active' ? '#0CFF00' : '#FF0000' }};\">
        {{ user.licenceStatus|capitalize }}
      </span>
    </div>
  </div>

  <!-- Avantages -->
  {% if licence.benefits is not empty %}
    <div class=\"card-header\">
      <span style=\"margin-left:-20px;\">Vos avantages</span>
    </div>
    <div class=\"event-card flex-row justify-between\" style=\"padding:1rem; gap:2rem;\">
      <ul class=\"licence-benefits\" style=\"list-style-type: disc; padding-left: 1rem;\">
        {% for benefit in licence.benefits %}
          <li>{{ benefit }}</li>
        {% endfor %}
      </ul>
    </div>
  {% endif %}

{% else %}
  <!-- Ajouter licence si pas de licence -->
      <div class=\"event-card flex-row align-center justify-center\">
          <button class=\"btn-primary\" id=\"open-licence-modal\">Ajouter ma licence</button>
        </div>

  <!-- Modal ajout licence -->
  <div id=\"licence-modal\" class=\"modal\">
    <div class=\"modal-content\">
      <span class=\"close-modal\">&times;</span>
      <h3>Ajouter votre licence</h3>
      <form id=\"licence-form\" data-url=\"{{ path('add_licence') }}\">
        <input type=\"text\" name=\"licence_number\" placeholder=\"Entrez votre numéro de licence\" required>
        <button type=\"submit\" class=\"btn-primary\">Valider</button>
      </form>
      <div class=\"licence-help-link\">
        <a href=\"#\">Vous ne connaissez pas votre numéro de licence ?</a>
      </div>
    </div>
  </div>

  <!-- Modal confirmation suppression licence -->
  <div id=\"delete-licence-modal\" class=\"modal\">
    <div class=\"modal-content\">
      <span class=\"close-modal\">&times;</span>
      <h3>Confirmer la suppression</h3>
      <p style=\"color:#111;\">Voulez-vous vraiment supprimer votre licence ?</p>
      <div class=\"flex-row gap-2 justify-end\" style=\"margin-top:1rem;\">
        <button class=\"btn-secondary\" id=\"cancel-delete-btn\">Annuler</button>
        <button class=\"btn-danger\" id=\"confirm-delete-btn\">Supprimer</button>
      </div>
    </div>
  </div>
{% endif %}




      </div>

    </div>

    <!-- Colonne droite -->
    <div class=\"sidebar-right-tools flex-column gap-1\">
      <span>Outils complémentaires</span>

      <div class=\"separator\" style=\"height: 1px; width: 93%; background: #ccc;\"></div>

      <a href=\"/faq\" class=\"btn-outils\">
        <img src=\"{{ asset('images/help-icon.png') }}\" alt=\"Aide\" style=\"width:22px; height:22px;\">
        J'ai besoin d'aide
      </a>

      <div class=\"separator\" style=\"height: 1px; width: 93%; background: #ccc;\"></div>

      <div class=\"card prevention-card-infographic\">
        <div class=\"card-header\">
          <h4 class=\"card-title\">Conseils pour l’événement</h4>
        </div>
        <div class=\"card-body\">
          <div class=\"prevention-item\">
            <img src=\"{{ asset('images/towel-icon.png') }}\" alt=\"Serviette\" class=\"prevention-icon\">
            <p>Venez avec votre serviette.</p>
          </div>
          <div class=\"prevention-item\">
            <img src=\"{{ asset('images/friend-icon.png') }}\" alt=\"Convivialité\" class=\"prevention-icon\">
            <p>Pensez à être convivial avec les autres participants.</p>
          </div>
          <div class=\"prevention-item\">
            <img src=\"{{ asset('images/coach-icon.png') }}\" alt=\"Coach\" class=\"prevention-icon\">
            <p>N’hésitez pas à demander de l’aide aux organisateurs si besoin.</p>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>

", "dashboard/tabs/licence.html.twig", "/Users/dheillyenzo/projet-chm/templates/dashboard/tabs/licence.html.twig");
    }
}
