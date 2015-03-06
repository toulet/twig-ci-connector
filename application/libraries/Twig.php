<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

// Load Twig engine
require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();


/**
 * Twig interface for CodeIgniter
 *
 * @author Cyrille TOULET <cyrille.toulet@linux.com>
 * @see http://twig.sensiolabs.org/
 */
class Twig 
{
    // The CodeIgniter core
    private $_codeIgniter = null;

    // The path to Twig templates
    private $_twigTemplatesPath = null;
    
    // The Twig environment options
    private $_twigEnvironmentOptions = null;

    // The path to Twig cache
    private $_twigCachePath = null;

    // The Twig loader
    private $_twigLoader = null;

    // The Twig environment
    private $_twigEnvironment = null;


    /**
     * Initialize the twig engine 
     */
    public function __construct()
    {
        // Get Framework instance
        $this->_codeIgniter =& get_instance();

        // Load twig configuration
        $this->_codeIgniter->config->load('twig');
        $this->_twigTemplatesPath = $this->_codeIgniter->config
            ->item('twig_template_path');
        $this->_twigCachePath = $this->_codeIgniter->config
            ->item('twig_cache_path');
        $this->_twigEnvironmentOptions = $this->_codeIgniter->config
            ->item('twig_environment_options');

        // Initialize the Twig loader
        $this->_twigLoader = new Twig_Loader_Filesystem(
            $this->_twigTemplatesPath, $this->_twigCachePath);

        // Initialize the Twig environment
        $this->_twigEnvironment = new Twig_Environment(
            $this->_twigLoader, $this->_twigEnvironmentOptions);

        // Register site_url function
        $this->_twigEnvironment->addFunction(new Twig_SimpleFunction(
            'site_url', 'site_url'));
    }


    /**
     * Rendering a Twig template with specified data
     * @param template The Twig template path or content
     * @param data The Twig template data
     * @return The Twig render
     */
    public function render($template, $data = array())
    {
        // Render the Twig template
        return $this->_twigEnvironment->render($template, $data);
    }
}

