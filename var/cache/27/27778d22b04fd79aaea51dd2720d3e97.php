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

/* login.html */
class __TwigTemplate_2dc8a817e3b619aa2246dd0d0676ae8d extends Template
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
        $this->parent = $this->loadTemplate("layout.html", "login.html", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Log In";
        yield from [];
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_description(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Log in to your Lexiconiac account";
        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 5
        yield "<main class=\"login_container\" id=\"content\">

  <section class=\"header\">
    <h1>Log in</h1>
  </section>
  <form method=\"post\" action=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "login/\" class=\"form-membership\">
    ";
        // line 11
        if (($context["success"] ?? null)) {
            yield "<div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["success"] ?? null), "html", null, true);
            yield "</div>";
        }
        // line 12
        yield "    ";
        if (($context["errors"] ?? null)) {
            yield "<div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "message", [], "any", false, false, false, 12), "html", null, true);
            yield "</div>";
        }
        // line 13
        yield "
    <div class=\"form-group\">
      <label for=\"email\">Email </label>
      <input type=\"text\" name=\"email\" id=\"email\" value=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["email"] ?? null), "html", null, true);
        yield "\" class=\"form-control\">
      <div class=\"errors\">";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", false, false, false, 17), "html", null, true);
        yield "</div>
    </div>

    <div class=\"form-group\">
      <label for=\"password\">Password </label>
      <input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\">
      <div class=\"errors\">";
        // line 23
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 23);
        yield "</div>
    </div>

    <input type=\"submit\" class=\"button button_green\" value=\"Log in\"><br>
    <!-- <p><a href=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "password-lost/\">Lost password?</a></p> -->
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
        return "login.html";
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
        return array (  131 => 27,  124 => 23,  115 => 17,  111 => 16,  106 => 13,  99 => 12,  93 => 11,  89 => 10,  82 => 5,  75 => 4,  64 => 3,  53 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layout.html' %}
{% block title %}Log In{% endblock %}
{% block description %}Log in to your Lexiconiac account{% endblock %}
{% block content %}
<main class=\"login_container\" id=\"content\">

  <section class=\"header\">
    <h1>Log in</h1>
  </section>
  <form method=\"post\" action=\"{{ doc_root }}login/\" class=\"form-membership\">
    {% if success %}<div class=\"alert alert-success\">{{ success }}</div>{% endif %}
    {% if errors %}<div class=\"alert alert-danger\">{{ errors.message }}</div>{% endif %}

    <div class=\"form-group\">
      <label for=\"email\">Email </label>
      <input type=\"text\" name=\"email\" id=\"email\" value=\"{{ email }}\" class=\"form-control\">
      <div class=\"errors\">{{ errors.email }}</div>
    </div>

    <div class=\"form-group\">
      <label for=\"password\">Password </label>
      <input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\">
      <div class=\"errors\">{{ errors.password|raw }}</div>
    </div>

    <input type=\"submit\" class=\"button button_green\" value=\"Log in\"><br>
    <!-- <p><a href=\"{{ doc_root }}password-lost/\">Lost password?</a></p> -->
  </form>

</main>
{% endblock %}", "login.html", "C:\\xampp\\htdocs\\lexiconiac\\templates\\login.html");
    }
}
