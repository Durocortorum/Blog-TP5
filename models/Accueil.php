<?php

/**
 *
 */
class Accueil
{
  private $_title;
  private $_description;
  private $_nom_prenom;

  public function __construct(array $data)
  {
    $this->hydrate($data);
  }

  //HYDRATATION
  public function hydrate(array $data)
  {
    foreach ($data as $key => $value) {
      $method = 'set' . ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }

  //SETTERS
  public function setTitle($title)
  {
    if (is_string($title)) {
      $this->_title = $title;
    }
  }


  //GETTERS
  public function title()
  {
    return $this->_title;
  }
}
