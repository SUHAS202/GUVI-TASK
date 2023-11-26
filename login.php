<?php

require_once'mysqli.php';

$Uname = $_POST['Uname'];
$pass = $_POST['pass'];
$res = null;

if (!empty($Uname) && !empty($pass)) {
  
    $SELECT = "SELECT username, password,email FROM Register WHERE username = ?";
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $Uname);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    $num_rows = $result->num_rows;
    
    
    if ($num_rows > 0) {
      $user = $result->fetch_assoc(); // fetch data   
      
      if($user['password'] == md5($pass)){
          $authToken = md5(uniqid(mt_rand(), true));
          $sql = "update register set authtoken= ? where username=?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("ss",$authToken, $Uname);
          $stmt->execute();

          $res = 'Success';
      }else{
          $res = 'Invalid Password';
      }

    } else {
      $res = 'Invalid username'; 
    }
    $stmt->close();
    $conn->close();
  
} else {
  $res = "All fields are required";
}

if($res == 'Success'){
  echo json_encode(['success'=>true, 'message'=>['authToken' => $authToken]]);
}else{
  echo json_encode(['success'=>false, 'message'=>$res]);
}

