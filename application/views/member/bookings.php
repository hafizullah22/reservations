<?php $this->load->view('layout/header'); ?>

<style>
    .account-card{
    border:0;
    border-radius:16px;
    box-shadow:0 .125rem 1rem rgba(0,0,0,.08);
}

.account-sidebar{
    position:sticky;
    top:20px;
}

.account-sidebar .card{
    border-radius:16px;
    overflow:hidden;
}

.account-sidebar .list-group-item{
    border:0;
    border-bottom:1px solid #e9ecef;
    padding:14px 18px;
    font-weight:500;
    transition:all .2s ease;
}

.account-sidebar .list-group-item:last-child{
    border-bottom:none;
}

.account-sidebar .list-group-item:hover{
    background:#f8f9fa;
    padding-left:22px;
}

.account-sidebar .list-group-item.active{
    background:#0d6efd;
    color:#fff !important;
    border-bottom-color:#0d6efd;
}

.welcome-box{
    background:#f8f9fa;
    border:1px solid #e9ecef;
    border-radius:16px;
}
</style>

<main class="container my-5">

    <div class="row g-4">

        <!-- Sidebar -->
        <div class="col-lg-3">

            <div class="card account-card account-sidebar">

                <div class="card-body p-0">

                    <div class="list-group rounded-3">

                        <a href="<?= site_url('my_account'); ?>"
                           class="list-group-item list-group-item-action active">
                            <i class="bi bi-speedometer2 me-2"></i>
                            Dashboard
                        </a>

                        <a href="<?= site_url('my_account/profile_details'); ?>"
                           class="list-group-item list-group-item-action">
                            <i class="bi bi-person me-2"></i>
                            Account Details
                        </a>

                        <a href="<?= site_url('my_account/bookings'); ?>"
                           class="list-group-item list-group-item-action">
                            <i class="bi bi-calendar-check me-2"></i>
                            Upcoming Bookings
                        </a>

                        <a href="<?= site_url('my_account/past_bookings'); ?>"
                           class="list-group-item list-group-item-action">
                            <i class="bi bi-clock-history me-2"></i>
                            Past Bookings
                        </a>

                        <a href="<?= site_url('auth/logout_member'); ?>"
                           class="list-group-item list-group-item-action text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            Logout
                        </a>

                    </div>

                </div>

            </div>

        </div>

        <!-- Content -->
        <div class="col-lg-9">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-white py-3">
                    <h4 class="mb-0">
                        <i class="bi bi-calendar-check me-2"></i>
                        My Bookings
                    </h4>
                    
                </div>

                <div class="card-body">

                    <?php if (!empty($bookings)): ?>

                        <div class="table-responsive">

                            <table class="table table-hover align-middle">

                                <thead class="table-light">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Table</th>
                                        <th>Guests</th>
                                        <th>Status</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php foreach ($bookings as $b): ?>

                                    <tr>

                                        <td>#<?= $b->booking_id; ?></td>

                                        <td><?= html_escape($b->customer_name); ?></td>

                                        <td>
                                            <?= date('d M Y', strtotime($b->booking_date)); ?>
                                        </td>

                                        <td><?= $b->booking_time; ?></td>

                                        <td class="text-center">
                                            <?= $b->table_number; ?>
                                        </td>

                                        <td class="text-center">
                                            <?= $b->number_of_guests; ?>
                                        </td>

                                        <td>
                                            <?php
                                            $badge = 'secondary';

                                            if ($b->status == 'Confirmed') {
                                                $badge = 'success';
                                            } elseif ($b->status == 'Pending') {
                                                $badge = 'warning';
                                            } elseif ($b->status == 'Cancelled') {
                                                $badge = 'danger';
                                            }
                                            ?>

                                            <span class="badge bg-<?= $badge; ?>">
                                                <?= $b->status; ?>
                                            </span>
                                        </td>

                                        <td>

                                            <?php if ($b->status != 'Cancelled'): ?>
                                 
                                            <button class="btn btn-danger btn-sm"
                                                onclick="deleteBooking(this)"
                                                data-url="<?= site_url('bookings/cancel/'.$b->booking_id); ?>">
                                            <i class="fa fa-close"></i>
                                            </button>
                        

                                            <?php endif; ?>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                                </tbody>

                            </table>

                        </div>

                    <?php else: ?>

                        <div class="text-center py-5">

                            <i class="bi bi-calendar-x fs-1 text-muted"></i>

                            <h5 class="mt-3">No bookings found</h5>

                            <p class="text-muted">
                                You haven't made any table reservations yet.
                            </p>

                        </div>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</main>

<script>
function deleteBooking(btn)
{
    const url = btn.dataset.url;
    const row = btn.closest('tr');

    Swal.fire({
        title: 'Cancel Booking?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e92e0d',
        cancelButtonColor: '#128f07',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'

        
    }).then((result) => {

        if (!result.isConfirmed) return;

        btn.disabled = true;

        fetch(url, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.json())
        .then(data => {

            if (data.status === 'success') {

                // remove row instantly
                row.remove();

                Swal.fire({
                    icon: 'success',
                    title: 'Cancelled',
                    text:'Cancelled Your Booking',
                    timer: 1200,
                    showConfirmButton: false
                });

                // OPTIONAL: update counters/menu if needed
                // refreshCounts();

            } else {
                btn.disabled = false;

                Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: 'Delete not completed'
                });
            }
        })
        .catch(() => {

            btn.disabled = false;

            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Server error occurred'
            });
        });
    });
}
</script>


<?php $this->load->view('layout/footer'); ?>