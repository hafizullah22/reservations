<?php $this->load->view('layout/header'); ?>
    
<!-- ================= USER PROFILE PAGE ================= -->
<main class="container my-5 py-3">
    <div class="row g-4">

        <!-- LEFT SIDEBAR MENU -->
<div class="col-md-3">

    <div class="list-group shadow-sm rounded-3">

        <a href="#dashboard" class="list-group-item list-group-item-action active">
            Dashboard
        </a>

        <a href="#addresses" class="list-group-item list-group-item-action text-black">
            Addresses
        </a>

        <a href="<?= site_url('my_account/profile_details')?>" class="list-group-item list-group-item-action text-black">
            Account details
        </a>

        <a href="<?=site_url('my_account/bookings')?>" class="list-group-item list-group-item-action text-black">
            Bookings
        </a>

        <a href="<?=site_url('auth/logout_member')?>" class="list-group-item list-group-item-action text-black">
            Log out
        </a>

    </div>

</div>

        <!-- RIGHT CONTENT AREA -->
        <div class="col-md-9">

            <!-- PROFILE CARD -->
            <div class="feature-card p-4 mb-4">


                <h2 class="h5 fw-bold text-navy mb-3">
                    Welcome, <?= $user['first_name']; ?>
                </h2>
                <p class="text-black small">
                    From your account dashboard you can view your recent Reservations, 
                    manage your shipping and billing addresses, and edit your password and account details.
                </p>
            </div>

           
            

        </div>

    </div>
</main>


<?php $this->load->view('layout/footer'); ?>






