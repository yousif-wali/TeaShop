<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./head.php"; include "./../include/validator.php";?>
    <title>Cart</title>
    <style>
        @import "./src/styles/style.css";
    </style>
</head>
<body>
    <?php include "./header.php";?>
    <main>
    <h1 style="margin-left:40vw">Your Cart</h1>
    <section class="posts">
    <?php
    $total = 0;
    $totalItem = 0;
    $items = getAllCarts($db);
    if($items != null){
    foreach($items as $item){
      //  $id = $item[0];
        $itemId = $item['items'];
        $post = getAllPostsById($db, $itemId);
        foreach($post as $detail){
            $id = $detail['id'];
            $title = $detail['title'];
            $description = $detail['description'];
            $price = $detail['price'];
            $image = $detail['img'];
            $total += $price;
            $totalItem++;
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
    }
else{
    echo "<h4>No items</h4>";
}
    ?>
</section>
<style>
    #payment{
        width:40vw;
        margin:0 auto;
        
    }
    #payment section{
        display:flex;
        justify-content: space-between;
        border-bottom: 1px solid black;
        margin-bottom:0.5em;
    }
    #total{
        border-bottom:none!important;
        font-size:1.5rem;
    }
    #pay{
        margin:0 auto;
    }

</style>
    <?php
    $tax = round($total * 0.07, 2);
    $pay = $tax + $total;
    echo "
    <section id='payment' style='padding-bottom:1em;'>
        <section>
            <span>Items</span>
            <span>$totalItem</span>
        </section>
        <section>
            <span>Subtotal</span>
            <span>$$total</span>
        </section>
        <section>
            <span>Tax</span>
            <span>$$tax</span>
        </section>
        <section id='total'>
            <span>Total</span>
            <span style='color:green'>$$pay</span>
        </section>
        <button class='btn btn-info w-100' onclick='pay(`$email`, $totalItem, $total)'><b>Pay</b></button>
    </section>
    ";
    
    ?>
    <h4 style='margin:0 auto; width:40vw;'>Account History</h4>
    <section style='margin:0 auto; width:40vw;'>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Item Number</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>          
            <?php
            $transaction = getAllHistory($db);
            foreach($transaction as $order){
                $number = $order['items'];
                $amount = $order['total'];
                $status = $order['payment'];
                $date   = $order['paymentDate'];
                echo "
                <tr>
                    <td align='center'>$number</td>
                    <td>$amount</td>
                    <td>$status</td>
                    <td>$date</td>
                </tr>
                ";
            }
            ?>
        </tbody>
        </table>
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
                    fetch(`./include/validator.php?deleteCart=${id}`).then(res=>res.text()).then(res=>{});
                    Swal.fire(`${title} is deleted.`, '', 'success');
                    setTimeout(() => {
                      window.location.reload();                                     
                    }, 1000);
                }
                })
        }
            const pay = (email, items, total) =>{
                fetch(`./include/validator.php?payee=${email}&items=${items}&total=${total}`).then(res=>res.text()).then(res=>{});
                updateBookmark(email);
                updateCart(email);
                setTimeout(() => {
                      window.location.reload();                                     
                    }, 1000);
            }
            $('.Table').DataTable();
    </script>
</body>
</html>