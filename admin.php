<?php
    session_start();
    if (!isset($_SESSION['email'])){
        header("Location: admin_login.php");
    }
    include('connect.php');
    include('classes.php');
    $sql = "SELECT * FROM users";
    $query = mysqli_query($conn,$sql);
    if (isset($_POST['permission'])){
        $email = $_POST['email'];
        if (haspermission($email)){
            echo "<script>alert('Already Permission has been provided');</script>";
            echo "<script>javascript:history.go(-1)</script>";
        }
        else {
            $sql1 = "UPDATE users SET Permission = TRUE WHERE Email = '$email'";
            $query1 = mysqli_query($conn,$sql1);
            if ($query1){
                echo "<script>alert('Permission Granted..');</script>";
                echo "<script>javascript:history.go(-1)</script>";
            }
            else {
                mysqli_error($query);
            }
        }
    }
    if (isset($_POST['remove_permission'])){
        $email = $_POST['email'];
        if (!haspermission($email)){
            echo "<script>alert('Already Permission has not been provided');</script>";
            echo "<script>javascript:history.go(-1)</script>";
        }
        else {
            $sql1 = "UPDATE users SET Permission = FALSE WHERE Email = '$email'";
            $query1 = mysqli_query($conn,$sql1);
            if ($query1){
                echo "<script>alert('Permission removed..');</script>";
                echo "<script>javascript:history.go(-1)</script>";
            }
            else {
                mysqli_error($query);
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="Css/admin.css">
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div id="upper_heading">
                <ul id="navigation">
                    <li><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a href="index.html">Home</a></li>
                    <li><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;<a href="contact_viewers.php">Contacts</a></li>
                    <li><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;<a href="logout.php">Log out</a></li>
                </ul>
            </div>
            <div id="title">
                <h1 id="title_text">Admin Panel</h1>
            </div>
        </div>
    </div>
    <div class="admin_panel">
        <h2>Bloggers</h2>
        <?php
            while($row = mysqli_fetch_array($query)){?>
                <form action="#" method="post">
                    <div id="user_name_div">
                        <a href="profile.php?email=<?php echo $row['Email'];?>&admin=true"><?php echo $row['Firstname']." ".$row['Lastname']; ?></a>
                        <button name="remove_permission" id="remove_permission">Remove Permission</button>
                        <button name="permission" id="permission">Permission</button>
                        <h5><?php echo $row['Email']; ?></h5>
                        <input type="hidden" id="permission_check" value="<?php echo $row['Email'];?>">
                        <input type="hidden" value="<?php echo $row['Email']; ?>" name="email">
                    </div>
                </form>
            <?php }
        ?>
    </div>
</body>
</html>