<?php $this->load->view('admin/layout/header'); ?>

    <style>
     /* ================= BASE ================= */

    body {
        background-color: #dfe3ec;
        color: #000;
        font-family: 'Inter', sans-serif;
        letter-spacing: -0.01em;
    }

    /* ================= LAYOUT ================= */

    .page-wrapper {
        display: flex;
        flex-direction: column;
        margin-top:-40px;
    }

    /* ================= PANELS ================= */

    .calendar-panel,
    .form-panel {
        flex: 1;
        padding: 3rem;
        background: #fff;
    }

    .form-panel {
        border-left: 1px solid #1e293b;
    }

    /* ================= HEADER ================= */

    .panel-header h2 {
        font-weight: 700;
        font-size: 1.75rem;
        color: #000;
    }

    .panel-header p {
        color: #000;
        font-size: 0.95rem;
    }

/* ================= CALENDAR ================= */

.calendar-box {
    background: #fff;
    padding: 1.5rem;
    border-radius: 20px;
    border: 1px solid #334155;
    width: 100%;
}

/* Hide default input */
#booking_date {
    display: none;
}

/* Flatpickr reset */
.flatpickr-calendar.inline {
    background: transparent !important;
    border: none !important;
    box-shadow: none !important;
    width: 100% !important;
    max-width: 100% !important;
}

.flatpickr-innerContainer,
.flatpickr-rwd,
.flatpickr-days,
.dayContainer {
    width: 100% !important;
    min-width: 100% !important;
    max-width: 100% !important;
}

/* Header */
.flatpickr-months .flatpickr-month {
    color: #000 !important;
    height: 40px;
    margin-bottom: 30px;
    border-bottom: 1px solid #334155 !important;
}

.flatpickr-current-month {
    font-size: 1.1rem !important;
    font-weight: 600 !important;
}

.flatpickr-months .flatpickr-prev-month,
.flatpickr-months .flatpickr-next-month {
    fill: #f15e08 !important;
    width: 30px !important;
    padding: 40px !important;
    color: #f15e08 !important;
}

.flatpickr-months .flatpickr-prev-month:hover,
.flatpickr-months .flatpickr-next-month:hover {
    fill: #22c55e !important;
}

span.flatpickr-weekday {
    color: #000 !important;
    font-weight: 600 !important;
}

/* Day grid */
.dayContainer {
    justify-content: space-between;
}

.flatpickr-day {
    background: transparent;
    color: #cbd5e1 !important;
    border: none !important;
    border-radius: 12px !important;
    font-weight: 500;
    height: 42px !important;
    line-height: 42px !important;
    max-width: 110px !important;
    margin: 0 !important;
    margin-top: 10px !important;
    margin-left: 10px !important;
    border-top: 1px solid #334155 !important;
    border-bottom: 1px solid #334155 !important;
    transition: all 0.15s ease-in-out;
}

.flatpickr-day:hover {
    background: #334155 !important;
    color: #fff !important;
}

.flatpickr-day.today {
    border: 1px solid #22c55e !important;
    color: #22c55e !important;
}

/* States */
.flatpickr-day.past-date {
    background: #334155 !important;
    color: #64748b !important;
    opacity: 0.6;
    cursor: not-allowed;
}

.flatpickr-day.booked-date {
    background: #ef4444 !important;
    color: #fff !important;
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.25);
}

.flatpickr-day.available-date {
    background: transparent;
    border: 1px solid #22c55e !important;
    color: #22c55e !important;
}

.flatpickr-day.selected,
.flatpickr-day.selected:hover {
    background: #22c55e !important;
    color: #fff !important;
}

.flatpickr-day.prevMonthDay,
.flatpickr-day.nextMonthDay {
    color: #edf1f5 !important;
}

/* ================= FORM ================= */

.form-label {
    color: #000;
    font-weight: 500;
    font-size: 0.85rem;
    text-transform: uppercase;
    margin-bottom: 0.5rem;
}

.form-control,
.form-select {
    background-color: #fff;
    border: 1px solid #334155;
    color: #000;
    padding: 0.75rem 1rem;
    border-radius: 10px;
    font-size: 0.95rem;
    min-height: 36px;
    transition: border-color 0.2s, box-shadow 0.2s;
    padding: 4px 10px;
    font-size: 14px;
}

