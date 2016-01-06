<?php

/* TwigBundle:Exception:error.css.twig */
class __TwigTemplate_9efb1c43802f4cf92d72d786a8a429b709773df7f954931c1c7e81de2ae4109d extends Twig_Template
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
        $__internal_4f7f9e1b9ad7b84a518e42d0cf5ed11e56d88e781c694ca4e8958a76b0a43778 = $this->env->getExtension("native_profiler");
        $__internal_4f7f9e1b9ad7b84a518e42d0cf5ed11e56d88e781c694ca4e8958a76b0a43778->enter($__internal_4f7f9e1b9ad7b84a518e42d0cf5ed11e56d88e781c694ca4e8958a76b0a43778_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.css.twig"));

        // line 1
        echo "/*
";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "css", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "css", null, true);
        echo "

*/
";
        
        $__internal_4f7f9e1b9ad7b84a518e42d0cf5ed11e56d88e781c694ca4e8958a76b0a43778->leave($__internal_4f7f9e1b9ad7b84a518e42d0cf5ed11e56d88e781c694ca4e8958a76b0a43778_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.css.twig";
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
