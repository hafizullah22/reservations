</div> <!-- main -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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


<script>
function deleteRule(btn) {

    const url = btn.getAttribute('data-url');
    const row = btn.closest('tr');

    Swal.fire({
        title: 'Are you sure?',
        text: "This rule will be permanently deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {

        if (result.isConfirmed) {

            fetch(url, {
                method: 'POST', // safer than GET
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {

                if (data.status === 'success') {

                    // remove row smoothly
                    row.style.transition = "0.3s";
                    row.style.opacity = "0";
                    setTimeout(() => row.remove(), 300);

                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: data.message,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                } else {

                    Swal.fire({
                        icon: 'error',
                        title: 'Failed!',
                        text: data.message || 'Something went wrong'
                    });

                }
            })
            .catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Server error occurred'
                });
            });
        }
    });

}
</script>
</body>

</html>