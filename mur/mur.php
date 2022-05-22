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
//////////import posts

$post = $connection->query("SELECT * FROM user_post WHERE user_id='$id' ORDER BY Id DESC; ");
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
// foreach ($comments as $value){
//     echo $value["3"];
// };









///////inserrt post
if (isset($_POST["setting"])) {
    $texttopost =$_POST["textphp"];
    $imagetochange =$_POST["imagephp"];
    $insert = $connection->query("INSERT INTO `user_post`(`user_id`, `text`, `image`) VALUES ('$id','$texttopost','$imagetochange')");
    
}	
///add comment
if (isset($_POST["setting"])) {
    $postid =$_POST["postid"]; 
    $comments =$_POST["comment"];
    
    $insert = $connection->query("INSERT INTO `post_comment`( `post_id`, `user_id`, `text`) VALUES ('$postid','$id','$comments')");
    
}	





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
    <link rel="stylesheet" href="Page_de_mur.css">
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

            <a href="http://localhost/login/logout.php">
                <i class="fa fa-bell"></i>
            </a>

            <a href="http://localhost/setting/setting.php">
                <i class="fas fa-ellipsis-h"></i>
            </a>
        </div>
    </nav>


    <div class="container">
        <div class="left-panel">
            <ul>
                <li>
                <img src="./images/profile.png"  class="profile" alt="">
              
                <p class="name"> <?= $name ?></p>
                <li>
                    <i class="fa fa-user-friends"></i>
                    <p>Amis</p>
                </li>
                <li>
                    <i class="fa fa-play-circle"></i>
                    <p>Video</p>
                </li>
                <li>
                    <i class="fa fa-users"></i>
                    <p>Groupes</p>
                </li>
                <li href="PAGES.HTML">
                    <i class="fa fa-flag"></i>
                    <p>Page</p>
                </li>
                <li>
                    <i class="fa fa-bookmark"></i>
                    <p>Signet</p>
                </li>
                <li>
                    <i class="fa fa-calendar-week"></i>
                    <p>événement</p>
                </li>
                <li>
                    <i class="fas fa-newspaper"></i>
                    <p>newslestter</p>
                </li>
                
                
            </ul>
            <div class="footer-links">
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
                <a href="#">Advence</a>
                <a href="#">More</a>
            </div>
    </div>


    <div class="middle-panel">

        <div class="story-section">

            <div class="story create">
                <div class="dp-image">
                    <img src="./images/profile.png" alt="Profile pic">
                </div>
                <span class="dp-container">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="name">Create Story</span>
            </div>

