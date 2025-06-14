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

/* source-display.html */
class __TwigTemplate_74a8c4970a4de5f0a94862a44039575e extends Template
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
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 2
        yield "<main class=\"source_container\" id=\"content\">
  <h1>";
        // line 3
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["source"] ?? null), "source", [], "any", false, false, false, 3), "html", null, true);
        yield "</h1>
  <h4>";
        // line 4
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["source"] ?? null), "date_added", [], "any", false, false, false, 4), "html", null, true);
        yield "</h4>
    <section class=\"word_info\">
      <p>";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["source"] ?? null), "color", [], "any", false, false, false, 6), "html", null, true);
        yield "</p>
      <p>";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["source"] ?? null), "credits", [], "any", false, false, false, 7), "html", null, true);
        yield "</p>
</main>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "source-display.html";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  70 => 7,  66 => 6,  61 => 4,  57 => 3,  54 => 2,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% block content %}
<main class=\"source_container\" id=\"content\">
  <h1>{{source.source}}</h1>
  <h4>{{source.date_added}}</h4>
    <section class=\"word_info\">
      <p>{{source.color}}</p>
      <p>{{source.credits}}</p>
</main>
{% endblock %}", "source-display.html", "C:\\xampp\\htdocs\\lexiconiac\\templates\\source-display.html");
    }
}
