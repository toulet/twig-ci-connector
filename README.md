# Twig connector for Codeigniter

This library allows to use the Twig template engine in the CodeIgniter 
web framework.


## Legals

**Licence:** This library is provided under the [GNU General Public License, 
version 3](http://opensource.org/licenses/GPL-3.0).

**Author:** Cyrille TOULET <cyrille.toulet@linux.com>


## Usage

First, add your Twig templates in **application/views**.

For example, the template *application/views/homepage.html*:
```php
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Twig template</title>
    </head>

    <body>
        <h1>{{ title }}</h1>
    </body>
</html>
```

And finaly, load Twig and render the template in your controller.

For example, the controller *application/controllers/welcome.php*:
```php
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function index()
    {
        // Load Twig library
        $this->load->library('twig');

	// Set template variables
	$vars['title'] = 'Twig template on CodeIgniter';

        // Render page
        echo $this->twig->render('homepage.html', $vars);
    }
}
```


## Tips

 * I recommend you to load Twig one time in the configuration file 
*application/config/autoload.php*.
 * To extends Twig, register your function in the Twig library constructor (
*application/libraries/Twig.php*).

