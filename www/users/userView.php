<?php
    include '../include/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1 toppad" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $_SESSION['name']; ?> <?php echo $_SESSION['surname']; ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 " align="center">
                            <div class="left"><img class="locationListImage" src="https://avatars.servers.getgo.com/2205256774854474505_medium.jpg" alt="" width="200px"></div>
                        </div>
                        <div class=" col-md-8 col-lg-8 ">
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>First name</td>
                                        <td><?php echo $_SESSION['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Last name</td>
                                        <td><?php echo $_SESSION['surname']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><a href="mailto:<?php echo $_SESSION['email']; ?>"><?php echo $_SESSION['email']; ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Phone number</td>
                                        <td><?php echo $_SESSION['phone']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Birth date</td>
                                        <td><?php echo $_SESSION['birthdate']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

<!--                <div class="panel-footer">-->
<!--                    <button class="editBtn btn btn-primary btn-block" data-user-id="--><?php //echo $model->userId; ?><!--"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</div>

<?php include '../include/footer.php'; ?>

<script>
    $(document).ready(function() {

        $(".profileLi").addClass("active");
        initButtons();
    });

    function initButtons() {
        $( ".edit" ).click(function() {
            location.href = "userEdit.php" + "?id=" + userId;
        });
    }
</script>