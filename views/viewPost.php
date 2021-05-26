<section class="section">
    <div class="container">

        <h2 class="text-center"><?= $title; ?></h2>
        <br>
        <br>

        <div class="form-group">
            <h4 class="text-center"><b><?= $form_msg; ?></h4></b><br>

            <?php
            if (isset($postInfos)) {
            ?>

                <br><br>
                <table class="table table-striped">
                    <tr>
                        <th>Nom</th>
                        <th>Auteur</th>
                        <th>Date</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php
                    foreach ($postInfos as $postInfo) :
                    ?>
                        <tr>
                            <td><?= filter_var($postInfo->title(), FILTER_SANITIZE_STRING) ?></td>
                            <td><?= filter_var($postInfo->author(), FILTER_SANITIZE_STRING) ?></td>
                            <td><?= filter_var($postInfo->date(), FILTER_SANITIZE_STRING) ?></td>
                            <td><a href="post&id=<?= filter_var($postInfo->id(), FILTER_SANITIZE_STRING) ?>&update=true">Modifier</a></td>
                            <td><a href="post&id_del=<?= filter_var($postInfo->id(), FILTER_SANITIZE_STRING) ?>&del=1&admin=true">Supprimer</a></td>
                        </tr>

                <?php
                    endforeach;
                }
                ?>
                </table>
        </div>
    </div>
</section>