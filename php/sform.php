<?php
    include("connection.php");
    $firstname=$_GET['fname'];
    $lastname=$_GET['lname'];
    $email=$_GET['email'];
    $password=$_GET['password'];
    $gender=$_GET['r1'];
    $vc=bin2hex(random_bytes(20));

    $query="insert into singupinfo (firstname,lastname,email,password,gender,verifyc,vstatus) values('$firstname','$lastname','$email','$password','$gender','$vc','0')";
    $data=mysqli_query($conn,$query);

    if($data)
    {
        $alert=
            "<script>
                alert('Verify your email from your mail box :-)');
                window.location.href='../login.html';
            </script>";
        echo $alert;
    }
?>
