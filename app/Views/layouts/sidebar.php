<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
        </div>

        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= session()->get('name') ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <?php if (session()->get('login')) : ?>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu">
                        <li><a href="<?= base_url('/admin') ?>"><i class="fa fa-home"></i>Dashboard</a></li>
                        <li><a><i class="fa fa-edit"></i> Mahasiswa <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?= base_url('/admin/mahasiswa/add') ?>">Add Mahasiswa</a></li>
                                <li><a href="<?= base_url('/admin/mahasiswa') ?>">Data Mahasiswa</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-desktop"></i> Dosen <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?= base_url('admin/dosen/add') ?>">Add Dosen</a></li>
                                <li><a href="<?= base_url('admin/dosen') ?>">Data Dosen</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-table"></i> Mata Kuliah <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?= base_url('admin/matakuliah/add') ?>">Add MataKuliah</a></li>
                                <li><a href="<?= base_url('admin/matakuliah') ?>">Data MataKuliah</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-table"></i> Jurusan <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?= base_url('admin/jurusan/add') ?>">Add Jurusan</a></li>
                                <li><a href="<?= base_url('admin/jurusan') ?>">Data Jurusan</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url('/admin/absenDosen') ?>"><i class="fa fa-home"></i>Absen Dosen</a></li>
                    </ul>
                </div>
            </div>
        <?php elseif (session()->get('login_dosen')) : ?>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu">
                        <li><a href="<?= base_url('/dosen') ?>"><i class="fa fa-home"></i>Dashboard</a></li>
                        <li><a href="<?= base_url('/dosen/jadwalDosen') ?>"><i class="fa fa-home"></i>Jadwal Kuliah</a></li>
                    </ul>
                </div>
            </div>
        <?php elseif (session()->get('login_mahasiswa')) : ?>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu">
                        <li><a href="<?= base_url('/mahasiswa') ?>"><i class="fa fa-home"></i>Dashboard</a></li>
                        <li><a href="<?= base_url('/mahasiswa/jadwalMahasiswa') ?>"><i class="fa fa-home"></i>Jadwal Kuliah</a></li>
                    </ul>
                </div>
            </div>
        <?php endif ?>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url('logout') ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>