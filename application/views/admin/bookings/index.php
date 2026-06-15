<?php $this->load->view('admin/layout/header'); ?>

<style>
/* ================= GLOBAL ADMIN STYLE ================= */

.main {
    padding: 20px;
}

.topbar {
    background: #fff;
    padding: 15px 20px;
    border-radius: 12px;
    margin-bottom: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,.05);
}

.card {
    border: none;
    border-radius: 14px;
    box-shadow: 0 2px 10px rgba(0,0,0,.05);
}

.table thead {
    background: #111827;
    color: #fff;
}

.table thead th {
    font-weight: 500;
    white-space: nowrap;
}

.badge {
    font-size: 12px;
    padding: 6px 10px;
}

.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}




/* ================= MOBILE ================= */

@media (max-width:768px) {

    .main {
        padding: 12px;
    }

    .topbar {
        padding: 12px;
    }

    .topbar h4 {
        font-size: 18px;
    }

    .table {
        min-width: 900px;
    }
}
</style>

<div class="main">

    <!-- ================= TOPBAR ================= -->

  <div class="topbar d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

    <!-- TITLE -->
    <!-- <h5 class="mb-0 fw-semibold">
        All Bookings
    </h5> -->

    <!-- MENU BUTTON GROUP -->
    <div class="btn-group booking-menu" role="group">

        <a href="<?= site_url('bookings'); ?>" class="btn btn-outline-dark active">
            <i class="fa fa-list"></i>
            All Bookings
        </a>

        <a href="<?= site_url('bookings/create'); ?>" class="btn btn-outline-dark">
            <i class="fa fa-plus"></i>
            New Booking
        </a>

        <a href="<?= site_url('bookings/completed'); ?>" class="btn btn-outline-dark">
            <i class="fa fa-check"></i>
            Completed
        </a>

        <a href="<?= site_url('bookings/create'); ?>" class="btn btn-outline-dark">
            <i class="fa fa-times"></i>
            Canceled
        </a>

        <a href="<?= site_url('bookings/completed'); ?>" class="btn btn-outline-dark">
            <i class="fa fa-check"></i>
            Confirmed
        </a>

    </div>

</div>

    <!-- ================= FLASH MESSAGE ================= -->

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <!-- ================= BOOKINGS TABLE ================= -->

    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Table</th>
                            <th>Persons</th>
                            <th>Status</th>
                            <th width="120">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php if(!empty($bookings)): ?>

                        <?php foreach($bookings as $b): ?>

                            <?php
                            $badge = 'secondary';

                            switch(strtolower($b->status))
                            {
                                case 'confirmed':
                                    $badge = 'success';
                                    break;

                                case 'pending':
                                    $badge = 'warning';
                                    break;

                                case 'cancelled':
                                    $badge = 'danger';
                                    break;

                                case 'completed':
                                    $badge = 'primary';
                                    break;
                            }
                            ?>

                            <tr>

                                <td><?= $b->booking_id; ?></td>

                                <td><?= $b->customer_name; ?></td>

                                <td><?= date('M d, Y', strtotime($b->booking_date)); ?></td>

                                <td><?= $b->booking_time; ?></td>

                                <td><?= $b->table_number; ?></td>

                                <td><?= $b->number_of_guests; ?></td>

                                <td>
                                    <span class="badge bg-<?= $badge; ?>">
                                        <?= ucfirst($b->status); ?>
                                    </span>
                                </td>

                                <td>

                                    <button
                                        type="button"
                                        class="btn btn-danger btn-sm"
                                        onclick="deleteBooking(this)"
                                        data-url="<?= site_url('bookings/delete/'.$b->booking_id); ?>">

                                        <i class="fa fa-trash"></i>
                                        Delete

                                    </button>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="8" class="text-center text-muted">
                                No bookings found.
                            </td>
                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<script>

function deleteBooking(btn)
{
    let url = btn.dataset.url;
    let row = btn.closest('tr');

    Swal.fire({
        title: 'Delete Booking?',
        text: 'This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Delete',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#dc3545'
    }).then((result) => {

        if(result.isConfirmed)
        {
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {

                if(data.status === 'success')
                {
                    row.remove();

                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted',
                        text: data.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
                else
                {
                    Swal.fire(
                        'Error',
                        data.message,
                        'error'
                    );
                }

            })
            .catch(() => {

                Swal.fire(
                    'Error',
                    'Something went wrong.',
                    'error'
                );

            });
        }

    });
}

</script>

<?php $this->load->view('admin/layout/footer'); ?>
