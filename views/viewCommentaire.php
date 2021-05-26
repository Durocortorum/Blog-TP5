<br><br>
<h2 class="text-center">Espace Admin</h2>

<section class="section">
    <div class="container">
        <h4 class="text-center"><b>Commentaires</b></h4><br>

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
                    <td><?= filter_var($commentaire->auteur(), FILTER_SANITIZE_STRING) ?></td>
                    <td><?= filter_var($commentaire->contenu(), FILTER_SANITIZE_STRING) ?></td>
                    <td><?= filter_var($commentaire->date(), FILTER_SANITIZE_STRING) ?></td>
                    <td><a href="post&id=<?= filter_var($commentaire->post_id(), FILTER_SANITIZE_STRING) ?>"><?= $commentaire->post_id(); ?></a></td>
                    <td><a href="commentaire&id=<?= filter_var($commentaire->id(), FILTER_SANITIZE_STRING) ?>&del=0">Valider</a></td>
                    <td><a href="commentaire&id=<?= filter_var($commentaire->id(), FILTER_SANITIZE_STRING) ?>&del=1">Refuser</a></td>
                </tr>

            <?php
            endforeach;
            ?>
        </table>
    </div>
</section>