<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col">
                    <div class="card p-4">
                        <div class="col">
                            <?= $this->session->flashdata('message') ?>
                        </div>
                        <table class="table table-hover">
                            <tbody>
                                <tr onclick="location.href='<?= base_url('user/accountset/changeemail') ?>'">
                                    <th scope="row">Email</th>
                                    <td><?= $user['email'] ?></td>
                                    <td><i class="fas fa-fw icon-arrow-right float-right"></i></td>
                                </tr>
                                <tr onclick="location.href='<?= base_url('user/accountset/changepassword') ?>'">
                                    <th scope="row">Password</th>
                                    <td>********</td>
                                    <td><i class="fas fa-fw icon-arrow-right  float-right"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>