<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./pages/head.php"; include "./include/validator.php"?>
    <title>Home</title>
    <style>
        @import "./src/styles/style.css";
    </style>
</head>
<body>
    <?php include "./pages/header.php";?>

    <!-- Title  TeaShop_And_Image_Coffe_In_Header -->

   
    <div class='Title_TeaShop'>

    <h1>Tea Shop</h1>
    <h4>Tea, a beverage enjoyed by millions around the world,has a rich and
        fascinating history that spans thousandsof years. Here is a brief
        overview of its origins and  development:<h4>
    </div>
    <div class='image_Coffe'>
        <img src="Tea_Coffe.png" alt="">
    </div>
    <main>
        <?php include "./pages/posts.php";?>
    </main>

     <!-- A brief history of tea and Image_Word -->

    <div class="history_Box">

    <h2>A brief history of tea</h2>
    <h4>Tea, a beverage enjoyed by millions around the world,has a rich and
        fascinating history that spans thousandsof years. Here is a brief
        overview of its origins and  development:</h4>


        <img src="jehan.jpg" width="100px">


    </div>
    <main>
    <?php include "./pages/footer.php";?>
    </main>
    <script>
            updateBookmark(email);
            updateCart(email);
    </script>
</body>
</html>