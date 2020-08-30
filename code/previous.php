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
     <table border="3px">
         <tr>
             <td > <a href="donate.html">Donate</a></td>
                   <td ><a href="request.html">Request</a></td>
                   <td ><a href="edit.php"> Edit Profile</a></td>
                   <td > <b>Activities</b></td>
      </tr> </table>
     <br>
     <br>
             <?php
              session_start();$email=$_SESSION['email'];
              $test="1";
              $host="localhost";
        $dbusername="root";
        $dbpassword="";
        $dbname="bloodbank";
        $dbconn =mysqli_connect($host,$dbusername,$dbpassword,$dbname);
        $result2=mysqli_query($dbconn,"SELECT bloodgroup,quantitydonated,hospitaldonated,dateofdonation FROM donations where email ='".$email."'");
            if($result2->num_rows!=0)
            {       
                echo "<br><br><center><table><tr><td><u>Blood Group</u></td><td><u>Quantity of Donation</u></td><td><u>Hospital Donated</u></td><td><u>Date of Donation</u></td></tr>";
                while($row=mysqli_fetch_assoc($result2))
                {
                   echo "<tr>";
                   echo "<td> " . $row["bloodgroup"]. "</td><td>" . $row["quantitydonated"]. "</td><td>" . $row["hospitaldonated"]. "</td><td>" . $row["dateofdonation"]. "</td></tr>";   
                }    
                echo "</table><br><br><table><tr>";  
                echo"</center>";
                $test="0";
            }
            $result3=mysqli_query($dbconn,"SELECT bloodgroup,quantityused,hospital,dateused FROM recipientlist where emailID ='".$email."'");
            if($result3->num_rows!=0)
            {       
                echo "<br><br><center><table><tr><td><u>Blood Group</u></td><td><u>Quantity of Blood</u></td><td><u>Hospital</u></td><td><u>Date</u></td></tr>";
                while($row=mysqli_fetch_assoc($result3))
                {
                   echo "<tr>";
                   echo "<td> " . $row["bloodgroup"]. "</td><td>" . $row["quantityused"]. "</td><td>" . $row["hospital"]. "</td><td>" . $row["dateused"]. "</td></tr>";   
                }    
                echo "</table><br><br><table><tr>";  
                echo"</center>";
                $test="0";
            }
            if($test)
            {
                echo "<br><br<center><table><tr><td>No Records</td></tr></table></center>";
            }               
              ?></td>
      
     </div>
     </body>
     </html>  