
<section class="container blog-area section">
    <h2>Modifier Post</h2><br />
    <h3><?= $post->title() ?></h3><br />
    <h5><?= $post->author() ?></h3>
        <h6>Modifié le <?= $post->date() ?></h4><br>

            <div class="form-group">
                <?php
                if (isset($_GET['id'])) {
                ?>
                    <form method="post" action="Post&update=1&id=<?= $_GET['id'] ?>">
                        <?php if ($form == 1) {
                        ?>
                            <label for="title">Titre:</label><br />
                            <input class="text-center" type="text" class="form-control" placeholder="Titre du Post" value="<?= filter_var($post->title(), FILTER_SANITIZE_STRING) ?>" name="title" style="width:40%"><br><br />

                            <label for="chapo">Chapô:</label><br />
                            <textarea class="text-center" name="chapo" class="form-control" style="width:65%" rows="15"><?= filter_var($post->chapo(), FILTER_SANITIZE_STRING) ?></textarea><br><br />

                            <label for="content">Contenu:</label><br />
                            <textarea class="text-center" name="content" class="form-control" style="width:75%" rows="25"><?= filter_var($post->content(), FILTER_SANITIZE_STRING) ?></textarea><br>

                            <input type="hidden" name="date" value="<?= date("Y-m-d H:i:s"); ?>">
                            <input type="hidden" name="updatePost" value="true"><br />

                            <input class="btn btn-primary" type="submit" name="form_button" value="Modifier">

                    <?php
                        }
                    }
                    ?>
                    </form>

</section>