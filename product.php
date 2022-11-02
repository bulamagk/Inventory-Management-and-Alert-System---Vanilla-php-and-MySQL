<?php
require_once 'header.php';

// Get All products
$sql = "SELECT * FROM products_tb ORDER BY id DESC";
$products = $pdo->query($sql)->fetchAll();

?>
<h2>Products</h2>

<?= $_SESSION['msg'] ?? '' ?>
<?php
    if(isset($_SESSION['msg'])){
        unset($_SESSION['msg']);
    } 
 ?>


<button id="show-modal" class="btn" style="margin-bottom: 10px;">Add Product</button>
<!-- products Section -->
<div class="w-100 min-h-70">
    <div class="w-100">
        <table id="table" style="font-size: 14px;">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Picture</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($products as $product){ ?>

                <tr>
                    <td><?=$product->name?></td>
                    <td>
                        <a href="<?=$product->image?>" target ="_blank">
                            <img width="80" height="50" src="<?=$product->image?>" alt="">
                        </a>
                    </td>
                    <td>
                        <a onclick = "return confirm('Delete product?')"
                            href="delete_product.php?product_id=<?=$product->id?>&image=<?=$product->image?>" 
                            style="color: red;" onclick = "return confirm('Delete product?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>

                <?php } ?>

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


<!-- Modal -->
<div class="modal">
    <div class="w-40 mx-auto">
        <div class="modal-dialog">
            <div class="modal-head">
                <h3 class="modal-title">Add New product</h3>
                <button id="close"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form action="add_product.php" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="Picture">Product Name</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="Picture">Product Picture</label>
                        <input type="file" name="picture" accept=".jpg" required>
                    </div>
                    <div class="form-group">
                        <button class="btn w-100" type="submit" name="add">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal JS -->
<script src="./assets/js/Admin/modal.js"></script>

<!-- DATATABLE -->
<script src="./assets/datatable/js/jquery-3.6.0.min.js"></script>
<script src="./assets/datatable/js/jquery.dataTables.min.js"></script>
<!-- <script src="./assets/datatable/js/dataTables.bootstrap.min.js"></script> -->
<script src="./assets/datatable/js/datatables.js"></script>
<script>
    $(document).ready(function () {
        $('#table').DataTable();
    })
</script>

<?php
require_once 'footer.php';
?>