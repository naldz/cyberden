<?php

/* @Framework/Form/form_widget.html.php */
class __TwigTemplate_094ce5bf05199bbdfb0d813e43685f1cdb844dff374c34854c20b4f1c2aeb049 extends Twig_Template
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
        $__internal_9ec880ba6cfb995ef9852a5df9bafce81f048678a8fe3fc7917414f53e796b5c = $this->env->getExtension("native_profiler");
        $__internal_9ec880ba6cfb995ef9852a5df9bafce81f048678a8fe3fc7917414f53e796b5c->enter($__internal_9ec880ba6cfb995ef9852a5df9bafce81f048678a8fe3fc7917414f53e796b5c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_widget.html.php"));

        // line 1
        echo "<?php if (\$compound): ?>
<?php echo \$view['form']->block(\$form, 'form_widget_compound')?>
<?php else: ?>
<?php echo \$view['form']->block(\$form, 'form_widget_simple')?>
<?php endif ?>
";
        
        $__internal_9ec880ba6cfb995ef9852a5df9bafce81f048678a8fe3fc7917414f53e796b5c->leave($__internal_9ec880ba6cfb995ef9852a5df9bafce81f048678a8fe3fc7917414f53e796b5c_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if ($compound): ?>*/
/* <?php echo $view['form']->block($form, 'form_widget_compound')?>*/
/* <?php else: ?>*/
/* <?php echo $view['form']->block($form, 'form_widget_simple')?>*/
/* <?php endif ?>*/
/* */
