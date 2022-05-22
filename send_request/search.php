<?php
$connection = new mysqli("localhost", "root", "root", "user_info");
$search = $_POST["walid"];
 $data = $connection->query("SELECT * FROM user_profile WHERE name like '$search' ");
 $retval =  mysqli_fetch_all($data);

 foreach ($retval as $value){ ?>
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
                                        <span><input type="button"  value="Add to friend list" class="add"  name="<?= $value["0"]; ?>" ></span>
                                        <i class="fa-user-plus"></i>
                                        <span><input type="button" value="View profile" class="view" name="<?= $value["0"]; ?>"></span>
                                    </div>    
                                </div> 
                                
                                
                                
                            </div>
                        </div>    

                    
                    </div>
                </div>
                <?php }; ?>