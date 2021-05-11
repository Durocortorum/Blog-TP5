<div class="slider">
    <div class="display-table  center-text">
        <h1 class="title display-table-cell"></h1>
    </div>
</div>

<section class="blog-area section">
    <div class="container">
        <h4><b>Commentaires</b></h4><br>

        <table class="table table-striped">
            <tr>
                <th>Auteur</th>
                <th>Contenu</th>
                <th>Date</th>
                <th>Id. Post</th>
                <th>Valider</th>
                <th>Refuser</th>
            </tr>
            <?php
            foreach ($commentaires as $commentaire) :
            ?>
                <tr>
                    <td><?= $commentaire->auteur(); ?></td>
                    <td><?= $commentaire->contenu(); ?></td>
                    <td><?= $commentaire->date(); ?></td>
                    <td><a href="post&id=<?= $commentaire->post_id(); ?>"><?= $commentaire->post_id(); ?></a></td>
                    <td><a href="commentaire&id=<?= $commentaire->id(); ?>&del=0">Valider</a></td>
                    <td><a href="commentaire&id=<?= $commentaire->id(); ?>&del=1">Refuser</a></td>
                </tr>

            <?php
            endforeach;
            ?>
        </table>
    </div>
</section>