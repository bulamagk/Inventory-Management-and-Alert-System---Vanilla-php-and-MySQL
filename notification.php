<?php
require_once 'header.php';

// Get Expired Products
$sql = "SELECT * FROM stock_tb WHERE is_expire = 'true'";
$expired = $pdo->query($sql)->fetchAll();
$total_loss = 0;


// Get About To Expire Products
$sql = "SELECT * FROM stock_tb WHERE days_to_expire > 0 ";
$about_to_expired = $pdo->query($sql)->fetchAll();


?>
<h2>Notifications</h2>

<?= $_SESSION['msg'] ?? '' ?>
<?php
    if(isset($_SESSION['msg'])){
        unset($_SESSION['msg']);
    } 
 ?>


<h3>About To Expire Products</h3>
<br>
<!-- About to Expire Products Section -->
<div class="w-100 min-h-70">
    <div class="w-100">
        <table class="table" style="font-size: 14px;">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Days To Expiration</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($about_to_expired as $about){ ?>

                <tr>
                    <td><?=$about->product?></td>
                    <td><?=$about->quantity?></td>
                    <td><?=$about->price?></td>
                    <td><?=$about->days_to_expire?></td>
                </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>
</div>

<h3>Expired Products</h3>
<br>
<!-- About to Expire Products Section -->
<div class="w-100 min-h-70">
    <div class="w-100">
        <table class="table" style="font-size: 14px;">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Loss</th>
                    <th>Expiration Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($expired as $expire){ $total_loss = $total_loss +  $expire->total_loss?>

                <tr>
                    <td><?=$expire->product?></td>
                    <td><?=$expire->quantity?></td>
                    <td><?=$expire->price?></td>
                    <td><?=$expire->total_loss?></td>
                    <td><?=$expire->expire?></td>
                    <td>
                    <a onclick = "return confirm('Delete Record?')"
                        href="delete_expire.php?product_id=<?=$expire->id?>" 
                        style="color: red;">
                        <i class="fas fa-trash"></i>
                    </a>
                    </td>
                </tr>

                <?php } ?>
                    <tr>
                        <td colspan="6"><small> <b> Total Loss: <?=$total_loss?></b></small></td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

<style>
    table th,
    table td {
        text-align: left;
    }
</style>
<!-- End products Section -->


<?= $_SESSION['msg'] ?? '' ?>
<?php
    if(isset($_SESSION['msg'])){
        unset($_SESSION['msg']);
    } 
 ?>

<style>
    table th,
    table td {
        text-align: center;
    }
</style>
<!-- End products Section -->


<!-- Modal JS -->
<script src="./assets/js/Admin/modal.js"></script>

<!-- Calculate Total Price -->
<script src="./assets/js/calculateTotal.js"></script>

<!-- DATATABLE -->
<script src="./assets/datatable/js/jquery-3.6.0.min.js"></script>
<script src="./assets/datatable/js/jquery.dataTables.min.js"></script>
<!-- <script src="./assets/datatable/js/dataTables.bootstrap.min.js"></script> -->
<script src="./assets/datatable/js/datatables.js"></script>
<script>
    $(document).ready(function () {
        $('.table').DataTable();
    })
</script>

<?php
require_once 'footer.php';
?>