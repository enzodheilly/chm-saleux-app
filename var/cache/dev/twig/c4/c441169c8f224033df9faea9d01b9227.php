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

/* footer/footer.html.twig */
class __TwigTemplate_ad0739463ac62f6dac2df592501c0307 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "footer/footer.html.twig"));

        // line 1
        yield "<footer class=\"footer-chm\">

    ";
        // line 3
        if ((($tmp =  !array_key_exists("isSubscribed", $context)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 4
            yield "        ";
            $context["isSubscribed"] = false;
            // line 5
            yield "    ";
        }
        // line 6
        yield "    ";
        if ((($tmp =  !array_key_exists("subscriber", $context)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 7
            yield "        ";
            $context["subscriber"] = null;
            // line 8
            yield "    ";
        }
        // line 9
        yield "
    <div class=\"footer-main\">

        <!-- Logo + texte -->
        <div class=\"footer-column footer-brand\">
            <img src=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/favicon/icon2.png"), "html", null, true);
        yield "\" alt=\"CHM Saleux Logo\" class=\"footer-logo\">
<p>
    Repoussez vos limites, vivez votre passion.
</p>
        </div>

        <!-- Mini plan du site -->
        <div class=\"footer-column footer-nav\">
            <h4>Plan du site</h4>
            <ul>
                <li><a href=\"#\">Accueil</a></li>
                <li><a href=\"#\">Club et membres du bureau</a></li>
                <li><a href=\"#\">Nos tarifs</a></li>
                <li><a href=\"#\">Notre école</a></li>
                <li><a href=\"#\">Compétitions & résultats</a></li>
                <li><a href=\"#\">Nous contacter</a></li>
            </ul>
        </div>

        <!-- Newsletter (prend le reste de l'espace) -->
        <div class=\"footer-column-newsletter\" style=\"flex:1\">
            <h4>Inscription à la newsletter du CHM Saleux</h4>

            ";
        // line 37
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 37, $this->source); })()), "user", [], "any", false, false, false, 37) && (isset($context["isSubscribed"]) || array_key_exists("isSubscribed", $context) ? $context["isSubscribed"] : (function () { throw new RuntimeError('Variable "isSubscribed" does not exist.', 37, $this->source); })()))) {
            // line 38
            yield "                <p class=\"already-subscribed\">
                    ✅ Vous êtes déjà abonné avec
                    <strong>";
            // line 40
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 40, $this->source); })()), "user", [], "any", false, false, false, 40), "email", [], "any", false, false, false, 40), "html", null, true);
            yield "</strong>.<br>
                    <a href=\"";
            // line 41
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("newsletter_unsubscribe", ["token" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["subscriber"]) || array_key_exists("subscriber", $context) ? $context["subscriber"] : (function () { throw new RuntimeError('Variable "subscriber" does not exist.', 41, $this->source); })()), "unsubscribeToken", [], "any", false, false, false, 41)]), "html", null, true);
            yield "\"
                       class=\"unsubscribe-link\">
                        Se désabonner
                    </a>
                </p>

            ";
        } else {
            // line 48
            yield "                <p class=\"texte\">Recevez les actualités et événements du CHM directement dans votre boîte mail.</p>

                <form id=\"newsletter-form\" method=\"POST\" action=\"";
            // line 50
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("newsletter_subscribe");
            yield "\">
                    <input type=\"hidden\" name=\"_csrf_token\" value=\"";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("newsletter"), "html", null, true);
            yield "\">

                    <div class=\"newsletter-inputs\">
                        <input type=\"email\" name=\"email\" placeholder=\"Votre email\"
                               value=\"";
            // line 55
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 55, $this->source); })()), "user", [], "any", false, false, false, 55)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 55, $this->source); })()), "user", [], "any", false, false, false, 55), "email", [], "any", false, false, false, 55), "html", null, true)) : (""));
            yield "\" required>

                        <div class=\"button-wrap\">
                            <button type=\"submit\" id=\"newsletter-submit\" class=\"btn-club btn-newsletter\">
                                <span class=\"btn-text\" style=\"color:white;\">S’ABONNER</span>

                                <span class=\"icon-layer\">
                                    <span class=\"spinner\"></span>
                                    <span class=\"checkmark\">✔</span>
                                </span>
                            </button>

                            <div class=\"button-shadow\"></div>
                        </div>

                    </div>

                    <div id=\"turnstile-newsletter\"
                         class=\"cf-turnstile cf-turnstile-newsletter\"
                         data-sitekey=\"";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["turnstile_site_key"]) || array_key_exists("turnstile_site_key", $context) ? $context["turnstile_site_key"] : (function () { throw new RuntimeError('Variable "turnstile_site_key" does not exist.', 74, $this->source); })()), "html", null, true);
            yield "\">
                    </div>

                    <div id=\"newsletterSuccess\" class=\"newsletter-feedback newsletter-success\"></div>
                    <div id=\"newsletterError\" class=\"newsletter-feedback newsletter-error\"></div>
                </form>

                <p class=\"newsletter-footer-text\">
    Vous pouvez vous désabonner à tout moment. Pour en savoir plus sur la protection de vos données, veuillez 
    <a href=\"";
            // line 83
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("page_show", ["slug" => "confidentialite"]);
            yield "\">cliquer ici</a>.
