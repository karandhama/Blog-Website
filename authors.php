<?php
    include('connect.php');
    function search(){
        $search_text = $_POST['search_text'];
        $sql4 = "SELECT * FROM users WHERE CONCAT('Firstname','Lastname','Email','Gender','Introduction','Interests') LIKE '%".$search_text."%'";
        $query4 = mysqli_query($conn,$sql4);
    }
    $limit = 5;
    $sql = "SELECT * FROM user_blogs ORDER BY Blog_date DESC LIMIT 0,".$limit;
    $query = mysqli_query($conn,$sql);
    $sql5 = "SELECT * FROM user_blogs";
    $query5 = mysqli_query($conn,$sql5);
    $count_rows = mysqli_num_rows($query5);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blogs</title>
        <link rel="stylesheet" type="text/css" href="Css/author_list.css">
        <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <script type="text/javascript">
        function makezero(){
            document.getElementById('number').value = 0;
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            /*if (!$("#search_text").is(":hover") && !$(".livesearch").is(":hover")){
                $('.livesearch1').hide();
            }*/
            $(document).click(function(e){
                var container = $(".livesearch1");
                if (!container.is(e.target)){
                    $('.livesearch1').hide();
                }
            });
            $("#search_text").keyup(function(){
                var key_value = $(this).val();
                $.ajax({
                    url: 'livesearch.php',
                    type: 'post',
                    data: {key:key_value},
                    success: function(data){
                        $('.livesearch1').show();
                        $('.livesearch1').html(data);
                    }
                });
            });
        });
    </script>
    <body onload="makezero();">
        <div class="container1">
            <div class="header">
                <div id="upper_heading">
                    <ul id="navigation">
                        <li><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a href="index.html">Home</a></li>
                        <li><a href="contact.php"><i class="fa fa-phone" id="contact_icon" aria-hidden="true">&nbsp;</i>Provide your contacts</a></li>
                    </ul>
                </div>
                <div id="title">
                    <h1>Blogs</h1>
                    <div id="search">
                        <i class="fa fa-search  color" aria-hidden="true" id="search_icon"></i>&nbsp;&nbsp;
                        <input type="text" placeholder="Search Here..." id="search_text" name="search_text">
                        <div class="livesearch">
                            <p class="livesearch1"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="main">
                <?php
                    $list_ids = 1;
                    while ($row = mysqli_fetch_array($query)) {
                        $email = $row['Email'];
                        $id = $row['Blog_Id'];
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
                        <div id="list_<?php echo$list_ids;?>">
                            <h3 id="blogs_title"><a href="viewblog.php?id=<?php echo $id; ?>"><?php echo $row['Blog_title']; ?></a></h3>
                            <input type="hidden" value="<?php echo $email; ?>" name="profile_email" id="profile_email">
                            <h5>Published By :&nbsp;<a href="profile.php?profile_email=<?php echo $email; ?>" name="link" id="link"><?php echo $Firstname." ".$Lastname ?></a>&emsp;&emsp;
                            <i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i>&emsp;Likes : <span id="date"><?php echo mysqli_num_rows($query2); ?></span>&emsp;&emsp;
                            <i class="fa fa-comments fa-lg" aria-hidden="true"></i>&emsp;Comments : <span id="date"><?php echo mysqli_num_rows($query3); ?></span>&emsp;&emsp;
                            Created On: <span id="date"><?php echo $row['Blog_date']." ".$row['Blog_time']; ?></span></h5>
                        </div>
                        <style type="text/css">
                            #list_<?php echo $list_ids; ?> {
                                width: 100%;
                                background-color: #f1f1f1;
                                height: 15vh;
                                border-bottom: 1px solid gray;
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
                    data: {row1:number},
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