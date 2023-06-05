<?php
    include 'func.php';
    include 'config.php';
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechDuct</title>
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
                <a href="yourposts.php" class="menu" style="color:white" ><?php echo "Your posts: ".$_SESSION['username']."" ?></a>
                <a href="logout.php" class="menu" style="color:white">Logout</a>
                
            </div>
        </div>
    </header>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5 mb-5">
                <?php
                       
                    if ($_POST) {
                        $baslik     = htmlspecialchars($_POST["baslik"]);
                        $aciklama   = htmlspecialchars($_POST["aciklama"]);
                        $resim      = htmlspecialchars($_POST["resim"]);
                        $link       = permalink($baslik);
                        $usern     = $_SESSION['username'];
                        $poststatus = 'pending';
                        
                        if (empty($baslik) || empty($aciklama) || empty($resim)) {
                            echo '<p class="alert alert-warning">Please do not leave blank!</p>';
                        } else {
                              $veriekle = "INSERT INTO yazilar (yazi_baslik, yazi_aciklama, yazi_link, yazi_resim, username, status) VALUES ('$baslik','$aciklama','$link','$resim','$usern', '$poststatus')";
                                if(mysqli_query($conn,$veriekle)){
                                    if ($veriekle) {
                                        echo '<p class="alert alert-success">Successfully added! :)</p>';
                                        header("Location:welcome.php");
                                    } else {
                                        echo '<p class="alert alert-danger">Failed, failed to attach! :(</p>';
                                        header("REFRESH:2;URL=yaziekle.php");
                                    }
                                }
                        }
                    }

                ?>
                <form action="" method="post">
                    <strong>Title:</strong>
                    <input type="text" name="baslik" class="form-control">
                    <strong>Definition:</strong>
                    <textarea name="aciklama" cols="30" rows="10" class="form-control"></textarea>
                    <strong>Image Link:</strong>
                    <input type="text" name="resim" class="form-control">
                    <br />
                    <input type="submit" value="Share" class="btn btn-dark">
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>