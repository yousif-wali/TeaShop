
        <!DOCTYPE html>
<html lang='en'>
<head>
    <?php include './Head.php';?>
    <title>Login</title>
    <style>
        main{
            height:100vh;
        }
        form{
            width:30vw;
        }
    </style>
</head>
<body>
    <main class='d-flex justify-content-center align-items-center'>
        <form action='./include/validator.php' method='POST'>
            <h4>Login</h4>
            <section class='form-floating'>
                <input id='username' class='form-control mt-3' placeholder='' name='name' required/>
                <label for='username'>Username</label>
            </section>
            <section class='form-floating mt-3'>
                <input id='pwd' class='form-control' placeholder='' name='pwd' required/>
                <label>Password</label>
            </section>
            <section class='mt-3'>
                <button class='btn btn-success' name='login'>Log in</button>
            </section>
            <?php 
            if(isset($_COOKIE['loginerr'])){
                echo "<p class='text-danger'>Username OR Email is incorrect!</p>";
            }
            ?>
        </form>
    </main>
</body>
</html>
        