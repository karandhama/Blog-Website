<?php
    $code = $_GET['passkey'];
    include('connect.php');
    $sql = "SELECT * FROM Verify WHERE Code = '$code'";
    $query = mysqli_query($conn,$sql);
    if (mysqli_num_rows($query)==1){
        $row = mysqli_fetch_array($query);
        $first_name = $row['Firstname'];
        $last_name = $row['Lastname'];
        $name = "$first_name $last_name";
        $email_register = $row['Email'];
        $password_register = $row['Password'];
        $interest = $row['Interests'];
        $intro = $row['Introduction'];
        $gender = $row['Gender'];
        $mobile = $row['Mobile'];
        $picture = "images.jpg";
        $sql1 = "INSERT INTO Users(Firstname,Lastname,Picture,Email,Password,Gender,Introduction,Interests,Mobile,Permission) VALUES('$first_name','$last_name','$picture','$email_register','$password_register','$gender','$intro','$interest','$mobile',FALSE)";
        $query1 = mysqli_query($conn,$sql1);
        $sql2 = "DELETE FROM Verify WHERE Code = '$code'";
        $query2 = mysqli_query($conn,$sql2);
        mysqli_close($conn);
        $session['confirmation_notice'] = "Email has been succesfully verified. Now $name, you can signin";
    }
    else {
        $session['confirmation_notice'] = "WRONG URL";
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Email Verification</title>
        <link rel="stylesheet" type="text/css" href="Css/index.css">
        <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="contaainer">
            <div class="header">
                <div class="header">
                    <div id="upper_heading">
                    </div>
                    <div id="title">
                        <h1>Email Verification</h1>
                    </div>
                </div>
            </div>
            <div>
                <h3 style="text-align:center;"><?php session_start(); echo $session['confirmation_notice'];?></h3>
            </div>
        </div>
    </body>
</html>
