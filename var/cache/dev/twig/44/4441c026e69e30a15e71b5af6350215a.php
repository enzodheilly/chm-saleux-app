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

/* admin/contact/index.html.twig */
class __TwigTemplate_7b44bb3e95d0b13a011122317923e60a extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/contact/index.html.twig"));

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

        yield "Messages reçus";
        
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

    /* Header */
    .page-header {
        display: flex; justify-content: space-between; align-items: center;
        margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1.5rem;
    }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }

    /* Toolbar */
    .toolbar { display: flex; gap: 1rem; align-items: center; }
    .search-input {
        background: transparent; border: 1px solid var(--border); color: var(--text-main);
        padding: 0.6rem 1rem; border-radius: 4px; outline: none; min-width: 300px; font-size: 0.9rem;
    }
    .search-input:focus { border-color: var(--accent); }

    /* Table */
    .content-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; }
    .table-responsive { overflow-x: auto; }
    .table { width: 100%; border-collapse: collapse; font-size: 0.9rem; }
    
    .table th {
        background: var(--bg-darker); color: var(--text-muted); font-weight: 600; text-align: left;
        padding: 1rem 1.5rem; border-bottom: 1px solid var(--border); text-transform: uppercase;
        font-size: 0.75rem; letter-spacing: 1px;
    }
    .table td {
        padding: 1rem 1.5rem; border-bottom: 1px solid var(--border); color: var(--text-main); vertical-align: middle;
    }
    .table tr:last-child td { border-bottom: none; }
    .table tr:hover { background: rgba(255,255,255,0.01); }

    /* Specific Data Styles */
    .date-cell { font-family: monospace; color: var(--text-muted); font-size: 0.85rem; }
    .sender-name { font-weight: 600; font-size: 0.95rem; display: block; color: var(--text-main); }
    .sender-contact { font-size: 0.8rem; color: var(--text-muted); }
    .message-excerpt { 
        color: var(--text-muted); max-width: 450px; 
        white-space: nowrap; overflow: hidden; text-overflow: ellipsis; 
        font-style: italic;
    }

    /* Actions */
    .action-link { 
        font-size: 0.85rem; font-weight: 600; text-decoration: none; 
        color: var(--accent); border: 1px solid var(--border); padding: 4px 10px; 
        border-radius: 4px; transition: 0.2s; background: var(--bg-darker);
    }
    .action-link:hover { border-color: var(--accent); background: rgba(255, 102, 0, 0.1); }

</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 63
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 64
        yield "<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <div>
            <h1>Messages de contact</h1>
            <p>Demandes et messages envoyés via le formulaire du site.</p>
        </div>
        <div class=\"toolbar\">
            <input type=\"text\" id=\"searchMessages\" class=\"search-input\" placeholder=\"Rechercher par nom, email...\">
        </div>
    </div>

    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\" id=\"messagesTable\">
                <thead>
                    <tr>
                        <th width=\"120\">Date</th>
                        <th width=\"250\">Expéditeur</th>
                        <th width=\"150\">Téléphone</th>
                        <th>Aperçu du message</th>
                        <th style=\"text-align: right;\">Action</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 89
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["messages"]) || array_key_exists("messages", $context) ? $context["messages"] : (function () { throw new RuntimeError('Variable "messages" does not exist.', 89, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 90
            yield "                        <tr>
                            <td class=\"date-cell\">
                                ";
            // line 92
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "createdAt", [], "any", false, false, false, 92), "d/m/Y"), "html", null, true);
            yield "<br>
                                <span style=\"font-size: 0.75rem; opacity: 0.7;\">";
            // line 93
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "createdAt", [], "any", false, false, false, 93), "H:i"), "html", null, true);
            yield "</span>
                            </td>
                            
                            <td>
                                <span class=\"sender-name\">";
            // line 97
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "prenom", [], "any", false, false, false, 97), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["message"], "nom", [], "any", false, false, false, 97)), "html", null, true);
            yield "</span>
                                <span class=\"sender-contact\">";
            // line 98
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "email", [], "any", false, false, false, 98), "html", null, true);
            yield "</span>
                            </td>

                            <td style=\"color: var(--text-muted);\">
                                ";
            // line 102
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["message"], "telephone", [], "any", false, false, false, 102)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "telephone", [], "any", false, false, false, 102), "html", null, true)) : ("—"));
            yield "
                            </td>

                            <td>
                                <div class=\"message-excerpt\" title=\"";
            // line 106
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "message", [], "any", false, false, false, 106), "html", null, true);
            yield "\">
                                    \"";
            // line 107
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "message", [], "any", false, false, false, 107), "html", null, true);
            yield "\"
                                </div>
                            </td>
