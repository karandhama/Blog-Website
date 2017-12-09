<?php
    session_start();
    if (isset($_SESSION['email'])){
        if ($_SESSION['email']=='Admin'){
            header("location:admin.php");
        }
        else {
            header("location:myblogs.php");
        }
    }
    /*echo "<script>alert('we');</script>";
    if (isset($_POST['sms_form'])){
        echo "1";
    }*/
?>
<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
        <link rel="stylesheet" type="text/css" href="Css/index.css">
        <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="JavaScript/login.js"></script>
    <script type="text/javascript">
        function valid(){
            $(document).ready(function(){
                $("#notice_value").text('Wrong Email-Id or Password');
                $("#notice").show();
            });
        }
        function valid1(string){
            $(document).ready(function(){
                $("#notice_value").text(string);
                $("#notice").show();
            });
        }
        function forget(){
            window.location.href = "forget.php";
        }
    </script>
    <script type="text/javascript">
        function show(evt,name){
            var i,tablink,tabcontent;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i=0;i<tabcontent.length;i++){
                tabcontent[i].style.display = "none";
            }
            tablink = document.getElementsByClassName("tablinks");
            for(i=0;i<tablink.length;i++){
                tablink[i].id = tablink[i].id.replace("active","");
            }
            document.getElementById(name).style.display = "block";
            evt.currentTarget.id += "active";
        }
    </script>
    <body>
        <div class="container">
            <div class="header">
                <div class="header">
                    <div id="upper_heading">
                        <ul id="navigation">
                            <li><i class="fa fa-lock fa-lg" aria-hidden="true"></i>&nbsp;<a href="admin_login.php">Admin Login</a></li>
                            <li><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a href="index.html">Home</a></li>
                        </ul>
                    </div>
                    <div id="title">
                        <h1>Blogger</h1>
                    </div>
                </div>
            </div>
            <div class="login_register">
                <button class="tablinks" onclick="show(event, 'login')" id="active">Sign In</button>
                <button class="tablinks" onclick="show(event, 'register')" id="">Register</button>
                <div class="tabcontent" id="login">
                    <div id="notice">
                        <h4 ><i class="fa fa-times-circle" id="notice_icon" aria-hidden="true">&nbsp;</i>
                            <span id="notice_value">Enter Valid Email-Id or Password</span></h4>
                    </div>
                    <form id="login_form" method="post" action="#">
                        <table id="login_table">
                            <tr>
                                <td><i class="fa fa-envelope-o fa-lg" aria-hidden="true" id="email_icon"></i>&nbsp;&nbsp;
                                    <input type="text" id="email" name="email" placeholder="Email-ID" required>
                                    &nbsp;<span id="email_validation"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></span>
                                    <span id="email_validation1"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-key fa-lg" aria-hidden="true" id="password_icon"></i>&nbsp;&nbsp;
                                    <input type="password" id="password" name="password" placeholder="Password" required>
                                    &nbsp;<span id="password_validation"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></span>
                                    <span id="password_validation1"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <th><button id="login_button" name="login_button">Sign In</button></th>
                            </tr>
                            <tr>
                                <th id="forget" onclick="forget();">forget password ?</th>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="tabcontent" id="register">
                    <div id="notice1">
                        <h4 ><i class="fa fa-times-circle" id="notice_icon" aria-hidden="true">&nbsp;</i>
                            <span id="notice_value1">Enter Valid Entities</span></h4>
                    </div>
                    <form id="register_form" method="post" action="#">
                        <table id="register_table">
                            <tr>
                                <td><input type="text" id="first_name" name="first_name" placeholder="First Name">
                                <span id="fname_validation">&nbsp;&nbsp;<i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></span>
                                <span id="fname_validation1"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" id="last_name" name="last_name" placeholder="Last Name">
                                <span id="lname_validation">&nbsp;&nbsp;<i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></span>
                                <span id="lname_validation1"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td><textarea id="intro" name="intro" placeholder="Introduction" cols="34" rows="3"></textarea></td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="gender" value="male" checked> Male
                                    <input type="radio" name="gender" value="female"> Female
                                </td>
                            </tr>
                        </table>
                        <table id="register_table">
                            <tr>
                                <td><input type="email" id="email_register" name="email_register" placeholder="Email-ID">
                                <span id="email_register_validation">&nbsp;&nbsp;<i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></span>
                                <span id="email_register_validation1"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="password" id="password_register" name="password_register" placeholder="Password">
                                <span id="password_register_validation">&nbsp;&nbsp;<i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></span>
                                <span id="password_register_validation1"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm-Password">
                                    <span id="confirm_validation">&nbsp;&nbsp;<i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></span>
                                    <span id="confirm_validation1"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="number" id="mobile" name="mobile" placeholder="Mobile number">
                                    <span id="mobile_validation">&nbsp;&nbsp;<i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></span>
                                    <span id="mobile_validation1"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td><textarea id="intro" name="interest" placeholder="Interests" cols="34" rows="3"></textarea></td>
                            </tr>
                        </table>
                        <div id="sign_up_div">
                            <button id="register_button" name="register_button">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    if (isset($_GET['like'])){
        $like = $_GET['like'];
    }
    else {
        $like = 'false';
    }
    if (isset($_POST['login_button'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        include('connect.php');
        //$conn = mysqli_connect('localhost','root','','Blog');
        $sql = "SELECT * FROM users WHERE Email = '$email' AND Password = '$password'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query);
        if ($row['Email'] == $email && $row['Password'] == $password){
            session_start();
            $_SESSION['email'] = $email;
            if ($like=='true'){
                echo "<script type='text/javascript'>window.location.href = 'authors.php';</script>";
            }
            echo "<script type='text/javascript'>window.location.href = 'myblogs.php';</script>";
        }
        else {
            echo $row['Email'];
            echo "<script type='text/javascript'>
                    valid();
                </script>";
        }
        mysqli_close($conn);
    }
    if (isset($_POST['register_button'])){
        include('connect.php');
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $name = "$first_name $last_name";
        $email_register = $_POST['email_register'];
        $password_register = $_POST['password_register'];
        $interest = $_POST['interest'];
        $intro = $_POST['intro'];
        $gender = $_POST['gender'];
        $mobile = $_POST['mobile'];
        $code = substr(md5(mt_rand()), 0, 15);
        $sql1 = "SELECT Email FROM Verify WHERE Email ='$email_register'";
        $sql2 = "SELECT Email FROM Users WHERE Email ='$email_register'";
        $query1 = mysqli_query($conn,$sql1);
        $query2 = mysqli_query($conn,$sql2);
        if (mysqli_num_rows($query2)!=0){
            echo "<script>
                var str = 'Email-ID is already registered';
                valid1(str);
            </script>";
        }
        else if (mysqli_num_rows($query1)!=0){
            echo "<script>
                var str = 'Email has been sent, Verify your accout.';
                valid1(str);
            </script>";
        }
        else {
            $sql3 = "INSERT INTO Verify(Firstname,Lastname,Email,Password,Code,Gender,Introduction,Interests,Mobile) VALUES('$first_name','$last_name','$email_register','$password_register','$code','$gender','$intro','$interest','$mobile')";
            $query3 = mysqli_query($conn,$sql3);
            if ($query3){
                ini_set("SMTP","ssl://smtp.gmail.com");
                ini_set("smtp_port","587");
                $to = $email_register;
                $from = "vkdhama9@gmail.com";
                $subject = "Your Confirmation link is here";
                $message = "
                <html>
                <head>
                    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
                </head>
                <body>
                <div style='width:70%;display:block;margin:auto;border:1px solid black;background-color:#002233;box-shadow:1px 1px 50px #888888;border-radius:5px'>
                    <h2 style='text-align:center;color:white;font-family: Oswald, sans-serif;'>Blog website User verification</h2>
                    <p style='font-family: Oswald, sans-serif;text-align:center;color:white'>Hello $name,<br><b>Your account activation link is here</b> - http://localhost:8080/Blog/confirmation.php?passkey=$code<p>
                </div>
                </body>
                </html>";
                $headers = "From: vkdhama9@gmail.com\r\n";
                $headers .= "Reply-To: ". $email_register . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $mail = mail($to, $subject, $message, $headers);
                if ($mail){
                    echo "Successfully Registered and Email has been send for verification";
                }
                else{
                    $SESSION['notice'] = "Error Occured : cannot send email to your Email-ID. Again register yourself";
                    $sql4 = "DELETE FROM Verify WHERE Email = '$email_register'";
                    $quer4 = mysqli_query($conn,$sql4);
                }
            }
        }
        mysqli_close($conn);
    }
?>