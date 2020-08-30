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
         <tr class="tabs" >
             <td > <a href="search.html">Search for Blood</a></td>
             <td ><a href="about.html">About Us</a></td>
             <td ><a href="register.html"> Register</a></td>
             <td > <b>Login</b></td>
         </tr>
     </table>  

<?php
$email=$_POST['email'];
$password=$_POST['password'];
session_start();
$_SESSION['email']=$email;
$confirm;
if(!empty($email)&&!empty($password))
{
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="bloodbank";
    $dbconn =mysqli_connect($host,$dbusername,$dbpassword,$dbname);
    $sql1="SELECT email FROM login WHERE email= ? limit 1";
    $sql2="SELECT pass FROM login WHERE email= ? ";
    $stmt=$dbconn->prepare($sql1);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum=$stmt->num_rows;  
    if($rnum==0)
    {
        echo "<center><table><tr><td>Not an existing user! Please <a href=\"register.html\">register</a> to continue</td></tr></table></center>";
    }
    else
    {
        $stmt->close();
        // $stmt=$dbconn->prepare($sql2);
        // $stmt->bind_param("s",$email);
        // $stmt->execute();
        $result=mysqli_query($dbconn,"SELECT pass FROM login WHERE email= '".$email."'");
        
         while($row=mysqli_fetch_assoc($result))
         {
            $confirm=$row['pass'];           
         }
        if($password!=$confirm)
        {
            echo "<center><table><tr><td>Password doesn't match</td></tr></table></center>";
        }
        else 
        {
            echo "<h3><center>Logged in successfully</center></h3><br><br>";
            echo '<center><table><tr class="tabs">';
            echo '<td><a href="donate.html"><b>DONATE</b></a></td></tr>';
            echo '<tr class="tabs"><td><a href="request.html"><b>REQUEST</b></a></td></tr>';
            echo '<tr class="tabs"><td><a href="previous.php"><b>Previous Records</b></a></td></tr><tr class="tabs"><td>';
            echo '<a href="edit.php"><b>Edit Profile</b></td></tr></table></center>';
        }
    }
}
else 
{
    //<p style= "border:3px;border-style:solid;border-color:#FFFFFF:padding:1em;>
    echo "<center><table><tr><td>Enter an email and password to login</td></tr></table></center> ";
}
?>
</div>
</body>
</html>


