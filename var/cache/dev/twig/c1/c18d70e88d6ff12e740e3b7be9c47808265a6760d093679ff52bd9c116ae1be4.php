<?php

/* TwigBundle:Exception:error.js.twig */
class __TwigTemplate_a48185163d9c79d3fea31cff6ffbc25d341982a5306f7d858059182de28bcbf2 extends Twig_Template
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
        $__internal_a02474052404fb71cf2fbe14c5447f86535b5349c6d8f28b945b7408e7da5bf8 = $this->env->getExtension("native_profiler");
        $__internal_a02474052404fb71cf2fbe14c5447f86535b5349c6d8f28b945b7408e7da5bf8->enter($__internal_a02474052404fb71cf2fbe14c5447f86535b5349c6d8f28b945b7408e7da5bf8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.js.twig"));

        // line 1
        echo "/*
";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "js", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "js", null, true);
        echo "

*/
";
        
        $__internal_a02474052404fb71cf2fbe14c5447f86535b5349c6d8f28b945b7408e7da5bf8->leave($__internal_a02474052404fb71cf2fbe14c5447f86535b5349c6d8f28b945b7408e7da5bf8_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 2,  22 => 1,);
    }
}
/* /**/
/* {{ status_code }} {{ status_text }}*/
/* */
/* *//* */
/* */
