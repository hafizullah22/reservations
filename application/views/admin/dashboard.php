<?php $this->load->view('admin/layout/header'); ?>

<style>
/* =========================
   MOBILE RESPONSIVE FIXES
========================= */

.card-box {
    border-radius: 12px;
}

/* make table responsive */
.table-responsive {
    overflow-x: auto;
}

/* better spacing on mobile */
@media (max-width: 768px) {

    .topbar h4 {
        font-size: 18px;
    }

    .card-box h2 {
        font-size: 22px;
    }

    .card-box h5 {
        font-size: 14px;
    }

}
</style>

<div class="main">

    <div class="topbar">
        <h4>Dashboard Overview</h4>
    </div>

    <!-- ================= STATS ================= -->
    <div class="row mt-4 g-3">

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card card-box p-3 text-white bg-primary">
                <h5>Total Bookings</h5>
                <h2><?= $total_bookings ?></h2>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card card-box p-3 text-white bg-success">
                <h5>Users</h5>
                <h2><?= $total_customers ?></h2>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card card-box p-3 text-white bg-warning">
                <h5>Available Tables</h5>
                <h2><?= $total_tables ?></h2>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card card-box p-3 text-white bg-danger">
                <h5>Cancelled</h5>
                <h2><?= $total_cancelled ?? 0 ?></h2>
            </div>
        </div>

    </div>

    <!-- ================= TABLE ================= -->
    <div class="card mt-4 p-3">

        <h5>Recent Bookings</h5>

        <div class="table-responsive">
            <table class="table table-striped align-middle">

                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Table</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($recent_bookings as $b): ?>
                        <tr>
                            <td><?= $b->first_name ?></td>
                            <td><?= $b->table_number ?></td>
                            <td><?= $b->booking_date ?></td>
                            <td><?= $b->booking_time ?></td>
                            <td>
                                <span class="badge bg-success">
                                    <?= $b->status ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>

</div>

<?php $this->load->view('admin/layout/footer'); ?>