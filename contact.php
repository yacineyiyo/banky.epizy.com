<?php
session_start();
$conn = mysqli_connect('sql207.epizy.com','epiz_31254421','N0MbPasxLb2','epiz_31254421_test');

?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <link rel="stylesheet" href="CSS/style.css">
  
    <link rel="shortcut icon" type="image/png" href="http://www.banky.epizy.com/IMG/logo.png">
    
    <link rel="shortcut icon" type="image/png" href="http://www.banky.epizy.com/IMG/logo.png">
    
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    بنك الدم | تواصل معنا
  </title>
</head>
<body>
  
  <?php include("page/header.html"); ?>
  
    <center><div class="contact-form">
      <div id="img-form">
      <img src="IMG/connect.svg" width="100%"></div>
      <h3> تواصل معنا </h3>
     <div id="form"> <form action="" method="post">
        
        <div id="inp_1">
        <input type="text" name="name" placeholder=" اكتب اسمك هنا " required>
        
        <input type="number" name="phone" placeholder=" اكتب رقم الهاتف هنا " required>
        </div>
        
        <div id="inp_2">
        <input type="email" name="email" placeholder=" اكتب بريدك الالكتروني هنا " required>
        </div><br>
        
        <textarea name="massage" required placeholder=" اكتب رسالتك هنا "></textarea><br>
        
        <div id = "but_1">
        <button name="send" type="submit"> ارسال </button>
        </div>
        
      </form></div>
      
    </div></center>
 <?php include("page/footer.html"); ?>
</body>
</html>
