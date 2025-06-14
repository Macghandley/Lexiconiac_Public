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

/* words_display.html */
class __TwigTemplate_e9da1a40a05ce2d882a1a03d5aba37b9 extends Template
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
        $this->parent = $this->load("words.html", 1);
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
        <h1>Words</h1>
        <a href=\"";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "add-word/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "id", [], "any", false, false, false, 5), "html", null, true);
        yield "\" class=\"button button_green\">Add Word</a>
        <!-- <select class=\"sort_words_select\">Sort</select> -->
    </section>
";
        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_main(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 10
        yield "    <section class=\"word_grid\">      
        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["words"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["word"]) {
            // line 12
            yield "            <a class=\"word\" href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
            yield "word/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["word"], "id", [], "any", false, false, false, 12), "html", null, true);
            yield "/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "username", [], "any", false, false, false, 12), "html", null, true);
            yield "\" style=\"text-decoration: underline; text-decoration-color: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["word"], "color", [], "any", false, false, false, 12), "html", null, true);
            yield "; text-decoration-thickness: 3px;\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["word"], "word", [], "any", false, false, false, 12), "html", null, true);
            yield "</a>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['word'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        yield "    </section>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "words_display.html";
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
        return array (  105 => 14,  88 => 12,  84 => 11,  81 => 10,  74 => 9,  63 => 5,  59 => 3,  52 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'words.html' %}
{% block header %}
    <section class=\"word_header\">
        <h1>Words</h1>
        <a href=\"{{ doc_root }}add-word/{{ session.id }}\" class=\"button button_green\">Add Word</a>
        <!-- <select class=\"sort_words_select\">Sort</select> -->
    </section>
{% endblock %}
{% block main %}
    <section class=\"word_grid\">      
        {% for word in words %}
            <a class=\"word\" href=\"{{ doc_root }}word/{{word.id}}/{{ session.username }}\" style=\"text-decoration: underline; text-decoration-color: {{ word.color }}; text-decoration-thickness: 3px;\">{{ word.word }}</a>
        {% endfor %}
    </section>
{% endblock %}", "words_display.html", "C:\\xampp\\htdocs\\lexiconiac\\templates\\words_display.html");
    }
}
