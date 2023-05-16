<?php
$con = mysqli_connect("localhost", "root", "11111111", "garden");
session_start();
function getAllPosts($con){
    $result = mysqli_query($con, "SELECT * FROM item");
    if(mysqli_num_rows($result) > 0){
        $list = [];
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $list[$i++] = [$row['name'], $row['title'], $row['description'], $row['price'], $row['id']];
        }
        return $list;
    }
}
function getAllPostsById($con, $id){
    $result = mysqli_query($con, "SELECT * FROM item WHERE id = '$id'");
    if(mysqli_num_rows($result) > 0){
        $list = [];
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $list[$i++] = [$row['name'], $row['title'], $row['description'], $row['price'], $row['id']];
        }
        return $list;
    }
}
function getAllBookmarks($con){
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : "4kjlkj;q09j4j09j";
    $result = mysqli_query($con, "SELECT * FROM bookmarks where email = '$email'");
    if(mysqli_num_rows($result) > 0){
        $list = [];
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $list[$i++] = [$row['id'], $row['item']];
        }
        return $list;
    }
}
function getAllCarts($con){
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : "4kjlkj;q09j4j09j";
    $result = mysqli_query($con, "SELECT * FROM cart where email = '$email'");
    if(mysqli_num_rows($result) > 0){
        $list = [];
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $list[$i++] = [$row['id'], $row['item']];
        }
        return $list;
    }
}
if(isset($_POST['signup'])){
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $emailExist = mysqli_query($con, "select * from users where email = '$email'");
    if(mysqli_num_rows($emailExist) == 0){
        mysqli_query($con, "insert into users (email, pwd) values ('$email', '$pwd')");
        $_SESSION['email'] = $email;
        header("Location: ./../");
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
    $sql = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
    if(mysqli_num_rows($sql) > 0){
        if($pwd == mysqli_fetch_assoc($sql)['pwd']){
            $_SESSION['email'] = $email;
            header("Location: ./../");
        }
    }else{
        setcookie('loginerr', "true", time()+15, "/");
        header("Location: ./../pages/login.php");
    }
}
if(isset($_REQUEST['getBookmarks'])){
    $email = $_REQUEST['getBookmarks'];
    $sql = mysqli_query($con, "SELECT * FROM bookmarks WHERE email = '$email'");
    echo mysqli_num_rows($sql);
}
if(isset($_REQUEST['addBookmarks'])){
    $email = $_REQUEST['addBookmarks'];
    $item  = $_REQUEST['id'];
    mysqli_query($con, "INSERT INTO bookmarks (email, item) values ('$email', '$item')");
}
if(isset($_REQUEST['getCarts'])){
    $email = $_REQUEST['getCarts'];
    $sql = mysqli_query($con, "SELECT * FROM cart WHERE email = '$email'");
    echo mysqli_num_rows($sql);
}
if(isset($_REQUEST['addCart'])){
    $email = $_REQUEST['addCart'];
    $item  = $_REQUEST['id'];
    mysqli_query($con, "INSERT INTO cart (email, item) values ('$email', '$item')");
}
if(isset($_REQUEST['deleteBookmark'])){
    $id  = $_REQUEST['deleteBookmark'];
    mysqli_query($con, "DELETE FROM bookmarks WHERE item = '$id' limit 1");
}
if(isset($_REQUEST['deleteCart'])){
    $id  = $_REQUEST['deleteCart'];
    mysqli_query($con, "DELETE FROM cart WHERE item = '$id' limit 1");
}
if(isset($_REQUEST['payee'])){
    $email = $_REQUEST['payee'];
    $items = $_REQUEST['items'];
    $total = $_REQUEST['total'];
    mysqli_query($con, "INSERT INTO orders (email, items, total) VALUES ('$email', '$items', '$total')");
    mysqli_query($con, "DELETE FROM cart WHERE email = '$email'");
}
function getAllHistory($con){
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : "4kjlkj;q09j4j09j";
    $result = mysqli_query($con, "SELECT * FROM orders where email = '$email' order by paymentDate desc");
    if(mysqli_num_rows($result) > 0){
        $list = [];
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $list[$i++] = [$row['items'], $row['total'], $row['payment'], $row['paymentDate']];
        }
        return $list;
    }
}