<?php
require_once 'header.php';
require_once 'validate_expire.php';

if(!isset($_SESSION['email'])){
    header('location: index.php');
}

// Get Total Products
$sql = "SELECT * FROM products_tb";
$products = $pdo->query($sql)->rowCount();

// Get Total Stock Products
$sql = "SELECT * FROM stock_tb";
$stock = $pdo->query($sql)->rowCount();

// Get Total Sales
$sql = "SELECT * FROM sales_tb";
$sales = $pdo->query($sql)->rowCount();

// Get Total Purchas
$sql = "SELECT * FROM purchase_tb";
$purchase = $pdo->query($sql)->rowCount();

// Get Total Staff
$sql = "SELECT * FROM users_tb";
$staff = $pdo->query($sql)->rowCount();

// Get Total Sales
$sql = "SELECT SUM(amount) AS Balance FROM sales_tb";
$result = $pdo->query($sql)->fetch();
$account_balance = $result->Balance;

// NOTIFICATION NUMBER
$notifications = 0;

// Get Expired Products
$sql = "SELECT * FROM stock_tb WHERE is_expire = 'true'";
$rows = $pdo->query($sql)->rowCount();
if($rows > 0 ) $notifications = $notifications + 1;

// Get About To Expire Products
$sql = "SELECT * FROM stock_tb WHERE days_to_expire > 0 ";
$rows = $pdo->query($sql)->rowCount();
if($rows > 0 ) $notifications = $notifications + 1;

?>

<h2>Dashboard</h2>
<div class="dashboard-grid">
    <div class="item">
        <i class="fa fa-bell fa-3x" aria-hidden="true"></i>
        <p>Notification(s)</p>
        <a href="notification.php" class="item-link"> <?=$notifications?> </a>
    </div>
    <div class="item">
        <i class="fab fa-product-hunt fa-3x" aria-hidden="true"></i>
        <p>Products</p>
        <a href="product.php" class="item-link"> <?=$products?> </a>
    </div>
    <div class="item">
        <i class="fas fa-cart-plus fa-3x"></i>
        <p>Purchases</p>
        <a href="purchase.php" class="item-link"> <?=$purchase?> </a>
    </div>
    <div class="item">
        <i class="fas fa-cog fa-3x"></i>
        <p>Stock</p>
        <a href="stock.php" class="item-link"> <?=$stock?> </a>
    </div>
    <div class="item">
        <i class="fas fa-shopping-cart fa-3x"></i>
        <p>Sales</p>
        <a href="sales.php" class="item-link"> <?=$sales?> </a>
    </div>
    
    <?php
        if($_SESSION['role'] == 'Admin'){ ?>
        <div class="item">
        <i class="fas fa-users fa-3x"></i>
        <p>Staff</p>
        <a href="staff.php" class="item-link"> <?=$staff?> </a>
        </div>
        <?php }
    ?>

    <div class="item">
        <i class="fas fa-dollar-sign fa-3x"></i>
        <p>Sales Account</p>
        <a href="account.php" class="item-link">N<?=$account_balance?></a>
    </div>
    <div class="item">
        <i class="fa fa-user-cog fa-3x"></i>
        <p>My Profile</p>
        <a href="profile.php" class="item-link">View Profile</a>
    </div>
</div>

<?php
require_once 'footer.php';
?>