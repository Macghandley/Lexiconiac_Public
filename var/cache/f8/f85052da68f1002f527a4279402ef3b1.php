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

/* add_source.html */
class __TwigTemplate_895507bf72c5627626c24bba69484ddd extends Template
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
            'header' => [$this, 'block_header'],
            'main' => [$this, 'block_main'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "sources.html";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("sources.html", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 3
        yield "    <section class=\"source_header\">
        <h1>Add Source</h1>
    </section>
";
        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_main(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 8
        yield "<main class=\"add_source_container\" id=\"content\">
    <section class=\"add_source_form_section\">
        <form method=\"post\" action=\"\" class=\"sourceForm\">

            ";
        // line 12
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "message", [], "any", false, false, false, 12)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "message", [], "any", false, false, false, 12), "html", null, true);
            yield "</div>";
        }
        // line 13
        yield "
            <div class=\"form-group\">
                <label for=\"source\">Source Name: </label>
                <input type=\"text\" name=\"source\" value=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["source"] ?? null), "source", [], "any", false, false, false, 16), "html", null, true);
        yield "\" id=\"source\" class=\"form-control\" />
                <span class=\"errors\">";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "source", [], "any", false, false, false, 17), "html", null, true);
        yield "</span><br>
            </div>

            <div class=\"form-group\">
                <label for=\"color\">Source Color: </label>
                <input type=\"color\" name=\"color\" value=\"";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["source"] ?? null), "color", [], "any", false, false, false, 22), "html", null, true);
        yield "\" id=\"source_color\" class=\"form-control\" value=\"#ff0000\">
                <span class=\"errors\">";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "source_color", [], "any", false, false, false, 23), "html", null, true);
        yield "</span><br>
            </div>

            <div class=\"button_div\">
                <button class=\"button button_green\" type=\"submit\">Submit</button>
                <a href=\"";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "sources/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "id", [], "any", false, false, false, 28), "html", null, true);
        yield "/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "username", [], "any", false, false, false, 28), "html", null, true);
        yield "\" class=\"button button_red\">Cancel</a>
            </div>
        </form>
    </section>
</main>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "add_source.html";
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
        return array (  115 => 28,  107 => 23,  103 => 22,  95 => 17,  91 => 16,  86 => 13,  80 => 12,  74 => 8,  67 => 7,  59 => 3,  52 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'sources.html' %}
{% block header %}
    <section class=\"source_header\">
        <h1>Add Source</h1>
    </section>
{% endblock %}
{% block main %}
<main class=\"add_source_container\" id=\"content\">
    <section class=\"add_source_form_section\">
        <form method=\"post\" action=\"\" class=\"sourceForm\">

            {% if errors.message %}<div class=\"alert alert-danger\">{{ errors.message }}</div>{% endif %}

            <div class=\"form-group\">
                <label for=\"source\">Source Name: </label>
                <input type=\"text\" name=\"source\" value=\"{{ source.source }}\" id=\"source\" class=\"form-control\" />
                <span class=\"errors\">{{ errors.source }}</span><br>
            </div>

            <div class=\"form-group\">
                <label for=\"color\">Source Color: </label>
                <input type=\"color\" name=\"color\" value=\"{{ source.color }}\" id=\"source_color\" class=\"form-control\" value=\"#ff0000\">
                <span class=\"errors\">{{ errors.source_color }}</span><br>
            </div>

            <div class=\"button_div\">
                <button class=\"button button_green\" type=\"submit\">Submit</button>
                <a href=\"{{ doc_root }}sources/{{ session.id }}/{{ session.username }}\" class=\"button button_red\">Cancel</a>
            </div>
        </form>
    </section>
</main>
{% endblock %}", "add_source.html", "C:\\xampp\\htdocs\\lexiconiac\\templates\\add_source.html");
    }
}
