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

.profile-avatar{
    width:70px;
    height:70px;
    border-radius:50%;
    background:#0d6efd;
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:30px;
}

#togglePassword{
    cursor:pointer;
}

.form-label{
    font-weight:600;
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
                           class="list-group-item list-group-item-action">
                            <i class="bi bi-speedometer2 me-2"></i> Dashboard
                        </a>

                        <a href="<?= site_url('my_account/addresses'); ?>"
                           class="list-group-item list-group-item-action">
                            <i class="bi bi-geo-alt me-2"></i> Addresses
                        </a>

                        <a href="<?= site_url('my_account/profile_details'); ?>"
                           class="list-group-item list-group-item-action">
                            <i class="bi bi-person me-2"></i> Account Details
                        </a>

                        <a href="<?= site_url('my_account/bookings'); ?>"
                           class="list-group-item list-group-item-action active">
                            <i class="bi bi-calendar-check me-2"></i> Bookings
                        </a>

                        <a href="<?= site_url('logout'); ?>"
                           class="list-group-item list-group-item-action text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </a>

                    </div>

                </div>
            </div>

        </div>

        <!-- ================= CONTENT ================= -->
        <div class="col-lg-9">

            <?php if(!empty($user)): ?>

            <form action="<?= site_url('my_account/update_profile'); ?>" method="post">

                <input type="hidden"
                       name="customer_id"
                       value="<?= html_escape($user->customer_id); ?>">


                <!-- Account Information -->
                <div class="card account-card">

                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">
                            <i class="bi bi-person-vcard me-2"></i>
                            Account Information
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Customer ID</label>
                                <input type="text"
                                       class="form-control"
                                       value="<?= html_escape($user->customer_id); ?>"
                                       readonly>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       value="<?= html_escape($user->email); ?>"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text"
                                       name="first_name"
                                       class="form-control"
                                       value="<?= html_escape($user->first_name); ?>"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text"
                                       name="last_name"
                                       class="form-control"
                                       value="<?= html_escape($user->last_name); ?>"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text"
                                       name="phone"
                                       class="form-control"
                                       value="<?= html_escape($user->phone); ?>">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Role</label>
                                <select name="role" class="form-select form-control-edit" disabled>
                                        <option value="Admin" <?= ($user->role == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                                        <option value="Member" <?= ($user->role == 'Member') ? 'selected' : ''; ?>>Member</option>
                                    </select>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Customer Type</label>
                                <select name="customer_type" class="form-select form-control-edit" disabled>
                                        <option value="Non-Resident" <?= ($user->customer_type == 'Non-Resident') ? 'selected' : ''; ?>>Non-Resident</option>
                                        <option value="Resident" <?= ($user->customer_type == 'Resident') ? 'selected' : ''; ?>>Resident</option>
                                    </select>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- Security Settings -->
                <div class="card account-card mt-4">

                    <div class="card-header bg-white d-flex justify-content-between align-items-center">

                        <p class="mb-0 ">
                            <i class="bi bi-shield-lock me-2"></i>
                            if you want to change password?
            </p>

                        <button type="button"
                                class="btn btn-danger btn-sm"
                                onclick="togglePasswordSection()">
                            Click for Password Change
                        </button>

                    </div>

                    <div id="passwordSection"
                         class="card-body"
                         style="display:none;">

                        <label class="form-label">
                            New Password
                        </label>

                        <div class="position-relative">

                            <input type="password"
                                   id="newPassword"
                                   name="new_password"
                                   class="form-control pe-5"
                                   placeholder="Enter new password">

                        </div>

                        <!-- <small class="text-muted">
                            Leave blank if you don't want to change your password.
                        </small> -->

                    </div>

                </div>

                <!-- Buttons -->
                <div class="mt-4">

                    <button type="submit"
                            class="btn btn-success">
                        <i class="bi bi-check-circle me-1"></i>
                        Update Profile
                    </button>

                    <a href="<?= site_url('my_account'); ?>"
                       class="btn btn-outline-secondary">
                        Cancel
                    </a>

                </div>

            </form>

            <?php else: ?>

                <div class="alert alert-warning">
                    No user record found.
                </div>

            <?php endif; ?>

        </div>

    </div>

</main>

<script>
function togglePasswordSection() {

    const section = document.getElementById('passwordSection');

    if (section.style.display === 'none') {
        section.style.display = 'block';
    } else {
        section.style.display = 'none';

        document.getElementById('newPassword').value = '';

        const icon = document.querySelector('#togglePassword i');
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');

        document.getElementById('newPassword').type = 'password';
    }
}


</script>

<?php $this->load->view('layout/footer'); ?>