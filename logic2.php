<?php


class Logic{

public $servername='localhost';
public $user ='root';
public $pass ='';
public $dbname ='jobsdb';


public function __construct(){ 
       $dbconn = 'mysql:host='.$this->servername.';dbname='.$this->dbname;
       $this->conn = new PDO($dbconn,$this->user,$this->pass);
       $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }
public function apply(){
      
      if (isset($_POST['apply'])) {
            
            
            $docs = $_FILES['cv']['name'];
            $tmp_dir = $_FILES['cv']['tmp_name'];
            $docSize = $_FILES['cv']['size'];

            $upload_dir = "uploads/";
            $docExt = strtolower(pathinfo($docs,PATHINFO_EXTENSION));
            $valid_extensions = array('jpeg','jpg');
            $cv = rand(1000,1000000).".".$docExt;
            move_uploaded_file($tmp_dir,$upload_dir.$cv);


            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];      	   
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $address = $_POST['address'];
            $job = $_POST['job'];
            $qualification = $_POST['qualification'];
            $course = $_POST['course'];
            $nationality = $_POST['nationality'];
       
         $sql = "INSERT INTO applications(firstname,lastname,email,mobile,address,job,cv,qualification,course,nationality)VALUES(:firstname,:lastname,:email,:mobile,:address,:job,:cv,:qualification,:course,:nationality)";

         $stmt = $this->conn->prepare($sql);
         $stmt->bindParam(':firstname',$firstname);
         $stmt->bindParam(':lastname',$lastname);
         $stmt->bindParam(':email',$email);
         $stmt->bindParam(':mobile',$mobile);
         $stmt->bindParam(':address',$address);
         $stmt->bindParam(':job',$job);
         $stmt->bindParam(':cv',$cv);
         $stmt->bindParam(':qualification',$qualification);
         $stmt->bindParam(':course',$course);
         $stmt->bindParam(':nationality',$nationality);
         $stmt->execute();    


    echo "<br>";
    echo "<center><b>Application Sent Successfully</b></center>";
    echo "<center><b>You will get a response in 2 working days by email</b></center>";



    }
}
public function contact(){
     
     if (isset($_POST['send'])) {
           $fullname= $_POST['fullname'];
           $email= $_POST['email'];
           $mobile= $_POST['mobile'];
           $address= $_POST['address'];
           $message= $_POST['message'];
         
         $sql = "INSERT INTO contacts(fullname,email,mobile,address,message)VALUES(:fullname,:email,:mobile,:address,:message)";
         $stmt = $this->conn->prepare($sql);
         $stmt->bindParam(':fullname',$fullname);
         $stmt->bindParam(':email',$email);
         $stmt->bindParam(':mobile',$mobile);
         $stmt->bindParam(':address',$address);
         $stmt->bindParam(':message',$message);
         $stmt->execute();

         echo "<br>";
         echo "<center>";
         echo "<center><font color='pink'><b>Message Sent Successfully</b></font></center>";
         echo "<center><font color='pink'><b>You will get a repsonse in 2days working days from today</b></font></center>";


     }
}



}

?>