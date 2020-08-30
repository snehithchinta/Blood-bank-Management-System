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
                <td > <a href="donations.html">Donations List</a></td>
                <td ><b>Recipient List</b></td>
         </tr>
     </table> 
<?php
$bg=$_POST['bg'];
$quantity=$_POST['Quantity'];
$date=$_POST['date'];
$hospital=$_POST['hospital'];
$email1=$_POST['email'];
$quan=$quantity;

if(!empty($hospital)&&!empty($email1)&&!empty($bg)&&!empty($quantity)&&!empty($date))
{
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="bloodbank";
    $dbconn =mysqli_connect($host,$dbusername,$dbpassword,$dbname);
    $sql="UPDATE donations set availability= ? where email=?";
  //  $sql1="SELECT SUM(availability) from donations where availability > 0 and bloodgroup='".$bg."'";
    $res=mysqli_query($dbconn,"SELECT SUM(availability) from donations where availability > 0 and bloodgroup='".$bg."'");
    while($row1=mysqli_fetch_assoc($res))
    {
        $sum=$row1['SUM(availability)'];
    }
     $result=mysqli_query($dbconn,"SELECT email,availability from donations where availability <> 0 and bloodgroup='".$bg."'  order by dateofdonation ");
     if($result->num_rows!=0)
     {       
         while(($row=mysqli_fetch_assoc($result))&&$quantity<>0)
          {
            $test=$row['availability'];
            $email=$row['email'];
            if($test>=$quantity)
            {
                  $test=$test-$quantity;
                  $quantity=0;
            }
            else
            {
                $quantity=$quantity-$test;
                $test=0;
            }
            $stmt=$dbconn->prepare($sql);
            $stmt->bind_param("ss",$test,$email);
            $stmt->execute();
            $stmt->close();
           
          }
          if($quantity>0)
          {
                echo "<br><br<center><table><tr><td>We could provide only ".$sum."ml of blood<center><table><tr><td>";
          }
          else if($quantity==0)
          {
            echo "<br><br><center><table><tr><td>Blood successfully provided</td></tr></table></center> ";
          }
        }
        else 
        {
            echo "<br><br<center><table><tr><td>No blood available<center><table><tr><td>";
        }
          

    if($quan>$sum)
    {
        $quantity=$sum;
    }
    else
    {
        $quantity=$quan;
    }
    
    $sql="INSERT INTO RECIPIENTLIST (emailID,bloodgroup,quantityused,hospital,dateused) VALUES (?,?,?,?,?)";
    $stmt=$dbconn->prepare($sql);
    $stmt->bind_param("sssss",$email1,$bg,$quantity,$hospital,$date);
    $stmt->execute();
    $stmt->close();
    echo "<center><h2><b>";
    echo "Donation Registered successfully";
    echo "</b></h2></center>";
    $dbconn->close();
 }
else
{
    echo "<br><br><center><table><tr><td>ALL ARE REQUIRED<center><table><tr><td>";
    die();
}
?>
</div>
</body>
</html>