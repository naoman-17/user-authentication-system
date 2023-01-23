<?php
    include("connection.php");
    $user=$_GET["email"];
    $pass=$_GET["pass"];

    $query="select * from singupinfo where email='$user' && password='$pass' ";
    $data=mysqli_query($conn,$query);
    $total=mysqli_num_rows($data);
    if($total==1)
    {
        header('Location:../welcome.html');
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
?>