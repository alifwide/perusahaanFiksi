<?php
require_once("config.php");
$gagal = "";
$username = "";
$pass = "";
session_start();
$ada = false;
if($_SERVER["REQUEST_METHOD"]=="POST"&&empty($_SESSION["username"])){
    if(empty($_session["username"])){
    $query = "SELECT * from admin";
    $username = $_POST["email"];
    $pass = $_POST["password"];
    $result = $conn->query($query);
    $log = false;
    while($data = $result->fetch_assoc()){
        $log =  $_POST["email"]==$data["email"] && $_POST['password']==$data["password"];
        if($log)break;
    }
    if($log){
        header("Location: admin.php");
    }else{
        $query = "SELECT * from user";
        $result = $conn->query($query);
        while($data = $result->fetch_assoc()){
            $log =  $_POST["email"] == $data["email"] || $_POST["email"] == $data["username"] && $_POST['password'] == $data["password"]; 
            if($log)break; 
        }
        if($log){
            $_SESSION["username"] = $_POST["email"];
            header("Location: home.php");
        }else{
            $gagal = "wrong password or email";
        }
    }
}else{
    $gagal = "you have logged in";
}
}
if(isset($_SESSION["username"])){
    $ada = true;
}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="icon" href="assets/baru/profile.png">
        <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="gaya.css">
        <title>Data.com</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light" class="navbar">
            <a class="navbar-brand" href="#"><img src="assets/baru/cover.png" id="utama" > </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cloud Hosting <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">VPS Hosting <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Performance</a>
                            <a class="dropdown-item" href="#">About</a>
                            <a class="dropdown-item" href="#">Support Us</a>
                        </div>
                    </li>
                </ul>
                <a <?php if(!$ada){echo "href=\"login.php\"";}else{echo "href=\"dashboard.php\"";} ?> id="ligin" style="text-decoration: none;">
                    <img src="Assets/2931147 - account avatar face head human profile user.svg" id="utama2">
                    <span class="nav-item" style="color: black; margin-right: 2vw;"><?php if($ada){echo $_SESSION["username"];}else{ echo "Login";} ?></span>
                </a>
                <?php if($ada){echo "<a href = \"login.php\"id=\"ligin\" style=\"text-decoration: none;\">
                <img src=\"Assets/2931185 - door enter entrance exit leave logout out.svg\" id=\"utama2\">
                    <span class=\"nav-item\" style=\"color: black;\">Logout</span>
                </a>";}?>
            </div>
        </nav>
        
        <div class="containerku">
            <img src="Assets/garis.png" style="float: right; width: 35vw;">
            <div class="main"><strong>Enjoy The <br> Fastest Cloud Hosting <br> For Free!</strong>
                <br>
                <p class="text">Our services are actually free,
                    <br> Trust your hosting on Data.com </p>
                <a href="#" class="btn btn-primary">Learn More</a>
                <a href="register.php" class="btn btn-outline-dark">Register</a></div>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 40vw;  float: right; margin-right: 10vw;">
                <ol class="carousel-indicators" style="margin-top: 20vw;">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" >
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="assets/database.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="assets/teamwork.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="assets/server.png" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
        <div class="free-info">
            <div class="free-text">
                <p class="text2" style="color: black; ">Why you should choose Data.com</p>
                Start your business with free version
                <br>
                <p class="text2">Small companies usually don't have a lot of money
                    <br> to get a great Cloud hosting service for their website.
                    <br> But not here, even the free version is 2X faster than other
                    <br> Cloud hosting services.
                    <br>
                    <br> You can upgrade to premium version to get
                    <br> better performance, and better control to your website.
                    <br>
                    <br> Data.com make sure everyone can get a great performance for their website
                    <br> for a great price.</p>
                <div style="border : solid 1px; width: 30vw; margin-top: 5vw;"></div>
            </div>
            <br>
            <div style="border : solid 1px; width: 30vw; margin-left: 5vw;"></div>
            <div style="margin-top: 4vw; width: 40vw; float: right; margin-right: 1vw;">
                <label for="specs" style="font-size: 2vw;">Server Specification</label>
                <table id="specs" class="table">
                    <tr>
                        <th>Main Processor</th>
                        <td>AMD EPYC™ 7742</td>
                    </tr>
                    <tr>
                        <th>Total Core</th>
                        <td>1024 (64 x 16) @2.2GHz</td>
                    </tr>
                    <tr>
                        <th>Total RAM</th>
                        <td>4TB ECC Memory</td>
                    </tr>
                    <tr>
                        <th>Total HDD Storage</th>
                        <td>20PB 7200RPM</td>
                    </tr>
                    <tr>
                        <th>Total SSD Storage</th>
                        <td>3PB NVME PCIe 4.0</td>
                    </tr>
                    <tr>
                        <th>AI Accelaration</th>
                        <td>Yes</td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="containerku">
            <div class="main2"><strong>Hungry For Performance? <br> Get Premium Version For <br> Only $5/mo!</strong>
                <br>
                <p class="text">Premium offers more and more performance
                    <br> Starts at $5/mo!</p>
            </div>
            <img src="Assets/database2.png" class="photo1">
            <img src="Assets/garis2.png" style="float: left; width: 52vw;">
        </div>
        <div class="premium-info">
            <div class="premium-text"> Want the best performance
                <br> for your website?
                <br> Upgrade now!
                <br>
                <p class="text">Subscribe to Data.com</p>
                <a href="register.php" class="btn btn-warning">Register</a></div>
            <img src="Assets/ill3.png" class="photo1" style="margin-top: 3.5vw; width: 28vw; margin-left: 27vw;">
        </div>
        <div class="buy">
            <a href="<?php if($ada){echo "beli.php";}else{echo "login.php";}?>" ><div class="premium-box" style=" margin-left: 6vw;">
                <div class="upper" style="background-color: white;"><span style="margin-left: 1.3vw; font-size: 1.4vw;">Free
                    <br></span>
                    <strong style="margin-left: 1.3vw;">$0.00</strong>
                    <span style="font-size: 1.4vw;">/month</span></div>
                <p style="margin-left: 1.4vw;  margin-top: 2vw; font-size:1.3vw ; ">&#10004; 2 TFlops Performance
                    <br>&#10004; 500MBps Bandwith
                    <br>&#10004; 500GB HDD
                    <br>&#10004; 0.5 Core (1.8GHz)</p>
            </div></a>
            <a href="<?php if($ada){echo "beli.php";}else{echo "login.php";}?>"><div class="premium-box" style=" margin-left: 3vw;">
                <div class="upper" style="background-color: #1a7cc7;">
                    <span style="margin-left: 1.3vw; font-size: 1.4vw;">Basic
                        <br>
                    </span>
                    <strong style="margin-left: 1.3vw;">$5.00</strong>
                    <span style="font-size: 1.4vw;">/month</span>
                </div>
                <p style="margin-left: 1.4vw;  margin-top: 2vw; font-size:1.3vw ; ">&#10004; 2X More performance
                    <br>&#10004; 2X Bandwith
                    <br>&#10004; 120GB SSD
                    <br>&#10004; 2 TB HDD
                    <br>&#10004; 2 Core (3.1GHz)
                </p>
            </div></a>
            <a href="<?php if($ada){echo "beli.php";}else{echo "login.php";}?>"><div class="premium-box" style="margin-left: 3vw;">
                <div class="upper" style="background-color: #dec490">
                    <span style="margin-left: 1.3vw; font-size: 1.4vw;">Advanced
                            <br>
                        </span>
                    <strong style="margin-left: 1.3vw;">$13.00</strong>
                    <span style="font-size: 1.4vw;">/month</span>
                </div>
                <p style="margin-left: 1.4vw;  margin-top: 2vw; font-size:1.3vw ; ">&#10004; 3X More performance
                    <br>&#10004; 3X Bandwith
                    <br>&#10004; 300GB SSD Capacity
                    <br>&#10004; 4 TB HDD
                    <br>&#10004; Free Data Recovery
                    <br>&#10004; 4 Core (6.2GHz)</p>
            </div></a>
            <a href="<?php if($ada){echo "beli.php";}else{echo "login.php";}?>"><div class="premium-box" style="margin-left: 3vw;">
                <div class="upper" style="background-color: gold;">
                    <span style="margin-left: 1.3vw; font-size: 1.4vw;">Super Advanced
                        <br>
                    </span>
                    <strong style="margin-left: 1.3vw;">$55.00</strong>
                    <span style="font-size: 1.4vw;">/month</span>
                </div>
                <p style="margin-left: 1.4vw;  margin-top: 2vw; font-size:1.3vw; ">&#10004; 6X More performance
                    <br>&#10004; 8X Bandwith
                    <br>&#10004; 1TB SSD Capacity
                    <br>&#10004; 12 TB HDD
                    <br>&#10004; Free Data Recovery
                    <br>&#10004; 11 Core (13.2GHz)
                    <br>&#10004; ChatBot</p>
            </div></a>
        </div>
        <div class="free-info" style="height: 57vw;">
            <div class="free-text">
                <p class="text2" style="color: black;">Have Any questions?</p>
                Contact Us
                <br>
                <p class="text2">Data.com Have 24-hour Customer service
                    <br> for fast response and great user experience
                    <br>we think customer service is very important.
                    <br>
                    <br>You can also ask about your hardware
                    <br>and get the report as soon as possible
                </p>
            </div>
            <img src="assets/customer service2.png" class="photo1" style="margin-top: 3vw; ">
        </div>
        <div style="border-top: solid 1px; border-bottom: solid 1px;">
            <div class="free-info" style="height : 4vw;background-color: #141414">
                <img src="assets/baru/cover2.png" style="width: 8vw; float: left; margin-top: 0.9vw; margin-left: 5vw;">
                <div style="float: right; margin-right: 4vw; margin-top: 0.4vw;">
                    <a href="#"><img id="sosmed" src="assets/3225179 - app logo media popular social whatsapp.svg" style="width:3vw; margin-left: 0.2vw;"></a>
                    <a href="#"><img id="sosmed" src="assets/3225180 - app logo media popular social youtube.svg" style="width:3vw; margin-left: 0.2vw;"></a>
                    <a href="#"><img id="sosmed" src="assets/3225181 - app logo media popular social vkontakte.svg" style="width:3vw; margin-left: 0.2vw;"></a>
                    <a href="#"><img id="sosmed" src="assets/3225192 - app googleplus logo media popular social.svg" style="width:3vw; margin-left: 0.2vw;"></a>
                    <a href="#"><img id="sosmed" src="assets/3225187 - app logo media popular reddit social.svg" style="width:3vw; margin-left: 0.2vw;"></a>
                </div>
            </div>
            <div class="free-info" style="height: 30vw; background-color:#2b2b2b; border-top: solid 1px;">
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
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" class="login" id="login" method="POST">
                    Login
                    <div class="form-group" style="margin-top: 2vw;">
                        <input type="text"  class="form-control" name="email" placeholder="Email or Username" value="<?php echo $username?>">
                    </div>
                    <div class="form-group" style="margin-top: 1.5vw;">
                        <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $pass?>">
                    </div>
                    <p style="color: red;">
                        <?php echo $gagal;?>
                    </p>
                    <input type="submit" value="Login" class="btn btn-warning">
                </form>
            </div>
            <center>
                <div style="background-color: white; margin-top: -2vw; width: 90vw; color: black; font-size: 1vw;">
                    2020 data.com-perusahaan fiksi oleh a.w.a
                </div>
            </center>

        </div>
    </body>

    </html>