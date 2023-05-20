
<!DOCTYPE html>
<html lang='en'>
<head>
    <?php include './Head.php';?>
    <title>Edit users</title>
    <style>
        main{
            height:100vh;
        }
        form{
            width:30vw;
        }
        input {
            margin-bottom:1em;
        }
    </style>
</head>
<body>
    <main class='d-flex justify-content-center align-items-center'>
        <form action='./../include/validator.php' method='POST' enctype='multipart/form-data'>
                <h4>Edit <?php echo $_REQUEST['item']?></h4>
                <input type='hidden' name='id' value='<?php echo $_REQUEST['id']; ?>'>
                <section class='form-floating'>
                    <input type='text' class='form-control' name='name' id='name' placeholder='i' required value='<?php echo $_REQUEST['title'] ?>'/>
                    <label for='name'>Title</label>
                </section>           
                <section class='form-floating'>
                    <button class='btn btn-success' name='updateusers'>Update</button>
                    <section class='btn btn-primary' onclick='window.location = `./../index.php`'>Home</section>
                </section>
                <?php 
                if(isset($_COOKIE['usersUpdate']) && $_COOKIE['usersUpdate'] == 'success'){
                    echo '
                    <section class='text-success'>Updated Successfully!!</section>
                    ';
                }
                ?>
            </form>
    </main>
</body>
</html>
