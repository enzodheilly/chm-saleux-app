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

/* base.html.twig */
class __TwigTemplate_31258a3992ec8fb52e3fa2536520ccb5 extends Template
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
            'title' => [$this, 'block_title'],
            'description' => [$this, 'block_description'],
            'og_title' => [$this, 'block_og_title'],
            'og_description' => [$this, 'block_og_description'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'navbar' => [$this, 'block_navbar'],
            'body' => [$this, 'block_body'],
            'footer' => [$this, 'block_footer'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\" data-theme=\"dark\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

    <title>";
        // line 7
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>

    <meta name=\"description\" content=\"";
        // line 9
        yield from $this->unwrap()->yieldBlock('description', $context, $blocks);
        yield "\">
    <meta name=\"keywords\" content=\"haltérophilie, musculation, Saleux, club sportif, compétition, école, entraînement\">
    <meta name=\"author\" content=\"CHM Saleux\">
    <meta property=\"og:title\" content=\"";
        // line 12
        yield from $this->unwrap()->yieldBlock('og_title', $context, $blocks);
        yield "\">
    <meta property=\"og:description\" content=\"";
        // line 13
        yield from $this->unwrap()->yieldBlock('og_description', $context, $blocks);
        yield "\">
    <meta property=\"og:type\" content=\"website\">
    <meta property=\"og:url\" content=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 15, $this->source); })()), "request", [], "any", false, false, false, 15), "uri", [], "any", false, false, false, 15), "html", null, true);
        yield "\">

    <link rel=\"icon\" type=\"image/png\" href=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/favicon/icon2.png"), "html", null, true);
        yield "\">

    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap\" rel=\"stylesheet\">

    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css\"/>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css\">
    <link rel=\"stylesheet\" href=\"https://unpkg.com/lucide-static/font/lucide.css\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.css\">
    <link href=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css\" rel=\"stylesheet\">

    <link href=\"";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/style.css"), "html", null, true);
        yield "\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/nav/nav.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/footer/footer.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/modal/modal.css"), "html", null, true);
        yield "\">

    ";
        // line 35
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 36
        yield "
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/three.js/r152/three.min.js\" nonce=\"";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Nelmio\SecurityBundle\Twig\CSPRuntime')->getCSPNonce("script"), "html", null, true);
        yield "\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/three@0.152.0/examples/js/loaders/GLTFLoader.js\" nonce=\"";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Nelmio\SecurityBundle\Twig\CSPRuntime')->getCSPNonce("script"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/app.js"), "html", null, true);
        yield "\" nonce=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Nelmio\SecurityBundle\Twig\CSPRuntime')->getCSPNonce("script"), "html", null, true);
        yield "\"></script>
</head>

