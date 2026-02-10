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

/* dashboard/index.html.twig */
class __TwigTemplate_6495bddf5d5aeed85722caa39ada87a3 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/index.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Espace Membre - CHM SALEUX</title>

    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/assistant/elios.css"), "html", null, true);
        yield "\">
    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800;900&display=swap\" rel=\"stylesheet\">
    
    <link rel=\"stylesheet\" href=\"css/dashboard/test-v2.css\">

    <style>
        html, body { margin: 0 !important; width: 100vw; height: 100vh; overflow: hidden; font-family: 'Inter', sans-serif; }

        @keyframes elios-pulse {
            0% { transform: scale(0.95); opacity: 0.4; }
            50% { transform: scale(1.15); opacity: 0.1; }
            100% { transform: scale(0.95); opacity: 0.4; }
        }
        .btn-ai-assistant:hover { transform: scale(1.1) translateY(-5px) !important; }
    </style>
</head>
<body>
<div id=\"mobileOverlay\" class=\"mobile-overlay\" onclick=\"toggleMobileMenu()\"></div>
<div class=\"flash-container\">
    ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 29, $this->source); })()), "flashes", [], "any", false, false, false, 29));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 30
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 31
                yield "            <div class=\"flash-message flash-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield "\">
                <i class=\"fa-solid 
                    ";
                // line 33
                if (($context["label"] == "success")) {
                    yield "fa-circle-check
                    ";
                } elseif (((                // line 34
$context["label"] == "error") || ($context["label"] == "danger"))) {
                    yield "fa-circle-xmark
                    ";
                } elseif ((                // line 35
$context["label"] == "warning")) {
                    yield "fa-triangle-exclamation
                    ";
                } else {
                    // line 36
                    yield "fa-circle-info";
                }
                yield "\">
                </i>
                <span>";
                // line 38
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "</span>
                <div class=\"flash-close\" onclick=\"this.parentElement.remove()\">
                    <i class=\"fa-solid fa-xmark\"></i>
                </div>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        yield "</div>

    <div class=\"dashboard-container\" style=\"display:flex; width:100%; height:100%;\">
        
        <nav class=\"sidebar\">
            <div class=\"brand\">
                <a href=\"";
        // line 51
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\" class=\"brand-link\">
                    <img src=\"";
        // line 52
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/favicon/icon.png"), "html", null, true);
        yield "\" alt=\"Logo CHM\" class=\"brand-logo-img\">
                    <span>CHM SALEUX</span>
                </a>
            </div>

            <div class=\"nav-links\">
                <div class=\"nav-item active\" data-target=\"home\">
                    <i class=\"fa-solid fa-layer-group\" style=\"width:20px;\"></i> Vue d'ensemble
                </div>
                <div class=\"nav-item\" data-target=\"licence\">
                    <i class=\"fa-solid fa-id-card\" style=\"width:20px;\"></i> Ma Licence
                </div>
                <div class=\"nav-item\" data-target=\"planning\">
                    <i class=\"fa-solid fa-calendar\" style=\"width:20px;\"></i> Planning
                </div>
                <div class=\"nav-item\" data-target=\"events\">
                    <i class=\"fa-solid fa-trophy\" style=\"width:20px;\"></i> Événements
                </div>
                <div class=\"nav-item\" data-target=\"boutique\">
                    <i class=\"fa-solid fa-bag-shopping\" style=\"width:20px;\"></i> Boutique
                </div>
                <div class=\"nav-item\" data-target=\"messages\">
                    <i class=\"fa-solid fa-envelope\" style=\"width:20px;\"></i> Messages
                </div>
                <div class=\"nav-item\" data-target=\"settings\">
                    <i class=\"fa-solid fa-gear\" style=\"width:20px;\"></i> Paramètres
                </div>
                
                <div style=\"margin-top: auto; padding-top: 20px;\">
                    <a href=\"";
        // line 81
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\" class=\"nav-link-back\">
                        <i class=\"fa-solid fa-arrow-left\" style=\"margin-right: 10px;\"></i> Retour au site
                    </a>
                </div>
            </div>

            <div class=\"user-mini\">
                ";
        // line 88
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 88, $this->source); })()), "user", [], "any", false, false, false, 88), "profileImageDataUrl", [], "any", false, false, false, 88)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 89
            yield "                    <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 89, $this->source); })()), "user", [], "any", false, false, false, 89), "profileImageDataUrl", [], "any", false, false, false, 89), "html", null, true);
            yield "\" class=\"user-avatar-small-img\">
                ";
        } else {
            // line 91
            yield "                    <div class=\"user-avatar-small\">
                        ";
            // line 92
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 92, $this->source); })()), "user", [], "any", false, false, false, 92), "firstname", [], "any", false, false, false, 92)), "html", null, true);
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 92, $this->source); })()), "user", [], "any", false, false, false, 92), "lastname", [], "any", false, false, false, 92)), "html", null, true);
            yield "
                    </div>
                ";
        }
        // line 95
        yield "                
                <div style=\"display:flex; flex-direction:column;\">
                    <span style=\"font-size:0.85rem; font-weight:600; color:white;\">";
        // line 97
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 97, $this->source); })()), "user", [], "any", false, false, false, 97), "firstname", [], "any", false, false, false, 97), "html", null, true);
        yield "</span>
                    <span style=\"font-size:0.75rem; color:var(--text-muted);\">Adhérent</span>
                </div>
            </div>
        </nav>

        <main class=\"main-content\">
            
            <header class=\"topbar\">
            <div class=\"menu-toggle\" onclick=\"toggleMobileMenu()\"><i class=\"fa-solid fa-bars\"></i></div>
                <h2 class=\"page-title\">Tableau de bord adhérent</h2>

                <div class=\"topbar-right\">
                    <button class=\"icon-btn\" id=\"theme-toggle-btn\" title=\"Thème\">
                        <i class=\"fa-regular fa-moon\"></i>
                    </button>
                    
                    <button class=\"icon-btn\" style=\"position:relative;\">
                        <i class=\"fa-regular fa-bell\"></i>
                        ";
        // line 116
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ((array_key_exists("notifications", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["notifications"]) || array_key_exists("notifications", $context) ? $context["notifications"] : (function () { throw new RuntimeError('Variable "notifications" does not exist.', 116, $this->source); })()), [])) : ([]))) > 0)) {
            // line 117
            yield "                            <span class=\"badge\" style=\"position:absolute; top:8px; right:8px; width:6px; height:6px; background:red; border-radius:50%;\"></span>
                        ";
        }
        // line 119
        yield "                    </button>

                    <a href=\"";
        // line 121
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("contact");
        yield "\" class=\"btn-contact-top\">
                        Contact
                    </a>
                </div>
            </header>

            <div class=\"content-scroll\">
                
                <div class=\"profile-header\">
                    <div class=\"banner\">
                        <h1 class=\"banner-title\">CHM SALEUX</h1>
                        <div class=\"banner-subtitle\">Club Haltérophilie & Musculation</div>
                    </div>
                    
                    <div class=\"profile-info-container\">
                        <div class=\"avatar-wrapper\">
                            <img src=\"";
        // line 137
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 137, $this->source); })()), "user", [], "any", false, false, false, 137), "profileImageDataUrl", [], "any", false, false, false, 137)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 137, $this->source); })()), "user", [], "any", false, false, false, 137), "profileImageDataUrl", [], "any", false, false, false, 137), "html", null, true);
        } else {
            yield "https://ui-avatars.com/api/?name=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 137, $this->source); })()), "user", [], "any", false, false, false, 137), "firstname", [], "any", false, false, false, 137), "html", null, true);
            yield "+";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 137, $this->source); })()), "user", [], "any", false, false, false, 137), "lastname", [], "any", false, false, false, 137), "html", null, true);
            yield "&background=0f172a&color=fff&size=256";
        }
        yield "\" 
                                 class=\"profile-pic-big\" 
                                 id=\"avatar-preview\" 
                                 alt=\"Avatar\">
                            
                            <label for=\"avatar-upload\" class=\"upload-btn\">
                                <i class=\"fa-solid fa-camera\"></i>
                            </label>
                            <input type=\"file\" id=\"avatar-upload\" accept=\"image/png, image/jpeg\" style=\"display: none;\">
                        </div>

                        <div class=\"header-text\">
                            <h1>Bonjour ";
        // line 149
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 149, $this->source); })()), "user", [], "any", false, false, false, 149), "firstname", [], "any", false, false, false, 149), "html", null, true);
        yield " !</h1>
                            <p>
                                Membre Adhérent
                                ";
        // line 152
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 152), "licenceStatus", [], "any", true, true, false, 152) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 152, $this->source); })()), "user", [], "any", false, false, false, 152), "licenceStatus", [], "any", false, false, false, 152) == "Active"))) {
            // line 153
            yield "                                    <span class=\"licence-tag\">Licence Active</span>
                                ";
        }
        // line 155
        yield "                            </p>
                        </div>
                    </div>
                </div>

                <section id=\"tab-home\" class=\"section-view active\">
                <h3 style=\"color:white; margin-bottom:20px;\">Vue d'ensemble</h3>
                    <div class=\"dashboard-grid\">
                        
<div class=\"card\" style=\"padding:0; overflow:hidden; background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); border: none; position: relative; min-height: 240px; display: flex; flex-direction: column;\">
    
    <div style=\"position: absolute; top: 10px; right: 10px; pointer-events: none; opacity: 0.1;\">
        <img src=\"";
        // line 167
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/favicon/icon.png"), "html", null, true);
        yield "\" alt=\"Watermark\" style=\"height: 120px;\">
    </div>

    <div style=\"padding: 25px; position: relative; z-index: 2; flex: 1;\">
        <div style=\"display:flex; justify-content:space-between; align-items:start; margin-bottom:20px;\">
            <div>
                <h3 style=\"color:white; margin:0; font-size: 1.1rem;\">Ma Licence</h3>
                <p style=\"color:var(--primary); font-size:0.7rem; font-weight:800; text-transform:uppercase; letter-spacing: 1px; margin: 4px 0 0 0;\">CHM SALEUX</p>
            </div>
            <div style=\"background: rgba(255,255,255,0.1); width: 35px; height: 35px; border-radius: 8px; display: flex; align-items: center; justify-content: center;\">
                <i class=\"fa-solid fa-id-card\" style=\"color:white; font-size:1rem;\"></i>
            </div>
        </div>
        
        <div style=\"display:flex; flex-direction:column; gap:12px;\">
            <div>
                <div style=\"font-size:0.65rem; color:rgba(255,255,255,0.5); text-transform:uppercase; letter-spacing: 1px; margin-bottom: 2px;\">Titulaire</div>
                <div style=\"color:white; font-weight:700; font-size: 1rem; text-transform: uppercase;\">
                    ";
        // line 185
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 185, $this->source); })()), "user", [], "any", false, false, false, 185), "firstname", [], "any", false, false, false, 185), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 185, $this->source); })()), "user", [], "any", false, false, false, 185), "lastname", [], "any", false, false, false, 185), "html", null, true);
        yield "
                </div>
            </div>

            ";
        // line 189
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 189), "licenceNumber", [], "any", true, true, false, 189) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 189, $this->source); })()), "user", [], "any", false, false, false, 189), "licenceNumber", [], "any", false, false, false, 189))) {
            // line 190
            yield "                <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 5px;\">
                    <div>
                        <div style=\"font-size:0.65rem; color:rgba(255,255,255,0.5); text-transform:uppercase;\">Numéro</div>
                        <div style=\"color:white; font-family:monospace; font-size:0.9rem; font-weight: 600;\">
                            ";
            // line 194
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 194, $this->source); })()), "user", [], "any", false, false, false, 194), "licenceNumber", [], "any", false, false, false, 194), "html", null, true);
            yield "
                        </div>
                    </div>
                    <div>
                        <div style=\"font-size:0.65rem; color:rgba(255,255,255,0.5); text-transform:uppercase;\">Type</div>
                        <div style=\"color:white; font-weight:600; font-size:0.9rem;\">
                            ";
            // line 200
            yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 200), "licenceType", [], "any", true, true, false, 200)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 200, $this->source); })()), "user", [], "any", false, false, false, 200), "licenceType", [], "any", false, false, false, 200), "html", null, true)) : ("---"));
            yield "
                        </div>
                    </div>
                </div>
            ";
        } else {
            // line 205
            yield "                <div style=\"margin-top: 10px;\">
              <button onclick=\"openLicenceChoice()\" style=\"width:100%; background:white; color:#0f172a; border:none; padding:10px; border-radius:8px; font-weight:800; font-size:0.75rem; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:8px; transition: 0.3s;\">
 AJOUTER MA LICENCE
</button>
                    <p style=\"color:rgba(255,255,255,0.4); font-size:0.65rem; margin-top:8px; text-align:center;\">
                        Récupérez vos accès via notre chatbot
                    </p>
                </div>
            ";
        }
        // line 214
        yield "        </div>
    </div>

    <div style=\"background: rgba(0,0,0,0.2); padding: 12px 25px; display: flex; justify-content: space-between; align-items: center;\">
        ";
        // line 218
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 218), "licenceStatus", [], "any", true, true, false, 218) && (Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 218, $this->source); })()), "user", [], "any", false, false, false, 218), "licenceStatus", [], "any", false, false, false, 218)) == "ACTIVE"))) {
            // line 219
            yield "            <span style=\"color:#34d399; font-size:0.75rem; font-weight:800; display:flex; align-items:center; gap:5px;\">
                <i class=\"fa-solid fa-circle-check\"></i> VALIDE
            </span>
        ";
        } else {
            // line 223
            yield "            <span style=\"color:#f87171; font-size:0.75rem; font-weight:800; display:flex; align-items:center; gap:5px;\">
                <i class=\"fa-solid fa-circle-exclamation\"></i> INACTIVE
            </span>
        ";
        }
        // line 227
        yield "        <span style=\"color:rgba(255,255,255,0.4); font-size:0.7rem; font-weight:600;\">2025 / 2026</span>
    </div>
</div>

