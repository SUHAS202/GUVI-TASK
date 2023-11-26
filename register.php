<?php
require_once 'vendor/autoload.php';
require_once 'mysqli.php';
require_once 'mangodb.php';

$Fname = $_POST['first_name'];
$Lname = $_POST['last_name'];
$age = $_POST['age'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$Uname1 = $_POST['username'];
$pass1 = md5($_POST['password']);
$res = null;

if (!empty($Fname) || !empty($Lname) || !empty($age) || !empty($email) || !empty($gender) || !empty($Uname1) || !empty($pass1)) {


    
    $SELECT = "SELECT email from Register where email = ? Limit 1";
    $INSERT = "INSERT into Register (fname ,lname ,age ,email ,gender ,username ,password) values(?,?,?,?,?,?,?)";
    $DATA = array(
        "FirstName" => $Fname,
        "LastName" => $Lname,
        "Age" => $age,
        "Email" => $email,
        "Gender" => $gender,
        "UserName" => $Uname1,
    );
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    //checking username
    if ($rnum == 0) {
        $stmt->close();

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssissss", $Fname, $Lname, $age, $email, $gender, $Uname1, $pass1);
        $stmt->execute();
        $insert = $userCollection->insertOne($DATA);
        $res = 'Success';
    } else {
        $res = "Email id already exists!!";
    }
    $stmt->close();
    $conn->close();
} else {
    $res = "All field are required";
}

if ($res == 'Success'){
    echo json_encode(['success'=>true, 'message'=>'Success']);
}else{
    echo json_encode(['success'=>false, 'message'=>$res]);
}