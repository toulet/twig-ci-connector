<?php

namespace App\Libraries;


/**
 * A Twig library connector for CodeIgniter
 * 
 * @author Cyrille TOULET <cyrille.toulet@linux.com
 * @see https://twig.symfony.com/doc/
 */
class Twig 
{

    // The Twig loader
    private $_twigLoader = null;

    // The Twig environment
    private $_twigEnvironment = null;


    /**
     * Initialize the twig engine 
     */
    public function __construct()
    {
	// Get configurations
	$appPathsConfig = new \Config\Paths();
	$appCacheConfig = new \Config\Cache();

	// Initialize the Twig loader
        $this->_twigLoader = new \Twig\Loader\FilesystemLoader($appPathsConfig->viewDirectory);

	// Set Twig environment options
	$this->_twigEnvironmentOptions = array();
	$this->_twigEnvironmentOptions['cahe'] = $appCacheConfig->file['storePath'];

	// Initialize the Twig environment
	$this->_twigEnvironment = new \Twig\Environment($this->_twigLoader, $this->_twigEnvironmentOptions);

	// Register site_url function
	$this->_twigEnvironment->addFunction(new \Twig\TwigFunction('site_url', 'site_url'));
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
