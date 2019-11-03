<?php
require (__DIR__ . '/allRequest.php');

$accesdenied = 'Accès Refusé !';

function getController(){
    $accesdenied = 'Accès Refusé !';
    try {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'getListPosts') {
                getListPosts();
            }
            elseif ($_GET['action'] == 'post') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    post();
                }
                else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
            elseif ($_GET['action'] == 'addComment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['comment']) && !empty($_POST['author'])) {
                        addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    }
                    else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                }
                else{
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
            elseif ($_GET['action'] == 'login'){
                if (!empty($_POST['username'])&& isset($_POST['username'])  && !empty($_POST['password']) && isset($_POST['password']))
                {
                    verifyMember($_POST['password'], $_POST['username']);
                }
                else{
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            }
            elseif ($_GET['action'] == 'creationUser') {
                require('view/frontend/newAcountView.php');
            }
            elseif ($_GET['action'] == 'pageLogin') {
                require('Modal/login.php');
            }
            elseif ($_GET['action'] == 'newUser') {
                if (!empty($_POST['username']) && isset($_POST['username'])
                    && !empty($_POST['mail']) && isset($_POST['mail'])
                    && !empty($_POST['password']) && isset($_POST['password'])
                    && !empty($_POST['password2']) && isset($_POST['password2']))
                {
                    addMember($_POST['username'], $_POST['mail'], $_POST['password'], $_POST['password2']  );
                }else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            }
            elseif($_GET['action'] == 'admin'){
                if(isset($_SESSION['username']) && $_SESSION['username']){
                    $categories = getAllCategories();
                    require('view/backend/baseAdmin.php');
                }
                else{
                    throw new Exception($accesdenied);
                }
            }
            elseif($_GET['action'] == 'managePosts'){
                if($_SESSION['username'] && isset($_SESSION['username'])){
                    listPostsBack();
                }
                else{
                    throw new Exception($accesdenied);
                }
            }
            elseif($_GET['action'] == 'deletePost'){
                if(isset($_SESSION['username']) && $_SESSION['username']){
                    if(isset($_GET['id']) && $_GET['id'] > 0){
                        deletePost($_GET['id']);
                    }
                    else{
                        throw new Exception('Aucun id d\'article');
                    }
                }
                else{
                    throw new Exception($accesdenied);
                }
            }
            elseif($_GET['action'] == 'newPost'){
                if (!empty($_POST['content']) && !empty($_POST['author']) && !empty($_POST['title'])){
                    $imgUrl = getImgUrl();
                    newPost($_POST['title'], $_POST['author'], $_POST['content'], $imgUrl,$_POST['categorie']);

                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            }
            elseif ($_GET['action'] == 'editPostView') {
                if(isset($_SESSION['username']) && $_SESSION['username']){
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        viewEditPost($_GET['id']);
                    }
                    else {
                        throw new Exception('Aucun article à éditer !');
                    }
                }
                else{
                    throw new Exception($accesdenied);
                }
            }
            elseif($_GET['action'] == 'editPost'){
                if(isset($_SESSION['username']) && $_SESSION['username']){
                    if (isset($_GET['id']) && $_GET['id'] > 0){
                        if(isset($_FILES['img_posting']['name']) && !empty($_FILES['img_posting']['name'])){
                            $imgUrl = getImgUrl();
                            editPost($_GET['id'], $_POST['title'], $_SESSION['username'], $_POST['content'], $imgUrl);
                        }
                        else{
                            $imgUrl = null;
                            editPost($_GET['id'], $_POST['title'], $_SESSION['username'], $_POST['content'], $imgUrl);
                        }
                    }
                    else{
                        throw new Exception('Aucun id d\'article');
                    }
                }
                else{
                    throw new Exception($accesdenied);
                }
            }
            elseif($_GET['action'] == 'manageComments'){
                if(isset($_SESSION['username']) && $_SESSION['username']){
                    listCommentsBack();
                }
                else{
                    throw new Exception($accesdenied);
                }
            }
            elseif($_GET['action'] == 'editComment'){
                if(isset($_SESSION['username']) && $_SESSION['username']){
                    if (isset($_GET['id']) && $_GET['id'] > 0){
                        editCom($_GET['id'], $_POST['author'], $_POST['comment'], $_POST['status']);
                    }else{
                        throw new Exception('Aucun id de commentaire');
                    }
                }else{
                    throw new Exception($accesdenied);
                }
            }
            elseif($_GET['action'] == 'deleteComment'){
                if(isset($_SESSION['username']) && $_SESSION['username']){
                    if(isset($_GET['id']) && $_GET['id'] > 0){
                        deleteCom($_GET['id']);
                    }
                    else{
                        throw new Exception('Aucun id d\'article');
                    }
                }
                else{
                    throw new Exception($accesdenied);
                }
            }
            elseif($_GET['action'] == 'manageCategories'){
                if(isset($_SESSION['username']) && $_SESSION['username']){
                    listCategoryBack();
                }
                else{
                    throw new Exception($accesdenied);
                }
            }
            elseif($_GET['action'] == 'addCategories'){
                if(isset($_SESSION['username']) && $_SESSION['username']){
                    require('view/backend/addCategory.php');
                }
                else{
                    throw new Exception($accesdenied);
                }
            }
            elseif($_GET['action'] == 'newCat'){
                if (!empty($_POST['name'])){
                    newCat($_POST['name']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            }
            elseif ($_GET['action'] == 'newPass') {
                if($_SESSION['username'] && isset($_SESSION['username'])){
                    if (isset($_POST['password']) && !empty($_POST['password'])
                        && isset($_POST['password2']) && !empty($_POST['password2']))
                    {
                        passMember($_POST['password'], $_POST['password2']);
                    }
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            }
            elseif ($_GET['action'] == 'logout'){
                logout();
            }
        }
        else{
            getListPosts();
        }
    }
    catch(Exception $e) {
        ob_start();
        ?>
        <div id="errorPage">
            <p><?php  echo 'Erreur : ' . $e->getMessage(); ?></p>
            <p>Retour à <a href="index.php">l'accueil</a></p>
        </div>
        <?php
        $content = ob_get_clean();
        require('view/frontend/home.php');
    }
}