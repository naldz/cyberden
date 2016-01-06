<?php

/* TwigBundle:Exception:exception.css.twig */
class __TwigTemplate_9f3d27c87591c1820421a271831a95d4264534f823912e3e633ef42dbb0bb0e5 extends Twig_Template
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
        $__internal_76d6406ad99e583a63c224a42985110b31225e1281f95863e534650313085d2d = $this->env->getExtension("native_profiler");
        $__internal_76d6406ad99e583a63c224a42985110b31225e1281f95863e534650313085d2d->enter($__internal_76d6406ad99e583a63c224a42985110b31225e1281f95863e534650313085d2d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.css.twig"));

        // line 1
        echo "/*
";
        // line 2
        $this->loadTemplate("@Twig/Exception/exception.txt.twig", "TwigBundle:Exception:exception.css.twig", 2)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        // line 3
        echo "*/
";
        
        $__internal_76d6406ad99e583a63c224a42985110b31225e1281f95863e534650313085d2d->leave($__internal_76d6406ad99e583a63c224a42985110b31225e1281f95863e534650313085d2d_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.css.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 3,  25 => 2,  22 => 1,);
    }
}
/* /**/
/* {% include '@Twig/Exception/exception.txt.twig' with { 'exception': exception } %}*/
/* *//* */
/* */
