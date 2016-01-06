<?php

/* @Framework/FormTable/hidden_row.html.php */
class __TwigTemplate_6f09c89236a460835d31814c81a2f0fda4b0c260c1b581ca860c5a228e0ecab2 extends Twig_Template
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
        $__internal_1e0200dc51c3ff885728140e530dffb96b04c09c5ba2a1fe622ac0772ce0a537 = $this->env->getExtension("native_profiler");
        $__internal_1e0200dc51c3ff885728140e530dffb96b04c09c5ba2a1fe622ac0772ce0a537->enter($__internal_1e0200dc51c3ff885728140e530dffb96b04c09c5ba2a1fe622ac0772ce0a537_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/hidden_row.html.php"));

        // line 1
        echo "<tr style=\"display: none\">
    <td colspan=\"2\">
        <?php echo \$view['form']->widget(\$form) ?>
    </td>
</tr>
";
        
        $__internal_1e0200dc51c3ff885728140e530dffb96b04c09c5ba2a1fe622ac0772ce0a537->leave($__internal_1e0200dc51c3ff885728140e530dffb96b04c09c5ba2a1fe622ac0772ce0a537_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/FormTable/hidden_row.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <tr style="display: none">*/
/*     <td colspan="2">*/
/*         <?php echo $view['form']->widget($form) ?>*/
/*     </td>*/
/* </tr>*/
/* */
