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
<br><br>
<center>
<div class="w3-border-0 w3-light-grey" style="height:1000px;width:50%;">  
<form method="POST" enctype="multipart/form-data">
     <h1 align="center" class="w3-pink">Apply Here</h1><br>
     <center>
      <?php
     include 'logic2.php';
     $logic = new Logic();
      
     $apply = $logic->apply();
      ?>
      <b><font color="red">The * means the fields are Required</font></b>
      <div>
        <label style="font-weight:bolder;"><span>*</span>Firstname</label>
      </div>
      <div>
         <input type="text" name="firstname" required="required" placeholder="Enter Your Firstname">
      </div>
      <div>
        <label style="font-weight:bolder;"><span>*</span>Lastname</label>
      </div>
      <div>
         <input type="text" name="lastname" required="required" placeholder="Enter Your Lastname">
      </div>
       <div>
        <label style="font-weight:bolder;"><span>*</span>Email</label>
      </div>
      <div>
         <input type="email" name="email" required="required" placeholder="Enter Your Email">
      </div>
      <div>
        <label style="font-weight:bolder;"><span>*</span>Mobile</label>
      </div>
      <div>
         <input type="mobile" name="mobile" required="required" placeholder="Enter Your Mobile">
      </div>
      <div>
        <label style="font-weight:bolder;"><span>*</span>Address</label>
      </div>
      <div>
          <textarea name="address" cols="20" rows="5" required="required" placeholder="Enter Your Address Here....."></textarea>
      </div>
      <div>
        <label style="font-weight:bolder;">Upload CV in Jpeg/jpg format</label>
      </div>
      <div>
         <span>*</span><input type="file" name="cv" required="required">
      </div><br><br>
      <div>
        <label style="font-weight:bolder;">Job Applying for</label>
      </div>
      <div>
         <span>*</span>
         <select name="job" required="required" style="background-color:pink;display:inline-block;">
             <option value="--Select--">Select</option>
             <option value="Doctor" style="font-weight:bolder;">Doctor</option>
             <option value="Nurse" style="font-weight:bolder;">Nurse</option>
             <option value="Lawyer" style="font-weight:bolder;">Lawyer</option>
             <option value="Software Engineer" style="font-weight:bolder;">Software Engineer</option>
             <option value="Teacher" style="font-weight:bolder;">Teacher</option>
             <option value="Musician" style="font-weight:bolder;">Musician</option>
             <option value="Banker" style="font-weight:bolder;">Banker</option>
             <option value="Receptionist" style="font-weight:bolder;">Receptionist</option>
             <option value="Construction Engineer" style="font-weight:bolder;">Construction Engineer</option>
         </select>
      </div>
      <div>
        <label style="font-weight:bolder;">Qualifications</label>
      </div>
      <div>
         <span>*</span>
         <select name="qualification" required="required" style="background-color:pink;display:inline-block;">
             <option value="--Select--">Select</option>
             <option value="Bachelor Degree" style="font-weight:bolder;">Bachelor Degree</option>
             <option value="Master Degree" style="font-weight:bolder;">Master Degree</option>
             <option value="Diploma" style="font-weight:bolder;">Diploma</option>
             <option value="Ph.D" style="font-weight:bolder;">Ph.D</option>
             <option value="Associate Degree" style="font-weight:bolder;">Associate Degree</option>
             <option value="Vocational Certificate" style="font-weight:bolder;">Vocational Certifcate</option>
         </select>
      </div>
      <div>
        <label style="font-weight:bolder;"><span>*</span>Qualification in What Course</label>
      </div>
      <div>
          <textarea name="course" cols="20" rows="5" required="required" placeholder="Enter Your Qualification Here....."></textarea>
      </div>
      <div>
        <label style="font-weight:bolder;">Nationality</label>
      </div>
      <div>
         <span>*</span>
      <input type="text" name="nationality" required="required" placeholder="Type Your Nationality">
      </div>
      <div>
        <br>
         <input type="submit" name="apply" value="Apply" button="button" class="btn btn-primary w3-pink" style="font-weight:bolder;">
      </div>
</center>
</form>
</div>
</center>
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