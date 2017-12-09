<?php
    session_start();
    if (!isset($_SESSION['email'])){
        if (!isset($_GET['profile_email'])){
            header("Location: login.php");
        }
    }
    include('connect.php');
    if (isset($_GET['email']) && !isset($_GET['admin'])){
        $email = $_GET['email'];?>
        <style type="text/css">
            #my_blogs {
                display: none;
            }
        </style>
    <?php
    // notification ....
        $date = gmdate("jS F Y");
        $sql3 = "SELECT * FROM comments WHERE Email = '$email' AND comment_date = '$date'";
        $query3 = mysqli_query($conn,$sql3);
        $upload = "1";
    }
    else if (isset($_GET['email']) && isset($_GET['admin'])){
        $email = $_GET['email'];
        $upload = "0";
    }
    else if (isset($_GET['follow']) && isset($_GET['email1'])){
        $email = $_GET['email1'];
        $upload = "0";
    }
    else {
        if (!isset($_GET['profile_email'])){
            echo "<script>window.location.href='authors.php';</script>";
        }
        else {
            $email = $_GET['profile_email'];
            $upload = "0";
        }
    }
    $sql = "SELECT * FROM users WHERE Email = '$email'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $image = $_FILES['image_choose']['name'];
        $temp = explode(".", $_FILES["image_choose"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($_FILES["image_choose"]["tmp_name"], "Picture/".$newfilename);
        if ($row['Picture']!="images.jpg"){
            $previous_image = unlink("Picture/".$row['Picture']);
        }
        $sql4 = "UPDATE users SET Picture = '$newfilename' WHERE Email = '$email'";
        $query4 = mysqli_query($conn,$sql4);
        echo "<script>javascript:history.go(-1)</script>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <link rel="stylesheet" type="text/css" href="Css/profile.css">
        <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image_choose_holder').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    var form = document.getElementById("image_form");
                    form.submit();
                }
            }
            $("#image_choose_holder").click(function(){
                if ($("#trigger1").val()==0){
                }
                else {
                    $('#image_choose').trigger('click');
                }
            });
            $("#image_choose").change(function(){
                readURL(this);
            });
        });
    </script>
    <body>
        <div class="container">
            <div class="header">
                <div class="header">
                    <div id="upper_heading">
                        <ul id="navigation">
                            <li><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;<a href="myblogs.php">My blogs</a></li>
                        </ul>
                    </div>
                    <div id="title1">
                        <h1><?php echo $row['Firstname']." ".$row['Lastname']; ?></h1>
                    </div>
                </div>
            </div>
            <div class="main">
                <div id="image_holder">
                    <form action="#" method="post" id="image_form" enctype="multipart/form-data">
                        <input type="file" id="image_choose" name="image_choose" accept="image/x-png,image/gif,image/jpeg" style="display:none;">
                        <img src="Picture/<?php echo $row['Picture']; ?>" id="image_choose_holder">
                        <input type="hidden" id="trigger1" value="<?php echo $upload; ?>">
                    </form>
                </div>
                <div id="about">
                    <h2>About Me</h2>
                    <table id="about_table">
                        <tr>
                            <th>Email</th>
                            <td><?php echo $row['Email'];?></td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td><?php echo $row['Gender'];?></td>
                        </tr>
                        <tr>
                            <th>Introduction</th>
                            <td><?php echo $row['Introduction'];?></td>
                        </tr>
                        <tr>
                            <th>Interests</th>
                            <td><?php echo $row['Interests'];?></td>
                        </tr>
                    </table>
                </div>
                <div id="my_blogs">
                    <h2>My Blogs</h2>
                    <?php
                        $sql2 = "SELECT * FROM user_blogs WHERE Email = '$email' ORDER BY Blog_date DESC, Blog_time DESC";
                        $query2 = mysqli_query($conn,$sql2);
                        while($row2 = mysqli_fetch_array($query2)){?>
                                <h4>
                                    <a href="viewblog.php?id=<?php echo $row2['Blog_Id']; ?>"><?php echo $row2['Blog_title']; ?></a>
                                </h4>
                        <?php }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
