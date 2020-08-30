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
    width:700px;
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
<table border="3px">
         <tr class="tabs" >
                <td > <b>Donations List</b></td>
                <td ><a href="recipientlist.html">Recipient List</a></td>
         </tr>
     </table> 

 <?php
 $hospital=$_POST['hospital'];
 $email=$_POST['email'];
 $bg=$_POST['bg'];
 $quantity=$_POST['quantity'];
 $date=$_POST['date'];
 if(!empty($hospital)&&!empty($email)&&!empty($bg)&&!empty($quantity)&&!empty($date))
{
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="bloodbank";
    $dbconn =mysqli_connect($host,$dbusername,$dbpassword,$dbname);
    $sql="INSERT INTO DONATIONS (email,bloodgroup,quantitydonated,hospitaldonated,dateofdonation) VALUES (?,?,?,?,?)";
    $stmt=$dbconn->prepare($sql);
    $stmt->bind_param("sssss",$email,$bg,$quantity,$hospital,$date);
    $stmt->execute();
    $stmt->close();
    echo "<center><h2><b>";
    echo "Donation Registered successfully";
    echo "</center></h2></b>";
    $dbconn->close();
}
else
{
    echo "<br><br><center><table> <tr><td>ALL FIELDS ARE REQUIRED.</tr></td></table></center>";
    die();
}
?>
</div>
</body>
</html>            