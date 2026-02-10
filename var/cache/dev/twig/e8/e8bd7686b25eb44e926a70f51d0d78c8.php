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

/* admin/newsletter/compose.html.twig */
class __TwigTemplate_88dcac0093b242f888e28f3c816c9c88 extends Template
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
        return "admin/base_admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/newsletter/compose.html.twig"));

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

        yield "Nouvelle campagne";
        
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
        yield "<style>
    /* =================== PAGE STYLE =================== */
    .dashboard-container { width: 100%; max-width: 1600px; margin: 0 auto; }
    
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1.5rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }

    /* Layout Grid */
    .compose-grid { display: grid; grid-template-columns: 1.5fr 1fr; gap: 2rem; }
    @media(max-width: 1000px) { .compose-grid { grid-template-columns: 1fr; } }

    /* Cards */
    .panel { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; display: flex; flex-direction: column; height: 100%; }
    
    /* Form Elements */
    .form-group { margin-bottom: 1.5rem; }
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    
    input[type=\"text\"], select {
        width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main);
        padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box;
    }
    input:focus, select:focus { border-color: var(--accent); }

    /* Toolbar Helper */
    .editor-toolbar { display: flex; gap: 10px; margin-bottom: 1rem; }
    .tool-btn {
        background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-muted);
        padding: 0.4rem 0.8rem; border-radius: 4px; font-size: 0.8rem; cursor: pointer; transition: 0.2s;
    }
    .tool-btn:hover { border-color: var(--text-main); color: var(--text-main); }

    /* Preview Box */
    .preview-box {
        background: #fff; color: #000; border-radius: 4px; padding: 2rem;
        flex: 1; min-height: 500px; overflow-y: auto; font-family: sans-serif;
    }
    
    /* Actions */
    .form-actions { margin-top: auto; padding-top: 2rem; display: flex; justify-content: flex-end; gap: 1rem; }
    
    .btn-secondary { background: transparent; border: 1px solid var(--border); color: var(--text-muted); padding: 0.7rem 1.5rem; border-radius: 4px; font-weight: 500; cursor: pointer; }
    .btn-secondary:hover { border-color: var(--text-main); color: var(--text-main); }

    .btn-primary { background: var(--accent); color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 4px; font-weight: 600; cursor: pointer; transition: background 0.2s; }
    .btn-primary:hover { background: var(--accent-hover); }

</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 56
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 57
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Rédiger une campagne</h1>
        <p style=\"color: var(--text-muted); margin-top:5px;\">Créez et envoyez votre newsletter aux abonnés.</p>
    </div>

    <form method=\"POST\" id=\"newsletterForm\" class=\"compose-grid\">
        
        <div class=\"panel\">
            
            <div class=\"form-group\">
                <label for=\"templateSelect\">Modèle de démarrage</label>
                <select id=\"templateSelect\">
                    <option value=\"\">Sélectionner un modèle...</option>
                    <option value=\"basic\">Newsletter Standard</option>
                    <option value=\"promo\">Offre Promotionnelle</option>
                    <option value=\"announcement\">Annonce Importante</option>
                </select>
            </div>

            <div class=\"form-group\">
                <label for=\"subject\">Objet du mail</label>
                <input type=\"text\" id=\"subject\" name=\"subject\" required placeholder=\"Ex: Les nouveautés de la semaine...\">
            </div>

            <div class=\"form-group\" style=\"flex:1; display:flex; flex-direction:column;\">
                <label>Contenu</label>
                
                <div class=\"editor-toolbar\">
                    <select id=\"variableSelect\" style=\"width: auto;\">
                        <option value=\"\">Insérer Variable...</option>
                        <option value=\"";
        // line 89
        yield "{{ firstname }}";
        yield "\">Prénom</option>
                        <option value=\"";
        // line 90
        yield "{{ lastname }}";
        yield "\">Nom</option>
                        <option value=\"";
        // line 91
        yield "{{ unsubscribe_url }}";
        yield "\">Lien Désinscription</option>
                    </select>

                    <select id=\"styleBlockSelect\" style=\"width: auto;\">
                        <option value=\"\">Insérer Bloc...</option>
                        <option value=\"button\">Bouton Action</option>
                        <option value=\"quote\">Citation</option>
                        <option value=\"highlight\">Encadré Info</option>
                    </select>
                </div>

                <textarea id=\"content\" name=\"content\" style=\"height: 100%; min-height: 400px;\"></textarea>
            </div>

            <div class=\"form-actions\">
                <button type=\"button\" class=\"btn-secondary\" id=\"sendTestBtn\">Envoyer un Test</button>
                <button type=\"submit\" class=\"btn-primary\">Envoyer la Campagne</button>
            </div>
        </div>

        <div class=\"panel\" style=\"background: var(--bg-darker);\">
            <div style=\"margin-bottom: 1rem; font-weight: 600; color: var(--text-muted); text-transform: uppercase; font-size: 0.8rem;\">
                Aperçu en temps réel
            </div>
            <div id=\"preview\" class=\"preview-box\">
                <div style=\"text-align: center; color: #999; margin-top: 50%;\">
                    Le contenu apparaîtra ici...
                </div>
            </div>
        </div>

    </form>
