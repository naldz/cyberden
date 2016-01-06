<?php

/* ::base.html.twig */
class __TwigTemplate_ec8746a45c01201b85b84dfff620314970a54b110e5ea5c3edede8fbe8c05b4b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_9304eb715a53da60e546ca0c6095801ce023eda784126b68d6ecb9898907833b = $this->env->getExtension("native_profiler");
        $__internal_9304eb715a53da60e546ca0c6095801ce023eda784126b68d6ecb9898907833b->enter($__internal_9304eb715a53da60e546ca0c6095801ce023eda784126b68d6ecb9898907833b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_9304eb715a53da60e546ca0c6095801ce023eda784126b68d6ecb9898907833b->leave($__internal_9304eb715a53da60e546ca0c6095801ce023eda784126b68d6ecb9898907833b_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_4ec6d27070960bb9ce6cb6c5cb6302ca7fe6c1988612ce43784eae3b60c370d0 = $this->env->getExtension("native_profiler");
        $__internal_4ec6d27070960bb9ce6cb6c5cb6302ca7fe6c1988612ce43784eae3b60c370d0->enter($__internal_4ec6d27070960bb9ce6cb6c5cb6302ca7fe6c1988612ce43784eae3b60c370d0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_4ec6d27070960bb9ce6cb6c5cb6302ca7fe6c1988612ce43784eae3b60c370d0->leave($__internal_4ec6d27070960bb9ce6cb6c5cb6302ca7fe6c1988612ce43784eae3b60c370d0_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_c80a5364ae3b35728d2ed354040c7423c51b5fb530895cc741a76028cb5ba884 = $this->env->getExtension("native_profiler");
        $__internal_c80a5364ae3b35728d2ed354040c7423c51b5fb530895cc741a76028cb5ba884->enter($__internal_c80a5364ae3b35728d2ed354040c7423c51b5fb530895cc741a76028cb5ba884_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_c80a5364ae3b35728d2ed354040c7423c51b5fb530895cc741a76028cb5ba884->leave($__internal_c80a5364ae3b35728d2ed354040c7423c51b5fb530895cc741a76028cb5ba884_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_364148946885b6ea51de16cc0ddd3598b573ffae1a37ddaebfeeebed604c57b2 = $this->env->getExtension("native_profiler");
        $__internal_364148946885b6ea51de16cc0ddd3598b573ffae1a37ddaebfeeebed604c57b2->enter($__internal_364148946885b6ea51de16cc0ddd3598b573ffae1a37ddaebfeeebed604c57b2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_364148946885b6ea51de16cc0ddd3598b573ffae1a37ddaebfeeebed604c57b2->leave($__internal_364148946885b6ea51de16cc0ddd3598b573ffae1a37ddaebfeeebed604c57b2_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_4cf01f778b909ed2c48bed78c8d47d4a72d09fb598ed4260033869ef6001482d = $this->env->getExtension("native_profiler");
        $__internal_4cf01f778b909ed2c48bed78c8d47d4a72d09fb598ed4260033869ef6001482d->enter($__internal_4cf01f778b909ed2c48bed78c8d47d4a72d09fb598ed4260033869ef6001482d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_4cf01f778b909ed2c48bed78c8d47d4a72d09fb598ed4260033869ef6001482d->leave($__internal_4cf01f778b909ed2c48bed78c8d47d4a72d09fb598ed4260033869ef6001482d_prof);

    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
