<?php

session_start();
// echo 'The Roll number of the student is :' . $_SESSION["id"] . '<br>';
/// fill the page with informations
$connection = new mysqli("localhost", "root", "root", "user_info");
$id = $_SESSION["id"];
$data = $connection->query(" SELECT * FROM user_profile WHERE user_id IN (SELECT sender_id FROM friend_request WHERE receiver_id='$id' AND accept='0') ");
$retval =  mysqli_fetch_all($data);


//add friend
if (isset($_POST["add"])) {

    $connection = new mysqli("localhost", "root", "root", "user_info");
    $idtoadd = $_POST["friend"];
    $insert = $connection->query("UPDATE friend_request 
    SET 
     accept = '1'
    WHERE
    sender_id = '$idtoadd' and receiver_id ='$id';"); 
    

        exit("nice");
        
}	


// ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/Logo_officiel.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="page_recherche.css">
    <title>page recherche</title>
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

            <a href="http://localhost/login/logout.php">
                <i class="fa fa-bell"></i>
            </a>

            <a href="http://localhost/setting/setting.php">
                <i class="fas fa-ellipsis-h"></i>
            </a>
        </div>
    </nav>
    <h2 style="margin: 0 0 0 0;">Profiles</h2>
    <?php foreach ($retval as $value){ ?>
    <div class="container">
        
        
        <div class="search-container">
            <div class="search-top">
                <div class="profile-informations">
                
                    <div class="index">
                        <div class="informations">
                            <img src="images/prof.png" alt="">
                            <div>
                                <h3><?= $value["1"]; ?></h3>
                                <p class="commun-friends">25 friends in commun</p>
                            </div>
                        </div>
                        <div class="wcyd">
                            <span><input type="button" value="accept friend request" id="add" name="<?= $value["0"]; ?>"></span>
                            <i class="fa-user-plus"></i>
                            <span><input type="button" value="View profile"></span>
                        </div>    
                    </div> 
                       
                    
                    
                </div>
            </div>    

        
        </div>
    </div>
    <?php }; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>   
    <script type="text/javascript">
        $(document).ready(function () {
            $(".add").on("click",function(){
                var idtoadd = $(this).attr('name');
                console.log(idtoadd)
                $.ajax(
                    {
                        type: 'POST',
                        url: 'friend.php',
                        data:{
                            add:1,
                            friend:idtoadd,
                        },
                        success: function(response){
                            console.log(response)
                            
                        },
                        datatype:'text'



                    }



                )})
            })
    </script>
</body>
</html>