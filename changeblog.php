<?php
    session_start();
    if (!isset($_SESSION['email'])){
        header("Location: login.php");
    }
    $id = $_GET['id'];
    include('connect.php');
    $sql = "SELECT * FROM user_blogs WHERE Blog_Id = '$id'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    $file = $row['Blog_text'];
    $blog_title = $row['Blog_title'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blog</title>
        <link rel="stylesheet" type="text/css" href="Css/changeblog.css">
        <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <script type="text/javascript">
        function print1(divname){
            document.getElementById("hide").style.display = "block";
            var printcontent = document.getElementById(divname).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.getElementById("hide").style.display = "none";
            var original = document.body.innerHTML;
            document.body.innerHTML = original;
        }
    </script>
    <body>
        <div class="container">
            <div class="header">
                <div id="upper_heading">
                    <ul id="navigation">
                        <li><i class="fa fa-print fa-lg" aria-hidden="true"></i>&nbsp;<a href="" onclick="print1('update');">Print</a></li>
                        <!--<li><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<a href="login.php">Edit Blogs</a></li>
                        <li><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<a href="login.php">Profile</a></li>-->
                    </ul>
                </div>
                <div id="title">
                    <input type="hidden" name="title" value="<?php echo $file ?>">
                    <h2><?php echo $blog_title; ?></h2>
                </div>
            </div>
                <div class="main" name="blog_text" id="update">
                    <h2 style="text-align:center;text-decoration:underline;display:none;" id="hide"><?php echo $blog_title; ?></h2>
                    <?php include('Blogs/'.$file.'.html'); ?>
                </div>
                <div class="update">
                    <span><a href="update.php?id=<?php echo $id;     ?>">Update</a></span>
                </div>
        </div>
    </body>
</html>