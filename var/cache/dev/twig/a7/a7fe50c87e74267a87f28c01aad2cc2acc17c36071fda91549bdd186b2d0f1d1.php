<?php

/* @Framework/FormTable/form_row.html.php */
class __TwigTemplate_65dc4332ce8103d51458762f50e1b7c79771421561e6b0a35d43f5b40697963f extends Twig_Template
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
        $__internal_64607942a8b6c5f1a6172070a78ce511b663e77a9aa7d24abb442f1ab8819e40 = $this->env->getExtension("native_profiler");
        $__internal_64607942a8b6c5f1a6172070a78ce511b663e77a9aa7d24abb442f1ab8819e40->enter($__internal_64607942a8b6c5f1a6172070a78ce511b663e77a9aa7d24abb442f1ab8819e40_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/form_row.html.php"));

        // line 1
        echo "<tr>
    <td>
        <?php echo \$view['form']->label(\$form) ?>
    </td>
    <td>
        <?php echo \$view['form']->errors(\$form) ?>
        <?php echo \$view['form']->widget(\$form) ?>
    </td>
</tr>
";
        
        $__internal_64607942a8b6c5f1a6172070a78ce511b663e77a9aa7d24abb442f1ab8819e40->leave($__internal_64607942a8b6c5f1a6172070a78ce511b663e77a9aa7d24abb442f1ab8819e40_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/FormTable/form_row.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <tr>*/
/*     <td>*/
/*         <?php echo $view['form']->label($form) ?>*/
/*     </td>*/
/*     <td>*/
/*         <?php echo $view['form']->errors($form) ?>*/
/*         <?php echo $view['form']->widget($form) ?>*/
/*     </td>*/
/* </tr>*/
/* */
