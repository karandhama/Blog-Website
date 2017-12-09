<?php
    include 'connect.php';
    $sql = "SELECT * FROM contact ORDER BY Id DESC";
    $query = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contacts</title>
        <link rel="stylesheet" type="text/css" href="Css/admin.css">
        <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div id="upper_heading">
                    <ul id="navigation">
                        <li><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;<a href="logout.php">Log out</a></li>
                    </ul>
                </div>
                <div id="title">
                    <h1 id="title_text">Contacts</h1>
                </div>
            </div>
            <div>
                <?php
                    while ($row = mysqli_fetch_array($query)) {?>
                        <div id="contact_viewer">
                            <h3><?php echo $row['Firstname']." ".$row['Lastname']; ?></h3>
                            <h5>Email : <span><?php echo $row['Email']; ?></span> &emsp;
                                Mobile : <span><?php echo $row['Mobile']; ?></span>
                            </h5>
                        </div>
                    <?php }
                ?>
            </div>
        </div>
    </body>
</html>