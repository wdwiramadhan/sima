<div class="main-panel">
    <div class="content">
        <div class="page-inner mt-2">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="row mx-0 card-header">
                            <div class="col">
                                <div class="card-title">Tambah Master Users</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" name="name" placeholder="Masukan nama" value="<?= set_value('name') ?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email" value="<?= set_value('email') ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password" value="<?= set_value('password') ?>">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="telephone" class="col-sm-2 col-form-label">No. Telephone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="telephone" name="phone_number" placeholder="Masukan nomor telephone" value="<?= set_value('phone_number') ?>">
                                        <?= form_error('phone_number', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="defaultSelect" class="col-sm-2 col-form-label">Hak Akses</label>
                                    <div class="col-sm-4">
                                        <select class="form-control form-control" id="defaultSelect" name="role_id" value="<?= set_value('role_id') ?>">
                                            <option selected disabled hidden>Select</option>
                                            <option value="1">Superadmin</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Bendahara</option>
                                        </select>
                                        <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-primary btn-sm" type="submit" name="submit">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>