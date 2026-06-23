 <!-- 4. FOOTER -->
    <footer class="bg-navy text-white-50 py-5 mt-5 border-top">
        <div class="container">
            <div class="row g-4 text-center text-md-start">
                <div class="col-md-6">
                    <span class="font-serif text-white h5 fw-bold d-block mb-2">Clifton Park Trustees</span>
                    <p class="small text-muted lh-base mb-0 pe-md-5">
                        Fiduciary administrators managing communal property infrastructure and the historical beach trust grid within Lakewood, Ohio.
                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="text-white text-uppercase fw-semibold small tracking-wider mb-3" style="font-size: 11px;">Navigation Links</h4>
                    <ul class="list-unstyled small vstack gap-2 mb-0">
                        <li><a href="#" class="text-white-50 text-decoration-none">Overview Dashboard</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Meeting Minutes</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Financial Statements</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4 class="text-white text-uppercase fw-semibold small tracking-wider mb-3" style="font-size: 11px;">Inquiries</h4>
                    <p class="small text-muted lh-base mb-0">
                        Official escrow requests or property boundary queries should be logged securely via the internal panel system.
                    </p>
                </div>
            </div>
            <div class="row mt-4 pt-4 border-top border-secondary-subtle">
                <div class="col text-center text-muted" style="font-size: 11px;">
                    &copy; 2026 Clifton Park Trustees. All Rights Reserved. National Register of Historic Places.
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