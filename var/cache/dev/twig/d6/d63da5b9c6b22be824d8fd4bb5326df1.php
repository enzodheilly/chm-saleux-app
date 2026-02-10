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

/* 1_accueil/section2/paiement/not_connected.html.twig */
class __TwigTemplate_e609a0eb11e2486b61ac2bcc433bb027 extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "1_accueil/section2/paiement/not_connected.html.twig"));

        // line 1
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 133
        yield "
";
        // line 134
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 1
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 2
        yield "\t<style>
\t\tbody {
\t\t\tfont-family: 'Poppins', sans-serif;
\t\t\tbackground: white;
\t\t\tcolor: #333;
\t\t\tmargin: 0;
\t\t\tmin-height: 100vh;
\t\t\tdisplay: flex;
\t\t\tjustify-content: center;
\t\t\talign-items: center;
\t\t\tposition: relative;
\t\t}
\t\t.header-logo {
\t\t\tposition: absolute;
\t\t\ttop: 15px;
\t\t\tleft: 25px;
\t\t}
\t\t.header-logo img {
\t\t\theight: 50px;
\t\t\twidth: auto;
\t\t}
\t\t.login-container {
\t\t\tbackground: #fff;
\t\t\tborder-radius: 14px;
\t\t\tpadding: 1.8rem 1.6rem;
\t\t\twidth: 100%;
\t\t\tmax-width: 340px;
\t\t\tbox-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
\t\t\ttext-align: center;
\t\t\tmargin-top: 2rem;
\t\t\tanimation: fadeIn 0.5s ease;
\t\t}
\t\t.login-container h1 {
\t\t\tcolor: #003366;
\t\t\tfont-size: 1.4rem;
\t\t\tmargin-bottom: 0.5rem;
\t\t}
\t\t.login-container p {
\t\t\tcolor: #666;
\t\t\tfont-size: 0.85rem;
\t\t\tmargin-bottom: 1.3rem;
\t\t\tline-height: 1.5;
\t\t}
\t\t.action-buttons {
\t\t\tdisplay: flex;
\t\t\tflex-direction: column;
\t\t\talign-items: center;
\t\t\tgap: 0.8rem;
\t\t\tmargin-top: 1rem;
\t\t}
\t\t.action-buttons a {
\t\t\tdisplay: inline-block;
\t\t\twidth: 75%;
\t\t\tpadding: 0.7rem;
\t\t\tborder-radius: 8px;
\t\t\tfont-weight: 600;
\t\t\tfont-size: 0.9rem;
\t\t\ttext-decoration: none;
\t\t\ttransition: all 0.3s ease;
\t\t}
\t\t.action-buttons a.login-btn {
\t\t\tbackground: #ff6600;
\t\t\tcolor: #fff;
\t\t}
\t\t.action-buttons a.login-btn:hover {
\t\t\ttransform: translateY(-2px);
\t\t\tbox-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
\t\t}
\t\t.action-buttons a.register-btn {
\t\t\tborder: 1.3px solid #ff6600;
\t\t\tcolor: #ff6600;
\t\t\tbackground: #fff;
\t\t}
\t\t.action-buttons a.register-btn:hover {
\t\t\tbackground: #ff6600;
\t\t\tcolor: #fff;
\t\t\ttransform: translateY(-2px);
\t\t\tbox-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
\t\t}
\t\t.note {
\t\t\tfont-size: 0.75rem;
\t\t\tcolor: #555;
\t\t\tmargin-top: 1.2rem;
\t\t}
\t\t#loading-spinner {
\t\t\tdisplay: none;
\t\t\tposition: fixed;
\t\t\ttop: 0;
\t\t\tleft: 0;
\t\t\twidth: 100%;
\t\t\theight: 100%;
\t\t\tbackground: rgba(255, 255, 255, 0.85);
\t\t\tz-index: 9999;
\t\t\tjustify-content: center;
\t\t\talign-items: center;
\t\t\tflex-direction: column;
\t\t}
\t\t.spinner {
\t\t\tborder: 5px solid #f3f3f3;
\t\t\tborder-top: 5px solid #ff6600;
\t\t\tborder-radius: 50%;
\t\t\twidth: 60px;
\t\t\theight: 60px;
\t\t\tanimation: spin 0.9s linear infinite;
\t\t}
\t\t.spinner-text {
\t\t\tmargin-top: 1rem;
\t\t\tfont-weight: 500;
\t\t\tcolor: #003366;
\t\t\tfont-size: 0.95rem;
\t\t}
\t\t@keyframes spin {
\t\t\tfrom {
\t\t\t\ttransform: rotate(0)
\t\t\t}
\t\t\tto {
\t\t\t\ttransform: rotate(360deg)
\t\t\t}
\t\t}
\t\t@keyframes fadeIn {
\t\t\tfrom {
\t\t\t\topacity: 0;
\t\t\t\ttransform: translateY(10px)
\t\t\t}
\t\t\tto {
\t\t\t\topacity: 1;
\t\t\t\ttransform: translateY(0)
\t\t\t}
\t\t}
\t</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 134
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 135
        yield "\t<div class=\"header-logo\">
