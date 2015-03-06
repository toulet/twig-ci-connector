<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * The Twig library configuration file
 *
 * @author Cyrille TOULET <cyrille.toulet@linux.com>
 */

// The path to twig templates
$config['twig_template_path']       = APPPATH . 'views';

// The path to twig cache
$config['twig_cache_path']          = APPPATH . 'cache/twig';

// The twig environment options
$config['twig_environment_options'] = array (
    'autoescape' => FALSE
);

