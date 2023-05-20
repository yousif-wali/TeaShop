<?php 
session_start();
if(!isset($_SESSION['Admin'])){
    header('Location: ./Login');
}else{
    include './include/validator.php';
}
?>
<!DOCTYPE html>
<html lang=`en`>
<head>
<title>Admin System Management Center</title>
<?php include './pages/Head.php';?>
<style>
    @import './src/styles/style.css';
    td{
        border-bottom:1px solid black;
    }
</style>
</head>
<body>
    <header class='d-flex justify-content-between align-items-center'>
        <section>
            Admin Portal
        </section>
        <section style='cursor:pointer;'>
            <i class='bi bi-person'></i>
            <span onclick='window.location =`./include/validator.php?logout`'>Log out</span>
        </section>
    </header>
    <section data-item='main' class='row'>
        <aside class='col-3 p-3'>
                <ol class='list-group'>

<li class='list-group-item list-group-item-action'>Customers</li><li class='list-group-item list-group-item-action'>Orders</li><li class='list-group-item list-group-item-action'>Items</li><li class='list-group-item list-group-item-action'>User Carts</li><li class='list-group-item list-group-item-action'>User Bookmarks</li> </ol>
        </aside>
        <main class='col-9' data-type='selection'><section>
            <?php include './pages/Customers.php';?>
        </section><section>
            <?php include './pages/Orders.php';?>
        </section><section>
            <?php include './pages/Items.php';?>
        </section><section>
            <?php include './pages/User Carts.php';?>
        </section><section>
            <?php include './pages/User Bookmarks.php';?>
        </section></main>
</section>
    <script>
        $('.Table').DataTable();
    </script>
    <script src='./src/scripts/script.js'></script>
</body>
</html>