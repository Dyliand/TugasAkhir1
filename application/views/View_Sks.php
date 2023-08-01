<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data SKS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data SKS</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- NOTIFIKASI -->
        <?php
        if ($this->session->flashdata('flash_sks')) { ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h6>
                    <i class="icon fas fa-check"></i>
                    Data Berhasil
                    <strong>
                        <?= $this->session->flashdata('flash_sks');   ?>
                    </strong>
                </h6>
            </div>
        <?php } ?>
        <!-- tambah data -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Tambah Data</h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <?= validation_errors(); ?>
                                <form action="<?= base_url() ?>DataSks/validation_form" method="post" accept-charset="utf-8">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Hari</label>
                                            <br>
                                            <?php
                                            $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at'];
                                            foreach ($hari as $value) {
                                                $checked = '';
                                                if (in_array($value, array_column($sks, 'hari'))) {
                                                    $checked = 'disabled checked';
                                                }
                                            ?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="chkJadwalHari[]" type="checkbox" id="<?= $value ?>" value="<?= $value ?>" <?= $checked ?>>
                                                    <label class="form-check-label" for="<?= $value ?>"><?= $value ?></label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="sesi">SKS Per Hari</label>
                                            <input class="form-control" type="number" name="sks" id="sks" min="5" max="20">
                                        </div>
                                        <div class="form-group">
                                            <label for="durasi">Waktu per SKS</label>
                                            <input class="form-control" type="number" name="durasi" id="durasi" min="10" max="60">
                                        </div>
                                        <div class="form-group">
                                            <label for="waktuMulai">Waktu Sesi Dimulai</label>
                                            <input class="form-control" type="time" name="waktuMulai" id="waktuMulai">
                                        </div>
                                        <input type="submit" name="save" class="btn btn-primary" value="Save">
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- list data -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- card-body -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Hari</th>
                                    <th>SKS Per Hari</th>
                                    <th>Waktu Per SKS</th>
                                    <th>Waktu Sesi Dimulai</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($sks as $row) { ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $row->hari ?></td>
                                        <td><?= $row->jumlah_sks ?></td>
                                        <td><?= $row->lama_sks ?></td>
                                        <td><?= $row->jam_mulai ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url() ?>DataSks/hapus/<?= $row->id_sks   ?>" class="btn btn-danger" onclick="return confirm('yakin ?')">Hapus</a>
                                                <!-- <a href="<?= base_url() ?>DataRangeJam/ubah/<?= $row->id_sks  ?>" class="btn btn-warning">update</a> -->
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->