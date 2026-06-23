<?php $this->load->view('layout/header'); ?>

    
<!-- ================= USER PROFILE PAGE ================= -->
<main class="container my-5 py-3">
    <div class="row g-4">

        <!-- LEFT SIDEBAR MENU -->
<div class="col-md-3">

    <div class="list-group shadow-sm rounded-3">

        <a href="<?=site_url('my_account')?>" class="list-group-item list-group-item-action ">
            Dashboard
        </a>

        <a href="#addresses" class="list-group-item list-group-item-action text-black">
            Addresses
        </a>

        <a href="#account" class="list-group-item list-group-item-action text-black">
            Account details
        </a>

        <a href="#bookings" class="list-group-item list-group-item-action text-black active">
            Bookings
        </a>

        <a href="#logout" class="list-group-item list-group-item-action text-black">
            Log out
        </a>

    </div>

</div>

        <!-- RIGHT CONTENT AREA -->
        <div class="col-md-9">

            <!-- PROFILE CARD -->
            <div class="feature-card p-4 mb-4">


                <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Table No</th>
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
                <td class="text-center"><?= $b->table_number; ?></td>
                <td class="text-center"><?= $b->number_of_guests; ?></td>
                <td><?= $b->status; ?></td>
                <td>
                    <a href="<?= site_url('bookings/delete/'.$b->booking_id); ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Delete this booking?')">
                       Cancel
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

    </table>
            </div>

           
            

        </div>

    </div>
</main>

 <?php $this->load->view('layout/footer'); ?>