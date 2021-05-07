<div class="slider"></div><!-- slider -->

<section class="blog-area section">
    <div class="container">
        <h2>Espace Connexion</h2>
        <div class="form-group">
            <form method="post" action="Connexion">
                <?php if ($connexion[0] == "retryForm") {
                    echo "Identifiants introuvables<br>";
                    //Inscrivez vous
                }
                ?>
                <label for="email">Email:</label>
                <input class="text-center m-2" type="email" class="form-control" placeholder="Email" name="email" style="width:40%">
                <br />
                <label for="password">Mot de passe:</label>
                <input class="text-center" type="password" class="form-control" placeholder="Mot de passe" name="password" style="width:40%">

                <br /><input type="submit" value="OK">
            </form>
        </div><!-- container -->
</section><!-- section -->