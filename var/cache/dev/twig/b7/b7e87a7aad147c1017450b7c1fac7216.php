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

/* modal/modal_auth.html.twig */
class __TwigTemplate_75a815eb9274be696346c6e9da14d1ae extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "modal/modal_auth.html.twig"));

        // line 2
        yield "<div class=\"modal-overlay\" id=\"registerModal\" aria-hidden=\"true\">
\t<div class=\"modal-card\" role=\"dialog\" aria-modal=\"true\" aria-labelledby=\"registerModalTitle\">

\t\t<button class=\"modal-close\" type=\"button\" aria-label=\"Fermer\" id=\"closeRegisterModal\">×</button>

\t\t<!-- === ÉTAPE 1 : Choix social/email === -->
\t\t<div id=\"modal-step-social\" style=\"margin-top:-20px;\">
\t\t\t<h3 id=\"registerModalTitle\" class=\"modal-title\" style=\"font-weight:800; margin :21px;\">
\t\t\t\tLA FORCE SE CONSTRUIT. COMMENCE AUJOURD’HUI !
\t\t\t</h3>

\t\t<div class=\"modal-actions\">
    <div class=\"button-wrap-payment\">
        <a class=\"btn-payment\" href=\"";
        // line 15
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("oauth_google_start");
        yield "\">
            <img src=\"https://www.svgrepo.com/show/475656/google-color.svg\" alt=\"Google\" width=\"20\" height=\"20\">
            <span style=\"color:black;font-weight: 700;\">CONTINUER AVEC GOOGLE</span>
        </a>
        <div class=\"button-shadow\"></div>
    </div>

    <!--<div class=\"button-wrap-payment\">
        <a class=\"btn-payment\" href=\"#\">
            <img src=\"https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/apple.svg\" alt=\"Apple\" width=\"20\" height=\"20\">
            <span style=\"color:black;font-weight: 700;\">CONTINUER AVEC APPLE</span>
        </a>
        <div class=\"button-shadow\"></div>
    </div>

    <div class=\"button-wrap-payment\">
        <a class=\"btn-payment\" href=\"#\">
            <img src=\"";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/facebook-icon.png"), "html", null, true);
        yield "\" alt=\"Facebook\" width=\"20\" height=\"20\">
            <span style=\"color:black;font-weight: 700;\">CONTINUER AVEC FACEBOOK</span>
        </a>
        <div class=\"button-shadow\"></div>
    </div>-->
</div>

\t\t\t<div class=\"modal-divider\">
\t\t\t\t<span>ou</span>
\t\t\t</div>

\t\t\t<p class=\"modal-sep\">
\t\t\t\tInscris-toi avec ton
\t\t\t\t<a href=\"#\" id=\"js-switch-to-email\">Adresse e-mail</a>
\t\t\t</p>

\t\t\t<p class=\"modal-footer\">
\t\t\t\tTu as déjà un compte ?
\t\t\t\t<a href=\"#\" class=\"js-open-login-modal\">Se connecter</a>
\t\t\t</p>
\t\t</div>

\t\t<!-- === ÉTAPE 2 : Inscription par e-mail === -->
\t\t<div id=\"modal-step-email\" style=\"display:none; position: relative;\">
\t\t\t<div class=\"email-register-card\">
\t\t\t\t<h3 class=\"modal-title\" style=\"font-weight:800;line-height: 2.4;\">CRÉER UN COMPTE</h3>


\t\t\t\t<form id=\"emailRegisterForm\" class=\"email-register-form\" action=\"";
        // line 60
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" method=\"POST\" novalidate>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"register-firstname\">Prénom</label>
\t\t\t\t\t\t<input type=\"text\" id=\"register-firstname\" name=\"registration_form[firstName]\" placeholder=\"Votre prénom\" required>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"register-lastname\">Nom</label>
\t\t\t\t\t\t<input type=\"text\" id=\"register-lastname\" name=\"registration_form[lastName]\" placeholder=\"Votre nom\" required>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"register-email\">Email</label>
\t\t\t\t\t\t<input type=\"email\" id=\"register-email\" name=\"registration_form[email]\" placeholder=\"exemple@email.com\" required>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-separator\">
\t\t\t\t\t\t<span>Informations de connexion</span>
\t\t\t\t\t</div>

\t\t\t\t\t<!-- === Bloc mot de passe === -->
\t\t\t\t\t<div
\t\t\t\t\t\tclass=\"form-group password-group\">

\t\t\t\t\t\t<!-- ✅ Sous-modale Critères du mot de passe -->
\t\t\t\t\t\t<div class=\"password-criteria-modal\" id=\"passwordRulesModal\">
\t\t\t\t\t\t\t<div class=\"password-criteria-content\">
\t\t\t\t\t\t\t\t<h2>Critères du mot de passe</h2>
\t\t\t\t\t\t\t\t<p class=\"password-rules-intro\">
\t\t\t\t\t\t\t\t\tConformément aux recommandations RGPD, ton mot de passe doit respecter ces critères
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tpour garantir une sécurité optimale de ton compte :
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t<li id=\"rule-length\">Au moins
\t\t\t\t\t\t\t\t\t\t<strong>12 caractères</strong>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li id=\"rule-uppercase\">Contenir
\t\t\t\t\t\t\t\t\t\t<strong>une majuscule</strong>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li id=\"rule-lowercase\">Contenir
\t\t\t\t\t\t\t\t\t\t<strong>une minuscule</strong>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li id=\"rule-number\">Contenir
\t\t\t\t\t\t\t\t\t\t<strong>un chiffre</strong>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li id=\"rule-special\">Contenir
\t\t\t\t\t\t\t\t\t\t<strong>un caractère spécial</strong>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t<button class=\"btn-close-rules\" id=\"closePasswordRules\">Fermer</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<!-- ✅ Label + lien critères -->
\t\t\t\t\t\t<div class=\"password-label-wrapper\">
\t\t\t\t\t\t\t<label for=\"register-password\">Mot de passe</label>
\t\t\t\t\t\t\t<span class=\"password-rules-link\" id=\"openPasswordRules\">Voir les critères</span>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"password-input-wrapper\">
\t\t\t\t\t\t\t<input type=\"password\" id=\"register-password\" name=\"registration_form[password][first]\" placeholder=\"Mot de passe\" required>
\t\t\t\t\t\t\t<span class=\"toggle-password\" data-target=\"register-password\">
\t\t\t\t\t\t\t\t<img src=\"";
        // line 123
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/eye/eye-open.png"), "html", null, true);
        yield "\" alt=\"Afficher\" class=\"eye-open\" style=\"margin-top:12px;\">
