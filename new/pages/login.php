<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./head.php";?>
    <title>Login</title>
    <style>
        @import "./src/styles/style.css";
        form{
            width:40vw;
            margin:0 auto;
            margin-top:20vh;
        }
        form > *{
            margin-top:1em;
        }
    </style>
</head>
<body>
    <?php include "./header.php";?>
    <main>
        <form method="post" action="./include/validator.php">
            <h4>Login</h4>
            <section class="form-floating">
                <input class="form-control" name="email" id="email" placeholder="i" required/>
                <label for="email">Email</label>
            </section>
            <section class="form-floating">
                <input class="form-control" name="pwd" id="pwd" placeholder="i" type="password" required/>
                <label for="pwd">Password</label>
            </section>
            <button name="login" class="btn btn-success w-100">Login</button>
            <span>Do not have an account? <a href="pages/signup.php">Create One</a></span>
            <?php
            if(isset($_COOKIE['loginerr'])){
                echo '<p class="text-danger">Email or Password is incorrect</p>';
            }
            ?>
        </form>
    </main>
</body>
</html>