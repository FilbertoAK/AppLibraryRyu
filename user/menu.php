 <?php

 ?>
 <div id="layoutSidenav_nav">
     <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
         <div class="sb-sidenav-menu">
             <div class="nav">
                 <div class="sb-sidenav-menu-heading">Core</div>
                 <a class="nav-link" href="home.php">
                     <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                     Dashboard
                 </a>
                 <div class="sb-sidenav-menu-heading">Master Data</div>
                 <a class="nav-link collapsed active " href="#" data-bs-toggle="collapse" data-bs-target="#buku"
                     aria-expanded="false" aria-controls="buku">
                     <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                     Buku
                     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                 </a>
                 <div class="collapse" id="buku" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                     <nav class="sb-sidenav-menu-nested nav">
                         <a class="nav-link active" href="user/kategori_buku.php">Kategori</a>
                         <a class="nav-link" href="user/buku.php">Buku</a>
                     </nav>
                 </div>
                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#penerbit"
                     aria-expanded="false" aria-controls="penerbit">
                     <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                     Penerbit
                     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                 </a>
                 <div class="collapse" id="penerbit" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                     <nav class="sb-sidenav-menu-nested nav">
                         <a class="nav-link" href="user/kategoripenerbit.php">Kategori</a>
                         <a class="nav-link" href="user/penerbit.php">Penerbit</a>
                     </nav>
                 </div>
                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pelanggan"
                     aria-expanded="false" aria-controls="pelanggan">
                     <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                     Pelanggan
                     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                 </a>
                 <div class="collapse" id="pelanggan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                     <nav class="sb-sidenav-menu-nested nav">
                         <a class="nav-link" href="user/layout-static.html">Kategori</a>
                         <a class="nav-link" href="user/denda.php">Denda</a>
                         <a class="nav-link" href="user/pelanggan.php">Pelanggan</a>
                         <a class="nav-link" href="user/Pinjaman.php">Pinjaman</a>
                     </nav>
                 </div>
                 <div class="sb-sidenav-menu-heading">Addons</div>
                 <a class="nav-link" href="charts.html">
                     <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                     Charts
                 </a>
                 <a class="nav-link" href="tables.html">
                     <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                     Tables
                 </a>
             </div>
         </div>
         <div class="sb-sidenav-footer">
             <div class="small">Logged in as:</div>
             <?=$_SESSION['namalengkap'] ?>
         </div>
     </nav>
 </div>