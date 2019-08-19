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
                                    <div class="card-category mb-3">Check your email to see verification code</div>
                                    <input type="text" class="form-control" name="verification_code" id="verfication">
                                    <?= form_error('verification_code', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary ">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>