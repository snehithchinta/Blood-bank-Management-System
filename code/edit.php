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
                   <td ><b> Edit Profile</b></td>
                   <td > <a href="previous.php">Activities</a></td>
       </tr> </table>
     <center>
         <h1>
             Edit Your Details
         </h1>
            <br><br>
        <table>
            <tr>
            <td> You are logged in as </td>
            <td>
        <?php session_start();$email=$_SESSION['email'];
        $_SESSION1['email']=$email; echo $email?>
        </td></tr>
            <form action="change.php" method="POST">
             <tr>
                <td>
                    Weight
                </td>
                <td>
                    <input type="text" name="Weight">
                </td>
            </tr>
            <tr>
                <td>
                    Phone number
                </td>
                <td>
                    <input type="" name="phone">
                </td>
            </tr>
            <tr>
                <td>
                    Street No
                </td>
                <td>
                    <input type="text" name="street">
                </td>
            </tr>
            <tr>
                <td>
                    City
                </td>
                <td>
                    <input type="text" name="city">
                </td>
            </tr>               
            <tr>
                <td>
                   New Password
                </td>
                <td>
                    <input type="password" name="password">
                </td>
            </tr>
            <tr>
                   <td colspan="2">
                   <center><button type="submit">Edit</button></center>
               </td>
                   
               </tr>
               </form>
        </table>
       </center>
     </div>
     </body>
     </html>  