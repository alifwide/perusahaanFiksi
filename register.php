<?php
require_once("config.php");
$username = "";
$email = "";
$password = "";
$gagal = "";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $query = "SELECT * FROM user";
    $result = $conn->query($query);
    $isi = true;
    while($data = $result->fetch_assoc()){
        if($username==$data["username"]||$email==$data["email"]){
            $isi = false;
            break;
        }
    }
    if($isi){
        $query = "SELECT id FROM pesanpesan ORDER BY id desc LIMIT 1";
        $isi = $conn->query($query);
        $a = 0;
        while($data = $isi->fetch_assoc()){
            $a = (int)$data["id"];
        }
        $a++;
        echo $a;
        $query = "INSERT INTO pesanpesan VALUES (".$a.")";
        $conn->query($query);
        $query = "INSERT INTO  user (username,email,password,level) values ('".$_POST["username"]."','".$_POST["email"]."','".$_POST["password"]."','free')";
        $conn->query($query);
        $query = "CREATE TABLE pesan_".$a." (nama text, msg text, tgl datetime default current_timestamp)";
        $conn->query($query);
        header("Location: login.php");
    }else{
        $gagal = "username or email taken";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="gaya.css">
    <title>Data.com</title>
    <link rel="icon" href="assets/baru/profile.png">
    <style type="text/css">
        body {
            background: url(assets/fluidy2.svg);
            background-repeat: no-repeat;
            background-size: 100vw;
        }
    </style>
</head>

<body>
    <center>
        <div class="free-info" style="width: 75vw; height: 40vw; margin-top: 3vw; background-color: white; border-radius: 10px; box-shadow: 1px 1px 40px grey;">
            <div>
                <img src="assets/welcome.png" style="width: 40vw; float: left; margin-top: 5vw; margin-left: 3vw;">
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" style = "width: 23vw; float: right; height: 75vw; margin-top: 1vw; margin-right: 4vw;">
                <p class="main2" style="width: 100%;padding-left: 4vw; font-size: 2vw; margin-top: 4vw;">Sign Up</p>
                <div class="form-group" style="margin-top: 2vw;">
                    <img src="assets/mail.svg" class="icon">
                    <input type="text" class="form-control" name="email" placeholder="Email" value = "<?php echo $email?>" style="width: 20vw;">
                </div>
                <div class="form-group" style="margin-top: 1.5vw;">
                    <img src="assets/account.svg" class="icon">
                    <input type="text" class="form-control" name="username" placeholder="Username" style="width: 20vw;">
                </div>
                <div class="form-group" style="margin-top: 1.5vw;">
                    <img src="assets/2931164 - clef key lock password privacy private unlock.svg" class="icon">
                    <input type="password" class="form-control" name="password" placeholder="Password" value = "<?php echo $password?>" style="width: 20vw;">
                </div>
                <div class="form-group" style="margin-top: 1.5vw;">
                </div>
                <p style="color: red;">
                </p>
                <div style="text-align: left">
                    <p style="color : red;"><?php echo $gagal?></p>
                <input type="submit" value="Register" class="btn btn-primary btn-sm" style="margin-top: -1vw;">
                <a href = "login.php"  class="btn btn-danger btn-sm" style="margin-top: -1vw;">Login Instead</a>
                <a href = "index.php"  class="btn btn-warning btn-sm" style="margin-top: -1vw;">Home</a>
                </div>
                <div style="float: left; margin-right: 3.2vw; margin-top: 2vw;">
                    <p class="text" style="font-size: 1.2vw; float: left; margin-top: 0.5vw;">Or Register With</p>
                    <a href = "#"><img id = "sosmed" src="assets/3225181 - app logo media popular social vkontakte.svg" style="width:3vw; margin-left: 0.8vw;"></a>
                    <a href = "#"><img id = "sosmed" src="assets/3225192 - app googleplus logo media popular social.svg" style="width:3vw; margin-left: 0.2vw;"></a>
                    <a href = "#"><img id = "sosmed" src="assets/3225194 - app facebook logo media popular social.svg" style="width:3vw; margin-left: 0.2vw;"></a>
                </div>
            </form>
        </div>
    </center>
    <div style="border-top: solid 1px; border-bottom: solid 1px; margin-top: 4vw;">
            <div class="free-info" style="height : 4vw;background-color: #141414">
                <img src="assets/baru/cover2.png" style="width: 8vw; float: left; margin-top: 0.9vw; margin-left: 5vw;">
                <div style="float: right; margin-right: -35vw; margin-top: 0.4vw;">
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
        </div>
</body>

</html>