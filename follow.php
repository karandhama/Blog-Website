<?php
    session_start();
    if (!isset($_SESSION['email'])){
        header("Location: login.php");
    }
    include('connect.php');
    include('classes.php');
    $em = $_SESSION['email'];
    $sql = "SELECT * FROM users WHERE Email != '$em'";
    $query = mysqli_query($conn,$sql);
    if (isset($_POST['follow'])){
        $follower_email = $_SESSION['email'];
        $following_email = $_POST['email'];
        if (hasfollowing($follower_email,$following_email)){
            echo "<script>alert('You are already following this blogger');</script>";
            echo "<script>javascript:history.go(-1)</script>";
        }
        else {
            $sql1 = "INSERT INTO follow (Follower_email,Following_email) VALUES('$follower_email','$following_email')";
            $query1 = mysqli_query($conn,$sql1);
            if ($query1){
                echo "<script>alert('Permission Granted..');</script>";
                echo "<script>javascript:history.go(-1)</script>";
            }
            else {
                mysqli_error($query1);
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Follow People</title>
        <link rel="stylesheet" type="text/css" href="Css/follow.css">
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">

    </script>
    <body>
        <div class="container">
            <div class="header">
                <div id="upper_heading">
                    <ul id="navigation">
                        <li><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;<a href="myblogs.php">My Blogs</a></li>
                    </ul>
                </div>
                <div id="title1">
                    <h2>Follow People to get notification about their blogs</h2>
                </div>
            </div>
            <div class="admin_panel">
                <h2>Bloggers</h2>
                <?php
                    while($row = mysqli_fetch_array($query)){
                        ?>
                        <form action="#" method="post">
                            <div id="user_name_div">
                                <a href="profile.php?follow=true&email1=<?php echo $row['Email']; ?>"><?php echo $row['Firstname']." ".$row['Lastname']; ?></a>
                                <button name="follow" id="follow">Follow</button>
                                <h5><?php echo $row['Email']; ?></h5>
                                <input type="hidden" value="<?php echo $row['Email']; ?>" name="email">
                            </div>
                        </form>
                    <?php }
                ?>
            </div>
        </div>
    </body>
</html>