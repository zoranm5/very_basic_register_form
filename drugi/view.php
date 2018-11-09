<!DOCTYPE html>

<html>

			<html lang="en">
			
			<head>
			
			
			</head>
<div class="container">
<body>

<table class="table table-bordered table-hover">
 <div id="bulkOptionContainer" class="col-xs-6 col-xs-offset-3">
              <thead>
                    <tr>
                       
                        <th>id</th>
                        <th>ime</th>
                        <th>email</th>
                        <th>spol</th>
						<th>hrvatski</th>
                        <th>engleski</th>
                        <th>njemački</th>
                        <th>francuski</th>
                        <th>talijanski</th>
                        <th>textarea</th>
                    </tr>
                </thead>
				<tbody>
		<?php
		
    $query = "SELECT * FROM users  ";
    $select_users = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_users )) {
        $id         = $row['id'];
        $username   = $row['username'];
        $email      = $row['email'];
        $spol       = $row['spol'];
        $hrvatski   = $row['hrvatski'];
        $engleski   = $row['engleski'];
        $njemacki   = $row['njemacki'];
        $talijanski = $row['talijanski'];
        $francuski  = $row['francuski'];
        $textarea   = $row['textarea'];	
			
	
    echo "<tr>";			

             echo "<td>$id</td>";
			 echo "<td>$username</td>";
			 echo "<td>$email</td>";
			 echo "<td>$spol </td>";
			 echo "<td>$hrvatski</td>";
			 echo "<td>$engleski</td>";
			 echo "<td>$njemacki</td>";
			 echo "<td>$talijanski</td>";
			 echo "<td>$francuski</td>";
			 echo "<td>$textarea</td>";
	 echo "</tr>";
	}	 
	?>
				</tbody>
</div>

</table>

	
	

</body>
</div>
</html>





	