<!-- story  -->
            <div class="story">
                <img src="./images/logiciel-programmation-code-684x501.jpg" alt="Inuzuka's story">
                <div class="dp-container">
                    <img src="./images/Student 2.jpg" alt="">
                </div>
                <p class="name">Inuzuka Noline</p>
            </div>

            <div class="story">
                <img src="./images/gge-hetic-gallery4.jpg" alt="Story image">
                <span class="dp-container">
                    <img src="./images/Student 3.jpg" alt="Profile pic">
                </span>
                <span class="name">Alice Sommier</span>
            </div>

            <div class="story">
                <img src="./images/open-data-code.jpg" alt="Story image">
                <span class="dp-container">
                    <img src="./images/student_4.jpg" alt="Profile pic">
                </span>
                <span class="name">Alexis Dossile</span>
            </div>

            <div class="story">
                <img src="./images/Hard-work-is-a-key-to-success-ee45380a.jpg" alt="Story image">
                <span class="dp-container">
                    <img src="./images/icons8-team-FcLyt7lW5wg-unsplash.jpg" alt="Profile pic">
                </span>
                <span class="name">Sophie leroi</span>
            </div>
        </div>
        <!-- post create -->
        <div class="post create">
            <div class="post-top">
                <div class="dp">
                    <img src="./images/profile.png" alt="">
                </div>
                <input type="text" id="texttopost" placeholder="Quoi de neuf,<?= $name ?>?"  />
                <input type="button" value="Post" id="submitPost">
            </div>
            
            <div class="post-bottom">
                <div class="action">
                    <i class="fa fa-video"></i>
                    <span>Video en direct</span>
                </div>
                <div class="action">
                    <i class="fa fa-image"></i>
                    <img src="images/addimage.jpg" alt="" id="image" class="imgPro" width="150">
                    <span><input type="file" name="picture" class="btnPhoto" onchange="previewPicture(this)"  ></span>
                </div>
                <div class="action">
                    <i class="fa fa-smile"></i>
                    <span>Activités/Humeur</span>
                </div>
                
            </div>
        </div>
          <!-- post create -->



          <!-- post section -->
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
    <div class="right-panel">
        <div class="pages-section">
            <h4>Mes Pages</h4>
            <a class='page' href="#">
                <div class="dp">
                    <img src="./images/Logo_officiel.png" alt="">
                </div>
                <p class="name">Aide astuces devloppement</p>
            </a>

            <a class='page' href="#">
                <div class="dp">
                    <img src="./images/Female_students_White_background_Brown_haired_581560_640x960.jpg" alt="">
                </div>
                <p class="name">Marie tutoriel</p>
            </a>
        </div>

        <div class="friends-section">
            <h4>Friends</h4>
            <a class='friend' href="#">
                <div class="dp">
                    <img src="./images/Female_students_White_background_Brown_haired_581560_640x960.jpg" alt="">
                </div>
                <p class="name">Marie Lojant</p>
            </a>

            <a class='friend' href="#">
                <div class="dp">
                    <img src="./images/Student 2.jpg" alt="">
                </div>
                <p class="name">
                    Inuzuke Noline</p>
            </a>
            <a class="friend" href="#">
                <div class="dp">
                    <img src="./images/Student 3.jpg" alt="">
                </div>
                <p class="name">
                    Alice Sommier</p>
            </a>

            <a class="friend" href="#">
                <div class="dp">
                    <img src="./images/student_4.jpg" alt="">
                </div>
                <p class="name">Alexis Dossile</p>
            </a>

            <a class="friend" href="#">
                <div class="dp">
                    <img src="./images/dp.jpg" alt="">
                </div>
                <p class="name">Walid DEV</p>
            </a>

            <a class="friend" href="#">
                <div class=" dp">
                    <img src="./images/icons8-team-FcLyt7lW5wg-unsplash.jpg" alt="">
                </div>
                <p class="name">Sophie leroi</p>
            </a>
            
        </div>
    </div>
    
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" >
         let imagetopost = ""

    //upload post
     $(document).ready(function () {
            $("#submitPost").on("click",function(){
                var text = $("#texttopost").val();
                console.log(text);
                console.log(imagetopost);
                $.ajax(
                    {
                        type: 'POST',
                        url: 'mur.php',
                        data:{
                            setting:1,
                            textphp: text,
                            imagephp:imagetopost,
                        },
                        success: function(response){
                            location.reload();                            

                        },
                        datatype:'text'



                    }



                )})
            })

        //comment on post
            $(document).ready(function () {
            $(".sendcomment").on("click",function(){
                var idtoadd = $(this).attr('name');
                var comment = $(`#${idtoadd}`).val()
                console.log(idtoadd);
                console.log(comment);
                $.ajax(
                    {
                        type: 'POST',
                        url: 'mur.php',
                        data:{
                            comments:1,
                            postid: idtoadd,
                            comment:comment,
                        },
                        success: function(response){
                            location.reload();                            

                        },
                        datatype:'text'



                    }



                )})
            })
     ///// image change and  change to base 64

    var image = document.getElementById("image");
        var previewPicture  = function (e) {
        const [picture] = e.files
        if (picture) {
            image.src = URL.createObjectURL(picture)
            toDataURL(image.src, function(dataURL){
        imagetopost = dataURL      
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