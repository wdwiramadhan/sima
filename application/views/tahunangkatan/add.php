<div class="main-panel">
  <div class="content">
    <div class="page-inner mt-2">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="row mx-0 card-header">
              <div class="col">
                <div class="card-title">Tambah Master Tahun Angkatan</div>
              </div>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group row">
                  <label for="tahun_angkatan" class="col-sm-2 col-form-label">Tahun Angkatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tahun_angkatan" name="tahun" placeholder="Masukan tahun angkatan" autocomplete="off">
                    <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>') ?>
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