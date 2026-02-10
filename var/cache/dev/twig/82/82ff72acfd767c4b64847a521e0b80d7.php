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

/* dashboard/nav.html.twig */
class __TwigTemplate_6ecd75d14f484d9d7276897541ca0a5b extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/nav.html.twig"));

        // line 1
        yield "<nav class=\"dashboard-navbar\">

  <div class=\"logo-and-title\">
    <div class=\"logo\">
      <img src=\"";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/favicon/icon.png"), "html", null, true);
        yield "\" alt=\"Logo\" />
    </div>
    <div class=\"navbar-title\">
      Mon espace adhérent
    </div>
  </div>

  <div class=\"right\">
<div class=\"item icon\" id=\"notification-icon\">
    <img src=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/notification.png"), "html", null, true);
        yield "\" alt=\"Notifications\">

    ";
        // line 17
        yield "    ";
        $context["unseenEvents"] = Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 17, $this->source); })()), "userEvents", [], "any", false, false, false, 17), function ($__e__) use ($context, $macros) { $context["e"] = $__e__; return ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["e"]) || array_key_exists("e", $context) ? $context["e"] : (function () { throw new RuntimeError('Variable "e" does not exist.', 17, $this->source); })()), "status", [], "any", false, false, false, 17) == "confirmed") && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["e"]) || array_key_exists("e", $context) ? $context["e"] : (function () { throw new RuntimeError('Variable "e" does not exist.', 17, $this->source); })()), "seen", [], "any", false, false, false, 17) == false)); });
        // line 18
        yield "    ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["unseenEvents"]) || array_key_exists("unseenEvents", $context) ? $context["unseenEvents"] : (function () { throw new RuntimeError('Variable "unseenEvents" does not exist.', 18, $this->source); })())) > 0)) {
            // line 19
            yield "        <span class=\"notif-count\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["unseenEvents"]) || array_key_exists("unseenEvents", $context) ? $context["unseenEvents"] : (function () { throw new RuntimeError('Variable "unseenEvents" does not exist.', 19, $this->source); })())), "html", null, true);
            yield "</span>
    ";
        }
        // line 21
        yield "</div>

<div id=\"notification-dropdown\" class=\"notification-dropdown\">
    ";
        // line 24
        $context["confirmedEvents"] = Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 24, $this->source); })()), "userEvents", [], "any", false, false, false, 24), function ($__e__) use ($context, $macros) { $context["e"] = $__e__; return (CoreExtension::getAttribute($this->env, $this->source, (isset($context["e"]) || array_key_exists("e", $context) ? $context["e"] : (function () { throw new RuntimeError('Variable "e" does not exist.', 24, $this->source); })()), "status", [], "any", false, false, false, 24) == "confirmed"); });
        // line 25
        yield "    ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["confirmedEvents"]) || array_key_exists("confirmedEvents", $context) ? $context["confirmedEvents"] : (function () { throw new RuntimeError('Variable "confirmedEvents" does not exist.', 25, $this->source); })())) == 0)) {
            // line 26
            yield "        <p class=\"no-notif\">Aucune notification</p>
    ";
        } else {
            // line 28
            yield "        <ul>
            ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["confirmedEvents"]) || array_key_exists("confirmedEvents", $context) ? $context["confirmedEvents"] : (function () { throw new RuntimeError('Variable "confirmedEvents" does not exist.', 29, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["ue"]) {
                // line 30
                yield "                <li data-ue-id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ue"], "id", [], "any", false, false, false, 30), "html", null, true);
                yield "\">
                    <div class=\"notif-message\">
                        <strong>Inscription réussie pour l'événement \"";
                // line 32
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ue"], "event", [], "any", false, false, false, 32), "title", [], "any", false, false, false, 32), "html", null, true);
                yield "\" ✅</strong>
                        <small>Date : ";
                // line 33
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ue"], "event", [], "any", false, false, false, 33), "date", [], "any", false, false, false, 33), "d/m/Y"), "html", null, true);
                yield " | Heure : ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ue"], "event", [], "any", false, false, false, 33), "startTime", [], "any", false, false, false, 33), "H:i"), "html", null, true);
                yield "</small>
                    </div>
                </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['ue'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            yield "        </ul>
    ";
        }
        // line 39
        yield "</div>


    <div class=\"item\">
      \t<a href=\"";
        // line 43
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("contact");
        yield "\">
