<?php $this->load->view('layout/header'); ?>

<style>
    
    .stats-bar {
         background: #dcebf5;
        border-radius: 20px;
        /* padding: 20px 10px; */
        margin-top: -50px;
        position: relative;
        z-index: 100;

    }

    .stat-item {
        padding: 15px;
        border-right: 1px solid #737475;
    }

    .stat-item h2 {
        font-size: 2rem;
        margin-bottom: 5px;
    }

    .stat-item span {
        color: #0a0b0c;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .stats-bar {
            margin-top: -40px;
        }

        .stat-item {
            border-right: none;
            border-bottom: 1px solid #e9ecef;
        }
    }
</style>

<!-- =========================================
     HERO SECTION
========================================= -->
<header class="hero-sea-bg text-white">
    <div class="container text-center text-lg-start">
        <div class="row">
            <div class="col-lg-12">
                <br><br>

                <h1 class="display-4 fw-bold mb-3 text-center">
                    TRUSTEES OF LAND RESERVED FOR PARK PURPOSES
                </h1>
            </div>
        </div>
    </div>
</header>

<!-- =========================================
     STATISTICS BAR
========================================= -->
<div class="container-fluid position-relative">
    <div class="stats-bar shadow-lg">
        <div class="row g-0 text-center">

            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <h2 class="fw-bold text-primary mb-1">504</h2>
                    <span>Club Member</span>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <h2 class="fw-bold text-success mb-1">51</h2>
                    <span>Reservation Table</span>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <h2 class="fw-bold text-warning mb-1">02</h2>
                    <span>Tennis Court</span>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="stat-item border-0">
                    <h2 class="fw-bold text-danger mb-1">100+</h2>
                    <span>Years History</span>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- =========================================
     MAIN CONTENT
========================================= -->
<main class="container py-5">

    <!-- FEATURE CARDS -->
    <div class="row g-4 mb-4">

        <!-- Administration -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100 feature-card">
                <div class="card-body p-4">

                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-box bg-primary-subtle me-3">
                            <i class="bi bi-megaphone-fill text-primary"></i>
                        </div>

                        <h5 class="fw-bold mb-0">
                            Clifton Park Administration
                        </h5>
                    </div>

                    <p class="text-muted">
                        There are three groups of Members that can use the common
                        property of the Clifton Park Trust...
                    </p>

                    <a href="#bulletins" class="btn btn-outline-primary btn-sm rounded-pill">
                        View Details
                    </a>

                </div>
            </div>
        </div>

        <!-- History -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100 feature-card">
                <div class="card-body p-4">

                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-box bg-success-subtle me-3">
                            <i class="bi bi-key-fill text-success"></i>
                        </div>

                        <h5 class="fw-bold mb-0">
                            Pre-Development History
                        </h5>
                    </div>

                    <p class="text-muted">
                        The first private owners of Clifton Park were Connecticut
                        real estate investors...
                        The first private owners of Clifton Park were Connecticut
                        real estate investors...
                    </p>

                    <a href="#keys" class="btn btn-outline-success btn-sm rounded-pill">
                        Learn More
                    </a>

                </div>
            </div>
        </div>

        <!-- Beach Info -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100 feature-card">
                <div class="card-body p-4">

                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-box bg-warning-subtle me-3">
                            <i class="bi bi-folder2-open text-warning"></i>
                        </div>

                        <h5 class="fw-bold mb-0">
                            Beach Information
                        </h5>
                    </div>

                    <p class="text-muted">
                        Clifton Beach is maintained by the Clifton Park Trustees...
                    </p>

                    <a href="#records" class="btn btn-outline-warning btn-sm rounded-pill">
                        Browse Records
                    </a>

                </div>
            </div>
        </div>

    </div>

    <!-- CONTENT ROW -->
    <div class="row g-4">

        <!-- Meetings -->
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm h-100 feature-card">
                <div class="card-header bg-white border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">

                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-calendar-event me-2 text-primary"></i>
                            Latest Meetings
                        </h5>

                        <a href="#" class="btn btn-sm btn-primary">
                            View All
                        </a>

                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Meeting Title</th>
                                    <th width="120">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                               

                                <tr>
                                    <td>May 15, 2026</td>
                                    <td>Beach Maintenance Review</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            View
                                        </a>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>May 15, 2026</td>
                                    <td>Beach Maintenance Review</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            View
                                        </a>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>May 15, 2026</td>
                                    <td>Beach Maintenance Review</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

        </div>

        <!-- Reservation -->
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm h-100 overflow-hidden">

                <div class="card-header bg-secondary text-white py-4 text-center border-0">
                    <i class="bi bi-calendar2-check display-5"></i>

                    <h4 class="fw-bold mt-2 mb-0">
                        Table Reservation
                    </h4>
                </div>

                <div class="card-body d-flex flex-column justify-content-center text-center p-4">

                    <p class="text-muted mb-4">
                        Reserve a table for upcoming trustee meetings,
                        community events, and special gatherings.
                    </p>

                    <a href="<?= base_url('reservation') ?>"
                       class="btn btn-success btn-lg rounded-pill">
                        <i class="bi bi-calendar-plus me-2"></i>
                        Book a Table
                    </a>

                </div>

            </div>

        </div>


   <section class="py-5">

        <div class="text-center mb-5">
            <h2 class="fw-bold">
                <i class="bi bi-people-fill text-primary me-2"></i>
                Board of Trustees
            </h2>

            <p class="text-muted">
                Meet the dedicated leaders serving the Clifton Park community.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">

                        <img src="https://via.placeholder.com/150"
                             class="rounded-circle shadow-sm mb-3"
                             width="120"
                             height="120"
                             alt="President">

                        <h5 class="fw-bold mb-1">John Anderson</h5>

                        <span class="badge bg-primary mb-3">
                            President
                        </span>

                        <p class="text-muted small">
                            Oversees trustee operations and community governance.
                        </p>

                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">

                        <img src="https://via.placeholder.com/150"
                             class="rounded-circle shadow-sm mb-3"
                             width="120"
                             height="120"
                             alt="Vice President">

                        <h5 class="fw-bold mb-1">Sarah Mitchell</h5>

                        <span class="badge bg-success mb-3">
                            Vice President
                        </span>

                        <p class="text-muted small">
                            Assists leadership and coordinates special projects.
                        </p>

                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">

                        <img src="https://via.placeholder.com/150"
                             class="rounded-circle shadow-sm mb-3"
                             width="120"
                             height="120"
                             alt="Secretary">

                        <h5 class="fw-bold mb-1">Michael Roberts</h5>

                        <span class="badge bg-warning text-dark mb-3">
                            Secretary
                        </span>

                        <p class="text-muted small">
                            Maintains records, meeting minutes and communications.
                        </p>

                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">

                        <img src="https://via.placeholder.com/150"
                             class="rounded-circle shadow-sm mb-3"
                             width="120"
                             height="120"
                             alt="Treasurer">

                        <h5 class="fw-bold mb-1">David Wilson</h5>

                        <span class="badge bg-danger mb-3">
                            Treasurer
                        </span>

                        <p class="text-muted small">
                            Responsible for financial planning and reporting.
                        </p>

                    </div>
                </div>
            </div>

        </div>

    </section>


    </div>

</main>



<?php $this->load->view('layout/footer'); ?>