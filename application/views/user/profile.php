<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col">
                    <div class="card p-4">
                        <div class="row pl-3 pr-3">
                            <div class="col">
                                <?= $this->session->flashdata('message') ?>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col">
                                <img src="<?= base_url('/assets/img/user/profile/') . $user['image'] ?>" class="card-img rounded p-3">
                                <div class="card-body mt-5">
                                    <a href="<?= base_url('user/editprofile/') ?>" class="btn btn-primary btn-block">Edit Profile</a>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <div class="card-title">User Profile</div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <form action="" method="post">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Nama</label>
                                                    <div class="col-sm-10">
                                                        <a class="form-control"><?= $user['name'] ?></a>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <a class="form-control"><?= $user['email'] ?></a>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">No. Telephone</label>
                                                    <div class="col-sm-10">
                                                        <a class="form-control"><?= $user['phone_number'] ?></a>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                                    <div class="col-sm-10">
                                                        <a class="form-control"><?= $user['address'] ?></a>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Hak Akses</label>
                                                    <div class="col-sm-10">
                                                        <a class="form-control"><?php if ($user['role_id'] == 1) : ?>Super Administrator<?php elseif ($user['role_id'] == 2) : ?>Administrator <?php elseif ($user['role_id'] == 3) : ?>Bendahara<?php endif; ?></a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>