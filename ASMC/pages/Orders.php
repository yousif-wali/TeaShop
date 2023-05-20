
 <style>
    table img{
        object-fit: contain;
        height:100px;
        aspect-ratio: 1/1;
    }
</style>
<h3>Orders</h3>
<!--
<button class='btn btn-success float-end mb-2' onclick='window.location = `./pages/Addorders.php`'>Add</button>
-->
    <table id='table' class='Table'>
        <thead>
        <tr>
				<th>
					id
				</th>
				<th>
					username
				</th>
				<th>
					items
				</th>
				<th>
					total
				</th>
				<th>
					payment
				</th>
				<th>
					paymentDate
				</th>
            
                <th>
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
         //  $Orders = new Orders();
         //   $items = $Orders->getorders();
         $items = getorders($db);
            foreach($items as $item){
				$id= $item['id'];
				$username= $item['username'];
				$items= $item['items'];
				$total= $item['total'];
				$payment= $item['payment'];
				$paymentDate= $item['paymentDate'];
				echo "
                <tr>
				<td>$id</td>
				<td>$username</td>
				<td>$items</td>
				<td>$total</td>
				<td>$payment</td>
				<td>$paymentDate</td>
				<td>
                    <button class='btn btn-primary'><i class='bi bi-pencil-square'></i></button>
                    <button class='btn btn-danger' onclick='droporders(`$id`, `$username`)'><i class='bi bi-x'></i></button>
                    </td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
    <script>
        const droporders = (id, title)=>{
            Swal.fire({
                title: `Do you want to Delete ${title}?`,
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Delete',
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    fetch(`./include/validator.php?Deleteorders=${id}`).then(res=>res.text()).then(res=>{});
                    Swal.fire(`${title} is deleted.`, '', 'success');
                    setTimeout(() => {
                      window.location.reload();                     
                    }, 1000);
                }
                })
        }
    </script>
 