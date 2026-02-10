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

/* reset_password/wizard.html.twig */
class __TwigTemplate_f0bff814b0995da557b4332e623ab5dc extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reset_password/wizard.html.twig"));

        // line 1
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 4
        yield "
";
        // line 5
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
        yield "\t<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/reset_password/reset_password.css"), "html", null, true);
        yield "\">
";
        
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
        yield "\t<div class=\"header-logo\">
\t\t<img src=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo-chm.png"), "html", null, true);
        yield "\" alt=\"CHM Saleux Logo\">
\t</div>

\t<div class=\"form-container reset-container\">
\t\t<h1>Réinitialisation du mot de passe</h1>
\t\t<p>Suivez les étapes ci-dessous pour réinitialiser votre mot de passe</p>

\t\t<!-- ✅ Barre de progression -->
\t\t<div class=\"progress-container\">
\t\t\t<div class=\"progress-bar\">
\t\t\t\t<div class=\"progress-fill\"></div>

\t\t\t\t<div class=\"step-wrapper\">
\t\t\t\t\t<div class=\"step active\" data-step=\"1\">
\t\t\t\t\t\t<span>1</span>
\t\t\t\t\t</div>
\t\t\t\t\t<p>Email</p>
\t\t\t\t</div>

\t\t\t\t<div class=\"step-wrapper\">
\t\t\t\t\t<div class=\"step\" data-step=\"2\">
\t\t\t\t\t\t<span>2</span>
\t\t\t\t\t</div>
\t\t\t\t\t<p>Vérification</p>
\t\t\t\t</div>

\t\t\t\t<div class=\"step-wrapper\">
\t\t\t\t\t<div class=\"step\" data-step=\"3\">
\t\t\t\t\t\t<span>3</span>
\t\t\t\t\t</div>
\t\t\t\t\t<p>Nouveau</p>
\t\t\t\t</div>

\t\t\t\t<div class=\"step-wrapper\">
\t\t\t\t\t<div class=\"step\" data-step=\"4\">
\t\t\t\t\t\t<span>4</span>
\t\t\t\t\t</div>
\t\t\t\t\t<p>Terminé</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>

\t\t<!-- ✅ Étape 1 -->
\t\t<div class=\"step-content active\" id=\"step1\">
\t\t\t<h2>Entrez votre email</h2>
\t\t\t<input type=\"email\" id=\"resetEmail\" placeholder=\"Votre adresse email\">
\t\t\t<button id=\"sendEmailBtn\">Envoyer</button>
\t\t</div>

\t\t<!-- ✅ Étape 2 -->
\t\t<div class=\"step-content\" id=\"step2\">
\t\t\t<h2>Vérification</h2>
\t\t\t<p>Un lien de réinitialisation a été envoyé à votre adresse email.</p>
\t\t</div>

\t\t<!-- ✅ Étape 3 -->
\t\t<div class=\"step-content\" id=\"step3\">
\t\t\t<h2>Nouveau mot de passe</h2>

\t\t\t<div class=\"password-input-wrapper\">
\t\t\t\t<input type=\"password\" id=\"newPassword\" placeholder=\"Nouveau mot de passe\" minlength=\"8\" maxlength=\"12\" required>
\t\t\t\t<span class=\"toggle-password\" onclick=\"togglePassword('newPassword')\">
\t\t\t\t\t<img id=\"eyeOpen_newPassword\" src=\"";
        // line 69
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/oeil1.png"), "html", null, true);
        yield "\" alt=\"Afficher\">
\t\t\t\t\t<img id=\"eyeClosed_newPassword\" src=\"";
        // line 70
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/oeil2.png"), "html", null, true);
        yield "\" alt=\"Cacher\" class=\"hide\">
\t\t\t\t</span>
\t\t\t</div>

\t\t\t<div class=\"password-input-wrapper\">
\t\t\t\t<input type=\"password\" id=\"confirmPassword\" placeholder=\"Confirmer le mot de passe\" minlength=\"8\" maxlength=\"12\" required>
\t\t\t\t<span class=\"toggle-password\" onclick=\"togglePassword('confirmPassword')\">
\t\t\t\t\t<img id=\"eyeOpen_confirmPassword\" src=\"";
        // line 77
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/oeil1.png"), "html", null, true);
        yield "\" alt=\"Afficher\">
\t\t\t\t\t<img id=\"eyeClosed_confirmPassword\" src=\"";
        // line 78
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/oeil2.png"), "html", null, true);
        yield "\" alt=\"Cacher\" class=\"hide\">
\t\t\t\t</span>
\t\t\t</div>

\t\t\t<button id=\"savePasswordBtn\">Changer le mot de passe</button>
\t\t</div>


\t\t<!-- ✅ Étape 4 -->
\t\t<div class=\"step-content\" id=\"step4\">
\t\t\t<h2>✅ Mot de passe réinitialisé</h2>
\t\t\t<p>Vous pouvez maintenant vous connecter.</p>
\t\t\t<a href=\"";
        // line 90
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\" class=\"btn\">Retour à la connexion</a>
\t\t</div>
\t</div>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "reset_password/wizard.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  192 => 90,  177 => 78,  173 => 77,  163 => 70,  159 => 69,  94 => 7,  91 => 6,  81 => 5,  70 => 2,  60 => 1,  52 => 5,  49 => 4,  47 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% block stylesheets %}
\t<link rel=\"stylesheet\" href=\"{{ asset('css/reset_password/reset_password.css') }}\">
{% endblock %}

