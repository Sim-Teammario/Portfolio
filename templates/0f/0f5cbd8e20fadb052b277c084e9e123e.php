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

/* base.twig */
class __TwigTemplate_1c633e51c46bbfcc3cefee89a839eaab extends Template
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
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <link rel=\"stylesheet\" href=\"/assets/css/style.css\">
</head>
<body>
    <header>
        <nav>
            <a href=\"/\">Accueil</a>
            <a href=\"/diplomes\">Diplômes</a>
            <a href=\"/projets\">Projets</a>
            <a href=\"/a-propos\">À propos</a>
            <a href=\"/actuellement\">Actuellement</a>
            <a href=\"/contact\">Contact</a>
        </nav>
    </header>

    <main>
        ";
        // line 22
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "flash", [], "any", false, false, false, 22)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 23
            yield "            <div class=\"alert\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "flash", [], "any", false, false, false, 23), "html", null, true);
            yield "</div>
            ";
            // line 24
            $context["_"] = CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "flash", [], "any", false, false, false, 24);
            yield " ";
            // line 25
            yield "        ";
        }
        // line 26
        yield "        
        ";
        // line 27
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 28
        yield "    </main>

    <footer>
        <a href=\"/mentions-legales\">Mentions Légales</a> | 
        <a href=\"/politique-confidentialite\">Politique de Confidentialité</a>
    </footer>

    ";
        // line 35
        if ((($tmp =  !($context["cookie_consent"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 36
            yield "    <div id=\"cookie-banner\" class=\"banner\">
        <p>Nous utilisons des cookies fonctionnels et de statistiques (pseudonymisées) pour améliorer votre expérience. <a href=\"/politique-confidentialite\">En savoir plus</a>.</p>
        <button id=\"accept-cookies\">Accepter</button>
        <button id=\"refuse-cookies\">Refuser</button>
    </div>
    ";
        }
        // line 42
        yield "
    <script src=\"/assets/js/main.js\"></script>
</body>
</html>
";
        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Portfolio";
        yield from [];
    }

    // line 27
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
        return "base.twig";
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
        return array (  127 => 27,  116 => 6,  107 => 42,  99 => 36,  97 => 35,  88 => 28,  86 => 27,  83 => 26,  80 => 25,  77 => 24,  72 => 23,  70 => 22,  51 => 6,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "base.twig", "/var/www/html/portfolio/app/Views/base.twig");
    }
}
