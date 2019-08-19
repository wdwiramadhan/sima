<div class="container mb-5">
    <div class="row mt-5">
        <div class="col-md-6 mb-5">
            <div class="row">
                <div class="col">
                    <p class="text-white" style="font-size:18px">Sistem Informasi Managemen Administrasi</p>
                    <p class="mt--5 text-white"> <span style="font-size:150px" class="text-primary">Sim<span class="text-success">a</span></span><span style="font-size:20px">.01</span></p>
                    <p class="mt--5 text-white" style="font-size:18px"> Sistem terintegrasi managemen administrasi, anggota,
                        rencana dan pelaporan kegiatan, serta keuangan
                        Mata Air Management.</p>
                </div>
            </div>
        </div>
        <div class=" col-md-6">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4">
                                <div class="text-center mb-2 mt--2">
                                    <h2 class="text-gray-900">Login</h2>
                                </div>
                                <?= $this->session->flashdata('message') ?>
                                <form action="<?= base_url('auth'); ?>" method="post">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <span class="input-icon-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control" name="email" placeholder="Email" value="<?= set_value('email') ?>">
                                        </div>
                                        <?= form_error('email', '<small class="text-danger pl-1">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <span class="input-icon-addon">
                                                <i class="fa fa-key"></i>
                                            </span>
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <?= form_error('password', '<small class="text-danger pl-1">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>