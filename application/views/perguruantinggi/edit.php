<div class="main-panel">
    <div class="content">
        <div class="page-inner mt-2">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="card-title">Edit Master Perguruan Tinggi</div>
                                </div>
                            </div>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $perguruantinggi['id'] ?>">
                                <div class="form-group row">
                                    <label for="perguruantinggi" class="col-sm-2 col-form-label">Perguruan Tinggi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="perguruantinggi" name="nama_pt" value="<?= $perguruantinggi['nama_pt'] ?>" autocomplete="off">
                                        <?= form_error('nama_pt', '<small class="text-danger pl-3">', '</small>') ?>
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