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

/* source.html */
class __TwigTemplate_afc63a3af785cb19ed28c7cde5b3130a extends Template
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
        return "sources_display.html";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("sources_display.html", "source.html", 1);
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
        yield "<main class=\"sources_container\" id=\"content\">
  <div class=\"single_source_header\">
    <a href=\"";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "sources/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "id", [], "any", false, false, false, 5), "html", null, true);
        yield "\" class=\"back_button\" title=\"Back\">X</a>
    <h1>";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["source"] ?? null), "source", [], "any", false, false, false, 6), "html", null, true);
        yield "</h1>    
  </div>
  
  <section class=\"source_info\">
    <p>
      <b>Color:</b> 
      <span style=\"display: inline-block; width: 1em; height: 1em; background-color: ";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["source"] ?? null), "color", [], "any", false, false, false, 12), "html", null, true);
        yield "; border: 1px solid #ccc; vertical-align: middle;\"></span>
      ";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["source"] ?? null), "color", [], "any", false, false, false, 13), "html", null, true);
        yield "
    </p>
    <!-- <p>";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["source"] ?? null), "credits", [], "any", false, false, false, 15), "html", null, true);
        yield "</p> -->
    <p><b>Date Added:</b> ";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["source"] ?? null), "date_added", [], "any", false, false, false, 16), "html", null, true);
        yield "</p>
    <a href=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "edit-source/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["source"] ?? null), "id", [], "any", false, false, false, 17), "html", null, true);
        yield "\" class=\"button button_orange\" title=\"Edit Source\">Edit</a>
    <a href=\"";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "delete-source/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["source"] ?? null), "id", [], "any", false, false, false, 18), "html", null, true);
        yield "\" class=\"button button_red\" title=\"Delete Source\">Delete</a>
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
        return "source.html";
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
        return array (  100 => 18,  94 => 17,  90 => 16,  86 => 15,  81 => 13,  77 => 12,  68 => 6,  62 => 5,  58 => 3,  51 => 2,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'sources_display.html' %}
{% block content %}
<main class=\"sources_container\" id=\"content\">
  <div class=\"single_source_header\">
    <a href=\"{{ doc_root }}sources/{{ session.id }}\" class=\"back_button\" title=\"Back\">X</a>
    <h1>{{source.source}}</h1>    
  </div>
  
  <section class=\"source_info\">
    <p>
      <b>Color:</b> 
      <span style=\"display: inline-block; width: 1em; height: 1em; background-color: {{ source.color }}; border: 1px solid #ccc; vertical-align: middle;\"></span>
      {{source.color}}
    </p>
    <!-- <p>{{source.credits}}</p> -->
    <p><b>Date Added:</b> {{source.date_added}}</p>
    <a href=\"{{ doc_root }}edit-source/{{source.id}}\" class=\"button button_orange\" title=\"Edit Source\">Edit</a>
    <a href=\"{{ doc_root }}delete-source/{{source.id}}\" class=\"button button_red\" title=\"Delete Source\">Delete</a>
  </section>
</main>
{% endblock %}", "source.html", "C:\\xampp\\htdocs\\lexiconiac\\templates\\source.html");
    }
}
