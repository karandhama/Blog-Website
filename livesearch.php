<?php
    if (isset($_POST['key'])){
        include('connect.php');
        $key = $_POST['key'];
        //$sql = "SELECT * FROM users WHERE Firstname LIKE '%'.$key.'%' OR Lastname LIKE '%'.$key.'%'";
        $sql=" SELECT * FROM users WHERE Firstname like '$key%' OR Lastname LIKE '$key%' OR Email LIKE '$key%'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query);
        /*$array = array(
                'Firstname' => $row['Firstname'],
                'Lastname' => $row['Lastname']
        );*/
        $output = '';
        if (mysqli_num_rows($query)==0){
            $output .= "No Record found";
        }
        while ($row = mysqli_fetch_array($query)) {
            $email = $row['Email'];
            $name = $row['Firstname']." ".$row['Lastname'];
            $output .= "<li id='search_result'><a href='profile.php?profile_email=$email'>".$name."</a></li>";
        }
        echo $output;
    }
?>