<?php
    include('connect.php');
    if (isset($_POST['forget_button'])){
        $email = $_POST['forget_email'];
        $sql = "SELECT * FROM users WHERE Email = '$email'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query);
        $mobile = "+91".$row['Mobile'];
        $password = $row['Password'];
        // Authorisation details.
        $username = "vkdhama9@gmail.com";
        $hash = "fb02959ecfc20b75200203ebe3ed2cf20124f991401cbd77fe32acd4aeae5394";

        // Config variables. Consult http://api.textlocal.in/docs for more info.
        $test = "1";

        // Data for text message. This is the text message data.
        $sender = "BLG-CRT"; // This is who the message appears to be from.
        $numbers = $mobile; // A single number or a comma-seperated list of numbers
        $message = "Your password is :";
        // 612 chars or less
        // A single number or a comma-seperated list of numbers
        $message = urlencode($message);
        $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
        $ch = curl_init('http://api.textlocal.in/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); // This is the result from the API
        if ($result) {
            echo "SEND";
            echo $numbers;
            echo $message;
        }
        curl_close($ch);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forget Password</title>
    <link rel="stylesheet" type="text/css" href="Css/trending.css">
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
</head>
<script type="text/javascript">
    function validation(){
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(smsform.forget_email.value)){
            alert('true');
            return true;
        }
        else {
            alert('Enter Email-ID');
            return false;
        }
    }
</script>
<body>
    <div class="container">
        <div class="header">
            <div id="upper_heading">
                <ul id="navigation">
                    <li><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a href="index.html">Home</a></li>
                </ul>
            </div>
            <div id="title">
                <h1>Forget Password ? </h1>
            </div>
        </div>
        <div class="main">
            <form action="#" method="post" name="smsform" id="smsform">
                <h3>Enter Email-ID &emsp;<input type="email" id="forget_email" name="forget_email"></h3>
                <button id="forget_button" name="forget_button" onclick="return validation();">Send Password</button>
            </form>
        </div>
    </div>
</body>
</html>