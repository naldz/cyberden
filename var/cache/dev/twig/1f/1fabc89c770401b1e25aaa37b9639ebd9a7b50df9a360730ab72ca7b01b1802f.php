<?php

/* TwigBundle:Exception:error.json.twig */
class __TwigTemplate_0ecab8be8fe2c5fbf35a60f262a1fdc1e5b1f719893bbcdaa3d8dc557d6728ca extends Twig_Template
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
        $__internal_09c0cd298ceff10aff07423c31ac17598a5be2a17e62533ca61787368914bfbc = $this->env->getExtension("native_profiler");
        $__internal_09c0cd298ceff10aff07423c31ac17598a5be2a17e62533ca61787368914bfbc->enter($__internal_09c0cd298ceff10aff07423c31ac17598a5be2a17e62533ca61787368914bfbc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.json.twig"));

        // line 1
        echo twig_jsonencode_filter(array("error" => array("code" => (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "message" => (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")))));
        echo "
";
        
        $__internal_09c0cd298ceff10aff07423c31ac17598a5be2a17e62533ca61787368914bfbc->leave($__internal_09c0cd298ceff10aff07423c31ac17598a5be2a17e62533ca61787368914bfbc_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.json.twig";
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
/* {{ { 'error': { 'code': status_code, 'message': status_text } }|json_encode|raw }}*/
/* */
