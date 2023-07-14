<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-">
                            <h1 class="page-header-title">
                                <!-- <div class="page-header-subtitle">An extension of the Simple DataTables library, customized for SB Admin Pro</div> -->
                                <?php if (!empty($sub_ruang)) : ?>
                                    <a href="<?php echo base_url('administrator/alat/detail/' . $sub_ruang[0]->kode_ruang); ?>" class="btn btn-primary btn-back">
                                    <?php endif; ?>


                                    <div class="box-icon">
                                        <i class="fas fa-reply"></i>
                                    </div>
                                    </a>

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
                        Daftar Edit ruangan
                    </h1>

                </div>
                <div class="container-fluid">
                    <div class="alert alert-success" role="alert">
                        <i class="fas fa-edit"></i> Form Update
                    </div>
                    <?php foreach ($alat as $alat) : ?>
                        <form action="<?php echo base_url('administrator/alat/updateAlat'); ?>" method="post">
                            <input type="hidden" name="id_alat" value="<?php echo $alat->id_alat ?>">
                            <input type="hidden" name="kode_ruang" value="<?php echo $alat->kode_ruang ?>">
                            <label for="namaRuangan" style="color: black;">Nama Alat</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Alat" value="<?php echo $alat->nama ?>">
                            <br>
                            <label for="namaRuangan" style="color: black;">Merk Alat</label>
                            <input type="text" class="form-control" name="merk" placeholder="Masukan Merk Alat" value="<?php echo $alat->merk ?>">
                            <br>
                            <label for="namaRuangan" style="color: black;">Type Alat</label>
                            <input type="text" class="form-control" name="tipe" placeholder="Masukan Type Alat" value="<?php echo $alat->tipe ?>">
                            <br>
                            <label for="namaRuangan" style="color: black;">Nomor Seri Alat</label>
                            <input type="text" class="form-control" name="seri" placeholder="Masukan Nomor Seri Alat" value="<?php echo $alat->seri ?>">
                            <br>
                            <label for="namaRuangan" style="color: black;">Tahun</label>
                            <input type="text" class="form-control" name="tahun" placeholder="Masukan Tahun" value="<?php echo $alat->tahun ?>">
                            <br>
                            <label for="exampleFormControlSelect1" style="color:black">Sumber Dana</label>
                            <select class="form-control" name="sumber" id="exampleFormControlSelect1">
                                <option>--Sumber Dana--</option>
                                <option value="APBN" <?php if ($alat->sumber == "APBN") echo "selected"; ?>>APBN</option>
                                <option value="APBD" <?php if ($alat->sumber == "APBD") echo "selected"; ?>>APBD</option>
                                <option value="DAK" <?php if ($alat->sumber == "DAK") echo "selected"; ?>>DAK</option>
                            </select>
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>