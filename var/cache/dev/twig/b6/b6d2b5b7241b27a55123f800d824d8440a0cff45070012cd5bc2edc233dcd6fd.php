<?php

/* @Framework/FormTable/form_widget_compound.html.php */
class __TwigTemplate_9e09aaf492a7da300143740d03bc1e5146bc2b0a0ed6817f02861dd3dde93a3a extends Twig_Template
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
        $__internal_2e55e92f9f32616c57648e897cc37d13514a9ae9d8046b0229562c8adca29b20 = $this->env->getExtension("native_profiler");
        $__internal_2e55e92f9f32616c57648e897cc37d13514a9ae9d8046b0229562c8adca29b20->enter($__internal_2e55e92f9f32616c57648e897cc37d13514a9ae9d8046b0229562c8adca29b20_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/form_widget_compound.html.php"));

        // line 1
        echo "<table <?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>>
    <?php if (!\$form->parent && \$errors): ?>
    <tr>
        <td colspan=\"2\">
            <?php echo \$view['form']->errors(\$form) ?>
        </td>
    </tr>
    <?php endif ?>
    <?php echo \$view['form']->block(\$form, 'form_rows') ?>
    <?php echo \$view['form']->rest(\$form) ?>
</table>
";
        
        $__internal_2e55e92f9f32616c57648e897cc37d13514a9ae9d8046b0229562c8adca29b20->leave($__internal_2e55e92f9f32616c57648e897cc37d13514a9ae9d8046b0229562c8adca29b20_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/FormTable/form_widget_compound.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <table <?php echo $view['form']->block($form, 'widget_container_attributes') ?>>*/
/*     <?php if (!$form->parent && $errors): ?>*/
/*     <tr>*/
/*         <td colspan="2">*/
/*             <?php echo $view['form']->errors($form) ?>*/
/*         </td>*/
/*     </tr>*/
/*     <?php endif ?>*/
/*     <?php echo $view['form']->block($form, 'form_rows') ?>*/
/*     <?php echo $view['form']->rest($form) ?>*/
/* </table>*/
/* */
