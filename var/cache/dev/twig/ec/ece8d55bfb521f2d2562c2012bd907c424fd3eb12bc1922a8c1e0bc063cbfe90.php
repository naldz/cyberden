<?php

/* TwigBundle:Exception:exception.atom.twig */
class __TwigTemplate_a09c194a3753abad14bf26119a4e58a18f9a14dc4e681b05c6343a3190b1d641 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_af0ca6e66b07b70e5ba1e6135abfea758dd567cd63eab5bd1de76cced284999c = $this->env->getExtension("native_profiler");
        $__internal_af0ca6e66b07b70e5ba1e6135abfea758dd567cd63eab5bd1de76cced284999c->enter($__internal_af0ca6e66b07b70e5ba1e6135abfea758dd567cd63eab5bd1de76cced284999c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.atom.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/exception.xml.twig", "TwigBundle:Exception:exception.atom.twig", 1)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        
        $__internal_af0ca6e66b07b70e5ba1e6135abfea758dd567cd63eab5bd1de76cced284999c->leave($__internal_af0ca6e66b07b70e5ba1e6135abfea758dd567cd63eab5bd1de76cced284999c_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.atom.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* {% include '@Twig/Exception/exception.xml.twig' with { 'exception': exception } %}*/
/* */
