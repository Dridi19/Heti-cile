<?php
session_start();
$id = $_SESSION["id"];
if (isset($_POST["create"])) {

    $connection = new mysqli("localhost", "root", "root", "user_info");
    $description = $_POST["description"];
    $name =$_POST["name"];
    $image =$_POST["image"];
    $insert = $connection->query("INSERT INTO `page_info`(`owner_id`, `name`, `image`, `decription`) VALUES ('$id','$name','$image','$description')");
    exit($id);
}	


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&family=Work+Sans:wght@200&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/Logo_officiel.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Page_de_page.css">
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
    <div class="container">
        <div class="creatpage">
            
            <div class="creatPage" >
                <h2 class="section-title">Crée une page</h2>
                <div class="imagegrp">
                    <img src="images/Aplaceholder.png" alt="" id="image" class="imgPro" width="300">
                        <input type="file" value="ajouter une photo" name="picture" class="btnPhoto" onchange="previewPicture(this)"  >
                
                </div>
                <div class="input-box">
                    <span class="details">Nom de la page:</span>
                    <input type="text"  id="name" placeholder="Ecrit le nom du groupe...">
                </div>
                <div class="input-box">
                    <span class="details">Déscription de la page:</span>
                    <input type="text" id="description" placeholder="Ecrit une description du groupe...">
                </div>

                <div class="visitgrp">
                    <button class="button" id="create">Crée la page</button>
                </div>
            </div>
        </div> 
        <h2 class="section-title">Autre pages a visiter</h2> 
        <div class="pagespublic">
            <div class="pagespublic2">
                <div>
                    <button class="icon" onclick="scrolll()"><i class="fas fa-angle-double-left"></i></button>
                </div>
                <div class="scroll-main">
                    <div class="pages-scroller">
                        <div class="pages" id="page1">
                            <img src="images/676a464a-0e04-4cb5-89eb-15f86578ee83-cover.png" alt="imgpage" class="imgpage" >
                            <p class="titleG">Free wireframes</p>
                            <div class="pagemembers">
                            </div>
                            <div class="visitpage">
                                <button class="button">rejoindre le groupe</button>
                            </div>
                        </div>
                        <div class="pages">
                            <img src="images/watch-4638673__340.webp" alt="imgpage" class="imgpage">
                            <p class="titleG">The time is everything</p>
                            <div class="pagemembers">
                            </div>
                            <div class="visitpage">
                                <button class="button">rejoindre le groupe</button>
                            </div>
                        </div>
                        <div class="pages">
                            <img src="images/workspace-1280538__340.webp" alt="imgpage" class="imgpage">
                            <p class="titleG">Toronto</p>
                            <div class="pagemembers">
                            </div>
                            <div class="visitpage">
                                <button class="button">rejoindre le groupe</button>
                            </div>
                        </div>
                        <div class="pages">
                            <img src="images/Female_students_White_background_Brown_haired_581560_640x960.jpg" alt="imgpage" class="imgpage">
                            <p class="titleG">Lets study</p>
                            <div class="pagemembers">
                            </div>
                            <div class="visitpage">
                                <button class="button">rejoindre le groupe</button>
                            </div>
                        </div>
                        <div class="pages">
                            <img src="images/woman-7165664__340.webp" alt="imgpage" class="imgpage">
                            <p class="titleG">Everyone222</p>
                            <div class="pagemembers">
                            </div>
                            <div class="visitpage">
                                <button class="button">rejoindre le groupe</button>
                            </div>
                        </div>
                        <div class="pages">
                            <img src="images/bookshelf-413705__340.webp" alt="imgpage" class="imgpage">
                            <p class="titleG">LibraryTime</p>
                            <div class="pagemembers">
                            </div>
                            <div class="visitpage">
                                <button class="button">rejoindre le groupe</button>
                            </div>
                        </div>
                        <div class="pages">
                            <img src="images/icons8-team-FcLyt7lW5wg-unsplash.jpg" alt="imgpage" class="imgpage">
                            <p class="titleG">Geeks</p>
                            <div class="pagemembers">
                            </div>
                            <div class="visitpage">
                                <button class="button">rejoindre le groupe</button>
                            </div>
                        </div>
                        <div class="pages">
                            <img src="images/On-profite-du-beau-temps.jpg" alt="imgpage" class="imgpage">
                            <p class="titleG">WeekendTime</p>
                            <div class="pagemembers">
                            </div>
                            <div class="visitpage">
                                <button class="button">rejoindre le groupe</button>
                            </div>
                        </div>
                        <div class="pages">
                            <img src="images/Student 3.jpg" alt="imgpage" class="imgpage">
                            <p class="titleG">Hello</p>
                            <div class="pagemembers">
                            </div>
                            <div class="visitpage">
                                <button class="button">rejoindre le groupe</button>
                            </div>
                        </div>        
                    </div>
                </div>
                <div>
                    <button class="icon" onclick="scrollr()"><i class="fas fa-angle-double-right"></i></button>
                </div>
            </div>
        </div>
    </div>  

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" >
         let imagetosave = ""
     $(document).ready(function () {
            $("#create").on("click",function(){
                var description = $("#description").val();
                var name = $("#name").val();
                $.ajax(
                    {
                        type: 'POST',
                        url: 'page.php',
                        data:{
                            create:1,
                            name:name,
                            description:description,
                            image:imagetosave,
                        },
                        success: function(response){
                            console.log(response)
                        },
                        datatype:'text'



                    }



                )
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

<script>
    function scrolll(){
        var left = document.querySelector(".groups-scroller");
        left.scrollBy(-350, 0)
    }
    function scrollr(){
        var right = document.querySelector(".groups-scroller");
        right.scrollBy(350 , 0)
    }
</script>
</html>