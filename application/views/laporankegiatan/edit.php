<div class="main-panel">
    <div class="content">
        <div class="page-inner mt-2">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="row mx-0 card-header">
                            <div class="col">
                                <div class="card-title">Edit Laporan Kegiatan</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?= form_open_multipart('kegiatan/laporankegiatan/edit/' . $laporankegiatan['id'] . '') ?>
                            <div class="form-group row">
                                <label for="taSelect" class="col-sm-2 col-form-label">Tahun Anggaran</label>
                                <div class="col-sm-4">
                                    <select class="form-control form-control" id="taSelect" name="tahun_anggaran">
                                        <option selected disabled hidden>Select</option>
                                        <?php foreach ($tahunanggaran as $ta) : ?>
                                        <?php if ($laporankegiatan['tahun_anggaran'] == $ta['tahun']) : ?>
                                        <option value="<?= $ta['tahun'] ?>" selected="selected"><?= $ta['tahun'] ?></option>
                                        <?php else : ?>
                                        <option value="<?= $ta['tahun'] ?>"><?= $ta['tahun'] ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('tahun_anggaran', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="programSelect" class="col-sm-2 col-form-label">Program</label>
                                <div class="col-sm-4">
                                    <select class="form-control form-control" id="programSelect" name="program">
                                        <option selected disabled hidden>Select</option>
                                        <?php foreach ($program as $prgm) : ?>
                                        <?php if ($laporankegiatan['program'] == $prgm['nama_program']) : ?>
                                        <option value="<?= $laporankegiatan['program'] ?>" selected="selected"><?= $laporankegiatan['program'] ?></option>
                                        <?php else : ?>
                                        <option value="<?= $laporankegiatan['program'] ?>"><?= $laporankegiatan['program'] ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('program', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_kegiatan" class="col-sm-2 col-form-label">Nama kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="nama_kegiatan" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Masukan nama kegiatan" value="<?= $laporankegiatan['nama_kegiatan'] ?>">
                                    <?= form_error('nama_kegiatan', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tujuan" class="col-sm-2 col-form-label">Tujuan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Masukan tujuan" value="<?= $laporankegiatan['tujuan'] ?>">
                                    <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sasaran" class="col-sm-2 col-form-label">Sasaran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="sasaran" name="sasaran" placeholder="Masukan sasaran" value="<?= $laporankegiatan['sasaran'] ?>">
                                    <?= form_error('sasaran', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pelaksanaan" class="col-sm-2 col-form-label">Pelaksanaan</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="pelaksanaan" name="pelaksanaan" value="<?= $laporankegiatan['pelaksanaan'] ?>">
                                    <?= form_error('pelaksanaan', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label for="penanggungjawab" class="col-sm-2 col-form-label">Penanggungjawab</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="penanggungjawab" name="penanggungjawab" placeholder="Masukan penanggungjawab" value="<?= $laporankegiatan['penanggungjawab'] ?>">
                                    <?= form_error('penanggungjawab', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="laporan_kegiatan" class="col-sm-2 col-form-label">Laporan Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="laporan_kegiatan" name="laporan_kegiatan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-2">
                                    <button class="btn btn-primary btn-sm" type="submit" name="submit">save</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>