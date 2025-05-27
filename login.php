<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>AC Dental Clinic</title>
    <link rel="stylesheet" href="css/stylelogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
<div class="container">
    <div class="login-box">
        <div class="left">
            <h2>Welcome, AC Dental Clinic </h2>
            <form action="loginverify.php" method="POST">

                <div class="password-wrapper">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <span class="toggle-password fas fa-eye" onclick="togglePassword()"></span>
                </div>
<!--                <a href="#">Forgot Password?</a>-->
                <button type="submit">Log in</button>
            </form>
        </div>
        <div class="right">
            <img src="img/logo.jpeg" alt="Dental Clinic" class="circular-logo">
        </div>
    </div>
</div>
</body>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const icon = document.querySelector(".toggle-password");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";

            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }
    }

</script>
</html>
