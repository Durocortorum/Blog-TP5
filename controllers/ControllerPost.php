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
        if (isset($admin) && $_SESSION['redacteur'] == "true") {
            $this->listPost();
        } else if (isset($update) && $_SESSION['redacteur'] == "true") {
            $this->updatePost();
        } else if (isset($view)) {
            $this->post();
        } else {
            throw new \Exception("Page Introuvable");
        }
    }

    private function post()
    {
        $auteur = filter_input(INPUT_POST, 'auteur') !== null ? filter_var(filter_input(INPUT_POST, 'auteur'), FILTER_SANITIZE_STRING) : '';
        $post_id = filter_input(INPUT_POST, 'post_id') !== null ? filter_var(filter_input(INPUT_POST, 'post_id'), FILTER_SANITIZE_STRING) : '';
        $contenu = filter_input(INPUT_POST, 'contenu') !== null ? filter_var(filter_input(INPUT_POST, 'contenu'), FILTER_SANITIZE_STRING) : '';
        $date = filter_input(INPUT_POST, 'date') !== null ? filter_var(filter_input(INPUT_POST, 'date'), FILTER_SANITIZE_STRING) : '';
        $auteur_id = filter_input(INPUT_POST, 'auteur_id') !== null ? filter_var(filter_input(INPUT_POST, 'auteur_id'), FILTER_SANITIZE_STRING) : '';

        if (isset($_GET)) {
            extract($_GET);
        }
        //AFFICHAGE D'UN POST SEUL
        $this->_commentaireManager = new CommentaireManager;
        $this->_postManager = new PostManager;
        $commPosted = false;

        //SI : POSTER UN COMMENTAIRE
        if (filter_input(INPUT_POST, 'newComm') !== null) {
            $this->_commentaireManager->newComm($auteur, $post_id, $contenu, $date, $auteur_id, 'En Attente');
            $commPosted = true;
        }

        //RECUPERATION ET AFFICHAGE DU POST ET DE SES COMMENTAIRES
        $commentaires = $this->_commentaireManager->getComm($id);
        $post = $this->_postManager->getPost($id);
        $this->_view = new View('OnePost');
        $this->_view->generate(array('post' => $post, 'commentaires' => $commentaires, 'commPosted' => $commPosted));
    }

    private function listPost()
    {
        if (isset($_GET)) {
            extract($_GET);
        }
        //LISTE DES POSTS : ADMINS
        $this->_postManager = new postManager;

        //SI : SUPPRESSION D'UN POST
        if (isset($id_del) && $del == 1) {
            $this->_postManager->deleteAPost($id_del);
        }

        $postInfos = $this->_postManager->getAllPostsInfo();
        $this->_view = new View('Post');
        $this->_view->generate(array('postInfos' => $postInfos, 'form_msg' => 'Liste Posts', 'form' => '0', 'title' => 'Espace Admin'));
    }

    private function updatePost()
    {
        if (isset($_GET)) {
            extract($_GET);
        }
        //AFFICHAGE D'UN POST SEUL
        $this->_postManager = new PostManager;
        $post=$this->_postManager->getPost($id);
        $form = 1;
        //SI : POSTER UN COMMENTAIRE
        if (filter_input(INPUT_POST, 'updatePost')!==null) {
            $title = filter_input(INPUT_POST, 'title') !== null ? filter_var(filter_input(INPUT_POST, 'title'), FILTER_SANITIZE_STRING) : '';
            $chapo = filter_input(INPUT_POST, 'chapo') !== null ? filter_var(filter_input(INPUT_POST, 'chapo'), FILTER_SANITIZE_STRING) : '';
            $content = filter_input(INPUT_POST, 'content') !== null ? filter_var(filter_input(INPUT_POST, 'content'), FILTER_SANITIZE_STRING) : '';
            $date = filter_input(INPUT_POST, 'date') !== null ? filter_var(filter_input(INPUT_POST, 'date'), FILTER_SANITIZE_STRING) : '';
            $chapo = htmlentities(htmlspecialchars($chapo));
            $title = htmlentities(htmlspecialchars($title));
            $content = htmlentities(htmlspecialchars($content));
            $content = str_replace("'", "&#39", $content);
            $content = str_replace("???", "&#39", $content);
            $date = htmlspecialchars($date);
            $this->_postManager->updatePost($id, $chapo, $content, $date, $title);
        }

        //RECUPERATION ET AFFICHAGE DU POST ET DE SES COMMENTAIRES
        //$commentaires = $this->_commentaireManager->getComm($_GET['id']);
        $post = $this->_postManager->getPost($id);
        $this->_view = new View('UpdatePost');
        $this->_view->generate(array('post' => $post, 'form' => $form));
    }
}
