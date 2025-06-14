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

/* register.html */
class __TwigTemplate_7235c8ee874f301fcb540ca282736a38 extends Template
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

    // line 2
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Register";
        yield from [];
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_description(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Register for Lexiconiac";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "<main class=\"member_container\" id=\"content\">

  <section class=\"header\">
    <h1>Register</h1>
  </section>
  <form method=\"post\" action=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "register\" class=\"form-membership\">
    ";
        // line 12
        if ((($tmp = ($context["errors"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<div class=\"alert alert-danger\">Please correct errors</div>";
        }
        // line 13
        yield "
    <div class=\"form-group\">
      <label for=\"username\">Username: </label><input type=\"text\" name=\"username\" value=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["member"] ?? null), "username", [], "any", false, false, false, 15), "html", null, true);
        yield "\" id=\"username\" class=\"form-control\">
      <div class=\"errors\">";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "username", [], "any", false, false, false, 16), "html", null, true);
        yield "</div>
    </div>

    <div class=\"form-group\">
      <label for=\"email\">Email address: </label><input type=\"email\" name=\"email\" value=\"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["member"] ?? null), "email", [], "any", false, false, false, 20), "html", null, true);
        yield "\" id=\"email\" class=\"form-control\">
      <div class=\"errors\">";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", false, false, false, 21), "html", null, true);
        yield "</div>
    </div>

    <div class=\"form-group\">
      <label for=\"password\">Password: </label><input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\">
      <div class=\"errors\">";
        // line 26
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 26);
        yield "</div>
    </div>

    <div class=\"form-group\">
      <label for=\"confirm\">Confirm Password: </label><input type=\"password\" name=\"confirm\" id=\"confirm\" class=\"form-control\">
      <div class=\"errors\">";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "confirm", [], "any", false, false, false, 31), "html", null, true);
        yield "</div>
    </div>

    <input type=\"submit\" class=\"button button_green\" value=\"Register\">
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
        return "register.html";
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
        return array (  132 => 31,  124 => 26,  116 => 21,  112 => 20,  105 => 16,  101 => 15,  97 => 13,  93 => 12,  89 => 11,  82 => 6,  75 => 5,  64 => 3,  53 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layout.html' %}
{% block title %}Register{% endblock %}
{% block description %}Register for Lexiconiac{% endblock %}

{% block content %}
<main class=\"member_container\" id=\"content\">

  <section class=\"header\">
    <h1>Register</h1>
  </section>
  <form method=\"post\" action=\"{{ doc_root }}register\" class=\"form-membership\">
    {% if errors %}<div class=\"alert alert-danger\">Please correct errors</div>{% endif %}

    <div class=\"form-group\">
      <label for=\"username\">Username: </label><input type=\"text\" name=\"username\" value=\"{{ member.username }}\" id=\"username\" class=\"form-control\">
      <div class=\"errors\">{{ errors.username }}</div>
    </div>

    <div class=\"form-group\">
      <label for=\"email\">Email address: </label><input type=\"email\" name=\"email\" value=\"{{ member.email }}\" id=\"email\" class=\"form-control\">
      <div class=\"errors\">{{ errors.email }}</div>
    </div>

    <div class=\"form-group\">
      <label for=\"password\">Password: </label><input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\">
      <div class=\"errors\">{{ errors.password|raw }}</div>
    </div>

    <div class=\"form-group\">
      <label for=\"confirm\">Confirm Password: </label><input type=\"password\" name=\"confirm\" id=\"confirm\" class=\"form-control\">
      <div class=\"errors\">{{ errors.confirm }}</div>
    </div>

    <input type=\"submit\" class=\"button button_green\" value=\"Register\">
  </form>

</main>
{% endblock %}", "register.html", "C:\\xampp\\htdocs\\lexiconiac\\templates\\register.html");
    }
}
