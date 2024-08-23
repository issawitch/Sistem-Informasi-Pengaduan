<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-body" style="padding: 0px 40px 10px 40px;">
                    <?php foreach ($news as $item) : ?>
                        <h3 class="my-4 text-lg-left">
                            <p class="date"><?= $item['title']; ?></p>
                            <p style="font-size: 12px;"><?php echo date('d-m-Y H:i', strtotime($item['tgl'])) ?> oleh <?php echo $item['author'] ?></p>
                        </h3>
                        <?php if (!empty($item['img'])) : ?>
                            <?php $fotos = explode(',', $item['img']); ?>
                            <?php if (count($fotos) > 1) : ?>
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php foreach ($fotos as $index => $foto) : ?>
                                            <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                                                <img src="/img/news/<?= $foto; ?>" class="d-block mx-auto img-fluid" alt="..." style="max-width: 600px; max-height: 400px; object-fit: cover;">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <ol class="carousel-indicators">
                                        <?php foreach ($fotos as $index => $foto) : ?>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $index; ?>" <?= $index === 0 ? 'class="active"' : ''; ?>></li>
                                        <?php endforeach; ?>
                                    </ol>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon shadow-sm" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon shadow-sm" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            <?php else : ?>
                                <img src="/img/news/<?= $fotos[0]; ?>"  class="d-block mx-auto img-fluid" style="max-width: 600px; max-height: 400px; object-fit: cover; padding-bottom: 5%;">
                            <?php endif; ?>
                        <?php else : ?>
                            <p>No Photo</p>
                        <?php endif; ?>
                        <p><?= $item['body']; ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>