.form-control:focus,
.form-select:focus {
    border-color: #22c55e;
    box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.15);
}

.form-control[readonly] {
    background-color: #F8F9FA;
    border-color: #1e293b;
    color: #000;
    cursor: not-allowed;
}

/* ================= CARD ================= */

.card {
    border: none;
    border-radius: 12px;
}

.card-header {
    border-radius: 12px 12px 0 0 !important;
    font-weight: 600;
}

/* ================= TOOLTIP ================= */

.fp-tooltip {
    position: absolute;
    background: #111827;
    color: #fff;
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 12px;
    pointer-events: none;
    opacity: 0;
    z-index: 99999;
    transition: opacity .15s ease;
    white-space: nowrap;
}

/* ================= CALENDAR CENTER ================= */

#inline_calendar_target {
    display: flex;
    justify-content: center;
}

/* ================= RESPONSIVE ================= */

@media (max-width: 991px) {
    .page-wrapper {
        flex-direction: column;
    }

    .calendar-panel,
    .form-panel {
        padding: 2rem 1.5rem;
        flex: none;
    }

    .form-panel {
        border-left: none;
        border-top: 1px solid #1e293b;
    }
}
    </style>
</head>
<body>
    <div id="fp-tooltip" class="fp-tooltip"></div>

    <div class="page-wrapper">
        
        <div class="form-panel">
            <div style="max-width: 1120px; margin: 0 auto;">

            <div class="topbar mb-3 d-flex justify-content-between align-items-center flex-wrap gap-2">

        <div>
            <h3 class="mb-0 fw-bold">New Reservation</h3>

        </div>

        <div class="btn-group">

            <a href="<?= site_url('admin/bookings'); ?>" class="btn btn-secondary">
                All Bookings
            </a>

            <a href="<?= site_url('admin/bookings/bookings_report'); ?>" class="btn btn-danger">
                Booking Reports
            </a>


        </div>

    </div>

            <form method="post" action="<?= site_url('admin/bookings/store'); ?>">

                <div class="row">

                    <!-- ================= LEFT SIDE ================= -->
                    <div class="col-lg-5">

                        <div class="card shadow-sm mb-4">

                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Customer Information</h5>
                            </div>

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-12 mb-3">
                                        <label>Member ID</label>
                                        <input type="text" name="customer_id" id="customer_id" class="form-control" placeholder="Enter Member ID">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control" readonly>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" class="form-control" readonly>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control" readonly>
                                    </div>

                                     <div class="col-md-12 mb-3">
                                        <label>Member Type</label>
                                        <input type="text" name="phone" id="customer_type" class="form-control" readonly>
                                    </div>

                                    

                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- ================= RIGHT SIDE ================= -->
                    <div class="col-lg-7">

                        <div class="card shadow-sm mb-4">

                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0">Booking Information</h5>
                            </div>

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-6 mb-3">
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

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Total Guests</label>
                                        <input type="number" id="number_of_guests" name="number_of_guests"
                                               min="1" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Time Slot</label>
                                        <select name="booking_time" id="booking_time" class="form-select" required>
                                            <option value="">-- Select Time Slot --</option>
                                            <option value="afternoon">12.00 PM - 4.30 PM</option>
                                            <option value="evening">5.00 PM - 12.00 AM</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Arrival Time</label>
                                        <select name="arrival_time" id="arrival_time" class="form-select" required>
                                            <option value="">-- Select Arrival Time --</option>
                                        </select>
                                    </div>

                                </div>

                                <!-- CALENDAR -->
                                <div class="mb-3">
                                    <label class="form-label">Select Date</label>

                                    <div class="border rounded p-3 bg-light">

                                        <?php if($this->session->flashdata('error')): ?>
                                            <div class="alert alert-danger">
                                                <?= $this->session->flashdata('error'); ?>
                                            </div>
                                        <?php endif; ?>

                                        <input type="hidden" id="booking_date">
                                        <div id="inline_calendar_target"></div>

                                    </div>
                                </div>

                                <!-- HIDDEN DATE -->
                                <input type="hidden" name="booking_date" id="hidden_date">

                                <!-- GUEST NAMES -->
                                <div class="mb-3">
                                    <label class="form-label">Guest Names</label>
                                    <textarea name="guest_names" rows="4"
                                              class="form-control"
                                              placeholder="Enter guest names separated by commas"></textarea>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

                <!-- SUBMIT -->
                <div class="text-end">
                    <button type="submit" class="btn btn-success px-5 w-100 w-md-auto">
                        Confirm Booking
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>





