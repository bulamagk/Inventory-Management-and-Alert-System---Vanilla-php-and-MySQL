<?php
require_once 'header.php';

// Get All products
$sql = "SELECT * FROM stock_tb WHERE is_expire = 'false' ORDER BY id DESC";
$products = $pdo->query($sql)->fetchAll();

// Get Purchase History
$sql = "SELECT * FROM sales_tb ORDER BY id DESC";
$sales = $pdo->query($sql)->fetchAll();

?>
<h2>Sales</h2>

<?= $_SESSION['msg'] ?? '' ?>
<?php
    if(isset($_SESSION['msg'])){
        unset($_SESSION['msg']);
    } 
 ?>


<button id="show-modal" class="btn" style="margin-bottom: 10px;">New Sales</button>
<!-- products Section -->
<div class="w-100 min-h-70">
    <div class="w-100">
        <table id="table" style="font-size: 14px;">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Customer</th>
                    <th>Customer Contact</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($sales as $sale){ ?>

                <tr>
                    <td><?=$sale->product?></td>
                    <td><?=$sale->quantity?></td>
                    <td><?=$sale->price?></td>
                    <td><?=$sale->amount?></td>
                    <td><?=$sale->customer?></td>
                    <td><?=$sale->customer_contact?></td>
                    <td>
                        <a onclick = "return confirm('Delete Sale Record?')"
                            href="delete_sale.php?sale_id=<?=$sale->id?>" 
                            style="color: red;" onclick = "return confirm('Delete sale?')">
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
        text-align: center;
    }

</style>
<!-- End products Section -->


<!-- Modal -->
<div class="modal">
    <div class="w-40 mx-auto">
        <div class="modal-dialog">
            <div class="modal-head">
                <h3 class="modal-title">New Sale</h3>
                <button id="close"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form action="add_sale.php" enctype="multipart/form-data" method="post">
                    <div id="notice"></div>
                    <div class="form-group">
                        <label for="Picture">Product</label>
                        <select name="product" id="product">
                        <option value="select">--Select Product--</option>
                        <?php foreach($products as $product){?>
                            <option value="<?=$product->product?>"><?=$product->product?></option>
                        <?php } ?>

                        </select>
                    </div>
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="Quantity">Product Available In Stock</label>
                            <input type="number" name="quantity" class="form-control" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="Price">Price Per Product</label>
                            <input type="number" name="price" class="form-control" readonly required>
                        </div>
                    </div>
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="Quantity to Sale">Quantity to Sale</label>
                            <input type="number" name="quantity_sale" class="form-control" required>
                     </div>
                     <div class="form-group">
                            <label for="Quantity to Sale">Total Amount</label>
                            <input type="number" name="amount" class="form-control" readonly required>
                    </div>
                        <div class="form-group">
                            <label for="Customer">Customer Name</label>
                            <input type="text" name="customer" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Customer Contact">Customer Contact</label>
                            <input type="number" name="customer_contact" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Price">Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button class="btn w-100" type="submit" name="add" id="add">Submit</button>
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
<script src="./assets/js/sales.js"></script>

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