\t\t\t\t\tContact
\t\t\t\t</a>
    </div>

    <div class=\"item profile\" style=\"color:#fff;\">
      <span><strong>Mon profil</strong></span>
      <span style=\"margin-right:18px;color:#fff;\">ENZO D.</span>
    </div>

    <div class=\"item icon\">
      <img src=\"";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/settings.png"), "html", null, true);
        yield "\" alt=\"Settings\">
    </div>
  </div>
</nav>

<!-- Menu Profil -->
<div id=\"sidebar-profile\" class=\"sidebar-right\">
  <div class=\"sidebar-header\">
<div class=\"profile-info\">
  <h3 id=\"user-fullname\" style=\"color:#fff;\">";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 63, $this->source); })()), "user", [], "any", false, false, false, 63), "firstName", [], "any", false, false, false, 63), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 63, $this->source); })()), "user", [], "any", false, false, false, 63), "lastName", [], "any", false, false, false, 63), "html", null, true);
        yield "</h3>
  <p class=\"profile-id\">Client n°458923</p>
  <p class=\"profile-status\">Membre du club</p>
</div>

    <span id=\"close-profile\" class=\"close-btn\">&times;</span>
  </div>

  <div class=\"sidebar-separator\"></div>

    <!-- Connexion et sécurité -->
<div class=\"settings-section\">
    <h4>Connexion et sécurité</h4>
    <ul>
      <li>
        <a href=\"javascript:void(0);\" id=\"open-password-sidebar\">
          Modifier mon mot de passe
        </a>
      </li>
    </ul>
</div>


  <!-- Informations personnelles -->
  <div class=\"settings-section\">
    <h4>Informations personnelles</h4>
    <ul>
      <li>
    <a href=\"javascript:void(0);\" id=\"open-phone-sidebar\">
          <strong>Téléphone mobile</strong><br>
          <small>Ajoutez ou modifiez votre numéro.</small>
        </a>
      </li>

      <li>
    <a href=\"javascript:void(0);\" id=\"open-email-sidebar\">
          <strong>Email</strong><br>
          <small>";
        // line 100
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 100, $this->source); })()), "user", [], "any", false, false, false, 100), "email", [], "any", false, false, false, 100), "html", null, true);
        yield "</small>
        </a>
      </li>
    </ul>
  </div>

<!-- Sidebar pour modifier l'email -->
<!-- Sidebar pour email (lecture seule + lien modification) -->
<div id=\"sidebar-email\" class=\"sidebar-right\">
  <div class=\"sidebar-header\">
    <h3 style=\"color:#fff;\">Mon email</h3>
    <span id=\"close-email\" class=\"close-btn\">&times;</span>
  </div>

  <div class=\"sidebar-separator\"></div>

  <form id=\"change-email-form\" action=\"";
        // line 116
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("profile_send_email_code");
        yield "\" method=\"POST\">
    <div class=\"form-group\">
      <label for=\"email\">Email actuel</label>
      <input type=\"email\" id=\"email\" value=\"";
        // line 119
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 119, $this->source); })()), "user", [], "any", false, false, false, 119), "email", [], "any", false, false, false, 119), "html", null, true);
        yield "\" readonly style=\"background:#444; color:#ccc; cursor:not-allowed;\">
    </div>
    <div class=\"form-group\">
      <a href=\"javascript:void(0);\" id=\"open-email-sidebar\" style=\"color:#d32f2f; font-weight:600; text-decoration: underline;\">
        Modifier l’adresse mail
      </a>
    </div>
  </form>
</div>

