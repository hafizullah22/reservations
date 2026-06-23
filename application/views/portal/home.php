<?php $this->load->view('layout/header'); ?>
    <!-- 2. HERO SECTION WITH BG OF SEA -->
    <header class="hero-sea-bg text-white">
        <div class="container text-center text-lg-start">
            <div class="row">
                <div class="col-lg-8">
                    <span class="text-uppercase tracking-widest fw-bold mb-2 d-block text-white-50" style="font-size: 11px; letter-spacing: 0.2em;">Established 1912</span>
                    <h1 class="font-serif display-4 fw-bold mb-3">Preserving the Private Seafront Heritage of Clifton Park</h1>
                    <p class="fs-5 text-white-50 mb-4 fw-light max-w-2xl">
                        Dedicated stewardship of communal historic land configurations, beach assets, and neighborhood fiduciary covenants.
                    </p>
                    <div class="d-flex flex-col flex-sm-row justify-content-center justify-content-lg-start gap-3">
                        <a href="#beach" class="btn btn-light px-4 py-2.5 rounded-1 fw-medium shadow-sm">Reserve Beach Space</a>
                        <a href="#governance" class="btn btn-outline-light px-4 py-2.5 rounded-1 fw-medium">View Code & Bylaws</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- 3. THREE COLUMN VIEW -->
    <main class="container my-5 py-3">
        <div class="row g-4">
            
            <!-- Column 1: Bulletins -->
            <div class="col-md-4">
                <div class="feature-card p-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <span class="text-seafoam text-uppercase fw-bold d-block mb-2" style="font-size: 11px; letter-spacing: 0.05em;">Announcements</span>
                        <h2 class="h5 fw-bold text-navy mb-3">Trustee Bulletins</h2>
                        <p class="text-muted small lh-relaxed">
                            Access the latest operational notifications, beach safety adjustments, structural updates, and upcoming board agenda item drafts.
                        </p>
                    </div>
                    <a href="#bulletins" class="text-navy small fw-bold text-decoration-none mt-3">Read Announcements &rarr;</a>
                </div>
            </div>

            <!-- Column 2: Beach Trust -->
            <div class="col-md-4">
                <div class="feature-card p-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <span class="text-seafoam text-uppercase fw-bold d-block mb-2" style="font-size: 11px; letter-spacing: 0.05em;">Property Rights</span>
                        <h2 class="h5 fw-bold text-navy mb-3">Beach Key Distribution</h2>
                        <p class="text-muted small lh-relaxed">
                            Review collection schedules, seasonal wristband allotments, and deed matching processes required to secure access tags for the lower beach perimeter.
                        </p>
                    </div>
                    <a href="#keys" class="text-navy small fw-bold text-decoration-none mt-3">Access Requirements &rarr;</a>
                </div>
            </div>

            <!-- Column 3: Archives -->
            <div class="col-md-4">
                <div class="feature-card p-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <span class="text-seafoam text-uppercase fw-bold d-block mb-2" style="font-size: 11px; letter-spacing: 0.05em;">Public History</span>
                        <h2 class="h5 fw-bold text-navy mb-3">Legal & Historic Ledger</h2>
                        <p class="text-muted small lh-relaxed">
                            Explore foundational covenants, historical land restrictions, architectural protection codes, and archived court documentation dating back over a century.
                        </p>
                    </div>
                    <a href="#records" class="text-navy small fw-bold text-decoration-none mt-3">Download Records &rarr;</a>
                </div>
            </div>

        </div>
    </main>

   <?php $this->load->view('layout/footer'); ?>