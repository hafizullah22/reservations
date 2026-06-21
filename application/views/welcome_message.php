<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clifton Park Trustees | Home</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F8F9FA;
            color: #212529;
        }
        .font-serif {
            font-family: 'Cinzel', serif;
        }
        .bg-navy { background-color: #112233; }
        .text-navy { color: #112233; }
        .text-seafoam { color: #557A8A; }
        
        /* Hero Sea Background Custom Setup */
        .hero-sea-bg {
            position: relative;
            background-image: linear-gradient(to bottom, rgba(17, 34, 51, 0.75), rgba(17, 34, 51, 0.5)), 
                              url('https://images.unsplash.com/photo-1505118380757-91f5f5632de0?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 8rem 0;
        }

        /* Nav & Grid Link Styling */
        .nav-link-custom {
            color: #495057;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s ease;
        }
        .nav-link-custom:hover {
            color: #112233;
        }
        .feature-card {
            background: #ffffff;
            border: 1px solid #E9ECEF;
            border-radius: 4px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.01);
        }
    </style>
</head>
<body>

    <!-- 1. NAVIGATION MENU -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-b py-3 sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex flex-column" href="#">
                <span class="font-serif fw-bold text-navy h4 mb-0">CLIFTON PARK</span>
                <span class="text-seafoam text-uppercase fw-bold opacity-75" style="font-size: 10px; letter-spacing: 0.15em;">Trustees & Beach Trust</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                <div class="d-flex align-items-center gap-4">
                    <a href="#" class="nav-link-custom text-navy fw-semibold">Overview</a>
                    <a href="#governance" class="nav-link-custom">Governance</a>
                    <a href="#beach" class="nav-link-custom">Beach Trust</a>
                    <a href="#records" class="nav-link-custom">Records</a>
                    <a href="#portal" class="btn btn-sm btn-outline-dark rounded-1 px-3 text-uppercase fw-bold tracking-wider" style="font-size: 11px;">Resident Portal</a>
                </div>
            </div>
        </div>
    </nav>

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

    <!-- 4. FOOTER -->
    <footer class="bg-navy text-white-50 py-5 mt-5 border-top">
        <div class="container">
            <div class="row g-4 text-center text-md-start">
                <div class="col-md-6">
                    <span class="font-serif text-white h5 fw-bold d-block mb-2">Clifton Park Trustees</span>
                    <p class="small text-muted lh-base mb-0 pe-md-5">
                        Fiduciary administrators managing communal property infrastructure and the historical beach trust grid within Lakewood, Ohio.
                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="text-white text-uppercase fw-semibold small tracking-wider mb-3" style="font-size: 11px;">Navigation Links</h4>
                    <ul class="list-unstyled small vstack gap-2 mb-0">
                        <li><a href="#" class="text-white-50 text-decoration-none">Overview Dashboard</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Meeting Minutes</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Financial Statements</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4 class="text-white text-uppercase fw-semibold small tracking-wider mb-3" style="font-size: 11px;">Inquiries</h4>
                    <p class="small text-muted lh-base mb-0">
                        Official escrow requests or property boundary queries should be logged securely via the internal panel system.
                    </p>
                </div>
            </div>
            <div class="row mt-4 pt-4 border-top border-secondary-subtle">
                <div class="col text-center text-muted" style="font-size: 11px;">
                    &copy; 2026 Clifton Park Trustees. All Rights Reserved. National Register of Historic Places.
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>