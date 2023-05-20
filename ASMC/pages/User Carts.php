
 <style>
    table img{
        object-fit: contain;
        height:100px;
        aspect-ratio: 1/1;
    }
</style>
<h3>User Carts</h3>
<!--
<button class='btn btn-success float-end mb-2' onclick='window.location = `./pages/Addcarts.php`'>Add</button>
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
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
         //  $User Carts = new User Carts();
         //   $items = $User Carts->getcarts();
         $items = getcarts($db);
            foreach($items as $item){
				$id= $item['id'];
				$username= $item['username'];
				$items= $item['items'];
				echo "
                <tr>
				<td>$id</td>
				<td>$username</td>
				<td>$items</td>
				<td>
                    <button class='btn btn-primary'><i class='bi bi-pencil-square'></i></button>
                    <button class='btn btn-danger' onclick='dropcarts(`$id`, `$username`)'><i class='bi bi-x'></i></button>
                    </td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
    <script>
        const dropcarts = (id, title)=>{
            Swal.fire({
                title: `Do you want to Delete ${title}?`,
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Delete',
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    fetch(`./include/validator.php?Deletecarts=${id}`).then(res=>res.text()).then(res=>{});
                    Swal.fire(`${title} is deleted.`, '', 'success');
                    setTimeout(() => {
                      window.location.reload();                     
                    }, 1000);
                }
                })
        }
    </script>
 