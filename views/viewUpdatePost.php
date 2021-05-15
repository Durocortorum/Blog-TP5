<div class="slider">

</div>

<section class="blog-area section">
    <h2>Modifier Post</h2><br />
    <h3><?= $post->title() ?></h3><br />
    <h5><?= $post->author() ?></h3>
        <h6>Modifié le <?= $post->date() ?></h4><br>


            <div class="form-group">
                <form method="post" action="Post&update=1&id=<?= $_GET['id'] ?>">
                    <?php if ($form == 1) {

                    ?>
                        <label for="title">Titre:</label><br/>
                        <input class="text-center" type="text" class="form-control" placeholder="Titre du Post" value="<?= $post->title() ?>" name="title" style="width:40%"><br><br/>

                        <label for="chapo">Chapô:</label><br/>
                        <textarea class="text-center" name="chapo" class="form-control" style="width:65%" rows="15"><?= $post->chapo(); ?></textarea><br><br/>

                        <label for="content">Contenu:</label><br/>
                        <textarea class="text-center" name="content" class="form-control" style="width:75%" rows="25"><?= $post->content(); ?></textarea><br>

                        <input type="hidden" name="date" value="<?= date("Y-m-d H:i:s"); ?>">
                        <input type="hidden" name="updatePost" value="true"><br/>

                        <input class="btn btn-primary"type="submit" value="Modifier">

                    <?php
                    }
                    ?>
                </form>

</section>