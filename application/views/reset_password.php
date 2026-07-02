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

<div class="container py-5">
    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="card login-card shadow-lg">

               <!-- Card Header -->
<div class="login-header">
    <i class="bi bi-shield-lock"></i>
    <h3 class="fw-bold mb-1">Reset Password</h3>
    <p class="mb-0 small opacity-75">
        Enter your new password below
    </p>
</div>

<!-- Card Body -->
<div class="card-body p-4">

    <?php if(validation_errors()): ?>
        <div class="alert alert-danger">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('auth/update_password'); ?>" method="post">

        <input type="hidden"
               name="token"
               value="<?= $token; ?>">

        <!-- New Password -->
        <div class="mb-3">
            <label class="form-label fw-semibold">
                New Password
            </label>

            <div class="position-relative">
                <input type="password"
                       name="password"
                       id="password"
                       class="form-control pe-5"
                       minlength="8"
                       required>

                <span id="togglePassword"
                      class="position-absolute top-50 end-0 translate-middle-y me-3"
                      style="cursor:pointer;">
                    <i class="bi bi-eye"></i>
                </span>
            </div>

            <small class="text-muted">
                Minimum 8 characters.
            </small>
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label class="form-label fw-semibold">
                Confirm Password
            </label>

            <div class="position-relative">
                <input type="password"
                       name="confirm_password"
                       id="confirm_password"
                       class="form-control pe-5"
                       minlength="8"
                       required>

                <span id="toggleConfirmPassword"
                      class="position-absolute top-50 end-0 translate-middle-y me-3"
                      style="cursor:pointer;">
                    <i class="bi bi-eye"></i>
                </span>
            </div>
        </div>

        <button type="submit" class="btn btn-success w-100 py-2">
            <i class="bi bi-check-circle me-2"></i>
            <strong>Update Password</strong>
        </button>

    </form>

</div>
            </div>

            <div class="text-center mt-4">

          
                <a href="<?= base_url(); ?>" class="text-decoration-none">
                    <i class="bi bi-arrow-left"></i>
                    Back to Website
                </a>
            </div>

        </div>

    </div>
</div>

<?php $this->load->view('layout/footer'); ?>

<script>
function togglePassword(inputId, toggleId)
{
    const input = document.getElementById(inputId);
    const icon = document.querySelector('#' + toggleId + ' i');

    if (input.type === 'password')
    {
        input.type = 'text';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
    }
    else
    {
        input.type = 'password';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
    }
}

document.getElementById('togglePassword').addEventListener('click', function () {
    togglePassword('password', 'togglePassword');
});

document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
    togglePassword('confirm_password', 'toggleConfirmPassword');
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

