<?php
    include('connect.php');
    $sql = "SELECT count(Blog_Id),Blog_Id FROM likes GROUP BY Blog_Id ORDER BY count(Blog_Id) DESC";
    $query = mysqli_query($conn,$sql);
?>
<html>
<head>
    <title>Trending Blogs</title>
</head>
        <link rel="stylesheet" type="text/css" href="Css/trending.css">
        <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
<body>
    <div class="container">
        <div class="header">
            <div id="upper_heading">
                <ul id="navigation">
                    <li><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a href="index.html">Home</a></li>
                </ul>
            </div>
            <div id="title">
                <h1>Trending Blogs</h1>
            </div>
        </div>
        <div>
            <?php
                while($row = mysqli_fetch_array($query)){
                    $id = $row['Blog_Id'];
                    $sql4 = "SELECT * FROM user_blogs WHERE Blog_Id = '$id'";
                    $query4 = mysqli_query($conn,$sql4);
                    $row4 = mysqli_fetch_array($query4);
                    $email = $row4['Email'];
                    $sql1 = "SELECT Firstname,Lastname FROM users WHERE Email='$email'";
                    $query1 = mysqli_query($conn,$sql1);
                    $row1 = mysqli_fetch_array($query1);
                    $sql2 = "SELECT * FROM likes WHERE Blog_Id='$id'";
                    $query2 = mysqli_query($conn,$sql2);
                    $sql3 = "SELECT * FROM comments WHERE Blog_Id='$id'";
                    $query3 = mysqli_query($conn,$sql3);
                    $Firstname = $row1['Firstname'];
                    $Lastname = $row1['Lastname'];
                    ?>
                    <div id="list">
                        <h3><a style="color:#0077b3;text-decoration:none;" href="viewblog.php?id=<?php echo $id; ?>"><?php echo $row4['Blog_title']; ?></a></h3>
                        <input type="hidden" value="<?php echo $email; ?>" name="profile_email" id="profile_email">
                        <h5>Published By :&nbsp;<a href="profile.php?profile_email=<?php echo $email; ?>" name="link" id="link"><?php echo $Firstname." ".$Lastname ?></a>&emsp;&emsp;
                        <i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i>&emsp;Likes : <span id="date"><?php echo mysqli_num_rows($query2); ?></span>&emsp;&emsp;
                        <i class="fa fa-comments fa-lg" aria-hidden="true"></i>&emsp;Comments : <span id="date"><?php echo mysqli_num_rows($query3); ?></span>&emsp;&emsp;
                        Created On: <span id="date"><?php echo $row4['Blog_date']." ".$row4['Blog_time']; ?></span></h5>
                    </div>
                    <hr>
                <?php }
            ?>
        </div>
    </div>
</body>
</html>