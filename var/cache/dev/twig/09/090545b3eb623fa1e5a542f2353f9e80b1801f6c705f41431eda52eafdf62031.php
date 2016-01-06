<?php

/* TwigBundle:Exception:exception.rdf.twig */
class __TwigTemplate_befb12c0f16bf0f4d21a655f0c8ad0004db8adeda664be80a89e5d325d950fd4 extends Twig_Template
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
        $__internal_0c4d827cebb4ae3248ce7c05f7ea083df7d7a7f0191304a023928fd6070e1d24 = $this->env->getExtension("native_profiler");
        $__internal_0c4d827cebb4ae3248ce7c05f7ea083df7d7a7f0191304a023928fd6070e1d24->enter($__internal_0c4d827cebb4ae3248ce7c05f7ea083df7d7a7f0191304a023928fd6070e1d24_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.rdf.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/exception.xml.twig", "TwigBundle:Exception:exception.rdf.twig", 1)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        
        $__internal_0c4d827cebb4ae3248ce7c05f7ea083df7d7a7f0191304a023928fd6070e1d24->leave($__internal_0c4d827cebb4ae3248ce7c05f7ea083df7d7a7f0191304a023928fd6070e1d24_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.rdf.twig";
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
