<?php

/* @Framework/Form/radio_widget.html.php */
class __TwigTemplate_3c413cae53611a22d347379684702199f879f8b04d5cfc65888ee17fc90e512b extends Twig_Template
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
        $__internal_dc6fad74e4d88bb9e9fa31e58739f1e23685978c332b82e6f46247076e299b18 = $this->env->getExtension("native_profiler");
        $__internal_dc6fad74e4d88bb9e9fa31e58739f1e23685978c332b82e6f46247076e299b18->enter($__internal_dc6fad74e4d88bb9e9fa31e58739f1e23685978c332b82e6f46247076e299b18_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/radio_widget.html.php"));

        // line 1
        echo "<input type=\"radio\"
    <?php echo \$view['form']->block(\$form, 'widget_attributes') ?>
    value=\"<?php echo \$view->escape(\$value) ?>\"
    <?php if (\$checked): ?> checked=\"checked\"<?php endif ?>
/>
";
        
        $__internal_dc6fad74e4d88bb9e9fa31e58739f1e23685978c332b82e6f46247076e299b18->leave($__internal_dc6fad74e4d88bb9e9fa31e58739f1e23685978c332b82e6f46247076e299b18_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/radio_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <input type="radio"*/
/*     <?php echo $view['form']->block($form, 'widget_attributes') ?>*/
/*     value="<?php echo $view->escape($value) ?>"*/
/*     <?php if ($checked): ?> checked="checked"<?php endif ?>*/
/* />*/
/* */
