<?php
$page = "Buku";
$startpage = "Master Data";
//$query = tampildata("SELECT * FROM tbuku LEFT OUTER JOIN tkategoribuku ON
//tkategoribuku.idkategoribuku = tbuku.idkategoribuku WHERE statusbuku='1'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
       require 'header.php';
       ?>
</head>

<body class="sb-nav-fixed">
    <?php
   require 'navbar.php';
   ?><br><br>
    <div class="mb-4">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4"><?=$page?></h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><?=$startpage?> / <?=$page?></li>
                    </ol>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah
                        Data</button>
                    <div class="card mb-4 mt-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data <?=$page?>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Kategori</th>
                                        <th>Judul Buku</th>
                                        <th>Cover Buku</th>
                                        <th>Stock Buku</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($query as $row): ?>
                                    <tr>
                                        <td><?=$row['kategoribuku']?></td>
                                        <td><?=$row['buku']?></td>
                                        <td>
                                            <img src="file/<?=$row['coverbuku']?>" alt="" width="100">
                                        </td>
                                        <td class="text-end"><?=number_format($row['stockakhir'])?></td>
                                        <td class="text-center">
                                            <?php 
                                            if($row['statuskategori']==1){
                                                echo "<span class='badge bg-success'>Active</span>";
                                            }
                                            else{
                                                echo "<span class='badge bg-danger'>Non Active</span>";
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="buku_detail.php?id=<?=$row['idbuku']?>">
                                                <button class="btn btn-primary">Add Stock</button>
                                            </a>
                                            <button class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#edit<?=$row['idbuku']?>">Edit</button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapus<?=$row['idbuku']?>">Hapus</button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="edit<?=$row['idbuku']?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit <?=$page?>
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="kategori" class="form-label">Kategori</label>
                                                            <select name="kategori" id="kategori" class="form-select">
                                                                <option selected>Pilh</option>
                                                                <?php 
                                                                  $data = mysqli_query($koneksi, "SELECT * FROM tkategoribuku 
                                                                  WHERE statuskategori='1'");
                                                                  $detail = mysqli_fetch_array($data);
                                                                ?>
                                                                <?php foreach ($data as $row): ?>
                                                                <option value="<?=$row['idkategoribuku']?>">
                                                                    <?=$row['kategoribuku']?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="buku" class="form-label">Judul Buku</label>
                                                            <input type="text" class="form-control" id="buku"
                                                                name="judulbuku">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="coverbuku" class="form-label">Cover Buku</label>
                                                            <input type="file" class="form-control" id="coverbuku"
                                                                name="coverbuku">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" name="simpan"
                                                            class="btn btn-primary">Simpan Perubahan </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="hapus<?=$row['idbuku']?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus <?=$page?>
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="id" value="<?=$row['idbuku']?>">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="buku" class="form-label">Buku</label>
                                                            <input type="text" class="form-control" id="buku" readonly
                                                                name="buku" value="<?=$row['buku']?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" name="hapus" class="btn btn-danger">Hapus
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php
          require 'footer.php';
          ?>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah <?=$page?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" id="kategori" class="form-select">
                                <option selected>Pilh</option>
                                <?php 
                                $data = mysqli_query($koneksi, "SELECT * FROM tkategoribuku 
                                WHERE statuskategori='1'");
                                $detail = mysqli_fetch_array($data);
                                ?>
                                <?php foreach ($data as $row): ?>
                                <option value="<?=$row['idkategoribuku']?>"><?=$row['kategoribuku']?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="buku" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" id="buku" name="judulbuku">
                        </div>
                        <div class="mb-3">
                            <label for="coverbuku" class="form-label">Cover Buku</label>
                            <input type="file" class="form-control" id="coverbuku" name="coverbuku">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>