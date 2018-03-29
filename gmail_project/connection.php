<?php
session_start();
define('SERVER','localhost');
define('USER','root');
define('PASS' ,'hestabit');
define('NAME', 'gmail');
class DB_con
{
 function __construct()
 {
   $con = mysqli_connect(SERVER,USER,PASS,NAME);
   $this->dbh=$con;
   // Check connection
   if (mysqli_connect_errno())
   {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
  }
 public function fetchdata()
 {
  $result=mysqli_query($this->dbh,"select * from inbox");
  return $result;
 }


 public function insert($from,$to,$subject,$message,$attachment){
 	$ret=mysqli_query($this->dbh,"insert into sent_mail(sender,reciver,subject,message,attachment) values('$from','$to','$subject','$message','$attachment')");
return $ret;
 }

 
 public function fetchdata_sent()
 {
  $result=mysqli_query($this->dbh,"select * from sent_mail");
  return $result;
 }
}
?>