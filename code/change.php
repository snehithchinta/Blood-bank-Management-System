<!doctype html>
<head>
    <title>
        Blood Bank
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
  margin: 20px;
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

.tabs
{
    font-weight: bold;
    padding: "30px";
}

div.transbox h1 {
  margin: 5%;
  font-weight: bold;
  color: #000000;text-align:center;
  font-size:60px; 
}
td{
    width:350px;
    font-size:30px;
    text-align:center;
}
p.heading{
    font-weight: bold;
    font-family:"Garamond";
    font-size: 25px;
    padding: 2px 2px 2px 50px;
}  
p.side{
    font-weight: bold;
    font-family:"Garamond";
    font-size: 33px;
    padding: 2px 2px 2px 50px ;
}
p.text{
    font-family:"Candara";
    line-height: 1.8;
    font-size: 20px;
    padding: 0px 2px 2px 50px ;
}
 </style>
</head>
<body >
 <div class="transbox">
 <a href="home.html"><img width="50px" height="50px" src="home.jpg"></a>
 <a href="admin.html"><img width="50px" height="50px" src="admin.png"></a>
 <h1>BLOOD BANK</h1>
  </div>
  <div class="transbox1"> 
<table border="3px">
            <tr>
             <td > <a href="donate.html">Donate</a></td>
                   <td ><a href="request.html">Request</a></td>
                   <td ><b> Edit Profile</b></td>
                   <td > <a href="previous.php">Activities</a></td>
       </tr> </table>

<?php session_start();
$email=$_SESSION['email'];
$weight=$_POST['Weight'];
$phone=$_POST['phone'];
$street=$_POST['street'];
$city=$_POST['city'];
$password=$_POST['password'];
if(empty($email)&&empty($weight)&&empty($phone)&&empty($street)&&empty($city))
{
   echo "<center><table><tr><td>All are empty</td></tr></table></center>";                 
}
else 
{
    $host="localhost";
       $dbusername="root";
       $dbpassword="";
       $dbname="bloodbank";
       $dbconn =mysqli_connect($host,$dbusername,$dbpassword,$dbname);
       if(!empty($password))
       {
        $sql2="UPDATE login SET PASS=? WHERE email=?";
        $stmt=$dbconn->prepare($sql2);
       $stmt->bind_param("ss",$password,$email);
       $stmt->execute();
       $stmt->close();
       }
       if(!empty($weight))
       {
       $sql3="UPDATE users SET weight=? WHERE emailID=?";
       $stmt=$dbconn->prepare($sql3);
       $stmt->bind_param("ss",$weight,$email);
       $stmt->execute();
       $stmt->close();
       }
       if(!empty($street))
       {
       $sql4="UPDATE users SET streetno=? WHERE emailID=?";
       $stmt=$dbconn->prepare($sql4);
       $stmt->bind_param("ss",$street,$email);
       $stmt->execute();
       $stmt->close();
       }
       if(!empty($city))
       {
       $sql3="UPDATE users SET city=? WHERE emailID=?";
       $stmt=$dbconn->prepare($sql3);
       $stmt->bind_param("ss",$city,$email);
       $stmt->execute();
       $stmt->close();
       }
       if(!empty($phone))
       {
       $sql3="UPDATE users SET phoneno=? WHERE emailID=?";
       $stmt=$dbconn->prepare($sql3);
       $stmt->bind_param("ss",$phone,$email);
       $stmt->execute();
       $stmt->close();
       }
}
?>
<br><br>
<center>
<table><tr><td>Successfully Updated</td></tr></table></center>
</div>
</body>
</html>