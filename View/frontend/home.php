<!DOCTYPE html>
<html lang="fr">
<title>Cylon</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/main.css" rel="stylesheet">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
img{width: 100%}
</style>
<body>
<?php include "other/menu.php"; ?>
<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">Cylon </h1>
  <p class="w3-xlarge">Vendez vos biens et achetez vos coups de coeur</p>
  <h3  class="w3-text-blue" id="change"></h3>
  <?php if (!isset($_SESSION['username'])) { ?>
  <a href="inscription.php"><button class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Inscrivez vous !</button></a>
<?php } else {} ?>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1 class="w3-text-blue">Bienvenue sur Cylon Shop</h1>
      <h4 class="w3-padding-32">Cylon est une société de revente d'objets entre particuliers. Chaque objet doit être placé dans une catégorie, puis il faut décrire l'objet. Chaque objet doit se faire valider par notre équipe, le délai de validation est estimé à 1 heure d'attente peu importe l'heure ou laquelle est posté l'article. Les animaux ne sont pas autorisés à la vente, ainsi que tout objet illicite.</h4>
      <h2 class="w3-text-blue">Quelques chiffres :</h2>
      <h4 class="w3-text-orange"><i class="glyphicon glyphicon-user"></i> 145 000 tilisateurs</h4>
      <h4 class="w3-text-blue"><i class="glyphicon glyphicon-refresh"></i> 1000 colis par jour</h4>
      <h4 class="w3-text-vert"><i class="glyphicon glyphicon-trash"></i> 35 000 colis destinés à la poubelle partent chaque année </h4>
      <h4 class="w3-text-red"><i class="glyphicon glyphicon-search"></i> 10 000 recherches par jour</h4>
    </div>

    <div class="w3-third w3-center">
      <img src="img/accueil.jpg" alt="image d'accueil">
    </div>
  </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-center">
<div id="content" class="container">
        <div class="row">
            <?= $content ?>
        </div>
      </div>

</div>
</div>

<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Cylon Society</h1>
</div>

</body>
</html>