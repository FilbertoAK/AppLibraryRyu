<?php
$id = $_GET['id'];
$page = "Pinjaman";
$startpage ="Buku";
require '../controller/ControllerPinjaman.php';
$query = tampildata("SELECT * FROM tpinjamanpelanggan");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../">
    <?php
       require 'header.php';
       ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                        Pinjaman</button>
                    <a href="admin/buku.php">
                        <button class="btn btn-outline-primary">Kembali</button>
                    </a>
                    <div class="card mb-4 mt-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data <?=$page?>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>NamaBuku</th>
                                        <th>Nama</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Create</th>
                                        <th class="text-center">Kembalikan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($query as $row): ?>
                                    <tr>
                                        <td><?=$row['idbuku']?></td>
                                        <td><?=$row['iduser']?></td>
                                        <td class="text-center">
                                            <?php 
                                            if($row['statuspinjam']==1){
                                                echo "<span class='badge bg-success'>Sudah DiKembalikan</span>";
                                            }
                                            else{
                                               echo "<span class='badge bg-danger'>Belum DiKembalikan</span>";
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center"><?=$row['create_at']?></td>
                                        <td class="text-center"><?=$row['kembalikan_at']?></td>
                                        <td class="text-center">
                                            <button class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#edit<?=$row['id']?>">Edit</button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapus<?=$row['id']?>">Hapus</button>
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
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="kategori" class="form-label">NoHandphone</label>
                                                            <input type="text" class="form-control" id="nohandphone"
                                                                name="nohandphone">
                                                            <label for="kategori" class="form-label">Alamat</label>
                                                            <input type="text" class="form-control" id="alamat"
                                                                name="alamat">
                                                            <label for="kategori"
                                                                class="form-label">Dikembalikan</label>
                                                            <input type="date" class="form-control" id="kembalikan_at"
                                                                name="kembalikan_at">
                                                        </div>
                                                        <div class="mb-3">
                                                            <?php 
                                                            $status = $row['statuspinjam'];
                                                            if ($status==1) {
                                                                $keteragan="Sudah Dikembalikan";
                                                                $code ="1";
                                                            } else {
                                                                $keteragan="Belum Dikembalikan";
                                                                $code ="0";
                                                            }
                                                            ?>
                                                            <select class="form-select" name="status"
                                                                aria-label="Default select example">
                                                                <option selected value="?$code ?>
                                                                    <?$keteragan ?>">
                                                                </option>
                                                                <option value="1">Sudah Dikembalikan</option>
                                                                <option value="0">Belum Dikembalikan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" name="ubah" class="btn btn-primary">Simpan
                                                            Perubahan
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="hapus<?=$row['idkategoribuku']?>" tabindex="-1"
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
                                                            <label for="kategori" class="form-label">NoHandphone</label>
                                                            <input type="text" class="form-control" id="nohandphone"
                                                                readonly name="nohandphone">
                                                            <label for="kategori" class="form-label">Alamat</label>
                                                            <input type="text" class="form-control" id="alamat" readonly
                                                                name="alamat">
                                                            <label for="kategori"
                                                                class="form-label">Dikembalikan</label>
                                                            <input type="date" class="form-control" id="kembalikan_at"
                                                                readonly name="kembalikan_at">
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
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kategori" class="form-label">NoHandphone</label>
                            <input type="text" class="form-control" id="nohandphone" name="nohandphone">
                            <label for="kategori" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                            <label for="kategori" class="form-label">Dikembalikan</label>
                            <input type="date" class="form-control" id="kembalikan_at" name="kembalikan_at">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="notif.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script type="text/javascript" src="notif.js">
    </script>
    <script type="text/javascript">
    </script>
</body>

</html>