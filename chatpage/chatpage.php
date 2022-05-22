<?php

session_start();
// echo 'The Roll number of the student is :' . $_SESSION["id"] . '<br>';
/// fill the page with informations
$idtosned =$_SESSION["idtomessage"];
$connection = new mysqli("localhost", "root", "root", "user_info");
$id = $_SESSION["id"];
///import user info
$data = $connection->query("SELECT * FROM user_profile WHERE user_id='$id'");
$row = mysqli_fetch_assoc($data);
$name = (string)$row["name"];
$email = (string)$row["email"];
$phone = (string)$row["phone"];
$image = (string)$row["image"];
$image = str_replace('data:image/png;base64,', '', $image);
$image = str_replace(' ', '+', $image);
$data = base64_decode($image);
$file = "ressources/" . "profile" . '.png';
$success = file_put_contents($file, $data);



///send message
if (isset($_POST["chat"])) {

    $email = $_POST["message"];

    $send = $connection->query("INSERT INTO `message`(`sender_id`, `receiver_id`, `message`) VALUES ('$id','$idtosned','$email')");


}
	
if (isset($_POST["delete"])) {

    $idtodelete = $_POST["messageid"];

    $delet = $connection->query("DELETE FROM `message` WHERE id='$idtodelete'");


}



// ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Chat</title>
    <link rel="stylesheet" href="../chatpage.css">
</head>
<body>

<div class="chat-global">

    <div class="nav-top">
        <div class="location" id="back">
            <img src="../ressources/left-chevron.svg">
            <p><a href="http://localhost/mur/mur.php" class="active">back</a></p>
        </div>

        <div class="utilisateur">
            <p><?= $name ?></p>
            <p>Active Now</p>
        </div>

        <div class="logos-call">
            <img src="../ressources/phone.svg">
            <img src="../ressources/video-camera.svg">
        </div>
    </div>

    <div class="conversation">
                <div id="tochange" class="<?= $id ?>" name="<?= $idtosned; ?>">
                    <?php 
                    $data = $connection->query(" SELECT  * FROM ( SELECT * FROM message ORDER BY Id DESC LIMIT 4 )Var1 WHERE sender_id in( $id , $idtosned) And receiver_id in( $id , $idtosned) ORDER BY Id ASC ; " );
                    $retval =  mysqli_fetch_all($data);
                    foreach ($retval as $value){ ?>
                        <?php if($value["1"] == $id){ ?>
                        <div class="talk left">
                        <img src="../ressources/profile.png">
                            <?php } else{ ?>
                                <div class="talk right">
                                <img src="../ressources/profile.png">
                                <?php } ?>
                           
                            
                            <p><?= $value["3"]; ?></p>
                            <?php if($value["1"] == $id){ ?>
        <input type="submit" value="delete" class="delete" id="<?= $value["0"] ?>">
            <?php };?>
                        </div>
                        
                        <?php }; ?>
                        
                </div>

        <form class="chat-form">

            <div class="container-input-stuffs">

                <div class="files-logo-cont">
                    <img src="../ressources/paperclip.svg">
                </div>

                <div class="group-inp">
                    <input type="text" placeholder="Enter your message here" id="walid" minlength="1" maxlength="2222" >
                    <img src="../ressources/smile.svg">
                </div>

            <input type="button" class="submit-msg-btn" id="send" value="Send">

            </div>

        </form>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>   
    <script type="text/javascript">
        $(document).ready(function () {
            $("#send").on("click",function(){
                var email = $("#walid").val();
                console.log(email);
                $.ajax(
                    {
                        type: 'POST',
                        url: 'chatpage.php',
                        data:{
                            chat:1,
                            message:email,
                        },
                        success: function(response){
                            console.log(response)
                            // location.reload();                            
                        },
                        datatype:'text'



                    }



                )})})
//                 function loadlink(){
//                     location.reload();
// }


    $(document).ready(function(){
        setInterval(function(){
                var id =  $("#tochange").attr('class');
                var idtosend =$("#tochange").attr('name');
                $("#tochange").load("../messaga.php",{
                 id:id,
                 idtosend:idtosend,
                });
                
                
            }, 4000);
          
        })
    // setInterval(function(){
    //     location.reload();                            

    // }, 8000);
    $(document).ready(function () {
            $(".delete").on("click",function(){
                var messageid = $(this).prop('id');
                console.log(messageid);
                $.ajax(
                    {
                        type: 'POST',
                        url: 'chatpage.php',
                        data:{
                            delete:1,
                            messageid:messageid,
                        },
                        success: function(response){
                            console.log(response)
                            // location.reload();                            
                        },
                        datatype:'text'



                    }



                )
            })})

            $(document).ready(function () {
            $("#back").on("click",function(){
                var email = $("#walid").val();
                console.log(email); })})
    </script>
</body>
</html>