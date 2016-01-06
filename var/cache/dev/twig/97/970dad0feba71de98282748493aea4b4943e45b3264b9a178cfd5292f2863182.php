<?php

/* WebProfilerBundle:Collector:router.html.twig */
class __TwigTemplate_e1ceea05d9d10d57570040c54022790b1cd8d730d40625fe3cd5b4b2830d6340 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "WebProfilerBundle:Collector:router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_22eacf6c188b27b7604e6efd27110268e1436328cf0cd2ab792f46c272f12d21 = $this->env->getExtension("native_profiler");
        $__internal_22eacf6c188b27b7604e6efd27110268e1436328cf0cd2ab792f46c272f12d21->enter($__internal_22eacf6c188b27b7604e6efd27110268e1436328cf0cd2ab792f46c272f12d21_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Collector:router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_22eacf6c188b27b7604e6efd27110268e1436328cf0cd2ab792f46c272f12d21->leave($__internal_22eacf6c188b27b7604e6efd27110268e1436328cf0cd2ab792f46c272f12d21_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_290b79db8ddb067db3cde08c728bfacaa31243e6b16981437da1efa814fbfd59 = $this->env->getExtension("native_profiler");
        $__internal_290b79db8ddb067db3cde08c728bfacaa31243e6b16981437da1efa814fbfd59->enter($__internal_290b79db8ddb067db3cde08c728bfacaa31243e6b16981437da1efa814fbfd59_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_290b79db8ddb067db3cde08c728bfacaa31243e6b16981437da1efa814fbfd59->leave($__internal_290b79db8ddb067db3cde08c728bfacaa31243e6b16981437da1efa814fbfd59_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_a8b23284ed8e9974b4df13241889e8d95b1c16ea6cf516bc9e2449b08391e4e7 = $this->env->getExtension("native_profiler");
        $__internal_a8b23284ed8e9974b4df13241889e8d95b1c16ea6cf516bc9e2449b08391e4e7->enter($__internal_a8b23284ed8e9974b4df13241889e8d95b1c16ea6cf516bc9e2449b08391e4e7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_a8b23284ed8e9974b4df13241889e8d95b1c16ea6cf516bc9e2449b08391e4e7->leave($__internal_a8b23284ed8e9974b4df13241889e8d95b1c16ea6cf516bc9e2449b08391e4e7_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_41c1302f15d0b69df6e92034199ca4264f6c4a536eebff317605b7c7cfbe950b = $this->env->getExtension("native_profiler");
        $__internal_41c1302f15d0b69df6e92034199ca4264f6c4a536eebff317605b7c7cfbe950b->enter($__internal_41c1302f15d0b69df6e92034199ca4264f6c4a536eebff317605b7c7cfbe950b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_41c1302f15d0b69df6e92034199ca4264f6c4a536eebff317605b7c7cfbe950b->leave($__internal_41c1302f15d0b69df6e92034199ca4264f6c4a536eebff317605b7c7cfbe950b_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