<div class=\"card\" style=\"padding:0; overflow:hidden;\">
    ";
        // line 232
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ((array_key_exists("events", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["events"]) || array_key_exists("events", $context) ? $context["events"] : (function () { throw new RuntimeError('Variable "events" does not exist.', 232, $this->source); })()), [])) : ([]))) > 0)) {
            // line 233
            yield "        ";
            $context["nextEvent"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["events"]) || array_key_exists("events", $context) ? $context["events"] : (function () { throw new RuntimeError('Variable "events" does not exist.', 233, $this->source); })()), 0, [], "array", false, false, false, 233);
            // line 234
            yield "        
        <div style=\"height:140px; width:100%; position:relative; background:#111;\">
            
            ";
            // line 238
            yield "            <img src=\"";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["nextEvent"]) || array_key_exists("nextEvent", $context) ? $context["nextEvent"] : (function () { throw new RuntimeError('Variable "nextEvent" does not exist.', 238, $this->source); })()), "image", [], "any", false, false, false, 238)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["nextEvent"]) || array_key_exists("nextEvent", $context) ? $context["nextEvent"] : (function () { throw new RuntimeError('Variable "nextEvent" does not exist.', 238, $this->source); })()), "image", [], "any", false, false, false, 238))), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/bg2.jpg"), "html", null, true)));
            yield "\" 
                 style=\"width:100%; height:100%; object-fit:cover; opacity:0.8;\" 
                 alt=\"";
            // line 240
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["nextEvent"]) || array_key_exists("nextEvent", $context) ? $context["nextEvent"] : (function () { throw new RuntimeError('Variable "nextEvent" does not exist.', 240, $this->source); })()), "title", [], "any", false, false, false, 240), "html", null, true);
            yield "\">
            
            ";
            // line 242
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["nextEvent"]) || array_key_exists("nextEvent", $context) ? $context["nextEvent"] : (function () { throw new RuntimeError('Variable "nextEvent" does not exist.', 242, $this->source); })()), "startTime", [], "any", false, false, false, 242)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 243
                yield "                <div style=\"position:absolute; top:12px; right:12px; background:rgba(0,0,0,0.6); backdrop-filter:blur(4px); color:white; padding:4px 8px; border-radius:6px; font-size:0.85rem; font-weight:600; border:1px solid rgba(255,255,255,0.1);\">
                    <i class=\"fa-regular fa-clock\" style=\"margin-right:4px;\"></i> ";
                // line 244
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["nextEvent"]) || array_key_exists("nextEvent", $context) ? $context["nextEvent"] : (function () { throw new RuntimeError('Variable "nextEvent" does not exist.', 244, $this->source); })()), "startTime", [], "any", false, false, false, 244), "H:i"), "html", null, true);
                yield "
                </div>
            ";
            }
            // line 247
            yield "        </div>

        <div style=\"padding:20px;\">
            <h3 style=\"margin-bottom:8px;\">Prochain Événement</h3>
            
            <div style=\"font-size:1.1rem; font-weight:700; color:white; margin-bottom:10px; line-height:1.4;\">
                ";
            // line 253
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["nextEvent"]) || array_key_exists("nextEvent", $context) ? $context["nextEvent"] : (function () { throw new RuntimeError('Variable "nextEvent" does not exist.', 253, $this->source); })()), "title", [], "any", false, false, false, 253), "html", null, true);
            yield "
            </div>
            
            <div class=\"card-sub\" style=\"display:flex; align-items:center;\">
                <i class=\"fa-regular fa-calendar\" style=\"margin-right:6px; color:var(--primary);\"></i> 
                ";
            // line 258
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["nextEvent"]) || array_key_exists("nextEvent", $context) ? $context["nextEvent"] : (function () { throw new RuntimeError('Variable "nextEvent" does not exist.', 258, $this->source); })()), "date", [], "any", false, false, false, 258), "d/m/Y"), "html", null, true);
            yield "
            </div>
        </div>
    ";
        } else {
            // line 262
            yield "        <div style=\"padding:25px; display:flex; flex-direction:column; justify-content:center; height:100%;\">
            <h3>Prochain Événement</h3>
            <p style=\"color:var(--text-muted); margin-top:10px;\">Aucun événement prévu pour le moment.</p>
        </div>
    ";
        }
        // line 267
        yield "</div>

                        <div class=\"card\">
                            <h3>Activité Récente</h3>
                            <div style=\"display:flex; flex-direction:column; gap:15px; margin-top:10px;\">
                                ";
        // line 272
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ((array_key_exists("notifications", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["notifications"]) || array_key_exists("notifications", $context) ? $context["notifications"] : (function () { throw new RuntimeError('Variable "notifications" does not exist.', 272, $this->source); })()), [])) : ([])), 0, 3));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["notif"]) {
            // line 273
            yield "                                    <div style=\"font-size:0.9rem; color:#d4d4d8; display:flex; align-items:start;\">
                                        <div style=\"min-width:6px; height:6px; background:var(--primary); border-radius:50%; margin-right:12px; margin-top:7px;\"></div>
                                        <div style=\"line-height:1.4;\">
                                            ";
            // line 276
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "message", [], "any", true, true, false, 276)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "message", [], "any", false, false, false, 276), "Nouvelle notification reçue")) : ("Nouvelle notification reçue")), "html", null, true);
            yield "
                                            <div style=\"font-size:0.75rem; color:var(--text-muted); margin-top:2px;\">Il y a 2h</div>
                                        </div>
                                    </div>
                                ";
            $context['_iterated'] = true;
        }
        // line 280
        if (!$context['_iterated']) {
            // line 281
            yield "                                    <p style=\"color:var(--text-muted); font-size:0.85rem;\">Rien à signaler pour le moment.</p>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['notif'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 283
        yield "                            </div>
                        </div>
                    </div>
                </section>

<section id=\"tab-licence\" class=\"section-view\">
<h3 style=\"color:white; margin-bottom:20px;\">Détails de la licence</h3>
    <div style=\"display: flex; flex-direction: column; gap: 25px;\">
        
        <div class=\"card\" style=\"flex-direction: row; flex-wrap: wrap; padding: 0; overflow: hidden; min-height: 220px; background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); border: none;\">
            
            <div style=\"flex: 1; min-width: 300px; padding: 30px; position: relative; border-right: 1px solid rgba(255,255,255,0.1);\">
                <div style=\"position: absolute; top: 20px; right: 50px; pointer-events: none; z-index: 1;\">
                    <img src=\"";
        // line 296
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/favicon/icon.png"), "html", null, true);
        yield "\" alt=\"Watermark\" style=\"height: 150px; opacity: 0.08;\">
                </div>
                
                <div style=\"display:flex; justify-content:space-between; align-items:flex-start; margin-bottom: 30px; position: relative; z-index: 2;\">
                    <div>
                        <h3 style=\"color:white; margin:0; font-size: 1.4rem;\">Licence Officielle</h3>
                        <p style=\"color:var(--primary); font-size:0.85rem; font-weight:700; text-transform:uppercase; letter-spacing: 1.5px;\">CHM SALEUX</p>
                    </div>
                </div>

                <div style=\"position: relative; z-index: 2;\">
                    <div style=\"font-size:0.7rem; color:rgba(255,255,255,0.5); text-transform:uppercase; letter-spacing: 1px;\">Titulaire</div>
                    <div style=\"font-size:1.6rem; font-weight:900; color:white; text-transform:uppercase; margin-bottom: 5px;\">
                        ";
        // line 309
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 309, $this->source); })()), "user", [], "any", false, false, false, 309), "firstname", [], "any", false, false, false, 309), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 309, $this->source); })()), "user", [], "any", false, false, false, 309), "lastname", [], "any", false, false, false, 309), "html", null, true);
        yield "
                    </div>
                    
                    ";
        // line 312
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 312), "licenceStatus", [], "any", true, true, false, 312) && (Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 312, $this->source); })()), "user", [], "any", false, false, false, 312), "licenceStatus", [], "any", false, false, false, 312)) == "ACTIVE"))) {
            // line 313
            yield "                        <div style=\"display:inline-block; background:rgba(16, 185, 129, 0.2); color:#34d399; padding:4px 12px; border-radius:50px; font-size:0.7rem; font-weight:800; border: 1px solid rgba(52, 211, 153, 0.3);\">
                            <i class=\"fa-solid fa-check-circle\" style=\"margin-right:5px;\"></i> ACTIVE
                        </div>
                    ";
        } else {
            // line 317
            yield "                        <div style=\"display:inline-block; background:rgba(239, 68, 68, 0.2); color:#f87171; padding:4px 12px; border-radius:50px; font-size:0.7rem; font-weight:800; border: 1px solid rgba(239, 68, 68, 0.3);\">
                            <i class=\"fa-solid fa-circle-exclamation\" style=\"margin-right:5px;\"></i> AUCUNE LICENCE
                        </div>
                    ";
        }
        // line 321
        yield "                </div>
            </div>

            <div style=\"flex: 1.2; min-width: 300px; padding: 30px; display: flex; align-items: center; justify-content: center; position: relative; z-index: 2;\">
                
                ";
        // line 326
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 326), "licenceNumber", [], "any", true, true, false, 326) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 326, $this->source); })()), "user", [], "any", false, false, false, 326), "licenceNumber", [], "any", false, false, false, 326))) {
            // line 327
            yield "                    <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 20px; width: 100%;\">
                        <div>
                            <div style=\"font-size:0.7rem; color:rgba(255,255,255,0.5); text-transform:uppercase; margin-bottom: 5px;\">Numéro de Licence</div>
                            <div style=\"color:white; font-family:'Courier New', monospace; font-weight:700; font-size: 1.2rem; letter-spacing: 1px;\">
                                ";
            // line 331
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 331, $this->source); })()), "user", [], "any", false, false, false, 331), "licenceNumber", [], "any", false, false, false, 331), "html", null, true);
            yield "
                            </div>
                        </div>
                        <div>
                            <div style=\"font-size:0.7rem; color:rgba(255,255,255,0.5); text-transform:uppercase; margin-bottom: 5px;\">Type de pratique</div>
                            <div style=\"color:white; font-weight:700; font-size: 1.2rem;\">
                                ";
            // line 337
            yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 337), "licenceType", [], "any", true, true, false, 337)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 337, $this->source); })()), "user", [], "any", false, false, false, 337), "licenceType", [], "any", false, false, false, 337), "html", null, true)) : ("Compétition"));
            yield "
                            </div>
                        </div>
                        <div>
                            <div style=\"font-size:0.7rem; color:rgba(255,255,255,0.5); text-transform:uppercase; margin-bottom: 5px;\">Saison Actuelle</div>
                            <div style=\"color:white; font-weight:600;\">2025 / 2026</div>
                        </div>
                        <div>
                            <div style=\"font-size:0.7rem; color:rgba(255,255,255,0.5); text-transform:uppercase; margin-bottom: 5px;\">Cotisation</div>
                            <div style=\"color:white; font-weight:600;\">
                                ";
            // line 347
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 347), "licencePrice", [], "any", true, true, false, 347)) {
                // line 348
                yield "                                    ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 348, $this->source); })()), "user", [], "any", false, false, false, 348), "licencePrice", [], "any", false, false, false, 348), "html", null, true);
                yield " € (Réglé)
                                ";
            } else {
                // line 350
                yield "                                    180 € (Réglé)
                                ";
            }
            // line 352
            yield "                            </div>
                        </div>
                    </div>
                ";
        } else {
            // line 356
            yield "                    <div style=\"text-align: center;\">
                        <p style=\"color: rgba(255,255,255,0.6); font-size: 0.9rem; margin-bottom: 20px;\">
                            Votre numéro de licence n'est pas encore renseigné.
                        </p>
                   <button onclick=\"openLicenceChoice()\" style=\"background: white; color: #0f172a; border: none; padding: 12px 25px; border-radius: 10px; font-weight: 800; font-size: 0.9rem; cursor: pointer; display: inline-flex; align-items: center; gap: 10px; transition: 0.3s;\">
AJOUTER MA LICENCE
</button>
                    </div>
                ";
        }
        // line 365
        yield "            </div>
        </div>

        <div class=\"card\" style=\"flex-direction: row; flex-wrap: wrap; padding: 0; overflow: hidden;\">
            <div style=\"flex: 1.5; min-width: 300px; padding: 30px; border-right: var(--border);\">
                <h3 style=\"margin-bottom: 20px; color: white;\">Accès inclus dans votre licence</h3>
                <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 15px;\">
                    ";
        // line 372
        $context["benefits"] = [["icon" => "fa-dumbbell", "text" => "Espace Haltérophilie & Fonte"], ["icon" => "fa-heart-pulse", "text" => "Espace Cardio-Training"], ["icon" => "fa-user-ninja", "text" => "Coaching & Programmation"], ["icon" => "fa-shower", "text" => "Vestiaires & Douches"], ["icon" => "fa-shield-halved", "text" => "Assurance FFHM incluse"], ["icon" => "fa-tags", "text" => "Tarif préférentiel Boutique"]];
        // line 380
        yield "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["benefits"]) || array_key_exists("benefits", $context) ? $context["benefits"] : (function () { throw new RuntimeError('Variable "benefits" does not exist.', 380, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["benefit"]) {
            // line 381
            yield "                    <div style=\"display:flex; align-items:center; gap:12px; padding:12px; background: rgba(255,255,255,0.03); border-radius: 10px; border: 1px solid rgba(255,255,255,0.05);\">
                        <i class=\"fa-solid ";
            // line 382
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["benefit"], "icon", [], "any", false, false, false, 382), "html", null, true);
            yield "\" style=\"color:var(--primary); font-size: 1rem;\"></i>
                        <span style=\"font-size:0.85rem; color:#e4e4e7; font-weight: 500;\">";
            // line 383
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["benefit"], "text", [], "any", false, false, false, 383), "html", null, true);
            yield "</span>
                    </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['benefit'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 386
        yield "                </div>
            </div>

            <div style=\"flex: 1; min-width: 250px; padding: 30px; background: rgba(255,255,255,0.01); display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;\">
                <div style=\"width: 60px; height: 60px; background: rgba(59, 130, 246, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;\">
                    <i class=\"fa-solid fa-file-pdf\" style=\"color: var(--primary); font-size: 1.5rem;\"></i>
                </div>
                <h4 style=\"color: white; margin-bottom: 8px;\">Justificatif de paiement</h4>
                <p style=\"color: var(--text-muted); font-size: 0.8rem; margin-bottom: 20px;\">Téléchargez votre facture pour votre employeur ou mutuelle.</p>
                
                <a href=\"#\" 
                   class=\"btn-event-action\"
                   style=\"width: 100%; background: white; color: black; border: none; font-weight: 700; text-decoration: none; display: flex; align-items: center; justify-content: center; padding: 10px; border-radius: 8px;\">
                    <i class=\"fa-solid fa-download\" style=\"margin-right: 8px;\"></i>
                    Facture .PDF
                </a>
            </div>
        </div>

    </div>
</section>

                <section id=\"tab-events\" class=\"section-view\">
    
    <div style=\"margin-bottom: 20px; display:flex; justify-content:space-between; align-items:center;\">
        <h3 style=\"color:white; font-size:1.2rem;\">Événements à venir</h3>
        <span style=\"background:var(--bg-card); padding:5px 12px; border-radius:20px; font-size:0.8rem; border:var(--border); color:var(--text-muted);\">
            ";
        // line 413
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), ((array_key_exists("events", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["events"]) || array_key_exists("events", $context) ? $context["events"] : (function () { throw new RuntimeError('Variable "events" does not exist.', 413, $this->source); })()), [])) : ([]))), "html", null, true);
        yield " événement(s)
        </span>
    </div>

    <div class=\"dashboard-grid\">
        ";
        // line 418
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(((array_key_exists("events", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["events"]) || array_key_exists("events", $context) ? $context["events"] : (function () { throw new RuntimeError('Variable "events" does not exist.', 418, $this->source); })()), [])) : ([])));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            // line 419
            yield "            
            ";
            // line 421
            yield "            ";
            $context["status"] = "none";
            // line 422
            yield "            ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "isUserConfirmed", [CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 422, $this->source); })()), "user", [], "any", false, false, false, 422)], "method", false, false, false, 422)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 423
                yield "                ";
                $context["status"] = "confirmed";
                // line 424
                yield "            ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "isUserPending", [CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 424, $this->source); })()), "user", [], "any", false, false, false, 424)], "method", false, false, false, 424)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 425
                yield "                ";
                $context["status"] = "pending";
                // line 426
                yield "            ";
            }
            // line 427
            yield "
            <div class=\"card\" style=\"padding:0; overflow:hidden; display:flex; flex-direction:column;\">
                
                ";
            // line 431
            yield "                <div style=\"height:180px; width:100%; position:relative; background:#000;\">
                    <img src=\"";
            // line 432
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "image", [], "any", false, false, false, 432)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, $context["event"], "image", [], "any", false, false, false, 432))), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/bg2.jpg"), "html", null, true)));
            yield "\" 
                         alt=\"";
            // line 433
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 433), "html", null, true);
            yield "\"
                         style=\"width:100%; height:100%; object-fit:cover; opacity:0.85; transition:0.3s;\">
                    
                    <div style=\"position:absolute; top:12px; left:12px; background:rgba(0,0,0,0.6); backdrop-filter:blur(5px); border:1px solid rgba(255,255,255,0.1); padding:6px 10px; border-radius:8px; text-align:center; color:white; min-width:50px;\">
                        <span style=\"display:block; font-weight:800; font-size:1.3rem; line-height:1;\">";
            // line 437
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "date", [], "any", false, false, false, 437), "d"), "html", null, true);
            yield "</span>
                        <span style=\"display:block; font-size:0.75rem; text-transform:uppercase; color:#a1a1aa;\">";
            // line 438
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "date", [], "any", false, false, false, 438), "M"), "html", null, true);
            yield "</span>
                    </div>

                    ";
            // line 441
            if (((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 441, $this->source); })()) == "confirmed")) {
                // line 442
                yield "                        <div style=\"position:absolute; top:12px; right:12px; background:rgba(16, 185, 129, 0.9); color:white; padding:4px 10px; border-radius:20px; font-size:0.7rem; font-weight:700; box-shadow:0 4px 10px rgba(0,0,0,0.3);\">
                            <i class=\"fa-solid fa-check\"></i> INSCRIT
                        </div>
                    ";
            } elseif ((            // line 445
(isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 445, $this->source); })()) == "pending")) {
                // line 446
                yield "                        <div style=\"position:absolute; top:12px; right:12px; background:rgba(245, 158, 11, 0.9); color:black; padding:4px 10px; border-radius:20px; font-size:0.7rem; font-weight:700; box-shadow:0 4px 10px rgba(0,0,0,0.3);\">
                            <i class=\"fa-regular fa-clock\"></i> EN ATTENTE
                        </div>
                    ";
            }
            // line 450
            yield "                </div>

                ";
            // line 453
            yield "                <div style=\"padding:20px; flex:1; display:flex; flex-direction:column;\">
                    
                    <h3 style=\"margin-bottom:8px; font-size:1.1rem; color:white; line-height:1.4;\">";
            // line 455
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 455), "html", null, true);
            yield "</h3>
                    
                    <div style=\"display:flex; flex-direction:column; gap:6px; margin-bottom:15px;\">
                        <div style=\"color:var(--text-muted); font-size:0.9rem; display:flex; align-items:center;\">
                            <i class=\"fa-regular fa-clock\" style=\"width:20px; color:var(--primary);\"></i>
                            ";
            // line 460
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "startTime", [], "any", false, false, false, 460)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 461
                yield "                                ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "startTime", [], "any", false, false, false, 461), "H:i"), "html", null, true);
                yield "
                                ";
                // line 462
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "endTime", [], "any", false, false, false, 462)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield " - ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "endTime", [], "any", false, false, false, 462), "H:i"), "html", null, true);
                }
                // line 463
                yield "                            ";
            } else {
                // line 464
                yield "                                Heure à confirmer
                            ";
            }
            // line 466
            yield "                        </div>
                        
                        ";
            // line 468
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 468)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 469
                yield "                        <div style=\"color:var(--text-muted); font-size:0.9rem; display:flex; align-items:center;\">
                            <i class=\"fa-solid fa-location-dot\" style=\"width:20px; color:var(--text-muted);\"></i>
                            ";
                // line 471
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 471), 0, 25), "html", null, true);
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 471)) > 25)) ? ("...") : (""));
                yield "
                        </div>
                        ";
            }
            // line 474
            yield "                    </div>
                    
                    ";
            // line 476
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "description", [], "any", false, false, false, 476)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 477
                yield "                        <p style=\"font-size:0.85rem; color:#71717a; margin-bottom:20px; line-height:1.5;\">
                            ";
                // line 478
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["event"], "description", [], "any", false, false, false, 478), 0, 80), "html", null, true);
                yield "...
                        </p>
                    ";
            }
            // line 481
            yield "
                    <div style=\"margin-top:auto;\">
                        <a href=\"";
            // line 483
            yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 483, $this->source); })()) == "none")) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("event_register", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 483)]), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("event_unregister", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 483)]), "html", null, true)));
            yield "\" 
                           class=\"btn-event-action\"
                           style=\"
                               display:flex; 
                               align-items:center; 
                               justify-content:center; 
                               width:100%; 
                               padding:12px; 
                               border-radius:8px; 
                               text-decoration:none; 
                               font-weight:600; 
                               font-size:0.9rem;
                               transition:0.2s;
                               /* Couleurs dynamiques selon statut */
                               background: ";
            // line 497
            yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 497, $this->source); })()) == "confirmed")) ? ("rgba(239,68,68,0.1)") : (((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 497, $this->source); })()) == "pending")) ? ("rgba(245,158,11,0.1)") : ("var(--primary)"))));
            yield ";
                               color: ";
            // line 498
            yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 498, $this->source); })()) == "confirmed")) ? ("#ef4444") : (((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 498, $this->source); })()) == "pending")) ? ("#fbbf24") : ("white"))));
            yield ";
                               border: 1px solid ";
            // line 499
            yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 499, $this->source); })()) == "confirmed")) ? ("rgba(239,68,68,0.3)") : (((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 499, $this->source); })()) == "pending")) ? ("rgba(245,158,11,0.3)") : ("transparent"))));
            yield ";
                           \">
                            
                            ";
            // line 502
            if (((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 502, $this->source); })()) == "confirmed")) {
                // line 503
                yield "                                <i class=\"fa-solid fa-xmark\" style=\"margin-right:8px;\"></i> Se désinscrire
                            ";
            } elseif ((            // line 504
(isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 504, $this->source); })()) == "pending")) {
                // line 505
                yield "                                <i class=\"fa-solid fa-ban\" style=\"margin-right:8px;\"></i> Annuler
                            ";
            } else {
                // line 507
                yield "                                <span>Je participe</span> <i class=\"fa-solid fa-arrow-right\" style=\"margin-left:8px;\"></i>
                            ";
            }
            // line 509
            yield "                        </a>
                    </div>

                </div>
            </div>

        ";
            $context['_iterated'] = true;
        }
        // line 515
        if (!$context['_iterated']) {
            // line 516
            yield "            <div class=\"card\" style=\"grid-column: 1 / -1; padding:60px 20px; text-align:center; display:flex; flex-direction:column; align-items:center;\">
                <div style=\"width:80px; height:80px; background:rgba(255,255,255,0.05); border-radius:50%; display:flex; align-items:center; justify-content:center; margin-bottom:20px;\">
                    <i class=\"fa-regular fa-calendar-xmark\" style=\"font-size:2.5rem; color:var(--text-muted);\"></i>
                </div>
                <h3 style=\"color:white; margin-bottom:10px;\">Aucun événement prévu</h3>
                <p style=\"color:var(--text-muted); max-width:400px;\">
                    Le calendrier est vide pour le moment. Revenez plus tard pour découvrir les prochaines compétitions et entraînements.
                </p>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['event'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 526
        yield "    </div>
</section>

<section id=\"tab-boutique\" class=\"section-view\">
<h3 style=\"color:white; font-size:1.2rem; margin:0;\">Boutique du Club</h3>
    <div style=\"margin-bottom: 25px; display:flex; justify-content:space-between; align-items:center;\">
        <div>
            <p style=\"color:var(--text-muted); font-size:0.9rem;\">Commandez en ligne, retirez au club</p>
        </div>
        <div style=\"background:var(--bg-card); padding:8px 15px; border-radius:10px; border:var(--border); display:flex; align-items:center; gap:10px;\">
            <i class=\"fa-solid fa-bag-shopping\" style=\"color:var(--primary);\"></i>
            <span style=\"color:white; font-weight:600;\">";
        // line 537
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["produits"]) || array_key_exists("produits", $context) ? $context["produits"] : (function () { throw new RuntimeError('Variable "produits" does not exist.', 537, $this->source); })())), "html", null, true);
        yield " Articles</span>
        </div>
    </div>

    <div class=\"dashboard-grid\">
        ";
        // line 542
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(((array_key_exists("produits", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["produits"]) || array_key_exists("produits", $context) ? $context["produits"] : (function () { throw new RuntimeError('Variable "produits" does not exist.', 542, $this->source); })()), [])) : ([])));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["produit"]) {
            // line 543
            yield "            <div class=\"card\" style=\"padding:0; overflow:hidden; display:flex; flex-direction:column; transition: transform 0.3s ease;\" onmouseover=\"this.style.transform='translateY(-5px)'\" onmouseout=\"this.style.transform='translateY(0)'\">
                
                <div style=\"height:220px; background:#111; position:relative; overflow:hidden; display:flex; align-items:center; justify-content:center;\">
                    <img src=\"";
            // line 546
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "image", [], "any", false, false, false, 546)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "image", [], "any", false, false, false, 546))), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/default-product.png"), "html", null, true)));
            yield "\" 
                         alt=\"";
            // line 547
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "titre", [], "any", false, false, false, 547), "html", null, true);
            yield "\" 
                         style=\"width:100%; height:100%; object-fit:cover;\">
                    
                    <div style=\"position:absolute; top:12px; right:12px; background:rgba(15, 23, 42, 0.8); backdrop-filter:blur(4px); padding:6px 12px; border-radius:8px; color:var(--primary); font-weight:800; border: 1px solid rgba(255,255,255,0.1);\">
                        ";
            // line 551
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "prix", [], "any", false, false, false, 551), 2, ",", " "), "html", null, true);
            yield " €
                    </div>
                </div>

                <div style=\"padding:20px; flex-grow:1; display:flex; flex-direction:column;\">
                    <h4 style=\"color:white; margin:0 0 10px 0; font-size:1.15rem; font-weight:700; text-transform:uppercase;\">
                        ";
            // line 557
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "titre", [], "any", false, false, false, 557), "html", null, true);
            yield "
                    </h4>
                    
                    <p style=\"color:var(--text-muted); font-size:0.85rem; line-height:1.5; margin-bottom:20px; flex-grow:1;\">
                        ";
            // line 561
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", false, false, false, 561), 0, 100), "html", null, true);
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "description", [], "any", false, false, false, 561)) > 100)) ? ("...") : (""));
            yield "
                    </p>

                    <div style=\"margin-top:auto;\">
                        <a href=\"https://www.helloasso.com/associations/ton-association/formulaires/ton-formulaire?produit_id=";
            // line 565
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "id", [], "any", false, false, false, 565), "html", null, true);
            yield "\" 
                           target=\"_blank\"
                           style=\"width:100%; 
                                  padding:12px; 
                                  background:var(--primary); 
                                  border:none; 
                                  border-radius:8px; 
                                  color:white; 
                                  font-weight:700; 
                                  text-decoration:none;
                                  display:flex; 
                                  align-items:center; 
                                  justify-content:center; 
                                  gap:10px; 
                                  transition:0.2s;\">
                            <i class=\"fa-solid fa-cart-shopping\"></i> 
                            Acheter via HelloAsso
                        </a>
                    </div>
                </div>
            </div>
        ";
            $context['_iterated'] = true;
        }
        // line 586
        if (!$context['_iterated']) {
            // line 587
            yield "            <div class=\"card\" style=\"grid-column: 1 / -1; padding:50px; text-align:center;\">
                <i class=\"fa-solid fa-store-slash\" style=\"font-size:3rem; color:var(--text-muted); margin-bottom:15px;\"></i>
                <h3 style=\"color:white;\">Aucun produit disponible</h3>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['produit'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 592
        yield "    </div>

    <div style=\"margin-top:30px; padding:20px; background:rgba(255,255,255,0.02); border-radius:12px; border: 1px dashed rgba(255,255,255,0.1); display:grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap:20px;\">
        <div style=\"display:flex; align-items:center; gap:12px;\">
            <i class=\"fa-solid fa-box-archive\" style=\"color:var(--primary);\"></i>
            <span style=\"color:var(--text-muted); font-size:0.85rem;\">Retrait rapide au bureau</span>
        </div>
        <div style=\"display:flex; align-items:center; gap:12px;\">
            <i class=\"fa-solid fa-shield-check\" style=\"color:var(--primary);\"></i>
            <span style=\"color:var(--text-muted); font-size:0.85rem;\">Paiement sécurisé HelloAsso</span>
        </div>
        <div style=\"display:flex; align-items:center; gap:12px;\">
            <i class=\"fa-solid fa-circle-question\" style=\"color:var(--primary);\"></i>
            <span style=\"color:var(--text-muted); font-size:0.85rem;\">Besoin d'aide ? Contactez le club</span>
        </div>
    </div>
</section>

<section id=\"tab-messages\" class=\"section-view\">
    
    <div style=\"margin-bottom: 30px; border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 20px;\">
        <h3 style=\"color:white; margin:0 0 5px 0; font-size:1.2rem;\">Centre de Support</h3>
        <p style=\"color:var(--text-muted); font-size:0.95rem; margin:0;\">
            Historique de vos échanges avec l'administration du CHM Saleux.
        </p>
    </div>

    <div style=\"width: 100%; padding-bottom: 50px;\">
        
        <div style=\"margin-bottom: 30px; display:flex; justify-content:flex-end; align-items:center; gap:15px;\">
            <div style=\"background:rgba(255,255,255,0.03); padding:8px 15px; border-radius:8px; border:1px solid rgba(255,255,255,0.05); text-align:right; display:flex; align-items:center; gap:10px;\">
                <span style=\"color:var(--text-muted); font-size:0.75rem; text-transform:uppercase; font-weight:700;\">Tickets</span>
                <span style=\"color:white; font-weight:700; font-size:1rem;\">";
        // line 624
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["messages"]) || array_key_exists("messages", $context) ? $context["messages"] : (function () { throw new RuntimeError('Variable "messages" does not exist.', 624, $this->source); })())), "html", null, true);
        yield "</span>
            </div>
            
            <a href=\"";
        // line 627
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("contact");
        yield "\" class=\"btn-event-action\" style=\"background:var(--primary); color:white; text-decoration:none;\">
                <i class=\"fa-solid fa-plus\"></i> Nouvelle demande
            </a>
        </div>

        <div style=\"display:flex; flex-direction:column; gap:25px;\">
            ";
        // line 633
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(((array_key_exists("messages", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["messages"]) || array_key_exists("messages", $context) ? $context["messages"] : (function () { throw new RuntimeError('Variable "messages" does not exist.', 633, $this->source); })()), [])) : ([])));
        $context['_iterated'] = false;
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
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 634
            yield "                <div class=\"card\" style=\"padding: 0; overflow: hidden; border: 1px solid ";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "reponse", [], "any", false, false, false, 634)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("rgba(52, 211, 153, 0.1)") : ("rgba(255,255,255,0.05)"));
            yield "; background: rgba(255,255,255,0.01);\">
                    
                    <div style=\"padding: 15px 20px; background: rgba(255,255,255,0.02); border-bottom: 1px solid rgba(255,255,255,0.05); display:flex; justify-content:space-between; align-items:center;\">
                        <div style=\"display:flex; align-items:center; gap:10px;\">
                            <span style=\"font-size:0.75rem; color:var(--text-muted); font-weight:700; text-transform:uppercase; letter-spacing:1px;\">Ticket #";
            // line 638
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 638), "html", null, true);
            yield "</span>
                            ";
            // line 639
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "reponse", [], "any", false, false, false, 639)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 640
                yield "                                <span style=\"background: rgba(52, 211, 153, 0.15); color: #34d399; font-size: 0.65rem; padding: 2px 8px; border-radius: 4px; font-weight: 700; border: 1px solid rgba(52, 211, 153, 0.2);\">RÉSOLU</span>
                            ";
            } else {
                // line 642
                yield "                                <span style=\"background: rgba(59, 130, 246, 0.15); color: var(--primary); font-size: 0.65rem; padding: 2px 8px; border-radius: 4px; font-weight: 700; border: 1px solid rgba(59, 130, 246, 0.2);\">EN COURS</span>
                            ";
            }
            // line 644
            yield "                        </div>
                        <span style=\"color:var(--text-muted); font-size:0.75rem;\">";
            // line 645
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "createdAt", [], "any", false, false, false, 645), "d/m/Y à H:i"), "html", null, true);
            yield "</span>
                    </div>

                    <div style=\"padding: 25px;\">
                        
                        <div style=\"display:flex; gap:15px; margin-bottom: 25px;\">
                            <div style=\"width:40px; height:40px; border-radius:8px; background: linear-gradient(135deg, #334155 0%, #1e293b 100%); display:flex; align-items:center; justify-content:center; color:white; font-weight:700; flex-shrink:0; border:1px solid rgba(255,255,255,0.1); font-size:0.9rem;\">
                                ";
            // line 652
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 652, $this->source); })()), "user", [], "any", false, false, false, 652), "firstname", [], "any", false, false, false, 652))), "html", null, true);
            yield "
                            </div>
                            <div style=\"flex:1;\">
                                <div style=\"color:white; font-weight:600; font-size:0.9rem; margin-bottom:6px;\">Ma question</div>
                                <div style=\"color:#d1d5db; font-size:0.95rem; line-height:1.6; background: rgba(255,255,255,0.03); padding:15px; border-radius:0 12px 12px 12px; border: 1px solid rgba(255,255,255,0.05);\">
                                    ";
            // line 657
            yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "message", [], "any", false, false, false, 657), "html", null, true));
            yield "
                                </div>
                            </div>
                        </div>

                        ";
            // line 662
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "reponse", [], "any", false, false, false, 662)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 663
                yield "                            <div style=\"display:flex; gap:15px; padding-left: 40px; animation: modalSlideUp 0.4s ease;\">
                                <div style=\"width:40px; height:40px; border-radius:8px; background: linear-gradient(135deg, var(--primary) 0%, #1e40af 100%); display:flex; align-items:center; justify-content:center; color:white; flex-shrink:0; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);\">
                                    <i class=\"fa-solid fa-user-shield\"></i>
                                </div>
                                <div style=\"flex:1;\">
                                    <div style=\"color:#34d399; font-weight:600; font-size:0.9rem; margin-bottom:6px;\">Réponse du secrétariat</div>
                                    <div style=\"color:white; font-size:0.95rem; line-height:1.6; background: rgba(52, 211, 153, 0.05); padding:15px; border-radius:0 12px 12px 12px; border: 1px solid rgba(52, 211, 153, 0.1); border-left: 3px solid #34d399;\">
                                        ";
                // line 670
                yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["msg"], "reponse", [], "any", false, false, false, 670), "html", null, true));
                yield "
                                    </div>
                                </div>
                            </div>
                        ";
            } else {
                // line 675
                yield "                            <div style=\"margin-left: 55px; padding: 10px 15px; background: rgba(255,255,255,0.02); border-radius: 8px; display:inline-flex; align-items:center; gap:8px;\">
                                <div class=\"typing-bubble\" style=\"display:flex; gap:3px;\">
                                    <span class=\"dot\" style=\"width:4px; height:4px; background:#64748b; border-radius:50%;\"></span>
                                    <span class=\"dot\" style=\"width:4px; height:4px; background:#64748b; border-radius:50%;\"></span>
                                    <span class=\"dot\" style=\"width:4px; height:4px; background:#64748b; border-radius:50%;\"></span>
                                </div>
                                <span style=\"color:var(--text-muted); font-size:0.8rem; font-weight:500;\">En attente d'une réponse...</span>
                            </div>
                        ";
            }
            // line 684
            yield "                    </div>
                </div>
            ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        // line 686
        if (!$context['_iterated']) {
            // line 687
            yield "                <div class=\"card\" style=\"padding:60px 20px; text-align:center; border: 1px dashed rgba(255,255,255,0.1); background:none;\">
                    <div style=\"width:80px; height:80px; background:rgba(255,255,255,0.02); border-radius:50%; display:flex; align-items:center; justify-content:center; margin: 0 auto 20px; border: 1px solid rgba(255,255,255,0.05);\">
                        <i class=\"fa-regular fa-comments\" style=\"font-size:2rem; color:var(--text-muted);\"></i>
                    </div>
                    <h4 style=\"color:white; font-size:1.2rem; font-weight:700; margin-bottom:10px;\">Aucun ticket</h4>
                    <p style=\"color:var(--text-muted); max-width:400px; margin: 0 auto 25px; font-size:0.9rem;\">
                        Vous n'avez pas encore de demandes en cours. Une question sur votre licence ou un événement ?
                    </p>
                    <a href=\"";
            // line 695
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("contact");
            yield "\" class=\"btn-event-action\" style=\"background:white; color:black; font-weight:700;\">
                        Contacter le secrétariat
                    </a>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent'], $context['_iterated'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 700
        yield "        </div>

        <div style=\"margin-top:40px; padding:20px; border-radius:12px; background: rgba(59, 130, 246, 0.05); border: 1px solid rgba(59, 130, 246, 0.1); display: flex; align-items: center; gap: 15px;\">
            <div style=\"width:40px; height:40px; background:rgba(59, 130, 246, 0.1); border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0;\">
                <i class=\"fa-solid fa-bolt\" style=\"color:var(--primary); font-size:1rem;\"></i>
            </div>
            <p style=\"color:var(--text-muted); font-size:0.9rem; margin:0; line-height:1.5;\">
                Une urgence ? Notre chatbot <strong style=\"color:white;\">Elios</strong> est disponible 24h/24 en bas à droite pour répondre à vos questions fréquentes instantanément.
            </p>
        </div>
    </div>
</section>

<section id=\"tab-settings\" class=\"section-view\">

    <div style=\"width: 100%; padding-bottom: 50px;\">
        
<div style=\"margin-bottom: 30px; border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 20px;\">
            <h3 style=\"color:white; margin:0 0 5px 0; font-size:1.2rem;\">Paramètres du compte</h3>
            <p style=\"color:var(--text-muted); font-size:0.95rem; margin:0;\">
                Gérez vos informations, votre sécurité et vos préférences d'accès.
            </p>
        </div>

        <div style=\"display: grid; grid-template-columns: repeat(auto-fit, minmax(450px, 1fr)); gap: 30px; align-items: start;\">
            
            <div class=\"card\" style=\"padding: 0; overflow: hidden; height: 100%;\">
                <div style=\"padding: 25px; border-bottom: 1px solid rgba(255,255,255,0.05); background: rgba(255,255,255,0.01);\">
                    <h4 style=\"color:white; margin:0; font-size:1.1rem; display:flex; align-items:center; gap:12px;\">
                        <div style=\"width:35px; height:35px; background:rgba(59, 130, 246, 0.1); border-radius:10px; display:flex; align-items:center; justify-content:center;\">
                            <i class=\"fa-solid fa-address-card\" style=\"color:var(--primary); font-size:0.9rem;\"></i>
                        </div>
                        Informations personnelles
                    </h4>
                </div>

                <div style=\"padding: 30px; display: flex; flex-direction: column; gap: 30px;\">
                    <div style=\"display:flex; justify-content:space-between; align-items:center;\">
                        <div>
                            <label style=\"display:block; color:var(--text-muted); font-size:0.7rem; text-transform:uppercase; font-weight:800; letter-spacing:1px; margin-bottom:8px;\">Adresse e-mail de connexion</label>
                            <div style=\"color:white; font-weight:600; font-size:1.1rem;\">";
        // line 740
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 740, $this->source); })()), "user", [], "any", false, false, false, 740), "email", [], "any", false, false, false, 740), "html", null, true);
        yield "</div>
                        </div>
                        <button class=\"btn-contact-top\" style=\"margin:0; background:rgba(255,255,255,0.05);\" onclick=\"toggleEdit('email')\">Modifier</button>
                    </div>

                    <div id=\"form-email\" style=\"display:none; padding:20px; background:rgba(0,0,0,0.2); border-radius:15px; border:1px solid rgba(255,255,255,0.05); animation: modalSlideUp 0.3s ease;\">
                        <input type=\"email\" id=\"input-email\" class=\"search-input\" style=\"width:100%; margin-bottom:15px;\" placeholder=\"Nouvel e-mail\">
                        <div style=\"display:flex; gap:10px; justify-content:flex-end;\">
                            <button class=\"btn-close-flat\" style=\"margin:0;\" onclick=\"toggleEdit('email')\">Annuler</button>
                            <button class=\"btn-event-action\" style=\"background:var(--primary); color:white; width:auto; padding:8px 20px;\" onclick=\"updateProfile('email')\">Enregistrer</button>
                        </div>
                    </div>

                    <div style=\"height:1px; background:linear-gradient(90deg, rgba(255,255,255,0.08) 0%, transparent 100%);\"></div>

                    <div style=\"display:flex; justify-content:space-between; align-items:center;\">
                        <div>
                            <label style=\"display:block; color:var(--text-muted); font-size:0.7rem; text-transform:uppercase; font-weight:800; letter-spacing:1px; margin-bottom:8px;\">Numéro de téléphone</label>
                            <div style=\"color:white; font-weight:600; font-size:1.1rem;\">";
        // line 758
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 758), "phone", [], "any", true, true, false, 758)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 758, $this->source); })()), "user", [], "any", false, false, false, 758), "phone", [], "any", false, false, false, 758), "Non renseigné")) : ("Non renseigné")), "html", null, true);
        yield "</div>
                        </div>
                        <button class=\"btn-contact-top\" style=\"margin:0; background:rgba(255,255,255,0.05);\" onclick=\"toggleEdit('phone')\">Modifier</button>
                    </div>

                    <div id=\"form-phone\" style=\"display:none; padding:20px; background:rgba(0,0,0,0.2); border-radius:15px; border:1px solid rgba(255,255,255,0.05); animation: modalSlideUp 0.3s ease;\">
                        <input type=\"text\" id=\"input-phone\" class=\"search-input\" style=\"width:100%; margin-bottom:15px;\" placeholder=\"06 XX XX XX XX\">
                        <div style=\"display:flex; gap:10px; justify-content:flex-end;\">
                            <button class=\"btn-close-flat\" style=\"margin:0;\" onclick=\"toggleEdit('phone')\">Annuler</button>
                            <button class=\"btn-event-action\" style=\"background:var(--primary); color:white; width:auto; padding:8px 20px;\" onclick=\"updateProfile('phone')\">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"card\" style=\"padding: 0; overflow: hidden; height: 100%;\">
                <div style=\"padding: 25px; border-bottom: 1px solid rgba(255,255,255,0.05); background: rgba(255,255,255,0.01);\">
                    <h4 style=\"color:white; margin:0; font-size:1.1rem; display:flex; align-items:center; gap:12px;\">
                        <div style=\"width:35px; height:35px; background:rgba(16, 185, 129, 0.1); border-radius:10px; display:flex; align-items:center; justify-content:center;\">
                            <i class=\"fa-solid fa-shield-halved\" style=\"color:#10b981; font-size:0.9rem;\"></i>
                        </div>
                        Sécurité & Accès
                    </h4>
                </div>

                <div style=\"padding: 30px; display: flex; flex-direction: column; gap: 20px;\">
                    <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 20px;\">
                        <div style=\"background: rgba(255,255,255,0.02); padding: 25px; border-radius: 18px; border: 1px solid rgba(255,255,255,0.03); text-align: center;\">
                            <i class=\"fa-solid fa-key\" style=\"color:var(--primary); font-size:1.5rem; margin-bottom:15px;\"></i>
                            <h5 style=\"color:white; margin:0 0 10px 0;\">Mot de passe</h5>
                            <button class=\"btn-event-action\" style=\"background:var(--primary); color:white; width:100%; border:none;\" onclick=\"toggleEdit('password')\">Changer</button>
                        </div>
                        <div style=\"background: rgba(255,255,255,0.02); padding: 25px; border-radius: 18px; border: 1px solid rgba(255,255,255,0.03); text-align: center;\">
                            <i class=\"fa-solid fa-fingerprint\" style=\"color:#10b981; font-size:1.5rem; margin-bottom:15px;\"></i>
                            <h5 style=\"color:white; margin:0 0 10px 0;\">2FA (A2F)</h5>
                            <button class=\"btn-event-action\" style=\"background:rgba(255,255,255,0.05); color:white; width:100%; border:1px solid rgba(255,255,255,0.1);\" onclick=\"toggleA2F()\">Activer</button>
                        </div>
                    </div>

                    <div id=\"form-password\" style=\"display:none; padding:25px; background:rgba(0,0,0,0.3); border-radius:18px; border:1px solid var(--primary); animation: modalSlideUp 0.3s ease;\">
                        <h5 style=\"color:white; margin-bottom:15px;\">Modification du mot de passe</h5>
                        <div style=\"display:flex; flex-direction:column; gap:12px;\">
                            <input type=\"password\" id=\"old-pass\" class=\"search-input\" placeholder=\"Ancien mot de passe\">
                            <input type=\"password\" id=\"new-pass\" class=\"search-input\" placeholder=\"Nouveau mot de passe\">
                            <div style=\"display:flex; gap:10px; justify-content:flex-end; margin-top:10px;\">
                                <button class=\"btn-close-flat\" onclick=\"toggleEdit('password')\">Annuler</button>
                                <button class=\"btn-event-action\" style=\"background:var(--primary); color:white; width:auto; padding:10px 25px;\" onclick=\"updateProfile('password')\">Confirmer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style=\"margin-top: 40px; padding: 30px; border-radius: 24px; background: linear-gradient(90deg, rgba(239, 68, 68, 0.05) 0%, rgba(239, 68, 68, 0.01) 100%); border: 1px solid rgba(239, 68, 68, 0.15); display: flex; justify-content: space-between; align-items: center; gap: 30px;\">
            <div style=\"display:flex; align-items:center; gap:20px;\">
                <div style=\"width:50px; height:50px; background:rgba(239, 68, 68, 0.1); border-radius:50%; display:flex; align-items:center; justify-content:center;\">
                    <i class=\"fa-solid fa-triangle-exclamation\" style=\"color:#ef4444; font-size:1.2rem;\"></i>
                </div>
                <div>
                    <h4 style=\"color:#f87171; margin:0 0 5px 0; font-weight:800;\">Suppression définitive du compte</h4>
                    <p style=\"color:var(--text-muted); font-size:0.9rem; margin:0;\">Toutes vos données, inscriptions aux événements et factures seront supprimées à jamais.</p>
                </div>
            </div>
            <button onclick=\"confirmDeleteAccount()\" style=\"background: #ef4444; color: white; border: none; padding: 14px 28px; border-radius: 12px; font-weight: 800; cursor: pointer; white-space: nowrap; transition: 0.3s; box-shadow: 0 10px 20px rgba(239, 68, 68, 0.2);\">
                Supprimer mon compte
            </button>
        </div>
    </div>
