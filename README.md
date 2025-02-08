# Twig connector for Codeigniter

This library allows to use the Twig template engine v3 in the CodeIgniter web framework v4.


## Legals

**Licence:** This library is provided under the [GNU General Public License, 
version 3](http://opensource.org/licenses/GPL-3.0).

**Author:** Cyrille TOULET <cyrille.toulet@linux.com>


## Usage

First, add your Twig templates in **app/Views/** directory.

For example, the template *app/Views/homepage.html*:
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

Edit the BaseController class in **app/Controllers/BaseController.php** to instanciate the Twig library:

```php
<?php

//...
use App\Libraries\Twig;

//...
    /**
     * Instance of the Twig library.
     *
     * @var Twig
     */
    protected $twig;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        //...

    	// Load the Twig library
	$this->twig = new Twig();
    }
}
```

And finaly, use it in your controllers!
```php
<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
	// Set template variables
	$vars['title'] = 'Twig template on CodeIgniter';

        // Render page
        echo $this->twig->render('homepage.html', $vars);
    }
}
```
