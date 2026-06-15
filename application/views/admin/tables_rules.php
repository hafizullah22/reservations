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
        <h4>Patio Tables Availability Rules</h4>
    </div>

    <!-- ================= FORM ================= -->
    <div class="card p-3">

        <form action="<?php echo site_url('admin/set_table_rules'); ?>" method="post">

            <div class="row align-items-end g-3">

                <!-- TABLE TYPE -->
                <div class="col-md-4 col-12">
                    <label>Table Type</label>
                    <select class="form-control bg-light" disabled>
                        <option value="patio_38_42" selected>
                            Patio Table (38–42)
                        </option>
                    </select>
                </div>

                <!-- DATE -->
                <div class="col-md-4 col-12">
                    <label>Available Date</label>
                    <input type="date"
                           name="available_date"
                           class="form-control"
                           required>
                </div>

                <!-- BUTTON -->
                <div class="col-md-4 col-12">
                    <label class="d-none d-md-block">&nbsp;</label>
                    <button type="submit" class="btn btn-primary w-100">
                        Save Rule
                    </button>
                </div>

            </div>

        </form>

    </div>


    <!-- ================= TABLE ================= -->
    <div class="card mt-3 p-3">

        <h5 class="mb-3 fw-semibold">Existing Availability Rules</h5>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">

                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Patio Tables</th>
                        <th>Available Date</th>
                        <th class="text-center" width="120">Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php if (!empty($rules)): ?>
                    <?php $i = 1; foreach ($rules as $row): ?>
                        <tr>
                            <td><?= $i++; ?></td>

                            <td>
                                <span class="badge bg-dark">
                                    <?= $row->tables; ?>
                                </span>
                            </td>

                            <td>
                                <?= date('d M Y', strtotime($row->available_date)); ?>
                            </td>

                            <td class="text-center">
                                <button class="btn btn-sm btn-danger w-100"
                                        onclick="deleteRule(this)"
                                        data-url="<?= site_url('admin/delete_table_rule/' . $row->available_date); ?>">
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