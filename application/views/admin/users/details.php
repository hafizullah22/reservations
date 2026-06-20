<?php $this->load->view('admin/layout/header'); ?>

<style>
.main { padding: 18px; }

.topbar {
    background: #fff;
    padding: 15px;
    border-radius: 12px;
    margin-bottom: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,.05);
}

.booking-menu {
    background: #f3f4f6;
    padding: 8px;
    border-radius: 12px;
}

.booking-menu .btn {
    border-radius: 10px;
    font-weight: 500;
    white-space: nowrap;
    font-size:15px;
}

.booking-menu .btn.active {
    background: #111827;
    color: #fff;
}

.booking-search {
    display: flex;
    align-items: center;
}

.booking-search input {
    width: 300px;
    height:40px;
    border-radius: 10px;
    border: 1px solid #000;
}

.card {
    border: none;
    border-radius: 14px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
}

.table thead {
    background: #111827;
    color: #fff;
}

.table tr, td {
    font-weight: 500;
    font-size: 14px;
    border: 1px solid #e5e7eb; /* Softened border to fit look of form controls */
}

.badge {
    font-size: 13px;
    padding: 6px 10px;
}

.form-control-edit {
    width: 100%;
    max-width: 400px;
    border-radius: 6px;
    border: 1px solid #cbd5e1;
    padding: 6px 12px;
    font-size: 14px;
}

.form-control-edit:focus {
    border-color: #4f46e5;
    outline: none;
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
}

@media (max-width:768px) {
    .main { padding: 12px; }
    .booking-search input { width: 100%; }
}
</style>

<div class="main">

    <!-- TOP BAR -->
    <div class="topbar">
        <div class="booking-menu d-flex flex-wrap align-items-center gap-2">

            <a href="<?= site_url('admin/users'); ?>" class="btn btn-outline-dark">
                <i class="fa fa-users"></i> All
                (<?= $total_users ?? 0 ?>)
            </a>

            <a href="<?= site_url('admin/users/admin'); ?>" class="btn btn-outline-dark">
                <i class="fa fa-user-shield"></i> Administrator
                (<?= $booking_counts['Admin'] ?? 0; ?>)
            </a>

            <a href="<?= site_url('admin/users/member'); ?>" class="btn btn-outline-dark">
                <i class="fa fa-user"></i> Member
                (<?= $booking_counts['Member'] ?? 0; ?>)
            </a>
            <a href="<?= site_url('admin/users/add'); ?>" class="btn btn-outline-dark">
                <i class="fa fa-plus"></i> Add User
            </a>
            <a href="<?= site_url('admin/users/import'); ?>" class="btn btn-outline-dark">
                <i class="fa-solid fa-upload"></i> Import
            </a>
            <a href="<?= site_url('admin/users/export'); ?>" class="btn btn-outline-dark">
                <i class="fa-solid fa-download"></i> Export
            </a>

            <div class="booking-search ms-auto position-relative">
                <input type="text"
                       id="liveSearch"
                       class="form-control form-control-sm pe-4"
                       placeholder="Search name, phone, email...">

                <i class="fa fa-search position-absolute"
                   style="right:10px; top:50%; transform:translateY(-50%); color:#000;"></i>
            </div>

        </div>
    </div>

    <!-- TABLE / EDIT FORM -->
    <div class="card mt-3 p-4">
        <h4 class="mb-4 fw-bold">Edit User Profile</h4>

        <?php if (!empty($user)): ?>
            <form action="<?= site_url('admin/users/update/'.$user->customer_id); ?>" method="post">
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
                                    <select name="role" class="form-select form-control-edit">
                                        <option value="Admin" <?= ($user->role == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                                        <option value="Member" <?= ($user->role == 'Member') ? 'selected' : ''; ?>>Member</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>Type</td>
                                <td>
                                    <select name="customer_type" class="form-select form-control-edit">
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
                                    <button type="submit" class="btn btn-success px-4 me-2">Update User</button>
                                    <a href="<?= site_url('admin/users'); ?>" class="btn btn-secondary px-4">Cancel</a>
                                 <button class="btn btn-danger btn-sm"
                                        onclick="deleteBooking(this)"
                                        data-url="<?= site_url('admin/bookings/delete/'.$user->customer_id); ?>">
                                    <i class="fa fa-trash"></i>  Delete User
                                </button>
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

<script>
function deleteBooking(btn)
{
    const url = btn.dataset.url;
    const row = btn.closest('tr');

    Swal.fire({
        title: 'Delete Booking?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, Delete'
    }).then((result) => {

        if (!result.isConfirmed) return;

        btn.disabled = true;

        fetch(url, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.json())
        .then(data => {

            if (data.status === 'success') {

                // remove row instantly
                row.remove();

                Swal.fire({
                    icon: 'success',
                    title: 'Deleted',
                    text:'Deleted Your Selected Booking',
                    timer: 1200,
                    showConfirmButton: false
                });

                // OPTIONAL: update counters/menu if needed
                // refreshCounts();

            } else {
                btn.disabled = false;

                Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: 'Delete not completed'
                });
            }
        })
        .catch(() => {

            btn.disabled = false;

            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Server error occurred'
            });
        });
    });
}
</script>


<?php $this->load->view('admin/layout/footer'); ?>