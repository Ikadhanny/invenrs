<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                Daftar Ruangan
                            </h1>
                        </div>
                        <div class="col-auto mt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <form class="d-flex" action="<?php echo base_url('user/home/tambahRuangan'); ?>" method="POST">
                                    <!-- <input type="text" class="form-control mr-2" placeholder="Cari ruangan..."> -->
                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i></button>
                                </form>
                            </div>
                        </div>
                        <form action="<?php echo base_url('user/home/tambahRuangan'); ?>" method="POST">
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Ruangan Utama</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="namaRuangan" style="color: black;">Nama Ruangan</label>
                                            <br><br>
                                            <input type="text" class="form-control" name="nama_ruangan" placeholder="Masukan Nama Ruangan" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                        // Retrieve the message from session
                        $message = $this->session->flashdata('message');
                        if ($message) {
                            echo '<p>' . $message . '</p>';
                        }
                        ?>


                        <?php if (isset($message)) : ?>
                            <div class="alert alert-danger"><?php echo $message; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </header>


        <!-- Main page content -->
        <div class="container-xl px-4 mt-n10">
            <!-- Wizard card example with navigation-->
            <div class="card">

                <div class="card-header border-bottom">
                    <!-- Wizard navigation-->
                    <div class=container-xl px-4>
                        <main>
                            <!-- Main content area -->

                            <!-- Tampilkan daftar ruangan di bawah header -->

                            <div class="container-xl px-4">
                                <div class="row">
                                    <?php foreach ($ruang as $key => $ruangan_item) : ?>

                                        <div class="card card-icon lift lift-sm mb-4">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="h5 card-title mb-0">
                                                        <a href="<?php echo base_url('user/ruangan/detail/' . $ruangan_item->kode); ?>"><?php echo $ruangan_item->nama; ?></a>
                                                        <!-- <a href="detail.html"><?php echo $ruangan_item->nama; ?></a> -->
                                                    </div>
                                                    <div>
                                                        <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $key; ?>"><i class="fas fa-pencil"></i></button>
                                                        <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $key; ?>"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="deleteModal<?php echo $key; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo $key; ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel<?php echo $key; ?>">Konfirmasi Hapus Ruangan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin menghapus ruangan ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <a class="btn btn-danger" href="<?php echo base_url('user/home/delete/' . $ruangan_item->kode); ?>">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editModal<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Ruangan</h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url('user/home/update'); ?>" method="POST">
                                                            <label for="namaRuangan" style="color: black;">Edit Nama Ruangan</label>
                                                            <br><br>
                                                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Ruangan" value="">
                                                            <input type="hidden" name="kode" value="<?php echo $ruangan_item->kode; ?>">
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                                                                <button class="btn btn-primary" type="submit">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                </div>
                            </div>