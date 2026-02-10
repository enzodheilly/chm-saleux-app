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

/* dashboard/user_profile.html.twig */
class __TwigTemplate_158a2455b8a481361f99b4022ebc5a26 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/user_profile.html.twig"));

        // line 1
        yield "<div class=\"user-header\">

    <video class=\"bg-video\" autoplay muted loop playsinline>
        <source src=\"/videos/background.mp4\" type=\"video/mp4\">
        Votre navigateur ne supporte pas la vidéo.
    </video>

    <div class=\"user-info\" style=\"display:flex; align-items:center; gap:12px;\">

        <form id=\"avatar-upload-form\" enctype=\"multipart/form-data\" method=\"POST\" action=\"";
        // line 10
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("profile_photo");
        yield "\">
            <input type=\"file\" id=\"avatar-file-input\" name=\"profileImage\" accept=\"image/png, image/jpeg\" style=\"display:none;\">
        </form>

        ";
        // line 14
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "user", [], "any", false, false, false, 14), "profileImageDataUrl", [], "any", false, false, false, 14)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 15
            yield "            <img 
                id=\"user-avatar-img\"
                src=\"";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 17, $this->source); })()), "user", [], "any", false, false, false, 17), "profileImageDataUrl", [], "any", false, false, false, 17), "html", null, true);
            yield "\"
                alt=\"Photo de profil de ";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 18, $this->source); })()), "user", [], "any", false, false, false, 18), "firstName", [], "any", false, false, false, 18), "html", null, true);
            yield "\"
                title=\"Cliquer pour changer la photo\"
            >
        ";
        } else {
            // line 22
            yield "     <img 
    id=\"user-avatar-img\"
    src=\"/images/default-avatar.png\"
    alt=\"Avatar par défaut\"
    title=\"Avatar par défaut\"
/>

        ";
        }
        // line 30
        yield "
        <!-- ✅ Conteneur vertical pour h2 + p -->
        <div class=\"user-text\" style=\"display:flex; flex-direction:column; line-height:1.2;\">
            <h2 style=\"margin:0;\">Bonjour ";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 33, $this->source); })()), "user", [], "any", false, false, false, 33), "firstName", [], "any", false, false, false, 33), "html", null, true);
        yield " !</h2>
            <p style=\"margin:2px 0 0;color:#e0e0e0;\">Membre du club depuis 2022</p>
        </div>
    </div>
</div>


<!-- Modal Cropper -->
<div id=\"cropperModal\" style=\"display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.7); justify-content:center; align-items:center; z-index:10000;\">
    <div style=\"background:#fff; padding:20px; border-radius:10px; max-width:90%; max-height:90%; display:flex; flex-direction:column; align-items:center;\">
        <img id=\"cropperImage\" src=\"\" style=\"max-width:100%; max-height:70vh;\">
        <div style=\"margin-top:10px;\">
            <button id=\"cropButton\" style=\"margin-right:10px;\">Valider</button>
            <button id=\"cancelCropButton\">Annuler</button>
        </div>
    </div>
</div>

<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.css\">
<script src=\"https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.js\" defer></script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "dashboard/user_profile.html.twig";
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
        return array (  95 => 33,  90 => 30,  80 => 22,  73 => 18,  69 => 17,  65 => 15,  63 => 14,  56 => 10,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"user-header\">

    <video class=\"bg-video\" autoplay muted loop playsinline>
        <source src=\"/videos/background.mp4\" type=\"video/mp4\">
        Votre navigateur ne supporte pas la vidéo.
    </video>

    <div class=\"user-info\" style=\"display:flex; align-items:center; gap:12px;\">

        <form id=\"avatar-upload-form\" enctype=\"multipart/form-data\" method=\"POST\" action=\"{{ path('profile_photo') }}\">
            <input type=\"file\" id=\"avatar-file-input\" name=\"profileImage\" accept=\"image/png, image/jpeg\" style=\"display:none;\">
        </form>

        {% if app.user.profileImageDataUrl %}
            <img 
                id=\"user-avatar-img\"
                src=\"{{ app.user.profileImageDataUrl }}\"
                alt=\"Photo de profil de {{ app.user.firstName }}\"
                title=\"Cliquer pour changer la photo\"
            >
        {% else %}
     <img 
    id=\"user-avatar-img\"
    src=\"/images/default-avatar.png\"
    alt=\"Avatar par défaut\"
    title=\"Avatar par défaut\"
/>

        {% endif %}

        <!-- ✅ Conteneur vertical pour h2 + p -->
        <div class=\"user-text\" style=\"display:flex; flex-direction:column; line-height:1.2;\">
            <h2 style=\"margin:0;\">Bonjour {{ app.user.firstName }} !</h2>
            <p style=\"margin:2px 0 0;color:#e0e0e0;\">Membre du club depuis 2022</p>
        </div>
    </div>
</div>


<!-- Modal Cropper -->
<div id=\"cropperModal\" style=\"display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.7); justify-content:center; align-items:center; z-index:10000;\">
    <div style=\"background:#fff; padding:20px; border-radius:10px; max-width:90%; max-height:90%; display:flex; flex-direction:column; align-items:center;\">
        <img id=\"cropperImage\" src=\"\" style=\"max-width:100%; max-height:70vh;\">
        <div style=\"margin-top:10px;\">
            <button id=\"cropButton\" style=\"margin-right:10px;\">Valider</button>
            <button id=\"cancelCropButton\">Annuler</button>
        </div>
    </div>
</div>

<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.css\">
<script src=\"https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.js\" defer></script>
", "dashboard/user_profile.html.twig", "/Users/dheillyenzo/projet-chm/templates/dashboard/user_profile.html.twig");
    }
}
