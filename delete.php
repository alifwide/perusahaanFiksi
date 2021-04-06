<?php
require_once("config.php");
	$id = json_decode(stripslashes($_POST["id"]));
	for($a=0;$a<count($id);$a++){
		$query = "DROP TABLE pesan_".$id[$a]."";
		$conn->query($query);
		$query = "DELETE FROM user WHERE id = ".$id[$a]."";
		if($conn->query($query)===true){
			echo "sudahh";
		}
	}
	for($a=0;$a<count($id);$a++){
		echo $id[$a];
	}
	echo "Berasl";
?>