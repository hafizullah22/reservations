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
        <h4>All Users</h4>
    </div>


    <!-- ================= TABLE ================= -->
    <div class="card mt-3 p-3">

        <h5 class="mb-3 fw-semibold">User List</h5>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">

                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Type</th>
                       
                        <th class="text-center" width="120">Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php if (!empty($users)): ?>
                    <?php $i = 1; foreach ($users as $user): ?>
                        <tr>
                            <td><?= $i++; ?></td>

                            <td>
                                <span class="badge bg-dark">
                                    <?= $user->first_name; ?>
                                </span>
                            </td>

                            <td>
                                <?= $user->phone; ?>
                            </td>

                            <td>
                                <?= $user->email; ?>
                            </td>

                            <td>
                                <?= $user->role; ?>
                            </td>

                            <td>
                                <?= $user->customer_type; ?>
                            </td>

                            <td class="text-center">
                                <button class="btn btn-sm btn-danger w-100"
                                        onclick="deleteRule(this)"
                                        data-url="<?= site_url('admin/delete_table_rule/' . $user->customer_id); ?>">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">
                            No rules found
                        </td>
                    </tr>
                <?php endif; ?>

                </tbody>

            </table>
        </div>

    </div>

</div>

<?php $this->load->view('admin/layout/footer'); ?>