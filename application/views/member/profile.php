<?php $this->load->view('layout/header'); ?>

<style>
.account-card{
    border:0;
    border-radius:12px;
    box-shadow:0 .125rem .5rem rgba(0,0,0,.08);
}

.account-sidebar .list-group-item{
    border:0;
    padding:12px 18px;
    font-weight:500;
}

.account-sidebar .list-group-item.active{
    background:#0d6efd;
    color:#fff !important;
}


</style>

<main class="container my-5">

    <div class="row g-4">

        <!-- Sidebar -->
        <div class="col-lg-3">

            <div class="card shadow-sm border-0">
                <div class="card-body p-0">

                    <div class="list-group list-group-flush">

                        <a href="<?= site_url('my_account'); ?>"
                           class="list-group-item list-group-item-action active">
                            <i class="bi bi-speedometer2 me-2"></i> Dashboard
                        </a>

                        <!-- <a href="<?= site_url('my_account/addresses'); ?>"
                           class="list-group-item list-group-item-action">
                            <i class="bi bi-geo-alt me-2"></i> Addresses
                        </a> -->

                        <a href="<?= site_url('my_account/profile_details'); ?>"
                           class="list-group-item list-group-item-action">
                            <i class="bi bi-person me-2"></i> Account Details
                        </a>

                        <a href="<?= site_url('my_account/bookings'); ?>"
                           class="list-group-item list-group-item-action ">
                            <i class="bi bi-calendar-check me-2"></i> Upcoming Bookings
                        </a>

                        <a href="<?= site_url('my_account/past_bookings'); ?>"
                           class="list-group-item list-group-item-action ">
                            <i class="bi bi-calendar-check me-2"></i> Past Bookings
                        </a>

                        <a href="<?= site_url('auth/logout_member'); ?>"
                           class="list-group-item list-group-item-action text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </a>

                    </div>

                </div>
            </div>

        </div>

        <!-- Content -->
        <div class="col-lg-9">

            

            <!-- Dashboard Information -->
            <div class="card account-card">

                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        <i class="bi bi-house-door me-2"></i>
                        My Dashboard
                    </h5>
                </div>

                <div class="card-body">

                    <p class="mb-0">
                       Welcome, <?= html_escape($user['first_name']); ?> From your account dashboard you can view your recent
                        <strong>reservations</strong>, manage your account
                        details, update your password, and access other
                        member services.
                    </p>

                </div>

            </div>

            <!-- Quick Links -->
            <div class="row g-3 mt-1">

                <div class="col-md-6">
                    <a href="<?= site_url('my_account/bookings'); ?>"
                       class="text-decoration-none">

                        <div class="card account-card h-100">
                            <div class="card-body text-center">

                                <i class="bi bi-calendar-check fs-1 text-primary"></i>

                                <h6 class="mt-3 mb-1">
                                    My Bookings
                                </h6>

                                <small class="text-muted">
                                    View and manage reservations
                                </small>

                            </div>
                        </div>

                    </a>
                </div>

                <div class="col-md-6">
                    <a href="<?= site_url('my_account/profile_details'); ?>"
                       class="text-decoration-none">

                        <div class="card account-card h-100">
                            <div class="card-body text-center">

                                <i class="bi bi-person-gear fs-1 text-primary"></i>

                                <h6 class="mt-3 mb-1">
                                    Account Details
                                </h6>

                                <small class="text-muted">
                                    Update profile and password
                                </small>

                            </div>
                        </div>

                    </a>
                </div>

            </div>

        </div>

    </div>

</main>

<?php $this->load->view('layout/footer'); ?>