<?php $this->load->view('layout/header'); ?>

<style>
.login-card{
    border:none;
    border-radius:20px;
    overflow:hidden;
}

.login-header{
    background:linear-gradient(135deg, #35800a, #1c6908);
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

        <div class="col-md-8 col-lg-8">

            <div class="card login-card shadow-lg">

                <!-- Card Header -->
                <div class="login-header">
                   
                    <i class="bi bi-shield-lock-fill"></i>
                    <h3 class="fw-bold mb-1">Send Link To Email</h3>
                    <!-- <p class="mb-0 opacity-75">
                        Sign in to access your member dashboard
                    </p> -->
                </div>

                <!-- Card Body -->
                <div class="card-body p-4 p-lg-3">

                   <?php if($this->session->flashdata('success')): ?>
                                            <div class="alert alert-sucess">
                                                <?= $this->session->flashdata('success'); ?>
                                            </div>
                                        <?php endif; ?>

                <p>We Send a password reset link to your Email. Please, Check you email and change your password</p>
                <p> <i> This link will expire in 1 hour.</i></p>

                <p>If you did not request a password reset, please ignore this email.</p>

                </div>

            </div>


        </div>

    </div>
</div>

<?php $this->load->view('layout/footer'); ?>



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

