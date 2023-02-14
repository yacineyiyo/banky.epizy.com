<?php
include("config.php");
if (!$_SESSION["user"]) {
   header("Location: login.php");
}
$fetch = mysqli_query($conn,"SELECT * FROM users_site");

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
    بنك الدم | لوحة التحكم | ادارة الاعضاء
  </title>
</head>
<body>
  <center>
    <h2>ادارة الاعضاء</h2>
  </center>
  <hr>
  <br>
  <center>
    <div class="cont">
      <table>
        <tr id="trhead">
          <td> الاسم </td>
          <td> البريد </td>
          <td> التاريخ </td>
          <td> الاجراء </td>
        </tr>
        <?php
   while($row = mysqli_fetch_assoc($fetch)){ ?>
        <tr>
          <td> <?php echo $row['username']; ?> </td>
  
          <td>  <?php echo $row['email']; ?> </td>
  
          <td> <?php echo $row['Date']; ?> </td>
  
          <td id="td2">
            <a href="delet.php?id_user=<?php echo $row['id_user'] ;?>" target="_blank" style="text-decoration: none;color: white">
              حذف
              &#160
  <i class="fa-solid fa-trash"></i>
            </a>
          </td>
        </tr>
  
        <?php } ?>
      </table>
    </div>
  </center>
</body>
</html>
