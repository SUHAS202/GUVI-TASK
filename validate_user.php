<?php
require_once'mysqli.php';

$authToken = $_POST['authToken'];
$username = $_POST['username'];

$res = null;

if (!empty($authToken) &&  !empty($username) ) {
    
    $SELECT = "SELECT username, password,email FROM Register WHERE authtoken = ? and username = ?";
    
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("ss", $authToken, $username);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    $num_rows = $result->num_rows;

    
    if ($num_rows > 0) {
        $res = 'Success';
    }else{
        $res = 'Invalid Session';
    }
} else {
    $res = 'Invalid Session';
}
if($res == 'Success'){
  echo json_encode(['success'=>true, 'message'=>'Success']);
}else{
  echo json_encode(['success'=>false, 'message'=>$res]);
}

