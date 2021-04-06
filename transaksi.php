	<?php
	session_start();
	if(empty($_SESSION['id'])){
		header("Location: login.php");
	}
	require_once("config.php");
	$id = $_GET["yang"];
	if ($id == 1) {
		$harga = "$5";
		$lepel = "Basic";
	}
	else if ($id == 2) {
		$harga = "$13";
		$lepel = "Advanced";
	}
	else {
		$harga = "$55";
		$lepel = "Super Advanced";
	}
	$query = "SELECT * FROM user WHERE id = ".$_SESSION['id']."";
	$data = $conn->query($query);
	$username;
	$email;
	while($row = $data->fetch_assoc()){
		$username = $row["username"];
		$email = $row["email"];
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<style type="text/css">
			body {
            background: url(assets/fluidy2.jpg);
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
	<body style="background-color: #f5f5f5;">
		<center>
			<div style="background-color : white;width: 43vw; height: 40vw; box-shadow: 1px 1px 10px; margin-top: 5vw; border-radius: 4px;">
				<p style="font-size : 2.5vw; padding-top: 3vw;">Payment Confirmation</p>
				<p style="padding-top: 1vw;">
					<table class="table" style="width: 20vw;">
						<tr>
							<th>Username : </th>
							<td><?php echo $_SESSION['username']?></td>
						</tr>
						<tr>
							<th>Email : </th>
							<td><?php echo $_SESSION['email']?></td>
						</tr>
						<tr>
							<th>Level : </th>
							<td><?php echo $_SESSION['level']?></td>
						</tr>
						<tr>
							<th>Upgrade to : </th>
							<td><?php echo $lepel?></td>
						</tr>
						<tr>
							<th>Price : </th>
							<td><?php echo $harga?></td>
						</tr>
					</table>
					<a class="btn btn-warning" href="upgrade.php?yang=<?php echo $_GET['yang']?>" style="margin-top: 1vw;">Upgrade Now!</a>
					<a class="btn btn-danger" href="dashboard.php" style="margin-top: 1vw;">Cancel</a>
				</p>
			</div>
		</center>
	</body>
	</html>