<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<script>

$(document).ready(function () {

    let timer;

    $('#customer_id').on('input', function () {

        clearTimeout(timer);

        let customer_id = $(this).val().trim();

        if (customer_id.length < 2) return;

        timer = setTimeout(function () {

            $.ajax({
                url: "<?= site_url('admin/bookings/get_customer'); ?>",
                type: "POST",
                dataType: "json",
                data: { customer_id: customer_id },

                success: function (res) {

                    console.log(res);

                    if (res.status && res.customer) {

                        $('#first_name').val(res.customer.first_name);
                        $('#last_name').val(res.customer.last_name);
                        $('#phone').val(res.customer.phone);
                        $('#email').val(res.customer.email);
                         $('#customer_type').val(res.customer.customer_type);

                    } else {
                        $('#first_name,#last_name,#phone,#email').val('');
                    }
                }
            });

        }, 100);

    });

});
</script>

<script>
let calendarInstance = null;

document.addEventListener("DOMContentLoaded", function () {

    const tooltip = document.getElementById("fp-tooltip");
    const dateInput = document.getElementById("booking_date");
    const hiddenDate = document.getElementById("hidden_date");
    const displayDate = document.getElementById("display_date");
    const tableSelect = document.getElementById("table_number");
    const timeSelect = document.getElementById("booking_time");

    // ================= MAIN CALENDAR COMPILER =================
    function initCalendar(allowedDates = [], bookedDates = [], allowAll = true) {
        
        const allowedSet = new Set(allowedDates);
        const bookedSet = new Set(bookedDates);

        if (calendarInstance) {
            calendarInstance.destroy();
        }

        calendarInstance = flatpickr(dateInput, {
            inline: true,
            appendTo: document.getElementById("inline_calendar_target"),
            dateFormat: "Y-m-d",
            minDate: "today",
            
            // BLOCK ENGINE: Disable date selection if it's already booked, OR if it's not a valid holiday date
            disable: [
                function(date) {
                    const dateStr = flatpickr.formatDate(date, "Y-m-d");
                    
                    // Rule 1: If it's already booked, it's always disabled
                    if (bookedSet.has(dateStr)) return true;
                    
                    // Rule 2: If it's a holiday table, it must be explicitly within the allowed window
                    if (!allowAll && !allowedSet.has(dateStr)) return true;
                    
                    return false;
                }
            ],

            onChange: function (selectedDates, dateStr) {
                hiddenDate.value = dateStr;
                if (selectedDates.length) {
                    displayDate.value = selectedDates[0].toLocaleDateString("en-US", {
                        weekday: "short", year: "numeric", month: "short", day: "numeric"
                    });
                }
            },

            onDayCreate: function (dObj, dStr, fp, dayElem) {
                if (!dayElem.dateObj) return;

                const dateStr = fp.formatDate(dayElem.dateObj, "Y-m-d");
                const today = new Date();
                today.setHours(0, 0, 0, 0);

                const cellDate = new Date(dayElem.dateObj);
                cellDate.setHours(0, 0, 0, 0);

                const isPast = cellDate < today;
                const isBooked = bookedSet.has(dateStr);
                const isHolidayAllowed = allowAll || allowedSet.has(dateStr);

                // Clean visual state resets before binding
                dayElem.classList.remove("past-date", "booked-date", "available-date");

                let reason = "Available to Book";

                // ================= COLOR STATE RENDERING MANAGEMENT =================
                if (isPast) {
                    dayElem.classList.add("past-date");
                    reason = "Past date";
                } else if (isBooked) {
                    // Confirmed reservation found: apply distinctive booked style (Red Color trigger)
                    dayElem.classList.add("booked-date"); 
                    reason = "Already booked";
                } else if (!isHolidayAllowed) {
                    // Out-of-bounds holiday cell rendering adjustment
                    dayElem.classList.add("past-date"); 
                    reason = "Holiday / July & September Only";
                } else {
                    dayElem.classList.add("available-date");
                }

                // ================= HOVER MOUSE EVENT LISTENERS =================
                dayElem.addEventListener("mouseenter", function (e) {
                    tooltip.innerText = reason;
                    tooltip.style.left = e.pageX + "px";
                    tooltip.style.top = (e.pageY - 20) + "px";
                    tooltip.style.opacity = "1";
                });        <small class="text-muted">Create and manage table bookings</small>

                dayElem.addEventListener("mousemove", function (e) {
                    tooltip.style.left = e.pageX + "px";
                    tooltip.style.top = (e.pageY - 20) + "px";
                });

                dayElem.addEventListener("mouseleave", function () {
                    tooltip.style.opacity = "0";
                });
            }
        });
    }

    // ================= CENTRALIZED AJAX DATA ENGINE =================
    async function fetchCalendarStatus() {
        const table = tableSelect.value;
        const time = timeSelect.value;

        // Change: Only abort if NO table is selected. 
        // If a table is selected but no time is chosen, we still proceed.
        if (!table) {
            initCalendar([], [], true); 
            return;
        }

        try {
            const response = await fetch(
                "<?= site_url('bookings/get_available_dates'); ?>", 
                {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-Requested-With": "XMLHttpRequest"
                    },
                    body: JSON.stringify({
                        table_number: table,
                        booking_time: time // This will just pass null if not selected yet
                    })
                }
            );

            const data = await response.json();
            
            initCalendar(
                data.allowed_dates || [], 
                data.booked_dates || [], 
                data.allow_all !== false
            );

        } catch (error) {
            console.error("Communication breakdown with booking array endpoints:", error);
            initCalendar([], [], true);
        }
    }

    // Event attachments
    tableSelect.addEventListener("change", fetchCalendarStatus);
    timeSelect.addEventListener("change", fetchCalendarStatus);

    // Bootstrap execution block layout state
    initCalendar([], [], true);
});

