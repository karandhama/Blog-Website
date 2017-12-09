<?php
    session_start();
    if (isset($_SESSION['email'])){
        header("location: authors.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contact</title>
        <link rel="stylesheet" type="text/css" href="Css/admin.css">
        <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="JavaScript/login.js"></script>
    <script type="text/javascript">
        function success(){
            $(document).ready(function(){
                $("#notice_value").text('Your Record has been stored');
                $("#notice_value").css('color','green');
                $("#notice_icon").removeClass("fa fa-times-circle").addClass("fa fa-check-circle-o");
                $("#notice").show();
            });
        }
        function wrong(){
            $(document).ready(function(){
                $("#notice_value").text('Email-Id is already stored');
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
                    <h1 id="title_text">Add Contact</h1>
                </div>
            </div>
            <div class="main">
                <div id="contact_form_div">
                    <div id="notice">
                        <h4><i class="fa fa-times-circle" id="notice_icon" aria-hidden="true">&nbsp;</i>
                            <span id="notice_value">Enter Valid Email-Id or Password</span></h4>
                    </div>
                    <form action="#" method="post" id="report_form">
                        <table id="admin_login_table">
                            <tr>
                                <th>Firstname : </th>
                                <td><input type="text" id="report_firstname" name="report_firstname">
                                    <span id="admin_firstname_validation"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></span>
                                    <span id="admin_firstname_validation1"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Lastname : </th>
                                <td><input type="text" id="report_lastname" name="report_lastname">
                                    <span id="admin_lastname_validation"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></span>
                                    <span id="admin_lastname_validation1"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Email : </th>
                                <td><input type="text" id="report_email" name="report_email">
                                    <span id="admin_user_email_validation"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></span>
                                    <span id="admin_user_email_validation1"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Mobile No. : </th>
                                <td><input type="number" id="report_mob" name="report_mob">
                                    <span id="admin_mobile_validation"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></span>
                                    <span id="admin_mobile_validation1"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></span>
                                </td>
                            </tr>
                        </table>
                        <button id="report" name="report">Report to Admin</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    if (isset($_POST['report'])){
        include('connect.php');
        $fname = $_POST['report_firstname'];
        $lname = $_POST['report_lastname'];
        $email = $_POST['report_email'];
        $mob = $_POST['report_mob'];
        $sql1 = "SELECT * FROM contact WHERE Email = '$email'";
        $query1 = mysqli_query($conn,$sql1);
        if (mysqli_num_rows($query1)==1){
            echo "<script type='text/javascript'>
                        wrong();
                     </script>";
        }
        else {
            $sql = "INSERT INTO contact (Firstname,Lastname,Email,Mobile)VALUES ('$fname','$lname','$email',$mob)";
            $query = mysqli_query($conn,$sql);
            $email_register = "vkdhama9@gmail.com";
            if ($query){
                echo "<script type='text/javascript'>
                        success();
                     </script>";
            }
            ini_set("SMTP","ssl://smtp.gmail.com");
            ini_set("smtp_port","587");
            $to = $email_register;
            $from = "vkdhama9@gmail.com";
            $subject = "Viewer Contacts --";
            $message = "
            <html>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
            </head>
            <body>
            <div style='width:70%;display:block;margin:auto;border:1px solid black;background-color:#002233;box-shadow:1px 1px 50px #888888;border-radius:5px'>
                <h2 style='text-align:center;color:white;font-family: Oswald, sans-serif;'>Viewer Contacts are here - </h2>
                <table>
                    <tr style='color:white'>
                        <th>Firstname : </th>
                        <th>$fname</th>
                    </tr>
                    <tr style='color:white'>
                        <th>Lastname : </th>
                        <th>$lname</th>
                    </tr>
                    <tr style='color:white'>
                        <th>Email : </th>
                        <th>$email</th>
                    </tr>
                    <tr style='color:white'>
                        <th>Mobile No. : </th>
                        <th>$mob</th>
                    </tr>
                </table>
            </div>
            </body>
            </html>";
            $headers = "From: vkdhama9@gmail.com\r\n";
            $headers .= "Reply-To: ". $email_register . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $mail = mail($to, $subject, $message, $headers);
            if ($mail){
                echo "<script>alert('Successfully Contacts are sent to the ADMIN');</script>";
            }
        }
    }
?>