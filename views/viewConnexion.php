<div class="slider"></div>

<section class="blog-area  section">
    <div class="container">
        <h2 class="text-center">Espace Connexion</h2>
        <br />
        <div class="form-group">
            <form method="post" action="Connexion">
                <?php if ($connexion[0] == "retryForm") {
                    echo "Identifiants introuvables<br>";
                }
                ?>
                <label class="col-3 text-right" for="email">Email:</label>
                <input class="col-12" type="email" class="form-control" placeholder="Email" name="email" style="width:40%">
                <br />
                <label class="col-3 text-right" for="password">Mot de passe:</label>
                <input class="col-12" type="password" class="form-control" placeholder="Mot de passe" name="password" style="width:40%">
                <br />
                <br />
                <input class="col-4 btn btn-primary" type="submit" name="form_button" value="OK">
            </form>
        </div>
</section>