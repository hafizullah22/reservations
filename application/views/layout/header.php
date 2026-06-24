<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Clifton Park Trustees</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>

/* ================= BASE ================= */
body{
    font-family:sans-serif;
    /* background:#F8F9FA; */
    background: #ebeef1;
    margin:0;
}

/* ================= TOP ROW (LOGO BAR) ================= */
.top-bar{
    background:#0a2b43;
    padding:12px 0;
    text-align:center;

   

}

.top-bar img{
    
    object-fit:contain;
}

/* ================= SECOND ROW NAV ================= */
.navbar{
    background:#0a2b43;
    box-shadow:0 2px 12px rgba(0,0,0,.08);
    position:sticky;
    top:0;
    z-index:1000;
    padding:10px 16px;
    
}

/* desktop menu */
.desktop-menu{
    display:flex;
    justify-content:center;
    align-items:center;
    width:100%;
}
.desktop-menu a{
    text-decoration:none;
    color:#fff;
    font-weight:600;
    margin:0 14px;
}



.desktop-menu a:hover{
    color:#cfd8e3;
}

/* hamburger */
.menu-btn{
    font-size:28px;
    cursor:pointer;
    display:none;
    color:#fff;
}

/* ================= DROPDOWN DESKTOP ================= */
.nav-dropdown{
    position:relative;
    display:inline-block;
}

.nav-dropdown-menu{
    position:absolute;
    top:100%;
    left:0;
    background:#fff;
    min-width:200px;
    box-shadow:0 8px 20px rgba(0,0,0,.08);
    display:none;
    flex-direction:column;
    z-index:999;
}

.nav-dropdown-menu a{
    padding:10px 12px;
    margin:0;
    display:block;
    color:#222 !important;
    border-bottom:1px solid #eee;
}

.nav-dropdown:hover .nav-dropdown-menu{
    display:flex;
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

.drawer-header{
    display:flex;
    justify-content:space-between;
    font-weight:bold;
    font-size:18px;
    margin-bottom:10px;
}

.close-btn{
    cursor:pointer;
}

/* drawer dropdown */
.drawer-section{
    border-bottom:1px solid #eee;
}

.drawer-toggle{
    display:flex;
    justify-content:space-between;
    padding:12px 10px;
    cursor:pointer;
    font-weight:500;
}

.drawer-submenu{
    display:none;
    background:#f8f9fa;
    padding-left:12px;
}

.drawer-section.active .drawer-submenu{
    display:block;
}

/* ================= HERO ================= */
.hero-sea-bg{
    position:relative;
    background:
    url('https://cliftonparktrustees.org/wp-content/uploads/2016/12/DSCN1132-scaled.jpg');

    background-size:cover;
    background-position:center;
    min-height:100vh;

    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    text-align:center;
    font-family: playfair Display;
}

/* ================= RESPONSIVE ================= */
@media(max-width:991px){
    .desktop-menu{display:none;}
    .menu-btn{display:block;}
}

@media(min-width:992px){
    .drawer,.drawer-overlay{display:none!important;}
}

</style>
</head>

<body>

<!-- ================= ROW 1: LOGO ================= -->
<div class="top-bar">
    <img src="https://cliftonparktrustees.org/wp-content/uploads/2016/12/newlogo.png" alt="Logo">
</div>

<!-- ================= ROW 2: NAV ================= -->
<nav class="navbar d-flex justify-content-between align-items-center">

    <div class="desktop-menu d-none d-lg-flex align-items-center">

        <a href="<?=site_url('/')?>">Home</a>

        <div class="nav-dropdown">
            <a href="#">About <i class="bi bi-chevron-down"></i></a>
            <div class="nav-dropdown-menu">
                <a href="<?=site_url('portals/trust_deed_1912')?>">Trust Deed 1912</a>
                <a href="<?=site_url('portals/financial')?>">Financial Information</a>
                <a href="<?=site_url('portals/meetings')?>">Minutes of Trustee Meeting</a>
                <a href="<?=site_url('portals/neighbour_map')?>">Neigborhood Map</a>
                <a href="<?=site_url('portals/tax_return')?>">Tax Return</a>
                
            </div>
        </div>

        <div class="nav-dropdown">
            <a href="#">Links <i class="bi bi-chevron-down"></i></a>
            <div class="nav-dropdown-menu">
                <a href="#">Clifton Club</a>
                <a href="#">City of Lakewood</a>
                
            </div>
        </div>
        <div class="nav-dropdown">
            <a href="#">Beach Info <i class="bi bi-chevron-down"></i></a>
            <div class="nav-dropdown-menu">
                <a href="#">Clifton Club</a>
                <a href="#">City of Lakewood</a>
                
            </div>
        </div>

        <a href="#">Contact us</a>

        <div class="nav-dropdown">
            <a href="#">History <i class="bi bi-chevron-down"></i></a>
            <div class="nav-dropdown-menu">
                <a href="#">Clifton Club</a>
                <a href="#">City of Lakewood</a>
                
            </div>
        </div>
        <a href="#">Tennis Program</a>

        <div class="nav-dropdown">
            <a href="#">Reservation <i class="bi bi-chevron-down"></i></a>
            <div class="nav-dropdown-menu">
                <a href="#">Clifton Club</a>
                <a href="#">City of Lakewood</a>
                
            </div>
        </div>

       <a href="<?=site_url('myaccount')?>" class="fs-5">
        <i class="bi bi-person-fill"></i>
    </a>

    </div>

    <!-- hamburger -->
    <div class="menu-btn d-lg-none" onclick="openDrawer()">
        <i class="bi bi-list"></i>
    </div>

</nav>

<!-- ================= DRAWER ================= -->
<div class="drawer-overlay" id="overlay" onclick="closeDrawer()"></div>

<div class="drawer" id="drawer">

    <div class="drawer-header">
        Menu
        <span class="close-btn" onclick="closeDrawer()">
            <i class="bi bi-x-lg"></i>
        </span>
    </div>

    <a href="#">Home</a>

    <div class="drawer-section">
        <div class="drawer-toggle" onclick="toggleDrawerSection(this)">
            About <i class="bi bi-chevron-down"></i>
        </div>
        <div class="drawer-submenu">
            <a href="<?=site_url('portals/trust_deed_1912')?>">Trust Deed 1912</a>
                <a href="<?=site_url('portals/financial')?>">Financial Information</a>
                <a href="<?=site_url('portals/meetings')?>">Minutes of Trustee Meeting</a>
                <a href="<?=site_url('portals/neighbour_map')?>">Neigborhood Map</a>
                <a href="<?=site_url('portals/tax_return')?>">Tax Return</a>
        </div>
    </div>

    <div class="drawer-section">
        <div class="drawer-toggle" onclick="toggleDrawerSection(this)">
            Information <i class="bi bi-chevron-down"></i>
        </div>
        <div class="drawer-submenu">
            <a href="#">Financial Info</a>
            <a href="#">Beach Info</a>
            <a href="#">Links</a>
        </div>
    </div>

    <a href="#">Contact</a>
    <a href="#">Reservations</a>

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
    el.parentElement.classList.toggle("active");
}

document.addEventListener("keydown", function(e){
    if(e.key === "Escape") closeDrawer();
});
</script>

</body>
</html>