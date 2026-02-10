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

/* 1_accueil/section2/paiement/index.html.twig */
class __TwigTemplate_56b15137e21e1774fb8dd74c2f2a2e47 extends Template
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
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "1_accueil/section2/paiement/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
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

        yield "Paiement
\t";
        // line 4
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 4, $this->source); })()), "html", null, true);
        yield "
\t- CHM Saleux
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 8
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 9
        yield "\t<style>
\t\t/* 🌐 Structure globale */
\t\tbody {
\t\t\tscroll-behavior: smooth;
\t\t\tbackground: linear-gradient(135deg, #f5f7fa 0%, #e8ecf1 100%);
\t\t\tfont-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
\t\t}

\t\t/* ✅ Conteneur principal */
\t\t.paiement-wrapper {
\t\t\tmin-height: calc(100vh - 100px);
\t\t\tdisplay: flex;
\t\t\tflex-direction: column;
\t\t\talign-items: center;
\t\t\tjustify-content: flex-start;
\t\t\tpadding-top: 140px;
\t\t\tpadding-bottom: 40px;
\t\t}

\t\t/* ✅ Texte d'intro avec animation */
\t\t.paiement-wrapper h1 {
\t\t\tfont-weight: 700;
\t\t\tfont-size: 2.25rem;
\t\t\tbackground: linear-gradient(135deg, #0066cc 0%, #0099ff 100%);
\t\t\t-webkit-background-clip: text;
\t\t\t-webkit-text-fill-color: transparent;
\t\t\tbackground-clip: text;
\t\t\tmargin-bottom: 16px;
\t\t\tanimation: slideDown 0.6s ease-out;
\t\t}

\t\t.paiement-wrapper p {
\t\t\tmax-width: 800px;
\t\t\tmargin: 0 auto 30px;
\t\t\tfont-size: 1.05rem;
\t\t\tline-height: 1.7;
\t\t\tcolor: #4a5568;
\t\t}

\t\t/* ✅ Conteneur iframe avec effet de profondeur */
\t\t.payment-container {
\t\t\twidth: 100%;
\t\t\tmax-width: 1050px;
\t\t\tmargin: 20px auto;
\t\t\tborder-radius: 16px;
\t\t\toverflow: hidden;
\t\t\tbox-shadow: 0 10px 40px rgba(0, 0, 0, 0.08), 0 2px 8px rgba(0, 0, 0, 0.04);
\t\t\tbackground: #fff;
\t\t\tdisplay: flex;
\t\t\talign-items: center;
\t\t\tjustify-content: center;
\t\t\tborder: 1px solid rgba(0, 0, 0, 0.05);
\t\t\ttransition: transform 0.3s ease, box-shadow 0.3s ease;
\t\t\tanimation: fadeInUp 0.8s ease-out;
\t\t}

\t\t.payment-container:hover {
\t\t\ttransform: translateY(-2px);
\t\t\tbox-shadow: 0 15px 50px rgba(0, 0, 0, 0.12), 0 4px 12px rgba(0, 0, 0, 0.06);
\t\t}

\t\t.payment-container iframe {
\t\t\twidth: 100%;
\t\t\theight: calc(100vh - 250px);
\t\t\tborder: none;
\t\t}

\t\t/* ✅ Badge sécurisé */
\t\t.text-muted.small {
\t\t\tdisplay: inline-flex;
\t\t\talign-items: center;
\t\t\tgap: 8px;
\t\t\tpadding: 12px 24px;
\t\t\tbackground: #f0fdf4;
\t\t\tborder: 1px solid #86efac;
\t\t\tborder-radius: 50px;
\t\t\tcolor: #166534;
\t\t\tfont-weight: 500;
\t\t\tfont-size: 0.95rem;
\t\t}

\t\t/* ✅ Bouton retour amélioré */
\t\t.btn-outline-primary {
\t\t\tfont-weight: 600;
\t\t\tpadding: 12px 32px;
\t\t\tborder: 2px solid #0066cc;
\t\t\tborder-radius: 50px;
\t\t\tcolor: #0066cc;
\t\t\tbackground: transparent;
\t\t\ttransition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
\t\t\tbox-shadow: 0 2px 8px rgba(0, 102, 204, 0.1);
\t\t}

\t\t.btn-outline-primary:hover {
\t\t\tbackground: linear-gradient(135deg, #0066cc 0%, #0099ff 100%);
\t\t\tcolor: #fff;
\t\t\ttransform: translateY(-2px);
\t\t\tbox-shadow: 0 8px 20px rgba(0, 102, 204, 0.3);
\t\t\tborder-color: #0066cc;
\t\t}

\t\t.btn-outline-primary:active {
\t\t\ttransform: translateY(0);
\t\t\tbox-shadow: 0 2px 8px rgba(0, 102, 204, 0.2);
\t\t}

\t\t/* ✅ Overlay avec effet moderne */
\t\t#loaderOverlay {
\t\t\tposition: fixed;
\t\t\tinset: 0;
\t\t\tbackground: rgba(255, 255, 255, 0.75);
\t\t\tbackdrop-filter: blur(12px) saturate(150%);
\t\t\tdisplay: flex;
\t\t\talign-items: center;
\t\t\tjustify-content: center;
\t\t\tz-index: 9999;
\t\t\ttransition: opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1);
\t\t}

\t\t/* ✅ Loader moderne */
\t\t.loader-content {
\t\t\ttext-align: center;
\t\t\tanimation: fadeIn 0.8s ease;
\t\t}

\t\t.spinner {
\t\t\twidth: 70px;
\t\t\theight: 70px;
\t\t\tborder: 5px solid rgba(0, 102, 204, 0.12);
\t\t\tborder-top: 5px solid #0066cc;
\t\t\tborder-right: 5px solid #0099ff;
\t\t\tborder-radius: 50%;
\t\t\tanimation: spin 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) infinite;
\t\t\tmargin: 0 auto 24px;
\t\t\tfilter: drop-shadow(0 2px 8px rgba(0, 102, 204, 0.15));
\t\t}

