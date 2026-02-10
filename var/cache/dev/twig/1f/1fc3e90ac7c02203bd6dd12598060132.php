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

/* dashboard_test/index.html.twig */
class __TwigTemplate_80639e18a4e8093521a5cb0afc50e1c2 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard_test/index.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Espace Membre</title>
    
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css\">
    
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css\">
    
    <link rel=\"stylesheet\" href=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/dashboard/test-v2.css"), "html", null, true);
        yield "\">
    
    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap\" rel=\"stylesheet\">
    
    <style>html, body { margin: 0 !important; width: 100vw; height: 100vh; overflow: hidden; }</style>
</head>
<body>

<div class=\"dashboard-container\" style=\"display:flex; width:100%; height:100%;\">
    
    <nav class=\"sidebar\">
        <div class=\"brand\">
            <span>CHM SALEUX</span>
        </div>

        <div class=\"nav-links\">
            <div class=\"nav-item active\" data-target=\"home\">Vue d'ensemble</div>
            <div class=\"nav-item\" data-target=\"licence\">Ma Licence</div>
            <div class=\"nav-item\" data-target=\"planning\">Planning</div>
            <div class=\"nav-item\" data-target=\"events\">Événements</div>
            <div class=\"nav-item\" data-target=\"boutique\">Boutique</div>
            <div class=\"nav-item\" data-target=\"messages\">Messages</div>
            <div class=\"nav-item\" data-target=\"settings\">Paramètres</div>
        </div>

        <div class=\"user-mini\">
            ";
        // line 38
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 38, $this->source); })()), "user", [], "any", false, false, false, 38), "profileImageDataUrl", [], "any", false, false, false, 38)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 39
            yield "                <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 39, $this->source); })()), "user", [], "any", false, false, false, 39), "profileImageDataUrl", [], "any", false, false, false, 39), "html", null, true);
            yield "\" class=\"user-avatar-small-img\" style=\"width:36px; height:36px; border-radius:50%; object-fit:cover;\">
            ";
        } else {
            // line 41
            yield "                <div class=\"user-avatar-small\">
                    ";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 42, $this->source); })()), "user", [], "any", false, false, false, 42), "firstname", [], "any", false, false, false, 42)), "html", null, true);
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 42, $this->source); })()), "user", [], "any", false, false, false, 42), "lastname", [], "any", false, false, false, 42)), "html", null, true);
            yield "
                </div>
            ";
        }
        // line 45
        yield "            
            <div style=\"display:flex; flex-direction:column;\">
                <span style=\"font-size:0.85rem; font-weight:600; color:white;\">";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 47, $this->source); })()), "user", [], "any", false, false, false, 47), "firstname", [], "any", false, false, false, 47), "html", null, true);
        yield "</span>
                <span style=\"font-size:0.75rem; color:var(--text-muted);\">Adhérent</span>
            </div>
        </div>
    </nav>

    <main class=\"main-content\">
        
        <header class=\"topbar\">
            <button class=\"icon-btn\" id=\"theme-toggle-btn\" title=\"Changer le thème\">
                <i class=\"fa-regular fa-moon\" id=\"theme-icon\"></i>
            </button>
            
            <button class=\"icon-btn\" style=\"position:relative;\">
                <i class=\"fa-regular fa-bell\"></i>
                ";
        // line 62
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["notifications"]) || array_key_exists("notifications", $context) ? $context["notifications"] : (function () { throw new RuntimeError('Variable "notifications" does not exist.', 62, $this->source); })())) > 0)) {
            // line 63
            yield "                    <span class=\"badge\"></span>
                ";
        }
        // line 65
        yield "            </button>

            <a href=\"";
        // line 67
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" class=\"icon-btn\" style=\"color:#ef4444; border-color:rgba(239,68,68,0.2); text-decoration:none;\" title=\"Déconnexion\">
                <i class=\"fa-solid fa-power-off\"></i>
            </a>
        </header>

        <div class=\"content-scroll\">
            
            <div class=\"profile-header\">
                <div class=\"banner\"></div>
                
                <div class=\"profile-info-container\">
                    <div class=\"avatar-wrapper\">
                        <img src=\"";
        // line 79
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 79, $this->source); })()), "user", [], "any", false, false, false, 79), "profileImageDataUrl", [], "any", false, false, false, 79)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 79, $this->source); })()), "user", [], "any", false, false, false, 79), "profileImageDataUrl", [], "any", false, false, false, 79), "html", null, true);
        } else {
            yield "https://ui-avatars.com/api/?name=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 79, $this->source); })()), "user", [], "any", false, false, false, 79), "firstname", [], "any", false, false, false, 79), "html", null, true);
            yield "+";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 79, $this->source); })()), "user", [], "any", false, false, false, 79), "lastname", [], "any", false, false, false, 79), "html", null, true);
            yield "&background=0f172a&color=fff&size=256";
        }
        yield "\" 
                             class=\"profile-pic-big\" 
                             id=\"avatar-preview\" 
                             alt=\"Avatar\">
                        
                        <label for=\"avatar-upload\" class=\"upload-btn\" title=\"Modifier la photo\">
                            <i class=\"fa-solid fa-pen\"></i>
                        </label>
                        <input type=\"file\" id=\"avatar-upload\" accept=\"image/png, image/jpeg\" style=\"display: none;\">
                    </div>

                    <div class=\"header-text\">
                        <h1>";
        // line 91
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 91, $this->source); })()), "user", [], "any", false, false, false, 91), "firstname", [], "any", false, false, false, 91), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 91, $this->source); })()), "user", [], "any", false, false, false, 91), "lastname", [], "any", false, false, false, 91), "html", null, true);
        yield "</h1>
                        <p>
                            Membre depuis 2023 
                            ";
        // line 94
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 94, $this->source); })()), "user", [], "any", false, false, false, 94), "licenceStatus", [], "any", false, false, false, 94) == "Active")) {
            // line 95
            yield "                                <span class=\"licence-tag\">Licence Active</span>
                            ";
        }
        // line 97
        yield "                        </p>
                    </div>
                </div>
            </div>

            <section id=\"tab-home\" class=\"section-view active\">
                <div class=\"dashboard-grid\">
                    
                    <div class=\"card\">
                        <h3>Ma Licence</h3>
                        <div class=\"card-value\">";
        // line 107
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 107, $this->source); })()), "user", [], "any", false, false, false, 107), "licenceNumber", [], "any", false, false, false, 107)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 107, $this->source); })()), "user", [], "any", false, false, false, 107), "licenceNumber", [], "any", false, false, false, 107), "html", null, true)) : ("Non renseigné"));
        yield "</div>
                        <div class=\"card-sub\">Valide saison 2024-2025</div>
                        <div style=\"height:4px; width:40px; background:var(--primary); margin-top:20px; border-radius:2px;\"></div>
                    </div>

                    <div class=\"card\">
                        <h3>Prochain Événement</h3>
                        ";
        // line 114
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["events"]) || array_key_exists("events", $context) ? $context["events"] : (function () { throw new RuntimeError('Variable "events" does not exist.', 114, $this->source); })())) > 0)) {
            // line 115
            yield "                            ";
            $context["nextEvent"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["events"]) || array_key_exists("events", $context) ? $context["events"] : (function () { throw new RuntimeError('Variable "events" does not exist.', 115, $this->source); })()), 0, [], "array", false, false, false, 115);
            // line 116
            yield "                            <div class=\"card-value\" style=\"font-size:1.4rem;\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["nextEvent"]) || array_key_exists("nextEvent", $context) ? $context["nextEvent"] : (function () { throw new RuntimeError('Variable "nextEvent" does not exist.', 116, $this->source); })()), "title", [], "any", false, false, false, 116), "html", null, true);
            yield "</div>
                            <div class=\"card-sub\" style=\"margin-top:5px; color:#94a3b8;\">
                                <i class=\"fa-regular fa-calendar\" style=\"margin-right:5px;\"></i> ";
            // line 118
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["nextEvent"]) || array_key_exists("nextEvent", $context) ? $context["nextEvent"] : (function () { throw new RuntimeError('Variable "nextEvent" does not exist.', 118, $this->source); })()), "date", [], "any", false, false, false, 118), "d/m/Y"), "html", null, true);
            yield "
                            </div>
                        ";
        } else {
            // line 121
            yield "                            <div class=\"card-value\" style=\"font-size:1.2rem; opacity:0.5;\">Aucun événement</div>
                        ";
        }
        // line 123
        yield "                    </div>

                    <div class=\"card\">
                        <h3>Dernières Activités</h3>
                        <div style=\"display:flex; flex-direction:column; gap:15px;\">
                            ";
        // line 128
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["notifications"]) || array_key_exists("notifications", $context) ? $context["notifications"] : (function () { throw new RuntimeError('Variable "notifications" does not exist.', 128, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["notif"]) {
            // line 129
            yield "                                <div style=\"display:flex; align-items:center; gap:10px; font-size:0.9rem; color:#cbd5e1;\">
                                    <div style=\"width:6px; height:6px; background:#34d399; border-radius:50%;\"></div>
                                    ";
            // line 131
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "event", [], "any", false, false, false, 131), "title", [], "any", false, false, false, 131), "html", null, true);
            yield "
                                </div>
                            ";
            $context['_iterated'] = true;
        }
        // line 133
        if (!$context['_iterated']) {
            // line 134
            yield "                                <p style=\"color:var(--text-muted); font-size:0.9rem;\">Rien à signaler.</p>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['notif'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 136
        yield "                        </div>
                    </div>
                </div>
            </section>

            <section id=\"tab-licence\" class=\"section-view\">
                <div class=\"card\"><h3>Détails Licence</h3><p class=\"card-sub\">Contenu à venir...</p></div>
            </section>
            <section id=\"tab-planning\" class=\"section-view\">
                <div class=\"card\"><h3>Planning Semaine</h3><p class=\"card-sub\">Contenu à venir...</p></div>
            </section>
            <section id=\"tab-events\" class=\"section-view\">
                <div class=\"card\"><h3>Événements</h3><p class=\"card-sub\">Contenu à venir...</p></div>
            </section>
            <section id=\"tab-boutique\" class=\"section-view\">
                <div class=\"card\"><h3>Boutique</h3><p class=\"card-sub\">Contenu à venir...</p></div>
            </section>
            <section id=\"tab-messages\" class=\"section-view\">
                <div class=\"card\"><h3>Messagerie</h3><p class=\"card-sub\">Contenu à venir...</p></div>
            </section>
            <section id=\"tab-settings\" class=\"section-view\">
                <div class=\"card\"><h3>Configuration</h3><p class=\"card-sub\">Contenu à venir...</p></div>
            </section>

        </div>
    </main>
</div>

<div id=\"cropperModal\" class=\"cropper-modal-overlay\">
    <div class=\"cropper-container-box\">
        <h3 style=\"color:#fff; margin-bottom:15px;\">Ajuster la photo</h3>
        <div class=\"cropper-image-wrapper\">
            <img id=\"cropperImage\" src=\"\">
        </div>
        <div class=\"cropper-actions\">
            <button id=\"cancelCropBtn\" class=\"btn-cancel\" style=\"padding:10px 20px; border-radius:6px; cursor:pointer;\">Annuler</button>
            <button id=\"cropAndSaveBtn\" style=\"background:var(--primary); color:white; border:none; padding:10px 20px; border-radius:6px; cursor:pointer;\">Enregistrer</button>
        </div>
    </div>
</div>

<script src=\"https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js\"></script>
<script src=\"";
        // line 178
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/dashboard/test-v2.js"), "html", null, true);
        yield "\"></script>

</body>
</html>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "dashboard_test/index.html.twig";
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
        return array (  308 => 178,  264 => 136,  257 => 134,  255 => 133,  248 => 131,  244 => 129,  239 => 128,  232 => 123,  228 => 121,  222 => 118,  216 => 116,  213 => 115,  211 => 114,  201 => 107,  189 => 97,  185 => 95,  183 => 94,  175 => 91,  152 => 79,  137 => 67,  133 => 65,  129 => 63,  127 => 62,  109 => 47,  105 => 45,  98 => 42,  95 => 41,  89 => 39,  87 => 38,  58 => 12,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Espace Membre</title>
    
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css\">
    
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css\">
    
    <link rel=\"stylesheet\" href=\"{{ asset('css/dashboard/test-v2.css') }}\">
    
    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap\" rel=\"stylesheet\">
    
    <style>html, body { margin: 0 !important; width: 100vw; height: 100vh; overflow: hidden; }</style>
</head>
<body>

<div class=\"dashboard-container\" style=\"display:flex; width:100%; height:100%;\">
    
    <nav class=\"sidebar\">
        <div class=\"brand\">
            <span>CHM SALEUX</span>
        </div>

        <div class=\"nav-links\">
            <div class=\"nav-item active\" data-target=\"home\">Vue d'ensemble</div>
            <div class=\"nav-item\" data-target=\"licence\">Ma Licence</div>
            <div class=\"nav-item\" data-target=\"planning\">Planning</div>
            <div class=\"nav-item\" data-target=\"events\">Événements</div>
            <div class=\"nav-item\" data-target=\"boutique\">Boutique</div>
            <div class=\"nav-item\" data-target=\"messages\">Messages</div>
            <div class=\"nav-item\" data-target=\"settings\">Paramètres</div>
        </div>

        <div class=\"user-mini\">
            {% if app.user.profileImageDataUrl %}
                <img src=\"{{ app.user.profileImageDataUrl }}\" class=\"user-avatar-small-img\" style=\"width:36px; height:36px; border-radius:50%; object-fit:cover;\">
            {% else %}
                <div class=\"user-avatar-small\">
                    {{ app.user.firstname|first }}{{ app.user.lastname|first }}
                </div>
            {% endif %}
            
            <div style=\"display:flex; flex-direction:column;\">
                <span style=\"font-size:0.85rem; font-weight:600; color:white;\">{{ app.user.firstname }}</span>
                <span style=\"font-size:0.75rem; color:var(--text-muted);\">Adhérent</span>
            </div>
        </div>
    </nav>

    <main class=\"main-content\">
        
        <header class=\"topbar\">
            <button class=\"icon-btn\" id=\"theme-toggle-btn\" title=\"Changer le thème\">
                <i class=\"fa-regular fa-moon\" id=\"theme-icon\"></i>
            </button>
            
            <button class=\"icon-btn\" style=\"position:relative;\">
                <i class=\"fa-regular fa-bell\"></i>
                {% if notifications|length > 0 %}
                    <span class=\"badge\"></span>
                {% endif %}
            </button>

            <a href=\"{{ path('app_logout') }}\" class=\"icon-btn\" style=\"color:#ef4444; border-color:rgba(239,68,68,0.2); text-decoration:none;\" title=\"Déconnexion\">
                <i class=\"fa-solid fa-power-off\"></i>
            </a>
        </header>

        <div class=\"content-scroll\">
            
            <div class=\"profile-header\">
                <div class=\"banner\"></div>
                
                <div class=\"profile-info-container\">
                    <div class=\"avatar-wrapper\">
                        <img src=\"{% if app.user.profileImageDataUrl %}{{ app.user.profileImageDataUrl }}{% else %}https://ui-avatars.com/api/?name={{ app.user.firstname }}+{{ app.user.lastname }}&background=0f172a&color=fff&size=256{% endif %}\" 
                             class=\"profile-pic-big\" 
                             id=\"avatar-preview\" 
                             alt=\"Avatar\">
                        
                        <label for=\"avatar-upload\" class=\"upload-btn\" title=\"Modifier la photo\">
                            <i class=\"fa-solid fa-pen\"></i>
                        </label>
                        <input type=\"file\" id=\"avatar-upload\" accept=\"image/png, image/jpeg\" style=\"display: none;\">
                    </div>

                    <div class=\"header-text\">
                        <h1>{{ app.user.firstname }} {{ app.user.lastname }}</h1>
                        <p>
                            Membre depuis 2023 
                            {% if app.user.licenceStatus == 'Active' %}
                                <span class=\"licence-tag\">Licence Active</span>
                            {% endif %}
                        </p>
                    </div>
                </div>
            </div>

            <section id=\"tab-home\" class=\"section-view active\">
                <div class=\"dashboard-grid\">
                    
                    <div class=\"card\">
                        <h3>Ma Licence</h3>
                        <div class=\"card-value\">{{ app.user.licenceNumber ? app.user.licenceNumber : 'Non renseigné' }}</div>
                        <div class=\"card-sub\">Valide saison 2024-2025</div>
                        <div style=\"height:4px; width:40px; background:var(--primary); margin-top:20px; border-radius:2px;\"></div>
                    </div>

                    <div class=\"card\">
                        <h3>Prochain Événement</h3>
                        {% if events|length > 0 %}
                            {% set nextEvent = events[0] %}
                            <div class=\"card-value\" style=\"font-size:1.4rem;\">{{ nextEvent.title }}</div>
                            <div class=\"card-sub\" style=\"margin-top:5px; color:#94a3b8;\">
                                <i class=\"fa-regular fa-calendar\" style=\"margin-right:5px;\"></i> {{ nextEvent.date|date('d/m/Y') }}
                            </div>
                        {% else %}
                            <div class=\"card-value\" style=\"font-size:1.2rem; opacity:0.5;\">Aucun événement</div>
                        {% endif %}
                    </div>

                    <div class=\"card\">
                        <h3>Dernières Activités</h3>
                        <div style=\"display:flex; flex-direction:column; gap:15px;\">
                            {% for notif in notifications %}
                                <div style=\"display:flex; align-items:center; gap:10px; font-size:0.9rem; color:#cbd5e1;\">
                                    <div style=\"width:6px; height:6px; background:#34d399; border-radius:50%;\"></div>
                                    {{ notif.event.title }}
                                </div>
                            {% else %}
                                <p style=\"color:var(--text-muted); font-size:0.9rem;\">Rien à signaler.</p>
                            {% endfor %}
                        </div>
                    </div>
                </div>
            </section>

            <section id=\"tab-licence\" class=\"section-view\">
                <div class=\"card\"><h3>Détails Licence</h3><p class=\"card-sub\">Contenu à venir...</p></div>
            </section>
            <section id=\"tab-planning\" class=\"section-view\">
                <div class=\"card\"><h3>Planning Semaine</h3><p class=\"card-sub\">Contenu à venir...</p></div>
            </section>
            <section id=\"tab-events\" class=\"section-view\">
                <div class=\"card\"><h3>Événements</h3><p class=\"card-sub\">Contenu à venir...</p></div>
            </section>
            <section id=\"tab-boutique\" class=\"section-view\">
                <div class=\"card\"><h3>Boutique</h3><p class=\"card-sub\">Contenu à venir...</p></div>
            </section>
            <section id=\"tab-messages\" class=\"section-view\">
                <div class=\"card\"><h3>Messagerie</h3><p class=\"card-sub\">Contenu à venir...</p></div>
            </section>
            <section id=\"tab-settings\" class=\"section-view\">
                <div class=\"card\"><h3>Configuration</h3><p class=\"card-sub\">Contenu à venir...</p></div>
            </section>

        </div>
    </main>
</div>

<div id=\"cropperModal\" class=\"cropper-modal-overlay\">
    <div class=\"cropper-container-box\">
        <h3 style=\"color:#fff; margin-bottom:15px;\">Ajuster la photo</h3>
        <div class=\"cropper-image-wrapper\">
            <img id=\"cropperImage\" src=\"\">
        </div>
        <div class=\"cropper-actions\">
            <button id=\"cancelCropBtn\" class=\"btn-cancel\" style=\"padding:10px 20px; border-radius:6px; cursor:pointer;\">Annuler</button>
            <button id=\"cropAndSaveBtn\" style=\"background:var(--primary); color:white; border:none; padding:10px 20px; border-radius:6px; cursor:pointer;\">Enregistrer</button>
        </div>
    </div>
</div>

<script src=\"https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js\"></script>
<script src=\"{{ asset('js/dashboard/test-v2.js') }}\"></script>

</body>
</html>", "dashboard_test/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/dashboard_test/index.html.twig");
    }
}
