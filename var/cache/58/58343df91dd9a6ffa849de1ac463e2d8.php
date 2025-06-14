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

/* layout.html */
class __TwigTemplate_517140bd9f2cbd8550b77922b9b3c16a extends Template
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
            'title' => [$this, 'block_title'],
            'description' => [$this, 'block_description'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en-US\">
  <head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <meta name=\"description\" content=\"";
        // line 7
        yield from $this->unwrap()->yieldBlock('description', $context, $blocks);
        yield "\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "css/styles.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "css/words.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "css/sources.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "css/member.css\">
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\"> 
    <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap\">
  </head>
  <body>
    <header>
      <div class=\"header-container\">
        <div class=\"header-left\">
          <a href=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "words/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "id", [], "any", false, false, false, 19), "html", null, true);
        yield "/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "username", [], "any", false, false, false, 19), "html", null, true);
        yield "\">
            <img src=\"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "img/lexilogo.png\" class=\"logo-img\" alt=\"Lexiconiac Logo\">
          </a>
        </div>
      
        <div class=\"header-center\">
          <h1>Lexiconiac</h1>
        </div>

        <div class=\"header-right\">
          ";
        // line 29
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "id", [], "any", false, false, false, 29) == 0)) {
            // line 30
            yield "            <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
            yield "login\" class=\"nav-item nav-link\">Log in</a> 
            <a href=\"";
            // line 31
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
            yield "register\" class=\"nav-item nav-link\">Register</a>
          ";
        } else {
            // line 33
            yield "            <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
            yield "words/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "id", [], "any", false, false, false, 33), "html", null, true);
            yield "/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "username", [], "any", false, false, false, 33), "html", null, true);
            yield "\">Words</a> 
            <a href=\"";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
            yield "sources/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "id", [], "any", false, false, false, 34), "html", null, true);
            yield "/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "username", [], "any", false, false, false, 34), "html", null, true);
            yield "\">Sources</a> 
            <a href=\"";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
            yield "member/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "id", [], "any", false, false, false, 35), "html", null, true);
            yield "/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "username", [], "any", false, false, false, 35), "html", null, true);
            yield "\">Profile</a> 
            <a href=\"";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
            yield "logout\">Logout</a>
          ";
        }
        // line 38
        yield "        </div>
      </div>
    </header>
    ";
        // line 41
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 42
        yield "    <footer>
      <div class=\"footer_container\">
        <!-- <a href=\"";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["doc_root"] ?? null), "html", null, true);
        yield "contact\">Contact us</a> -->
        <span class=\"copyright\">&copy; Lexiconiac ";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield "</span>
      </div>
    </footer>
  </body>
</html>";
        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Lexiconiac";
        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_description(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Learn more lexicon";
        yield from [];
    }

    // line 41
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "layout.html";
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
        return array (  192 => 41,  181 => 7,  170 => 6,  160 => 45,  156 => 44,  152 => 42,  150 => 41,  145 => 38,  140 => 36,  132 => 35,  124 => 34,  115 => 33,  110 => 31,  105 => 30,  103 => 29,  91 => 20,  83 => 19,  72 => 11,  68 => 10,  64 => 9,  60 => 8,  56 => 7,  52 => 6,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en-US\">
  <head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>{% block title %}Lexiconiac{% endblock %}</title>
    <meta name=\"description\" content=\"{% block description %}Learn more lexicon{% endblock %}\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"{{ doc_root }}css/styles.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"{{ doc_root }}css/words.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"{{ doc_root }}css/sources.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"{{ doc_root }}css/member.css\">
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\"> 
    <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap\">
  </head>
  <body>
    <header>
      <div class=\"header-container\">
        <div class=\"header-left\">
          <a href=\"{{ doc_root }}words/{{ session.id }}/{{ session.username }}\">
            <img src=\"{{ doc_root }}img/lexilogo.png\" class=\"logo-img\" alt=\"Lexiconiac Logo\">
          </a>
        </div>
      
        <div class=\"header-center\">
          <h1>Lexiconiac</h1>
        </div>

        <div class=\"header-right\">
          {% if session.id == 0 %}
            <a href=\"{{ doc_root }}login\" class=\"nav-item nav-link\">Log in</a> 
            <a href=\"{{ doc_root }}register\" class=\"nav-item nav-link\">Register</a>
          {% else %}
            <a href=\"{{ doc_root }}words/{{ session.id }}/{{ session.username }}\">Words</a> 
            <a href=\"{{ doc_root }}sources/{{ session.id }}/{{ session.username }}\">Sources</a> 
            <a href=\"{{ doc_root }}member/{{ session.id }}/{{ session.username }}\">Profile</a> 
            <a href=\"{{ doc_root }}logout\">Logout</a>
          {% endif %}
        </div>
      </div>
    </header>
    {% block content %}{% endblock %}
    <footer>
      <div class=\"footer_container\">
        <!-- <a href=\"{{ doc_root }}contact\">Contact us</a> -->
        <span class=\"copyright\">&copy; Lexiconiac {{ 'now'|date('Y') }}</span>
      </div>
    </footer>
  </body>
</html>", "layout.html", "C:\\xampp\\htdocs\\lexiconiac\\templates\\layout.html");
    }
}
