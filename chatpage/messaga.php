<?php 

$connection = new mysqli("localhost", "root", "root", "user_info");
$id = $_POST["id"];
$idtosned =$_POST["idtosend"];
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
            <?php };
?>
    </div>
    <?php }; ?>
