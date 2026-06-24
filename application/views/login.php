<?php $this->load->view('layout/header'); ?>
<style>
    #togglePassword{
    color:#6c757d;
    font-size:18px;
}

#togglePassword:hover{
    color:#0d6efd;
}
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-6">

            <div class="text-center mb-2">
                <h2 class="fw-bold">Member Login</h2>
            </div>

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">

                    <form action="<?= site_url('auth/authenticate_member'); ?>" method="post">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   autocomplete="username"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>

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

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       name="rememberme"
                                       id="rememberme"
                                       value="forever">

                                <label class="form-check-label" for="rememberme">
                                    Remember me
                                </label>
                            </div>

                            <a href="<?= site_url('forgot-password'); ?>"
                               class="small text-decoration-none">
                                Forgot Password?
                            </a>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-box-arrow-in-right me-1"></i>
                            Login
                        </button>

                    </form>

                </div>
            </div>

            <div class="text-center mt-3">
                <a href="<?= base_url(); ?>" class="text-decoration-none">
                    <i class="bi bi-arrow-left"></i> Back to Website
                </a>
            </div>

        </div>
    </div>
</div>



<?php $this->load->view('layout/footer'); ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById('togglePassword').addEventListener('click', function () {

    const password = document.getElementById('password');
    const icon = this.querySelector('i');

    if (password.type === 'password') {
        password.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        password.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
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
</body>
</html>