<!doctype html>
<head>
    <title>
        Blood Bank Admin
    </title>
    <style>

    body {
           
           background-image: url("RedBloodCells3.jpg");
           height: 500px; /* You must set a specified height */
background-position: center; /* Center the image */
    background-attachment: fixed;
background-repeat: no-repeat; /* Do not repeat the image */
background-size: cover; /* Resize the background image to cover the entire container */
   
    }
    div.transbox {
  margin: 10px;
  background-color: #ffffff;
  border: 1px solid black;
  opacity: 0.6;
  filter: alpha(opacity=60); /* For IE8 and earlier */
}
div.transbox1 {
  margin: 30px;
  background-color: #ffffff;
  border: 1px solid black;
  opacity: 0.6;
  filter: alpha(opacity=60); /* For IE8 and earlier */
}
div.head{
    font-weight: bold;
  color: #000000;text-align:center;
  font-size:60px; 
}
td{
    width:350px;
    font-size:30px;
    text-align:center;
}
    </style>
    </head>
<body >
 <div class="transbox">
        <a href="home.html"><img width="50px" height="50px" src="home.jpg"></a>
        <a href="admin.html"><img width="50px" height="50px" src="admin.png"></a>
 <center><div class="head">BLOOD BANK</div> </center><br><br>
</div>
<div class="transbox1">

 <?php
$userID=$_POST['username'];
$password=$_POST['password'];
session_start();
$_SESSION['userID']=$userID;
if(!empty($userID)&&!empty($password))
{
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="bloodbank";
    $dbconn =mysqli_connect($host,$dbusername,$dbpassword,$dbname);
    $result=mysqli_query($dbconn,"SELECT password FROM incharge WHERE username= '".$userID."'");
    while($row=mysqli_fetch_assoc($result))
    {
        $confirm=$row['password'];           
    }
    if($password!=$confirm)
    {
        echo "<center><table><tr><td>Password doesn't match</td></tr></table></center>";
    }
    else 
    {
        echo "<h2><center>Logged in successfully</center></h2><br><br><h2><center>Choose which list you want to update</h2></center>";
        echo '<center><table><tr>';
        echo '<td><a href="donations.html"><b>DONATION</b></p></a></td>';
        echo '<td><a href="recipientlist.html"><b>RECIPIENTS</b></p></a></td>';
        echo '</tr></table></center>';
    }
    
}
else 
{
    //<p style= "border:3px;border-style:solid;border-color:#FFFFFF:padding:1em;>
    echo "<center><table><tr><td>Enter an userID and password to login</td></tr></table></center> ";
}
?>
  </div>
  </html>
 