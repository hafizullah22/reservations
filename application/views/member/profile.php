<?php $this->load->view('layout/header'); ?>

<style>
    .account-card{
    border:0;
    border-radius:16px;
    box-shadow:0 .125rem 1rem rgba(0,0,0,.08);
}

.account-sidebar{
    position:sticky;
    top:20px;
}

.account-sidebar .card{
    border-radius:16px;
    overflow:hidden;
}

.account-sidebar .list-group-item{
    border:0;
    border-bottom:1px solid #e9ecef;
    padding:14px 18px;
    font-weight:500;
    transition:all .2s ease;
}

.account-sidebar .list-group-item:last-child{
    border-bottom:none;
}

.account-sidebar .list-group-item:hover{
    background:#f8f9fa;
    padding-left:22px;
}

.account-sidebar .list-group-item.active{
    background:#0d6efd;
    color:#fff !important;
    border-bottom-color:#0d6efd;
}

.welcome-box{
    background:#f8f9fa;
    border:1px solid #e9ecef;
    border-radius:16px;
}
</style>

<main class="container my-5">

    <div class="row g-4">

        <!-- Sidebar -->
        <div class="col-lg-3">

            <div class="card account-card account-sidebar">

                <div class="card-body p-0">

                    <div class="list-group rounded-3">

                        <a href="<?= site_url('my_account'); ?>"
                           class="list-group-item list-group-item-action active">
                            <i class="bi bi-speedometer2 me-2"></i>
                            Dashboard
                        </a>

                        <a href="<?= site_url('my_account/profile_details'); ?>"
                           class="list-group-item list-group-item-action">
                            <i class="bi bi-person me-2"></i>
                            Account Details
                        </a>

                        <a href="<?= site_url('my_account/bookings'); ?>"
                           class="list-group-item list-group-item-action">
                            <i class="bi bi-calendar-check me-2"></i>
                            Upcoming Bookings
                        </a>

                        <a href="<?= site_url('my_account/past_bookings'); ?>"
                           class="list-group-item list-group-item-action">
                            <i class="bi bi-clock-history me-2"></i>
                            Past Bookings
                        </a>

                        <a href="<?= site_url('auth/logout_member'); ?>"
                           class="list-group-item list-group-item-action text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            Logout
                        </a>

                    </div>

                </div>

            </div>

        </div>

        <!-- Main Content -->
        <div class="col-lg-9">

            <div class="card account-card">

                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="mb-0 fw-semibold">
                        <i class="bi bi-house-door me-2 text-primary"></i>
                        My Dashboard
                    </h5>
                </div>

                <div class="card-body p-4">

                    <div class="welcome-box p-4">

                        <div class="d-flex align-items-start">

                           

                            <div>

                                <h4 class="fw-bold mb-2">
                                    Welcome Back,
                                    <span class="text-primary">
                                        <?= html_escape($user['first_name']); ?>&nbsp;<?= html_escape($user['last_name']); ?>
                                    </span>
                                </h4>

                                <p class="text-muted mb-0">
                                    Manage your reservations, update your account information,
                                    change your password, and access exclusive member services
                                    from your personal dashboard.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>

<?php $this->load->view('layout/footer'); ?>