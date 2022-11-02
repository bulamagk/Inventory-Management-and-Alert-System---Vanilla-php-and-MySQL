<?php
require_once "./config/connection.php";
$scipt_name = pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_FILENAME);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMAS | <?=strtoupper($scipt_name)?> </title>
    <!-- DataTable -->
    <link rel="stylesheet" href="./assets/datatable/css/datatables.css">
    <link rel="stylesheet" href="./assets/datatable/css/buttons.bootstrap.min.css">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">
</head>

<body>
    <div class="admin-container">
        <aside>
            <img src="./assets/img/logo.png" alt="" class="logo">
            <ul>
                <li>
                    <a href="home.php" <?php echo $scipt_name == 'home' ? 'class="active"' : ''; ?> > <i style = "color: #4a84f1;" class="fab fa-dashcube"></i> &nbsp; Dashboard</a>
                </li>
                <li>
                    <a href="notification.php" <?php echo $scipt_name == 'notification' ? 'class="active"' : ''; ?> > <i style = "color: #4a84f1;" class="fa fa-bell"></i> &nbsp; Notifications</a>
                </li>
                <li>
                    <a href="product.php" <?php echo $scipt_name == 'product' ? 'class="active"' : ''; ?> > <i style = "color: #4a84f1;" class="fab fa-product-hunt"></i> &nbsp; Product</a>
                </li>
                <li>
                    <a href="purchase.php" <?php echo $scipt_name == 'purchase' ? 'class="active"' : ''; ?> > <i style = "color: #4a84f1;" class="fas fa-cart-plus"></i> &nbsp; Purchase</a>
                </li>
                <li>
                    <a href="stock.php" <?php echo $scipt_name == 'stock' ? 'class="active"' : ''; ?> > <i style = "color: #4a84f1;" class="fas fa-cog"></i> &nbsp; Stock</a>
                </li>
                <li>
                    <a href="sales.php" <?php echo $scipt_name == 'sales' ? 'class="active"' : ''; ?> > <i style = "color: #4a84f1;" class="fas fa-shopping-cart"></i> &nbsp; Sales</a>
                </li>
                
                <?php
                    if($_SESSION['role'] == 'Admin'){ ?>
                        <li>
                            <a href="staff.php" <?php echo $scipt_name == 'staff' ? 'class="active"' : ''; ?> > <i style = "color: #4a84f1;" class="fas fa-users"></i> &nbsp; Staff</a>
                         </li>
                  <?php  }
                ?>

                <li>
                    <a href="profile.php" <?php echo $scipt_name == 'profile' ? 'class="active"' : ''; ?> > <i style = "color: #4a84f1;" class="fas fa-user-cog"></i> &nbsp; My Profile</a>
                </li>
                <li>
                    <a href="logout.php" onclick = "return confirm('Logout?')"> <i style = "color: #4a84f1;" class="fas fa-sign-out-alt"></i> &nbsp; Logout</a>
                </li>
            </ul>
        </aside>
        <div class="content">
            <div class="content-head">
                <div id="bars">
                    <i class="fas fa-bars"></i>
                </div>
                <a href="logout.php" class="" onclick = "return confirm('Logout?')">logout</a>
            </div>
            <div class="content-body">
