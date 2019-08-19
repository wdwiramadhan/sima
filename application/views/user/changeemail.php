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
                                    <label for="new_email">New email</label>
                                    <input type="email" class="form-control" name="email" id="new_email">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>