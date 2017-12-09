<?php
    function admin_login($user,$pass){
        include('connect.php');
        $sql = "SELECT * FROM admin WHERE Username = '$user' AND Password = '$pass'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query);
        if ($row['Username'] == $user && $row['Password'] == $pass){
            return true;
        }
        else {
            return false;
        }
    }
    function haspermission($email){
        include('connect.php');
        $sql = "SELECT Permission FROM users WHERE Email = '$email'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query);
        if ($row['Permission'] == TRUE){
            return true;
        }
        else {
            return false;
        }
    }
    function hasfollowing($follower,$following){
        include('connect.php');
        $sql = "SELECT Follower_email,Following_email FROM follow WHERE Follower_email = '$follower' AND Following_email = '$following'";
        $query = mysqli_query($conn,$sql);
        if (mysqli_num_rows($query) == 1){
            return true;
        }
        else {
            return false;
        }
    }
?>