\t\t<img src=\"";
        // line 136
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo-chm.png"), "html", null, true);
        yield "\" alt=\"CHM Saleux Logo\">
\t</div>

\t<div class=\"login-container\">
\t\t<h1>🔒 Connexion requise</h1>
\t\t<p>
\t\t\tAfin de pouvoir
\t\t\t<strong>finaliser votre paiement pour la formule
\t\t\t\t";
        // line 144
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 144, $this->source); })()), "html", null, true);
        yield "</strong>, 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\til est nécessaire de vous connecter à votre compte ou d’en créer un nouveau.
\t\t</p>

\t\t<div class=\"action-buttons\">
\t\t\t<a href=\"";
        // line 149
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login", ["redirect" => (isset($context["redirectUrl"]) || array_key_exists("redirectUrl", $context) ? $context["redirectUrl"] : (function () { throw new RuntimeError('Variable "redirectUrl" does not exist.', 149, $this->source); })())]), "html", null, true);
        yield "\" class=\"login-btn\" id=\"loginLink\">
\t\t\t\t🔐 Me connecter
\t\t\t</a>

\t\t\t<a href=\"";
        // line 153
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register", ["redirect" => (isset($context["redirectUrl"]) || array_key_exists("redirectUrl", $context) ? $context["redirectUrl"] : (function () { throw new RuntimeError('Variable "redirectUrl" does not exist.', 153, $this->source); })())]), "html", null, true);
        yield "\" class=\"register-btn\" id=\"registerLink\">
\t\t\t\t🆕 Créer un compte
\t\t\t</a>
\t\t</div>


\t\t<p class=\"note\">Une fois connecté, vous serez automatiquement redirigé vers la page de paiement.</p>
\t</div>

\t<div id=\"loading-spinner\">
\t\t<div class=\"spinner\"></div>
\t\t<div class=\"spinner-text\">Chargement...</div>
\t</div>

