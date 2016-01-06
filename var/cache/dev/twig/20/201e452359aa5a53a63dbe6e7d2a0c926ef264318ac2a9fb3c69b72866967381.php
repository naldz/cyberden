<?php

/* WebProfilerBundle:Profiler:toolbar_redirect.html.twig */
class __TwigTemplate_d2bae34dffaa86c887e663867bd4b93e16e6a22df5c75fe9599a3175e10ef2b0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "WebProfilerBundle:Profiler:toolbar_redirect.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e6fc89d5db9c06f9441d0733dca60c82e4ff7d2b64fb3f88eb89f6eae66f28fa = $this->env->getExtension("native_profiler");
        $__internal_e6fc89d5db9c06f9441d0733dca60c82e4ff7d2b64fb3f88eb89f6eae66f28fa->enter($__internal_e6fc89d5db9c06f9441d0733dca60c82e4ff7d2b64fb3f88eb89f6eae66f28fa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:toolbar_redirect.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e6fc89d5db9c06f9441d0733dca60c82e4ff7d2b64fb3f88eb89f6eae66f28fa->leave($__internal_e6fc89d5db9c06f9441d0733dca60c82e4ff7d2b64fb3f88eb89f6eae66f28fa_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_49f79e0b78799bbff13136e14528c6f4242416dfa601392f97db59655a001a72 = $this->env->getExtension("native_profiler");
        $__internal_49f79e0b78799bbff13136e14528c6f4242416dfa601392f97db59655a001a72->enter($__internal_49f79e0b78799bbff13136e14528c6f4242416dfa601392f97db59655a001a72_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Redirection Intercepted";
        
        $__internal_49f79e0b78799bbff13136e14528c6f4242416dfa601392f97db59655a001a72->leave($__internal_49f79e0b78799bbff13136e14528c6f4242416dfa601392f97db59655a001a72_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_86a0c5f61d0b3d31a189a7970ef3b3f005d9b029cffbe49f52c401df9bdfdf1d = $this->env->getExtension("native_profiler");
        $__internal_86a0c5f61d0b3d31a189a7970ef3b3f005d9b029cffbe49f52c401df9bdfdf1d->enter($__internal_86a0c5f61d0b3d31a189a7970ef3b3f005d9b029cffbe49f52c401df9bdfdf1d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <div class=\"sf-reset\">
        <div class=\"block-exception\">
            <h1>This request redirects to <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["location"]) ? $context["location"] : $this->getContext($context, "location")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["location"]) ? $context["location"] : $this->getContext($context, "location")), "html", null, true);
        echo "</a>.</h1>

            <p>
                <small>
                    The redirect was intercepted by the web debug toolbar to help debugging.
                    For more information, see the \"intercept-redirects\" option of the Profiler.
                </small>
            </p>
        </div>
    </div>
";
        
        $__internal_86a0c5f61d0b3d31a189a7970ef3b3f005d9b029cffbe49f52c401df9bdfdf1d->leave($__internal_86a0c5f61d0b3d31a189a7970ef3b3f005d9b029cffbe49f52c401df9bdfdf1d_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_redirect.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 8,  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block title 'Redirection Intercepted' %}*/
/* */
/* {% block body %}*/
/*     <div class="sf-reset">*/
/*         <div class="block-exception">*/
/*             <h1>This request redirects to <a href="{{ location }}">{{ location }}</a>.</h1>*/
/* */
/*             <p>*/
/*                 <small>*/
/*                     The redirect was intercepted by the web debug toolbar to help debugging.*/
/*                     For more information, see the "intercept-redirects" option of the Profiler.*/
/*                 </small>*/
/*             </p>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
