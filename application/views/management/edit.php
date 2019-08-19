<div class="main-panel">
  <div class="content">
    <div class="page-inner mt-2">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="row mx-0 card-header">
              <div class="col">
                <div class="card-title">Edit Master Management</div>
              </div>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <input type="hidden" name="id" value="<?= $management['id'] ?>">
                <div class="form-group row">
                  <label for="management" class="col-sm-2 col-form-label">Management</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="management" name="management" value="<?= $management['management'] ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kabupaten" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="<?= $management['kabupaten'] ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $management['alamat'] ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?= $management['email'] ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kontak" class="col-sm-2 col-form-label">Kontak</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="kontak" name="kontak" value="<?= $management['kontak'] ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="manager" class="col-sm-2 col-form-label">Manager</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="manager" name="manager" value="<?= $management['manager'] ?>">
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