\t\t\t\t\t\t\t\t<img src=\"";
        // line 124
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/eye/eye-closed.png"), "html", null, true);
        yield "\" alt=\"Cacher\" class=\"eye-closed hide\" style=\"margin-top:12px;\">
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group password-group\">
\t\t\t\t\t\t<label for=\"register-confirm-password\">Confirmer le mot de passe</label>
\t\t\t\t\t\t<div class=\"password-input-wrapper\">
\t\t\t\t\t\t\t<input type=\"password\" id=\"register-confirm-password\" name=\"registration_form[password][second]\" placeholder=\"Confirmez le mot de passe\" required>
\t\t\t\t\t\t\t<span class=\"toggle-password\" data-target=\"register-confirm-password\">
\t\t\t\t\t\t\t\t<img src=\"";
        // line 134
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/eye/eye-open.png"), "html", null, true);
        yield "\" alt=\"Afficher\" class=\"eye-open\" style=\"margin-top:12px;\">
\t\t\t\t\t\t\t\t<img src=\"";
        // line 135
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/eye/eye-closed.png"), "html", null, true);
        yield "\" alt=\"Cacher\" class=\"eye-closed hide\" style=\"margin-top:12px;\">
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"checkbox-group\">
\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"registration_form[acceptedTerms]\" required>
\t\t\t\t\t\t\tEn m’inscrivant, j’accepte les
\t\t\t\t\t\t\t<a href=\"#\">Conditions générales</a>
\t\t\t\t\t\t\tet la
\t\t\t\t\t\t\t<a href=\"#\">Politique de confidentialité</a>.
\t\t\t\t\t\t</label>
\t\t\t\t\t</div>

\t\t\t\t\t<div id=\"form-error-message\" class=\"form-error-message\" style=\"display:none;\"></div>

\t\t\t\t\t<div class=\"form-group text-center mt-3\">
\t\t\t\t\t\t<div class=\"cf-turnstile\" data-sitekey=\"";
        // line 153
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["turnstile_site_key"]) || array_key_exists("turnstile_site_key", $context) ? $context["turnstile_site_key"] : (function () { throw new RuntimeError('Variable "turnstile_site_key" does not exist.', 153, $this->source); })()), "html", null, true);
        yield "\" data-theme=\"light\" data-size=\"normal\"></div>
\t\t\t\t\t</div>

\t\t\t\t\t<button type=\"submit\" class=\"btn-register\">
\t\t\t\t\t\t<span class=\"btn-text\">S'INSCRIRE</span>
\t\t\t\t\t\t<span class=\"btn-spinner\" style=\"display:none;\">
\t\t\t\t\t\t\t<div class=\"mini-spinner\"></div>
\t\t\t\t\t\t</span>
\t\t\t\t\t</button>

\t\t\t\t\t<p class=\"modal-footer\">
\t\t\t\t\t\t<a href=\"#\" id=\"js-back-to-social\">← Retour</a>
\t\t\t\t\t</p>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>

\t\t<!-- === ÉTAPE 3 : Vérification code === -->
\t\t<div id=\"modal-step-verify\" style=\"display:none;\">
\t\t\t<h3 class=\"modal-title\">Vérification de votre compte</h3>
\t\t\t<p class=\"modal-subtitle\">Entrez le code à 6 chiffres reçu par e-mail.</p>

\t\t\t<form id=\"verify-form\" action=\"";
        // line 175
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_verify_code");
        yield "\" method=\"POST\">
\t\t\t\t<div class=\"verify-code-inputs\">
\t\t\t\t\t";
        // line 177
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 6));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 178
            yield "\t\t\t\t\t\t<input type=\"text\" maxlength=\"1\" inputmode=\"numeric\" class=\"code-input\" name=\"code_digit_";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
            yield "\" data-index=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
            yield "\" required>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 180
        yield "\t\t\t\t</div>

\t\t\t\t<input type=\"hidden\" name=\"code\" id=\"verify-full-code\">
\t\t\t\t<div id=\"verifyMessage\" class=\"verify-message\" style=\"display:none;\"></div>

\t\t\t\t<button type=\"submit\" id=\"verifyButton\" class=\"btn-register\">
\t\t\t\t\t<span class=\"btn-text\">Vérifier mon compte</span>
\t\t\t\t\t<span class=\"btn-spinner\" style=\"display:none;\">
\t\t\t\t\t\t<div class=\"mini-spinner\"></div>
\t\t\t\t\t</span>
\t\t\t\t</button>
\t\t\t</form>

\t\t\t<p class=\"resend\">
\t\t\t\tPas reçu ?
\t\t\t\t<a href=\"";
        // line 195
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_resend_code");
        yield "\" id=\"resendCodeLink\">Renvoyer un nouveau code</a>
\t\t\t</p>

\t\t\t<p class=\"modal-footer\">
\t\t\t\t<a href=\"#\" id=\"js-back-to-email\">← Retour à l’inscription</a>
\t\t\t</p>
\t\t</div>

