<?php
session_start();
require_once('model/requete.php');

function getListPosts()
{
    $posts = getPosts();
    require('view/frontend/listPostsView.php');
}

function post($postId = null, $message = null)
{
    if(isset($postId)){
        $_GET['id'] = $postId;
    }

    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{

    $affectedLines = postComment($postId, $author, $comment);
    if ($affectedLines === false){
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function verifyMember($password, $username)
{

    $member = getMember($username);
    $isPasswordCorrect = password_verify($password, $member['password']);

    try{
        if (!$member)
        {
            throw new Exception('Mauvais utilisateur ou mot de passe!');
        }
        else
            //L'admin' existe
        {
            if ($isPasswordCorrect)  {
                $_SESSION['id'] = $member['id'];
                $_SESSION['username'] = $member['username'];
                $_SESSION['password'] = $member['password'];
                $_SESSION['mail'] = $member['mail'];
                //on redirige vers la page d'accueil qui prendra en compte les variable de session
                header('Location: index.php');
            }
            //Le mdp corresponds pas
            else {
                throw new Exception('Mauvais utilisateur ou mot de passe');
            }
        }
    }
    catch(Exception $e){
        $authInfo = $e->getMessage();
        ob_start();
        ?>
        <div id="wrongPass">
            <p><?php  echo 'Erreur : ' . $e->getMessage(); ?></p>
            <?php include('include/login.php');?>
        </div>
        <?php
        $content = ob_get_clean();
        require('view/frontend/home.php');
    }
}

function addMember($username, $mail, $password, $password2)
{
    try
    {
        $checkMember = checkNickname($username);
        if(!$checkMember){
            if(preg_match('#[a-zA-Z0-9_]#', $username)){
                if($password == $password2){
                    if(preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ", $mail)){
                        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
                        //envoi au modele pour insertion dans BDD
                        $push = pushMembers($username, $pass_hash, $mail);
                        throw new Exception('Votre compte a été créé avec succès');
                    }else{
                        throw new Exception('veuillez vérifier votre adresse email');
                    }
                }else{
                    throw new Exception('Les mots de passe ne correspondent pas');;
                }
            }else{
                throw new Exception('Un ou plusieurs caractères non autorisé dans le mot de passe');
            }
        }else{
            throw new Exception('Ce pseudo est déjà utilisé');
        }
    }
    catch(Exception $e){
        $info = $e->getMessage();
        require('view/frontend/newAcountView.php');
    }
}

function logout()
{
    session_destroy();
    header('Location: index.php');
}

function newPost($title, $author, $content, $img_posting, $categorie)
{
    $affectedLines = writePost($title, $author, $content, $img_posting, $categorie);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter un article');
    }
    else {
        header('Location: index.php?action=managePosts');
    }
}

function listPostsBack()
{
    $posts = getPosts();
    require('view/backend/managePostsView.php');
}

function deletePost($postId)
{
    $affectedLines = postDelete($postId);
    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer l\'article');
    }
    else {
        header('Location: index.php?action=managePosts');
    }
}

function editPost($id, $title, $author, $content, $imgUrl)
{
    if($imgUrl == null){
        $affectedLines = postEdit($id, $title, $author, $content);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'éditer l\'article');
        }
        else {
            header('Location: index.php?action=post&id='.$id);
        }
    }else{
        $affectedLines = postEditImg($id, $title, $author, $content, $imgUrl);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'éditer l\'article');
        }
        else {
            header('Location: index.php?action=post&id='.$id);
        }
    }
}

function viewEditPost($postId)
{
    $post = getPost($postId);
    require('view/backend/editPostView.php');
}

function listCommentsBack()
{
    $comments = getAllComments();
    require('view/backend/manageCommentsView.php');
}

function deleteCom($comId)
{
    $affectedLines = commentDelete($comId);
    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer le commentaires');
    }
    else {
        header('Location: index.php?action=manageComments');
    }
}

function listCategoryBack()
{
    $categories = getAllCategories();
    require('view/backend/manageCategoriesView.php');

}

function newCat($name)
{
    $affectedLines = writeCat($name);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter une categorie');
    }
    else {
        header('Location: index.php?action=manageCategories');
    }
}

function getImgUrl()
{
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES['img_posting']['name']);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if($imageFileType == "jpg" OR $imageFileType == "png" OR $imageFileType == "jpeg"
        OR $imageFileType == "gif" ){
        if ($_FILES["img_posting"]["size"] <= 4000000){
            move_uploaded_file($_FILES['img_posting']['tmp_name'], $target_file);
        }
        else{
            throw new Exception('Fichier trop volumineux, 4Mo maximum');
        }
    }
    else{
        throw new Exception('Extension d\'image incompatible, veuillez charger une image .jpg, .png, .jpeg, .gif');
    }
    return $target_file;
}