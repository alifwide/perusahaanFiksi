<?php
require_once("config.php");
	$id = json_decode(stripslashes($_POST["id"]));
	$username = json_decode(stripslashes($_POST["username"]));
	$email = json_decode(stripslashes($_POST["email"]));
	$password = json_decode(stripslashes($_POST["password"]));
	$level = json_decode(stripslashes($_POST["level"]));
	for($i = 0 ; $i<count($id); $i++){
		$query ="update user set username = '".$username[$i]."', password = '".$password[$i]."', email = '".$email[$i]."', level = '".$level[$i]."' where id = ".$id[$i].";";
		if($level[$i]=="free"||$level[$i]=="advanced"||$level[$i]=="super_advanced"||$level[$i]=="basic"){
			if($conn->query($query)===TRUE){
				echo $id[$i]." Berhasil diupdate";
			}else{
				echo " Entah kenapa gagal saya juga tidak tau";
			}
		}else{
			echo "Gagal : level hanya boleh free, advanced, atau super_advanced ";
		}
	}
?>