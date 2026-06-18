<?php $this->load->view('admin/layout/header'); ?>

<style>
/* ================= GLOBAL STYLE ================= */

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

/* ================= MENU ================= */

.booking-menu {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    background: #f3f4f6;
    padding: 8px;
    border-radius: 12px;
}

.booking-menu .btn {
    border-radius: 10px;
    font-weight: 500;
    white-space: nowrap;
    transition: .2s;
}

.booking-menu .btn i {
    margin-right: 5px;
}

.booking-menu .btn.active,
.booking-menu .btn:hover {
    background: #111827;
    color: #fff;
    border-color: #111827;
}

/* SEARCH */
.booking-search {
    display: flex;
    align-items: center;
}

.booking-search input {
    width: 250px;
    height:40px;
    border-radius: 10px;
    border: 1px solid #000;
}

/* ================= CARD ================= */

.card {
    border: none;
    border-radius: 14px;
    box-shadow: 0 2px 10px rgba(0,0,0,.05);
}

/* ================= TABLE ================= */

.table thead {
    background: #111827;
    color: #fff;
}

.table thead th {
    font-weight: 500;
    white-space: nowrap;
}

.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

/* ================= BADGE ================= */

.badge {
    font-size: 12px;
    padding: 6px 10px;
}

/* ================= MOBILE ================= */

@media (max-width:768px) {

    .main {
        padding: 12px;
    }

    .table {
        min-width: 850px;
    }

    .booking-menu {
        overflow-x: auto;
        flex-wrap: nowrap;
    }
}
</style>

<div class="main">

<!-- ================= TOPBAR MENU ================= -->

<div class="topbar">

    <div class="booking-menu">

        <a href="<?= site_url('admin/bookings'); ?>"
           class="btn btn-outline-dark">
            <i class="fa fa-list"></i> All Bookings
        </a>

        <a href="<?= site_url('bookings/create'); ?>"
           class="btn btn-outline-dark">
            <i class="fa fa-plus"></i> New Booking
        </a>

        <a href="<?= site_url('admin/bookings/completed'); ?>"
           class="btn btn-outline-dark">
            <i class="fa fa-check"></i> Completed
        </a>

        <a href="<?= site_url('admin/bookings/cancelled'); ?>"
           class="btn btn-outline-dark active">
            <i class="fa fa-times"></i> Cancelled
        </a>

        <a href="<?= site_url('admin/bookings/confirmed'); ?>"
           class="btn btn-outline-dark">
            <i class="fa fa-check-circle"></i> Confirmed
        </a>
    <div class="booking-search ms-auto">
        <input type="text"
            id="liveSearch"
            class="form-control form-control-sm"
            placeholder="Search ID, Name, Phone...">
    </div>

    </div>

</div>



<!-- ================= TABLE ================= -->

<div class="card">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
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

                    <?php foreach($bookings as $b): ?>

                        <?php
                        $badge = 'secondary';

                        switch(strtolower($b->status)) {
                            case 'confirmed': $badge = 'success'; break;
                            case 'pending': $badge = 'warning'; break;
                            case 'cancelled': $badge = 'danger'; break;
                            case 'completed': $badge = 'primary'; break;
                        }
                        ?>

                        <tr>
                            <td><?= $b->booking_id; ?></td>
                            <td><?= $b->customer_name; ?></td>
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
                            <i class="fa fa-eye"></i>
                        </a>

                        <button class="btn btn-danger btn-sm"
                                onclick="deleteBooking(this)"
                                data-url="<?= site_url('admin/bookings/delete/'.$b->booking_id); ?>">
                            <i class="fa fa-trash"></i>
                        </button>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td colspan="8" class="text-center text-muted">
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

<!-- ================= SWEET ALERT DELETE ================= -->

<script>
function deleteBooking(btn)
{
    let url = btn.dataset.url;
    let row = btn.closest('tr');

    Swal.fire({
        title: 'Delete Booking?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, Delete'
    }).then((result) => {

        if(result.isConfirmed)
        {
            btn.disabled = true;

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.json())
            .then(data => {

                if(data.status === 'success')
                {
                    row.remove();

                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
                else
                {
                    Swal.fire('Error', data.message, 'error');
                }

                btn.disabled = false;
            })
            .catch(() => {
                Swal.fire('Error', 'Something went wrong', 'error');
                btn.disabled = false;
            });
        }

    });
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const input = document.getElementById('liveSearch');
    const tbody = document.getElementById('bookingTableBody');

    if (!input) {
        console.error("liveSearch input not found");
        return;
    }

    const bookingStatus = "<?= $status ?>"; // MUST be confirmed

    let timer = null;

    input.addEventListener('keyup', function () {

        clearTimeout(timer);

        const query = this.value;

        timer = setTimeout(() => {

            fetch("<?= site_url('admin/bookings/ajax_booking_search'); ?>?q="
                + encodeURIComponent(query)
                + "&status=" + bookingStatus
            )
            .then(res => res.json())
            .then(res => {

                let html = '';
                const data = res.data || [];

                if (data.length > 0) {

                    let sl = 1;

                    data.forEach(b => {

                        html += `
                            <tr>
                                <td>${sl++}</td>
                                <td>${b.booking_id}</td>
                                <td>${b.customer_name ?? ''}</td>
                                <td>${b.booking_date}</td>
                                <td>${b.booking_time}</td>
                                <td>${b.table_number}</td>
                                <td>${b.number_of_guests}</td>
                                <td>${b.status}</td>
                                <td>
                                    <a href="<?= site_url('admin/bookings/booking_details/') ?>${b.booking_id}"
                                       class="btn btn-success btn-sm">
                                        View
                                    </a>
                                </td>
                            </tr>
                        `;
                    });

                } else {
                    html = `
                        <tr>
                            <td colspan="9" class="text-center text-muted">
                                No results found
                            </td>
                        </tr>
                    `;
                }

                tbody.innerHTML = html;

            })
            .catch(err => console.error("AJAX error:", err));

        }, 300);

    });

});
</script>

<?php $this->load->view('admin/layout/footer'); ?>