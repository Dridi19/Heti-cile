<?php

session_start();

	if (isset($_SESSION["id"]) && isset($_SESSION["loggedIn"])) {
		header("Location: http://localhost/setting/setting.php");
		exit();
	}

	if (isset($_GET["login"])) {
		$connection = new mysqli("localhost", "root", "root", "user_info");
		
		$email = $_GET["emailphp"];
		$password =$_GET["passwordphp"];
		$data = $connection->query("SELECT user_id FROM user_profile WHERE email='$email' AND password='$password'");

        $row = mysqli_fetch_assoc($data);
        $id = (string)$row["user_id"]["0"];    
		if ($data->num_rows > 0) {
           
			$_SESSION["id"] = $id;
			$_SESSION["loggedIn"] = 1;
			exit("<p>success</p>");

		} else {
			
			exit("<p>Please check your inputs!</p>") ;
		}
	}	

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Connecting page</title>
</head>
<body>
    <div class="form-container">

        <form action="" method="GET">
            <h3>Enter your account</h3>
            <input type="text" name="email" id="email" required placeholder="Enter your email">
            <input type="password" name="password" id="password" required placeholder="Enter your password">
            <input type="button" id="Connect" value="Connect">
            <p>don't have an account ? <a href="http://localhost/create/create.php">Create now</a></p>
        </form>

    </div>
    <div id="response"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#Connect").on("click",function(){
                var email = $("#email").val();
                var password = $("#password").val();
                var email_regex=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                var password_regex1=/([a-z].*[A-Z])|([A-Z].*[a-z])([0-9])+([!,%,&,@,#,$,^,*,?,_,~])/;
                if(email_regex.test(email)==false)
                {
                alert("Please Enter Correct Email");
                }
                else if(password.length<8 || password_regex1.test(password)==false )
                {
                alert("Please Enter Strong Password");
                }
                else{

                $.ajax(
                    {
                        url: 'login.php',
                        data:{
                            login:1,
                            emailphp:email,
                            passwordphp:password,
                        },
                        success: function(response){
                            $("#response").html(response);

                    
                            if (response.indexOf('success') >= 0)
                                window.location = 'http://localhost/setting/setting.php'
                            
                        },
                        datatype:'text'



                    }



                )}
            })
        })
    </script>
</body>
</html>