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

/* dashboard/tabs/dashboard.html.twig */
class __TwigTemplate_e757730beb0058f09f3c836398eb0900 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/tabs/dashboard.html.twig"));

        // line 1
        yield "<div class=\"tab active\" id=\"tab-dashboard\">
  <div class=\"tab-inner\">

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

      <!-- Texte \"Votre licence\" -->
      <div class=\"card-header\">
        <span>Votre licence</span>
      </div>

      <!-- Carte licence -->
      <div class=\"card-wrapper flex-column\" id=\"licence-card\" style=\"gap: 0;margin-top:-15px;\">

        <!-- Overlay spinner -->
        <div class=\"card-overlay\" id=\"licence-spinner\" style=\"display:none;\">
          <div class=\"spinner\"></div>
        </div>

        ";
        // line 31
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 31, $this->source); })()), "licenceNumber", [], "any", false, false, false, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 32
            yield "        <div class=\"event-card flex-row align-center justify-between\">

          <!-- Info licence -->
          <div class=\"flex-1 text-left\">
            <div class=\"uppercase\">";
            // line 36
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "licenceType", [], "any", true, true, false, 36) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 36, $this->source); })()), "licenceType", [], "any", false, false, false, 36)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 36, $this->source); })()), "licenceType", [], "any", false, false, false, 36), "html", null, true)) : ("Type de licence inconnu"));
            yield "</div>
            <div class=\"small-text\" style=\"color:#fff;\">N°";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 37, $this->source); })()), "licenceNumber", [], "any", false, false, false, 37), "html", null, true);
            yield "</div>
          </div>

          <div class=\"separator\">|</div>

          <!-- Nom / Prénom -->
          <div class=\"flex-1 text-center\">
            <span>";
            // line 44
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 44, $this->source); })()), "lastName", [], "any", false, false, false, 44)), "html", null, true);
            yield "</span>
            <span>";
            // line 45
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 45, $this->source); })()), "firstName", [], "any", false, false, false, 45)), "html", null, true);
            yield "</span>
          </div>

          <!-- Dropdown Gérer -->
          <div class=\"flex-1 text-center\">
            <div class=\"manage-dropdown\" data-delete-url=\"";
            // line 50
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("delete_licence");
            yield "\" style=\"position:relative;\">
              <button class=\"btn-manage\" type=\"button\" style=\"display:flex; align-items:center; gap:0.3rem;\">
                Gérer
                <img src=\"";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/arrow-down.png"), "html", null, true);
            yield "\" alt=\"Gérer\" style=\"width:12px; height:12px; margin-left:4px;\">
              </button>
              <div class=\"dropdown-menu\" style=\"display:none; position:absolute; top:100%; left:0; background:#fff; border:1px solid #ccc; padding:0.5rem; z-index:10; min-width:120px;\">
                <button class=\"btn-remove-licence\" style=\"background:none; border:none; color:red; cursor:pointer; width:100%; text-align:left;\">
                  Supprimer
                </button>
              </div>
            </div>
          </div>

          <!-- Statut -->
          <div class=\"flex-1 text-right flex-row align-center justify-end gap-1\">
            <span class=\"status-dot\"></span>
            <span style=\"margin-right:60px; color:";
            // line 66
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 66, $this->source); })()), "licenceStatus", [], "any", false, false, false, 66) == "Active")) ? ("#0CFF00") : ("#FF0000"));
            yield ";\">
              ";
            // line 67
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 67, $this->source); })()), "licenceStatus", [], "any", false, false, false, 67)), "html", null, true);
            yield "
            </span>
          </div>

        </div>
        ";
        } else {
            // line 73
            yield "        <div class=\"event-card flex-row align-center justify-center\">
          <button class=\"btn-primary\" id=\"open-licence-modal\">Ajouter ma licence</button>
        </div>
        ";
        }
        // line 77
        yield "
      </div>

      <div class=\"horizontal-separator\"></div>

<!-- Événements à venir -->
<div class=\"card-header\">
    <span>Événements à venir</span>
</div>

