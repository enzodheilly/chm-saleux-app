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

/* dashboard/tabs/event.html.twig */
class __TwigTemplate_d6c9473607243b237094d3b9d705335d extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/tabs/event.html.twig"));

        // line 1
        yield "<div class=\"tab\" id=\"tab-event\"> <!-- plus \"active\" ici -->
  <div class=\"tab-inner\" style=\"gap:2rem;\">

  <!-- Conteneur messages push -->
<div id=\"push-message-container\" style=\"
    position: fixed;
    top: 1rem;
    right: 1rem;
    z-index: 9999;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
\"></div>

    <!-- Colonne principale -->
    <div class=\"main-column\">

      <!-- Titre de la page -->
      <div class=\"card-header\">
        <span>Liste des événements</span>
      </div>

      <!-- Wrapper des cartes événements -->
      <div class=\"card-wrapper flex-column\" id=\"events-card\" style=\"gap: 1.5rem;margin-top:1px;\">
        <div class=\"card-overlay\" id=\"events-spinner\" style=\"display:none;\">
          <div class=\"spinner\"></div>
        </div>

       ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["events"]) || array_key_exists("events", $context) ? $context["events"] : (function () { throw new RuntimeError('Variable "events" does not exist.', 29, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            // line 30
            yield "
    ";
            // line 37
            yield "    ";
            $context["status"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 38
$context["event"], "isUserConfirmed", [CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 38, $this->source); })()), "user", [], "any", false, false, false, 38)], "method", false, false, false, 38)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("confirmed") : ((((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 39
$context["event"], "isUserPending", [CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 39, $this->source); })()), "user", [], "any", false, false, false, 39)], "method", false, false, false, 39)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("pending") : ("none"))));
            // line 42
            yield "
    <div class=\"event-card flex-row align-center justify-between\">

        <img 
            src=\"";
            // line 46
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "image", [], "any", false, false, false, 46)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, $context["event"], "image", [], "any", false, false, false, 46))), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/default-event.jpg"), "html", null, true)));
            yield "\"
            alt=\"";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 47), "html", null, true);
            yield "\"
            class=\"event-img\"
        />

        <div class=\"flex-1 color-white\">
            <div class=\"font-bold uppercase\">";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 52), "html", null, true);
            yield "</div>
            <div class=\"small-text\">";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "startAt", [], "any", false, false, false, 53), "l d F H:i"), "html", null, true);
            yield "</div>

            ";
            // line 55
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "endAt", [], "any", false, false, false, 55)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 56
                yield "                <div class=\"small-text\">Fin : ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "endAt", [], "any", false, false, false, 56), "H:i"), "html", null, true);
                yield "</div>
            ";
            }
            // line 58
            yield "
            ";
            // line 59
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 59)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 60
                yield "                <div class=\"small-text\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 60), "html", null, true);
                yield "</div>
            ";
            }
            // line 62
            yield "        </div>

        ";
            // line 67
            yield "<button
    class=\"event-register-btn btn btn-primary\"
    data-event-id=\"";
            // line 69
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 69), "html", null, true);
            yield "\"
    data-event-title=\"";
            // line 70
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 70), "html", null, true);
            yield "\"
    data-register-url=\"";
            // line 71
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("event_register", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 71)]), "html", null, true);
            yield "\"
    data-unregister-url=\"";
            // line 72
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("event_unregister", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 72)]), "html", null, true);
            yield "\"
    data-status=\"";
            // line 73
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 73, $this->source); })()), "html", null, true);
            yield "\"  ";
            // line 74
            yield ">
    ";
            // line 75
            if (((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 75, $this->source); })()) == "confirmed")) {
                // line 76
                yield "        Se désinscrire
    ";
            } elseif ((            // line 77
(isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 77, $this->source); })()) == "pending")) {
                // line 78
                yield "        En attente de confirmation
    ";
            } else {
                // line 80
                yield "        Je m'inscris
    ";
            }
            // line 82
            yield "</button>

    </div>