\t <script>
\t\t\t\t\t\t\t\t\t\tconst spinner = document.getElementById(\"loading-spinner\");
\t\t\t\t\t\t\t\t\t\tconst loginLink = document.getElementById(\"loginLink\");
\t\t\t\t\t\t\t\t\t\tconst registerLink = document.getElementById(\"registerLink\");
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\tloginLink.addEventListener(\"click\", () => spinner.style.display = \"flex\");
\t\t\t\t\t\t\t\t\t\tregisterLink.addEventListener(\"click\", () => spinner.style.display = \"flex\");
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\twindow.addEventListener(\"pageshow\", (e) => { if (e.persisted) spinner.style.display = \"none\"; });
\t\t\t\t\t\t\t\t\t\twindow.addEventListener(\"load\", () => spinner.style.display = \"none\");
\t\t\t\t\t\t\t\t\t</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "1_accueil/section2/paiement/not_connected.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  247 => 153,  240 => 149,  232 => 144,  221 => 136,  218 => 135,  208 => 134,  70 => 2,  60 => 1,  52 => 134,  49 => 133,  47 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% block stylesheets %}
\t<style>
\t\tbody {
\t\t\tfont-family: 'Poppins', sans-serif;
\t\t\tbackground: white;
\t\t\tcolor: #333;
\t\t\tmargin: 0;
\t\t\tmin-height: 100vh;
\t\t\tdisplay: flex;
\t\t\tjustify-content: center;
\t\t\talign-items: center;
\t\t\tposition: relative;
\t\t}
\t\t.header-logo {
\t\t\tposition: absolute;
\t\t\ttop: 15px;
\t\t\tleft: 25px;
\t\t}
\t\t.header-logo img {
\t\t\theight: 50px;
\t\t\twidth: auto;
\t\t}
\t\t.login-container {
\t\t\tbackground: #fff;
\t\t\tborder-radius: 14px;
\t\t\tpadding: 1.8rem 1.6rem;
\t\t\twidth: 100%;
\t\t\tmax-width: 340px;
\t\t\tbox-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
\t\t\ttext-align: center;
\t\t\tmargin-top: 2rem;
\t\t\tanimation: fadeIn 0.5s ease;
\t\t}
\t\t.login-container h1 {
\t\t\tcolor: #003366;
\t\t\tfont-size: 1.4rem;
\t\t\tmargin-bottom: 0.5rem;
\t\t}
\t\t.login-container p {
\t\t\tcolor: #666;
\t\t\tfont-size: 0.85rem;
\t\t\tmargin-bottom: 1.3rem;
\t\t\tline-height: 1.5;
\t\t}
\t\t.action-buttons {
\t\t\tdisplay: flex;
\t\t\tflex-direction: column;
\t\t\talign-items: center;
\t\t\tgap: 0.8rem;
\t\t\tmargin-top: 1rem;
\t\t}
\t\t.action-buttons a {
\t\t\tdisplay: inline-block;
\t\t\twidth: 75%;
\t\t\tpadding: 0.7rem;
\t\t\tborder-radius: 8px;
\t\t\tfont-weight: 600;
\t\t\tfont-size: 0.9rem;
\t\t\ttext-decoration: none;
\t\t\ttransition: all 0.3s ease;
\t\t}
\t\t.action-buttons a.login-btn {
\t\t\tbackground: #ff6600;
\t\t\tcolor: #fff;
\t\t}
\t\t.action-buttons a.login-btn:hover {
\t\t\ttransform: translateY(-2px);
\t\t\tbox-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
\t\t}
\t\t.action-buttons a.register-btn {
\t\t\tborder: 1.3px solid #ff6600;
\t\t\tcolor: #ff6600;
\t\t\tbackground: #fff;
\t\t}
\t\t.action-buttons a.register-btn:hover {
\t\t\tbackground: #ff6600;
\t\t\tcolor: #fff;
\t\t\ttransform: translateY(-2px);
\t\t\tbox-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
\t\t}
\t\t.note {
\t\t\tfont-size: 0.75rem;
\t\t\tcolor: #555;
\t\t\tmargin-top: 1.2rem;
\t\t}
\t\t#loading-spinner {
\t\t\tdisplay: none;
\t\t\tposition: fixed;
\t\t\ttop: 0;
\t\t\tleft: 0;
\t\t\twidth: 100%;
\t\t\theight: 100%;
\t\t\tbackground: rgba(255, 255, 255, 0.85);
\t\t\tz-index: 9999;
\t\t\tjustify-content: center;
\t\t\talign-items: center;
\t\t\tflex-direction: column;
\t\t}
\t\t.spinner {
\t\t\tborder: 5px solid #f3f3f3;
\t\t\tborder-top: 5px solid #ff6600;
\t\t\tborder-radius: 50%;
\t\t\twidth: 60px;
\t\t\theight: 60px;
\t\t\tanimation: spin 0.9s linear infinite;
\t\t}
\t\t.spinner-text {
\t\t\tmargin-top: 1rem;
\t\t\tfont-weight: 500;
\t\t\tcolor: #003366;
\t\t\tfont-size: 0.95rem;
\t\t}
\t\t@keyframes spin {
\t\t\tfrom {
\t\t\t\ttransform: rotate(0)
\t\t\t}
\t\t\tto {
\t\t\t\ttransform: rotate(360deg)
\t\t\t}
\t\t}
\t\t@keyframes fadeIn {
\t\t\tfrom {
\t\t\t\topacity: 0;
\t\t\t\ttransform: translateY(10px)
\t\t\t}
\t\t\tto {
\t\t\t\topacity: 1;
\t\t\t\ttransform: translateY(0)
\t\t\t}
\t\t}
\t</style>
{% endblock %}

{% block body %}
\t<div class=\"header-logo\">
\t\t<img src=\"{{ asset('images/logo-chm.png') }}\" alt=\"CHM Saleux Logo\">
\t</div>

\t<div class=\"login-container\">
\t\t<h1>🔒 Connexion requise</h1>
\t\t<p>
\t\t\tAfin de pouvoir
\t\t\t<strong>finaliser votre paiement pour la formule
\t\t\t\t{{ type }}</strong>, 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\til est nécessaire de vous connecter à votre compte ou d’en créer un nouveau.
\t\t</p>

\t\t<div class=\"action-buttons\">
\t\t\t<a href=\"{{ path('app_login', { redirect: redirectUrl }) }}\" class=\"login-btn\" id=\"loginLink\">
\t\t\t\t🔐 Me connecter
\t\t\t</a>

\t\t\t<a href=\"{{ path('app_register', { redirect: redirectUrl }) }}\" class=\"register-btn\" id=\"registerLink\">
\t\t\t\t🆕 Créer un compte
\t\t\t</a>
\t\t</div>


\t\t<p class=\"note\">Une fois connecté, vous serez automatiquement redirigé vers la page de paiement.</p>
\t</div>

\t<div id=\"loading-spinner\">
\t\t<div class=\"spinner\"></div>
\t\t<div class=\"spinner-text\">Chargement...</div>
\t</div>

\t <script>
\t\t\t\t\t\t\t\t\t\tconst spinner = document.getElementById(\"loading-spinner\");
\t\t\t\t\t\t\t\t\t\tconst loginLink = document.getElementById(\"loginLink\");
\t\t\t\t\t\t\t\t\t\tconst registerLink = document.getElementById(\"registerLink\");
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\tloginLink.addEventListener(\"click\", () => spinner.style.display = \"flex\");
\t\t\t\t\t\t\t\t\t\tregisterLink.addEventListener(\"click\", () => spinner.style.display = \"flex\");
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\twindow.addEventListener(\"pageshow\", (e) => { if (e.persisted) spinner.style.display = \"none\"; });
\t\t\t\t\t\t\t\t\t\twindow.addEventListener(\"load\", () => spinner.style.display = \"none\");
\t\t\t\t\t\t\t\t\t</script>
{% endblock %}
", "1_accueil/section2/paiement/not_connected.html.twig", "/Users/dheillyenzo/projet-chm/templates/1_accueil/section2/paiement/not_connected.html.twig");
    }
}
