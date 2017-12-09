<?php
    session_start();
    if (!isset($_SESSION['email'])){
        header("Location: login.php");
    }
    include('connect.php');
    include('classes.php');
    $email = $_SESSION['email'];
    $haspermission = haspermission($email);
    if (!$haspermission){
        echo "<script>alert('You are not yet permitted to write blogs by ADMIN.');</script>";
        echo "<script>javascript:history.go(-1)</script>";
    }
    if (isset($_POST['post'])){
        $title = $_POST['title'];
        //$blog = $_POST['blog_text'];
        //date_default_timezone_set('UTC');
        //echo date('l jS \of F Y h:i:s A');
        $date = gmdate("jS F Y");
        $time = gmdate("h:i:s A");
        $newfilename = round(microtime(true)) . '.html';
        if(!file_exists("Blogs/".$newfilename)){
            $file = tmpfile();
        }
        $file = fopen("Blogs/".$newfilename,"a+");
        /*while(!feof($file)){
            $old = $old.fgets($file)."<br/>";
        }*/
        $blog_text = $_POST['blog_text'];
        echo $blog_text;
        $blog_id = mt_rand(10000000, 99999999);
        file_put_contents("Blogs/".$newfilename, $blog_text);
        fclose($file);
        $sql = "INSERT INTO user_blogs(Blog_Id,Email,Blog_title,Blog_text,Blog_date,Blog_time) values('$blog_id','$email','$title','$newfilename','$date','$time')";
        $query = mysqli_query($conn,$sql);
        if ($query){
            $sql1 = "SELECT * FROM follow WHERE Following_email = '$email'";
            $query1 = mysqli_query($conn,$sql1);
            if (mysqli_num_rows($query1)!=0){
                while($row = mysqli_fetch_array($query1)){
                    $follower_email = $row['Follower_email'];
                    $sql2 = "INSERT INTO follow_notifications (Blog_Id,following_email,follower_email) VALUES ('$blog_id','$email','$follower_email')";
                    $query2 = mysqli_query($conn,$sql2);
                }

            }
            echo "<script>javascript:history.go(-2)</script>";
        }
        else {
            echo "sorry";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create Blog</title>
        <link rel="stylesheet" type="text/css" href="Css/createblog.css">
        <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="JavaScript/wysiwyg.js"></script>
    <script type="text/javascript">
        function submit_form(){
            /*var len = document.getElementById('title').value.length;
            if (len==0){
                alert('Blog Title cannot be null');
                return false;
            }
            else {
                return true;
            }*/
        }
    </script>
    <body onload="iFrameon();">
        <div class="container">
            <div class="header">
                <div id="upper_heading">
                    <ul id="navigation">
                        <li><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;<a href="myblogs.php">My Blogs</a></li>
                    </ul>
                </div>
                <div id="title1">
                    <h1>Create Blogs</h1>
                </div>
            </div>
            <div class="main">
                <form action="#" method="post" id="blog_form">
                    <div id="blog_title">
                        <input type="text" name="title" id="title" placeholder="Enter Blog title Here..">
                    </div>
                    <div id="options">
                        <button onclick="return iBold();"><i class="fa fa-bold fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return iUnderline()"><i class="fa fa-underline fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return iItalic()"><i class="fa fa-italic fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return ileft()"><i class="fa fa-align-left fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return iright()"><i class="fa fa-align-right fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return ijustify()"><i class="fa fa-align-justify fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return iFontsize()"><i class="fa fa-text-height fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return iOl()"><i class="fa fa-list-ol fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return iul()"><i class="fa fa-list-ul fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return ilink()"><i class="fa fa-link fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return iUnlink()"><i class="fa fa-chain-broken fa-lg" aria-hidden="true"></i></button>
                    </div>
                    <div id="blog_main">
                        <!--<textarea placeholder="Enter Text Here.."  rows="20" id="blog_text"></textarea>-->
                        <textarea id="blog_text" name="blog_text" style="display:none;"></textarea>
                        <iframe id="richtextfield" name="richtextfield"></iframe>
                    </div>
                    <button id="post" name="post">Post</button>
            </form>
            </div>
        </div>
    </body>
</html>