<?php

/* @Framework/Form/choice_widget_expanded.html.php */
class __TwigTemplate_ab7ac8ca15ea94b65a7b380761bac51c1156d9d7ca99aee4e2b19b06a1d911ef extends Twig_Template
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
        $__internal_ae5f1bbd2c55039fc247cbc8d3b6d12c623252a042f2d1dc8077f022c342bbaf = $this->env->getExtension("native_profiler");
        $__internal_ae5f1bbd2c55039fc247cbc8d3b6d12c623252a042f2d1dc8077f022c342bbaf->enter($__internal_ae5f1bbd2c55039fc247cbc8d3b6d12c623252a042f2d1dc8077f022c342bbaf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/choice_widget_expanded.html.php"));

        // line 1
        echo "<div <?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>>
<?php foreach (\$form as \$child): ?>
    <?php echo \$view['form']->widget(\$child) ?>
    <?php echo \$view['form']->label(\$child, null, array('translation_domain' => \$choice_translation_domain)) ?>
<?php endforeach ?>
</div>
";
        
        $__internal_ae5f1bbd2c55039fc247cbc8d3b6d12c623252a042f2d1dc8077f022c342bbaf->leave($__internal_ae5f1bbd2c55039fc247cbc8d3b6d12c623252a042f2d1dc8077f022c342bbaf_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/choice_widget_expanded.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <div <?php echo $view['form']->block($form, 'widget_container_attributes') ?>>*/
/* <?php foreach ($form as $child): ?>*/
/*     <?php echo $view['form']->widget($child) ?>*/
/*     <?php echo $view['form']->label($child, null, array('translation_domain' => $choice_translation_domain)) ?>*/
/* <?php endforeach ?>*/
/* </div>*/
/* */
