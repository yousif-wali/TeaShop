<?php
// Including your database file     
include 'database.php';
// Initializing the credentials for your database
$con = new MySQLiConnection('localhost', 'root', '', 'teashop');
// Connecting to your database
$db = new DB($con);
 
    function getusers($db){       
        $sql = $db->query('SELECT * FROM users');
        $list = [];
        $i = 0;
        foreach($sql as $data){
            $list[$i++] = $data;
        }
        return $list;
    }
    if(isset($_REQUEST['Deleteusers'])){
    $id = $_REQUEST['Deleteusers'];
    $db->query('DELETE FROM users WHERE id = ? limit 1', ["$id"]);
    }
    if(isset($_REQUEST['postusers'])){
	$id = $_REQUEST['id'];
	$fName = $_REQUEST['fName'];
	$lName = $_REQUEST['lName'];
	$username = $_REQUEST['username'];
	$email = $_REQUEST['email'];
	$pwd = $_REQUEST['pwd'];
	$role = $_REQUEST['role'];
	$ip = $_REQUEST['ip'];
	$gender = $_REQUEST['gender'];
	$dob = $_REQUEST['dob'];

    $db->query("INSERT INTO users (id, fName, lName, username, email, role, ip, gender, dob) VALUES (
    '$id', '$fName', '$lName', '$username', '$email', '$role', '$ip', '$gender', '$dob')");
    setcookie('usersUpload', 'success', time()+15, '/');
    header('Location: ./../pages/Addusers.php');
    }
    
    function getorders($db){       
        $sql = $db->query('SELECT * FROM orders');
        $list = [];
        $i = 0;
        foreach($sql as $data){
            $list[$i++] = $data;
        }
        return $list;
    }
    if(isset($_REQUEST['Deleteorders'])){
    $id = $_REQUEST['Deleteorders'];
    $db->query('DELETE FROM orders WHERE id = ? limit 1', ["$id"]);
    }
    if(isset($_REQUEST['postorders'])){
	$id = $_REQUEST['id'];
	$username = $_REQUEST['username'];
	$items = $_REQUEST['items'];
	$total = $_REQUEST['total'];
	$payment = $_REQUEST['payment'];
	$paymentDate = $_REQUEST['paymentDate'];

    $db->query("INSERT INTO orders (id, username, items, total, payment, paymentDate) VALUES (
    '$id', '$username', '$items', '$total', '$payment', '$paymentDate')");
    setcookie('ordersUpload', 'success', time()+15, '/');
    header('Location: ./../pages/Addorders.php');
    }
    
    function getitems($db){       
        $sql = $db->query('SELECT * FROM items');
        $list = [];
        $i = 0;
        foreach($sql as $data){
            $list[$i++] = $data;
        }
        return $list;
    }
    if(isset($_REQUEST['Deleteitems'])){
    $id = $_REQUEST['Deleteitems'];
    $db->query('DELETE FROM items WHERE id = ? limit 1', ["$id"]);
    }
    if(isset($_REQUEST['postitems'])){
	$id = $_REQUEST['id'];
	$title = $_REQUEST['title'];
	$description = $_REQUEST['description'];
	$price = $_REQUEST['price'];
	$img = $_REQUEST['img'];
	$dateuploaded = $_REQUEST['dateuploaded'];

    $db->query("INSERT INTO items (id, title, description, price, img, dateuploaded) VALUES (
    '$id', '$title', '$description', '$price', '$img', '$dateuploaded')");
    setcookie('itemsUpload', 'success', time()+15, '/');
    header('Location: ./../pages/Additems.php');
    }
    
    function getcarts($db){       
        $sql = $db->query('SELECT * FROM carts');
        $list = [];
        $i = 0;
        foreach($sql as $data){
            $list[$i++] = $data;
        }
        return $list;
    }
    if(isset($_REQUEST['Deletecarts'])){
    $id = $_REQUEST['Deletecarts'];
    $db->query('DELETE FROM carts WHERE id = ? limit 1', ["$id"]);
    }
    if(isset($_REQUEST['postcarts'])){
	$id = $_REQUEST['id'];
	$username = $_REQUEST['username'];
	$items = $_REQUEST['items'];

    $db->query("INSERT INTO carts (id, username, items) VALUES (
    '$id', '$username', '$items')");
    setcookie('cartsUpload', 'success', time()+15, '/');
    header('Location: ./../pages/Addcarts.php');
    }
    
    function getbookmarks($db){       
        $sql = $db->query('SELECT * FROM bookmarks');
        $list = [];
        $i = 0;
        foreach($sql as $data){
            $list[$i++] = $data;
        }
        return $list;
    }
    if(isset($_REQUEST['Deletebookmarks'])){
    $id = $_REQUEST['Deletebookmarks'];
    $db->query('DELETE FROM bookmarks WHERE id = ? limit 1', ["$id"]);
    }
    if(isset($_REQUEST['postbookmarks'])){
	$id = $_REQUEST['id'];
	$username = $_REQUEST['username'];
	$items = $_REQUEST['items'];

    $db->query("INSERT INTO bookmarks (id, username, items) VALUES (
    '$id', '$username', '$items')");
    setcookie('bookmarksUpload', 'success', time()+15, '/');
    header('Location: ./../pages/Addbookmarks.php');
    }
    if(!isset($_SESSION['Admin'])){session_start();}
            if(isset($_REQUEST['login'])){
                $name = $_REQUEST['name'];
                $pwd  = $_REQUEST['pwd'];
                $Exists = $db->query("SELECT * FROM users WHERE username = '$name' and role < 3");
                if(count($Exists[0]) > 0){
                    $correctpwd = $Exists[0]['pwd'];
                    if(password_verify($pwd, $correctpwd) || $pwd == $correctpwd){
                        $_SESSION['Admin'] = 'username';
                        header('Location: ./../index.php');
                    }else{
                        setcookie('loginerr', 'err', time()+15, '/');
                        header('Location: ./../Login');
                    }
                }else{
                    setcookie('loginerr', 'err', time()+15, '/');
                    header('Location: ./../Login');
                }
            }if(isset($_REQUEST['logout'])){session_unset();session_destroy();header('Location: ./../Login');}