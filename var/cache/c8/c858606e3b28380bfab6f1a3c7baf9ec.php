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

/* delete_source.html */
class __TwigTemplate_117ff4841bfbf94ba0c0d556dc0800ec extends Template
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
        $this->parent = $this->load("layout.html", 1);
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
  <main class=\"sources_container\" id=\"content\">
    <form action=\"";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "delete-source/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["source"] ?? null), "id", [], "any", false, false, false, 5), "html", null, true);
        yield "\" method=\"POST\" class=\"narrow\">
      <h1>Delete Source</h1>
      <p>Click confirm to delete the source: <em>";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["source"] ?? null), "source", [], "any", false, false, false, 7), "html", null, true);
        yield "</em></p>
      <input type=\"submit\" name=\"delete\" value=\"confirm\" class=\"button button_green\" />
      <a href=\"";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "sources/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "id", [], "any", false, false, false, 9), "html", null, true);
        yield "/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "username", [], "any", false, false, false, 9), "html", null, true);
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
        return "delete_source.html";
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
        return array (  74 => 9,  69 => 7,  62 => 5,  58 => 3,  51 => 2,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layout.html' %}
{% block content %}

  <main class=\"sources_container\" id=\"content\">
    <form action=\"{{ doc_root }}delete-source/{{ source.id }}\" method=\"POST\" class=\"narrow\">
      <h1>Delete Source</h1>
      <p>Click confirm to delete the source: <em>{{ source.source }}</em></p>
      <input type=\"submit\" name=\"delete\" value=\"confirm\" class=\"button button_green\" />
      <a href=\"{{ doc_root }}sources/{{ session.id }}/{{ session.username }}\" class=\"button button_gray\">Cancel</a>
    </form>
  </main>

{% endblock %}", "delete_source.html", "C:\\xampp\\htdocs\\lexiconiac\\templates\\delete_source.html");
    }
}
