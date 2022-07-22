<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'dbconnection.php';
        $email=$_POST['email'];
        $password=$_POST['password'];  

        $sql="Select * from registrationform where email='$email'";
        $result=mysqli_query($conn,$sql);
if($result)
{
    $num=mysqli_num_rows($result);
    if($num>0)
    {
      $data=mysqli_fetch_array($result);
        if(password_verify($password,$data['password'])){
          session_start();
          $_SESSION['email']=$email;
          
          header('location:dashboard.php');
        }
    else{
        echo "Invalid data";
    }     
}
}
}
?>
<!doctype html>
<html lang="en">
  <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css">
    <title>Loginform</title>
  </head>
  <body>
   <div class ="container my-5">
    <form method="POST"> 
  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control"   name="email" autocomplete="off" required>
  </div>
  <div class="mb-3">
    <label class="form-label">password</label>
    <input type="password" class="form-control"  name="password" autocomplete="off"  required>
  </div>

 <div> <button type="submit" class="button1" name="submit">Login</button></div>
 <div class=button2 >For New Account SignUp &nbsp;&nbsp;&nbsp; <button type="submit"name="submit" ><a href="registrationform.php" class="a">Register</a></button>    
</div> </form>
    
</div>

  </body>
  </head>
</html>