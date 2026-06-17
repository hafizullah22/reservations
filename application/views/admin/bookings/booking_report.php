<?php $this->load->view('admin/layout/header'); ?>

<style>
.main {
    padding: 20px;
}

.topbar {
    background: #fff;
    padding: 15px;
    border-radius: 12px;
    margin-bottom: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,.05);
}

.card {
    border: none;
    border-radius: 14px;
    box-shadow: 0 2px 10px rgba(0,0,0,.05);
}

.table thead {
    background: #111827;
    color: #fff;
}

.table thead th {
    font-weight: 500;
    white-space: nowrap;
}

.pdf-btn {
    position: absolute;
    right: 20px;
    top: 20px;
}

.topbar-wrapper {
    position: relative;
}

@media (max-width:768px) {
    .main { padding: 12px; }
    .table { min-width: 850px; }
}
</style>

<div class="main">

<form id="filterForm">

<div class="topbar-wrapper">

 <!-- FILTER BAR -->
<div class="topbar">

    <div class="booking-filters d-flex flex-nowrap align-items-center gap-2">

        <div class="col-md-3">
            <label class="small mb-1">Start Date</label>
            <input type="date" name="start_date" class="form-control form-control-sm">
        </div>

        <div class="col-md-3">
            <label class="small mb-1">End Date</label>
            <input type="date" name="end_date" class="form-control form-control-sm">
        </div>

        <div class="col-md-2">
            <label class="small mb-1">Time</label>
            <select name="booking_time" class="form-control form-control-sm">
                <option value="">All Time</option>
                <option value="afternoon">Afternoon</option>
                <option value="evening">Evening</option>
            </select>
        </div>

        <div class="col-md-2">
            <label class="small mb-1">Status</label>
            <select name="status" class="form-control form-control-sm">
                <option value="">All Status</option>
                <option value="confirmed">Confirmed</option>
                <option value="completed">Completed</option>
                <option value="pending">Pending</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>

        <div class="d-flex flex-column justify-content-end">
            <label class="small mb-1 invisible">Filter</label>
            <button type="submit" class="btn btn-dark btn-sm">Filter</button>
        </div>

    </div>
</div>


</div>

</form>

<div class="d-grid mb-2">
    
    <a href="#"
       id="pdfBtn" target="_blank"
       class="btn btn-danger btn-sm w-100 rounded-3"
       style="display:none; font-weight:bold;"><i class="bi bi-file-earmark-pdf"></i>
        Genarate PDF Booking Report 
    </a>
</div>



<!-- TABLE -->
<div class="card">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">

                <thead>
                    <tr>
                        <th>SL</th>
                        <th>ID</th>
                        <th>Member</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Table</th>
                        <th>Persons</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody id="bookingTableBody">

                <?php if(!empty($bookings)): ?>
                    <?php $sl = 1; foreach($bookings as $b): ?>

                        <?php
                        $status = strtolower($b->status);

                        $badgeMap = [
                            'confirmed' => 'success',
                            'pending'   => 'warning',
                            'cancelled' => 'danger',
                            'completed' => 'primary'
                        ];

                        $badge = $badgeMap[$status] ?? 'secondary';
                        ?>

                        <tr>
                            <td><?= $sl++; ?></td>
                            <td><?= $b->booking_id; ?></td>
                            <td><?= $b->first_name; ?></td>
                            <td><?= date('M d, Y', strtotime($b->booking_date)); ?></td>
                            <td><?= $b->booking_time; ?></td>
                            <td><?= $b->table_number; ?></td>
                            <td><?= $b->number_of_guests; ?></td>

                            <td>
                                <span class="badge bg-<?= $badge; ?>">
                                    <?= ucfirst($b->status); ?>
                                </span>
                            </td>

                            <td>
                                <a href="<?= site_url('admin/bookings/booking_details/'.$b->booking_id); ?>"
                                   class="btn btn-success btn-sm">
                                    View
                                </a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center text-muted">
                            No bookings found
                        </td>
                    </tr>
                <?php endif; ?>

                </tbody>

            </table>
        </div>

    </div>
</div>

</div>

<script>
const baseUrl = "<?= site_url('admin/bookings/booking_details/'); ?>";

document.getElementById('filterForm').addEventListener('submit', function(e) {
    e.preventDefault();

    fetch("<?= site_url('admin/bookings/filter_ajax'); ?>", {
        method: "POST",
        body: new FormData(this)
    })
    .then(res => res.json())
    .then(renderTable)
    .catch(console.error);
});

function renderTable(data) {

    const tbody = document.getElementById('bookingTableBody');
    const pdfBtn = document.getElementById('pdfBtn');
    const form = document.getElementById('filterForm');

    if (!tbody || !pdfBtn || !form) return;

    // ❌ No data case
    if (!data || data.length === 0) {

        tbody.innerHTML = `
            <tr>
                <td colspan="9" class="text-center text-muted">
                    No bookings found
                </td>
            </tr>`;

        pdfBtn.style.display = 'none';
        return;
    }

    // ✅ SHOW PDF BUTTON
    pdfBtn.style.display = 'inline-block';

    // ✅ UPDATE PDF LINK (IMPORTANT FIX)
    const params = new URLSearchParams(new FormData(form));
    pdfBtn.href = "<?= site_url('admin/bookings/export_pdf'); ?>?" + params.toString();

    // ✅ BUILD TABLE
    let html = '';
    let sl = 1;

    data.forEach(b => {

        html += `
        <tr>
            <td>${sl++}</td>
            <td>${b.booking_id}</td>
            <td>${b.first_name}</td>
            <td>${formatDate(b.booking_date)}</td>
            <td>${b.booking_time}</td>
            <td>${b.table_number}</td>
            <td>${b.number_of_guests}</td>
            <td>
                <span class="badge bg-${getBadge(b.status)}">
                    ${capitalize(b.status)}
                </span>
            </td>
            <td>
                <a href="<?= site_url('admin/bookings/booking_details/'); ?>${b.booking_id}"
                   class="btn btn-success btn-sm">
                    View
                </a>
            </td>
        </tr>`;
    });

    tbody.innerHTML = html;
}

function getBadge(status) {
    status = (status || '').toLowerCase();

    const map = {
        confirmed: 'success',
        pending: 'warning',
        cancelled: 'danger',
        completed: 'primary'
    };

    return map[status] || 'secondary';
}

function capitalize(str) {
    return str ? str.charAt(0).toUpperCase() + str.slice(1) : '';
}

function formatDate(dateStr) {
    const d = new Date(dateStr);
    if (isNaN(d)) return dateStr;

    return d.toLocaleDateString('en-US', {
        month: 'short',
        day: '2-digit',
        year: 'numeric'
    });
}
</script>

<?php $this->load->view('admin/layout/footer'); ?>