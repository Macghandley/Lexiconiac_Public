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

/* edit_word.html */
class __TwigTemplate_2bfbe99124ff43ed041864e404a7c741 extends Template
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
        return "words.html";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("words.html", "edit_word.html", 1);
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
        yield "    <section class=\"word_header\">
        <h1>Edit Word</h1>
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
        yield "<main class=\"edit_word_container\" id=\"content\">
    <section class=\"edit_word_form_section\">
        <form method=\"post\" action=\"\" class=\"wordForm\">

            ";
        // line 12
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "message", [], "any", false, false, false, 12)) {
            yield "<div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "message", [], "any", false, false, false, 12), "html", null, true);
            yield "</div>";
        }
        // line 13
        yield "
            <div class=\"form-group\">
                <label for=\"word\">Word: </label>
                <input type=\"text\" name=\"word\" value=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "word", [], "any", false, false, false, 16), "html", null, true);
        yield "\" id=\"word\" class=\"form-control\" />
                <span class=\"errors\">";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "word", [], "any", false, false, false, 17), "html", null, true);
        yield "</span><br>
            </div>

            <div class=\"form-group\">
                <label for=\"source_id\">Source: </label>
                <select id=\"source_id\" name=\"source_id\" required>
                    ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["sources"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["source"]) {
            // line 24
            yield "                        <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["source"], "id", [], "any", false, false, false, 24), "html", null, true);
            yield "\" style=\"color: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["source"], "color", [], "any", false, false, false, 24), "html", null, true);
            yield ";\" ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["source"], "source", [], "any", false, false, false, 24) == CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "source_name", [], "any", false, false, false, 24))) {
                yield "selected";
            }
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["source"], "source", [], "any", false, false, false, 24), "html", null, true);
            yield "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['source'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        yield "                </select>
                <span class=\"errors\">";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "source", [], "any", false, false, false, 27), "html", null, true);
        yield "</span><br>
            </div>

            <div class=\"rating\">
                <label for=\"rating\">Rating:</label>
                <input type=\"range\" id=\"rating\" name=\"rating\" min=\"0\" max=\"10\" value=\"";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "rating", [], "any", false, false, false, 32), "html", null, true);
        yield "\">
            </div>
            

            <div class=\"button_div\">
                <button class=\"button button_green\" type=\"submit\">Submit</button>
                <a href=\"";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "words/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "id", [], "any", false, false, false, 38), "html", null, true);
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
        return "edit_word.html";
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
        return array (  145 => 38,  136 => 32,  128 => 27,  125 => 26,  108 => 24,  104 => 23,  95 => 17,  91 => 16,  86 => 13,  80 => 12,  74 => 8,  67 => 7,  59 => 3,  52 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'words.html' %}
{% block header %}
    <section class=\"word_header\">
        <h1>Edit Word</h1>
    </section>
{% endblock %}
{% block main %}
<main class=\"edit_word_container\" id=\"content\">
    <section class=\"edit_word_form_section\">
        <form method=\"post\" action=\"\" class=\"wordForm\">

            {% if errors.message %}<div class=\"alert alert-danger\">{{ errors.message }}</div>{% endif %}

            <div class=\"form-group\">
                <label for=\"word\">Word: </label>
                <input type=\"text\" name=\"word\" value=\"{{ word.word }}\" id=\"word\" class=\"form-control\" />
                <span class=\"errors\">{{ errors.word }}</span><br>
            </div>

            <div class=\"form-group\">
                <label for=\"source_id\">Source: </label>
                <select id=\"source_id\" name=\"source_id\" required>
                    {% for source in sources %}
                        <option value=\"{{ source.id }}\" style=\"color: {{ source.color }};\" {% if source.source == word.source_name %}selected{% endif %}>{{ source.source }}</option>
                    {% endfor %}
                </select>
                <span class=\"errors\">{{ errors.source }}</span><br>
            </div>

            <div class=\"rating\">
                <label for=\"rating\">Rating:</label>
                <input type=\"range\" id=\"rating\" name=\"rating\" min=\"0\" max=\"10\" value=\"{{ word.rating }}\">
            </div>
            

            <div class=\"button_div\">
                <button class=\"button button_green\" type=\"submit\">Submit</button>
                <a href=\"{{ doc_root }}words/{{ session.id }}\" class=\"button button_red\">Cancel</a>
            </div>
        </form>
    </section>
</main>
{% endblock %}", "edit_word.html", "C:\\xampp\\htdocs\\lexiconiac\\templates\\edit_word.html");
    }
}
