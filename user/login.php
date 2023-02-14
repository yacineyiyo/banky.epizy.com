<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"]==="POST") {
  
  
/* protection function */

function mksefe($data){
  $data = trim($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  $data = addslashes($data);
  return $data;
}
/* protection function end */


  $email = mksefe($_POST["email"]);
  
  $pass = mksefe(md5( $_POST["pass"]));
  
  /* Check mail in the database */
  
  $check = mysqli_query($conn,"SELECT * FROM `users_site` WHERE email = '$email' AND password = '$pass'");
  $row = mysqli_fetch_assoc($check);
  
  if ($email===$row['email']&$pass===$row['password']) {
    
    $_SESSION["name"]=$row['name'];
    
    header("Location: ../index.php");
    
  }else{
    $alet_ch = true;
  }
  
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <link rel="stylesheet" href="user.css">
  <link rel="stylesheet" href="../CSS/style.css">
  
    <link rel="shortcut icon" type="image/png" href="http://www.banky.epizy.com/IMG/logo.png">
    
    <link rel="shortcut icon" type="image/png" href="http://www.banky.epizy.com/IMG/logo.png">
    
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    بنك الدم | تسجيل الدخول 
    
  </title>
</head>
<?php
 if (isset($email)) {
   if ($alet_ch===true) {
     echo"
     <style>
       .form input{
        animation: in 30ms 10;
        animation-direction: alternate;
        border: solid 1px red;
        border-radius: 3px;
        
       }
     @keyframes in{
       from{
       transform: translate(5px);
       }
       to{
       transform: translate(-5px);
       }
     }
     </style>
     ";
   }
 }
?>
<body>
  <?php include("../page/header.html"); ?>
  <center><div class="form">
    <h2> تسجيل الدخول </h2>
    <hr>
<?php
if (isset($email)) {
  if ($alet_ch===true) {
    echo" <p id='alert_2'>
               كلمة السر او البريد غير صحيح
         </p>  ";
  }
}
?>
    <form action="login.php" method="post">
      
      <input type="email" name="email" required placeholder="اكتب البريد الألكتروني">
      <br>
      <input type="password" name="pass" required placeholder="اكتب كلمة السر">
      <br>
      <button name="send" type="submit">تسجيل الدخول</button>
      <br><hr>
      <span>
          ليس لديك حساب ؟
        <a href="register.php">
          انشاء حساب 
        </a>
      </span>
    </form>
  </div></center>
  <?php include("../page/footer.html"); ?>
  <script src="../jav.js"></script>
</body>
</html>
