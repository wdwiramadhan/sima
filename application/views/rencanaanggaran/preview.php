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
                      <a class="nav-link">Belanja</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-primary active">Preview</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="bg-info text-center p-2">
                <a class="text-white fw-bold">Kegiatan</a>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tahun Anggaran</label>
                    <div class="col-sm-9">
                      <a class="form-control" style="border:0"><?= $rencana_anggaran['tahun_anggaran'] ?></a>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Program</label>
                    <div class="col-sm-9">
                      <a class="form-control" style="border:0"><?= $rencana_anggaran['program'] ?></a>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Kegiatan</label>
                    <div class="col-sm-9">
                      <a class="form-control" style="border:0"><?= $rencana_anggaran['nama_kegiatan'] ?></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Pelaksanaan</label>
                    <div class="col-sm-9">
                      <a class="form-control" style="border:0"><?= date_indo($rencana_anggaran['pelaksanaan']) ?></a>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Penanggungjawab</label>
                    <div class="col-sm-9">
                      <a class="form-control" style="border:0"><?= $rencana_anggaran['penanggungjawab'] ?></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bg-info text-center p-2">
                <a class="text-white fw-bold">Anggaran Pendapatan</a>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Uraian</th>
                      <th scope="col">Jumlah (Rp)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $totalpendapatan = 0 ?>
                    <?php $i = 1 ?>
                    <?php foreach ($rencana_anggaran_pendapatans as $rencana_anggaran_pendapatan) : ?>
                      <tr>
                        <td><?= $i ?></td>
                        <td><?= $rencana_anggaran_pendapatan['uraian'] ?></td>
                        <td><?= $rencana_anggaran_pendapatan['jumlah'] ?></td>
                      </tr>
                      <?php $totalpendapatan += $rencana_anggaran_pendapatan['jumlah'] ?>
                      <?php $i++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="bg-info text-center p-2">
                <a class="text-white fw-bold">Anggaran Belanja</a>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Uraian</th>
                      <th scope="col">Volume</th>
                      <th scope="col">Satuan</th>
                      <th scope="col">Harga satuan</th>
                      <th scope="col">Jumlah (Rp)</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $totalbelanja = 0 ?>
                    <?php $i = 1 ?>
                    <?php foreach ($rencana_anggaran_belanjas as $rencana_anggaran_belanja) : ?>
                      <tr>
                        <td><?= $i ?></td>
                        <td><?= $rencana_anggaran_belanja['uraian'] ?></td>
                        <td><?= $rencana_anggaran_belanja['volume'] ?></td>
                        <td><?= $rencana_anggaran_belanja['satuan'] ?></td>
                        <td><?= $rencana_anggaran_belanja['harga_satuan'] ?></td>
                        <td><?= $rencana_anggaran_belanja['jumlah'] ?></td>
                      </tr>
                      <?php $totalbelanja += $rencana_anggaran_belanja['jumlah'] ?>
                      <?php $i++ ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="bg-info text-center p-2">
                <a class="text-white fw-bold">Keterangan</a>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group row mt-3">
                    <label class="col-sm-3 col-form-label">Jumlah Pendapatan</label>
                    <div class="col-sm-9">
                      <a class="form-control" style="border:0"><?= $totalpendapatan ?></a>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jumlah Belanja</label>
                    <div class="col-sm-9">
                      <a class="form-control" style="border:0"><?= $totalbelanja ?></a>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Saldo</label>
                    <div class="col-sm-9">
                      <a class="form-control" style="border:0"><?= ($totalpendapatan-$totalbelanja) ?></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>