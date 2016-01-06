<?php

/* TwigBundle:Exception:error.xml.twig */
class __TwigTemplate_d72ec21f87f0a65816133cd18915c69246e4379c670660af283cecdc691c5c48 extends Twig_Template
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
        $__internal_49ce7e2e078369aee88fbf39159b296e3065cbb0c4a21c85b9952d7883fe352d = $this->env->getExtension("native_profiler");
        $__internal_49ce7e2e078369aee88fbf39159b296e3065cbb0c4a21c85b9952d7883fe352d->enter($__internal_49ce7e2e078369aee88fbf39159b296e3065cbb0c4a21c85b9952d7883fe352d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.xml.twig"));

        // line 1
        echo "<?xml version=\"1.0\" encoding=\"";
        echo twig_escape_filter($this->env, $this->env->getCharset(), "html", null, true);
        echo "\" ?>

<error code=\"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo "\" message=\"";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo "\" />
";
        
        $__internal_49ce7e2e078369aee88fbf39159b296e3065cbb0c4a21c85b9952d7883fe352d->leave($__internal_49ce7e2e078369aee88fbf39159b296e3065cbb0c4a21c85b9952d7883fe352d_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 3,  22 => 1,);
    }
}
/* <?xml version="1.0" encoding="{{ _charset }}" ?>*/
/* */
/* <error code="{{ status_code }}" message="{{ status_text }}" />*/
/* */
