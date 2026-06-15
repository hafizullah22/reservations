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
}

/* TABLE HEADER */
.table thead {
    background: #111827;
    color: #fff;
}

.table thead th {
    font-weight: 500;
    font-size: 14px;
}

/* BUTTONS */
.btn {
    border-radius: 8px;
}

/* BADGE */
.badge {
    font-size: 13px;
    padding: 6px 10px;
}

/* FORM IMPROVEMENT */
label {
    font-weight: 500;
    margin-bottom: 6px;
}

/* RESPONSIVE DESIGN */
@media (max-width: 768px) {

    .main {
        padding: 12px;
    }

    .topbar {
        text-align: center;
    }

    .topbar h4 {
        font-size: 18px;
    }

    .row.align-items-end {
        flex-direction: column;
    }

    .col-md-4 {
        width: 100%;
        margin-bottom: 12px;
    }

    .btn {
        width: 100%;
    }

    table {
        font-size: 13px;
    }
}
</style>

<div class="main">

    <!-- ================= TOPBAR ================= -->
    <div class="topbar">
       <h4>All Bookings</h4>
       <a href="<?= site_url('bookings/create'); ?>" class="btn btn-primary mb-3">
        + New Booking
    </a>
    </div>


    <div class="container mt-4">

    

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    

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

    </div>

</div>

<?php $this->load->view('admin/layout/footer'); ?>