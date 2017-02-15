<?php
function generateRandomString($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $charactersLength = strlen($characters);
          $randomString = '';
              for ($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                            }
              return $randomString;
}

require_once('db.php');
$index = $_POST['index'];
$conn = db_open();
$sql = " select count(*) from msg";
$result = db_exec($conn,$sql,array());
$count = $result[0][0] ; 

$sql = "select message,name from msg where id = ?";
$result = db_exec($conn,$sql,array($index%$count+1));
echo json_encode($result);

//echo generateRandomString(10);
?>
