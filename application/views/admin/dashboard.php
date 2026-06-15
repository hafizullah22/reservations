<?php $this->load->view('admin/layout/header'); ?>

<div class="main">

    <div class="topbar">
        <h4>Dashboard Overview</h4>
    </div>

    <div class="row mt-4">

        <div class="col-md-3">
            <div class="card card-box p-3 text-white bg-primary">
                <h5>Total Bookings</h5>
                <h2><?= $total_bookings ?></h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-box p-3 text-white bg-success">
                <h5>Confirmed</h5>
                <h2><?= $confirmed ?></h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-box p-3 text-white bg-warning">
                <h5>Pending</h5>
                <h2><?= $pending ?></h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-box p-3 text-white bg-danger">
                <h5>Cancelled</h5>
                <h2><?= $cancelled ?></h2>
            </div>
        </div>

    </div>

    <div class="card mt-4 p-3">
        <h5>Recent Bookings</h5>

        <table class="table table-striped">
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
                        <td><?= $b->customer_name ?></td>
                        <td><?= $b->table_number ?></td>
                        <td><?= $b->booking_date ?></td>
                        <td><?= $b->booking_time ?></td>
                        <td>
                            <span class="badge bg-success"><?= $b->status ?></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>

<?php $this->load->view('admin/layout/footer'); ?>