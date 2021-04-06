	<?php
	session_start();
	if(empty($_SESSION["id"])){
		header("Location: login.php");
	}
	require_once("config.php");
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>More Power | Data.com</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="gaya.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
        <link rel="icon" href="assets/baru/profile.png">
	</head>
	<body>
            <img src="Assets/garis.png" style="float: right; width: 35vw;">
		<div style="background-color: black; width: 100%; height: 37vw;">
			<center style = "padding-top: 10vw; color: white; font-size: 3vw;">Need More Than just Free?</center>
			<center style = "padding-top: 1vw; color: white; font-size: 2vw;">You're in the right place!<br>
				<button class="btn btn-outline-warning" style="margin-top: 3vw;">Learn more about our specs</button></center>
			<img src="Assets/server2.webp" style="float: left; width: 20vw; margin-top: -14vw; margin-left: 5vw;">
		</div>
		<div class="buy">
            <a href="transaksi.php?yang=1"><div class="premium-box" style=" margin-left: 16.5vw; height: 36vw;">
                <div class="upper" style="background-color: #1a7cc7;">
                    <span style="margin-left: 1.3vw; font-size: 1.4vw;">Basic
                        <br>
                    </span>
                    <strong style="margin-left: 1.3vw;">$5.00</strong>
                    <span style="font-size: 1.4vw;">/month</span>
                </div>
                <p style="margin-left: 1.4vw;  margin-top: 2vw; font-size:1.3vw; height : 15vw; ">&#10004; 2X More performance
                    <br>&#10004; 2X Bandwith
                    <br>&#10004; 120GB SSD
                    <br>&#10004; 2 TB HDD
                    <br>&#10004; 2 Core (3.1GHz)
                    <center>
                    <br><button class="btn btn-dark">Get it Now!</button></center>
                </p>
            </div></a>
            <a href="transaksi.php?yang=2"><div class="premium-box" style="margin-left: 3vw; height: 36vw;">
                <div class="upper" style="background-color: #dec490">
                    <span style="margin-left: 1.3vw; font-size: 1.4vw;">Advanced
                            <br>
                        </span>
                    <strong style="margin-left: 1.3vw;">$13.00</strong>
                    <span style="font-size: 1.4vw;">/month</span>
                </div>
                <p style="margin-left: 1.4vw;  margin-top: 2vw; font-size:1.3vw; height : 15vw; ">&#10004; 3X More performance
                    <br>&#10004; 3X Bandwith
                    <br>&#10004; 300GB SSD Capacity
                    <br>&#10004; 4 TB HDD
                    <br>&#10004; Free Data Recovery
                    <br>&#10004; 4 Core (6.2GHz)<center>
                    <br><button class="btn btn-dark">Get it Now!</button></center></p>
            </div></a>
            <a href="transaksi.php?yang=3"><div class="premium-box" style="margin-left: 3vw; height: 36vw;">
                <div class="upper" style="background-color: gold;">
                    <span style="margin-left: 1.3vw; font-size: 1.4vw;">Super Advanced
                        <br>
                    </span>
                    <strong style="margin-left: 1.3vw;">$55.00</strong>
                    <span style="font-size: 1.4vw;">/month</span>
                </div>
                <p style="margin-left: 1.4vw;  margin-top: 2vw; font-size:1.3vw; height : 15vw; ">&#10004; 6X More performance
                    <br>&#10004; 8X Bandwith
                    <br>&#10004; 1TB SSD Capacity
                    <br>&#10004; 12 TB HDD
                    <br>&#10004; Free Data Recovery
                    <br>&#10004; 11 Core (13.2GHz)<center>
                    <br><button class="btn btn-dark">Get it Now!</button></center></p>
            </div></a>
        </div>
        <div style="width: 100%; height: 50vw;">
        	<div class="free-text" style="text-align: center; float: none ;margin-top :36vw; margin-left: 0vw; ;">
                <p class="text2" style="color: black; ">Why you should choose Data.com</p>
                Enjoy the world's fastest cloud hosting server
                <br>
                <p class="text2">
                    <br> Premium account on data.com is just an upgrade
                    <br> if you don't think you need more performance,
                    <br> you still can use your free account.
                    <br>
                    <br> You can upgrade to premium version to get
                    <br> better performance, and better control to your website.
                    <br>
                    <br> Data.com make sure everyone can get a great performance for their website
                    <br> for a great price.</p>
            </div>
        </div>
        <div style="border-top: solid 1px; border-bottom: solid 1px; margin-top: -10vw;">
            <div class="free-info" style="height : 4vw;background-color: #141414">
                <img src="assets/baru/cover2.png" style="width: 8vw; float: left; margin-top: 0.9vw; margin-left: 5vw;">
                <div style="float: right; margin-right: 5vw; margin-top: 0.4vw;">
                    <a href = "#"><img id = "sosmed" src="assets/3225179 - app logo media popular social whatsapp.svg" style="width:3vw; margin-left: 0.2vw;"></a>
                    <a href = "#"><img id = "sosmed" src="assets/3225180 - app logo media popular social youtube.svg" style="width:3vw; margin-left: 0.2vw;"></a>
                    <a href = "#"><img id = "sosmed" src="assets/3225181 - app logo media popular social vkontakte.svg" style="width:3vw; margin-left: 0.2vw;"></a>
                    <a href = "#"><img id = "sosmed" src="assets/3225192 - app googleplus logo media popular social.svg" style="width:3vw; margin-left: 0.2vw;"></a>
                    <a href = "#"><img id = "sosmed" src="assets/3225187 - app logo media popular reddit social.svg" style="width:3vw; margin-left: 0.2vw;"></a>
                </div>
            </div>
                    <div class="free-info" style="height: 30vw; background-color:#2b2b2b; border-top: solid 1px; ">
                <div style="margin-left: 5vw; color: gold; font-size: 1.4vw; margin-top: 3vw; float: left; font-size: 1.3vw;">
                    Partners
                    <table style="margin-top: 1vw; margin-left: -0.6vw; width: 20vw; border : none;">
                        <tr>
                            <td><img src="assets/gigabyte.png" style="height: 1.2vw;"></td>
                            <td><img src="assets/amd.png" style="height: 2.2vw; "></td>
                            <td><img src="assets/intel.png" style="height: 3vw;"></td>
                        </tr>
                        <tr>
                            <td><img src="assets/msi.png" style="height: 1.9vw;"></td>
                            <td><img src="assets/microsoft.png" style="height: 3vw;"></td>
                            <td><img src="assets/WD.png" style="height: 3vw;"></td>
                        </tr>
                        <tr>
                            <td><img src="assets/nvidia.png" style="height: 3vw;"></td>
                            <td><img src="assets/samsung.png" style="height: 3vw; "></td>
                            <td><img src="assets/IBM.png" style="height: 3vw;"></td>
                        </tr>
                    </table>
                </div>
                <div style="margin-left: 5vw; color: gold; font-size: 1.4vw; margin-top: 3vw; float: left; font-size: 1.3vw;">
                    Links
                    <p style="font-size: 1vw; color : white; line-height: 3.5vw;">
                        <a href="#" class="a">Bio<br></a>
                        <a href="#" class="a">About us<br></a>
                        <a href="#" class="a">Team Dev<br></a>
                        <a href="#" class="a">Support Us</a>
                    </p>
                </div>
                <div style="margin-left: 5vw; color: gold; font-size: 1.4vw; margin-top: 3vw; float: left; font-size: 1.3vw;">
                    Support Us
                    <p style="font-size: 1vw; color : white; line-height: 3.5vw;">
                        <a href="#" class="a">Merchandise<br></a>
                        <a href="#" class="a">Patreon<br></a>
                        <a href="#" class="a">Youtube Channel<br></a>
                    </p>
                </div>

            </div>
            <center>
                <div style="background-color: white; margin-top: -2vw; width: 90vw; color: black; font-size: 1vw;">
                    2020 data.com-perusahaan fiksi oleh a.w.a
                </div>
            </center>
	</body>
	</html>