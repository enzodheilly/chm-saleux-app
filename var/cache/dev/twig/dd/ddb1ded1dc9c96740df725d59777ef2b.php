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

/* dashboard/tabs/boutique.html.twig */
class __TwigTemplate_6fe73e10d5e22e2fbe6e84cbb5e04340 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/tabs/boutique.html.twig"));

        // line 1
        yield "<div class=\"tab\" id=\"tab-boutique\">
  <div class=\"tab-inner\" style=\"gap:2rem;\">

    <!-- Colonne principale -->
    <div class=\"main-column\">

      <!-- Titre de la page -->
      <div class=\"card-header\">
        <span>Nos Produits</span>
      </div>

      <!-- Wrapper des cards produits -->
      <div class=\"card-wrapper flex-column\" id=\"products-card\" style=\"gap: 1.5rem;margin-top:1px;\">
        <div class=\"card-overlay\" id=\"products-spinner\" style=\"display:none;\">
          <div class=\"spinner\"></div>
        </div>

        ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["produits"]) || array_key_exists("produits", $context) ? $context["produits"] : (function () { throw new RuntimeError('Variable "produits" does not exist.', 18, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["produit"]) {
            // line 19
            yield "<div class=\"product-card flex-row align-center justify-between\">
    
    <!-- Image produit -->
    <img src=\"";
            // line 22
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "image", [], "any", false, false, false, 22)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "image", [], "any", false, false, false, 22))), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/default-product.png"), "html", null, true)));
            yield "\" 
         alt=\"";
            // line 23
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "titre", [], "any", false, false, false, 23), "html", null, true);
            yield "\" 
         class=\"product-img\">

    <!-- Infos produit : titre + description -->
    <div class=\"product-info flex-1\">
        <div class=\"font-bold uppercase\">";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "titre", [], "any", false, false, false, 28), "html", null, true);
            yield "</div>
        <div class=\"small-text description\">
            ";
            // line 30
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", false, false, false, 30)) > 50)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", false, false, false, 30), 0, 50) . "…"), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", false, false, false, 30), "html", null, true)));
            yield "
        </div>
    </div>

    <!-- Prix -->
    <div class=\"product-price small-text\">€";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "prix", [], "any", false, false, false, 35), "html", null, true);
            yield "</div>

    <!-- Bouton d'achat -->
    <a href=\"https://www.helloasso.com/associations/ton-association/formulaires/ton-formulaire?produit_id=";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "id", [], "any", false, false, false, 38), "html", null, true);
            yield "\"
       target=\"_blank\"
       class=\"btn btn-primary\">
        Acheter via HelloAsso
    </a>

</div>

        ";
            $context['_iterated'] = true;
        }
        // line 46
        if (!$context['_iterated']) {
            // line 47
            yield "          <div class=\"product-card flex-row align-center justify-center\">
            Aucun produit disponible pour le moment.
          </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['produit'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        yield "
        <!-- Bouton \"Voir plus\" -->
        <div style=\"display:flex; justify-content:center; margin-top:0.5rem;\">
          <button class=\"btn-secondary\" onclick=\"window.location.href='/boutique';\" style=\"display:flex; align-items:center; gap:0.5rem;\">
            <img src=\"";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/plus.png"), "html", null, true);
        yield "\" alt=\"Voir plus\" style=\"width:20px; height:20px;\">
            Voir plus de produits
          </button>
        </div>

      </div>

    </div>

    <!-- Colonne droite -->
    <div class=\"sidebar-right-tools flex-column gap-1\">
      <span>Outils complémentaires</span>

      <div class=\"separator\" style=\"height: 1px; width: 93%; background: #ccc;\"></div>

      <a href=\"/faq\" class=\"btn-outils\">
        <img src=\"";
        // line 71
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
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/towel-icon.png"), "html", null, true);
        yield "\" alt=\"Serviette\" class=\"prevention-icon\">
            <p>Venez avec votre serviette.</p>
          </div>
          <div class=\"prevention-item\">
            <img src=\"";
        // line 87
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/friend-icon.png"), "html", null, true);
        yield "\" alt=\"Convivialité\" class=\"prevention-icon\">
            <p>Pensez à être convivial avec les autres participants.</p>
          </div>
          <div class=\"prevention-item\">
            <img src=\"";
        // line 91
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
        return "dashboard/tabs/boutique.html.twig";
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
        return array (  183 => 91,  176 => 87,  169 => 83,  154 => 71,  135 => 55,  129 => 51,  120 => 47,  118 => 46,  105 => 38,  99 => 35,  91 => 30,  86 => 28,  78 => 23,  74 => 22,  69 => 19,  64 => 18,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"tab\" id=\"tab-boutique\">
  <div class=\"tab-inner\" style=\"gap:2rem;\">

    <!-- Colonne principale -->
    <div class=\"main-column\">

      <!-- Titre de la page -->
      <div class=\"card-header\">
        <span>Nos Produits</span>
      </div>

      <!-- Wrapper des cards produits -->
      <div class=\"card-wrapper flex-column\" id=\"products-card\" style=\"gap: 1.5rem;margin-top:1px;\">
        <div class=\"card-overlay\" id=\"products-spinner\" style=\"display:none;\">
          <div class=\"spinner\"></div>
        </div>

        {% for produit in produits %}
<div class=\"product-card flex-row align-center justify-between\">
    
    <!-- Image produit -->
    <img src=\"{{ produit.image ? asset('uploads/' ~ produit.image) : asset('images/default-product.png') }}\" 
         alt=\"{{ produit.titre }}\" 
         class=\"product-img\">

    <!-- Infos produit : titre + description -->
    <div class=\"product-info flex-1\">
        <div class=\"font-bold uppercase\">{{ produit.titre }}</div>
        <div class=\"small-text description\">
            {{ produit.description|length > 50 ? produit.description[:50] ~ '…' : produit.description }}
        </div>
    </div>

    <!-- Prix -->
    <div class=\"product-price small-text\">€{{ produit.prix }}</div>

    <!-- Bouton d'achat -->
    <a href=\"https://www.helloasso.com/associations/ton-association/formulaires/ton-formulaire?produit_id={{ produit.id }}\"
       target=\"_blank\"
       class=\"btn btn-primary\">
        Acheter via HelloAsso
    </a>

</div>

        {% else %}
          <div class=\"product-card flex-row align-center justify-center\">
            Aucun produit disponible pour le moment.
          </div>
        {% endfor %}

        <!-- Bouton \"Voir plus\" -->
        <div style=\"display:flex; justify-content:center; margin-top:0.5rem;\">
          <button class=\"btn-secondary\" onclick=\"window.location.href='/boutique';\" style=\"display:flex; align-items:center; gap:0.5rem;\">
            <img src=\"{{ asset('images/plus.png') }}\" alt=\"Voir plus\" style=\"width:20px; height:20px;\">
            Voir plus de produits
          </button>
        </div>

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
", "dashboard/tabs/boutique.html.twig", "/Users/dheillyenzo/projet-chm/templates/dashboard/tabs/boutique.html.twig");
    }
}
