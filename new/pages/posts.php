<section class="posts">
    <?php
    $items = getAllPosts($con);
    foreach($items as $item){
        $image = $item[0];
        $title = $item[1];
        $description = $item[2];
        $price = $item[3];
        $id = $item[4];
        echo "
        <section class='post'>
        <h4>$title</h4>
        <img src='./src/images/$image'/>
        <p>$$price</p>
        <h6>$description</h6>
        <section class='flex flex-column'>
            <i class='bi bi-bookmark-plus col-5 btn btn-danger' onclick='addBookmark($id, `$email`)'></i>
            <i class='bi bi-bag-plus col-5 btn btn-warning' onclick='addCart($id, `$email`)'></i>
        </section>
        </section>";
    }
    ?>
</section>