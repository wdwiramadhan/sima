<div class="main-panel">
  <div class="content">
    <div class="page-inner mt-2">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="row mx-0 ">
              <div class="col">
                <div class="card-title mt-3 ml-3">Tambah Rencana Anggaran</div>
                <div class="div mt-3">
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link">Kegiatan</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link  text-primary active">Pendapatan</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link">Belanja</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link">Preview</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Uraian</th>
                      <th scope="col">Jumlah (Rp)</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $total = 0 ?>
                    <?php $i = 1 ?>
                    <?php foreach ($rencana_anggaran_pendapatans as $rencana_anggaran_pendapatan) : ?>
                      <tr>
                        <td><?= $i ?></td>
                        <td><?= $rencana_anggaran_pendapatan['uraian'] ?></td>
                        <td><?= $rencana_anggaran_pendapatan['jumlah'] ?></td>
                        <td>
                          <a href="<?= base_url('keuangan/rencanaanggaran/deletep/' . $rencana_anggaran_pendapatan['id'] . '') ?>" class="text-danger"><i class="fas fa-fw fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php $total += $rencana_anggaran_pendapatan['jumlah'] ?>
                      <?php $i++ ?>
                    <?php endforeach; ?>
                    <tr class="bg-white">
                      <th colspan="4" class="text-center">Jumlah Rencana Pendapatan : <?= $total ?></th>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="mt-5">
                <form action="<?= base_url('keuangan/rencanaanggaran/addp/' . $lastrow['id'] . '') ?>" method="post">
                  <div class="form-group row">
                    <label for="uraian" class="col-sm-2 col-form-label">Uraian</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="uraian" name="uraian" placeholder="Masukan uraian" value="<?= set_value('uraian') ?>">
                      <?= form_error('uraian', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan jumlah" value="<?= set_value('jumlah') ?>">
                      <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2">
                      <button class="btn btn-primary btn-sm" type="submit" name="submit">Tambah</button>
                      <a href="<?= base_url('keuangan/rencanaanggaran/addb/' . $lastrow['id'] . '') ?>" class="btn btn-warning btn-sm">Next</a>
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