<?php $this->load->view('admin/layout/header'); ?>

<style>
/* ================= GLOBAL ADMIN STYLE ================= */

.main {
    padding: 18px;
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

/* CARD SYSTEM */
.card {
    border: none;
    border-radius: 14px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
    transition: all .2s ease;
    
}

.card:hover {
    transform: translateY(-2px);
}

/* STAT CARDS */
.stat-icon {
    font-size: 32px;
}

/* TABLE */
.table-responsive {
    overflow-x: auto;
}

.table thead {
    background: #111827;
    color: #fff;
}

.table thead th {
    font-weight: 500;
    font-size: 14px;
    white-space: nowrap;
}

/* BADGES */
.badge {
    font-size: 12px;
    padding: 6px 10px;
}
small {
    font-size: 14px;
    color: #fff;
    font-weight:600;
}

/* MOBILE */
@media (max-width:768px) {

    .main {
        padding: 12px;
    }

    .topbar h4 {
        font-size: 18px;
    }

    .table {
        min-width: 700px;
    }

    .stat-icon {
        font-size: 26px;
    }

    .card h3 {
        font-size: 22px;
    }
}
</style>

<div class="main">

    <!-- ================= TOPBAR ================= -->

    <div class="topbar">
        <h4>Dashboard Overview</h4>
    </div>

    <!-- ================= DASHBOARD CARDS ================= -->

  <div class="row g-3">

    <!-- TOTAL BOOKINGS -->
    <div class="col-12 col-sm-6 col-lg-2">
        <div class="card text-white bg-primary shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <small>Total Bookings</small>
                    <h3 class="mb-0"><?= $total_bookings ?></h3>
                </div>

                <div class="fs-2 opacity-75">
                    <i class="fa fa-calendar-check"></i>
                </div>

            </div>
        </div>
    </div>

    <!-- CANCELLED -->
    <div class="col-12 col-sm-6 col-lg-2">
        <div class="card text-white bg-danger shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <small>Cancelled</small>
                    <h3 class="mb-0"><?= $total_cancelled ?? 0 ?></h3>
                </div>

                <div class="fs-2 opacity-75">
                    <i class="fa fa-times-circle"></i>
                </div>

            </div>
        </div>
    </div>

    <!-- USERS -->
    <div class="col-12 col-sm-6 col-lg-2">
        <div class="card text-white bg-success shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <small>Users</small>
                    <h3 class="mb-0"><?= $total_customers ?></h3>
                </div>

                <div class="fs-2 opacity-75">
                    <i class="fa fa-users"></i>
                </div>

            </div>
        </div>
    </div>

    <!-- AVAILABLE TABLES -->
    <div class="col-12 col-sm-6 col-lg-2">
        <div class="card text-white bg-warning shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <small>Tables</small>
                    <h3 class="mb-0"><?= $total_tables ?></h3>
                </div>

                <div class="fs-2 opacity-75">
                    <i class="fa fa-table"></i>
                </div>

            </div>
        </div>
    </div>

    <!-- CANCELLED -->
    <div class="col-12 col-sm-6 col-lg-2">
        <div class="card text-white bg-secondary shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <small>Cancelled</small>
                    <h3 class="mb-0"><?= $total_cancelled ?? 0 ?></h3>
                </div>

                <div class="fs-2 opacity-75">
                    <i class="fa fa-times-circle"></i>
                </div>

            </div>
        </div>
    </div>

     <!-- CANCELLED -->
    <div class="col-12 col-sm-6 col-lg-2">
        <div class="card text-white bg-info shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <small>Cancelled</small>
                    <h3 class="mb-0"><?= $total_cancelled ?? 0 ?></h3>
                </div>

                <div class="fs-2 opacity-75">
                    <i class="fa fa-times-circle"></i>
                </div>

            </div>
        </div>
    </div>


</div>
    <!-- ================= RECENT BOOKINGS ================= -->

    <div class="card mt-4">

        <div class="card-header bg-white border-0">
            <h5 class="mb-0">Recent Bookings</h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-striped table-hover align-middle">

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

                    <?php if(!empty($recent_bookings)): ?>

                        <?php foreach($recent_bookings as $b): ?>

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

                                <td><?= $b->first_name ?></td>

                                <td>
                                    <span class="badge bg-info">
                                        Table <?= $b->table_number ?>
                                    </span>
                                </td>

                                <td>
                                    <?= date('M d, Y', strtotime($b->booking_date)) ?>
                                </td>

                                <td><?= $b->booking_time ?></td>

                                <td>
                                    <span class="badge bg-<?= $badge ?>">
                                        <?= ucfirst($b->status) ?>
                                    </span>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                No recent bookings found.
                            </td>
                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<?php $this->load->view('admin/layout/footer'); ?>