<!-- Étape 1 : Saisie nouvelle adresse email -->
<div id=\"modal-new-email\" class=\"sidebar-right\">
  <div class=\"sidebar-header\">
    <h3 style=\"color:#fff;\">Nouvelle adresse mail</h3>
    <span id=\"close-new-email\" class=\"close-btn\">&times;</span>
  </div>
  <div class=\"sidebar-separator\"></div>
  <form id=\"form-new-email\">
    <div class=\"form-group\">
      <label for=\"new-email\">Nouvelle adresse mail</label>
      <input type=\"email\" id=\"new-email\" name=\"email\" placeholder=\"exemple@domaine.com\" required>
    </div>
    <button type=\"submit\">Suivant</button>
  </form>
</div>

<!-- Étape 2 : Saisie du code reçu -->
<div id=\"modal-email-code\" class=\"sidebar-right\">
  <div class=\"sidebar-header\">
    <h3 style=\"color:#fff;\">Code de vérification</h3>
    <span id=\"close-email-code\" class=\"close-btn\">&times;</span>
  </div>
  <div class=\"sidebar-separator\"></div>
  <form id=\"form-email-code\">
    <div class=\"form-group\">
      <label for=\"email-code\">Entrez le code à 6 chiffres reçu par email</label>
      <input type=\"text\" id=\"email-code\" name=\"code\" maxlength=\"6\" placeholder=\"123456\" required>
      <input type=\"hidden\" id=\"hidden-email\" name=\"email\">
    </div>
    <button type=\"submit\">Valider</button>
  </form>
</div>

<!-- Sidebar pour téléphone (lecture seule + lien modification) -->
<div id=\"sidebar-phone-view\" class=\"sidebar-right\">
  <div class=\"sidebar-header\">
    <h3 style=\"color:#fff;\">Mon téléphone</h3>
    <span id=\"close-phone-view\" class=\"close-btn\">&times;</span>
  </div>

  <div class=\"form-group\">
    <label for=\"phone-current\" style=\"margin-left:20px;\">Numéro actuel</label>
    <input type=\"tel\" id=\"phone-current\" value=\"";
        // line 171
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 171, $this->source); })()), "user", [], "any", false, false, false, 171), "phone", [], "any", false, false, false, 171), "html", null, true);
        yield "\" readonly
           style=\"background:#444; color:#ccc; cursor:not-allowed;\">
  </div>

  <div class=\"form-group\">
    <a href=\"javascript:void(0);\" id=\"open-phone-edit\" 
       style=\"color:#d32f2f; font-weight:600; text-decoration: underline;margin-left:20px;\">
      Modifier le numéro
    </a>
  </div>
</div>

<!-- Sidebar pour modifier le téléphone (formulaire réel) -->
<div id=\"sidebar-phone-edit\" class=\"sidebar-right\">
  <div class=\"sidebar-header\">
    <h3 style=\"color:#fff;\">Modifier mon téléphone</h3>
    <span id=\"close-phone-edit\" class=\"close-btn\">&times;</span>
  </div>

  <div class=\"sidebar-separator\"></div>

  <form id=\"change-phone-form\" data-url=\"";
        // line 192
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("profile_update_phone");
        yield "\">
      <div class=\"form-group\">
          <label for=\"phone\">Nouveau téléphone</label>
          <input type=\"tel\" name=\"phone\" id=\"phone\" required value=\"";
        // line 195
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 195, $this->source); })()), "user", [], "any", false, false, false, 195), "phone", [], "any", false, false, false, 195), "html", null, true);
        yield "\" style=\"width:101%;margin-left:0px;\">
      </div>
      <button type=\"submit\">Enregistrer</button>
  </form>
</div>


  <!-- Statuts et rôles -->
  <div class=\"settings-section\">
    <h4>Rôle dans le club</h4>
    <ul>
      <li><a href=\"#\">Président</a></li>
      <li><a href=\"#\">Secrétaire</a></li>
      <li><a href=\"#\">Trésorier</a></li>
      <li><a href=\"#\">Bénévole</a></li>
    </ul>
  </div>
