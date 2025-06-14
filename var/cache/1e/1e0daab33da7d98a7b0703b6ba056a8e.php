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

/* member.html */
class __TwigTemplate_0f90a072e17f8e3337182ca3be2a2023 extends Template
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
            'description' => [$this, 'block_description'],
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

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["member"] ?? null), "username", [], "any", false, false, false, 3), "html", null, true);
        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_description(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["member"] ?? null), "username", [], "any", false, false, false, 4), "html_attr");
        yield " on Lexiconiac";
        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 7
        yield "<main class=\"member_container\" id=\"content\">
  <section class=\"header\">
    <h1>";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["member"] ?? null), "username", [], "any", false, false, false, 9), "html", null, true);
        yield "</h1>
    <p class=\"member\"><b>Member since:</b> ";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, ($context["member"] ?? null), "joined", [], "any", false, false, false, 10), "F d, Y"), "html", null, true);
        yield "</p>
    ";
        // line 11
        if ((($tmp = ($context["success"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["success"] ?? null), "html", null, true);
            yield "</div>";
        }
        // line 12
        yield "    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "id", [], "any", false, false, false, 12) == CoreExtension::getAttribute($this->env, $this->source, ($context["member"] ?? null), "id", [], "any", false, false, false, 12))) {
            // line 13
            yield "      <!-- <nav class=\"member-options\">
        <a href=\"";
            // line 14
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
            yield "member-edit-profile/\" class=\"button button_gray\">Edit profile</a>
      </nav> -->
    ";
        }
        // line 17
        yield "  </section>
</main>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "member.html";
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
        return array (  113 => 17,  107 => 14,  104 => 13,  101 => 12,  95 => 11,  91 => 10,  87 => 9,  83 => 7,  76 => 6,  64 => 4,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layout.html' %}

{% block title %}{{ member.username }}{% endblock %}
{% block description %}{{ member.username|e('html_attr') }} on Lexiconiac{% endblock %}

{% block content %}
<main class=\"member_container\" id=\"content\">
  <section class=\"header\">
    <h1>{{ member.username }}</h1>
    <p class=\"member\"><b>Member since:</b> {{ member.joined|date('F d, Y') }}</p>
    {% if success %}<div class=\"alert alert-success\">{{ success }}</div>{% endif %}
    {% if session.id == member.id %}
      <!-- <nav class=\"member-options\">
        <a href=\"{{ doc_root }}member-edit-profile/\" class=\"button button_gray\">Edit profile</a>
      </nav> -->
    {% endif %}
  </section>
</main>
{% endblock %}", "member.html", "C:\\xampp\\htdocs\\lexiconiac\\templates\\member.html");
    }
}
