<div class="main-panel">
    <div class="content">
        <div class="page-inner mt-2">
            <div class="row">
                <div class="col">
                    <?= $this->session->flashdata('message') ?>
                    <div class="card">
                        <div class="row mx-0 card-header">
                            <div class="col">
                                <div class="card-title">Laporan Kegiatan</div>
                            </div>
                            <div class="col">
                                <a href="<?= base_url('kegiatan/laporankegiatan/add') ?>" class="btn btn-primary btn-sm float-right">Tambah</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="10">No</th>
                                            <th scope="col">Tahun Anggaran</th>
                                            <th scope="col">Nama Kegiatan</th>
                                            <th scope="col">Pelaksanaan</th>
                                            <th scope="col">Penanggung Jawab</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>