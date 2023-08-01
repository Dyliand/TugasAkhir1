Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Ubah Data Dosen</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Data Range Jam</li>
                        <li class="breadcrumb-item active">Ubah Data Range Jam</li>
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
                                            <label for="exampleInputEmail1">ID Jam</label>
                                            <input type="text" class="form-control disabled" name="id_jam" value="<?= $ubah['id_jam'] ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label>Jam Ke-</label>
                                            <select class="form-control" name="jamke">
                                                <option value="">-----Pilih Jam-----</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Jam Mulai</label>
                                            <input type="time" class="form-control" name="jammu" value="<?= $ubah['jam_mulai'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Jam Selesai</label>
                                            <input type="time" class="form-control" name="jamsel" value="<?= $ubah['jam_selesai'] ?>">
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