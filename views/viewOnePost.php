<div class="slider">
    <div class="display-table  center-text">
        <h1 class="title display-table-cell"><b>
                <!-- -->
            </b></h1>
    </div>
    <br><br>

    <section class="text-center p-5">
        <?php if ($commPosted) {
            echo "<h4><i>(Commentaire soumis, en attente de validation !)</i></h4><br>";
        } ?>
        <h1><b><?= $post->title() ?></b></h2>
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

    <section class="comment text-center" style="background-color:whitesmoke">
        <br><br>
        <h4><b>Laisser un commentaire</b></h4>
        <form method="post" action="post&view=1&id=<?= $_GET['id'] ?> ">
            </br>
            <label for="email">Auteur:</label>
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
            <label for="contenu">Message:</label>
            <textarea name="contenu" placeholder="Entrez votre commentaire..." cols="40"></textarea><br><br>

            <input type="hidden" name="date" value="<?= date("Y-m-d H:i:s"); ?>">
            <input type="hidden" name="newComm" value="true">
            <input type="hidden" name="post_id" value="<?= $_GET['id']; ?>">

            <input type="submit" name="form_button" value="OK">
        </form><br>
    </section>

    <section class="text-center" style="background-color:floralsmoke">

        <h4><b>Commentaires</b></h4>
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