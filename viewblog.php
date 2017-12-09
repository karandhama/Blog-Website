<?php
    $id = $_GET['id'];
    include('connect.php');
    session_start();
    if (isset($_GET['notification'])){
        $email_for_check = $_SESSION['email'];
        $sql12 = "DELETE FROM follow_notifications WHERE follower_email = '$email_for_check' AND Blog_Id = '$id'";
        $query12 = mysqli_query($conn,$sql12);
    }
    $sql = "SELECT * FROM user_blogs WHERE Blog_Id = '$id'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    $file = $row['Blog_text'];
    $title = $row['Blog_title'];
    $limit = 5;
    $sql1 = "SELECT * FROM comments WHERE Blog_Id = '$id' ORDER BY Id DESC LIMIT 0,$limit";
    $query1 = mysqli_query($conn,$sql1);
    $sql8 = "SELECT count(*) AS num FROM comments WHERE Blog_Id = '$id'";
    $query8 = mysqli_query($conn,$sql8);
    $row8 = mysqli_fetch_array($query8);
    $sql5 = "SELECT * FROM likes WHERE Blog_Id = '$id'";
    $query5 = mysqli_query($conn,$sql5);
    if (isset($_POST['like'])){
        //session_start();
        if (isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            if ($email == 'Admin'){
                echo "<script>alert('As you are an ADMIN you cannot like or comment posts');
                history.go(-1);
                </script>";
            }
            else {
                $sql4 = "SELECT * FROM likes WHERE Blog_Id = '$id' AND Email='$email'";
                $query4 = mysqli_query($conn,$sql4);
                if (mysqli_num_rows($query4)!=0){
                    echo "<script>alert('You have already liked this post');
                        history.go(-1);
                    </script>";
                }
                else {
                    $date = gmdate("jS F Y");
                    $time = gmdate("h:i:s A");
                    $sql7 = "SELECT Email FROM user_blogs WHERE Blog_Id = '$id'";
                    $query7 = mysqli_query($conn,$sql7);
                    $row7 = mysqli_fetch_array($query7);
                    $owner_email = $row7['Email'];
                    $sql3 = "INSERT INTO likes (Blog_Id,Email,Owner_email,like_date,like_time) VALUES ('$id','$email','$owner_email','$date','$time')";
                    $query3 = mysqli_query($conn,$sql3);
                    if ($query3){
                        echo "<script>
                            alert('Thank you very much for your response');
                            history.go(-1);
                        </script>";
                    }
                }
            }
        }
        else {
            echo "<script>var a = confirm('To like any blog you need to login.');
                if (a==true){
                    window.location.href = 'login.php?like=true';
                }
                else {
                    history.go(-1);
                }
            </script>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Blog</title>
        <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="Css/author_list.css">
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="JavaScript/validation1.js"></script>
    <script type="text/javascript">
        function makezero(){
            document.getElementById('number').value = 0;
        }
        function print1(divname){
            document.getElementById("hide").style.display = "block";
            var printcontent = document.getElementById(divname).innerHTML;
            var original = document.body.innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = original;
            document.getElementById("hide").style.display = "none";
        }
    </script>
    <body onload="makezero();">

        <div class="container">
            <div class="header">
                <div id="upper_heading">
                    <span>Created on :&nbsp;<?php echo $row['Blog_date']; ?> <?php echo $row['Blog_time']; ?></span>
                </div>
                <div id="title">
                    <h3 id="title_text"><?php echo $title; ?></h3>
                </div>
            </div>
            <div class="main" id="update">
                <h2 style="text-align:center;text-decoration:underline;display:none;" id="hide"><?php echo $title; ?></h2>
                <div id="included_file"><?php include('Blogs/'.$file.'.html'); ?></div>
            </div>
            <div class="like_div">
                <form action="#" method="post" id="like_form">
                    <button id="like" name="like"><i class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" id="like_image"></i></button>&emsp;&emsp;
                    <button id="like" style="margin-left:4%;color:black;" onclick="print1('update');"><i class="fa fa-print fa-2x" aria-hidden="true"></i>&nbsp;</button>
                    <br><br><h4>Likes : <?php echo mysqli_num_rows($query5); ?></h4>

                </form>
            </div>
            <div class="footer">
                <!--Like : <i class="fa fa-thumbs-o-up fa-lg select" id="like_button" aria-hidden="true"></i>-->
                <h2 id="comments">Comments </h2>
                <span id="nocomm"><?php echo $row8['num']; ?> comments</span>
                <form action="#" method="post">
                    <div id="comment_box">
                        <img src="Picture/images.jpg">
                        <input type="hidden" id="name" name="name" value="">
                        <textarea id="comment_box_text" name="comment_box_text" placeholder="Add a comment.."></textarea>
                        <br><button id="post" name="post">Post</button>
                        <button id="cancel">Cancel</button>
                    </div>
                </form>
                <div id="static_comments">
                    <?php
                        if (isset($_POST['post'])){
                            session_start();
                            $email = $_SESSION['email'];
                            if ($email == 'Admin'){
                                echo "<script>alert('As you are an ADMIN you cannot like or comment posts');
                                history.go(-1);
                                </script>";
                            }
                            else {
                                $name = $_POST['name'];
                                $comment = $_POST['comment_box_text'];
                                $date = gmdate("jS F Y");
                                $time = gmdate("h:i:s A");
                                $sql6 = "SELECT Email FROM user_blogs WHERE Blog_Id = '$id'";
                                $query6 = mysqli_query($conn,$sql6);
                                $row6 = mysqli_fetch_array($query6);
                                $email6 = $row6['Email'];
                                $sql2 = "INSERT INTO comments (Email,Name,Blog_Id,Comment,comment_date,comment_time) VALUES('$email6','$name','$id','$comment','$date','$time')";
                                $query2 = mysqli_query($conn,$sql2);
                                //header("Refresh:0");
                                echo "<script>
                                    history.go(-1);
                                </script>";
                            }
                        }
                        $list_ids = 1;
                        while($row1 = mysqli_fetch_array($query1)){?>
                            <div id="individual_comment_<?php echo$list_ids;?>">
                                <h4 style="color:#0077b3;margin:0;padding-top:1%;"><?php echo $row1['Name']; ?></h4>
                                <p style="font-size:15px;margin-top:1%;"><?php echo $row1['Comment']; ?></p>
                                <h5 style="margin:0;"><?php echo $row1['comment_date']; ?>  <?php echo $row1['comment_time']; ?></h5>
                            </div>
                            <style type="text/css">
                                #individual_comment_<?php echo $list_ids;?> {
                                    border-bottom: 1px solid #c2c2a3;
                                    border-top: 1px solid #c2c2a3;
                                }
                            </style>
                        <?php $list_ids++;}
                    ?>
                    <div class="loadbutton">
                        <input type="hidden" value="0" id="number">
                        <input type="hidden" value="<?php echo $row8['num']; ?>" id="all">
                        <input type="hidden" value="<?php echo $limit ?>" id="limit">
                        <div id="loading">
                            <img src="facebook .gif" id="spinner">
                            <button class="loadmore">Load More Comments</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        var number = Number($("#number").val());
        var all = Number($("#all").val());
        var limit = Number($("#limit").val());
        if (all <= limit){
            $('.loadmore').hide();
        }
        $(".loadmore").click(function(){
            var number = Number($("#number").val());
            var all = Number($("#all").val());
            if (number <= all-1){
                number = number + <?php echo $limit; ?>;
                $("#number").val(number);
                var id_of_list = "individual_comment_" + number;
                $.ajax({
                    url: 'loadmore.php',
                    type: 'POST',
                    data: {row2:number,
                            id:<?php echo $id; ?>},
                    beforeSend:function(){
                        $("#spinner").show();
                        $(".loadmore").text("Loading...");
                    },
                    success: function(response){
                        setTimeout(function(){
                            $("#"+id_of_list).after(response).show().fadeIn("slow");
                            var rowno = number + <?php echo $limit; ?>;
                            if (rowno >= all){
                                $('.loadmore').hide();
                                $("#spinner").hide();
                                $('.main').css("width","90%");
                                $('.main').css("background-color","white");
                                $('.main').css("margin-left","5%");
                                $('.main').css("padding","2%");
                            }
                            else {
                                $(".loadmore").text("Load More Blogs");
                                $("#spinner").hide();
                                $('.main').css("width","90%");
                                $('.main').css("background-color","white");
                                $('.main').css("margin-left","5%");
                                $('.main').css("padding","2%");
                            }
                        },2000);
                    }
                });
            }
        });
    });
</script>