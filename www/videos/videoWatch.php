<?php
    /**
     * Created by PhpStorm.
     * User: atara
     * Date: 2/7/2019
     * Time: 22:27
     */

    require '../config/sql_connect.php';

    try {
        $stmt = $connect->prepare('SELECT * FROM payments WHERE user = :user');
        $stmt->execute(array(
            ':user' => $_SESSION['id']
        ));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($data == false){
            header('Location: ../payments/subscribe.php');
        }
    }
    catch(PDOException $e) {
        $errMsg = $e->getMessage();
    }

    include '../include/header.php';

    $videoId = $_GET['id'];
    $video = $videosCollection->findOne(array("_id" => new MongoId($videoId)));
?>
<div class="container">
    <div class="jumbotron videojumbotron">
        <h3><?php echo $video['name']; ?></h3>
        <div align="center" class="embed-responsive embed-responsive-16by9">
            <video id='my-video' class='video-js embed-responsive-item' controls preload='auto'
                   poster="<?php echo $video['ip']?>/images/<?php echo $video['image']; ?>"  data-setup='{}'>
                <source src="<?php echo $video['ip']?>/videos/<?php echo $video['file']; ?>" type="video/mp4">
            </video>
        </div>
    </div>
</div>

<?php include '../include/footer.php'; ?>


