<?php

/* @Framework/Form/form_errors.html.php */
class __TwigTemplate_488a16ec04f105ff169c99ff5519c278b42a12084dfc97d54bc15fb50e26a99c extends Twig_Template
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
        $__internal_1c0dd4f319811adce58260eccbcd03748a80d82750c21a978454cf526dfe8d2e = $this->env->getExtension("native_profiler");
        $__internal_1c0dd4f319811adce58260eccbcd03748a80d82750c21a978454cf526dfe8d2e->enter($__internal_1c0dd4f319811adce58260eccbcd03748a80d82750c21a978454cf526dfe8d2e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_errors.html.php"));

        // line 1
        echo "<?php if (count(\$errors) > 0): ?>
    <ul>
        <?php foreach (\$errors as \$error): ?>
            <li><?php echo \$error->getMessage() ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif ?>
";
        
        $__internal_1c0dd4f319811adce58260eccbcd03748a80d82750c21a978454cf526dfe8d2e->leave($__internal_1c0dd4f319811adce58260eccbcd03748a80d82750c21a978454cf526dfe8d2e_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_errors.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if (count($errors) > 0): ?>*/
/*     <ul>*/
/*         <?php foreach ($errors as $error): ?>*/
/*             <li><?php echo $error->getMessage() ?></li>*/
/*         <?php endforeach; ?>*/
/*     </ul>*/
/* <?php endif ?>*/
/* */