</div>

<script src=\"https://cdn.tiny.cloud/1/tn2dgt5wrvywd1db8zi5vsznnk1y5jl2uw1ngfn9hjzckm5t/tinymce/7/tinymce.min.js\" referrerpolicy=\"origin\"></script>

<script>
/* UPDATE PREVIEW FUNCTION */
function updatePreview() {
    const subject = document.getElementById('subject').value;
    const content = tinymce.get('content') ? tinymce.get('content').getContent() : '';
    
    const previewHtml = `
        <div style=\"max-width:600px; margin:0 auto; font-family: Helvetica, Arial, sans-serif; line-height:1.6; color:#333;\">
            <div style=\"padding-bottom:20px; border-bottom:1px solid #eee; margin-bottom:20px;\">
                <h2 style=\"margin:0; color:#333; font-size:20px;\">\${subject || 'Objet du mail'}</h2>
            </div>
            <div>\${content}</div>
        </div>
    `;
    document.getElementById('preview').innerHTML = previewHtml;
}

document.addEventListener('DOMContentLoaded', () => {
    /* INIT TINYMCE */
    tinymce.init({
        selector: '#content',
        plugins: 'link lists table code',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter | bullist numlist | link | code',
        menubar: false,
        height: '100%',
        skin: 'oxide-dark',
        content_css: 'dark',
        setup: (editor) => {
            editor.on('keyup change', updatePreview);
        }
    });

    document.getElementById('subject').addEventListener('input', updatePreview);

    /* TEMPLATES */
    const templates = {
        basic: `<p>Bonjour ";
        // line 163
        yield "{{ firstname }}";
        yield ",</p><p>Voici les dernières nouvelles...</p><p><a href=\"";
        yield "{{ unsubscribe_url }}";
        yield "\">Se désabonner</a></p>`,
        promo: `<h2 style=\"color:#ff6600;\">Offre Spéciale !</h2><p>Profitez de -20% sur tout.</p><p><a href=\"#\" style=\"background:#ff6600; color:#fff; padding:10px 20px; text-decoration:none; border-radius:4px;\">En profiter</a></p>`,
        announcement: `<h2>Grande Nouvelle</h2><p>Nous avons le plaisir de vous annoncer...</p>`
    };

    document.getElementById('templateSelect').addEventListener('change', (e) => {
        const val = e.target.value;
        if(val && templates[val]) {
            if(confirm('Remplacer le contenu actuel par ce modèle ?')) {
                tinymce.get('content').setContent(templates[val]);
                updatePreview();
            }
        }
    });

    /* VARIABLES & BLOCKS */
    document.getElementById('variableSelect').addEventListener('change', (e) => {
        if(e.target.value) {
            tinymce.get('content').insertContent(e.target.value);
            e.target.value = '';
        }
    });

    document.getElementById('styleBlockSelect').addEventListener('change', (e) => {
        const val = e.target.value;
        let html = '';
        if(val === 'button') html = `<br><a href=\"#\" style=\"background:#ff6600; color:#fff; padding:10px 20px; text-decoration:none; border-radius:4px; font-weight:bold;\">Cliquez ici</a><br>`;
        if(val === 'quote') html = `<blockquote style=\"border-left:4px solid #ff6600; padding-left:15px; font-style:italic; color:#555;\">Votre citation ici</blockquote>`;
        if(val === 'highlight') html = `<div style=\"background:#f9f9f9; padding:15px; border:1px solid #ddd; border-radius:4px;\"><strong>Info :</strong> Texte mis en avant.</div>`;
        
        if(html) {
            tinymce.get('content').insertContent(html);
            e.target.value = '';
        }
    });
});
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/newsletter/compose.html.twig";
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
        return array (  269 => 163,  194 => 91,  190 => 90,  186 => 89,  152 => 57,  142 => 56,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Nouvelle campagne{% endblock %}

{% block stylesheets %}
<style>
    /* =================== PAGE STYLE =================== */
    .dashboard-container { width: 100%; max-width: 1600px; margin: 0 auto; }
    
    .page-header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1.5rem; }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }

    /* Layout Grid */
    .compose-grid { display: grid; grid-template-columns: 1.5fr 1fr; gap: 2rem; }
    @media(max-width: 1000px) { .compose-grid { grid-template-columns: 1fr; } }

    /* Cards */
    .panel { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; padding: 2rem; display: flex; flex-direction: column; height: 100%; }
    
    /* Form Elements */
    .form-group { margin-bottom: 1.5rem; }
    label { display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; }
    
    input[type=\"text\"], select {
        width: 100%; background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-main);
        padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.95rem; outline: none; transition: border-color 0.2s; box-sizing: border-box;
    }
    input:focus, select:focus { border-color: var(--accent); }

    /* Toolbar Helper */
    .editor-toolbar { display: flex; gap: 10px; margin-bottom: 1rem; }
    .tool-btn {
        background: var(--bg-darker); border: 1px solid var(--border); color: var(--text-muted);
        padding: 0.4rem 0.8rem; border-radius: 4px; font-size: 0.8rem; cursor: pointer; transition: 0.2s;
    }
    .tool-btn:hover { border-color: var(--text-main); color: var(--text-main); }

    /* Preview Box */
    .preview-box {
        background: #fff; color: #000; border-radius: 4px; padding: 2rem;
        flex: 1; min-height: 500px; overflow-y: auto; font-family: sans-serif;
    }
    
    /* Actions */
    .form-actions { margin-top: auto; padding-top: 2rem; display: flex; justify-content: flex-end; gap: 1rem; }
    
    .btn-secondary { background: transparent; border: 1px solid var(--border); color: var(--text-muted); padding: 0.7rem 1.5rem; border-radius: 4px; font-weight: 500; cursor: pointer; }
    .btn-secondary:hover { border-color: var(--text-main); color: var(--text-main); }

    .btn-primary { background: var(--accent); color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 4px; font-weight: 600; cursor: pointer; transition: background 0.2s; }
    .btn-primary:hover { background: var(--accent-hover); }

