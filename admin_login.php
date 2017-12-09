<?php
    session_start();
    if (isset($_SESSION['email'])){
        header("location:admin.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="Css/admin.css">
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
                <h1 id="title_text">Admin Login</h1>
            </div>
        </div>
        <div class="main">
            <div id="admin_login_div">
                <form id="admin_login_form1" method="post" action="#">
                    <div id="notice">
                        <h4 ><i class="fa fa-times-circle" id="notice_icon" aria-hidden="true">&nbsp;</i>
                            <span id="notice_value">Enter Valid Email-Id or Password</span></h4>
                    </div>
                    <table id="admin_login_table1">
                        <tr>
                            <td><i class="fa fa-envelope-o fa-lg" aria-hidden="true" id="admin_email_icon">&nbsp;&nbsp;</i>
                                <input type="text" id="admin_email" name="admin_email" placeholder="Username">
                                <span id="admin_email_validation"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></span>
                                <span id="admin_email_validation1"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-key fa-lg" aria-hidden="true" id="admin_password_icon">&nbsp;&nbsp;</i>
                                <input type="password" id="admin_password" name="admin_password" placeholder="Password">
                                <span id="admin_password_validation"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></span>
                                <span id="admin_password_validation1"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td><button id="admin_login_button" name="admin_login_button">Sign In</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    include('classes.php');
    if (isset($_POST['admin_login_button'])){
        $username = $_POST['admin_email'];
        $password = $_POST['admin_password'];
        $login = admin_login($username,$password);
        if ($login){
            session_start();
            $_SESSION['email'] = $username;
            header("Location: admin.php");
        }
        else {
            echo "<script type='text/javascript'>
                    valid();
                </script>";
        }
    }
?>