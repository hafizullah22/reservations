<!-- ================= FOOTER ================= -->
 <style>
    .footer-section{
    background:#0f172a;
    color:#cbd5e1;
    padding:70px 0 25px;
    border-top:1px solid rgba(255,255,255,.08);
}

.footer-title{
    color:#fff;
    font-weight:700;
    margin-bottom:20px;
    font-size:1.4rem;
}

.footer-text{
    line-height:1.8;
    color:#94a3b8;
    margin-bottom:0;
}

.footer-heading{
    color:#fff;
    font-size:.9rem;
    font-weight:700;
    text-transform:uppercase;
    letter-spacing:1px;
    margin-bottom:20px;
}

.footer-links,
.footer-contact{
    list-style:none;
    padding:0;
    margin:0;
}

.footer-links li,
.footer-contact li{
    margin-bottom:12px;
}

.footer-links a{
    color:#94a3b8;
    text-decoration:none;
    transition:.3s;
    display:flex;
    align-items:center;
    gap:10px;
}

.footer-links a:hover{
    color:#fff;
    padding-left:5px;
}

.footer-contact li{
    display:flex;
    align-items:flex-start;
    gap:10px;
    color:#94a3b8;
}

.footer-contact i{
    color:#60a5fa;
    margin-top:3px;
}

.footer-bottom{
    margin-top:50px;
    padding-top:25px;
    border-top:1px solid rgba(255,255,255,.08);
    color:#64748b;
    font-size:.9rem;
}

.footer-badge{
    display:inline-block;
    padding:6px 14px;
    border:1px solid rgba(255,255,255,.12);
    border-radius:50px;
    color:#cbd5e1;
    font-size:.8rem;
}
 </style>
<footer class="footer-section mt-5">
    <div class="container">

        <div class="row g-5">

            <!-- About -->
            <div class="col-lg-5">
                <h5 class="footer-title">
                    <i class="bi bi-buildings me-2"></i>
                    Clifton Park Trustees
                </h5>

                <p class="footer-text">
                    Preserving and managing the historic Clifton Park community,
                    including common property, financial records, trustee governance,
                    and resident resources for future generations.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-3 col-md-6">
                <h6 class="footer-heading">Quick Links</h6>

                <ul class="footer-links">
                    <li>
                        <a href="<?= base_url(); ?>">
                            <i class="bi bi-house-door"></i>
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="<?= site_url('financial-report'); ?>">
                            <i class="bi bi-cash-stack"></i>
                            Financial Reports
                        </a>
                    </li>

                    <li>
                        <a href="<?= site_url('meeting-minutes'); ?>">
                            <i class="bi bi-file-earmark-text"></i>
                            Meeting Minutes
                        </a>
                    </li>

                    <li>
                        <a href="<?= site_url('tax-return'); ?>">
                            <i class="bi bi-receipt"></i>
                            Tax Returns
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('myaccount'); ?>">
                            <i class="bi bi-person"></i>
                           Member Login
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="col-lg-4 col-md-6">
                <h6 class="footer-heading">Trustee Information</h6>

                <ul class="footer-contact">
                    <li>
                        <i class="bi bi-shield-check"></i>
                        Historic Property Administration
                    </li>

                    <li>
                        <i class="bi bi-file-earmark-lock"></i>
                        Secure Document Management
                    </li>

                    <li>
                        <i class="bi bi-people"></i>
                        Community Trustee Governance
                    </li>
                </ul>
            </div>

        </div>

        <!-- Bottom Bar -->
        <div class="footer-bottom">
            <div class="row align-items-center">

                <div class="col-md-6 text-center text-md-start">
                    © <?= date('Y'); ?> Clifton Park Trustees.
                    All Rights Reserved.
                </div>

                <div class="col-md-6 text-center text-md-end">
                    <span class="footer-badge">
                        National Historic Community
                    </span>
                </div>

            </div>
        </div>

    </div>
</footer>


    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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