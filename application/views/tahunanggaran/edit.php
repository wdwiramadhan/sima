<div class="main-panel">
  <div class="content">
    <div class="page-inner mt-2">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="row mx-0 card-header">
              <div class="col">
                <div class="card-title">Edit Master Tahun Anggaran</div>
              </div>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <input type="hidden" name="id" value="<?= $tahunanggaran['id'] ?>">
                <div class="form-group row">
                  <label for="tahun_anggaran" class="col-sm-2 col-form-label">Tahun anggaran</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tahun_anggaran" name="tahun" value="<?= $tahunanggaran['tahun'] ?>">
                    <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>') ?>
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