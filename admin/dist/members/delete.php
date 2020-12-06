<?php
$servername = "localhost";
$password = "";

// Create connection
$db = mysqli_connect($servername,'root',$password,'id14825970_gpf');

$id = $_GET['id']; // get id through query string

$del = mysqli_query($db,"delete from Student where Group_ID = '$id'"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header("location:index.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}


?>