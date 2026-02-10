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

/* pricing/index.html.twig */
class __TwigTemplate_4c707df4d6123a24b9d018f6fcd013b9 extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pricing/index.html.twig"));

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

        yield "Tarifs & Avantages - CHM SALEUX";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <style>
        /* ========================================================= */
        /* ======================= VARIABLES ======================= */
        /* ========================================================= */
        :root { 
            --color: #005b94; 
        }

        /* ========================================================= */
        /* ======================= HEADER HERO ===================== */
        /* ========================================================= */
        .hero-header {
            position: relative;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            overflow: hidden;
        }
        .hero-header::before {
            content: \"\"; position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.5); z-index: 1; pointer-events: none;
        }
        .hero-content {
            max-width: 900px; padding: 2rem; animation: fadeInUp 1.2s ease-out;
            z-index: 2; margin-top: 140px;
        }
        .hero-content h1 {
            font-size: 3.5rem; font-weight: 900; text-transform: uppercase; margin-bottom: 1.5rem;
        }
        .hero-content p {
            font-size: 1.1rem; margin-bottom: 2rem; color: #CBD5E1; font-weight: 500;
        }
        .back-button {
            position: absolute; top: 155px; left: 100px; z-index: 10;
            display: inline-flex; align-items: center; gap: 10px;
            font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, sans-serif;
            font-size: 15px; font-weight: 500; text-decoration: none; color: #ffffff;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        /* ========================================================= */
        /* ==================== STRUCTURE GLOBALE ================== */
        /* ========================================================= */
        .section-white { background: #fff; padding: 80px 20px; }
        .section-light { background: #f8fafc; padding: 80px 20px; }
        
        .section-title {
            text-align: center; font-size: 2.2rem; font-weight: 900; color: #1e293b;
            text-transform: uppercase; margin-bottom: 10px; letter-spacing: -1px;
        }
        .section-subtitle {
            text-align: center; color: #475569; font-size: 1.1rem; max-width: 600px; margin: 0 auto 50px; font-weight: 500;
        }

        /* ========================================================= */
        /* ==================== BOUTONS (TOGGLE) =================== */
        /* ========================================================= */
        /* Style importé et adapté */
        .segmented-toggle {
            position: relative;
            width: 240px;
            height: 55px;
            border: 2px solid var(--color);
            border-radius: 60px;
            display: flex;
            margin: 0 auto 50px; /* Centré avec marge bas */
            background-color: #F5F5F5;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            padding: 0;
            overflow: hidden;
            font-weight: 700;
        }
        .segmented-toggle input {
            position: absolute; width: 100%; height: 100%; opacity: 0; cursor: pointer; z-index: 10;
        }
        .toggle-bg {
            position: absolute; width: 50%; height: 100%; background: var(--color); border-radius: 60px; top: 0; left: 0; transition: transform 0.3s ease; z-index: 1;
        }
        .toggle-option {
            width: 50%; text-align: center; z-index: 2; font-size: 16px; pointer-events: none;
        }
        /* Couleurs du toggle (adapté fond clair) */
        .left { color: var(--color); transition: color 0.3s; }
        .right { color: var(--color); transition: color 0.3s; }
        
        /* Actions Toggle */
        .segmented-toggle input:checked ~ .toggle-bg { transform: translateX(100%); }
        .segmented-toggle input:not(:checked) ~ .left { color: #fff; }
        .segmented-toggle input:checked ~ .right { color: #fff; }

        /* ========================================================= */
        /* ==================== CARDS ABONNEMENTS ================== */
        /* ========================================================= */
        /* Grille */
        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(260px, 1fr));
            gap: 1.8rem;
            max-width: 1140px;
            margin: 0 auto;
            justify-content: center;
        }

        /* Carte Base */
        .card {
            position: relative;
            background: #F5F5F5; /* Fond gris clair comme demandé */
            padding: 2.2rem 2rem;
            border-radius: 8px;
            border: none;
            text-align: center;
            align-items: center;
            display: flex;
            flex-direction: column;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.35s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }

        /* Carte Featured (Populaire) */
        .card-featured {
            border: 2px solid #fbbf24;
            z-index: 2;
            transform: scale(1.05);
        }
        .card-featured:hover { transform: scale(1.05) translateY(-5px); }

        /* Badge Populaire */
        .badge-featured {
            position: absolute;
            top: -14px;
            right: -14px;
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: #2b2b2b;
            font-weight: 900;
            font-size: 0.75rem;
            padding: 0.45rem 0.5rem;
            border-radius: 6px;
            text-transform: uppercase;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        /* Titre Carte */
        .card-title {
            font-size: 1.4rem;
            font-weight: 900;
            margin-bottom: 1rem;
            text-transform: uppercase;
            color: #2b2b2b;
        }

        /* Prix */
        .price-row {
            display: flex;
            align-items: flex-end;
            justify-content: center;
            gap: 0.3rem;
            margin-bottom: 1rem;
            width: 100%;
            color: #2b2b2b;
        }
        .price3 {
            font-size: 2.4rem;
            font-weight: 1000;
            line-height: 0.8;
            display: flex;
        }
        .price3 sup {
            font-size: 1.1rem;
            vertical-align: top;
            margin-top: 5px;
        }
        .period {
            font-size: 0.95rem;
            color: #6b7280;
            margin-left: 2px;
            line-height: 1.2;
            padding-bottom: 5px;
        }
        .subprice3 {
            font-size: 0.85rem;
            color: #6b7280;
            margin-bottom: 1rem;
            height: 20px;
        }

        /* Trial Box (Séance essai) */
        .trial-box {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin: 0 auto 1.5rem;
            padding: 0.5rem 1rem;
            background: #fff7ed;
            border: 2px solid #f59e0b;
            border-radius: 5px;
            font-size: 0.9rem;
            font-weight: 700;
            color: #2b2b2b;
            width: 100%;
        }
        .trial-box i { color: #e63946; }

        /* Liste Avantages */
        .features {
            list-style: none;
            padding: 0;
            margin: 0 0 1.6rem;
            text-align: left;
            width: 100%;
        }
        .features li {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 0.8rem;
            padding: 0.6rem 0;
            font-size: 0.95rem;
            font-weight: 600;
            color: #374151;
            border-bottom: 1px dashed #e5e7eb;
        }
        .features li:last-child { border-bottom: none; }
        .feature-icon {
            width: 18px;
            height: 18px;
            color: #005b94;
            text-align: center;
        }

        /* Bouton Inscription */
        .btn-classic {
            display: block;
            width: 100%;
            padding: 15px;
            border-radius: 8px;
            font-weight: 700;
            text-decoration: none;
            text-transform: uppercase;
            text-align: center;
            transition: 0.3s;
            margin-top: auto;
            border: 2px solid transparent;
        }

        /* Couleurs spécifiques par carte (Standard / Etudiant / etc.) */
        .card:nth-child(1) { border-top: 5px solid #334155; }
        .card:nth-child(1) .btn-classic { background: #334155; color: white; }
        .card:nth-child(1) .btn-classic:hover { background: transparent; color: #334155; border-color: #334155; }

        .card:nth-child(2) { border-top: 5px solid #005b94; }
        .card:nth-child(2) .btn-classic { background: #005b94; color: white; }
        .card:nth-child(2) .btn-classic:hover { background: transparent; color: #005b94; border-color: #005b94; }

        .card:nth-child(3) { border-top: 5px solid #fbbf24; }
        .card:nth-child(3) .btn-classic { background: #fbbf24; color: #1e293b; }
        .card:nth-child(3) .btn-classic:hover { background: transparent; color: #fbbf24; border-color: #fbbf24; }


        /* ========================================================= */
        /* ==================== AUTRES SECTIONS ==================== */
        /* ========================================================= */
        
        /* Parallaxe */
        .parallax-divider {
            position: relative; height: 400px;
            background-attachment: fixed; background-position: center;
            background-repeat: no-repeat; background-size: cover;
            display: flex; align-items: center; justify-content: center;
        }
        .parallax-overlay { position: absolute; inset: 0; background: rgba(0, 0, 0, 0.6); }
        .parallax-content { position: relative; z-index: 2; text-align: center; color: white; }
        .parallax-content h2 { font-size: 3rem; font-weight: 900; text-transform: uppercase; margin: 0; letter-spacing: 2px; }
        .parallax-content p { font-size: 1.2rem; margin-top: 10px; font-weight: 300; opacity: 0.9; }

        /* Infos Grid (Famille/Compétition) */
        .info-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 30px; max-width: 1100px; margin: 0 auto; }
        .info-card { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border-left: 5px solid #e2e8f0; }
        .info-card.family { border-left-color: #005b94; }
        .info-card.comp { border-left-color: #fbbf24; }
        .info-icon { font-size: 2rem; margin-bottom: 20px; }

        /* Table */
        .custom-table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .custom-table th { background: #005b94; color: white; padding: 15px; text-transform: uppercase; font-size: 0.9rem; }
        .custom-table td { padding: 15px; border-bottom: 1px solid #f1f5f9; color: #334155; }
        .custom-table tr:last-child td { border-bottom: none; }
        .table-container { max-width: 1000px; margin: 0 auto; overflow-x: auto; border-radius: 10px; overflow: hidden; border: 1px solid #e2e8f0; }

        /* Footer Payment */
        .payment-footer { background: #0f172a; color: white; padding: 60px 20px; text-align: center; }
        .payment-icons { font-size: 2.5rem; margin: 20px 0; display: flex; justify-content: center; gap: 40px; color: #94a3b8; }
        .payment-icons i { transition: 0.3s; }
        .payment-icons i:hover { color: white; transform: scale(1.1); }

        /* Responsive */
        @media (max-width: 1100px) {
            .pricing-grid { grid-template-columns: repeat(2, 1fr); max-width: 700px; }
            .info-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 768px) {
            .pricing-grid { grid-template-columns: 1fr; padding: 0; }
            .card-featured { transform: scale(1); }
            .card-featured:hover { transform: scale(1); }
            .hero-content h1 { font-size: 2rem; }
            .back-button { top: 20px; left: 20px; }
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 326
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 327
        yield "
<header class=\"hero-header\" style=\"
    background-image: url('";
        // line 329
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/90.jpg"), "html", null, true);
        yield "');
    background-size: cover;
    background-position: center 20%;
\">
    <a href=\"";
        // line 333
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\" class=\"back-button\">
         <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2.5\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15 19l-7-7 7-7\" />
         </svg>
         Home
    </a>

    <div class=\"hero-content\">
         <h1>Tarifs & Adhésions</h1>
        <p>Une structure de qualité pour tous les niveaux. Rejoignez le CHM Saleux dès aujourd'hui.</p>
    </div>
</header>

<section class=\"section-white\">
    <div class=\"container\">
        <h2 class=\"section-title\">Choisissez votre formule</h2>
        <p class=\"section-subtitle\">Tarifs fixes pour la saison 2025 / 2026. Accès illimité aux équipements.</p>

        <div class=\"segmented-toggle\">
            <input type=\"checkbox\" id=\"toggle\" />
            <div class=\"toggle-bg\"></div>
            <div class=\"toggle-option left\">Standard</div>
            <div class=\"toggle-option right\">Étudiant / -18</div>
        </div>

        <div class=\"pricing-grid\">
            
            ";
        // line 361
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["plans"]) || array_key_exists("plans", $context) ? $context["plans"] : (function () { throw new RuntimeError('Variable "plans" does not exist.', 361, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["plan"]) {
            // line 362
            yield "            <article class=\"card ";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "isPopular", [], "any", false, false, false, 362)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("card-featured") : (""));
            yield "\">
                
                ";
            // line 365
            yield "                ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "isPopular", [], "any", false, false, false, 365)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 366
                yield "                    <span class=\"badge-featured\">Le plus populaire</span>
                ";
            }
            // line 368
            yield "                
                <h3 class=\"card-title\">";
            // line 369
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "nom", [], "any", false, false, false, 369)), "html", null, true);
            yield "</h3>

                <div class=\"price-row\">
                    ";
            // line 373
            yield "                    ";
            $context["priceParts"] = Twig\Extension\CoreExtension::split($this->env->getCharset(), $this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "prix", [], "any", false, false, false, 373), 2, ".", ","), ".");
            // line 374
            yield "                    
                    ";
            // line 376
            yield "                    ";
            // line 377
            yield "                    ";
            $context["studentPrice"] = CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "prix", [], "any", false, false, false, 377);
            // line 378
            yield "                    
                    ";
            // line 380
            yield "                    ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "prix", [], "any", false, false, false, 380) >= 195)) {
                // line 381
                yield "                        ";
                $context["studentPrice"] = 185;
                // line 382
                yield "                    ";
                // line 383
                yield "                    ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "prix_etudiant", [], "any", true, true, false, 383) && CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "prix_etudiant", [], "any", false, false, false, 383))) {
                // line 384
                yield "                        ";
                $context["studentPrice"] = CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "prix_etudiant", [], "any", false, false, false, 384);
                // line 385
                yield "                    ";
            }
            // line 386
            yield "
                    ";
            // line 388
            yield "                    <div class=\"price3\">
                        <span class=\"dynamic-price\" 
                              data-standard=\"";
            // line 390
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "prix", [], "any", false, false, false, 390), "html", null, true);
            yield "\" 
                              data-student=\"";
            // line 391
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["studentPrice"]) || array_key_exists("studentPrice", $context) ? $context["studentPrice"] : (function () { throw new RuntimeError('Variable "studentPrice" does not exist.', 391, $this->source); })()), "html", null, true);
            yield "\">
                            ";
            // line 392
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["priceParts"]) || array_key_exists("priceParts", $context) ? $context["priceParts"] : (function () { throw new RuntimeError('Variable "priceParts" does not exist.', 392, $this->source); })()), 0, [], "array", false, false, false, 392), "html", null, true);
            yield "
                        </span>
                        €<sup>";
            // line 394
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["priceParts"]) || array_key_exists("priceParts", $context) ? $context["priceParts"] : (function () { throw new RuntimeError('Variable "priceParts" does not exist.', 394, $this->source); })()), 1, [], "array", false, false, false, 394), "html", null, true);
            yield "</sup>
                    </div>
                    
                    <span class=\"period\">";
            // line 397
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "frequence", [], "any", true, true, false, 397)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "frequence", [], "any", false, false, false, 397), "/ an")) : ("/ an")), "html", null, true);
            yield "</span>
                </div>

                ";
            // line 401
            yield "                ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "mensualite", [], "any", false, false, false, 401)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 402
                yield "                    <div class=\"subprice3\">Soit ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "mensualite", [], "any", false, false, false, 402), 2, ",", " "), "html", null, true);
                yield "€/mois</div>
                ";
            } else {
                // line 404
                yield "                    <div class=\"subprice3\" style=\"visibility: hidden;\">-</div>
                ";
            }
            // line 406
            yield "
                <div class=\"trial-box\">
                    <i class=\"fa-solid fa-check\"></i> Séance d’essai incluse
                </div>

                <ul class=\"features\">
                    ";
            // line 412
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "avantages", [], "any", false, false, false, 412));
            foreach ($context['_seq'] as $context["_key"] => $context["avantage"]) {
                // line 413
                yield "                        ";
                $context["parts"] = Twig\Extension\CoreExtension::split($this->env->getCharset(), $context["avantage"], "|");
                // line 414
                yield "                        <li>
                            ";
                // line 415
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["parts"]) || array_key_exists("parts", $context) ? $context["parts"] : (function () { throw new RuntimeError('Variable "parts" does not exist.', 415, $this->source); })())) > 1)) {
                    // line 416
                    yield "                                <i class=\"fa-solid ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::trim(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parts"]) || array_key_exists("parts", $context) ? $context["parts"] : (function () { throw new RuntimeError('Variable "parts" does not exist.', 416, $this->source); })()), 0, [], "array", false, false, false, 416)), "html", null, true);
                    yield " feature-icon\"></i> <span>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::trim(CoreExtension::getAttribute($this->env, $this->source, (isset($context["parts"]) || array_key_exists("parts", $context) ? $context["parts"] : (function () { throw new RuntimeError('Variable "parts" does not exist.', 416, $this->source); })()), 1, [], "array", false, false, false, 416)), "html", null, true);
                    yield "</span>
                            ";
                } else {
                    // line 418
                    yield "                                <i class=\"fa-solid fa-check feature-icon\"></i> <span>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["avantage"], "html", null, true);
                    yield "</span>
                            ";
                }
                // line 420
                yield "                        </li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['avantage'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 422
            yield "                </ul>

                <a href=\"";
            // line 424
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("contact");
            yield "\" class=\"btn-classic\">S'INSCRIRE</a>
            </article>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['plan'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 427
        yield "            ";
        // line 428
        yield "
        </div>
    </div>
</section>

<div class=\"parallax-divider\" style=\"background-image: url('";
        // line 433
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/club/ok.jpg"), "html", null, true);
        yield "');\">
    <div class=\"parallax-overlay\"></div>
    <div class=\"parallax-content\">
        <h2>L'esprit d'équipe</h2>
        <p>Plus qu'une salle, une communauté.</p>
    </div>
</div>

<section class=\"section-light\">
    <h2 class=\"section-title\">Offres Spécifiques</h2>
    <p class=\"section-subtitle\">Familles nombreuses ou compétiteurs, nous avons pensé à vous.</p>

    <div class=\"info-grid\">
        <div class=\"info-card family\">
            <div class=\"info-icon\" style=\"color:#005b94;\"><i class=\"fa-solid fa-users\"></i></div>
            <h3 style=\"font-weight: 800; margin-bottom: 15px;\">OFFRE FAMILLE</h3>
            <p style=\"color:#64748b; margin-bottom:20px;\">Réduction pour les membres d'un même foyer (même adresse).</p>
            <table class=\"custom-table\" style=\"box-shadow:none; border:1px solid #f1f5f9;\">
                <tr><td>2ème licence</td><td class=\"val-highlight\" style=\"color:#10b981; font-weight:800;\">- 10 %</td></tr>
                <tr><td>3ème licence</td><td class=\"val-highlight\" style=\"color:#10b981; font-weight:800;\">- 15 %</td></tr>
                <tr><td>4ème licence et +</td><td class=\"val-highlight\" style=\"color:#10b981; font-weight:800;\">- 20 %</td></tr>
            </table>
        </div>

        <div class=\"info-card comp\">
            <div class=\"info-icon\" style=\"color:#fbbf24;\"><i class=\"fa-solid fa-trophy\"></i></div>
            <h3 style=\"font-weight: 800; margin-bottom: 15px;\">COMPÉTITION FFHM</h3>
            <p style=\"color:#64748b; margin-bottom:20px;\">Rejoignez l'équipe compétition (sous réserve de validation).</p>
            <table class=\"custom-table\" style=\"box-shadow:none; border:1px solid #f1f5f9;\">
                <tr><td>Benjamins (8-13 ans)</td><td style=\"font-weight:700;\">50,00 €*</td></tr>
                <tr><td>Cadets/Juniors</td><td style=\"font-weight:700;\">75,00 €</td></tr>
                <tr><td>Séniors (+21 ans)</td><td style=\"font-weight:700;\">95,00 €</td></tr>
            </table>
            <div style=\"font-size:0.8rem; color:#94a3b8; margin-top:10px;\">* Gratuit si un parent est inscrit.</div>
        </div>
    </div>
</section>

<div class=\"parallax-divider\" style=\"background-image: url('";
        // line 471
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/ecole.jpg"), "html", null, true);
        yield "'); height: 300px;\">
    <div class=\"parallax-overlay\"></div>
    <div class=\"parallax-content\">
        <h2>Inscription en cours d'année ?</h2>
        <p>Ne payez que ce que vous consommez.</p>
    </div>
</div>

<section class=\"section-white\">
    <h2 class=\"section-title\">Tarifs Dégressifs</h2>
    <p class=\"section-subtitle\">Le montant de la cotisation s'ajuste selon votre mois d'arrivée.</p>

    <div class=\"table-container\">
        <table class=\"custom-table\">
            <thead>
                <tr>
                    <th>Mois d'inscription</th>
                    <th style=\"text-align: center;\">Tarif Plein</th>
                    <th style=\"text-align: center;\">Tarif Réduit (-18/Étudiant)</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Septembre à Décembre</td><td style=\"text-align: center; font-weight:700;\">200,00 €</td><td style=\"text-align: center;\">185,00 €</td></tr>
                <tr><td>Janvier</td><td style=\"text-align: center; font-weight:700;\">185,00 €</td><td style=\"text-align: center;\">175,00 €</td></tr>
                <tr><td>Février</td><td style=\"text-align: center; font-weight:700;\">170,00 €</td><td style=\"text-align: center;\">160,00 €</td></tr>
                <tr><td>Mars</td><td style=\"text-align: center; font-weight:700;\">150,00 €</td><td style=\"text-align: center;\">140,00 €</td></tr>
                <tr><td>Avril</td><td style=\"text-align: center; font-weight:700;\">125,00 €</td><td style=\"text-align: center;\">115,00 €</td></tr>
                <tr><td>Mai</td><td style=\"text-align: center; font-weight:700;\">100,00 €</td><td style=\"text-align: center;\">90,00 €</td></tr>
                <tr><td>Juin</td><td style=\"text-align: center; font-weight:700;\">80,00 €</td><td style=\"text-align: center;\">70,00 €</td></tr>
                <tr><td>Juillet</td><td style=\"text-align: center; font-weight:700;\">60,00 €</td><td style=\"text-align: center;\">50,00 €</td></tr>
                <tr><td>Août</td><td style=\"text-align: center; font-weight:700;\">30,00 €</td><td style=\"text-align: center;\">30,00 €</td></tr>
            </tbody>
        </table>
    </div>
</section>

<footer class=\"payment-footer\">
    <h3 style=\"text-transform: uppercase; font-weight: 800; letter-spacing: 1px;\">Moyens de paiement acceptés</h3>
    
    <div class=\"payment-icons\">
        <i class=\"fa-solid fa-money-bill-1-wave\" title=\"Espèces\"></i>
        <i class=\"fa-solid fa-money-check\" title=\"Chèques\"></i>
        <i class=\"fa-regular fa-credit-card\" title=\"Carte Bancaire\"></i>
    </div>

    <div style=\"background: rgba(255,255,255,0.1); display: inline-block; padding: 10px 20px; border-radius: 50px;\">
        <i class=\"fa-solid fa-info-circle\"></i> Paiement en <strong>2 ou 3 fois</strong> possible (voir bureau).
    </div>
</footer>

<script src=\"";
        // line 521
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/accueil/section2/section2.js"), "html", null, true);
        yield "\"></script>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pricing/index.html.twig";
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
        return array (  725 => 521,  672 => 471,  631 => 433,  624 => 428,  622 => 427,  613 => 424,  609 => 422,  602 => 420,  596 => 418,  588 => 416,  586 => 415,  583 => 414,  580 => 413,  576 => 412,  568 => 406,  564 => 404,  558 => 402,  555 => 401,  549 => 397,  543 => 394,  538 => 392,  534 => 391,  530 => 390,  526 => 388,  523 => 386,  520 => 385,  517 => 384,  514 => 383,  512 => 382,  509 => 381,  506 => 380,  503 => 378,  500 => 377,  498 => 376,  495 => 374,  492 => 373,  486 => 369,  483 => 368,  479 => 366,  476 => 365,  470 => 362,  465 => 361,  435 => 333,  428 => 329,  424 => 327,  414 => 326,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Tarifs & Avantages - CHM SALEUX{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <style>
        /* ========================================================= */
        /* ======================= VARIABLES ======================= */
        /* ========================================================= */
        :root { 
            --color: #005b94; 
        }

        /* ========================================================= */
        /* ======================= HEADER HERO ===================== */
        /* ========================================================= */
        .hero-header {
            position: relative;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            overflow: hidden;
        }
        .hero-header::before {
            content: \"\"; position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.5); z-index: 1; pointer-events: none;
        }
        .hero-content {
            max-width: 900px; padding: 2rem; animation: fadeInUp 1.2s ease-out;
            z-index: 2; margin-top: 140px;
        }
        .hero-content h1 {
            font-size: 3.5rem; font-weight: 900; text-transform: uppercase; margin-bottom: 1.5rem;
        }
        .hero-content p {
            font-size: 1.1rem; margin-bottom: 2rem; color: #CBD5E1; font-weight: 500;
        }
        .back-button {
            position: absolute; top: 155px; left: 100px; z-index: 10;
            display: inline-flex; align-items: center; gap: 10px;
            font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, sans-serif;
            font-size: 15px; font-weight: 500; text-decoration: none; color: #ffffff;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        /* ========================================================= */
        /* ==================== STRUCTURE GLOBALE ================== */
        /* ========================================================= */
        .section-white { background: #fff; padding: 80px 20px; }
        .section-light { background: #f8fafc; padding: 80px 20px; }
        
        .section-title {
            text-align: center; font-size: 2.2rem; font-weight: 900; color: #1e293b;
            text-transform: uppercase; margin-bottom: 10px; letter-spacing: -1px;
        }
        .section-subtitle {
            text-align: center; color: #475569; font-size: 1.1rem; max-width: 600px; margin: 0 auto 50px; font-weight: 500;
        }

        /* ========================================================= */
        /* ==================== BOUTONS (TOGGLE) =================== */
        /* ========================================================= */
        /* Style importé et adapté */
        .segmented-toggle {
            position: relative;
            width: 240px;
            height: 55px;
            border: 2px solid var(--color);
            border-radius: 60px;
            display: flex;
            margin: 0 auto 50px; /* Centré avec marge bas */
            background-color: #F5F5F5;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            padding: 0;
            overflow: hidden;
            font-weight: 700;
        }
        .segmented-toggle input {
            position: absolute; width: 100%; height: 100%; opacity: 0; cursor: pointer; z-index: 10;
        }
        .toggle-bg {
            position: absolute; width: 50%; height: 100%; background: var(--color); border-radius: 60px; top: 0; left: 0; transition: transform 0.3s ease; z-index: 1;
        }
        .toggle-option {
            width: 50%; text-align: center; z-index: 2; font-size: 16px; pointer-events: none;
        }
        /* Couleurs du toggle (adapté fond clair) */
        .left { color: var(--color); transition: color 0.3s; }
        .right { color: var(--color); transition: color 0.3s; }
        
        /* Actions Toggle */
        .segmented-toggle input:checked ~ .toggle-bg { transform: translateX(100%); }
        .segmented-toggle input:not(:checked) ~ .left { color: #fff; }
        .segmented-toggle input:checked ~ .right { color: #fff; }

        /* ========================================================= */
        /* ==================== CARDS ABONNEMENTS ================== */
        /* ========================================================= */
        /* Grille */
        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(260px, 1fr));
            gap: 1.8rem;
            max-width: 1140px;
            margin: 0 auto;
            justify-content: center;
        }

        /* Carte Base */
        .card {
            position: relative;
            background: #F5F5F5; /* Fond gris clair comme demandé */
            padding: 2.2rem 2rem;
            border-radius: 8px;
            border: none;
            text-align: center;
            align-items: center;
            display: flex;
            flex-direction: column;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.35s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }

        /* Carte Featured (Populaire) */
        .card-featured {
            border: 2px solid #fbbf24;
            z-index: 2;
            transform: scale(1.05);
        }
        .card-featured:hover { transform: scale(1.05) translateY(-5px); }

        /* Badge Populaire */
        .badge-featured {
            position: absolute;
            top: -14px;
            right: -14px;
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: #2b2b2b;
            font-weight: 900;
            font-size: 0.75rem;
            padding: 0.45rem 0.5rem;
            border-radius: 6px;
            text-transform: uppercase;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        /* Titre Carte */
        .card-title {
            font-size: 1.4rem;
            font-weight: 900;
            margin-bottom: 1rem;
            text-transform: uppercase;
            color: #2b2b2b;
        }

        /* Prix */
        .price-row {
            display: flex;
            align-items: flex-end;
            justify-content: center;
            gap: 0.3rem;
            margin-bottom: 1rem;
            width: 100%;
            color: #2b2b2b;
        }
        .price3 {
            font-size: 2.4rem;
            font-weight: 1000;
            line-height: 0.8;
            display: flex;
        }
        .price3 sup {
            font-size: 1.1rem;
            vertical-align: top;
            margin-top: 5px;
        }
        .period {
            font-size: 0.95rem;
            color: #6b7280;
            margin-left: 2px;
            line-height: 1.2;
            padding-bottom: 5px;
        }
        .subprice3 {
            font-size: 0.85rem;
            color: #6b7280;
            margin-bottom: 1rem;
            height: 20px;
        }

        /* Trial Box (Séance essai) */
        .trial-box {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin: 0 auto 1.5rem;
            padding: 0.5rem 1rem;
            background: #fff7ed;
            border: 2px solid #f59e0b;
            border-radius: 5px;
            font-size: 0.9rem;
            font-weight: 700;
            color: #2b2b2b;
            width: 100%;
        }
        .trial-box i { color: #e63946; }

        /* Liste Avantages */
        .features {
            list-style: none;
            padding: 0;
            margin: 0 0 1.6rem;
            text-align: left;
            width: 100%;
        }
        .features li {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 0.8rem;
            padding: 0.6rem 0;
            font-size: 0.95rem;
            font-weight: 600;
            color: #374151;
            border-bottom: 1px dashed #e5e7eb;
        }
        .features li:last-child { border-bottom: none; }
        .feature-icon {
            width: 18px;
            height: 18px;
            color: #005b94;
            text-align: center;
        }

        /* Bouton Inscription */
        .btn-classic {
            display: block;
            width: 100%;
            padding: 15px;
            border-radius: 8px;
            font-weight: 700;
            text-decoration: none;
            text-transform: uppercase;
            text-align: center;
            transition: 0.3s;
            margin-top: auto;
            border: 2px solid transparent;
        }

        /* Couleurs spécifiques par carte (Standard / Etudiant / etc.) */
        .card:nth-child(1) { border-top: 5px solid #334155; }
        .card:nth-child(1) .btn-classic { background: #334155; color: white; }
        .card:nth-child(1) .btn-classic:hover { background: transparent; color: #334155; border-color: #334155; }

        .card:nth-child(2) { border-top: 5px solid #005b94; }
        .card:nth-child(2) .btn-classic { background: #005b94; color: white; }
        .card:nth-child(2) .btn-classic:hover { background: transparent; color: #005b94; border-color: #005b94; }

        .card:nth-child(3) { border-top: 5px solid #fbbf24; }
        .card:nth-child(3) .btn-classic { background: #fbbf24; color: #1e293b; }
        .card:nth-child(3) .btn-classic:hover { background: transparent; color: #fbbf24; border-color: #fbbf24; }


        /* ========================================================= */
        /* ==================== AUTRES SECTIONS ==================== */
        /* ========================================================= */
        
        /* Parallaxe */
        .parallax-divider {
            position: relative; height: 400px;
            background-attachment: fixed; background-position: center;
            background-repeat: no-repeat; background-size: cover;
            display: flex; align-items: center; justify-content: center;
        }
        .parallax-overlay { position: absolute; inset: 0; background: rgba(0, 0, 0, 0.6); }
        .parallax-content { position: relative; z-index: 2; text-align: center; color: white; }
        .parallax-content h2 { font-size: 3rem; font-weight: 900; text-transform: uppercase; margin: 0; letter-spacing: 2px; }
        .parallax-content p { font-size: 1.2rem; margin-top: 10px; font-weight: 300; opacity: 0.9; }

        /* Infos Grid (Famille/Compétition) */
        .info-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 30px; max-width: 1100px; margin: 0 auto; }
        .info-card { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border-left: 5px solid #e2e8f0; }
        .info-card.family { border-left-color: #005b94; }
        .info-card.comp { border-left-color: #fbbf24; }
        .info-icon { font-size: 2rem; margin-bottom: 20px; }

        /* Table */
        .custom-table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .custom-table th { background: #005b94; color: white; padding: 15px; text-transform: uppercase; font-size: 0.9rem; }
        .custom-table td { padding: 15px; border-bottom: 1px solid #f1f5f9; color: #334155; }
        .custom-table tr:last-child td { border-bottom: none; }
        .table-container { max-width: 1000px; margin: 0 auto; overflow-x: auto; border-radius: 10px; overflow: hidden; border: 1px solid #e2e8f0; }

        /* Footer Payment */
        .payment-footer { background: #0f172a; color: white; padding: 60px 20px; text-align: center; }
        .payment-icons { font-size: 2.5rem; margin: 20px 0; display: flex; justify-content: center; gap: 40px; color: #94a3b8; }
        .payment-icons i { transition: 0.3s; }
        .payment-icons i:hover { color: white; transform: scale(1.1); }

        /* Responsive */
        @media (max-width: 1100px) {
            .pricing-grid { grid-template-columns: repeat(2, 1fr); max-width: 700px; }
            .info-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 768px) {
            .pricing-grid { grid-template-columns: 1fr; padding: 0; }
            .card-featured { transform: scale(1); }
            .card-featured:hover { transform: scale(1); }
            .hero-content h1 { font-size: 2rem; }
            .back-button { top: 20px; left: 20px; }
        }
    </style>
{% endblock %}

{% block body %}

<header class=\"hero-header\" style=\"
    background-image: url('{{ asset('images/90.jpg') }}');
    background-size: cover;
    background-position: center 20%;
\">
    <a href=\"{{ path('home') }}\" class=\"back-button\">
         <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2.5\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15 19l-7-7 7-7\" />
         </svg>
         Home
    </a>

    <div class=\"hero-content\">
         <h1>Tarifs & Adhésions</h1>
        <p>Une structure de qualité pour tous les niveaux. Rejoignez le CHM Saleux dès aujourd'hui.</p>
    </div>
</header>

<section class=\"section-white\">
    <div class=\"container\">
        <h2 class=\"section-title\">Choisissez votre formule</h2>
        <p class=\"section-subtitle\">Tarifs fixes pour la saison 2025 / 2026. Accès illimité aux équipements.</p>

        <div class=\"segmented-toggle\">
            <input type=\"checkbox\" id=\"toggle\" />
            <div class=\"toggle-bg\"></div>
            <div class=\"toggle-option left\">Standard</div>
            <div class=\"toggle-option right\">Étudiant / -18</div>
        </div>

        <div class=\"pricing-grid\">
            
            {# --- DÉBUT DE LA BOUCLE --- #}
            {% for plan in plans %}
            <article class=\"card {{ plan.isPopular ? 'card-featured' : '' }}\">
                
                {# Badge Populaire #}
                {% if plan.isPopular %}
                    <span class=\"badge-featured\">Le plus populaire</span>
                {% endif %}
                
                <h3 class=\"card-title\">{{ plan.nom|upper }}</h3>

                <div class=\"price-row\">
                    {# 1. Découpage du prix pour le style (euros vs centimes) #}
                    {% set priceParts = plan.prix|number_format(2, '.', ',')|split('.') %}
                    
                    {# 2. LOGIQUE INTELLIGENTE POUR LE PRIX ETUDIANT #}
                    {# Par défaut, le prix étudiant est le prix normal #}
                    {% set studentPrice = plan.prix %}
                    
                    {# Si le prix est >= 195€ (ex: 200€), on force à 185€ #}
                    {% if plan.prix >= 195 %}
                        {% set studentPrice = 185 %}
                    {# Sinon, si un prix étudiant est défini en BDD, on le prend #}
                    {% elseif plan.prix_etudiant is defined and plan.prix_etudiant %}
                        {% set studentPrice = plan.prix_etudiant %}
                    {% endif %}

                    {# 3. AFFICHAGE DU PRIX #}
                    <div class=\"price3\">
                        <span class=\"dynamic-price\" 
                              data-standard=\"{{ plan.prix }}\" 
                              data-student=\"{{ studentPrice }}\">
                            {{ priceParts[0] }}
                        </span>
                        €<sup>{{ priceParts[1] }}</sup>
                    </div>
                    
                    <span class=\"period\">{{ plan.frequence|default('/ an') }}</span>
                </div>

                {# Mensualité \"Soit X €/mois\" #}
                {% if plan.mensualite %}
                    <div class=\"subprice3\">Soit {{ plan.mensualite|number_format(2, ',', ' ') }}€/mois</div>
                {% else %}
                    <div class=\"subprice3\" style=\"visibility: hidden;\">-</div>
                {% endif %}

                <div class=\"trial-box\">
                    <i class=\"fa-solid fa-check\"></i> Séance d’essai incluse
                </div>

                <ul class=\"features\">
                    {% for avantage in plan.avantages %}
                        {% set parts = avantage|split('|') %}
                        <li>
                            {% if parts|length > 1 %}
                                <i class=\"fa-solid {{ parts[0]|trim }} feature-icon\"></i> <span>{{ parts[1]|trim }}</span>
                            {% else %}
                                <i class=\"fa-solid fa-check feature-icon\"></i> <span>{{ avantage }}</span>
                            {% endif %}
                        </li>
                    {% endfor %}
                </ul>

                <a href=\"{{ path('contact') }}\" class=\"btn-classic\">S'INSCRIRE</a>
            </article>
            {% endfor %}
            {# --- FIN DE LA BOUCLE --- #}

        </div>
    </div>
</section>

<div class=\"parallax-divider\" style=\"background-image: url('{{ asset('images/club/ok.jpg') }}');\">
    <div class=\"parallax-overlay\"></div>
    <div class=\"parallax-content\">
        <h2>L'esprit d'équipe</h2>
        <p>Plus qu'une salle, une communauté.</p>
    </div>
</div>

<section class=\"section-light\">
    <h2 class=\"section-title\">Offres Spécifiques</h2>
    <p class=\"section-subtitle\">Familles nombreuses ou compétiteurs, nous avons pensé à vous.</p>

    <div class=\"info-grid\">
        <div class=\"info-card family\">
            <div class=\"info-icon\" style=\"color:#005b94;\"><i class=\"fa-solid fa-users\"></i></div>
            <h3 style=\"font-weight: 800; margin-bottom: 15px;\">OFFRE FAMILLE</h3>
            <p style=\"color:#64748b; margin-bottom:20px;\">Réduction pour les membres d'un même foyer (même adresse).</p>
            <table class=\"custom-table\" style=\"box-shadow:none; border:1px solid #f1f5f9;\">
                <tr><td>2ème licence</td><td class=\"val-highlight\" style=\"color:#10b981; font-weight:800;\">- 10 %</td></tr>
                <tr><td>3ème licence</td><td class=\"val-highlight\" style=\"color:#10b981; font-weight:800;\">- 15 %</td></tr>
                <tr><td>4ème licence et +</td><td class=\"val-highlight\" style=\"color:#10b981; font-weight:800;\">- 20 %</td></tr>
            </table>
        </div>

        <div class=\"info-card comp\">
            <div class=\"info-icon\" style=\"color:#fbbf24;\"><i class=\"fa-solid fa-trophy\"></i></div>
            <h3 style=\"font-weight: 800; margin-bottom: 15px;\">COMPÉTITION FFHM</h3>
            <p style=\"color:#64748b; margin-bottom:20px;\">Rejoignez l'équipe compétition (sous réserve de validation).</p>
            <table class=\"custom-table\" style=\"box-shadow:none; border:1px solid #f1f5f9;\">
                <tr><td>Benjamins (8-13 ans)</td><td style=\"font-weight:700;\">50,00 €*</td></tr>
                <tr><td>Cadets/Juniors</td><td style=\"font-weight:700;\">75,00 €</td></tr>
                <tr><td>Séniors (+21 ans)</td><td style=\"font-weight:700;\">95,00 €</td></tr>
            </table>
            <div style=\"font-size:0.8rem; color:#94a3b8; margin-top:10px;\">* Gratuit si un parent est inscrit.</div>
        </div>
    </div>
</section>

<div class=\"parallax-divider\" style=\"background-image: url('{{ asset('images/ecole.jpg') }}'); height: 300px;\">
    <div class=\"parallax-overlay\"></div>
    <div class=\"parallax-content\">
        <h2>Inscription en cours d'année ?</h2>
        <p>Ne payez que ce que vous consommez.</p>
    </div>
</div>

<section class=\"section-white\">
    <h2 class=\"section-title\">Tarifs Dégressifs</h2>
    <p class=\"section-subtitle\">Le montant de la cotisation s'ajuste selon votre mois d'arrivée.</p>

    <div class=\"table-container\">
        <table class=\"custom-table\">
            <thead>
                <tr>
                    <th>Mois d'inscription</th>
                    <th style=\"text-align: center;\">Tarif Plein</th>
                    <th style=\"text-align: center;\">Tarif Réduit (-18/Étudiant)</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Septembre à Décembre</td><td style=\"text-align: center; font-weight:700;\">200,00 €</td><td style=\"text-align: center;\">185,00 €</td></tr>
                <tr><td>Janvier</td><td style=\"text-align: center; font-weight:700;\">185,00 €</td><td style=\"text-align: center;\">175,00 €</td></tr>
                <tr><td>Février</td><td style=\"text-align: center; font-weight:700;\">170,00 €</td><td style=\"text-align: center;\">160,00 €</td></tr>
                <tr><td>Mars</td><td style=\"text-align: center; font-weight:700;\">150,00 €</td><td style=\"text-align: center;\">140,00 €</td></tr>
                <tr><td>Avril</td><td style=\"text-align: center; font-weight:700;\">125,00 €</td><td style=\"text-align: center;\">115,00 €</td></tr>
                <tr><td>Mai</td><td style=\"text-align: center; font-weight:700;\">100,00 €</td><td style=\"text-align: center;\">90,00 €</td></tr>
                <tr><td>Juin</td><td style=\"text-align: center; font-weight:700;\">80,00 €</td><td style=\"text-align: center;\">70,00 €</td></tr>
                <tr><td>Juillet</td><td style=\"text-align: center; font-weight:700;\">60,00 €</td><td style=\"text-align: center;\">50,00 €</td></tr>
                <tr><td>Août</td><td style=\"text-align: center; font-weight:700;\">30,00 €</td><td style=\"text-align: center;\">30,00 €</td></tr>
            </tbody>
        </table>
    </div>
</section>

<footer class=\"payment-footer\">
    <h3 style=\"text-transform: uppercase; font-weight: 800; letter-spacing: 1px;\">Moyens de paiement acceptés</h3>
    
    <div class=\"payment-icons\">
        <i class=\"fa-solid fa-money-bill-1-wave\" title=\"Espèces\"></i>
        <i class=\"fa-solid fa-money-check\" title=\"Chèques\"></i>
        <i class=\"fa-regular fa-credit-card\" title=\"Carte Bancaire\"></i>
    </div>

    <div style=\"background: rgba(255,255,255,0.1); display: inline-block; padding: 10px 20px; border-radius: 50px;\">
        <i class=\"fa-solid fa-info-circle\"></i> Paiement en <strong>2 ou 3 fois</strong> possible (voir bureau).
    </div>
</footer>

<script src=\"{{ asset('js/accueil/section2/section2.js') }}\"></script>

{% endblock %}", "pricing/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/pricing/index.html.twig");
    }
}
