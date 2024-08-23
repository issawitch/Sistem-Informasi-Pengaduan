<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <h1 class="h3 mb-0 text-gray-800">Deteksi Dini</h1>
    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod tempora inventore quis maiores odit assumenda optio sequi magni dolorum asperiores quibusdam similique delectus hic, quaerat nobis veritatis sed ipsum qui.</p>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Kuesioner</h1>
                                </div>
                                <form class="user text-gray-900" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <label for="pertanyaan1">
                                        Apakah kamu pernah mengalami situasi di mana seseorang dengan sengaja membuat kamu merasa
                                        terancam, takut, atau sedih berulang kali?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer1" id="question1Ya" class="form-check-input" value="1">
                                        <label class="form-check-label" for="question1Ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer1" id="question1Tidak" class="form-check-input" value="0">
                                        <label class="form-check-label" for="question1Tidak">Tidak</label>
                                    </div><br><br>
                                    <label for="pertanyaan2">
                                        2. Apakah kamu pernah mendapat pukulan, tendangan, atau kekerasan fisik
                                        lainnya di sekolah?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer2" id="question2Ya" class="form-check-input" value="1">
                                        <label class="form-check-label" for="question2Ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer2" id="question2Tidak" class="form-check-input" value="0">
                                        <label class="form-check-label" for="question2Tidak">Tidak</label>
                                    </div><br>
                                    <label for="pertanyaan3">Kamu makan?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer3" id="question3Ya" class="form-check-input" value="1">
                                        <label class="form-check-label" for="question3Ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer3" id="question3Tidak" class="form-check-input" value="0">
                                        <label class="form-check-label" for="question3Tidak">Tidak</label>
                                    </div><br>
                                    <label for="pertanyaan4">Kamu makan?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer4" id="question4Ya" class="form-check-input" value="1">
                                        <label class="form-check-label" for="question4Ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer4" id="question4Tidak" class="form-check-input" value="0">
                                        <label class="form-check-label" for="question4Tidak">Tidak</label>
                                    </div><br>
                                    <label for="pertanyaan5">Kamu makan?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer5" id="question5Ya" class="form-check-input" value="1">
                                        <label class="form-check-label" for="question1Ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer5" id="question5Tidak" class="form-check-input" value="0">
                                        <label class="form-check-label" for="question5Tidak">Tidak</label>
                                    </div><br>
                                    <label for="pertanyaan6">Kamu makan?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer6" id="question6Ya" class="form-check-input" value="1">
                                        <label class="form-check-label" for="question6Ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer6" id="question6Tidak" class="form-check-input" value="0">
                                        <label class="form-check-label" for="question6Tidak">Tidak</label>
                                    </div><br>
                                    <label for="pertanyaan7">Kamu makan?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer7" id="question7Ya" class="form-check-input" value="1">
                                        <label class="form-check-label" for="question7Ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer7" id="question7Tidak" class="form-check-input" value="0">
                                        <label class="form-check-label" for="question7Tidak">Tidak</label>
                                    </div><br>
                                    <label for="pertanyaan8">Kamu makan?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer8" id="question8Ya" class="form-check-input" value="1">
                                        <label class="form-check-label" for="question8Ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer8" id="question8Tidak" class="form-check-input" value="0">
                                        <label class="form-check-label" for="question8Tidak">Tidak</label>
                                    </div><br>
                                    <label for="pertanyaan9">Kamu makan?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer9" id="question9Ya" class="form-check-input" value="1">
                                        <label class="form-check-label" for="question9Ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer9" id="question9Tidak" class="form-check-input" value="0">
                                        <label class="form-check-label" for="question9Tidak">Tidak</label>
                                    </div><br>
                                    <label for="pertanyaan10">Kamu makan?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer10" id="question10Ya" class="form-check-input" value="1">
                                        <label class="form-check-label" for="question10Ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="answer10" id="question10Tidak" class="form-check-input" value="0">
                                        <label class="form-check-label" for="question1T0idak">Tidak</label>
                                    </div><br>
                                    <hr>
                                    <button type="button" id="submitBtn" class="btn btn-primary btn-user btn-block">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal untuk menampilkan hasil kuesioner -->
    <div class="modal" tabindex="-1" role="dialog" id="resultModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hasil Kuesioner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="messageText" style="text-align: center; font-size: 18px;"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeBtn" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a type="button" id="customBtn" class="btn btn-secondary" style="display: none;"
                    href="<?= base_url('form_aduan')?>">Buat Pengaduan</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#submitBtn').click(function() {
            let totalScore = 0;
            // Sesuaikan jumlah pertanyaan dengan loop berikut
            for (let i = 1; i <= 10; i++) {
                let answerKey = 'answer' + i;
                let answer = $('input[name=' + answerKey + ']:checked').val();
                if (answer === '1') {
                    totalScore += 1;
                }
            }

            // Menampilkan pesan tengah berdasarkan skor di dalam modal
            let message;
            if (totalScore >= 7) {
                message = 'Skor Anda adalah ' + totalScore + '. Anda luar biasa, tetap semangat!';
                $('#closeBtn').removeClass('btn-secondary').addClass('btn-secondary');
                $('#customBtn').removeClass('btn-secondary').addClass('btn-primary').show();
            } else {
                message = 'Skor Anda adalah ' + totalScore + '. Tetap tenang, ada ruang untuk perbaikan.';
                $('#closeBtn').removeClass('btn-primary').addClass('btn-secondary');
                $('#customBtn').removeClass('btn-primary').addClass('btn-secondary').hide();
            }

            $('#messageText').text(message);
            $('#resultModal').modal('show');
        });
    });
</script>

<?= $this->endSection(); ?>