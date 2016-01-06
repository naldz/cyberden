<?php

/* @Framework/Form/checkbox_widget.html.php */
class __TwigTemplate_228ed317102c648a2296dacb6908116e1ddaf42dfc93324d40e584adfb4183a6 extends Twig_Template
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
        $__internal_878008e2b8c23da502ee3da8f5f0eb99fc06dfc6e130796ecdc24b84f21eda68 = $this->env->getExtension("native_profiler");
        $__internal_878008e2b8c23da502ee3da8f5f0eb99fc06dfc6e130796ecdc24b84f21eda68->enter($__internal_878008e2b8c23da502ee3da8f5f0eb99fc06dfc6e130796ecdc24b84f21eda68_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/checkbox_widget.html.php"));

        // line 1
        echo "<input type=\"checkbox\"
    <?php echo \$view['form']->block(\$form, 'widget_attributes') ?>
    <?php if (strlen(\$value) > 0): ?> value=\"<?php echo \$view->escape(\$value) ?>\"<?php endif ?>
    <?php if (\$checked): ?> checked=\"checked\"<?php endif ?>
/>
";
        
        $__internal_878008e2b8c23da502ee3da8f5f0eb99fc06dfc6e130796ecdc24b84f21eda68->leave($__internal_878008e2b8c23da502ee3da8f5f0eb99fc06dfc6e130796ecdc24b84f21eda68_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/checkbox_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <input type="checkbox"*/
/*     <?php echo $view['form']->block($form, 'widget_attributes') ?>*/
/*     <?php if (strlen($value) > 0): ?> value="<?php echo $view->escape($value) ?>"<?php endif ?>*/
/*     <?php if ($checked): ?> checked="checked"<?php endif ?>*/
/* />*/
/* */
