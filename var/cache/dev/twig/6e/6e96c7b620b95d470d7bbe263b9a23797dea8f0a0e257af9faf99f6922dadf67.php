<?php

/* TwigBundle:Exception:exception.json.twig */
class __TwigTemplate_85ac9e32888c05ea2f6350ee8ec2fc83cf7a927c3258189614106c1fce96a7ce extends Twig_Template
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
        $__internal_ba586ce8fb34ca9b474ed7d0692d3a6922686c31091ccbb5691b21029f682984 = $this->env->getExtension("native_profiler");
        $__internal_ba586ce8fb34ca9b474ed7d0692d3a6922686c31091ccbb5691b21029f682984->enter($__internal_ba586ce8fb34ca9b474ed7d0692d3a6922686c31091ccbb5691b21029f682984_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.json.twig"));

        // line 1
        echo twig_jsonencode_filter(array("error" => array("code" => (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "message" => (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "exception" => $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "toarray", array()))));
        echo "
";
        
        $__internal_ba586ce8fb34ca9b474ed7d0692d3a6922686c31091ccbb5691b21029f682984->leave($__internal_ba586ce8fb34ca9b474ed7d0692d3a6922686c31091ccbb5691b21029f682984_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.json.twig";
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
/* {{ { 'error': { 'code': status_code, 'message': status_text, 'exception': exception.toarray } }|json_encode|raw }}*/
/* */
