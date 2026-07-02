<?php $this->load->view('layout/header'); ?>

<style>
body {
    background: #ffffff;
    color: #515151;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    -webkit-font-smoothing: antialiased;
}

/* WordPress WooCommerce Style Layout */
.woocommerce-order-container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 40px 15px;
}

/* WooCommerce Success Notice Banner */
.woocommerce-notice {
    background-color: #f8f8f8;
    border-top: 3px solid #075307;
    color: #0f0f0f;
    padding: 1.5em;
    font-size: 1.1rem;
    margin-bottom: 2em;
    list-style: none;
    border-left: 1px solid #e2e2e2;
    border-right: 1px solid #e2e2e2;
    border-bottom: 1px solid #e2e2e2;
}

/* Overview Strip (The standard WooCommerce metadata bar) */
.woocommerce-order-overview {
    display: flex;
    flex-wrap: wrap;
    list-style: none;
    padding: 0;
    margin: 0 0 3em 0;
    border: 2px dashed #d3ced2;
    background-color: #fafafa;
}
.woocommerce-order-overview__item {
    padding: 1.5em;
    border-right: 1px dashed #d3ced2;
    flex: 1 1 180px;
}
.woocommerce-order-overview__item:last-child {
    border-right: none;
}
.woocommerce-order-overview__item strong {
    display: block;
    color: #222;
    font-size: 1.1rem;
    margin-top: 4px;
}

/* Traditional WP Bordered Table Styling */
.wp-checkout-table {
    width: 100%;
    margin-bottom: 2.5em;
    border-collapse: collapse;
    border: 1px solid #e2e2e2;
}
.wp-checkout-table th, 
.wp-checkout-table td {
    padding: 12px 16px;
    text-align: left;
    border: 1px solid #e2e2e2;
    vertical-align: middle;
}
.wp-checkout-table th {
    background-color: #fcfcfc;
    color: #000;
    font-weight: 600;
    width: 35%;
}
.wp-checkout-table td {
    color: #000;
}

/* WP Style Heading */
.wp-section-title {
    font-size: 1.4rem;
    font-weight: 600;
    color: #222;
    margin-bottom: 15px;
    position: relative;
}

/* WooCommerce Style Alerts & Info Boxes */
.wp-info-notice {
    background: #fff9e6;
    border-left: 4px solid #ffba00;
    padding: 15px 20px;
    margin-bottom: 2.5em;
}
.wp-info-notice ul {
    margin: 0;
    padding-left: 20px;
    color: #555;
}
.wp-info-notice li {
    margin-bottom: 5px;
}

/* WP Button Accents */
.wp-btn {
    background-color: #111111;
    color: #ffffff !important;
    font-weight: 600;
    padding: 10px 24px;
    border: none;
    border-radius: 4px;
    text-decoration: none;
    display: inline-block;
    transition: background 0.15s ease-in-out;
    font-size: 0.95rem;
}
.wp-btn:hover {
    background-color: #333333;
}
.wp-btn-secondary {
    background-color: #f7f7f7;
    color: #333 !important;
    border: 1px solid #ccc;
    margin-right: 8px;
}
.wp-btn-secondary:hover {
    background-color: #eee;
}

@media(max-width: 768px) {
    .woocommerce-order-overview__item {
        border-right: none;
        border-bottom: 1px dashed #d3ced2;
    }
    .woocommerce-order-overview__item:last-child {
        border-bottom: none;
    }
    .wp-checkout-table th {
        width: 45%;
    }
}
</style>

<main class="woocommerce-order-container">

    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger mb-4">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <!-- WP Success Notice -->
    <div class="woocommerce-notice">
        Thank you <b><i><?= html_escape($booking->first_name); ?> </i></b>, Your reservation has been received and confirmed. A breakdown has been dispatched to your email address.
    </div>

    <!-- WP Order Overview Strip -->
    <ul class="woocommerce-order-overview">
        <li class="woocommerce-order-overview__item">
      Booking ID:
            <strong><?= html_escape($booking->booking_id); ?></strong>
        </li>
        <li class="woocommerce-order-overview__item">
            Date:
            <strong><?= date('M d, Y', strtotime($booking->booking_date)); ?></strong>
        </li>
        <li class="woocommerce-order-overview__item">
            Table:
            <strong><?= html_escape($booking->table_number); ?></strong>
        </li>
        <li class="woocommerce-order-overview__item">
            Guests:
            <strong><?= $booking->number_of_guests; ?> People</strong>
        </li>
        <li class="woocommerce-order-overview__item">
            Status:
            <strong style="color: #108510;">Confirmed</strong>
        </li>
    </ul>

    <!-- Section 1: Booking Details Table -->
    <h4 class="wp-section-title">Reservation Details</h4>
    <table class="wp-checkout-table">
        <tbody>
            <tr>
                <th>Booking ID</th>
                <td>#<?= $booking->booking_id; ?></td>
            </tr>
             <tr>
                <th>Member Name</th>
                <td><?= html_escape($booking->first_name); ?> <?= html_escape($booking->last_name); ?></td>
            </tr>
            <tr>
                <th>Booking Date</th>
                <td><?= date('M d, Y', strtotime($booking->booking_date)); ?></td>
            <tr>

                <th>Assigned Table</th>
                <td>Table <?= html_escape($booking->table_number); ?></td>
            </tr>
            <tr>
                <th>Booking Time:</th>
                <td> <?= ucfirst($booking->booking_time); ?></td>
            </tr>
            
            <tr>
                <th>Arrival Time:</th>
                <td><?= html_escape($booking->arrival_time); ?></td>
            </tr>

             <tr>
                <th>No. of Guests</th>
                <td><?= html_escape($booking->number_of_guests); ?></td>
            </tr>
             <tr>
                <th>Email</th>
                <td><?= html_escape($booking->email); ?></td>
            </tr>
             <tr>
                <th>Phone</th>
                <td><?= html_escape($booking->phone); ?></td>
            </tr>
        </tbody>
    </table>

   

    <!-- Before you Arrive Notice Box -->
    <div class="wp-info-notice">
        <strong style="color: #222; display: block; margin-bottom: 8px;">Important Attendance Terms:</strong>
        <ul>
            <li>Please coordinate to arrive at least <strong>10 minutes</strong> ahead of scheduled timing.</li>
            <li>Reservations are strictly held for up to <strong>15 minutes</strong> before status default.</li>
            <li>Present your verification identification number <strong>#<?= html_escape($booking->reservation_no); ?></strong> on entrance.</li>
        </ul>
    </div>

    <!-- Actions Footer -->
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mt-4 pt-3 border-top">
        <div>
            <button onclick="window.print();" class="wp-btn wp-btn-secondary">
                Print Invoice
            </button>
            <?php if(isset($googleCalendarUrl)): ?>
                <a href="<?= $googleCalendarUrl; ?>" target="_blank" class="wp-btn wp-btn-secondary" style="color: #108510 !important;">
                    Add to Google Calendar
                </a>
            <?php endif; ?>
        </div>
        
        <a href="<?= site_url('my_account/bookings'); ?>" class="wp-btn">
            View All Bookings
        </a>
    </div>

</main>

<script>
window.addEventListener('DOMContentLoaded', function(){
    fetch("<?= site_url('bookings/send_confirmation_email/'.$booking->booking_id); ?>");
});
</script>

<?php $this->load->view('layout/footer'); ?>