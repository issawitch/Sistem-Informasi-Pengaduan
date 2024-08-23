<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div>
        <h1 class="h3 mb-4 text-gray-800">Jenis-jenis Kekerasan</h1>
    </div>

    <div class="card mb-4 py-3 border-left-primary shadow">
        <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center">
                <img src="/img/Worries.png" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                    <h5 class="card-title text-gray-900">Kekerasan Seksual</h5><hr class="sidebar-divider d-none d-md-block">
                    <p class="card-text text-gray-800">Kekerasan seksual itu nggak cuma soal disentuh atau dipaksa berhubungan seks. 
                        Lebih luas dari itu, termasuk dipaksa melakukan hal yang berhubungan sama seks yang nggak kamu mau, 
                        diancam, dibohongi, sampai <b>dihina atau dilecehkan secara seksual</b>. Contohnya kayak <i>catcalling</i>, 
                        yaitu digoda-godain dengan kata-kata tidak senonoh. 
                        <br><br>Seringnya, pelaku ngelakuin ini karena mereka merasa punya power lebih tinggi. 
                        Dampaknya bisa parah, bikin kamu down, sedih, dan susah ngelupain kejadian itu. 
                        Parahnya lagi, bisa ganggu kesehatan mental dan fisik kamu.
                        Pokoknya, kekerasan seksual itu <b>SALAH BANGET!</b>  Korban nggak salah sama sekali.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4 py-3 border-left-secondary shadow">
        <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center">
                <img src="/img/girl-with-social-phobia.png" class="img-fluid rounded-start object-fit-fill">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                    <h5 class="card-title text-gray-900">Perundungan</h5><hr class="sidebar-divider d-none d-md-block">
                    <p class="card-text text-gray-800">Perundungan alias <i>bullying</i> itu kayak ngerjain orang lain dengan cara yang nyakitin, 
                        baik secara fisik, kata-kata, maupun ngeganggu mental mereka. Bisa dengan cara <b>ngata-ngatain, ngeledekin, nimpukin, 
                        ngedorong</b>, sampe <b>ngambil barang orang lain, bahkan ngeledekin penampilan atau hina-dina mereka di media sosial</b>.
                        <br><br>Pelaku perundungan biasanya ngelakuin ini karena ngerasa lebih kuat atau punya power lebih tinggi daripada korbannya. 
                        Dampaknya bisa parah banget, bikin korban down, trauma, dan susah ngelupain kejadian itu. 
                        Parahnya lagi, perundungan bisa ganggu kesehatan mental dan fisik korban, bahkan ngebuat mereka 
                        kehilangan kesempatan buat hidup normal, kayak nggak mau sekolah, nggak mau kerja, atau ngerasa nggak berharga.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4 py-3 border-left-success shadow">
        <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center">
                <img src="/img/angry-man.png" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-gray-900">Intoleransi</h5><hr class="sidebar-divider d-none d-md-block">
                    <p class="card-text text-gray-800"><b>Bayangin kamu hidup di dunia yang penuh warna, tapi ada beberapa orang yang 
                        pengen semuanya berwarna sama.</b> Itulah intoleransi. Intoleransi itu kayak nggak mau nerima perbedaan, kayak suku, 
                        agama, ras, budaya, atau pilihan hidup orang lain. Orang yang intoleran biasanya ngerasa lebih baik daripada yang 
                        lain dan nganggap pendapat mereka yang paling bener.
                        <br><br>Dampak intoleransi itu parah banget. Bisa bikin perpecahan, konflik, bahkan kekerasan. 
                        Orang yang jadi korban intoleransi bisa ngerasa tertekan, dihina, dan nggak aman. Parahnya lagi, intoleransi bisa 
                        nghambat kemajuan bangsa karena ngehambat pertukaran ide dan kerjasama.</p>
                </div>
            </div>
        </div>
    </div>


    <?= $this->endSection(); ?>