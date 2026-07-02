<?php $this->load->view('layout/header'); ?>

<style>
 
.gallery-item{
    display:block;
    overflow:hidden;
    border-radius:18px;
}

.gallery-item img{
    width:100%;
    height:260px;
    object-fit:cover;
    transition:all .4s ease;
}

.gallery-item:hover img{
    transform:scale(1.08);
}

.gallery-title{
    text-align:center;
    margin-bottom:40px;
}
</style>



<!-- Gallery Section -->
<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Photo Gallery</h2>
            <p class="text-muted">Explore memories and highlights from Clifton Park Beach.</p>
            <p>Here are a select group of images from various historical archives of the Clifton Park Beach area.
</p><p>
Just click or tap any image to enlarge, and tap the large image to see the next image.</p>
        </div>

        <div class="row g-4">
    <?php foreach($files as $image){ ?>
        <div class="col-md-3 col-sm-6">
            <a href="<?= base_url($image->file_path); ?>" class="gallery-item">
                <img src="<?= base_url($image->file_path); ?>"
                     class="img-fluid"
                     alt="">
            </a>
        </div>
    <?php } ?>
</div>

    </div>
</section>

<link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<script>
const lightbox = GLightbox({
    selector: '.gallery-item'
});
</script>

   <?php $this->load->view('layout/footer'); ?>