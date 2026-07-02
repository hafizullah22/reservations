<?php $this->load->view('layout/header'); ?>

<style>
  .file-item{
    background: #f8f9ff;
    border: 1px solid #e6e9ff;
    transition: all 0.2s ease;
}

.file-item:hover{
    background: #eaf0ff;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0,0,0,0.08);
}

.file-name{
    color: #1f3bb3;
    font-size: 15px;
}

.file-item:hover .file-name{
    color: #0d6efd;
}

.heroo-sea-bg {
    position: relative;

    background-image: linear-gradient(
        to bottom,
        rgba(17, 34, 51, 0.75),
        rgba(17, 34, 51, 0.5)
    ),
    url('https://cliftonparktrustees.org/wp-content/uploads/2012/04/HeaderImage.jpg');

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    min-height: 30vh;   /* better than fixed height */
    display: flex;
    align-items: center;
    justify-content: center;

    color: #fff;
    text-align: center;
}
.contact-card{
    background:#fff;
    border:1px solid #e9ecef;
    border-radius:12px;
    padding:20px;
    text-align:center;
    height:100%;
    transition:all .3s ease;
}

.contact-card:hover{
    transform:translateY(-3px);
    box-shadow:0 6px 18px rgba(0,0,0,.08);
}

.contact-card i{
    font-size:32px;
    color:#0d6efd;
    margin-bottom:10px;
}

.contact-card h5{
    margin-bottom:5px;
    font-weight:600;
}

.contact-card p{
    color:#6c757d;
    margin-bottom:10px;
}

.contact-card a{
    text-decoration:none;
    font-weight:600;
    color:#0d6efd;
}


</style>


<main class="container my-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-primary text-white text-center py-4">
                    <h2 class="mb-0">Contact Us</h2>
                </div>

                <div class="card-body p-4">

                    <div class="alert alert-light border">
                        <p class="mb-0 text-black">
                            The 1912 Clifton Park Trust Deed provided that the Trust's property be
                            administered by five residents of Clifton Park. These individuals,
                            constituting the Clifton Park Board of Trustees, are responsible for
                            maintaining Trust property and overseeing annual assessments.
                        </p>
                    </div>

                    <div class="row g-3 mt-2">

                        <div class="col-md-6">
                            <div class="contact-card">
                                <i class="bi bi-person-badge"></i>
                                <h5>Nancy Graves</h5>
                                <p>Secretary & Treasurer</p>
                                <a href="tel:2169709170">216-970-9170</a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="contact-card">
                                <i class="bi bi-person-badge-fill"></i>
                                <h5>Peggy McCaffrey</h5>
                                <p>President</p>
                                <a href="tel:2168702874">216-870-2874</a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="contact-card">
                                <i class="bi bi-person"></i>
                                <h5>Jim Seibert</h5>
                                <a href="tel:2165334181">216-533-4181</a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="contact-card">
                                <i class="bi bi-person"></i>
                                <h5>Warren Coleman</h5>
                                <a href="tel:2164091126">216-409-1126</a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="contact-card">
                                <i class="bi bi-person"></i>
                                <h5>Mary Ellen Fraser</h5>
                                <a href="tel:2163746863">216-374-6863</a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="contact-card">
                                <i class="bi bi-person"></i>
                                <h5>Ryan Meany</h5>
                                <a href="tel:2162923879">216-292-3879</a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>

   <?php $this->load->view('layout/footer'); ?>