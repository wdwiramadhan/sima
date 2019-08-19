<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?= base_url('assets/img/user/profile/' . $user['image'] . '') ?>" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a href="<?= base_url('user/profile') ?>">
                        <span>
                            <?= $user['name'] ?>
                            <span class="user-level">
                                <?php if ($user['role_id'] == 1) : ?>
                                Super Administrator
                                <?php elseif ($user['role_id'] == 2) : ?>
                                Administrator
                                <?php elseif ($user['role_id'] == 3) : ?>
                                Bendahara
                                <?php endif; ?>
                            </span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <?php if ($user['role_id'] == 1 || $user['role_id'] == 2) : ?>
                <?php if ($this->uri->segment(1) == 'dashboard') : ?>
                <li class="nav-item active ">
                    <?php else : ?>
                <li class="nav-item ">
                    <?php endif; ?>
                    <a href="<?= base_url('dashboard') ?>" class="mb-2">
                        <i class="icon-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php endif; ?>
                <!-- Query Menu -->
                <?php
                $role_id = $this->session->userdata('role_id');
                $queryMenu = "SELECT `user_menu`.`id`,`menu`,`icon`
                FROM `user_menu` JOIN `user_access_menu` 
                ON `user_menu`.`id` =  `user_access_menu`.`menu_id`
                WHERE `user_access_menu`.`role_id` = $role_id
                ORDER BY `user_access_menu`.`menu_id` ASC ";

                $menu = $this->db->query($queryMenu)->result_array();
                ?>

                <!-- Looping Menu -->
                <?php foreach ($menu as $m) : ?>
                <?php if (strtolower($m['menu']) == $this->uri->segment(1)) : ?>
                <li class="nav-item active ">
                    <?php else : ?>
                <li class="nav-item ">
                    <?php endif; ?>
                    <a data-toggle="collapse" href="#<?= $m['menu'] ?>" class="collapsed" aria-expanded="false">
                        <i class="<?= $m['icon'] ?>"></i>
                        <p><?= $m['menu'] ?></p>
                        <span class="caret"></span>
                    </a>
                    <!-- Siapkan sub-menu sesuai menu -->
                    <?php
                        $menuId = $m['id'];
                        $querySubMenu = "SELECT *
                    FROM `user_submenu` JOIN `user_menu` 
                    ON `user_submenu`.`menu_id` =  `user_menu`.`id`
                    WHERE `user_submenu`.`menu_id` = $menuId
                    AND `user_submenu`.`is_active` = 1 ";

                        $subMenu = $this->db->query($querySubMenu)->result_array();
                        ?>
                    <?php if (strtolower($m['menu']) == $this->uri->segment(1)) : ?>
                    <div class="collapse show" id="<?= $m['menu'] ?>">
                        <?php else : ?>
                        <div class="collapse" id="<?= $m['menu'] ?>">
                            <?php endif; ?>
                            <ul class="nav nav-collapse">
                                <?php foreach ($subMenu as $sm) : ?>
                                <?php if ($title == $sm['title']) : ?>
                                <li class="active">
                                    <?php else : ?>
                                <li>
                                    <?php endif; ?>
                                    <a href="<?= base_url() . $sm['url'] ?>">
                                        <span class="sub-item"><?= $sm['title'] ?></span>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->