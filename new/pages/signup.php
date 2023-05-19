<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./head.php";?>
    <title>Sign up</title>
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
            <h4>Signup</h4>
            <section class="form-floating">
                <input class="form-control" name="username" id="username" placeholder="i"/>
                <label for="username">Username</label>
            </section>
            <section class="form-floating">
                <input class="form-control" name="email" id="email" placeholder="i"/>
                <label for="email">Email</label>
            </section>
            <section class="form-floating">
                <input class="form-control" name="pwd" id="pwd" placeholder="i" type="password" required/>
                <label for="pwd">Password</label>
            </section>
            <button name="signup" class="btn btn-success w-100">Signup</button>
            <span>Already have an account? <a href="pages/login.php">Login</a></span>
            <?php
            if(isset($_COOKIE['signuperr'])){
                echo '<p class="text-danger">User Already Exists</p>';
            }
            ?>
        </form>
    </main>
</body>
</html>