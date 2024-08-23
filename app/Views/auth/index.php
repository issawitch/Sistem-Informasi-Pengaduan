<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/landing-page.css" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="navbar-brand" href="<?= base_url('/') ?>" style="padding-left: 5%;">
            <img src="/img/batang.png">
        </div>
        <div class="navbar-description">
            Dinas Pendidikan dan Kebudayaan<br>Kabupaten Batang
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto" style="padding-right: 5%; font-weight: 500;">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#info">Trivia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#quiz">Quiz</a>
                </li> -->
                <li class="nav-item">
                    <a class="btn btn-outline-primary" href="<?= base_url('login') ?>" style="border-radius: 30px;">&nbsp;Login&nbsp;</a>
                </li>
            </ul>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 50) {
                    $('.scroll-navbar').addClass('navbar-scrolled');
                } else {
                    $('.scroll-navbar').removeClass('navbar-scrolled');
                }
            });
        });
        $(document).ready(function() {
            $('.carousel').carousel();
        });
    </script>

    <!-- Content Section pertama -->
    <div class="content" style="background-color: #f9fafc; margin-bottom: 20px;" id="home">
        <div class="container">
            <div class="row" style="margin-top: 10%;">
                <!-- Kolom pertama (elemen pertama) -->
                <div class="col-lg-6" style="padding-top: 10%;">
                    <!-- Konten elemen pertama -->
                    <h1>Break the Cycle.</h1>
                    <h4 style="font-size: 15px; font-weight: 400; line-break: auto; padding-bottom: 15px;">
                        Ciptakan lingkungan belajar yang aman dan nyaman untuk semua!
                    </h4>
                    <a class="btn btn-primary" href="<?= base_url('register') ?>" style="padding: 7px 20px 7px 20px; border-radius: 30px;">
                        Join Sekarang &nbsp;</a>
                </div>
                <!-- Kolom kedua (gambar dan elemen SVG) -->
                <div class="col-lg-6">
                    <img src="/img/Personal-Development.svg" style="width: 100%; height: auto; position: relative; padding-bottom: 20px;">
                </div>
            </div>
        </div>
    </div>

    <!-- content section informasi -->
    <div class="content text-white" id="info" style="background-color: #1d449c; padding-top: 5%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" style="padding: 20px;">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="border-radius: 10%;">
                        <ul class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ul>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/img/bully.jpg" class="d-block w-100 img-fluid" style="border-radius: 10%;">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/bully1.jpg" class="d-block w-100 img-fluid" style="border-radius: 10%;">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/bully2.jpg" class="d-block w-100 img-fluid" style="border-radius: 10%;">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- <h1 class="mb-4" style="font-size: 50px;">FYI (For Your Information)</h1> -->
                    <h4 style="font-size: 15px; font-weight: 400; text-align: justify; line-height: 1.5; padding: 0px 30px 0px 30px;">
                        <!-- <span style="font-size: 35px; font-weight: 700; font-family: 'Nunito';"> -->
                        <center><img src="/img/unicef.png" style="width: 70%; padding: 25px;"> </center>
                        Pernah nggak sih kamu ngeliat atau dengar ada temen yang dibully di sekolah?

                        Nah, ternyata menurut UNICEF Indonesia, 1 dari 3 siswa SMP di Indonesia pernah ngalamin hal ini lho!<br> <br>
                        Jenis bully yang paling sering terjadi adalah bully kata-kata, kayak diolok-olok atau dihina.
                        Nggak cuma itu, ada juga bully fisik kayak didorong, ditendang, atau dipukul.<br> <br>
                        Kamu pernah liat atau ngalamin kekerasan, perundungan, atau intoleransi?
                        Jangan diem aja! Laporkan ke guru, konselor, atau ke website ini :D
                    </h4>
                </div>
            </div>
        </div>
        < <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#F9FAFC" fill-opacity="1" d="M0,96L34.3,122.7C68.6,149,137,203,206,202.7C274.3,203,343,149,411,106.7C480,64,549,32,617,53.3C685.7,75,754,149,823,181.3C891.4,213,960,203,1029,176C1097.1,149,1166,107,1234,80C1302.9,53,1371,43,1406,37.3L1440,32L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
            </svg>
    </div>



    <!-- content section POPUP quiz -->
    <div class="modal" id="resultModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Quiz Result</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="score"></p>
                    <p id="message"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeBtn" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a type="button" id="customBtn" class="btn btn-secondary" style="display: none;" href="<?= base_url('register') ?>">Lapor!</a>
                </div>
            </div>
        </div>
    </div>


    <div class="backdrop">
        <div class="popup-container">
            <button class="close-btn ml-auto" onclick="closePopup()"><i class="fas fa-times"></i></button>
            <div class="content" id="quiz">
                <div class="container">
                    <!-- <div class="col-lg-6">
                    <h1 style="font-size: 40px; padding: 0px 30px 0px 30px;">Deteksi Dini</h1>
                    <h4 style="font-size: 15px; font-weight: 400; text-align: justify; line-height: 1.5; padding: 0px 30px 0px 30px;">
                        Pernah gak sih kamu ngerasa gak nyaman di sekolah? Kayak ada yang salah,
                        tapi gak tau apa. Nah, quiz deteksi dini ini bisa bantu kamu lho! <br><br>
                    </h4>
                </div> -->
                    <div class="col-lg-4 text">
                        <div class="card mx-auto" style="box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.3); border-radius: 10px; 
                        overflow: hidden; width: 350px; height: 300px; background-color: #f2f2f2;">
                            <div class="card-body text-center align-content-center" style="padding: 20px;" id="startContainer"> <!-- Container untuk tombol "Start" -->
                                <h5 class="card-title">Quiz</h5>
                                <img src="/img/Girl-Workplace.png" style="width: 45%;"><br><br>
                                <button class="btn btn-primary" onclick="startQuiz()" style="border-radius: 30px; padding: 5px 20px 5px 20px;">Start</button>
                            </div>
                            <div class="card-body d-none" id="quizContainer" style="margin-left: 5%; margin-right: 5%;">
                                <h5 class="card-title">Quiz</h5>
                                <div class="question mb-4"></div>
                                <form id="quiz-form">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="answer" id="yes" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="answer" id="yes" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                    <!-- <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer" id="yes" value="1">
                                        <label class="form-check-label" for="yes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer" id="no" value="0">
                                        <label class="form-check-label" for="no">
                                            No
                                        </label>
                                    </div> -->
                                </form>
                                <div class="mt-4 d-flex justify-content-between">
                                    <button class="btn btn-primary" id="backButton" onclick="prevQuestion()" style="border-radius: 30px;">Back</button>
                                    <button class="btn btn-primary" id="nextButton" onclick="nextQuestion()" style="border-radius: 30px;">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <style>
                    </style>
                    <!-- Result Section -->

                    <script>
                        const questions = [
                            "Pernahkah kamu merasa takut atau terancam di sekolah?",
                            "Pernahkah kamu diejek, dihina, atau dimaki dengan kata-kata kasar di sekolah?",
                            "Pernahkah kamu dipaksa untuk melakukan sesuatu yang tidak ingin kamu lakukan di sekolah?",
                            "Pernahkah kamu dipukul, ditendang, atau disakiti secara fisik di sekolah?",
                            "Pernahkah barang-barangmu diambil atau dirusak di sekolah?",
                            "Pernahkah kamu diasingkan atau dikucilkan oleh teman-temanmu di sekolah?",
                            "Pernahkah kamu merasa tidak aman atau nyaman di sekolah karena takut mengalami perundungan?",
                            "Pernahkah kamu merasa dikucilkan oleh teman-teman di sekolah karena perbedaan suku, agama, ras, atau golongamu?",
                            "Pernahkah kamu merasa diperlakukan tidak adil di sekolah karena perbedaan suku, agama, ras, atau golonganmu?",
                            "Pernahkah kamu merasa takut karena suku, agama, ras, atau golonganmu?"
                        ];

                        let currentQuestion = 0;
                        const questionElement = document.querySelector('.question');
                        const quizForm = document.getElementById('quiz-form');
                        const resultContainer = document.querySelector('.result');
                        const scoreElement = document.getElementById('score');
                        const messageElement = document.getElementById('message');

                        let scores = [];
                        let selectedOptions = []; // Array untuk menyimpan jawaban yang dipilih

                        function startQuiz() {
                            document.getElementById('startContainer').classList.add('d-none'); // Sembunyikan container "Start"
                            document.getElementById('quizContainer').classList.remove('d-none'); // Tampilkan container quiz
                            showQuestion(); // Tampilkan pertanyaan pertama
                        }

                        function showQuestion() {
                            questionElement.textContent = questions[currentQuestion];
                            resetRadioButtons();
                            restoreSelectedOption();

                            if (currentQuestion === 0) {
                                document.getElementById('backButton').classList.add('d-none'); // Menyembunyikan tombol "Back" jika ini adalah pertanyaan pertama
                            } else {
                                document.getElementById('backButton').classList.remove('d-none'); // Menampilkan tombol "Back" jika ini bukan pertanyaan pertama
                            }

                            if (currentQuestion === questions.length - 1) {
                                document.getElementById('nextButton').textContent = 'Submit'; // Mengubah teks tombol "Next" menjadi "Submit"
                            } else {
                                document.getElementById('nextButton').textContent = 'Next'; // Mengembalikan teks tombol "Next" ke semula
                            }
                        }

                        function nextQuestion() {
                            const selectedOption = quizForm.elements['answer'].value;
                            if (selectedOption !== '') {
                                scores[currentQuestion] = parseInt(selectedOption);
                                selectedOptions[currentQuestion] = selectedOption; // Simpan jawaban yang dipilih

                                if (currentQuestion < questions.length - 1) {
                                    currentQuestion++;
                                    showQuestion();
                                } else {
                                    showResult();
                                }
                            } else {
                                alert("Silakan pilih jawaban terlebih dahulu.");
                            }
                        }

                        function prevQuestion() {
                            if (currentQuestion > 0) {
                                currentQuestion--;
                                showQuestion();
                            }
                        }

                        function resetRadioButtons() {
                            const radioButtons = quizForm.elements['answer'];
                            for (let i = 0; i < radioButtons.length; i++) {
                                radioButtons[i].checked = false;
                            }
                        }

                        function restoreSelectedOption() {
                            const selectedOption = selectedOptions[currentQuestion];
                            if (selectedOption !== undefined) {
                                const radioButtons = quizForm.elements['answer'];
                                for (let i = 0; i < radioButtons.length; i++) {
                                    if (radioButtons[i].value === selectedOption) {
                                        radioButtons[i].checked = true;
                                        break;
                                    }
                                }
                            }
                        }

                        function showResult() {
                            const totalScore = scores.reduce((total, score) => total + score, 0);
                            scoreElement.textContent = `Skor kamu: ${totalScore}/10`;

                            if (totalScore >= 6) {
                                messageElement.textContent = "Kemungkinan besar kamu pernah mengalami tindak kekerasan, perundungan, atau intoleransi di sekolah. Tidak ada yang salah denganmu jika kamu pernah mengalami situasi-situasi tersebut. Melapor adalah langkah pertama kamu melawan!";
                                $('#customBtn').removeClass('btn-secondary').addClass('btn-primary').show();
                            } else {
                                messageElement.textContent = "Good news! Sepertinya kamu aman dari tindak kekerasan, perundungan, atau intoleransi di sekolah. Jangan diam, bantu yang terintimidasi! #StopKekerasanDiSekolah";
                            }

                            // Menampilkan modal dengan id resultModal menggunakan Bootstrap
                            const resultModal = new bootstrap.Modal(document.getElementById('resultModal'));
                            resultModal.show();
                        }

                        showQuestion();
                    </script>
                </div>
            </div>
        </div>
    </div>

    <div class="content" style="background-color: #f9fafc; padding: 20px;">
        <div class="container">
            <h1 style="font-size: 40px;">Dosa Besar Pendidikan</h1>
            <h4 style="font-size: 15px; font-weight: 400; text-align: justify; line-height: 1.5;">
                Biar aku kasih tau 3 hal yang nggak banget di dunia pendidikan, kayak monster jahat yang gangguin kita belajar.
                Bayangin deh, sekolah yang seharusnya tempat kita bertumbuh dan bersenang-senang,
                malah jadi penuh dengan hal-hal yang bikin kita ngeri dan nggak nyaman.
            </h4>
            <div class="row py-4">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow" style="border-radius: 30px;">
                        <img src="/img/lp4.jpg" class="card-img-top img-fluid" style="object-fit: cover; height: 200px; border-top-left-radius: 30px; border-top-right-radius: 30px;">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">Kekerasan Seksual</h5>
                            <p class="card-text" style="font-size: 15px; line-height: 1.5; font-weight: 400;">
                                Ini kayak perlakuan jahat kayak dicolek-colek sembarangan,
                                dipaksa ngelakuin hal yang nggak kita mau, atau diganggu lewat chat mesum.
                                Pokoknya bikin kita trauma dan takut ke sekolah.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow" style="border-radius: 30px;">
                        <img src="/img/lp3.jpg" class="card-img-top img-fluid" style="object-fit: cover; height: 200px; border-top-left-radius: 30px; border-top-right-radius: 30px;">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">Bullying</h5>
                            <p class="card-text" style="font-size: 15px; line-height: 1.5; font-weight: 400;">
                                Pernah nggak liat ada yang suka ngisengin temennya, ngata-ngatain terus, atau malah ngasingin mereka?
                                Itu dia bullying! Bikin yang digituin jadi stress, sedih, dan nggak punya temen main.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow" style="border-radius: 30px;">
                        <img src="/img/lp1.jpg" class="card-img-top img-fluid" style="object-fit: cover; height: 200px; border-top-left-radius: 30px; border-top-right-radius: 30px;">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">Intoleransi</h5>
                            <p class="card-text" style="font-size: 15 px; line-height: 1.5; font-weight: 400;">
                                Bayangin ada temen beda agama, terus kamu nggak mau main sama dia. Atau ada yang cara belajarnya beda,
                                malah diejekin. Nah itu intoleransi. Sekolah yang gitu malah bikin suasana kayak geng-gengan, nggak seru!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <figure class="text-center m-5">
                <blockquote class="blockquote">
                    <p>&quot;Suara kita, bagaimanapun heningnya, akan selalu menjadi milik kita.&quot;</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    Audre Lorde
                </figcaption>
            </figure>
        </div>
    </div>


    <footer class="text-center text-white mt-5" style="background-color: #1d449c;">
        <div class="container p-4">
            <section class="mb-4">
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
            </section>

            <section class="mb-4">
                <p>
                    &copy; <?= date('Y') ?> All rights reserved.
                </p>
            </section>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <scri script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></scri>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Tambahkan di dalam tag <script> Anda
        window.onload = function() {
            $('#quizModal').modal('show');
            $('.backdrop').show(); // Tampilkan latar belakang gelap saat popup muncul
        };

        function closePopup() {
            $('#quizModal').modal('hide');
            $('.backdrop').hide(); // Sembunyikan latar belakang gelap saat popup ditutup
        }
    </script>

</body>

</html>