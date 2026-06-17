<!DOCTYPE html>
<html>
<head>
    <title>Bookings List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">

    <h3>All Bookings</h3>

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <a href="<?= site_url('bookings/create'); ?>" class="btn btn-primary mb-3">
        + New Booking
    </a>

    <table class="table table-bordered">
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
        <?php foreach($bookings as $b): ?>
            <tr>
                <td><?= $b->booking_id; ?></td>
                <td><?= $b->customer_name; ?></td>
                <td><?= $b->booking_date; ?></td>
                <td><?= $b->booking_time; ?></td>
                <td><?= $b->table_number; ?></td>
                <td><?= $b->number_of_guests; ?></td>
                <td><?= $b->status; ?></td>
                <td>
                    <a href="<?= site_url('bookings/delete/'.$b->booking_id); ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Delete this booking?')">
                       Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

    </table>

</div>

</body>
</html>