<?php
session_start();
$id = $_SESSION["id"];
if (isset($_POST["create"])) {

    $connection = new mysqli("localhost", "root", "root", "user_info");
    $description = $_POST["description"];
    $name =$_POST["name"];
    $image =$_POST["image"];
    $private =$_POST["private"];
    
    $insert = $connection->query("INSERT INTO `group_info`( `owner_id`, `name`, `image`, `description`, `private`) VALUES ('$id','$name','$image','$description','$private')");
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
    <link rel="stylesheet" href="Page_de_groups.css">
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
        <div class="creatGrp">
            
            <div class="creatgroup" >
                <h2 class="section-title">Crée un groupe</h2>
                <div class="imagegrp">
                <img src="images/Aplaceholder.png" alt="" id="imagegrp" class="imgPro" width="300">
                        <input type="file" value="ajouter une photo" name="picture" class="btnPhoto" onchange="previewPicture(this)"  >
                    <!-- <img src="images/Aplaceholder.png" alt="imggrp" id="imagegrp" width="300">
                    <button class="btnPhoto">ajouter une photo</button> -->
                </div>
                <div class="input-box">
                    <span class="details">Nom du groupe:</span>
                    <input type="text" id="name"  placeholder="Ecrit le nom du groupe...">
                </div>
                <label class="modegroupe" id="ckbox">
                    <span class="details">Mode du groupe:</span>
                    <div class="checkbox-grp">
                        <input class="checkbox-input" type="checkbox" name="groupprive" id="ckbox" >
                        <span class="checkbox-input-txt">Groupe privé</span>
                    </div>
                  
                </label>
                <div class="input-box">
                    <span class="details">Déscription du groupe:</span>
                    <input type="text" id="description"  placeholder="Ecrit une description du groupe...">
                </div>
                <!-- <div class="input-box">
                    <span class="details">Ajouter des personnes au groupe:</span>
                    <input type="text"  placeholder="Username...">
                    <button class="buttonadd">Ajouter</button>
                </div> -->
                <div class="visitgrp">
                    <button class="button" id="create">Crée le groupe</button>
                </div>
            </div>
        </div> 
        <h2 class="section-title">Groupes publics</h2> 
        <div class="groupspublic">
            
            <div class="groupspublic2">
                <div>
                    <button class="icon" onclick="scrolll()"><i class="fas fa-angle-double-left"></i></button>
                </div>
                <div class="scroll-main">
                    <div class="groups-scroller">
                        <div class="groups" id="group1">
                            <img src="images/676a464a-0e04-4cb5-89eb-15f86578ee83-cover.png" alt="imggrp" class="imggroup" >
                            <p class="titleG">Free wireframes</p>
                            <div class="grpmembers">
                                <img src="images/flowers.jpg" class="imgmembers" alt="grpmemebers" width="50">
                                <img src="images/flowers.jpg" class="imgmembers" alt="grpmemebers" width="50">
                                <img src="images/flowers.jpg" class="imgmembers" alt="grpmemebers" width="50">
                                <img src="images/flowers.jpg" class="imgmembers" alt="grpmemebers" width="50">
                            </div>
                            <div class="visitgrp">
                                <button class="button">rejoindre le groupe</button>
                            </div>
                        </div>
                        <div class="groups">
                            <img src="images/watch-4638673__340.webp" alt="imggrp" class="imggroup">
                            <p class="titleG">The time is everything</p>
                            <div class="grpmembers">
                                <img src="images/flowers.jpg" class="imgmembers" alt="grpmemebers" width="50">
                                <img src="images/flowers.jpg" class="imgmembers" alt="grpmemebers" width="50">
                                <img src="images/flowers.jpg" class="imgmembers" alt="grpmemebers" width="50">
                                <img src="images/flowers.jpg" class="imgmembers" alt="grpmemebers" width="50">
                            </div>
                            <div class="visitgrp">
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
        <h2 class="section-title">Groupes privés</h2> 
        <div class="groupspublic">
            
            <div class="groupspublic2">
                <div>
                    <button class="icon" onclick="scrolll()"><i class="fas fa-angle-double-left"></i></button>
                </div>
                <div class="scroll-main">
                    <div class="groups-scroller">
                        <div class="groups" id="group1">
                            <img src="images/676a464a-0e04-4cb5-89eb-15f86578ee83-cover.png" alt="imggrp" class="imggroup" >
                            <p class="titleG">Free wireframes</p>
                            <div class="grpmembers">
                                <img src="images/flowers.jpg" class="imgmembers" alt="grpmemebers" width="50">
                                <img src="images/flowers.jpg" class="imgmembers" alt="grpmemebers" width="50">
                                <img src="images/flowers.jpg" class="imgmembers" alt="grpmemebers" width="50">
                                <img src="images/flowers.jpg" class="imgmembers" alt="grpmemebers" width="50">
                            </div>
                            <div class="visitgrp">
                                <button class="button">Demande de rejoindre</button>
                            </div>
                        </div>
                        <div class="groups">
                            <img src="images/watch-4638673__340.webp" alt="imggrp" class="imggroup">
                            <p class="titleG">The time is everything</p>
                            <div class="grpmembers">
                                <img src="images/flowers.jpg" class="imgmembers" alt="grpmemebers" width="50">
                                <img src="images/flowers.jpg" class="imgmembers" alt="grpmemebers" width="50">
                                <img src="images/flowers.jpg" class="imgmembers" alt="grpmemebers" width="50">
                                <img src="images/flowers.jpg" class="imgmembers" alt="grpmemebers" width="50">
                            </div>
                            <div class="visitgrp">
                                <button class="button">Demande de rejoindre</button>
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

<script type="text/javascript">
    function scrolll(){
        var left = document.querySelector(".groups-scroller");
        left.scrollBy(-350, 0)
    }
    function scrollr(){
        var right = document.querySelector(".groups-scroller");
        right.scrollBy(350 , 0)
    }
    let imagetosave = ""
    $(document).ready(function () {
            $("#create").on("click",function(){
                var description = $("#description").val();
                var name = $("#name").val();
                var private = $("input[id=ckbox]").is(':checked');
                console.log(description,name,private)
                $.ajax(
                    {
                        type: 'POST',
                        url: 'group.php',
                        data:{
                            create:1,
                            name:name,
                            description:description,
                            private:private,
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












    //
var image = document.getElementById("imagegrp");
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