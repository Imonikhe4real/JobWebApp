<?php

include 'function.php';

$select = new Select();

if (isset($_SESSION["id"])) {
	
	$user = $select->selectUserById($_SESSION["id"]);
}
else
{
     header("Location:dashboard.php");
}


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
<h5>Welcome: <font color="white"><?php echo $user["username"]; ?></font></h5>
Email:<u><?php echo $user["email"]; ?></u><br>
<a href="logout.php" class="btn btn-yellow btn-primary" style="font-weight:bolder;">Logout</a>
</div>
</div>
<div class="w3-border-0" style="height:250px;width:100%;">
	
</div>
    <center>
<div class="w3-light-grey">
	<br><br>
    <?php 

    include 'logic1.php';
    $logic1 = new Logic1();

    $sql = "SELECT * FROM jobtb";     
    $records_per_page=3;
    $newquery = $logic1->pagingapply($sql,$records_per_page);
    $logic1->dataviewapply($newquery);
    echo"<br>";
    echo "<br>"; 
    echo "<br>";  
    $logic1->paginglinkapply($sql,$records_per_page);   
    ?>
    </div>
</center>
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
