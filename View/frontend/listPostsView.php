<?php ob_start(); ?>
    <?php
        while ($data = $posts->fetch())
        {
    ?>
    
    <div class="new col-md-6">
        <div class="card-header">
        <img class="card-img-top" src="<?php echo $data['img_posting']?>" alt="illustration article">
            <div class="card-body">
                <h3><?= htmlspecialchars($data['title']) ?></h3>
                <p class="card-text"><?= nl2br($data['content'])?>...</p>
                    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-primary">Lire la suite</a>
            </div>
            <div class="card-footer text-muted">
            Categorie: <?= $data['name'] ?>
            </div>
            <div class="card-footer text-muted">
            par :<?= $data['author'] ?>
            </div>
        </div>
    </div>
    <?php
    }
    $posts->closeCursor();
    ?>
    
    <?php $content = ob_get_clean(); ?>

<?php require('view/frontend/home.php'); ?>