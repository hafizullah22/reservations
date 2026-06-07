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
            background-color: #0b0f19;
            color: #f3f4f6;
            font-family: 'Inter', sans-serif;
            letter-spacing: -0.01em;
        }

        .page-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Left panel - Focus on Presentation & Calendar */
        .calendar-panel {
            flex: 1.4;
            padding: 3rem;
            background: #0f172a;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .calendar-container {
            width: 100%;
            max-width: 480px;
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
            color: #fff !important;
            fill: #fff !important;
            height: 34px;
        }

        .flatpickr-current-month {
            font-size: 1.1rem !important;
            font-weight: 600 !important;
        }

        .flatpickr-months .flatpickr-prev-month, 
        .flatpickr-months .flatpickr-next-month {
            fill: #94a3b8 !important;
            padding: 4px !important;
        }

        .flatpickr-months .flatpickr-prev-month:hover, 
        .flatpickr-months .flatpickr-next-month:hover {
            fill: #22c55e !important;
        }

        span.flatpickr-weekday {
            color: #64748b !important;
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
            max-width: 42px !important;
            margin: 2px 0 !important;
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

        .flatpickr-day.selected, 
        .flatpickr-day.selected:hover {
            background: #22c55e !important;
            color: #fff !important;
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        }

        .flatpickr-day.flatpickr-disabled, 
        .flatpickr-day.flatpickr-disabled:hover {
            color: #475569 !important;
            background: transparent !important;
            cursor: not-allowed;
        }

        .flatpickr-day.prevMonthDay, 
        .flatpickr-day.nextMonthDay {
            color: #475569 !important;
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

<div class="page-wrapper">

    <!-- ================= LEFT: CALENDAR VIEW ================= -->
    <div class="calendar-panel">
        <div class="calendar-container">
            <div class="panel-header mb-4">
                <h2>📅 Select a Date</h2>
                <p>Choose an available calendar date for your booking reservation.</p>
            </div>

            <div class="calendar-box">
                <!-- Keep input structurally but render flatpickr inline over it -->
                <input type="text" id="booking_date" placeholder="Select date...">
                <div id="inline_calendar_target"></div>
            </div>
        </div>
    </div>

    <!-- ================= RIGHT: DATA INPUT FORM ================= -->
    <div class="form-panel">
        <div style="max-width: 440px; width: 100%; margin: 0 auto;">
            <div class="panel-header mb-4">
                <h2>New Reservation</h2>
            </div>

            <form method="post" action="<?= site_url('bookings/store'); ?>">

                <!-- Selected Date UI Feedback (Enhances UX) -->
                <div class="mb-3">
                    <label class="form-label">Selected Date</label>
                    <input type="text" id="display_date" class="form-control" readonly placeholder="Please click a date on the calendar">
                    <input type="hidden" name="booking_date" id="hidden_date">
                </div>

                <!-- Customer Info -->
                <div class="mb-3">
                    <label class="form-label">Customer Account</label>
                    <input type="text" class="form-control" value="<?= $customer->first_name; ?>" readonly>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Time Slot</label>
                        <select name="booking_time" class="form-select">
                            <option value="morning">Morning</option>
                            <option value="afternoon">Afternoon</option>
                            <option value="evening">Evening</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Table No.</label>
                        <input type="number" name="table_number" class="form-control" placeholder="e.g. 5" min="1" required>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Arrival Time</label>

                        <input type="time" name="arrival_time" class="form-control" required>
                        
                    </div>

                    <div class="col-md-6 mb-3">
                       <label class="form-label">Total Guests</label>
                    <input type="number" name="number_of_guests" class="form-control" placeholder="e.g. 4" min="1" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">List of Guest name</label>
                    <textarea name="guest_names" id="" class="form-control" placeholder="Enter guest names separated by commas"></textarea>
                </div>
               
              



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
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#booking_date", {
            inline: true,
            dateFormat: "Y-m-d",
            minDate: "today",
            // Append directly inside the box styling wrapper
            appendTo: document.getElementById('inline_calendar_target'),
            onChange: function(selectedDates, dateStr) {
                // Populate structural input values
                document.getElementById("hidden_date").value = dateStr;
                
                // Set human-friendly feedback format for the form panel
                if(selectedDates.length > 0) {
                    const options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
                    document.getElementById("display_date").value = selectedDates[0].toLocaleDateString('en-US', options);
                }
            }
        });
    });
</script>

</body>
</html>