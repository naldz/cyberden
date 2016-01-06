<?php

/* @Framework/Form/money_widget.html.php */
class __TwigTemplate_fa5b8ebc6d57c9bd9f90b793689575a33bdfc741fbaeb57df700da82d60c9745 extends Twig_Template
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
        $__internal_8ab74c03b7de3c33891ac21c55946b12f7fc8a97cd26a3f3c90003d1f9d8242b = $this->env->getExtension("native_profiler");
        $__internal_8ab74c03b7de3c33891ac21c55946b12f7fc8a97cd26a3f3c90003d1f9d8242b->enter($__internal_8ab74c03b7de3c33891ac21c55946b12f7fc8a97cd26a3f3c90003d1f9d8242b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/money_widget.html.php"));

        // line 1
        echo "<?php echo str_replace('";
        echo twig_escape_filter($this->env, (isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")), "html", null, true);
        echo "', \$view['form']->block(\$form, 'form_widget_simple'), \$money_pattern) ?>
";
        
        $__internal_8ab74c03b7de3c33891ac21c55946b12f7fc8a97cd26a3f3c90003d1f9d8242b->leave($__internal_8ab74c03b7de3c33891ac21c55946b12f7fc8a97cd26a3f3c90003d1f9d8242b_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/money_widget.html.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php echo str_replace('{{ widget }}', $view['form']->block($form, 'form_widget_simple'), $money_pattern) ?>*/
/* */
