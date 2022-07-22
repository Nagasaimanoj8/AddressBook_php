<?php
include 'dbconnection.php';
// $sql = "CREATE TABLE employeedetails(
//          id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//          firstname VARCHAR(50) NOT NULL UNIQUE,
//             lastname VARCHAR(50) NOT NULL UNIQUE,
//          email varchar(255),
//           mobile varchar(255),
//           address varchar(255)
//          )";
        
//          if ($conn->query($sql) === TRUE) {
//            echo "Table MyGuests created successfully";
//          } else {
//            echo "Error creating table: " . $conn->error;
//          }
if(isset($_POST['submit']))
{
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];    

    $sql="insert into employeedetails (firstname,lastname,email,mobile,address) 
    values('$firstname','$lastname','$email','$mobile','$address')";
    $result=mysqli_query($con ,$sql);
    if($result)
    {
    echo "Datainserted";
     }
else
{
    die(mysqli_error($conn));
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>form</title>
  </head>
  <body>
    <h1 class="text-center">Employee Details</h1>
    <div class ="container my-5">
    <form method="POST" action="">
  <div class="form-group">
    <label>firstname</label>
    <input type="text" class="form-control"  placeholder="Enter your first Name" name="firstname"
    pattern="[A-Z a-z 0-9]{1,15}"
       title="USER SHOULD BE  BETWEEN 6 TO 12 CHARACTERS" >
    <label >lastname</label>
    <input type="text" class="form-control"  placeholder="Enter Last Name" name="lastname"
    pattern="[A-Z a-z 0-9]{1,15}"
       title="USER SHOULD BE  BETWEEN 6 TO 12 CHARACTERS">
    <label >email</label>
    <input type="email" class="form-control"  placeholder="Enter Your Email" name="email"
    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3}$" >
    <label >mobile</label>
    <input type="text" class="form-control"  placeholder="Enter Mobile Number" name="mobile"
    pattern="[0-9]{2}-[0-9]{8}">
    <label >address</label>
    <input type="text" class="form-control"  placeholder="Enter your address" name="address">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button> 
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="search" placeholder="Enter your name or other details">
  <button type ="submit"  name='search_btn' class="button1" >Search</button>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <select name="Selectoption"id="select">
    
    <option value="email">email</option>
    <option value="mobile"> mobile</option>
    <option value="address">address</option>
  </select> 
  <button type ="submit" name="sort" class="button1" >Sort</button>

</form>
<table class="table">
                  <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">firstname</th>
                        <th scope="col">lastname</th>
                        <th scope="col">email</th>
                        <th scope="col">mobile</th>
                        <th scope="col">address</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                  if(isset($_POST['sort']))
                  {
                    $value_filter=$_POST['Selectoption'];
                    $sql="SELECT * FROM employeedetails order by $value_filter ";
                    $result=mysqli_query($conn,$sql);
                    if( mysqli_num_rows($result)>0)
                    {
                      while($row=mysqli_fetch_array($result))
                      { $id=$row['id'];
                        $firstname=$row['firstname'];
                        $lastname=$row['lastname'];
                        $email=$row['email'];
                        $mobile=$row['mobile'];
                        $address=$row['address'];
                        echo'<tr>
                        <th scope="row">'.$id.'</th>
                        <td>'.$firstname.'</td>
                        <td>'.$lastname.'</td>
                        <td>'.$email.'</td>
                        <td>'.$mobile.'</td>
                        <td>'.$address.'</td>
                        <td>
                        <button class=button1><a href="update.php? updateid='.$id.'">Update</a></button>
                        <button class=button2><a href="delete.php? deleteid='.$id.'">Delete</a></button>
                
                    </td>
                        </tr>';
                      }
                    }
                    else{
                      echo "No Record Found";
                    }
                  }
                  ?>
              <table class="table">
                                <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">firstname</th>
                        <th scope="col">lastname</th>
                        <th scope="col">email</th>
                        <th scope="col">mobile</th>
                        <th scope="col">address</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php
                  if(isset($_POST['search_btn']))
                  {
                    $value_filter=$_POST['search'];
                    $sql="SELECT * FROM employeedetails WHERE CONCAT(firstname,lastname,address) LIKE '%$value_filter%' ";
                    $result=mysqli_query($conn,$sql);
                    if( mysqli_num_rows($result)>0)
                    {
                      while($row=mysqli_fetch_array($result))
                      {
                        $id=$row['id'];
                        $firstname=$row['firstname'];
                        $lastname=$row['lastname'];
                        $email=$row['email'];
                        $mobile=$row['mobile'];
                        $address=$row['address'];
                        echo'<tr>
                        <th scope="row">'.$id.'</th>
                        <td>'.$firstname.'</td>
                        <td>'.$lastname.'</td>
                        <td>'.$email.'</td>
                        <td>'.$mobile.'</td>
                        <td>'.$address.'</td>
                        <td>
                        <button class=button1><a href="update.php? updateid='.$id.'">Update</a></button>
                        <button class=button2><a href="delete.php? deleteid='.$id.'">Delete</a></button>
                
                    </td>
                        </tr>';
                      }
                    }
                    else{
                      echo "No Record Found";
                    }
                  }
                  ?>
                  
              </table>
<div class="container my-5">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">firstname</th>
      <th scope="col">lastname</th>
      <th scope="col">email</th>
      <th scope="col">mobile</th>
      <th scope="col">address</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="Select * from employeedetails ";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
       while($row=mysqli_fetch_assoc($result))
       {
        $id=$row['id'];
        $firstname=$row['firstname'];
        $lastname=$row['lastname'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $address=$row['address'];
        echo'<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$firstname.'</td>
        <td>'.$lastname.'</td>
        <td>'.$email.'</td>
        <td>'.$mobile.'</td>
        <td>'.$address.'</td>
        <td>
        <button class=button1><a href="update.php? updateid='.$id.'">Update</a></button>
        <button class=button2><a href="delete.php? deleteid='.$id.'">Delete</a></button>

    </td>
        </tr>'; 
       }
    }
    ?>
       
  </tbody>
</table>
</div>

   
  
  </body>
</html>