</p>

            ";
        }
        // line 87
        yield "        </div>

    </div>

    <!-- FULL WIDTH BANDE PAIEMENT + RÉSEAUX -->
    <div class=\"footer-payments-wrapper\">
        <div class=\"payments-inner\">

            <div class=\"payments-block\">
                <h4>Moyens de paiement acceptés</h4>
                <div class=\"payment-icons\">
                    <img src=\"";
        // line 98
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/payments/visa.png"), "html", null, true);
        yield "\" alt=\"Visa\">
                    <img src=\"";
        // line 99
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/payments/mastercard.png"), "html", null, true);
        yield "\" alt=\"Mastercard\">
                    <img src=\"";
        // line 100
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/payments/google.png"), "html", null, true);
        yield "\" alt=\"Google Pay\">
                    <img src=\"";
        // line 101
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/payments/apple.png"), "html", null, true);
        yield "\" alt=\"Apple Pay\">
                </div>
            </div>

            <div class=\"socials-block\">
                <h4>Suivez-nous</h4>
                <div class=\"social-icons\">
                    <a href=\"#\" aria-label=\"Facebook\"><i class=\"fab fa-facebook-f\"></i></a>
                    <a href=\"#\" aria-label=\"Instagram\"><i class=\"fab fa-instagram\"></i></a>
                    <a href=\"#\" aria-label=\"YouTube\"><i class=\"fab fa-youtube\"></i></a>
                </div>
            </div>

        </div>
    </div>

    <!-- Bas du footer -->
    <div class=\"footer-bottom\">
        <div class=\"footer-left\">
            &copy; 2025 CHM SALEUX — Tous droits réservés
        </div>

        <div class=\"footer-right\">
            <a href=\"";
        // line 124
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("page_show", ["slug" => "mentions-legales"]);
        yield "\">Mentions légales</a>
            <a href=\"";
        // line 125
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("page_show", ["slug" => "conditions-utilisation"]);
        yield "\">Conditions d’utilisation</a>
            <a href=\"";
        // line 126
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("page_show", ["slug" => "confidentialite"]);
        yield "\">Confidentialité</a>
            <a href=\"";
        // line 127
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("page_show", ["slug" => "cookies"]);
        yield "\">Cookies</a>
        </div>
    </div>

