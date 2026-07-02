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
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.file-name{
    color: #1f3bb3;
    font-size:15px;
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
</style>
  <!-- 2. HERO SECTION WITH BG OF SEA -->
    <header class="heroo-sea-bg text-white">
        <div class="container text-center text-lg-start">
            <div class="row">
                <div class="col-lg-12">
           
                    <h1 class=" display-4 fw-bold mb-3 text-center">Minutes of Trustee Meetings</h1>

                  
                </div>
            </div>
        </div>
    </header>

  <main class="container my-5">

    <div class="row g-4">

        <?php foreach ($files_by_year as $year => $files): ?>

            <div class="col-lg-4 col-md-6 col-sm-12">

                <div class="card h-100 shadow-sm border-0">

                    <!-- Year Header -->
                    <div class="card-header bg-white border-bottom">
                        <h5 class="mb-0 fw-bold text-black text-center">
                            <?= $year ?>
                        </h5>
                    </div>

                    <div class="card-body">

                        <?php foreach ($files as $file): ?>

                            <a href="<?= base_url($file->file_path) ?>"
                               target="_blank"
                               class="file-item d-flex align-items-center justify-content-between text-decoration-none p-2 mb-2 rounded">

                                <div class="d-flex align-items-center gap-2">

                                    <i class="bi bi-file-earmark-text text-primary fs-5"></i>

                                    <span class="file-name fw-semibold">
                                        <?= $file->file_name ?>
                                    </span>

                                </div>

                                <i class="bi bi-download text-muted"></i>

                            </a>

                        <?php endforeach; ?>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</main>

   <?php $this->load->view('layout/footer'); ?>