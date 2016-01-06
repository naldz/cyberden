<?php

/* @Framework/Form/button_widget.html.php */
class __TwigTemplate_c2ab4d8263d49b6f55d5f95c0dea081001a89164654be81597edbcfba65b8507 extends Twig_Template
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
        $__internal_9a4e4a877106c83d50b9c43fd54d147d33b2e14988bc445c0289a823df68a9a1 = $this->env->getExtension("native_profiler");
        $__internal_9a4e4a877106c83d50b9c43fd54d147d33b2e14988bc445c0289a823df68a9a1->enter($__internal_9a4e4a877106c83d50b9c43fd54d147d33b2e14988bc445c0289a823df68a9a1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/button_widget.html.php"));

        // line 1
        echo "<?php if (!\$label) { \$label = isset(\$label_format)
    ? strtr(\$label_format, array('%name%' => \$name, '%id%' => \$id))
    : \$view['form']->humanize(\$name); } ?>
<button type=\"<?php echo isset(\$type) ? \$view->escape(\$type) : 'button' ?>\" <?php echo \$view['form']->block(\$form, 'button_attributes') ?>><?php echo \$view->escape(false !== \$translation_domain ? \$view['translator']->trans(\$label, array(), \$translation_domain) : \$label) ?></button>
";
        
        $__internal_9a4e4a877106c83d50b9c43fd54d147d33b2e14988bc445c0289a823df68a9a1->leave($__internal_9a4e4a877106c83d50b9c43fd54d147d33b2e14988bc445c0289a823df68a9a1_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/button_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if (!$label) { $label = isset($label_format)*/
/*     ? strtr($label_format, array('%name%' => $name, '%id%' => $id))*/
/*     : $view['form']->humanize($name); } ?>*/
/* <button type="<?php echo isset($type) ? $view->escape($type) : 'button' ?>" <?php echo $view['form']->block($form, 'button_attributes') ?>><?php echo $view->escape(false !== $translation_domain ? $view['translator']->trans($label, array(), $translation_domain) : $label) ?></button>*/
/* */
