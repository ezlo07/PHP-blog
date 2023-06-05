<?php
    include 'func.php';
    include 'config.php';
    session_start();
    $message = $_SESSION['username'];
    $link = @$_GET["link"]; 
    $s2l = "SELECT * FROM yazilar WHERE yazi_link='$link' AND status='approved'";
    $result = mysqli_query($conn,$s2l);
    while($res=mysqli_fetch_array($result)){
        $uname= $res["username"];
        $mg= $res["yazi_resim"];
        $ttle= $res["yazi_baslik"];
        $abt= $res["yazi_aciklama"];
        $date =  $res["yazi_tarih"]; 
        $link = $res["yazi_link"];                         
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $ttle; ?></title>
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
                <a href="welcomeadmin.php" class="logo"><strong><h3 style="color:white; ">TechDuct</h3></strong></a>
            </div>
            <div class="col-lg-6" style="text-align: right">
                <a href="welcomeadmin.php" class="logo"><strong><h3 style="color:white; ">Go Back</h3></strong></a>
            </div>
        </div>
    </header>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5 mb-5">
            <strong>Username:</strong> <?php echo $uname; ?>
                <center><img src="<?=$mg?>" width="300px"></center>
                <a href="yaziadmin.php?link=<?php echo $link; ?>" class="link"><h1 class="text-center"><strong><?php echo $ttle; ?></strong></h1></a>
                <strong>Definition:</strong><pre><?php echo $abt; ?></pre>
                <p style="text-align: right"><strong style="text-align: right">Date:</strong> <?php echo $date; ?></p>
            </div>
        </div>
    </div>
</body>
</html>