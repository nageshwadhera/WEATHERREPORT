<?php
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$cpassword = $_REQUEST['cpassword'];
$fullname = $_REQUEST['fullname'];
$gender = $_REQUEST['gender'];
$mobile = $_REQUEST['mobile'];
$dob = $_REQUEST['dob'];


include "connection.php";


$select = "select * from signup";
$result = mysqli_query($conn, $select);
$flag = 0;
while ($row = mysqli_fetch_array($result)) {

    if ($row[0] == $email) {
        $flag = 1;
        break;
    }
}

if ($flag == 1) {
    header("location:public_signUp.php?msg=username already exist");
} else {
    if ($password == $cpassword) {
        $insert_public_signUp = "insert into signup VALUES ('$email','$password','$fullname','$gender',$mobile,'$dob')";
        mysqli_query($conn, $insert_public_signUp);
        echo $insert_public_signUp;
            header("location:public_signUp.php?msg=You have Signup Successfully");
    } else {
        header("location:public_signUp.php?msg=password not matched");
    }
}

