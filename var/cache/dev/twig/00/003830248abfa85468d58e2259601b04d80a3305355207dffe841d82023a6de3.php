<?php

/* @Framework/Form/collection_widget.html.php */
class __TwigTemplate_11d5124198f5010f3ef51d670a061ef81b91c67269bfcf22b1c6779bc63bd4e7 extends Twig_Template
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
        $__internal_edb69051497fd5b880c9d893ce9f059ffe00b5391fac70c1672a48cfef5e9161 = $this->env->getExtension("native_profiler");
        $__internal_edb69051497fd5b880c9d893ce9f059ffe00b5391fac70c1672a48cfef5e9161->enter($__internal_edb69051497fd5b880c9d893ce9f059ffe00b5391fac70c1672a48cfef5e9161_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/collection_widget.html.php"));

        // line 1
        echo "<?php if (isset(\$prototype)): ?>
    <?php \$attr['data-prototype'] = \$view->escape(\$view['form']->row(\$prototype)) ?>
<?php endif ?>
<?php echo \$view['form']->widget(\$form, array('attr' => \$attr)) ?>
";
        
        $__internal_edb69051497fd5b880c9d893ce9f059ffe00b5391fac70c1672a48cfef5e9161->leave($__internal_edb69051497fd5b880c9d893ce9f059ffe00b5391fac70c1672a48cfef5e9161_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/collection_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if (isset($prototype)): ?>*/
/*     <?php $attr['data-prototype'] = $view->escape($view['form']->row($prototype)) ?>*/
/* <?php endif ?>*/
/* <?php echo $view['form']->widget($form, array('attr' => $attr)) ?>*/
/* */
