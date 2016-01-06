<?php

/* @Framework/Form/form_widget_compound.html.php */
class __TwigTemplate_12ad4bcf014c7a122a1d190b01237d2163f4a614f1279ff4925b1abc12de31d6 extends Twig_Template
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
        $__internal_7ba00ae11ba62ccf565ef7f1c35b08061cffbde6483f7e26d8ba0085a95b91f3 = $this->env->getExtension("native_profiler");
        $__internal_7ba00ae11ba62ccf565ef7f1c35b08061cffbde6483f7e26d8ba0085a95b91f3->enter($__internal_7ba00ae11ba62ccf565ef7f1c35b08061cffbde6483f7e26d8ba0085a95b91f3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_widget_compound.html.php"));

        // line 1
        echo "<div <?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>>
    <?php if (!\$form->parent && \$errors): ?>
    <?php echo \$view['form']->errors(\$form) ?>
    <?php endif ?>
    <?php echo \$view['form']->block(\$form, 'form_rows') ?>
    <?php echo \$view['form']->rest(\$form) ?>
</div>
";
        
        $__internal_7ba00ae11ba62ccf565ef7f1c35b08061cffbde6483f7e26d8ba0085a95b91f3->leave($__internal_7ba00ae11ba62ccf565ef7f1c35b08061cffbde6483f7e26d8ba0085a95b91f3_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_widget_compound.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <div <?php echo $view['form']->block($form, 'widget_container_attributes') ?>>*/
/*     <?php if (!$form->parent && $errors): ?>*/
/*     <?php echo $view['form']->errors($form) ?>*/
/*     <?php endif ?>*/
/*     <?php echo $view['form']->block($form, 'form_rows') ?>*/
/*     <?php echo $view['form']->rest($form) ?>*/
/* </div>*/
/* */
