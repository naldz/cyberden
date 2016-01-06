<?php

/* @Framework/Form/form_rows.html.php */
class __TwigTemplate_2fa8b24060da613200427c47681cebf404dd6364bb1bfedff42a9ce93aa1bad2 extends Twig_Template
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
        $__internal_db4510ca52baa573f432e8ed5434f7321df1dab4a9ab2b24e38f3fbbc5dbb658 = $this->env->getExtension("native_profiler");
        $__internal_db4510ca52baa573f432e8ed5434f7321df1dab4a9ab2b24e38f3fbbc5dbb658->enter($__internal_db4510ca52baa573f432e8ed5434f7321df1dab4a9ab2b24e38f3fbbc5dbb658_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_rows.html.php"));

        // line 1
        echo "<?php foreach (\$form as \$child) : ?>
    <?php echo \$view['form']->row(\$child) ?>
<?php endforeach; ?>
";
        
        $__internal_db4510ca52baa573f432e8ed5434f7321df1dab4a9ab2b24e38f3fbbc5dbb658->leave($__internal_db4510ca52baa573f432e8ed5434f7321df1dab4a9ab2b24e38f3fbbc5dbb658_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_rows.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php foreach ($form as $child) : ?>*/
/*     <?php echo $view['form']->row($child) ?>*/
/* <?php endforeach; ?>*/
/* */
