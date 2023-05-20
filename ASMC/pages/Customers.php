
 <style>
    table img{
        object-fit: contain;
        height:100px;
        aspect-ratio: 1/1;
    }
</style>
<h3>Customers</h3>
<!--
<button class='btn btn-success float-end mb-2' onclick='window.location = `./pages/Addusers.php`'>Add</button>
-->
    <table id='table' class='Table'>
        <thead>
        <tr>
				<th>
					id
				</th>
				<th>
					fName
				</th>
				<th>
					lName
				</th>
				<th>
					username
				</th>
				<th>
					email
				</th>
				<th>
					role
				</th>
				<th>
					ip
				</th>
				<th>
					gender
				</th>
				<th>
					dob
				</th>
            
                <th>
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
         //  $Customers = new Customers();
         //   $items = $Customers->getusers();
         $items = getusers($db);
            foreach($items as $item){
				$id= $item['id'];
				$fName= $item['fName'];
				$lName= $item['lName'];
				$username= $item['username'];
				$email= $item['email'];
				$role= $item['role'];
				$ip= $item['ip'];
				$gender= $item['gender'];
				$dob= $item['dob'];
				echo "
                <tr>
				<td>$id</td>
				<td>$fName</td>
				<td>$lName</td>
				<td>$username</td>
				<td>$email</td>
				<td>$role</td>
				<td>$ip</td>
				<td>$gender</td>
				<td>$dob</td>
				<td>
                    <button class='btn btn-danger' onclick='dropusers(`$id`, `$fName`)'><i class='bi bi-x'></i></button>
                    </td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
    <script>
        const dropusers = (id, title)=>{
            Swal.fire({
                title: `Do you want to Delete ${title}?`,
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Delete',
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    fetch(`./include/validator.php?Deleteusers=${id}`).then(res=>res.text()).then(res=>{});
                    Swal.fire(`${title} is deleted.`, '', 'success');
                    setTimeout(() => {
                      window.location.reload();                     
                    }, 1000);
                }
                })
        }
    </script>
 