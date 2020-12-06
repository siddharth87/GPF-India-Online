<html>
<head>
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }

</style>
</head>
<body>
<h1>Forgot Password<h1>
<form action='#' method='post'>
<table cellspacing='5' align='center'>
<tr><td>Email id:</td><td><input type='text' name='email'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>
<?php
require_once "gconfig.php";
if(isset($_POST['submit']))
{ 
    
 $mail=$_POST['email'];
 $q = "SELECT * FROM admin  where email='".$mail."' ";
 $result = $link->query($q);
 if($result->num_rows > 0) 
 {
  $res=$result->fetch_assoc();
  $to=$res['email'];
  $subject='Remind password';
  $message='Your password : '.$res['password']; 
  $headers='From:ex@gmail.com';
  $m=mail($to,$subject,$message,$headers);
  if($m)
  {
    echo'Check your inbox in mail';
  }
  else
  {
   echo'mail is not send';
  }
 }
 else
 {
  echo'You entered mail id is not present';
 }
}
?>
</body>
</html>