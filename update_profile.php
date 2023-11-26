<?php
require_once'mangodb.php';

$Uname = $_POST['username'];

$res = null;

if (!empty($Uname) ) {
    
    $updateResult = $userCollection->updateOne(
        [ "UserName" => trim($Uname) ],
        [ '$set' => ["FirstName" => $_POST['firstname'], "LastName" => $_POST['lastname'], "Age" => $_POST['age'],"Gender" => $_POST['gender'] ]]
    );
    $res = 'Success';
} else {
    $res = "All fields are required";
}

if($res == 'Success'){
  echo json_encode(['success'=>true, 'message'=>'success']);
}else{
  echo json_encode(['success'=>false, 'message'=>$res]);
}

