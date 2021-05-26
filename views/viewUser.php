<br><br>
<h2 class="text-center"><?= $title; ?></h2>
<br>
<br>

<div class="container">
    <div class="text-center">
        <h4><b><?= $form_msg; ?></h4></b>
    </div>

    <?php
    if ($form == 1) {
    ?>
        <form method="post" action="User">
            <div class="row text-center">
                <div class="col-lg-6">
                    <label for="email">Email:</label>
                </div>
                <div class="col-lg-6 ">
                    <input type="email" class="form-control" placeholder="Email" name="email" style="width:100%" value="<?= filter_var($infos[0]->email(), FILTER_SANITIZE_STRING) ?>">
                </div>
            </div>
            <br />
            <div class="row text-center">
                <div class="col-lg-6">
                    <label for="nom">Nom:</label>
                </div>
                <div class="col-lg-6 ">
                    <input type="text" class="form-control" placeholder="Nom" name="nom" style="width:100%" value="<?= filter_var($infos[0]->nom(), FILTER_SANITIZE_STRING) ?>">
                </div>
            </div>
            <br />
            <div class="row text-center">
                <div class="col-lg-6">
                    <label for="prenom">Prenom:</label>
                </div>
                <div class="col-lg-6 ">
                    <input type="text" class="form-control" placeholder="Prenom" name="prenom" style="width:100%" value="<?= filter_var($infos[0]->prenom(), FILTER_SANITIZE_STRING) ?>">
                </div>
            </div>
            <br />
            <div class="row text-center">
                <div class="col-lg-6">
                    <label for="password">Mot de passe:</label>
                </div>
                <div class="col-lg-6 ">
                    <input type="password" class="form-control" placeholder="Mot de passe" name="password" style="width:100%" value="<?= filter_var($infos[0]->password(), FILTER_SANITIZE_STRING) ?>">
                </div>
            </div>
            <br />
            <div class="row text-center">
                <div class="col-lg-6">
                    <label for="passwordConfirm">Mot de passe (confirmation) :</label>
                </div>
                <div class="col-lg-6 ">
                    <input type="password" class="form-control" placeholder="Mot de passe (confirmation)" name="password_verif" style="width:100%" value="">
                </div>
            </div>
            <br />
            <div class="row text-center">
                <div class="col ">
                    <input class="m-2 p-2 btn btn-primary shadow-sm" type="submit" class="form-control" style="width:30%" name="form_button" value="Sauvegarder">
                </div>

        </form>
    <?php
    }
    ?>

    <?php
    if (isset($userInfos)) {
    ?>
        <br><br>
        <table class="table table-striped">
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Supprimer</th>
            </tr>
            <?php
            foreach ($userInfos as $userInfo) :
            ?>
                <tr>
                    <td><?= filter_var($userInfo->nom(), FILTER_SANITIZE_STRING) ?></td>
                    <td><?= filter_var($userInfo->prenom(), FILTER_SANITIZE_STRING) ?></td>
                    <td><?= filter_var($userInfo->email(), FILTER_SANITIZE_STRING) ?></td>
                    <td><a href="user&id_del=<?= filter_var($userInfo->id(), FILTER_SANITIZE_STRING) ?>&del=1&admin=true">Supprimer</a></td>
                </tr>

        <?php
            endforeach;
        }
        ?>
        </table>
</div>