\t\t<!-- === ÉTAPE 4 : Connexion === -->
\t\t<div id=\"modal-step-login\" style=\"display:none;\">
\t\t\t<h3 class=\"modal-title\" style=\"font-weight:800;line-height: 2.4;\">CONNEXION</h3>

\t\t\t<form id=\"login-form\" action=\"";
        // line 207
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\" method=\"POST\" novalidate>
\t\t\t\t<input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 208
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        yield "\">

\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"login-email\">Adresse e-mail</label>
\t\t\t\t\t<input type=\"email\" id=\"login-email\" name=\"email\" placeholder=\"exemple@email.com\" required>
\t\t\t\t</div>

\t\t\t\t<div class=\"form-group password-group\">
\t\t\t\t\t<label for=\"login-password\">Mot de passe</label>
\t\t\t\t\t<div class=\"password-input-wrapper\">
\t\t\t\t\t\t<input type=\"password\" id=\"login-password\" name=\"password\" placeholder=\"Votre mot de passe\" required>
\t\t\t\t\t\t<span class=\"toggle-password\" data-target=\"login-password\">
\t\t\t\t\t\t\t<img src=\"";
        // line 220
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/eye/eye-open.png"), "html", null, true);
        yield "\" alt=\"Afficher\" class=\"eye-open\" style=\"margin-top:13px;\">
\t\t\t\t\t\t\t<img src=\"";
        // line 221
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/eye/eye-closed.png"), "html", null, true);
        yield "\" alt=\"Cacher\" class=\"eye-closed hide\" style=\"margin-top:13px;\">
\t\t\t\t\t\t</span>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"checkbox-group remember-me\">
\t\t\t\t\t<label>
\t\t\t\t\t\t<input type=\"checkbox\" name=\"_remember_me\">
\t\t\t\t\t\tSe souvenir de moi
\t\t\t\t\t</label>
\t\t\t\t</div>

\t\t\t\t<!-- ✅ CAPTCHA Turnstile visible -->
\t\t\t\t<div class=\"form-group text-center mt-3\">
\t\t\t\t\t<div class=\"cf-turnstile\" data-sitekey=\"";
        // line 235
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["turnstile_site_key"]) || array_key_exists("turnstile_site_key", $context) ? $context["turnstile_site_key"] : (function () { throw new RuntimeError('Variable "turnstile_site_key" does not exist.', 235, $this->source); })()), "html", null, true);
        yield "\" data-theme=\"light\" data-size=\"normal\"></div>
\t\t\t\t</div>

\t\t\t\t<div id=\"loginError\" class=\"login-error\" style=\"display:none;\"></div>

\t\t\t\t<button type=\"submit\" id=\"loginButton\" class=\"btn-register\">
\t\t\t\t\t<span class=\"btn-text\">SE CONNECTER</span>
\t\t\t\t\t<span class=\"btn-spinner\" style=\"display:none;\">
\t\t\t\t\t\t<div class=\"mini-spinner\"></div>
\t\t\t\t\t</span>
\t\t\t\t</button>
\t\t\t</form>

\t\t\t<p class=\"forgot-password\">
\t\t\t\t<a href=\"#\" id=\"js-forgot-password\" class=\"js-open-reset-modal\">Mot de passe oublié ?</a>
\t\t\t</p>
\t\t\t<p class=\"modal-back\">
\t\t\t\t<a href=\"#\" id=\"js-back-to-social-login\" style=\"color:#005b94;text-decoration: none;\">← Retour à l’accueil</a>
\t\t\t</p>
\t\t</div>

\t\t<!-- ✅ Script Turnstile -->


\t\t<!-- === ÉTAPE 5 : Mot de passe oublié === -->
\t\t<div id=\"modal-step-reset-email\" style=\"display:none; text-align:center;\">
\t\t\t<h3 class=\"modal-title\" style=\"font-weight:800;line-height: 2.4;\">MOT DE PASSE OUBLIÉ</h3>
\t\t\t<p class=\"modal-subtitle\">Entrez votre adresse e-mail pour recevoir un lien de réinitialisation.</p>

\t\t\t<div id=\"resetError\" class=\"verify-message\" style=\"display:none;\"></div>

\t\t\t<form id=\"resetRequestForm\" action=\"";
        // line 266
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reset_password_request");
        yield "\" method=\"POST\" novalidate>
\t\t\t\t<input type=\"email\" name=\"email\" id=\"resetEmail\" placeholder=\"Votre adresse e-mail\" required>
\t\t\t\t<button type=\"submit\" id=\"resetRequestBtn\" class=\"btn-register\" style=\"margin-right:53px;\">
\t\t\t\t\t<span class=\"btn-text\">ENVOYER</span>
\t\t\t\t\t<span class=\"btn-spinner\" style=\"display:none;\">
\t\t\t\t\t\t<span class=\"mini-spinner\"></span>
\t\t\t\t\t</span>
\t\t\t\t</button>
\t\t\t</form>

\t\t\t<p class=\"modal-footer\">
\t\t\t\t<a href=\"#\" id=\"js-back-to-login\" style=\"margin-top:8px;\">← Retour à la connexion</a>
\t\t\t</p>
\t\t</div>

\t\t<!-- === ÉTAPE 6 : Nouveau mot de passe === -->
\t\t<div id=\"modal-step-reset-new\" style=\"display:none; text-align:center;\">
\t\t\t<h3 class=\"modal-title\" style=\"font-weight:800;\">NOUVEAU MOT DE PASSE</h3>
\t\t\t<p class=\"modal-subtitle\">Saisissez votre nouveau mot de passe.</p>

\t\t\t<div id=\"resetNewError\" class=\"verify-message\" style=\"display:none;\"></div>

\t\t\t<form id=\"resetNewForm\" action=\"";
        // line 288
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reset_password_final");
        yield "\" method=\"POST\" novalidate>
\t\t\t\t<input
\t\t\t\ttype=\"hidden\" id=\"resetToken\" name=\"token\" value=\"\">

