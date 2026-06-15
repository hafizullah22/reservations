<?php
$role = $this->session->userdata('role');
$username = $this->session->userdata('username');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School ERP</title>

    <!-- Google Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* ================= GLOBAL RESET ================= */
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f6f9;
            overflow-x: hidden;
        }

        /* ================= LAYOUT WRAPPER ================= */
        .wrapper {
            display: flex;
            position: relative;
            width: 100%;
        }

        /* ================= MAIN SIDEBAR ================= */
        .main-sidebar {
            width: 250px;
            background: #111;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            transition: transform 0.3s ease;
            z-index: 1040;
        }

        .brand-link {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 18px 15px;
            font-weight: 700;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
            color: #fff;
            text-decoration: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }
        .brand-link:hover { color: #fff; }

        .sidebar-menu {
            padding: 12px 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: #c2c7d0;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: #212529;
            color: #fff;
            border-left: 4px solid #0d6efd;
        }

        /* ================= CONTENT WRAPPER ================= */
        .content-wrapper {
            margin-left: 250px;
            width: calc(100% - 250px);
            transition: all 0.3s ease;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ================= TOP HEADER NAV ================= */
        .main-header {
            height: 60px;
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .left-nav {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .sidebar-toggle {
            border: none;
            background: transparent;
            font-size: 22px;
            padding: 0;
            cursor: pointer;
            color: #334155;
            display: flex;
            align-items: center;
        }

        .right-nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-box {
            display: flex;
            align-items: center;
            gap: 12px;
            max-width: 200px;
        }

        .user-box img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
            border: 2px solid #e2e8f0;
        }

        .user-info {
            line-height: 1.3;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ================= LOGOUT BUTTON ================= */
        .logout-btn {
            font-size: 0.85rem;
            font-weight: 600;
            padding: 7px 14px;
            border-radius: 8px;
            transition: all 0.2s ease;
            border: 1px solid #ef4444;
            color: #ef4444;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .logout-btn:hover {
            background: #ef4444;
            color: #fff;
        }

        /* ================= DESKTOP SIDEBAR COLLAPSE ================= */
        @media(min-width: 993px) {
            .sidebar-collapsed .main-sidebar {
                transform: translateX(-250px);
            }
            .sidebar-collapsed .content-wrapper {
                margin-left: 0;
                width: 100%;
            }
        }

        /* ================= RESPONSIVE MOBILE VIEWPORTS ================= */
        @media(max-width: 992px) {
            .main-sidebar {
                transform: translateX(-250px);
            }

            .sidebar-open .main-sidebar {
                transform: translateX(0);
            }

            .content-wrapper {
                margin-left: 0;
                width: 100%;
            }

            .main-header {
                padding: 0 16px;
            }

            .right-nav {
                gap: 12px;
            }

            /* Responsive components for compact views */
            @media (max-width: 576px) {
                .user-info {
                    display: none;
                }
                .logout-btn span {
                    display: none;
                }
                .logout-btn {
                    padding: 8px;
                    border-radius: 50%;
                }
            }

            /* Mobile Drop Overlay */
            .sidebar-backdrop {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background: rgba(15, 23, 42, 0.4);
                backdrop-filter: blur(2px);
                z-index: 1035;
            }

            .sidebar-open .sidebar-backdrop {
                display: block;
            }
        }
    </style>
</head>

<body>

<div class="wrapper" id="app-wrapper">
    <!-- Click-away overlay handler for mobile screens -->
    <div class="sidebar-backdrop" onclick="toggleSidebar()"></div>

    <!-- ================= SIDEBAR NAVIGATION ================= -->
    <aside class="main-sidebar" id="sidebar">
        <a href="#" class="brand-link">
            Clifton Park Trustee
        </a>

        <div class="sidebar-menu">
            <a href="<?php echo site_url('admin');?>" class="active">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

                <a href="<?php echo site_url('admin/users');?>">
                    <i class="bi bi-people-fill"></i> Users
                </a>
                <a href="<?php echo site_url('admin/bookings');?>">
                    <i class="bi bi-person-badge"></i> Bookings
                </a>
                <a href="<?php echo site_url('admin/tables_rules');?>">
                    <i class="bi bi-building"></i> Patio Table Rules
                </a>
                <a href="<?php echo site_url('admin/logout');?>">
                    <i class="bi bi-journal"></i> Logout 
                </a>
               
               
        </div>
    </aside>

    <!-- ================= MAIN PLATFORM WRAPPER ================= -->
    <div class="content-wrapper">
        
        <!-- TOP NAVBAR UTILITY -->
        <nav class="main-header">
            <div class="left-nav">
                <button class="sidebar-toggle" onclick="toggleSidebar()" aria-label="Toggle Sidebar Navigation">
                    <i class="bi bi-list"></i>
                </button>
                <strong class="d-none d-sm-inline-block text-dark">Dashboard</strong>
            </div>

            <div class="right-nav">
                <!-- User Meta Profile Block -->
                <div class="user-box">
                    <img src="https://i.pravatar.cc/100" alt="Avatar">
                    <div class="user-info">
                        <div style="font-size:14px; font-weight:600; color: #1e293b;">
                            <?php echo htmlspecialchars($username ?? 'User'); ?>
                        </div>
                        <small class="text-muted text-capitalize">
                            <?php echo htmlspecialchars(str_replace('_', ' ', $role ?? '')); ?>
                        </small>
                    </div>
                </div>

                <!-- Session Termination -->
                <a class="logout-btn" href="<?php echo site_url('Welcome/logout'); ?>">
                    <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
                </a>
            </div>
        </nav>

        <script>
    function toggleSidebar() {
        const wrapper = document.getElementById('app-wrapper');
        if (window.innerWidth <= 992) {
            wrapper.classList.toggle('sidebar-open');
            wrapper.classList.remove('sidebar-collapsed');
        } else {
            wrapper.classList.toggle('sidebar-collapsed');
            wrapper.classList.remove('sidebar-open');
        }
    }

    window.addEventListener('resize', function() {
        const wrapper = document.getElementById('app-wrapper');
        if (window.innerWidth > 992) {
            wrapper.classList.remove('sidebar-open');
        }
    });
</script>