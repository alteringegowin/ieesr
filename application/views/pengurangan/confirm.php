<div class="row well" style="background-color: #fff;">
    <div class="span12">
        <div class="row">
            <div class="span12">
                <h2>Emisi Rumah</h2>
                <hr/>
                <div class="row">
                    <div class="span12">
                        <?php if (isset($commitment['penerangan']['item'])): ?>
                            <div id="emisi_penerangan">
                                <h3>Penerangan</h3>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th colspan="3">Baseline</th>
                                            <th colspan="3">Pengurangan</th>
                                        </tr>
                                        <tr>
                                            <th>Jenis</th>
                                            <th>Daya (watt)</th>
                                            <th>Waktu (jam)</th>
                                            <th>Jenis</th>
                                            <th>Daya (watt)</th>
                                            <th>Waktu (jam)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($commitment['penerangan']['item'] as $k => $v): ?>
                                            <tr>
                                                <td><?php echo element('tipe', $v) ?></td>
                                                <td><?php echo element('daya', $v) ?> </td>
                                                <td><?php echo element('waktu', $v) ?> Jam</td>

                                                <td><?php echo element('tipelampu-' . $k, $lampu, 0) ?></td>
                                                <td><?php echo element('daya-' . $k, $lampu, 0) ?></td>
                                                <td><?php echo element('waktu-' . $k, $lampu, 0) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td colspan="3" style="text-align: right"><h4>Total Emisi Baseline : <?php echo element('total_lampu_asli', $lampu) ?></h4></td>
                                            <td colspan="3" style="text-align: right"><h4>Total Emisi Setelah Pengurangan: <?php echo element('total_lampu_all', $lampu,0) ?></h4></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>

                        <div id="emisi_dapur">
                            <h3>Peralatan Dapur</h3>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <th>Jenis</th>
                                        <th>Baseline</th>
                                        <th>Menjadi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($fgroup[2] as $r): ?>
                                        <?php if (isset($baseline_dapur['item-' . $r->id])): ?>
                                            <?php if ($r->id < 6): ?>
                                                <tr>
                                                    <td><?php echo $r->item_name ?></td>
                                                    <td>Ya</td>
                                                    <td><?php echo isset($dapur['jam-' . $r->id]) ? 'Ya' : 'Tidak'; ?></td>
                                                </tr>
                                            <?php else: ?>
                                                <tr>
                                                    <td><?php echo $r->item_name ?></td>
                                                    <td><?php echo element('item-' . $r->id, $baseline_dapur) ?> Jam</td>
                                                    <td><?php echo element('jam-' . $r->id, $dapur, element('item-' . $r->id, $baseline_dapur)) ?> Jam</td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td>TOTAL</td>
                                        <td style="text-align: right"><h4>Baseline : <?php echo element('total_dapur_asli', $dapur) ?></h4></td>
                                        <td style="text-align: right"><h4>Pengurangan: <?php echo element('total_dapur', $dapur) ?></h4></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>



                        <div id="emisi_rumah_tangga">
                            <h3>Peralatan Rumah Tangga</h3>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <th>Jenis</th>
                                        <th>Baseline</th>
                                        <th>Menjadi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($fgroup[3] as $r): ?>
                                        <?php if (isset($baseline_rumah_tangga['item-' . $r->id])): ?>
                                            <tr>
                                                <td><?php echo $r->item_name ?></td>
                                                <td><?php echo element('item-' . $r->id, $baseline_rumah_tangga) ?> Jam</td>
                                                <td><?php echo element('jam-' . $r->id, $rumah_tangga, element('item-' . $r->id, $baseline_rumah_tangga)) ?> Jam</td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td>TOTAL</td>
                                        <td style="text-align: right"><h4>Baseline : <?php echo element('total_rumah_tangga_asli', $rumah_tangga) ?></h4></td>
                                        <td style="text-align: right"><h4>Pengurangan: <?php echo element('total_rumah_tangga', $rumah_tangga) ?></h4></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <div id="emisi_rumah_tangga">
                            <h3>Peralatan Pribadi</h3>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <th>Jenis</th>
                                        <th>Baseline</th>
                                        <th>Menjadi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($fgroup[4] as $r): ?>
                                        <?php if (isset($baseline_pribadi['item-' . $r->id])): ?>
                                            <tr>
                                                <td><?php echo $r->item_name ?></td>
                                                <td><?php echo element('item-' . $r->id, $baseline_pribadi) ?> Jam</td>
                                                <td><?php echo element('jam-' . $r->id, $pribadi, element('item-' . $r->id, $baseline_pribadi)) ?> Jam</td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td>TOTAL</td>
                                        <td style="text-align: right"><h4>Baseline : <?php echo element('total_pribadi_asli', $pribadi) ?></h4></td>
                                        <td style="text-align: right"><h4>Pengurangan: <?php echo element('total_pribadi', $pribadi) ?></h4></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <div id="emisi_elektronik">
                            <h3>Peralatan Hiburan dan Elektronik</h3>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <th>Jenis</th>
                                        <th>Baseline</th>
                                        <th>Menjadi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($fgroup[5] as $r): ?>
                                        <?php if (isset($baseline_elektronik['item-' . $r->id])): ?>
                                            <tr>
                                                <td><?php echo $r->item_name ?></td>
                                                <td><?php echo element('item-' . $r->id, $baseline_elektronik) ?> Jam</td>
                                                <td><?php echo element('jam-' . $r->id, $elektronik, element('item-' . $r->id, $baseline_elektronik)) ?> Jam</td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td>TOTAL</td>
                                        <td style="text-align: right"><h4>Baseline : <?php echo element('total_elektronik_asli', $elektronik) ?></h4></td>
                                        <td style="text-align: right"><h4>Pengurangan: <?php echo element('total_elektronik', $elektronik) ?></h4></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6></h6>

                        <div id="emisi_komunikasi">
                            <h3>Informasi Dan Komunikasi</h3>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Jenis</th>
                                        <th>Baseline</th>
                                        <th>Menjadi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($fgroup[6] as $r): ?>
                                        <?php if (isset($baseline_komunikasi['item-' . $r->id])): ?>
                                            <tr>
                                                <td><?php echo $r->item_name ?></td>
                                                <td><?php echo element('item-' . $r->id, $baseline_komunikasi) ?> Jam</td>
                                                <td><?php echo element('jam-' . $r->id, $komunikasi, element('item-' . $r->id, $baseline_komunikasi)) ?> Jam</td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td>TOTAL</td>
                                        <td style="text-align: right"><h4>Baseline : <?php echo element('total_komunikasi_asli', $komunikasi) ?></h4></td>
                                        <td style="text-align: right"><h4>Pengurangan: <?php echo element('total_komunikasi', $komunikasi) ?></h4></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="span12">
                <h2>Emisi Sampah</h2>
                <div class="row">
                    <div class="span4">
                        <h4>Sampah Organik</h4>
                        <p>dari <span style="font-size: 20px"><?php echo element('item-25', $baseline_sampah, 0) ?> gram</span> menjadi <span style="font-size: 20px"><?php echo element('item-25', $sampah, 0) ?> gram</span></p>
                    </div>
                    <div class="span4">
                        <h4>Sampah Kertas</h4>
                        <p>dari <span style="font-size: 20px"><?php echo element('item-26', $baseline_sampah, 0) ?> lembar</span> menjadi <span style="font-size: 20px"><?php echo element('item-26', $sampah, 0) ?> lembar</span></p>
                    </div>
                    <div class="span4">
                        <h4>Sampah Plastik</h4>
                        <p>dari <span style="font-size: 20px"><?php echo element('item-27', $baseline_sampah, 0) ?> botol</span> menjadi <span style="font-size: 20px"><?php echo element('item-27', $sampah, 0) ?> botol</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="span12">
                <?php if ($darat): ?>
                    <div class="row">
                        <div class="span12">
                            <h2>Emisi Perjalanan Darat</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php $tipe = $darat['tipe_' . $darat['tipe']]; ?>
                        <div class="span6">
                            <h6>dari</h6>
                            <p>
                                Penggunaan Kendaraan <?php echo element('tipe', $darat) ?> <?php echo get_tipe_darat($darat) ?> 
                                <?php echo get_keterangan_darat($darat) ?>
                            </p>
                        </div>
                        <div class="span6">
                            <h6>Menjadi</h6>
                            <p>
                                Penggunaan Kendaraan <?php echo element('tipe', $baseline_darat) ?> <?php echo get_tipe_darat($baseline_darat) ?> 
                                <?php echo get_keterangan_darat($baseline_darat) ?>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>


        <div class="row ">
            <div class="span12">
                <?php if ($udara): ?>
                    <div class="row">
                        <div class="span12">
                            <h2>Emisi Perjalanan Udara</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span6">
                            <h6>dari</h6>
                            <p>
                                Penggunaan penerbangan <?php echo element('jenis_penerbangan', $udara) ?> <?php echo get_tipe_pesawat($udara['tipe_pesawat']) ?> 
                                Jumlah Transit <?php echo element('jumlah_penumpang', $baseline_darat) ?>
                            </p>
                        </div>
                        <div class="span6">
                            <h6>Menjadi</h6>
                            <p>
                                Penggunaan Kendaraan <?php echo element('tipe', $baseline_udara) ?> <?php echo get_tipe_pesawat($baseline_udara['tipe_pesawat']) ?> 
                                Jumlah Transit <?php echo element('jumlah_penumpang', $baseline_udara) ?>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <hr style="padding: 20px 0px">

        <div id="action-save" class="row">
            <div class="span12" style="text-align: center">
                <p><a href="<?php echo site_url('pengurangan/save_to_db') ?>" class="btn btn-large btn-success">Buat Komitmen Pengurangan Emisi</a></p>
                <p><a href="#" class="btn btn-mini">ulangi pengisian</a></p>

            </div>

        </div>
    </div>
</div>