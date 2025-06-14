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

/* word-display.html */
class __TwigTemplate_4ef26662ca4065c60f4b1be5882ded94 extends Template
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
        yield "<main class=\"word_container\" id=\"content\">
  <h1>";
        // line 3
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "word", [], "any", false, false, false, 3), "html", null, true);
        yield "</h1>
  <h4>";
        // line 4
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "date_added", [], "any", false, false, false, 4), "html", null, true);
        yield "</h4>
    <section class=\"word_info\">
      <p>";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "definition", [], "any", false, false, false, 6), "html", null, true);
        yield "</p>
      <p>";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "rating", [], "any", false, false, false, 7), "html", null, true);
        yield "</p>
      <p>";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "source_id", [], "any", false, false, false, 8), "html", null, true);
        yield "</p>
      <p>";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "antonyms", [], "any", false, false, false, 9), "html", null, true);
        yield "</p>
      <p>";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "synonyms", [], "any", false, false, false, 10), "html", null, true);
        yield "</p>
      <p>";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "part_of_speech", [], "any", false, false, false, 11), "html", null, true);
        yield "</p>
      <p>";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "first_known_use", [], "any", false, false, false, 12), "html", null, true);
        yield "</p>
      <p>";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "etymology", [], "any", false, false, false, 13), "html", null, true);
        yield "</p>
      <p>";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["word"] ?? null), "stems", [], "any", false, false, false, 14), "html", null, true);
        yield "</p>
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
        return "word-display.html";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  98 => 14,  94 => 13,  90 => 12,  86 => 11,  82 => 10,  78 => 9,  74 => 8,  70 => 7,  66 => 6,  61 => 4,  57 => 3,  54 => 2,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% block content %}
<main class=\"word_container\" id=\"content\">
  <h1>{{word.word}}</h1>
  <h4>{{word.date_added}}</h4>
    <section class=\"word_info\">
      <p>{{word.definition}}</p>
      <p>{{word.rating}}</p>
      <p>{{word.source_id}}</p>
      <p>{{word.antonyms}}</p>
      <p>{{word.synonyms}}</p>
      <p>{{word.part_of_speech}}</p>
      <p>{{word.first_known_use}}</p>
      <p>{{word.etymology}}</p>
      <p>{{word.stems}}</p>
    </section>
</main>
{% endblock %}", "word-display.html", "C:\\xampp\\htdocs\\lexiconiac\\templates\\word-display.html");
    }
}
