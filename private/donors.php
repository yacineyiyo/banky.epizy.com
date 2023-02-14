<?php
include("config.php");
if (!$_SESSION["user"]) {
   header("Location: login.php");
}
$fetch = mysqli_query($conn,"SELECT * FROM `oop_data` ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../CSS/style.css">
  <link rel="stylesheet" href="../app/app.css">
  
<!--fontawesome icons link-->
<script src="https://kit.fontawesome.com/1f8f668dd4.js" crossorigin="anonymous"></script>
<!--fontawesome icons end-->

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    بنك الدم | لوحة التحكم | تعديل المتبرعين
  </title>
</head>
<body><center>
  <h2>ادارة المتبرعين</h2>
  </center>
  <hr>
  <br>
  <center>
    <div class="cont">
    <table>
      <tr id="trhead">
        <td> الاسم </td>
        <td> العمر </td>
        <td> فصيلة الدم </td>
        <td> الولاية </td>
        <td> رقم الهاتف </td>
        <td> التاريخ </td>
        <td> الاجراء </td>
      </tr>
      <?php
   
   $kay = 'kame_1998';
   
   $byt = '1234567812345678';
   
  
  while($row = mysqli_fetch_assoc($fetch)){ ?>
  
      <tr>
        <td> <?php echo  openssl_decrypt($row['Name'],'AES-256-CBC',$kay,0,$byt); ?> </td>
  
        <td> <?php echo openssl_decrypt($row['Age'],'AES-256-CBC',$kay,0,$byt); ?> </td>
  
        <td> <?php echo $row['Type_blood']; ?> </td>
  
       <td> <?php echo openssl_decrypt($row['Stats'],'AES-256-CBC',$kay,0,$byt); ?> </td>
  
      <td> <?php echo openssl_decrypt($row['Phone'],'AES-256-CBC',$kay,0,$byt); ?> </td>
      
        <td> <?php echo $row['Date']; ?> </td>
  
        <td id="td2">
          <a href="delet.php?id=<?php echo $row['id'] ?>" target="_blank" style="text-decoration: none;color: white">
            حذف
            &#160 
            <i class="fa-solid fa-trash"></i>
          </a>
        </td>
      </tr>
  
      <?php } ?>
    </table></div>
  </center>
  
</body>
</html>
