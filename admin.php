<!DOCTYPE html>
<html>
<head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <style type="text/css">

            table td {
                position: relative;
            }
            
            td input {
                position: absolute;
                display: block;
                top: 0;
                background-color: transparent;
                left: 0;
                margin: 0;
                height: 100%;
                width: 100%;
                border: none;
                padding: 10px;
                box-sizing: border-box;
            }
            #isi{
            width: 15vw;
            }
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
            .y{
                cursor: pointer;
            }

        </style>
        <title>Admin</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="gaya.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
        <link rel="icon" href="assets/baru/profile.png">
</head>
<body style="background-color: #f5f5f5">
    <nav class="navbar navbar-expand-lg navbar-light" style="position: fixed; z-index: 1; box-shadow: none; width: 100%; ">
            <a class="navbar-brand" href="#"  style="margin-top: 0.1vw;"><img src="assets/baru/profile.png" style="height: 2vw;"> Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Performance Monitor<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <a href="index.php" class="nav-item">
                    <img src="Assets/2931185 - door enter entrance exit leave logout out.svg" id="utama2" style="height: 1.4vw; ">
                    Logout
                </a>
            </div>
    </nav>
    <div id = "isi" style="display : none"></div>
    <div class="s">
        <div class="container" style="margin-top: 1.2vw;">
            <button style = "width : 12.3vw;" class="btn btn-dark">Performance Monitor</button>
        </div>
        <div class="container" style="margin-top: 1vw;">
            <button style = "width : 12.3vw;" class="btn btn-dark">Just some random buttons</button>
        </div>
        <div class="container" style="margin-top: 1vw;">
            <button id ="skuy" style = "width : 12.3vw;" class="btn btn-dark">Skuy</button>
        </div>
        <div class="container" style="margin-top: 1vw;">
            <input style = "width : 12.3vw;"type="submit" value="Save Changes" class="btn btn-primary" id="update">
        </div>
        <div class="container" style="margin-top: 1vw;">
            <button style = "width : 12.3vw;"type="submit" id="delete" class="btn btn-primary">Delete</button>
        </div>
    </div>
    <div></div>
    <div style="font-size: 2.5vw; padding-top: 8vw;" class="container-fluid bg-dark"><span style="padding-left: 15vw; color: white;">User's Level Chart</span></div>
    <canvas id="myChart" style="max-width: 77vw; margin-left: 18vw; padding-top: 3vw; min-height: 30vw;"></canvas>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            barThickness : 0.2,
            data: {
                labels: ['Free','Basic', 'Advanced', 'Super-Advanced'],
                datasets: [{
                    data: [],
                    label: 'Total User ',
                    backgroundColor: [
                        'rgba(255,255,255, 1)',
                        'rgba(26, 124, 199, 1)',
                        'rgba(222, 196, 144, 1)',
                        'rgba(255, 217, 0, 1)'
                    ],
                    borderColor: [
                        'rgba(0, 0, 0, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(222, 196, 144, 1)',
                        'rgba(255, 217, 0, 1)'

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <div style="font-size: 2.5vw; padding-top: 4vw; margin-top: 5vw;" class="container-fluid bg-dark"><span style="padding-left: 15vw; color: white;">User's Database</span></div>
    <table class="table table-bordered table-striped" style="width: 77vw; height: auto; margin-left: 18vw; margin-top: 5vw;background-color: white">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Level</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="diisi">
        <?php
                    require_once("config.php");
        $query = "select * from user";
        $resultnama = $conn->query($query);
            $index = 0;
            while($data = $resultnama->fetch_assoc()){
                $panjang =count($data["id"]);
                ?>  
                <tr id = "<?php echo $data["id"];?>">
                    <td>
                        <input type="text" id="<?php echo $index ?>_id" name="<?php echo $index ?>.id" value="<?php echo $data["id"]?>">
                    </td>   
                    <td>
                        <input type="text" id="<?php echo $index ?>_username" name="<?php echo $index ?>.username" value="<?php echo $data["username"]?>">
                    </td>
                    <td>
                        <input type="text" id="<?php echo $index ?>_email" name="<?php echo $index ?>.email" value="<?php echo $data["email"]?>">
                    </td>
                    <td>
                        <input type="text" id="<?php echo $index ?>_password" name="<?php echo $index ?>.password" value="<?php echo $data["password"]?>">
                    </td>
                    <td>
                        <input type="text" id="<?php echo $index ?>_level" name="<?php echo $index ?>.level" value="<?php echo $data["level"]?>">
                    </td>
                    <td>
                        <input style="width: 1.2vw; margin-left: 1vw;" type="checkbox" name = "delete" id="<?php echo $index ?>_del" value="<?php echo $data["id"]?>">
                    </td>
                </tr>
                <?php
                $index++;
                }
                ?>
                <input type="hidden" id="value" value="<?php echo $index?>">
        </tbody>
    </table>
     <div style="font-size: 2.5vw; padding-top: 4vw; margin-top: 5vw;" class="container-fluid bg-dark"><span style="padding-left: 15vw; color: white;">Chats :)</span></div>
        <div style="width: 77vw; height: 40vw; background-color: #4a4a4a;  margin-top: 5vw; margin-left: 18vw; margin-bottom: 10vw;">
            <div style="width: 15vw; height: 36vw; margin-left: 0.5vw; margin-top: 2vw; background-color: white; float: left;">
                <table class="table-bordered" >
                    <?php 
                    $query = "SELECT * FROM user";
                    $data = $conn->query($query);
                    while($row = $data->fetch_assoc()){
                    ?>
                    <tr>
                        <th id="isi"><a class="y" id="pesan_<?php echo $row["id"]?>"><?php echo $row["username"]?></a></th>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <div style="float: left; margin-top: 2vw; margin-left: 1vw; width: 60vw; height: 33vw; background-color: white; margin-bottom: 1vw; overflow-y: scroll;" id="chat">
                <table class="table" id="tbl">
                    <tr class="admin">
                <th> Saran   </th>
                <td>Tekan Untuk memulai</td>
            </tr>  
                </table>
            </div>
            <div>
                <input type="text" id = "teks" style="border-radius: 5px; width: 53vw; margin-left: 1vw; ">
                <button class="btn btn-primary btn-sm" id="button">Kirim</button>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                var sudahtekan = false;
                var data;
                function ambil(id1){
                    $.ajax({
                        type : 'POST',
                        url : 'awal.php',
                        data : {
                            id : id1
                        },
                        success:function(response){
                            $("#tbl").html(response);
                            var elem = document.getElementById('chat');
                            elem.scrollTop = elem.scrollHeight;
                        }
                    })
                }

                $("#teks").keyup(function(event) {
                    if (event.keyCode === 13) {
                        $("#button").click();
                    }
                });
                var identify ;
                <?php 
                $query = "SELECT * FROM user";
                $data = $conn->query($query);
                while($row = $data->fetch_assoc()){
                ?>
                    $("#pesan_<?php echo $row['id']?>").on('click', function() {
                        ambil(<?php echo $row['id']?>);
                        sudahtekan = true;
                        identify = "<?php echo $row["id"]?>";
                        $.ajax({
                            type : 'POST',
                            url : 'apdet.php',
                            data : {
                                id : identify
                            },
                            success:function(response){
                                data = response;
                            }
                        })
                    });                   
                <?php } ?>

                $("#button").click(function() {
                    if($("#teks").val() != null){
                        $.ajax({
                            type : 'POST',
                            url : 'isikan.php',
                            data : {
                                msg : $("#teks").val(),
                                id : identify,
                                nama : "admin"
                            },
                            success:function(response){
                                $("#teks").val(null);
                            }
                        })   
                    }
                })

                var bnyk = $("#value").val();
                var pass =[];
                var id = [];
                var email = [];
                var level = [];
                var user = [];
                $('#update').click(function() {
                    for(var i = 0; i<bnyk; i++){
                        id[i] = $("#"+i+"_id").val();
                        pass[i] = $("#"+i+"_password").val();
                        email[i] = $("#"+i+"_email").val();
                        user[i] = $("#"+i+"_username").val();
                        level[i] = $("#"+i+"_level").val();
                    }
                    var arrid = JSON.stringify(id);
                    var arruser = JSON.stringify(user);
                    var arrpass = JSON.stringify(pass);
                    var arremail = JSON.stringify(email);
                    var arrlevel = JSON.stringify(level);
                    $.ajax({
                        type: 'POST',
                        url: 'update.php',
                        data: {
                            id: arrid,
                            username: arruser,
                            password: arrpass,
                            email: arremail,
                            level: arrlevel
                        },
                        success:function(response) {
                            alert(response);
                        }
                    });
                });
                var bnyk = $("#value").val();
                var del = [];
                $('#delete').click(function() {
                    $.each($("input[name='delete']:checked"), function(){            
                        del.push($(this).val());
                    });
                    var arrdel = JSON.stringify(del);
                    $.ajax({
                        type: 'POST',
                        url: 'delete.php',
                        data: {
                            id: arrdel
                        },
                        success:function(response) {
                            alert(response);
                            for(var a = 0; a < del.length ; a++){
                                $("#"+del[a]).fadeTo("slow",0.7,function(){
                                    $(this).remove();
                                }); 
                            }
                        }
                    });
                }); 

                setInterval(function() {
                    $.ajax({
                        type : 'POST',
                        url : 'apdet.php',
                        data : {
                            id : identify
                        },
                        success:function(response){
                            if (data != response && sudahtekan){
                                $("#tbl").append(response);
                                var elem = document.getElementById('chat');
                                elem.scrollTop = elem.scrollHeight;
                                data = response;
                            }
                        }
                    })
                }, 500)

                setInterval(function() {
                    $("#isi").load("ambil.php");
                    var isinya = [];
                    var free = $("#free").html();
                    var basic = $("#basic").html();
                    var advanced = $("#advanced").html();
                    var super_advanced = $("#super_advanced").html();
                    isinya[0] = parseInt(free);
                    isinya[1] = parseInt(basic);
                    isinya[2] = parseInt(advanced);
                    isinya[3] = parseInt(super_advanced);
                    for(var i = 0; i < 4 ; i++){
                        myChart.data.datasets[0].data[i] = isinya[i];
                    }
                    myChart.update();
                }, 1500);

                
            });

        </script>
</body>
</html>