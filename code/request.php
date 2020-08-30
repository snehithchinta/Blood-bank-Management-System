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
                   <td ><b>Request</b></td>
                   <td ><a href="edit.php"> Edit Profile</a></td>
                   <td > <a href="previous.php">Activities</a></td>
                </tr> </table>


     <?php
$quantity=$_POST['quantity'];
$bg=$_POST['bg'];
if(!empty($bg))
{
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="bloodbank";
    $dbconn =mysqli_connect($host,$dbusername,$dbpassword,$dbname);
    $sql="update donations set availability='0'where datediff(curdate(),dateofdonation)>42";
    $stmt=$dbconn->prepare($sql);
    $stmt->execute();
    $stmt->close();
    if($bg=="O+")
    {
        $result=mysqli_query($dbconn,"SELECT * FROM mixop");
    }
    else if($bg=="O-")
    {
        $result=mysqli_query($dbconn,"SELECT * FROM mixon");
    }
    else  if($bg=="A+")
    {
        $result=mysqli_query($dbconn,"SELECT * FROM mixap");
    }
    else if($bg=="A-")
    {
        $result=mysqli_query($dbconn,"SELECT * FROM mixan");
    }
    else if($bg=="AB+")
    {
        $result=mysqli_query($dbconn,"SELECT * FROM mixabp");
    }
    else if($bg=="AB-")
    {
        $result=mysqli_query($dbconn,"SELECT * FROM mixabn");
    }
    else if($bg=="B+")
    {
        $result=mysqli_query($dbconn,"SELECT * FROM mixbp");
    }
    else if($bg=="B-")
    {
        $result=mysqli_query($dbconn,"SELECT * FROM mixbn");
    }


   if($result->num_rows!=0)
    {    
    echo "<br><br><center><table><tr><td><u>Quantity(ml)</u></td><td><u>Hospital</u></td><td><u>Incharge Name</u></td><td><u>Incharge Phone Number</u></td></tr>";
    while($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td> " . $row["availability"]. "</td><td>" . $row["hospitaldonated"]. "</td><td>" . $row["inchargename"]. "</td><td>" . $row["phoneno"]. "</td></tr>";   
    }    
    echo "</table><br><br><table><tr>";  
    echo"<td></td></tr></table>";
    echo"</center>";
    }
    else
    {
        echo  "<center><table><tr><td>Sorry! Blood is not available</td></tr></table></center>";
        $sqll="SELECT email,MAX(dateofdonation) from donations where bloodgroup='".$bg."' group by email";
        $result1=mysqli_query($dbconn,"SELECT email,MAX(dateofdonation) from donations where bloodgroup='".$bg."' group by email");
        echo "<br><br><center><table><tr><td><u>EmailID of donor</u></td><td><u>Last donation</u></td></tr>";
        while($row=mysqli_fetch_assoc($result1))
        {
        echo "<tr>";
        echo "<td> " . $row["email"]. "</td><td>" . $row["MAX(dateofdonation)"]. "</td></tr>";   
        }    
        echo "</table><br><br><table><tr>";  
        echo"<td></td></tr></table>";
        echo"</center>";
    }
}
else
{
    echo "<center><table><tr><td>All fields are mandatory</td></tr></table></center>";
}  

?>
</div>
</body>
</html>