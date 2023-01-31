<?php
require 'config/db.php';
require 'includes/users.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $user_id = $_POST['user_id2'];
  // gettting the id of user 
 //edit

    session_start();
    $_SESSION['user_id_target'] = $user_id;
    
    header('Location: Modifier_user_user.php');
    
}



?>