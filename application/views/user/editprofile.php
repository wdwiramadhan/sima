<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col">
                    <div class="card p-4">
                        <div class="row no-gutters">
                            <div class="col-md-3">
                                <?= form_open_multipart('user/editprofile/') ?>
                                <img src="<?= base_url('assets/img/user/profile/') . $user['image'] ?>" class="card-img rounded p-3">
                                <div class="form-group pr-3 pl-3 mb-5">
                                    <div>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary btn-block ">Save Profile</button>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card-body p-3">
                                    <div class="card-title ">Edit Profile</div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name" id="name" value="<?= $user['name'] ?>">
                                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="email">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control disabled" name="email" id="email" value="<?= $user['email'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="phone_number">Phone Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?= $user['phone_number'] ?>">
                                                    <?= form_error('phone_number', '<small class="text-danger pl-3">', '</small>') ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="address">Address</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="address" id="address" value="<?= $user['address'] ?>">
                                                    <?= form_error('address', '<small class="text-danger pl-3">', '</small>') ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="address">Hak Akses</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" id="address" value="<?= $user['role_id'] ?>" disabled>
                                                </div>
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