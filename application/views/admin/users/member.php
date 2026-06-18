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
    width: 500px;
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

.table thead th {
    font-weight: 500;
    font-size: 14px;
}

.badge {
    font-size: 13px;
    padding: 6px 10px;
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

            <a href="<?= site_url('admin/users'); ?>" class="btn btn-outline-dark active">
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

    <!-- TABLE -->
    <div class="card mt-3 p-3">

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">

                <thead>
                    <tr>
                        <th>SL</th>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Type</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody id="bookingTableBody">

                <?php if (!empty($users)): ?>
                    <?php $i = 1; foreach ($users as $user): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $user->customer_id; ?></td>

                            <td>
                                <span class="badge bg-dark">
                                    <?= $user->first_name . ' ' . $user->last_name; ?>
                                </span>
                            </td>

                            <td><?= $user->phone; ?></td>
                            <td><?= $user->email; ?></td>
                            <td><?= $user->role; ?></td>
                            <td><?= $user->customer_type; ?></td>

                            <td class="text-center">
                                <a href="<?= site_url('admin/users/view/'.$user->customer_id); ?>"
                                   class="btn btn-sm btn-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            No users found
                        </td>
                    </tr>
                <?php endif; ?>

                </tbody>

            </table>
        </div>

    </div>
</div>

<!-- LIVE SEARCH -->
<script>
let timer = null;

// current role page (admin / member / all etc.)
let statusPage = "<?= $this->input->get('role') ?? 'all'; ?>";

document.getElementById('liveSearch').addEventListener('keyup', function () {

    clearTimeout(timer);

    let query = this.value.trim();

    timer = setTimeout(() => {

        // ✅ IF EMPTY → LOAD ROLE PAGE DATA AGAIN
        if (query === '') {

            fetch("<?= site_url('admin/users/ajax_user_search'); ?>?role=" + statusPage)
                .then(res => res.json())
                .then(data => renderTable(data.data));

            return;
        }

        // SEARCH REQUEST
        fetch("<?= site_url('admin/users/ajax_user_search'); ?>?q=" + encodeURIComponent(query))
            .then(res => res.json())
            .then(data => renderTable(data.data))
            .catch(error => {
                console.error('Search Error:', error);
            });

    }, 300);
});


// ✅ CENTRAL RENDER FUNCTION (LIKE BOOKINGS SYSTEM)
function renderTable(users) {

    let html = '';
    let sl = 1;

    if (users && users.length > 0) {

        users.forEach(u => {

            html += `
            <tr>
                <td>${sl++}</td>
                <td>${u.customer_id ?? ''}</td>
                <td>${(u.first_name ?? '') + ' ' + (u.last_name ?? '')}</td>
                <td>${u.phone ?? ''}</td>
                <td>${u.email ?? ''}</td>
                <td>${u.role ?? ''}</td>
                <td>${u.customer_type ?? ''}</td>
                <td class="text-center">
                    <a href="<?= site_url('admin/users/view/') ?>${u.customer_id}"
                       class="btn btn-sm btn-primary">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
            </tr>
            `;
        });

    } else {

        html = `
        <tr>
            <td colspan="8" class="text-center text-danger py-3">
                No User Found
            </td>
        </tr>
        `;
    }

    document.getElementById('bookingTableBody').innerHTML = html;
}
</script>

<?php $this->load->view('admin/layout/footer'); ?>