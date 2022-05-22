<?php

session_start();
// echo 'The Roll number of the student is :' . $_SESSION["id"] . '<br>';
/// fill the page with informations
$connection = new mysqli("localhost", "root", "root", "user_info");
$id = $_SESSION["id"];
$data = $connection->query("SELECT * FROM user_profile WHERE user_id='$id'");
$row = mysqli_fetch_assoc($data);
$name = (string)$row["name"];
$email = (string)$row["email"];
$phone = (string)$row["phone"];
$image = (string)$row["image"];
$image = str_replace('data:image/png;base64,', '', $image);
$image = str_replace(' ', '+', $image);
$data = base64_decode($image);
$file = "images/" . "profile" . '.png';
$success = file_put_contents($file, $data);
//////////
///////save changes
if (isset($_POST["setting"])) {
    $email = $_POST["emailphp"];
    $password = $_POST["passwordphp"];
    $name =$_POST["namephp"];
    $phone =$_POST["phonephp"];
    $imagetochange =$_POST["imagephp"];
    $insert = $connection->query("UPDATE user_profile SET 
        name = '$name',
        email = '$email', 
        password = '$password',
        phone = '$phone',
        image = '$imagetochange'
    WHERE
        user_id = '$id';");
    
}	




?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>SETTINGS</title>
        <link href="style1.css" type="text/css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="shortcut icon" href="./images/Logo_officiel.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&family=Work+Sans:wght@200&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    
    <nav>
        <div class="nav-left">
            <img src="./images/Logo_officiel.png" alt="Logo">
            <input type="text" placeholder="Rechercher sur Heti-Cile...">
        </div>

        <div class="nav-middle">
            <a href="http://localhost/mur/mur.php" class="active">
                <i class="fa fa-home"></i>
            </a>
                <a href="http://localhost/send_request/friend.php" >
                        <i class="fa fa-user-friends"></i>
                    </a>
                <a href="http://localhost/friendlist/friend.php" >
                    <i class="fa fa-play-circle"></i>
                </a>
                
                <a href="http://localhost/friend_requests/friend.php" >
                    <i class="fa fa-user"></i> 
                </a>
                
                             
            </div>

        <div class="nav-right">
            <span class="profile"></span>

            <a href="http://localhost/login/logout.php">
                <i class="fa fa-bell"></i>
            </a>

            <a href="http://localhost/setting/setting.php">
                <i class="fas fa-ellipsis-h"></i>
            </a>
        </div>
    </nav>
        <div class="container">
            <div class="title2">Personnal infos</div>
            <form action="#">
                <div class="user-details">
                    <div class="img">
                        <img src="images/profile.png" alt="" id="image" class="imgPro" width="150">
                        <input type="file" name="picture" class="btnPhoto" onchange="previewPicture(this)"  >
                    </div>
                    <div class="input-box">
                        <span class="details">User name</span>
                        <input type="text" id="name" value="<?= $name ?>" placeholder="Type your username...">
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" id="email" value="<?= $email ?>" placeholder="Type your email...">
                    </div>
                    <div class="input-box">
                        <span class="details">Phone number</span>
                        <input type="phone" id="phone" value="<?= $phone ?>" placeholder="Type your number...">
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" value="nice try :)" id="password" placeholder="Type your new password">
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm password</span>
                        <input type="password" value="nice try :)" id="cpassword" placeholder="Confirm your new password">
                    </div>

                </div>
                
                <input type="button" class="button" id="save" value="Save modification">
                <div class="supp">
                    <div class="title2">Delete account</div>
                    <div>
                        <div class="suppQ">
                            <span>Voulez vous désactiver/supprimer votre compte?</span>
                        </div>
                        <div class="check-box">
                            <input id="check-box" type="checkbox" id="checkboxDesactiver">
                            <span>Désactiver</span>
                        
                        </div>
                        <div class="check-box">
                            <input id="check-box" type="checkbox" id="checkboxSupprimer">
                            <span>Supprimer</span>
                        </div>
                       
                        <button class="button" type="button">confirmer</button>
                    </div>
                        
                </div>
                
                
            </form> 
        </div>      
        
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" >
         let imagetosave = ""
     $(document).ready(function () {
            $("#save").on("click",function(){
                var email = $("#email").val();
                var password = $("#password").val();
                var name = $("#name").val();
                var cpassword = $("#cpassword").val();
                var phone = $("#phone").val();
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
                        type: 'POST',
                        url: 'setting.php',
                        data:{
                            setting:1,
                            emailphp:email,
                            namephp:name,
                            passwordphp:password,
                            phonephp: phone,
                            imagephp:imagetosave,
                        },
                        success: function(response){
                            console.log(response)
                        },
                        datatype:'text'



                    }



                )}
            })
        })
     ///// image change and  change to base 64

    var image = document.getElementById("image");
        var previewPicture  = function (e) {
        const [picture] = e.files
        if (picture) {
            image.src = URL.createObjectURL(picture)
            toDataURL(image.src, function(dataURL){
        imagetosave = dataURL
        console.log(dataURL);      
    })
        }
    } 



    /// image to base64 
    function toDataURL(src, callback){
    var image = new Image();
    image.crossOrigin = 'Anonymous';
 
    image.onload = function(){
      var canvas = document.createElement('canvas');
      var context = canvas.getContext('2d');
      canvas.height = this.naturalHeight;
      canvas.width = this.naturalWidth;
      context.drawImage(this, 0, 0);
      var dataURL = canvas.toDataURL('image/png');
      callback(dataURL);
    };
    image.src = src;
  }
      
    </script>
</html>