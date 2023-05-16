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
    <main>
        <?php include "./pages/posts.php";?>
    </main>
    <script>
            updateBookmark(email);
            updateCart(email);
    </script>
</body>
</html>