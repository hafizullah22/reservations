<?php $this->load->view('admin/layout/header'); ?>

<style>
.main { padding: 18px; }

.topbar {
    background: #fff;
    padding: 14px 14px;
    border-radius: 12px;
    margin-bottom: 15px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    height:52px;
    border: 1px solid #f1e6e6;
}

.card {
    border: none;
    border-radius: 14px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
    transition: .2s;
}
.card:hover { transform: translateY(-2px); }

small { font-size: 13px; font-weight: 600; }

.table thead {
    background: #111827;
    color: #fff;
}

@media (max-width:768px){
    .main { padding: 12px; }
    .table { min-width: 700px; }
}
</style>

<div class="main">

<!-- ================= TOPBAR ================= -->
<div class="topbar">
    <h4>Dashboard Overview</h4>
</div>

<!-- ================= STATS ================= -->
<?php
$cards = [
    ['label'=>'Total Bookings','value'=>array_sum($booking_counts ?? []),'bg'=>'primary','icon'=>'calendar-check'],
    ['label'=>'Completed','value'=>$booking_counts['Completed'] ?? 0,'bg'=>'dark','icon'=>'circle-check'],
    ['label'=>'Users','value'=>$total_customers,'bg'=>'success','icon'=>'users'],
    ['label'=>'Tables','value'=>$total_tables,'bg'=>'warning','icon'=>'table'],
    ['label'=>'Cancelled','value'=>$booking_counts['Cancelled'] ?? 0,'bg'=>'danger','icon'=>'times-circle'],
    ['label'=>'Confirmed','value'=>$booking_counts['Confirmed'] ?? 0,'bg'=>'info','icon'=>'check-circle'],
];
?>

<div class="row g-3">
    <?php foreach($cards as $c): ?>
        <div class="col-12 col-sm-6 col-lg-2">
            <div class="card text-white bg-<?= $c['bg']; ?>">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small><?= $c['label']; ?></small>
                        <h3 class="mb-0"><?= $c['value']; ?></h3>
                    </div>
                    <i class="fa fa-<?= $c['icon']; ?> fs-2 opacity-75"></i>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>



<div class="container mt-4">

    <div class="row">

        <!-- ================= Recent Activity ================= -->
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Recent Login</h5>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Login Date</th>
                                <th>Email</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php if(!empty($customers)): ?>
                            <?php foreach($customers as $c): ?>
                                <tr>
                                    <td><?= $c->first_name;?></td>
                                    <td><?= date('M d, Y', strtotime($c->updated_at)); ?></td>
                                    <td><?= $c->email; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="3" class="text-center text-muted">No data found</td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- ================= Recent Booking================= -->
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Latest Bookings</h5>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
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
                                $statusMap = [
                                    'confirmed'=>'success',
                                    'pending'=>'warning',
                                    'cancelled'=>'danger',
                                    'completed'=>'primary'
                                ];
                                $badge = $statusMap[strtolower($b->status)] ?? 'secondary';
                                ?>

                                <tr>
                                    <td><?= $b->first_name; ?></td>
                                    <td><span class="badge bg-info"><?= $b->table_number; ?></span></td>
                                    <td><?= date('M d, Y', strtotime($b->booking_date)); ?></td>
                                    <td><?= $b->booking_time; ?></td>
                                    <td><span class="badge bg-<?= $badge; ?>"><?= ucfirst($b->status); ?></span></td>
                                </tr>

                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="5" class="text-center text-muted">No data found</td></tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- ================= REPORTS ================= -->
<div class="container mt-4">

    <div class="row">

        <!-- ================= MONTHLY REPORT ================= -->
        <div class="col-md-3">

            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Monthly Bookings</h5>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Bookings</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php if (!empty($bookings)) : ?>
                            <?php foreach ($bookings as $row) : ?>
                                <tr>
                                    <td><?= $row->month; ?></td>
                                    <td><?= $row->total; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="2" class="text-center">No data found</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-md-3">

            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Top Tables</h5>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Table</th>
                                <th>Bookings</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php if (!empty($top_tables)) : ?>
                            <?php foreach ($top_tables as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $row->table_number; ?></td>
                                    <td class="text-center"><?= $row->total_bookings; ?></td>
                                </tr>
                               
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="2" class="text-center">No data found</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- ================= TOP BOOKING DAYS ================= -->
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Top Booking Days</h5>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Total Bookings</th>
                                <th>Afternoon</th>
                                <th>Evening</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php if (!empty($top_days)) : ?>
                            <?php foreach ($top_days as $row) : ?>
                                <tr>
                                    <td><?= $row->day; ?></td>
                                    <td><?= $row->total_bookings; ?></td>
                                    <td><?= $row->afternoon; ?></td>
                                    <td><?= $row->evening; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="2" class="text-center">No data found</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

</div>




</div>

<?php $this->load->view('admin/layout/footer'); ?>