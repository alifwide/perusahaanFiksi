<?php
	require_once("config.php");
	$table = $_POST["id"];
	$query = "SELECT * FROM pesan_".$table."";
	$data = $conn->query($query);
	while($row = $data->fetch_assoc()){
		if($row["nama"]=="admin"){
			?>
			<tr class="admin">
                <th><?php echo $row["tgl"]?> | Admin : </th>
                <td><?php echo $row["msg"]?></td>
            </tr>   
			<?php
		}else{
			?>
			<tr class="user">
            	<th><?php echo $row["tgl"]?> | <?php echo $row["nama"]?> : </th>
            	<td><?php echo $row["msg"]?></td>
            </tr>
			<?php
		}
	}
?>