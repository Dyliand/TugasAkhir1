Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Ubah Data Tugas Dosen</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Data Tugas Dosen</li>
            <li class="breadcrumb-item active">Ubah Data Tugas</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- tambah data -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Ubah Data</h5>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <?= validation_errors(); ?>
                <form action="" method="post" accept-charset="utf-8">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">ID Penugasan Dosen</label>
                      <input type="text" class="form-control disabled" name="id_pen" value="<?= $ubah['id_tugas'] ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label>Nama Dosen</label>
                      <select class="form-control" name="id_gur" value="<?= $ubah['id_dosen'] ?>">
                        <?php
                        foreach ($dosen as $dos) { ?>
                          <option value="<?= $dos->id_dosen ?>"><?= $dos->nama_dosen ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Matkul</label>
                      <select class="form-control" name="id_mat" value="<?= $ubah['id_matkul'] ?>">
                        <?php
                        foreach ($matkul as $mat) { ?>
                          <option value="<?= $mat->id_matkul ?>"><?= $mat->nama_matkul ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Ruangan</label>
                      <select class="form-control" name="id_ruang" value="<?= $ubah['id_ruangan'] ?>">
                        <?php
                        foreach ($ruangan as $rua) { ?>
                          <option value="<?= $rua->id_ruangan ?>"><?= $rua->ruangan ?></option>
                        <?php } ?>
                      </select>
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
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper