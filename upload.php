<?php
error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {
    $name=$_POST["name"];
    $phone=$_POST["phone"];
    $designation=$_POST["designation"];
    $schedule=$_POST["schedule"];


	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./image/" . $filename;

	$db = mysqli_connect("localhost", "root", "", "cmc");

	// Get all the submitted data from the form
	$sql = "INSERT INTO doctor_upload (name,phone,designation,schedule,image) VALUES ('$name','$phone','$designation','$schedule','$filename')";

	// Execute query
	mysqli_query($db, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo "";
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Animated Login Form</title>
        <link rel="stylesheet" href="upload.css">
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
        <header>
            <div class="user-wrapper">
                <img src="Admin pannel/assets/image/profile.png" width="30px" height="30px" alt="">
                <div>
                    <h4>Hafiza Khatun</h4>
                    <small>super admin</small>
                </div>
            
            </div>
        </header>
        <section id="upload_container">
            <form action="" method="POST" enctype="multipart/form-data" >
                <input type="text" name="name" id="name" placeholder="Enter Doctor Name" >
                <input type="text" name="phone" id="phone"placeholder="Enter Doctor Phone Number" >
                <input type="text" name="designation" id="designation"placeholder="Enter Doctor designation" >
                <input type="text" name="schedule" id="schedule"placeholder="Enter Doctor schedule" >
                <input type="file" name="uploadfile" id="uploadfile" required  >
                <<button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
</form>
</section>
</body>
</html>