\t\t.loader-content p {
\t\t\tfont-size: 1.1rem;
\t\t\tfont-weight: 600;
\t\t\tcolor: #2d3748;
\t\t\tletter-spacing: -0.01em;
\t\t}

\t\t/* ✅ Animations raffinées */
\t\t@keyframes spin {
\t\t\tfrom {
\t\t\t\ttransform: rotate(0deg);
\t\t\t}
\t\t\tto {
\t\t\t\ttransform: rotate(360deg);
\t\t\t}
\t\t}

\t\t@keyframes fadeIn {
\t\t\tfrom {
\t\t\t\topacity: 0;
\t\t\t\ttransform: scale(0.95);
\t\t\t}
\t\t\tto {
\t\t\t\topacity: 1;
\t\t\t\ttransform: scale(1);
\t\t\t}
\t\t}

\t\t@keyframes slideDown {
\t\t\tfrom {
\t\t\t\topacity: 0;
\t\t\t\ttransform: translateY(-20px);
\t\t\t}
\t\t\tto {
\t\t\t\topacity: 1;
\t\t\t\ttransform: translateY(0);
\t\t\t}
\t\t}

\t\t@keyframes fadeInUp {
\t\t\tfrom {
\t\t\t\topacity: 0;
\t\t\t\ttransform: translateY(30px);
\t\t\t}
\t\t\tto {
\t\t\t\topacity: 1;
\t\t\t\ttransform: translateY(0);
\t\t\t}
\t\t}

