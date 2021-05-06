<?php

abstract class Model
{
    private static $_bdd;

    // Connexion BDD
    private static function setBdd(){
        self::$_bdd = new PDO('mysql:host=localhost;dbname=blog-tp5;charset=utf8;port=3308', 'root', '');

        // error management constant PDO
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // function connect bdd
    protected function getBdd(){
        if(self::$_bdd == null){
            self::setBdd();
            Return self::$_bdd;
        }
    }

    // retrieve all the data from the table
    protected function getAll($table, $obj){
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare('SELECT * FROM '.$table.' ORDER BY id DESC');
        $req->execute();

        // create variable data contains the data
        while ($data = $req->fetch(PDO::FETCH_ASSOC)){
            // variable var contains the data forms objets
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }

    protected function getOne($table, $obj, $id)
    {
      $this->getBdd();
      $var = [];
      $req = self::$_bdd->prepare("SELECT id, author, title, chapo, content, DATE_FORMAT(date, '%d/%m/%Y à %Hh%i') AS date FROM " .$table. " WHERE id = ?");
      $req->execute(array($id));
      $data = $req->fetch(PDO::FETCH_ASSOC);
      $var = new $obj($data);
      
  
      return $var;
      $req->closeCursor();
    }
}