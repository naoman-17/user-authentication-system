<?php

    session_start();
    $userprofile= $_SESSION['user_name']; 
    if($userprofile!=true)
    {
        header("location:../login.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="../css/welcome.css">
</head>
<body>
    <nav>
        <div class="logout">
            <a href="logout.php">LOGOUT</a>
        </div>
    </nav>
    <main>
        <div class="uas">
            <h1>Successfully Login :-)</h1>
        </div>
    </main>
</body>
</html>