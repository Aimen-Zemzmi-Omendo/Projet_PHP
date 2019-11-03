<?php ob_start(); ?>

    <h4>Creation de compte</h4>
    <form action="index.php?action=login" method="post">
        <div class="form-group">
            <label for="nickname">Pseudo</label>
            <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Entrez votre pseudo" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password1" placeholder="Azerty123" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Connexion</button>
    </form>

    <span id="formStatus">
    <p><?php if(isset($info)){
            echo $info;
        }?></p>
  </span>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/home.php'); ?>