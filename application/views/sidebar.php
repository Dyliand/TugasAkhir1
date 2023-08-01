<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <!-- <img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">Sistem Penjadwalan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>assets/images/logoitda.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $this->session->userdata('username') ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="<?= base_url('home') ?>" class="nav-link active">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard</i>
                        </p>
                    </a>
                </li>
                <!-- Data Jurusan  -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>DataJurusan" class="nav-link">
                        <i class="fas fa-shield-alt"></i>
                        <p>
                            Data Jurusan
                        </p>
                    </a>
                </li>
                <!-- Data Kelas -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>DataRuangan" class="nav-link">
                        <i class="fas fa-school"></i>
                        <p>
                            Data Ruangan
                        </p>
                    </a>
                </li>
                <!-- Data Mapel -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>DataMatkul" class="nav-link">
                        <i class="fas fa-book-open"></i>
                        <p>
                            Data Mata Kuliah
                        </p>
                    </a>
                </li>

                <!-- data guru -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user"></i>
                        <p> Dosen <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>DataDosen" class="nav-link ml-3">
                                <i class="fas fa-user-tie"></i>
                                <p>
                                    Data Dosen
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>DataPenugasanDosen" class="nav-link ml-3">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <p>Penugasan Dosen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>DataRequestJadwal" class="nav-link ml-3">
                                <i class="fas fa-table"></i>
                                <p>
                                    Request Jadwal
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Range Jam -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>DataSks" class="nav-link">
                        <i class="fas fa-table"></i>
                        <p>
                            Jadwal SKS
                        </p>
                    </a>
                </li>
                <!-- Penjadwalan -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>DataJadwal" class="nav-link">
                        <i class="fas fa-table"></i>
                        <p>
                            Penjadwalan
                        </p>
                    </a>
                </li>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>