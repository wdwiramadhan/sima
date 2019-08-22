<div class="main-panel">
    <div class="content">
        <div class="page-inner mt-2">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="row mx-0 card-header">
                            <div class="col">
                                <div class="card-title">Edit Master Users</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('master/users/edit/').$users['id'] ?>" method="post">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" name="name" value="<?= $users['name'] ?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email" value="<?= $users['email'] ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="telephone" class="col-sm-2 col-form-label">No. Telephone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="telephone" name="phone_number" value="<?= $users['phone_number'] ?>">
                                        <?= form_error('phone_number', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="defaultSelect" class="col-sm-2 col-form-label">Hak Akses</label>
                                    <div class="col-sm-10">
                                        <select class="form-control form-control" id="defaultSelect" name="role_id">
                                            <option selected disabled hidden>Select</option>
                                            <?php if ($users['role_id'] == 1) : ?>
                                                <option value="1" selected="selected">
                                                <?php else : ?>
                                                <option value="1">
                                                <?php endif; ?>
                                                Superadmin</option>
                                            <?php if ($users['role_id'] == 2) : ?>
                                                <option value="2" selected="selected">
                                                <?php else : ?>
                                                <option value="2">
                                                <?php endif; ?>
                                                Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-primary btn-sm" type="submit" name="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>