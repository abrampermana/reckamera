<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RecKamera</title>
    <link rel="icon" href="img/camera-logo2.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php">
                            <img src="img/camera-logoDark.png" style="width: 50px; height: 50px;" alt="logo"> RecKamera
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="analisa.php">Rekomendasi Kamera</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href=artikel.php>Artikel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href=user/login.php>Login</a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- learning part start-->
    <section class="learning_part">

<script type="text/javascript">
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    table = document.getElementById('dataTable');
    tr = table.getElementsByTagName('tr');

    for (i = 0; i < tr.length ; i++) {
      td=tr[i].getElementsByTagName('td')[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if(txtValue.toUpperCase().indexOf(filter)>-1){
          tr[i].style.display='';
        } else {
          tr[i].style.display='none'
        }
      }
    }
    }
</script>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <h2>Rekomendasi Kamera Mirrorless Terkini</h2>
                    </div>
                </div>
            </div>



            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <th style='text-align : center'>No</th>
                    <th style='text-align : center'></th>
                    <th style='text-align : center'>Merk Kamera</th>
                    <th style='text-align : center'>Resolusi (MP)</th>
                    <th style='text-align : center'>Ukuran Sensor</th>
                    <th style='text-align : center'>ISO</th>
                    <th style='text-align : center'>Tahun Rilis</th>
                    <th style='text-align : center'>Berat (g)</th>
                    <th style='text-align : center'>Harga</th>
                    <th style='text-align : center'>Hasil Analisa SAW</th>
                  </thead>
                  <?php
                    include "koneksi.php";
                    $no = 0;

                    function rupiah($angka){

                      $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                      return $hasil_rupiah;
                    }

                    $modal=mysqli_query($koneksi,"  SELECT  c.nm_kamera, c.resolusi,c.uk_lensa,c.iso,c.th_rilis,c.berat,c.harga,
                    round(((a.K_1/b.N_Min_1)*0.1)+
                    ((a.K_2/b.N_Min_2)*0.1)+
                    ((a.K_3/b.N_Min_3)*0.1)+
                    ((a.K_4/b.N_Min_4)*0.35)+
                    ((a.K_5/b.N_Min_5)*0.1)+
                    ((b.N_Max_6/a.K_6)*0.25),2) as hasil
                    From t_kriteria a, t_minmax b , t_kamera c
                    where a.id_kamera=c.id_kamera
                    ORDER BY hasil DESC");
                    while($r=mysqli_fetch_array($modal)){
                    $no++;
                  ?>

                  <tr>
                    <td style='text-align : center'><?php echo $no; ?></td>
                    <td>
                        <img src="img/kamera/<?php echo  $r['nm_kamera'];?>.jpg" style="width: 100px; height: 80px;">                    
                    </td>
                    <td><?php echo  $r['nm_kamera']; ?></td>
                    <td style = 'text-align : center'><?php echo  $r['resolusi']; ?></td>
                    <td style = 'text-align : center'><?php echo  $r['uk_lensa']; ?></td>
                    <td style = 'text-align : center'><?php echo  $r['iso']; ?></td>
                    <td style = 'text-align : center'><?php echo  $r['th_rilis']; ?></td>
                    <td style = 'text-align : center'><?php echo  $r['berat']; ?></td>
                    <td style = 'text-align : right'><?php echo "Rp. ".number_format($r['harga'], 0, ",", ".") ?></td>
                    <td style = 'text-align : center'><?php echo  $r['hasil']; ?></td>
                  </tr>
                  <?php } ?>
                </table>
                <a href="./user/login.php" class="btn_1">Tambah Rekomendasi Kamera</a>
        </div>
    </section>
    <!-- learning part end-->

        <!-- footer part start-->
        <footer class="footer-area">
            <div class="container">
                <div class="row justify-content-between">
                  <div class="col-xl-4 col-sm-5 col-md-4">
                      <div class="single-footer-widget footer_1">
                          <img src="img/camera-logoDark.png" width="150px" height="150px">
                          <H2>RecKamera</H2>
                      </div>
                  </div>
                    <div class="col-xl-4 col-sm-6 col-md-4">
                        <div class="single-footer-widget footer_3">
                            <h4>Tentang Saya :</h4>
                            <div class="contact_info">
                                <p><span> Alamat :</span> Jl Rigel no 12 Serang </p>
                                <p><span> Whatsapp :</span> 085740343946 </p>
                                <p><span> Email : </span> abrampermana@gmail.com </p>
                            </div>
                        </div>
                    </div>
                </div>
        </footer>
        <!-- footer part end-->

        <!-- jquery plugins here-->
        <!-- jquery -->
        <script src="js/jquery-1.12.1.min.js"></script>
        <!-- popper js -->
        <script src="js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="js/bootstrap.min.js"></script>
        <!-- easing js -->
        <script src="js/jquery.magnific-popup.js"></script>
        <!-- swiper js -->
        <script src="js/swiper.min.js"></script>
        <!-- swiper js -->
        <script src="js/masonry.pkgd.js"></script>
        <!-- particles js -->
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.nice-select.min.js"></script>
        <!-- swiper js -->
        <script src="js/slick.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/waypoints.min.js"></script>
        <!-- custom js -->
        <script src="js/custom.js"></script>
    </body>

    </html>
