<div class="container my-4">
    <!-- User Profile Section -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Logo image on the left -->
        <img src="./img/logo.jpeg" alt="Logo" class="rounded-circle" width="90" height="90">

        <!-- Profile dropdown on the right -->
        <div class="dropdown">
            <a href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="./img/avatar.png" alt="User Profile" class="rounded-circle" width="100" height="100">
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li class="px-3">
                    <h5 class="mb-0"><?php echo $_SESSION['username']?></h5>
                    <p class="text-muted mb-2">Administrator</p>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="change-password.php">Change Password</a></li>
                <li><a class="dropdown-item" href="user.php">Accounts</a></li>
                <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
            </ul>
        </div>
    </div>