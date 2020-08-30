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
             <td > <a href="login.html">Login</a></td>
         </tr>
     </table>  

<?php
$name=$_POST['name'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$weight=$_POST['Weight'];
//$bloodgroup=$_POST['bg'];
$email=$_POST['email'];
$phonenum=$_POST['phone'];
$streetno=$_POST['street'];
$city=$_POST['city'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];
$donorid;
if(!empty($name)&&!empty($email)&&!empty($dob)&&!empty($weight)&&!empty($gender)&&!empty($phonenum)&&!empty($city)&&!empty($password)&&!empty($confirm))
{
       $host="localhost";
       $dbusername="root";
       $dbpassword="";
       $dbname="bloodbank";
       $dbconn =mysqli_connect($host,$dbusername,$dbpassword,$dbname);
       $sql="SELECT email FROM login WHERE email= ? limit 1";
       $sql2="INSERT INTO login(email,pass) VALUES (?,?)";
       $sql3="INSERT INTO users(username,gender,dob,weight,phoneno,emailID,streetno,city) VALUES(?,?,?,?,?,?,?,?)";
      // $sql4="INSERT INTO recipient(recipientname,recipientdob,gender,age,weight,bloodgroup,phoneno,emailID,streetno,city) VALUES(?,?,?,?,?,?,?,?,?,?)";
              
       $stmt=$dbconn->prepare($sql);
       $stmt->bind_param("s",$email);
       $stmt->execute();
       $stmt->bind_result($email);
       $stmt->store_result();
       $rnum=$stmt->num_rows;
       if($rnum==0)
       {
           $stmt->close();
           if($password==$confirm)
           {
              if(strlen($phonenum)==10) 
              {
                $stmt=$dbconn->prepare($sql2);
                $stmt->bind_param("ss",$email,$password);
                $stmt->execute();
                $stmt->close();
                $stmt=$dbconn->prepare($sql3);
                $stmt->bind_param("ssssssss",$name,$gender,$dob,$weight,$phonenum,$email,$streetno,$city);
                $stmt->execute();
                $stmt->close();
                // $stmt=$dbconn->prepare($sql4);
                // $stmt->bind_param("ssssssssss",$name,$dob,$gender,$age,$weight,$bloodgroup,$phonenum,$email,$streetno,$city);
                // $stmt->execute();
                // $stmt->close();
                echo "<center><h2><b>";
                echo "Registered successfully . Login to continue";
                echo "</center></h2></b>";
              }
              else
              {
                  echo "<br><br><center><table><tr><td>enter correct phone number</td></tr></table></center>";

              }
            }
            else
            {
                echo "<br><br><center><table><tr><td>Passwords don't match</td></tr></table></center>";
            }
       }    
        else
        {
               echo "<br><br><center><table><tr><td>ALREADY EXISTS.</td></tr></table></center>";
        }
       $dbconn->close();
   }
else
{
    echo "<br><br><center><table><tr><td>ALL ARE REQUIRED</td></tr></table></center>";
    die();
}
?>
</div>
</body>
</html>