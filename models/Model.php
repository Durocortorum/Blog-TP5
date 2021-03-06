<?php

abstract class Model
{

    private static $_bdd;

    //CONNEXION BDD
    private static function setBdd()
    {
        self::$_bdd = new PDO('mysql:host=localhost;dbname=blog-tp5;charset=utf8;port=3308', 'root', '');

        //GESTION DES ERREURS AVEC CONSTANTES PDO
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    //FONCTION DE CONNEXION BDD
    protected function getBdd()
    {
        if (self::$_bdd == null) {
            self::setBdd();
            return self::$_bdd;
        }
    }

    //CREATION DE LA METHODE
    //DE RECUPERATION DES INFOS DE LA PAGE D'ACCUEIL
    protected function getAccueil($table, $obj)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare('SELECT * FROM ' . $table);
        $req->execute();
        //CREATION DE LA VARIABLE
        //QUI VA CONTENIR LES DONNEES
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            //VAR CONTIENDRA LES DONNEES SOUS FORME D'OBJET
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }

    protected function getAll($table, $obj)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare('SELECT * FROM ' . $table . ' ORDER BY id desc');
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }

    protected function getOne($table, $obj, $id)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("SELECT id, author, title, chapo, content, DATE_FORMAT(date, '%d/%m/%Y à %Hh%i') AS date FROM " . $table . " WHERE id = ?");
        $req->execute(array($id));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $var = new $obj($data);
        return $var;
        $req->closeCursor();
    }

    protected function getUserInfo($user_id)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("SELECT * FROM users WHERE id='" . $user_id . "'");
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      
            $var[] = new User($data);
        }
        return $var;
        $req->closeCursor();
    }

    protected function getAllUsersInfos()
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("SELECT * FROM users");
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new User($data);
        }
        return $var;
        $req->closeCursor();
    }

    //VERIFICATION DE LA CONNEXION
    protected function checkConnexion($email, $password)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("SELECT * FROM users WHERE email='" . $email . "' AND password='" . $password . "'");
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Connexion($data);
        }
        return $var;
        $req->closeCursor();
    }

    //INSCRIPTION USER
    protected function new_user($email, $nom, $prenom, $password)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("INSERT INTO users (email, prenom, nom, password) VALUES ('" . $email . "', '" . $prenom . "', '" . $nom . "', '" . $password . "')");
        $req->execute();
        return "true";
        $req->closeCursor();
    }

    //DELETE USER
    protected function eraseUser($id)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("DELETE FROM users WHERE id='" . $id . "'");
        $req->execute();
        return "true";
        $req->closeCursor();
    }

    //UPDATE USER
    protected function updateUserInfos($email, $nom, $prenom, $password, $id)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("UPDATE users SET email='" . $email . "', prenom='" . $prenom . "', nom='" . $nom . "', password='" . $password . "' WHERE id='" . $id . "'");
        $req->execute();
        return "true";
        $req->closeCursor();
    }

    protected function getAllPostsInfos()
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("SELECT * FROM posts");
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Post($data);
        }
        return $var;
        $req->closeCursor();
    }

    //NEW COMM
    protected function newPostComm($auteur, $post_id, $contenu, $date, $auteur_id, $status)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("INSERT INTO commentaires (auteur, post_id, contenu, date, user_id, statut) VALUES ('" . $auteur . "', '" . $post_id . "', '" . $contenu . "', '" . $date . "', '" . $auteur_id . "', '" . $status . "')");
        $req->execute();
        return "true";
        $req->closeCursor();
    }


    protected function getCommentaires($id)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("SELECT * FROM commentaires WHERE post_id='" . $id . "' AND statut='Valide' ORDER BY date DESC");
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Commentaire($data);
        }
        return $var;
        $req->closeCursor();
    }

    protected function getAllCommToValidate()
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("SELECT * FROM commentaires WHERE statut='En Attente' ORDER BY date DESC");
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Commentaire($data);
        }
        return $var;
        $req->closeCursor();
    }

    protected function setCommValid($id)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("UPDATE commentaires SET statut='Valide' WHERE id='" . $id . "'");
        $req->execute();
        return "true";
        $req->closeCursor();
    }

    protected function eraseComm($id)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("DELETE FROM commentaires WHERE id='" . $id . "'");
        $req->execute();
        return "true";
        $req->closeCursor();
    }

    protected function erasePost($id)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("DELETE FROM posts WHERE id='" . $id . "'");
        $req->execute();
        return "true";
        $req->closeCursor();
    }

    protected function createPost($title, $chapo, $content, $date, $auteur_id, $auteur)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("INSERT INTO posts (title, chapo, content, date, author_id, author) VALUES ('" . $title . "', '" . $chapo . "', '" . $content . "', '" . $date . "', '" . $auteur_id . "', '" . $auteur . "')");
        $req->execute();
        return "true";
        $req->closeCursor();
    }

    protected function updateAPost($id, $chapo, $content, $date, $title)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("UPDATE posts SET title='" . $title . "', chapo='" . $chapo . "', content='" . $content . "', date='" . $date . "' WHERE id=" . $_GET['id']);

        if (!$req->execute()) {
            var_dump($req->errorInfo());
        }
        return "true";
        $req->closeCursor();
    }
}
