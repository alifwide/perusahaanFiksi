	<?php
	session_start();
	if(empty($_SESSION['id'])){
		header("Location: login.php");
	}
	require_once("config.php");
	$id = $_GET["yang"];
	if ($id == 1) {
		$harga = "$5";
		$lepel = "basic";
	}
	else if ($id == 2) {
		$harga = "$13";
		$lepel = "advanced";
	}
	else {
		$harga = "$55";
		$lepel = "super_advanced";
	}
	$query = "UPDATE user SET level = '".$lepel."' WHERE ID = ".$_SESSION['id']."";
	$data = $conn->query($query);
	$_SESSION['level'] = $lepel;
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<style type="text/css">
			body {
            background: url(assets/fluidy2.svg);
            background-repeat: no-repeat;
            background-size: 100vw;
        }
		</style>
		<title>Payment Confirmation | Data.com</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="gaya.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
        <link rel="icon" href="assets/baru/profile.png">
        
	</head>
	<body>
		<center>
			<div style="background-color : white;width: 43vw; height: 14vw; box-shadow: 1px 1px 5px; margin-top: 17vw; border-radius: 4px;">
				<div style="padding-top: 2vw;">
					<img src="assets/checklist.png" style="width: 3.5vw;">
					<p style="font-size: 2vw; padding-top: 0.5vw;">Payment Succesful</p>
					<p id = "waktu" style="font-size: 1.5vw; padding-top: 0.5vw;"></p>
				</div>
			</div>
		</center>
		<script type="text/javascript">
        	var waktu = 5;
        	$("#waktu").html(waktu);
        	setInterval(function() {
        		waktu--;
        		$("#waktu").html(waktu);
        		if(waktu == 0){
        			window.location.href="dashboard.php"; 
        		}
        	},1000)
        </script>
	</body>
	</html>