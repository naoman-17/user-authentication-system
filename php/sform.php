<?php
    include("connection.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function sendmail($vemail,$vcode)
    {
        require ('PHPMailer/Exception.php');
        require ('PHPMailer/PHPMailer.php');
        require ('PHPMailer/SMTP.php');

        $mail = new PHPMailer(true);
        try {                            
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'xyz@gmail.com';     //your email                
            $mail->Password   = 'password';          //here first on the 2fa then make n password for the other app just bellow the option in 2fa in gmail.                     
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 465;                                    
        
            //Recipients
            $mail->setFrom('xyz@gmail.com', 'FITNAOMAN');
            $mail->addAddress($vemail);               
            
            $mail->isHTML(true);                                  
            $mail->Subject = 'Email Verification';
            $mail->Body    = "Thanks for registration <br>
            click the link bellow to verifiy the email
            <a href='http://localhost/uas/php/verify.php?vemail=$vemail&vcode=$vcode'>VERIFY</a> ";
        
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    $firstname=$_GET['fname'];
    $lastname=$_GET['lname'];
    $email=$_GET['email'];
    $password=$_GET['password'];
    $gender=$_GET['r1'];
    $vc=bin2hex(random_bytes(20));

    $query="insert into singupinfo (firstname,lastname,email,password,gender,verifyc,vstatus) values('$firstname','$lastname','$email','$password','$gender','$vc','0')";
    $data=mysqli_query($conn,$query,);

    if($data && sendmail($email,$vc))
    {
        $alert=
            "<script>
                alert('Verify your email from your mail box :-)');
                window.location.href='../login.html';
            </script>";
        echo $alert;
    }
?>
