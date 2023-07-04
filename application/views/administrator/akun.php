<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                Daftar Akun
                            </h1>
                        </div>
                        <div class="col-auto mt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <form class="d-flex" action="<?php echo base_url('administrator/home/tambahPengguna'); ?>" method="POST">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i></button>
                                </form>
                            </div>
                        </div>
                        <?php
                        // Ambil nilai 'id' dari URL
                        $id = $this->uri->segment(3);
                        ?>

                        <form action="<?php echo base_url('administrator/Users/create/' . $id); ?>" method="POST">

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="namaPengguna" style="color: black;">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Lengkap" required>
                                            <br><br>
                                            <label for="namaPengguna" style="color: black;">Nama Panggilan</label>
                                            <input type="text" class="form-control" name="username" placeholder="Masukan Nama Panggilan" required>
                                            <br><br>
                                            <label for="namaPengguna" style="color: black;">Password</label>
                                            <input type="text" class="form-control" name="password" placeholder="Masukan Password" required>
                                            <br><br>
                                            <label for="namaPengguna" style="color: black;">Level</label>
                                            <select name="level" class="form-control">
                                                <option value="">--Pilih Level--</option>
                                                <?php
                                                if ($level == 'admin') {
                                                ?>
                                                    <option value="admin" selected>Admin</option>
                                                    <option value="user">User</option>

                                                <?php
                                                } elseif ($level == 'user') {
                                                ?>

                                                    <option value="admin">Admin</option>
                                                    <option value="user" selected>User</option>

                                                <?php
                                                } else {
                                                ?>
                                                    <option value="admin">Admin</option>
                                                    <option value="user">User</option>

                                                <?php } ?>

                                            </select>
                                            <br>
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

                            <!-- Tampilkan daftar Pengguna di bawah header -->

                            <div class="container-xl px-4">
                                <div class="row">
                                    <?php foreach ($users as $key => $user_item) { ?>
                                        <div class="card card-icon lift lift-sm mb-4">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="h5 card-title mb-0">
                                                        <?php echo $user_item->nama; ?>
                                                    </div>
                                                    <div>
                                                        <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $key; ?>"><i class="fas fa-pencil"></i></button>
                                                        <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $key; ?>"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $key; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel<?php echo $key; ?>">Edit User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form Edit -->
                                                        <form action="<?php echo base_url('administrator/Users/update_aksi/' . $user_item->id); ?>" method="POST">
                                                            <div class="form-group">
                                                                <label for="namaPengguna" style="color: black;">Nama Lengkap</label>
                                                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" value="<?php echo $user_item->nama; ?>" required>
                                                                <br><br>
                                                                <label for="namaPanggilan" style="color: black;">Nama Panggilan</label>
                                                                <input type="text" class="form-control" name="username" placeholder="Masukkan Nama Panggilan" value="<?php echo $user_item->username; ?>" required>
                                                                <br><br>
                                                                <label for="Password" style="color: black;">Password</label>
                                                                <input type="text" class="form-control" name="password" placeholder="Masukkan Password" required>
                                                            </div>
                                                            <!-- Add other input fields as needed to edit user data -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?php echo $key; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel<?php echo $key; ?>">Delete User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this user?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <a href="<?php echo base_url('administrator/Users/hapus/' . $user_item->id); ?>" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                    </div>
                </div>
            </div>