\t\t\t\t<!-- Champ : nouveau mot de passe -->
\t\t\t\t<div class=\"password-group\">
\t\t\t\t\t<div class=\"password-input-wrapper\">
\t\t\t\t\t\t<input type=\"password\" id=\"newPassword\" name=\"newPassword\" placeholder=\"Nouveau mot de passe\" minlength=\"12\" maxlength=\"64\" required style=\"margin-left:14px;\">
\t\t\t\t\t\t<span class=\"toggle-password\" data-target=\"newPassword\">
\t\t\t\t\t\t\t<img class=\"eye-open\" src=\"";
        // line 297
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/eye/eye-open.png"), "html", null, true);
        yield "\" alt=\"Afficher\" style=\"margin-right:10px;margin-top:-10px\">
\t\t\t\t\t\t\t<img class=\"eye-closed hide\" src=\"";
        // line 298
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/eye/eye-closed.png"), "html", null, true);
        yield "\" alt=\"Cacher\" style=\"margin-right:10px;margin-top:-10px\">
\t\t\t\t\t\t</span>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<!-- Champ : confirmation -->
\t\t\t\t<div class=\"password-group\">
\t\t\t\t\t<div class=\"password-input-wrapper\">
\t\t\t\t\t\t<input type=\"password\" id=\"confirmPassword\" name=\"confirmPassword\" placeholder=\"Confirmer le mot de passe\" minlength=\"12\" maxlength=\"64\" required style=\"margin-left:14px;\">
\t\t\t\t\t\t<span class=\"toggle-password\" data-target=\"confirmPassword\">
\t\t\t\t\t\t\t<img class=\"eye-open\" src=\"";
        // line 308
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/eye/eye-open.png"), "html", null, true);
        yield "\" alt=\"Afficher\" style=\"margin-right:10px;margin-top:-10px\">
\t\t\t\t\t\t\t<img class=\"eye-closed hide\" src=\"";
        // line 309
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/eye/eye-closed.png"), "html", null, true);
        yield "\" alt=\"Cacher\" style=\"margin-right:10px;margin-top:-10px\">
\t\t\t\t\t\t</span>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<!-- Bouton -->
\t\t\t\t<button type=\"submit\" id=\"resetNewBtn\" class=\"btn-register\" style=\"margin-top:15px;\">
\t\t\t\t\t<span class=\"btn-text\">CHANGER LE MOT DE PASSE</span>
\t\t\t\t\t<span class=\"btn-spinner\" style=\"display:none;\">
\t\t\t\t\t\t<span class=\"mini-spinner\"></span>
\t\t\t\t\t</span>
\t\t\t\t</button>
\t\t\t</form>

\t\t\t<p class=\"modal-footer\" style=\"margin-top:20px;\">
\t\t\t\t<a href=\"#\" id=\"js-back-to-login-from-reset\" style=\"text-decoration:none;\">← Retour à la connexion</a>
\t\t\t</p>
\t\t</div>
\t</div>
</div>

";
        // line 331
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 331, $this->source); })()), "user", [], "any", false, false, false, 331) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 331, $this->source); })()), "user", [], "any", false, false, false, 331), "getNeedsPassword", [], "method", false, false, false, 331))) {
            // line 332
            yield "<div class=\"modal-overlay is-open\" id=\"setPasswordModal\" aria-hidden=\"false\">
<div class=\"modal-card modal-card-set-password\" role=\"dialog\" aria-modal=\"true\" aria-labelledby=\"setPasswordTitle\">

        <div class=\"modal-logo\">
            <img src=\"";
            // line 336
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/favicon/icon.png"), "html", null, true);
            yield "\" alt=\"Logo\" />
        </div>

        <h3 id=\"setPasswordTitle\" class=\"modal-title\">Définir votre mot de passe</h3>
        <p class=\"modal-subtitle\">Assurez-vous de choisir un mot de passe sécurisé pour protéger votre compte.</p>

";
            // line 342
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 342, $this->source); })()), "flashes", ["error"], "method", false, false, false, 342));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 343
                yield "    <div class=\"form-error-message set-password-error\">";
                yield $context["message"];
                yield "</div>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 345
            yield "

        <form action=\"";
            // line 347
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("set_password");
            yield "\" method=\"POST\" class=\"email-register-form\" novalidate>
            <input type=\"hidden\" name=\"_csrf_token\" value=\"";
            // line 348
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("set_password"), "html", null, true);
            yield "\">

            <div class=\"form-group password-group\">
                <label for=\"password\">Mot de passe</label>
                <div class=\"password-input-wrapper\">
                    <input type=\"password\" id=\"password\" name=\"password\" placeholder=\"Mot de passe\" required>
                    <span class=\"toggle-password\" data-target=\"password\">
                        <img class=\"eye-open\" src=\"";
            // line 355
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/eye/eye-open.png"), "html", null, true);
            yield "\" alt=\"Afficher\">
                        <img class=\"eye-closed hide\" src=\"";
            // line 356
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/eye/eye-closed.png"), "html", null, true);
            yield "\" alt=\"Cacher\">
                    </span>
                </div>
            </div>

            <div class=\"form-group password-group\">
                <label for=\"confirm_password\">Confirmer le mot de passe</label>
                <div class=\"password-input-wrapper\">
                    <input type=\"password\" id=\"confirm_password\" name=\"confirm_password\" placeholder=\"Confirmez le mot de passe\" required>
                    <span class=\"toggle-password\" data-target=\"confirm_password\">
                        <img class=\"eye-open\" src=\"";
            // line 366
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/eye/eye-open.png"), "html", null, true);
            yield "\" alt=\"Afficher\">
                        <img class=\"eye-closed hide\" src=\"";
            // line 367
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/eye/eye-closed.png"), "html", null, true);
            yield "\" alt=\"Cacher\">
                    </span>
                </div>
            </div>

            <div class=\"checkbox-group\">
                <label>
                    <input type=\"checkbox\" name=\"acceptedTerms\" required>
                    J’accepte les <a href=\"#\">Conditions générales</a> et la <a href=\"#\">Politique de confidentialité</a>.
                </label>
            </div>

            <button type=\"submit\" class=\"btn-register\">Enregistrer</button>
        </form>
    </div>
