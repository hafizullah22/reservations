<?php $this->load->view('admin/layout/header'); ?>

<style>
/* ================= GLOBAL STYLE ================= */

.main {
    padding: 20px;
}

.topbar {
    background: #fff;
    padding: 15px;
    border-radius: 12px;
    margin-bottom: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,.05);
}

.booking-menu {
    background: #f3f4f6;
    padding: 8px;
    border-radius: 12px;
}

/* BUTTON STYLE */
.booking-menu .btn {
    border-radius: 10px;
    font-weight: 500;
    white-space: nowrap;
}

/* ACTIVE STATE */
.booking-menu .btn.active {
    background: #111827;
    color: #fff;
}

/* SEARCH */
.booking-search {
    display: flex;
    align-items: center;
}

.booking-search input {
    width: 250px;
    height:40px;
    border-radius: 10px;
    border: 1px solid #000;
}

/* MOBILE */
@media (max-width:768px) {

    .booking-menu {
        flex-direction: column;
        align-items: stretch;
        gap: 8px;
    }

    .booking-search {
        width: 100%;
    }

    .booking-search input {
        width: 100%;
    }

    .booking-search button {
        width: 100%;
    }
}

/* ================= CARD ================= */

.card {
    border: none;
    border-radius: 14px;
    box-shadow: 0 2px 10px rgba(0,0,0,.05);
}

/* ================= TABLE ================= */

.table thead {
    background: #111827;
    color: #fff;
}

.table thead th {
    font-weight: 500;
    white-space: nowrap;
}

.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

/* ================= BADGE ================= */

.badge {
    font-size: 12px;
    padding: 6px 10px;
}

/* ================= MOBILE ================= */

@media (max-width:768px) {

    .main {
        padding: 12px;
    }

    .table {
        min-width: 850px;
    }

    .booking-menu {
        overflow-x: auto;
        flex-wrap: nowrap;
    }
}
</style>

<div class="main">

<!-- ================= TOPBAR MENU ================= -->

<div class="topbar">

   <div class="booking-menu d-flex flex-wrap align-items-center gap-2">

    <!-- NAV BUTTONS -->
    <a href="<?= site_url('bookings'); ?>" class="btn btn-outline-dark active">
        <i class="fa fa-list"></i> All Bookings
    </a>

    <a href="<?= site_url('bookings/create'); ?>" class="btn btn-outline-dark">
        <i class="fa fa-plus"></i> New Booking
    </a>

    <a href="<?= site_url('admin/bookings/completed'); ?>" class="btn btn-outline-dark">
        <i class="fa fa-check"></i> Completed
    </a>

    <a href="<?= site_url('bookings/cancelled'); ?>" class="btn btn-outline-dark">
        <i class="fa fa-times"></i> Cancelled
    </a>

    <a href="<?= site_url('admin/bookings/confirmed'); ?>" class="btn btn-outline-dark">
        <i class="fa fa-check-circle"></i> Confirmed
    </a>

    <!-- SEARCH FORM -->
    <form action="<?= site_url('admin/bookings/booking_details'); ?>" method="GET"
          class="d-flex ms-auto booking-search">

        <input type="text"
               name="q"
               class="form-control form-control-sm"
               placeholder="Enter Booking ID">

        <button type="submit" class="btn btn-dark btn-sm ms-2">
            <i class="fa fa-search"></i>
        </button>

    </form>

</div>

</div>

<!-- ================= FLASH MESSAGE ================= -->

<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<!-- ================= TABLE ================= -->

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
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php if(!empty($booking)): ?>

                    

                        <?php
                        $badge = 'secondary';

                        switch(strtolower($booking->status)) {
                            case 'confirmed': $badge = 'success'; break;
                            case 'pending': $badge = 'warning'; break;
                            case 'cancelled': $badge = 'danger'; break;
                            case 'completed': $badge = 'primary'; break;
                        }
                        ?>

                        <tr>
                            <td><?= $booking->booking_id; ?></td>
                            <td><?= $booking->customer_name; ?></td>
                            <td><?= date('M d, Y', strtotime($booking->booking_date)); ?></td>
                            <td><?= $booking->booking_time; ?></td>
                            <td><?= $booking->table_number; ?></td>
                            <td><?= $booking->number_of_guests; ?></td>

                            <td>
                                <span class="badge bg-<?= $badge; ?>">
                                    <?= ucfirst($booking->status); ?>
                                </span>
                            </td>

                            <td>
                                <button class="btn btn-danger btn-sm"
                                        onclick="deleteBooking(this)"
                                        data-url="<?= site_url('bookings/delete/'.$booking->booking_id); ?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                  

                <?php else: ?>

                    <tr>
                        <td colspan="8" class="text-center text-muted">
                            No bookings found
                        </td>
                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</div>

<!-- ================= SWEET ALERT DELETE ================= -->

<script>
function deleteBooking(btn)
{
    let url = btn.dataset.url;
    let row = btn.closest('tr');

    Swal.fire({
        title: 'Delete Booking?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, Delete'
    }).then((result) => {

        if(result.isConfirmed)
        {
            btn.disabled = true;

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.json())
            .then(data => {

                if(data.status === 'success')
                {
                    row.remove();

                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
                else
                {
                    Swal.fire('Error', data.message, 'error');
                }

                btn.disabled = false;
            })
            .catch(() => {
                Swal.fire('Error', 'Something went wrong', 'error');
                btn.disabled = false;
            });
        }

    });
}
</script>

<?php $this->load->view('admin/layout/footer'); ?>