<div class=\"card-wrapper flex-column\" id=\"events-card\" style=\"gap: 1.5rem;\">
    <div class=\"card-overlay\" id=\"events-spinner\" style=\"display:none;\">
        <div class=\"spinner\"></div>
    </div>

    ";
        // line 93
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), (isset($context["events"]) || array_key_exists("events", $context) ? $context["events"] : (function () { throw new RuntimeError('Variable "events" does not exist.', 93, $this->source); })()), 0, 2));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            // line 94
            yield "
        ";
            // line 101
            yield "        ";
            $context["status"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 102
$context["event"], "isUserConfirmed", [CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 102, $this->source); })()), "user", [], "any", false, false, false, 102)], "method", false, false, false, 102)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("confirmed") : ((((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 103
$context["event"], "isUserPending", [CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 103, $this->source); })()), "user", [], "any", false, false, false, 103)], "method", false, false, false, 103)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("pending") : ("none"))));
            // line 106
            yield "
        <div class=\"event-card flex-row align-center justify-between\">

            <img 
                src=\"";
            // line 110
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "image", [], "any", false, false, false, 110)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, $context["event"], "image", [], "any", false, false, false, 110))), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/default-event.jpg"), "html", null, true)));
            yield "\"
                alt=\"";
            // line 111
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 111), "html", null, true);
            yield "\"
                class=\"event-img\"
            />

            <div class=\"flex-1 color-white\">
                <div class=\"font-bold uppercase\">";
            // line 116
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 116), "html", null, true);
            yield "</div>
                <div class=\"small-text\">";
            // line 117
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "startAt", [], "any", false, false, false, 117), "l d F H:i"), "html", null, true);
            yield "</div>

                ";
            // line 119
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "endAt", [], "any", false, false, false, 119)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 120
                yield "                    <div class=\"small-text\">Fin : ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "endAt", [], "any", false, false, false, 120), "H:i"), "html", null, true);
                yield "</div>
                ";
            }
            // line 122
            yield "
                ";
            // line 123
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 123)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 124
                yield "                    <div class=\"small-text\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 124), "html", null, true);
                yield "</div>
                ";
            }
            // line 126
            yield "            </div>

            ";
            // line 131
            yield "            <button
                class=\"event-register-btn btn btn-primary\"
                data-event-id=\"";
            // line 133
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 133), "html", null, true);
            yield "\"
                data-event-title=\"";
            // line 134
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 134), "html", null, true);
            yield "\"
                data-register-url=\"";
            // line 135
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("event_register", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 135)]), "html", null, true);
            yield "\"
                data-unregister-url=\"";
            // line 136
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("event_unregister", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 136)]), "html", null, true);
            yield "\"
                data-status=\"";
            // line 137
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 137, $this->source); })()), "html", null, true);
            yield "\"  ";
            // line 138
            yield "            >
                ";
            // line 139
            if (((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 139, $this->source); })()) == "confirmed")) {
                // line 140
                yield "                    Se désinscrire
                ";
            } elseif ((            // line 141
(isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 141, $this->source); })()) == "pending")) {
                // line 142
                yield "                    En attente de confirmation
                ";
            } else {
                // line 144
                yield "                    Je m'inscris
                ";
            }
            // line 146
            yield "            </button>

        </div>

    ";
            $context['_iterated'] = true;
        }
        // line 150
        if (!$context['_iterated']) {
            // line 151
            yield "        <div class=\"event-card flex-row align-center justify-center\">
            Aucun événement disponible pour le moment.
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['event'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 155
        yield "
    <!-- Bouton Voir plus -->
<div style=\"display:flex; justify-content:center; margin-top:0.5rem;\">
    <button id=\"see-more-events\" class=\"btn-secondary\" style=\"display:flex; align-items:center; gap:0.5rem;\">
        <img src=\"";
        // line 159
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
      <button class=\"btn-outils\" id=\"refresh-btn\" style=\"display:flex; align-items:center; gap:6px;\">
        <img src=\"";
        // line 175
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/refresh-icon.png"), "html", null, true);
        yield "\" alt=\"Rafraîchir\" style=\"width:22px; height:22px;\">
        Rafraîchir les données
      </button>

      <div class=\"separator\" style=\"height: 1px; width: 93%; background: #ccc;\"></div>

      <a href=\"/faq\" class=\"btn-outils\">
        <img src=\"";
        // line 182
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/help-icon.png"), "html", null, true);
        yield "\" alt=\"Aide\" style=\"width:22px; height:22px;\">
        J'ai besoin d'aide
      </a>

      <div class=\"separator\" style=\"height: 1px; width: 93%; background: #ccc;\"></div>

      <div class=\"card prevention-card-infographic\">
  <div class=\"card-header\">
    <h4 class=\"card-title\">Conseils pour l’entraînement</h4>
  </div>
  <div class=\"card-body\">
    <div class=\"prevention-item\">
      <img src=\"";
        // line 194
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/towel-icon.png"), "html", null, true);
        yield "\" alt=\"Serviette\" class=\"prevention-icon\">
      <p>Venez avec votre serviette.</p>
    </div>
    <div class=\"prevention-item\">
      <img src=\"";
        // line 198
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/friend-icon.png"), "html", null, true);
        yield "\" alt=\"Convivialité\" class=\"prevention-icon\">
      <p>Pensez à être convivial avec les autres adhérents.</p>
    </div>
    <div class=\"prevention-item\">
      <img src=\"";
        // line 202
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/coach-icon.png"), "html", null, true);
        yield "\" alt=\"Coach\" class=\"prevention-icon\">
      <p>N’hésitez pas à demander de l’aide dans la salle, nos coachs diplômés sont là pour vous accompagner.</p>
    </div>
  </div>
</div>

    </div>

  </div>
</div>

<!-- Modal ajout licence -->
<div id=\"licence-modal\" class=\"modal\">
  <div class=\"modal-content\">
    <span class=\"close-modal\">&times;</span>
    <h3>Ajouter votre licence</h3>
    <form id=\"licence-form\" data-url=\"";
        // line 218
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
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "dashboard/tabs/dashboard.html.twig";
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
        return array (  376 => 218,  357 => 202,  350 => 198,  343 => 194,  328 => 182,  318 => 175,  299 => 159,  293 => 155,  284 => 151,  282 => 150,  274 => 146,  270 => 144,  266 => 142,  264 => 141,  261 => 140,  259 => 139,  256 => 138,  253 => 137,  249 => 136,  245 => 135,  241 => 134,  237 => 133,  233 => 131,  229 => 126,  223 => 124,  221 => 123,  218 => 122,  212 => 120,  210 => 119,  205 => 117,  201 => 116,  193 => 111,  189 => 110,  183 => 106,  181 => 103,  180 => 102,  178 => 101,  175 => 94,  169 => 93,  152 => 77,  146 => 73,  137 => 67,  133 => 66,  117 => 53,  111 => 50,  103 => 45,  99 => 44,  89 => 37,  85 => 36,  79 => 32,  77 => 31,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"tab active\" id=\"tab-dashboard\">
  <div class=\"tab-inner\">

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

      <!-- Texte \"Votre licence\" -->
      <div class=\"card-header\">
        <span>Votre licence</span>
      </div>

      <!-- Carte licence -->
      <div class=\"card-wrapper flex-column\" id=\"licence-card\" style=\"gap: 0;margin-top:-15px;\">

        <!-- Overlay spinner -->
        <div class=\"card-overlay\" id=\"licence-spinner\" style=\"display:none;\">
          <div class=\"spinner\"></div>
        </div>

        {% if user.licenceNumber %}
        <div class=\"event-card flex-row align-center justify-between\">

          <!-- Info licence -->
          <div class=\"flex-1 text-left\">
            <div class=\"uppercase\">{{ user.licenceType ?? 'Type de licence inconnu' }}</div>
            <div class=\"small-text\" style=\"color:#fff;\">N°{{ user.licenceNumber }}</div>
          </div>

          <div class=\"separator\">|</div>

          <!-- Nom / Prénom -->
          <div class=\"flex-1 text-center\">
            <span>{{ user.lastName|upper }}</span>
            <span>{{ user.firstName|upper }}</span>
          </div>

          <!-- Dropdown Gérer -->
          <div class=\"flex-1 text-center\">
            <div class=\"manage-dropdown\" data-delete-url=\"{{ path('delete_licence') }}\" style=\"position:relative;\">
              <button class=\"btn-manage\" type=\"button\" style=\"display:flex; align-items:center; gap:0.3rem;\">
                Gérer
                <img src=\"{{ asset('images/arrow-down.png') }}\" alt=\"Gérer\" style=\"width:12px; height:12px; margin-left:4px;\">
              </button>
              <div class=\"dropdown-menu\" style=\"display:none; position:absolute; top:100%; left:0; background:#fff; border:1px solid #ccc; padding:0.5rem; z-index:10; min-width:120px;\">
                <button class=\"btn-remove-licence\" style=\"background:none; border:none; color:red; cursor:pointer; width:100%; text-align:left;\">
                  Supprimer
                </button>
              </div>
            </div>
          </div>

          <!-- Statut -->
          <div class=\"flex-1 text-right flex-row align-center justify-end gap-1\">
            <span class=\"status-dot\"></span>
            <span style=\"margin-right:60px; color:{{ user.licenceStatus == 'Active' ? '#0CFF00' : '#FF0000' }};\">
              {{ user.licenceStatus|capitalize }}
            </span>
          </div>

        </div>
        {% else %}
        <div class=\"event-card flex-row align-center justify-center\">
          <button class=\"btn-primary\" id=\"open-licence-modal\">Ajouter ma licence</button>
        </div>
        {% endif %}

      </div>

      <div class=\"horizontal-separator\"></div>

<!-- Événements à venir -->
<div class=\"card-header\">
    <span>Événements à venir</span>
</div>

<div class=\"card-wrapper flex-column\" id=\"events-card\" style=\"gap: 1.5rem;\">
    <div class=\"card-overlay\" id=\"events-spinner\" style=\"display:none;\">
        <div class=\"spinner\"></div>
    </div>

    {# Limite à 2 événements #}
    {% for event in events|slice(0,2) %}

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

    <!-- Bouton Voir plus -->
<div style=\"display:flex; justify-content:center; margin-top:0.5rem;\">
    <button id=\"see-more-events\" class=\"btn-secondary\" style=\"display:flex; align-items:center; gap:0.5rem;\">
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
      <button class=\"btn-outils\" id=\"refresh-btn\" style=\"display:flex; align-items:center; gap:6px;\">
        <img src=\"{{ asset('images/refresh-icon.png') }}\" alt=\"Rafraîchir\" style=\"width:22px; height:22px;\">
        Rafraîchir les données
      </button>

      <div class=\"separator\" style=\"height: 1px; width: 93%; background: #ccc;\"></div>

      <a href=\"/faq\" class=\"btn-outils\">
        <img src=\"{{ asset('images/help-icon.png') }}\" alt=\"Aide\" style=\"width:22px; height:22px;\">
        J'ai besoin d'aide
      </a>

      <div class=\"separator\" style=\"height: 1px; width: 93%; background: #ccc;\"></div>

      <div class=\"card prevention-card-infographic\">
  <div class=\"card-header\">
    <h4 class=\"card-title\">Conseils pour l’entraînement</h4>
  </div>
  <div class=\"card-body\">
    <div class=\"prevention-item\">
      <img src=\"{{ asset('images/towel-icon.png') }}\" alt=\"Serviette\" class=\"prevention-icon\">
      <p>Venez avec votre serviette.</p>
    </div>
    <div class=\"prevention-item\">
      <img src=\"{{ asset('images/friend-icon.png') }}\" alt=\"Convivialité\" class=\"prevention-icon\">
      <p>Pensez à être convivial avec les autres adhérents.</p>
    </div>
    <div class=\"prevention-item\">
      <img src=\"{{ asset('images/coach-icon.png') }}\" alt=\"Coach\" class=\"prevention-icon\">
      <p>N’hésitez pas à demander de l’aide dans la salle, nos coachs diplômés sont là pour vous accompagner.</p>
    </div>
  </div>
</div>

    </div>

  </div>
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
", "dashboard/tabs/dashboard.html.twig", "/Users/dheillyenzo/projet-chm/templates/dashboard/tabs/dashboard.html.twig");
    }
}
