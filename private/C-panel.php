<?php
include("config.php");
if (!$_SESSION["user"]) {
   header("Location: login.php");
}
$fetch = mysqli_query($conn,"SELECT * FROM `oop_data` ORDER BY id DESC");

$fetch2 = mysqli_query($conn,"SELECT * FROM users_site");

$num2 = mysqli_num_rows($fetch2);

$num = mysqli_num_rows($fetch);
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../CSS/style.css">
  
<!--fontawesome icons link-->
<script src="https://kit.fontawesome.com/1f8f668dd4.js" crossorigin="anonymous"></script>
<!--fontawesome icons end-->

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> 
  بنك الدم | لوحة التحكم
  </title>
</head>
<body>
  <center><div class="cont">
    
    <h2>
      لوحة التحكم
    </h2><hr>
    <ul class="carts-bar">
    <li id="cart">
      <i class="fa-solid fa-users"></i>
      <br>
      
      <span>
        عدد الاعضاء المسجلين: 
        <?php 
        echo $num2;
        ?>
      </span>
      
      <br><br>
      <a href="users-site.php">
      ادارة المستخدمين
      </a>
    </li>
    
     <li id="cart">
       <i class="fa-solid fa-heart"></i>
       <br>
       <span> 
        عدد المتبرعين : 
        <?php echo $num; ?>
       </span>
       <br><br>
      <a href="donors.php">
       ادارة المتبرعين
      </a>
    </li>
    
    </ul>
    
  </div></center>
</body>
</html>
