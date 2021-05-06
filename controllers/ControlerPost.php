<?php
require_once 'views/View.php';

class ControllerPost
{

    private $_postManager;
    private $_view;
    private $_commentaireManager;

    public function __construct()
    {
            extract($_GET);
            if(isset($admin) && $_SESSION['redacteur'] == "true")
            {
                $this->listPost();
            }
            else if(isset($update) && $_SESSION['redacteur'] == "true")
            {
                $this->updatePost();
            }
            else if(isset($view))
            {
                $this->post();
            }
            else
            {
                throw new \Exception("Page Introuvable");
            }
    }

    private function post()
    {
        extract($_POST);
        extract($_GET);
        //AFFICHAGE D'UN POST SEUL
        $this->_commentaireManager = new CommentaireManager;
        $this->_postManager = new PostManager;
        $commPosted = false;

        //SI : POSTER UN COMMENTAIRE
        if(isset($newComm))
        {
            $this->_commentaireManager->newComm($auteur, $post_id, $contenu, $date, $auteur_id, 'En Attente');
            $commPosted = true;
        }

        //RECUPERATION ET AFFICHAGE DU POST ET DE SES COMMENTAIRES
        $commentaires = $this->_commentaireManager->getComm($id);
        $post = $this->_postManager->getPost($id);
        $this->_view = new View('OnePost');
        $this->_view->generate(array('post' => $post, 'commentaires' => $commentaires, 'commPosted' => $commPosted));
    }



        //RECUPERATION ET AFFICHAGE DU POST ET DE SES COMMENTAIRES
        // $commentaires = $this->_commentaireManager->getComm($_GET['id']);
        $post = $this->_postManager->getPost($id);
        $this->_view = new View('UpdatePost');
        $this->_view->generate(array('post' => $post, 'form' => $form)); 
    }
    
}
?>
