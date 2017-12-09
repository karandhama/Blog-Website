<?php
    include('connect.php');
    if (isset($_POST['row'])){
        $row = $_POST['row'];
        session_start();
        $email = $_SESSION['email'];
        $limit = 5;
        $sql1 = "SELECT * FROM user_blogs WHERE Email='$email' ORDER BY Blog_date DESC,Blog_time DESC LIMIT $row,$limit";
        $query1 = mysqli_query($conn,$sql1);
        $output = '';
        $list_ids = $row+1;

        while($row1 = mysqli_fetch_array($query1)){
                $id = $row1['Blog_Id'];
                $sql2 = "SELECT * FROM likes WHERE Blog_Id='$id'";
                $query2 = mysqli_query($conn,$sql2);
                $sql3 = "SELECT * FROM comments WHERE Blog_Id='$id'";
                $query3 = mysqli_query($conn,$sql3);
                $ti = $row1['Blog_title'];
                $da = $row1['Blog_date'];
                $ta = $row1['Blog_time'];

            $output .= '<div id="list_'.$list_ids.'">';
            $output .= '<h3><span>'.$ti.'</span></h3>';
            $output .= '<h4 id="timings">Created On : <span>'.$da.'&emsp;'.$ta.'(UTC)</span></h4>';
            $output .= '<div id="likes">';
            $output .= '<h4><i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i>&emsp;Likes : <span>'. mysqli_num_rows($query2).'</span></h4>';
            $output .= '<h4><i class="fa fa-comments fa-lg" aria-hidden="true"></i>&emsp;Comments : <span>'. mysqli_num_rows($query3).'</span></h4>';
            $output .= '</div>';
            $output .= '<a href="changeblog.php?id='.$id.'" id="submit1">Submit</a>';
            $output .= '</div>';

            $output .= '<style type="text/css">
                        #list_'.$list_ids.'{
                            width: 90%;
                            display: block;
                            margin: auto;
                            background-color: #f1f1f1;
                            height: 25vh;
                            border-radius: 5px;
                            margin-top: 3%;
                            box-shadow: 1px 1px 20px gray;
                        }

                        #list_'.$list_ids.' h3 {
                            margin: 0;
                            padding-left: 5%;
                            padding-top: 2%;
                            width: 95%;
                            float: left;
                        }
                    </style>';
            $list_ids++;
        }
        echo $output;
    }

    if (isset($_POST['row1'])){
        $row_num = $_POST['row1'];
        $limit = 5;
        $sql1 = "SELECT * FROM user_blogs ORDER BY Blog_date DESC,Blog_time DESC LIMIT ".$row_num.",".$limit;
        $query1 = mysqli_query($conn,$sql1);
        $output = '';
        $list_ids = $row_num+1;

        while ($row1 = mysqli_fetch_array($query1)) {
            $email = $row1['Email'];
            $id = $row1['Blog_Id'];
            $sql2 = "SELECT Firstname,Lastname FROM users WHERE Email='$email'";
            $query2 = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_array($query2);
            $sql3 = "SELECT * FROM likes WHERE Blog_Id='$id'";
            $query3 = mysqli_query($conn,$sql3);
            $sql4 = "SELECT * FROM comments WHERE Blog_Id='$id'";
            $query4 = mysqli_query($conn,$sql4);

            $Firstname = $row2['Firstname'];
            $Lastname = $row2['Lastname'];

            $ti = $row1['Blog_title'];
            $da = $row1['Blog_date'];
            $ta = $row1['Blog_time'];

            $output .= '<div id="list_'.$list_ids.'">';
            $output .= '<h3 id="blogs_title"><a href="viewblog.php?id='.$id.'">'.$ti.'</a></h3>';
            $output .= '<h5>Published By :&nbsp;<a href="profile.php?profile_email='.$email.'" name="link" id="link">'.$Firstname." ".$Lastname.'</a>&emsp;&emsp;';
            $output .= '<i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i>&emsp;Likes : <span id="date">'.mysqli_num_rows($query3).'</span>&emsp;&emsp;';
            $output .= '<i class="fa fa-comments fa-lg" aria-hidden="true"></i>&emsp;Comments : <span id="date">'.mysqli_num_rows($query4).'</span>&emsp;&emsp;';
            $output .= 'Created On: <span id="date">'.$da.' '.$ta.'</span></h5>';
            $output .= '</div>';
            $output .= '<style type="text/css">
                            #list_'.$list_ids.'{
                                width: 100%;
                                background-color: #f1f1f1;
                                height: 15vh;
                                border-bottom: 1px solid gray;
                            }
                    </style>';
            $list_ids++;
        }
        echo $output;
    }

    if (isset($_POST['row2'])){
        $row_num = $_POST['row2'];
        $id = $_POST['id'];
        $limit = 5;
        $sql1 = "SELECT * FROM comments WHERE Blog_Id = '$id' ORDER BY Id DESC LIMIT $row_num,$limit";
        $query1 = mysqli_query($conn,$sql1);
        $output = '';
        $list_ids = $row_num+1;

        while ($row1 = mysqli_fetch_array($query1)) {
            $output .= '<div id="individual_comment_'.$list_ids.'">';
            $output .= '<h4 style="color:#0077b3;margin:0;padding-top:1%;">'.$row1['Name'].'</h4>';
            $output .= '<p style="font-size:15px;margin-top:1%;">'.$row1['Comment'].'</p>';
            $output .= '<h5 style="margin:0;">'.$row1['comment_date'].' '.$row1['comment_time'].'</h5>';
            $output .= '</div>';
            $output .= '<style type="text/css">
                            #individual_comment_'.$list_ids.'{
                                border-bottom: 1px solid #c2c2a3;
                                border-top: 1px solid #c2c2a3;
                            }
                    </style>';
            $list_ids++;
        }
        echo $output;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Css/createblog.css">
    </head>
</html>