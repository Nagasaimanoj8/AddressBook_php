<?php
include 'dbconnection.php';
if(isset($_GET['deleteid']))
{
    $id=$_GET['deleteid'];
    $sql="delete from employeedetails where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        header('location:dashboard.php');
    }
    else{
        die(mysqli_error($conn));
    }
}
?>