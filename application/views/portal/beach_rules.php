<?php $this->load->view('layout/header'); ?>

<style>
.page-header{
    background:linear-gradient(135deg,#0d6efd,#0b5ed7);
    color:#fff;
    border-radius:20px;
    padding:50px 30px;
    text-align:center;
    margin-bottom:30px;
    box-shadow:0 10px 30px rgba(13,110,253,.15);
}

.page-header h1{
    font-weight:700;
    margin-bottom:10px;
}

.page-header p{
    margin:0;
    opacity:.9;
}

.resource-card{
    background:#fff;
    border:1px solid #e9ecef;
    border-radius:18px;
    padding:30px;
    height:100%;
    transition:.3s ease;
    text-align:center;
    position:relative;
    overflow:hidden;
}

.resource-card:hover{
    transform:translateY(-5px);
    box-shadow:0 12px 30px rgba(0,0,0,.08);
    border-color:#0d6efd;
}

.resource-icon{
    width:70px;
    height:70px;
    margin:0 auto 20px;
    border-radius:50%;
    background:rgba(13,110,253,.1);
    display:flex;
    align-items:center;
    justify-content:center;
}

.resource-icon i{
    font-size:32px;
    color:#0d6efd;
}

.resource-card h5{
    font-weight:700;
    margin-bottom:12px;
}

.resource-card p{
    color:#6c757d;
    font-size:.95rem;
    margin-bottom:20px;
}

.btn-resource{
    border-radius:50px;
    padding:10px 22px;
    font-weight:600;
}

.section-wrapper{
    background:#fff;
    border-radius:20px;
    padding:30px;
    box-shadow:0 4px 20px rgba(0,0,0,.05);
}
</style>

<main class="container py-5">

    <!-- Hero Header -->
    <!-- <div class="page-header">
        <h1>Beach Information</h1>
        <p>Important documents, rules, and reservation information for Clifton Park Beach House.</p>
    </div> -->

    <div class="section-wrapper">

        <div class="row g-4">

            <!-- Rules -->
            <div class="col-md-12">
                <div class="resource-card">
                    <div class="resource-icon">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>

                    <h5>Beatch Rules</h5>

                    <p>
                        Review all regulations, policies, and guidelines before making a reservation.
                    </p>

                    <a href="https://cliftonparktrustees.org/wp-content/uploads/2026/03/Beach-House-Rules-2026.pdf"
                       target="_blank"
                       class="btn btn-primary btn-resource">
                        <i class="bi bi-file-pdf me-2"></i>View PDF
                    </a>
                </div>
            </div>

           

        </div>

    </div>

</main>

<?php $this->load->view('layout/footer'); ?>