\t\t/* ✅ Responsive optimisé */
\t\t@media(max-width: 768px) {
\t\t\t.paiement-wrapper {
\t\t\t\tpadding-top: 120px;
\t\t\t\tpadding-left: 16px;
\t\t\t\tpadding-right: 16px;
\t\t\t}

\t\t\t.paiement-wrapper h1 {
\t\t\t\tfont-size: 1.75rem;
\t\t\t}

\t\t\t.paiement-wrapper p {
\t\t\t\tfont-size: 0.95rem;
\t\t\t}

\t\t\t.payment-container {
\t\t\t\tborder-radius: 12px;
\t\t\t\tmargin: 16px auto;
\t\t\t}

\t\t\t.payment-container iframe {
\t\t\t\theight: calc(100vh - 220px);
\t\t\t}

\t\t\t.text-muted.small {
\t\t\t\tfont-size: 0.85rem;
\t\t\t\tpadding: 10px 20px;
\t\t\t}

\t\t\t.btn-outline-primary {
\t\t\t\tpadding: 10px 24px;
\t\t\t\tfont-size: 0.95rem;
\t\t\t}
\t\t}

\t\t@media(max-width: 480px) {
\t\t\t.paiement-wrapper h1 {
\t\t\t\tfont-size: 1.5rem;
\t\t\t}

\t\t\t.spinner {
\t\t\t\twidth: 55px;
\t\t\t\theight: 55px;
\t\t\t}
\t\t}
\t</style>

\t<div class=\"paiement-wrapper\">
\t\t<div class=\"container text-center\">
\t\t\t<h1>💳 Paiement en ligne -
\t\t\t\t";
        // line 247
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 247, $this->source); })()), "html", null, true);
        yield "</h1>
\t\t\t<p>
\t\t\t\tEffectuez votre paiement pour la formule
\t\t\t\t<strong>";
        // line 250
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 250, $this->source); })()), "html", null, true);
        yield "</strong>
\t\t\t\tdirectement via HelloAsso.<br>
\t\t\t\tCe service est
\t\t\t\t<strong>100 % sécurisé</strong>
\t\t\t\tet sans frais pour le club.
\t\t\t</p>

\t\t\t<div id=\"paymentContainer\" class=\"payment-container\">
\t\t\t\t<iframe id=\"helloassoIframe\" src=\"";
        // line 258
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["iframeUrl"]) || array_key_exists("iframeUrl", $context) ? $context["iframeUrl"] : (function () { throw new RuntimeError('Variable "iframeUrl" does not exist.', 258, $this->source); })()), "html", null, true);
        yield "\" frameborder=\"0\"></iframe>
\t\t\t</div>

\t\t\t<p class=\"text-muted small mt-4\">
\t\t\t\t🟢 Paiement géré par HelloAsso — plateforme sécurisée et gratuite pour les associations.
\t\t\t</p>

\t\t\t<div class=\"mt-4\">
\t\t\t\t<a href=\"";
        // line 266
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\" class=\"btn btn-outline-primary rounded-pill px-4 py-2\">
\t\t\t\t\t← Retour aux abonnements
\t\t\t\t</a>
\t\t\t</div>
\t\t</div>
\t</div>

\t<!-- 🌀 Overlay de chargement -->
\t<div id=\"loaderOverlay\">
\t\t<div class=\"loader-content\">
\t\t\t<div class=\"spinner\"></div>
\t\t\t<p>Chargement du formulaire sécurisé HelloAsso...</p>
\t\t</div>
\t</div>

