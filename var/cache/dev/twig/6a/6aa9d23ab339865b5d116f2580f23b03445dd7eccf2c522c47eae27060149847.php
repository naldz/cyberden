<?php

/* @Framework/Form/form_end.html.php */
class __TwigTemplate_e6aed3b1f38b4692b8a6d34c42d329a0713e791eaca639fcffac389a5067255c extends Twig_Template
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
        $__internal_ac25a76c42ecd19d7c60f9b2a5d396f0365379bbc891bb2a21159d792b1f067b = $this->env->getExtension("native_profiler");
        $__internal_ac25a76c42ecd19d7c60f9b2a5d396f0365379bbc891bb2a21159d792b1f067b->enter($__internal_ac25a76c42ecd19d7c60f9b2a5d396f0365379bbc891bb2a21159d792b1f067b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_end.html.php"));

        // line 1
        echo "<?php if (!isset(\$render_rest) || \$render_rest): ?>
<?php echo \$view['form']->rest(\$form) ?>
<?php endif ?>
</form>
";
        
        $__internal_ac25a76c42ecd19d7c60f9b2a5d396f0365379bbc891bb2a21159d792b1f067b->leave($__internal_ac25a76c42ecd19d7c60f9b2a5d396f0365379bbc891bb2a21159d792b1f067b_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_end.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if (!isset($render_rest) || $render_rest): ?>*/
/* <?php echo $view['form']->rest($form) ?>*/
/* <?php endif ?>*/
/* </form>*/
/* */
