<?php

/* TwigBundle:Exception:error.rdf.twig */
class __TwigTemplate_1ee879ab1e5506ae968a976987e3c0a12f0dfad2238e8e1aef09b8c7a694b810 extends Twig_Template
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
        $__internal_58293e360f71394607340c9ab33faa5c76ac61c143c3586b3d9fb86324bc0c98 = $this->env->getExtension("native_profiler");
        $__internal_58293e360f71394607340c9ab33faa5c76ac61c143c3586b3d9fb86324bc0c98->enter($__internal_58293e360f71394607340c9ab33faa5c76ac61c143c3586b3d9fb86324bc0c98_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.rdf.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/error.xml.twig", "TwigBundle:Exception:error.rdf.twig", 1)->display($context);
        
        $__internal_58293e360f71394607340c9ab33faa5c76ac61c143c3586b3d9fb86324bc0c98->leave($__internal_58293e360f71394607340c9ab33faa5c76ac61c143c3586b3d9fb86324bc0c98_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.rdf.twig";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* {% include '@Twig/Exception/error.xml.twig' %}*/
/* */
