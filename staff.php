<?php
require_once 'header.php';

// Get All Staff
$sql = "SELECT * FROM users_tb WHERE role='Staff' ORDER BY id DESC";
$users = $pdo->query($sql)->fetchAll();


?>

<h2>Staff</h2>

<?= $_SESSION['msg'] ?? '' ?>
<?php
    if(isset($_SESSION['msg'])){
        unset($_SESSION['msg']);
    } 
?>

<button id="show-modal" class="btn" style="margin-bottom: 10px;">New Staff</button>
<!-- Staff Section -->
<div class="w-100 min-h-70">
    <div class="w-100">
        <table id="table" style="font-size: 14px;">
            <thead>
                <tr>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($users as $user){ ?>

                <tr>
                    <td><?=$user->fullname?></td>
                    <td><?=$user->email?></td>
                    <td><?=$user->phone?></td>
                    <td><?=$user->password?></td>
                    <td>
                        <a href="delete_staff.php?sid=<?=$user->id?>" style = "color: red;" onclick ="return confirm('Delete?')">
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
    td{
        font-size: 0.9em;
    }
</style>
<!-- End Staff Section -->

<!-- Modal -->
<div class="modal">
    <div class="w-40 mx-auto">
        <div class="modal-dialog">
            <div class="modal-head">
                <h3 class="modal-title">Add New Staff</h3>
                <button id="close"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form name = "addStaff" action="add_staff.php" method = "post">
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="Fullname">Fullname</label>
                            <input type="text" name="fullname" id="fullname" placeholder="John Doe" required>
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" name="email" id="email" placeholder="e.g johndoe@gmail.com" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Phone Number">Phone Number</label>
                        <input type="text" name="phone" id="phone" required>
                    </div>
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" name="password" id="password" required>
                        </div>
                        <div class="form-group">
                            <label for="Password">Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirmpassword" required>
                        </div>
                    </div>
                    <div id="notification"></div>
                    <div class="form-group">
                        <button id="submit" class="btn w-100" type="submit" name="add">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal JS -->.
<script src="./assets/js/Admin/modal.js"></script>

<!-- Form JS -->
<script src="./assets/js/staff_registration.js"></script>

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