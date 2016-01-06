<?php

/* @Framework/Form/form_widget_simple.html.php */
class __TwigTemplate_b6bb82b9015419d1bf0bf1448e0c4045ec7729fc36ba3ad2f208dfe97a6241f1 extends Twig_Template
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
        $__internal_44f1146feb813f05be1cf85b52d52ea6ca06dda61f3b5eb8ad82fa12404d00d0 = $this->env->getExtension("native_profiler");
        $__internal_44f1146feb813f05be1cf85b52d52ea6ca06dda61f3b5eb8ad82fa12404d00d0->enter($__internal_44f1146feb813f05be1cf85b52d52ea6ca06dda61f3b5eb8ad82fa12404d00d0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_widget_simple.html.php"));

        // line 1
        echo "<input type=\"<?php echo isset(\$type) ? \$view->escape(\$type) : 'text' ?>\" <?php echo \$view['form']->block(\$form, 'widget_attributes') ?><?php if (!empty(\$value) || is_numeric(\$value)): ?> value=\"<?php echo \$view->escape(\$value) ?>\"<?php endif ?> />
";
        
        $__internal_44f1146feb813f05be1cf85b52d52ea6ca06dda61f3b5eb8ad82fa12404d00d0->leave($__internal_44f1146feb813f05be1cf85b52d52ea6ca06dda61f3b5eb8ad82fa12404d00d0_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_widget_simple.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <input type="<?php echo isset($type) ? $view->escape($type) : 'text' ?>" <?php echo $view['form']->block($form, 'widget_attributes') ?><?php if (!empty($value) || is_numeric($value)): ?> value="<?php echo $view->escape($value) ?>"<?php endif ?> />*/
/* */
