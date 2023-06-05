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
    <title>Admin Page</title>
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
                <a href="admin.php" class="menu" style="color:white">Admin Panel</a>
            </div>
        </div>
    </header><br><br>
    <center>
        <div>
    <center><h3>Approve or Deny New Users</h3></center>
        <table id="users" style="border:1px solid black;margin-left:auto;margin-right:auto;">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email Address</th>
                <th>Action</th>
            </tr>
            <?php
            $query = "SELECT * FROM users WHERE status='pending' ORDER BY id ASC";
            $result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['username'];?></td>
                <td><?php echo $row['email'];?></td>
                <td>
                    <form action="admin.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                        <input type="submit" name="approve" value="Approve">
                        <input type="submit" name="deny" value="Deny">
                    </form>
                </td>
            </tr>
        </table>
        <?php } ?><br><br><br><br><br><br>
        <?php
        if(isset($_POST['approve'])){
            $id = $_POST['id'];
            $select = "UPDATE users SET status = 'approved' WHERE id='$id'";
            $result = mysqli_query($conn, $select);
            echo "<script>alert('Succesfully Approved!')</script>";
            header("Location: admin.php");

        }
        if(isset($_POST['deny'])){
            $id = $_POST['id'];
            $select = "DELETE FROM users WHERE id='$id'";
            $result = mysqli_query($conn, $select);
            echo "<script>alert('User Deleted!')</script>";
            header("Location: admin.php");
        }
    ?>
    </div></center>
    <center><h3> Approve or Deny New Posts</h3></center>
        <table id="users" style="border:1px solid black;margin-left:auto;margin-right:auto;">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>About</th>
                <th>Image</th>
                <th>Date</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
            <?php
            $query = "SELECT * FROM yazilar WHERE status='pending' ORDER BY yazi_id ASC";
            $result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($result)){
                $id=$row['yazi_id'];
            ?>
            <tr>
                <td><?php echo $row['yazi_id'];?></td>
                <td><?php echo $row['yazi_baslik'];?></td>
                <td><?php echo $row['yazi_aciklama'];?></td>
                <td><?php echo $row['yazi_resim'];?></td>
                <td><?php echo $row['yazi_tarih'];?></td>
                <td><?php echo $row['username'];?></td>
                <td>
                    <form action="admin.php" method="POST">
                        <input type="hidden" name="yazi_id" value="<?php echo $row['yazi_id'];?>">
                        <input type="submit" name="approve" value="Approve">
                        <input type="submit" name="deny" value="Deny">
                    </form>
                </td>
            </tr>
        </table>
        <?php }?><br><br><br><br><br><br>
        <?php
        $query = "SELECT * FROM yazilar";
        $result = mysqli_query($conn,$query);
        if(isset($_POST['approve'])){
            $id = $_POST['yazi_id'];
            $select = "UPDATE yazilar SET status ='approved' WHERE yazi_id='$id'";
            $result = mysqli_query($conn, $select);
            echo "<script>alert('Succesfully Approved!')</script>";
            header("Location: admin.php");

        }
        if(isset($_POST['deny'])){
            $id = $_POST['yazi_id'];
            $select = "DELETE FROM yazilar WHERE yazi_id='$id'";
            $result = mysqli_query($conn, $select);
            echo "<script>alert('Post is denied')</script>";
            header("Location: admin.php");
        }
    ?>
    <center><h3>Already Approved Posts</h3></center>
    <div class="container">
        <div class="row">
            <?php
            $query = "SELECT * FROM yazilar WHERE status='approved' ORDER BY yazi_id ASC";
            $result = mysqli_query($conn,$query);
            mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach($result as $row){
                echo '<div class="col-lg-4">
                    <div class="card">
                        <img src="'.$row["yazi_resim"].'" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">'.$row["yazi_baslik"].'</h5>
                        <p class="card-text">'.kisalt($row["yazi_aciklama"], 140).'</p>
                        <a href="yazi.php?link='.$row["yazi_link"].'" class="btn btn-dark">Read more</a>
                        <form action="admin.php" method="POST">
                        <input type="hidden" name="yazi_id" value='.$row["yazi_id"].'">
                        <input type="submit" name="delete" value="Delete" class="btn btn-dark">
                        </form>
                        </div>
                    </div>
                </div>';
            }    
            $q = "SELECT * FROM yazilar WHERE status='approved' ORDER BY yazi_id ASC";
            $r = mysqli_query($conn,$q);
            while($row = mysqli_fetch_array($r)){
                $id=$row['yazi_id'];
            }
            ?>
        <br><br><br><br><br><br>
        <?php
        if(isset($_POST['delete'])){
            $id = $_POST['yazi_id'];
            $select = "DELETE FROM yazilar WHERE yazi_id='$id'";
            $result = mysqli_query($conn, $select);
            echo "<script>alert('Post Deleted!')</script>";
            header("Location: admin.php");
        }
    ?>    
    </div>  
    </div> 
</body>
</html>