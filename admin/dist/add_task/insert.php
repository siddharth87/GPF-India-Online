<?php

require $_SERVER['DOCUMENT_ROOT'] . "/GPF_student_admin/.env.php";
error_reporting(0);

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', DB_SERVER);
define('DB_USERNAME', DB_USERNAME);
define('DB_PASSWORD', DB_PASSWORD);
define('DB_NAME', 'id14825970_gpf');


/* Attempt to connect to MySQL database */

if(isset($_POST['submit']))
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
{
    if(isset($_POST['file']))
    {
    $file=$_FILES['file'];
    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];
    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));
    
    $allowed=array('pdf','doc','txt','jpg','png');
    
    if(in_array($fileActualExt,$allowed)){
        if($fileError===0){
            if($fileSize<22636464){
                $filenameNew=uniqid('',true).".".$fileActualExt;
                $fileDestination='attachments/'.$filenameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                 header("Location:index.php?uploadsuccess");
                
            }else{
                echo"Your file is too big";
            }
        }else{
            echo"We encountered an error in uploading your file";
        }
    }else{
        echo"You can't upload files of this type";
    }
    }
$title=$_POST['title'];
$day_s=$_POST['start_day'];
$time_s=$_POST['start_time'];
$day_e=$_POST['end_day'];
$time_e=$_POST['end_time'];
$location=$_POST['location'];
$task_info=$_POST['task_info'];
$sql = "INSERT INTO task (Task_title,Date_started,Time_started,Date_ended,Time_ended,Task_location,Task_info,Task_attachment) VALUES ('$title','$day_s','$time_s','$day_e','$time_e','$location','$task_info','$filenameNew')";
    header("Location:index.php?success");
mysqli_query($link, $sql);

mysqli_close($link);
}


?>
