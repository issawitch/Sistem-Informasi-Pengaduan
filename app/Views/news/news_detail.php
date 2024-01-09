<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<h2 class="h2"><?= $news['title'] ?></h2>
<div class="mb-5">
    <span><?= $news['created_at'] ?></span>
</div>
<div><?= $news['content'] ?></div>

<?= $this->endSection() ?>