</section>

            </div>
        </main>
    </div>

    <div id=\"cropperModal\" class=\"cropper-modal-overlay\">
        <div class=\"cropper-container-box\">
            <h3 style=\"color:#fff; margin-bottom:15px;\">Recadrer la photo</h3>
            <div class=\"cropper-image-wrapper\">
                <img id=\"cropperImage\" src=\"\">
            </div>
            <div class=\"cropper-actions\">
                <button id=\"cancelCropBtn\" class=\"icon-btn\" style=\"width:auto; padding:0 15px; border-radius:6px;\">Annuler</button>
                <button id=\"cropAndSaveBtn\" class=\"icon-btn\" style=\"width:auto; padding:0 15px; border-radius:6px; background:white; color:black; border:none;\">Enregistrer</button>
            </div>
        </div>
    </div>

   <div id=\"licenceModal\" class=\"cropper-modal-overlay\">
    <div class=\"modal-content-horizontal\">
        
        <div class=\"modal-side manual-side\">
            <h3>Saisie manuelle</h3>
            <p>J'ai mon numéro de licence</p>
            
            <input type=\"text\" id=\"licenceInputManual\" class=\"licence-field\" placeholder=\"00000000\" maxlength=\"12\">
            
            <button class=\"btn-event-action primary-btn\" onclick=\"saveLicenceManual()\">
                Enregistrer
            </button>
        </div>

        <div class=\"modal-divider\">
            <span class=\"divider-text\">OU</span>
        </div>

        <div class=\"modal-side elios-side\">
            <div class=\"elios-badge\">Assistant IA</div>
            <h3>Récupération</h3>
            <p>Elios retrouve votre numéro en 30s</p>
            
            <div class=\"elios-visual\">
                <img src=\"";
        // line 870
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/ia.png"), "html", null, true);
        yield "\" alt=\"IA\">
            </div>

            <button onclick=\"openChatbot('licence')\" class=\"btn-elios-trigger\">
                Lancer l'assistant
            </button>
        </div>

        <button onclick=\"closeLicenceModal()\" class=\"btn-close-absolute\">&times;</button>
    </div>
