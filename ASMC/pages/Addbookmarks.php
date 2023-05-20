<!DOCTYPE html>
<html lang='en'>
<head>
    <?php include './Head.php';?>
    <title>Add bookmarks</title>
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
            <h4>Adding a New bookmarks</h4>
            				<section class='form-floating'>
                        <input type='text' class='form-control' name='id' id'id' placeholder='i' required/>
                        <label for='id'>id</label>
                        </section>
				<section class='form-floating'>
                        <input type='text' class='form-control' name='username' id'username' placeholder='i' required/>
                        <label for='username'>username</label>
                        </section>
				<section class='form-floating'>
                        <input type='text' class='form-control' name='items' id'items' placeholder='i' required/>
                        <label for='items'>items</label>
                        </section>
<section class='form-floating'>
                <button class='btn btn-success' name='postbookmarks'>Add</button>
                <section class='btn btn-primary' onclick='window.location = `./../index.php`'>Home</section>
            </section>
            <?php 
            if(isset($_COOKIE['bookmarksUpload']) && $_COOKIE['bookmarksUpload'] == 'success'){
                echo '
                <section class=text-success>Uploaded Successfully!!</section>
                ';
            }
            ?>
        </form>
    </main>
</body>
</html>