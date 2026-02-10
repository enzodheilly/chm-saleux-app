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

/* admin/security/setup_2fa.html.twig */
class __TwigTemplate_de2f57a785a6623c08b0b1c69f65275a extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "admin/base_admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/security/setup_2fa.html.twig"));

        $this->parent = $this->load("admin/base_admin.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Sécurisation du Compte";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "<style>
    /* 🛑 ON CACHE TOUT LE RESTE DU SITE (Sidebar, Header, etc.) */
    .sidebar, .dashboard-header, nav, header, footer { display: none !important; }
    
    /* Layout Plein Écran */
    .setup-container {
        position: fixed; top: 0; left: 0; width: 100%; height: 100vh;
        background: #1a1d21; color: #fff;
        display: flex; justify-content: center; align-items: center;
        z-index: 99999; /* Au-dessus de tout */
    }

    .setup-card {
        background: #2a2f37;
        width: 100%; max-width: 900px;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.5);
        display: grid; grid-template-columns: 1fr 1fr;
        overflow: hidden; border: 1px solid #3d424b;
    }

    /* Partie Gauche : Instructions */
    .setup-info {
        padding: 40px; 
        background: linear-gradient(135deg, rgba(255, 102, 0, 0.1) 0%, rgba(255, 102, 0, 0) 100%);
        border-right: 1px solid #3d424b;
    }
    .setup-info h1 { color: var(--accent, #ff6600); font-size: 1.8rem; margin-bottom: 20px; }
    
    .step-item { display: flex; gap: 15px; margin-bottom: 25px; }
    .step-number {
        width: 32px; height: 32px; background: var(--accent, #ff6600); color: white;
        border-radius: 50%; display: flex; align-items: center; justify-content: center;
        font-weight: bold; flex-shrink: 0;
    }
    .step-text h4 { margin: 0 0 5px 0; color: #fff; font-size: 1rem; }
    .step-text p { margin: 0; font-size: 0.9rem; color: #a0a0a0; line-height: 1.4; }

    /* Partie Droite : Action */
    .setup-action { 
        padding: 40px; 
        display: flex; flex-direction: column; align-items: center; justify-content: center; 
        text-align: center; 
    }
    .qr-box {
        background: white; padding: 15px; border-radius: 12px; margin-bottom: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    }
    
    input.code-input {
        background: #1a1d21; border: 2px solid #3d424b; color: white;
        font-size: 24px; letter-spacing: 8px; text-align: center;
        width: 200px; padding: 12px; border-radius: 8px; margin-bottom: 20px;
        transition: border-color 0.3s;
    }
    input.code-input:focus { border-color: var(--accent, #ff6600); outline: none; }
    
    .btn-validate {
        background: var(--accent, #ff6600); color: white; border: none;
        padding: 12px 30px; border-radius: 6px; font-weight: bold; font-size: 1rem;
        cursor: pointer; transition: transform 0.2s; width: 100%;
    }
    .btn-validate:hover { transform: translateY(-2px); filter: brightness(1.1); }

    /* Mobile : On empile tout verticalement */
    @media(max-width: 800px) {
        .setup-card { grid-template-columns: 1fr; max-width: 400px; margin: 20px; }
        .setup-info { border-right: none; border-bottom: 1px solid #3d424b; padding: 30px; }
    }
</style>

<div class=\"setup-container\">
    <div class=\"setup-card\">
        
        ";
        // line 81
        yield "        <div class=\"setup-info\">
            <h1>Sécurisez votre accès</h1>
            <p style=\"color: #ccc; margin-bottom: 30px;\">L'accès administrateur requiert une double authentification. Cela prend moins d'une minute.</p>
            
            <div class=\"step-item\">
                <div class=\"step-number\">1</div>
                <div class=\"step-text\">
                    <h4>Téléchargez l'application</h4>
                    <p>Installez <strong>Google Authenticator</strong> (ou Microsoft Auth) sur votre mobile.</p>
                </div>
            </div>

            <div class=\"step-item\">
                <div class=\"step-number\">2</div>
                <div class=\"step-text\">
                    <h4>Scannez le QR Code</h4>
                    <p>Ouvrez l'appli, appuyez sur \"+\" et scannez le code ci-contre.</p>
                </div>
            </div>

            <div class=\"step-item\">
                <div class=\"step-number\">3</div>
                <div class=\"step-text\">
                    <h4>Validez</h4>
                    <p>Entrez le code à 6 chiffres généré par l'application pour activer votre compte.</p>
                </div>
            </div>
        </div>

        ";
        // line 111
        yield "        <div class=\"setup-action\">
            ";
        // line 112
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 112, $this->source); })()), "flashes", ["danger"], "method", false, false, false, 112));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 113
            yield "                <div style=\"background: rgba(239, 68, 68, 0.2); color: #ef4444; padding: 10px; border-radius: 6px; margin-bottom: 20px; width: 100%;\">
                    ⚠️ ";
            // line 114
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 117
        yield "
            <div class=\"qr-box\">
                <img src=\"";
        // line 119
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Endroid\QrCodeBundle\Twig\QrCodeRuntime')->qrCodeDataUriFunction((isset($context["qrCodeContent"]) || array_key_exists("qrCodeContent", $context) ? $context["qrCodeContent"] : (function () { throw new RuntimeError('Variable "qrCodeContent" does not exist.', 119, $this->source); })())), "html", null, true);
        yield "\" alt=\"QR Code 2FA\" width=\"180\" height=\"180\">
            </div>

            <form method=\"POST\">
                <label style=\"display: block; color: #888; margin-bottom: 10px; font-size: 0.9rem;\">Code à 6 chiffres</label>
                <input type=\"text\" name=\"auth_code\" class=\"code-input\" placeholder=\"000 000\" autocomplete=\"off\" autofocus required>
                
                <button type=\"submit\" class=\"btn-validate\">Activer et Entrer</button>
            </form>
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
        return "admin/security/setup_2fa.html.twig";
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
        return array (  215 => 119,  211 => 117,  202 => 114,  199 => 113,  195 => 112,  192 => 111,  161 => 81,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Sécurisation du Compte{% endblock %}

{% block body %}
<style>
    /* 🛑 ON CACHE TOUT LE RESTE DU SITE (Sidebar, Header, etc.) */
    .sidebar, .dashboard-header, nav, header, footer { display: none !important; }
    
    /* Layout Plein Écran */
    .setup-container {
        position: fixed; top: 0; left: 0; width: 100%; height: 100vh;
        background: #1a1d21; color: #fff;
        display: flex; justify-content: center; align-items: center;
        z-index: 99999; /* Au-dessus de tout */
    }

    .setup-card {
        background: #2a2f37;
        width: 100%; max-width: 900px;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.5);
        display: grid; grid-template-columns: 1fr 1fr;
        overflow: hidden; border: 1px solid #3d424b;
    }

    /* Partie Gauche : Instructions */
    .setup-info {
        padding: 40px; 
        background: linear-gradient(135deg, rgba(255, 102, 0, 0.1) 0%, rgba(255, 102, 0, 0) 100%);
        border-right: 1px solid #3d424b;
    }
    .setup-info h1 { color: var(--accent, #ff6600); font-size: 1.8rem; margin-bottom: 20px; }
    
    .step-item { display: flex; gap: 15px; margin-bottom: 25px; }
    .step-number {
        width: 32px; height: 32px; background: var(--accent, #ff6600); color: white;
        border-radius: 50%; display: flex; align-items: center; justify-content: center;
        font-weight: bold; flex-shrink: 0;
    }
    .step-text h4 { margin: 0 0 5px 0; color: #fff; font-size: 1rem; }
    .step-text p { margin: 0; font-size: 0.9rem; color: #a0a0a0; line-height: 1.4; }

    /* Partie Droite : Action */
    .setup-action { 
        padding: 40px; 
        display: flex; flex-direction: column; align-items: center; justify-content: center; 
        text-align: center; 
    }
    .qr-box {
        background: white; padding: 15px; border-radius: 12px; margin-bottom: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    }
    
    input.code-input {
        background: #1a1d21; border: 2px solid #3d424b; color: white;
        font-size: 24px; letter-spacing: 8px; text-align: center;
        width: 200px; padding: 12px; border-radius: 8px; margin-bottom: 20px;
        transition: border-color 0.3s;
    }
    input.code-input:focus { border-color: var(--accent, #ff6600); outline: none; }
    
    .btn-validate {
        background: var(--accent, #ff6600); color: white; border: none;
        padding: 12px 30px; border-radius: 6px; font-weight: bold; font-size: 1rem;
        cursor: pointer; transition: transform 0.2s; width: 100%;
    }
    .btn-validate:hover { transform: translateY(-2px); filter: brightness(1.1); }

    /* Mobile : On empile tout verticalement */
    @media(max-width: 800px) {
        .setup-card { grid-template-columns: 1fr; max-width: 400px; margin: 20px; }
        .setup-info { border-right: none; border-bottom: 1px solid #3d424b; padding: 30px; }
    }
</style>

<div class=\"setup-container\">
    <div class=\"setup-card\">
        
        {# GAUCHE : GUIDAGE #}
        <div class=\"setup-info\">
            <h1>Sécurisez votre accès</h1>
            <p style=\"color: #ccc; margin-bottom: 30px;\">L'accès administrateur requiert une double authentification. Cela prend moins d'une minute.</p>
            
            <div class=\"step-item\">
                <div class=\"step-number\">1</div>
                <div class=\"step-text\">
                    <h4>Téléchargez l'application</h4>
                    <p>Installez <strong>Google Authenticator</strong> (ou Microsoft Auth) sur votre mobile.</p>
                </div>
            </div>

            <div class=\"step-item\">
                <div class=\"step-number\">2</div>
                <div class=\"step-text\">
                    <h4>Scannez le QR Code</h4>
                    <p>Ouvrez l'appli, appuyez sur \"+\" et scannez le code ci-contre.</p>
                </div>
            </div>

            <div class=\"step-item\">
                <div class=\"step-number\">3</div>
                <div class=\"step-text\">
                    <h4>Validez</h4>
                    <p>Entrez le code à 6 chiffres généré par l'application pour activer votre compte.</p>
                </div>
            </div>
        </div>

        {# DROITE : ACTION #}
        <div class=\"setup-action\">
            {% for message in app.flashes('danger') %}
                <div style=\"background: rgba(239, 68, 68, 0.2); color: #ef4444; padding: 10px; border-radius: 6px; margin-bottom: 20px; width: 100%;\">
                    ⚠️ {{ message }}
                </div>
            {% endfor %}

            <div class=\"qr-box\">
                <img src=\"{{ qr_code_data_uri(qrCodeContent) }}\" alt=\"QR Code 2FA\" width=\"180\" height=\"180\">
            </div>

            <form method=\"POST\">
                <label style=\"display: block; color: #888; margin-bottom: 10px; font-size: 0.9rem;\">Code à 6 chiffres</label>
                <input type=\"text\" name=\"auth_code\" class=\"code-input\" placeholder=\"000 000\" autocomplete=\"off\" autofocus required>
                
                <button type=\"submit\" class=\"btn-validate\">Activer et Entrer</button>
            </form>
        </div>

    </div>
</div>
{% endblock %}", "admin/security/setup_2fa.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/security/setup_2fa.html.twig");
    }
}
