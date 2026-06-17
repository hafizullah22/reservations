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

        <form method="post" action="<?= site_url('bookings/store'); ?>">

    <!-- ================= CUSTOMER INFO ================= -->
    <input type="hidden" value="<?= $customer->first_name; ?>">

    <div class="row">

        <!-- TABLE -->
        <div class="col-md-4 mb-3">
            <label class="form-label">Table No.</label>
            <select name="table_number" id="table_number" class="form-select" required>
                <option value="">-- Select Table --</option>
                <?php foreach ($tables as $table): ?>
                    <option value="<?= $table->table_number; ?>">
                        <?= $table->table_name; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

      

       
   <!-- ================= TIME SLOT ================= -->
        <div class="col-md-4 mb-3">
            <label class="form-label">Time Slot</label>

            <select name="booking_time" id="booking_time" class="form-select" required>
                <option value="">-- Select Time Slot --</option>
                <option value="afternoon">12.00 to 4.30 PM</option>
                <option value="evening">5.00 to 12.00 AM</option>
            </select>
        </div>
   
      <!-- GUESTS -->
        <div class="col-md-4 mb-3">
            <label class="form-label">Total Guests</label>
            <input type="number"
                   id="number_of_guests"
                   name="number_of_guests"
                   min="1"
                   class="form-control"
                   required
                   placeholder="Enter number of guests">
        </div>

    </div>

    <!-- ================= CALENDAR SECTION (MOVED OUTSIDE FORM GRID) ================= -->
    <div class="mb-3">
        <label class="form-label">Select Date</label>

        <div class="calendar-panel">
            <div class="calendar-container">

                <div class="panel-header mb-3">
                    <!-- <h2>📅 Select a Date</h2>
                    <p>Choose an available booking date</p> -->

                    <?php if($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger mt-2">
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="calendar-box">
                    <input type="hidden" id="booking_date" placeholder="Select date...">
                    <div id="inline_calendar_target"></div>
                </div>

            </div>
        </div>
    </div>

    <!-- ================= SELECTED DATE ================= -->
    <div class="mb-3">
        <!-- <label class="form-label">Selected Date</label> -->

        <input type="text"
               id="display_date"
               class="form-control"
               readonly
               placeholder="Please click a date on calendar" hidden>

        <input type="hidden" name="booking_date" id="hidden_date">
    </div>

  <!-- ================= ARRIVAL TIME ================= -->
        <div class="mb-3">
            <label class="form-label">Arrival Time</label>

            <select name="arrival_time" id="arrival_time" class="form-control" required>
                <option value="">-- Select Arrival Time --</option>
            </select>
        </div>

    <!-- ================= GUEST NAMES ================= -->
    <div class="mb-3">
        <label class="form-label">List of Guest Names</label>

        <textarea name="guest_names"
                  class="form-control"
                  placeholder="Enter guest names separated by commas"></textarea>
    </div>

    <!-- ================= SUBMIT ================= -->
    <button type="button" class="btn btn-sucess w-100">
        Confirm Booking
    </button>

    </form>

</div>


    

<?php $this->load->view('admin/layout/footer'); ?>