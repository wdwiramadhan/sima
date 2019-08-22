<div class="main-panel">
    <div class="content">
        <div class="page-inner mt-2">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="row mx-0 card-header">
                            <div class="col">
                                <div class="card-title">Edit Inventaris</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('inventaris/edit/'). $inventaris['id'] ?>" method="post">
                                <div class="form-group row">
                                    <label for="defaultSelect" class="col-sm-2 col-form-label">Tahun</label>
                                    <div class="col-sm-2">
                                        <select class="form-control form-control" id="defaultSelect" name="tahun" value="<?= set_value('tahun') ?>">
                                            <option selected disabled hidden>Select</option>
                                            <?php foreach ($tahunangkatan as $tahun) : ?>
                                                <?php if ($inventaris['tahun'] == $tahun['tahun']) : ?>
                                                    <option value="<?= $tahun['tahun'] ?>" selected="selected"><?= $tahun['tahun'] ?></option c>
                                                <?php else : ?>
                                                    <option value="<?= $tahun['tahun'] ?>"><?= $tahun['tahun'] ?></option>
                                                <?php endif; ?>

                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_inventaris" class="col-sm-2 col-form-label">No. Inventaris</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="no_inventaris" name="no_inventaris" placeholder="Masukan nomor inventaris" autocomplete="off" value="<?= $inventaris['no_inventaris'] ?>">
                                        <?= form_error('no_inventaris', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukan nama barang" autocomplete="off" value="<?= $inventaris['nama_barang'] ?>">
                                        <?= form_error('nama_barang', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan jumlah" autocomplete="off" value="<?= $inventaris['jumlah'] ?>" value="<?= $inventaris['jumlah'] ?>">
                                        <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="spesifikasi" class="col-sm-2 col-form-label">Spesifikasi</label>
                                    <div class="col-sm-10">
                                        <textarea rows="3" type="text" class="form-control" id="spesifikasi" name="spesifikasi" placeholder="Masukan spesifikasi" autocomplete="off"><?= $inventaris['spesifikasi'] ?></textarea>
                                        <?= form_error('spesifikasi', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="status" name="status" placeholder="Masukan status" autocomplete="off" value="<?= $inventaris['status'] ?>">
                                        <?= form_error('status', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sumber" class="col-sm-2 col-form-label">Sumber</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="sumber" name="sumber" placeholder="Masukan sumber" autocomplete="off" value="<?= $inventaris['sumber'] ?>">
                                        <?= form_error('sumber', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukan harga" autocomplete="off" value="<?= $inventaris['harga'] ?>">
                                        <?= form_error('harga', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal_inventaris" class="col-sm-2 col-form-label">Tanggal Inventaris</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="tanggal_inventaris" name="tanggal_inventaris" value="<?= $inventaris['tanggal_inventaris'] ?>">
                                        <?= form_error('tanggal_inventaris', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
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