<td style=\"text-align: right;\">
    ";
            // line 111
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["message"], "resolvedBy", [], "any", false, false, false, 111)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 112
                yield "        <span style=\"color: #34d399; font-size: 0.8rem; font-weight: bold;\">
            <i class=\"fa-solid fa-check\"></i> Résolu par ";
                // line 113
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "resolvedBy", [], "any", false, false, false, 113), "html", null, true);
                yield "
        </span>
    ";
            } else {
                // line 116
                yield "        <form action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_contact_reply", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["message"], "id", [], "any", false, false, false, 116)]), "html", null, true);
                yield "\" method=\"POST\" style=\"display: inline-flex; gap: 5px;\">
            <input type=\"text\" name=\"reponse\" placeholder=\"Votre réponse...\" required 
                   style=\"background: #111; border: 1px solid #333; color: white; border-radius: 4px; padding: 4px 8px; font-size: 0.8rem;\">
            <button type=\"submit\" class=\"action-link\" style=\"background: var(--accent); color: white; border: none; cursor: pointer;\">
                Valider
            </button>
        </form>
    ";
            }
            // line 124
            yield "</td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 126
        if (!$context['_iterated']) {
            // line 127
            yield "                        <tr>
                            <td colspan=\"5\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucun message reçu pour le moment.
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 133
        yield "                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.getElementById('searchMessages').addEventListener('keyup', function() {
    const val = this.value.toLowerCase();
    const rows = document.querySelectorAll('#messagesTable tbody tr');
    rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(val) ? '' : 'none';
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
        return "admin/contact/index.html.twig";
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
        return array (  279 => 133,  268 => 127,  266 => 126,  260 => 124,  248 => 116,  242 => 113,  239 => 112,  237 => 111,  230 => 107,  226 => 106,  219 => 102,  212 => 98,  206 => 97,  199 => 93,  195 => 92,  191 => 90,  186 => 89,  159 => 64,  149 => 63,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base_admin.html.twig' %}

{% block title %}Messages reçus{% endblock %}

{% block stylesheets %}
<style>
    /* =================== PAGE STYLE =================== */
    .dashboard-container { width: 100%; max-width: 1600px; margin: 0 auto; }

    /* Header */
    .page-header {
        display: flex; justify-content: space-between; align-items: center;
        margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1.5rem;
    }
    .page-header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; color: var(--text-main); letter-spacing: -0.5px; }
    .page-header p { margin: 5px 0 0 0; color: var(--text-muted); font-size: 0.9rem; }

    /* Toolbar */
    .toolbar { display: flex; gap: 1rem; align-items: center; }
    .search-input {
        background: transparent; border: 1px solid var(--border); color: var(--text-main);
        padding: 0.6rem 1rem; border-radius: 4px; outline: none; min-width: 300px; font-size: 0.9rem;
    }
    .search-input:focus { border-color: var(--accent); }

    /* Table */
    .content-card { background: var(--bg-light); border: 1px solid var(--border); border-radius: 4px; }
    .table-responsive { overflow-x: auto; }
    .table { width: 100%; border-collapse: collapse; font-size: 0.9rem; }
    
    .table th {
        background: var(--bg-darker); color: var(--text-muted); font-weight: 600; text-align: left;
        padding: 1rem 1.5rem; border-bottom: 1px solid var(--border); text-transform: uppercase;
        font-size: 0.75rem; letter-spacing: 1px;
    }
    .table td {
        padding: 1rem 1.5rem; border-bottom: 1px solid var(--border); color: var(--text-main); vertical-align: middle;
    }
    .table tr:last-child td { border-bottom: none; }
    .table tr:hover { background: rgba(255,255,255,0.01); }

    /* Specific Data Styles */
    .date-cell { font-family: monospace; color: var(--text-muted); font-size: 0.85rem; }
    .sender-name { font-weight: 600; font-size: 0.95rem; display: block; color: var(--text-main); }
    .sender-contact { font-size: 0.8rem; color: var(--text-muted); }
    .message-excerpt { 
        color: var(--text-muted); max-width: 450px; 
        white-space: nowrap; overflow: hidden; text-overflow: ellipsis; 
        font-style: italic;
    }

    /* Actions */
    .action-link { 
        font-size: 0.85rem; font-weight: 600; text-decoration: none; 
        color: var(--accent); border: 1px solid var(--border); padding: 4px 10px; 
        border-radius: 4px; transition: 0.2s; background: var(--bg-darker);
    }
    .action-link:hover { border-color: var(--accent); background: rgba(255, 102, 0, 0.1); }

</style>
{% endblock %}

{% block body %}
<div class=\"dashboard-container\">
    
    <div class=\"page-header\">
        <div>
            <h1>Messages de contact</h1>
            <p>Demandes et messages envoyés via le formulaire du site.</p>
        </div>
        <div class=\"toolbar\">
            <input type=\"text\" id=\"searchMessages\" class=\"search-input\" placeholder=\"Rechercher par nom, email...\">
        </div>
    </div>

    <div class=\"content-card\">
        <div class=\"table-responsive\">
            <table class=\"table\" id=\"messagesTable\">
                <thead>
                    <tr>
                        <th width=\"120\">Date</th>
                        <th width=\"250\">Expéditeur</th>
                        <th width=\"150\">Téléphone</th>
                        <th>Aperçu du message</th>
                        <th style=\"text-align: right;\">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {% for message in messages %}
                        <tr>
                            <td class=\"date-cell\">
                                {{ message.createdAt|date('d/m/Y') }}<br>
                                <span style=\"font-size: 0.75rem; opacity: 0.7;\">{{ message.createdAt|date('H:i') }}</span>
                            </td>
                            
                            <td>
                                <span class=\"sender-name\">{{ message.prenom }} {{ message.nom|upper }}</span>
                                <span class=\"sender-contact\">{{ message.email }}</span>
                            </td>

                            <td style=\"color: var(--text-muted);\">
                                {{ message.telephone ?: '—' }}
                            </td>

                            <td>
                                <div class=\"message-excerpt\" title=\"{{ message.message }}\">
                                    \"{{ message.message }}\"
                                </div>
                            </td>
<td style=\"text-align: right;\">
    {% if message.resolvedBy %}
        <span style=\"color: #34d399; font-size: 0.8rem; font-weight: bold;\">
            <i class=\"fa-solid fa-check\"></i> Résolu par {{ message.resolvedBy }}
        </span>
    {% else %}
        <form action=\"{{ path('admin_contact_reply', {id: message.id}) }}\" method=\"POST\" style=\"display: inline-flex; gap: 5px;\">
            <input type=\"text\" name=\"reponse\" placeholder=\"Votre réponse...\" required 
                   style=\"background: #111; border: 1px solid #333; color: white; border-radius: 4px; padding: 4px 8px; font-size: 0.8rem;\">
            <button type=\"submit\" class=\"action-link\" style=\"background: var(--accent); color: white; border: none; cursor: pointer;\">
                Valider
            </button>
        </form>
    {% endif %}
</td>
                        </tr>
                    {% else %}
                        <tr>
                            <td colspan=\"5\" style=\"text-align: center; padding: 4rem; color: var(--text-muted);\">
                                Aucun message reçu pour le moment.
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.getElementById('searchMessages').addEventListener('keyup', function() {
    const val = this.value.toLowerCase();
    const rows = document.querySelectorAll('#messagesTable tbody tr');
    rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(val) ? '' : 'none';
    });
});
</script>
{% endblock %}", "admin/contact/index.html.twig", "/Users/dheillyenzo/projet-chm/templates/admin/contact/index.html.twig");
    }
}
