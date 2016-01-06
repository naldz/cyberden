<?php

/* TwigBundle:Exception:exception.js.twig */
class __TwigTemplate_c330a41eaea97e571df404bc81694f8a10fc6728a0713cdda1aca95f16a60b7f extends Twig_Template
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
        $__internal_70266d0cd7be2549d73eb43fcb72a6c7113aac92936c1a2eb821c28799744f4d = $this->env->getExtension("native_profiler");
        $__internal_70266d0cd7be2549d73eb43fcb72a6c7113aac92936c1a2eb821c28799744f4d->enter($__internal_70266d0cd7be2549d73eb43fcb72a6c7113aac92936c1a2eb821c28799744f4d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.js.twig"));

        // line 1
        echo "/*
";
        // line 2
        $this->loadTemplate("@Twig/Exception/exception.txt.twig", "TwigBundle:Exception:exception.js.twig", 2)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        // line 3
        echo "*/
";
        
        $__internal_70266d0cd7be2549d73eb43fcb72a6c7113aac92936c1a2eb821c28799744f4d->leave($__internal_70266d0cd7be2549d73eb43fcb72a6c7113aac92936c1a2eb821c28799744f4d_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.js.twig";
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
