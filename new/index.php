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

    <section>
        <section class="slideshow">
            <div class='Title_TeaShop'>
                <section>
                    <h1>Tea Shop</h1>
                    <h4>Tea, a beverage enjoyed by millions around the world,has a rich and
                        fascinating history that spans thousandsof years. Here is a brief
                        overview of its origins and  development:<h4>
                </section>
                <section class='image_Coffe'>
                        <img src="./src/images/Tea_Coffe.png" alt="">
                </section>
            </div>
        </section>
        <section class="slideshow">
            <div class='Title_TeaShop '>
                <section>
                    <h1>Market Shop</h1>
                    <h4>Tea, a beverage enjoyed by millions around the world,has a rich and
                        fascinating history that spans thousandsof years. Here is a brief
                        overview of its origins and  development:<h4>
                </section>
                <section class='image_Coffe'>
                        <img src="./src/images/jehan.png" alt="">
                </section>
            </div>
        </section>
    </section>

    <main>
        <?php include "./pages/posts.php";?>
    </main>

     <!-- A brief history of tea and Image_Word -->

    <div class="history_Box">

    <h2>A brief history of tea</h2>
    <h4>Tea, a beverage enjoyed by millions around the world,has a rich and
        fascinating history that spans thousandsof years. Here is a brief
        overview of its origins and  development:</h4>


        <img src="./src/images/jehan.png">


    </div>
    <main>
    <?php include "./pages/footer.php";?>
    </main>
    <script>
            updateBookmark(email);
            updateCart(email);
            w3.slideshow(".slideshow", 2000);
    </script>
</body>
</html>