</script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const bookingTime = document.getElementById("booking_time");
    const arrivalTime = document.getElementById("arrival_time");

    const timeSlots = {
        afternoon: ["12:00", "12:30", "13:00"],
        evening: ["17:00", "17:30", "18:00"]
    };

    bookingTime.addEventListener("change", function () {

        const selected = this.value;

        // reset dropdown
        arrivalTime.innerHTML = '<option value="">-- Select Arrival Time --</option>';

        if (!timeSlots[selected]) return;

        timeSlots[selected].forEach(time => {
            const option = document.createElement("option");
            option.value = time;
            option.textContent = formatTime(time);
            arrivalTime.appendChild(option);
        });
    });

    function formatTime(time24) {
        // Convert 24h → 12h format for UI
        const [hour, minute] = time24.split(":");
        let h = parseInt(hour);
        const ampm = h >= 12 ? "PM" : "AM";

        h = h % 12 || 12;

        return `${h}:${minute} ${ampm}`;
    }

});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const tableSelect = document.getElementById("table_number");
    const guestInput = document.querySelector('input[name="number_of_guests"]');

    function getMaxGuests(tableNumber) {
        tableNumber = parseInt(tableNumber);

        if ((tableNumber >= 11 && tableNumber <= 34) || (tableNumber >= 35 && tableNumber <= 39)) {
            return 10;
        }

        if (
            (tableNumber >= 1 && tableNumber <= 10) ||
            (tableNumber >= 40 && tableNumber <= 50)
        ) {
            return 15;
        }

        return 0; // invalid table
    }

    function validateGuests() {
        const tableNo = tableSelect.value;
        const guests = parseInt(guestInput.value || 0);

        if (!tableNo) return;

        const max = getMaxGuests(tableNo);

        if (max === 0) {
            alert("Invalid table selection!");
            guestInput.value = "";
            return;
        }

        if (guests > max) {
        Swal.fire({
            icon: 'error',
            title: 'Guest Limit Exceeded',
            text: `This table allows maximum ${max} guests.`,
            confirmButtonColor: '#d33'
        });

        guestInput.value = max;
    }
    }

    tableSelect.addEventListener("change", validateGuests);
    guestInput.addEventListener("input", validateGuests);

});


</script>
<!-- // SweetAlert2 CDN  -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>



