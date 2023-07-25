<?php
    $_servername="localhost";
    $username="root";
    $password="";
    $db_name="cmc";
    $conn=new mysqli($_servername,$username,$password,$db_name,3306);
    if($conn->connect_error){
        die("connection failed".$cond->connect_error);
    }
    echo "";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="index_style.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    
    </head>
    <body>
        <div class="sidebar">






            <div class="sidebar-brand">
                <h2><span class="lab la-accusoft"></span>CUET MEDICAL CENTRE</h2>
            </div>
            <div class="sidebar-menu">
                <ul>
                    
                    <li><a href="admin_reg.html"><span class="las la-igloo"></span>
                        <span>Register User</span></a>
                    </li>
                    <li><a href="admin_id.html"><span class="las la-igloo"></span>
                        <span>Update Prescribtion</span></a>
                    </li>
                    <li><a href=""><span class="las la-igloo"></span>
                        <span>Logout</span></a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-content">
            <header>
                <div class="user-wrapper">

                   <?php 
                       $sel="select * from adminlogin";
                       $query=mysqli_query($conn,$sel);
                       $result=mysqli_fetch_assoc($query);
                   ?>
                    <img src="Admin pannel/assets/image/profile.png" width="30px" height="30px" alt="">
                    <div>
                        <h4><?php echo $result['name'];?></h4>
                        <small>super admin</small>
                    </div>
                
                </div>
            </header>
            <main>
                <div class="cards">
                    <div class="card-single">
                        <div>
                            <span>Doctor Roster</span>
                        </div>
                        <div>
                            <span class="las la-users1"></span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <span>Ambulance</span>
                        </div>
                        <div>
                            <span class="las la-users2"></span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            
                        </div>
                        <div>
                            <span class="las_la_users3">Medicine info</span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <span>Services</span>
                        </div>
                        <div>
                            <span class="las la-users4"></span>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>