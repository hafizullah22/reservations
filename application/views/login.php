<?php $this->load->view('layout/header'); ?>

<style>
.login-card{
    border:none;
    border-radius:20px;
    overflow:hidden;
}

.login-header{
    background:linear-gradient(135deg,#0d6efd,#0b5ed7);
    color:#fff;
    text-align:center;
    padding:10px 20px;
}

.login-header i{
    font-size:30px; 
    display:block;
}
.form-control{
    border:1px solid #ced4da;
}

.form-control:focus{
    box-shadow:none;
    border-color:#0d6efd;
}

.input-group-text{
    background:#fff;
}
#togglePassword{
    color:#6c757d;
    font-size:18px;
}

#togglePassword:hover{
    color:#0d6efd;
}

.form-control {
    border: 1px solid #a7a4a4;
}

</style>

<div class="container py-4">
    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-4">

            <div class="card login-card shadow-lg">

                <!-- Header -->
                <div class="login-header">
                     <i class="bi bi-person-circle"></i>
                    <h3 class="fw-bold mb-1">Member Login</h3>
                    <!-- <p class="mb-0 opacity-75">
                        Access your member dashboard
                    </p> -->
                </div>

                <!-- Body -->
                <div class="card-body ">

                    <form action="<?= site_url('auth/authenticate_member'); ?>" method="post">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Email Address
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>

                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       autocomplete="username"
                                       required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Password
                            </label>

                            <div class="position-relative">
                                <input type="password"
                                       name="password"
                                       id="password"
                                       class="form-control pe-5"
                                       required>

                                <span id="togglePassword"
                                      class="position-absolute top-50 end-0 translate-middle-y me-3"
                                      style="cursor:pointer;">
                                    <i class="bi bi-eye"></i>
                                </span>

                            </div>
                        </div>

                        <button type="submit"
                                class="btn btn-primary w-100 py-2">
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            Login
                        </button>

                    </form>

                </div>

                <!-- Footer -->
                <div class="card-footer bg-white border-top">

                    <div class="d-flex justify-content-between">

                        <a href="<?= base_url(); ?>"
                           class="text-decoration-none">
                            <i class="bi bi-arrow-left"></i>
                            Back to Website
                        </a>

                        <a href="<?= site_url('forgot-password'); ?>"
                           class="text-decoration-none">
                            Forgot Password?
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

<?php $this->load->view('layout/footer'); ?>

<script>
document.getElementById('togglePassword').addEventListener('click', function () {

    const password = document.getElementById('password');
    const icon = this.querySelector('i');

    if (password.type === 'password') {
        password.type = 'text';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
        password.type = 'password';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
    }

});
</script>

<?php if ($this->session->flashdata('msg_type')): ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: '<?= $this->session->flashdata("msg_type"); ?>',
        title: '<?= $this->session->flashdata("msg_title"); ?>',
        text: '<?= $this->session->flashdata("msg_text"); ?>',
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
        background: '#ffffff',
        color: '#2c3e50',
        customClass: {
            popup: 'shadow-lg rounded-4 border-0',
            title: 'fw-bold',
            htmlContainer: 'text-black'
        },
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    });
});
</script>
<?php endif; ?>

