<div class="main-panel">
  <div class="content">
    <div class="page-inner mt-2">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="row mx-0 card-header">
              <div class="col">
                <div class="card-title">Master Management</div>
              </div>
              <div class="col">
                <a href="<?= base_url('master/management/edit/') ?>" class="btn btn-primary btn-sm float-right">Edit</a>
              </div>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group row">
                  <label for="management" class="col-sm-2 col-form-label">Management</label>
                  <div class="col-sm-10">
                    <a id="management" class="form-control"><?= $management['management'] ?></a>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kabupaten" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
                  <div class="col-sm-10">
                    <a class="form-control" id="kabupaten"><?= $management['kabupaten'] ?></a>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <a class="form-control" id="alamat"><?= $management['alamat'] ?></a>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <a class="form-control" id="email"><?= $management['email'] ?></a>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kontak" class="col-sm-2 col-form-label">Kontak</label>
                  <div class="col-sm-10">
                    <a class="form-control" id="kontak"><?= $management['kontak'] ?></a>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="manager" class="col-sm-2 col-form-label">Manager</label>
                  <div class="col-sm-10">
                    <a class="form-control" id="manager"> <?= $management['manager'] ?></a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>