<?php
$id = 2;
session_start();

$idtosned =$_SESSION["idtocheck"];
$id = $_SESSION["id"];

$connection = new mysqli("localhost", "root", "root", "user_info");
$data = $connection->query("SELECT * FROM user_profile WHERE user_id='$idtosned'");
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
$connection = new mysqli("localhost", "root", "root", "user_info");
$post = $connection->query("SELECT * FROM user_post WHERE user_id='$idtosned' ORDER BY Id DESC; ");
$posts =  mysqli_fetch_all($post);
foreach ($posts as $value){
        $image = str_replace('data:image/png;base64,', '', $value["3"]);
        $image = str_replace(' ', '+', $image);
        $data = base64_decode($image);
        $file = "images/" . $value["0"] . '.png';
        $success = file_put_contents($file, $data);
    };
////import comments
$comment = $connection->query(" SELECT * FROM post_comment WHERE post_id IN (SELECT id FROM user_post WHERE user_id='$id')");
$comments =  mysqli_fetch_all($comment);
?> 


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
    <link rel="stylesheet" href="page_profile.css">
    <title>Heti-Cile</title>
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

    <div class="cover-container">
        <div class="photo-container">

            
        </div>
            
        <div class="profile">
            <div class="profile-informations">
                <img src="images/profile.png" alt="">
                <h2 class="profile-name"><?= $name ?></h2>
            </div>

        </div>
        <hr>
    </div>

    <div class="posts">
    <?php foreach ($posts as $value){  ?>
          <div class="post">
            <div class="post-top">
                <div class="dp">
                    <img src="./images/profile.png" alt="">
                </div>
                <div class="post-info">
                    <p class="name"><?= $name ?></p>
                    <span class="time"><?= $value["4"] ?></span>
                </div>
                <i class="fas fa-ellipsis-h"></i>
            </div>

            <div class="post-content">
                
                <p><?= $value["2"] ?></p>
                <img src="./images/<?= $value["0"] ?>.png" />
                    

            </div>
            
            <div class="post-bottom">
                <div class="action">
                    <i class="far fa-thumbs-up"></i>
                    <span>Like</span>
                </div>
                <div class="action">
                    <i class="far fa-comment"></i>
                    <span>Comment</span>
                </div>
                <div class="action">
                    <i class="fa fa-share"></i>
                    <span>Share</span>
                </div>
            </div>
            <div class="comment-container">
                <div class="the comment"></div>
            </div>
            <hr color="#ccc"> 
            <div class="post-comment" style="margin: 10px 0;">
                <div class="the-comment">
                    
                    <img style="width: 40px; height: 40px; border-radius: 50%;" src="images/profile.png" alt="">
                    <input class="write-comment" type="text" placeholder="Write a comment" id="<?= $value["0"] ?>">
                    <input type="button" class="sendcomment" name="<?= $value["0"] ?>" value="send">
                        
                </div>
                <?php foreach ($comments as $val){
                        if($value["0"] == $val["1"]){
                        $idd= $val["2"];
                        $data_id = $connection->query("SELECT * FROM user_profile WHERE user_id='$idd'");
                        $raw = mysqli_fetch_assoc($data_id);
                        $poster_id = (string)$raw["name"]; ?>


                <div class="comments">
                    <img src="images/profile.png" style="border-radius: 50%;" width="40px" height="40px" alt="">
                    <div class="the-real-comment">
                        <h4><?=  $poster_id; ?></h4>
                        <p><?=  $val["3"]; ?></p>
                        
                    </div>
                    

                </div>
                
                 <?php }; }; ?>
            </div>
        </div> <?php }; ?>
    </div>
</body>
</html>