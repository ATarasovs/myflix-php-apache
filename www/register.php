<?php
/**
 * Created by PhpStorm.
 * User: atara
 * Date: 2/10/2019
 * Time: 20:31
 */


require 'config/sql_connect.php';

if(!empty($_SESSION['id']))
    header('Location: videos/videoMain.php');


if(isset($_POST['register'])) {
    $errMsg = '';

    // Get data from FROM
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $phone = $_POST['phone'];

    if($username == '')
        $errMsg = 'Enter username';
    if($password == '')
        $errMsg = 'Enter password';
    if($name == '')
        $errMsg = 'Enter name';
    if($surname == '')
        $errMsg = 'Enter surname';
    if($email == '')
        $errMsg = 'Enter email';
    if($birthdate == '')
        $errMsg = 'Enter birthdate';
    if($phone == '')
        $errMsg = 'Enter phone number';

    if($errMsg == ''){
        try {
            $stmt = $connect->prepare('INSERT INTO users (username, password, name, surname, email, birthdate, phone) VALUES (:username, :password, :name, :surname, :email, :birthdate, :phone)');
            $stmt->execute(array(
                ':username' => $username,
                ':password' => $password,
                ':name' => $name,
                ':surname' => $surname,
                ':email' => $email,
                ':birthdate' => $birthdate,
                ':phone' => $phone
                ));
            header('Location: register.php?action=joined');
            exit;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'joined') {
    $errMsg = 'Registration successfull. Now you can <a href="index.php">login</a>';
}
?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="../css/login.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <title>PDO MySQL</title>
</head>

<body>
<!--  Display error message  -->
<?php if(isset($errMsg)) { ?>
    <div align="center">
        <div style="color:#FF0000;text-align:center;font-size:17px;"><?php echo $errMsg ?></div>
    </div>
    </div>
<?php } ?>

<div class="container">
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Register</h2>
                <p>Please register</p>
            </div>
            <form id="Register" action="" method="post">

                <div class="form-group">
                    <input type="text" name="username" autocomplete="off" class="form-control" placeholder="Username">
                </div>

                <div class="form-group">
                    <input type="password" name="password" autocomplete="off" class="form-control" placeholder="Password">
                </div>

                <div class="form-group">
                    <input type="text" name="name" autocomplete="off" class="form-control" placeholder="Name">
                </div>

                <div class="form-group">
                    <input type="text" name="surname" autocomplete="off" class="form-control" placeholder="Surname">
                </div>

                <div class="form-group">
                    <input type="text" name="email" autocomplete="off" class="form-control" placeholder="Email">
                </div>

                <div class="form-group">
                    <input type="text" name="birthdate" autocomplete="off" class="form-control" placeholder="Birthdate">
                </div>

                <div class="form-group">
                    <input type="text" name="phone" autocomplete="off" class="form-control" placeholder="Phone">
                </div>

                <div class="options">
                    <a href="index.php">Login</a><br/>
                </div>

                <input type="submit" name='register' value="Register" class='btn btn-primary'>

            </form>
        </div>
    </div>
</div>
</body>
</html>
