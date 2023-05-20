<!DOCTYPE html>
<html lang='en'>
<head>
    <?php include './Head.php';?>
    <title>Add users</title>
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
            <h4>Adding a New users</h4>
            				<section class='form-floating'>
                        <input type='text' class='form-control' name='id' id'id' placeholder='i' required/>
                        <label for='id'>id</label>
                        </section>
				<section class='form-floating'>
                        <input type='text' class='form-control' name='fName' id'fName' placeholder='i' required/>
                        <label for='fName'>fName</label>
                        </section>
				<section class='form-floating'>
                        <input type='text' class='form-control' name='lName' id'lName' placeholder='i' required/>
                        <label for='lName'>lName</label>
                        </section>
				<section class='form-floating'>
                        <input type='text' class='form-control' name='username' id'username' placeholder='i' required/>
                        <label for='username'>username</label>
                        </section>
				<section class='form-floating'>
                        <input type='text' class='form-control' name='email' id'email' placeholder='i' required/>
                        <label for='email'>email</label>
                        </section>
				<section class='form-floating'>
                        <input type='text' class='form-control' name='pwd' id'pwd' placeholder='i' required/>
                        <label for='pwd'>pwd</label>
                        </section>
				<section class='form-floating'>
                        <input type='text' class='form-control' name='role' id'role' placeholder='i' required/>
                        <label for='role'>role</label>
                        </section>
				<section class='form-floating'>
                        <input type='text' class='form-control' name='ip' id'ip' placeholder='i' required/>
                        <label for='ip'>ip</label>
                        </section>
				<section class='form-floating'>
                        <input type='text' class='form-control' name='gender' id'gender' placeholder='i' required/>
                        <label for='gender'>gender</label>
                        </section>
				<section class='form-floating'>
                        <input type='text' class='form-control' name='dob' id'dob' placeholder='i' required/>
                        <label for='dob'>dob</label>
                        </section>
<section class='form-floating'>
                <button class='btn btn-success' name='postusers'>Add</button>
                <section class='btn btn-primary' onclick='window.location = `./../index.php`'>Home</section>
            </section>
            <?php 
            if(isset($_COOKIE['usersUpload']) && $_COOKIE['usersUpload'] == 'success'){
                echo '
                <section class=text-success>Uploaded Successfully!!</section>
                ';
            }
            ?>
        </form>
    </main>
</body>
</html>