<?php

/* @Framework/Form/textarea_widget.html.php */
class __TwigTemplate_fe6c9cba656bf3a5aca9369f677c55fec852147f25c72034939efdc08bb79392 extends Twig_Template
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
        $__internal_8292268ed847b83fdddba3f64989290efbcced8041828cef15e78e57d2ed4f77 = $this->env->getExtension("native_profiler");
        $__internal_8292268ed847b83fdddba3f64989290efbcced8041828cef15e78e57d2ed4f77->enter($__internal_8292268ed847b83fdddba3f64989290efbcced8041828cef15e78e57d2ed4f77_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/textarea_widget.html.php"));

        // line 1
        echo "<textarea <?php echo \$view['form']->block(\$form, 'widget_attributes') ?>><?php echo \$view->escape(\$value) ?></textarea>
";
        
        $__internal_8292268ed847b83fdddba3f64989290efbcced8041828cef15e78e57d2ed4f77->leave($__internal_8292268ed847b83fdddba3f64989290efbcced8041828cef15e78e57d2ed4f77_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/textarea_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <textarea <?php echo $view['form']->block($form, 'widget_attributes') ?>><?php echo $view->escape($value) ?></textarea>*/
/* */
