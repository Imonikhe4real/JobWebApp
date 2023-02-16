<?php

include 'function.php';

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
  <link rel="stylesheet" type="text/css" href="w3.css">
</head>
<body>
	<div class="w3-top">
<div class="w3-border-0" style="height:100px;width:auto;background-color:pink;"> 
  <br><br>
  <div id="welcome">
		
	</div>
</div>
<div class="w3-bar w3-black">
  <a href="index.php" class="w3-bar-item w3-button w3-hide-small" style="font-weight:bolder;text-decoration:none;">Home</a>
  <a href="registration.php" class="w3-bar-item w3-button w3-hide-small" style="font-weight:bolder;text-decoration:none;">Register</a>
  <a href="login.php" class="w3-bar-item w3-button w3-hide-small" style="font-weight:bolder;text-decoration:none;">Login</a>
  <a href="contact.php" class="w3-bar-item w3-button w3-hide-small" style="font-weight:bolder;text-decoration:none;">Contact</a>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="myFunction()">&#9776;</a>
</div>
<div id="demo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium">
  <a href="index.php" class="w3-bar-item w3-button" style="font-weight:bolder;text-decoration:none;">Home</a>
  <a href="registration.php" class="w3-bar-item w3-button" style="font-weight:bolder;text-decoration:none;">Register</a>
  <a href="login.php" class="w3-bar-item w3-button" style="font-weight:bolder;text-decoration:none;">login</a>
<a href="contact.php" class="w3-bar-item w3-button" style="font-weight:bolder;text-decoration:none;">Contact</a>
</div>
<script>
   function myFunction() {
  var x = document.getElementById("demo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
</div>
<div class="w3-border-0" style="height:200px;width:100%;">
  
</div>
<div class="w3-border-0 w3-light-grey" style="height:600px;">
        <center>
          <br><br><br>
         <div class="w3-border-0" style="height:400px;width:400px;">
            <center>
            <form method="POST" style="background-color:black;color:white;">
                <h1 align="center" style="background-color:pink;color:black;">REGISTER HERE</h1>
           <?php

           if(isset($_SESSION['id'])){
           header("dashboard.php");
           }
                     
           $register = new Register();

           if(isset($_POST['register'])) {
          $result = $register->registration($_POST['username'],$_POST['email'],$_POST['password'],$_POST['confirmpassword']);

          if ($result == 1) {
            echo "Registered Successfully";;
          }elseif ($result == 10) {
            echo "Username or Email has already been taken";
          }elseif ($result == 100) {
            echo "Password does not match";
          }
    }
    ?>
                <div>
                  <label style="font-weight:bolder;">Username</label>
                </div>
                <div><input type="text" name="username" required="required" placeholder="Enter Your Username Here...."></div>
               <div>
                  <label style="font-weight:bolder;">Email</label>
                </div>
                <div><input type="email" name="email" required="required" placeholder="Enter Your Email Here...."></div>
                <div>
                  <label style="font-weight:bolder;">Password</label>
                </div>
                <div><input type="password" name="password" required="required" placeholder="Enter Your Password Here...."></div>
                <div>
                  <label style="font-weight:bolder;">Confirm Password</label>
                </div>
                <div><input type="password" name="confirmpassword" required="required" placeholder="Enter Your Password Here...."></div><br>
                <div><input type="submit" name="register" value="Register" class="btn btn-primary w3-pink" style="font-weight:bolder;"></div><br>
            </form></center>
         </div>
      </div>
      </center>
</div>
<div class="w3-border-0" style="height:200px;width:100%;">
  
</div>
<div class="w3-border-0" style="height:20px;width:100%;background-color:black;">
  
</div>
<footer class="w3-border-0" style="height:300px;width:100%;background-color:pink;">
  <div id="footer"></div>
</footer>

<script>
  document.getElementById('welcome').innerHTML = '<center><b>Welcome To MY Job Portal</b></center>';
  document.getElementById('intro').innerHTML = '<br><br><br><br><br><br><br><br><center><b>This is a blog where you post your comments about any of the snacks you are seeing on our blog</b></center>';
  document.getElementById('footer').innerHTML ='<br><br><br><br><br><center><b>Copyright &copy 2023</b></center>';
</script>
</body>
</html>