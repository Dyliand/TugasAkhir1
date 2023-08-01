<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Jadwal</h1>
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
        <!-- /.row -->
        <!-- list data -->
        <div class="row">
            <div class="col-12">
                <div class="callout callout-danger">
                    <h5>Jadwal Belum Terplot</h5>
                    <table class="table table-bordered">
                        <tr>
                            <td>Ruangan</td>
                            <td>Id Dosen</td>
                            <td>Nama Dosen</td>
                            <td>Matkul</td>
                            <td>SKS</td>
                            <td>Jumlah Yang belum Terplot</td>
                            <td>Request Jadwal</td>
                            <td>Action</td>
                        </tr>
                        <?php
                        foreach ($belumterplot as $valueBelumterplot) : ?>
                            <tr>
                                <td><?= $valueBelumterplot->id_ruangan ?></td>
                                <td><?= $valueBelumterplot->id_dosen ?></td>
                                <td><?= $valueBelumterplot->nama_dosen ?></td>
                                <td><?= $valueBelumterplot->nama_matkul ?></td>
                                <td><?= $valueBelumterplot->sks ?></td>
                                <td><?= $valueBelumterplot->sisa_jam ?></td>
                                <td><?= $valueBelumterplot->hari ?></td>
                                <td><button data-tugasdosen="<?= $valueBelumterplot->id_tugas ?>" data-ruangan="<?= $valueBelumterplot->id_ruangan ?>" data-request="<?= $valueBelumterplot->hari ?>" class="btn btn-primary plotting">Plotting</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>

        </div>
        <div class="row">
            <?php
            $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at'];
            function filter_jadwal($penjadwalan, $hari, $ruangan, $sesi)
            {
                $data = [];
                foreach ($penjadwalan as $value) {
                    if ($value->hari == $hari && $value->sesi == $sesi && $value->id_ruangan == $ruangan) {
                        $data[] = $value;
                    }
                }
                return $data;
            }
            function getkodeMatkul($matkul, $idMatkul)
            {
                $key = array_search($idMatkul, array_column($matkul, 'id_matkul'));
                return $matkul[$key]->kode_matkul;
            }
            foreach ($hari as $valueHari) :
                $keyJadwal = array_search($valueHari, array_column($jadwal, 'hari'));
                $jumlahSesi = $jadwal[$keyJadwal]->jumlah_sesi;
            ?>
                <div class="col-6">
                    <div class="card">
                        <!-- card-body -->
                        <div class="card-body">
                            <h3><?= $valueHari ?></h3>
                            <table class="table table-bordered table-responsive">
                                <tr>
                                    <th>+</th>
                                    <?php foreach ($ruangan as $valueRuangan) : ?>
                                        <th><?= $valueRuangan->id_ruangan ?></th>
                                    <?php endforeach; ?>
                                </tr>
                                <?php
                                // print_r($penjadwalan);
                                for ($i = 0; $i < $jumlahSesi; $i++) { ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <?php
                                        foreach ($ruangan as $valueRuangan) :
                                            $dataJadwalRuangan = filter_jadwal($penjadwalan, $valueHari, $valueRuangan->id_ruangan, $i);
                                            if ($dataJadwalRuangan[0]->id_dosen !== null) { ?>
                                                <td id="<?= $dataJadwalRuangan[0]->id_penjadwalan ?>" class='penjadwalan first' data-ruangan='<?= $valueRuangan->id_ruangan ?>' data-hari='<?= $valueHari ?>' data-jadwal='<?= json_encode($dataJadwalRuangan[0]) ?>' data-request='<?= $dataJadwalRuangan[0]->request ?>' style="padding: 10px; background-color: <?= $dataJadwalRuangan[0]->code_color ?> ;">
                                                    <div>
                                                        <?= '(' . $dataJadwalRuangan[0]->id_dosen . ') ' .  getkodeMatkul($matkul, $dataJadwalRuangan[0]->id_matkul) ?>
                                                    </div>
                                                </td>
                                        <?php
                                            } else {
                                                $color = 'blue';
                                                if ($dataJadwalRuangan[0]->keterangan == 'kosong') {
                                                    $color = 'red';
                                                }
                                                echo "<td style='color: $color ;' data-request='-' data-dosen='" . $dataJadwalRuangan[0]->id_dosen . "' data-ruangan='$valueRuangan->id_ruangan' data-hari='$valueHari' class='penjadwalan first' data-jadwal='" . json_encode($dataJadwalRuangan[0]) . "'>" . $dataJadwalRuangan[0]->keterangan . "</td>";
                                            }
                                        endforeach; ?>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            <?php
            endforeach; ?>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->