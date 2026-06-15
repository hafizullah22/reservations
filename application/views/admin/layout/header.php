<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        /* Desktop sidebar */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            background: #111827;
            color: #fff;
            top: 0;
            left: 0;
            padding-top: 10px;
            transition: all 0.3s;
            z-index: 1000;
        }

        .sidebar a {
            color: #cbd5e1;
            display: block;
            padding: 12px 18px;
            text-decoration: none;
            font-size: 15px;
        }

        .sidebar a:hover {
            background: #1f2937;
            color: #fff;
        }

        .main {
            margin-left: 260px;
            padding: 20px;
        }

        .topbar {
            background: #fff;
            padding: 10px 15px;
            border-radius: 10px;
            border: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Hide sidebar on mobile */
        @media (max-width: 991px) {
            .sidebar {
                display: none;
            }

            .main {
                margin-left: 0;
                padding: 15px;
            }
        }
    </style>
</head>

<body>

<!-- ================= DESKTOP SIDEBAR ================= -->
<div class="sidebar d-none d-lg-block">
    <h4 class="text-center py-3">Reservation Admin</h4>

    <a href="<?= site_url('admin') ?>">
        <i class="fa fa-chart-line"></i> Dashboard
    </a>

    <a href="<?= site_url('admin/bookings') ?>">
        <i class="fa fa-calendar"></i> Bookings
    </a>

    <a href="<?= site_url('admin/users') ?>">
        <i class="fa fa-users"></i> Customers
    </a>

    <a href="<?= site_url('admin/tables_rules') ?>">
        <i class="fa fa-table"></i> Patio Tables Rules
    </a>

    <a href="<?= site_url('admin/logout') ?>">
        <i class="fa fa-sign-out"></i> Logout
    </a>
</div>

<!-- ================= MOBILE TOP NAV ================= -->
<nav class="navbar navbar-light bg-white d-lg-none px-3 shadow-sm">
    <button class="btn btn-outline-dark" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
        <i class="fa fa-bars"></i>
    </button>

    <span class="fw-bold">Admin Panel</span>
</nav>

<!-- ================= MOBILE SIDEBAR (OFFCANVAS) ================= -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar">

    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Reservation Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body p-0">

        <a class="d-block p-3 border-bottom" href="<?= site_url('admin') ?>">
            <i class="fa fa-chart-line"></i> Dashboard
        </a>

        <a class="d-block p-3 border-bottom" href="<?= site_url('admin/bookings') ?>">
            <i class="fa fa-calendar"></i> Bookings
        </a>

        <a class="d-block p-3 border-bottom" href="<?= site_url('admin/customers') ?>">
            <i class="fa fa-users"></i> Customers
        </a>

        <a class="d-block p-3 border-bottom" href="<?= site_url('admin/tables_rules') ?>">
            <i class="fa fa-table"></i> Patio Tables Rules
        </a>

        <a class="d-block p-3 text-danger" href="<?= site_url('admin/logout') ?>">
            <i class="fa fa-sign-out"></i> Logout
        </a>

    </div>

</div>


