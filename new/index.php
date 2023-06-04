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

    <section id="slideshowContainer">
        <section class="slideshow">
            <div class='Title_TeaShop'>
                <section>
                    <h1>چایێ دەمباش</h1>
                    <h4>!خووشترین و بەتامترین چایێ لە سەرانسەرێ ئێراقێ<h4>
                </section>
                <section class='image_Coffe'>
                        <img src="./src/images/Tea_Coffe.png" alt="">
                </section>
            </div>
        </section>
        <section class="slideshow">
            <div class='Title_TeaShop '>
                <section>
                    <h1>باشترین چا</h1>
                    <h4>بەناووبانگترین چا لە جیهانێ<h4>
                </section>
                <section class='image_Coffe'>
                        <img src="./src/images/jehan.jpg" alt="">
                </section>
            </div>
        </section>
    </section>

    <main>
        <section id="cube">
            <?php include "./pages/cube.php";?>
        </section>
        <?php include "./pages/posts.php";?>
    </main>

     <!-- A brief history of tea and Image_Word -->

    <div class="history_Box">

    <h2>A brief history of tea</h2>
    <h4>Tea, a beverage enjoyed by millions around the world,has a rich and
        fascinating history that spans thousandsof years. Here is a brief
        overview of its origins and  development:</h4>


        <img src="./src/images/jehan.jpg">


    </div>
    <?php include "./pages/footer.php";?>
  
    <script>
            updateBookmark(email);
            updateCart(email);
            w3.slideshow(".slideshow", 7000);
    </script>
</body>
</html>