<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-">
                            <h1 class="page-header-title">
                                <!-- <div class="page-header-subtitle">An extension of the Simple DataTables library, customized for SB Admin Pro</div> -->
                                <a href="<?php echo base_url('user/ruangan/detail/' . $sub_ruang->kode_utama); ?>" class="btn btn-primary btn-back">
                                    <div class="box-icon">
                                        <i class="fas fa-reply"></i>
                                    </div>
                                </a>
                                <span class="ml-2"><?php echo $sub_ruang->nama; ?></span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <!-- Main page content-->

        <div class="container-xl px-4 mt-n10">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h1 class="page-header-title">
                        Daftar Alat Yang Ada Pada <?php echo $sub_ruang->nama; ?>
                    </h1>
                    <div>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i></button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Alat</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url('user/alat/simpanAlat'); ?>" method="post">
                                            <input type="hidden" name="kode_ruang" value="<?php echo $sub_ruang->kode_ruang ?>">
                                            <label for="namaAlat" style="color: black;">Nama Alat</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Alat">
                                            <br>
                                            <label for="merkAlat" style="color: black;">Merk Alat</label>
                                            <input type="text" class="form-control" name="merk" placeholder="Masukan Merk Alat">
                                            <br>
                                            <label for="tipeAlat" style="color: black;">Type Alat</label>
                                            <input type="text" class="form-control" name="tipe" placeholder="Masukan Type Alat">
                                            <br>
                                            <label for="seriAlat" style="color: black;">Nomor Seri Alat</label>
                                            <input type="text" class="form-control" name="seri" placeholder="Masukan Nomor Seri Alat">
                                            <br>
                                            <label for="tahunAlat" style="color: black;">Tahun</label>
                                            <input type="text" class="form-control" name="tahun" placeholder="Masukan Tahun">
                                            <br>
                                            <label for="exampleFormControlSelect1" style="color:black">Sumber Dana</label>
                                            <select class="form-control" name="sumber" id="exampleFormControlSelect1">
                                                <option>--Sumber Dana--</option>
                                                <option value="APBN">APBN</option>
                                                <option value="APBD">APBD</option>
                                                <option value="DAK">DAK</option>
                                            </select>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                                                <button class="btn btn-primary" type="submit">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('PdfController/exportPdf') ?>" class="btn btn-primary float-left mr-2">
                            <span class="icon text-white-50">
                                <i class="fa fa-download"></i>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama Alat</th>
                                <th>Merk</th>
                                <th>Type</th>
                                <th>Nomor Seri</th>
                                <th>Sumber Dana</th>
                                <th>Tahun</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Alat</th>
                                <th>Merk</th>
                                <th>Type</th>
                                <th>Nomor Seri</th>
                                <th>Sumber Dana</th>
                                <th>Tahun</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($alat as $a => $alat_item) { ?>
                                <tr>
                                    <td><?php echo $alat_item['nama']; ?></td>
                                    <td><?php echo $alat_item['merk']; ?></td>
                                    <td><?php echo $alat_item['tipe']; ?></td>
                                    <td><?php echo $alat_item['seri']; ?></td>
                                    <td><?php echo $alat_item['sumber']; ?></td>
                                    <td><?php echo $alat_item['tahun']; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $a; ?>">Edit</a>
                                        <a class="btn btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $a; ?>">Delete</a>
                                    </td>
                                </tr>
                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal<?php echo $a; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $a; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel<?php echo $a; ?>">Edit Alat</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Form Edit -->
                                                <form action="<?php echo base_url('user/Alat/update_aksi/' . $sub_ruang->kode_ruang); ?>" method="POST">
                                                    <div class="form-group">
                                                        <input type="hidden" name="kode_ruang" value="<?php echo $sub_ruang->kode_ruang ?>">
                                                        <label for="namaAlat" style="color: black;">Nama Alat</label>
                                                        <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Alat">
                                                        <br>
                                                        <label for="merkAlat" style="color: black;">Merk Alat</label>
                                                        <input type="text" class="form-control" name="merk" placeholder="Masukan Merk Alat">
                                                        <br>
                                                        <label for="tipeAlat" style="color: black;">Type Alat</label>
                                                        <input type="text" class="form-control" name="tipe" placeholder="Masukan Type Alat">
                                                        <br>
                                                        <label for="seriAlat" style="color: black;">Nomor Seri Alat</label>
                                                        <input type="text" class="form-control" name="seri" placeholder="Masukan Nomor Seri Alat">
                                                        <br>
                                                        <label for="tahunAlat" style="color: black;">Tahun</label>
                                                        <input type="text" class="form-control" name="tahun" placeholder="Masukan Tahun">
                                                        <br>
                                                        <label for="exampleFormControlSelect1" style="color:black">Sumber Dana</label>
                                                        <select class="form-control" name="sumber" id="exampleFormControlSelect1">
                                                            <option>--Sumber Dana--</option>
                                                            <option value="APBN">APBN</option>
                                                            <option value="APBD">APBD</option>
                                                            <option value="DAK">DAK</option>
                                                        </select>
                                                    </div>
                                                    <!-- Add other input fields as needed to edit user data -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal<?php echo $a; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?php echo $a; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel<?php echo $a; ?>">Delete Alat</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Anda Yakin Ingin Menghapus Data Alat ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a href="<?php echo base_url('user/alat/hapus/' . $sub_ruang->kode_ruang); ?>" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </main>