</div>
";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modal/modal_auth.html.twig";
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
        return array (  521 => 367,  517 => 366,  504 => 356,  500 => 355,  490 => 348,  486 => 347,  482 => 345,  473 => 343,  469 => 342,  460 => 336,  454 => 332,  452 => 331,  428 => 309,  424 => 308,  411 => 298,  407 => 297,  395 => 288,  370 => 266,  336 => 235,  319 => 221,  315 => 220,  300 => 208,  296 => 207,  281 => 195,  264 => 180,  253 => 178,  249 => 177,  244 => 175,  219 => 153,  198 => 135,  194 => 134,  181 => 124,  177 => 123,  111 => 60,  80 => 32,  60 => 15,  45 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/partials/_register_modal.html.twig #}
<div class=\"modal-overlay\" id=\"registerModal\" aria-hidden=\"true\">
\t<div class=\"modal-card\" role=\"dialog\" aria-modal=\"true\" aria-labelledby=\"registerModalTitle\">

\t\t<button class=\"modal-close\" type=\"button\" aria-label=\"Fermer\" id=\"closeRegisterModal\">×</button>

\t\t<!-- === ÉTAPE 1 : Choix social/email === -->
\t\t<div id=\"modal-step-social\" style=\"margin-top:-20px;\">
\t\t\t<h3 id=\"registerModalTitle\" class=\"modal-title\" style=\"font-weight:800; margin :21px;\">
\t\t\t\tLA FORCE SE CONSTRUIT. COMMENCE AUJOURD’HUI !
\t\t\t</h3>

\t\t<div class=\"modal-actions\">
    <div class=\"button-wrap-payment\">
        <a class=\"btn-payment\" href=\"{{ path('oauth_google_start') }}\">
            <img src=\"https://www.svgrepo.com/show/475656/google-color.svg\" alt=\"Google\" width=\"20\" height=\"20\">
            <span style=\"color:black;font-weight: 700;\">CONTINUER AVEC GOOGLE</span>
        </a>
        <div class=\"button-shadow\"></div>
    </div>

    <!--<div class=\"button-wrap-payment\">
        <a class=\"btn-payment\" href=\"#\">
            <img src=\"https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/apple.svg\" alt=\"Apple\" width=\"20\" height=\"20\">
            <span style=\"color:black;font-weight: 700;\">CONTINUER AVEC APPLE</span>
        </a>
        <div class=\"button-shadow\"></div>
    </div>

    <div class=\"button-wrap-payment\">
        <a class=\"btn-payment\" href=\"#\">
            <img src=\"{{ asset('images/facebook-icon.png') }}\" alt=\"Facebook\" width=\"20\" height=\"20\">
            <span style=\"color:black;font-weight: 700;\">CONTINUER AVEC FACEBOOK</span>
        </a>
        <div class=\"button-shadow\"></div>
    </div>-->
</div>

\t\t\t<div class=\"modal-divider\">
\t\t\t\t<span>ou</span>
\t\t\t</div>

\t\t\t<p class=\"modal-sep\">
\t\t\t\tInscris-toi avec ton
\t\t\t\t<a href=\"#\" id=\"js-switch-to-email\">Adresse e-mail</a>
\t\t\t</p>

\t\t\t<p class=\"modal-footer\">
\t\t\t\tTu as déjà un compte ?
\t\t\t\t<a href=\"#\" class=\"js-open-login-modal\">Se connecter</a>
\t\t\t</p>
\t\t</div>

\t\t<!-- === ÉTAPE 2 : Inscription par e-mail === -->
\t\t<div id=\"modal-step-email\" style=\"display:none; position: relative;\">
\t\t\t<div class=\"email-register-card\">
\t\t\t\t<h3 class=\"modal-title\" style=\"font-weight:800;line-height: 2.4;\">CRÉER UN COMPTE</h3>


\t\t\t\t<form id=\"emailRegisterForm\" class=\"email-register-form\" action=\"{{ path('app_register') }}\" method=\"POST\" novalidate>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"register-firstname\">Prénom</label>
\t\t\t\t\t\t<input type=\"text\" id=\"register-firstname\" name=\"registration_form[firstName]\" placeholder=\"Votre prénom\" required>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"register-lastname\">Nom</label>
\t\t\t\t\t\t<input type=\"text\" id=\"register-lastname\" name=\"registration_form[lastName]\" placeholder=\"Votre nom\" required>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"register-email\">Email</label>
\t\t\t\t\t\t<input type=\"email\" id=\"register-email\" name=\"registration_form[email]\" placeholder=\"exemple@email.com\" required>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-separator\">
\t\t\t\t\t\t<span>Informations de connexion</span>
\t\t\t\t\t</div>

\t\t\t\t\t<!-- === Bloc mot de passe === -->
\t\t\t\t\t<div
\t\t\t\t\t\tclass=\"form-group password-group\">

\t\t\t\t\t\t<!-- ✅ Sous-modale Critères du mot de passe -->
\t\t\t\t\t\t<div class=\"password-criteria-modal\" id=\"passwordRulesModal\">
\t\t\t\t\t\t\t<div class=\"password-criteria-content\">
\t\t\t\t\t\t\t\t<h2>Critères du mot de passe</h2>
\t\t\t\t\t\t\t\t<p class=\"password-rules-intro\">
\t\t\t\t\t\t\t\t\tConformément aux recommandations RGPD, ton mot de passe doit respecter ces critères
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tpour garantir une sécurité optimale de ton compte :
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t<li id=\"rule-length\">Au moins
\t\t\t\t\t\t\t\t\t\t<strong>12 caractères</strong>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li id=\"rule-uppercase\">Contenir
\t\t\t\t\t\t\t\t\t\t<strong>une majuscule</strong>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li id=\"rule-lowercase\">Contenir
\t\t\t\t\t\t\t\t\t\t<strong>une minuscule</strong>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li id=\"rule-number\">Contenir
\t\t\t\t\t\t\t\t\t\t<strong>un chiffre</strong>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li id=\"rule-special\">Contenir
\t\t\t\t\t\t\t\t\t\t<strong>un caractère spécial</strong>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t<button class=\"btn-close-rules\" id=\"closePasswordRules\">Fermer</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<!-- ✅ Label + lien critères -->
\t\t\t\t\t\t<div class=\"password-label-wrapper\">
\t\t\t\t\t\t\t<label for=\"register-password\">Mot de passe</label>
\t\t\t\t\t\t\t<span class=\"password-rules-link\" id=\"openPasswordRules\">Voir les critères</span>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"password-input-wrapper\">
\t\t\t\t\t\t\t<input type=\"password\" id=\"register-password\" name=\"registration_form[password][first]\" placeholder=\"Mot de passe\" required>
\t\t\t\t\t\t\t<span class=\"toggle-password\" data-target=\"register-password\">
\t\t\t\t\t\t\t\t<img src=\"{{ asset('images/eye/eye-open.png') }}\" alt=\"Afficher\" class=\"eye-open\" style=\"margin-top:12px;\">
\t\t\t\t\t\t\t\t<img src=\"{{ asset('images/eye/eye-closed.png') }}\" alt=\"Cacher\" class=\"eye-closed hide\" style=\"margin-top:12px;\">
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group password-group\">
\t\t\t\t\t\t<label for=\"register-confirm-password\">Confirmer le mot de passe</label>
\t\t\t\t\t\t<div class=\"password-input-wrapper\">
\t\t\t\t\t\t\t<input type=\"password\" id=\"register-confirm-password\" name=\"registration_form[password][second]\" placeholder=\"Confirmez le mot de passe\" required>
\t\t\t\t\t\t\t<span class=\"toggle-password\" data-target=\"register-confirm-password\">
\t\t\t\t\t\t\t\t<img src=\"{{ asset('images/eye/eye-open.png') }}\" alt=\"Afficher\" class=\"eye-open\" style=\"margin-top:12px;\">
\t\t\t\t\t\t\t\t<img src=\"{{ asset('images/eye/eye-closed.png') }}\" alt=\"Cacher\" class=\"eye-closed hide\" style=\"margin-top:12px;\">
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"checkbox-group\">
\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"registration_form[acceptedTerms]\" required>
\t\t\t\t\t\t\tEn m’inscrivant, j’accepte les
\t\t\t\t\t\t\t<a href=\"#\">Conditions générales</a>
\t\t\t\t\t\t\tet la
\t\t\t\t\t\t\t<a href=\"#\">Politique de confidentialité</a>.
\t\t\t\t\t\t</label>
\t\t\t\t\t</div>

\t\t\t\t\t<div id=\"form-error-message\" class=\"form-error-message\" style=\"display:none;\"></div>

\t\t\t\t\t<div class=\"form-group text-center mt-3\">
\t\t\t\t\t\t<div class=\"cf-turnstile\" data-sitekey=\"{{ turnstile_site_key }}\" data-theme=\"light\" data-size=\"normal\"></div>
\t\t\t\t\t</div>

\t\t\t\t\t<button type=\"submit\" class=\"btn-register\">
\t\t\t\t\t\t<span class=\"btn-text\">S'INSCRIRE</span>
\t\t\t\t\t\t<span class=\"btn-spinner\" style=\"display:none;\">
\t\t\t\t\t\t\t<div class=\"mini-spinner\"></div>
\t\t\t\t\t\t</span>
\t\t\t\t\t</button>

\t\t\t\t\t<p class=\"modal-footer\">
\t\t\t\t\t\t<a href=\"#\" id=\"js-back-to-social\">← Retour</a>
\t\t\t\t\t</p>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>

\t\t<!-- === ÉTAPE 3 : Vérification code === -->
\t\t<div id=\"modal-step-verify\" style=\"display:none;\">
\t\t\t<h3 class=\"modal-title\">Vérification de votre compte</h3>
\t\t\t<p class=\"modal-subtitle\">Entrez le code à 6 chiffres reçu par e-mail.</p>

\t\t\t<form id=\"verify-form\" action=\"{{ path('app_verify_code') }}\" method=\"POST\">
\t\t\t\t<div class=\"verify-code-inputs\">
\t\t\t\t\t{% for i in 1..6 %}
\t\t\t\t\t\t<input type=\"text\" maxlength=\"1\" inputmode=\"numeric\" class=\"code-input\" name=\"code_digit_{{ i }}\" data-index=\"{{ i }}\" required>
\t\t\t\t\t{% endfor %}
\t\t\t\t</div>

\t\t\t\t<input type=\"hidden\" name=\"code\" id=\"verify-full-code\">
\t\t\t\t<div id=\"verifyMessage\" class=\"verify-message\" style=\"display:none;\"></div>

\t\t\t\t<button type=\"submit\" id=\"verifyButton\" class=\"btn-register\">
\t\t\t\t\t<span class=\"btn-text\">Vérifier mon compte</span>
\t\t\t\t\t<span class=\"btn-spinner\" style=\"display:none;\">
\t\t\t\t\t\t<div class=\"mini-spinner\"></div>
\t\t\t\t\t</span>
\t\t\t\t</button>
\t\t\t</form>

\t\t\t<p class=\"resend\">
\t\t\t\tPas reçu ?
\t\t\t\t<a href=\"{{ path('app_resend_code') }}\" id=\"resendCodeLink\">Renvoyer un nouveau code</a>
\t\t\t</p>

\t\t\t<p class=\"modal-footer\">
\t\t\t\t<a href=\"#\" id=\"js-back-to-email\">← Retour à l’inscription</a>
\t\t\t</p>
\t\t</div>

\t\t<!-- === ÉTAPE 4 : Connexion === -->
\t\t<div id=\"modal-step-login\" style=\"display:none;\">
\t\t\t<h3 class=\"modal-title\" style=\"font-weight:800;line-height: 2.4;\">CONNEXION</h3>

\t\t\t<form id=\"login-form\" action=\"{{ path('app_login') }}\" method=\"POST\" novalidate>
\t\t\t\t<input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate') }}\">

\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"login-email\">Adresse e-mail</label>
\t\t\t\t\t<input type=\"email\" id=\"login-email\" name=\"email\" placeholder=\"exemple@email.com\" required>
\t\t\t\t</div>

\t\t\t\t<div class=\"form-group password-group\">
\t\t\t\t\t<label for=\"login-password\">Mot de passe</label>
\t\t\t\t\t<div class=\"password-input-wrapper\">
\t\t\t\t\t\t<input type=\"password\" id=\"login-password\" name=\"password\" placeholder=\"Votre mot de passe\" required>
\t\t\t\t\t\t<span class=\"toggle-password\" data-target=\"login-password\">
\t\t\t\t\t\t\t<img src=\"{{ asset('images/eye/eye-open.png') }}\" alt=\"Afficher\" class=\"eye-open\" style=\"margin-top:13px;\">
\t\t\t\t\t\t\t<img src=\"{{ asset('images/eye/eye-closed.png') }}\" alt=\"Cacher\" class=\"eye-closed hide\" style=\"margin-top:13px;\">
\t\t\t\t\t\t</span>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"checkbox-group remember-me\">
\t\t\t\t\t<label>
\t\t\t\t\t\t<input type=\"checkbox\" name=\"_remember_me\">
\t\t\t\t\t\tSe souvenir de moi
\t\t\t\t\t</label>
\t\t\t\t</div>

\t\t\t\t<!-- ✅ CAPTCHA Turnstile visible -->
\t\t\t\t<div class=\"form-group text-center mt-3\">
\t\t\t\t\t<div class=\"cf-turnstile\" data-sitekey=\"{{ turnstile_site_key }}\" data-theme=\"light\" data-size=\"normal\"></div>
\t\t\t\t</div>

\t\t\t\t<div id=\"loginError\" class=\"login-error\" style=\"display:none;\"></div>

\t\t\t\t<button type=\"submit\" id=\"loginButton\" class=\"btn-register\">
\t\t\t\t\t<span class=\"btn-text\">SE CONNECTER</span>
\t\t\t\t\t<span class=\"btn-spinner\" style=\"display:none;\">
\t\t\t\t\t\t<div class=\"mini-spinner\"></div>
\t\t\t\t\t</span>
\t\t\t\t</button>
\t\t\t</form>

\t\t\t<p class=\"forgot-password\">
\t\t\t\t<a href=\"#\" id=\"js-forgot-password\" class=\"js-open-reset-modal\">Mot de passe oublié ?</a>
\t\t\t</p>
\t\t\t<p class=\"modal-back\">
\t\t\t\t<a href=\"#\" id=\"js-back-to-social-login\" style=\"color:#005b94;text-decoration: none;\">← Retour à l’accueil</a>
\t\t\t</p>
\t\t</div>

\t\t<!-- ✅ Script Turnstile -->


\t\t<!-- === ÉTAPE 5 : Mot de passe oublié === -->
\t\t<div id=\"modal-step-reset-email\" style=\"display:none; text-align:center;\">
\t\t\t<h3 class=\"modal-title\" style=\"font-weight:800;line-height: 2.4;\">MOT DE PASSE OUBLIÉ</h3>
\t\t\t<p class=\"modal-subtitle\">Entrez votre adresse e-mail pour recevoir un lien de réinitialisation.</p>

\t\t\t<div id=\"resetError\" class=\"verify-message\" style=\"display:none;\"></div>

\t\t\t<form id=\"resetRequestForm\" action=\"{{ path('app_reset_password_request') }}\" method=\"POST\" novalidate>
\t\t\t\t<input type=\"email\" name=\"email\" id=\"resetEmail\" placeholder=\"Votre adresse e-mail\" required>
\t\t\t\t<button type=\"submit\" id=\"resetRequestBtn\" class=\"btn-register\" style=\"margin-right:53px;\">
\t\t\t\t\t<span class=\"btn-text\">ENVOYER</span>
\t\t\t\t\t<span class=\"btn-spinner\" style=\"display:none;\">
\t\t\t\t\t\t<span class=\"mini-spinner\"></span>
\t\t\t\t\t</span>
\t\t\t\t</button>
\t\t\t</form>

\t\t\t<p class=\"modal-footer\">
\t\t\t\t<a href=\"#\" id=\"js-back-to-login\" style=\"margin-top:8px;\">← Retour à la connexion</a>
\t\t\t</p>
\t\t</div>

\t\t<!-- === ÉTAPE 6 : Nouveau mot de passe === -->
\t\t<div id=\"modal-step-reset-new\" style=\"display:none; text-align:center;\">
\t\t\t<h3 class=\"modal-title\" style=\"font-weight:800;\">NOUVEAU MOT DE PASSE</h3>
\t\t\t<p class=\"modal-subtitle\">Saisissez votre nouveau mot de passe.</p>

\t\t\t<div id=\"resetNewError\" class=\"verify-message\" style=\"display:none;\"></div>

\t\t\t<form id=\"resetNewForm\" action=\"{{ path('app_reset_password_final') }}\" method=\"POST\" novalidate>
\t\t\t\t<input
\t\t\t\ttype=\"hidden\" id=\"resetToken\" name=\"token\" value=\"\">

\t\t\t\t<!-- Champ : nouveau mot de passe -->
\t\t\t\t<div class=\"password-group\">
\t\t\t\t\t<div class=\"password-input-wrapper\">
\t\t\t\t\t\t<input type=\"password\" id=\"newPassword\" name=\"newPassword\" placeholder=\"Nouveau mot de passe\" minlength=\"12\" maxlength=\"64\" required style=\"margin-left:14px;\">
\t\t\t\t\t\t<span class=\"toggle-password\" data-target=\"newPassword\">
\t\t\t\t\t\t\t<img class=\"eye-open\" src=\"{{ asset('images/eye/eye-open.png') }}\" alt=\"Afficher\" style=\"margin-right:10px;margin-top:-10px\">
\t\t\t\t\t\t\t<img class=\"eye-closed hide\" src=\"{{ asset('images/eye/eye-closed.png') }}\" alt=\"Cacher\" style=\"margin-right:10px;margin-top:-10px\">
\t\t\t\t\t\t</span>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<!-- Champ : confirmation -->
\t\t\t\t<div class=\"password-group\">
\t\t\t\t\t<div class=\"password-input-wrapper\">
\t\t\t\t\t\t<input type=\"password\" id=\"confirmPassword\" name=\"confirmPassword\" placeholder=\"Confirmer le mot de passe\" minlength=\"12\" maxlength=\"64\" required style=\"margin-left:14px;\">
\t\t\t\t\t\t<span class=\"toggle-password\" data-target=\"confirmPassword\">
\t\t\t\t\t\t\t<img class=\"eye-open\" src=\"{{ asset('images/eye/eye-open.png') }}\" alt=\"Afficher\" style=\"margin-right:10px;margin-top:-10px\">
\t\t\t\t\t\t\t<img class=\"eye-closed hide\" src=\"{{ asset('images/eye/eye-closed.png') }}\" alt=\"Cacher\" style=\"margin-right:10px;margin-top:-10px\">
\t\t\t\t\t\t</span>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<!-- Bouton -->
\t\t\t\t<button type=\"submit\" id=\"resetNewBtn\" class=\"btn-register\" style=\"margin-top:15px;\">
\t\t\t\t\t<span class=\"btn-text\">CHANGER LE MOT DE PASSE</span>
\t\t\t\t\t<span class=\"btn-spinner\" style=\"display:none;\">
\t\t\t\t\t\t<span class=\"mini-spinner\"></span>
\t\t\t\t\t</span>
\t\t\t\t</button>
\t\t\t</form>

\t\t\t<p class=\"modal-footer\" style=\"margin-top:20px;\">
\t\t\t\t<a href=\"#\" id=\"js-back-to-login-from-reset\" style=\"text-decoration:none;\">← Retour à la connexion</a>
\t\t\t</p>
\t\t</div>
\t</div>
</div>

{# === ETAPE 2b : Set password modal si app.user.getNeedsPassword() === #}
{% if app.user and app.user.getNeedsPassword() %}
<div class=\"modal-overlay is-open\" id=\"setPasswordModal\" aria-hidden=\"false\">
<div class=\"modal-card modal-card-set-password\" role=\"dialog\" aria-modal=\"true\" aria-labelledby=\"setPasswordTitle\">

        <div class=\"modal-logo\">
            <img src=\"{{ asset('images/favicon/icon.png') }}\" alt=\"Logo\" />
        </div>

        <h3 id=\"setPasswordTitle\" class=\"modal-title\">Définir votre mot de passe</h3>
        <p class=\"modal-subtitle\">Assurez-vous de choisir un mot de passe sécurisé pour protéger votre compte.</p>

{% for message in app.flashes('error') %}
    <div class=\"form-error-message set-password-error\">{{ message|raw }}</div>
{% endfor %}


        <form action=\"{{ path('set_password') }}\" method=\"POST\" class=\"email-register-form\" novalidate>
            <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('set_password') }}\">

            <div class=\"form-group password-group\">
                <label for=\"password\">Mot de passe</label>
                <div class=\"password-input-wrapper\">
                    <input type=\"password\" id=\"password\" name=\"password\" placeholder=\"Mot de passe\" required>
                    <span class=\"toggle-password\" data-target=\"password\">
                        <img class=\"eye-open\" src=\"{{ asset('images/eye/eye-open.png') }}\" alt=\"Afficher\">
                        <img class=\"eye-closed hide\" src=\"{{ asset('images/eye/eye-closed.png') }}\" alt=\"Cacher\">
                    </span>
                </div>
            </div>

            <div class=\"form-group password-group\">
                <label for=\"confirm_password\">Confirmer le mot de passe</label>
                <div class=\"password-input-wrapper\">
                    <input type=\"password\" id=\"confirm_password\" name=\"confirm_password\" placeholder=\"Confirmez le mot de passe\" required>
                    <span class=\"toggle-password\" data-target=\"confirm_password\">
                        <img class=\"eye-open\" src=\"{{ asset('images/eye/eye-open.png') }}\" alt=\"Afficher\">
                        <img class=\"eye-closed hide\" src=\"{{ asset('images/eye/eye-closed.png') }}\" alt=\"Cacher\">
                    </span>
                </div>
            </div>

            <div class=\"checkbox-group\">
                <label>
                    <input type=\"checkbox\" name=\"acceptedTerms\" required>
                    J’accepte les <a href=\"#\">Conditions générales</a> et la <a href=\"#\">Politique de confidentialité</a>.
                </label>
            </div>

            <button type=\"submit\" class=\"btn-register\">Enregistrer</button>
        </form>
    </div>
</div>
{% endif %}", "modal/modal_auth.html.twig", "/Users/dheillyenzo/projet-chm/templates/modal/modal_auth.html.twig");
    }
}
