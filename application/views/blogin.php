<?php $this->load->view('layout/header'); ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="row g-0">

                    <!-- Left Side -->
                    <div class="col-md-5 bg-primary text-white d-flex align-items-center">
                        <div class="p-5 text-center w-100">
                            <i class="bi bi-calendar-check display-3 mb-3"></i>

                            <h2 class="fw-bold mb-3">
                                Reservation Required
                            </h2>

                            <p class="mb-0 opacity-75">
                                To reserve a table, please sign in to your account.
                                This helps us manage bookings and keep your reservation secure.
                            </p>
                        </div>
                    </div>

                    <!-- Right Side -->
                    <div class="col-md-7">
                        <div class="card-body p-4 p-lg-5">

                            <div class="text-center mb-4">
                                <h3 class="fw-bold">Member Login</h3>
                                <p class="text-muted mb-0">
                                    Access your account to continue your reservation.
                                </p>
                            </div>

                            <form action="<?= site_url('auth/authenticate_booking'); ?>" method="post">

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        Email Address
                                    </label>

                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-envelope"></i>
                                        </span>

                                        <input
                                            type="email"
                                            name="email"
                                            class="form-control"
                                            autocomplete="username"
                                            placeholder="Enter your email"
                                            required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        Password
                                    </label>

                                    <div class="position-relative">
                                        <input
                                            type="password"
                                            name="password"
                                            id="password"
                                            class="form-control pe-5"
                                            placeholder="Enter password"
                                            required>

                                        <span
                                            id="togglePassword"
                                            class="position-absolute top-50 end-0 translate-middle-y me-3"
                                            style="cursor:pointer; z-index:5;">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="rememberme"
                                            id="rememberme"
                                            value="forever">

                                        <label class="form-check-label" for="rememberme">
                                            Remember Me
                                        </label>
                                    </div>

                                    <a href="<?= site_url('forgot-password'); ?>" class="text-decoration-none small">
                                        Forgot Password?
                                    </a>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    Login & Continue Reservation
                                </button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>

            <div class="text-center mt-4">
                <a href="<?= base_url(); ?>" class="text-decoration-none">
                    <i class="bi bi-arrow-left-circle"></i>
                    Back to Website
                </a>
            </div>

        </div>
    </div>
</div>

<script>
const togglePassword = document.getElementById('togglePassword');
const password = document.getElementById('password');

togglePassword.addEventListener('click', () => {
    const icon = togglePassword.querySelector('i');

    password.type = password.type === 'password' ? 'text' : 'password';

    icon.classList.toggle('bi-eye');
    icon.classList.toggle('bi-eye-slash');
});
</script>

<?php $this->load->view('layout/footer'); ?>