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

/* word.html */
class __TwigTemplate_883014359b32cf4f6d7e21f2be41a599 extends Template
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
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "words_display.html";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("words_display.html", "word.html", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 3
        yield "<main class=\"word_container\" id=\"content\">
  <div class=\"single_word_header\">
    <a href=\"";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "words/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "id", [], "any", false, false, false, 5), "html", null, true);
        yield "\" class=\"back_button\" title=\"Back\">X</a>
    <h1>";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "word", [], "any", false, false, false, 6), "html", null, true);
        yield "</h1>
  </div>
  <section class=\"word_info\">
    <p><b>Definition(s):</b><br>";
        // line 9
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "definition", [], "any", false, false, false, 9);
        yield "</p>
    <p><b>Part of Speech:</b> ";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "part_of_speech", [], "any", false, false, false, 10), "html", null, true);
        yield "</p>
    <p><b>Synonyms:</b> ";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "synonyms", [], "any", false, false, false, 11), "html", null, true);
        yield "</p>
    <p><b>Antonyms:</b> ";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "antonyms", [], "any", false, false, false, 12), "html", null, true);
        yield "</p>
    <p><b>First Known Use:</b> ";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "first_known_use", [], "any", false, false, false, 13), "html", null, true);
        yield "</p>
    <p><b>Etymology:</b> ";
        // line 14
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "etymology", [], "any", false, false, false, 14);
        yield "</p>
    <p><b>Stems:</b> ";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "stems", [], "any", false, false, false, 15), "html", null, true);
        yield "</p>
    <p><b>Rating:</b> ";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "rating", [], "any", false, false, false, 16), "html", null, true);
        yield " / 10</p>
    <p><b>Source:</b> ";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "source_name", [], "any", false, false, false, 17), "html", null, true);
        yield "</p>
    <p><b>Date Added:</b> ";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "member_word_date_added", [], "any", false, false, false, 18), "html", null, true);
        yield "</p>
    <a href=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "edit-word/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "id", [], "any", false, false, false, 19), "html", null, true);
        yield "\" class=\"button button_orange\" title=\"Edit Word\">Edit</a>
    <a href=\"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "delete-word/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "id", [], "any", false, false, false, 20), "html", null, true);
        yield "\" class=\"button button_red\" title=\"Delete Word\">Delete</a>
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
        return "word.html";
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
        return array (  120 => 20,  114 => 19,  110 => 18,  106 => 17,  102 => 16,  98 => 15,  94 => 14,  90 => 13,  86 => 12,  82 => 11,  78 => 10,  74 => 9,  68 => 6,  62 => 5,  58 => 3,  51 => 2,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'words_display.html' %}
{% block content %}
<main class=\"word_container\" id=\"content\">
  <div class=\"single_word_header\">
    <a href=\"{{ doc_root }}words/{{ session.id }}\" class=\"back_button\" title=\"Back\">X</a>
    <h1>{{word.word}}</h1>
  </div>
  <section class=\"word_info\">
    <p><b>Definition(s):</b><br>{{word.definition|raw}}</p>
    <p><b>Part of Speech:</b> {{word.part_of_speech}}</p>
    <p><b>Synonyms:</b> {{word.synonyms}}</p>
    <p><b>Antonyms:</b> {{word.antonyms}}</p>
    <p><b>First Known Use:</b> {{word.first_known_use}}</p>
    <p><b>Etymology:</b> {{word.etymology|raw}}</p>
    <p><b>Stems:</b> {{word.stems}}</p>
    <p><b>Rating:</b> {{word.rating}} / 10</p>
    <p><b>Source:</b> {{word.source_name}}</p>
    <p><b>Date Added:</b> {{word.member_word_date_added}}</p>
    <a href=\"{{ doc_root }}edit-word/{{word.id}}\" class=\"button button_orange\" title=\"Edit Word\">Edit</a>
    <a href=\"{{ doc_root }}delete-word/{{word.id}}\" class=\"button button_red\" title=\"Delete Word\">Delete</a>
  </section>
</main>
{% endblock %}", "word.html", "C:\\xampp\\htdocs\\lexiconiac\\templates\\word.html");
    }
}
