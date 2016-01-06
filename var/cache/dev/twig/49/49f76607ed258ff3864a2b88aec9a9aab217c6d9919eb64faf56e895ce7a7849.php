<?php

/* @Framework/Form/form_row.html.php */
class __TwigTemplate_92264ee430e4299a79fc0442a099f46a168d49c3e56e29e2e48ca64dbc19c45b extends Twig_Template
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
        $__internal_33b10d9f4d42d819aa4b2afe9874e9a752c61dfcd07cdd2b4588c473afa6fef2 = $this->env->getExtension("native_profiler");
        $__internal_33b10d9f4d42d819aa4b2afe9874e9a752c61dfcd07cdd2b4588c473afa6fef2->enter($__internal_33b10d9f4d42d819aa4b2afe9874e9a752c61dfcd07cdd2b4588c473afa6fef2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_row.html.php"));

        // line 1
        echo "<div>
    <?php echo \$view['form']->label(\$form) ?>
    <?php echo \$view['form']->errors(\$form) ?>
    <?php echo \$view['form']->widget(\$form) ?>
</div>
";
        
        $__internal_33b10d9f4d42d819aa4b2afe9874e9a752c61dfcd07cdd2b4588c473afa6fef2->leave($__internal_33b10d9f4d42d819aa4b2afe9874e9a752c61dfcd07cdd2b4588c473afa6fef2_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_row.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <div>*/
/*     <?php echo $view['form']->label($form) ?>*/
/*     <?php echo $view['form']->errors($form) ?>*/
/*     <?php echo $view['form']->widget($form) ?>*/
/* </div>*/
/* */
