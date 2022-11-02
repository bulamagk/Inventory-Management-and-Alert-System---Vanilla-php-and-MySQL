<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMAS | Admin Login</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">
</head>

<body>
    <!-- Login Section -->
    <div class="admin-landing">
        <img src="./assets/img/logo.png" alt="">
        <div class="w-40 mx-auto card mb-15" style="width: 30%;">
            <h1>Admin Login</h1>

            <?= $_SESSION['msg'] ?? '' ?>
            <?php
             if(isset($_SESSION['msg'])){
                 unset($_SESSION['msg']);
                } 
             ?>

            <form action="process_login.php" method ="post">
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" name="email" id="email" placeholder="e.g johndoe@gmail.com" required>
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <button class="btn w-100" name="login" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Login Section -->

    <!-- Footer -->
    <footer>
        <p>Copyright&copy;
            <script>document.write(new Date().getFullYear())</script>
        </p>
    </footer>
    <!-- End Footer -->

    <!-- JS Files -->
    <script src="./assets/js/index.js"></script>
    <script src="./assets/fontawesome/js/all.js"></script>
    <script src="./assets/js/alert.js"></script>
</body>

</html>