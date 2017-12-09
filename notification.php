<?php
include('connect.php');
session_start();

    if (isset($_POST['view'])){
        $email = $_SESSION['email'];
        $st = $_POST['view'];
        $sql = "SELECT * FROM comments WHERE Email = '$email' AND View_status = '$st' ORDER BY Id DESC";
        $query = mysqli_query($conn,$sql);
        //$sql4 = "SELECT * FROM likes WHERE Email = '$email' AND View_status = '$st' ORDER BY Id DESC";
        //$query4 = mysqli_query($conn,$sql);
        $sql4 = "SELECT * FROM likes WHERE Owner_email = '$email' AND View_status = '$st' ORDER BY Id DESC";
        $query4 = mysqli_query($conn,$sql4);
        $sql8 = "SELECT * FROM follow_notifications WHERE follower_email = '$email' ORDER BY Id DESC";
        $query8 = mysqli_query($conn,$sql8);
        $output = '';
        $output1 = '';
        $output2 = '';
        if (mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_array($query)){
                $id = $row['Blog_Id'];
                $sql2 = "SELECT * FROM user_blogs WHERE Blog_Id = '$id'";
                $query2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_array($query2);
                $output .= '
                    <li id="space">
                        <h3>'.$row2['Blog_title'].'</h3><br>
                        <strong>'.$row['Name'].'</strong><br>
                        <small><em>'.$row['Comment'].'</em></small><br>
                        <small>On '.$row['comment_date'].' '.$row['comment_time'].'</small><br>
                    </li>
                ';
            }
        }
        else {
            $output .= 'No New Comments found';
        }
        if (mysqli_num_rows($query4) > 0){
            while($row4 = mysqli_fetch_array($query4)){
                $id = $row4['Blog_Id'];
                $like_email = $row4['Email'];
                $sql5 = "SELECT * FROM users WHERE Email = '$like_email'";
                $query5 = mysqli_query($conn,$sql5);
                $row5 = mysqli_fetch_array($query5);
                $sql6 = "SELECT * FROM user_blogs WHERE Blog_Id = '$id'";
                $query6 = mysqli_query($conn,$sql6);
                $row6 = mysqli_fetch_array($query6);
                $output1 .= '
                    <li id="space">
                        <h3>'.$row6['Blog_title'].'</h3><br>
                        <strong>'.$row5['Firstname'].' '.$row5['Lastname'].' (<small><em>'.$row4['Email'].'</em></small>)</strong> liked this post
                        <br><small>On '.$row4['like_date'].' '.$row4['like_time'].'</small><br>
                    </li>
                ';
            }
        }
        else {
            $output1 .= 'No New Likes found';
        }
        if (mysqli_num_rows($query8) > 0){
            while($row8 = mysqli_fetch_array($query8)){
                $id = $row8['Blog_Id'];
                $following_email = $row8['following_email'];
                $sql9 = "SELECT * FROM user_blogs WHERE Blog_Id = '$id'";
                $query9 = mysqli_query($conn,$sql9);
                $row9 = mysqli_fetch_array($query9);
                $sql10 = "SELECT * FROM users WHERE Email = '$following_email'";
                $query10 = mysqli_query($conn,$sql10);
                $row10 = mysqli_fetch_array($query10);
                $output2 .= '
                    <li id="space">
                        <h3 style="margin:0;">'.$row10['Firstname'].' '.$row10['Lastname'].' (<small><em>'.$row9['Email'].'</em></small>) created a new blog</h3>
                        <h3><a href="viewblog.php?id='.$id.'&notification=true" style="color:#0077b3;">'.$row9['Blog_title'].'</a></h3><small>on :  '.$row9['Blog_date'].' '.$row9['Blog_time'].'</small><br>
                    </li><hr>
                ';
            }
        }
        else {
            $output2 .= 'No New Blogs found from your following people network';
        }


        $sql3 = "UPDATE comments SET View_status = TRUE WHERE Email = '$email' AND View_status = '$st'";
        $query3 = mysqli_query($conn,$sql3);
        $sql7 = "UPDATE likes SET View_status = TRUE WHERE Owner_email = '$email' AND View_status = '$st'";
        $query7 = mysqli_query($conn,$sql7);
        $data = array(
                'comment_notification'  => $output,
                'like_notification'  => $output1,
                'follow_notification'  => $output2
            );
        echo json_encode($data);
    }

    if (isset($_POST['view_status'])){
        $email = $_SESSION['email'];
        $status = $_POST['view_status'];
        $sql1 = "SELECT * FROM comments WHERE Email = '$email' AND View_status = '$status'";
        $query1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_fetch_row($query1);
        $count1 = mysqli_num_rows($query1);
        $sql2 = "SELECT * FROM likes WHERE Owner_email = '$email' AND View_status = '$status'";
        $query2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_row($query2);
        $count2 = mysqli_num_rows($query2);
        $sql11 = "SELECT * FROM follow_notifications WHERE follower_email = '$email'";
        $query11 = mysqli_query($conn,$sql11);
        $row11 = mysqli_fetch_row($query11);
        $count11 = mysqli_num_rows($query11);
        /*$data = array(
                'notification'  => $output,
                'unseen_count'  => $count
            );*/
        $count = $count1 + $count2 + $count11;
        echo json_encode($count);
    }
?>