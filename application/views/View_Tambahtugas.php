<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Dosen Pengampu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Dosen Pengampu</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- NOTIFIKASI -->
        <?php
        if ($this->session->flashdata('flash_penugasandosen')) { ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h6>
                    <i class="icon fas fa-check"></i>
                    Data Berhasil
                    <strong>
                        <?= $this->session->flashdata('flash_penugasandosen');   ?>
                    </strong>
                </h6>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Penugasan Dosen Matkul : <br> <b> <?= $nama ?></b></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('DataPenugasanDosen/tambah') ?>" method="POST">
                            <input type="hidden" value="<?= count($dataMatkul) ?>" name="jml_data">
                            <input type="hidden" value="<?= $kodeMatkul ?>" name="kode_matkul">
                            <?php
                            $data = 0;
                            foreach ($dataMatkul as $value) { ?>
                                <div class="form-group" data-group='<?= $data ?>'>
                                    <label for="exampleFormControlInput1"><?= $value->ruangan ?> <?= $value->id_jurusan ?> <?= $value->nama_ruangan ?></label>
                                    <?php if ($value->id_dosen == null) { ?>
                                        <input type="hidden" value="<?= $value->id_ruangan ?>" name="id_ruangan[]">
                                        <input type="hidden" value="<?= $value->id_matkul ?>" name="id_matkul[]">
                                        <input type="hidden" value="<?= $value->sks ?>" name="sks[]">
                                    <?php } else { ?>
                                        <input type="hidden" class="form-ruangan" value="<?= $value->id_ruangan ?>" name="id_ruangan[]" disabled>
                                        <input type="hidden" class="form-matkul" value="<?= $value->id_matkul ?>" name="id_matkul[]" disabled>
                                        <input type="hidden" class="form-sks" value="<?= $value->sks ?>" name="sks[]" disabled>
                                    <?php } ?>
                                    <?php if ($value->id_dosen == null) { ?>
                                        <div class="row">
                                            <div class="col-10">
                                                <select name="dosen[]" class="form-control">
                                                    <option selected="selected">Pilih Dosen</option>
                                                    <?php foreach ($dosen as $datalistDosen) : ?>
                                                        <option value="<?= $datalistDosen->id_dosen ?>"><?= $datalistDosen->nama_dosen ?> </option>;
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="row">
                                            <div class="col-10">
                                                <select name="dosen[]" class="form-control select-dosen" disabled>
                                                    <?php foreach ($dosen as $datalistDosen) :
                                                        $selected = ($value->id_dosen == $datalistDosen->id_dosen) ? 'selected' : ''; ?>
                                                        <option value="<?= $datalistDosen->id_dosen ?>" <?= $selected ?>><?= $datalistDosen->nama_dosen ?> </option>;
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <div class="btn btn-danger hapus-data" data-idtugas="<?= $value->id_tugas ?>" data-group="<?= $data ?>">hapus</div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php
                                $data++;
                            } ?>
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!--  /.content-wrapper -->