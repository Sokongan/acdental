<!DOCTYPE html>
<html lang="en">
<?php include('lib/includes.php') ?>


<body>

<svg class="blob" style="bottom: 50%;  left: -12%" 
  viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
  <path fill="#F2F4F8" d="M26.2,-38.2C37.1,-28.3,51,-24.7,60.3,-15.1C69.6,-5.5,74.1,10,70.5,23.4C66.9,36.8,55,48.1,41.8,59.8C28.7,71.6,14.4,83.8,-2.2,86.9C-18.8,89.9,-37.5,83.7,-42,69.1C-46.5,54.5,-36.7,31.6,-37,15.6C-37.3,-0.5,-47.7,-9.7,-52,-23.2C-56.2,-36.7,-54.4,-54.4,-44.7,-64.8C-35,-75.1,-17.5,-78,-4.9,-71.2C7.7,-64.5,15.4,-48.2,26.2,-38.2Z" transform="translate(100 100)" />
</svg>

<svg class="blob" style="left: 60%" 
  viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
  <path fill="#F2F4F8" d="M35,-45.7C47.3,-39.2,60.6,-31.6,70,-18.9C79.5,-6.2,85,11.6,79.5,24.9C73.9,38.2,57.2,47,42.1,52.5C27,58,13.5,60.1,4.3,54.2C-5,48.4,-10,34.5,-13.7,25.4C-17.3,16.2,-19.5,11.6,-31.5,3.5C-43.5,-4.7,-65.3,-16.5,-69.2,-28.2C-73.2,-39.8,-59.5,-51.4,-45,-57.1C-30.5,-62.9,-15.2,-62.9,-2,-60.2C11.3,-57.5,22.7,-52.1,35,-45.7Z" transform="translate(100 100)" />
</svg>

<!--  -->


<section  class="min-vh-100 d-flex align-items-center justify-content-center">
  <div class="container h-100 px-5 "> 
    <div class="row justify-content-center align-items-center h-100 ">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0 h-100">
            <!-- Left side: Form -->
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

              <div class="text-black px-3 py-4 p-md-5 text-center ">
                    <h2 class="mb-4">MANAGEMENT SYSTEM</h4>
                </div>

                <form action="loginverify.php" method="POST">
                  <p class="mb-4 text-center">Please login to your account</p>

                  <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="email" class="form-control" id="username" name="username"
                           placeholder="Email address or phone number" required>
                  </div>

                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                  </div>

                  <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary">Log in</button>
                  </div>

                  <div class="text-center mb-3">
                    <a class="text-muted" href="#">Forgot password?</a>
                  </div>

        
                </form>

              </div>
            </div>

            <!-- Right side: Info panel -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center text-center bg-light">
              <img src="img/logo.jpeg" alt="Dental Graphic"
                  class="img-fluid" style="width: 80%; height: auto; object-fit: cover;">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

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


<!-- 
    <div class="login-box">
        <div class="left">
            <h2>Welcome, AC Dental Clinic </h2>
            <form action="loginverify.php" method="POST">

                <div class="password-wrapper">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <span class="toggle-password fas fa-eye" onclick="togglePassword()"></span>
                </div>
               <a href="#">Forgot Password?</a>
                <button type="submit">Log in</button>
            </form>
        </div>
        <div class="right">
            <img src="img/logo.jpeg" alt="Dental Clinic" class="circular-logo">
        </div>
    </div> -->