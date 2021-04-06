<?php
require_once("config.php");
session_start();
if(empty($_SESSION["id"])){
    header("Location: login.php");
}
?>
    <!DOCTYPE html>
    <html>

    <head>
        <style type="text/css">
            .admin{
                background-color: #ededed;
            }
            .admin th{
                width: 9vw;
            }
            .user{
                background-color: white;
            }
            .user th{
                width: 9vw;
            }
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="icon" href="assets/baru/profile.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="gaya.css">
        <title>Data.com</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Task', 'GB'],
                    ['Free Space', 98],
                    ['Used Space', 2]
                ]);

                var options = {
                    title: 'Storage Capacity (100GB)'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
        </script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['bar']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Year', 'Sales', 'Expenses', 'Profit'],
                    ['2014', 1000, 400, 200],
                    ['2015', 1170, 460, 250],
                    ['2016', 660, 1120, 300],
                    ['2017', 1030, 540, 350]
                ]);

                var options = {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light" style="position: relative; z-index: 1">
            <a class="navbar-brand" href="#" style="margin-top: 0.1vw;"><img src="assets/baru/profile.png" style="height: 2vw;"> Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Performance Monitor<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <a href="index.php" class="nav-item">
                    <img src="Assets/2931185 - door enter entrance exit leave logout out.svg" id="utama2" style="height: 1.4vw; ">Logout
                </a>
            </div>
        </nav>
        <div style="margin-top: 5vw; margin-left: 5vw;">
            <div style="width: 40vw; height: 23vw; float: left; box-shadow: 1px 1px 10px; border-radius: 4px;">
                <p style="padding: 2vw;"><b style=" font-size: 3vw">
                <img src="Assets/2931147 - account avatar face head human profile user.svg" id="utama3"><?php echo $_SESSION["username"]?><br></b>Welcome to your ugly useless dashboard</p>
                <ul>
                    <li>Password : <?php echo $_SESSION["password"]?></li>
                    <li>id : <?php echo $_SESSION["id"]?></li>
                    <li>Level : <?php echo $_SESSION["level"]; 
                        if($_SESSION["level"]!="super_advanced"){echo "<a href = 'beli.php' class='btn btn-warning btn-sm' style = 'margin-left : 1vw;'>Upgrade Now!</a>";}?>
                    </li>
                </ul>
            </div>
            <div id="piechart" style="float: left; height: 25vw; width: 40vw; margin-left: 10vw;"></div>
        </div>
        <div style="width: 90vw; height: 40vw; background-color: #4a4a4a; margin-left: 5vw; margin-top: 40vw;">
            <div style="float: left; margin-top: 2vw; margin-left: 2vw; width: 22vw; height: 36vw; color: white;"><h2 style="margin-top: 2vw;">Any Questions?</h2><h6>Ask Now!</h6></div>
            <div style="float: left; margin-top: 2vw; width: 64vw; height: 33vw; background-color: white; margin-bottom: 1vw; overflow-y: scroll;" id="chat">
                <table class="table" id="tbl">
                </table>
            </div>
            <div>
                <input type="text" id = "teks" style="border-radius: 5px; width: 57vw;">
                <button class="btn btn-primary btn-sm" id="button">Kirim</button>
            </div>
        </div>
        <div id="columnchart_material" style="width: 90vw; margin-top: 5vw; height: 40vw; margin-left: 5vw;"></div>
        <script type="text/javascript">
            $(document).ready(function(){
                $.ajax({
                    type : 'POST',
                    url : 'awal.php',
                    data : {
                        id : <?php echo "".$_SESSION["id"]."";?>
                    },
                    success:function(response){
                        $("#tbl").html(response);
                        var elem = document.getElementById('chat');
                        elem.scrollTop = elem.scrollHeight;
                    }
                })


                $("#teks").keyup(function(event) {
                    if (event.keyCode === 13) {
                        $("#button").click();
                    }
                });

                $("#button").click(function() {
                    if($("#teks").val() != null){
                        $.ajax({
                            type : 'POST',
                            url : 'isikan.php',
                            data : {
                                msg : $("#teks").val(),
                                id : <?php echo "".$_SESSION["id"]."";?>,
                                nama : <?php echo "'".$_SESSION["username"]."'"?>
                            },
                            success:function(response){
                                $("#teks").val(null);
                            }
                        })   
                    }
                })

                var data = "";
                var sudahsekali = false;
                $.ajax({
                    type : 'POST',
                    url : 'apdet.php',
                    data : {
                        id : <?php echo "".$_SESSION["id"]."";?>
                    },
                    success:function(response){
                        data = response;
                    }
                })

                setInterval(function() {
                    $.ajax({
                        type : 'POST',
                        url : 'apdet.php',
                        data : {
                            id : <?php echo "".$_SESSION["id"]."";?>
                        },
                        success:function(response){
                            if (data != response){
                                $("#tbl").append(response);
                                var elem = document.getElementById('chat');
                                elem.scrollTop = elem.scrollHeight;
                                data = response;
                            }
                        }
                    })
                }, 500)
            })
        </script>
    </body>
    </html>