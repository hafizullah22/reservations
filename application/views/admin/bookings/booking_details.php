<?php $this->load->view('admin/layout/header'); ?>

<style>

/* ================= GLOBAL ================= */

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

/* ================= MENU ================= */

.booking-menu {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 10px;
}

/* BUTTON */
.booking-menu .btn {
    border-radius: 10px;
    font-weight: 500;
    white-space: nowrap;
}

/* SEARCH */
.booking-search {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-left: auto;
}

.booking-search input {
    width: 250px;
    height: 40px;
    border-radius: 10px;
    border: 1px solid #000;
}

/* ================= CARD ================= */

.card {
    border: none;
    border-radius: 14px;
    box-shadow: 0 2px 10px rgba(0,0,0,.05);
}

/* ================= TABLE ================= */

.table {
    margin-bottom: 0;
}

.table thead {
    background: #111827;
    color: #fff;
}

/* ================= MOBILE ================= */

@media (max-width:768px) {

    .main {
        padding: 12px;
    }

    .booking-search {
        width: 100%;
        margin-left: 0;
        flex-direction: column;
        align-items: stretch;
    }

    .booking-search input {
        width: 100%;
    }

    .table {
        min-width: 850px;
    }
}

</style>

<div class="main">

<!-- ================= TOPBAR ================= -->
<div class="topbar">

    <div class="booking-menu">

        <a href="<?= site_url('bookings'); ?>" class="btn btn-outline-dark active">
            All Bookings
        </a>

        <a href="<?= site_url('bookings/create'); ?>" class="btn btn-outline-dark">
            New Booking
        </a>

        <a href="<?= site_url('admin/bookings/completed'); ?>" class="btn btn-outline-dark">
            Completed
        </a>

        <a href="<?= site_url('bookings/cancelled'); ?>" class="btn btn-outline-dark">
            Cancelled
        </a>

        <a href="<?= site_url('admin/bookings/confirmed'); ?>" class="btn btn-outline-dark">
            Confirmed
        </a>

        <!-- SEARCH -->
        <form action="<?= site_url('admin/bookings/booking_details'); ?>"
              method="GET"
              class="booking-search">

            <input type="text"
                   name="q"
                   class="form-control form-control-sm"
                   placeholder="Booking ID">

            <button type="submit" class="btn btn-dark btn-sm">
                Search
            </button>

        </form>

    </div>

</div>

<!-- ================= FLASH ================= -->
<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<!-- ================= CONTENT ================= -->
<div class="row g-3">
    <!-- LEFT: CUSTOMER -->
    <div class="col-lg-4">

        <div class="card">

            <div class="card-header bg-primary text-white">
                Customer Information
            </div>

            <div class="card-body p-0">

                <table class="table table-bordered">

                    <?php if(!empty($booking)): ?>

                        <tr><th>Member ID</th><td><?= $booking->customer_id; ?></td></tr>
                        <tr><th>First Name</th><td><?= $booking->first_name; ?></td></tr>
                        <tr><th>Last Name</th><td><?= $booking->last_name; ?></td></tr>
                        <tr><th>Email</th><td><?= $booking->email; ?></td></tr>
                        <tr><th>Phone</th><td><?= $booking->phone; ?></td></tr>
                        <tr><th>Member Type</th><td><?= $booking->customer_type; ?></td></tr>

                    <?php else: ?>

                        <tr>
                            <td class="text-center text-muted">No customer data</td>
                        </tr>

                    <?php endif; ?>

                </table>

            </div>

        </div>

    </div>

    <!-- RIGHT: BOOKING -->
    <div class="col-lg-8">

        <div class="card">

            <div class="card-header bg-success text-white">
                Booking Information
            </div>

            <div class="card-body p-0">

                <table class="table table-bordered">

                    <?php if(!empty($booking)): ?>

                        <tr><th>Booking ID</th><td><?= $booking->booking_id; ?></td></tr>
                        <tr><th>Booking Date</th><td><?= date('M d, Y', strtotime($booking->booking_date)); ?></td></tr>
                        <tr><th>Table</th><td><?= $booking->table_number; ?></td></tr>
                        <tr><th>Booking Slot</th><td><?= $booking->booking_time; ?></td></tr>
                        <tr><th>Arrival Time</th><td><?= $booking->arrival_time; ?></td></tr>
                        <tr><th> No. of Guests</th><td><?= $booking->number_of_guests; ?></td></tr>

                        <tr>
                            <th>Status</th>
                            <td>
                                <?php
                                $badge = 'secondary';
                                switch(strtolower($booking->status)) {
                                    case 'confirmed': $badge = 'success'; break;
                                    case 'pending': $badge = 'warning'; break;
                                    case 'cancelled': $badge = 'danger'; break;
                                    case 'completed': $badge = 'primary'; break;
                                }
                                ?>
                                <span class="badge bg-<?= $badge; ?>">
                                    <?= ucfirst($booking->status); ?>
                                </span>
                            </td>
                        </tr>

                        <tr><th>Guest Names</th><td><?= $booking->guest_names; ?></td></tr>

                    <?php else: ?>

                        <tr>
                            <td class="text-center text-muted">No booking data</td>
                        </tr>

                    <?php endif; ?>

                </table>

            </div>

        </div>

    </div>

</div>

</div>

<?php $this->load->view('admin/layout/footer'); ?>