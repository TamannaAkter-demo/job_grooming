<?php
   include("connection.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT * FROM user WHERE mail = '$email' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      //echo $row['name'];
      // If result matched $myusername and $mypassword, table row must be 1 row
		if($row['role'] == "user"){
         if($count == 1) {
            //session_register("email");
            $_SESSION['id'] = $email;
            header("location: news_feed.php");
         }
         else {
            $error = "Your Login Name or Password is invalid";
            header("location: login.php");
         }
      }
      else if($row['role'] == "admin"){
         if($count == 1) {
            //session_register("email");
            $_SESSION['id'] = $email;
            $_SESSION['code'] = $row['role'];
            header("location: admin_home.php");
         }
         else {
            $error = "Your Login Name or Password is invalid";
            header("location: login.php");
         }
      }
      else{
         $error = "Your Login Name or Password is invalid";
         header("location: login.php");
      }
      
   }
?>