</div>

<!-- Menu Paramètres -->
<div id=\"sidebar-settings\" class=\"sidebar-right\">
  <div class=\"sidebar-header\">
    <h3 style=\"color:#fff;\">Réglages</h3>
    <span id=\"close-settings\" class=\"close-btn\">&times;</span>
  </div>

  <div class=\"sidebar-separator\"></div>

  <!-- Autres réglages -->
  <div class=\"settings-section\">
    <h4>Autres réglages</h4>
    <ul>
          <li>
        <a href=\"#\">
          <strong>Personnaliser le profil</strong><br>
          <small>Gérez vos informations personnelles et vos données.</small>
        </a>
      </li>
      <li>
        <a href=\"#\">Changer le thème</a>
      </li>
    </ul>
  </div>

  <!-- Infos légales -->
  <div class=\"settings-section\">
    <h4>Infos légales</h4>
    <ul>
      <li>
        <a href=\"";
        // line 244
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("page_show", ["slug" => "mentions-legales"]);
        yield "\">Mentions légales</a>
      </li>
           <li>
        <a href=\"";
        // line 247
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("page_show", ["slug" => "conditions-utilisation"]);
        yield "\">Conditions d’utilisation</a>
      </li>
           <li>
        <a href=\"";
        // line 250
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("page_show", ["slug" => "confidentialite"]);
        yield "\">Confidentialité</a>
      </li>
           <li>
        <a href=\"";
        // line 253
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("page_show", ["slug" => "cookies"]);
        yield "\">Cookies</a>
      </li>
      <li>
        <a href=\"";
        // line 256
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "#abonnements\">Tarifs</a>
    </ul>
  </div>

    <!-- Suppression du compte -->
  <div class=\"settings-section\" style=\"margin-top:35px;\">
    <h4 style=\"color:#ff4444;\">Supprimer mon compte</h4>
    <ul>
      <li>
        <a href=\"javascript:void(0);\" id=\"open-delete-account\" style=\"color:#ff4444; font-weight:600;\">
          Supprimer définitivement mon compte
        </a>
      </li>
    </ul>
  </div>
</div>

