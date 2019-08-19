<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-5">
                    <div class="card p-3">
                        <div class="card-body">
                            <?= $this->session->flashdata('message') ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control disabled" name="current_password" id="email">
                                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="new_password1">New Password</label>
                                    <input type="password" class="form-control disabled" name="new_password1" id="new_password1">
                                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="new_password2">Repeat Password</label>
                                    <input type="password" class="form-control disabled" name="new_password2" id="new_password2">
                                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>