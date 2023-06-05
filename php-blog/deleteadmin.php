<?php
    session_start();
    include 'config.php';
    include 'func.php';
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="container"> 
        <div class="row" style="background-color:black">
            <div class="col-lg-6">
                <a href="welcome.php" class="logo"><strong><h3 style="color:white; ">TechDuct</h3></strong></a> 
            </div>
            <div class="col-lg-6 text-right">
                <a href="adminposts.php" class="menu" style="color:white" ><?php echo "Welcome: ".$_SESSION['username']."" ?></a>
                <a href="yaziekleadmin.php" class="menu" style="color:white">Add</a>
                <a href="logout.php" class="menu" style="color:white">Logout</a> 
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-5 mb-5">
                <h1><strong>Delete POST</strong></h1>
                <p>Are you sure delete this post??</p>
                <form action="" method="POST">
                    <input id="post_button" class="btn btn-dark" style="color:red" type="submit" value="DELETE" name="btn">
                    <?php
                            $id = $_GET['id'];
                            if(isset($_POST["btn"])){
                                $veri = "DELETE FROM yazilar WHERE yazi_id='$id'";
                                if(mysqli_query($conn,$veri)){
                                    header("Location:welcomeadmin.php");
                                }
                            }
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>