<?php
    include("connection.php");

    $firstname=$_GET['fname'];
    $lastname=$_GET['lname'];
    $email=$_GET['email'];
    $password=$_GET['password'];
    $gender=$_GET['r1'];

    $query="insert into singupinfo (firstname,lastname,email,password,gender) values('$firstname','$lastname','$email','$password','$gender')";
    $data=mysqli_query($conn,$query);

    if($data)
    {
        header('Location:../login.html');
    }
?>
