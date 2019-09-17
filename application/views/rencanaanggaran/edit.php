<div class="main-panel">
  <div class="content">
    <div class="page-inner mt-2">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="row mx-0 card-header">
              <div class="col">
                <div class="card-title">Edit Rencana Anggaran</div>
              </div>
            </div>
            <div class="card-body">
              <form action="<?= base_url('keuangan/rencanaanggaran/edit/') ?>" method="post">
                <div class="form-group row">
                  <label for="taSelect" class="col-sm-2 col-form-label">Tahun Anggaran</label>
                  <div class="col-sm-4">
                    <select class="form-control form-control" id="taSelect" name="tahun_anggaran" value="<?= set_value('tahun_anggaran') ?>">
                      <option selected disabled hidden>Select</option>
                      <?php foreach ($tahunanggaran as $ta) : ?>
                      <option value="<?= $ta['tahun'] ?>"><?= $ta['tahun'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('tahun_anggaran', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="programSelect" class="col-sm-2 col-form-label">Program</label>
                  <div class="col-sm-4">
                    <select class="form-control form-control" id="programSelect" name="program" value="<?= set_value('program') ?>">
                      <option selected disabled hidden>Select</option>
                      <?php foreach ($program as $prgm) : ?>
                      <option value="<?= $prgm['nama_program'] ?>"><?= $prgm['nama_program'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('program', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="namaKegiatanSelect" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                  <div class="col-sm-4">
                    <select class="form-control form-control" id="namaKegiatanSelect" name="nama_kegiatan" value="<?= set_value('nama_kegiatan') ?>">
                      <option selected disabled hidden>Select</option>
                      <?php foreach ($rencanakegiatan as $rk) : ?>
                      <option value="<?= $rk['nama_kegiatan'] ?>"><?= $rk['nama_kegiatan'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('nama_kegiatan', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="pelaksanaan" class="col-sm-2 col-form-label">Pelaksanaan</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control" id="pelaksanaan" name="pelaksanaan" value="<?= set_value('pelaksanaan') ?>">
                    <?= form_error('pelaksanaan', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="penanggungjawab" class="col-sm-2 col-form-label">Penanggungjawab</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="penanggungjawab" name="penanggungjawab" placeholder="Masukan penanggungjawab" value="<?= set_value('penanggungjawab') ?>">
                    <?= form_error('penanggungjawab', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-2">
                    <button class="btn btn-primary btn-sm" type="submit" name="submit">Next</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>