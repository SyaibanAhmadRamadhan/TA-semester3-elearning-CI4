<div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a href="<?= base_url('/admin') ?>" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-label">Fitur</li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Mahasiswa</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('/admin/mahasiswa/add') ?>">Add Mahasiswa</a></li>
                            <li><a href="<?= base_url('/admin/mahasiswa') ?>">Data Mahasiswa</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Dosen</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./layout-blank.html">Add Dosen</a></li>
                            <li><a href="./layout-one-column.html">Data Dosen</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">MataKuliah</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./layout-blank.html">Add MataKuliah</a></li>
                            <li><a href="./layout-one-column.html">Data MataKuliah</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>