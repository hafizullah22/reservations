<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Calendar</title>

    <!-- Google Fonts & Bootstrap/Flatpickr Icons/Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        /* ================= BASE THEME & RESET ================= */
        body {
            background-color: #dfe3ec;
            color: #f3f4f6;
            font-family: 'Inter', sans-serif;
            letter-spacing: -0.01em;
        }

        .page-wrapper {
        display: block;
        min-height: 100vh;
        }

        /* Left panel - Focus on Presentation & Calendar */
        .calendar-panel {
            flex: 1;
            padding: 3rem;
           
            background: #0f172a;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
          
        }

        .calendar-container {
            width: 100%;
            max-width: 1120px;
            //padding: 3rem;
        }

        /* Right panel - Compact Data Entry Form */
        .form-panel {
            flex: 1;
            padding: 3rem;
            background: #0b0f19;
            border-left: 1px solid #1e293b;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .panel-header h2 {
            font-weight: 700;
            font-size: 1.75rem;
            color: #fff;
        }

        .panel-header p {
            color: #94a3b8;
            font-size: 0.95rem;
        }

        /* ================= PREMIUM FLATPICKR OVERRIDES ================= */
        .calendar-box {
            background: #1e293b;
            padding: 1.5rem;
            border-radius: 20px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.2);
            border: 1px solid #334155;
            width: 100%;
            
        }

        /* Hide the ugly standard text input since calendar is inline */
        #booking_date {
            display: none;
        }

        .flatpickr-calendar.inline {
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
            width: 100% !important;
            max-width: 100% !important;
        }

        .flatpickr-innerContainer {
            width: 100%;
        }

        .flatpickr-rwd, .flatpickr-days, .dayContainer {
            width: 100% !important;
            min-width: 100% !important;
            max-width: 100% !important;
        }

        /* Beautiful Modern Headers */
        .flatpickr-months .flatpickr-month {
            color: #e4d9d9 !important;
            fill: #080707 !important;
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
            color: #f3f5f7 !important;
            font-weight: 600 !important;
        }

        /* Fix grid structure instead of breaking layout with margins */
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
            margin: 0px 0 !important;
            transition: all 0.15s ease-in-out;
            margin-top: 10px !important;
            margin-left:10px !important;
            border-top: 1px solid #334155 !important;
            border-bottom: 1px solid #334155 !important;
            
        }
        .flatpickr-day:hover {
            background: #334155 !important;
            color: #fff !important;
        }

        .flatpickr-day.today {
            border: 1px solid #22c55e !important;
            color: #22c55e !important;
        }

        .flatpickr-day.selected, 
        .flatpickr-day.selected:hover {
            background: #22c55e !important;
            color: #fff !important;
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);

        }

        .flatpickr-day.flatpickr-disabled, 
        .flatpickr-day.flatpickr-disabled:hover {
            color: #ece7e6 !important;
            /* background: transparent !important; */
            background:#f73707 !important;
            cursor: not-allowed;
        }

        .flatpickr-day.prevMonthDay, 
        .flatpickr-day.nextMonthDay {
            color: #edf1f5 !important;
        }

        /* ================= MODERN FORM ELEMENTS ================= */
        .form-label {
            color: #94a3b8;
            font-weight: 500;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
        }

        .form-control, .form-select {
            background-color: #1e293b;
            border: 1px solid #334155;
            color: #fff;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            font-size: 0.95rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control:focus, .form-select:focus {
            background-color: #1e293b;
            color: #fff;
            border-color: #22c55e;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.15);
        }

        .form-control[readonly] {
            background-color: #0f172a;
            border-color: #1e293b;
            color: #64748b;
            cursor: not-allowed;
        }

        /* Action Buttons */
        .btn-submit {
            background: #22c55e;
            color: #fff;
            border: none;
            padding: 0.85rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 4px 14px rgba(34, 197, 94, 0.2);
        }

        .btn-submit:hover {
            background: #16a34a;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(34, 197, 94, 0.3);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

       

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


        /* Responsive adaptations */
        @media (max-width: 991px) {
            .page-wrapper {
                flex-direction: column;
            }
            .calendar-panel, .form-panel {
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

   

    <!-- ================= RIGHT: DATA INPUT FORM ================= -->
    <div class="form-panel">
        <div style="max-width: 1120px; width: 100%; margin: 0 auto;">
            <div class="panel-header mb-4">
                <h2>New Reservation</h2>
            </div>
            

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
                    <input type="text" id="booking_date" placeholder="Select date...">
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
    <button type="submit" class="btn btn-submit w-100">
        Confirm Booking
    </button>

</form>


        </div>
    </div>

</div>




<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



<script>
let calendarInstance = null;

document.addEventListener("DOMContentLoaded", function () {

    const tooltip = document.getElementById("fp-tooltip");
    const dateInput = document.getElementById("booking_date");
    const hiddenDate = document.getElementById("hidden_date");
    const displayDate = document.getElementById("display_date");
    const tableSelect = document.getElementById("table_number");
    const timeSelect = document.getElementById("booking_time");

    function initCalendar(disabledDates = []) {

        const bookedSet = new Set(disabledDates);

        // Destroy existing calendar before rebuilding
        if (calendarInstance) {
            calendarInstance.destroy();
        }

        calendarInstance = flatpickr(dateInput, {
            inline: true,
            appendTo: document.getElementById("inline_calendar_target"),
            dateFormat: "Y-m-d",
            minDate: "today",
            disable: disabledDates,

            onChange: function (selectedDates, dateStr) {

                hiddenDate.value = dateStr;

                if (selectedDates.length) {
                    displayDate.value = selectedDates[0].toLocaleDateString(
                        "en-US",
                        {
                            weekday: "short",
                            year: "numeric",
                            month: "short",
                            day: "numeric"
                        }
                    );
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
                const isAvailable = !isPast && !isBooked;

                // Add custom classes
                if (isBooked) {
                    dayElem.classList.add("booked-date");
                }

                if (isAvailable) {
                    dayElem.classList.add("available-date");
                }

                dayElem.addEventListener("mouseenter", function (e) {

                    if (isPast) {
                        tooltip.innerText = "Past date";
                    } else if (isBooked) {
                        tooltip.innerText = "Already booked";
                    } else {
                        tooltip.innerText = "Available";
                    }

                    tooltip.style.left = e.pageX + "px";
                    tooltip.style.top = (e.pageY - 20) + "px";
                    tooltip.style.opacity = "1";
                });

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

    async function fetchBookedDates() {

        const table = tableSelect.value;
        const time = timeSelect.value;

        if (!table || !time) {
            initCalendar([]);
            return;
        }

        try {

            const response = await fetch(
                "<?= site_url('bookings/get-booked-dates'); ?>",
                {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        table_number: table,
                        booking_time: time
                    })
                }
            );

            const data = await response.json();

            initCalendar(data.booked_dates || []);

        } catch (error) {

            console.error("Error loading booked dates:", error);

            initCalendar([]);
        }
    }

    // Load booked dates when table or slot changes
    tableSelect.addEventListener("change", fetchBookedDates);
    timeSelect.addEventListener("change", fetchBookedDates);

    // Initial calendar load
    initCalendar([]);
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

        if (tableNumber >= 11 && tableNumber <= 34) {
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












