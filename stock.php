<?php
require_once 'header.php';

// Get All products
$sql = "SELECT * FROM products_tb ORDER BY id DESC";
$products = $pdo->query($sql)->fetchAll();

// Get Purchase History
$sql = "SELECT * FROM stock_tb ORDER BY id DESC";
$stocks = $pdo->query($sql)->fetchAll();

?>
<h2>Stock Manager</h2>

<?= $_SESSION['msg'] ?? '' ?>
<?php
    if(isset($_SESSION['msg'])){
        unset($_SESSION['msg']);
    } 
 ?>


<button id="show-modal" class="btn" style="margin-bottom: 10px;">Add Product to Stock</button>
<!-- products Section -->
<div class="w-100 min-h-70">
    <div class="w-100">
        <table id="table" style="font-size: 14px;">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Expiry Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($stocks as $stock){ ?>

                <tr>
                    <td><?=$stock->product?></td>
                    <td><?=$stock->quantity?></td>
                    <td><?=$stock->price?></td>
                    <td><?=$stock->expire?></td>
                    <td>
                        <a onclick = "return confirm('Delete Product From Stock?')"
                            href="delete_stock.php?stock_id=<?=$stock->id?>" 
                            style="color: red;" onclick = "return confirm('Delete stock?')">
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
                <h3 class="modal-title">Add New Product to Stock</h3>
                <button id="close"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form action="add_stock.php" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="Picture">Product</label>
                        <select name="product" id="product">

                        <?php foreach($products as $product){?>
                            <option value="<?=$product->name?>"><?=$product->name?></option>
                        <?php } ?>

                        </select>
                    </div>
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="Quantity">Quantity</label>
                            <input type="number" name="quantity" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Price">Price Per Product</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Price">Product Expiry Date</label>
                        <input type="date" name="expire" class="form-control" required>
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

<!-- Calculate Total Price -->
<script src="./assets/js/calculateTotal.js"></script>

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