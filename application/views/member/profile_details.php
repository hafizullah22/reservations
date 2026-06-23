<?php $this->load->view('layout/header'); ?>

<style>
    .active{color:#fff;}
</style>
<!-- ================= USER PROFILE PAGE ================= -->
<main class="container my-5 py-3">
    <div class="row g-4">

        <!-- LEFT SIDEBAR MENU -->
    <div class="col-md-3">

        <div class="list-group shadow-sm rounded-3">

            <a href="#dashboard" class="list-group-item list-group-item-action">
                Dashboard
            </a>

            <a href="#addresses" class="list-group-item list-group-item-action text-black">
                Addresses
            </a>

            <a href="<?= site_url('my_account/profile_details')?>" class="list-group-item list-group-item-action text-black active">
                Account Details
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


                <!-- TABLE / EDIT FORM -->
    
        <!-- <h4 class="mb-4 fw-bold">Edit User Profile</h4> -->

        <?php if (!empty($user)): ?>
            <form action="<?= site_url('my_account/update_profile')?>" method="post">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <tbody id="bookingTableBody">
                            <tr>
                                <td style="width: 250px;">Customer ID</td>
                                <td>
                                    <strong><?= $user->customer_id; ?></strong>
                                    <input type="hidden" name="customer_id" value="<?= $user->customer_id; ?>">
                                </td>
                            </tr>

                            <tr>
                                <td>First Name</td>
                                <td>
                                    <input type="text" name="first_name" class="form-control form-control-edit" value="<?= $user->first_name; ?>" required>
                                </td>
                            </tr>

                            <tr>
                                <td>Last Name</td>
                                <td>
                                    <input type="text" name="last_name" class="form-control form-control-edit" value="<?= $user->last_name; ?>" required>
                                </td>
                            </tr>

                            <tr>
                                <td>Phone</td>
                                <td>
                                    <input type="text" name="phone" class="form-control form-control-edit" value="<?= $user->phone; ?>">
                                </td>
                            </tr>

                            <tr>
                                <td>Email Address</td>
                                <td>
                                    <input type="email" name="email" class="form-control form-control-edit" value="<?= $user->email; ?>" required>
                                </td>
                            </tr>

                            <tr>
                                <td>Existing Password</td>
                                <td>
                                    <div class="input-group" style="max-width:300px;">
                                        <input type="password"
                                               id="plainPassword"
                                               class="form-control form-control-sm"
                                               value="<?= $user->plain_password; ?>"
                                               readonly>
                                        <button type="button"
                                                class="btn btn-outline-secondary"
                                                onclick="togglePasswordVisibility()">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Role</td>
                                <td>
                                    <select name="role" class="form-select form-control-edit" disabled>
                                        <option value="Admin" <?= ($user->role == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                                        <option value="Member" <?= ($user->role == 'Member') ? 'selected' : ''; ?>>Member</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>Type</td>
                                <td>
                                    <select name="customer_type" class="form-select form-control-edit" disabled>
                                        <option value="Non-Resident" <?= ($user->customer_type == 'Non-Resident') ? 'selected' : ''; ?>>Non-Resident</option>
                                        <option value="Resident" <?= ($user->customer_type == 'Resident') ? 'selected' : ''; ?>>Resident</option>
                                    </select>
                                </td>
                            </tr>

                            <!-- NEW PASSWORD DRAWER TRIGGER -->
                            <tr>
                                <td>Change Security Password</td>
                                <td>
                                    <button type="button"
                                            class="btn btn-warning btn-sm text-dark font-weight-bold"
                                            onclick="togglePasswordForm()">
                                        Set New Password
                                    </button>
                                </td>
                            </tr>

                            <!-- HIDDEN INLINE FORM ROW -->
                            <tr id="passwordRow" style="display:none;">
                                <td colspan="2" class="bg-light p-3">
                                    <div class="d-flex gap-2 align-items-center" style="max-width: 450px;">
                                        <input type="text"
                                               id="newPasswordInput"
                                               name="new_password"
                                               class="form-control form-control-sm"
                                               placeholder="Enter new password layout">
                                        <button type="button" 
                                                class="btn btn-secondary btn-sm"
                                                onclick="togglePasswordForm()">
                                            Close
                                        </button>
                                    </div>
                                    <small class="text-muted d-block mt-1">Leave empty if you don't want to adjust the password.</small>
                                </td>
                            </tr>

                            <!-- FORM SUBMISSION CONTROLS -->
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" class="btn btn-success px-4 me-2">Update Profile</button>
                                    <a href="<?= site_url('admin/users'); ?>" class="btn btn-secondary px-4">Cancel</a>
                                 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        <?php else: ?>
            <div class="text-center text-muted py-4">
                No active user record was found.
            </div>
        <?php endif; ?>
    </div>


    </div>
   

    </div>
</main>

<script>
function togglePasswordForm() {
    let row = document.getElementById('passwordRow');
    if(row.style.display === 'none' || row.style.display === ''){
        row.style.display = 'table-row';
    } else {
        row.style.display = 'none';
        document.getElementById('newPasswordInput').value = ''; // clears field context on cancel
    }
}

function togglePasswordVisibility() {
    let input = document.getElementById('plainPassword');
    if (!input) return;

    input.type = 'text';

    if (input.hideTimer) {
        clearTimeout(input.hideTimer);
    }

    input.hideTimer = setTimeout(() => {
        input.type = 'password';
    }, 3000);
}
</script>




<?php $this->load->view('layout/footer'); ?>