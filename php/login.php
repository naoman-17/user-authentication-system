<?php

    session_start();

    include("connection.php");

    $user=$_GET["email"];
    $pass=$_GET["pass"];

    $query="select * from singupinfo where email='$user' && password='$pass' ";
    $chkstatus="select * from singupinfo where email='$user' && vstatus='1'";
    $data=mysqli_query($conn,$query);
    $data1=mysqli_query($conn,$chkstatus);
    $total=mysqli_num_rows($data);
    $total1=mysqli_num_rows($data1);
    if($total1==1)
    {
        if($total==1)
        {
            $_SESSION['user_name']=$user;
            header('Location:welcome.php');
        }
        else
        {
            $alert=
                "<script>
                    alert('WRONG USERNAME OR PASSWORD');
                    window.location.href='../index.html';
                </script>";
            echo $alert;
        }
    }
    else{
        $alert=
        "<script>
            alert('EMAIL VERIFICATION NOT COMPLETED');
            window.location.href='../login.html';
        </script>";
    echo $alert;
    }
?>