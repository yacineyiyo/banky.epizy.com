<?php
include("config.php");

$fetch = mysqli_query($conn,"SELECT * FROM `oop_data` ORDER BY id DESC");
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
    بنك الدم | الحصول علي الدم
  </title>
</head>
<body>
  <?php include("../page/header.html"); ?>
  <div class="cont">
       <br>
   
   <div id="search-form">
     <form action="search.php" method="get">
       
       <input type="search" name="ser" required placeholder="البحث عن نوع دم مثال O+">
       
       <button type="submit"> بحث </button>
       
     </form>
   </div>
    <br>
    <center>
    <table>
      <tr id="trhead">
        <td> الاسم </td>
        <td> العمر </td>
        <td> فصيلة الدم </td>
        <td> الحجز </td>
      </tr>
<?php
 
 $kay = 'kame_1998';
 
 $byt = '1234567812345678';
 

while($row = mysqli_fetch_assoc($fetch)){ ?>

      <tr>
        <td> <?php echo  openssl_decrypt($row['Name'],'AES-256-CBC',$kay,0,$byt); ?> </td>
        
        <td> <?php echo openssl_decrypt($row['Age'],'AES-256-CBC',$kay,0,$byt); ?> </td>
        
        <td> <?php echo $row['Type_blood']; ?> </td>
        
        <td id="td2">
          <a href="user.php?id=<?php echo $row['id'] ?>"    target="_blank" style="text-decoration: none;color: white">
           حجز 
           </a>
         </td>
      </tr>
      
<?php } ?>
    </table>
    </center>
  </div>
  <?php include("../page/footer.html"); ?>
  <script src="../jav.js"></script>
</body>
</html>