</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <h1>Rédiger une campagne</h1>
        <p style=\"color: var(--text-muted); margin-top:5px;\">Créez et envoyez votre newsletter aux abonnés.</p>
    </div>

    <form method=\"POST\" id=\"newsletterForm\" class=\"compose-grid\">
        
        <div class=\"panel\">
            
            <div class=\"form-group\">
                <label for=\"templateSelect\">Modèle de démarrage</label>
                <select id=\"templateSelect\">
                    <option value=\"\">Sélectionner un modèle...</option>
                    <option value=\"basic\">Newsletter Standard</option>
                    <option value=\"promo\">Offre Promotionnelle</option>
                    <option value=\"announcement\">Annonce Importante</option>
                </select>
            </div>

            <div class=\"form-group\">
                <label for=\"subject\">Objet du mail</label>
                <input type=\"text\" id=\"subject\" name=\"subject\" required placeholder=\"Ex: Les nouveautés de la semaine...\">
            </div>

            <div class=\"form-group\" style=\"flex:1; display:flex; flex-direction:column;\">
                <label>Contenu</label>
                
                <div class=\"editor-toolbar\">
                    <select id=\"variableSelect\" style=\"width: auto;\">
                        <option value=\"\">Insérer Variable...</option>
                        <option value=\"{{ '{{ firstname }}' }}\">Prénom</option>
                        <option value=\"{{ '{{ lastname }}' }}\">Nom</option>
                        <option value=\"{{ '{{ unsubscribe_url }}' }}\">Lien Désinscription</option>
                    </select>

                    <select id=\"styleBlockSelect\" style=\"width: auto;\">
                        <option value=\"\">Insérer Bloc...</option>
                        <option value=\"button\">Bouton Action</option>
                        <option value=\"quote\">Citation</option>
                        <option value=\"highlight\">Encadré Info</option>
                    </select>
                </div>

                <textarea id=\"content\" name=\"content\" style=\"height: 100%; min-height: 400px;\"></textarea>
            </div>

            <div class=\"form-actions\">
                <button type=\"button\" class=\"btn-secondary\" id=\"sendTestBtn\">Envoyer un Test</button>
                <button type=\"submit\" class=\"btn-primary\">Envoyer la Campagne</button>
            </div>
        </div>

        <div class=\"panel\" style=\"background: var(--bg-darker);\">
            <div style=\"margin-bottom: 1rem; font-weight: 600; color: var(--text-muted); text-transform: uppercase; font-size: 0.8rem;\">
                Aperçu en temps réel
            </div>
            <div id=\"preview\" class=\"preview-box\">
                <div style=\"text-align: center; color: #999; margin-top: 50%;\">
                    Le contenu apparaîtra ici...
                </div>
            </div>
        </div>

    </form>
