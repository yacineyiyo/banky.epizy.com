<?php
session_start();
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

if ($_SERVER["REQUEST_METHOD"]==="POST") {
  $name = mksefe($_POST["name"]);
  
  $email = mksefe($_POST["email"]);
  
  $pass = mksefe(md5( $_POST["pass"]));
  
  /* Check mail in the database */
  
  $check = mysqli_query($conn,"SELECT * FROM `users_site` WHERE email = '$email'");
  $row = mysqli_fetch_assoc($check);
  
  if ( strlen($_POST["pass"])<5) {
    $pass_error = true;
 }else{$pass_error = false; }
  
  if ($email===$row['email'] or $pass_error === true) {
    $alert_check = true;
  }else{
    
  $insert = mysqli_query($conn,"INSERT INTO `users_site`(`username`, `email`, `password`) VALUES ('$name','$email','$pass')");
  
  }
  if ($insert) {
    $alert = true;
    
    $_SESSION['name']=$name;
    
  }else {
    $alert = false;
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
    بنك الدم | انشاء حساب
    
  </title>
</head>
<?php
 if (isset($email)) {
   if ($email===$row['email']) {
     echo"
     <style>
       .form input[type='email']{
        animation: in 30ms 16;
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
   
if ($pass_error===true) {
     echo"
     <style>
       .form input[type='password']{
        animation: in 30ms 16;
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
    <h2>انشاء حساب</h2>
    <hr>
<?php
/* Operation success */
  if (isset($insert)) {
 
if ($alert === true) {
  echo" <b><p id='alert_1'>
      نجاح سوف يتم تذهب للصفحة التالية بعد 5 ثواني ✓
    </p></b> ";
    header("Refresh:5; ../index.php");
}else{
  echo"<b><p id='alert_2'>
         حدث خطأ ×
       </p></b>  ";
}

}
/*If mail exists in the database*/
  if (isset($email)) {
    if ($email===$row['email']) {
      echo" <b><p id='alert_2'>
             هذا البريد مستخدم بالفعل
            </b></p> ";
    }

    if ($pass_error===true) {
      echo" <b><p id='alert_2'>
             كلمة المرور قصيرة استخدم خمسة احرف 
         </b></p> ";
    }

  }
?>
    
    <form action="register.php" method="post">
      <input type="text" name="name" required placeholder="اكتب اسمك">
      <br>
      <input type="email" name="email" required placeholder="اكتب البريد الألكتروني">
      <br>
      <input type="password" name="pass" required placeholder="اكتب كلمة السر">
      <br>
      <button name="send" type="submit">تسجيل</button>
      <br><hr>
      <span>
          هل لديك حساب بالفعال ؟ 
        <a href="login.php">
          تسجيل الدخول
        </a>
      </span>
    </form>
  </div></center>
  <?php include("../page/footer.html"); ?>
  <script src="../jav.js"></script>
</body>
</html>
