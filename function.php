<?php

session_start();
class Connection{
public $servername='localhost';
public $user ='root';
public $pass ='';
public $dbname ='jobsdb';

public function __construct(){ 
       $dbconn = 'mysql:host='.$this->servername.';dbname='.$this->dbname;
       $this->conn = new PDO($dbconn,$this->user,$this->pass);
       $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }

}
class Register extends Connection{
  public function registration($username,$email,$password,$confirmpassword){
            
            $result = "SELECT * FROM users WHERE username = :username OR email = :email";
            $stmt = $this->conn->prepare($result);
            $stmt->bindParam(':username',$username);
            $stmt->bindParam(':email',$email);
            $stmt->execute();
          if ($stmt->rowCount() > 0) {
          	     return 10;
               //Username or email has already been taken
          }else{
          	 if ($password == $confirmpassword) {
          	  	$result = "INSERT INTO users(username,email,password)VALUES(:username,:email,:password)";
          	  	   $stmt = $this->conn->prepare($result);
          	  	   $stmt->bindParam(':username',$username);
          	  	   $stmt->bindParam(':email',$email);
          	  	   $stmt->bindParam(':password',$password);
          	  	   $stmt->execute();

          	  	   return 1;

          	  	   //registration successful
          	  }else{
                  return 100;
                 // Password does not match
          	  }
          }
    }

}

class Login extends Connection{
   public $id;
   public function logins($username,$password){
         $result = "SELECT * FROM users WHERE username = :username AND password = :password";
         $stmt = $this->conn->prepare($result);
         $stmt->bindParam(':username',$username);
         $stmt->bindParam(':password',$password);
         $stmt->execute();

         $row = $stmt->fetch(PDO::FETCH_ASSOC);

         if ($stmt->rowCount() > 0) {
            if ($password == $row["password"]) {
               $this->id = $row["id"];
               return 1;
               // Login Successful;  
            }
            else{
              return 10;
              // Wrong Password.
          }
         }
         else{
          return 100;
           // User Not registered.
         }
       } 
   public function idUser(){
         return $this->id;
   }
}
class Select extends Connection{
  public function selectUserById($id){
    $result = "SELECT * FROM users WHERE id = :id";
    $stmt = $this->conn->prepare($result);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
       
     return $stmt->fetch(PDO::FETCH_ASSOC);
        
  }
}
 



?>