</div>

<script src=\"https://cdn.tiny.cloud/1/tn2dgt5wrvywd1db8zi5vsznnk1y5jl2uw1ngfn9hjzckm5t/tinymce/7/tinymce.min.js\" referrerpolicy=\"origin\"></script>

<script>
/* UPDATE PREVIEW FUNCTION */
function updatePreview() {
    const subject = document.getElementById('subject').value;
    const content = tinymce.get('content') ? tinymce.get('content').getContent() : '';
    
    const previewHtml = `
        <div style=\"max-width:600px; margin:0 auto; font-family: Helvetica, Arial, sans-serif; line-height:1.6; color:#333;\">
            <div style=\"padding-bottom:20px; border-bottom:1px solid #eee; margin-bottom:20px;\">
                <h2 style=\"margin:0; color:#333; font-size:20px;\">\${subject || 'Objet du mail'}</h2>
            </div>
            <div>\${content}</div>
        </div>
    `;
    document.getElementById('preview').innerHTML = previewHtml;
}

document.addEventListener('DOMContentLoaded', () => {
    /* INIT TINYMCE */
    tinymce.init({
        selector: '#content',
        plugins: 'link lists table code',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter | bullist numlist | link | code',
        menubar: false,
        height: '100%',
        skin: 'oxide-dark',
        content_css: 'dark',
        setup: (editor) => {
            editor.on('keyup change', updatePreview);
        }
    });

    document.getElementById('subject').addEventListener('input', updatePreview);

    /* TEMPLATES */
    const templates = {
        basic: `<p>Bonjour {{ '{{ firstname }}' }},</p><p>Voici les dernières nouvelles...</p><p><a href=\"{{ '{{ unsubscribe_url }}' }}\">Se désabonner</a></p>`,
        promo: `<h2 style=\"color:#ff6600;\">Offre Spéciale !</h2><p>Profitez de -20% sur tout.</p><p><a href=\"#\" style=\"background:#ff6600; color:#fff; padding:10px 20px; text-decoration:none; border-radius:4px;\">En profiter</a></p>`,
        announcement: `<h2>Grande Nouvelle</h2><p>Nous avons le plaisir de vous annoncer...</p>`
    };

    document.getElementById('templateSelect').addEventListener('change', (e) => {
        const val = e.target.value;
        if(val && templates[val]) {
            if(confirm('Remplacer le contenu actuel par ce modèle ?')) {
                tinymce.get('content').setContent(templates[val]);
                updatePreview();
            }
        }
    });

    /* VARIABLES & BLOCKS */
    document.getElementById('variableSelect').addEventListener('change', (e) => {
        if(e.target.value) {
            tinymce.get('content').insertContent(e.target.value);
            e.target.value = '';
        }
    });

    document.getElementById('styleBlockSelect').addEventListener('change', (e) => {
        const val = e.target.value;
        let html = '';
        if(val === 'button') html = `<br><a href=\"#\" style=\"background:#ff6600; color:#fff; padding:10px 20px; text-decoration:none; border-radius:4px; font-weight:bold;\">Cliquez ici</a><br>`;
        if(val === 'quote') html = `<blockquote style=\"border-left:4px solid #ff6600; padding-left:15px; font-style:italic; color:#555;\">Votre citation ici</blockquote>`;
        if(val === 'highlight') html = `<div style=\"background:#f9f9f9; padding:15px; border:1px solid #ddd; border-radius:4px;\"><strong>Info :</strong> Texte mis en avant.</div>`;
        
        if(html) {
            tinymce.get('content').insertContent(html);
            e.target.value = '';
        }
    });
});
</script>
{% endblock %}", "admin/newsletter/compose.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/newsletter/compose.html.twig");
    }
}
