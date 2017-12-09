<?php
    session_start();
    if (!isset($_SESSION['email'])){
        header("Location: login.php");
    }
    $email = $_SESSION['email'];
    include('connect.php');
    $sql = "SELECT Firstname,Lastname FROM users WHERE Email = '$email'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    $name = $row['Firstname']." ".$row['Lastname'];
    $limit = 5;
    $sql1 = "SELECT * FROM user_blogs WHERE Email='$email' ORDER BY Blog_date DESC,Blog_time DESC LIMIT 0,$limit";
    $query1 = mysqli_query($conn,$sql1);
    $sql4 = "SELECT * FROM user_blogs WHERE Email = '$email'";
    $query4 = mysqli_query($conn,$sql4);
    $count_rows = mysqli_num_rows($query4);
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Blogs</title>
    <link rel="stylesheet" type="text/css" href="Css/createblog.css">
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script type="text/javascript">
    function makezero(){
        document.getElementById('number').value = 0;
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body onload="makezero();">
    <div class="container">
        <div class="header">
            <div id="upper_heading">
                    <ul id="dropdown_menu">
                        <li id="dropdown"><?php echo $name; ?>&emsp;<i class="fa fa-caret-down" id="drop_icon" aria-hidden="true"></i>
                            <div id="dropdown_content">
                                <a href="makeblog.php">Create Blog</a>
                                <a href="profile.php?email=<?php echo $email; ?>">Profile</a>
                                <a href="logout.php">Log out</a>
                            </div>
                       </li>
                    </ul>
                    <ul id="dropdown_menu">
                        <li id="dropdown">
                            <button id="pill"></button>
                            <i class="fa fa-bell-o" aria-hidden="true"></i>&nbsp;<a href="notification.html" id="clear_notification">Notifications</a>
                       </li>
                    </ul>
                    <li id="follow"><i class="fa fa-users" aria-hidden="true"></i><a href="follow.php">&nbsp;Follow people</a></li>
            </div>
            <div id="title1">
                <h1>My Blogs</h1>
            </div>
        </div>
        <div class="blogs_list">
            <?php
                $list_ids = 1;
                while($row1 = mysqli_fetch_array($query1)){
                        $id = $row1['Blog_Id'];
                        $sql2 = "SELECT * FROM likes WHERE Blog_Id='$id'";
                        $query2 = mysqli_query($conn,$sql2);
                        $sql3 = "SELECT * FROM comments WHERE Blog_Id='$id'";
                        $query3 = mysqli_query($conn,$sql3);
                    ?>
                    <div id="list_<?php echo$list_ids;?>">
                        <h3><span><?php echo $row1['Blog_title']; ?></span></h3>
                        <h4 id="timings">Created On : <span><?php echo $row1['Blog_date'];?>&emsp;<?php echo $row1['Blog_time']; ?> (UTC)</span></h4>
                        <div id="likes">
                            <h4><i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i>&emsp;Likes : <span><?php echo mysqli_num_rows($query2); ?></span></h4>
                            <h4><i class="fa fa-comments fa-lg" aria-hidden="true"></i>&emsp;Comments : <span><?php echo mysqli_num_rows($query3); ?></span></h4>
                        </div>
                        <!--<input type="submit" value="View" id="submit1">-->
                        <a href="changeblog.php?id=<?php echo $id; ?>" id="submit1">View</a>
                    </div>
                    <style type="text/css">
                        #list_<?php echo $list_ids; ?> {
                            width: 90%;
                            display: block;
                            margin: auto;
                            background-color: #f1f1f1;
                            height: 25vh;
                            border-radius: 5px;
                            margin-top: 3%;
                            box-shadow: 1px 1px 20px gray;
                        }

                        #list_<?php echo $list_ids; ?> h3 {
                            margin: 0;
                            padding-left: 5%;
                            padding-top: 2%;
                            width: 95%;
                            float: left;
                        }
                    </style>
                <?php $list_ids++;}
            ?>
            <div class="loadbutton">
                <input type="hidden" value="0" id="number">
                <input type="hidden" value="<?php echo $count_rows; ?>" id="all">
                <input type="hidden" value="<?php echo $limit ?>" id="limit">
                <div id="loading">
                    <img src="facebook .gif" id="spinner">
                    <button class="loadmore">Load More Blogs</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        function notification_count(status){
            $.ajax({
                url:"notification.php",
                method:"POST",
                data: {view_status:status},
                dataType:"json",
                success:function(data){
                    var id = data;
                    if (id > 0){
                        $("#pill").html(id);
                    }
                    else {
                        $("#pill").hide();
                    }
                }
            });
        }
        notification_count(0);
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
                var id_of_list = "list_" + number;
                $.ajax({
                    url: 'loadmore.php',
                    type: 'POST',
                    data: {row:number},
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
                            }
                            else {
                                $(".loadmore").text("Load More Blogs");
                                $("#spinner").hide();
                            }
                        },2000);
                    }
                });
            }
        });
    });
</script>