</div>

    ";
        // line 882
        yield from $this->load("_shared/_elios_widget.html.twig", 882)->unwrap()->yield($context);
        // line 883
        yield "
<a id=\"assistantWidgetOpen\" class=\"btn-ai-assistant\" title=\"Assistant IA\" 
   style=\"
    position: fixed !important; 
    bottom: 30px !important; 
    right: 30px !important; 
    width: 65px !important; 
    height: 65px !important; 
    z-index: 20000 !important; /* On passe au dessus de tout */
    cursor: pointer !important; 
    display: flex !important; 
    align-items: center !important; 
    justify-content: center !important; 
    background: #0f172a !important;
    border-radius: 50% !important;
    border: 2px solid var(--primary) !important;
    box-shadow: 0 10px 25px rgba(0,0,0,0.5) !important;
    pointer-events: auto !important;
    visibility: visible !important;
    opacity: 1 !important;
   \">
    
    <div style=\"
        position: absolute; 
        width: 100%; 
        height: 100%; 
        border-radius: 50%; 
        background: var(--primary); 
        animation: elios-pulse 2s infinite; 
        z-index: -1;
        opacity: 0.4;
    \"></div>

    <img src=\"";
        // line 916
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/ia.png"), "html", null, true);
        yield "\" alt=\"Elios\" 
         style=\"width: 45px; height: 45px; object-fit: contain; position: relative; z-index: 2;\">
