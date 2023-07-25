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
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>Animated Login Form</title>
        <link rel="stylesheet" href="login_style.css">
        
    </head>

    <body>
   
       <div class="center">

       
       


            <h1>Login</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>"name="form" method="POST">

                <div class="text_field">
                    
                    <input type="text" id="id" class="form-control"name="id" >
                    <label>ID</label>
                </div>


                <div class="text_field">
                   <span class="icon"><ion-icon name="lock-closed"name="Password"></ion-icon></span>
                   <input type="password" id="password" class="form-control"name="password" >
                   <label>Password</label>
                </div>


               <input type="submit" id="btn"value="login" name="login">

            </form>




            
        <?php
   

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $id=$_POST['id'];
            $password=$_POST['password'];
            $sql="select * from adminlogin where id='$id' and pass='$password'";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $count=mysqli_num_rows($result);

                    if($count==1){
                        header("Location:index.php");
                    }
                    else{
                        echo '<script>
                              window.location.href="login_p.php";
                              alert("Login failed.Invalid email or password!!")
                              </script>';
                              
                    }
        }



        ?>
           
        </div>
    </body>
</html>
