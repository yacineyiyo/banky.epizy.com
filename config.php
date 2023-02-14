<?php
session_start();
$conn = mysqli_connect('sql207.epizy.com','epiz_31254421','N0MbPasxLb2','epiz_31254421_test');
if ($_SERVER["REQUEST_METHOD"]==="POST") {
/*
$imgname = $_FILES["img"]["name"];

$ext = pathinfo($imgname,PATHINFO_EXTENSION);

$rand = rand(100,10000);

$rename = "OME".$rand;

$new = $rename.'.'.$ext;

$tmp = $_FILES["img"]["tmp_name"];
echo $new."<br>";
/*
$mov = move_uploaded_file($tmp,"image/".$new);
if ($mov) {echo"GOOD";}else{echo"ERROR";}
*/
 /*
 $un = unlink();
 if ($un) { echo"unlinked";}else{echo"nolinked";}
/*
  $kay = 'kame_1998';
    
  $byt = '1234567812345678';
  
  echo openssl_encrypt($_POST["name"],'AES-256-CBC',$kay,0,$byt);
 */
 //strlen($_POST["name"]);
}
/*
echo $mak = date("12:30")."<br>";

echo $mak2 = date("h:i")."<br>";

echo $mak2 - $mak."<br>";*/
$arr = array(1,2,2,2,3,4,5);
$et = $_POST['te'];
if (in_array($_POST['te'],$arr)) {
  echo $arr[$et];
}

?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<form method="post" action="config.php">
  <input type="text" name="te">
  <button type="submit">send now </button>
</form>
