<?php

/* TwigBundle:Exception:error.atom.twig */
class __TwigTemplate_53f22f0fc3622c68e375f36647b4ebf1d6e0a3c1e6870b3307475364c4cc70fd extends Twig_Template
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
        $__internal_d1690fb3bbbfd51d45e7cbfb513b1c4067fdb9d4c4f53720718256a210f6892d = $this->env->getExtension("native_profiler");
        $__internal_d1690fb3bbbfd51d45e7cbfb513b1c4067fdb9d4c4f53720718256a210f6892d->enter($__internal_d1690fb3bbbfd51d45e7cbfb513b1c4067fdb9d4c4f53720718256a210f6892d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.atom.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/error.xml.twig", "TwigBundle:Exception:error.atom.twig", 1)->display($context);
        
        $__internal_d1690fb3bbbfd51d45e7cbfb513b1c4067fdb9d4c4f53720718256a210f6892d->leave($__internal_d1690fb3bbbfd51d45e7cbfb513b1c4067fdb9d4c4f53720718256a210f6892d_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.atom.twig";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* {% include '@Twig/Exception/error.xml.twig' %}*/
/* */
