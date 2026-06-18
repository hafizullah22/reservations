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

.booking-menu {
    background: #f3f4f6;
    padding: 8px;
    border-radius: 12px;
}

/* BUTTON STYLE */
.booking-menu .btn {
    border-radius: 10px;
    font-weight: 500;
    white-space: nowrap;
    font-size:15px;
}

/* ACTIVE STATE */
.booking-menu .btn.active {
    background: #111827;
    color: #fff;
}

/* SEARCH */
.booking-search {
    display: flex;
    align-items: center;
}

.booking-search input {
    width: 230px;
    height:40px;
    border-radius: 10px;
    border: 1px solid #000;
}

/* MOBILE */
@media (max-width:768px) {

    .booking-menu {
        flex-direction: column;
        align-items: stretch;
        gap: 8px;
    }

    .booking-search {
        width: 100%;
    }

    .booking-search input {
        width: 100%;
    }

    .booking-search button {
        width: 100%;
    }
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

    <div class="booking-menu d-flex flex-wrap align-items-center gap-2">

        <!-- NAV BUTTONS -->
        <a href="<?= site_url('admin/bookings'); ?>" class="btn btn-outline-dark active">
        <i class="fa fa-list"></i> All Bookings
        (<?= array_sum($booking_counts ?? []) ?>)
        </a>
        <a href="<?= site_url('admin/bookings/create'); ?>" class="btn btn-outline-dark">
            <i class="fa fa-plus"></i> New Booking
        </a>

        <a href="<?= site_url('admin/bookings/confirmed'); ?>" class="btn btn-outline-dark">
            <i class="fa fa-calendar-check"></i> Confirmed
            (<?= $booking_counts['Confirmed'] ?? 0 ?>)
        </a>

        <a href="<?= site_url('admin/bookings/completed'); ?>" class="btn btn-outline-dark">
            <i class="fa fa-check-double"></i> Completed
            (<?= $booking_counts['Completed'] ?? 0 ?>)
        </a>

        <a href="<?= site_url('admin/bookings/cancelled'); ?>" class="btn btn-outline-dark">
            <i class="fa fa-times"></i> Cancelled
            (<?= $booking_counts['Cancelled'] ?? 0 ?>)
        </a>
 

    <div class="booking-search ms-auto position-relative">
        <input type="text"
            id="liveSearch"
            class="form-control form-control-sm pe-4"
            placeholder="Booking ID, Name">

        <i class="fa fa-search position-absolute"
        style="right:10px; top:50%; transform:translateY(-50%); color:#000;"></i>
    </div>
        



    </div>



    <!-- ================= TABLE ================= -->

    <div class="card">

        <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead>
                    <tr>
                        <th>SL</th>
                        <th>ID</th>
                        <th>Member</th>
                        <th>Booked Date</th>
                        <th>Time</th>
                        <th>Table</th>
                        <th>Persons</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody id="bookingTableBody">
                 <?php   $sl=1;?>
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
                            <td><?=$sl++;?></td>
                            <td class="text-center"><?= $b->booking_id; ?></td>
                            <td><?= $b->customer_name; ?></td>
                            <td><?= date('M d, Y', strtotime($b->booking_date)); ?></td>
                            <td><?= $b->booking_time; ?></td>
                            <td class="text-center"><?= $b->table_number; ?></td>
                            <td class="text-center"><?= $b->number_of_guests; ?></td>

                            <td>
                                <span class="badge bg-<?= $badge; ?>">
                                    <?= ucfirst($b->status); ?>
                                </span>
                            </td>

                            <td>
                            <a href="<?= site_url('admin/bookings/booking_details/'.$b->booking_id); ?>"
                                class="btn btn-primary btn-sm">
                                 <i class="fa fa-eye"></i>
                            </a>
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



<!-- live Search Script  -->

<script>
let timer = null;

document.getElementById('liveSearch').addEventListener('keyup', function () {

    clearTimeout(timer);

    let query = this.value;

    timer = setTimeout(() => {

        fetch("<?= site_url('admin/bookings/ajax_booking_search'); ?>?q=" + query)
            .then(res => res.json())
            .then(data => {

                let html = '';

                if (data.data.length > 0) {
                    let sl=1;
                    data.data.forEach(b => {

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
                            <a href="<<?= site_url('admin/bookings/booking_details/') ?>${b.booking_id}"
                                class="btn btn-primary btn-sm">
                                 <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                        `;
                    });

                } else {
                    html = `
                        <tr>
                            <td colspan="7" class="text-center text-danger">
                                No Booking Information Found
                            </td>
                        </tr>
                    `;
                }

                document.getElementById('bookingTableBody').innerHTML = html;

            });

    }, 300); // debounce
});
</script>

<?php $this->load->view('admin/layout/footer'); ?>