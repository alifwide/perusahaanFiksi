<?php
require_once("config.php");
$query = "SELECT * FROM user";
$result = $conn->query($query);
$free = 0;
$basic = 0;
$advanced = 0;
$super_advanced = 0;
while($data = $result->fetch_assoc()){

	if($data["level"]=="free"){
		$free++;
	}
	else if($data["level"]=="basic"){
		$basic++;
	}
	else if($data["level"]=="advanced"){
		$advanced++;
	}
	else if($data["level"]=="super_advanced"){
		$super_advanced++;
	}

}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<div id = "free"><?php echo $free ?></div>
	<div id = "basic"><?php echo $basic ?></div>
	<div id = "advanced"><?php echo $advanced ?></div>
	<div id = "super_advanced"><?php echo $super_advanced ?></div>
</body>
</html>
