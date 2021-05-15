<div class="slider"></div>

<section class="blog-area section">
    <div class="container">
        <h2>Espace Inscription</h2>
        <div class="form-group">
            <form method="post" action="Inscription">
                <?php

                //AFFICHAGE DU MESSAGE
                echo "<br>" . $return_msg . "<br>";

                //AFFICHAGE DU FORMULAIRE SI L'INSCRIPTION N'A PAS ETE ENCORE EFFECTUEE
                if ($form != "0") {
                ?>
                    <section class="m-2">
                        <label class="col-3 text-right" for="email">Email:</label>
                        <input class="col-12" type="email" class="form-control" placeholder="Email" name="email" style="width:40%">
                        <br />
                        <label class="col-3 text-right" for="email">Nom:</label>
                        <input class="col-12" type="text" class="form-control" placeholder="NOM" name="nom" style="width:40%">
                        <br />
                        <label class="col-3 text-right" for="email">Prénom:</label>
                        <input class="col-12" type="text" class="form-control" placeholder="Prénom" name="prenom" style="width:40%">
                        <br />
                        <label class="col-3 text-right" for="password">Mot de passe:</label>
                        <input class="col-12" type="password" class="form-control" placeholder="Mot de passe" name="password" style="width:40%">
                        <br />
                        <label class="col-3 text-right" for="password">Mot de passe (vérification):</label>
                        <input class="col-12" type="password" class="form-control" placeholder="Mot de passe" name="password_verif" style="width:40%">
                        <br/>
                        <br/>
                        <input class="col-4 btn btn-primary" type="submit" name="form_button" value="OK">
                    </section>
            </form>
        <?php
                }
        ?>
        </div>
</section>