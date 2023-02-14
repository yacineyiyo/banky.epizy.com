<?php
include("config.php");

/* protection function */
 
function mksefe($data){
  $data = trim($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  $data = addslashes($data);
  return $data;
}
/* protection function end */

 $kay = 'kame_1998';
 
 $byt = '1234567812345678';

$id = mksefe($_GET['id']);
if (!empty($id)) {

$fetch = mysqli_query($conn,"SELECT * FROM `oop_data` WHERE id = '$id' ORDER BY id DESC");
 
 $row = mysqli_fetch_assoc($fetch);
 
 
 
}else {
  header("Location: http://www.banky.epizy.com/app/get.php");
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <link rel="stylesheet" href="app.css">
  <link rel="stylesheet" href="../CSS/style.css">
  
    <link rel="shortcut icon" type="image/png" href="http://www.banky.epizy.com/IMG/logo.png">
    
    <link rel="shortcut icon" type="image/png" href="http://www.banky.epizy.com/IMG/logo.png">
    
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    بنك الدم | 
    المتبرع/ة البدم | <?php
    echo openssl_decrypt($row['Name'],'AES-256-CBC',$kay,0,$byt);
   ?>
  </title>
</head>
<body>
  <?php include("../page/header.html"); ?>
  <div class="cont">
    <center>
    <div id="user-cart">
      
      <img src="../IMG/user.jpg" alt="user img" width="100px">
      <h3> المتبرع/ة: 
   <?php
    echo openssl_decrypt($row['Name'],'AES-256-CBC',$kay,0,$byt);
   ?>
      </h3><hr>
      
     <ul>
       <li id="i1"> 
       رقم الهاتف : 
   <?php
     echo openssl_decrypt($row['Phone'],'AES-256-CBC',$kay,0,$byt);
   ?>
       </li>
       
       <li id="i2"> 
       الولاية : 
  <?php
    echo openssl_decrypt($row['Stats'],'AES-256-CBC',$kay,0,$byt);
  ?>
       </li>
       
       <li id="i1"> 
       العمر : 
       <?php
     echo openssl_decrypt($row['Age'],'AES-256-CBC',$kay,0,$byt);
       ?> سنة
       </li>
       
       <li id="i2"> 
       نوع الدم : 
   <?php echo $row['Type_blood']; ?> 
       </li>
       
       <li id="i1">
         الجنس: 
     <?php
      echo openssl_decrypt($row['Sex'],'AES-256-CBC',$kay,0,$byt);
     ?>
       </li>
       
       <li id="i2">
         تاريخ التسجيل : 
   <?php echo $row['Date']; ?>
       </li>
       
     </ul><br>
      
      <button>
     <a href="tel:<?php 
      echo openssl_decrypt($row['Phone'],'AES-256-CBC',$kay,0,$byt);
     ?>"  style="text-decoration: none;color: white">
       
       الاتصال الان
       
     </a> 
      </button>
      
    </div></center>
    
  </div><br>
  <?php include("../page/footer.html"); ?>
  <script src="../jav.js"></script>
</body>
</html>
