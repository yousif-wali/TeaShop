<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./head.php"; include "./../include/validator.php";?>
    <title>Bookmarks</title>
    <style>
        @import "./src/styles/style.css";
    </style>
</head>
<body>
    <?php include "./header.php";?>
    <main>
    <h1 style="margin-left:40vw">Bookmarks</h1>
    <section class="posts">
    <?php
    $items = getAllBookmarks($con);
    if($items != null){
        foreach($items as $item){
          //  $id = $item[0];
            $itemId = $item[1];
            $post = getAllPostsById($con, $itemId);
            foreach($post as $detail){
                $image = $detail[0];
                $title = $detail[1];
                $description = $detail[2];
                $price = $detail[3];
                $id = $detail[4];
                echo "
                <section class='post'>
                <h4>$title</h4>
                <img src='./src/images/$image'/>
                <p>$$price</p>
                <h6>$description</h6>
                <section class='flex flex-column'>
                    <button class='btn btn-danger w-100' onclick='dropbookmark($id, `$title`)'>Delete</button>   
                </section>
                </section>";
    
            }
        }
    }else{
        echo "<h4>No items</h4>";
    }
    ?>
</section>
    </main>
    <script>
            updateBookmark(email);
            updateCart(email);
            const dropbookmark = (id, title)=>{
            Swal.fire({
                title: `Do you want to Delete ${title}?`,
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Delete',
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    fetch(`./include/validator.php?deleteBookmark=${id}`).then(res=>res.text()).then(res=>{});
                    Swal.fire(`${title} is deleted.`, '', 'success');
                    setTimeout(() => {
                      window.location.reload();                                     
                    }, 1000);
                }
                })
        }
    </script>
</body>
</html>