{% block body %}
\t<div class=\"header-logo\">
\t\t<img src=\"{{ asset('images/logo-chm.png') }}\" alt=\"CHM Saleux Logo\">
\t</div>

\t<div class=\"form-container reset-container\">
\t\t<h1>Réinitialisation du mot de passe</h1>
\t\t<p>Suivez les étapes ci-dessous pour réinitialiser votre mot de passe</p>

\t\t<!-- ✅ Barre de progression -->
\t\t<div class=\"progress-container\">
\t\t\t<div class=\"progress-bar\">
\t\t\t\t<div class=\"progress-fill\"></div>

\t\t\t\t<div class=\"step-wrapper\">
\t\t\t\t\t<div class=\"step active\" data-step=\"1\">
\t\t\t\t\t\t<span>1</span>
\t\t\t\t\t</div>
\t\t\t\t\t<p>Email</p>
\t\t\t\t</div>

\t\t\t\t<div class=\"step-wrapper\">
\t\t\t\t\t<div class=\"step\" data-step=\"2\">
\t\t\t\t\t\t<span>2</span>
\t\t\t\t\t</div>
\t\t\t\t\t<p>Vérification</p>
\t\t\t\t</div>

\t\t\t\t<div class=\"step-wrapper\">
\t\t\t\t\t<div class=\"step\" data-step=\"3\">
\t\t\t\t\t\t<span>3</span>
\t\t\t\t\t</div>
\t\t\t\t\t<p>Nouveau</p>
\t\t\t\t</div>

\t\t\t\t<div class=\"step-wrapper\">
\t\t\t\t\t<div class=\"step\" data-step=\"4\">
\t\t\t\t\t\t<span>4</span>
\t\t\t\t\t</div>
\t\t\t\t\t<p>Terminé</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>

\t\t<!-- ✅ Étape 1 -->
\t\t<div class=\"step-content active\" id=\"step1\">
\t\t\t<h2>Entrez votre email</h2>
\t\t\t<input type=\"email\" id=\"resetEmail\" placeholder=\"Votre adresse email\">
\t\t\t<button id=\"sendEmailBtn\">Envoyer</button>
\t\t</div>

\t\t<!-- ✅ Étape 2 -->
\t\t<div class=\"step-content\" id=\"step2\">
\t\t\t<h2>Vérification</h2>
\t\t\t<p>Un lien de réinitialisation a été envoyé à votre adresse email.</p>
\t\t</div>

\t\t<!-- ✅ Étape 3 -->
\t\t<div class=\"step-content\" id=\"step3\">
\t\t\t<h2>Nouveau mot de passe</h2>

\t\t\t<div class=\"password-input-wrapper\">
\t\t\t\t<input type=\"password\" id=\"newPassword\" placeholder=\"Nouveau mot de passe\" minlength=\"8\" maxlength=\"12\" required>
\t\t\t\t<span class=\"toggle-password\" onclick=\"togglePassword('newPassword')\">
\t\t\t\t\t<img id=\"eyeOpen_newPassword\" src=\"{{ asset('images/oeil1.png') }}\" alt=\"Afficher\">
\t\t\t\t\t<img id=\"eyeClosed_newPassword\" src=\"{{ asset('images/oeil2.png') }}\" alt=\"Cacher\" class=\"hide\">
\t\t\t\t</span>
\t\t\t</div>

\t\t\t<div class=\"password-input-wrapper\">
\t\t\t\t<input type=\"password\" id=\"confirmPassword\" placeholder=\"Confirmer le mot de passe\" minlength=\"8\" maxlength=\"12\" required>
\t\t\t\t<span class=\"toggle-password\" onclick=\"togglePassword('confirmPassword')\">
\t\t\t\t\t<img id=\"eyeOpen_confirmPassword\" src=\"{{ asset('images/oeil1.png') }}\" alt=\"Afficher\">
\t\t\t\t\t<img id=\"eyeClosed_confirmPassword\" src=\"{{ asset('images/oeil2.png') }}\" alt=\"Cacher\" class=\"hide\">
\t\t\t\t</span>
\t\t\t</div>

\t\t\t<button id=\"savePasswordBtn\">Changer le mot de passe</button>
\t\t</div>


\t\t<!-- ✅ Étape 4 -->
\t\t<div class=\"step-content\" id=\"step4\">
\t\t\t<h2>✅ Mot de passe réinitialisé</h2>
\t\t\t<p>Vous pouvez maintenant vous connecter.</p>
\t\t\t<a href=\"{{ path('app_login') }}\" class=\"btn\">Retour à la connexion</a>
\t\t</div>
\t</div>

{% endblock %}
", "reset_password/wizard.html.twig", "/Users/dheillyenzo/projet-chm/templates/reset_password/wizard.html.twig");
    }
}
