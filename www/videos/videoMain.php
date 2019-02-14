<?php
/**
 * Created by PhpStorm.
 * User: atara
 * Date: 2/7/2019
 * Time: 22:27
 */

include '../include/header.php';

$videos = $videosCollection->find();
$videos = $videos->sort(array('rating'=>-1))->limit(3);
$count = 0;
?>

<div class="container">
    <div class="jumbotron">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php foreach ($videos as $video) {
                    if ($count == 0) { ?>
                        <div class="item active">
                            <a href="videoWatch.php?id=<?php echo $video['_id']; ?>">
                                <img height="800px" src="<?php echo $video['ip']?>/images/<?php echo $video['image']; ?>" class="d-block w-100" alt="...">
                            </a>
                        </div>
                        <?php $count++;
                    }
                    else { ?>
                        <div class="item">
                            <a href="videoWatch.php?id=<?php echo $video['_id']; ?>">
                                <img height="800px" src="<?php echo $video['ip']?>/images/<?php echo $video['image']; ?>" class="d-block w-100" alt="...">
                            </a>
                        </div>
                        <?php $count++;
                    }
                } ?>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<?php include '../include/footer.php'; ?>