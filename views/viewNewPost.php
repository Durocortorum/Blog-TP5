<div class="slider"></div>

<section class="blog-area section">
    <div class="container">
        <h2>Nouveau Post</h2><br/>
        <div class="form-group">
            <?= $return_msg . "<br>"; ?>
            <br/>
            <form method="post" action="NewPost">
                <?php if ($form == 1) {

                ?>
                    <label for="title">Titre:</label><br/>
                    <input class="text-center" type="text" class="form-control" placeholder="Titre du Post" name="title" style="width:40%"><br><br/>

                    <label for="chapo">Chapô:</label><br/>
                    <textarea class="text-center"  name="chapo" class="form-control" style="width:65%" rows="15"></textarea><br><br/>

                    <label for="content">Contenu:</label><br/>
                    <textarea class="text-center" name="content" class="form-control" style="width:75%" rows="25"></textarea><br><br/>

                    <input type="hidden" name="date" value="<?= date("Y-m-d H:i:s"); ?>">
                    <input type="hidden" name="create" value="true">

                    <input class=" btn btn-primary" type="submit" value="OK">
                <?php

                }
                ?>
            </form>
        </div>
</section>