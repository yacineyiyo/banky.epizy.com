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
  
    $age = $_POST["age"];
    
    $phone = $_POST["phone"];
    
    $state = $_POST["state"];
    
    $general = $_POST["general"];
    
    $type = $_POST["type"];
    
 
 /* Data encrypts */
 
 $encr = array($name,$age,$phone,$state,$general);
 
 $kay = 'kame_1998';
 
 $byt = '1234567812345678';
 
 $encr_name = openssl_encrypt($encr['0'],'AES-256-CBC',$kay,0,$byt);
  
 $encr_age = openssl_encrypt($encr['1'],'AES-256-CBC',$kay,0,$byt);
 
  
 $encr_phone = openssl_encrypt($encr['2'],'AES-256-CBC',$kay,0,$byt);
 
  
 $encr_state = openssl_encrypt($encr['3'],'AES-256-CBC',$kay,0,$byt);
 
  
 $encr_general = openssl_encrypt($encr['4'],'AES-256-CBC',$kay,0,$byt);
 
 /* Data encrypts */
 

 $send = mysqli_query($conn,"INSERT INTO `oop_data`(`Name`, `Age`, `Phone`, `Stats`, `Sex`, `Type_blood`) VALUES ('$encr_name','$encr_age','$encr_phone','$encr_state','$encr_general','$type')");
 
 if ($send) {
   $alert = true;
 }else {
   $alert = false;
 } 
  
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
  التبرع بالدم
  </title>
</head>
<body>
  <?php include("../page/header.html"); ?>
 <center><div class="cont">
   
  <div id="form-tek">
    <h2>
      التسجيل للتبرع بالدم
    </h2>
<?php
 if (isset($name)) {
   if ($alert===true) {
     echo"<b><p id='alert_1'>
          نجح التسجيل 
         </p></b>  ";
   }else{
     echo"<b><p id='alert_2'>
              حدث خطأ ×
          </p></b>  ";
   }
   
 }
?>
    <form action="" method="POST">
      
      <div id="input-name-age">
      <input type="text" name="name" required placeholder="ادخل الاسم">
      
      <input type="number" name="age" required placeholder="ادخل العمر">
      </div>
      
      <div id="number">
      <input type="number" name="phone" required placeholder="ادخل رقم الهاتف">
      </div>
      
      <select name="state" required>
    <option value="">  
    اختر الولاية
    </option>
        
     <option value="ولاية الخرطوم">ولاية الخرطوم</option>
         
     <option value="ولاية الجزيرة">
       ولاية الجزيرة
     </option>
         
     <option value="ولاية البحر الأحمر">
       ولاية البحر الأحمر
     </option>
           
     <option value="ولاية كسلا">
       ولاية كسلا
     </option>
         
     <option value="ولاية القضارف">
       ولاية القضارف
     </option>
           
     <option value="ولاية سنار">
       ولاية سنار
     </option>
         
     <option value="ولاية النيل الأبيض">
       ولاية النيل الأبيض
     </option>
          
     <option value="ولاية النيل الأزرق">
       ولاية النيل الأزرق
     </option>
         
     <option value="الولاية الشمالية">
       الولاية الشمالية
     </option>  
          
     <option value="ولاية نهر النيل">
       ولاية نهر النيل
     </option>
          
     <option value="ولاية شمال كردفان">
       ولاية شمال كردفان
     </option>
     
      <option value="ولاية غرب كردفان">
        ولاية غرب كردفان
      </option>
      
       <option value="ولاية جنوب كردفان">
         ولاية جنوب كردفان
       </option>
       
      <option value="ولاية شمال دارفور">
        ولاية شمال دارفور
      </option>
      
      <option value="ولاية غرب دارفور">
        ولاية غرب دارفور
      </option>
      
      <option value="ولاية جنوب دارفور">
        ولاية جنوب دارفور
      </option>
     
      <option value="ولاية شرق دارفور">
        ولاية شرق دارفور
      </option>
      
      <option value="ولاية وسط دارفور">
        ولاية وسط دارفور
      </option>
    
      </select>
      
      <br>
      <label for="">زكر</label>
      <input type="checkbox" name="general" value="ذكر">
      &#160 &#160 &#160
      <label for="">انثي</label>
      <input type="checkbox" name="general" value="أنثي">
   <select  name="type" required>
      <option value=""> اختــر فصيلة الدم  </option>
      <option value="O+">+O</option>
      <option value="O-">-O</option>
      <option value="B+">+B</option>
      <option value="B-">-B</option>
      <option value="A+">+A</option>
      <option value="A-">-A</option>
      <option value="AB+">+AB</option>
      <option value="AB-">-AB</option>
      </select>
      
      <br>
  <button name="send" type="submit"> ارسال </button>
    </form>
  </div>
 
 </div></center>
 <?php include("../page/footer.html"); ?>
 <script src="../jav.js"></script>
</body>
</html>
