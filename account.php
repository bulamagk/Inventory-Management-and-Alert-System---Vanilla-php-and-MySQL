<?php
require_once 'header.php';

// Get Payment History
$sql = "SELECT * FROM payment_tb ORDER BY id DESC";
$payments = $pdo->query($sql)->fetchAll();

?>


<h2>Account History</h2>

<?= $_SESSION['msg'] ?? '' ?>
<?php
    if(isset($_SESSION['msg'])){
        unset($_SESSION['msg']);
    } 
 ?>


<!-- Account Section -->
<div class="w-100 min-h-70">
    <div class="w-100">
        <table id="table" style="font-size: 14px;">
            <thead>
                <tr>
                    <th>Paid By</th>
                    <th>Event</th>
                    <th>Amount Paid</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($payments as $payment){ ?>

                    <tr>
                        <td><?=$payment->paid_by?></td>
                        <td><?=$payment->event?></td>
                        <td><?=$payment->amount?></td>
                        <td><?=$payment->date?></td>
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
    td{
        font-size: 0.9em;
    }
</style>
<!-- End Account Section -->
    <!-- DATATABLE -->
    <script src="../assets/datatable/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/datatable/js/jquery.dataTables.min.js"></script>
    <!-- <script src="./assets/datatable/js/dataTables.bootstrap.min.js"></script> -->
    <script src="../assets/datatable/js/datatables.js"></script>
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        })
    </script>

<?php
require_once 'footer.php';
?>