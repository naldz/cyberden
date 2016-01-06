<?php

/* TwigBundle:Exception:error.txt.twig */
class __TwigTemplate_1afe7fce16796e897136951b003c1e11e1ee5c9b20f9299bdbbab54d3125bfc6 extends Twig_Template
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
        $__internal_210dd0d853db5c9ec9d91a5ab61497bef98159a640b815d4d24540b1aae936c0 = $this->env->getExtension("native_profiler");
        $__internal_210dd0d853db5c9ec9d91a5ab61497bef98159a640b815d4d24540b1aae936c0->enter($__internal_210dd0d853db5c9ec9d91a5ab61497bef98159a640b815d4d24540b1aae936c0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.txt.twig"));

        // line 1
        echo "Oops! An Error Occurred
=======================

The server returned a \"";
        // line 4
        echo (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code"));
        echo " ";
        echo (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text"));
        echo "\".

Something is broken. Please let us know what you were doing when this error occurred.
We will fix it as soon as possible. Sorry for any inconvenience caused.
";
        
        $__internal_210dd0d853db5c9ec9d91a5ab61497bef98159a640b815d4d24540b1aae936c0->leave($__internal_210dd0d853db5c9ec9d91a5ab61497bef98159a640b815d4d24540b1aae936c0_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 4,  22 => 1,);
    }
}
/* Oops! An Error Occurred*/
/* =======================*/
/* */
/* The server returned a "{{ status_code }} {{ status_text }}".*/
/* */
/* Something is broken. Please let us know what you were doing when this error occurred.*/
/* We will fix it as soon as possible. Sorry for any inconvenience caused.*/
/* */
