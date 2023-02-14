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
    بنك الدم | 
    الصفحة الرئيسيه 
  </title>
</head>
<body>
<?php include("page/header.html"); ?>
 <!-- TOTAL OF SITE --> 
 <div class="total">
   
   <div id="text">
     <b><p>
       <span id="tst1">
       تبرع | ابحث | خذ  
       </span>
       <br>
       <span id="tst2">
       بدون صعوبات و تعقيدات 
       </span>
     </p></b>
   </div>
   <br>
   
   <div id="search-form">
     <form action="app/search.php" method="get">
       
       <input type="search" name="ser" required placeholder="البحث عن نوع دم مثال O+">
       
       <button type="submit"> بحث </button>
       
     </form>
   </div>
   
   <br><br>
   <ul id="select">
     
     <li id="in1">
       <img src="IMG/IMG_2.jpg"><hr><br>
       
      <button>
       <a href="http://www.banky.epizy.com/app/tek.php" target="_blank" style="text-decoration: none;color: white">
         اريد التبراع 
        </a>
      </button>
     </li>
     
     <li id="in1">
       <img src="IMG/IMG_1.jpg"><hr><br>
       
       <button>
         <a href="http://www.banky.epizy.com/app/get.php" target="_blank" style="text-decoration: none;color: white">
          احتاج الي الدم 
        </a>
       </button>
     </li>
     
   </ul>
   
 </div>
  <!-- TOTAL OF SITE --> 
  <?php include("page/footer.html"); ?>
</body>
</html>
