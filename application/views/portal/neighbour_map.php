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
.full-image{
    width: 100%;
    height: auto;
    display: block;
    border-radius: 0; /* optional */
}

.full-image-wrapper{
    overflow: hidden;
}
</style>
  <!-- 2. HERO SECTION WITH BG OF SEA -->
    <header class="heroo-sea-bg text-white">
        <div class="container text-center text-lg-start">
            <div class="row">
                <div class="col-lg-12">
           
                    <h1 class=" display-4 fw-bold mb-3 text-center">Neighborhood Map</h1>

                  
                </div>
            </div>
        </div>
    </header>

<main class="container-fluid p-0 my-1">

    <?php foreach ($files as $file): ?>

        <div class="full-image-wrapper mb-3">

            <img src="<?= base_url($file->file_path) ?>"
                 alt=""
                 class="img-fluid w-100 full-image">

        </div>

    <?php endforeach; ?>

</main>

   <?php $this->load->view('layout/footer'); ?>