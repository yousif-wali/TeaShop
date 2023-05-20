
 <style>
    table img{
        object-fit: contain;
        height:100px;
        aspect-ratio: 1/1;
    }
</style>
<h3>Items</h3>
<button class='btn btn-success float-end mb-2' onclick='window.location = `./pages/Additems.php`'>Add</button>
    <table id='table' class='Table'>
        <thead>
        <tr>
				<th>
					id
				</th>
				<th>
					title
				</th>
				<th>
					description
				</th>
				<th>
					price
				</th>
				<th>
					img
				</th>
				<th>
					dateuploaded
				</th>
            
                <th>
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
         //  $Items = new Items();
         //   $items = $Items->getitems();
         $items = getitems($db);
            foreach($items as $item){
				$id= $item['id'];
				$title= $item['title'];
				$description= $item['description'];
				$price= $item['price'];
				$img= $item['img'];
				$dateuploaded= $item['dateuploaded'];
				echo "
                <tr>
				<td>$id</td>
				<td>$title</td>
				<td>$description</td>
				<td>$price</td>
				<td>$img</td>
				<td>$dateuploaded</td>
				<td>
                    <button class='btn btn-primary'><i class='bi bi-pencil-square'></i></button>
                    <button class='btn btn-danger' onclick='dropitems(`$id`, `$title`)'><i class='bi bi-x'></i></button>
                    </td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
    <script>
        const dropitems = (id, title)=>{
            Swal.fire({
                title: `Do you want to Delete ${title}?`,
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Delete',
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    fetch(`./include/validator.php?Deleteitems=${id}`).then(res=>res.text()).then(res=>{});
                    Swal.fire(`${title} is deleted.`, '', 'success');
                    setTimeout(() => {
                      window.location.reload();                     
                    }, 1000);
                }
                })
        }
    </script>
 