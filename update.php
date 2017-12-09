<?php
    session_start();
    include 'connect.php';
    if (!isset($_SESSION['email'])){
        header("Location: login.php");
    }
    $email = $_SESSION['email'];
    $id = $_GET['id'];
    $sql2 = "SELECT * FROM user_blogs WHERE Blog_Id = '$id'";
    $query2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_array($query2);

    $title_old = $row2['Blog_title'];
    $sql1 = "SELECT * FROM user_blogs WHERE Email='$email' AND Blog_title='$title_old'";
    $query1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_array($query1);
    $content = $row1['Blog_text'].'.html';

    if (isset($_POST['update'])){
        $date = gmdate("jS F Y");
        $time = gmdate("h:i:s A");
        $file = fopen("Blogs/".$content,"a+");
        $new_blog_text = $_POST['blog_text'];
        file_put_contents("Blogs/".$content, $new_blog_text);
        fclose($file);
        echo "<script>
            alert('Blog has been updated...');
            history.go(-2);
        </script>";
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
    <script type="text/javascript" src="JavaScript/wysiwyg.js"></script>
    <script type="text/javascript">
        function remove1(){
            var path = "Blogs/<?php echo $content;?>.txt";
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
                    <h1>Update Blog</h1>
                </div>
            </div>
            <div class="main">
                <form action="#" method="post" id="blog_form">
                    <div id="blog_title">
                        <input type="text" name="title" id="title" placeholder="Enter Blog title Here.." value="<?php echo $title_old; ?>">
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
                        <button onclick="return iimage()"><i class="fa fa-picture-o fa-lg" aria-hidden="true"></i></button>
                    </div>
                    <div id="blog_main">
                        <!--<textarea placeholder="Enter Text Here.."  rows="20" id="blog_text"></textarea>-->
                        <textarea id="blog_text" name="blog_text" style="display:none;"></textarea>
                        <iframe id="richtextfield" name="richtextfield" src="Blogs/<?php echo $content;?>"></iframe>
                    </div>
                    <button id="update" name="update" onclick="submit_form()">Update</button>
            </form>
            </div>
        </div>
    </body>
</html>