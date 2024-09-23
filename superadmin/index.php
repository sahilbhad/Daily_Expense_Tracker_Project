<?php
  session_start();
 
  include("connction.php");
  if(isset($_POST["sub"]))
 {
    $name=$_POST["uname"];
    $password=$_POST["pass"];

    $result=mysqli_query($con,"SELECT * FROM  super_a  WHERE username='$name' AND password ='$password'");
    $insert=mysqli_fetch_array($result);

     if($insert)
     {
       
   
      $_SESSION['name_id']=$insert['username'];
      echo "<script> alert (' login successfully');</script>";
      echo "<script>window.location.href='deshboard.php'</script>"; 
     }
     else {
      echo "<script> alert ('wrong id or password');</script>";
     }
    }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page with Background Image Example</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="bg"></div>

<form method="POST">
  <div class="form-field">
    <input type="text" name="uname" placeholder=" Username" required/>
  </div>
  
  <div class="form-field">
    <input type="password" name="pass" placeholder="Password" required/> </div>
  
  <div class="form-field">
    <button class="btn" name="sub" type="submit">Log in</button>
  </div>
</form>
 
  
</body>
</html>