";
            $context['_iterated'] = true;
        }
        // line 86
        if (!$context['_iterated']) {
            // line 87
            yield "    <div class=\"event-card flex-row align-center justify-center\">
        Aucun événement disponible pour le moment.
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['event'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 91
        yield "
        <!-- Bouton \"Voir plus\" -->
        <div style=\"display:flex; justify-content:center; margin-top:0.5rem;\">
          <button class=\"btn-secondary\" onclick=\"window.location.href='/evenements';\" style=\"display:flex; align-items:center; gap:0.5rem;\">
            <img src=\"";
        // line 95
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/plus.png"), "html", null, true);
        yield "\" alt=\"Voir plus\" style=\"width:20px; height:20px;\">
            Voir plus d'événements
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
        return "dashboard/tabs/event.html.twig";
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
        return array (  252 => 131,  245 => 127,  238 => 123,  223 => 111,  204 => 95,  198 => 91,  189 => 87,  187 => 86,  179 => 82,  175 => 80,  171 => 78,  169 => 77,  166 => 76,  164 => 75,  161 => 74,  158 => 73,  154 => 72,  150 => 71,  146 => 70,  142 => 69,  138 => 67,  134 => 62,  128 => 60,  126 => 59,  123 => 58,  117 => 56,  115 => 55,  110 => 53,  106 => 52,  98 => 47,  94 => 46,  88 => 42,  86 => 39,  85 => 38,  83 => 37,  80 => 30,  75 => 29,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"tab\" id=\"tab-event\"> <!-- plus \"active\" ici -->
  <div class=\"tab-inner\" style=\"gap:2rem;\">

  <!-- Conteneur messages push -->
<div id=\"push-message-container\" style=\"
    position: fixed;
    top: 1rem;
    right: 1rem;
    z-index: 9999;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
\"></div>

    <!-- Colonne principale -->
    <div class=\"main-column\">

      <!-- Titre de la page -->
      <div class=\"card-header\">
        <span>Liste des événements</span>
      </div>

      <!-- Wrapper des cartes événements -->
      <div class=\"card-wrapper flex-column\" id=\"events-card\" style=\"gap: 1.5rem;margin-top:1px;\">
        <div class=\"card-overlay\" id=\"events-spinner\" style=\"display:none;\">
          <div class=\"spinner\"></div>
        </div>

       {% for event in events %}

    {# ------------------------------
       DÉTERMINATION DES ÉTATS
       none       → pas inscrit
       pending    → pré-inscrit, en attente de confirmation
       confirmed  → inscrit validé
    -------------------------------- #}
    {% set status =
        event.isUserConfirmed(app.user) ? 'confirmed'
        : event.isUserPending(app.user) ? 'pending'
        : 'none'
    %}

    <div class=\"event-card flex-row align-center justify-between\">

        <img 
            src=\"{{ event.image ? asset('uploads/' ~ event.image) : asset('images/default-event.jpg') }}\"
            alt=\"{{ event.title }}\"
            class=\"event-img\"
        />

        <div class=\"flex-1 color-white\">
            <div class=\"font-bold uppercase\">{{ event.title }}</div>
            <div class=\"small-text\">{{ event.startAt|date('l d F H:i') }}</div>

            {% if event.endAt %}
                <div class=\"small-text\">Fin : {{ event.endAt|date('H:i') }}</div>
            {% endif %}

            {% if event.location %}
                <div class=\"small-text\">{{ event.location }}</div>
            {% endif %}
        </div>

        {# ---------------------------------------------------
           BOUTON DYNAMIQUE À 3 ÉTATS
        ---------------------------------------------------- #}
<button
    class=\"event-register-btn btn btn-primary\"
    data-event-id=\"{{ event.id }}\"
    data-event-title=\"{{ event.title }}\"
    data-register-url=\"{{ path('event_register', {'id': event.id}) }}\"
    data-unregister-url=\"{{ path('event_unregister', {'id': event.id}) }}\"
    data-status=\"{{ status }}\"  {# 'none', 'pending', 'confirmed' #}
>
    {% if status == 'confirmed' %}
        Se désinscrire
    {% elseif status == 'pending' %}
        En attente de confirmation
    {% else %}
        Je m'inscris
    {% endif %}
</button>

    </div>

{% else %}
    <div class=\"event-card flex-row align-center justify-center\">
        Aucun événement disponible pour le moment.
    </div>
{% endfor %}

        <!-- Bouton \"Voir plus\" -->
        <div style=\"display:flex; justify-content:center; margin-top:0.5rem;\">
          <button class=\"btn-secondary\" onclick=\"window.location.href='/evenements';\" style=\"display:flex; align-items:center; gap:0.5rem;\">
            <img src=\"{{ asset('images/plus.png') }}\" alt=\"Voir plus\" style=\"width:20px; height:20px;\">
            Voir plus d'événements
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
", "dashboard/tabs/event.html.twig", "/Users/dheillyenzo/projet-chm/templates/dashboard/tabs/event.html.twig");
    }
}
