<br><br>
<h2 class="text-center"><?= $title; ?></h2>
<br>
<br>

<div class="container-fluid">
    <b><i><?= $form_msg; ?></b></i><br>

    <?php
    if ($form == 1) {
    ?>
        <form method="post" action="User">
            <div class="row">
                <div class="col-lg-6 text-center">
                    <label for="email">Email:</label>
                </div>
                <div class="col-lg-6 ">
                    <input type="email" class="form-control" placeholder="Email" name="email" style="width:100%" value="<?= $infos[0]->email() ?>">
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-lg-6 text-center">
                    <label for="nom">Nom:</label>
                </div>
                <div class="col-lg-6 ">
                    <input class="text-center" type="text" class="form-control" placeholder="Nom" name="nom" style="width:100%" value="<?= $infos[0]->nom() ?>">
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-lg-6 text-center">
                    <label for="prenom">Prenom:</label>
                </div>
                <div class="col-lg-6 ">
                    <input class="text-center" type="text" class="form-control" placeholder="Prenom" name="prenom" style="width:100%" value="<?= $infos[0]->prenom() ?>">
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-lg-6 text-center">
                    <label for="password">Mot de passe:</label>
                </div>
                <div class="col-lg-6 ">
                    <input class="text-center" type="password" class="form-control" placeholder="Mot de passe" name="password" style="width:100%" value="<?= $infos[0]->password() ?>">
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-lg-6 text-center">
                    <label for="passwordConfirm">Mot de passe (confirmation) :</label>
                </div>
                <div class="col-lg-6 ">
                    <input class="text-center" type="password" class="form-control" placeholder="Mot de passe (confirmation)" name="password_verif" style="width:100%" value="">
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col text-center">
                    <input class="text-center m-2 p-2 btn btn-primary shadow-sm" type="submit" class="form-control" style="width:30%" name="form_button" value="Sauvegarder">
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
                    <td><?= $userInfo->nom(); ?></td>
                    <td><?= $userInfo->prenom(); ?></td>
                    <td><?= $userInfo->email(); ?></td>
                    <td><a href="user&id_del=<?= $userInfo->id(); ?>&del=1&admin=true">Supprimer</a></td>
                </tr>

        <?php
            endforeach;
        }
        ?>
        </table>

</div>