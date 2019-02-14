<?php
    /**
     * Created by PhpStorm.
     * User: atara
     * Date: 2/7/2019
     * Time: 22:27
     */

    include '../include/header.php';

    $videoTitle = $_GET['title'];
    $videoCategory = $_GET['category'];
    $orderBy = $_GET['order'];

    if (($videoTitle == null || $videoTitle == "") && ($videoCategory == null || $videoCategory == "")){
        $videos = $videosCollection->find();
    }
    else if ($videoCategory == null || $videoCategory == ""){
        $videos = $videosCollection->find(["name" => $videoTitle]);
    }
    else if ($videoTitle == null || $videoTitle == ""){
        $videos = $videosCollection->find(["category" => $videoCategory]);
    }
    else {
        $videos = $videosCollection->find(["name" => $videoTitle, "category" => $videoCategory]);
    }

    if ($orderBy == "rating") {
        $videos = $videos->sort(array('rating'=>-1))->limit(5);
    }

    $categories = $categoriesCollection->find();
?>

<div class="container">
    <div class="row align-items-center justify-content-center">
        <form role="advancedSearch">
            <div class="col-md-5">
                <div class="form-group">
                    <?php if($videoTitle != "") { ?>
                        <input type="text" class="form-control" name="title" value="<?php echo $videoTitle; ?>">
                    <?php } else {?>
                        <input type="text" class="form-control" name="title">
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <select id="categorySelect" class="form-control" name="category">
                        <option value=""></option>
                        <?php
                            foreach ($categories as $category) {
                                echo "<option value='" . $category['category'] . "'>" . $category['category'] . "</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block submit"><i class="fa fa-search"></i> Search</button>
            </div>
        </form>
    </div>

    <ul class="list-unstyled video-list-thumbs row">
        <?php foreach ($videos as $video) { ?>
            <li class="col-lg-4 col-sm-6 col-xs-12">
                <a href="videoWatch.php?id=<?php echo $video['_id']; ?>" title="<?php echo $video['name']; ?>">
                    <img src="<?php echo $video['ip']?>/images/<?php echo $video['image']; ?>" alt="<?php echo $video['name']; ?>" class="img-responsive" height="130px" />
                    <h2><?php echo $video['name']; ?> <small>(<?php echo $video['category']; ?>)</small></h2>
                    <span class="glyphicon glyphicon-play-circle"></span>
                    <span class="duration"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $video['duration']; ?></span>
                    <span class="rating"><i class="fa fa-star" aria-hidden="true"></i> <?php echo $video['rating']; ?></span>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>

<script>
    var category = "<?php echo $videoCategory ?>";

    $(document).ready(function() {
        if (category != "") {
            $("#categorySelect").val(category);
        }
    });
</script>
<?php include '../include/footer.php'; ?>