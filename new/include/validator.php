<?php
// Including your database file     
include 'database.php';
// Initializing the credentials for your database
$con = new MySQLiConnection("localhost", "root", "", "teashop");
// Connecting to your database
$db = new DB($con); 
session_start();
function getAllPosts($db){
    $result = $db->query('CALL view_items();');  
    $list = [];
    $i = 0;
    foreach($result as $data){
        $list[$i++] = $data;
    }
    return $list;
}
function getAllPostsById($db, $id){
    $result = $db->query('CALL view_items_id(?);', [$id]);  
    $list = [];
    $i = 0;
    foreach($result as $data){
        $list[$i++] = $data;
    }
    return $list;
}
function getAllBookmarks($db){
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : "4kjlkj;q09j4j09j";
    $result = $db->query('CALL view_bookmark_username(?);', [$username]);  
    $list = [];
    $i = 0;
    foreach($result as $data){
        $list[$i++] = $data;
    }
    return $list;
}
function getAllCarts($db){
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : "4kjlkj;q09j4j09j";
    $result = $db->query('CALL view_carts_username(?);', [$username]);  
    $list = [];
    $i = 0;
    foreach($result as $data){
        $list[$i++] = $data;
    }
    return $list;
}
if(isset($_POST['signup'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $emailExist = $db->query("CALL email_exists(?)", [$email]);
    if($emailExist[0]['number'] == 0){
        $usernameExist = $db->query('CALL username_exists(?)', [$username]);
        if($usernameExist[0]['number'] == 0){
            $db->query('CALL signup(?, ?, ?);', [$username, $email, $pwd]);
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
            header("Location: ./../");
        }else{
            setcookie('signuperr', "true", time()+15, "/");
            header("Location: ./../pages/signup.php");
        }
    }else{
        setcookie('signuperr', "true", time()+15, "/");
        header("Location: ./../pages/signup.php");
    }
}
if(isset($_REQUEST['logout'])){
    session_unset();
    session_destroy();
    header("Location: ./../");
}
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $sql = $db->query('CALL login_email(?)', [$email]);
    if($sql[0]['id'] != null){
        if(password_verify($pwd, $sql[0]['pwd'])){
            $_SESSION['email'] = $sql[0]['email'];
            $_SESSION['username'] = $sql[0]['username'];
            header("Location: ./../");
        }else if($pwd == $sql[0]['pwd']){
            $_SESSION['email'] = $sql[0]['email'];
            $_SESSION['username'] = $sql[0]['username'];
            header("Location: ./../");
        }else{
            setcookie('loginerr', "true", time()+15, "/");
            header("Location: ./../pages/login.php");
        }
    }else{
        setcookie('loginerr', "true", time()+15, "/");
        header("Location: ./../pages/login.php");
    }
}
if(isset($_REQUEST['getBookmarks'])){
    $username = $_REQUEST['getBookmarks'];
    $sql = $db->query("CALL bookmark_count(?)", [$username]);
    echo $sql[0]["number"];
}
if(isset($_REQUEST['addBookmarks'])){
    $username = $_REQUEST['addBookmarks'];
    $item  = $_REQUEST['id'];
    if($username != "not logged in")
        $db->query('CALL add_bookmark(?,?)', [$username, $item]);
}
if(isset($_REQUEST['getCarts'])){
    $username = $_REQUEST['getCarts'];
    $sql = $db->query('CALL cart_count(?)', [$username]);
    echo $sql[0]['number'];
}
if(isset($_REQUEST['addCart'])){
    $username = $_REQUEST['addCart'];
    $item  = $_REQUEST['id'];
    if($username != "not logged in")
        $db->query('CALL add_cart(?, ?)', [$username, $item]);
}
if(isset($_REQUEST['deleteBookmark'])){
    $id  = $_REQUEST['deleteBookmark'];
    $db->query('CALL delete_bookmark_items(?)', [$id]);
}
if(isset($_REQUEST['deleteCart'])){
    $id  = $_REQUEST['deleteCart'];
    $db->query('CALL delete_cart_id(?)', [$id]);
}
if(isset($_REQUEST['payee'])){
    $email = $_REQUEST['payee'];
    $items = $_REQUEST['items'];
    $total = $_REQUEST['total'];
    $db->query("CALL delete_cart_username(?)", [$_SESSION['username']]);
    $db->query("CALL add_orders(?, ?, ?)", [$email, $items, $total]);
}
function getAllHistory($db){
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : "4kjlkj;q09j4j09j";
    $result = $db->query('CALL view_orders_username(?);', [$username]);  
    $list = [];
    $i = 0;
    foreach($result as $data){
        $list[$i++] = $data;
    }
    return $list;
}