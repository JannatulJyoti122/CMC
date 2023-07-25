<?php
    $_servername="localhost";
    $username="root";
    $password="";
    $db_name="cmc";
    $conn=new mysqli($_servername,$username,$password,$db_name,3306);
    if($conn->connect_error){
        die("connection failed".$cond->connect_error);
    }
    echo "conncetion successfullll";
?>



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




if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $phone=$_POST["phone"];
    $designation=$_POST["designation"];
    $schedule=$_POST["schedule"];
    
    $upload_dir = "upload/";
    $prodect_image=$upload_dir.$_FILES["imageUpload"]["name"];
    $product_image = $upload_dir.$_FILES["imageUpload"]["name"];
    $upload_dir.$_FILES["imageUpload"]["name"];
    $upload_file = $upload_dir.basename($_FILES["imageUpload"]["name"]);
    $imageType =strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));
    $check = $_FILES["imageUpload"]["size"];
    $upload_ok = 0;
    

    if(file_exists($upload_file)){
        echo "<script>alert('The file already exists')</script>";
        $upload_ok = 0;
    }
    else{
        $upload_ok = 1;
        if($check !== false){
          $upload_ok = 1;
          if($imageType =='jpg' || $imageType =='png' || $imageType =='jpeg' || $imageType =='gif'){
            $upload_ok = 1;
          }
          else{
            echo '<script>alert("Please change the image format")</script>';
          }
        }
        else{
           echo '<script>alert("The photo size is 0 please change the photo")</script>';
           $upload_ok = 0;
        }
    }
    if($upload_ok == 0){
        echo '<script>alert("sorry your file not uploaded.please try again")</script>';
    }
    else{
        $sql="insert into doctor_upload (name,phone,designation,schedule,image)
        values('$name','$phone','$designation','$schedule','$product_image')";
        if($conn->query($sql) === TRUE){
            echo "<script>alert('Product uploaded successfully')</script>";
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Animated Login Form</title>
        <link rel="stylesheet" href="upload.css">
        <script src="https://kit.fontawesome.com/c0adbb8084.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <section id="upload_container">
            <form action="upload.php" method="POST" enctype="multipart/form-data" >
                <input type="text" name="name" id="name" placeholder="Enter Doctor Name" >
                <input type="text" name="phone" id="phone"placeholder="Enter Doctor Phone Number" >
                <input type="text" name="designation" id="designation"placeholder="Enter Doctor designation" >
                <input type="text" name="schedule" id="schedule"placeholder="Enter Doctor schedule" >
                <input type="file" name="imageUpload" id="imageUpload" required  hidden>
                <button id="choose" onclick="upload()">Choose Image</button>
                <input type="submit" value="Upload" name="submit">
</form>
</section>
<script>
            var name = document.getElementById("name");
            var phone = document.getElementById("phone");
            var designation=document.getElementById("designation");
            var schedule=document.getElementById("schedule");
            var choose=document.getElementById("choose");
            var uploadImage = document.getElementById("imageUpload");


            function upload(){
                uploadImage.click();
            }
uploadImage.addEventListener("change",function(){
    var file = this.files[0];
    if(name.value == ""){
        name.value = file.name;
    }
    choose.innerHTML = "You acn change("+file.name+")picture";
})
</script>
</body>
</html>