<body class=\"bg-background text-foreground\" style=\"margin:0; padding:0; width:100%;\">

    ";
        // line 44
        yield from $this->unwrap()->yieldBlock('navbar', $context, $blocks);
        // line 47
        yield "
    ";
        // line 48
        yield from $this->load("menu_dropdown/index.html.twig", 48)->unwrap()->yield($context);
        // line 49
        yield "
    <main style=\"margin:0; padding:0; width:100%;\">
        ";
        // line 51
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 52
        yield "    </main>

    ";
        // line 54
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        // line 57
        yield "
    ";
        // line 58
        yield from $this->load("modal/modal_auth.html.twig", 58)->unwrap()->yield($context);
        // line 59
        yield "    
    <style nonce=\"";
        // line 60
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Nelmio\SecurityBundle\Twig\CSPRuntime')->getCSPNonce("script"), "html", null, true);
        yield "\">
        .toast-mini { position: fixed; right:16px; bottom:16px; background:#111; color:#fff; padding:10px 14px; border-radius:10px; box-shadow:0 6px 20px rgba(0,0,0,0.2); opacity:0; transform:translateY(10px); transition:0.25s; z-index:3000; }
        .toast-mini.show { opacity:1; transform:none; }
    </style>

    <script src=\"https://unpkg.com/lucide@latest/dist/umd/lucide.js\" defer nonce=\"";
        // line 65
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Nelmio\SecurityBundle\Twig\CSPRuntime')->getCSPNonce("script"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/modal/modal.js"), "html", null, true);
        yield "\" defer nonce=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Nelmio\SecurityBundle\Twig\CSPRuntime')->getCSPNonce("script"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/footer/newsletter.js"), "html", null, true);
        yield "\" defer nonce=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Nelmio\SecurityBundle\Twig\CSPRuntime')->getCSPNonce("script"), "html", null, true);
        yield "\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js\" defer nonce=\"";
        // line 68
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Nelmio\SecurityBundle\Twig\CSPRuntime')->getCSPNonce("script"), "html", null, true);
        yield "\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js\" defer nonce=\"";
        // line 69
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Nelmio\SecurityBundle\Twig\CSPRuntime')->getCSPNonce("script"), "html", null, true);
        yield "\"></script>
    <script src=\"https://challenges.cloudflare.com/turnstile/v0/api.js\" async defer nonce=\"";
        // line 70
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Nelmio\SecurityBundle\Twig\CSPRuntime')->getCSPNonce("script"), "html", null, true);
        yield "\"></script>

    <script nonce=\"";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Nelmio\SecurityBundle\Twig\CSPRuntime')->getCSPNonce("script"), "html", null, true);
        yield "\">
        window.showToast = (msg) => {
            const t = document.createElement('div');
            t.className = 'toast-mini';
            t.textContent = msg;
            document.body.appendChild(t);
            requestAnimationFrame(() => t.classList.add('show'));
            setTimeout(() => { t.classList.remove('show'); setTimeout(() => t.remove(), 200); }, 2200);
        };
    </script>

    ";
        // line 83
        if (!CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 83, $this->source); })()), "request", [], "any", false, false, false, 83), "attributes", [], "any", false, false, false, 83), "get", ["_route"], "method", false, false, false, 83), ["app_login", "admin_dashboard"])) {
            // line 84
            yield "        ";
            yield from $this->load("_shared/_elios_widget.html.twig", 84)->unwrap()->yield($context);
            // line 85
            yield "        <link rel=\"stylesheet\" href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/assistant/elios.css"), "html", null, true);
            yield "\">
        <script src=\"";
            // line 86
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/assistant/elios.js"), "html", null, true);
            yield "\" defer nonce=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Nelmio\SecurityBundle\Twig\CSPRuntime')->getCSPNonce("script"), "html", null, true);
            yield "\"></script>
    ";
        }
        // line 88
        yield "
    ";
        // line 90
        yield "    ";
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 91
        yield "    