\t <script>
\t\tdocument.addEventListener('DOMContentLoaded', function() {
\t\t    const iframe = document.getElementById('helloassoIframe');
\t\t    const loader = document.getElementById('loaderOverlay');
\t\t
\t\t    let iframeLoaded = false;
\t\t    let minTimeElapsed = false;
\t\t
\t\t    // délai minimum 2 secondes
\t\t    setTimeout(() => {
\t\t        minTimeElapsed = true;
\t\t        if (iframeLoaded) hideLoader();
\t\t    }, 2000);
\t\t
\t\t    iframe.addEventListener('load', function() {
\t\t        iframeLoaded = true;
\t\t        if (minTimeElapsed) hideLoader();
\t\t    });
\t\t
\t\t    function hideLoader() {
\t\t        loader.style.opacity = '0';
\t\t        setTimeout(() => loader.style.display = 'none', 600);
\t\t    }
\t\t});
\t\t</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "1_accueil/section2/paiement/index.html.twig";
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
        return array (  359 => 266,  348 => 258,  337 => 250,  331 => 247,  91 => 9,  81 => 8,  70 => 4,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Paiement
\t{{ type }}
\t- CHM Saleux
{% endblock %}

{% block body %}
\t<style>
\t\t/* 🌐 Structure globale */
\t\tbody {
\t\t\tscroll-behavior: smooth;
\t\t\tbackground: linear-gradient(135deg, #f5f7fa 0%, #e8ecf1 100%);
\t\t\tfont-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
\t\t}

\t\t/* ✅ Conteneur principal */
\t\t.paiement-wrapper {
\t\t\tmin-height: calc(100vh - 100px);
\t\t\tdisplay: flex;
\t\t\tflex-direction: column;
\t\t\talign-items: center;
\t\t\tjustify-content: flex-start;
\t\t\tpadding-top: 140px;
\t\t\tpadding-bottom: 40px;
\t\t}

\t\t/* ✅ Texte d'intro avec animation */
\t\t.paiement-wrapper h1 {
\t\t\tfont-weight: 700;
\t\t\tfont-size: 2.25rem;
\t\t\tbackground: linear-gradient(135deg, #0066cc 0%, #0099ff 100%);
\t\t\t-webkit-background-clip: text;
\t\t\t-webkit-text-fill-color: transparent;
\t\t\tbackground-clip: text;
\t\t\tmargin-bottom: 16px;
\t\t\tanimation: slideDown 0.6s ease-out;
\t\t}

\t\t.paiement-wrapper p {
\t\t\tmax-width: 800px;
\t\t\tmargin: 0 auto 30px;
\t\t\tfont-size: 1.05rem;
\t\t\tline-height: 1.7;
\t\t\tcolor: #4a5568;
\t\t}

\t\t/* ✅ Conteneur iframe avec effet de profondeur */
\t\t.payment-container {
\t\t\twidth: 100%;
\t\t\tmax-width: 1050px;
\t\t\tmargin: 20px auto;
\t\t\tborder-radius: 16px;
\t\t\toverflow: hidden;
\t\t\tbox-shadow: 0 10px 40px rgba(0, 0, 0, 0.08), 0 2px 8px rgba(0, 0, 0, 0.04);
\t\t\tbackground: #fff;
\t\t\tdisplay: flex;
\t\t\talign-items: center;
\t\t\tjustify-content: center;
\t\t\tborder: 1px solid rgba(0, 0, 0, 0.05);
\t\t\ttransition: transform 0.3s ease, box-shadow 0.3s ease;
\t\t\tanimation: fadeInUp 0.8s ease-out;
\t\t}

\t\t.payment-container:hover {
\t\t\ttransform: translateY(-2px);
\t\t\tbox-shadow: 0 15px 50px rgba(0, 0, 0, 0.12), 0 4px 12px rgba(0, 0, 0, 0.06);
\t\t}

\t\t.payment-container iframe {
\t\t\twidth: 100%;
\t\t\theight: calc(100vh - 250px);
\t\t\tborder: none;
\t\t}

\t\t/* ✅ Badge sécurisé */
\t\t.text-muted.small {
\t\t\tdisplay: inline-flex;
\t\t\talign-items: center;
\t\t\tgap: 8px;
\t\t\tpadding: 12px 24px;
\t\t\tbackground: #f0fdf4;
\t\t\tborder: 1px solid #86efac;
\t\t\tborder-radius: 50px;
\t\t\tcolor: #166534;
\t\t\tfont-weight: 500;
\t\t\tfont-size: 0.95rem;
\t\t}

\t\t/* ✅ Bouton retour amélioré */
\t\t.btn-outline-primary {
\t\t\tfont-weight: 600;
\t\t\tpadding: 12px 32px;
\t\t\tborder: 2px solid #0066cc;
\t\t\tborder-radius: 50px;
\t\t\tcolor: #0066cc;
\t\t\tbackground: transparent;
\t\t\ttransition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
\t\t\tbox-shadow: 0 2px 8px rgba(0, 102, 204, 0.1);
\t\t}

\t\t.btn-outline-primary:hover {
\t\t\tbackground: linear-gradient(135deg, #0066cc 0%, #0099ff 100%);
\t\t\tcolor: #fff;
\t\t\ttransform: translateY(-2px);
\t\t\tbox-shadow: 0 8px 20px rgba(0, 102, 204, 0.3);
\t\t\tborder-color: #0066cc;
\t\t}

\t\t.btn-outline-primary:active {
\t\t\ttransform: translateY(0);
\t\t\tbox-shadow: 0 2px 8px rgba(0, 102, 204, 0.2);
\t\t}

\t\t/* ✅ Overlay avec effet moderne */
\t\t#loaderOverlay {
\t\t\tposition: fixed;
\t\t\tinset: 0;
\t\t\tbackground: rgba(255, 255, 255, 0.75);
\t\t\tbackdrop-filter: blur(12px) saturate(150%);
\t\t\tdisplay: flex;
\t\t\talign-items: center;
\t\t\tjustify-content: center;
\t\t\tz-index: 9999;
\t\t\ttransition: opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1);
\t\t}

\t\t/* ✅ Loader moderne */
\t\t.loader-content {
\t\t\ttext-align: center;
\t\t\tanimation: fadeIn 0.8s ease;
\t\t}

\t\t.spinner {
\t\t\twidth: 70px;
\t\t\theight: 70px;
\t\t\tborder: 5px solid rgba(0, 102, 204, 0.12);
\t\t\tborder-top: 5px solid #0066cc;
\t\t\tborder-right: 5px solid #0099ff;
\t\t\tborder-radius: 50%;
\t\t\tanimation: spin 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) infinite;
\t\t\tmargin: 0 auto 24px;
\t\t\tfilter: drop-shadow(0 2px 8px rgba(0, 102, 204, 0.15));
\t\t}

\t\t.loader-content p {
\t\t\tfont-size: 1.1rem;
\t\t\tfont-weight: 600;
\t\t\tcolor: #2d3748;
\t\t\tletter-spacing: -0.01em;
\t\t}

\t\t/* ✅ Animations raffinées */
\t\t@keyframes spin {
\t\t\tfrom {
\t\t\t\ttransform: rotate(0deg);
\t\t\t}
\t\t\tto {
\t\t\t\ttransform: rotate(360deg);
\t\t\t}
\t\t}

\t\t@keyframes fadeIn {
\t\t\tfrom {
\t\t\t\topacity: 0;
\t\t\t\ttransform: scale(0.95);
\t\t\t}
\t\t\tto {
\t\t\t\topacity: 1;
\t\t\t\ttransform: scale(1);
\t\t\t}
\t\t}

\t\t@keyframes slideDown {
\t\t\tfrom {
\t\t\t\topacity: 0;
\t\t\t\ttransform: translateY(-20px);
\t\t\t}
\t\t\tto {
\t\t\t\topacity: 1;
\t\t\t\ttransform: translateY(0);
\t\t\t}
\t\t}

\t\t@keyframes fadeInUp {
\t\t\tfrom {
\t\t\t\topacity: 0;
\t\t\t\ttransform: translateY(30px);
\t\t\t}
\t\t\tto {
\t\t\t\topacity: 1;
\t\t\t\ttransform: translateY(0);
\t\t\t}
\t\t}

\t\t/* ✅ Responsive optimisé */
\t\t@media(max-width: 768px) {
\t\t\t.paiement-wrapper {
\t\t\t\tpadding-top: 120px;
\t\t\t\tpadding-left: 16px;
\t\t\t\tpadding-right: 16px;
\t\t\t}

\t\t\t.paiement-wrapper h1 {
\t\t\t\tfont-size: 1.75rem;
\t\t\t}

\t\t\t.paiement-wrapper p {
\t\t\t\tfont-size: 0.95rem;
\t\t\t}

\t\t\t.payment-container {
\t\t\t\tborder-radius: 12px;
\t\t\t\tmargin: 16px auto;
\t\t\t}

\t\t\t.payment-container iframe {
\t\t\t\theight: calc(100vh - 220px);
\t\t\t}

\t\t\t.text-muted.small {
\t\t\t\tfont-size: 0.85rem;
\t\t\t\tpadding: 10px 20px;
\t\t\t}

\t\t\t.btn-outline-primary {
\t\t\t\tpadding: 10px 24px;
\t\t\t\tfont-size: 0.95rem;
\t\t\t}
\t\t}

\t\t@media(max-width: 480px) {
\t\t\t.paiement-wrapper h1 {
\t\t\t\tfont-size: 1.5rem;
\t\t\t}

\t\t\t.spinner {
\t\t\t\twidth: 55px;
\t\t\t\theight: 55px;
\t\t\t}
\t\t}
\t</style>

\t<div class=\"paiement-wrapper\">
\t\t<div class=\"container text-center\">
\t\t\t<h1>💳 Paiement en ligne -
\t\t\t\t{{ type }}</h1>
\t\t\t<p>
\t\t\t\tEffectuez votre paiement pour la formule
\t\t\t\t<strong>{{ type }}</strong>
\t\t\t\tdirectement via HelloAsso.<br>
\t\t\t\tCe service est
\t\t\t\t<strong>100 % sécurisé</strong>
\t\t\t\tet sans frais pour le club.
\t\t\t</p>

\t\t\t<div id=\"paymentContainer\" class=\"payment-container\">
\t\t\t\t<iframe id=\"helloassoIframe\" src=\"{{ iframeUrl }}\" frameborder=\"0\"></iframe>
\t\t\t</div>

\t\t\t<p class=\"text-muted small mt-4\">
\t\t\t\t🟢 Paiement géré par HelloAsso — plateforme sécurisée et gratuite pour les associations.
\t\t\t</p>

\t\t\t<div class=\"mt-4\">
\t\t\t\t<a href=\"{{ path('home') }}\" class=\"btn btn-outline-primary rounded-pill px-4 py-2\">
\t\t\t\t\t← Retour aux abonnements
\t\t\t\t</a>
\t\t\t</div>
\t\t</div>
\t</div>

\t<!-- 🌀 Overlay de chargement -->
\t<div id=\"loaderOverlay\">
\t\t<div class=\"loader-content\">
\t\t\t<div class=\"spinner\"></div>
\t\t\t<p>Chargement du formulaire sécurisé HelloAsso...</p>
\t\t</div>
\t</div>

\t <script>
\t\tdocument.addEventListener('DOMContentLoaded', function() {
\t\t    const iframe = document.getElementById('helloassoIframe');
\t\t    const loader = document.getElementById('loaderOverlay');
\t\t
\t\t    let iframeLoaded = false;
\t\t    let minTimeElapsed = false;
\t\t
\t\t    // délai minimum 2 secondes
\t\t    setTimeout(() => {
\t\t        minTimeElapsed = true;
\t\t        if (iframeLoaded) hideLoader();
\t\t    }, 2000);
\t\t
\t\t    iframe.addEventListener('load', function() {
\t\t        iframeLoaded = true;
\t\t        if (minTimeElapsed) hideLoader();
\t\t    });
\t\t
\t\t    function hideLoader() {
\t\t        loader.style.opacity = '0';
\t\t        setTimeout(() => loader.style.display = 'none', 600);
\t\t    }
\t\t});
\t\t</script>
{% endblock %}
", "1_accueil/section2/paiement/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/1_accueil/section2/paiement/index.html.twig");
    }
}