<!-- Modal suppression compte -->
<div id=\"modal-delete-account\" class=\"delete-account-modal\">
  <div class=\"modal-header\">
    <h3>⚠ Supprimer mon compte</h3>
    <span id=\"close-delete-account\" class=\"close-btn\">&times;</span>
  </div>

  <div class=\"separator\"></div>

  <div class=\"warning-text\">
    Attention : cette action est irréversible.<br>
    Tous vos données seront définitivement supprimées.
  </div>

  <form id=\"form-delete-account\" method=\"POST\" action=\"";
        // line 287
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("profile_delete_account");
        yield "\">
    <div class=\"form-group\">
      <label for=\"confirm-delete\">Pour confirmer, tapez : <strong>supprimer mon compte</strong></label>
      <input type=\"text\" id=\"confirm-delete\" name=\"confirm\" placeholder=\"supprimer mon compte\" required>
    </div>

    <div class=\"form-group\">
      <label for=\"password-delete\">Confirmez avec votre mot de passe</label>
      <input type=\"password\" id=\"password-delete\" name=\"password\" placeholder=\"Mot de passe\" required>
    </div>

    <button type=\"submit\">Supprimer mon compte</button>
  </form>
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
        return "dashboard/nav.html.twig";
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
        return array (  421 => 287,  387 => 256,  381 => 253,  375 => 250,  369 => 247,  363 => 244,  311 => 195,  305 => 192,  281 => 171,  226 => 119,  220 => 116,  201 => 100,  159 => 63,  147 => 54,  133 => 43,  127 => 39,  123 => 37,  111 => 33,  107 => 32,  101 => 30,  97 => 29,  94 => 28,  90 => 26,  87 => 25,  85 => 24,  80 => 21,  74 => 19,  71 => 18,  68 => 17,  63 => 14,  51 => 5,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<nav class=\"dashboard-navbar\">

  <div class=\"logo-and-title\">
    <div class=\"logo\">
      <img src=\"{{ asset('images/favicon/icon.png') }}\" alt=\"Logo\" />
    </div>
    <div class=\"navbar-title\">
      Mon espace adhérent
    </div>
  </div>

  <div class=\"right\">
<div class=\"item icon\" id=\"notification-icon\">
    <img src=\"{{ asset('images/notification.png') }}\" alt=\"Notifications\">

    {# Badge rouge pour les notifications non vues #}
    {% set unseenEvents = user.userEvents|filter(e => e.status == 'confirmed' and e.seen == false) %}
    {% if unseenEvents|length > 0 %}
        <span class=\"notif-count\">{{ unseenEvents|length }}</span>
    {% endif %}
</div>

<div id=\"notification-dropdown\" class=\"notification-dropdown\">
    {% set confirmedEvents = user.userEvents|filter(e => e.status == 'confirmed') %}
    {% if confirmedEvents|length == 0 %}
        <p class=\"no-notif\">Aucune notification</p>
    {% else %}
        <ul>
            {% for ue in confirmedEvents %}
                <li data-ue-id=\"{{ ue.id }}\">
                    <div class=\"notif-message\">
                        <strong>Inscription réussie pour l'événement \"{{ ue.event.title }}\" ✅</strong>
                        <small>Date : {{ ue.event.date|date('d/m/Y') }} | Heure : {{ ue.event.startTime|date('H:i') }}</small>
                    </div>
                </li>
            {% endfor %}
        </ul>
    {% endif %}
</div>


    <div class=\"item\">
      \t<a href=\"{{ path('contact') }}\">
\t\t\t\t\tContact
\t\t\t\t</a>
    </div>

    <div class=\"item profile\" style=\"color:#fff;\">
      <span><strong>Mon profil</strong></span>
      <span style=\"margin-right:18px;color:#fff;\">ENZO D.</span>
    </div>

    <div class=\"item icon\">
      <img src=\"{{ asset('images/settings.png') }}\" alt=\"Settings\">
    </div>
  </div>
</nav>

<!-- Menu Profil -->
<div id=\"sidebar-profile\" class=\"sidebar-right\">
  <div class=\"sidebar-header\">
<div class=\"profile-info\">
  <h3 id=\"user-fullname\" style=\"color:#fff;\">{{ app.user.firstName }} {{ app.user.lastName }}</h3>
  <p class=\"profile-id\">Client n°458923</p>
  <p class=\"profile-status\">Membre du club</p>
</div>

    <span id=\"close-profile\" class=\"close-btn\">&times;</span>
  </div>

  <div class=\"sidebar-separator\"></div>

    <!-- Connexion et sécurité -->
<div class=\"settings-section\">
    <h4>Connexion et sécurité</h4>
    <ul>
      <li>
        <a href=\"javascript:void(0);\" id=\"open-password-sidebar\">
          Modifier mon mot de passe
        </a>
      </li>
    </ul>
</div>


  <!-- Informations personnelles -->
  <div class=\"settings-section\">
    <h4>Informations personnelles</h4>
    <ul>
      <li>
    <a href=\"javascript:void(0);\" id=\"open-phone-sidebar\">
          <strong>Téléphone mobile</strong><br>
          <small>Ajoutez ou modifiez votre numéro.</small>
        </a>
      </li>

      <li>
    <a href=\"javascript:void(0);\" id=\"open-email-sidebar\">
          <strong>Email</strong><br>
          <small>{{ app.user.email }}</small>
        </a>
      </li>
    </ul>
  </div>

<!-- Sidebar pour modifier l'email -->
<!-- Sidebar pour email (lecture seule + lien modification) -->
<div id=\"sidebar-email\" class=\"sidebar-right\">
  <div class=\"sidebar-header\">
    <h3 style=\"color:#fff;\">Mon email</h3>
    <span id=\"close-email\" class=\"close-btn\">&times;</span>
  </div>

  <div class=\"sidebar-separator\"></div>

  <form id=\"change-email-form\" action=\"{{ path('profile_send_email_code') }}\" method=\"POST\">
    <div class=\"form-group\">
      <label for=\"email\">Email actuel</label>
      <input type=\"email\" id=\"email\" value=\"{{ app.user.email }}\" readonly style=\"background:#444; color:#ccc; cursor:not-allowed;\">
    </div>
    <div class=\"form-group\">
      <a href=\"javascript:void(0);\" id=\"open-email-sidebar\" style=\"color:#d32f2f; font-weight:600; text-decoration: underline;\">
        Modifier l’adresse mail
      </a>
    </div>
  </form>
</div>

<!-- Étape 1 : Saisie nouvelle adresse email -->
<div id=\"modal-new-email\" class=\"sidebar-right\">
  <div class=\"sidebar-header\">
    <h3 style=\"color:#fff;\">Nouvelle adresse mail</h3>
    <span id=\"close-new-email\" class=\"close-btn\">&times;</span>
  </div>
  <div class=\"sidebar-separator\"></div>
  <form id=\"form-new-email\">
    <div class=\"form-group\">
      <label for=\"new-email\">Nouvelle adresse mail</label>
      <input type=\"email\" id=\"new-email\" name=\"email\" placeholder=\"exemple@domaine.com\" required>
    </div>
    <button type=\"submit\">Suivant</button>
  </form>
</div>

<!-- Étape 2 : Saisie du code reçu -->
<div id=\"modal-email-code\" class=\"sidebar-right\">
  <div class=\"sidebar-header\">
    <h3 style=\"color:#fff;\">Code de vérification</h3>
    <span id=\"close-email-code\" class=\"close-btn\">&times;</span>
  </div>
  <div class=\"sidebar-separator\"></div>
  <form id=\"form-email-code\">
    <div class=\"form-group\">
      <label for=\"email-code\">Entrez le code à 6 chiffres reçu par email</label>
      <input type=\"text\" id=\"email-code\" name=\"code\" maxlength=\"6\" placeholder=\"123456\" required>
      <input type=\"hidden\" id=\"hidden-email\" name=\"email\">
    </div>
    <button type=\"submit\">Valider</button>
  </form>
</div>

<!-- Sidebar pour téléphone (lecture seule + lien modification) -->
<div id=\"sidebar-phone-view\" class=\"sidebar-right\">
  <div class=\"sidebar-header\">
    <h3 style=\"color:#fff;\">Mon téléphone</h3>
    <span id=\"close-phone-view\" class=\"close-btn\">&times;</span>
  </div>

  <div class=\"form-group\">
    <label for=\"phone-current\" style=\"margin-left:20px;\">Numéro actuel</label>
    <input type=\"tel\" id=\"phone-current\" value=\"{{ app.user.phone }}\" readonly
           style=\"background:#444; color:#ccc; cursor:not-allowed;\">
  </div>

  <div class=\"form-group\">
    <a href=\"javascript:void(0);\" id=\"open-phone-edit\" 
       style=\"color:#d32f2f; font-weight:600; text-decoration: underline;margin-left:20px;\">
      Modifier le numéro
    </a>
  </div>
</div>

<!-- Sidebar pour modifier le téléphone (formulaire réel) -->
<div id=\"sidebar-phone-edit\" class=\"sidebar-right\">
  <div class=\"sidebar-header\">
    <h3 style=\"color:#fff;\">Modifier mon téléphone</h3>
    <span id=\"close-phone-edit\" class=\"close-btn\">&times;</span>
  </div>

  <div class=\"sidebar-separator\"></div>

  <form id=\"change-phone-form\" data-url=\"{{ path('profile_update_phone') }}\">
      <div class=\"form-group\">
          <label for=\"phone\">Nouveau téléphone</label>
          <input type=\"tel\" name=\"phone\" id=\"phone\" required value=\"{{ app.user.phone }}\" style=\"width:101%;margin-left:0px;\">
      </div>
      <button type=\"submit\">Enregistrer</button>
  </form>
</div>


  <!-- Statuts et rôles -->
  <div class=\"settings-section\">
    <h4>Rôle dans le club</h4>
    <ul>
      <li><a href=\"#\">Président</a></li>
      <li><a href=\"#\">Secrétaire</a></li>
      <li><a href=\"#\">Trésorier</a></li>
      <li><a href=\"#\">Bénévole</a></li>
    </ul>
  </div>
</div>

<!-- Menu Paramètres -->
<div id=\"sidebar-settings\" class=\"sidebar-right\">
  <div class=\"sidebar-header\">
    <h3 style=\"color:#fff;\">Réglages</h3>
    <span id=\"close-settings\" class=\"close-btn\">&times;</span>
  </div>

  <div class=\"sidebar-separator\"></div>

  <!-- Autres réglages -->
  <div class=\"settings-section\">
    <h4>Autres réglages</h4>
    <ul>
          <li>
        <a href=\"#\">
          <strong>Personnaliser le profil</strong><br>
          <small>Gérez vos informations personnelles et vos données.</small>
        </a>
      </li>
      <li>
        <a href=\"#\">Changer le thème</a>
      </li>
    </ul>
  </div>

  <!-- Infos légales -->
  <div class=\"settings-section\">
    <h4>Infos légales</h4>
    <ul>
      <li>
        <a href=\"{{ path('page_show', {'slug': 'mentions-legales'}) }}\">Mentions légales</a>
      </li>
           <li>
        <a href=\"{{ path('page_show', {'slug': 'conditions-utilisation'}) }}\">Conditions d’utilisation</a>
      </li>
           <li>
        <a href=\"{{ path('page_show', {'slug': 'confidentialite'}) }}\">Confidentialité</a>
      </li>
           <li>
        <a href=\"{{ path('page_show', {'slug': 'cookies'}) }}\">Cookies</a>
      </li>
      <li>
        <a href=\"{{ path('home') }}#abonnements\">Tarifs</a>
    </ul>
  </div>

    <!-- Suppression du compte -->
  <div class=\"settings-section\" style=\"margin-top:35px;\">
    <h4 style=\"color:#ff4444;\">Supprimer mon compte</h4>
    <ul>
      <li>
        <a href=\"javascript:void(0);\" id=\"open-delete-account\" style=\"color:#ff4444; font-weight:600;\">
          Supprimer définitivement mon compte
        </a>
      </li>
    </ul>
  </div>
</div>

<!-- Modal suppression compte -->
<div id=\"modal-delete-account\" class=\"delete-account-modal\">
  <div class=\"modal-header\">
    <h3>⚠ Supprimer mon compte</h3>
    <span id=\"close-delete-account\" class=\"close-btn\">&times;</span>
  </div>

  <div class=\"separator\"></div>

  <div class=\"warning-text\">
    Attention : cette action est irréversible.<br>
    Tous vos données seront définitivement supprimées.
  </div>

  <form id=\"form-delete-account\" method=\"POST\" action=\"{{ path('profile_delete_account') }}\">
    <div class=\"form-group\">
      <label for=\"confirm-delete\">Pour confirmer, tapez : <strong>supprimer mon compte</strong></label>
      <input type=\"text\" id=\"confirm-delete\" name=\"confirm\" placeholder=\"supprimer mon compte\" required>
    </div>

    <div class=\"form-group\">
      <label for=\"password-delete\">Confirmez avec votre mot de passe</label>
      <input type=\"password\" id=\"password-delete\" name=\"password\" placeholder=\"Mot de passe\" required>
    </div>

    <button type=\"submit\">Supprimer mon compte</button>
  </form>
</div>


</div>



", "dashboard/nav.html.twig", "/Users/dheillyenzo/projet-chm/templates/dashboard/nav.html.twig");
    }
}
