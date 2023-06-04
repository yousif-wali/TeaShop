<section class="posts">
    <?php
    $items = getAllPosts($db);
    if($items != null){
        foreach($items as $item){
            $id = $item['id'];
            $title = $item['title'];
            $description = $item['description'];
            $price = $item['price'];
            $image = $item['img'];
            $uploaded = $item['dateuploaded'];
            echo "
            <section class='post tilt'>
          
            <img class='tilt' src='./src/images/$image'/>
            <h4>$title</h4>
            <!--<p>$$price</p> -->
            <h6>$description</h6>
            <section class='flex flex-column'>
                <i class='bi bi-bookmark-plus col-5 btn btn-danger' onclick='addBookmark($id, `$email`)'></i>
                <i class='bi bi-bag-plus col-5 btn btn-warning' onclick='addCart($id, `$email`)'></i>
            </section>
            </section>";
        }
    }
    ?>
</section>