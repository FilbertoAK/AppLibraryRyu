<?php
$page = "Pelanggan";
$startpage = "Master Data";
require '../controller/ControllerPelanggan.php';
$query = tampildata ("SELECT * FROM tpelanggan");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../">
    <?php
       require 'header.php';
       ?>
</head>

<body class="sb-nav-fixed">
    <?php
   require 'navbar.php';
   ?>
    <div id="layoutSidenav">
        <?php
       require 'menu.php';
       ?>
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
                                        <th class="text-center">NoCustomer</th>
                                        <th class="text-center">Nama Pelanggan</th>
                                        <th class="text-center">E-mail</th>
                                        <th class="text-center">No Handphone</th>
                                        <th class="text-center">Pekerjaan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($query as $row): ?>
                                    <tr>
                                        <td><?=$row['nocustomer']?></td>
                                        <td><?=$row['namapelanggan']?></td>
                                        <td><?=$row['email']?></td>
                                        <td><?=$row['nohandphone']?></td>
                                        <td><?=$row['perkerjaan']?></td>
                                        <td class="text-center">
                                            <?php 
                                            if($row['statuspelanggan']==1){
                                                echo "<span class='badge bg-success'>Active</span>";
                                            }
                                            else{
                                               echo "<span class='badge bg-danger'>Non Active</span>";
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#edit<?=$row['id']?>">Edit</button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapus<?=$row['nocustomer']?>">Hapus</button>
                                            <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                data-bs-target="#suspend<?=$row['id']?>">Suspend</button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="edit<?=$row['id']?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Perubahan <?=$page?>
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="id" value="<?=$row['id']?>">
                                                    <input type="hidden" name="nouser" value="<?=$row['nocustomer']?>">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="nopelanggan"
                                                                class="form-label">NamaPelanggan</label>
                                                            <input type="text" class="form-control" name="namapelanggan"
                                                                value="<?=$row['namapelanggan']?>" id="namapelanggan">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="nopelanggan" class="form-label">E-mail</label>
                                                            <input type="email" class="form-control" name="email"
                                                                value="<?=$row['email']?>" id="email">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="nopelanggan"
                                                                class="form-label">NoHandphone</label>
                                                            <input type="text" class="form-control" name="nohandphone"
                                                                value="<?=$row['nohandphone']?>" id="nohandphone">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="nopelanggan"
                                                                class="form-label">Pekerjaan</label>
                                                            <select name="pekerjaan" id="pekerjaan" class="form-select">
                                                                <option value="<?=$row['perkerjaan']?>">
                                                                    <?=$row['perkerjaan']?></option>
                                                                <option value="Siswa/Mahasiswa">Siswa/Mahasiswa</option>
                                                                <option value="Guru/Dosen">Guru/Dosen</option>
                                                                <option value="Umum">Umum</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" name="ubah"
                                                                class="btn btn-primary">Simpan
                                                                Perubahan
                                                            </button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="hapus<?=$row['id']?>" tabindex="-1"
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
                                                    <input type="hidden" name="id" value="<?=$row['id']?>">
                                                    <input type="hidden" name="nouser" value="<?=$row['nocustomer']?>">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="nopelanggan" class="form-label">Nama
                                                                Pelanggan</label>
                                                            <input type="text" class="form-control" id="namapelanggan"
                                                                name="namapelanggan" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" name="hapuspermanent"
                                                            class="btn btn-danger">Hapus
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="suspend<?=$row['id']?>" tabindex="-1"
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
                                                    <input type="hidden" name="id" value="<?=$row['id']?>">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="kategori" class="form-label">id</label>
                                                            <input type="text" value="<?=$row['id']?>" readonly
                                                                class="form-control" id="kategori">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" name="suspend"
                                                            class="btn btn-danger">Hapus
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
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nopelanggan" class="form-label">No Customer</label>
                            <input type="text" class="form-control" id="nocustomer"
                                value="<?=date('Y').rand(11111,9999)?>" name="nocustomer" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nopelanggan" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="namapelanggan" name="namapelanggan" required>
                        </div>
                        <div class="mb-3">
                            <label for="nopelanggan" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="nopelanggan" class="form-label">No Handphone</label>
                            <input type="text" class="form-control" id="nohandphone" name="nohandphone" required>
                        </div>
                        <div class="mb-3">
                            <label for="nopelanggan" class="form-label">Pekerjaan</label>
                            <select name="pekerjaan" required id="pekerjaan" class="form-select">
                                <option value="">Pilih</option>
                                <option value="Siswa/Mahasiswa">Siswa/Mahasiswa</option>
                                <option value="Guru/Dosen">Guru/Dosen</option>
                                <option value="Umum">Umum</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" name="simpanpelanggan">Simpan </button>
                        </div>
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