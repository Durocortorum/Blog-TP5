<?php
//Recover SESSION
session_start();

class View
{
  //file view
  private $_file;

  //Title Page
  private $_t;

  function __construct($action)
  {
    $this->_file = 'views/view' . $action . '.php';
  }

  //Create function generate and display the view
  public function generate($data)
  {
    //content send
    $content = $this->generateFile($this->_file, $data);


    $view = $this->generateFile('views/template.php', array('t' => $this->_t, 'content' => $content));
    echo $view;
  }

  private function generateFile($file, $data)
  {
    if (file_exists($file)) {
      extract($data);

      //to start temporisation
      ob_start();

      require $file;

      //stop the temporisation
      return ob_get_clean();
    } else {
      throw new \Exception("Fichier " . $file . " introuvable", 1);
    }
  }
}
