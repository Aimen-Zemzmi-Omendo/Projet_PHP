<?php
$nav_en_cours = $_SERVER['REQUEST_URI'];
?>
<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-red w3-card w3-left-align w3-large">
        <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
        <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white <?php if ($nav_en_cours == '/tpfinal/index.php' || $nav_en_cours == '/tpfinal/') {echo 'w3-white';} ?>">Accueil</a>
        <?php if (!isset($_SESSION['id'])) { ?>
            <a href="index.php?action=creationUser" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white <?php if ($nav_en_cours == '/tpfinal/index.php?action=creationUser') {echo 'w3-white';} ?>">S'inscrire</a>
            <a href="index.php?action=pageLogin" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white <?php if ($nav_en_cours == '/tpfinal/index.php?action=pageLogin') {echo 'w3-white';} ?>">Se connecter</a>
        <?php } else { ?>
            <a href="index.php?action=admin" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white <?php if ($nav_en_cours == '/tpfinal/index.php?action=admin') {echo 'w3-white';} ?>">Gestion Administration & Ajout d'article</a>
            <a href="index.php?action=logout" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white <?php if ($nav_en_cours == '/tpfinal/index.php?action=logout') {echo 'w3-white';} ?>">Déconnexion</a>
        <?php } ?>
    </div>
</div>