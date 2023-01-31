<?php
require 'config/db.php';
require 'includes/users.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_id = $_POST['user_id'];
  // gettting the id of user 
 //delete
 
 $Users = (new App\Classes\Users())->delete($GLOBALS['pdo'],$user_id);
 if($Users){
  header("Location: gestionusers.php");
 }



}
?>