</a>

<script src=\"https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js\"></script>

<script src=\"js/dashboard/test-v2.js\"></script>

<script src=\"";
        // line 924
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/assistant/elios.js"), "html", null, true);
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
        return "dashboard/index.html.twig";
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
        return array (  1428 => 924,  1417 => 916,  1382 => 883,  1380 => 882,  1365 => 870,  1250 => 758,  1229 => 740,  1187 => 700,  1176 => 695,  1166 => 687,  1164 => 686,  1150 => 684,  1139 => 675,  1131 => 670,  1122 => 663,  1120 => 662,  1112 => 657,  1104 => 652,  1094 => 645,  1091 => 644,  1087 => 642,  1083 => 640,  1081 => 639,  1077 => 638,  1069 => 634,  1051 => 633,  1042 => 627,  1036 => 624,  1002 => 592,  992 => 587,  990 => 586,  964 => 565,  956 => 561,  949 => 557,  940 => 551,  933 => 547,  929 => 546,  924 => 543,  919 => 542,  911 => 537,  898 => 526,  883 => 516,  881 => 515,  871 => 509,  867 => 507,  863 => 505,  861 => 504,  858 => 503,  856 => 502,  850 => 499,  846 => 498,  842 => 497,  825 => 483,  821 => 481,  815 => 478,  812 => 477,  810 => 476,  806 => 474,  799 => 471,  795 => 469,  793 => 468,  789 => 466,  785 => 464,  782 => 463,  777 => 462,  772 => 461,  770 => 460,  762 => 455,  758 => 453,  754 => 450,  748 => 446,  746 => 445,  741 => 442,  739 => 441,  733 => 438,  729 => 437,  722 => 433,  718 => 432,  715 => 431,  710 => 427,  707 => 426,  704 => 425,  701 => 424,  698 => 423,  695 => 422,  692 => 421,  689 => 419,  684 => 418,  676 => 413,  647 => 386,  638 => 383,  634 => 382,  631 => 381,  626 => 380,  624 => 372,  615 => 365,  604 => 356,  598 => 352,  594 => 350,  588 => 348,  586 => 347,  573 => 337,  564 => 331,  558 => 327,  556 => 326,  549 => 321,  543 => 317,  537 => 313,  535 => 312,  527 => 309,  511 => 296,  496 => 283,  489 => 281,  487 => 280,  478 => 276,  473 => 273,  468 => 272,  461 => 267,  454 => 262,  447 => 258,  439 => 253,  431 => 247,  425 => 244,  422 => 243,  420 => 242,  415 => 240,  409 => 238,  404 => 234,  401 => 233,  399 => 232,  392 => 227,  386 => 223,  380 => 219,  378 => 218,  372 => 214,  361 => 205,  353 => 200,  344 => 194,  338 => 190,  336 => 189,  327 => 185,  306 => 167,  292 => 155,  288 => 153,  286 => 152,  280 => 149,  257 => 137,  238 => 121,  234 => 119,  230 => 117,  228 => 116,  206 => 97,  202 => 95,  195 => 92,  192 => 91,  186 => 89,  184 => 88,  174 => 81,  142 => 52,  138 => 51,  130 => 45,  124 => 44,  112 => 38,  106 => 36,  101 => 35,  97 => 34,  93 => 33,  87 => 31,  82 => 30,  78 => 29,  56 => 10,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Espace Membre - CHM SALEUX</title>

    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/assistant/elios.css') }}\">
    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800;900&display=swap\" rel=\"stylesheet\">
    
    <link rel=\"stylesheet\" href=\"css/dashboard/test-v2.css\">

    <style>
        html, body { margin: 0 !important; width: 100vw; height: 100vh; overflow: hidden; font-family: 'Inter', sans-serif; }

        @keyframes elios-pulse {
            0% { transform: scale(0.95); opacity: 0.4; }
            50% { transform: scale(1.15); opacity: 0.1; }
            100% { transform: scale(0.95); opacity: 0.4; }
        }
        .btn-ai-assistant:hover { transform: scale(1.1) translateY(-5px) !important; }
    </style>
</head>
<body>
<div id=\"mobileOverlay\" class=\"mobile-overlay\" onclick=\"toggleMobileMenu()\"></div>
<div class=\"flash-container\">
    {% for label, messages in app.flashes %}
        {% for message in messages %}
            <div class=\"flash-message flash-{{ label }}\">
                <i class=\"fa-solid 
                    {% if label == 'success' %}fa-circle-check
                    {% elseif label == 'error' or label == 'danger' %}fa-circle-xmark
                    {% elseif label == 'warning' %}fa-triangle-exclamation
                    {% else %}fa-circle-info{% endif %}\">
                </i>
                <span>{{ message }}</span>
                <div class=\"flash-close\" onclick=\"this.parentElement.remove()\">
                    <i class=\"fa-solid fa-xmark\"></i>
                </div>
            </div>
        {% endfor %}
    {% endfor %}
</div>

    <div class=\"dashboard-container\" style=\"display:flex; width:100%; height:100%;\">
        
        <nav class=\"sidebar\">
            <div class=\"brand\">
                <a href=\"{{ path('home') }}\" class=\"brand-link\">
                    <img src=\"{{ asset('images/favicon/icon.png') }}\" alt=\"Logo CHM\" class=\"brand-logo-img\">
                    <span>CHM SALEUX</span>
                </a>
            </div>

            <div class=\"nav-links\">
                <div class=\"nav-item active\" data-target=\"home\">
                    <i class=\"fa-solid fa-layer-group\" style=\"width:20px;\"></i> Vue d'ensemble
                </div>
                <div class=\"nav-item\" data-target=\"licence\">
                    <i class=\"fa-solid fa-id-card\" style=\"width:20px;\"></i> Ma Licence
                </div>
                <div class=\"nav-item\" data-target=\"planning\">
                    <i class=\"fa-solid fa-calendar\" style=\"width:20px;\"></i> Planning
                </div>
                <div class=\"nav-item\" data-target=\"events\">
                    <i class=\"fa-solid fa-trophy\" style=\"width:20px;\"></i> Événements
                </div>
                <div class=\"nav-item\" data-target=\"boutique\">
                    <i class=\"fa-solid fa-bag-shopping\" style=\"width:20px;\"></i> Boutique
                </div>
                <div class=\"nav-item\" data-target=\"messages\">
                    <i class=\"fa-solid fa-envelope\" style=\"width:20px;\"></i> Messages
                </div>
                <div class=\"nav-item\" data-target=\"settings\">
                    <i class=\"fa-solid fa-gear\" style=\"width:20px;\"></i> Paramètres
                </div>
                
                <div style=\"margin-top: auto; padding-top: 20px;\">
                    <a href=\"{{ path('home') }}\" class=\"nav-link-back\">
                        <i class=\"fa-solid fa-arrow-left\" style=\"margin-right: 10px;\"></i> Retour au site
                    </a>
                </div>
            </div>

            <div class=\"user-mini\">
                {% if app.user.profileImageDataUrl %}
                    <img src=\"{{ app.user.profileImageDataUrl }}\" class=\"user-avatar-small-img\">
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
            <div class=\"menu-toggle\" onclick=\"toggleMobileMenu()\"><i class=\"fa-solid fa-bars\"></i></div>
                <h2 class=\"page-title\">Tableau de bord adhérent</h2>

                <div class=\"topbar-right\">
                    <button class=\"icon-btn\" id=\"theme-toggle-btn\" title=\"Thème\">
                        <i class=\"fa-regular fa-moon\"></i>
                    </button>
                    
                    <button class=\"icon-btn\" style=\"position:relative;\">
                        <i class=\"fa-regular fa-bell\"></i>
                        {% if notifications|default([])|length > 0 %}
                            <span class=\"badge\" style=\"position:absolute; top:8px; right:8px; width:6px; height:6px; background:red; border-radius:50%;\"></span>
                        {% endif %}
                    </button>

                    <a href=\"{{ path('contact') }}\" class=\"btn-contact-top\">
                        Contact
                    </a>
                </div>
            </header>

            <div class=\"content-scroll\">
                
                <div class=\"profile-header\">
                    <div class=\"banner\">
                        <h1 class=\"banner-title\">CHM SALEUX</h1>
                        <div class=\"banner-subtitle\">Club Haltérophilie & Musculation</div>
                    </div>
                    
                    <div class=\"profile-info-container\">
                        <div class=\"avatar-wrapper\">
                            <img src=\"{% if app.user.profileImageDataUrl %}{{ app.user.profileImageDataUrl }}{% else %}https://ui-avatars.com/api/?name={{ app.user.firstname }}+{{ app.user.lastname }}&background=0f172a&color=fff&size=256{% endif %}\" 
                                 class=\"profile-pic-big\" 
                                 id=\"avatar-preview\" 
                                 alt=\"Avatar\">
                            
                            <label for=\"avatar-upload\" class=\"upload-btn\">
                                <i class=\"fa-solid fa-camera\"></i>
                            </label>
                            <input type=\"file\" id=\"avatar-upload\" accept=\"image/png, image/jpeg\" style=\"display: none;\">
                        </div>

                        <div class=\"header-text\">
                            <h1>Bonjour {{ app.user.firstname }} !</h1>
                            <p>
                                Membre Adhérent
                                {% if app.user.licenceStatus is defined and app.user.licenceStatus == 'Active' %}
                                    <span class=\"licence-tag\">Licence Active</span>
                                {% endif %}
                            </p>
                        </div>
                    </div>
                </div>

                <section id=\"tab-home\" class=\"section-view active\">
                <h3 style=\"color:white; margin-bottom:20px;\">Vue d'ensemble</h3>
                    <div class=\"dashboard-grid\">
                        
<div class=\"card\" style=\"padding:0; overflow:hidden; background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); border: none; position: relative; min-height: 240px; display: flex; flex-direction: column;\">
    
    <div style=\"position: absolute; top: 10px; right: 10px; pointer-events: none; opacity: 0.1;\">
        <img src=\"{{ asset('images/favicon/icon.png') }}\" alt=\"Watermark\" style=\"height: 120px;\">
    </div>

    <div style=\"padding: 25px; position: relative; z-index: 2; flex: 1;\">
        <div style=\"display:flex; justify-content:space-between; align-items:start; margin-bottom:20px;\">
            <div>
                <h3 style=\"color:white; margin:0; font-size: 1.1rem;\">Ma Licence</h3>
                <p style=\"color:var(--primary); font-size:0.7rem; font-weight:800; text-transform:uppercase; letter-spacing: 1px; margin: 4px 0 0 0;\">CHM SALEUX</p>
            </div>
            <div style=\"background: rgba(255,255,255,0.1); width: 35px; height: 35px; border-radius: 8px; display: flex; align-items: center; justify-content: center;\">
                <i class=\"fa-solid fa-id-card\" style=\"color:white; font-size:1rem;\"></i>
            </div>
        </div>
        
        <div style=\"display:flex; flex-direction:column; gap:12px;\">
            <div>
                <div style=\"font-size:0.65rem; color:rgba(255,255,255,0.5); text-transform:uppercase; letter-spacing: 1px; margin-bottom: 2px;\">Titulaire</div>
                <div style=\"color:white; font-weight:700; font-size: 1rem; text-transform: uppercase;\">
                    {{ app.user.firstname }} {{ app.user.lastname }}
                </div>
            </div>

            {% if app.user.licenceNumber is defined and app.user.licenceNumber %}
                <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 5px;\">
                    <div>
                        <div style=\"font-size:0.65rem; color:rgba(255,255,255,0.5); text-transform:uppercase;\">Numéro</div>
                        <div style=\"color:white; font-family:monospace; font-size:0.9rem; font-weight: 600;\">
                            {{ app.user.licenceNumber }}
                        </div>
                    </div>
                    <div>
                        <div style=\"font-size:0.65rem; color:rgba(255,255,255,0.5); text-transform:uppercase;\">Type</div>
                        <div style=\"color:white; font-weight:600; font-size:0.9rem;\">
                            {{ (app.user.licenceType is defined) ? app.user.licenceType : '---' }}
                        </div>
                    </div>
                </div>
            {% else %}
                <div style=\"margin-top: 10px;\">
              <button onclick=\"openLicenceChoice()\" style=\"width:100%; background:white; color:#0f172a; border:none; padding:10px; border-radius:8px; font-weight:800; font-size:0.75rem; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:8px; transition: 0.3s;\">
 AJOUTER MA LICENCE
</button>
                    <p style=\"color:rgba(255,255,255,0.4); font-size:0.65rem; margin-top:8px; text-align:center;\">
                        Récupérez vos accès via notre chatbot
                    </p>
                </div>
            {% endif %}
        </div>
    </div>

    <div style=\"background: rgba(0,0,0,0.2); padding: 12px 25px; display: flex; justify-content: space-between; align-items: center;\">
        {% if app.user.licenceStatus is defined and app.user.licenceStatus|upper == 'ACTIVE' %}
            <span style=\"color:#34d399; font-size:0.75rem; font-weight:800; display:flex; align-items:center; gap:5px;\">
                <i class=\"fa-solid fa-circle-check\"></i> VALIDE
            </span>
        {% else %}
            <span style=\"color:#f87171; font-size:0.75rem; font-weight:800; display:flex; align-items:center; gap:5px;\">
                <i class=\"fa-solid fa-circle-exclamation\"></i> INACTIVE
            </span>
        {% endif %}
        <span style=\"color:rgba(255,255,255,0.4); font-size:0.7rem; font-weight:600;\">2025 / 2026</span>
    </div>
</div>

<div class=\"card\" style=\"padding:0; overflow:hidden;\">
    {% if events|default([])|length > 0 %}
        {% set nextEvent = events[0] %}
        
        <div style=\"height:140px; width:100%; position:relative; background:#111;\">
            
            {# CORRECTION ICI : J'ai remis 'uploads/' comme dans ton ancien dashboard #}
            <img src=\"{{ nextEvent.image ? asset('uploads/' ~ nextEvent.image) : asset('images/bg2.jpg') }}\" 
                 style=\"width:100%; height:100%; object-fit:cover; opacity:0.8;\" 
                 alt=\"{{ nextEvent.title }}\">
            
            {% if nextEvent.startTime %}
                <div style=\"position:absolute; top:12px; right:12px; background:rgba(0,0,0,0.6); backdrop-filter:blur(4px); color:white; padding:4px 8px; border-radius:6px; font-size:0.85rem; font-weight:600; border:1px solid rgba(255,255,255,0.1);\">
                    <i class=\"fa-regular fa-clock\" style=\"margin-right:4px;\"></i> {{ nextEvent.startTime|date('H:i') }}
                </div>
            {% endif %}
        </div>

        <div style=\"padding:20px;\">
            <h3 style=\"margin-bottom:8px;\">Prochain Événement</h3>
            
            <div style=\"font-size:1.1rem; font-weight:700; color:white; margin-bottom:10px; line-height:1.4;\">
                {{ nextEvent.title }}
            </div>
            
            <div class=\"card-sub\" style=\"display:flex; align-items:center;\">
                <i class=\"fa-regular fa-calendar\" style=\"margin-right:6px; color:var(--primary);\"></i> 
                {{ nextEvent.date|date('d/m/Y') }}
            </div>
        </div>
    {% else %}
        <div style=\"padding:25px; display:flex; flex-direction:column; justify-content:center; height:100%;\">
            <h3>Prochain Événement</h3>
            <p style=\"color:var(--text-muted); margin-top:10px;\">Aucun événement prévu pour le moment.</p>
        </div>
    {% endif %}
</div>

                        <div class=\"card\">
                            <h3>Activité Récente</h3>
                            <div style=\"display:flex; flex-direction:column; gap:15px; margin-top:10px;\">
                                {% for notif in notifications|default([])|slice(0, 3) %}
                                    <div style=\"font-size:0.9rem; color:#d4d4d8; display:flex; align-items:start;\">
                                        <div style=\"min-width:6px; height:6px; background:var(--primary); border-radius:50%; margin-right:12px; margin-top:7px;\"></div>
                                        <div style=\"line-height:1.4;\">
                                            {{ notif.message|default('Nouvelle notification reçue') }}
                                            <div style=\"font-size:0.75rem; color:var(--text-muted); margin-top:2px;\">Il y a 2h</div>
                                        </div>
                                    </div>
                                {% else %}
                                    <p style=\"color:var(--text-muted); font-size:0.85rem;\">Rien à signaler pour le moment.</p>
                                {% endfor %}
                            </div>
                        </div>
                    </div>
                </section>

<section id=\"tab-licence\" class=\"section-view\">
<h3 style=\"color:white; margin-bottom:20px;\">Détails de la licence</h3>
    <div style=\"display: flex; flex-direction: column; gap: 25px;\">
        
        <div class=\"card\" style=\"flex-direction: row; flex-wrap: wrap; padding: 0; overflow: hidden; min-height: 220px; background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); border: none;\">
            
            <div style=\"flex: 1; min-width: 300px; padding: 30px; position: relative; border-right: 1px solid rgba(255,255,255,0.1);\">
                <div style=\"position: absolute; top: 20px; right: 50px; pointer-events: none; z-index: 1;\">
                    <img src=\"{{ asset('images/favicon/icon.png') }}\" alt=\"Watermark\" style=\"height: 150px; opacity: 0.08;\">
                </div>
                
                <div style=\"display:flex; justify-content:space-between; align-items:flex-start; margin-bottom: 30px; position: relative; z-index: 2;\">
                    <div>
                        <h3 style=\"color:white; margin:0; font-size: 1.4rem;\">Licence Officielle</h3>
                        <p style=\"color:var(--primary); font-size:0.85rem; font-weight:700; text-transform:uppercase; letter-spacing: 1.5px;\">CHM SALEUX</p>
                    </div>
                </div>

                <div style=\"position: relative; z-index: 2;\">
                    <div style=\"font-size:0.7rem; color:rgba(255,255,255,0.5); text-transform:uppercase; letter-spacing: 1px;\">Titulaire</div>
                    <div style=\"font-size:1.6rem; font-weight:900; color:white; text-transform:uppercase; margin-bottom: 5px;\">
                        {{ app.user.firstname }} {{ app.user.lastname }}
                    </div>
                    
                    {% if app.user.licenceStatus is defined and app.user.licenceStatus|upper == 'ACTIVE' %}
                        <div style=\"display:inline-block; background:rgba(16, 185, 129, 0.2); color:#34d399; padding:4px 12px; border-radius:50px; font-size:0.7rem; font-weight:800; border: 1px solid rgba(52, 211, 153, 0.3);\">
                            <i class=\"fa-solid fa-check-circle\" style=\"margin-right:5px;\"></i> ACTIVE
                        </div>
                    {% else %}
                        <div style=\"display:inline-block; background:rgba(239, 68, 68, 0.2); color:#f87171; padding:4px 12px; border-radius:50px; font-size:0.7rem; font-weight:800; border: 1px solid rgba(239, 68, 68, 0.3);\">
                            <i class=\"fa-solid fa-circle-exclamation\" style=\"margin-right:5px;\"></i> AUCUNE LICENCE
                        </div>
                    {% endif %}
                </div>
            </div>

            <div style=\"flex: 1.2; min-width: 300px; padding: 30px; display: flex; align-items: center; justify-content: center; position: relative; z-index: 2;\">
                
                {% if app.user.licenceNumber is defined and app.user.licenceNumber %}
                    <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 20px; width: 100%;\">
                        <div>
                            <div style=\"font-size:0.7rem; color:rgba(255,255,255,0.5); text-transform:uppercase; margin-bottom: 5px;\">Numéro de Licence</div>
                            <div style=\"color:white; font-family:'Courier New', monospace; font-weight:700; font-size: 1.2rem; letter-spacing: 1px;\">
                                {{ app.user.licenceNumber }}
                            </div>
                        </div>
                        <div>
                            <div style=\"font-size:0.7rem; color:rgba(255,255,255,0.5); text-transform:uppercase; margin-bottom: 5px;\">Type de pratique</div>
                            <div style=\"color:white; font-weight:700; font-size: 1.2rem;\">
                                {{ (app.user.licenceType is defined) ? app.user.licenceType : 'Compétition' }}
                            </div>
                        </div>
                        <div>
                            <div style=\"font-size:0.7rem; color:rgba(255,255,255,0.5); text-transform:uppercase; margin-bottom: 5px;\">Saison Actuelle</div>
                            <div style=\"color:white; font-weight:600;\">2025 / 2026</div>
                        </div>
                        <div>
                            <div style=\"font-size:0.7rem; color:rgba(255,255,255,0.5); text-transform:uppercase; margin-bottom: 5px;\">Cotisation</div>
                            <div style=\"color:white; font-weight:600;\">
                                {% if app.user.licencePrice is defined %}
                                    {{ app.user.licencePrice }} € (Réglé)
                                {% else %}
                                    180 € (Réglé)
                                {% endif %}
                            </div>
                        </div>
                    </div>
                {% else %}
                    <div style=\"text-align: center;\">
                        <p style=\"color: rgba(255,255,255,0.6); font-size: 0.9rem; margin-bottom: 20px;\">
                            Votre numéro de licence n'est pas encore renseigné.
                        </p>
                   <button onclick=\"openLicenceChoice()\" style=\"background: white; color: #0f172a; border: none; padding: 12px 25px; border-radius: 10px; font-weight: 800; font-size: 0.9rem; cursor: pointer; display: inline-flex; align-items: center; gap: 10px; transition: 0.3s;\">
AJOUTER MA LICENCE
</button>
                    </div>
                {% endif %}
            </div>
        </div>

        <div class=\"card\" style=\"flex-direction: row; flex-wrap: wrap; padding: 0; overflow: hidden;\">
            <div style=\"flex: 1.5; min-width: 300px; padding: 30px; border-right: var(--border);\">
                <h3 style=\"margin-bottom: 20px; color: white;\">Accès inclus dans votre licence</h3>
                <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 15px;\">
                    {% set benefits = [
                        {'icon': 'fa-dumbbell', 'text': 'Espace Haltérophilie & Fonte'},
                        {'icon': 'fa-heart-pulse', 'text': 'Espace Cardio-Training'},
                        {'icon': 'fa-user-ninja', 'text': 'Coaching & Programmation'},
                        {'icon': 'fa-shower', 'text': 'Vestiaires & Douches'},
                        {'icon': 'fa-shield-halved', 'text': 'Assurance FFHM incluse'},
                        {'icon': 'fa-tags', 'text': 'Tarif préférentiel Boutique'}
                    ] %}
                    {% for benefit in benefits %}
                    <div style=\"display:flex; align-items:center; gap:12px; padding:12px; background: rgba(255,255,255,0.03); border-radius: 10px; border: 1px solid rgba(255,255,255,0.05);\">
                        <i class=\"fa-solid {{ benefit.icon }}\" style=\"color:var(--primary); font-size: 1rem;\"></i>
                        <span style=\"font-size:0.85rem; color:#e4e4e7; font-weight: 500;\">{{ benefit.text }}</span>
                    </div>
                    {% endfor %}
                </div>
            </div>

            <div style=\"flex: 1; min-width: 250px; padding: 30px; background: rgba(255,255,255,0.01); display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;\">
                <div style=\"width: 60px; height: 60px; background: rgba(59, 130, 246, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;\">
                    <i class=\"fa-solid fa-file-pdf\" style=\"color: var(--primary); font-size: 1.5rem;\"></i>
                </div>
                <h4 style=\"color: white; margin-bottom: 8px;\">Justificatif de paiement</h4>
                <p style=\"color: var(--text-muted); font-size: 0.8rem; margin-bottom: 20px;\">Téléchargez votre facture pour votre employeur ou mutuelle.</p>
                
                <a href=\"#\" 
                   class=\"btn-event-action\"
                   style=\"width: 100%; background: white; color: black; border: none; font-weight: 700; text-decoration: none; display: flex; align-items: center; justify-content: center; padding: 10px; border-radius: 8px;\">
                    <i class=\"fa-solid fa-download\" style=\"margin-right: 8px;\"></i>
                    Facture .PDF
                </a>
            </div>
        </div>

    </div>
</section>

                <section id=\"tab-events\" class=\"section-view\">
    
    <div style=\"margin-bottom: 20px; display:flex; justify-content:space-between; align-items:center;\">
        <h3 style=\"color:white; font-size:1.2rem;\">Événements à venir</h3>
        <span style=\"background:var(--bg-card); padding:5px 12px; border-radius:20px; font-size:0.8rem; border:var(--border); color:var(--text-muted);\">
            {{ events|default([])|length }} événement(s)
        </span>
    </div>

    <div class=\"dashboard-grid\">
        {% for event in events|default([]) %}
            
            {# --- LOGIQUE D'ÉTAT --- #}
            {% set status = 'none' %}
            {% if event.isUserConfirmed(app.user) %}
                {% set status = 'confirmed' %}
            {% elseif event.isUserPending(app.user) %}
                {% set status = 'pending' %}
            {% endif %}

            <div class=\"card\" style=\"padding:0; overflow:hidden; display:flex; flex-direction:column;\">
                
                {# --- IMAGE & BADGES --- #}
                <div style=\"height:180px; width:100%; position:relative; background:#000;\">
                    <img src=\"{{ event.image ? asset('uploads/' ~ event.image) : asset('images/bg2.jpg') }}\" 
                         alt=\"{{ event.title }}\"
                         style=\"width:100%; height:100%; object-fit:cover; opacity:0.85; transition:0.3s;\">
                    
                    <div style=\"position:absolute; top:12px; left:12px; background:rgba(0,0,0,0.6); backdrop-filter:blur(5px); border:1px solid rgba(255,255,255,0.1); padding:6px 10px; border-radius:8px; text-align:center; color:white; min-width:50px;\">
                        <span style=\"display:block; font-weight:800; font-size:1.3rem; line-height:1;\">{{ event.date|date('d') }}</span>
                        <span style=\"display:block; font-size:0.75rem; text-transform:uppercase; color:#a1a1aa;\">{{ event.date|date('M') }}</span>
                    </div>

                    {% if status == 'confirmed' %}
                        <div style=\"position:absolute; top:12px; right:12px; background:rgba(16, 185, 129, 0.9); color:white; padding:4px 10px; border-radius:20px; font-size:0.7rem; font-weight:700; box-shadow:0 4px 10px rgba(0,0,0,0.3);\">
                            <i class=\"fa-solid fa-check\"></i> INSCRIT
                        </div>
                    {% elseif status == 'pending' %}
                        <div style=\"position:absolute; top:12px; right:12px; background:rgba(245, 158, 11, 0.9); color:black; padding:4px 10px; border-radius:20px; font-size:0.7rem; font-weight:700; box-shadow:0 4px 10px rgba(0,0,0,0.3);\">
                            <i class=\"fa-regular fa-clock\"></i> EN ATTENTE
                        </div>
                    {% endif %}
                </div>

                {# --- CORPS DE LA CARTE --- #}
                <div style=\"padding:20px; flex:1; display:flex; flex-direction:column;\">
                    
                    <h3 style=\"margin-bottom:8px; font-size:1.1rem; color:white; line-height:1.4;\">{{ event.title }}</h3>
                    
                    <div style=\"display:flex; flex-direction:column; gap:6px; margin-bottom:15px;\">
                        <div style=\"color:var(--text-muted); font-size:0.9rem; display:flex; align-items:center;\">
                            <i class=\"fa-regular fa-clock\" style=\"width:20px; color:var(--primary);\"></i>
                            {% if event.startTime %}
                                {{ event.startTime|date('H:i') }}
                                {% if event.endTime %} - {{ event.endTime|date('H:i') }}{% endif %}
                            {% else %}
                                Heure à confirmer
                            {% endif %}
                        </div>
                        
                        {% if event.location %}
                        <div style=\"color:var(--text-muted); font-size:0.9rem; display:flex; align-items:center;\">
                            <i class=\"fa-solid fa-location-dot\" style=\"width:20px; color:var(--text-muted);\"></i>
                            {{ event.location|slice(0, 25) }}{{ event.location|length > 25 ? '...' : '' }}
                        </div>
                        {% endif %}
                    </div>
                    
                    {% if event.description %}
                        <p style=\"font-size:0.85rem; color:#71717a; margin-bottom:20px; line-height:1.5;\">
                            {{ event.description|slice(0, 80) }}...
                        </p>
                    {% endif %}

                    <div style=\"margin-top:auto;\">
                        <a href=\"{{ status == 'none' ? path('event_register', {'id': event.id}) : path('event_unregister', {'id': event.id}) }}\" 
                           class=\"btn-event-action\"
                           style=\"
                               display:flex; 
                               align-items:center; 
                               justify-content:center; 
                               width:100%; 
                               padding:12px; 
                               border-radius:8px; 
                               text-decoration:none; 
                               font-weight:600; 
                               font-size:0.9rem;
                               transition:0.2s;
                               /* Couleurs dynamiques selon statut */
                               background: {{ status == 'confirmed' ? 'rgba(239,68,68,0.1)' : (status == 'pending' ? 'rgba(245,158,11,0.1)' : 'var(--primary)') }};
                               color: {{ status == 'confirmed' ? '#ef4444' : (status == 'pending' ? '#fbbf24' : 'white') }};
                               border: 1px solid {{ status == 'confirmed' ? 'rgba(239,68,68,0.3)' : (status == 'pending' ? 'rgba(245,158,11,0.3)' : 'transparent') }};
                           \">
                            
                            {% if status == 'confirmed' %}
                                <i class=\"fa-solid fa-xmark\" style=\"margin-right:8px;\"></i> Se désinscrire
                            {% elseif status == 'pending' %}
                                <i class=\"fa-solid fa-ban\" style=\"margin-right:8px;\"></i> Annuler
                            {% else %}
                                <span>Je participe</span> <i class=\"fa-solid fa-arrow-right\" style=\"margin-left:8px;\"></i>
                            {% endif %}
                        </a>
                    </div>

                </div>
            </div>

        {% else %}
            <div class=\"card\" style=\"grid-column: 1 / -1; padding:60px 20px; text-align:center; display:flex; flex-direction:column; align-items:center;\">
                <div style=\"width:80px; height:80px; background:rgba(255,255,255,0.05); border-radius:50%; display:flex; align-items:center; justify-content:center; margin-bottom:20px;\">
                    <i class=\"fa-regular fa-calendar-xmark\" style=\"font-size:2.5rem; color:var(--text-muted);\"></i>
                </div>
                <h3 style=\"color:white; margin-bottom:10px;\">Aucun événement prévu</h3>
                <p style=\"color:var(--text-muted); max-width:400px;\">
                    Le calendrier est vide pour le moment. Revenez plus tard pour découvrir les prochaines compétitions et entraînements.
                </p>
            </div>
        {% endfor %}
    </div>
</section>

<section id=\"tab-boutique\" class=\"section-view\">
<h3 style=\"color:white; font-size:1.2rem; margin:0;\">Boutique du Club</h3>
    <div style=\"margin-bottom: 25px; display:flex; justify-content:space-between; align-items:center;\">
        <div>
            <p style=\"color:var(--text-muted); font-size:0.9rem;\">Commandez en ligne, retirez au club</p>
        </div>
        <div style=\"background:var(--bg-card); padding:8px 15px; border-radius:10px; border:var(--border); display:flex; align-items:center; gap:10px;\">
            <i class=\"fa-solid fa-bag-shopping\" style=\"color:var(--primary);\"></i>
            <span style=\"color:white; font-weight:600;\">{{ produits|length }} Articles</span>
        </div>
    </div>

    <div class=\"dashboard-grid\">
        {% for produit in produits|default([]) %}
            <div class=\"card\" style=\"padding:0; overflow:hidden; display:flex; flex-direction:column; transition: transform 0.3s ease;\" onmouseover=\"this.style.transform='translateY(-5px)'\" onmouseout=\"this.style.transform='translateY(0)'\">
                
                <div style=\"height:220px; background:#111; position:relative; overflow:hidden; display:flex; align-items:center; justify-content:center;\">
                    <img src=\"{{ produit.image ? asset('uploads/' ~ produit.image) : asset('images/default-product.png') }}\" 
                         alt=\"{{ produit.titre }}\" 
                         style=\"width:100%; height:100%; object-fit:cover;\">
                    
                    <div style=\"position:absolute; top:12px; right:12px; background:rgba(15, 23, 42, 0.8); backdrop-filter:blur(4px); padding:6px 12px; border-radius:8px; color:var(--primary); font-weight:800; border: 1px solid rgba(255,255,255,0.1);\">
                        {{ produit.prix|number_format(2, ',', ' ') }} €
                    </div>
                </div>

                <div style=\"padding:20px; flex-grow:1; display:flex; flex-direction:column;\">
                    <h4 style=\"color:white; margin:0 0 10px 0; font-size:1.15rem; font-weight:700; text-transform:uppercase;\">
                        {{ produit.titre }}
                    </h4>
                    
                    <p style=\"color:var(--text-muted); font-size:0.85rem; line-height:1.5; margin-bottom:20px; flex-grow:1;\">
                        {{ produit.description|slice(0, 100) }}{{ produit.description|length > 100 ? '...' : '' }}
                    </p>

                    <div style=\"margin-top:auto;\">
                        <a href=\"https://www.helloasso.com/associations/ton-association/formulaires/ton-formulaire?produit_id={{ produit.id }}\" 
                           target=\"_blank\"
                           style=\"width:100%; 
                                  padding:12px; 
                                  background:var(--primary); 
                                  border:none; 
                                  border-radius:8px; 
                                  color:white; 
                                  font-weight:700; 
                                  text-decoration:none;
                                  display:flex; 
                                  align-items:center; 
                                  justify-content:center; 
                                  gap:10px; 
                                  transition:0.2s;\">
                            <i class=\"fa-solid fa-cart-shopping\"></i> 
                            Acheter via HelloAsso
                        </a>
                    </div>
                </div>
            </div>
        {% else %}
            <div class=\"card\" style=\"grid-column: 1 / -1; padding:50px; text-align:center;\">
                <i class=\"fa-solid fa-store-slash\" style=\"font-size:3rem; color:var(--text-muted); margin-bottom:15px;\"></i>
                <h3 style=\"color:white;\">Aucun produit disponible</h3>
            </div>
        {% endfor %}
    </div>

    <div style=\"margin-top:30px; padding:20px; background:rgba(255,255,255,0.02); border-radius:12px; border: 1px dashed rgba(255,255,255,0.1); display:grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap:20px;\">
        <div style=\"display:flex; align-items:center; gap:12px;\">
            <i class=\"fa-solid fa-box-archive\" style=\"color:var(--primary);\"></i>
            <span style=\"color:var(--text-muted); font-size:0.85rem;\">Retrait rapide au bureau</span>
        </div>
        <div style=\"display:flex; align-items:center; gap:12px;\">
            <i class=\"fa-solid fa-shield-check\" style=\"color:var(--primary);\"></i>
            <span style=\"color:var(--text-muted); font-size:0.85rem;\">Paiement sécurisé HelloAsso</span>
        </div>
        <div style=\"display:flex; align-items:center; gap:12px;\">
            <i class=\"fa-solid fa-circle-question\" style=\"color:var(--primary);\"></i>
            <span style=\"color:var(--text-muted); font-size:0.85rem;\">Besoin d'aide ? Contactez le club</span>
        </div>
    </div>
</section>

<section id=\"tab-messages\" class=\"section-view\">
    
    <div style=\"margin-bottom: 30px; border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 20px;\">
        <h3 style=\"color:white; margin:0 0 5px 0; font-size:1.2rem;\">Centre de Support</h3>
        <p style=\"color:var(--text-muted); font-size:0.95rem; margin:0;\">
            Historique de vos échanges avec l'administration du CHM Saleux.
        </p>
    </div>

    <div style=\"width: 100%; padding-bottom: 50px;\">
        
        <div style=\"margin-bottom: 30px; display:flex; justify-content:flex-end; align-items:center; gap:15px;\">
            <div style=\"background:rgba(255,255,255,0.03); padding:8px 15px; border-radius:8px; border:1px solid rgba(255,255,255,0.05); text-align:right; display:flex; align-items:center; gap:10px;\">
                <span style=\"color:var(--text-muted); font-size:0.75rem; text-transform:uppercase; font-weight:700;\">Tickets</span>
                <span style=\"color:white; font-weight:700; font-size:1rem;\">{{ messages|length }}</span>
            </div>
            
            <a href=\"{{ path('contact') }}\" class=\"btn-event-action\" style=\"background:var(--primary); color:white; text-decoration:none;\">
                <i class=\"fa-solid fa-plus\"></i> Nouvelle demande
            </a>
        </div>

        <div style=\"display:flex; flex-direction:column; gap:25px;\">
            {% for msg in messages|default([]) %}
                <div class=\"card\" style=\"padding: 0; overflow: hidden; border: 1px solid {{ msg.reponse ? 'rgba(52, 211, 153, 0.1)' : 'rgba(255,255,255,0.05)' }}; background: rgba(255,255,255,0.01);\">
                    
                    <div style=\"padding: 15px 20px; background: rgba(255,255,255,0.02); border-bottom: 1px solid rgba(255,255,255,0.05); display:flex; justify-content:space-between; align-items:center;\">
                        <div style=\"display:flex; align-items:center; gap:10px;\">
                            <span style=\"font-size:0.75rem; color:var(--text-muted); font-weight:700; text-transform:uppercase; letter-spacing:1px;\">Ticket #{{ loop.index }}</span>
                            {% if msg.reponse %}
                                <span style=\"background: rgba(52, 211, 153, 0.15); color: #34d399; font-size: 0.65rem; padding: 2px 8px; border-radius: 4px; font-weight: 700; border: 1px solid rgba(52, 211, 153, 0.2);\">RÉSOLU</span>
                            {% else %}
                                <span style=\"background: rgba(59, 130, 246, 0.15); color: var(--primary); font-size: 0.65rem; padding: 2px 8px; border-radius: 4px; font-weight: 700; border: 1px solid rgba(59, 130, 246, 0.2);\">EN COURS</span>
                            {% endif %}
                        </div>
                        <span style=\"color:var(--text-muted); font-size:0.75rem;\">{{ msg.createdAt|date('d/m/Y à H:i') }}</span>
                    </div>

                    <div style=\"padding: 25px;\">
                        
                        <div style=\"display:flex; gap:15px; margin-bottom: 25px;\">
                            <div style=\"width:40px; height:40px; border-radius:8px; background: linear-gradient(135deg, #334155 0%, #1e293b 100%); display:flex; align-items:center; justify-content:center; color:white; font-weight:700; flex-shrink:0; border:1px solid rgba(255,255,255,0.1); font-size:0.9rem;\">
                                {{ app.user.firstname|first|upper }}
                            </div>
                            <div style=\"flex:1;\">
                                <div style=\"color:white; font-weight:600; font-size:0.9rem; margin-bottom:6px;\">Ma question</div>
                                <div style=\"color:#d1d5db; font-size:0.95rem; line-height:1.6; background: rgba(255,255,255,0.03); padding:15px; border-radius:0 12px 12px 12px; border: 1px solid rgba(255,255,255,0.05);\">
                                    {{ msg.message|nl2br }}
                                </div>
                            </div>
                        </div>

                        {% if msg.reponse %}
                            <div style=\"display:flex; gap:15px; padding-left: 40px; animation: modalSlideUp 0.4s ease;\">
                                <div style=\"width:40px; height:40px; border-radius:8px; background: linear-gradient(135deg, var(--primary) 0%, #1e40af 100%); display:flex; align-items:center; justify-content:center; color:white; flex-shrink:0; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);\">
                                    <i class=\"fa-solid fa-user-shield\"></i>
                                </div>
                                <div style=\"flex:1;\">
                                    <div style=\"color:#34d399; font-weight:600; font-size:0.9rem; margin-bottom:6px;\">Réponse du secrétariat</div>
                                    <div style=\"color:white; font-size:0.95rem; line-height:1.6; background: rgba(52, 211, 153, 0.05); padding:15px; border-radius:0 12px 12px 12px; border: 1px solid rgba(52, 211, 153, 0.1); border-left: 3px solid #34d399;\">
                                        {{ msg.reponse|nl2br }}
                                    </div>
                                </div>
                            </div>
                        {% else %}
                            <div style=\"margin-left: 55px; padding: 10px 15px; background: rgba(255,255,255,0.02); border-radius: 8px; display:inline-flex; align-items:center; gap:8px;\">
                                <div class=\"typing-bubble\" style=\"display:flex; gap:3px;\">
                                    <span class=\"dot\" style=\"width:4px; height:4px; background:#64748b; border-radius:50%;\"></span>
                                    <span class=\"dot\" style=\"width:4px; height:4px; background:#64748b; border-radius:50%;\"></span>
                                    <span class=\"dot\" style=\"width:4px; height:4px; background:#64748b; border-radius:50%;\"></span>
                                </div>
                                <span style=\"color:var(--text-muted); font-size:0.8rem; font-weight:500;\">En attente d'une réponse...</span>
                            </div>
                        {% endif %}
                    </div>
                </div>
            {% else %}
                <div class=\"card\" style=\"padding:60px 20px; text-align:center; border: 1px dashed rgba(255,255,255,0.1); background:none;\">
                    <div style=\"width:80px; height:80px; background:rgba(255,255,255,0.02); border-radius:50%; display:flex; align-items:center; justify-content:center; margin: 0 auto 20px; border: 1px solid rgba(255,255,255,0.05);\">
                        <i class=\"fa-regular fa-comments\" style=\"font-size:2rem; color:var(--text-muted);\"></i>
                    </div>
                    <h4 style=\"color:white; font-size:1.2rem; font-weight:700; margin-bottom:10px;\">Aucun ticket</h4>
                    <p style=\"color:var(--text-muted); max-width:400px; margin: 0 auto 25px; font-size:0.9rem;\">
                        Vous n'avez pas encore de demandes en cours. Une question sur votre licence ou un événement ?
                    </p>
                    <a href=\"{{ path('contact') }}\" class=\"btn-event-action\" style=\"background:white; color:black; font-weight:700;\">
                        Contacter le secrétariat
                    </a>
                </div>
            {% endfor %}
        </div>

        <div style=\"margin-top:40px; padding:20px; border-radius:12px; background: rgba(59, 130, 246, 0.05); border: 1px solid rgba(59, 130, 246, 0.1); display: flex; align-items: center; gap: 15px;\">
            <div style=\"width:40px; height:40px; background:rgba(59, 130, 246, 0.1); border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0;\">
                <i class=\"fa-solid fa-bolt\" style=\"color:var(--primary); font-size:1rem;\"></i>
            </div>
            <p style=\"color:var(--text-muted); font-size:0.9rem; margin:0; line-height:1.5;\">
                Une urgence ? Notre chatbot <strong style=\"color:white;\">Elios</strong> est disponible 24h/24 en bas à droite pour répondre à vos questions fréquentes instantanément.
            </p>
        </div>
    </div>
</section>

<section id=\"tab-settings\" class=\"section-view\">

    <div style=\"width: 100%; padding-bottom: 50px;\">
        
<div style=\"margin-bottom: 30px; border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 20px;\">
            <h3 style=\"color:white; margin:0 0 5px 0; font-size:1.2rem;\">Paramètres du compte</h3>
            <p style=\"color:var(--text-muted); font-size:0.95rem; margin:0;\">
                Gérez vos informations, votre sécurité et vos préférences d'accès.
            </p>
        </div>

        <div style=\"display: grid; grid-template-columns: repeat(auto-fit, minmax(450px, 1fr)); gap: 30px; align-items: start;\">
            
            <div class=\"card\" style=\"padding: 0; overflow: hidden; height: 100%;\">
                <div style=\"padding: 25px; border-bottom: 1px solid rgba(255,255,255,0.05); background: rgba(255,255,255,0.01);\">
                    <h4 style=\"color:white; margin:0; font-size:1.1rem; display:flex; align-items:center; gap:12px;\">
                        <div style=\"width:35px; height:35px; background:rgba(59, 130, 246, 0.1); border-radius:10px; display:flex; align-items:center; justify-content:center;\">
                            <i class=\"fa-solid fa-address-card\" style=\"color:var(--primary); font-size:0.9rem;\"></i>
                        </div>
                        Informations personnelles
                    </h4>
                </div>

                <div style=\"padding: 30px; display: flex; flex-direction: column; gap: 30px;\">
                    <div style=\"display:flex; justify-content:space-between; align-items:center;\">
                        <div>
                            <label style=\"display:block; color:var(--text-muted); font-size:0.7rem; text-transform:uppercase; font-weight:800; letter-spacing:1px; margin-bottom:8px;\">Adresse e-mail de connexion</label>
                            <div style=\"color:white; font-weight:600; font-size:1.1rem;\">{{ app.user.email }}</div>
                        </div>
                        <button class=\"btn-contact-top\" style=\"margin:0; background:rgba(255,255,255,0.05);\" onclick=\"toggleEdit('email')\">Modifier</button>
                    </div>

                    <div id=\"form-email\" style=\"display:none; padding:20px; background:rgba(0,0,0,0.2); border-radius:15px; border:1px solid rgba(255,255,255,0.05); animation: modalSlideUp 0.3s ease;\">
                        <input type=\"email\" id=\"input-email\" class=\"search-input\" style=\"width:100%; margin-bottom:15px;\" placeholder=\"Nouvel e-mail\">
                        <div style=\"display:flex; gap:10px; justify-content:flex-end;\">
                            <button class=\"btn-close-flat\" style=\"margin:0;\" onclick=\"toggleEdit('email')\">Annuler</button>
                            <button class=\"btn-event-action\" style=\"background:var(--primary); color:white; width:auto; padding:8px 20px;\" onclick=\"updateProfile('email')\">Enregistrer</button>
                        </div>
                    </div>

                    <div style=\"height:1px; background:linear-gradient(90deg, rgba(255,255,255,0.08) 0%, transparent 100%);\"></div>

                    <div style=\"display:flex; justify-content:space-between; align-items:center;\">
                        <div>
                            <label style=\"display:block; color:var(--text-muted); font-size:0.7rem; text-transform:uppercase; font-weight:800; letter-spacing:1px; margin-bottom:8px;\">Numéro de téléphone</label>
                            <div style=\"color:white; font-weight:600; font-size:1.1rem;\">{{ app.user.phone|default('Non renseigné') }}</div>
                        </div>
                        <button class=\"btn-contact-top\" style=\"margin:0; background:rgba(255,255,255,0.05);\" onclick=\"toggleEdit('phone')\">Modifier</button>
                    </div>

                    <div id=\"form-phone\" style=\"display:none; padding:20px; background:rgba(0,0,0,0.2); border-radius:15px; border:1px solid rgba(255,255,255,0.05); animation: modalSlideUp 0.3s ease;\">
                        <input type=\"text\" id=\"input-phone\" class=\"search-input\" style=\"width:100%; margin-bottom:15px;\" placeholder=\"06 XX XX XX XX\">
                        <div style=\"display:flex; gap:10px; justify-content:flex-end;\">
                            <button class=\"btn-close-flat\" style=\"margin:0;\" onclick=\"toggleEdit('phone')\">Annuler</button>
                            <button class=\"btn-event-action\" style=\"background:var(--primary); color:white; width:auto; padding:8px 20px;\" onclick=\"updateProfile('phone')\">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"card\" style=\"padding: 0; overflow: hidden; height: 100%;\">
                <div style=\"padding: 25px; border-bottom: 1px solid rgba(255,255,255,0.05); background: rgba(255,255,255,0.01);\">
                    <h4 style=\"color:white; margin:0; font-size:1.1rem; display:flex; align-items:center; gap:12px;\">
                        <div style=\"width:35px; height:35px; background:rgba(16, 185, 129, 0.1); border-radius:10px; display:flex; align-items:center; justify-content:center;\">
                            <i class=\"fa-solid fa-shield-halved\" style=\"color:#10b981; font-size:0.9rem;\"></i>
                        </div>
                        Sécurité & Accès
                    </h4>
                </div>

                <div style=\"padding: 30px; display: flex; flex-direction: column; gap: 20px;\">
                    <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 20px;\">
                        <div style=\"background: rgba(255,255,255,0.02); padding: 25px; border-radius: 18px; border: 1px solid rgba(255,255,255,0.03); text-align: center;\">
                            <i class=\"fa-solid fa-key\" style=\"color:var(--primary); font-size:1.5rem; margin-bottom:15px;\"></i>
                            <h5 style=\"color:white; margin:0 0 10px 0;\">Mot de passe</h5>
                            <button class=\"btn-event-action\" style=\"background:var(--primary); color:white; width:100%; border:none;\" onclick=\"toggleEdit('password')\">Changer</button>
                        </div>
                        <div style=\"background: rgba(255,255,255,0.02); padding: 25px; border-radius: 18px; border: 1px solid rgba(255,255,255,0.03); text-align: center;\">
                            <i class=\"fa-solid fa-fingerprint\" style=\"color:#10b981; font-size:1.5rem; margin-bottom:15px;\"></i>
                            <h5 style=\"color:white; margin:0 0 10px 0;\">2FA (A2F)</h5>
                            <button class=\"btn-event-action\" style=\"background:rgba(255,255,255,0.05); color:white; width:100%; border:1px solid rgba(255,255,255,0.1);\" onclick=\"toggleA2F()\">Activer</button>
                        </div>
                    </div>

                    <div id=\"form-password\" style=\"display:none; padding:25px; background:rgba(0,0,0,0.3); border-radius:18px; border:1px solid var(--primary); animation: modalSlideUp 0.3s ease;\">
                        <h5 style=\"color:white; margin-bottom:15px;\">Modification du mot de passe</h5>
                        <div style=\"display:flex; flex-direction:column; gap:12px;\">
                            <input type=\"password\" id=\"old-pass\" class=\"search-input\" placeholder=\"Ancien mot de passe\">
                            <input type=\"password\" id=\"new-pass\" class=\"search-input\" placeholder=\"Nouveau mot de passe\">
                            <div style=\"display:flex; gap:10px; justify-content:flex-end; margin-top:10px;\">
                                <button class=\"btn-close-flat\" onclick=\"toggleEdit('password')\">Annuler</button>
                                <button class=\"btn-event-action\" style=\"background:var(--primary); color:white; width:auto; padding:10px 25px;\" onclick=\"updateProfile('password')\">Confirmer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style=\"margin-top: 40px; padding: 30px; border-radius: 24px; background: linear-gradient(90deg, rgba(239, 68, 68, 0.05) 0%, rgba(239, 68, 68, 0.01) 100%); border: 1px solid rgba(239, 68, 68, 0.15); display: flex; justify-content: space-between; align-items: center; gap: 30px;\">
            <div style=\"display:flex; align-items:center; gap:20px;\">
                <div style=\"width:50px; height:50px; background:rgba(239, 68, 68, 0.1); border-radius:50%; display:flex; align-items:center; justify-content:center;\">
                    <i class=\"fa-solid fa-triangle-exclamation\" style=\"color:#ef4444; font-size:1.2rem;\"></i>
                </div>
                <div>
                    <h4 style=\"color:#f87171; margin:0 0 5px 0; font-weight:800;\">Suppression définitive du compte</h4>
                    <p style=\"color:var(--text-muted); font-size:0.9rem; margin:0;\">Toutes vos données, inscriptions aux événements et factures seront supprimées à jamais.</p>
                </div>
            </div>
            <button onclick=\"confirmDeleteAccount()\" style=\"background: #ef4444; color: white; border: none; padding: 14px 28px; border-radius: 12px; font-weight: 800; cursor: pointer; white-space: nowrap; transition: 0.3s; box-shadow: 0 10px 20px rgba(239, 68, 68, 0.2);\">
                Supprimer mon compte
            </button>
        </div>
    </div>
</section>

            </div>
        </main>
    </div>

    <div id=\"cropperModal\" class=\"cropper-modal-overlay\">
        <div class=\"cropper-container-box\">
            <h3 style=\"color:#fff; margin-bottom:15px;\">Recadrer la photo</h3>
            <div class=\"cropper-image-wrapper\">
                <img id=\"cropperImage\" src=\"\">
            </div>
            <div class=\"cropper-actions\">
                <button id=\"cancelCropBtn\" class=\"icon-btn\" style=\"width:auto; padding:0 15px; border-radius:6px;\">Annuler</button>
                <button id=\"cropAndSaveBtn\" class=\"icon-btn\" style=\"width:auto; padding:0 15px; border-radius:6px; background:white; color:black; border:none;\">Enregistrer</button>
            </div>
        </div>
    </div>

   <div id=\"licenceModal\" class=\"cropper-modal-overlay\">
    <div class=\"modal-content-horizontal\">
        
        <div class=\"modal-side manual-side\">
            <h3>Saisie manuelle</h3>
            <p>J'ai mon numéro de licence</p>
            
            <input type=\"text\" id=\"licenceInputManual\" class=\"licence-field\" placeholder=\"00000000\" maxlength=\"12\">
            
            <button class=\"btn-event-action primary-btn\" onclick=\"saveLicenceManual()\">
                Enregistrer
            </button>
        </div>

        <div class=\"modal-divider\">
            <span class=\"divider-text\">OU</span>
        </div>

        <div class=\"modal-side elios-side\">
            <div class=\"elios-badge\">Assistant IA</div>
            <h3>Récupération</h3>
            <p>Elios retrouve votre numéro en 30s</p>
            
            <div class=\"elios-visual\">
                <img src=\"{{ asset('images/ia.png') }}\" alt=\"IA\">
            </div>

            <button onclick=\"openChatbot('licence')\" class=\"btn-elios-trigger\">
                Lancer l'assistant
            </button>
        </div>

        <button onclick=\"closeLicenceModal()\" class=\"btn-close-absolute\">&times;</button>
    </div>
</div>

    {% include '_shared/_elios_widget.html.twig' %}

<a id=\"assistantWidgetOpen\" class=\"btn-ai-assistant\" title=\"Assistant IA\" 
   style=\"
    position: fixed !important; 
    bottom: 30px !important; 
    right: 30px !important; 
    width: 65px !important; 
    height: 65px !important; 
    z-index: 20000 !important; /* On passe au dessus de tout */
    cursor: pointer !important; 
    display: flex !important; 
    align-items: center !important; 
    justify-content: center !important; 
    background: #0f172a !important;
    border-radius: 50% !important;
    border: 2px solid var(--primary) !important;
    box-shadow: 0 10px 25px rgba(0,0,0,0.5) !important;
    pointer-events: auto !important;
    visibility: visible !important;
    opacity: 1 !important;
   \">
    
    <div style=\"
        position: absolute; 
        width: 100%; 
        height: 100%; 
        border-radius: 50%; 
        background: var(--primary); 
        animation: elios-pulse 2s infinite; 
        z-index: -1;
        opacity: 0.4;
    \"></div>

    <img src=\"{{ asset('images/ia.png') }}\" alt=\"Elios\" 
         style=\"width: 45px; height: 45px; object-fit: contain; position: relative; z-index: 2;\">
</a>

<script src=\"https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js\"></script>

<script src=\"js/dashboard/test-v2.js\"></script>

<script src=\"{{ asset('js/assistant/elios.js') }}\"></script>

</body>
</html>", "dashboard/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/dashboard/index.html.twig");
    }
}
