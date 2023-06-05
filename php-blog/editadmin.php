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
                <a href="welcomeadmin.php" class="logo"><strong><h3 style="color:white; ">TechDuct</h3></strong></a>
                
            </div>
            <div class="col-lg-6 text-right">
                <a href="yaziekleadmin.php" class="menu" style="color:white">Add</a>
                <a href="logout.php" class="menu" style="color:white">Logout</a>
                
            </div>
        </div>
    </header>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-left mt-5 mb-5">
                <?php 
                        $id = $_GET['id'];
                        $s2l = "SELECT yazi_baslik, yazi_aciklama, yazi_resim FROM yazilar WHERE yazi_id='$id'";
                        $result = mysqli_query($conn,$s2l);
                        while($res=mysqli_fetch_array($result)){
                            $ttle= $res["yazi_baslik"];
                            $abt= $res["yazi_aciklama"];
                            $mg= $res["yazi_resim"];

                            if(isset($_POST["sdd"])){
                            
                                $title=trim($_POST["title"]);
                                $about=trim($_POST["about"]);
                                $link=trim($_POST["image"]);
                                if(empty($title)||empty($about)||empty($link)){
                                    echo "Please fill the blank";
                                }else{
                                    $veriekle = "UPDATE yazilar SET yazi_baslik='$title', yazi_aciklama='$about', yazi_resim='$link' WHERE yazi_id='$id'";
                                    if(mysqli_query($conn,$veriekle)){
                                        if ($veriekle) {
                                            echo '<p class="alert alert-success">Successfully added! :)</p>';
                                            header("REFRESH:2;URL=welcomeadmin.php");
                                        } else {
                                            echo '<p class="alert alert-danger">Failed, failed to attach! :(</p>';
                                            header("REFRESH:2;URL=yaziekleadmin.php");
                                        }
                                    }
                                }
                        
                            }
                        }
                              

                ?>
                <form action="" method="post">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" value="<?php echo $ttle ?>">
                    <strong>Definition:</strong>
                    <textarea name="about" cols="30" rows="10" class="form-control"><?php echo $abt ?></textarea>
                    <strong>Image Link:</strong>
                    <input type="text" name="image" class="form-control" value="<?php echo $mg ?>">
                    <br />
                    <input type="submit" value="Share" name="sdd" class="btn btn-dark">
                </form>
            </div>
        </div>
    </div>
</body>
</html>