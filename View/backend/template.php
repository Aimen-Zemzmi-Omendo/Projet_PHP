<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Billet simple pour l'Alaska</title>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=lnp7uirbee1mvl9prt3p9romc1p2gywt7g61ozgx1w8miw79"></script>
        <script>tinymce.init({ selector:'textarea#postContent' });</script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/main.css" rel="stylesheet">
    </head>

    <body>
      <?php
        include("other/menu.php"); ?>
       <!--Fin header-->
       <div class="container" style="margin-top: 150px">
           <div class="input-group">
               <ul>
                   <li><a href="index.php?action=manageCategories">Categories</a></li>
                   <li><a href="index.php?action=managePosts">Articles</a></li>
                   <li><a href="index.php?action=manageComments">Commentaires</a></li>
                   <li><a href="index.php?action=admin">Page Admin</a></li>
               </ul>
           </div>
          <div class="row">
            <!-- Blog Entries Column -->
                <div class="col-12">
                  <?= $content ?>
                </div>
            </div>
      </div>
    </body>
</html>