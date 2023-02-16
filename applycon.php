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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
  <link rel="stylesheet" type="text/css" href="w3.css">
  <script src="jquery-3.6.3.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("form").toggle();
  });
});
</script>
</head>
<body>
  <?php
  
  include 'logic1.php';
  $logic1 = new Logic1();
  $id = $_REQUEST['id'];
  $row = $logic1->fetch_singleapply($id);

  if (!empty($row)) {
       
 
?>
<div class="w3-border-0" style="height:100px;width:auto;background-color:pink;"> 
  <br><br>
  <div id="welcome">
    
  </div>
</div>
<div class="w3-bar w3-black" style="height:100px;width:100%;">
<h5>Welcome: <font color="white"><?php echo $user["username"]; ?></font></h5>
Email:<u><?php echo $user["email"]; ?></u><br>
<a href="logout.php" class="btn btn-yellow btn-primary" style="font-weight:bolder;">Logout</a>
</div>
  <br><br>
  <a href="dashboard.php" button="button" class="btn btn-success" style="font-weight:bolder;">Back to page</a>
<center>
<table class="w3-table w3-light-grey"  width="50%">

    <h1 align="center">JOB VACANCY</h1>
    <center>
<tr>
  <td></td><td><img src="<?php echo $row['image'];?>"></td></td>
 </tr>
<tr>
  <td><b>Job Role :</b></td><td><?php echo $row['job_role'];?></td>
</tr>
<tr>
  <td><b>Qualification :</b></td><td><?php echo $row['qualification'];?></td>
</tr>
<tr>
  <td><b>Nationality :</b></td><td><?php echo $row['Nationality'];?></td>
</tr>
 <tr>
  <td><b>Job Description :</b></td><td><?php echo $row['Job_description'];?></td>
 </tr>
<tr>
 <td><b>Created Time:</b></td> <td><?php echo $row['created_at'];?></td>
</tr>
</center>
<br><br>

     <?php
      }
	?>
</table>
</center>
<br><br>







    <?php
     
     include 'logic2.php';
     $logic = new Logic();
      
     $apply = $logic->apply();

    ?>


    
<div class="w3-border-0" style="height:100px;width:100%;">
  
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