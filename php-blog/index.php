<?php
    include 'config.php';
    include 'func.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Tasarımı</title>
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
                <a href="" class="logo"><strong><h3 style="color:white; ">TechDuct</h3></strong></a>
            </div>
            <div class="col-lg-6 text-right">
                <a href="login.php" class="menu" style="color:white">Log in</a>
                <a href="register.php" class="menu" style="color:white">Sign up</a>
            </div>
        </div>
    </header>
    
    <div class="container">
        <div class="row" style="background-color:grey">
            <div class="col-lg-12 text-center mt-5 mb-5">
                <h1><strong>TechDuct</strong></h1>
                <p>Technology and Product Review</p>
            </div>
        </div>
        <div class="row">
            <?php
                $veri = "SELECT * FROM yazilar WHERE status='approved' ORDER BY yazi_id DESC";
                $islem = mysqli_query($conn,$veri);
                mysqli_fetch_all($islem, MYSQLI_ASSOC);
                foreach($islem as $row){
                    echo '<div class="col-lg-4">
                        <div class="card">
                            <img src="'.$row["yazi_resim"].'" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">'.$row["yazi_baslik"].'</h5>
                            <p class="card-text">'.kisalt($row["yazi_aciklama"], 140).'</p>
                            </div>
                        </div>
                    </div>';
                }
            ?>
            
        </div>
    </div>
    
</body>
</html>