<div>

    <section class="container text-center p-5">
        <?php if ($commPosted) {
            echo "<h4><i>(Commentaire soumis, en attente de validation !)</i></h4><br>";
        } ?>
        <h2><b><?= $post->title() ?></b></h2>
        <h5><?= $post->author() ?></h3>
            <h6>Modifié le <?= $post->date() ?></h4><br>

                <div style="text-align: center;">
                    <i>
                        <?= nl2br($post->chapo()); ?>
                    </i><br> <br>

                    <div>

                        <?= nl2br($post->content()); ?>
                    </div>
                </div>
    </section>

    <section class="container text-center p-3" style="border-radius: 10px; width:90%; background-color:#ccdae2">
        <h4><b>Laisser un commentaire</b></h4>
        <form method="post" action="post&view=1&id=<?= $_GET['id'] ?> ">
            </br>
            <div class="row">
                <div class="col-12">
                    <label for="email">Auteur:</label>
                </div>
                <div class="col-12">
                    <?php
                    if (isset($_SESSION['id'])) {
                        echo '<i>' . $_SESSION['nom'] . ' ' . $_SESSION['prenom'] . '</i><br>';
                    ?>

                        <input type="hidden" name="auteur" value="<?= $_SESSION['nom'] . ' ' . $_SESSION['prenom'] ?>">
                        <input type="hidden" name="auteur_id" value="<?= $_SESSION['id']; ?>">

                    <?php
                    } else {
                    ?>
                        <input class="text-center" type="text" class="form-control" placeholder="Auteur" name="auteur" style="width:40%">
                        <input type="hidden" name="auteur_id" value="0">
                    <?php
                    }
                    ?>
                    </br>
                </div>

            </div>
            <br />
            <div class="row">
                <div class="col-12">
                    <label for="contenu">Message:</label>
                </div>
                <div class="col-12">
                    <textarea class="col-12" name="contenu" placeholder="Entrez votre commentaire..." rows="5"></textarea><br />
                </div>
                <input type="hidden" name="date" value="<?= date("Y-m-d H:i:s"); ?>">
                <input type="hidden" name="newComm" value="true">
                <input type="hidden" name="post_id" value="<?= $_GET['id']; ?>">

                <input class="btn btn-primary" style="margin-left:auto;margin-right: auto" type="submit" name="form_button" value="OK">
        </form>
    </section>

    <section class="container text-center mt-5 mb-3" style="border-radius: 10px; width:90%; background-color:#ccdae2">

        <h4 class="p-3"><b>Commentaires</b></h4>
        <?php
        foreach ($commentaires as $commentaire) :
        ?>
            <u><?= $commentaire->auteur(); ?></u><br>
            <?= $commentaire->contenu(); ?><br>
            Posté le <i><?= $commentaire->date(); ?></i><br><br>

        <?php
        endforeach
        ?>
    </section>