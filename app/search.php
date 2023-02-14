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


$ser = mksefe($_GET['ser']);

if(!empty($ser)){
$fetch = mysqli_query($conn,"SELECT * FROM `oop_data` WHERE Type_blood LIKE '%$ser%' ORDER BY id DESC");
$nun = mysqli_num_rows($fetch);
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
    بنك الدم | الحصول علي الدم
  </title>
</head>
<body>
  <?php include("../page/header.html"); ?>
  <div class="cont">
    <center>
      <p>
        هذة جميع نتائج البحث عن :  <?php echo $ser; ?>
      </p>
      
      <br>
    <table>
      <tr id="trhead">
        <td> الاسم </td>
        <td> العمر </td>
        <td> فصيلة الدم </td>
        <td> الحجز </td>
      </tr>
<?php
while($row = mysqli_fetch_assoc($fetch)){ ?>

      <tr>
        <td> <?php  echo openssl_decrypt($row['Name'],'AES-256-CBC',$kay,0,$byt); ?> </td>
        
        <td> <?php  echo openssl_decrypt($row['Age'],'AES-256-CBC',$kay,0,$byt); ?> </td>
        
        <td> <?php echo $row['Type_blood']; ?> </td>
        
        <td id="td2">
          <a href="user.php?id=<?php echo $row['id'] ?>"    target="_blank" style="text-decoration: none;color: white">
           حجز 
           </a>
         </td>
      </tr>
      
<?php }
 if (empty($nun)&&empty($ser)) {
 echo" 
 <h2>
 لا يوجد نتائج بحث
 </h2>
 ";
 }

?>
    </table>
    </center>
  </div>
  <?php include("../page/footer.html"); ?>
  <script src="../jav.js"></script>
</body>
</html>
