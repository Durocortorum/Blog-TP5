# blog-mvc

##Ce code est rédigé dans le cadre de mon Parcours Developpeur PHP/Symfony
##Sur OpenClassRooms

##C'est un blog possédant une architecture MVC, développé en PHP

###Il est possible de s'y connecter, d'y poster des Posts et des Commentaires, et également de l'administrer avec un compte privilégié
##Mon CV au format PDF est téléchargeable via un lien sur la page d'accueil

### CONFIGURATION ###

Version PHP: 7.3.12
Base de donnée: MYSQL/MariaDB

### INSTALLATION ###

1. Cloner le repo
2. Configurer la connexion à la BDD
    1. Modifier les paramètres de connexion dans le fichier: models/Model.php
    2. Importer le fichier BDD.sql
    3. Note: Des utilisateurs et des posts exemples sont fournis dans ce lot
    4. Exemple Prénom-user, Nom-User, email-user@user.fr, password-users dans la table users = user Lambda
    5. Exemple Prénom-redacteur, Nom-Redacteur, email-redacteur@redacteur.fr, password-redacteur dans la table users = qui peut créer ou modifier des Posts
    6. Exemple Prénom-admin, Nom-Admin, email-admin@admin.fr, password-admin dans la table users = qui peut créer ou modifier des Posts et valider ou non des commentaires
    
3. Installation terminée

### Code Codacy: ### 

    
