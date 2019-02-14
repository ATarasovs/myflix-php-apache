<?php
/**
 * Created by PhpStorm.
 * User: atara
 * Date: 2/7/2019
 * Time: 22:27
 */

require '../config/sql_connect.php';

if(isset($_POST['subscribe'])) {
    $errMsg = '';

    // Get data from FROM
    $cardnumber = $_POST['cardnumber'];
    $date = "30.01.2019";
    $amount = $_POST['amount'];

    if ($amount == 10) {
        $plan = "Basic";
    } else if ($amount == 25){
        $plan = "Premium";
    } else if ($amount == 45) {
        $plan = "Platinum";
    } else if ($amount == 70) {
        $plan = "Diamond";
    }
    $user = $_SESSION['id'];

    try {
        $stmt = $connect->prepare('INSERT INTO payments (cardnumber, date, plan, amount, user) VALUES (:cardnumber, :date, :plan, :amount, :user)');
        $stmt->execute(array(
            ':cardnumber' => $cardnumber,
            ':date' => $date,
            ':plan' => $plan,
            ':amount' => $amount,
            ':user' => $user
        ));
        header("Refresh:0");
        exit;
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}

include '../include/header.php';
?>

<?php
    if ($subscribed == "true") { ?>
        <div class="container">
        <h1 style="text-align:center;"><strong>Thank you!!! </strong>You are subscribed!</h1>
    <?php } else {?>
    <div class="container">
        <h1 style="text-align:center;"><strong>Subscribe</strong> to any plan to get access to all our videos.</h1>
        <br><br>

        <div class="sub_table">
            <div class="container">
                <div class="row">
                    <div class="table_title">
                        <p>Step One</p>
                        <hr>
                        <h1>Choose Your Plan</h1>
                    </div>
                    <div class="col-sm-3 col-md-3 col-xs-12">
                        <div class="box-1 center">
                            <div class="panel panel-success panel-pricing">
                                <div class="panel-heading">
                                    <h3>1 Month</h3>
                                </div>
                                <div class="panel-body text-center">
                                    <p><strong>$10</strong></p>
                                </div>
                                <ul class="list-group text-center">
                                    <li class="list-group-item"><strong>Basic</strong></li>
                                </ul>
                                <div class="panel-footer"> <a class="btn btn-lg btn-block btn-success"  id="join1">SUBSCRIBE</a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-xs-12">
                        <div class="box-1 center">
                            <div class="panel panel-success panel-pricing">
                                <div class="panel-heading">
                                    <h3>3 Month</h3>
                                </div>
                                <div class="panel-body text-center">
                                    <p><strong>$25</strong></p>
                                </div>
                                <ul class="list-group text-center">
                                    <li class="list-group-item"><strong>Premium</strong></li>
                                </ul>
                                <div class="panel-footer"> <a class="btn btn-lg btn-block btn-success"  id="join2">SUBSCRIBE</a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-xs-12">
                        <div class="box-1 center">
                            <div class="panel panel-success panel-pricing">
                                <div class="panel-heading">
                                    <h3>6 Month</h3>
                                </div>
                                <div class="panel-body text-center">
                                    <p><strong>$45</strong></p>
                                </div>
                                <ul class="list-group text-center">
                                    <li class="list-group-item"><strong>Platinum</strong></li>
                                </ul>
                                <div class="panel-footer"> <a class="btn btn-lg btn-block btn-success"  id="join3">SUBSCRIBE</a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-xs-12">
                        <div class="box-1 center">
                            <div class="panel panel-success panel-pricing">
                                <div class="panel-heading">
                                    <h3>12 Month</h3>
                                </div>
                                <div class="panel-body text-center">
                                    <p><strong>$70</strong></p>
                                </div>
                                <ul class="list-group text-center">
                                    <li class="list-group-item"><strong>Diamond</strong></li>
                                </ul>
                                <div class="panel-footer"> <a class="btn btn-lg btn-block btn-success"  id="join4">SUBSCRIBE</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="form_div1" class="row">
            <div class="container">
                <div class="order">
                    <div class="table_title">
                        <p>Step Two</p>
                        <hr>
                        <h1>Add a Payment Method </h1>
                    </div>
                    <form action="" method="post">
                        <div class="col-sm-8 col-md-8 col-xs-12">
                            <div class="row">
                                <div class="col-sm-9 col-md-9 col-xs-12">
                                    <p>
                                        <input type="text" name="cardnumber" placeholder="Credit Card / Debit Card Number ">
                                    </p>
                                </div>
                                <div class="col-sm-3 col-md-3 col-xs-12">
                                    <p>
                                        <input type="text" name="cvv" placeholder="CVV">
                                    </p>
                                </div>
                                <div class="col-sm-3 col-md-3 col-xs-12">
                                    <p>
                                        <select name="month">
                                            <option class="active">Month</option>
                                            <option value="1">January</option>
                                            <option value="2">Febuary</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </p>
                                </div>
                                <div class="col-sm-3 col-md-3 col-xs-12">
                                    <p>
                                        <select name="year">
                                            <option class="active">Year</option>
                                            <option value="1">2015</option>
                                            <option value="2">2016</option>
                                            <option value="2">2017</option>
                                            <option value="2">2018</option>
                                            <option value="2">2019</option>
                                        </select>
                                    </p>
                                </div>
                                <div class="col-sm-3 col-md-3 col-xs-12">
                                    <p>
                                        <input type="text" name="zip" placeholder="Billing Zip">
                                    </p>
                                </div>
                                <div class="col-sm-3 col-md-3 col-xs-12">
                                    <p>
                                        <input type="text" name="amount" class="amountToPay" readonly>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-xs-12">
                            <div class="r_pay">
                                <!-- PayPal Logo --><table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/uk/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/uk/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png" border="0" alt="PayPal Acceptance Mark"></a></td></tr></table><!-- PayPal Logo -->
                                <input type="submit" name='subscribe' value="Get it" class='btn'>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script>
    $(document).ready(function(e) {
        $("#form_div, #form_div1").hide();


        $("#join1").click(function(){
            $("#form_div, #form_div1").toggle( "slow" );
            $(".amountToPay").val(10);
        });

        $("#join2").click(function(){
            $("#form_div, #form_div1").toggle( "slow" );
            $(".amountToPay").val(25);
        });

        $("#join3").click(function(){
            $("#form_div, #form_div1").toggle( "slow" );
            $(".amountToPay").val(45);
        });

        $("#join4").click(function(){
            $("#form_div, #form_div1").toggle( "slow" );
            $(".amountToPay").val(70);
        });
    });
</script>

<?php
    include '../include/footer.php';
?>