<?php

/* @Framework/Form/form_rest.html.php */
class __TwigTemplate_b34b9ad9c5007e273816634485632b6ea2d7489deb08de59edb41e9ebe32b984 extends Twig_Template
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
        $__internal_cebfcbfb986b954b62cd9364059a50f938ee7eb28459bb9c68472733c280b6bd = $this->env->getExtension("native_profiler");
        $__internal_cebfcbfb986b954b62cd9364059a50f938ee7eb28459bb9c68472733c280b6bd->enter($__internal_cebfcbfb986b954b62cd9364059a50f938ee7eb28459bb9c68472733c280b6bd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_rest.html.php"));

        // line 1
        echo "<?php foreach (\$form as \$child): ?>
    <?php if (!\$child->isRendered()): ?>
        <?php echo \$view['form']->row(\$child) ?>
    <?php endif; ?>
<?php endforeach; ?>
";
        
        $__internal_cebfcbfb986b954b62cd9364059a50f938ee7eb28459bb9c68472733c280b6bd->leave($__internal_cebfcbfb986b954b62cd9364059a50f938ee7eb28459bb9c68472733c280b6bd_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_rest.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php foreach ($form as $child): ?>*/
/*     <?php if (!$child->isRendered()): ?>*/
/*         <?php echo $view['form']->row($child) ?>*/
/*     <?php endif; ?>*/
/* <?php endforeach; ?>*/
/* */
