<?php $this->load->view('admin/layout/header'); ?>

<style>

/* ================= GLOBAL ================= */

.main {
    padding: 20px;
}

/* TOPBAR */
.topbar {
    background: #fff;
    padding: 14px 16px;
    border-radius: 12px;
    margin-bottom: 15px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.topbar h4 {
    margin: 0;
    font-weight: 600;
    font-size: 20px;
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

<div class="topbar d-flex justify-content-between align-items-center">
    <h4 class="mb-0">
        Booking Details #<?= $booking_id; ?>
    </h4>

    <a href="<?= site_url('admin/bookings'); ?>" class="btn btn-secondary btn-sm">
        <i class="fa fa-arrow-left"></i> Back to Bookings
    </a>
</div>

<!-- ================= MEMBER & BOOKING INFORMATION ================= -->
<form action="<?= site_url('admin/bookings/update_booking/' . $booking_id); ?>" method="post">

<div class="row g-4">

    <!-- ================= MEMBER INFORMATION ================= -->
    <div class="col-lg-6">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-person-circle me-2"></i>
                    Member Information
                </h5>
            </div>

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-bordered table-striped align-middle mb-0">

                        <tbody>

                            <tr>
                                <th width="35%">Member ID</th>
                                <td>
                                    <input type="text"
                                           class="form-control"
                                           name="customer_id"
                                           value="<?= $booking->customer_id; ?>">
                                </td>
                            </tr>

                            <tr>
                                <th>First Name</th>
                                <td>
                                    <input type="text"
                                           class="form-control"
                                           name="first_name"
                                           value="<?= $booking->first_name; ?>">
                                </td>
                            </tr>

                            <tr>
                                <th>Last Name</th>
                                <td>
                                    <input type="text"
                                           class="form-control"
                                           name="last_name"
                                           value="<?= $booking->last_name; ?>">
                                </td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>
                                    <input type="email"
                                           class="form-control"
                                           name="email"
                                           value="<?= $booking->email; ?>">
                                </td>
                            </tr>

                            <tr>
                                <th>Phone</th>
                                <td>
                                    <input type="text"
                                           class="form-control"
                                           name="phone"
                                           value="<?= $booking->phone; ?>">
                                </td>
                            </tr>

                            <tr>
                                <th>Member Type</th>
                                <td>
                                    <input type="text"
                                           class="form-control"
                                           name="member_type"
                                           value="<?= $booking->customer_type; ?>">
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    <!-- ================= BOOKING INFORMATION ================= -->
    <div class="col-lg-6">

        <div class="card shadow-sm border-0 h-100">

            <div class="card-header bg-success text-white">
                <h5 class="mb-0">
                    <i class="bi bi-calendar-check me-2"></i>
                    Booking Information
                </h5>
            </div>

            <?php if($this->session->flashdata('error')): ?>
                                    <div class="alert alert-danger">
                                    <?= $this->session->flashdata('error'); ?>
                                    </div>
            <?php endif; ?>

            <div class="card-body p-0">

                <?php if (!empty($booking)): ?>


                    <div class="table-responsive">

                        <table class="table table-bordered table-striped align-middle mb-0">

                            <tbody>

                                <tr>
                                    <th width="35%">Booking ID</th>
                                    <td>
                                        <input type="text"
                                               class="form-control"
                                               name="booking_id"
                                               value="<?= $booking->booking_id; ?>"
                                               readonly>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Booking Date</th>
                                    <td>
                                        <input type="text"
                                               class="form-control" name="booking_date"
                                               value="<?= date('M d, Y', strtotime($booking->booking_date)); ?>"
                                               readonly>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Table Number</th>
                                    <td>
                                        <input type="text"
                                               class="form-control" name="table_number"
                                               value="<?= $booking->table_number; ?>"
                                               >
                                    </td>
                                </tr>

                                <tr>
                                    <th>Booking Slot</th>
                                    <td>
                                        <input type="text"
                                               class="form-control" name="booking_time"
                                               value="<?= $booking->booking_time; ?>"
                                               >
                                    </td>
                                </tr>

                                <tr>
                                    <th>Arrival Time</th>
                                    <td>
                                        <input type="text"
                                               class="form-control" name="arrival_time"
                                               value="<?= $booking->arrival_time; ?>"
                                               >
                                    </td>
                                </tr>

                                <tr>
                                    <th>No. of Guests</th>
                                    <td>
                                        <input type="text"
                                               class="form-control" name="number_of_guests"
                                               value="<?= $booking->number_of_guests; ?>"
                                               >
                                    </td>
                                </tr>

                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <select name="status" class="form-select">
                                            <option value="<?= $booking->status; ?>">
                                                <?= $booking->status; ?>
                                            </option>
                                            <option value="Pending">Pending</option>
                                            <option value="Confirmed">Confirmed</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Cancelled">Cancelled</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Guest Names</th>
                                    <td>
                                       <input type="text" class="form-control" value="<?= $booking->guest_names; ?>"readonly>
                                    </td>
                                </tr>

                            </tbody>

                        </table>

                    </div>

                <?php else: ?>

                    <div class="p-4 text-center text-muted">
                        No booking information found.
                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</div>

<div class="text-end mt-4">
    <button class="btn btn-primary px-4">
        <i class="bi bi-save me-1"></i>
        Save Changes
    </button>
</div>

</form>

</div>

<?php $this->load->view('admin/layout/footer'); ?>