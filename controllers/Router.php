<?php
require_once 'views/View.php';

class Router
{
  private $ctrl;
  private $view;

  public function routeReq(){
    
    try {
      //automatic loading classes of the file 'MODELS'
      spl_autoload_register(function($class){
        require_once('models/'.$class.'.php');
      });

      //we initialize the variable 'URL'
      $url = '';

      //If the URl parametrer is filled
      //Search for the controller based on the variable 'URL'
      if (isset($_GET['url'])) {
        //We decompose L'URL, then we apply a filter
        $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

        //Recorving the first parameter of the URL
        //Small conversion
        //First capital letter
        $controller = ucfirst(strtolower($url[0]));

        $controllerClass = "Controller".$controller;

        //Definition of the path of the desired controller
        $controllerFile = "controllers/".$controllerClass.".php";

        //Checking the existence of the file
        if (file_exists($controllerFile)) {
          require_once($controllerFile);
          $this->ctrl = new $controllerClass($url);
        }
        //Page is not found
        else {
          throw new \Exception("Page introuvable", 1);
        }
      }
      //Otherwise you show the home page
      else {
        require_once('controllers/ControllerAccueil.php');
        $this->ctrl = new ControllerAccueil($url);
      }

    } //If error the error page is displayed
      catch (\Exception $e) {
      $errorMsg = $e->getMessage();
      $this->_view = new View('Error');
      $this->_view->generate(array('errorMsg' => $errorMsg));
    }
  }
}