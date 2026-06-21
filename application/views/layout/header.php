<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clifton Park</title>

    <!-- Google Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background:#f5f6f8;
            color:#333;
        }

        .top-header{
            background:#0f4c81;
            color:#fff;
            padding:8px 0;
            font-size:14px;
        }

        .site-header{
            background:#fff;
            box-shadow:0 2px 10px rgba(0,0,0,.08);
        }

        .logo-area{
            padding:15px 0;
        }

        .site-title{
            font-size:28px;
            font-weight:700;
            color:#0f4c81;
            margin:0;
        }

        .site-subtitle{
            font-size:14px;
            color:#666;
        }

        .navbar-custom{
            background:#0f4c81;
        }

        .navbar-custom .nav-link{
            color:#fff !important;
            font-weight:500;
            padding:15px 18px !important;
        }

        .navbar-custom .nav-link:hover{
            background:rgba(255,255,255,.15);
        }

        .dropdown-menu{
            border:none;
            box-shadow:0 5px 20px rgba(0,0,0,.1);
        }

        .section-title{
            margin-bottom:25px;
            font-weight:700;
            color:#0f4c81;
        }
    </style>
</head>

<body>

<!-- TOP BAR -->
<div class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                Community Trust Information Portal
            </div>

            <div class="col-md-6 text-md-end">
                <i class="fa fa-envelope"></i>
                info@example.com
            </div>
        </div>
    </div>
</div>

<!-- LOGO AREA -->
<header class="site-header">
    <div class="container">
        <div class="logo-area">

            <div class="row align-items-center">

                <div class="col-md-8">
                    <h1 class="site-title">
                        Clifton Park Trustees
                    </h1>

                    <div class="site-subtitle">
                        Preserving Community Assets Since 1912
                    </div>
                </div>

                <div class="col-md-4 text-md-end">
                    <a href="<?= base_url('contact'); ?>"
                       class="btn btn-primary">
                        Contact Us
                    </a>
                </div>

            </div>

        </div>
    </div>
</header>

<!-- NAVIGATION -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
    <div class="container">

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainMenu">

            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link"
                       href="<?= base_url(); ?>">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="<?= base_url('about'); ?>">
                        About CPT
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="<?= base_url('minutes'); ?>">
                        Meeting Minutes
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="<?= base_url('beach-information'); ?>">
                        Beach Information
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="<?= base_url('news'); ?>">
                        News
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="<?= base_url('contact'); ?>">
                        Contact
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>