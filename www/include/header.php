<?php
/**
 * Created by PhpStorm.
 * User: atara
 * Date: 2/7/2019
 * Time: 22:27
 */

require '../config/sql_connect.php';
require '../config/mongo_connect.php';

if(empty($_SESSION['id']))
    header('Location: ../index.php');

$subscribed = "false";

try {
    $stmt = $connect->prepare('SELECT * FROM payments WHERE user = :user');
    $stmt->execute(array(
        ':user' => $_SESSION['id']
    ));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if($data != false){
        $subscribed = "true";
    }
}
catch(PDOException $e) {
    $errMsg = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://vjs.zencdn.net/7.4.1/video-js.css" rel="stylesheet">
    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src='https://vjs.zencdn.net/7.4.1/video.js'></script>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../videos/videoMain.php">MyFlix</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="../videos/videoMain.php">Home</a></li>
                    <li><a href="../videos/videoList.php">All Videos</a></li>
                    <li><a href="../videos/videoList.php?order=rating" style="font-weight: 600;">Top 5</a></li>
                    <?php
                        if($subscribed == "false") {
                            echo '<li><a href="../payments/subscribe.php" style="font-weight: 900; color: red;">Subscribe!!!</a></li>';
                        }
                    ?>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o" aria-hidden="true" style="font-size: 1.5em;"></i>&nbsp;&nbsp;<?php echo $_SESSION['name'] . " " . $_SESSION['surname']?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../users/userView.php">My Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="../logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>

                <div class="col-sm-3 col-md-3 navbar-right">
                    <form class="navbar-form" role="search" action="../videos/videoList.php">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="title">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div class="top80"></div>