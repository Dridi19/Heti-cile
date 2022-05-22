<?php

if (isset($_GET["create"])) {

    $connection = new mysqli("localhost", "root", "root", "user_info");
    $email = $_GET["emailphp"];
    $password = $_GET["passwordphp"];
    $name =$_GET["namephp"];
    
    $emailcheck = $connection->query("SELECT * FROM user_profile WHERE email='$email'");
    if(mysqli_num_rows($emailcheck)>0)
    {
        echo "Email Id Already Exists"; 
        exit;
    }
     else{            
           
        $insert = $connection->query("INSERT INTO user_profile(name, email, password ) VALUES ('$name', '$email', '$password')");

        
        header ("Location: login.php?status=success");
               }
}	


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create.css">
    <title>Connecting page</title>
</head>
<body>
    <div class="form-container">

        <form action="">
            <h3>Create your account</h3>

            <input type="text" name="name" id="name" required placeholder="Enter your name">
            <input type="email" name="email" id ="email" required placeholder="Create your email">
            <input type="password" name="password" id="password" required placeholder="Create your password">
            <input type="password" name="cpassword" id="cpassword" required placeholder="Confirm your password">
            <input type="button" id="registernow" value="Resgister now">
            <p>Already have an account ? <a href="http://localhost/login/login.php">Login now </a></p>
        </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#registernow").on("click",function(){
                var email = $("#email").val();
                var password = $("#password").val();
                var name = $("#name").val();
                var cpassword = $("#cpassword").val();
                var email_regex=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                var password_regex1=/([a-z].*[A-Z])|([A-Z].*[a-z])([0-9])+([!,%,&,@,#,$,^,*,?,_,~])/;
                if(email_regex.test(email)==false)
                {
                alert("Please Enter Correct Email");
                }
                else if(password.length<8 || password_regex1.test(password)==false || password!=  cpassword )
                {
                alert("Please Enter Strong Password");
                }
                else{

                $.ajax(
                    {
                        url: 'create.php',
                        data:{
                            create:1,
                            emailphp:email,
                            namephp:name,
                            passwordphp:password,
                        },
                        success: function(response){
                            console.log(response)
                        },
                        datatype:'text'



                    }



                )}
            })
        })
    </script>
</body>
</html>