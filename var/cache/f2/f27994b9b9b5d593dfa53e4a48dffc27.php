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

/* delete_word.html */
class __TwigTemplate_f64c5ba0779c7dc817c251e5f1c43b15 extends Template
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
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.html", "delete_word.html", 1);
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
        yield "
  <main class=\"word_container\" id=\"content\">
    <section class=\"word_header\">
        <h1>Delete Word</h1>
    </section>
    <form action=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "delete-word/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "id", [], "any", false, false, false, 8), "html", null, true);
        yield "\" method=\"POST\" class=\"narrow\">
      <p>Click confirm to delete the word: <em>";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "word", [], "any", false, false, false, 9), "html", null, true);
        yield "</em></p>
      <input type=\"submit\" name=\"delete\" value=\"confirm\" class=\"button button_green\" />
      <a href=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "words/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "id", [], "any", false, false, false, 11), "html", null, true);
        yield "\" class=\"button button_gray\">Cancel</a>
    </form>
  </main>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "delete_word.html";
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
        return array (  76 => 11,  71 => 9,  65 => 8,  58 => 3,  51 => 2,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layout.html' %}
{% block content %}

  <main class=\"word_container\" id=\"content\">
    <section class=\"word_header\">
        <h1>Delete Word</h1>
    </section>
    <form action=\"{{ doc_root }}delete-word/{{ word.id }}\" method=\"POST\" class=\"narrow\">
      <p>Click confirm to delete the word: <em>{{ word.word }}</em></p>
      <input type=\"submit\" name=\"delete\" value=\"confirm\" class=\"button button_green\" />
      <a href=\"{{ doc_root }}words/{{ session.id }}\" class=\"button button_gray\">Cancel</a>
    </form>
  </main>

{% endblock %}", "delete_word.html", "C:\\xampp\\htdocs\\lexiconiac\\templates\\delete_word.html");
    }
}
