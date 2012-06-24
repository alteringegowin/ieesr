<div class="row well">
    <div class="span12">
        <h1>Total Emisi</h1>
        <p>Apakah anda yakin akan menggunakan data ini sebagai Baseline Emisi anda?</p>


        <h3>Baseline Emisi Rumah</h3>
        <div class="row">
            <div class="span4">
                <div class="alert">
                    <h6>Penerangan</h6>
                    <h4><?php echo number_format(element('total', $penerangan), 4) ?></h4>
                </div>
            </div>
            <div class="span4">
                <div class="alert ">
                    <h6>Dapur</h6>
                    <h4><?php echo number_format(element('total_dapur', $dapur), 4) ?></h4>
                </div>
            </div>
            <div class="span4">
                <div class="alert">
                    <h6>Rumah Tangga</h6>
                    <h4><?php echo number_format(element('total_rumah_tangga', $rumah_tangga), 4) ?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="span4">
                <div class="alert">
                    <h6>Peralatan Pribadi</h6>
                    <h4><?php echo number_format(element('total_pribadi', $pribadi), 4) ?></h4>
                </div>
            </div>
            <div class="span4">
                <div class="alert">
                    <h6>Elektronik</h6>
                    <h4><?php echo number_format(element('total_elektronik', $elektronik), 4) ?></h4>
                </div>
            </div>
            <div class="span4">
                <div class="alert">
                    <h6>Komunikasi</h6>
                    <h4><?php echo number_format(element('total_komunikasi', $komunikasi), 4) ?></h4>
                </div>
            </div>
        </div>



        <h3>Baseline Emisi Sampah</h3>
        <div class="row">
            <div class="span4">
                <div class="alert">
                    <h6>Organik</h6>
                    <h4><?php echo number_format(element('total_organik', $sampah), 4) ?></h4>
                </div>
            </div>
            <div class="span4">
                <div class="alert ">
                    <h6>Kertas</h6>
                    <h4><?php echo number_format(element('total_kertas', $sampah), 4) ?></h4>
                </div>
            </div>
            <div class="span4">
                <div class="alert">
                    <h6>Plastik</h6>
                    <h4><?php echo number_format(element('total_plastik', $sampah), 4) ?></h4>
                </div>
            </div>
        </div>



        <h3>Baseline Emisi Transportasi</h3>
        <div class="row">
            <div class="span4">
                <div class="alert">
                    <h6>Transportasi Darat</h6>
                    <h4><?php echo number_format(element('total_darat', $darat, 0), 4) ?></h4>
                </div>
            </div>
            <div class="span4">
                <div class="alert ">
                    <h6>Transportasi Non Darat</h6>
                    <h4><?php echo number_format(element('total_pesawat', $udara, 0), 4) ?></h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="span12">
                <a href="<?php echo site_url('create/save_to_db') ?>" class="btn btn-large btn-info">Simpan Data Baseline Emisi</a>
                &nbsp;&nbsp;
                <a href="<?php echo site_url('create/reset_session') ?>"  class="btn btn-small">Mengisikan Ulang </a>
            </div>
        </div>


    </div>
</div>