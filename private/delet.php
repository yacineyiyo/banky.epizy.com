<?php
include("config.php");
if (!$_SESSION["user"]) {
   header("Location: login.php");
}
$id = $_GET['id'];

 if (isset($id)) {

   if (!empty($id)) {

$delet = mysqli_query($conn,"DELETE FROM `oop_data` WHERE id = '$id'");
 
    if ($delet) {
      header("Location: donors.php");
    }else {
      echo"«« ERROR »»";
    }

   }

}

$user_id = $_GET['id_user'];

if (isset($user_id)&&!empty($user_id)) {
  
  
$delet = mysqli_query($conn,"DELETE FROM `users_site` WHERE id_user = '$user_id'");
}
 if($delet){
   
   header("Location: index.php");
   
 }

?>
