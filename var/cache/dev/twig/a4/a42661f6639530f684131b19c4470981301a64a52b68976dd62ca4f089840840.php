<?php

/* WebProfilerBundle:Profiler:ajax_layout.html.twig */
class __TwigTemplate_f77e0e8d80ea6541472fed636c1617e1bb557acf4b2a98ce45a04276352f552b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_074c93de6e8b863e327d6840e4df31597d1093266b39cb226d417af6f5041de5 = $this->env->getExtension("native_profiler");
        $__internal_074c93de6e8b863e327d6840e4df31597d1093266b39cb226d417af6f5041de5->enter($__internal_074c93de6e8b863e327d6840e4df31597d1093266b39cb226d417af6f5041de5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:ajax_layout.html.twig"));

        // line 1
        $this->displayBlock('panel', $context, $blocks);
        
        $__internal_074c93de6e8b863e327d6840e4df31597d1093266b39cb226d417af6f5041de5->leave($__internal_074c93de6e8b863e327d6840e4df31597d1093266b39cb226d417af6f5041de5_prof);

    }

    public function block_panel($context, array $blocks = array())
    {
        $__internal_0dc536884a782c094beb930dbeeb8685a29d2e8926f20e91ef83ed555364126b = $this->env->getExtension("native_profiler");
        $__internal_0dc536884a782c094beb930dbeeb8685a29d2e8926f20e91ef83ed555364126b->enter($__internal_0dc536884a782c094beb930dbeeb8685a29d2e8926f20e91ef83ed555364126b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        echo "";
        
        $__internal_0dc536884a782c094beb930dbeeb8685a29d2e8926f20e91ef83ed555364126b->leave($__internal_0dc536884a782c094beb930dbeeb8685a29d2e8926f20e91ef83ed555364126b_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:ajax_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }
}
/* {% block panel '' %}*/
/* */
