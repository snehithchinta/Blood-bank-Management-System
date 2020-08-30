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
    font-weight: bold;s
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
     <table border="3px">
         <tr class="tabs" >
                <td > <b>Search for Blood</b></td>
                <td ><a href="about.html">About Us</a></td>
                <td ><a href="register.html"> Register</a></td>
                <td > <a href="login.html">Login</a></td>
         </tr>
     </table> 

<?php

$bg=$_POST['bg'];
if(!empty($bg))
{
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="bloodbank";
    $dbconn =mysqli_connect($host,$dbusername,$dbpassword,$dbname);
    $sql="update donations set availability='No'where datediff(curdate(),dateofdonation)>42";
    $stmt=$dbconn->prepare($sql);
    $stmt->execute();
    $stmt->close();
    //$sq1="select sum(quantitydonated),hospitaldonated from donations where availability='yes' and bloodgroup='".$hospital."' group by hospitaldonated";
    $result=mysqli_query($dbconn,"SELECT SUM(availability),hospitaldonated from donations where availability<>0 and bloodgroup='".$bg."' group by hospitaldonated");
    if($result->num_rows!=0)
    {       
    echo "<br><br><center><table><tr><td><u>Quantity(ml)</u></td><td><u>Hospital</u></td></tr>";
    while($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td> " . $row["SUM(availability)"]. "</td><td>" . $row["hospitaldonated"]. "</td></tr>";   
    }    
    echo "</table><br><br><table><tr>";  
    echo"<td>In need of blood,please <a href=\"login.html\">login </a>to request(if an existing user) or <a href=\"register.html\">register</a></td></tr></table>";
    echo"</center>";
}
else
    {
        echo  "<br><br><center><table><tr><td>Sorry! Blood is not available</td></tr></table></center>";
    }
   
}
else
{
    echo "<br><br><center><table><tr><td>All fields are mandatory</td></tr></table></center>";
}  

?>