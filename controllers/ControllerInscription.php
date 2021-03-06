<?php
require_once 'views/View.php';

class ControllerInscription
{

    private $_inscriptionManager;
    private $_view;
    private $_nom;
    private $_prenom;
    private $_email;
    private $_password;

    public function __construct()
    {
        if (isset($url) && count($url) > 1) {
            throw new \Exception("Page introuvable", 1);
        } else {
            $email = filter_input(INPUT_POST, 'email') !== null ? filter_var(filter_input(INPUT_POST, 'email'), FILTER_SANITIZE_STRING) : '';
            $nom = filter_input(INPUT_POST, 'nom') !== null ? filter_var(filter_input(INPUT_POST, 'nom'), FILTER_SANITIZE_STRING) : '';
            $prenom = filter_input(INPUT_POST, 'prenom') !== null ? filter_var(filter_input(INPUT_POST, 'prenom'), FILTER_SANITIZE_STRING) : '';
            $password = filter_input(INPUT_POST, 'password') !== null ? filter_var(filter_input(INPUT_POST, 'password'), FILTER_SANITIZE_STRING) : '';
            $password_verif = filter_input(INPUT_POST, 'password_verif') !== null ? filter_var(filter_input(INPUT_POST, 'password_verif'), FILTER_SANITIZE_STRING) : '';
            $form_button = filter_input(INPUT_POST, 'form_button') !== null ? filter_var(filter_input(INPUT_POST, 'form_button'), FILTER_SANITIZE_STRING) : '';

            //FORMULAIRE DE CONTACT
            if (isset($form_button)) {
                //VERIFICATION DU CHAMP EMAIL
                if (isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $this->_email = htmlspecialchars($email);

                    //VERIFICATION DU CHAMP NOM
                    if (isset($nom) && strlen($nom) > 2) {
                        $this->_nom = htmlspecialchars($nom);

                        //VERIFICATION DU CHAMP PRENOM
                        if (isset($prenom) && strlen($prenom) > 2) {
                            $this->_prenom = $prenom;

                            //VERIFICATION DU CHAMP: MOT DE PASSE
                            if (isset($password) && strlen($password) > 4 && $password == $password_verif) {
                                $this->_password = htmlspecialchars(md5($password));

                                //INSCRIPTION EN BASE DE DONNEES
                                $this->_inscriptionManager = new InscriptionManager;
                                $this->_inscriptionManager->inscription($this->_email, $this->_nom, $this->_prenom, $this->_password);
                                $return_msg = "Votre inscription a ??t?? valid??e !";
                                $form = 0;
                            } else {
                                $return_msg = "Le champ mot de passe n'est pas renseign??/valide !";
                                $form = 1;
                            }
                        } else {
                            $return_msg = "Le champ Pr??nom n'est pas renseign??/valide !";
                            $form = 1;
                        }
                    } else {
                        $return_msg = "Le champ Nom n'est pas renseign??/valide !";
                        $form = 1;
                    }
                } else {
                    $return_msg = "Le champ email n'est pas renseign??/valide !";
                    $form = 1;
                }
            } else {
                $return_msg = "<i>Remplissez le Formulaire</i>";
                $form = 1;
            }
            //GENERATION DE LA VUE
            $this->_view = new View('Inscription');
            $this->_view->generate(array('return_msg' => $return_msg, 'form' => $form));
        }
    }
}
