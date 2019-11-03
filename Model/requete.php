<?php

require_once __DIR__ . '/../Config/db.php';

function dbConnect ()
{
    try {
        return new PDO(
            sprintf('mysql:host=%s;dbname=%s', DATABASE_CONFIG['host'], DATABASE_CONFIG['database']),
            DATABASE_CONFIG['user'],
            DATABASE_CONFIG['password']
        );
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}

//front
function getPosts()
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM posts INNER JOIN categories ON categories.id_cat = posts.idCategory LIMIT 10');
    return $req;
}
function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, author, content, img_posting FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();
    return $post;
}
//ecrire un article
function writePost($title, $author, $content, $img_posting,     $categorie)
{
    $db = dbConnect();
    $post = $db->prepare('INSERT INTO posts(title, author, content, img_posting, idCategory) VALUES(?, ?, ?, ?, ?)');
    $affectedLines = $post->execute(array($title, $author, $content, $img_posting, $categorie));
    return $affectedLines;
}
//supprimer un article
function postDelete($postId)
{
    $db = dbConnect();
    $post = $db->prepare("DELETE FROM posts WHERE id=".$postId);
    $affectedLines = $post->execute(array($postId));
    return $affectedLines;
}
//editer une image pour l'article
function postEditImg($id, $title, $author, $content, $imgUrl)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE posts SET title = ?, author = ?, content = ?, img_posting = ? WHERE id = ?');
    $post = $req->execute(array($title, $author, $content, $imgUrl, $id ));
    return $post;
}
//editer un article
function postEdit($id, $title, $author, $content)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE posts SET title = ?, author = ?, content = ? WHERE id = ?');
    $post = $req->execute(array($title, $author, $content, $id ));
    return $post;
}
function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT * FROM comments WHERE post_id = ?');
    $comments->execute(array($postId));
    return $comments;
}
//insert un commentaire
function postComment($postId, $author, $comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(post_id, author, comment) VALUES(?, ?, ?)');
    $affectedLines = $comments->execute(array($postId, $author, $comment));
    return $affectedLines;
}
//afficher les commentaire
function getAllComments()
{
    $db = dbConnect();
    $comments = $db->query('SELECT id, post_id, author, comment FROM comments');
    return $comments;
}

function getComment($comId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, author, comment, status FROM comments WHERE id = ?');
    $req->execute(array($comId));
    $comment = $req->fetch();
    return $comment;
}

function getPostByComment($comId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT post_id FROM comments WHERE id = ?');
    $req->execute(array($comId));
    $postId = $req->fetch();
    return $postId;
}
//supprimer un commentaire
function commentDelete($comId)
{
    $db = dbConnect();
    $comment = $db->prepare("DELETE FROM comments WHERE id=".$comId);
    $affectedLines = $comment->execute(array($comId));
    return $affectedLines;
}
function getMember($username)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, password, username, mail FROM users WHERE username = :username');
    $req->execute(array('username' => $username));
    $result = $req->fetch();
    return $result;
}

//back
function pushMember($password){
    $db = dbConnect();
    $sql = "UPDATE users SET password=? WHERE id=?";
    $db->prepare($sql)->execute([$password, 1]);
}

function pushMembers($username, $pass_hash, $mail)
{
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO users(username, password, mail) VALUES(:username, :password, :mail)');
    //On rempli la BDD avec les infos du formulaire
    $req->execute(
        array(
            'username' => $username,
            'password' => $pass_hash,
            'mail' => $mail)
    );
}
function checkNickname($usernameToCheck)
{
    $db = dbConnect();
    //requete retourne 1 si pseudo existe
    $req = $db->prepare('SELECT COUNT(*) AS username FROM users WHERE username = ?');
    $req->execute(array($usernameToCheck));
    $username = $req->fetch();
    return $username['username'];
}
function getAllCategories()
{
    $db = dbConnect();
    $categories = $db->query('SELECT * FROM categories');
    return $categories;
}
function writeCat($name)
{
    $db = dbConnect();
    $cat = $db->prepare('INSERT INTO categories(name) VALUES(?)');
    $affectedLines = $cat->execute(array($name));
    return $affectedLines;
}