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