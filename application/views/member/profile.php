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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Inter', Arial;
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
            color: #080808;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s ease;
            font-size:16px;
           
            
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
                
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
         <div class="d-flex align-items-center gap-4">

            <a href="#" class="nav-link-custom text-navy fw-semibold">Home</a>

            <!-- About Us Dropdown -->
            <div class="dropdown">
                <a href="#" class="nav-link-custom dropdown-toggle"
                data-bs-toggle="dropdown"
                aria-expanded="false">
                    About Us
                </a>
                <ul class="dropdown-menu shadow-sm border-0">
                    <li><a class="dropdown-item" href="#history">History</a></li>
                    <li><a class="dropdown-item" href="#board">Board of Trustees</a></li>
                    <li><a class="dropdown-item" href="#governance">Governance</a></li>
                    <li><a class="dropdown-item" href="#mission">Mission & Vision</a></li>
                    <li><a class="dropdown-item" href="#contact">Contact Us</a></li>
                </ul>
            </div>

            <!-- About Us Dropdown -->
            <div class="dropdown">
                <a href="#" class="nav-link-custom dropdown-toggle"
                data-bs-toggle="dropdown"
                aria-expanded="false">
                   Links
                </a>
                <ul class="dropdown-menu shadow-sm border-0">
                    <li><a class="dropdown-item" href="#history">History</a></li>
                    <li><a class="dropdown-item" href="#board">Board of Trustees</a></li>
               
                </ul>
            </div>
            <!-- About Us Dropdown -->
            <div class="dropdown">
                <a href="#" class="nav-link-custom dropdown-toggle"
                data-bs-toggle="dropdown"
                aria-expanded="false">
                   Beach Info
                </a>
                <ul class="dropdown-menu shadow-sm border-0">
                    <li><a class="dropdown-item" href="#history">History</a></li>
                    <li><a class="dropdown-item" href="#board">Board of Trustees</a></li>
               
                </ul>
            </div>


            <a href="#beach" class="nav-link-custom">Contact Us</a>

             <!-- About Us Dropdown -->
            <div class="dropdown">
                <a href="#" class="nav-link-custom dropdown-toggle"
                data-bs-toggle="dropdown"
                aria-expanded="false">
                  History
                </a>
                <ul class="dropdown-menu shadow-sm border-0">
                    <li><a class="dropdown-item" href="#history">History</a></li>
                    <li><a class="dropdown-item" href="#board">Board of Trustees</a></li>
               
                </ul>
            </div>

            <a href="#records" class="nav-link-custom">Tennis Program</a>

             <!-- About Us Dropdown -->
            <div class="dropdown">
                <a href="#" class="nav-link-custom dropdown-toggle"
                data-bs-toggle="dropdown"
                aria-expanded="false">
                   Reservations
                </a>
                <ul class="dropdown-menu shadow-sm border-0">
                    <li><a class="dropdown-item" href="#history">History</a></li>
                    <li><a class="dropdown-item" href="#board">Board of Trustees</a></li>
               
                </ul>
            </div>

        <a href="<?=site_url('auth/myaccount')?>" style="font-size:25px; color:#000;">
            <i class="bi bi-person-lock"></i>
        </a>

        </div>
        </div>
    </nav>

    
<!-- ================= USER PROFILE PAGE ================= -->
<main class="container my-5 py-3">
    <div class="row g-4">

        <!-- LEFT SIDEBAR MENU -->
<div class="col-md-3">

    <div class="list-group shadow-sm rounded-3">

        <a href="#dashboard" class="list-group-item list-group-item-action active">
            Dashboard
        </a>

        <a href="#addresses" class="list-group-item list-group-item-action text-black">
            Addresses
        </a>

        <a href="#account" class="list-group-item list-group-item-action text-black">
            Account details
        </a>

        <a href="#bookings" class="list-group-item list-group-item-action text-black">
            Bookings
        </a>

        <a href="#logout" class="list-group-item list-group-item-action text-black">
            Log out
        </a>

    </div>

</div>

        <!-- RIGHT CONTENT AREA -->
        <div class="col-md-9">

            <!-- PROFILE CARD -->
            <div class="feature-card p-4 mb-4">


<h2 class="h5 fw-bold text-navy mb-3">
    Welcome, <?= $user['first_name']; ?>
</h2>
                <p class="text-muted small">
                    From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.
                </p>
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