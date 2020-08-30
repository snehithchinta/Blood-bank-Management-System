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
             <td > <b>Donate</b></td>
                   <td ><a href="request.html">Request</a></td>
                   <td ><a href="edit.php"> Edit Profile</a></td>
                   <td > <a href="previous.php">Activities</a></td>
        </tr> </table>
<?php
session_start();
$email=$_SESSION['email'];
$hospital=$_POST['hospital'];
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="bloodbank";
$dbconn =mysqli_connect($host,$dbusername,$dbpassword,$dbname);
$result2=mysqli_query($dbconn,"SELECT age,weight FROM users where emailID='".$email."'");
while($row=mysqli_fetch_assoc($result2))
{
    $age=$row['age'];
    $weight=$row['weight'];
}
$result1=mysqli_query($dbconn,"SELECT CURDATE()-MAX(dateofdonation) as daysdiff from donations where email= '".$email."'");
while($row=mysqli_fetch_assoc($result1))
        {
         $max= $row['daysdiff'];   
        }    
     if($max==NULL) {$max=1000;}   
if($weight<49)
{
    echo "<center><table><tr><td>Under weight.Minimum weight=49kg</td></tr></table></center>";
}   
elseif($age<18)
{
    echo "<center><table><tr><td>Not eligible to donate.Minimum age:18 yrs</td></tr></table></center>";
}
else if($max<90)
{
    echo "<center><table><tr><td>Your last donation was under three months</td></tr></table></center>";
}
else
{
    if(!empty($hospital))
    {
    //$sql="SELECT i.inchargename,i.phoneno FROM incharge as i inner join hospital as h on i.inchargeid=h.inchargeid where h.hospitalname = ? ";
    // $stmt=$dbconn->prepare($sql);
    // $stmt->bind_param("s",$hospital);
    $result=mysqli_query($dbconn,"SELECT i.inchargename,i.phoneno FROM incharge as i inner join hospital as h on i.inchargeid=h.inchargeid where h.hospitalname = '".$hospital."'");
    while($row=mysqli_fetch_assoc($result))
    {
        echo "<br><br><br>";
        echo "<center><table><tr>";
        echo "<td>Incharge: " . $row["inchargename"]. "</td><td> Phone number: " . $row["phoneno"]. "</td>";
        echo "</tr></table></center>";
    }
   
   }
   else
   {
    echo "<center><table><tr><td>All fields are mandatory</td></tr></table></center>";
   }  
}  
?>  
</div>
</body>
</html>