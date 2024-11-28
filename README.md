[![Latest Stable Version](https://poser.okvpn.org/julio101290/boilerplatecompanies/v/stable)](https://packagist.org/packages/julio101290/boilerplatecompanies) [![Total Downloads](https://poser.okvpn.org/julio101290/boilerplatecompanies/downloads)](https://packagist.org/packages/julio101290/boilerplatecompanies) [![Latest Unstable Version](https://poser.okvpn.org/julio101290/boilerplatecompanies/v/unstable)](https://packagist.org/packages/julio101290/boilerplatecompanies) [![License](https://poser.okvpn.org/julio101290/boilerplatecompanies/license)](https://packagist.org/packages/julio101290/boilerplatecompanies)

## CodeIgniter 4 Boilerplate Companies
CodeIgniter4 Boilerplatecompanies CRUD MVC contain capture, Name RFC 'TAXID Mexican', upload logo, key certificate FIEL and CSD, settings EMail, invoice Dominican Republic switch


## Requirements
* PhpCfdi\SatCatalogos
* julio101290/boilerplatelog
* hermawan/codeigniter4-datatables

## Installation

### Run commands
	
 	composer require phpcfdi/sat-catalogos

   	composer require hermawan/codeigniter4-datatables

     	composer require julio101290/boilerplatelog

	composer require julio101290/boilerplatecompanies

### Run command for migration and seeder

	php spark boilerplatecompanies:installcompaniescrud

 	php spark boilerplatelog:installlog

 ### BaseController.php Config

 Add SAT Catalogos Factory and use global variabes from conection DNS with SQLite

 like

	 <?php
	
	namespace App\Controllers;
	
	use CodeIgniter\Controller;
	use CodeIgniter\HTTP\CLIRequest;
	use CodeIgniter\HTTP\IncomingRequest;
	use CodeIgniter\HTTP\RequestInterface;
	use CodeIgniter\HTTP\ResponseInterface;
	use Psr\Log\LoggerInterface;
 	//ADD
	use PhpCfdi\SatCatalogos\Factory;
	
	/**
	 * Class BaseController
	 *
	 * BaseController provides a convenient place for loading components
	 * and performing functions that are needed by all your controllers.
	 * Extend this class in any new controllers:
	 *     class Home extends BaseController
	 *
	 * For security be sure to declare any new methods as protected or private.
	 */
	abstract class BaseController extends Controller
	{
	    /**
	     * Instance of the main Request object.
	     *
	     * @var CLIRequest|IncomingRequest
	     */
	    protected $request;
	
	    /**
	     * An array of helpers to be loaded automatically upon
	     * class instantiation. These helpers will be available
	     * to all other controllers that extend BaseController.
	     *
	     * @var array
	     */
	    protected $helpers = [];
	    public $catalogosSAT;
	    public $unidadesSAT;
	    /**
	     * Be sure to declare properties for any property fetch you initialized.
	     * The creation of dynamic property is deprecated in PHP 8.2.
	     */
	    // protected $session;
	
	    /**
	     * Constructor.
	     */
	    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	    {
	        // Do Not Edit This Line
	        parent::initController($request, $response, $logger);
	
	        // Preload any models, libraries, etc, here.
	
	        // E.g.: $this->session = \Config\Services::session();
	        
	        date_default_timezone_set("America/Mazatlan");
	
		//ADD
	        $dsn = "sqlite:".ROOTPATH."writable/database/catalogossat.db";
	        $factory = new Factory();
	        $satCatalogos = $factory->catalogosFromDsn($dsn);
	        $this->catalogosSAT = $satCatalogos;
	        
	       
	       
	    }
	}

 
### Make folder and download Database SAT Catalogs
* Download and uncompress the file https://github.com/phpcfdi/resources-sat-catalogs/releases/latest/download/catalogs.db.bz2
* Put in the folder writable/database/catalogossat.db

### Make the menu
![image](https://github.com/user-attachments/assets/9357327f-3188-4895-9a6e-d0fc379787ba)




# Ready


Usage
-----
You can find how it works with the read code routes, controller and views etc. Finnally... Happy Coding!

Changelog
--------
Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

Contributing
------------
Contributions are very welcome.

License
-------

This package is free software distributed under the terms of the [MIT license](LICENSE.md).
