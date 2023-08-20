<!doctype html>
<html lang="en" class="h-100">

<head>
    <style>
        /* Gaya sidebar */
        .sidebar {
            width: 300px;
            height: 100%;
            background-color: white;
            float: left;
            padding: 20px;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            margin-bottom: 10px;
            text-decoration: none;
            color: #333;
        }
        .sidebar a:hover {
            background-color: #ccc;
        }
        .sidebar ul {
            padding: 0;
            list-style: none;
        }

        .sidebar ul li {
            margin: 0;
            padding: 0;
        }

        .video-container {
            display: flex;
            justify-content: right; /* Geser ke kanan */
        }
        .sidebar-left .video {
            width: 640px;
            height: 360px;
            margin-left: 10px; /* Jarak dari sidebar */
            margin-bottom: 10px;
            margin-top: 10px;
        }
    </style>
  <!-- Required meta tags -->
  <meta charset="utf-8">


  <!-- Title -->
  <title>Aplikasi Antrian Berbasis Web</title>

  <!-- Favicon icon -->
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />

  <!-- Custom Style -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <main>

      <a class="brand" href="http://localhost/aplikasi_antrian_1/"><h3>Antrian Bank Ini</h3></a>
    <div class="sidebar-item"></div>
    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-start">
                        <div class="feature-icon-3 me-4">
                            <i class="bi-person-check text-success"></i>
                        </div>
                        <div>
                            <div class="section-title">
                                <p id="antrianSekarang" class="fs-3 text-success mb-1"></p>
                                <h4>Antrian Sekarang</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="video-container">
                        <div class="video1">
                            <video id="myVideo1" width="100%" height="360" autoplay loop controls>
                                <source src="trailer.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-start">
                        <div class="feature-icon-3 me-4">
                            <i class="bi-person-check text-success"></i>
                        </div>
                        <div>
                            <div class="section-title">
                                <p id="antrianSekarang" class="fs-3 text-success mb-1"></p>
                                <h4>Antrian Selanjutnya</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="video-container">
                        <div class="video2">
                            <video id="myVideo2" width="100%" height="360" autoplay loop controls>
                                <source src="trailer2.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>     
  </main>

  <!-- load file audio bell antrian -->
  <audio id="tingtung" src="../assets/audio/tingtung.mp3"></audio>

  <!-- jQuery Core -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

  <!-- DataTables -->
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
  <!-- Responsivevoice -->
  <!-- Get API Key -> https://responsivevoice.org/ -->
  <script src="https://code.responsivevoice.org/responsivevoice.js?key=jQZ2zcdq"></script>

  <script type="text/javascript">
        var video1 = document.getElementById("myVideo1");
        var video2 = document.getElementById("myVideo2");
        var antrianLalu = 0;
        $(document).ready(function() {
            // Fungsi untuk mengambil data dan memainkan suara
            function loadAndSpeak() {
                $('#antrianSekarang').load('get_antrian_sekarang.php', function(responseTxt, statusTxt, xhr) {
                    if (statusTxt === "success") {
                        var antrianSekarang = parseInt($('#antrianSekarang').text());
                        if (antrianLalu !== antrianSekarang){
                            video1.muted = true;
                            video2.muted = true;
                            var bell = document.getElementById('tingtung');
                            
                            bell.pause();
                            bell.currentTime = 0;
                            bell.play();
                            durasi_bell = bell.duration * 770;
                            
                            var teksSuara = "   "+".Halo," + "Nomor antrian, " + antrianSekarang + " Silahkan pergi ke ruang periksa!";
                            
                            setTimeout(function() {
                              responsiveVoice.speak(teksSuara, "Indonesian Female", {onend: function(){
                                  video1.muted = false;
                                  video1.muted = false;
                                  }
                              });                                
                            },durasi_bell);

                            antrianLalu = antrianSekarang;
                            

                        }
                    }
                });
            }

            // Panggil fungsi loadAndSpeak() saat halaman dimuat ulang
            loadAndSpeak();

            // Interval untuk memuat ulang dan memainkan suara secara otomatis
            setInterval(loadAndSpeak, 5000); // Setiap 5 detik (5000 ms)
        });
    
  </script>
</body>

</html>