

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
    $sql="select * from doctor_upload";
    $all_doctor=$conn->query($sql);
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="admin_doctor.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    
    </head>
    <body>
        <div class="sidebar">
            <div class="sidebar-brand">
                <h2><span class="lab la-accusoft"></span>CUET MEDICAL CENTRE</h2>
            </div>
            <div class="sidebar-menu">
                <ul>
                    
                    <li><a href="index.php"><span class="las la-igloo"></span>
                        <span>back</span></a>
                    

                </ul>
            </div>
        </div>
        <div class="main-content">
            <header>
                <div class="user-wrapper">
                    <img src="Admin pannel/assets/image/profile.png" width="30px" height="30px" alt="">
                    <div>
                        <h4>Hafiza Khatun</h4>
                        <small>super admin</small>
                    </div>
                
                </div>
            </header>
            <main>
                <?php
                    while($row=mysqli_fetch_assoc($all_doctor)){
                
                
                ?>
                <div class="card">
                    <div class ="image">
                        <img src="./image/<?php echo $row['image']; ?>" alt="">
                    </div>
                    <div calss ="caption">
                        <p class="Name">Name:<?php echo $row["name"];?></p>
                        <p class="Name">phone:<?php echo $row["phone"];?></p>
                        <p class="Name">designation:<?php echo $row["designation"];?></p>
                        <p class="Name">schedule:<?php echo $row["schedule"];?></p>
                        <button class="edit">edit</button>
                        <button class="delete">delete</button>
                    </div>
                </div>
                <?php } ?>
            </main>
        </div>
    </body>
</html>