<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Clifton Park Trustees</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>

body{
    font-family: Arial, sans-serif;
    background:#F8F9FA;
}

/* ================= NAVBAR ================= */

.navbar{
    background: #0a2b43;
    box-shadow:0 2px 12px rgba(0,0,0,.05);
    position:sticky;
    top:0;
    z-index:1000;
    height:70px;
    

}

/* desktop menu */
.desktop-menu a{
    text-decoration:none;
    color:#fff;
    font-weight:500;
    margin:0 12px;
}

.desktop-menu a:hover{
    color:#112233;
}

/* hamburger */
.menu-btn{
    font-size:28px;
    cursor:pointer;
    display:none;
}
/* ===== DROPDOWN (DESKTOP) ===== */

.nav-dropdown{
    position: relative;
    display: inline-block;
}

.nav-dropdown-menu{
    position: absolute;
    top: 100%;
    left: 0;
    background: #fff;
    min-width: 200px;
    box-shadow: 0 8px 20px rgba(0,0,0,.08);
    display: none;
    flex-direction: column;
    z-index: 999;
}

.nav-dropdown-menu a{
    padding: 10px 12px;
    margin: 0;
    display: block;
    border-bottom: 1px solid #eee;
}

.nav-dropdown:hover .nav-dropdown-menu{
    display: flex;
}

/* ===== DRAWER DROPDOWN ===== */

.drawer-section{
    border-bottom: 1px solid #eee;
}

.drawer-toggle{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:12px 10px;
    cursor:pointer;
    font-weight:500;
}

.drawer-submenu{
    display:none;
    padding-left:15px;
    background:#f9f9f9;
}

.drawer-submenu a{
    border:none;
}

.drawer-section.active .drawer-submenu{
    display:block;
}
/* ================= DRAWER ================= */

.drawer-overlay{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.5);
    opacity:0;
    visibility:hidden;
    transition:.3s;
    z-index:2000;
}

.drawer-overlay.active{
    opacity:1;
    visibility:visible;
}

.drawer{
    position:fixed;
    top:0;
    left:-300px;
    width:280px;
    height:100vh;
    background:#fff;
    box-shadow:2px 0 20px rgba(0,0,0,.15);
    transition:.3s;
    z-index:2100;
    padding:15px;
    overflow-y:auto;
}

.drawer.active{
    left:0;
}

.drawer a{
    display:block;
    padding:12px 10px;
    text-decoration:none;
    color:#222;
    border-bottom:1px solid #eee;
}

.drawer a:hover{
    background:#f5f5f5;
}

.drawer-header{
    font-weight:bold;
    font-size:18px;
    margin-bottom:10px;
    display:flex;
    justify-content:space-between;
}

.close-btn{
    cursor:pointer;
}

/* ================= HERO ================= */

.hero-sea-bg {
    position: relative;
    background-image: linear-gradient(
        to bottom,
        rgba(17, 34, 51, 0.75),
        rgba(17, 34, 51, 0.5)
    ),
    url('https://cliftonparktrustees.org/wp-content/uploads/2016/12/DSCN1132-scaled.jpg');

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;

    color: #fff;
    text-align: center;
}

/* ================= RESPONSIVE ================= */

@media(max-width:991px){
    .desktop-menu{
        display:none;
    }

    .menu-btn{
        display:block;
    }
}

@media(min-width:992px){
    .drawer,
    .drawer-overlay{
        display:none !important;
    }
}

</style>
</head>

<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar d-flex align-items-center px-3 justify-content-between">

    <div class="fw-bold">
       <img src="https://cliftonparktrustees.org/wp-content/uploads/2016/12/newlogo.png" alt="">
    </div>

    <div class="desktop-menu d-none d-lg-block">

    <a href="#">Home</a>

    <!-- Dropdown 1 -->
    <div class="nav-dropdown">
        <a href="#">About <i class="bi bi-chevron-down"></i></a>
        <div class="nav-dropdown-menu">
            <a href="#">About Us</a>
            <a href="#">History</a>
            <a href="#">Trust Deed 1912</a>
        </div>
    </div>

    <!-- Dropdown 2 -->
    <div class="nav-dropdown">
        <a href="#">Information <i class="bi bi-chevron-down"></i></a>
        <div class="nav-dropdown-menu">
            <a href="#">Financial Information</a>
            <a href="#">Beach Info</a>
            <a href="#">Links</a>
        </div>
    </div>

    <a href="#">Contact</a>
    <a href="#">Reservations</a>

</div>

    <!-- Hamburger -->
    <div class="menu-btn d-lg-none" onclick="openDrawer()" aria-label="Open menu">
        <i class="bi bi-list"></i>
    </div>

</nav>

<!-- ================= OVERLAY ================= -->
<div class="drawer-overlay" id="overlay" onclick="closeDrawer()"></div>

<!-- ================= DRAWER ================= -->
<div class="drawer" id="drawer">

    <div class="drawer-header">
        Menu
        <span class="close-btn" onclick="closeDrawer()">
            <i class="bi bi-x-lg"></i>
        </span>
    </div>

    <a href="#">Home</a>

    <!-- Drawer Dropdown 1 -->
    <div class="drawer-section">
        <div class="drawer-toggle" onclick="toggleDrawerSection(this)">
            About
            <i class="bi bi-chevron-down"></i>
        </div>
        <div class="drawer-submenu">
            <a href="#">About Us</a>
            <a href="#">History</a>
            <a href="#">Trust Deed 1912</a>
        </div>
    </div>

    <!-- Drawer Dropdown 2 -->
    <div class="drawer-section">
        <div class="drawer-toggle" onclick="toggleDrawerSection(this)">
            Information
            <i class="bi bi-chevron-down"></i>
        </div>
        <div class="drawer-submenu">
            <a href="#">Financial Information</a>
            <a href="#">Beach Info</a>
            <a href="#">Links</a>
        </div>
    </div>

    <a href="#">Contact Us</a>
    <a href="#">Reservations</a>
    <a href="#">My Account</a>

</div>

<script>

function openDrawer(){
    document.getElementById("drawer").classList.add("active");
    document.getElementById("overlay").classList.add("active");
    document.body.style.overflow = "hidden";
}

function closeDrawer(){
    document.getElementById("drawer").classList.remove("active");
    document.getElementById("overlay").classList.remove("active");
    document.body.style.overflow = "auto";
}
function toggleDrawerSection(el){
    const section = el.parentElement;
    section.classList.toggle("active");
}

/* ESC close */
document.addEventListener("keydown", function(e){
    if(e.key === "Escape"){
        closeDrawer();
    }
});

</script>

</body>
</html>