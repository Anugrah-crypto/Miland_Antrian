<!DOCTYPE html>
<html>
    <head>
        <title>CEK BUAT VIDEO</title>
        <h1>
            HALO INI ADALAH MEMASUKKAN VIDEO
        </h1>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    
    
    <body>
        <div class = "video1">
        <video autoplay loop controls>
            <source src="trailer.mp4" type="video/mp4">
        </video>
        
        <div class = "video2">
        <video autoplay loop controls>
            <source src="trailer2.mp4" type="video/mp4">
        </video>   
        
    
    <style>
        video{
            float : center;
            margin-top: 100px;
            margin-bottom: 100px;
            width: 1000px;
            margin-right: 100px;
            margin-left: 350px;
        }
        
    </style>
    
    
    <h1>Sistem Antrian Cara 1</h1>
    <button id="getQueueButton">Ambil Antrian</button>
    <div id="queueNumberDisplay"></div>

    <script>
        $(document).ready(function() {
            $('#getQueueButton').click(function() {
                $.ajax({
                    url: 'get_queue_number.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#queueNumberDisplay').html('Nomor Antrian Anda: ' + data.queueNumber);
                        
                                var bell = document.getElementById('tingtung');

        // mainkan suara bell antrian
        bell.pause();
        bell.currentTime = 0;
        bell.play();

        // set delay antara suara bell dengan suara nomor antrian
        durasi_bell = bell.duration * 770;

        // mainkan suara nomor antrian
        setTimeout(function() {
          responsiveVoice.speak("Nomor Antrian, " + data.queueNumber + ", menuju, loket, 1", "Indonesian Male", {
            rate: 0.9,
            pitch: 1,
            volume: 1
          });
        }, durasi_bell);
                        
                        
                        
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat mengambil nomor antrian.');
                    }
                });
            });
        });
    </script>
    
    
    <h1> INI COBA MASUKKAN ANTREAN</h1>
    
    <main class="flex-shrink-0">

      <div class="row">
        <!-- menampilkan informasi jumlah antrian -->
        <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-3 me-4">
                  <i class="bi-people text-warning"></i>
                </div>
                <div>
                  <p id="jumlah-antrian" class="fs-3 text-warning mb-1"></p>
                  <p class="mb-0">Jumlah Antrian</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- menampilkan informasi nomor antrian yang sedang dipanggil -->
        <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-3 me-4">
                  <i class="bi-person-check text-success"></i>
                </div>
                <div>
                  <p id="antrian-sekarang" class="fs-3 text-success mb-1"></p>
                  <p class="mb-0">Antrian Sekarang</p>
                  
                  
                  
                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- menampilkan informasi nomor antrian yang akan dipanggil selanjutnya -->
        <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-3 me-4">
                  <i class="bi-person-plus text-info"></i>
                </div>
                <div>
                  <p id="antrian-selanjutnya" class="fs-3 text-info mb-1"></p>
                  <p class="mb-0">Antrian Selanjutnya</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- menampilkan informasi jumlah antrian yang belum dipanggil -->
        <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-3 me-4">
                  <i class="bi-person text-danger"></i>
                </div>
                <div>
                  <p id="sisa-antrian" class="fs-3 text-danger mb-1"></p>
                  <p class="mb-0">Sisa Antrian</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
    
  </main>

  <body>
      <p>isine mboh: <span id="hasil"></span></p>
      <script>
           $('#jumlah-antrian').load('get_jumlah_antrian.php');
           $('#antrian-sekarang').load('get_antrian_sekarang.php');
           $('#antrian-selanjutnya').load('get_antrian_selanjutnya.php');
           $('#sisa-antrian').load('get_sisa_antrian.php');
            // menampilkan data antrian menggunakan DataTables
      var table = $('#tabel-antrian').DataTable({
        "lengthChange": false,              // non-aktifkan fitur "lengthChange"
        "searching": false,                 // non-aktifkan fitur "Search"
        "ajax": "get_antrian.php",          // url file proses tampil data dari database
        // menampilkan data
        "columns": [{
            "data": "no_antrian",
            "width": '250px',
            "className": 'text-center'
          },
          {
            "data": "status",
            "visible": false
          },
          {
            "data": null,
            "orderable": false,
            "searchable": false,
            "width": '100px',
            "className": 'text-center',
            "render": function(data, type, row) {
              // jika tidak ada data "status"
              if (data["status"] === "") {
                // sembunyikan button panggil
                var btn = "-";
              } 
              // jika data "status = 0"
              else if (data["status"] === "0") {
                // tampilkan button panggil
                var btn = "<button class=\"btn btn-success btn-sm rounded-circle\"><i class=\"bi-mic-fill\"></i></button>";
              } 
              // jika data "status = 1"
              else if (data["status"] === "1") {
                // tampilkan button ulangi panggilan
                var btn = "<button class=\"btn btn-secondary btn-sm rounded-circle\"><i class=\"bi-mic-fill\"></i></button>";
              };
              return btn;
            }
          },
        ],
        "order": [
          [0, "desc"]             // urutkan data berdasarkan "no_antrian" secara descending
        ],
        "iDisplayLength": 10,     // tampilkan 10 data per halaman
      });
      
      
      
      
        // ambil data dari datatables 
        var data = table.row($(this).parents('tr')).data();
        // buat variabel untuk menampilkan data "id"
        var id = data["id"];
        // buat variabel untuk menampilkan audio bell antrian
        var bell = document.getElementById('tingtung');
        var hasil = data["no_antrian"];
        document.getElementById("hasil").innerHTML = hasil;
        document.write(hasil)
      </script>
  </body>
    
   <!-- ------------------------------------------------------------------- -->
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
    
    <!-- ------------------------------------------------------------------- -->
    
    
    
    <script type="text/javascript">
         $(document).ready(function() {
           $('#jumlah-antrian').load('get_jumlah_antrian.php');
           $('#antrian-sekarang').load('get_antrian_sekarang.php');
           $('#antrian-selanjutnya').load('get_antrian_selanjutnya.php');
           $('#sisa-antrian').load('get_sisa_antrian.php');
           

     <!-- ------------------------------------------------------------------ -->

    





        
        
        
        
            
            
            setInterval(function() {
            $('#jumlah-antrian').load('get_jumlah_antrian.php').fadeIn("slow");
            $('#antrian-sekarang').load('get_antrian_sekarang.php').fadeIn("slow");
            $('#antrian-selanjutnya').load('get_antrian_selanjutnya.php').fadeIn("slow");
            $('#sisa-antrian').load('get_sisa_antrian.php').fadeIn("slow");
            table.ajax.reload(null, false);
            }, 1000);
        });
        
    </script>
        
    
    </body>
    
</html>
