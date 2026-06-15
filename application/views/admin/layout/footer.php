<!-- FOOTER -->
<footer class="main-footer">

    <div class="footer-left">
        © <?php echo date('Y'); ?> 
        <strong>School Management System</strong> 
        | All Rights Reserved
    </div>

    <div class="footer-right">
        Developed by 
        <a href="#" target="_blank" class="text-decoration-none">
            Your Company
        </a>
    </div>

</footer>

<style> 

    .main-footer{
    background:#fff;
    border-top:1px solid #dee2e6;
    padding:12px 18px;
    font-size:14px;
    color:#6c757d;
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-top:auto;
}

.main-footer strong{
    color:#343a40;
}

.main-footer a{
    color:#0d6efd;
    font-weight:500;
}

@media(max-width:768px){
    .main-footer{
        flex-direction:column;
        gap:5px;
        text-align:center;
    }
}
</style>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('show');
    }
</script>
<!-- jQuery -->
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

</div> <!-- Close .content-wrapper (Opened in header) -->
</div> <!-- Close #app-wrapper / .wrapper (Opened in header) -->

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Core Responsive Layout Engine Handles Sidebar States -->
<script>
    function toggleSidebar() {
        const wrapper = document.getElementById('app-wrapper');
        
        // Breakpoint matching CSS media query max-width: 992px
        if (window.innerWidth <= 992) {
            wrapper.classList.toggle('sidebar-open');
            wrapper.classList.remove('sidebar-collapsed');
        } else {
            // Desktop behavior
            wrapper.classList.toggle('sidebar-collapsed');
            wrapper.classList.remove('sidebar-open');
        }
    }

    // Safeguard: Clear out mobile active layouts if user scales viewport up to desktop
    window.addEventListener('resize', function() {
        const wrapper = document.getElementById('app-wrapper');
        if (window.innerWidth > 992) {
            wrapper.classList.remove('sidebar-open');
        }
    });
</script>

</body>
</html>




