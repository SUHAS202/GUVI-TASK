<?php
require_once'mangodb.php';

$Uname = $_POST['username'];

$res = null;

if (!empty($Uname) ) {
    $data = array(
        "UserName" => $Uname,
    );
    $fetch = $userCollection->findOne($data);
    $res = 'Success';
} else {
    $res = "All fields are required";
}

if($res == 'Success'){
  echo json_encode(['success'=>true, 'message'=>$fetch]);
}else{
  echo json_encode(['success'=>false, 'message'=>$res]);
}