</body>
</html>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "CHM Saleux - Club d'Haltérophilie et de Musculation";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_description(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "description"));

        yield "Club d'Haltérophilie et de Musculation de Saleux. École d'haltérophilie, formations tous niveaux, compétitions. Plus de 25 ans d'expérience.";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 12
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_og_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "og_title"));

        yield "CHM Saleux - Club d'Haltérophilie et de Musculation";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 13
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_og_description(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "og_description"));

        yield "Rejoignez le CHM Saleux, club d'excellence en haltérophilie et musculation. École reconnue, entraîneurs diplômés, 25 ans d'expérience.";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 35
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 44
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_navbar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "navbar"));

        // line 45
        yield "        ";
        yield from $this->load("/navbar/navigation.html.twig", 45)->unwrap()->yield($context);
        // line 46
        yield "    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 51
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 54
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        // line 55
        yield "        ";
        yield from $this->load("/footer/footer.html.twig", 55)->unwrap()->yield($context);
        // line 56
        yield "    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 90
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
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
        return array (  396 => 90,  388 => 56,  385 => 55,  375 => 54,  359 => 51,  351 => 46,  348 => 45,  338 => 44,  322 => 35,  305 => 13,  288 => 12,  271 => 9,  254 => 7,  244 => 91,  241 => 90,  238 => 88,  231 => 86,  226 => 85,  223 => 84,  221 => 83,  207 => 72,  202 => 70,  198 => 69,  194 => 68,  188 => 67,  182 => 66,  178 => 65,  170 => 60,  167 => 59,  165 => 58,  162 => 57,  160 => 54,  156 => 52,  154 => 51,  150 => 49,  148 => 48,  145 => 47,  143 => 44,  133 => 39,  129 => 38,  125 => 37,  122 => 36,  120 => 35,  115 => 33,  111 => 32,  107 => 31,  103 => 30,  87 => 17,  82 => 15,  77 => 13,  73 => 12,  67 => 9,  62 => 7,  54 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\" data-theme=\"dark\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

    <title>{% block title %}CHM Saleux - Club d'Haltérophilie et de Musculation{% endblock %}</title>

    <meta name=\"description\" content=\"{% block description %}Club d'Haltérophilie et de Musculation de Saleux. École d'haltérophilie, formations tous niveaux, compétitions. Plus de 25 ans d'expérience.{% endblock %}\">
    <meta name=\"keywords\" content=\"haltérophilie, musculation, Saleux, club sportif, compétition, école, entraînement\">
    <meta name=\"author\" content=\"CHM Saleux\">
    <meta property=\"og:title\" content=\"{% block og_title %}CHM Saleux - Club d'Haltérophilie et de Musculation{% endblock %}\">
    <meta property=\"og:description\" content=\"{% block og_description %}Rejoignez le CHM Saleux, club d'excellence en haltérophilie et musculation. École reconnue, entraîneurs diplômés, 25 ans d'expérience.{% endblock %}\">
    <meta property=\"og:type\" content=\"website\">
    <meta property=\"og:url\" content=\"{{ app.request.uri }}\">

    <link rel=\"icon\" type=\"image/png\" href=\"{{ asset('images/favicon/icon2.png') }}\">

    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap\" rel=\"stylesheet\">

    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css\"/>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css\">
    <link rel=\"stylesheet\" href=\"https://unpkg.com/lucide-static/font/lucide.css\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.css\">
    <link href=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css\" rel=\"stylesheet\">

    <link href=\"{{ asset('css/style.css') }}\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/nav/nav.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/footer/footer.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/modal/modal.css') }}\">

    {% block stylesheets %}{% endblock %}

    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/three.js/r152/three.min.js\" nonce=\"{{ csp_nonce('script') }}\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/three@0.152.0/examples/js/loaders/GLTFLoader.js\" nonce=\"{{ csp_nonce('script') }}\"></script>
    <script src=\"{{ asset('js/app.js') }}\" nonce=\"{{ csp_nonce('script') }}\"></script>
</head>

<body class=\"bg-background text-foreground\" style=\"margin:0; padding:0; width:100%;\">

    {% block navbar %}
        {% include '/navbar/navigation.html.twig' %}
    {% endblock %}

    {% include 'menu_dropdown/index.html.twig' %}

    <main style=\"margin:0; padding:0; width:100%;\">
        {% block body %}{% endblock %}
    </main>

    {% block footer %}
        {% include '/footer/footer.html.twig' %}
    {% endblock %}

    {% include 'modal/modal_auth.html.twig' %}
    
    <style nonce=\"{{ csp_nonce('script') }}\">
        .toast-mini { position: fixed; right:16px; bottom:16px; background:#111; color:#fff; padding:10px 14px; border-radius:10px; box-shadow:0 6px 20px rgba(0,0,0,0.2); opacity:0; transform:translateY(10px); transition:0.25s; z-index:3000; }
        .toast-mini.show { opacity:1; transform:none; }
    </style>

    <script src=\"https://unpkg.com/lucide@latest/dist/umd/lucide.js\" defer nonce=\"{{ csp_nonce('script') }}\"></script>
    <script src=\"{{ asset('js/modal/modal.js') }}\" defer nonce=\"{{ csp_nonce('script') }}\"></script>
    <script src=\"{{ asset('js/footer/newsletter.js') }}\" defer nonce=\"{{ csp_nonce('script') }}\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js\" defer nonce=\"{{ csp_nonce('script') }}\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js\" defer nonce=\"{{ csp_nonce('script') }}\"></script>
    <script src=\"https://challenges.cloudflare.com/turnstile/v0/api.js\" async defer nonce=\"{{ csp_nonce('script') }}\"></script>

    <script nonce=\"{{ csp_nonce('script') }}\">
        window.showToast = (msg) => {
            const t = document.createElement('div');
            t.className = 'toast-mini';
            t.textContent = msg;
            document.body.appendChild(t);
            requestAnimationFrame(() => t.classList.add('show'));
            setTimeout(() => { t.classList.remove('show'); setTimeout(() => t.remove(), 200); }, 2200);
        };
    </script>

    {% if app.request.attributes.get('_route') not in ['app_login', 'admin_dashboard'] %}
        {% include '_shared/_elios_widget.html.twig' %}
        <link rel=\"stylesheet\" href=\"{{ asset('css/assistant/elios.css') }}\">
        <script src=\"{{ asset('js/assistant/elios.js') }}\" defer nonce=\"{{ csp_nonce('script') }}\"></script>
    {% endif %}

    {# BLOC UNIQUE POUR PAGES SPÉCIFIQUES #}
    {% block javascripts %}{% endblock %}
    
</body>
</html>", "base.html.twig", "/Users/dheillyenzo/projet-chm/templates/base.html.twig");
    }
}
