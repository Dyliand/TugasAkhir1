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
    <?php
    if (empty($jurusan)) {
      echo '<div class="alert alert-danger alert-dismissible">';
      echo '<button type="button" class="close" data-dismiss="alert";aria-hidden="true">×</button>';
      echo '<h5><i class="fas fa-times"></i> Alert!</h5>';
      echo 'Data Jurusan Belum Terisi';
      echo '</div>';
    }
    if (empty($ruangan)) {
      echo '<div class="alert alert-danger alert-dismissible">';
      echo '<button type="button" class="close" data-dismiss="alert";aria-hidden="true">×</button>';
      echo '<h5><i class="fas fa-times"></i> Alert!</h5>';
      echo 'Data Ruangan Belum Terisi';
      echo '</div>';
    }
    if (empty($listDosen)) {
      echo '<div class="alert alert-danger alert-dismissible">';
      echo '<button type="button" class="close" data-dismiss="alert";aria-hidden="true">×</button>';
      echo '<h5><i class="fas fa-times"></i> Alert!</h5>';
      echo 'Data Dosen Belum Terisi';
      echo '</div>';
    }
    if (empty($listMatkul)) {
      echo '<div class="alert alert-danger alert-dismissible">';
      echo '<button type="button" class="close" data-dismiss="alert";aria-hidden="true">×</button>';
      echo '<h5><i class="fas fa-times"></i> Alert!</h5>';
      echo 'Data matkul Belum Terisi';
      echo '</div>';
    }
    ?>

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
                <form action="<?= base_url() ?>DataPenugasanDosen/validation_form" method="post" accept-charset="utf-8">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nama Dosen</label>
                      <select class="form-control" name="nm_dosen">
                        <?php
                        foreach ($dosen as $dos) { ?>
                          <option value="<?= $dos->id_dosen ?>"><?= $dos->nama_dosen ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Nama Matkul</label>
                      <select class="form-control" name="nm_mat">
                        <?php
                        foreach ($matkul as $mat) { ?>
                          <option value="<?= $mat->id_matkul ?>"><?= $mat->nama_matkul ?></option>
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


    <!-- input penugasan guru -->
    <?php if (!empty($jurusan) && !empty($ruangan) && !empty($listDosen) && !empty($listMatkul)) : ?>
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Dosen Pengampu</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <th>No</th>
                  <th>Nama Dosen</th>
                  <th>Action</th>
                </tr>
                <?php
                $no = 1;
                foreach ($listDosen as $ValuelistDosen) : ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $ValuelistDosen->nama_dosen ?></td>
                    <td>
                      <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TugasDosen" data-kodematkul="<?= $ValuelistDosen->id_dosen ?>" data-matkul="<?= $ValuelistDosen->nama_dosen ?>">Tambah Dosen Pengampu</button> -->
                      <a href="<?= base_url('DataPenugasanDosen/tampilan_tambah/' . $ValuelistDosen->id_dosen) ?>"><button class="btn <?= ($ValuelistDosen) ? 'btn-success' : 'btn-danger'; ?>">Lihat Mata Kuliah</button></a>
                    </td>
                  </tr>
                <?php
                  $no++;
                endforeach; ?>
              </table>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    <?php endif; ?>


  </section>
  <!-- /.content -->
</div>
<!--  /.content-wrapper -->


<!-- Modal Penambahan Dosen -->
<div class="modal fade" id="TugasDosen">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="form"></div>
      </div>
    </div>
  </div>
</div>