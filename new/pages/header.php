<?php
$email = isset($_SESSION['username']) ? $_SESSION['username'] : 'not logged in';
echo "<script>let email = '$email';</script>";
?>
<header class="row m-auto justify-between">
    <section class="col-4 navbar-large">
        <img src="./src/images/7.jpg"/>
    </section>
    <section class="col-4 navbar navbar-large navbar-expand">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Orders</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
        </ul>
    </section>
    <section class="col-4 icons">
        <?php
        if(isset($_SESSION['email'])){
            echo '<span onclick="window.location = `./include/validator.php?logout`" style="cursor:pointer;">Logout</span>';
        }else{
            echo '<a href="./pages/login.php"><i class="bi bi-person"></i></a>';
        }
        ?>
        <i class="bi bi-bookmark-heart" id='bookmark' data-total='0' onclick="window.location = './pages/bookmarks.php'"></i>
        <i class="bi bi-cart-dash" id="cart" data-total='0' onclick="window.location = './pages/cart.php'"></i>
        <i class="bi bi-brightness-high"></i>
        <a href="tel:000-000-000"><i class="bi bi-telephone"></i></a>
    </section>
</header>
