<?php
require_once 'header.php';

// Get All Staff
$email = $_SESSION['email'];

$sql = "SELECT * FROM users_tb WHERE email = '$email'";
$user = $pdo->query($sql)->fetch();

?>

<h2>My Profile</h2>

<!-- My Profile Section -->
<div class="w-40 mx-auto card">
    <?= $_SESSION['msg'] ?? '' ?>
    <?php
        if(isset($_SESSION['msg'])){
            unset($_SESSION['msg']);
        } 
    ?>

    <form action="update_profile.php" method = "post">
        <div class="form-group-row">
            <div class="form-group">
                <label for="Fullname">Fullname</label>
                <input type="text" name="fullname" id="fullname" placeholder="John Doe" value="<?=$user->fullname?>" required>
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" readonly name="email" id="email" placeholder="e.g johndoe@gmail.com"
                    value="<?=$user->email?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="Phone Number">Phone Number</label>
            <input type="text" name="phone" id="phone" value="<?=$user->phone?>" required>
        </div>
        <div class="form-group-row">
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="Password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirmpassword" placeholder="Password" required>
        </div></div>
        <div class="form-group">
            <button class="btn w-100" type="submit" name="update_profile">Update Account</button>
        </div>
    </form>
</div>
<!-- End Profile Section -->

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