<?php $this->layout('layout/auth', ['title' => 'Login']) ?>
  <section class="min-vh-100 d-flex align-items-center justify-content-center">
    <div class="container h-100 px-5 ">
      <div class="row justify-content-center align-items-center h-100 ">
        <div class="col-xl-10">
          <div class="card rounded-3">
            <div class="row g-0 h-100">
              <!-- Left side: Form -->
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">

                  <div class="px-3 py-4 p-md-5 text-center ">
                    <h2 class="mb-4">MANAGEMENT SYSTEM</h4>
                  </div>

                  <form action="<?= $this->asset('/login') ?>" method="POST">
                    <p class="mb-4 text-center">Please login to your account</p>

                    <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" class="form-control" id="username" name="username"
                        placeholder="username" required>
                    </div>

                    <label for="Password" class="form-label">Password</label>
                    <div class="input-group mb-3">
                      <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        placeholder="Enter your password" />
                      <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                        <i class="bi bi-eye-slash form-control-feedback" id="toggleIcon"></i>
                      </span>
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
                <img src="././img/logo.jpeg" alt="Dental Graphic"
                  class="img-fluid" style="width: 80%; height: auto; object-fit: cover;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
