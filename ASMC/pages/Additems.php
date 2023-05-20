<!DOCTYPE html>
<html lang='en'>
<head>
    <?php include './Head.php';?>
    <title>Add items</title>
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
            <h4>Adding a New items</h4>
            				<section class='form-floating'>
                        <input type='text' class='form-control' name='id' id'id' placeholder='i' required/>
                        <label for='id'>id</label>
                        </section>
				<section class='form-floating'>
                        <input type='text' class='form-control' name='title' id'title' placeholder='i' required/>
                        <label for='title'>title</label>
                        </section>
				<section class='form-floating'>
                        <input type='text' class='form-control' name='description' id'description' placeholder='i' required/>
                        <label for='description'>description</label>
                        </section>
				<section class='form-floating'>
                        <input type='text' class='form-control' name='price' id'price' placeholder='i' required/>
                        <label for='price'>price</label>
                        </section>
				<section class='form-floating'>
                        <input type='text' class='form-control' name='img' id'img' placeholder='i' required/>
                        <label for='img'>img</label>
                        </section>
				<section class='form-floating'>
                        <input type='text' class='form-control' name='dateuploaded' id'dateuploaded' placeholder='i' required/>
                        <label for='dateuploaded'>dateuploaded</label>
                        </section>
<section class='form-floating'>
                <button class='btn btn-success' name='postitems'>Add</button>
                <section class='btn btn-primary' onclick='window.location = `./../index.php`'>Home</section>
            </section>
            <?php 
            if(isset($_COOKIE['itemsUpload']) && $_COOKIE['itemsUpload'] == 'success'){
                echo '
                <section class=text-success>Uploaded Successfully!!</section>
                ';
            }
            ?>
        </form>
    </main>
</body>
</html>