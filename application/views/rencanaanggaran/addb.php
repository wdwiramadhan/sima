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
                      <a class="nav-link ">Pendapatan</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-primary active">Belanja</a>
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
                      <th scope="col">Volume</th>
                      <th scope="col">Satuan</th>
                      <th scope="col">Harga Satuan (Rp)</th>
                      <th scope="col">Jumlah (Rp)</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $total = 0 ?>
                    <?php $i = 1 ?>
                    <?php foreach ($rencana_anggaran_belanjas as $rencana_anggaran_belanja) : ?>
                      <tr>
                        <td><?= $i ?></td>
                        <td><?= $rencana_anggaran_belanja['uraian'] ?></td>
                        <td><?= $rencana_anggaran_belanja['volume'] ?></td>
                        <td><?= $rencana_anggaran_belanja['satuan'] ?></td>
                        <td><?= $rencana_anggaran_belanja['harga_satuan'] ?></td>
                        <td><?= $rencana_anggaran_belanja['jumlah'] ?></td>
                        <td>
                          <a href="<?= base_url('keuangan/rencanaanggaran/deleteb/' . $rencana_anggaran_belanja['id'] . '') ?>" class="text-danger"><i class="fas fa-fw fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php $total += $rencana_anggaran_belanja['jumlah'] ?>
                      <?php $i++ ?>
                    <?php endforeach; ?>
                    <tr class="bg-white">
                      <th colspan="7" class="text-center">Jumlah Rencana Belanja : <?= $total ?></th>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="mt-5">
                <form action="<?= base_url('keuangan/rencanaanggaran/addb/' . $lastrow['id'] . '') ?>" method="post">
                  <div class="form-group row">
                    <label for="uraian" class="col-sm-2 col-form-label">Uraian</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="uraian" name="uraian" placeholder="Masukan uraian" value="<?= set_value('uraian') ?>">
                      <?= form_error('uraian', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="volume" class="col-sm-2 col-form-label">Volume</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="volume" name="volume" placeholder="Masukan volume" value="<?= set_value('volume') ?>">
                      <?= form_error('volume', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Contoh : buah, m, m2" value="<?= set_value('satuan') ?>">
                      <?= form_error('satuan', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="harga_satuan" class="col-sm-2 col-form-label">Harga Satuan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" placeholder="Masukan harga satuan" value="<?= set_value('harga_satuan') ?>">
                      <?= form_error('harga_satuan', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2">
                      <button class="btn btn-primary btn-sm" type="submit" name="submit">Tambah</button>
                      <a href="<?= base_url('keuangan/rencanaanggaran/preview/' . $lastrow['id'] . '') ?>" class="btn btn-warning btn-sm">Next</a>
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