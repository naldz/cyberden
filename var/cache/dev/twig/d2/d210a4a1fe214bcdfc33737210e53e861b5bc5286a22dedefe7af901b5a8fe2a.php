<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_6544a3a5d653489286d2a99ffd3329a91ff558f76db17c3b2de985c3854ef47c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
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
        $__internal_2a808a69fb66f473ba7f69f966ff035a3949adabd88da00d31b16881bc2830fc = $this->env->getExtension("native_profiler");
        $__internal_2a808a69fb66f473ba7f69f966ff035a3949adabd88da00d31b16881bc2830fc->enter($__internal_2a808a69fb66f473ba7f69f966ff035a3949adabd88da00d31b16881bc2830fc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_2a808a69fb66f473ba7f69f966ff035a3949adabd88da00d31b16881bc2830fc->leave($__internal_2a808a69fb66f473ba7f69f966ff035a3949adabd88da00d31b16881bc2830fc_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_748dcba7b259e5bcffc1300beac4248f60a573447a00a7fe25bead31ad8c44de = $this->env->getExtension("native_profiler");
        $__internal_748dcba7b259e5bcffc1300beac4248f60a573447a00a7fe25bead31ad8c44de->enter($__internal_748dcba7b259e5bcffc1300beac4248f60a573447a00a7fe25bead31ad8c44de_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_748dcba7b259e5bcffc1300beac4248f60a573447a00a7fe25bead31ad8c44de->leave($__internal_748dcba7b259e5bcffc1300beac4248f60a573447a00a7fe25bead31ad8c44de_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_68461cc7e00a05124224288a96435a0a930cc2613194383cd0fd0868ab44158e = $this->env->getExtension("native_profiler");
        $__internal_68461cc7e00a05124224288a96435a0a930cc2613194383cd0fd0868ab44158e->enter($__internal_68461cc7e00a05124224288a96435a0a930cc2613194383cd0fd0868ab44158e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_68461cc7e00a05124224288a96435a0a930cc2613194383cd0fd0868ab44158e->leave($__internal_68461cc7e00a05124224288a96435a0a930cc2613194383cd0fd0868ab44158e_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_914c65ee0b364d2d1ef8a00703cff79982ed096ffd3d227f6a3d60a87fa61031 = $this->env->getExtension("native_profiler");
        $__internal_914c65ee0b364d2d1ef8a00703cff79982ed096ffd3d227f6a3d60a87fa61031->enter($__internal_914c65ee0b364d2d1ef8a00703cff79982ed096ffd3d227f6a3d60a87fa61031_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_914c65ee0b364d2d1ef8a00703cff79982ed096ffd3d227f6a3d60a87fa61031->leave($__internal_914c65ee0b364d2d1ef8a00703cff79982ed096ffd3d227f6a3d60a87fa61031_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
