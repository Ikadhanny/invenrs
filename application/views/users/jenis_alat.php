<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-">
                            <h1 class="page-header-title">
                                <!-- <div class="page-header-subtitle">An extension of the Simple DataTables library, customized for SB user Pro</div> -->
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
                                        <form action="<?php echo base_url('user/alat/simpanAlat'); ?>" method="post" >
                                            <input type="hidden" name="kode_ruang" value="<?php echo $sub_ruang->kode_ruang ?>">
                                            <label for="namaRuangan" style="color: black;">Nama Alat</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Alat">
                                            <br>
                                            <label for="namaRuangan" style="color: black;">Merk Alat</label>
                                            <input type="text" class="form-control" name="merk" placeholder="Masukan Merk Alat">
                                            <br>
                                            <label for="namaRuangan" style="color: black;">Type Alat</label>
                                            <input type="text" class="form-control" name="tipe" placeholder="Masukan Type Alat">
                                            <br>
                                            <!-- <label for="namaRuangan" style="color: black;">Jumlah Alat</label>
                    <input type="text" class="form-control" name="jumlah_alat" placeholder="Masukan Jumlah Alat">
                    <br> -->
                                            <label for="namaRuangan" style="color: black;">Nomor Seri Alat</label>
                                            <input type="text" class="form-control" name="seri" placeholder="Masukan Nomor Seri Alat">
                                            <br>
                                            <label for="namaRuangan" style="color: black;">Tahun</label>
                                            <input type="text" class="form-control" name="tahun" placeholder="Masukan Tahun">
                                            <br>
                                            <!-- <label for="namaRuangan" style="color: black;">Keterangan Alat</label>
                    <input type="text" class="form-control" name="keterangan_alat" placeholder="Masukan Keterangan Alat">
                    <br> -->
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
                        <a href="detail.html" class="btn btn-primary float-left mr-2">
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
                                <!-- <th>QTY</th> -->
                                <th>Nomor Seri</th>
                                <th>Sumber Dana</th>
                                <th>Tahun</th>
                                <!-- <th>Keterangan</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Alat</th>
                                <th>Merk</th>
                                <th>Type</th>
                                <!-- <th>QTY</th> -->
                                <th>Nomor Seri</th>
                                <th>Sumber Dana</th>
                                <th>Tahun</th>
                                <!-- <th>Keterangan</th> -->
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($alat as $a) { ?>
                                <tr>
                                    <td><?php echo $a['nama']; ?></td>
                                    <td><?php echo $a['merk']; ?></td>
                                    <td><?php echo $a['tipe']; ?></td>
                                    <!-- <td><?php echo $a['jumlah_alat']; ?></td> -->
                                    <td><?php echo $a['seri']; ?></td>
                                    <td><?php echo $a['sumber']; ?></td>
                                    <td><?php echo $a['tahun']; ?></td>
                                    <!-- <td><?php echo $a['keterangan_alat']; ?></td> -->
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>