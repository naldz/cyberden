<?php

/* @Framework/Form/choice_widget.html.php */
class __TwigTemplate_f4ce91698df4c0d4c6862ffbca11290442d601828a5bb58cb1a54bba21233a2f extends Twig_Template
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
        $__internal_8f5786d619f29cb360d21018847dfbe67551b01a430196279ef0e5a1bf578eb2 = $this->env->getExtension("native_profiler");
        $__internal_8f5786d619f29cb360d21018847dfbe67551b01a430196279ef0e5a1bf578eb2->enter($__internal_8f5786d619f29cb360d21018847dfbe67551b01a430196279ef0e5a1bf578eb2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/choice_widget.html.php"));

        // line 1
        echo "<?php if (\$expanded): ?>
<?php echo \$view['form']->block(\$form, 'choice_widget_expanded') ?>
<?php else: ?>
<?php echo \$view['form']->block(\$form, 'choice_widget_collapsed') ?>
<?php endif ?>
";
        
        $__internal_8f5786d619f29cb360d21018847dfbe67551b01a430196279ef0e5a1bf578eb2->leave($__internal_8f5786d619f29cb360d21018847dfbe67551b01a430196279ef0e5a1bf578eb2_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/choice_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if ($expanded): ?>*/
/* <?php echo $view['form']->block($form, 'choice_widget_expanded') ?>*/
/* <?php else: ?>*/
/* <?php echo $view['form']->block($form, 'choice_widget_collapsed') ?>*/
/* <?php endif ?>*/
/* */
