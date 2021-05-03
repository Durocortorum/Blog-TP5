<?php

require_once 'views/View.php';

class ControllerAccueil
{
    private $_postManager;
    private $_view;

    public function __construct()
    {
        if(isset($url) && count($url) >1 ) 
        {
            throw new \Exception("Page introuvable", 1);
        }
        else{
            $this->acceuil();
        }
    }

    public function acceuil()
    {
        extract($_POST);
        // form contact
        if(isset($form_button))
        {
            // Vérif Firstname
            if(isset($firstname_name) && strlen($firstname_name) > 6 && strlen($firstname_name) < 100)
            {
                $firstname_name = htmlspecialchars($firstname_name);

                // Vérif Email
                if(isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $email = htmlspecialchars($email);

                    // Vérif message
                    if(isset($message) && strlen($message) > 20 && strlen($message) < 2000)
                    {
                        $message = htmlspecialchars($message) . "\n\n" . $firstname_name. "\n" . $email;

                        // Send Email
                        $to      = 'micheldescotes65@gmail.com';
                        $subject = 'Contact Blog';
                        $Headers = 'From: ' .$firstname_name . "\r\n";

                        mail($to, $subject, $message, $Headers);
                        $return_msg = "Le message a bien été envoyé !";
                    }
                    else
                    {
                        $return_msg = "Le champ message n'est pas renseigné/Valide !";
                    }
                }
                else
                {
                    $return_msg = "Le champ email n'est pas renseigné/Valide !";
                }
            }
            else
            {
                $return_msg = "Le champ first-name n'est pas renseigné/Valide !";
            }
        }
        else
        {
            $return_msg = "";
        }

        //View

        $this->_postManager = new PostManager();
        $posts = $this->_postManager->getPosts();
        $this->_view = new View('Accueil');
        $this->_view->generate(array('posts' => $posts));
    }
}