</footer>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "footer/footer.html.twig";
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
        return array (  238 => 127,  234 => 126,  230 => 125,  226 => 124,  200 => 101,  196 => 100,  192 => 99,  188 => 98,  175 => 87,  168 => 83,  156 => 74,  134 => 55,  127 => 51,  123 => 50,  119 => 48,  109 => 41,  105 => 40,  101 => 38,  99 => 37,  73 => 14,  66 => 9,  63 => 8,  60 => 7,  57 => 6,  54 => 5,  51 => 4,  49 => 3,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<footer class=\"footer-chm\">

    {% if isSubscribed is not defined %}
        {% set isSubscribed = false %}
    {% endif %}
    {% if subscriber is not defined %}
        {% set subscriber = null %}
    {% endif %}

    <div class=\"footer-main\">

        <!-- Logo + texte -->
        <div class=\"footer-column footer-brand\">
            <img src=\"{{ asset('images/favicon/icon2.png') }}\" alt=\"CHM Saleux Logo\" class=\"footer-logo\">
<p>
    Repoussez vos limites, vivez votre passion.
</p>
        </div>

        <!-- Mini plan du site -->
        <div class=\"footer-column footer-nav\">
            <h4>Plan du site</h4>
            <ul>
                <li><a href=\"#\">Accueil</a></li>
                <li><a href=\"#\">Club et membres du bureau</a></li>
                <li><a href=\"#\">Nos tarifs</a></li>
                <li><a href=\"#\">Notre école</a></li>
                <li><a href=\"#\">Compétitions & résultats</a></li>
                <li><a href=\"#\">Nous contacter</a></li>
            </ul>
        </div>

        <!-- Newsletter (prend le reste de l'espace) -->
        <div class=\"footer-column-newsletter\" style=\"flex:1\">
            <h4>Inscription à la newsletter du CHM Saleux</h4>

            {% if app.user and isSubscribed %}
                <p class=\"already-subscribed\">
                    ✅ Vous êtes déjà abonné avec
                    <strong>{{ app.user.email }}</strong>.<br>
                    <a href=\"{{ path('newsletter_unsubscribe', {'token': subscriber.unsubscribeToken}) }}\"
                       class=\"unsubscribe-link\">
                        Se désabonner
                    </a>
                </p>

            {% else %}
                <p class=\"texte\">Recevez les actualités et événements du CHM directement dans votre boîte mail.</p>

                <form id=\"newsletter-form\" method=\"POST\" action=\"{{ path('newsletter_subscribe') }}\">
                    <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('newsletter') }}\">

                    <div class=\"newsletter-inputs\">
                        <input type=\"email\" name=\"email\" placeholder=\"Votre email\"
                               value=\"{{ app.user ? app.user.email : '' }}\" required>

                        <div class=\"button-wrap\">
                            <button type=\"submit\" id=\"newsletter-submit\" class=\"btn-club btn-newsletter\">
                                <span class=\"btn-text\" style=\"color:white;\">S’ABONNER</span>

                                <span class=\"icon-layer\">
                                    <span class=\"spinner\"></span>
                                    <span class=\"checkmark\">✔</span>
                                </span>
                            </button>

                            <div class=\"button-shadow\"></div>
                        </div>

                    </div>

                    <div id=\"turnstile-newsletter\"
                         class=\"cf-turnstile cf-turnstile-newsletter\"
                         data-sitekey=\"{{ turnstile_site_key }}\">
                    </div>

                    <div id=\"newsletterSuccess\" class=\"newsletter-feedback newsletter-success\"></div>
                    <div id=\"newsletterError\" class=\"newsletter-feedback newsletter-error\"></div>
                </form>

                <p class=\"newsletter-footer-text\">
    Vous pouvez vous désabonner à tout moment. Pour en savoir plus sur la protection de vos données, veuillez 
    <a href=\"{{ path('page_show', {'slug': 'confidentialite'}) }}\">cliquer ici</a>.
</p>

            {% endif %}
        </div>

    </div>

    <!-- FULL WIDTH BANDE PAIEMENT + RÉSEAUX -->
    <div class=\"footer-payments-wrapper\">
        <div class=\"payments-inner\">

            <div class=\"payments-block\">
                <h4>Moyens de paiement acceptés</h4>
                <div class=\"payment-icons\">
                    <img src=\"{{ asset('images/payments/visa.png') }}\" alt=\"Visa\">
                    <img src=\"{{ asset('images/payments/mastercard.png') }}\" alt=\"Mastercard\">
                    <img src=\"{{ asset('images/payments/google.png') }}\" alt=\"Google Pay\">
                    <img src=\"{{ asset('images/payments/apple.png') }}\" alt=\"Apple Pay\">
                </div>
            </div>

            <div class=\"socials-block\">
                <h4>Suivez-nous</h4>
                <div class=\"social-icons\">
                    <a href=\"#\" aria-label=\"Facebook\"><i class=\"fab fa-facebook-f\"></i></a>
                    <a href=\"#\" aria-label=\"Instagram\"><i class=\"fab fa-instagram\"></i></a>
                    <a href=\"#\" aria-label=\"YouTube\"><i class=\"fab fa-youtube\"></i></a>
                </div>
            </div>

        </div>
    </div>

    <!-- Bas du footer -->
    <div class=\"footer-bottom\">
        <div class=\"footer-left\">
            &copy; 2025 CHM SALEUX — Tous droits réservés
        </div>

        <div class=\"footer-right\">
            <a href=\"{{ path('page_show', {'slug': 'mentions-legales'}) }}\">Mentions légales</a>
            <a href=\"{{ path('page_show', {'slug': 'conditions-utilisation'}) }}\">Conditions d’utilisation</a>
            <a href=\"{{ path('page_show', {'slug': 'confidentialite'}) }}\">Confidentialité</a>
            <a href=\"{{ path('page_show', {'slug': 'cookies'}) }}\">Cookies</a>
        </div>
    </div>

</footer>
", "footer/footer.html.twig", "/Users/dheillyenzo/projet-chm/templates/footer/footer.html.twig");
    }
}
