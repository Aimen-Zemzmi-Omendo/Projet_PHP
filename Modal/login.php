<?php ob_start(); ?>
<!--Espace de login-->
<div class="col-12">
    <div class="login">
        <form action="index.php?action=login" method="post">
            <h5>Connexion</h5>
            <div class="form-group">
                <label for="username">Pseudo</label>
                <input type="text" class="form-control" id="username" placeholder="Votre Pseudo" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary button-login">Se connecter</button>
        </form>
    </div>
</div>

    <span id="formStatus">
    <p><?php if(isset($info)){
            echo $info;
        }?></p>
  </span>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/home.php'); ?>